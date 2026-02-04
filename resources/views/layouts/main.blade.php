<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Bosowa Bandar Indonesia</title>
    <style>
        /* --- CSS GLOBAL & LAYOUT --- */
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            background-color: #0d2745; 
            margin: 0; 
            color: white;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .navbar {
            background: rgba(26, 58, 95, 0.8);
            padding: 15px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            backdrop-filter: blur(10px);
        }

        .container { flex: 1; padding: 50px 20px; }

        /* --- DESIGN LANDING PAGE (Gbr 7) --- */
        .hero-section { text-align: center; max-width: 900px; margin: 0 auto; }
        .hero-title { font-size: 3.5rem; font-weight: 800; letter-spacing: 2px; margin-bottom: 10px; }
        .hero-title span { color: #8bb4f3; }
        .hero-subtitle { font-size: 1.2rem; color: #d1d1d1; margin-bottom: 40px; }

        .btn-main {
            background: #8bb4f3; color: #0d2745; padding: 15px 40px;
            border-radius: 10px; font-weight: bold; font-size: 1.5rem;
            text-decoration: none; transition: 0.3s; display: inline-block;
        }
        .btn-main:hover { transform: scale(1.05); background: #7aa3e2; }

        .features-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-top: 60px; }
        .feature-box { background: rgba(255, 255, 255, 0.1); padding: 30px; border-radius: 15px; text-align: left; }
        .feature-box h3 { margin-top: 15px; color: white; }

        /* --- DESIGN FORM QUOTATION (Gbr 8) --- */
        .form-card {
            background: white; color: #333; width: 95%; max-width: 800px;
            margin: 0 auto; padding: 50px; border-radius: 20px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.5); position: relative;
        }
        .form-card h2 { color: #1a3a5f; text-align: center; margin-bottom: 10px; }
        .form-card p { text-align: center; color: #666; font-size: 0.9rem; margin-bottom: 30px; }

        .form-group { margin-bottom: 20px; }
        label { display: block; font-weight: bold; margin-bottom: 8px; color: #444; }
        input, select {
            width: 100%; padding: 12px; border: 1px solid #ddd;
            border-radius: 8px; font-size: 1rem; box-sizing: border-box;
        }
        input:focus { border-color: #8bb4f3; outline: none; box-shadow: 0 0 8px rgba(139, 180, 243, 0.5); }

        /* --- FOOTER --- */
        footer { background: #081a2e; text-align: center; padding: 20px; font-size: 0.9rem; border-top: 1px solid rgba(255,255,255,0.1); }

        /* --- ANIMASI LOADING --- */
        #loader {
            display: none; position: absolute; top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(255,255,255,0.9); border-radius: 20px; z-index: 10;
            justify-content: center; align-items: center; flex-direction: column;
        }
        .pulse-logo { width: 100px; animation: pulse 1.5s infinite; }
        @keyframes pulse { 0% { transform: scale(0.9); } 50% { transform: scale(1.1); } 100% { transform: scale(0.9); } }
    </style>
</head>
<body>
    <nav class="navbar">
        <img src="{{ asset('images/logo-bosowa.png') }}" style="height: 45px;">
        @yield('nav-button')
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <footer>
        © 2026 Bosowa Bandar Indonesia. All rights reserved.
    </footer>

    @yield('scripts')
</body>
</html>