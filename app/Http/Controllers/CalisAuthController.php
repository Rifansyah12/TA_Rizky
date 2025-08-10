<?php
// app/Http/Controllers/CalisAuthController.php

namespace App\Http\Controllers;

use App\Models\CalisUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalisAuthController extends Controller
{
    // Tampilkan form login
    public function showLogin()
    {
        return view('calis.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required']
        ]);

        if (Auth::guard('calis')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('pendaftaran.index');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::guard('calis')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('LoginCalis');
    }

    // Tampilkan form registrasi
    public function showRegister()
    {
        return view('calis.register');
    }

    // Proses registrasi
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:calis_users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        CalisUser::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password, // akan otomatis di-hash oleh mutator di model
        ]);

        return redirect()->route('LoginCalis')->with('success', 'Registrasi berhasil. Silakan login.');
    }
}
