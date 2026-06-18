<?php

namespace App\Features\LinkManagement\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Features\LinkManagement\Models\LinkManagementFeatureModel;
use App\Features\LinkManagement\Models\UserFeaturePreferenceModel;

class LinkManagementController extends Controller
{
    /**
     * Display a listing of the user's links.
     */
    public function index()
    {
        $links = \App\Features\LinkManagement\Models\LinkManagementLinkModel::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            
        return view('features.link-management.dashboard', compact('links'));
    }

    /**
     * Display the advanced link creation portal.
     */
    public function create()
    {
        $user = Auth::user();
        
        // Get all globally enabled features
        $globalFeatures = LinkManagementFeatureModel::where('is_enabled', true)->get();
        
        // Get user preferences
        $userPreferences = UserFeaturePreferenceModel::where('user_id', $user->id)
            ->pluck('is_enabled', 'feature_id')->toArray();
            
        // Construct the final feature map for the view
        $features = [];
        foreach ($globalFeatures as $feature) {
            // If user has a preference, use it. Otherwise, default to true (since it's globally enabled).
            $features[$feature->slug] = $userPreferences[$feature->id] ?? true;
        }
        
        return view('features.link-management.create', compact('features'));
    }

    /**
     * Store the newly created link.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'destination_url' => 'required|url|max:2048',
            'custom_slug' => 'nullable|string|max:255|unique:link_management_links,slug',
            'password' => 'nullable|string',
            'expires_at' => 'nullable|date',
            // Default domain fallback
            'domain' => 'nullable|string',
        ]);

        // Generate a random slug if custom_slug isn't provided
        $slug = $validated['custom_slug'] ?? \Illuminate\Support\Str::random(7);

        \App\Features\LinkManagement\Models\LinkManagementLinkModel::create([
            'user_id' => Auth::id(),
            'destination_url' => $validated['destination_url'],
            'slug' => $slug,
            'domain' => $validated['domain'] ?? 'l.sp',
            'password' => $validated['password'] ? \Illuminate\Support\Facades\Hash::make($validated['password']) : null,
            'is_active' => true,
            'is_secure_gateway' => true, // Enforce bot shield by default
            'expires_at' => $validated['expires_at'] ?? null,
        ]);

        $redirectRoute = Auth::user()->role === \App\Shared\Enums\SharedRoleEnum::ADMIN->value 
            ? 'admin.dashboard' 
            : 'user.dashboard';

        return redirect()->route($redirectRoute)->with('success', 'Advanced Link created successfully.');
    }

    /**
     * Display the user's specific feature preferences.
     */
    public function userFeatures()
    {
        $user = Auth::user();
        
        // Only show features that are globally enabled by the Admin
        $features = LinkManagementFeatureModel::where('is_enabled', true)->orderBy('name')->get();
        
        $preferences = UserFeaturePreferenceModel::where('user_id', $user->id)
            ->pluck('is_enabled', 'feature_id')->toArray();

        return view('features.link-management.user-features', compact('features', 'preferences'));
    }

    /**
     * Toggle a user's specific feature preference.
     */
    public function toggleUserFeature(Request $request, $id)
    {
        $user = Auth::user();
        
        // Ensure the feature exists and is globally enabled
        $feature = LinkManagementFeatureModel::where('is_enabled', true)->findOrFail($id);
        
        $validated = $request->validate([
            'is_enabled' => 'required|boolean',
        ]);

        $preference = UserFeaturePreferenceModel::updateOrCreate(
            ['user_id' => $user->id, 'feature_id' => $feature->id],
            ['is_enabled' => $validated['is_enabled']]
        );

        return response()->json([
            'success' => true,
            'message' => 'Feature preference updated successfully.',
            'preference' => $preference,
        ]);
    }
}
