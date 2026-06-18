<?php

namespace App\Features\SecurityEngine\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SecurityEngineBotShield
{
    /**
     * Handle an incoming request.
     * Block obvious automated scrapers based on User-Agent.
     */
    public function handle(Request $request, Closure $next)
    {
        $userAgent = strtolower($request->header('User-Agent'));

        $blockedAgents = [
            'curl', 'wget', 'python-requests', 'java', 'libwww-perl', 
            'bot', 'spider', 'crawler', 'scraper', 'postman'
        ];

        // Basic Bot Detection Header Check
        foreach ($blockedAgents as $agent) {
            if (str_contains($userAgent, $agent)) {
                return response('Automated access denied by SecurityEngine.', 403);
            }
        }

        return $next($request);
    }
}
