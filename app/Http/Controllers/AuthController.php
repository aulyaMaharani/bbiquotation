<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('internal.login'); 
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $validEmail = "bosowabandarindo@gmail.com";
        $validPassword = "adminbbi2026";

        if ($request->email === $validEmail && $request->password === $validPassword) {
            
            // LOGIKA INGAT SAYA
            if ($request->has('remember')) {
                // Simpan email dan password di cookie selama 30 hari (43200 menit)
                Cookie::queue('remember_email', $request->email, 43200);
                Cookie::queue('remember_password', $request->password, 43200);
            } else {
                // Hapus cookie jika tidak dicentang
                Cookie::queue(Cookie::forget('remember_email'));
                Cookie::queue(Cookie::forget('remember_password'));
            }

            session(['admin_logged_in' => true]);
            return redirect()->route('dashboard')->with('success', 'Selamat Datang!');
        }

        return back()->withErrors(['loginError' => 'Email atau Password salah!'])->withInput();
    }

    public function logout(Request $request)
    {
        // Hapus session login
        session()->forget('admin_logged_in');
        
        // Opsional: Hapus semua session
        $request->session()->flush();

        return redirect()->route('login')->with('success', 'Anda telah keluar.');
    }
}