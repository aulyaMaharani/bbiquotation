<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $query = DB::table('quotations');

        // Filter Nama Perusahaan
        if ($request->filled('search')) {
            $query->where('nama_perusahaan', 'like', '%' . $request->search . '%');
        }

        // Filter Bulan berdasarkan kolom Estimasi Tiba (ETA)
        if ($request->filled('month')) {
            $query->whereMonth('estimasi_tiba', $request->month);
        }

        // Filter Tahun berdasarkan kolom Estimasi Tiba (ETA)
        if ($request->filled('year')) {
            $query->whereYear('estimasi_tiba', $request->year);
        }

        $quotations = $query->orderBy('estimasi_tiba', 'desc')->get();

        return view('internal.dashboard', compact('quotations'));
    }

    public function downloadPDF($id)
    {
        // Ambil data permohonan berdasarkan ID
        $data = \DB::table('quotations')->where('id', $id)->first();

        if (!$data) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('internal.pdf_template', compact('data'));
        return $pdf->download('Quotation-' . $data->nama_perusahaan . '.pdf');
    }
}