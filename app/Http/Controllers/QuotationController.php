<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuotationController extends Controller
{
    public function create()
    {
        return view('quotation_form'); // Pastikan nama file blade form kamu quotation_form.blade.php
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'nama_pic'        => 'required|string|max:255',
            'whatsapp_pic'    => 'required|string|max:20',
            'jenis_kapal'     => 'required',
            'nama_kapal'      => 'required|string|max:255',
            'gt'              => 'required',
            'pelabuhan_tujuan'=> 'required|string|max:255',
            'estimasi_tiba'   => 'required|date',
            'rencana_kegiatan'=> 'required',
        ]);

        // Ganti 'quotations' dengan nama tabel database kamu
        DB::table('quotations')->insert([
            'nama_perusahaan' => $validated['nama_perusahaan'],
            'nama_pic'        => $validated['nama_pic'],
            'whatsapp_pic'    => $validated['whatsapp_pic'],
            'jenis_kapal'     => $validated['jenis_kapal'],
            'nama_kapal'      => $validated['nama_kapal'],
            'gt'              => $validated['gt'],
            'pelabuhan_tujuan'=> $validated['pelabuhan_tujuan'],
            'estimasi_tiba'   => $validated['estimasi_tiba'],
            'rencana_kegiatan'=> $validated['rencana_kegiatan'],
            'created_at'      => now(),
            'updated_at'      => now(),
        ]);

        return redirect()->route('landing')->with('success', 'Quotation berhasil dikirim!');
    }
}