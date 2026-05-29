<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        // cek login
        if (!auth()->check()) {
            return redirect('/login');
        }

        // cek role
        if (auth()->user()->role != $role) {
            abort(403);
        }

        return $next($request);
    }
}