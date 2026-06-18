<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Features\UserEngine\UserEngineAuthController;
use App\Features\UserEngine\UserEngineDashboardController;
use App\Features\UserEngine\Http\Middleware\UserEngineRoleCheck;

Route::middleware('web')->group(function () {
    // Guest Auth Routes
    Route::middleware('guest')->group(function () {
        Route::get('/login', [UserEngineAuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [UserEngineAuthController::class, 'login']);
        
        Route::get('/register', [UserEngineAuthController::class, 'showRegister'])->name('register');
        Route::post('/register', [UserEngineAuthController::class, 'register']);
    });

    // Authenticated Routes
    Route::middleware('auth')->group(function () {
        Route::post('/logout', [UserEngineAuthController::class, 'logout'])->name('logout');

        // User Dashboard
        Route::middleware(UserEngineRoleCheck::class . ':user')
            ->get('/dashboard', [UserEngineDashboardController::class, 'userDashboard'])
            ->name('user.dashboard');

        // Admin Dashboard
        Route::middleware(UserEngineRoleCheck::class . ':admin')->group(function () {
            Route::get('/admin/dashboard', [UserEngineDashboardController::class, 'adminDashboard'])
                ->name('admin.dashboard');
            
            Route::get('/admin/users', [UserEngineDashboardController::class, 'adminUsers'])
                ->name('admin.users');

            // Link Engine Capabilities Toggle
            Route::get('/admin/link-features', [\App\Features\LinkManagement\Controllers\LinkManagementAdminController::class, 'index'])
                ->name('admin.link-features');
            Route::post('/admin/link-features/{id}/toggle', [\App\Features\LinkManagement\Controllers\LinkManagementAdminController::class, 'toggle'])
                ->name('admin.link-features.toggle');
        });
    });
});
