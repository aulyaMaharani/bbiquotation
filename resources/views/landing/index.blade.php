@extends('layouts.main')

@section('title', 'Sistem Manajemen Quotation')

@section('content')

<!-- NAVBAR -->
<nav class="navbar">
    <div class="nav-left">
        <img src="https://via.placeholder.com/40" alt="Logo">
    </div>
    <div class="nav-right">
        <a href="#" class="btn-login">Login Internal</a>
    </div>
</nav>

<!-- HERO -->
<section class="hero">
    <h1>
        SISTEM MANAJEMEN <span>QUOTATION</span>
    </h1>

    <p>
        Selamat datang di portal quotation Bosowa Bandar Indonesia.
        Ajukan permintaan penawaran Anda dengan mudah dan cepat melalui sistem kami yang terintegrasi.
    </p>

    <a href="#" class="btn-cta">Ajukan Quotation</a>

    <!-- FEATURE CARDS -->
    <div class="feature-wrapper">
        <div class="feature-card">
            <div class="icon">📄</div>
            <h3>Mudah dan Cepat</h3>
            <p>
                Proses pengajuan quotation yang sederhana dan efisien
                dengan formulir yang user-friendly.
            </p>
        </div>

        <div class="feature-card">
            <div class="icon">🛡️</div>
            <h3>Aman dan Terpercaya</h3>
            <p>
                Data Anda tersimpan dengan aman dan diproses oleh
                tim profesional kami.
            </p>
        </div>

        <div class="feature-card">
            <div class="icon">⏱️</div>
            <h3>Respon Cepat</h3>
            <p>
                Tim kami akan segera memproses permintaan quotation
                Anda secara profesional.
            </p>
        </div>
    </div>

    <!-- STEPS -->
    <div class="steps-box">
        <h2>Cara Mengajukan Quotation</h2>

        <div class="step">
            <div class="step-number">1</div>
            <div>
                <strong>Isi Formulir</strong>
                <p>Lengkapi formulir pengajuan quotation sesuai informasi perusahaan.</p>
            </div>
        </div>

        <div class="step">
            <div class="step-number">2</div>
            <div>
                <strong>Kirim Permintaan</strong>
                <p>Klik tombol simpan dan permintaan Anda langsung terkirim.</p>
            </div>
        </div>

        <div class="step">
            <div class="step-number">3</div>
            <div>
                <strong>Tunggu Konfirmasi</strong>
                <p>Tim kami akan menghubungi Anda dengan penawaran terbaik.</p>
            </div>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer>
    © 2026 Bosowa Bandar Indonesia. All rights reserved.
</footer>

@endsection