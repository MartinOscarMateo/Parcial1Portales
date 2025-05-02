<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): response
    {
        // Check if the authenticated user is an admin
        if (Auth::check() && Auth::user()->hasRol('admin')) {
            return $next($request);
        }

        // Redirect or abort if not admin
        abort(403, 'Acceso denegado. Admins only.');
    }
}
