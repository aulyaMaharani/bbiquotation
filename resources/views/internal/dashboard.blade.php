@extends('layouts.main')

@section('title', 'Dashboard Internal')

@section('nav-action')
    <form action="#" method="POST">
        @csrf
        <button type="submit" class="btn-keluar">
            <span>🚪</span> Keluar
        </button>
    </form>
@endsection

@section('content')
<div class="dashboard-container">
    <h2 style="color: #333; text-align: left; font-size: 24px;">Riwayat Permohonan Quotation</h2>

    <div class="filter-card">
        <form action="#" method="GET" class="filter-grid">
            <div class="form-group-login" style="margin-bottom:0;">
                <label>Cari Nama Perusahaan</label>
                <input type="text" name="search" placeholder="Ketik Nama Perusahaan">
            </div>
            <div class="form-group-login" style="margin-bottom:0;">
                <label>Bulan</label>
                <select name="bulan">
                    <option>Semua Bulan</option>
                </select>
            </div>
            <div class="form-group-login" style="margin-bottom:0;">
                <label>Tahun</label>
                <select name="tahun">
                    <option>Semua Tahun</option>
                </select>
            </div>
            <button type="reset" class="btn-reset">Reset Filter</button>
        </form>
        <p style="font-size: 12px; margin-top: 15px; color: #666;">Menampilkan 5 dari 5 data</p>
    </div>

    <div class="table-responsive">
        <table class="custom-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Perusahaan</th>
                    <th>Nama PIC</th>
                    <th>WhatsApp PIC</th>
                    <th>Jenis Kapal</th>
                    <th>Nama Kapal</th>
                    <th>GT</th>
                    <th>Tujuan Pelabuhan</th>
                    <th>Rencana Kegiatan</th>
                    <th>Estimasi Tiba</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($quotations as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->nama_perusahaan }}</td>
                    <td>{{ $item->nama_pic }}</td>
                    <td>{{ $item->whatsapp_pic }}</td>
                    <td>{{ $item->jenis_kapal }}</td>
                    <td>{{ $item->nama_kapal }}</td>
                    <td>{{ $item->gt }}</td>
                    <td>{{ $item->pelabuhan_tujuan }}</td>
                    <td>{{ $item->rencana_kegiatan }}</td>
                    <td>{{ $item->estimasi_tiba }}</td>
                    <td><a href="#" class="btn-unduh">Unduh</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection