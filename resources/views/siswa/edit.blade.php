@extends('layouts.prototype')

@section('title', 'Edit Data Siswa')

@section('content')
  <div class="nav-tabs">
    <a href="{{ url('/siswa') }}" class="nav-tab">📊 Dashboard</a>
    <span class="nav-tab active">✏️ Edit Data</span>
    <button class="mode-toggle" onclick="toggleMode()" title="Ganti tema">🌙</button>
  </div>

  <div class="page">
    <div class="page-bg">
      <div class="glow-orb orb1"></div>
      <div class="glow-orb orb2"></div>

      <div class="dash-header">
        <div class="dash-brand">
          <div class="brand-dot">🎓</div>
          <div class="brand-name">SiswaNow</div>
        </div>

        <div class="dash-right">
          <div class="user-avatar">AD</div>
          <span style="font-size:12px;color:var(--text-secondary);font-weight:500">Admin</span>
          <button class="header-mode-toggle" onclick="toggleMode()" aria-label="Toggle dark/light mode">🌙</button>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn-logout">🚪 Logout</button>
          </form>
        </div>
      </div>

      <div class="neon-line"></div>

      <div class="form-page-body">
        <div class="form-page-card">
          <div style="display:flex;align-items:center;gap:10px;margin-bottom:4px">
            <div style="width:34px;height:34px;background:rgba(120,60,255,0.18);border:1px solid rgba(120,60,255,0.35);border-radius:9px;display:flex;align-items:center;justify-content:center;font-size:16px;">👤</div>
            <div class="form-page-title">Edit Data Siswa</div>
          </div>
          <div class="form-page-sub">Perbarui informasi siswa yang sudah ada.</div>
          <div class="form-divider"></div>

          <form action="{{ url('/siswa/' . $siswa->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
              <label class="form-label">Nama Lengkap</label>
              <input type="text" name="nama" value="{{ old('nama', $siswa->nama) }}" class="form-input" placeholder="Masukkan nama lengkap siswa" />
            </div>

            <div class="form-row">
              <div class="form-group">
                <label class="form-label">Kelas</label>
                <input type="text" name="kelas" value="{{ old('kelas', $siswa->kelas) }}" class="form-input" placeholder="Contoh: XI RPL 2" />
              </div>
              <div class="form-group">
                <label class="form-label">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-input">
                  <option value="">Pilih jenis kelamin</option>
                  <option value="Laki-laki" {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                  <option value="Perempuan" {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group">
                <label class="form-label">Alamat</label>
                <input type="text" name="alamat" value="{{ old('alamat', $siswa->alamat) }}" class="form-input" placeholder="Masukkan alamat lengkap" />
              </div>
              <div class="form-group">
                <label class="form-label">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $siswa->tanggal_lahir) }}" class="form-input" />
              </div>
            </div>

            <div style="display:flex;justify-content:flex-end;align-items:center">
              <a href="{{ url('/siswa') }}" class="btn-batal">← Batal</a>
              <button type="submit" class="btn-simpan">Update Data ✓</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection