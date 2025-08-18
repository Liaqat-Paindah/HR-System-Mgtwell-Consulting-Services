<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle($request, Closure $next, ...$role_name)
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect('/home'); // Redirect if not authenticated
        }

        // Check if the user's role is in the provided roles
        if (!in_array(Auth::user()->role_name, $role_name)) {
            return redirect('/home'); // Redirect if role does not match
        }

        return $next($request);
    }
}
