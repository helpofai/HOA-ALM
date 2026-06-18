<?php

namespace App\Features\LinkManagement\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Features\LinkManagement\Models\LinkManagementFeatureModel;

class LinkManagementAdminController extends Controller
{
    /**
     * Display the Admin Link Features Dashboard.
     */
    public function index()
    {
        $features = LinkManagementFeatureModel::orderBy('name')->get();
        return view('features.link-management.admin-features', compact('features'));
    }

    /**
     * Toggle a specific feature's status via AJAX.
     */
    public function toggle(Request $request, $id)
    {
        $feature = LinkManagementFeatureModel::findOrFail($id);
        
        $validated = $request->validate([
            'is_enabled' => 'required|boolean',
        ]);

        $feature->update([
            'is_enabled' => $validated['is_enabled'],
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Feature updated successfully.',
            'feature' => $feature,
        ]);
    }
}
