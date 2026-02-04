<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Cek apakah user sudah login melalui session
        if (!session('admin_logged_in')) {
            return redirect()->route('login')->withErrors(['loginError' => 'Silahkan login terlebih dahulu!']);
        }

        return view('internal.dashboard'); // Arahkan ke file dashboard kamu
    }
}