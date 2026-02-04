<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        $validEmail = "admin@bosowa.com";
        $validPassword = "passwordadmin123";

        if ($request->email === $validEmail && $request->password === $validPassword) {
            // Menyimpan data di session agar sistem tahu user sudah login
            session(['admin_logged_in' => true]);
            
            // PINDAH KE DASHBOARD
            return redirect()->route('dashboard')->with('success', 'Berhasil masuk ke Dashboard!');
        }

        return back()->withErrors(['loginError' => 'Email atau Password salah!'])->withInput();
    }
}