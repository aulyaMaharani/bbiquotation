@extends('layouts.main')

@section('title', 'Dashboard Internal')

@push('scripts')
<script>
    // Memastikan background body menjadi putih khusus halaman ini
    document.body.classList.add('bg-white');
    document.body.classList.remove('bg-dark');
</script>
@endpush

@section('nav-action')
    <form action="#" method="POST" style="margin: 0;">
        @csrf
        <button type="submit" class="btn-exit-bbi">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                <polyline points="11 17 6 12 11 7"></polyline>
                <line x1="6" y1="12" x2="21" y2="12"></line>
            </svg>
            Keluar
        </button>
    </form>
@endsection

@section('content')
<div class="dash-content">
    
    <h1 style="text-align: left; font-weight: 800; color: #0d2745; margin-bottom: 25px; font-size: 28px;">Riwayat Permohonan Quotation</h1>

    <div class="card-white">
        <div style="display: flex; gap: 20px; align-items: flex-end;">
            <div style="flex: 2;">
                <label style="display: block; font-weight: bold; font-size: 14px; margin-bottom: 8px; color: #333; text-align: left;">Cari Nama Perusahaan</label>
                <input type="text" placeholder="Ketik Nama Perusahaan" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-family: 'Sora', sans-serif;">
            </div>
            <div style="flex: 1;">
                <label style="display: block; font-weight: bold; font-size: 14px; margin-bottom: 8px; color: #333; text-align: left;">Bulan</label>
                <select style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-family: 'Sora', sans-serif;">
                    <option>Semua Bulan</option>
                </select>
            </div>
            <div style="flex: 1;">
                <label style="display: block; font-weight: bold; font-size: 14px; margin-bottom: 8px; color: #333; text-align: left;">Tahun</label>
                <select style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-family: 'Sora', sans-serif;">
                    <option>Semua Tahun</option>
                </select>
            </div>
            <button type="reset" style="padding: 12px 25px; background: #eee; border: none; border-radius: 8px; font-weight: bold; cursor: pointer; font-family: 'Sora', sans-serif;">Reset Filter</button>
        </div>
        <p style="font-size: 12px; margin-top: 15px; color: #888; text-align: left;">Menampilkan {{ count($quotations) }} data</p>
    </div>

    <div class="card-white">
        <div style="overflow-x: auto;">
            <table class="bbi-table">
                <thead class="table-header">
                    <tr>
                        <th>No</th>
                        <th>Nama Perusahaan</th>
                        <th>Nama PIC</th>
                        <th>WhatsApp PIC</th>
                        <th>Jenis Kapal</th>
                        <th>Nama Kapal</th>
                        <th>GT</th>
                        <th>Tujuan Pelabuhan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($quotations as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td style="font-weight: bold; color: #0d2745;">{{ $item->nama_perusahaan }}</td>
                        <td>{{ $item->nama_pic }}</td>
                        <td>{{ $item->whatsapp_pic }}</td>
                        <td>{{ $item->jenis_kapal }}</td>
                        <td>{{ $item->nama_kapal }}</td>
                        <td>{{ $item->gt }}</td>
                        <td>{{ $item->pelabuhan_tujuan }}</td>
                        <td>
                            <a href="#" style="background: #1a3a5f; color: white; padding: 8px 15px; border-radius: 6px; text-decoration: none; font-size: 12px; font-weight: 600; display: inline-block;">
                                Unduh
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9">Belum ada data permohonan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection