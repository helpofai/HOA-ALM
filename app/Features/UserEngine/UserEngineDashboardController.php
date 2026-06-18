<?php

namespace App\Features\UserEngine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserEngineDashboardController extends Controller
{
    public function userDashboard()
    {
        $user = Auth::user();

        // Analytics Placeholders (To be replaced by AnalyticsEngine later)
        $totalClicks = 0;
        
        // Fetch Real Link Data
        $activeLinksCount = \App\Features\LinkManagement\Models\LinkManagementLinkModel::where('user_id', $user->id)
            ->where('is_active', true)
            ->where(function($query) {
                $query->whereNull('expires_at')
                      ->orWhere('expires_at', '>', now());
            })
            ->count();

        $recentLinks = \App\Features\LinkManagement\Models\LinkManagementLinkModel::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('features.user-engine.dashboard.user', compact('user', 'activeLinksCount', 'recentLinks', 'totalClicks'));
    }

    public function adminDashboard()
    {
        $user = Auth::user();
        return view('features.user-engine.dashboard.admin', compact('user'));
    }

    public function adminUsers()
    {
        $user = Auth::user();
        return view('features.user-engine.dashboard.admin-users', compact('user'));
    }
}
