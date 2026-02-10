<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; line-height: 1.6; color: #333; }
        .container { padding: 20px; border: 1px solid #eee; border-radius: 10px; }
        .header { background-color: #0d2745; color: white; padding: 10px 20px; border-radius: 8px 8px 0 0; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { text-align: left; padding: 12px; border-bottom: 1px solid #ddd; }
        th { background-color: #f8f9fa; width: 35%; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Halo Admin BBI,</h2>
        </div>
        <p>Ada permohonan quotation baru yang masuk dari website. Berikut rincian datanya:</p>

        <table>
            <tr><th>Nama Perusahaan</th><td>{{ $data->nama_perusahaan }}</td></tr>
            <tr><th>Nama PIC</th><td>{{ $data->nama_pic }}</td></tr>
            <tr><th>WhatsApp PIC</th><td>{{ $data->whatsapp_pic }}</td></tr>
            <tr><th>Estimasi Tiba (ETA)</th><td>{{ $data->estimasi_tiba }}</td></tr>
            <tr>
                <th>Rencana Kegiatan</th>
                <td>
                    {{-- Menampilkan detail jika user memilih 'Lain-lain' --}}
                    {{ $data->rencana_kegiatan == 'Lain-lain' ? $data->kegiatan_detail : $data->rencana_kegiatan }}
                </td>
            </tr>
        </table>

        <p style="margin-top: 30px;">Silakan login ke <strong>Dashboard Internal</strong> untuk melihat detail lengkap dan memproses permohonan ini.</p>
        <hr>
        <p style="font-size: 11px; color: #888;">Email ini dikirim otomatis oleh Sistem Bosowa Bandar Indonesia.</p>
    </div>
</body>
</html>