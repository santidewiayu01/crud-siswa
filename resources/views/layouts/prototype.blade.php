<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Laravel'))</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">

    <style>
      @import url('https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:wght@300;400;500&display=swap');

      * { margin: 0; padding: 0; box-sizing: border-box; }

      .app {
        font-family: 'DM Sans', sans-serif;
        --bg-main: #09080f;
        --bg-surface: rgba(255,255,255,0.04);
        --bg-surface2: rgba(255,255,255,0.03);
        --border: rgba(140,90,255,0.22);
        --border-soft: rgba(140,90,255,0.13);
        --text-primary: #e2e0f0;
        --text-secondary: #8880b0;
        --text-muted: #6860a0;
        --text-heading: #f0ecff;
        --input-bg: rgba(255,255,255,0.05);
        --input-focus-bg: rgba(140,90,255,0.08);
        --header-bg: rgba(255,255,255,0.03);
        --table-head-bg: rgba(140,90,255,0.09);
        --table-head-border: rgba(140,90,255,0.2);
        --table-row-hover: rgba(140,90,255,0.05);
        --table-row-border: rgba(255,255,255,0.04);
        --stat-border-top: linear-gradient(90deg,#7c3aff,#3b6bff);
        --badge-bg: rgba(60,100,255,0.15);
        --badge-border: rgba(60,100,255,0.25);
        --badge-color: #80a8ff;
        --orb1: rgba(110,60,255,0.18);
        --orb2: rgba(30,100,255,0.14);
        --search-placeholder: #404070;
        --neon-line: linear-gradient(90deg, transparent, rgba(140,90,255,0.6), rgba(60,100,255,0.6), transparent);
        --card-shadow: 0 0 60px rgba(120,60,255,0.12), inset 0 1px 0 rgba(255,255,255,0.07);
        --logo-shadow: 0 0 30px rgba(120,60,255,0.5), 0 0 60px rgba(120,60,255,0.2);
        --btn-add-shadow: 0 0 20px rgba(120,60,255,0.35);
        --logout-bg: rgba(255,60,80,0.18);
        --logout-border: rgba(255,60,80,0.4);
        --logout-color: #ff8090;
        --logout-shadow: 0 0 14px rgba(255,60,80,0.25);
      }

      .app.light {
        --bg-main: #f3f0ff;
        --bg-surface: rgba(255,255,255,0.85);
        --bg-surface2: rgba(255,255,255,0.7);
        --border: rgba(110,60,220,0.25);
        --border-soft: rgba(110,60,220,0.14);
        --text-primary: #2a2040;
        --text-secondary: #6048a8;
        --text-muted: #9080c0;
        --text-heading: #1a1030;
        --input-bg: rgba(255,255,255,0.9);
        --input-focus-bg: rgba(110,60,220,0.06);
        --header-bg: rgba(255,255,255,0.75);
        --table-head-bg: rgba(110,60,220,0.07);
        --table-head-border: rgba(110,60,220,0.18);
        --table-row-hover: rgba(110,60,220,0.04);
        --table-row-border: rgba(0,0,0,0.05);
        --badge-bg: rgba(60,80,220,0.1);
        --badge-border: rgba(60,80,220,0.2);
        --badge-color: #3b5bdb;
        --orb1: rgba(140,80,255,0.1);
        --orb2: rgba(60,120,255,0.08);
        --search-placeholder: #b0a0d0;
        --neon-line: linear-gradient(90deg, transparent, rgba(110,60,220,0.4), rgba(60,100,255,0.4), transparent);
        --card-shadow: 0 4px 32px rgba(110,60,220,0.1), 0 1px 0 rgba(255,255,255,0.9);
        --logo-shadow: 0 0 22px rgba(110,60,220,0.35);
        --btn-add-shadow: 0 0 16px rgba(110,60,220,0.25);
        --logout-bg: rgba(220,40,60,0.12);
        --logout-border: rgba(220,40,60,0.35);
        --logout-color: #cc2840;
        --logout-shadow: 0 0 10px rgba(220,40,60,0.18);
      }

      /* Dashboard layout base colors */
      body {
        margin: 0;
        background: #09080f;
      }

      .app {
        background: var(--bg-main);
        min-height: 100vh;
        color: var(--text-primary);
        transition: background 0.35s, color 0.35s;
      }

      /* Dashboard top navigation bar */
      .nav-tabs {
        display: flex;
        gap: 4px;
        padding: 10px 14px;
        background: var(--header-bg);
        border-bottom: 1px solid var(--border);
        align-items: center;
        transition: background 0.3s, border-color 0.3s;
      }

      .nav-tab {
        padding: 6px 13px;
        font-size: 12px;
        font-family: 'DM Sans', sans-serif;
        font-weight: 500;
        border-radius: 6px;
        cursor: pointer;
        border: 1px solid transparent;
        background: transparent;
        color: var(--text-muted);
        transition: all 0.2s;
        letter-spacing: 0.3px;
        text-decoration: none;
      }

      .nav-tab.active {
        background: rgba(120,60,255,0.15);
        border-color: rgba(120,60,255,0.35);
        color: #a080ff;
      }

      .app.light .nav-tab.active {
        background: rgba(110,60,220,0.1);
        border-color: rgba(110,60,220,0.3);
        color: #6040c0;
      }

      .nav-tab:hover:not(.active) {
        background: rgba(120,60,255,0.07);
        color: var(--text-secondary);
      }

      .mode-toggle {
        margin-left: auto;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        border: 1px solid var(--border);
        background: var(--bg-surface);
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 17px;
        transition: all 0.25s;
        flex-shrink: 0;
      }

      .mode-toggle:hover {
        border-color: rgba(120,60,255,0.5);
        background: rgba(120,60,255,0.1);
        transform: rotate(20deg) scale(1.08);
      }

      .page { display: block; }

      .page-bg {
        background: var(--bg-main);
        min-height: calc(100vh - 60px);
        position: relative;
        overflow: hidden;
        transition: background 0.35s;
        padding-bottom: 40px;
      }

      .glow-orb {
        position: absolute;
        border-radius: 50%;
        filter: blur(80px);
        pointer-events: none;
        transition: background 0.35s;
      }

      .orb1 { width: 300px; height: 300px; background: var(--orb1); top: -80px; left: -60px; }
      .orb2 { width: 240px; height: 240px; background: var(--orb2); bottom: -60px; right: -60px; }

      /* Dashboard header area colors */
      .dash-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 16px 24px;
        background: var(--header-bg);
        border-bottom: 1px solid var(--border-soft);
        position: relative; z-index: 2;
        backdrop-filter: blur(10px);
        transition: background 0.3s, border-color 0.3s;
      }

      .dash-brand { display: flex; align-items: center; gap: 10px; }
      .brand-dot {
        width: 32px; height: 32px;
        background: linear-gradient(135deg, #7c3aff, #3b6bff);
        border-radius: 9px;
        display: flex; align-items: center; justify-content: center;
        font-size: 14px;
        box-shadow: 0 0 16px rgba(120,60,255,0.42);
      }

      .brand-name {
        font-family: 'Syne', sans-serif;
        font-size: 15px; font-weight: 700;
        color: var(--text-heading);
        letter-spacing: -0.2px;
        transition: color 0.3s;
      }

      .dash-right { display: flex; align-items: center; gap: 10px; }
      .user-avatar {
        width: 32px; height: 32px;
        background: linear-gradient(135deg, #5b21b6, #1e40af);
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        font-size: 11px; font-weight: 700; color: #c4b5fd;
        border: 1px solid rgba(140,90,255,0.35);
        flex-shrink: 0;
      }

      .btn-logout {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 7px 14px;
        background: var(--logout-bg);
        border: 1.5px solid var(--logout-border);
        border-radius: 8px;
        color: var(--logout-color);
        font-size: 12px;
        font-family: 'DM Sans', sans-serif;
        font-weight: 600;
        cursor: pointer;
        box-shadow: var(--logout-shadow);
        transition: background 0.2s, box-shadow 0.2s, transform 0.15s;
        letter-spacing: 0.2px;
        white-space: nowrap;
      }

      .btn-logout:hover { transform: translateY(-1px); box-shadow: 0 0 22px rgba(220,40,60,0.35); }
      .header-mode-toggle {
        width: 32px; height: 32px;
        border-radius: 50%;
        border: 1px solid var(--border);
        background: var(--bg-surface);
        cursor: pointer;
        display: flex; align-items: center; justify-content: center;
        font-size: 15px;
        transition: all 0.25s;
        flex-shrink: 0;
      }

      .header-mode-toggle:hover {
        border-color: rgba(120,60,255,0.5);
        background: rgba(120,60,255,0.1);
        transform: rotate(20deg) scale(1.08);
      }

      .dash-body { padding: 24px; position: relative; z-index: 1; }
      .dash-title-row { display: flex; align-items: center; justify-content: space-between; margin-bottom: 20px; flex-wrap: wrap; gap: 10px; }
      .dash-title {
        font-family: 'Syne', sans-serif;
        font-size: 19px; font-weight: 700;
        color: var(--text-heading);
        letter-spacing: -0.3px;
        transition: color 0.3s;
      }
      .dash-title span { font-size: 12px; font-weight: 400; color: var(--text-muted); margin-left: 8px; font-family: 'DM Sans', sans-serif; }

      .btn-add {
        display: inline-flex; align-items: center; gap: 6px;
        padding: 10px 18px;
        background: linear-gradient(135deg, #7c3aff 0%, #3b6bff 100%);
        border: none; border-radius: 9px;
        color: #fff; font-size: 12.5px; font-weight: 600;
        font-family: 'DM Sans', sans-serif;
        cursor: pointer;
        box-shadow: var(--btn-add-shadow);
        transition: all 0.2s;
        text-decoration: none;
      }

      .btn-add:hover { box-shadow: 0 0 30px rgba(120,60,255,0.55); transform: translateY(-1px); }
      .search-box { position: relative; margin-bottom: 18px; }
      .search-icon { position: absolute; left: 13px; top: 50%; transform: translateY(-50%); color: var(--text-muted); font-size: 13px; }
      .search-input {
        width: 100%; padding: 10px 13px 10px 38px;
        background: var(--input-bg);
        border: 1px solid var(--border-soft);
        border-radius: 9px;
        color: var(--text-primary);
        font-size: 13px;
        font-family: 'DM Sans', sans-serif;
        outline: none;
        transition: all 0.2s;
      }

      .search-input:focus { border-color: rgba(120,60,255,0.4); box-shadow: 0 0 0 3px rgba(120,60,255,0.07); }
      .search-input::placeholder { color: var(--search-placeholder); }
      /* Table wrapper and row colors */
      .table-wrap {
        background: var(--bg-surface2);
        border: 1px solid var(--border-soft);
        border-radius: 13px;
        overflow: hidden;
        transition: background 0.3s, border-color 0.3s;
      }
      .data-table { width: 100%; border-collapse: collapse; }
      .data-table thead tr { background: var(--table-head-bg); border-bottom: 1px solid var(--table-head-border); }
      .data-table th {
        padding: 12px 16px;
        font-size: 10.5px; font-weight: 600;
        text-transform: uppercase; letter-spacing: 0.8px;
        color: var(--text-secondary); text-align: left;
        transition: color 0.3s;
      }
      .data-table td {
        padding: 13px 16px;
        font-size: 13px; color: var(--text-primary);
        border-bottom: 1px solid var(--table-row-border);
        transition: color 0.3s;
      }
      .data-table tbody tr { transition: background 0.15s; }
      .data-table tbody tr:hover { background: var(--table-row-hover); }
      .data-table tbody tr:last-child td { border-bottom: none; }
      .badge-kelas {
        display: inline-block;
        padding: 3px 9px;
        background: var(--badge-bg);
        border: 1px solid var(--badge-border);
        border-radius: 20px;
        font-size: 11px; font-weight: 500;
        color: var(--badge-color);
        transition: all 0.3s;
      }
      .num-cell { color: var(--text-muted) !important; font-size: 12px !important; }
      .btn-edit {
        padding: 5px 12px;
        background: rgba(255,180,0,0.12);
        border: 1.5px solid rgba(255,180,0,0.3);
        border-radius: 6px;
        color: #e8a800;
        font-size: 11px; font-weight: 600;
        font-family: 'DM Sans', sans-serif;
        cursor: pointer;
        transition: all 0.15s;
      }
      .app.light .btn-edit { background: rgba(200,140,0,0.1); border-color: rgba(200,140,0,0.3); color: #b07800; }
      .btn-edit:hover { background: rgba(255,180,0,0.22); box-shadow: 0 0 12px rgba(255,180,0,0.2); }
      .btn-hapus {
        padding: 5px 12px;
        background: rgba(255,60,80,0.12);
        border: 1.5px solid rgba(255,60,80,0.3);
        border-radius: 6px;
        color: #ff6070;
        font-size: 11px; font-weight: 600;
        font-family: 'DM Sans', sans-serif;
        cursor: pointer;
        transition: all 0.15s;
        margin-left: 5px;
      }
      .app.light .btn-hapus { background: rgba(200,30,50,0.08); border-color: rgba(200,30,50,0.25); color: #c82030; }
      .btn-hapus:hover { background: rgba(255,60,80,0.22); box-shadow: 0 0 12px rgba(255,60,80,0.2); }
      /* Form container and card colors */
      .form-page-body { padding: 24px; position: relative; z-index: 1; }
      .form-page-card {
        max-width: 540px; margin: 0 auto;
        background: var(--bg-surface);
        border: 1px solid var(--border);
        border-radius: 18px;
        padding: 30px;
        box-shadow: var(--card-shadow);
        transition: background 0.35s, border-color 0.35s, box-shadow 0.35s;
      }
      .form-page-title {
        font-family: 'Syne', sans-serif;
        font-size: 17px; font-weight: 700;
        color: var(--text-heading);
        transition: color 0.3s;
      }
      .form-page-sub { font-size: 12.5px; color: var(--text-muted); margin-bottom: 22px; margin-top: 4px; transition: color 0.3s; }
      .form-divider {
        height: 1px;
        background: var(--neon-line);
        margin-bottom: 22px;
        transition: background 0.3s;
      }
      .form-row { display: grid; grid-template-columns: repeat(2,1fr); gap: 14px; }
      .form-group { margin-bottom: 16px; }
      .form-label {
        display: block;
        font-size: 11px; font-weight: 600;
        color: var(--text-secondary);
        margin-bottom: 6px;
        letter-spacing: 0.6px;
        text-transform: uppercase;
        transition: color 0.3s;
      }
      /* Input field colors and select dropdown styling */
      .form-input {
        width: 100%;
        padding: 10px 13px;
        background: var(--input-bg);
        border: 1px solid var(--border);
        border-radius: 9px;
        color: var(--text-primary);
        font-size: 13.5px;
        font-family: 'DM Sans', sans-serif;
        outline: none;
        transition: all 0.2s;
      }
      select.form-input {
        background: rgba(255,255,255,0.12);
        color: var(--text-primary);
      }
      select.form-input option {
        background: #12101b;
        color: #f4f4ff;
      }
      .form-input:focus {
        border-color: rgba(120,60,255,0.6);
        background: var(--input-focus-bg);
        box-shadow: 0 0 0 3px rgba(120,60,255,0.1);
      }
      .form-input::placeholder { color: var(--search-placeholder); }
      /* Submit button colors */
      .btn-simpan {
        padding: 11px 24px;
        background: linear-gradient(135deg, #7c3aff 0%, #3b6bff 100%);
        border: none; border-radius: 9px;
        color: #fff; font-size: 13px; font-weight: 600;
        font-family: 'DM Sans', sans-serif;
        cursor: pointer;
        box-shadow: 0 0 22px rgba(120,60,255,0.38);
        transition: all 0.2s;
      }
      .btn-simpan:hover { box-shadow: 0 0 36px rgba(120,60,255,0.58); transform: translateY(-1px); }
      .btn-batal {
        padding: 11px 20px;
        background: var(--bg-surface);
        border: 1px solid var(--border);
        border-radius: 9px;
        color: var(--text-secondary);
        font-size: 13px; font-weight: 500;
        font-family: 'DM Sans', sans-serif;
        cursor: pointer; margin-right: 10px;
        transition: all 0.2s;
      }
      .btn-batal:hover { background: rgba(120,60,255,0.07); }
      .stat-cards { display: grid; grid-template-columns: repeat(3,1fr); gap: 12px; margin-bottom: 22px; }
      /* Dashboard stat card colors */
      .stat-card {
        background: var(--bg-surface);
        border: 1px solid var(--border-soft);
        border-radius: 11px;
        padding: 15px 16px;
        position: relative; overflow: hidden;
        transition: background 0.35s, border-color 0.35s;
      }
      .stat-card::before {
        content: '';
        position: absolute; top: 0; left: 0; right: 0; height: 2px;
        background: var(--stat-border-top);
        opacity: 0.75;
      }
      .stat-label { font-size: 10.5px; color: var(--text-muted); font-weight: 600; text-transform: uppercase; letter-spacing: 0.6px; margin-bottom: 7px; transition: color 0.3s; }
      .stat-value { font-family: 'Syne', sans-serif; font-size: 21px; font-weight: 700; color: var(--text-heading); transition: color 0.3s; }
      .stat-sub { font-size: 11px; color: var(--text-muted); margin-top: 3px; transition: color 0.3s; }
      .icon-cell { display: flex; align-items: center; gap: 8px; }
      .avatar-sm {
        width: 28px; height: 28px; border-radius: 50%;
        background: linear-gradient(135deg,#5b21b6,#1e40af);
        display: flex; align-items: center; justify-content: center;
        font-size: 10px; font-weight: 700; color: #c4b5fd;
        flex-shrink: 0;
      }
      .alert-message {
        margin-bottom: 18px;
        padding: 14px 18px;
        border-radius: 12px;
        background: rgba(56, 178, 255, 0.1);
        border: 1px solid rgba(56, 178, 255, 0.2);
        color: #cce7ff;
      }
      .alert-error {
        background: rgba(255, 60, 80, 0.12);
        border-color: rgba(255, 60, 80, 0.3);
        color: #ffb3c8;
      }
      .form-errors { margin-bottom: 16px; }
      .form-errors li { margin-bottom: 6px; }
    </style>

    @stack('styles')
</head>
<body>
    <div class="app" id="mainApp">
        @yield('content')
    </div>

    <script>
      let isLight = false;

      function setTheme(lightMode) {
        isLight = lightMode;
        localStorage.setItem('theme', lightMode ? 'light' : 'dark');
        const app = document.getElementById('mainApp');
        if (app) {
          app.classList.toggle('light', isLight);
        }
        const icon = isLight ? '☀️' : '🌙';
        document.querySelectorAll('.mode-toggle, .header-mode-toggle').forEach(btn => {
          if (btn) btn.textContent = icon;
        });
      }

      function toggleMode() {
        setTheme(!isLight);
      }

      function initTheme() {
        const storedTheme = localStorage.getItem('theme');
        setTheme(storedTheme === 'light');
      }

      if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initTheme);
      } else {
        initTheme();
      }
    </script>

    @stack('scripts')
</body>
</html>
