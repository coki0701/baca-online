<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Halaman Login
     */
    public function create()
    {
        // jika sudah login
        if (Auth::check()) {

            if (Auth::user()->role === 'admin') {

                return redirect()->route('admin.dashboard');

            }

            return redirect('/');

        }

        return view('auth.login');
    }

    /**
     * Proses Login
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([

            'email' => ['required', 'email'],
            'password' => ['required'],

        ]);

        // cek login
        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            // cek role
            if (Auth::user()->role === 'admin') {

                return redirect()->route('admin.dashboard');

            }

            // user biasa
            return redirect('/');

        }

        return back()->withErrors([

            'email' => 'Email atau password salah.',

        ])->onlyInput('email');
    }

    /**
     * Logout
     */
    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}