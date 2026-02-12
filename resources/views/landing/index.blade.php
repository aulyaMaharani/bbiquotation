@extends('layouts.main')

@section('title', 'Sistem Manajemen Quotation')

@section('logo', asset('images/logo-BBA-putih.png'))

@section('nav-action')
    <a href="{{ route('login') }}" class="btn-nav">Login Admin</a>
@endsection

@section('content')
    {{-- Alert Sukses (Kode Asli 100% Tetap Ada) --}}
    @if(session('success'))
    <div id="success-alert" style="position: fixed; top: 20px; left: 50%; transform: translateX(-50%); z-index: 9999; width: 90%; max-width: 500px;">
        <div style="background-color: #28a745; color: white; padding: 15px 20px; border-radius: 10px; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 4px 15px rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.2);">
            <div style="display: flex; align-items: center;">
                <span style="margin-right: 12px; font-size: 20px;">✅</span>
                <span style="font-weight: 500;">{{ session('success') }}</span>
            </div>
            <button onclick="document.getElementById('success-alert').remove()" style="background: none; border: none; color: white; font-size: 20px; cursor: pointer;">&times;</button>
        </div>
    </div>

    <script>
        setTimeout(function() {
            var el = document.getElementById('success-alert');
            if(el) {
                el.style.transition = "opacity 0.5s ease";
                el.style.opacity = "0";
                setTimeout(() => el.remove(), 500);
            }
        }, 4000);
    </script>
    @endif

    {{-- Judul dan Subtitle (Gunakan Class Agar Responsif Sesuai CSS Baru) --}}
    <h1 class="hero-title">SISTEM MANAJEMEN <span>QUOTATION</span></h1>
    <p class="hero-subtitle">
        Selamat datang di portal Quotation Bosowa Bandar Indonesia. Ajukan permintaan penawaran Anda dengan mudah dan cepat melalui sistem kami yang terintegrasi.
    </p>

    {{-- Tombol Utama --}}
    <div style="margin-bottom: 60px;">
        <a href="/quotation" class="btn-ajukan">Ajukan Quotation</a>
    </div>

    {{-- Grid Fitur (Tetap 3 Kolom di Laptop, Otomatis 1 Kolom di HP Berkat CSS Bagian 11) --}}
    <div class="features-grid">
        <div class="feature-box">
            <span class="icon">📄</span>
            <h3>Mudah dan Cepat</h3>
            <p>Proses pengajuan quotation yang sederhana dan efisien dengan formulir yang user-friendly.</p>
        </div>

        <div class="feature-box">
            <span class="icon">🛡️</span>
            <h3>Aman dan Terpercaya</h3>
            <p>Data Anda tersimpan dengan aman dan diproses oleh tim profesional kami.</p>
        </div>

        <div class="feature-box">
            <span class="icon">🕒</span>
            <h3>Respon Cepat</h3>
            <p>Tim kami akan segera memproses permintaan quotation Anda dengan profesional.</p>
        </div>
    </div>

    {{-- Kartu Langkah-langkah (Sudah Responsif Berkat Kontainer Steps-Card Baru) --}}
    <div class="steps-card">
        <h2 style="text-align: center; margin-bottom: 40px; color: #8bb4f3; font-weight: 800;">Cara Mengajukan Quotation</h2>
        
        <div class="step-item">
            <span class="step-num">1</span>
            <div>
                <strong>Isi Formulir 📝</strong>
                <p>Lengkapi formulir pengajuan quotation dengan informasi perusahaan dan kebutuhan Anda.</p>
            </div>
        </div>

        <div class="step-item">
            <span class="step-num">2</span>
            <div>
                <strong>Kirim Permintaan 🚀</strong>
                <p>Klik tombol simpan dan permintaan Anda akan langsung terkirim ke tim kami.</p>
            </div>
        </div>

        <div class="step-item">
            <span class="step-num">3</span>
            <div>
                <strong>Tunggu Konfirmasi ✅</strong>
                <p>Tim kami akan segera memproses dan menghubungi Anda dengan penawaran terbaik.</p>
            </div>
        </div>
    </div>
@endsection