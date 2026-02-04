<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Cek proteksi login
        if (!session('admin_logged_in')) {
            return redirect()->route('login');
        }

        // 2. Ambil semua data dari tabel quotations
        $quotations = DB::table('quotations')->orderBy('created_at', 'desc')->get();

        // 3. Kirim variabel $quotations ke view (SANGAT PENTING)
        return view('internal.dashboard', compact('quotations'));
    }
}