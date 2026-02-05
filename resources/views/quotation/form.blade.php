@extends('layouts.main')

@section('title', 'Form Pengajuan Quotation')

@section('content')
{{-- CSS INTERNAL UNTUK MEMASTIKAN TAMPILAN SESUAI GAMBAR --}}
<style>
    .form-group { margin-bottom: 15px; }
    .hidden-field { display: none; } /* Default sembunyi */
    .form-card { background: #fff; padding: 25px; border-radius: 15px; }
</style>

<div class="form-card">
    <h2>Formulir Pengajuan Quotation</h2>
    <p class="subtitle">Lengkapi data untuk mendapatkan penawaran terbaik</p>

    <form id="qForm" action="{{ route('quotation.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label>Nama Perusahaan</label>
            <input type="text" name="nama_perusahaan" value="{{ old('nama_perusahaan') }}" required>
        </div>

        <div class="form-group">
            <label>Nama PIC</label>
            <input type="text" name="nama_pic" value="{{ old('nama_pic') }}" required>
        </div>

        <div class="form-group">
            <label>WhatsApp PIC</label>
            <input type="text" name="whatsapp_pic" value="{{ old('whatsapp_pic') }}" required>
        </div>

        <div class="form-group">
            <label>Jenis Kapal</label>
            {{-- ID id_jenis_kapal untuk dipantau JS --}}
            <select name="jenis_kapal" id="id_jenis_kapal" required onchange="jalankanLogikaKapal()">
                <option value="">Pilih jenis kapal</option>
                <option value="General Cargo">1. General cargo</option>
                <option value="Tugboat/Barge">2. Tugboat/barge</option>
                <option value="Mother Tanker">3. Mother tanker (MT)</option>
                <option value="TBN">4. TBN</option>
            </select>
        </div>

        <div class="form-group">
            <label id="label_kapal_utama">Nama Kapal</label>
            <input type="text" name="nama_kapal" required>
        </div>

        {{-- Gunakan ID id_kolom_barge --}}
        <div class="form-group hidden-field" id="id_kolom_barge">
            <label>Nama Barge (Tongkang)</label>
            <input type="text" name="nama_kapal_extra">
        </div>

        <div class="form-group">
            <label>Gt (Gross Tonnage)</label>
            <select name="gt" required>
                <option value="">Pilih GT</option>
                <option value="Tugboat">Tugboat</option>
                <option value="Cargo">Cargo</option>
            </select>
        </div>

        <div class="form-group">
            <label>Pelabuhan Tujuan</label>
            <input type="text" name="pelabuhan_tujuan" required>
        </div>

        <div class="form-group">
            <label>Estimasi Tiba (ETA)</label>
            <input type="date" name="estimasi_tiba" required>
        </div>

        <div class="form-group">
            <label>Rencana Kegiatan</label>
            <select name="rencana_kegiatan" id="id_rencana_kegiatan" required onchange="jalankanLogikaKegiatan()">
                <option value="">Pilih rencana kegiatan</option>
                <option value="Bongkar">1. Bongkar</option>
                <option value="Muat">2. Muat</option>
                <option value="Lain-lain">3. Dan Lain-lain</option>
            </select>
        </div>

        <div class="form-group hidden-field" id="id_kolom_detail">
            <label>Detail Kegiatan</label>
            <textarea name="kegiatan_detail" rows="3"></textarea>
        </div>

        <button type="submit" class="btn-submit">Minta Quotation</button>
    </form>
</div>

{{-- JAVASCRIPT LANGSUNG DI SINI TANPA @PUSH --}}
<script>
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

    function jalankanLogikaKegiatan() {
        var pilihan = document.getElementById("id_rencana_kegiatan").value;
        var kolomDetail = document.getElementById("id_kolom_detail");

        if (pilihan === "Lain-lain") {
            kolomDetail.style.display = "block";
        } else {
            kolomDetail.style.display = "none";
        }
    }
</script>
@endsection