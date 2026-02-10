@extends('layouts.main')

@section('title', 'Dashboard Internal')

@push('scripts')
<script>
    document.body.classList.add('bg-white');
    document.body.classList.remove('bg-dark');
</script>
@endpush

{{-- TOMBOL KELUAR DI NAVBAR --}}
@section('nav-action')
    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
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

    {{-- Form Filter --}}
    <div class="card-white">
        <form action="{{ route('dashboard') }}" method="GET">
            <div style="display: flex; gap: 20px; align-items: flex-end;">
                
                <div style="flex: 2;">
                    <label style="display: block; font-weight: bold; font-size: 14px; margin-bottom: 8px; color: #333; text-align: left;">Cari Nama Perusahaan</label>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Ketik Nama Perusahaan" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-family: 'Sora', sans-serif; color: #000;">
                </div>

                <div style="flex: 1;">
                    <label style="display: block; font-weight: bold; font-size: 14px; margin-bottom: 8px; color: #333; text-align: left;">Bulan (ETA)</label>
                    <select name="month" onchange="this.form.submit()" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-family: 'Sora', sans-serif; color: #000;">
                        <option value="">Semua Bulan</option>
                        @for ($i = 1; $i <= 12; $i++)
                            <option value="{{ $i }}" {{ request('month') == $i ? 'selected' : '' }}>
                                {{ date('F', mktime(0, 0, 0, $i, 1)) }}
                            </option>
                        @endfor
                    </select>
                </div>

                <div style="flex: 1;">
                    <label style="display: block; font-weight: bold; font-size: 14px; margin-bottom: 8px; color: #333; text-align: left;">Tahun (ETA)</label>
                    <select name="year" onchange="this.form.submit()" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-family: 'Sora', sans-serif; color: #000;">
                        <option value="">Semua Tahun</option>
                        @php $currentYear = date('Y'); @endphp
                        @for ($y = $currentYear + 1; $y >= $currentYear - 5; $y--)
                            <option value="{{ $y }}" {{ request('year') == $y ? 'selected' : '' }}>{{ $y }}</option>
                        @endfor
                    </select>
                </div>

                <button type="submit" style="padding: 12px 25px; background: #1a3a5f; color: white; border: none; border-radius: 8px; font-weight: bold; cursor: pointer; font-family: 'Sora', sans-serif;">Cari</button>
                <a href="{{ route('dashboard') }}" style="padding: 12px 25px; background: #eee; color: #333; text-decoration: none; border-radius: 8px; font-weight: bold; font-family: 'Sora', sans-serif; font-size: 14px; text-align: center;">Reset Filter</a>
            </div>
        </form>
        <p style="font-size: 12px; margin-top: 15px; color: #888; text-align: left;">Menampilkan {{ count($quotations) }} data</p>
    </div>

    {{-- Tabel Riwayat --}}
    <div class="card-white">
        <div style="overflow-x: auto;">
            <table class="bbi-table">
                <thead class="table-header">
                    <tr>
                        <th style="color: white;">No</th>
                        <th style="color: white;">Nama Perusahaan</th>
                        <th style="color: white;">Nama PIC</th>
                        <th style="color: white;">WhatsApp PIC</th>
                        <th style="color: white;">Jenis Kapal</th>
                        <th style="color: white;">Nama Kapal</th>
                        <th style="color: white;">GT</th>
                        <th style="color: white;">Tujuan Pelabuhan</th>
                        <th style="color: white;">Estimasi Tiba (ETA)</th>
                        <th style="color: white;">Rencana Kegiatan</th>
                        <th style="color: white;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($quotations as $index => $item)
                    <tr>
                        <td style="color: #000;">{{ $index + 1 }}</td>
                        <td style="font-weight: bold; color: #0d2745;">{{ $item->nama_perusahaan }}</td>
                        <td style="color: #000;">{{ $item->nama_pic }}</td>
                        <td style="color: #000;">{{ $item->whatsapp_pic }}</td>
                        <td style="color: #000;">{{ $item->jenis_kapal }}</td>
                        <td style="color: #000;">{{ $item->nama_kapal }}</td>
                        <td style="color: #000;">{{ $item->gt }}</td>
                        <td style="color: #000;">{{ $item->pelabuhan_tujuan }}</td>
                        <td style="color: #000;">{{ $item->estimasi_tiba }}</td>
                        
                        <td style="color: #000;">
                            @if($item->rencana_kegiatan == 'Lain-lain')
                                {{ $item->kegiatan_detail }}
                            @else
                                {{ $item->rencana_kegiatan }}
                            @endif
                        </td>

                        <td>
                            <a href="{{ route('quotation.download', $item->id) }}" style="background: #1a3a5f; color: white; padding: 8px 15px; border-radius: 6px; text-decoration: none; font-size: 12px; font-weight: 600; display: inline-block;">
                                Unduh
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="11" style="padding: 30px; color: #888; text-align: center;">Data tidak ditemukan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection