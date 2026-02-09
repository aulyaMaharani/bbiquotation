<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Bosowa Bandar Indonesia</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;800&family=Sora:wght@300;400;600;800&display=swap" rel="stylesheet">
    <style>
        /* =========================================
             1. GLOBAL LAYOUT & NAVBAR (KODE ASLIMU)
           ========================================= */
        body { 
            font-family: 'Sora', sans-serif; 
            background-color: #05192d; 
            margin: 0; color: white;
            display: flex; flex-direction: column; min-height: 100vh;
        }

        .navbar {
            background: rgba(26, 58, 95, 0.4);
            padding: 15px 80px;
            display: flex; justify-content: space-between; align-items: center;
            backdrop-filter: blur(10px); border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .navbar img { height: 42px; background: white; border-radius: 50%; padding: 4px; }

        .btn-nav {
            background: rgba(255, 255, 255, 0.2);
            color: white; padding: 10px 24px; border-radius: 6px;
            text-decoration: none; font-size: 14px; font-weight: 600;
            border: 1px solid rgba(255, 255, 255, 0.3); transition: 0.3s;
        }
        .btn-nav:hover { background: rgba(255, 255, 255, 0.3); border-color: white; }

        main {
            flex: 1; display: flex; flex-direction: column;
            align-items: center; justify-content: center; 
            text-align: center; padding: 60px 20px;
        }

        /* =========================================
             2. LANDING PAGE & FITUR (KODE ASLIMU)
           ========================================= */
        .hero-title { font-size: 52px; font-weight: 800; text-transform: uppercase; margin-bottom: 15px; letter-spacing: 1px; }
        .hero-title span { color: #8bb4f3; }
        .hero-subtitle { font-size: 16px; color: #cbd5e0; max-width: 850px; line-height: 1.8; margin: 0 auto 50px auto; }

        .btn-ajukan {
            background: #8bb4f3; color: white !important;
            padding: 18px 45px; border-radius: 12px;
            font-weight: 800; font-size: 26px; text-decoration: none;
            display: inline-block; box-shadow: 0 4px 20px rgba(139, 180, 243, 0.3);
            margin-bottom: 100px; transition: 0.3s;
        }

        .features-grid {
            display: grid; grid-template-columns: repeat(3, 1fr);
            gap: 25px; max-width: 1100px; width: 100%; margin-bottom: 80px;
        }

        .feature-box {
            background: rgba(26, 58, 95, 0.4); padding: 40px 30px;
            border-radius: 15px; text-align: left; border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .feature-box .icon { font-size: 55px; margin-bottom: 25px; display: block; line-height: 1; }

        .steps-card {
            background: rgba(255, 255, 255, 0.07); max-width: 800px;
            width: 100%; padding: 60px; border-radius: 20px; text-align: left;
        }

        .step-item { display: flex; align-items: flex-start; margin-bottom: 35px; }

        .step-num {
            background: #8bb4f3; color: #05192d; 
            width: 55px; height: 55px;
            border-radius: 50%; display: flex; align-items: center; justify-content: center;
            font-weight: 800; margin-right: 25px; flex-shrink: 0; 
            font-size: 22px;
        }

        .step-emoji { font-size: 26px; vertical-align: middle; margin-left: 5px; }

        /* =========================================
             3. FORM & LOGIN (KODE ASLIMU)
           ========================================= */
        .login-wrapper {
            display: flex; flex-direction: column; align-items: center;
            width: 100%; max-width: 450px;
        }

        .login-logo-circle {
            width: 180px; height: 180px;
            background: white; border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            margin-bottom: 30px; box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }
        .login-logo-circle img { width: 140px; }

        .form-card, .login-card { 
            background: white; color: #333; 
            width: 100%; margin: 20px auto; 
            padding: 50px; border-radius: 28px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.6); text-align: center;
            box-sizing: border-box;
        }

        .form-card { max-width: 750px; }

        .form-group-login, .form-group { text-align: left; margin-bottom: 22px; width: 100%; }
        .form-group-login label, .form-group label { 
            display: block; font-weight: 700; margin-bottom: 10px; 
            font-size: 15px; color: #333; 
        }
        
        .form-group-login input, .form-group input, .form-group select, .form-group textarea { 
            width: 100%; padding: 14px 18px; border: 1px solid #d1d5db; 
            border-radius: 12px; box-sizing: border-box; font-family: 'Poppins', sans-serif;
            background-color: #ffffff; font-size: 14px; color: #333;
        }

        .btn-submit, .btn-login-submit, .btn-login-back {
            width: 100%; padding: 16px; border-radius: 15px; 
            font-weight: 800; font-size: 16px; border: none;
            cursor: pointer; transition: 0.3s; display: block;
            box-sizing: border-box; text-align: center; text-decoration: none;
        }

        .btn-submit, .btn-login-submit {
            background: #8bb4f3; color: #1a3a5f !important;
            box-shadow: 0 4px 15px rgba(139, 180, 243, 0.4);
            margin-bottom: 15px;
        }

        .btn-login-back { background: #ffffff; color: #4a5568; border: 1px solid #e2e8f0; }

        /* =========================================
             4. DASHBOARD FIX (UPDATE NAVBAR SAJA BIAR GA TIMPA)
           ========================================= */
        body.bg-white { background-color: #f4f7f6 !important; color: #333 !important; }
        body.bg-white main { justify-content: flex-start !important; padding: 40px 60px !important; text-align: left !important; }

        /* Navbar Navy Dashboard - MIRIP 100% GAMBAR TARGET */
        body.bg-white .navbar { 
            background: #0d2745 !important; 
            padding: 12px 60px !important; 
            height: 75px !important; 
            backdrop-filter: none; 
            display: flex !important;
            align-items: center !important;
            justify-content: space-between !important;
        }

        /* Logo Navbar Dashboard */
        body.bg-white .navbar img { 
            height: 48px !important; 
            width: 48px !important; 
            background: white !important; 
            padding: 5px !important; 
            border-radius: 50% !important;
        }

        /* Teks Dashboard Internal */
        .nav-brand-text { 
            color: white !important; 
            font-weight: 800; 
            font-size: 22px; 
            margin-left: 15px; 
        }

        /* Tombol Keluar Dashboard (Merah Oranye) */
        .btn-exit-bbi {
            background-color: #f15a42 !important; 
            color: white !important; 
            padding: 10px 25px !important; 
            border-radius: 10px !important;
            border: none; cursor: pointer; font-weight: 700; font-size: 14px;
            display: flex; align-items: center; gap: 10px;
        }

        /* --- DASHBOARD CONTENT (KODE ASLI KAMU YANG SUDAH BENAR) --- */
        .dash-content { width: 100% !important; max-width: 1400px !important; margin: 0 auto !important; text-align: left !important; }

        body.bg-white .card-white {
            background: white !important;
            padding: 30px 40px !important;
            border-radius: 15px !important;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05) !important;
            border: 1px solid #e1e8ed !important;
            margin-bottom: 30px !important;
        }

        /* Tata letak form filter aslimu yang GA TIMPA */
        body.bg-white .card-white form {
            display: flex !important;
            flex-direction: row !important;
            align-items: flex-end !important;
            gap: 25px !important;
            width: 100% !important;
        }

        /* Memastikan input tidak berubah lebarnya agar GA TIMPA */
        body.bg-white .card-white input, 
        body.bg-white .card-white select {
            width: 100% !important;
            box-sizing: border-box !important;
        }

        /* Header Tabel Navy HARUS LEBAR 100% */
        .bbi-table { width: 100% !important; border-collapse: collapse !important; table-layout: auto !important; }
        
        .bbi-table th { 
            background: #1a3a5f !important; color: white !important; 
            padding: 18px 10px !important; font-size: 11px !important; text-transform: uppercase !important;
        }

        /* --- PERBAIKAN: AGAR BULAN & TAHUN GAK KEPOTONG --- */
        body.bg-white .card-white form div:nth-child(2),
        body.bg-white .card-white form div:nth-child(3) { 
            min-width: 180px !important; /* Memberikan ruang kaku agar teks terbaca */
            flex: 0 0 auto !important; 
        }
        
        body.bg-white .card-white form div:nth-child(1) { 
            flex: 1 1 auto !important; /* Kolom perusahaan menyesuaikan sisa ruang */
        }

        /* =========================================
             5. ANIMASI HALUS (NEW & STABIL)
           ========================================= */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .form-card, .card-white, .bbi-table, .hero-title, .features-grid, .steps-card {
            animation: fadeInUp 0.8s ease-out forwards;
        }

        .bbi-table tr:hover {
            background-color: rgba(139, 180, 243, 0.08) !important;
            transition: 0.3s;
        }

        .btn-submit, .btn-exit-bbi, .btn-nav, button[type="submit"], .btn-ajukan {
            transition: transform 0.2s, box-shadow 0.2s !important;
        }

        .btn-submit:hover, .btn-exit-bbi:hover, .btn-nav:hover, .btn-ajukan:hover {
            transform: translateY(-3px) !important;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15) !important;
        }

        /* =========================================
             6. EFEK MELAYANG PADA KOTAK FITUR (HOVER LIFT)
           ========================================= */
        .feature-box, .steps-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease !important;
        }

        .feature-box:hover, .steps-card:hover {
            transform: translateY(-10px) !important; /* Efek naik sedikit */
            box-shadow: 0 15px 35px rgba(0,0,0,0.2) !important;
        }

        /* =========================================
             7. LOGO WATERMARK BACKGROUND (LEBIH GEDE & SAMAR)
           ========================================= */
        body::before {
            content: "";
            position: fixed;
            top: 50%;
            left: 50%;
            width: 1200px; /* Ukuran diperbesar sesuai permintaanmu */
            height: 800px;
            background-image: url("{{ asset('images/logo-BBA-putih.png') }}");
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            transform: translate(-50%, -50%);
            opacity: 0.03; /* Dibuat lebih samar lagi agar tidak ganggu teks */
            z-index: -1;
            pointer-events: none;
        }

        /* =========================================
             8. PERBAIKAN LOGO HALAMAN LOGIN (KECIL & PAS)
           ========================================= */
        .login-wrapper h1 { 
            font-size: 50px !important; /* Ukuran teks logo jadi proporsional */
            margin-bottom: 5px !important;
        }

        .login-wrapper h2 { 
            font-size: 30px !important; 
            margin-top: 0 !important;
        }

        /* Mengecilkan Gambar Logo di halaman login */
        .login-wrapper img {
            max-width: 320px !important; /* Ukuran manis tidak menutupi layar */
            height: auto !important;
            margin-bottom: 20px !important;
        }

        footer { 
            padding: 30px; text-align: center; background: #03111f; 
            font-size: 15px; font-weight: 600; border-top: 1px solid rgba(255, 255, 255, 0.05);
            margin-top: auto; color: white;
        }
    </style>
</head>
<body class="@yield('body-class')">
    <nav class="navbar">
        <div style="display: flex; align-items: center;">
            <img src="{{ asset('images/logo-bosowa.png') }}" alt="Logo Bosowa">
            @if(View::hasSection('title') && View::getSection('title') == 'Dashboard Internal')
                <span class="nav-brand-text">Dashboard Internal</span>
            @endif
        </div>
        @yield('nav-action')
    </nav>
    <main>@yield('content')</main>
    <footer>© 2026 Bosowa Bandar Indonesia. All rights reserved.</footer>
    @stack('scripts')
</body>
</html>