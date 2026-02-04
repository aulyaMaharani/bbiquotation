<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Bosowa Bandar Indonesia</title>
    <style>
        /* CSS GLOBAL (SESUAI GAMBAR) */
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            background-color: #05192d; /* Biru gelap pekat sesuai gambar */
            margin: 0; 
            color: white;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* NAVBAR */
        .navbar {
            background: rgba(26, 58, 95, 0.4); /* Transparan blur */
            padding: 15px 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            backdrop-filter: blur(10px);
        }
        .navbar img { height: 45px; background: white; border-radius: 50%; padding: 2px; }

        /* BUTTONS */
        .btn-nav {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            padding: 20px 30px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 30px;
            border: 1px solid rgba(255,255,255,0.3);
        }

        .btn-main {
            background: #8bb4f3; /* Biru muda tombol utama */
            color: #FFFF;
            padding: 15px 45px;
            border-radius: 10px;
            font-weight: bold;
            font-size: 24px;
            text-decoration: none;
            display: inline-block;
            transition: 0.3s;
        }

        /* LANDING PAGE ELEMENTS */
        .container { flex: 1; padding: 60px 20px; text-align: center; }
        .hero-title { font-size: 42px; font-weight: 800; letter-spacing: 2px; margin-bottom: 10px; text-transform: uppercase; }
        .hero-title span { color: #8bb4f3; opacity: 0.9; }
        .hero-subtitle { font-size: 16px; color: #cbd5e0; max-width: 800px; margin: 0 auto 50px auto; line-height: 1.6; }

        /* GRID FEATURES */
        .features-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; max-width: 1000px; margin: 60px auto; }
        .feature-box { background: rgba(255, 255, 255, 0.1); padding: 35px; border-radius: 15px; text-align: left; }
        .feature-box h3 { margin: 15px 0 10px 0; font-size: 18px; }
        .feature-box p { font-size: 13px; color: #cbd5e0; margin: 0; line-height: 1.5; }

        /* CARA MENGAJUKAN SECTION */
        .steps-card { background: rgba(255,255,255,0.08); max-width: 750px; margin: 50px auto; padding: 50px; border-radius: 20px; text-align: left; }
        .step-item { display: flex; align-items: flex-start; margin-bottom: 30px; }
        .step-num { background: #8bb4f3; color: #05192d; width: 35px; height: 35px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; margin-right: 25px; flex-shrink: 0; }

        /* FORM CARD ELEMENTS */
        .form-card { 
            background: white; color: #333; width: 95%; max-width: 500px; 
            margin: 0 auto; padding: 45px; border-radius: 20px; 
            box-shadow: 0 20px 40px rgba(0,0,0,0.5); position: relative;
        }
        .form-group { text-align: left; margin-bottom: 18px; }
        label { display: block; font-weight: 600; font-size: 14px; margin-bottom: 8px; color: #444; }
        input, select { width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 8px; box-sizing: border-box; font-size: 14px; }

        /* ANIMASI PULSE LOGO */
        #loading {
            display: none; position: absolute; top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(255,255,255,0.9); z-index: 100; justify-content: center; align-items: center; flex-direction: column; border-radius: 20px;
        }
        .pulse-logo { width: 90px; animation: pulse-anim 1.5s infinite ease-in-out; }
        @keyframes pulse-anim { 0%, 100% { transform: scale(0.9); } 50% { transform: scale(1.1); } }

        /* FOOTER */
        footer { padding: 30px; text-align: center; background: #03111f; font-size: 14px; border-top: 1px solid rgba(255,255,255,0.05); }
    </style>
</head>
<body>
    <nav class="navbar">
        <img src="{{ asset('images/logo-bosowa.png') }}" alt="Logo">
        @yield('nav-action')
    </nav>

    <main class="container">
        @yield('content')
    </main>

    <footer>
        © 2026 Bosowa Bandar Indonesia. All rights reserved.
    </footer>

    @stack('scripts')
</body>
</html>