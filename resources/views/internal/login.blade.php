@extends('layouts.main')

@section('title', 'Portal Internal')

@section('content')
<div class="container-login">
    
    <div style="text-align: center; margin-bottom: 30px;">
        <img src="{{ asset('images/logo-bosowa.png') }}" style="width: 250px; margin-bottom: 15px;">
        <h2 style="font-size: 28px; font-weight: 800; color: white; margin-bottom: 5px;">PORTAL INTERNAL</h2>
        <p style="color: #cbd5e0; margin-top: 0;">Masuk Untuk Mengakses Dashboard</p>
    </div>

    <div class="login-card">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            
            <div class="form-group-login">
                <label>Email</label>
                <input type="email" name="email" placeholder="Masukkan email anda" required>
            </div>

            <div class="form-group-login">
                <label>Password</label>
                <input type="password" name="password" placeholder="Masukkan password anda" required>
            </div>

            <button type="submit" class="btn-login-submit">Masuk</button>
            
            <a href="{{ url('/') }}" class="btn-login-back">Kembali Ke Beranda</a>
        </form>
    </div>

</div>
@endsection