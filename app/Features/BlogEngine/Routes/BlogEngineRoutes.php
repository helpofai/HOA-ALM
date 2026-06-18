<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\UserEngineRoleCheck;
use App\Features\BlogEngine\Controllers\UserBlogEngineController;
use App\Features\BlogEngine\Controllers\AdminBlogEngineController;

// User Routes
Route::middleware(['web', 'auth'])->prefix('my-blog')->name('user.blog.')->group(function () {
    Route::get('/', [UserBlogEngineController::class, 'index'])->name('index');
    Route::get('/create', [UserBlogEngineController::class, 'create'])->name('create');
    Route::post('/', [UserBlogEngineController::class, 'store'])->name('store');
});

// Admin Routes
Route::middleware(['web', 'auth', UserEngineRoleCheck::class.':admin'])->prefix('admin/blog')->name('admin.blog.')->group(function () {
    Route::get('/', [AdminBlogEngineController::class, 'index'])->name('index');
    Route::get('/create', [AdminBlogEngineController::class, 'create'])->name('create');
    Route::post('/', [AdminBlogEngineController::class, 'store'])->name('store');
});
