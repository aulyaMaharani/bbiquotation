<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class QuotationController extends Controller
{
    /**
     * Menampilkan halaman Formulir Pengajuan (Gambar 2)
     */
    public function create()
    {
        // Pastikan file ada di resources/views/pages/quotation_form.blade.php
        return view('quotation.form');
    }

    /**
     * Menyimpan data dari formulir ke database
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'nama_pic'        => 'required|string|max:255',
            'whatsapp_pic'    => 'required|string|max:20',
            'jenis_kapal'     => 'required',
            'nama_kapal'      => 'required|string|max:255',
            'gt'              => 'required',
            'pelabuhan_tujuan'=> 'required|string',
            'estimasi_tiba'   => 'required|date',
            'rencana_kegiatan'=> 'required',
            // Wajib jika rencana_kegiatan bernilai 'Lain-lain'
            'kegiatan_detail' => 'required_if:rencana_kegiatan,Lain-lain',
        ]);

        DB::table('quotations')->insert([
            'nama_perusahaan' => $request->nama_perusahaan,
            'nama_pic'        => $request->nama_pic,
            'whatsapp_pic'    => $request->whatsapp_pic,
            'jenis_kapal'     => $request->jenis_kapal,
            'nama_kapal'      => $request->nama_kapal,
            'nama_kapal_extra'=> $request->nama_kapal_extra, 
            'gt'              => $request->gt,
            'pelabuhan_tujuan'=> $request->pelabuhan_tujuan,
            'estimasi_tiba'   => $request->estimasi_tiba,
            'rencana_kegiatan'=> $request->rencana_kegiatan,
            'kegiatan_detail' => $request->kegiatan_detail,
            'created_at'      => now(),
            'updated_at'      => now(),
        ]);

        return redirect()->route('landing')->with('success', 'Berhasil terkirim!');
    }
}