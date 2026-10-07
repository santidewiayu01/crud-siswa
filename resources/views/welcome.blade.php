@extends('layouts.prototype-frontend')

@section('title', 'SiswaNow — Landing Page')

@section('content')
  <nav class="navbar">
    <div class="nav-brand">
      <div class="brand-icon">🎓</div>
      <div class="brand-text">Siswa<span>Now</span></div>
    </div>
    <div class="nav-right">
      <button class="mode-btn" id="modeBtn" onclick="toggleMode()" aria-label="Toggle tema">🌙</button>
      <a href="{{ route('login') }}" class="btn-nav-login">Masuk</a>
      <a href="{{ route('register') }}" class="btn-nav-register">Daftar →</a>
    </div>
  </nav>

  <div class="neon-divider"></div>

  <section class="hero">
    <div class="orb orb-a"></div>
    <div class="orb orb-b"></div>
    <div class="orb orb-c"></div>

    <div class="hero-badge">
      <div class="badge-dot"></div>
      Sistem Manajemen Sekolah — Laravel
    </div>

    <h1 class="hero-title">
      Kelola Data Siswa<br>
      <span class="hl">Lebih Mudah & Modern</span>
    </h1>

    <p class="hero-desc">
      Platform CRUD data siswa yang cepat, aman, dan elegan. Tambah, edit, dan kelola data siswa dengan tampilan yang nyaman digunakan.
    </p>

    <div class="hero-btns">
      <a href="{{ route('login') }}" class="btn-cta">🚀 Mulai Sekarang</a>
      <a href="#features" class="btn-ghost">📖 Pelajari Lebih Lanjut</a>
    </div>

    <div class="preview-wrap">
      <div class="preview-glow"></div>
      <div class="preview-card">
        <div class="preview-bar">
          <div class="dot-r"></div>
          <div class="dot-y"></div>
          <div class="dot-g"></div>
          <div class="preview-url">127.0.0.1:8000/siswa</div>
        </div>
        <div class="preview-body">
          <div class="mini-header">
            <div class="mini-brand">
              <div class="mini-dot">🎓</div>
              <div class="mini-name">SiswaNow</div>
            </div>
            <div style="display:flex;align-items:center;gap:7px">
              <span style="font-size:8.5px;color:var(--muted)">Admin</span>
              <div class="mini-logout">🚪 Logout</div>
            </div>
          </div>

          <div class="mini-stats">
            <div class="mini-stat">
              <div class="mini-stat-label">Total Siswa</div>
              <div class="mini-stat-val">248</div>
            </div>
            <div class="mini-stat">
              <div class="mini-stat-label">Total Kelas</div>
              <div class="mini-stat-val">8</div>
            </div>
            <div class="mini-stat">
              <div class="mini-stat-label">Update</div>
              <div class="mini-stat-val" style="font-size:9px;padding-top:3px">Hari ini</div>
            </div>
          </div>

          <div class="mini-table-wrap">
            <table class="mini-table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Siswa</th>
                  <th>Kelas</th>
                  <th>Alamat</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td style="color:var(--dim);font-size:8px">01</td>
                  <td style="font-weight:500">Ayu Putri</td>
                  <td><span class="mini-badge">XI RPL 2</span></td>
                  <td style="color:var(--muted)">Jl. Manukan Sari</td>
                  <td><button class="mini-edit">Edit</button><button class="mini-del">Hapus</button></td>
                </tr>
                <tr>
                  <td style="color:var(--dim);font-size:8px">02</td>
                  <td style="font-weight:500">Budi Santoso</td>
                  <td><span class="mini-badge">X TKJ 1</span></td>
                  <td style="color:var(--muted)">Jl. Ahmad Yani</td>
                  <td><button class="mini-edit">Edit</button><button class="mini-del">Hapus</button></td>
                </tr>
                <tr>
                  <td style="color:var(--dim);font-size:8px">03</td>
                  <td style="font-weight:500">Citra Dewi</td>
                  <td><span class="mini-badge">XII MM 3</span></td>
                  <td style="color:var(--muted)">Perum Griya Asri</td>
                  <td><button class="mini-edit">Edit</button><button class="mini-del">Hapus</button></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="features" class="features">
    <div class="section-label">Fitur Unggulan</div>
    <div class="section-title">Semua yang kamu butuhkan</div>
    <div class="feat-grid">
      <div class="feat-card">
        <div class="feat-icon">⚡</div>
        <div class="feat-title">CRUD Lengkap</div>
        <div class="feat-desc">Tambah, lihat, edit, dan hapus data siswa dengan mudah dalam satu platform.</div>
      </div>
      <div class="feat-card">
        <div class="feat-icon">🔐</div>
        <div class="feat-title">Autentikasi Aman</div>
        <div class="feat-desc">Sistem login & register dengan proteksi Laravel Breeze yang terintegrasi.</div>
      </div>
      <div class="feat-card">
        <div class="feat-icon">🔍</div>
        <div class="feat-title">Pencarian Cepat</div>
        <div class="feat-desc">Temukan data siswa berdasarkan nama, kelas, atau alamat secara instan.</div>
      </div>
      <div class="feat-card">
        <div class="feat-icon">🌙</div>
        <div class="feat-title">Mode Gelap/Cerah</div>
        <div class="feat-desc">Tampilan adaptif yang nyaman digunakan siang maupun malam hari.</div>
      </div>
      <div class="feat-card">
        <div class="feat-icon">📊</div>
        <div class="feat-title">Dashboard Statistik</div>
        <div class="feat-desc">Pantau jumlah siswa, kelas, dan data terbaru dari satu halaman ringkasan.</div>
      </div>
      <div class="feat-card">
        <div class="feat-icon">📱</div>
        <div class="feat-title">Responsif</div>
        <div class="feat-desc">Tampilan yang nyaman digunakan di desktop maupun perangkat mobile.</div>
      </div>
    </div>
  </section>

  <div class="neon-divider"></div>

  <footer class="footer">
    <div class="footer-brand">Siswa<span>Now</span></div>
    <div class="footer-copy">© 2026 SiswaNow — Dibuat dengan Laravel & ❤️</div>
  </footer>
@endsection
