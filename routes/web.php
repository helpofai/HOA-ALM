<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [\App\Features\LinkManagement\LinkManagementController::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
| Feature Routes
|--------------------------------------------------------------------------
*/

require app_path('Features/LinkManagement/Routes/LinkManagementRoutes.php');
require app_path('Features/UserEngine/Routes/UserEngineRoutes.php');
require app_path('Features/BlogEngine/Routes/BlogEngineRoutes.php');

// MUST BE LAST: Redirect Engine wildcard intercepts all short URLs
require app_path('Features/RedirectEngine/Routes/RedirectEngineRoutes.php');


