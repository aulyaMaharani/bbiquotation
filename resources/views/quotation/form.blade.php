<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bosowa Bandar Indonesia - Quotation</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;800&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Poppins', sans-serif; 
            background-color: #0d2745; 
            margin: 0; 
            display: flex; 
            flex-direction: column; 
            min-height: 100vh; 
        }
        .header { background: #1a3a5f; padding: 15px 50px; display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid #0d2745; }
        .container { display: flex; justify-content: center; padding: 40px 20px; flex: 1; }
        .form-card { background: white; width: 95%; max-width: 880px; padding: 60px; border-radius: 25px; box-shadow: 0 20px 50px rgba(0,0,0,0.5); }
        .logo-container { text-align: center; margin-bottom: 40px; }
        .logo-container img { width: 200px; height: auto; }
        h2 { color: #1a3a5f; text-align: center; margin: 0; font-size: 32px; font-weight: 800; }
        p.subtitle { color: #666; font-size: 15px; text-align: center; margin-bottom: 45px; }
        .form-group { margin-bottom: 25px; }
        label { display: block; font-size: 17px; font-weight: bold; color: #333; margin-bottom: 10px; }
        input, select, textarea { width: 100%; padding: 16px; border: 1px solid #ccc; border-radius: 10px; box-sizing: border-box; background: #fdfdfd; font-size: 18px; font-family: 'Poppins', sans-serif; }
        .btn-submit { width: 100%; background-color: #8bb4f3; color: #0d2745; border: none; padding: 20px; border-radius: 12px; font-weight: bold; font-size: 20px; margin-top: 30px; cursor: pointer; transition: 0.3s; }
        .btn-submit:hover { background-color: #7aa3e2; transform: translateY(-3px); }
        .footer { background: #1a3a5f; color: white; text-align: center; padding: 25px; font-size: 13px; }
        .btn-kembali { text-decoration: none; background: #8e9aaf; color: white; padding: 10px 25px; border-radius: 8px; font-size: 15px; font-weight: 600; }
        /* Style untuk menyembunyikan elemen */
        .hidden { display: none; }
    </style>
</head>
<body>

<div class="header">
    <div style="color: white; font-weight: bold; font-size: 24px; letter-spacing: 2px;">BOSOWA</div>
    <a href="{{ route('landing') }}" class="btn-kembali">Kembali</a>
</div>

<div class="container">
    <div class="form-card">
        <div class="logo-container">
            <img src="{{ asset('logo-bosowa.png') }}" alt="Logo Bosowa">
        </div>

        <h2>Formulir Pengajuan Quotation</h2>
        <p class="subtitle">Lengkapi data untuk mendapatkan penawaran terbaik</p>

        <form action="{{ route('quotation.store') }}" method="POST">
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
</div>

<script>
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

<div class="footer">© 2026 Bosowa Bandar Indonesia. All rights reserved.</div>
</body>
</html>