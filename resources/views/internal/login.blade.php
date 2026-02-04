@extends('layouts.main')

@section('title', 'Portal Internal')

@section('content')
<div class="container">
    
    <div style="text-align: center; margin-bottom: 40px;">
        <img src="{{ asset('images/logo-bosowa.png') }}" style="width: 320px; margin-bottom: 15px;"> <h2 style="font-size: 32px; font-weight: 800; color: white; margin: 10px 0;">PORTAL INTERNAL</h2>
        <p style="color: #cbd5e0; margin-top: 0;">Masuk Untuk Mengakses Dashboard</p>
    </div>

    <div class="login-card">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="Masukkan email anda" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Masukkan password anda" required>
            </div>

            <button type="submit" class="btn-masuk">Masuk</button>
            {{-- Ubah / menjadi route('landing') --}}
            <a href="{{ route('landing') }}" class="btn-outline">Kembali Ke Beranda</a>
        </form>
    </div>

</div>
@endsection