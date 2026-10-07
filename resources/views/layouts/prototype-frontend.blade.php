<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'SiswaNow'))</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">

    <style>
      @import url('https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:wght@300;400;500&display=swap');

      * { margin:0; padding:0; box-sizing:border-box; }

      .app {
        font-family:'DM Sans',sans-serif;
        --bg:#09080f;
        --surface:rgba(255,255,255,0.04);
        --border:rgba(140,90,255,0.22);
        --border-soft:rgba(140,90,255,0.12);
        --text:#e2e0f0;
        --muted:#8880b0;
        --dim:#5048a0;
        --heading:#f0ecff;
        --orb1:rgba(110,60,255,0.2);
        --orb2:rgba(30,100,255,0.16);
        --orb3:rgba(160,60,255,0.1);
        background:var(--bg);
        color:var(--text);
        min-height:100vh;
        transition:background 0.35s,color 0.35s;
      }

      .app.light {
        --bg:#f3f0ff;
        --surface:rgba(255,255,255,0.85);
        --border:rgba(110,60,220,0.25);
        --border-soft:rgba(110,60,220,0.12);
        --text:#2a2040;
        --muted:#6048a8;
        --dim:#9080c0;
        --heading:#1a1030;
        --orb1:rgba(140,80,255,0.1);
        --orb2:rgba(60,120,255,0.08);
        --orb3:rgba(160,60,255,0.07);
      }

      body { margin:0; }

      .navbar {
        display:flex;
        align-items:center;
        justify-content:space-between;
        padding:16px 32px;
        background:rgba(9,8,15,0.7);
        border-bottom:1px solid var(--border-soft);
        backdrop-filter:blur(16px);
        position:relative;
        z-index:10;
        transition:background 0.3s,border-color 0.3s;
      }

      .app.light .navbar { background:rgba(243,240,255,0.8); }

      .nav-brand { display:flex; align-items:center; gap:10px; }
      .brand-icon {
        width:36px; height:36px;
        background:linear-gradient(135deg,#7c3aff,#3b6bff);
        border-radius:10px;
        display:flex; align-items:center; justify-content:center;
        font-size:17px;
        box-shadow:0 0 20px rgba(120,60,255,0.45);
      }

      .brand-text {
        font-family:'Syne',sans-serif;
        font-size:17px; font-weight:800;
        color:var(--heading);
        letter-spacing:-0.3px;
        transition:color 0.3s;
      }

      .brand-text span { color:#9060ff; }

      .nav-right { display:flex; align-items:center; gap:10px; }

      .mode-btn {
        width:34px; height:34px;
        border-radius:50%;
        border:1px solid var(--border);
        background:var(--surface);
        cursor:pointer;
        display:flex; align-items:center; justify-content:center;
        font-size:15px;
        transition:all 0.25s;
      }

      .mode-btn:hover { border-color:rgba(120,60,255,0.5); transform:rotate(20deg) scale(1.08); }

      .btn-nav-login,
      .btn-nav-register {
        padding:7px 16px;
        border-radius:8px;
        font-size:13px; font-weight:500;
        font-family:'DM Sans',sans-serif;
        text-decoration:none;
        display:inline-flex;
        align-items:center;
        justify-content:center;
      }

      .btn-nav-login {
        background:transparent;
        border:1px solid var(--border);
        color:var(--muted);
      }

      .btn-nav-login:hover {
        border-color:rgba(120,60,255,0.5);
        color:var(--heading);
        background:rgba(120,60,255,0.07);
      }

      .btn-nav-register {
        background:linear-gradient(135deg,#7c3aff,#3b6bff);
        border:none;
        color:#fff;
        font-weight:600;
        box-shadow:0 0 18px rgba(120,60,255,0.35);
      }

      .btn-nav-register:hover {
        box-shadow:0 0 28px rgba(120,60,255,0.55);
        transform:translateY(-1px);
      }

      .hero {
        position:relative;
        overflow:hidden;
        padding:70px 32px 60px;
        text-align:center;
        min-height:100vh;
        display:flex;
        flex-direction:column;
        align-items:center;
        justify-content:center;
      }

      .orb {
        position:absolute;
        border-radius:50%;
        filter:blur(80px);
        pointer-events:none;
        transition:background 0.35s;
      }

      .orb-a { width:350px; height:350px; background:var(--orb1); top:-100px; left:-80px; }
      .orb-b { width:280px; height:280px; background:var(--orb2); bottom:-80px; right:-60px; }
      .orb-c { width:200px; height:200px; background:var(--orb3); top:40%; left:55%; }

      .hero-badge {
        display:inline-flex; align-items:center; gap:7px;
        padding:5px 14px;
        background:rgba(120,60,255,0.12);
        border:1px solid rgba(120,60,255,0.28);
        border-radius:20px;
        font-size:11.5px; font-weight:600;
        color:#a080ff;
        letter-spacing:0.3px;
        margin-bottom:22px;
        position:relative; z-index:1;
      }

      .hero-title {
        font-family:'Syne',sans-serif;
        font-size:40px; font-weight:800;
        color:var(--heading);
        line-height:1.15;
        letter-spacing:-1px;
        margin-bottom:16px;
        position:relative; z-index:1;
        transition:color 0.3s;
      }

      .hero-title .hl {
        background:linear-gradient(135deg,#9060ff,#4080ff);
        -webkit-background-clip:text;
        -webkit-text-fill-color:transparent;
        background-clip:text;
      }

      .hero-desc {
        font-size:15px; color:var(--muted);
        max-width:480px;
        line-height:1.7;
        margin-bottom:32px;
        position:relative; z-index:1;
        transition:color 0.3s;
      }

      .hero-btns {
        display:flex; align-items:center; gap:12px; flex-wrap:wrap; justify-content:center;
        position:relative; z-index:1;
        margin-bottom:48px;
      }

      .btn-cta {
        display:flex; align-items:center; gap:7px;
        padding:12px 26px;
        background:linear-gradient(135deg,#7c3aff,#3b6bff);
        border:none; border-radius:11px;
        color:#fff; font-size:14px; font-weight:600;
        font-family:'DM Sans',sans-serif;
        cursor:pointer;
        box-shadow:0 0 30px rgba(120,60,255,0.4);
        transition:all 0.2s;
        letter-spacing:0.2px;
        text-decoration:none;
      }

      .btn-cta:hover { box-shadow:0 0 48px rgba(120,60,255,0.6); transform:translateY(-2px); }

      .btn-ghost {
        display:flex; align-items:center; gap:7px;
        padding:12px 24px;
        background:var(--surface);
        border:1px solid var(--border);
        border-radius:11px;
        color:var(--muted);
        font-size:14px; font-weight:500;
        font-family:'DM Sans',sans-serif;
        cursor:pointer;
        transition:all 0.2s;
        text-decoration:none;
      }

      .btn-ghost:hover { border-color:rgba(120,60,255,0.4); color:var(--heading); background:rgba(120,60,255,0.06); }

      .preview-wrap {
        position:relative; z-index:1;
        animation:fadeIn 0.7s 0.35s ease both;
        max-width:700px; width:100%;
      }

      .preview-glow {
        position:absolute;
        inset:-1px;
        border-radius:17px;
        background:linear-gradient(135deg,rgba(120,60,255,0.5),rgba(60,100,255,0.4),rgba(120,60,255,0.2));
        filter:blur(2px);
        z-index:-1;
      }

      .preview-card {
        background:rgba(15,12,28,0.92);
        border:1px solid rgba(140,90,255,0.25);
        border-radius:16px;
        overflow:hidden;
        backdrop-filter:blur(10px);
      }

      .app.light .preview-card { background:rgba(248,244,255,0.95); border-color:rgba(110,60,220,0.2); }

      .preview-bar {
        display:flex; align-items:center;
        padding:10px 14px;
        background:rgba(120,60,255,0.08);
        border-bottom:1px solid rgba(140,90,255,0.15);
        gap:6px;
      }

      .dot-r { width:9px;height:9px;border-radius:50%;background:#ff5f57; }
      .dot-y { width:9px;height:9px;border-radius:50%;background:#febc2e; }
      .dot-g { width:9px;height:9px;border-radius:50%;background:#28c840; }

      .preview-url {
        margin-left:8px; flex:1;
        background:rgba(255,255,255,0.05);
        border:1px solid rgba(140,90,255,0.15);
        border-radius:5px;
        padding:3px 10px;
        font-size:10.5px; color:var(--dim);
        font-family:'DM Sans',sans-serif;
        text-align:center;
      }

      .app.light .preview-url { background:rgba(0,0,0,0.04); }

      .preview-body { padding:14px 16px; }

      .mini-header {
        display:flex; align-items:center; justify-content:space-between;
        margin-bottom:12px;
      }

      .mini-brand { display:flex;align-items:center;gap:6px; }
      .mini-dot { width:20px;height:20px;background:linear-gradient(135deg,#7c3aff,#3b6bff);border-radius:5px;display:flex;align-items:center;justify-content:center;font-size:9px;box-shadow:0 0 10px rgba(120,60,255,0.4); }
      .mini-name { font-family:'Syne',sans-serif;font-size:10px;font-weight:700;color:var(--heading); }

      .mini-logout {
        padding:3px 8px;
        background:rgba(255,60,80,0.15);
        border:1px solid rgba(255,60,80,0.35);
        border-radius:4px;
        color:#ff6070; font-size:9px; font-weight:600;
        font-family:'DM Sans',sans-serif;
      }

      .app.light .mini-logout { background:rgba(200,30,50,0.08);border-color:rgba(200,30,50,0.25);color:#c82030; }

      .mini-stats { display:grid;grid-template-columns:repeat(3,1fr);gap:7px;margin-bottom:10px; }

      .mini-stat {
        background:rgba(255,255,255,0.03);
        border:1px solid rgba(140,90,255,0.12);
        border-radius:7px; padding:7px 8px;
        position:relative; overflow:hidden;
      }

      .app.light .mini-stat { background:rgba(255,255,255,0.7);border-color:rgba(110,60,220,0.12); }

      .mini-stat::before { content:'';position:absolute;top:0;left:0;right:0;height:1.5px;background:linear-gradient(90deg,#7c3aff,#3b6bff); }
      .mini-stat-label { font-size:7.5px;font-weight:600;text-transform:uppercase;letter-spacing:0.5px;color:var(--dim);margin-bottom:3px; }
      .mini-stat-val { font-family:'Syne',sans-serif;font-size:14px;font-weight:700;color:var(--heading); }

      .mini-table-wrap {
        background:rgba(255,255,255,0.02);
        border:1px solid rgba(140,90,255,0.1);
        border-radius:8px; overflow:hidden;
      }

      .app.light .mini-table-wrap { background:rgba(255,255,255,0.7);border-color:rgba(110,60,220,0.1); }
      .mini-table { width:100%;border-collapse:collapse; }
      .mini-table thead tr { background:rgba(120,60,255,0.07);border-bottom:1px solid rgba(140,90,255,0.15); }
      .mini-table th { padding:5px 8px;font-size:7.5px;font-weight:600;text-transform:uppercase;letter-spacing:0.5px;color:var(--muted);text-align:left; }
      .mini-table td { padding:6px 8px;font-size:9px;color:var(--text);border-bottom:1px solid rgba(255,255,255,0.03); }
      .app.light .mini-table td { border-bottom-color:rgba(0,0,0,0.04); }
      .mini-table tbody tr:last-child td { border-bottom:none; }
      .mini-badge { display:inline-block;padding:1px 6px;background:rgba(60,100,255,0.15);border:1px solid rgba(60,100,255,0.22);border-radius:10px;font-size:8px;font-weight:500;color:#80a8ff; }
      .app.light .mini-badge { background:rgba(60,80,220,0.1);border-color:rgba(60,80,220,0.18);color:#3b5bdb; }
      .mini-edit { padding:2px 7px;background:rgba(255,180,0,0.12);border:1px solid rgba(255,180,0,0.28);border-radius:3px;color:#e8a800;font-size:7.5px;font-weight:600;font-family:'DM Sans',sans-serif; }
      .mini-del { padding:2px 7px;background:rgba(255,60,80,0.12);border:1px solid rgba(255,60,80,0.28);border-radius:3px;color:#ff6070;font-size:7.5px;font-weight:600;font-family:'DM Sans',sans-serif;margin-left:3px; }
      .app.light .mini-edit { background:rgba(200,140,0,0.1);border-color:rgba(200,140,0,0.25);color:#b07800; }
      .app.light .mini-del { background:rgba(200,30,50,0.08);border-color:rgba(200,30,50,0.22);color:#c82030; }

      .features {
        padding:40px 32px 50px;
        position:relative; z-index:1;
      }

      .section-label {
        text-align:center;
        font-size:11px; font-weight:600;
        text-transform:uppercase; letter-spacing:1px;
        color:var(--dim); margin-bottom:10px;
      }

      .section-title {
        text-align:center;
        font-family:'Syne',sans-serif;
        font-size:22px; font-weight:700;
        color:var(--heading);
        margin-bottom:28px;
        letter-spacing:-0.3px;
      }

      .feat-grid { display:grid;grid-template-columns:repeat(3,1fr);gap:14px;max-width:700px;margin:0 auto; }

      .feat-card {
        background:var(--surface);
        border:1px solid var(--border-soft);
        border-radius:14px; padding:20px 18px;
        position:relative; overflow:hidden;
        transition:background 0.3s,border-color 0.3s,transform 0.2s;
        cursor:default;
      }

      .feat-card:hover { transform:translateY(-3px); border-color:rgba(120,60,255,0.3); }

      .feat-icon {
        width:38px; height:38px;
        background:rgba(120,60,255,0.14);
        border:1px solid rgba(120,60,255,0.25);
        border-radius:10px;
        display:flex; align-items:center; justify-content:center;
        font-size:17px; margin-bottom:12px;
      }

      .feat-title { font-family:'Syne',sans-serif;font-size:13px;font-weight:700;color:var(--heading);margin-bottom:6px; }
      .feat-desc { font-size:12px;color:var(--dim);line-height:1.6; }

      .footer {
        padding:20px 32px;
        border-top:1px solid var(--border-soft);
        display:flex; align-items:center; justify-content:space-between;
        flex-wrap:wrap; gap:10px;
      }

      .footer-brand { font-family:'Syne',sans-serif;font-size:13px;font-weight:700;color:var(--muted); }
      .footer-brand span { color:#9060ff; }
      .footer-copy { font-size:11.5px;color:var(--dim); }

      .neon-divider {
        height:1px;
        background:linear-gradient(90deg,transparent,rgba(140,90,255,0.5),rgba(60,100,255,0.5),transparent);
        margin-bottom:0;
      }

      .auth-card {
        width:100%; max-width:460px;
        margin:0 auto;
        background:var(--surface);
        border:1px solid var(--border);
        border-radius:18px;
        padding:34px 30px;
        box-shadow:0 0 60px rgba(120,60,255,0.12), inset 0 1px 0 rgba(255,255,255,0.07);
      }

      .auth-title {
        font-family:'Syne',sans-serif;
        font-size:26px; font-weight:800;
        color:var(--heading);
        margin-bottom:8px;
      }

      .auth-subtitle { color:var(--muted); margin-bottom:26px; }

      .form-group { margin-bottom:18px; }
      .form-label {
        display:block;
        font-size:11px; font-weight:600;
        color:var(--dim);
        margin-bottom:8px;
        letter-spacing:0.6px;
        text-transform:uppercase;
        text-align:left;
      }

      .form-input {
        width:100%; padding:12px 14px;
        background:rgba(255,255,255,0.05);
        border:1px solid var(--border);
        border-radius:12px;
        color:var(--text);
        font-size:14px;
        outline:none;
        transition:all 0.2s;
      }

      .form-input:focus {
        border-color:rgba(120,60,255,0.6);
        background:rgba(255,255,255,0.08);
      }

      .form-error { margin-top:8px; color:#ffb3c8; font-size:13px; }
      .form-actions { display:flex; justify-content:space-between; align-items:center; gap:12px; flex-wrap:wrap; margin-top:20px; }

      .auth-link {
        color:var(--muted);
        font-size:13px;
        text-decoration:none;
      }

      .auth-link:hover { color:var(--heading); }

      .button-full {
        width:100%;
        text-align:left;
      }

      @keyframes fadeIn { from{opacity:0;transform:translateY(16px)} to{opacity:1;transform:translateY(0)} }
    </style>
</head>
<body>
    <div class="app" id="landingApp">
        @yield('content')
    </div>

    <script>
      let isLight = false;

      function setTheme(lightMode) {
        isLight = lightMode;
        localStorage.setItem('theme', lightMode ? 'light' : 'dark');
        const app = document.getElementById('landingApp');
        if (app) {
          app.classList.toggle('light', isLight);
        }
        const icon = isLight ? '☀️' : '🌙';
        document.querySelectorAll('#modeBtn, .mode-btn').forEach(btn => {
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
</body>
</html>
