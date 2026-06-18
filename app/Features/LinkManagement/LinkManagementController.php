<?php

namespace App\Features\LinkManagement;

use App\Core\Http\Controllers\Controller;
use Illuminate\View\View;

class LinkManagementController
{
    /**
     * Display the landing page.
     */
    public function index(): View
    {
        return view('features.link-management.index');
    }
}
