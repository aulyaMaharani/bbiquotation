<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Mail\NewQuotationMail;
use Illuminate\Support\Facades\Mail;

class QuotationController extends Controller
{
    /**
     * Menampilkan halaman Formulir Pengajuan (Gambar 2)
     */
    public function create()
    {
        // Pastikan file ada di resources/views/quotation/form.blade.php
        return view('quotation.form');
    }

    /**
     * Menyimpan data dari formulir ke database dan mengirim email
     */
    public function store(Request $request)
    {
        // Validasi input
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

        // 1. Simpan data ke database dan ambil ID-nya
        $id = DB::table('quotations')->insertGetId([
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
            'kegiatan_detail' => $request->kegiatan_detail, // Menyimpan detail 'Lain-lain'
            'created_at'      => now(),
            'updated_at'      => now(),
        ]);

        // 2. Ambil data yang baru saja masuk untuk dikirim via email
        $quotation = DB::table('quotations')->where('id', $id)->first();

        // 3. Proses Pengiriman Email ke Admin
        try {
            // Ganti email di bawah dengan email admin BBI yang dituju
            Mail::to('bosowabandarindo@gmail.com')->send(new NewQuotationMail($quotation));
        } catch (\Exception $e) {
            // Jika email gagal terkirim (misal karena koneksi internet), data tetap aman di database
            // Log bisa dilihat di storage/logs/laravel.log
        }

        // 4. Kembali ke landing page dengan pesan sukses
        return redirect()->route('landing')->with('success', 'Berhasil terkirim! Notifikasi telah diteruskan ke Admin.');
    }
}