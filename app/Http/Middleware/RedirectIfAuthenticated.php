<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            return Auth::user()->isAdmin()
                ? redirect()->route('members.index')
                : redirect()->route('user.dashboard');
        }

        return $next($request);
        if (Auth::check() && $request->routeIs('login')) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('error', 'Sesi telah berakhir. Silakan login kembali.');
}

    }
}
