<?php

use Illuminate\Support\Facades\Route;
use App\Features\RedirectEngine\Controllers\RedirectEngineController;
use App\Features\SecurityEngine\Http\Middleware\SecurityEngineBotShield;

Route::middleware(['web', SecurityEngineBotShield::class])->group(function () {
    
    // Step 2: Intermediate sequence page
    Route::get('/processing', [RedirectEngineController::class, 'intermediate'])
        ->name('secure.intermediate');

    // Step 3: The Secure Transit endpoint. 
    Route::get('/secure-transit', [RedirectEngineController::class, 'secureTransit'])
        ->name('secure.transit');

    // Step 1: The wildcard short URL interceptor.
    // Putting this inside the RedirectEngineRoutes ensures it handles short URLs.
    Route::get('/{slug}', [RedirectEngineController::class, 'resolve'])
        ->name('link.resolve')
        ->where('slug', '.+'); // Requires at least one character, prevents matching '/'
});
