@extends('layouts.prototype-frontend')

@section('title', 'Daftar - SiswaNow')

@section('content')
  <nav class="navbar">
    <div class="nav-brand">
      <div class="brand-icon">🎓</div>
      <div class="brand-text">Siswa<span>Now</span></div>
    </div>
    <div class="nav-right">
      <button class="mode-btn" id="modeBtn" onclick="toggleMode()" aria-label="Toggle tema">🌙</button>
      <a href="{{ url('/') }}" class="btn-nav-login">Beranda</a>
      <a href="{{ route('login') }}" class="btn-nav-register">Masuk →</a>
    </div>
  </nav>

  <div class="neon-divider"></div>

  <section class="hero">
    <div class="orb orb-a"></div>
    <div class="orb orb-b"></div>
    <div class="orb orb-c"></div>

    <div class="auth-card">
      <div class="auth-title">Buat Akun Baru</div>
      <div class="auth-subtitle">Daftarkan diri Anda untuk mulai mengelola data siswa.</div>

      <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group">
          <label class="form-label" for="name">Nama</label>
          <input id="name" type="text" name="name" class="form-input" value="{{ old('name') }}" required autofocus />
          @error('name') <div class="form-error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
          <label class="form-label" for="email">Email</label>
          <input id="email" type="email" name="email" class="form-input" value="{{ old('email') }}" required />
          @error('email') <div class="form-error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
          <label class="form-label" for="password">Password</label>
          <input id="password" type="password" name="password" class="form-input" required autocomplete="new-password" />
          @error('password') <div class="form-error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
          <label class="form-label" for="password_confirmation">Konfirmasi Password</label>
          <input id="password_confirmation" type="password" name="password_confirmation" class="form-input" required autocomplete="new-password" />
        </div>

        <div class="form-actions" style="margin-top:24px; gap:12px;">
          <button type="submit" class="btn-cta button-full">Daftar</button>
        </div>
      </form>

      <div class="form-actions" style="justify-content:center; margin-top:18px;">
        <span class="auth-link">Sudah punya akun?</span>
        <a href="{{ route('login') }}" class="auth-link">Masuk di sini</a>
      </div>
    </div>
  </section>
@endsection
