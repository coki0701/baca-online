<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectRole
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {

            if (Auth::user()->role == 'admin') {
                return redirect('/admin');
            }

            if (Auth::user()->role == 'user') {
                return redirect('/books');
            }
        }

        return $next($request);
    }
}
