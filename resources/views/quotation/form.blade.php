@extends('layouts.main')

@section('title', 'Form Pengajuan Quotation')

{{-- TOMBOL KEMBALI DI NAVBAR --}}
@section('nav-action')
    <a href="/" class="btn-nav">Kembali</a>
@endsection

@section('content')
<div class="form-card">
    <h2>Formulir Pengajuan Quotation</h2>
    <p class="subtitle">Lengkapi data untuk mendapatkan penawaran terbaik</p>

    <form id="qForm" action="{{ route('quotation.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label>Nama Perusahaan</label>
            <input type="text" name="nama_perusahaan" placeholder="Contoh: PT. Bosowa Bandar Indonesia" required>
        </div>

        <div class="form-group">
            <label>Nama PIC</label>
            <input type="text" name="nama_pic" placeholder="Masukkan nama penanggung jawab" required>
        </div>

        <div class="form-group">
            <label>WhatsApp PIC</label>
            <input type="text" name="whatsapp_pic" placeholder="Contoh: 08123456789" required>
        </div>

        <div class="form-group">
            <label>Jenis Kapal</label>
            <select name="jenis_kapal" id="id_jenis_kapal" required onchange="jalankanLogikaKapal()">
                <option value="General Cargo">1. General cargo</option>
                <option value="Tugboat/Barge">2. Tugboat/barge</option>
                <option value="Mother Tanker">3. Mother tanker (MT)</option>
                <option value="TBN">4. TBN</option>
            </select>
        </div>

        <div class="form-group">
            <label id="label_kapal_utama">Nama Kapal</label>
            <input type="text" name="nama_kapal" placeholder="Masukkan nama kapal utama" required>
        </div>

        {{-- Kolom Barge: Sembunyi di awal dengan hidden-field --}}
        <div class="form-group hidden-field" id="id_kolom_barge" style="display: none;">
            <label>Nama Barge (Tongkang)</label>
            <input type="text" name="nama_kapal_extra" placeholder="Masukkan nama tongkang">
        </div>

        <div class="form-group">
            <label>GT (Gross Tonnage)</label>
            <select name="gt" id="id_gt" required onchange="jalankanLogikaGT()">
                <option value="Tugboat">1. Tugboat & Barge</option>
                <option value="Cargo">2. Cargo</option>
            </select>
        </div>

        {{-- Kolom GT: Sembunyi di awal --}}
        <div class="form-group hidden-field" id="gt_tugboat" style="display: none;">
            <label>GT Tugboat</label>
            <input type="number" name="gt_tugboat" placeholder="0">
        </div>

        <div class="form-group hidden-field" id="gt_barge" style="display: none;">
            <label>GT Barge</label>
            <input type="number" name="gt_barge" placeholder="0">
        </div>

        <div class="form-group hidden-field" id="gt_cargo" style="display: none;">
            <label>GT Cargo</label>
            <input type="number" name="gt_cargo" placeholder="0">
        </div>

        <div class="form-group">
            <label>Pelabuhan Tujuan</label>
            <input type="text" name="pelabuhan_tujuan" placeholder="Contoh: Pelabuhan Makassar" required>
        </div>

        <div class="form-group">
            <label>Estimasi Tiba (ETA)</label>
            <input type="date" name="estimasi_tiba" required>
        </div>

        <div class="form-group">
            <label>Rencana Kegiatan</label>
            <select name="rencana_kegiatan" id="id_rencana_kegiatan" required onchange="jalankanLogikaKegiatan()">
                <option value="">Pilih rencana kegiatan</option>
                <option value="Bongkar">Bongkar</option>
                <option value="Muat">Muat</option>
                <option value="Lain-lain">Dan Lain-lain</option>
            </select>
        </div>

        {{-- Kolom Detail: Sembunyi di awal --}}
        <div class="form-group hidden-field" id="id_kolom_detail" style="display: none;">
            <label>Detail Kegiatan</label>
            <textarea name="kegiatan_detail" rows="3" placeholder="Sebutkan detail kegiatan lainnya..."></textarea>
        </div>

        <div style="text-align: center; margin-top: 30px;">
            <button type="submit" class="btn-submit">Minta Quotation</button>
        </div>
    </form>
</div>

<script>
    // Fungsi untuk Logika Nama Kapal & Barge
    function jalankanLogikaKapal() {
        var pilihan = document.getElementById("id_jenis_kapal").value;
        var kolomBarge = document.getElementById("id_kolom_barge");
        var labelUtama = document.getElementById("label_kapal_utama");

        if (pilihan === "Tugboat/Barge") {
            kolomBarge.style.display = "block";
            labelUtama.innerText = "Nama Tugboat";
        } else {
            kolomBarge.style.display = "none";
            labelUtama.innerText = "Nama Kapal";
        }
    }

    // Fungsi untuk Logika GT (Tugboat, Barge, Cargo)
    function jalankanLogikaGT() {
        var gt = document.getElementById("id_gt").value;
        var gtTugboat = document.getElementById("gt_tugboat");
        var gtBarge = document.getElementById("gt_barge");
        var gtCargo = document.getElementById("gt_cargo");

        // Sembunyikan semua dulu setiap kali ada perubahan
        gtTugboat.style.display = "none";
        gtBarge.style.display = "none";
        gtCargo.style.display = "none";

        if (gt === "Tugboat") {
            gtTugboat.style.display = "block";
            gtBarge.style.display = "block";
        } else if (gt === "Cargo") {
            gtCargo.style.display = "block";
        }
    }

    // Fungsi untuk Logika Detail Kegiatan
    function jalankanLogikaKegiatan() {
        var pilihan = document.getElementById("id_rencana_kegiatan").value;
        var kolomDetail = document.getElementById("id_kolom_detail");
        kolomDetail.style.display = (pilihan === "Lain-lain") ? "block" : "none";
    }

    // PENTING: Jalankan semua fungsi saat halaman pertama kali dimuat
    // Agar kolom yang harus sembunyi benar-benar sembunyi
    window.onload = function() {
        jalankanLogikaKapal();
        jalankanLogikaGT();
        jalankanLogikaKegiatan();
    };
</script>
@endsection