@extends('layouts.main')

@section('title', 'Portal Internal')

@section('content')
<div class="login-wrapper">

    <div class="login-logo">
        <img src="{{ asset('images/logobosowa.png') }}" alt="Logo BBA putih">
    </div>

    {{-- TULISAN PORTAL (RATA TENGAH) --}}
    <div style="margin-bottom: 40px; text-align: center;">
        <h2 style="font-size: 28px; font-weight: 800; color: white; margin-bottom: 8px; text-transform: uppercase; letter-spacing: 1px;">
            PORTAL BOSOWA BANDAR INDONESIA
        </h2>
        <p style="color: #cbd5e0; margin: 0; font-size: 16px;">Masuk Untuk Mengakses Dashboard</p>
    </div>

    {{-- KARTU LOGIN --}}
    <div class="login-card">
        @if($errors->has('loginError'))
            <div style="background: #fee2e2; color: #991b1b; padding: 12px; border-radius: 10px; margin-bottom: 20px; font-size: 14px;">
                {{ $errors->first('loginError') }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf 
            
            <div class="form-group-login">
                <label style="text-align: left; display: block; color: #333;">Email</label>
                <input type="email" name="email" value="{{ Cookie::get('remember_email') ?? old('email') }}" placeholder="bosowabandarindo@gmail.com" required>
            </div>

            <div class="form-group-login" style="margin-top: 15px;">
                <label style="text-align: left; display: block; color: #333;">Password</label>
                <input type="password" name="password" placeholder="••••••••••••" required>
            </div>

            <div style="display: flex; align-items: center; gap: 10px; margin: 25px 0; text-align: left;">
                <input type="checkbox" name="remember" id="remember" style="width: 18px; height: 18px; cursor: pointer;">
                <label for="remember" style="margin: 0; color: #4a5568; font-size: 14px; cursor: pointer;">Ingat Saya</label>
            </div>

            <button type="submit" class="btn-login-submit">Masuk</button>
            
            <a href="{{ url('/') }}" class="btn-login-back" style="display: block; text-align: center; margin-top: 15px; color: #00060d; text-decoration: none; font-size: 14px;">Kembali Ke Beranda</a>

        </form>
    </div>
</div>
@endsection