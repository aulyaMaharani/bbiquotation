<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Bosowa Bandar Indonesia</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;800&display=swap" rel="stylesheet">
    <style>
        /* --- CSS GLOBAL & LAYOUT --- */
        body { 
            font-family: 'SORA', sans-serif; 
            background-color: #05192d; 
            margin: 0; 
            color: white;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* NAVBAR */
        .navbar {
            background: rgba(26, 58, 95, 0.4);
            padding: 15px 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            backdrop-filter: blur(10px);
            border-bottom: 2px solid #0d2745;
        }
        .navbar img { height: 45px; background: white; border-radius: 50%; padding: 2px; }

        /* BUTTONS */
        .btn-nav {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 15px;
            font-weight: 600;
            border: 1px solid rgba(255,255,255,0.3);
            transition: 0.3s;
        }
        .btn-nav:hover { background: rgba(255,255,255,0.3); }

        .btn-main, .btn-submit {
            background: #8bb4f3;
            color: #FFFF;
            padding: 15px 45px;
            border-radius: 12px;
            font-weight: bold;
            font-size: 20px;
            text-decoration: none;
            display: inline-block;
            border: none;
            cursor: pointer;
            transition: 0.3s;
            width: auto;
        }
        .btn-main:hover, .btn-submit:hover { background-color: #7aa3e2; transform: translateY(-3px); }

        /* CONTAINER */
        .container { flex: 1; padding: 60px 20px; text-align: center; }

        /* --- LANDING PAGE ELEMENTS --- */
        .hero-title { font-size: 42px; font-weight: 800; letter-spacing: 2px; margin-bottom: 10px; text-transform: uppercase; }
        .hero-title span { color: #8bb4f3; opacity: 0.9; }
        .hero-subtitle { font-size: 16px; color: #cbd5e0; max-width: 800px; margin: 0 auto 50px auto; line-height: 1.6; }

        .features-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; max-width: 1000px; margin: 60px auto; }
        .feature-box { background: rgba(255, 255, 255, 0.1); padding: 35px; border-radius: 15px; text-align: left; }
        .feature-box h3 { margin: 15px 0 10px 0; font-size: 18px; }
        .feature-box p { font-size: 13px; color: #cbd5e0; margin: 0; line-height: 1.5; }

        .steps-card { background: rgba(255,255,255,0.08); max-width: 750px; margin: 50px auto; padding: 50px; border-radius: 20px; text-align: left; }
        .step-item { display: flex; align-items: flex-start; margin-bottom: 30px; }
        .step-num { background: #8bb4f3; color: #05192d; width: 35px; height: 35px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; margin-right: 25px; flex-shrink: 0; }

        /* --- FORM CARD ELEMENTS --- */
        .form-card { 
            background: white; color: #333; width: 95%; max-width: 880px; 
            margin: 0 auto; padding: 60px; border-radius: 25px; 
            box-shadow: 0 20px 50px rgba(0,0,0,0.5); position: relative;
        }
        .form-card h2 { color: #1a3a5f; margin: 0; font-size: 32px; font-weight: 800; }
        .form-card p.subtitle { color: #666; font-size: 15px; text-align: center; margin-bottom: 45px; }

        .form-group { text-align: left; margin-bottom: 25px; }
        label { display: block; font-weight: bold; font-size: 17px; margin-bottom: 10px; color: #333; }
        input, select, textarea { 
            width: 100%; padding: 16px; border: 1px solid #ccc; border-radius: 10px; 
            box-sizing: border-box; background: #fdfdfd; font-size: 18px; font-family: 'Poppins', sans-serif; 
        }

        /* ANIMASI LOADING */
        #loading {
            display: none; position: absolute; top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(255,255,255,0.9); z-index: 100; justify-content: center; align-items: center; flex-direction: column; border-radius: 25px;
        }
        .pulse-logo { width: 120px; animation: pulse-anim 1.5s infinite ease-in-out; }
        @keyframes pulse-anim { 0%, 100% { transform: scale(0.9); } 50% { transform: scale(1.1); } }

        /* FOOTER & MISC */
        footer { padding: 30px; text-align: center; background: #03111f; font-size: 14px; border-top: 1px solid rgba(255,255,255,0.05); }
        .hidden { display: none; }

.container-login {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 40px 20px;
}

/* Kartu putih ini yang akan membatasi lebar kolom email */
.login-card {
    background: white;
    color: #333;
    width: 100%;
    max-width: 450px; /* Membatasi agar tidak terlalu lebar */
    padding: 40px;
    border-radius: 20px;
    box-shadow: 0 15px 35px rgba(0,0,0,0.3);
    text-align: left;
    box-sizing: border-box;
}

.form-group-login {
    margin-bottom: 25px;
}

.form-group-login label {
    display: block;
    font-weight: 600;
    font-size: 16px;
    margin-bottom: 8px;
    color: #333;
}

/* Tombol Masuk Biru */
.btn-login-submit {
    background: #8bb4f3;
    color: #0d2745;
    width: 100%;
    padding: 15px;
    border: none;
    border-radius: 8px;
    font-weight: bold;
    font-size: 18px;
    cursor: pointer;
    margin-bottom: 15px;
    transition: 0.3s;
}

/* Tombol Kembali Putih */
.btn-login-back {
    background: white;
    color: #333;
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 8px;
    text-decoration: none;
    display: inline-block;
    text-align: center;
    font-size: 16px;
    box-sizing: border-box;
    transition: 0.3s;
}



/* --- CSS GLOBAL --- */
body { 
    font-family: 'Sora', sans-serif; 
    margin: 0; 
    display: flex; 
    flex-direction: column; 
    min-height: 100vh; 
}

/* Background dinamis: Default Biru Tua, kecuali diatur lain */
body.bg-dark { background-color: #05192d; color: white; }
body.bg-white { background-color: #ffffff; color: #333; }


/* NAVBAR DASHBOARD */
.navbar-dash {
    background: #05192d; 
    background-color: #0A2647 !important;
    padding: 15px 60px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    color: white;
    border: none !important;
    /* GANTI BARIS DI BAWAH INI MENJADI NONE */
    box-shadow: none !important; 
}


.navbar-dash img { height: 45px; background: white; border-radius: 50%; padding: 2px; }

/* --- KONTAINER TERPISAH DENGAN DROP SHADOW --- */
.dash-content { padding: 40px 60px; }

.card-white {
    background: white;
    border-radius: 15px;
    padding: 30px;
    margin-bottom: 30px; /* Jarak antar kontainer */
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); /* Drop Shadow agar terlihat kontainer */
}

/* TABEL HEADER BIRU TUA */
.table-header { background-color: #1a3a5f; color: white; }
.bbi-table { width: 100%; border-collapse: collapse; }
.bbi-table th, .bbi-table td { padding: 15px; border: 1px solid #edf2f7; text-align: center; }

/* TOMBOL KELUAR PROFESIONAL (Gbr 16) */
.btn-exit-bbi {
    background-color: #ff0000; /* Merah terang Gbr 16 */
    color: white;
    border: none;
    padding: 10px 25px;
    border-radius: 10px;
    font-weight: bold;
    display: flex;
    align-items: center;
    gap: 4px;
    cursor: pointer;
    font-family: 'Sora', sans-serif;
    transition: 0.3s;
}

.btn-exit-bbi:hover {
    background-color: #e04a4a;
    transform: scale(1.02);
}

    </style>
</head>





<body>
    <nav class="navbar-dash">
        <img src="{{ asset('images/logo-bosowa.png') }}" alt="Logo Bosowa">
        @yield('nav-action')
    </nav>

    <main class="dash-content">
        @yield('content')
    </main>

    <footer>
        © 2026 Bosowa Bandar Indonesia. All rights reserved.
    </footer>
</body>
</html>