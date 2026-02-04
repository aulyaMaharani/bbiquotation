@extends('layouts.main')

@section('title', 'Landing Page')

@section('nav-action')
    <a href="#" class="btn-login">Login Internal</a>
@endsection

@section('content')
    <h1 class="hero-title">SISTEM MANAJEMEN <span>QUOTATION</span></h1>
    <p class="hero-subtitle">
        Selamat datang di portal quotation Bosowa Bandar Indonesia. Ajukan permintaan penawaran Anda dengan mudah dan cepat melalui sistem kami yang terintegrasi.
    </p>

    <a href="/quotation" class="btn-main">Ajukan Quotation</a>

    <div class="features-grid">
        <div class="feature-box">
            <div class="icon">📄</div>
            <h3>Mudah dan Cepat</h3>
            <p>Proses pengajuan quotation yang sederhana dan efisien dengan formulir yang user-friendly.</p>
        </div>
        <div class="feature-box">
            <div class="icon">🛡️</div>
            <h3>Aman dan Terpercaya</h3>
            <p>Data Anda tersimpan dengan aman dan diproses oleh tim profesional kami.</p>
        </div>
        <div class="feature-box">
            <div class="icon">🕒</div>
            <h3>Respon Cepat</h3>
            <p>Tim kami akan segera memproses permintaan quotation Anda secara profesional.</p>
        </div>
    </div>

    <div class="steps-card">
        <h3 style="text-align: center; margin-bottom: 30px;">Cara Mengajukan Quotation</h3>
        <div class="step-item">
            <span class="step-num">1</span>
            <div><strong>Isi Formulir</strong><p style="margin: 5px 0; font-size: 14px; color: #cbd5e0;">Lengkapi formulir pengajuan dengan informasi perusahaan dan kebutuhan Anda.</p></div>
        </div>
        <div class="step-item">
            <span class="step-num">2</span>
            <div><strong>Kirim Permintaan</strong><p style="margin: 5px 0; font-size: 14px; color: #cbd5e0;">Klik tombol simpan dan permintaan Anda akan langsung terkirim ke tim kami.</p></div>
        </div>
        <div class="step-item">
            <span class="step-num">3</span>
            <div><strong>Tunggu Konfirmasi</strong><p style="margin: 5px 0; font-size: 14px; color: #cbd5e0;">Tim kami akan segera menghubungi Anda dengan penawaran terbaik.</p></div>
        </div>
    </div>
@endsection