<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // 1. Mulai Query
        $query = DB::table('quotations');

        // 2. Logika Filter Nama Perusahaan
        if ($request->filled('search')) {
            $query->where('nama_perusahaan', 'like', '%' . $request->search . '%');
        }

        // 3. Logika Filter Bulan
        if ($request->filled('month')) {
            $query->whereMonth('created_at', $request->month);
        }

        // 4. Logika Filter Tahun
        if ($request->filled('year')) {
            $query->whereYear('created_at', $request->year);
        }

        // 5. Eksekusi dan urutkan dari yang terbaru
        $quotations = $query->orderBy('created_at', 'desc')->get();

        // 6. Kirim ke View
        return view('internal.dashboard', compact('quotations'));
    }
}