<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bosowa Bandar Indonesia - Quotation</title>
    <style>
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            background-color: #0d2745; 
            margin: 0; 
            display: flex; 
            flex-direction: column; 
            min-height: 100vh; 
        }
        
        .header { 
            background: #1a3a5f; 
            padding: 15px 50px; 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            border-bottom: 2px solid #0d2745; 
        }

        .container { 
            display: flex; 
            justify-content: center; 
            padding: 80px 20px; /* Padding atas-bawah diperbesar agar terlihat megah */
            flex: 1; 
        }

        /* UKURAN FORM DIPERBESAR MENJADI 1000PX */
        .form-card { 
            background: white; 
            width: 95%; 
            max-width: 880px; /* Lebar maksimal sekarang 1000px */
            padding: 60px;     /* Ruang dalam sangat lega */
            border-radius: 25px; 
            box-shadow: 0 20px 50px rgba(0,0,0,0.5); 
        }

        .logo-container {
            text-align: center;
            margin-bottom: 40px;
        }

        .logo-container img {
            width: 200px; /* Logo sedikit diperbesar menyesuaikan card */
            height: auto;
        }

        h2 { color: #1a3a5f; text-align: center; margin: 0; font-size: 32px; font-weight: 800; }
        p.subtitle { color: #666; font-size: 15px; text-align: center; margin-bottom: 45px; }

        .form-group { margin-bottom: 25px; }
        label { display: block; font-size: 17px; font-weight: bold; color: #333; margin-bottom: 10px; }

        /* INPUT DAN SELECT DIPERBESAR AGAR SEIMBANG */
        input, select { 
            width: 100%; 
            padding: 16px; 
            border: 1px solid #ccc; 
            border-radius: 10px; 
            box-sizing: border-box; 
            background: #fdfdfd; 
            font-size: 18px; /* Font input diperbesar */
            transition: border-color 0.3s;
        }

        input:focus, select:focus {
            outline: none;
            border-color: #8bb4f3;
            box-shadow: 0 0 8px rgba(139, 180, 243, 0.4);
        }

        .btn-submit { 
            width: 100%; 
            background-color: #8bb4f3; 
            color: #0d2745; 
            border: none; 
            padding: 20px; 
            border-radius: 12px; 
            font-weight: bold; 
            font-size: 20px; 
            margin-top: 30px; 
            cursor: pointer; 
            transition: all 0.3s; 
            box-shadow: 0 6px 15px rgba(139, 180, 243, 0.3);
        }

        .btn-submit:hover { 
            background-color: #7aa3e2; 
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(139, 180, 243, 0.5);
        }

        .footer { background: #1a3a5f; color: white; text-align: center; padding: 25px; font-size: 13px; }
        .btn-kembali { text-decoration: none; background: #8e9aaf; color: white; padding: 10px 25px; border-radius: 8px; font-size: 15px; transition: 0.3s; font-weight: 600; }
        .btn-kembali:hover { background: #768396; }
    </style>
</head>
<body>

<div class="header">
    <div style="color: white; font-weight: bold; font-size: 24px; letter-spacing: 2px;">BOSOWA</div>
    <a href="#" class="btn-kembali">Kembali</a>
</div>

<div class="container">
    <div class="form-card">
        <div class="logo-container">
            <img src="{{ asset('images/logo-bosowa.png') }}" alt="Logo Bosowa">
        </div>

        <h2>Formulir Pengajuan Quotation</h2>
        <p class="subtitle">Silahkan lengkapi formulir di bawah ini untuk mengajukan permintaan quotation</p>

        <form action="/submit-quotation" method="POST">
            @csrf
            <div class="form-group">
                <label>Nama Perusahaan</label>
                <input type="text" name="perusahaan" placeholder="Masukkan nama perusahaan lengkap" required>
            </div>

            <div class="form-group">
                <label>Nama PIC</label>
                <input type="text" name="pic" placeholder="Masukkan nama lengkap penanggung jawab" required>
            </div>

            <div class="form-group">
                <label>WhatsApp PIC</label>
                <input type="text" name="whatsapp" placeholder="Contoh: 081234567890" required>
            </div>

            <div class="form-group">
                <label>Jenis Kapal</label>
                <select name="jenis_kapal">
                    <option value="">Pilih jenis kapal</option>
                    <option value="General Cargo">1. General cargo</option>
                    <option value="Tugboat/Barge">2. Tugboat/barge</option>
                    <option value="Mother Tanker">3. Mother tanker (MT)</option>
                    <option value="TBN">4. TBN</option>
                </select>
            </div>

            <div class="form-group">
                <label>Nama Kapal</label>
                <input type="text" name="nama_kapal" placeholder="Masukkan nama kapal Anda">
            </div>

            <div class="form-group">
                <label>Gt (Gross Tonnage)</label>
                <select name="gt">
                    <option value="">Pilih GT</option>
                    <option value="Tugboat">1. Tugboat</option>
                    <option value="Cargo">2. Cargo</option>
                </select>
            </div>

            <div class="form-group">
                <label>Pelabuhan Tujuan</label>
                <input type="text" name="pelabuhan" placeholder="Nama pelabuhan tujuan pengiriman">
            </div>

            <div class="form-group">
                <label>Estimasi Tiba (ETA)</label>
                <input type="date" name="eta">
            </div>

            <div class="form-group">
                <label>Rencana Kegiatan</label>
                <select name="kegiatan">
                    <option value="">Pilih rencana kegiatan</option>
                    <option value="Bongkar">1. Bongkar</option>
                    <option value="Muat">2. Muat</option>
                </select>
            </div>

            <button type="submit" class="btn-submit">Minta Quotation</button>
        </form>
    </div>
</div>

<div class="footer">© 2026 Bosowa Bandar Indonesia. All rights reserved.</div>

</body>
</html>