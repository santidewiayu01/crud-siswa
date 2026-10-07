@extends('layouts.prototype-frontend')

@section('title', 'Masuk - SiswaNow')

@section('content')
  <nav class="navbar">
    <div class="nav-brand">
      <div class="brand-icon">🎓</div>
      <div class="brand-text">Siswa<span>Now</span></div>
    </div>
    <div class="nav-right">
      <button class="mode-btn" id="modeBtn" onclick="toggleMode()" aria-label="Toggle tema">🌙</button>
      <a href="{{ url('/') }}" class="btn-nav-login">Beranda</a>
      <a href="{{ route('register') }}" class="btn-nav-register">Daftar →</a>
    </div>
  </nav>

  <div class="neon-divider"></div>

  <section class="hero">
    <div class="orb orb-a"></div>
    <div class="orb orb-b"></div>
    <div class="orb orb-c"></div>

    <div class="auth-card">
      <div class="auth-title">Masuk ke SiswaNow</div>
      <div class="auth-subtitle">Gunakan akun Anda untuk mengelola data siswa dengan mudah.</div>

      @if (session('status'))
        <div class="form-error" style="margin-bottom:16px;">{{ session('status') }}</div>
      @endif

      <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
          <label class="form-label" for="email">Email</label>
          <input id="email" type="email" name="email" class="form-input" value="{{ old('email') }}" required autofocus />
          @error('email') <div class="form-error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
          <label class="form-label" for="password">Password</label>
          <input id="password" type="password" name="password" class="form-input" required autocomplete="current-password" />
          @error('password') <div class="form-error">{{ $message }}</div> @enderror
        </div>

        <div class="form-actions">
          <label class="form-label" style="margin-bottom:0; font-size:12px;">
            <input type="checkbox" name="remember" style="margin-right:8px; vertical-align:middle;"> Ingat saya
          </label>
          @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="auth-link">Lupa password?</a>
          @endif
        </div>

        <div class="form-actions" style="margin-top:24px; gap:12px;">
          <button type="submit" class="btn-cta button-full">Masuk</button>
        </div>
      </form>

      <div class="form-actions" style="justify-content:center; margin-top:18px;">
        <span class="auth-link">Belum punya akun?</span>
        <a href="{{ route('register') }}" class="auth-link">Daftar sekarang</a>
      </div>
    </div>
  </section>
@endsection
