@extends('layouts.main')

@section('title', 'Form Pengajuan Quotation')

@section('nav-action')
    <a href="{{ route('landing') }}" class="btn-nav">Kembali</a>
@endsection

@section('content')
<div class="form-card">
    <div id="loading">
        <img src="{{ asset('images/logo-bosowa.png') }}" class="pulse-logo">
        <p style="font-weight: bold; color: #1a3a5f; margin-top: 15px;">Memproses data...</p>
    </div>

    <h2>Formulir Pengajuan Quotation</h2>
    <p class="subtitle">Lengkapi data untuk mendapatkan penawaran terbaik</p>

    <form id="qForm" action="{{ route('quotation.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nama Perusahaan</label>
            <input type="text" name="nama_perusahaan" value="{{ old('nama_perusahaan') }}" placeholder="Contoh: PT. Maju Bersama" required>
        </div>

        <div class="form-group">
            <label>Nama PIC</label>
            <input type="text" name="nama_pic" value="{{ old('nama_pic') }}" required>
        </div>

        <div class="form-group">
            <label>WhatsApp PIC</label>
            <input type="text" name="whatsapp_pic" value="{{ old('whatsapp_pic') }}" placeholder="0812..." required>
        </div>

        <div class="form-group">
            <label>Jenis Kapal</label>
            <select name="jenis_kapal" id="jenis_kapal" required onchange="toggleKapalExtra()">
                <option value="">Pilih jenis kapal</option>
                <option value="General Cargo">1. General cargo</option>
                <option value="Tugboat/Barge">2. Tugboat/barge</option>
                <option value="Mother Tanker">3. Mother tanker (MT)</option>
                <option value="TBN">4. TBN</option>
            </select>
        </div>

        <div class="form-group">
            <label id="label_kapal_utama">Nama Kapal</label>
            <input type="text" name="nama_kapal" placeholder="Masukkan nama kapal">
        </div>

        <div class="form-group hidden" id="group_kapal_extra">
            <label>Nama Barge (Tongkang)</label>
            <input type="text" name="nama_kapal_extra" placeholder="Masukkan nama tongkang">
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
            <select name="rencana_kegiatan" id="rencana_kegiatan" required onchange="toggleLainnya()">
                <option value="">Pilih rencana kegiatan</option>
                <option value="Bongkar">1. Bongkar</option>
                <option value="Muat">2. Muat</option>
                <option value="Lain-lain">3. Dan Lain-lain</option>
            </select>
        </div>

        <div class="form-group hidden" id="group_lainnya">
            <label>Detail Kegiatan</label>
            <textarea name="kegiatan_detail" rows="3" placeholder="Sebutkan rencana kegiatan Anda..."></textarea>
        </div>

        <button type="submit" class="btn-submit">Minta Quotation</button>
    </form>
</div>
@endsection

@push('scripts')
<script>
    document.getElementById('qForm').addEventListener('submit', function() {
        document.getElementById('loading').style.display = 'flex';
    });

    function toggleKapalExtra() {
        const jenis = document.getElementById('jenis_kapal').value;
        const extraField = document.getElementById('group_kapal_extra');
        const labelUtama = document.getElementById('label_kapal_utama');

        if (jenis === 'Tugboat/Barge') {
            extraField.classList.remove('hidden');
            labelUtama.innerText = 'Nama Tugboat';
        } else {
            extraField.classList.add('hidden');
            labelUtama.innerText = 'Nama Kapal';
        }
    }

    function toggleLainnya() {
        const kegiatan = document.getElementById('rencana_kegiatan').value;
        const detailField = document.getElementById('group_lainnya');

        if (kegiatan === 'Lain-lain') {
            detailField.classList.remove('hidden');
        } else {
            detailField.classList.add('hidden');
        }
    }
</script>
@endpush