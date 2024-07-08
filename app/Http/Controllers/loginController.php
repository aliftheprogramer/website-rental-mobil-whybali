<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login', [
            'active' => 'login'
        ]);
    }

    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->only('username', 'password');

        // Coba untuk melakukan login
        if (Auth::attempt($credentials)) {
            // Periksa apakah username adalah 'topvaneryawan'
            if (Auth::user()->username === 'topvaneryawan') {
                return redirect()->intended('/dashboard')->with('success', 'Login successful!');
            }

            // Jika bukan, arahkan ke halaman home
            return redirect()->intended('/')->with('success', 'Login successful!');
        }

        // Jika login gagal, kembalikan ke halaman login dengan pesan error
        return redirect()->back()->withErrors(['username' => 'Invalid credentials.']);
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
