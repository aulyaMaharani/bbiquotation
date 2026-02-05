<!DOCTYPE html>
<html>
<head>
    <title>Quotation - {{ $data->nama_perusahaan }}</title>
    <style>
        body { font-family: sans-serif; }
        .header { text-align: center; margin-bottom: 30px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 10px; border: 1px solid #ddd; text-align: left; }
        th { background-color: #f2f2f2; width: 30%; }
    </style>
</head>
<body>
    <div class="header">
        <h2>Detail Permohonan Quotation</h2>
        <p>Bosowa Bandar Indonesia</p>
    </div>

    <table>
        <tr><th>Nama Perusahaan</th><td>{{ $data->nama_perusahaan }}</td></tr>
        <tr><th>Nama PIC</th><td>{{ $data->nama_pic }}</td></tr>
        <tr><th>WhatsApp PIC</th><td>{{ $data->whatsapp_pic }}</td></tr>
        <tr><th>Jenis Kapal</th><td>{{ $data->jenis_kapal }}</td></tr>
        <tr><th>Nama Kapal</th><td>{{ $data->nama_kapal }}</td></tr>
        <tr><th>GT</th><td>{{ $data->gt }}</td></tr>
        <tr><th>Pelabuhan Tujuan</th><td>{{ $data->pelabuhan_tujuan }}</td></tr>
        <tr><th>Estimasi Tiba (ETA)</th><td>{{ $data->estimasi_tiba }}</td></tr>
        <tr>
            <th>Rencana Kegiatan</th>
            <td>
                @if($data->rencana_kegiatan == 'Lain-lain')
                    {{ $data->kegiatan_detail }}
                @else
                    {{ $data->rencana_kegiatan }}
                @endif
            </td>
        </tr>
    </table>
</body>
</html>