<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectByRole
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {

            if ($request->is('login') || $request->is('register')) {

                if (auth()->user()->role === 'admin') {
                    return redirect('/upload');
                }

                return redirect('/books');
            }
        }

        return $next($request);
    }
}
