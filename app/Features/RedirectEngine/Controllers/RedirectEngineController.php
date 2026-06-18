<?php

namespace App\Features\RedirectEngine\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Features\LinkManagement\Models\LinkManagementLinkModel;
use App\Features\SecurityEngine\Actions\SecurityEngineCryptoAction;

class RedirectEngineController extends Controller
{
    protected SecurityEngineCryptoAction $crypto;

    public function __construct(SecurityEngineCryptoAction $crypto)
    {
        $this->crypto = $crypto;
    }

    /**
     * Stage 1: The Secure Gateway Interstitial.
     * Starts the sequence and generates the first-stage payload.
     */
    public function resolve(Request $request, $slug)
    {
        $link = LinkManagementLinkModel::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        if ($link->expires_at && $link->expires_at->isPast()) {
            abort(404, 'Link has expired.');
        }

        // Fetch a random published blog post to show as the background content
        $randomPost = \App\Features\BlogEngine\Models\BlogEnginePostModel::where('status', 'published')
            ->inRandomOrder()
            ->first();

        // Generate Stage 1 Payload (Targets Stage 2)
        $payload = [
            'link_id' => $link->id,
            'destination_url' => $link->destination_url,
            'ip' => $request->ip(),
            'stage' => 1,
            'timestamp' => now()->timestamp
        ];
        
        $token = $this->crypto->encryptPayload($payload);

        return view('features.redirect-engine.stages.gateway', compact('token', 'link', 'randomPost'));
    }

    /**
     * Stage 2: The Intermediate Processing Page.
     * Verifies stage 1 payload and generates the final transit payload.
     */
    public function intermediate(Request $request)
    {
        $token = $request->query('payload');
        if (!$token) abort(403, 'Missing routing payload.');

        $payload = $this->crypto->decryptPayload($token);

        // Security & Sequence Validation
        if (!$payload || $payload['stage'] !== 1 || $payload['ip'] !== $request->ip()) {
            abort(403, 'Security violation: Invalid redirection sequence.');
        }

        if (now()->timestamp - $payload['timestamp'] > 120) {
            abort(403, 'Session expired. Please restart the link navigation.');
        }

        // Fetch another random published blog post to ensure variety across pages
        $randomPost = \App\Features\BlogEngine\Models\BlogEnginePostModel::where('status', 'published')
            ->where('id', '!=', $payload['link_id']) // Ensure it's different if possible
            ->inRandomOrder()
            ->first() ?? \App\Features\BlogEngine\Models\BlogEnginePostModel::where('status', 'published')->inRandomOrder()->first();

        // Generate Stage 2 Payload (Targets Final Transit)
        $newPayload = [
            'link_id' => $payload['link_id'],
            'destination_url' => $payload['destination_url'],
            'ip' => $request->ip(),
            'stage' => 2,
            'timestamp' => now()->timestamp
        ];

        $token = $this->crypto->encryptPayload($newPayload);
        $link = LinkManagementLinkModel::find($payload['link_id']);

        return view('features.redirect-engine.stages.processing', compact('token', 'link', 'randomPost'));
    }

    /**
     * Stage 3: The Secure Transit.
     * Decrypts the final payload and executes the actual redirect.
     */
    public function secureTransit(Request $request)
    {
        $token = $request->query('payload');
        if (!$token) abort(403, 'Missing routing payload.');

        $payload = $this->crypto->decryptPayload($token);

        if (!$payload || $payload['stage'] !== 2 || $payload['ip'] !== $request->ip()) {
            abort(403, 'Security violation: Tampered routing detected.');
        }

        if (now()->timestamp - $payload['timestamp'] > 60) {
            abort(403, 'Final payload expired.');
        }

        return redirect()->away($payload['destination_url']);
    }
}
