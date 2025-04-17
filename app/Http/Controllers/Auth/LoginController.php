<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        // cek apakah user sudah login
        // jika sudah login, redirect ke halaman dashboard
        // jika belum login, tampilkan halaman login
       if (Auth::check()) {
        // Jika user sudah login di tab lain, logout paksa
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect('/login')->with('error', 'Sesi telah berakhir. Silakan login kembali.');
    }
    
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        // Cek apakah akun user ada di database
        $user = User::where('email', $credentials['email'])->first();
        if (!$user) {
            return back()->withErrors([
                'email' => 'Email tidak terdaftar.',
            ])->withInput();
        }
        // Cek apakah password yang dimasukkan benar
        if (!password_verify($credentials['password'], $user->password)) {
            return back()->withErrors([
                'email' => 'Email atau password salah.',
            ])->withInput();
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect berdasarkan role
            return Auth::user()->isAdmin() 
                ? redirect()->route('admin.index') 
                : redirect()->route('user.dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        // Logout user
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    
}
