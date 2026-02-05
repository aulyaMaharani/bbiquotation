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
        {{-- Tampilkan Error Login di sini --}}
        @if($errors->has('loginError'))
            <div style="background: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; margin-bottom: 15px; text-align: center; font-size: 14px;">
                {{ $errors->first('loginError') }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            
            <div class="form-group-login">
                <label style="color: white; display: block; margin-bottom: 8px;">Email</label>
                <input type="email" name="email" value="{{ Cookie::get('remember_email') ?? old('email') }}" placeholder="Masukkan email anda" required>
            </div>

            <div class="form-group-login" style="margin-top: 15px;">
                <label style="color: white; display: block; margin-bottom: 8px;">Password</label>
                <input type="password" name="password" value="{{ Cookie::get('remember_password') }}" placeholder="Masukkan password anda" required>
            </div>

            <div class="form-group-login" style="margin-top: 15px; display: flex; align-items: center; gap: 10px;">
                {{-- Input Checkbox --}}
                <input type="checkbox" name="remember" id="remember" 
                    {{ Cookie::get('remember_email') ? 'checked' : '' }} 
                    style="width: 18px; height: 18px; cursor: pointer; margin: 0;">
                
                {{-- Label Teks --}}
                <label for="remember" style="color: #4a5568; cursor: pointer; font-size: 14px; user-select: none; margin: 0;">
                    Ingat Saya
                </label>
            </div>

            <button type="submit" class="btn-login-submit" style="width: 100%; padding: 12px; margin-top: 25px; background: #8bb4f3; border: none; border-radius: 8px; font-weight: bold; cursor: pointer;">Masuk</button>
            
            <a href="{{ url('/') }}" class="btn-login-back" style="display: block; text-align: center; margin-top: 15px; color: #cbd5e0; text-decoration: none; font-size: 14px;">Kembali Ke Beranda</a>
        </form>
    </div>

</div>
@endsection