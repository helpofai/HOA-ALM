<?php

use Illuminate\Support\Facades\Route;
use App\Features\LinkManagement\Controllers\LinkManagementController;
use App\Features\UserEngine\Http\Middleware\UserEngineRoleCheck;

Route::middleware(['web', 'auth'])->group(function () {
    // Link Management Dashboard
    Route::get('/my-links', [LinkManagementController::class, 'index'])->name('links.index');

    // Both Admin and User can create links
    Route::get('/links/create', [LinkManagementController::class, 'create'])->name('links.create');
    Route::post('/links/store', [LinkManagementController::class, 'store'])->name('links.store');

    // User Feature Preferences
    Route::get('/my-features', [LinkManagementController::class, 'userFeatures'])->name('user.link-features');
    Route::post('/my-features/{id}/toggle', [LinkManagementController::class, 'toggleUserFeature'])->name('user.link-features.toggle');
});
