<?php

namespace App\Features\UserEngine\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserEngineRoleCheck
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        if (!Auth::check() || Auth::user()->role !== $role) {
            // Return 403 or redirect to home depending on security requirements.
            // A redirect is often smoother for a standard application flow.
            return redirect('/')->with('error', 'Unauthorized access.');
        }

        return $next($request);
    }
}
