<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // 1. Validasi input terlebih dahulu
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // 2. Gunakan Auth::attempt untuk mengecek user & password secara otomatis
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            // Mengarahkan ke halaman yang dituju sebelumnya, atau ke dashboard
            return redirect()->intended('/dashboard');
        }

        // 3. Jika gagal, kembalikan dengan pesan error yang lebih umum (demi keamanan)
        return back()->with('error', 'Username atau password salah.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}