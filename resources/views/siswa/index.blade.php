@extends('layouts.prototype')

@section('title', 'Data Siswa')

@section('content')
  <div class="nav-tabs">
    <span class="nav-tab active">📊 Dashboard</span>
    <a href="{{ url('/siswa/create') }}" class="btn-add">+ Tambah Siswa</a>
    <button class="mode-toggle" id="modeBtn" onclick="toggleMode()" title="Ganti tema">🌙</button>
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

      <div class="dash-body">
        @if(session('success'))
          <div class="alert-message">{{ session('success') }}</div>
        @endif

        <div class="stat-cards">
          <div class="stat-card">
            <div class="stat-label">Total Siswa</div>
            <div class="stat-value">{{ $siswa->total() }}</div>
            <div class="stat-sub">{{ $siswa->count() }} ditampilkan</div>
          </div>
          <div class="stat-card">
            <div class="stat-label">Total Kelas</div>
            <div class="stat-value">{{ $totalKelas }}</div>
            <div class="stat-sub">Aktif semua</div>
          </div>
          <div class="stat-card">
            <div class="stat-label">Update Terakhir</div>
            <div class="stat-value" style="font-size:14px;padding-top:4px">Hari ini</div>
            <div class="stat-sub">{{ auth()->user()->name ?? 'Admin' }}</div>
          </div>
        </div>

        <div class="dash-title-row">
          <div class="dash-title">Data Siswa <span>{{ $siswa->total() }} entri</span></div>
          <a href="{{ url('/siswa/create') }}" class="btn-add">+ Tambah Siswa</a>
        </div>

        <form method="GET" action="{{ url('/siswa') }}" class="search-box">
          <span class="search-icon">🔍</span>
          <input type="text" name="keyword" value="{{ old('keyword', $keyword) }}" class="search-input" placeholder="Cari nama, kelas, atau alamat..." />
        </form>

        <div class="table-wrap">
          <table class="data-table">
            <thead>
              <tr>
                <th>#</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Jenis Kelamin</th>
                <th>Tgl Lahir</th>
                <th>Alamat</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse($siswa as $index => $item)
                <tr>
                  <td class="num-cell">{{ $siswa->firstItem() + $index }}</td>
                  <td>{{ $item->nama }}</td>
                  <td><span class="badge-kelas">{{ $item->kelas }}</span></td>
                  <td>{{ $item->jenis_kelamin }}</td>
                  <td>{{ $item->tanggal_lahir ? \Carbon\Carbon::parse($item->tanggal_lahir)->format('d-m-Y') : '-' }}</td>
                  <td>{{ $item->alamat }}</td>
                  <td>
                    <a href="{{ url('/siswa/' . $item->id . '/edit') }}" class="btn-edit">✏️ Edit</a>
                    <form action="{{ url('/siswa/' . $item->id) }}" method="POST" style="display:inline;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn-hapus">🗑 Hapus</button>
                    </form>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="5" style="padding: 18px 16px; color: var(--text-secondary);">Tidak ada data siswa.</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>

        <div style="margin-top:18px; color: var(--text-muted);">
          {{ $siswa->withQueryString()->links() }}
        </div>
      </div>
    </div>
  </div>
@endsection