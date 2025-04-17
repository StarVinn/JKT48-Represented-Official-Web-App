<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validasi data yang diterima dari form registrasi
        $validatedData = $request->validate([
            'name' => ['required', 'min:4'],
            'email' => ['required', 'email', 'unique:users,email'], // Pastikan email unik
            'password' => ['required', 'min:2'],
        ]);

        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']); // Hash password
        $user->role = 'user'; // Role otomatis sebagai 'user'

        $user->save();
        return redirect()->route('login')->with('success', 'Registrasi berhasil, silakan login.');   
    }
}
