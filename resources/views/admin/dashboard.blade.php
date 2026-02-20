<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard — Hariz Studio</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              primary: "#D946EF",
              secondary: "#06B6D4",
            },
            fontFamily: { sans: ['Inter', 'sans-serif'] },
          }
        }
      };
    </script>

    <!-- Theme boot (NO flash) -->
    <script>
      (function () {
        const saved = localStorage.getItem('theme');
        const prefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
        const theme = saved ? saved : (prefersDark ? 'dark' : 'light');
        document.documentElement.classList.toggle('dark', theme === 'dark');
      })();
    </script>

    <style>
        * { font-family: 'Inter', sans-serif; }

        /* ==========================================================
           THEME TOKENS (CSS VARIABLES)
           Switch by toggling: <html class="dark">
        ========================================================== */

        /* Light defaults */
        :root{
            --page-bg: #f8f8f8;
            --page-text: #111111;

            --card-bg: #ffffff;
            --card-border: rgba(0,0,0,0.07);
            --card-hover-border: rgba(217,70,239,0.20);
            --card-hover-shadow: 0 8px 30px rgba(217,70,239,0.07);

            --topbar-bg: rgba(255,255,255,0.80);
            --topbar-border: rgba(0,0,0,0.05);

            --muted: rgba(0,0,0,0.35);
            --muted-2: rgba(0,0,0,0.45);
            --muted-3: rgba(0,0,0,0.30);

            --input-bg: #ffffff;
            --input-border: rgba(0,0,0,0.14);
            --input-text: #000000;
            --input-placeholder: rgba(0,0,0,0.4);
            --input-focus-bg: #ffffff;
            --input-focus-ring: rgba(217,70,239,0.12);

            --btn-primary-bg: #111111;
            --btn-primary-bg-hover: #333333;
            --btn-primary-text: #ffffff;

            --btn-ghost-bg: #ffffff;
            --btn-ghost-text: #111111;
            --btn-ghost-border: rgba(0,0,0,0.12);

            --divider: rgba(0,0,0,0.08);

            /* Sidebar (Light mode) */
            --sidebar-bg: rgba(255, 255, 255, 0.95);
            --sidebar-divider: rgba(0,0,0,0.06);
            --sidebar-link: rgba(0,0,0,0.5);
            --sidebar-link-hover-bg: rgba(217,70,239,0.06);
            --sidebar-link-hover: #D946EF;
            --sidebar-logo: #111111;
            --sidebar-heading: rgba(0,0,0,0.4);
            --sidebar-sub: rgba(0,0,0,0.5);
            --sidebar-icon-bg: rgba(0,0,0,0.04);

            /* Scrollbar */
            --scroll-thumb: #E2E8F0;
            --scroll-thumb-hover: #CBD5E1;
            --scroll-track: transparent;
        }

        /* Dark overrides */
        html.dark{
            --page-bg: #0b0b0f;
            --page-text: rgba(255,255,255,0.92);

            --card-bg: rgba(255,255,255,0.04);
            --card-border: rgba(255,255,255,0.10);
            --card-hover-border: rgba(217,70,239,0.28);
            --card-hover-shadow: 0 10px 35px rgba(0,0,0,0.35);

            --topbar-bg: rgba(10,10,12,0.75);
            --topbar-border: rgba(255,255,255,0.08);

            --muted: rgba(255,255,255,0.45);
            --muted-2: rgba(255,255,255,0.55);
            --muted-3: rgba(255,255,255,0.40);

            --input-bg: rgba(255,255,255,0.06);
            --input-border: rgba(255,255,255,0.12);
            --input-text: #ffffff;
            --input-placeholder: rgba(255,255,255,0.45);
            --input-focus-bg: #000000;
            --input-focus-ring: rgba(217,70,239,0.25);

            --btn-primary-bg: rgba(255,255,255,0.10);
            --btn-primary-bg-hover: rgba(255,255,255,0.16);
            --btn-primary-text: #ffffff;

            --btn-ghost-bg: rgba(255,255,255,0.06);
            --btn-ghost-text: rgba(255,255,255,0.88);
            --btn-ghost-border: rgba(255,255,255,0.12);

            --divider: rgba(255,255,255,0.14);

            /* Sidebar (Dark mode) */
            --sidebar-bg: #050508;
            --sidebar-divider: rgba(255,255,255,0.08);
            --sidebar-link: rgba(255,255,255,0.5);
            --sidebar-link-hover-bg: rgba(255,255,255,0.06);
            --sidebar-link-hover: #ffffff;
            --sidebar-logo: #ffffff;
            --sidebar-heading: rgba(255,255,255,0.3);
            --sidebar-sub: rgba(255,255,255,0.4);
            --sidebar-icon-bg: rgba(255,255,255,0.06);

            --scroll-thumb: rgba(255,255,255,0.1);
            --scroll-thumb-hover: #D946EF;
            --scroll-track: rgba(0,0,0,0.2);

            /* Deep Dark Inputs */
            --input-bg: #040406;
            --input-border: rgba(255,255,255,0.12);
            --input-text: #ffffff;
            --input-placeholder: rgba(255,255,255,0.3);
            --input-focus-bg: #000000;
            --input-focus-ring: rgba(217,70,239,0.25);
        }

        /* Helper for Forced Consistency */
        :root:not(.dark) .dash-card { background: #ffffff; border: 1px solid rgba(0,0,0,0.08); }
        .dark .dash-card { background: var(--card-bg); border: 1px solid var(--card-border); }

        body { background: var(--page-bg); color: var(--page-text); }

        /* Global Scrollbar */
        ::-webkit-scrollbar { width: 5px; height: 5px; }
        ::-webkit-scrollbar-track { background: var(--scroll-track); }
        ::-webkit-scrollbar-thumb { background: var(--scroll-thumb); border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: var(--scroll-thumb-hover); }

        /* Sidebar Scrollbar - Vibrant Gradient */
        #sidebar nav::-webkit-scrollbar { width: 6px; }
        #sidebar nav::-webkit-scrollbar-track { background: var(--scroll-track); }
        #sidebar nav::-webkit-scrollbar-thumb { 
            background: linear-gradient(to bottom, #D946EF, #06B6D4) !important; 
            border-radius: 20px;
        }
        #sidebar nav::-webkit-scrollbar-thumb:hover { 
            background: #D946EF !important; 
        }
        
        /* Firefox */
        #sidebar nav { scrollbar-width: thin; scrollbar-color: #D946EF transparent; }

        /* Sidebar */
        .sidebar {
            background: var(--sidebar-bg) !important;
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
        }
        .sidebar-link {
            display: flex; align-items: center; gap: 12px;
            padding: 10px 14px; border-radius: 12px;
            font-size: 11px; font-weight: 700; text-transform: uppercase;
            letter-spacing: 0.1em; color: var(--sidebar-link);
            transition: all 0.2s ease; text-decoration: none;
        }
        .sidebar-link:hover { background: var(--sidebar-link-hover-bg); color: var(--sidebar-link-hover); }
        .sidebar-link.active { background: rgba(217,70,239,0.15); color: #D946EF; }
        .sidebar-link .icon {
            width: 32px; height: 32px; border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            background: var(--sidebar-icon-bg); font-size: 14px; flex-shrink: 0;
        }
        .sidebar-link:hover .icon, .sidebar-link.active .icon {
            background: rgba(217,70,239,0.2);
        }

        /* Cards */
        .dash-card {
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            border-radius: 20px;
            transition: all 0.3s ease;
        }
        .dash-card:hover { border-color: var(--card-hover-border); box-shadow: var(--card-hover-shadow); }

        /* Form inputs - Unified Studio Design */
        .dash-input {
            width: 100% !important; padding: 18px 24px !important;
            background: var(--input-bg) !important;
            border: 1.5px solid var(--input-border) !important;
            border-radius: 12px !important; 
            font-size: 15px !important; font-weight: 500 !important;
            color: var(--input-text) !important; outline: none !important;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1) !important;
            box-shadow: 0 2px 4px rgba(0,0,0,0.02) !important;
        }
        .dash-input:hover {
            border-color: rgba(217,70,239,0.4) !important;
            background: var(--input-focus-bg) !important;
            box-shadow: 0 4px 12px rgba(0,0,0,0.04) !important;
        }
        .dash-input:focus {
            background: var(--input-focus-bg) !important;
            border-color: #D946EF !important;
            box-shadow: 0 0 0 4px var(--input-focus-ring) !important;
            transform: scale(1.005) translateY(-1px) !important;
        }
        .dash-input:active { transform: scale(1) !important; }
        .dash-input::placeholder { 
            color: var(--input-placeholder) !important; 
            font-size: 11px !important; 
            font-weight: 800 !important; 
            text-transform: uppercase !important;
            letter-spacing: 0.25em !important;
            opacity: 1 !important;
        }

        /* Custom File Input - Substantial */
        .dash-file-input::-webkit-file-upload-button {
            background: #000000 !important;
            color: #ffffff !important;
            border: none !important; padding: 12px 24px !important;
            border-radius: 12px !important; font-size: 10px !important;
            font-weight: 900 !important; text-transform: uppercase !important;
            letter-spacing: 0.15em !important; margin-right: 15px !important;
            cursor: pointer !important; transition: all 0.2s ease !important;
        }
        .dark .dash-file-input::-webkit-file-upload-button {
            background: #ffffff !important;
            color: #000000 !important;
        }

        textarea.dash-input { min-height: 140px; line-height: 1.6; resize: vertical; }

        /* Buttons */
        .btn-primary {
            background: var(--btn-primary-bg); color: var(--btn-primary-text); border: none;
            padding: 14px 24px; border-radius: 14px;
            font-size: 10px; font-weight: 900; text-transform: uppercase;
            letter-spacing: 0.2em; cursor: pointer; transition: all 0.2s ease;
            width: 100%;
        }
        .btn-primary:hover { background: var(--btn-primary-bg-hover); transform: translateY(-1px); }

        .btn-gradient {
            background: linear-gradient(to right, #D946EF, #06B6D4);
            color: #fff; border: none;
            padding: 14px 24px; border-radius: 14px;
            font-size: 10px; font-weight: 900; text-transform: uppercase;
            letter-spacing: 0.2em; cursor: pointer; transition: all 0.2s ease;
            width: 100%; box-shadow: 0 0 20px rgba(217,70,239,0.25);
        }
        .btn-gradient:hover { opacity: 0.9; box-shadow: 0 0 30px rgba(217,70,239,0.4); }

        .btn-ghost {
            background: var(--btn-ghost-bg); color: var(--btn-ghost-text);
            border: 1px solid var(--btn-ghost-border);
            padding: 8px 16px; border-radius: 10px;
            font-size: 10px; font-weight: 800; text-transform: uppercase;
            letter-spacing: 0.15em; cursor: pointer; transition: all 0.2s ease;
        }
        .btn-ghost:hover { border-color: #D946EF; color: #D946EF; }

        .btn-save {
            background: rgba(217,70,239,0.1); color: #D946EF;
            border: 1px solid rgba(217,70,239,0.2);
            padding: 10px 20px; border-radius: 10px;
            font-size: 10px; font-weight: 800; text-transform: uppercase;
            letter-spacing: 0.15em; cursor: pointer; transition: all 0.2s ease;
            width: 100%;
        }
        .btn-save:hover { background: #D946EF; color: #fff; }

        /* Section headings */
        .section-label { font-size: 10px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.2em; color: #D946EF; }
        .section-title { font-size: 22px; font-weight: 900; color: var(--page-text); letter-spacing: -0.02em; margin-top: 4px; }
        .section-sub { font-size: 11px; color: var(--muted); font-weight: 500; margin-top: 2px; }

        /* Edit/delete action buttons */
        .action-btn {
            width: 32px; height: 32px; border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            font-size: 13px; cursor: pointer; border: none;
            opacity: 0; transition: all 0.2s ease;
        }
        .group:hover .action-btn { opacity: 1; }
        .action-btn-edit { background: rgba(217,70,239,0.1); color: #D946EF; }
        .action-btn-edit:hover { background: #D946EF; color: #fff; }
        .action-btn-del { background: rgba(239,68,68,0.1); color: #ef4444; }
        .action-btn-del:hover { background: #ef4444; color: #fff; }

        /* Gradient text */
        .text-gradient {
            background: linear-gradient(to right, #D946EF, #06B6D4);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Tag badge */
        .tag {
            display: inline-block; padding: 3px 10px; border-radius: 999px;
            font-size: 9px; font-weight: 800; text-transform: uppercase;
            letter-spacing: 0.15em;
            background: rgba(217,70,239,0.1); color: #D946EF;
        }

        /* Bottom accent bar */
        .accent-bar { background: linear-gradient(to right, #D946EF, #a855f7, #06B6D4); }

        /* Form section divider */
        .form-divider { border: none; border-top: 1px solid var(--divider); margin: 24px 0; }

        /* Label */
        .field-label {
            display: block; font-size: 10.5px; font-weight: 950;
            text-transform: uppercase; letter-spacing: 0.35em;
            color: var(--page-text) !important; margin-bottom: 14px; padding-left: 2px;
            transition: all 0.2s ease;
            opacity: 0.85;
        }
        .dash-input:focus + .field-label,
        .field-label:has(+ .dash-input:focus) { 
            opacity: 1;
            color: #D946EF !important;
            transform: translateX(4px);
        }

        /* Animate fade */
        @keyframes fadeIn { from { opacity: 0; transform: translateY(8px); } to { opacity: 1; transform: translateY(0); } }
        .animate-fade-in { animation: fadeIn 0.3s ease forwards; }

        /* Topbar uses vars */
        .topbar {
            background: var(--topbar-bg);
            border-bottom: 1px solid var(--topbar-border);
        }

        /* Text helpers for dark */
        .text-main { color: var(--page-text); }
        .text-muted { color: var(--muted); }

        /* Mobile header background follow sidebar */
        .mobile-header {
            background: var(--sidebar-bg);
            border-bottom: 1px solid var(--sidebar-divider);
        }
    </style>
</head>
<body>

<!-- Mobile Header -->
<div class="md:hidden mobile-header p-4 sticky top-0 z-60 flex items-center justify-between backdrop-blur-lg">
    <div class="flex items-center gap-3">
        <div class="w-8 h-8 rounded-xl bg-gradient-to-br from-primary to-secondary flex items-center justify-center text-white text-xs font-black shadow-lg shadow-primary/20">H</div>
        <span class="font-black text-xs uppercase tracking-widest" style="color: var(--sidebar-logo)">HARIZ.<span class="text-gradient">STUDIO</span></span>
    </div>

    <div class="flex items-center gap-2">
        <!-- Theme toggle (same toggle affects sidebar too) -->
        <button type="button" onclick="toggleTheme()" class="p-2 rounded-xl text-white/60 hover:text-white transition">
            <i id="themeIconMobile" class="fas fa-moon"></i>
        </button>

        <button type="button" onclick="document.getElementById('sidebar').classList.toggle('-translate-x-full')" class="p-2 rounded-xl text-white/50 hover:text-white">
            <i class="fas fa-bars"></i>
        </button>
    </div>
</div>

<!-- Sidebar Overlay -->
<div id="sidebar-overlay" onclick="document.getElementById('sidebar').classList.add('-translate-x-full')" class="md:hidden fixed inset-0 bg-black/40 backdrop-blur-sm z-40 hidden"></div>

<!-- Sidebar -->
<aside id="sidebar" class="sidebar w-64 flex flex-col fixed inset-y-0 left-0 z-50 transition-all duration-300 -translate-x-full md:translate-x-0">
    <!-- Logo -->
    <div class="px-6 py-8 flex items-center gap-3 border-b" style="border-color: var(--sidebar-divider)">
        <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-primary to-secondary flex items-center justify-center text-white font-black text-sm shadow-lg shadow-primary/20">H</div>
        <div>
            <div class="font-black text-xs uppercase tracking-widest leading-none" style="color: var(--sidebar-logo)">HARIZ.</div>
            <div class="text-[9px] font-bold uppercase tracking-[0.2em] mt-0.5" style="color: var(--sidebar-sub)">Admin Panel</div>
        </div>
    </div>

    <nav class="flex-1 px-4 py-6 space-y-1 overflow-y-auto">
        <p class="px-3 text-[9px] font-black uppercase tracking-[0.2em] mb-3" style="color: var(--sidebar-heading)">Content</p>
        <a href="#portfolio" class="sidebar-link">
            <span class="icon">📂</span> Portfolio
        </a>
        <a href="#capabilities" class="sidebar-link">
            <span class="icon">🎯</span> Capabilities
        </a>
        <a href="#workflows" class="sidebar-link">
            <span class="icon">⚡</span> Workflow
        </a>

        <p class="px-3 text-[9px] font-black uppercase tracking-[0.2em] mb-3 mt-6" style="color: var(--sidebar-heading)">Business</p>
        <a href="#stats" class="sidebar-link">
            <span class="icon">📊</span> Statistics
        </a>
        <a href="#pricing" class="sidebar-link">
            <span class="icon">💰</span> Pricing
        </a>

        <p class="px-3 text-[9px] font-black uppercase tracking-[0.2em] mb-3 mt-6" style="color: var(--sidebar-heading)">Engagement</p>
        <a href="#reviews" class="sidebar-link">
            <span class="icon">💬</span> Testimonials
        </a>
        <a href="#faq" class="sidebar-link">
            <span class="icon">❓</span> FAQ
        </a>

        <p class="px-3 text-[9px] font-black uppercase tracking-[0.2em] mb-3 mt-6" style="color: var(--sidebar-heading)">Config</p>
        <a href="#settings" class="sidebar-link">
            <span class="icon">⚙️</span> Site Settings
        </a>
        <a href="#social-media" class="sidebar-link">
            <span class="icon">🔗</span> Social Links
        </a>

        <p class="px-3 text-[9px] font-black uppercase tracking-[0.2em] mb-3 mt-6" style="color: var(--sidebar-heading)">Maintenance</p>
        <a href="/admin/tools/storage-link" class="sidebar-link" target="_blank">
            <span class="icon">🔗</span> Storage Link
        </a>
        <a href="/admin/tools/clear-cache" class="sidebar-link" target="_blank">
            <span class="icon">🧹</span> Clear Cache
        </a>
    </nav>

    <div class="px-4 py-6 border-t" style="border-color: var(--sidebar-divider)">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="w-full flex items-center justify-between px-4 py-3 rounded-xl bg-red-500/10 hover:bg-red-500 text-red-400 hover:text-white transition-all duration-300 group">
                <span class="text-[10px] font-black uppercase tracking-widest">Logout</span>
                <i class="fas fa-arrow-right-from-bracket text-xs"></i>
            </button>
        </form>
    </div>
</aside>

<!-- Main Content -->
<div id="main-content" class="min-h-screen transition-all duration-300" style="margin-left:0">
    <style>
        @media (min-width: 768px) {
            #main-content { margin-left: 256px !important; }
            #main-content.sidebar-collapsed { margin-left: 0 !important; }
        }
        #sidebar.collapsed { width: 0 !important; overflow: hidden; }
    </style>

    <!-- Top Bar -->
    <header class="sticky top-0 z-30 backdrop-blur-md px-8 py-4 flex items-center justify-between topbar">
        <div>
            <h1 class="text-lg font-black tracking-tight text-main">Dashboard Hub</h1>
            <div class="flex items-center gap-2 mt-0.5">
                <span class="w-1.5 h-1.5 rounded-full bg-green-400 animate-pulse"></span>
                <span class="text-[10px] font-bold uppercase tracking-widest text-muted">System Operational</span>
            </div>
        </div>
        <div class="flex items-center gap-3">
            <!-- Theme toggle (one toggle) -->
            <button type="button" onclick="toggleTheme()" class="hidden md:flex items-center gap-2 px-4 py-2 rounded-xl border text-[10px] font-bold uppercase tracking-widest transition-all"
                    style="border-color: var(--btn-ghost-border); color: var(--muted-2); background: var(--btn-ghost-bg);">
                <i id="themeIconDesktop" class="fas fa-moon text-xs"></i>
                Theme
            </button>

            <button onclick="toggleSidebar()" class="hidden md:flex items-center gap-2 px-4 py-2 rounded-xl border border-black/8 text-[10px] font-bold uppercase tracking-widest text-gray-500 hover:border-primary hover:text-primary transition-all"
                    style="border-color: var(--btn-ghost-border); color: var(--muted-2); background: var(--btn-ghost-bg);">
                <i class="fas fa-bars text-xs"></i> Sidebar
            </button>

            <a href="/" class="flex items-center gap-2 px-4 py-2 rounded-xl text-[10px] font-black uppercase tracking-widest hover:opacity-80 transition-all"
               style="background: var(--btn-primary-bg); color: var(--btn-primary-text);">
                Preview <i class="fas fa-arrow-up-right-from-square text-xs"></i>
            </a>
        </div>
    </header>

    <main class="p-6 md:p-10 max-w-screen-xl mx-auto">

        @if(session('success'))
        <div class="mb-8 p-5 rounded-2xl flex items-center gap-4"
             style="background: rgba(34,197,94,0.10); border: 1px solid rgba(34,197,94,0.25);">
            <span class="w-9 h-9 rounded-xl bg-green-500 text-white flex items-center justify-center text-sm shadow-lg shadow-green-500/20">✓</span>
            <div>
                <p class="text-[9px] font-black uppercase tracking-widest" style="color: rgba(34,197,94,0.70);">Success</p>
                <p class="text-sm font-bold" style="color: rgba(34,197,94,0.95);">{{ session('success') }}</p>
            </div>
        </div>
        @endif

        <!-- ═══════════════════════════════ PORTFOLIO ═══════════════════════════════ -->
        <section id="portfolio" class="mb-20">
            <div class="flex justify-between items-end mb-8">
                <div>
                    <span class="section-label">Content</span>
                    <h2 class="section-title">Portfolio Works</h2>
                    <p class="section-sub">Manage and curate your professional showcase</p>
                </div>
            </div>

            <div class="grid lg:grid-cols-12 gap-8 items-start">
                <!-- Add Form -->
                <div class="lg:col-span-4 dash-card p-7 sticky top-24">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-primary to-secondary flex items-center justify-center text-white text-xs">✦</div>
                        <h4 class="text-[10px] font-black uppercase tracking-widest text-muted">New Creation</h4>
                    </div>
                    <form action="/admin/portfolio" method="POST" enctype="multipart/form-data" class="space-y-4" onsubmit="handleIconScoutSubmit(this)">
                        @csrf
                        <div><label class="field-label">Visual Title</label><input type="text" name="title" placeholder="e.g. Neon City Scene" class="dash-input" required></div>
                        <div><label class="field-label">Category / Style</label><input type="text" name="category" placeholder="e.g. Environment" class="dash-input" required></div>

                        <div class="p-4 rounded-xl border border-dashed"
                             style="background: rgba(255,255,255,0.04); border-color: var(--divider);">
                            <label class="field-label">Upload Image</label>
                            <input type="file" name="image" class="dash-file-input">
                        </div>

                        <div>
                            <label class="field-label">Image URL / IconScout</label>
                            <div class="relative group/input">
                                <input type="text" name="image_url" id="portfolio_image_url" placeholder="Paste link from IconScout..." class="dash-input pr-28">
                                <button type="button" onclick="verifyIconLink('portfolio_image_url')" 
                                        class="absolute right-2 top-1/2 -translate-y-1/2 px-3 py-2 rounded-lg bg-primary/10 hover:bg-primary/20 text-primary text-[9px] font-black uppercase tracking-widest transition-all">
                                    Verify Link ✦
                                </button>
                            </div>
                        </div>
                        <div><label class="field-label">Project URL</label><input type="text" name="project_url" placeholder="https://..." class="dash-input"></div>
                        <div><label class="field-label">Description</label><textarea name="description" placeholder="Project breakdown..." class="dash-input h-24 resize-none"></textarea></div>
                        <button type="submit" class="btn-primary">Deploy to Studio ✦</button>
                    </form>
                </div>

                <!-- Gallery -->
                <div class="lg:col-span-8">
                    <div class="grid sm:grid-cols-2 gap-5">
                        @foreach($portfolios as $item)
                        <div class="dash-card p-5 group relative overflow-hidden">
                            <div class="relative h-44 rounded-xl overflow-hidden mb-4" style="background: rgba(255,255,255,0.06);">
                                @if($item->image_url)
                                    <img src="{{ $item->image_url }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-4xl opacity-10">🧊</div>
                                @endif
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                                    <div class="flex gap-2">
                                        <button onclick="document.getElementById('edit-portfolio-{{ $item->id }}').classList.toggle('hidden')" class="action-btn action-btn-edit" style="opacity:1">✎</button>
                                        <form action="/admin/portfolio/{{ $item->id }}" method="POST" onsubmit="return confirm('Delete?')">
                                            @csrf @method('DELETE')
                                            <button class="action-btn action-btn-del" style="opacity:1">×</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <h5 class="font-bold text-sm mb-1 text-main">{{ $item->title }}</h5>
                            <div class="flex items-center justify-between">
                                <span class="tag">{{ $item->category }}</span>
                                <span class="text-[10px] font-mono" style="color: var(--muted)">#{{ $loop->iteration }}</span>
                            </div>
                            <div id="edit-portfolio-{{ $item->id }}" class="hidden mt-5 pt-5 animate-fade-in" style="border-top: 1px solid var(--divider);">
                                <form action="/admin/portfolio/{{ $item->id }}" method="POST" enctype="multipart/form-data" class="space-y-3" onsubmit="handleIconScoutSubmit(this)">
                                    @csrf @method('PUT')
                                    <input type="text" name="title" value="{{ $item->title }}" class="dash-input" required>
                                    <input type="text" name="category" value="{{ $item->category }}" class="dash-input" required>
                                    <div class="relative group/input">
                                        <input type="text" name="image_url" id="edit_image_url_{{ $item->id }}" value="{{ $item->image_url }}" class="dash-input pr-28" placeholder="Image URL">
                                        <button type="button" onclick="verifyIconLink('edit_image_url_{{ $item->id }}')" 
                                                class="absolute right-2 top-1/2 -translate-y-1/2 px-3 py-2 rounded-lg bg-primary/10 hover:bg-primary/20 text-primary text-[9px] font-black uppercase tracking-widest transition-all">
                                            Verify ✦
                                        </button>
                                    </div>
                                    <input type="text" name="project_url" value="{{ $item->project_url }}" class="dash-input" placeholder="Project Link">
                                    <button type="submit" class="btn-save">Update Project</button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <!-- ═══════════════════════════════ STATS ═══════════════════════════════ -->
        <section id="stats" class="mb-20">
            <div class="flex justify-between items-end mb-8">
                <div>
                    <span class="section-label">Business</span>
                    <h2 class="section-title">Impact Metrics</h2>
                    <p class="section-sub">Quantifying your professional growth</p>
                </div>
                <button onclick="document.getElementById('add-stat-form').classList.toggle('hidden')" class="btn-ghost">+ Add Metric</button>
            </div>

            <div id="add-stat-form" class="hidden dash-card p-7 mb-8 animate-fade-in max-w-xl">
                <form action="/admin/stat" method="POST" class="grid sm:grid-cols-2 gap-5">
                    @csrf
                    <div><label class="field-label">Metric Value</label><input type="text" name="value" placeholder="e.g. 100+" class="dash-input" required></div>
                    <div><label class="field-label">Metric Label</label><input type="text" name="label" placeholder="e.g. Projects Done" class="dash-input" required></div>
                    <button type="submit" class="sm:col-span-2 btn-primary">Activate Metric</button>
                </form>
            </div>

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-5">
                @forelse($stats as $stat)
                <div class="dash-card p-6 group relative">
                    <div class="text-3xl font-black tracking-tighter mb-1 text-main">{{ $stat->value }}</div>
                    <div class="text-[10px] font-black uppercase tracking-widest" style="color: var(--muted)">{{ $stat->label }}</div>
                    <div class="absolute top-4 right-4 flex gap-1.5">
                        <button onclick="document.getElementById('edit-stat-{{ $stat->id }}').classList.toggle('hidden')" class="action-btn action-btn-edit">✎</button>
                        <form action="/admin/stat/{{ $stat->id }}" method="POST" onsubmit="return confirm('Delete?')">
                            @csrf @method('DELETE')
                            <button class="action-btn action-btn-del">×</button>
                        </form>
                    </div>
                    <div id="edit-stat-{{ $stat->id }}" class="hidden mt-5 pt-5 animate-fade-in space-y-3" style="border-top: 1px solid var(--divider);">
                        <form action="/admin/stat/{{ $stat->id }}" method="POST" class="space-y-3">
                            @csrf @method('PUT')
                            <input type="text" name="value" value="{{ $stat->value }}" class="dash-input" required>
                            <input type="text" name="label" value="{{ $stat->label }}" class="dash-input" required>
                            <button type="submit" class="btn-save">Update</button>
                        </form>
                    </div>
                </div>
                @empty
                <div class="col-span-full py-16 dash-card text-center">
                    <span class="text-4xl opacity-10 block mb-3">📊</span>
                    <p class="text-[11px] font-bold uppercase tracking-widest" style="color: var(--muted)">No metrics yet</p>
                </div>
                @endforelse
            </div>
        </section>

        <!-- ═══════════════════════════════ WORKFLOW ═══════════════════════════════ -->
        <section id="workflows" class="mb-20">
            <div class="flex justify-between items-end mb-8">
                <div>
                    <span class="section-label">Content</span>
                    <h2 class="section-title">Production Pipeline</h2>
                    <p class="section-sub">Standardizing your creative process</p>
                </div>
                <button onclick="document.getElementById('add-workflow-form').classList.toggle('hidden')" class="btn-ghost">+ Add Step</button>
            </div>

            <div id="add-workflow-form" class="hidden dash-card p-7 mb-8 animate-fade-in">
                <form action="/admin/workflow" method="POST" class="space-y-5">
                    @csrf
                    <div class="grid sm:grid-cols-3 gap-5">
                        <div class="sm:col-span-2"><label class="field-label">Step Name</label><input type="text" name="title" placeholder="e.g. Mesh Optimization" class="dash-input" required></div>
                        <div><label class="field-label">Order</label><input type="number" name="order" value="{{ count($workflows) + 1 }}" class="dash-input" required></div>
                    </div>
                    <div><label class="field-label">Description</label><textarea name="description" placeholder="Explain this phase..." class="dash-input h-24 resize-none" required></textarea></div>
                    <button type="submit" class="btn-primary">Add to Pipeline</button>
                </form>
            </div>

            <div class="grid md:grid-cols-2 gap-5">
                @forelse($workflows as $step)
                <div class="dash-card p-7 group relative">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-12 h-12 rounded-xl border flex items-center justify-center font-black text-primary text-sm"
                             style="background: rgba(217,70,239,0.08); border-color: rgba(217,70,239,0.18);">
                            {{ str_pad($step->order, 2, '0', STR_PAD_LEFT) }}
                        </div>
                        <h5 class="font-bold uppercase tracking-wide text-sm text-main">{{ $step->title }}</h5>
                    </div>
                    <p class="text-xs leading-relaxed" style="color: var(--muted)">{{ $step->description }}</p>
                    <div class="absolute top-5 right-5 flex gap-1.5">
                        <button onclick="document.getElementById('edit-workflow-{{ $step->id }}').classList.toggle('hidden')" class="action-btn action-btn-edit">✎</button>
                        <form action="/admin/workflow/{{ $step->id }}" method="POST" onsubmit="return confirm('Delete?')">
                            @csrf @method('DELETE')
                            <button class="action-btn action-btn-del">×</button>
                        </form>
                    </div>
                    <div id="edit-workflow-{{ $step->id }}" class="hidden mt-5 pt-5 animate-fade-in" style="border-top: 1px solid var(--divider);">
                        <form action="/admin/workflow/{{ $step->id }}" method="POST" class="space-y-3">
                            @csrf @method('PUT')
                            <div class="grid grid-cols-2 gap-3">
                                <input type="text" name="title" value="{{ $step->title }}" class="dash-input" required>
                                <input type="number" name="order" value="{{ $step->order }}" class="dash-input" required>
                            </div>
                            <textarea name="description" class="dash-input h-20 resize-none">{{ $step->description }}</textarea>
                            <button type="submit" class="btn-save">Update Step</button>
                        </form>
                    </div>
                </div>
                @empty
                <div class="col-span-full py-16 dash-card text-center">
                    <span class="text-4xl opacity-10 block mb-3">⚡</span>
                    <p class="text-[11px] font-bold uppercase tracking-widest" style="color: var(--muted)">No pipeline steps yet</p>
                </div>
                @endforelse
            </div>
        </section>

        <!-- ═══════════════════════════════ CAPABILITIES ═══════════════════════════════ -->
        <section id="capabilities" class="mb-20">
            <div class="flex justify-between items-end mb-8">
                <div>
                    <span class="section-label">Content</span>
                    <h2 class="section-title">Expertise & Skillsets</h2>
                    <p class="section-sub">Technical and artistic mastery domains</p>
                </div>
                <button onclick="document.getElementById('add-capability-form').classList.toggle('hidden')" class="btn-ghost">+ Add Skill</button>
            </div>

            <div id="add-capability-form" class="hidden dash-card p-7 mb-8 animate-fade-in">
                <form action="/admin/capability" method="POST" class="space-y-5">
                    @csrf
                    <div class="grid sm:grid-cols-12 gap-5">
                        <div class="sm:col-span-6"><label class="field-label">Skill Title</label><input type="text" name="title" placeholder="e.g. Photorealistic Texturing" class="dash-input" required></div>
                        <div class="sm:col-span-2"><label class="field-label">Icon</label><input type="text" name="icon" value="📐" class="dash-input text-center"></div>
                        <div class="sm:col-span-2"><label class="field-label">Module #</label><input type="text" name="module_number" value="01" class="dash-input text-center"></div>
                        <div class="sm:col-span-2"><label class="field-label">Order</label><input type="number" name="order" value="{{ isset($capabilities) ? count($capabilities) + 1 : 1 }}" class="dash-input text-center" required></div>
                    </div>
                    <div><label class="field-label">Description</label><textarea name="description" placeholder="Technical breakdown..." class="dash-input h-24 resize-none" required></textarea></div>
                    <button type="submit" class="btn-primary">Register Expertise ✦</button>
                </form>
            </div>

            <div class="grid md:grid-cols-2 gap-5">
                @isset($capabilities)
                @forelse($capabilities as $capability)
                <div class="dash-card p-7 group relative">
                    <div class="flex items-start gap-5">
                        <div class="w-14 h-14 rounded-2xl flex items-center justify-center text-3xl flex-shrink-0"
                             style="background: rgba(217,70,239,0.08); border: 1px solid rgba(217,70,239,0.18);">
                            {{ $capability->icon }}
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center gap-2 mb-2">
                                <span class="tag">Module {{ $capability->module_number }}</span>
                            </div>
                            <h5 class="font-bold uppercase tracking-wide text-sm mb-2 text-main">{{ $capability->title }}</h5>
                            <p class="text-xs leading-relaxed" style="color: var(--muted)">{{ $capability->description }}</p>
                        </div>
                    </div>
                    <div class="absolute top-5 right-5 flex gap-1.5">
                        <button onclick="document.getElementById('edit-capability-{{ $capability->id }}').classList.toggle('hidden')" class="action-btn action-btn-edit">✎</button>
                        <form action="/admin/capability/{{ $capability->id }}" method="POST" onsubmit="return confirm('Delete?')">
                            @csrf @method('DELETE')
                            <button class="action-btn action-btn-del">×</button>
                        </form>
                    </div>
                    <div id="edit-capability-{{ $capability->id }}" class="hidden mt-5 pt-5 animate-fade-in" style="border-top: 1px solid var(--divider);">
                        <form action="/admin/capability/{{ $capability->id }}" method="POST" class="space-y-3">
                            @csrf @method('PUT')
                            <input type="text" name="title" value="{{ $capability->title }}" class="dash-input" required>
                            <div class="grid grid-cols-3 gap-3">
                                <input type="text" name="icon" value="{{ $capability->icon }}" class="dash-input text-center">
                                <input type="text" name="module_number" value="{{ $capability->module_number }}" class="dash-input text-center">
                                <input type="number" name="order" value="{{ $capability->order }}" class="dash-input text-center">
                            </div>
                            <textarea name="description" class="dash-input h-20 resize-none">{{ $capability->description }}</textarea>
                            <button type="submit" class="btn-save">Update Skill</button>
                        </form>
                    </div>
                </div>
                @empty
                <div class="col-span-full py-16 dash-card text-center">
                    <span class="text-4xl opacity-10 block mb-3">🎯</span>
                    <p class="text-[11px] font-bold uppercase tracking-widest" style="color: var(--muted)">No capabilities yet</p>
                </div>
                @endforelse
                @endisset
            </div>
        </section>

        <!-- ═══════════════════════════════ REVIEWS ═══════════════════════════════ -->
        <section id="reviews" class="mb-20">
            <div class="flex justify-between items-end mb-8">
                <div>
                    <span class="section-label">Engagement</span>
                    <h2 class="section-title">Client Testimonials</h2>
                    <p class="section-sub">Vouching for your creative excellence</p>
                </div>
                <button onclick="document.getElementById('add-review-form').classList.toggle('hidden')" class="btn-ghost">+ Add Review</button>
            </div>

            <div id="add-review-form" class="hidden dash-card p-7 mb-8 animate-fade-in max-w-2xl">
                <form action="/admin/review" method="POST" class="space-y-5">
                    @csrf
                    <div class="grid sm:grid-cols-2 gap-5">
                        <div><label class="field-label">Client Name</label><input type="text" name="client_name" placeholder="Full Name" class="dash-input" required></div>
                        <div><label class="field-label">Rating (1–5)</label><input type="number" name="rating" min="1" max="5" value="5" class="dash-input" required></div>
                    </div>
                    <div><label class="field-label">Testimonial</label><textarea name="comment" placeholder="What they said..." class="dash-input h-24 resize-none" required></textarea></div>
                    <button type="submit" class="btn-primary">Publish Review ✦</button>
                </form>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5">
                @forelse($reviews as $review)
                <div class="dash-card p-6 group relative">
                    <div class="flex text-primary mb-3 gap-0.5">
                        @for($i=0; $i<$review->rating; $i++)<i class="fas fa-star text-xs"></i>@endfor
                    </div>
                    <p class="text-xs leading-relaxed italic mb-5" style="color: var(--muted-2)">"{{ $review->comment }}"</p>
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-gradient-to-br from-primary to-secondary flex items-center justify-center text-white font-black text-xs">{{ substr($review->client_name, 0, 1) }}</div>
                        <div>
                            <div class="text-xs font-black text-main">{{ $review->client_name }}</div>
                            <div class="text-[9px] uppercase font-bold tracking-widest" style="color: var(--muted)">Verified Client</div>
                        </div>
                    </div>
                    <div class="absolute top-4 right-4 flex gap-1.5">
                        <button onclick="document.getElementById('edit-review-{{ $review->id }}').classList.toggle('hidden')" class="action-btn action-btn-edit">✎</button>
                        <form action="/admin/review/{{ $review->id }}" method="POST" onsubmit="return confirm('Delete?')">
                            @csrf @method('DELETE')
                            <button class="action-btn action-btn-del">×</button>
                        </form>
                    </div>
                    <div id="edit-review-{{ $review->id }}" class="hidden mt-5 pt-5 animate-fade-in" style="border-top: 1px solid var(--divider);">
                        <form action="/admin/review/{{ $review->id }}" method="POST" class="space-y-3">
                            @csrf @method('PUT')
                            <div class="grid grid-cols-2 gap-3">
                                <input type="text" name="client_name" value="{{ $review->client_name }}" class="dash-input" required>
                                <input type="number" name="rating" value="{{ $review->rating }}" min="1" max="5" class="dash-input" required>
                            </div>
                            <textarea name="comment" class="dash-input h-20 resize-none">{{ $review->comment }}</textarea>
                            <button type="submit" class="btn-save">Update Review</button>
                        </form>
                    </div>
                </div>
                @empty
                <div class="col-span-full py-16 dash-card text-center">
                    <span class="text-4xl opacity-10 block mb-3">💬</span>
                    <p class="text-[11px] font-bold uppercase tracking-widest" style="color: var(--muted)">No reviews yet</p>
                </div>
                @endforelse
            </div>
        </section>

        <!-- ═══════════════════════════════ PRICING ═══════════════════════════════ -->
        <section id="pricing" class="mb-20">
            <div class="flex justify-between items-end mb-8">
                <div>
                    <span class="section-label">Business</span>
                    <h2 class="section-title">Service Tiers</h2>
                    <p class="section-sub">Structured creative investments</p>
                </div>
                <button onclick="document.getElementById('add-pricing-form').classList.toggle('hidden')" class="btn-ghost">+ Add Tier</button>
            </div>

            <div id="add-pricing-form" class="hidden dash-card p-7 mb-8 animate-fade-in">
                <form action="/admin/pricing" method="POST" class="space-y-5">
                    @csrf
                    <div class="grid sm:grid-cols-2 gap-8">
                        <div><label class="field-label">Plan Name</label><input type="text" name="plan_name" placeholder="e.g. Starter" class="dash-input" required></div>
                        <div><label class="field-label">Price</label><input type="text" name="price" placeholder="e.g. $499" class="dash-input" required></div>
                        <div><label class="field-label">Price Subtitle (e.g. /month)</label><input type="text" name="price_subtitle" placeholder="e.g. per project" class="dash-input"></div>
                        <div class="flex items-end pb-3">
                            <label class="flex items-center gap-3 cursor-pointer">
                                <input type="checkbox" name="is_featured" value="1" class="w-4 h-4 rounded accent-primary">
                                <span class="text-[10px] font-black uppercase tracking-widest" style="color: var(--muted-2)">Featured / Hot</span>
                            </label>
                        </div>
                    </div>
                    <div class="grid sm:grid-cols-2 gap-5">
                        <div><label class="field-label">Benefits List (comma/new line)</label><textarea name="features" placeholder="3D Model, 4K Render, Source Files..." class="dash-input h-20 resize-none" required></textarea></div>
                        <div><label class="field-label">Tier Description (optional)</label><textarea name="benefits" placeholder="Details for clarification..." class="dash-input h-20 resize-none"></textarea></div>
                    </div>
                    <button type="submit" class="btn-primary">Deploy Pricing Tier</button>
                </form>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5">
                @forelse($pricings as $tier)
                <div class="dash-card p-7 group relative {{ $tier->is_featured ? 'border-primary/30 ring-2 ring-primary/10' : '' }}">
                    @if($tier->is_featured)
                    <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 z-10">
                        <div class="relative px-5 py-1.5 bg-[#0a0a0c] rounded-full border border-white/10 shadow-2xl flex items-center justify-center">
                            <div class="absolute inset-x-0 -bottom-2 h-4 bg-primary/30 blur-lg rounded-full"></div>
                            <span class="relative text-white text-[8px] font-black uppercase tracking-[0.25em]">Recommended</span>
                        </div>
                    </div>
                    @endif
                    <span class="text-[10px] font-black uppercase tracking-widest {{ $tier->is_featured ? 'text-primary' : '' }}" style="{{ $tier->is_featured ? '' : 'color: var(--muted)' }}">{{ $tier->plan_name }}</span>
                    <div class="text-3xl font-black tracking-tighter mt-2 mb-5 text-main">{{ $tier->price }}</div>
                    <ul class="space-y-2 mb-6">
                        @foreach(explode(',', $tier->features) as $feature)
                        <li class="flex items-center gap-2 text-xs" style="color: var(--muted-2)">
                            <i class="fas fa-check text-[9px] {{ $tier->is_featured ? 'text-primary' : 'text-secondary' }}"></i>
                            {{ trim($feature) }}
                        </li>
                        @endforeach
                    </ul>
                    <div class="absolute top-5 right-5 flex gap-1.5">
                        <button onclick="document.getElementById('edit-pricing-{{ $tier->id }}').classList.toggle('hidden')" class="action-btn action-btn-edit">✎</button>
                        <form action="/admin/pricing/{{ $tier->id }}" method="POST" onsubmit="return confirm('Delete?')">
                            @csrf @method('DELETE')
                            <button class="action-btn action-btn-del">×</button>
                        </form>
                    </div>
                    <div id="edit-pricing-{{ $tier->id }}" class="hidden mt-5 pt-5 animate-fade-in" style="border-top: 1px solid var(--divider);">
                        <form action="/admin/pricing/{{ $tier->id }}" method="POST" class="space-y-3">
                            @csrf @method('PUT')
                            <div class="grid grid-cols-2 gap-3">
                                <input type="text" name="plan_name" value="{{ $tier->plan_name }}" class="dash-input" required>
                                <input type="text" name="price" value="{{ $tier->price }}" class="dash-input" required>
                            </div>
                            <div class="grid grid-cols-2 gap-3">
                                <input type="text" name="price_subtitle" value="{{ $tier->price_subtitle }}" class="dash-input" placeholder="Price Subtitle">
                                <div class="flex items-center gap-3 px-1">
                                    <input type="hidden" name="is_featured" value="0">
                                    <input type="checkbox" name="is_featured" value="1" @if($tier->is_featured) checked @endif class="w-4 h-4 rounded accent-primary">
                                    <span class="text-[10px] font-bold uppercase" style="color: var(--muted)">Featured</span>
                                </div>
                            </div>
                            <div class="grid sm:grid-cols-2 gap-5">
                                <div><label class="field-label">Benefits List</label><textarea name="features" class="dash-input h-20 resize-none">{{ $tier->features }}</textarea></div>
                                <div><label class="field-label">Tier Description</label><textarea name="benefits" class="dash-input h-20 resize-none">{{ $tier->benefits }}</textarea></div>
                            </div>
                            <button type="submit" class="btn-save">Update Tier</button>
                        </form>
                    </div>
                </div>
                @empty
                <div class="col-span-full py-16 dash-card text-center">
                    <span class="text-4xl opacity-10 block mb-3">💰</span>
                    <p class="text-[11px] font-bold uppercase tracking-widest" style="color: var(--muted)">No pricing tiers yet</p>
                </div>
                @endforelse
            </div>
        </section>

        <!-- ═══════════════════════════════ FAQ ═══════════════════════════════ -->
        <section id="faq" class="mb-20">
            <div class="flex justify-between items-end mb-8">
                <div>
                    <span class="section-label">Engagement</span>
                    <h2 class="section-title">Support FAQ</h2>
                    <p class="section-sub">Answering common client questions</p>
                </div>
                <button onclick="document.getElementById('add-faq-form').classList.toggle('hidden')" class="btn-ghost">+ Add FAQ</button>
            </div>

            <div id="add-faq-form" class="hidden dash-card p-7 mb-8 animate-fade-in max-w-2xl">
                <form action="/admin/faq" method="POST" class="space-y-5">
                    @csrf
                    <div><label class="field-label">Question</label><input type="text" name="question" placeholder="Common inquiry..." class="dash-input" required></div>
                    <div><label class="field-label">Answer</label><textarea name="answer" placeholder="Detailed response..." class="dash-input h-24 resize-none" required></textarea></div>
                    <button type="submit" class="btn-primary">Publish FAQ</button>
                </form>
            </div>

            <div class="space-y-4">
                @forelse($faqs as $faq)
                <div class="dash-card p-6 group relative">
                    <div class="flex justify-between items-start gap-4">
                        <div class="flex-1">
                            <h5 class="text-sm font-bold mb-2 text-main">{{ $faq->question }}</h5>
                            <p class="text-xs leading-relaxed" style="color: var(--muted)">{{ $faq->answer }}</p>
                        </div>
                        <div class="flex gap-1.5 flex-shrink-0">
                            <button onclick="document.getElementById('edit-faq-{{ $faq->id }}').classList.toggle('hidden')" class="action-btn action-btn-edit">✎</button>
                            <form action="/admin/faq/{{ $faq->id }}" method="POST" onsubmit="return confirm('Delete?')">
                                @csrf @method('DELETE')
                                <button class="action-btn action-btn-del">×</button>
                            </form>
                        </div>
                    </div>
                    <div id="edit-faq-{{ $faq->id }}" class="hidden mt-5 pt-5 animate-fade-in" style="border-top: 1px solid var(--divider);">
                        <form action="/admin/faq/{{ $faq->id }}" method="POST" class="space-y-3">
                            @csrf @method('PUT')
                            <input type="text" name="question" value="{{ $faq->question }}" class="dash-input" required>
                            <textarea name="answer" class="dash-input h-20 resize-none">{{ $faq->answer }}</textarea>
                            <button type="submit" class="btn-save">Update FAQ</button>
                        </form>
                    </div>
                </div>
                @empty
                <div class="py-16 dash-card text-center">
                    <span class="text-4xl opacity-10 block mb-3">❓</span>
                    <p class="text-[11px] font-bold uppercase tracking-widest" style="color: var(--muted)">No FAQs yet</p>
                </div>
                @endforelse
            </div>
        </section>

        <!-- ═══════════════════════════════ SITE SETTINGS ═══════════════════════════════ -->
        <section id="settings" class="mb-20">
            <div class="mb-8">
                <span class="section-label">Configuration</span>
                <h2 class="section-title">Site Settings</h2>
                <p class="section-sub">Global architecture and site-wide content</p>
            </div>

            <div class="dash-card p-8">
                <form action="/admin/settings" method="POST" enctype="multipart/form-data" class="space-y-10">
                    @csrf

                    <!-- Hero -->
                    <div>
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-primary to-secondary flex items-center justify-center text-white text-xs">✨</div>
                            <h4 class="text-[10px] font-black uppercase tracking-widest text-muted">Hero Identity</h4>
                        </div>
                        <div class="grid lg:grid-cols-2 gap-5">
                            <div><label class="field-label">Tagline</label><input type="text" name="hero_tagline" value="{{ $settings['hero_tagline'] ?? '3D Artist & Designer' }}" class="dash-input"></div>
                            <div><label class="field-label">Hero Title</label><input type="text" name="hero_title" value="{{ $settings['hero_title'] ?? 'Digital Architect.' }}" class="dash-input"></div>
                        </div>
                        <div class="mt-5"><label class="field-label">Hero Description</label><textarea name="hero_description" class="dash-input h-24 resize-none">{{ $settings['hero_description'] ?? '' }}</textarea></div>
                    </div>

                    <hr class="form-divider">

                    <!-- About -->
                    <div>
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-primary to-secondary flex items-center justify-center text-white text-xs">👤</div>
                            <h4 class="text-[10px] font-black uppercase tracking-widest text-muted">Professional Bio</h4>
                        </div>
                        <div class="grid lg:grid-cols-3 gap-8">
                            <div class="lg:col-span-1">
                                <label class="field-label">About Display Image</label>
                                <div class="relative group">
                                    <div class="w-full aspect-square rounded-2xl overflow-hidden bg-black/5 dark:bg-white/5 border border-black/10 dark:border-white/10 flex items-center justify-center mb-4">
                                        @if($settings['about_image'] ?? false)
                                            <img src="{{ $settings['about_image'] }}" class="w-full h-full object-cover" id="about-preview">
                                        @else
                                            <span class="text-4xl opacity-20">🖼️</span>
                                        @endif
                                    </div>
                                    <input type="file" name="about_image" id="about_image_input" class="hidden" accept="image/*" onchange="previewImage(this, 'about-preview')">
                                    <button type="button" onclick="document.getElementById('about_image_input').click()" class="w-full py-3 bg-black/5 dark:bg-white/5 border border-dashed border-black/20 dark:border-white/20 rounded-xl text-[10px] font-black uppercase tracking-widest hover:border-primary/50 transition-colors">
                                        Upload Image
                                    </button>
                                </div>
                            </div>
                            <div class="lg:col-span-2 space-y-5">
                                <div class="grid grid-cols-2 gap-5">
                                    <div><label class="field-label">About Label</label><input type="text" name="about_label" value="{{ $settings['about_label'] ?? 'THE STUDIO' }}" class="dash-input"></div>
                                    <div><label class="field-label">About Heading</label><input type="text" name="about_heading" value="{{ $settings['about_heading'] ?? 'Pure Form.' }}" class="dash-input"></div>
                                </div>
                                <div><label class="field-label">Biography</label><textarea name="about_description" class="dash-input h-32 resize-none">{{ $settings['about_description'] ?? '' }}</textarea></div>
                            </div>
                        </div>
                    </div>

                    <hr class="form-divider">

                    <!-- About Cards -->
                    <div>
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-secondary to-primary flex items-center justify-center text-white text-xs">📊</div>
                            <h4 class="text-[10px] font-black uppercase tracking-widest text-muted">About Info Cards</h4>
                        </div>
                        <div class="grid md:grid-cols-2 gap-5">
                            <div class="p-5 rounded-xl space-y-3" style="background: var(--input-bg); border: 1px solid var(--divider);">
                                <p class="text-[9px] font-black uppercase tracking-widest" style="color: var(--muted)">Card 1 — Tools</p>
                                <input type="text" name="about_card1_label" value="{{ $settings['about_card1_label'] ?? 'Primary Tools' }}" class="dash-input" placeholder="Card Label">
                                <input type="text" name="about_pipeline_tools" value="{{ $settings['about_pipeline_tools'] ?? 'Blender, Cinema 4D' }}" class="dash-input" placeholder="Card Value">
                            </div>
                            <div class="p-5 rounded-xl space-y-3" style="background: var(--input-bg); border: 1px solid var(--divider);">
                                <p class="text-[9px] font-black uppercase tracking-widest" style="color: var(--muted)">Card 2 — Experience</p>
                                <input type="text" name="about_card2_label" value="{{ $settings['about_card2_label'] ?? 'Experience' }}" class="dash-input" placeholder="Card Label">
                                <input type="text" name="about_experience_years" value="{{ $settings['about_experience_years'] ?? '5+' }}" class="dash-input" placeholder="Card Value">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn-gradient">Update Global Settings ✦</button>
                </form>
            </div>
        </section>

        <!-- ═══════════════════════════════ SOCIAL LINKS ═══════════════════════════════ -->
        <section id="social-media" class="mb-20">
            <div class="mb-8">
                <span class="section-label">Configuration</span>
                <h2 class="section-title">Social Media Links</h2>
                <p class="section-sub">Manage your social media presence</p>
            </div>

            <div class="dash-card p-8">
                <form action="/admin/settings" method="POST" class="space-y-6">
                    @csrf
                    <div class="grid md:grid-cols-3 gap-6">
                        <div>
                            <div class="flex items-center gap-2 mb-3">
                                <div class="w-7 h-7 rounded-lg bg-green-500 flex items-center justify-center text-white text-xs shadow-lg shadow-green-500/20">
                                    <i class="fab fa-whatsapp"></i>
                                </div>
                                <label class="field-label" style="margin:0">WhatsApp</label>
                            </div>
                            <input type="url" name="social_whatsapp" value="{{ $settings['social_whatsapp'] ?? '' }}" class="dash-input" placeholder="https://wa.me/...">
                        </div>
                        <div>
                            <div class="flex items-center gap-2 mb-3">
                                <div class="w-7 h-7 rounded-lg bg-pink-500 flex items-center justify-center text-white text-xs shadow-lg shadow-pink-500/20">
                                    <i class="fab fa-dribbble"></i>
                                </div>
                                <label class="field-label" style="margin:0">Dribbble</label>
                            </div>
                            <input type="url" name="social_dribbble" value="{{ $settings['social_dribbble'] ?? '' }}" class="dash-input" placeholder="https://dribbble.com/...">
                        </div>
                        <div>
                            <div class="flex items-center gap-2 mb-3">
                                <div class="w-7 h-7 rounded-lg bg-gradient-to-br from-purple-500 via-pink-500 to-orange-400 flex items-center justify-center text-white text-xs shadow-lg">
                                    <i class="fab fa-instagram"></i>
                                </div>
                                <label class="field-label" style="margin:0">Instagram</label>
                            </div>
                            <input type="url" name="social_instagram" value="{{ $settings['social_instagram'] ?? '' }}" class="dash-input" placeholder="https://instagram.com/...">
                        </div>
                    </div>
                    <button type="submit" class="btn-gradient">Update Social Links ✦</button>
                </form>
            </div>
        </section>

    </main>

    <footer class="px-10 py-8 text-center" style="border-top: 1px solid var(--divider);">
        <p class="text-[10px] font-black uppercase tracking-widest" style="color: var(--muted)">Hariz Studio • Admin Panel • © {{ date('Y') }}</p>
    </footer>
</div>

<!-- Bottom accent bar -->
<div class="fixed bottom-0 left-0 w-full h-0.5 accent-bar z-50"></div>

<script>
    // Mobile sidebar overlay
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebar-overlay');

    new MutationObserver(() => {
        if (sidebar.classList.contains('-translate-x-full')) {
            overlay.classList.add('hidden');
            document.body.style.overflow = 'auto';
        } else {
            overlay.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
    }).observe(sidebar, { attributes: true, attributeFilter: ['class'] });

    // Smooth scroll
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                if (window.innerWidth < 768) sidebar.classList.add('-translate-x-full');
                target.scrollIntoView({ behavior: 'smooth' });
            }
        });
    });

    // Active sidebar link on scroll
    const navObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            const link = document.querySelector(`.sidebar-link[href="#${entry.target.id}"]`);
            if (entry.isIntersecting) {
                document.querySelectorAll('.sidebar-link').forEach(l => l.classList.remove('active'));
                link?.classList.add('active');
            }
        });
    }, { threshold: 0.2, rootMargin: '-10% 0px -70% 0px' });
    document.querySelectorAll('section[id]').forEach(s => navObserver.observe(s));

    // Toggle sidebar collapse
    function toggleSidebar() {
        sidebar.classList.toggle('collapsed');
        document.getElementById('main-content').classList.toggle('sidebar-collapsed');
    }

    // Theme: one toggle for everything (including sidebar)
    function setTheme(mode) {
        const root = document.documentElement; // <html>
        root.classList.toggle('dark', mode === 'dark');
        localStorage.setItem('theme', mode);
        syncThemeIcons();
    }

    function toggleTheme() {
        const isDark = document.documentElement.classList.contains('dark');
        setTheme(isDark ? 'light' : 'dark');
    }

    function syncThemeIcons() {
        const isDark = document.documentElement.classList.contains('dark');
        const desktopIcon = document.getElementById('themeIconDesktop');
        const mobileIcon = document.getElementById('themeIconMobile');

        // In dark mode show "sun" to indicate switching to light; in light show "moon"
        const cls = isDark ? 'fa-sun' : 'fa-moon';
        const removeCls = isDark ? 'fa-moon' : 'fa-sun';

        if (desktopIcon) { desktopIcon.classList.remove(removeCls); desktopIcon.classList.add(cls); }
        if (mobileIcon) { mobileIcon.classList.remove(removeCls); mobileIcon.classList.add(cls); }
    }

    // Init icon state on load
    syncThemeIcons();

    // Image Preview Helper
    function previewImage(input, previewId) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.getElementById(previewId);
                const container = preview.parentElement;
                
                // If the preview <img> doesn't exist yet (e.g., initial state), create it or find it
                if (!preview && container) {
                    container.innerHTML = `<img src="${e.target.result}" class="w-full h-full object-cover" id="${previewId}">`;
                } else if (preview) {
                    preview.src = e.target.result;
                }
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    // IconScout Auto-Verification Robot
    async function verifyIconLink(inputId) {
        const input = document.getElementById(inputId);
        const url = input.value;
        if(!url || !url.startsWith('http')) {
            alert('Please enter a valid URL first.');
            return;
        }

        const btn = event.currentTarget;
        const originalText = btn.innerHTML;
        
        // 1. Force open the URL in a new window/tab as requested
        const verifyWindow = window.open(url, '_blank');
        
        btn.innerHTML = 'Verifying... ✦';
        btn.disabled = true;

        // 2. Small delay to let the page start loading in the other tab
        setTimeout(async () => {
            try {
                const response = await fetch('{{ route("admin.fetch-metadata") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ url })
                });
                const data = await response.json();
                
                if(data.success) {
                    input.value = data.image_url;
                    btn.innerHTML = 'Success! ✓';
                    btn.style.color = '#22c55e';
                    // Optional: close the window if verification was auto-successful
                    // verifyWindow.close(); 
                } else {
                    // Fail gracefully - tell the user to get it manually
                    alert('The robot is still being blocked by IconScout.\n\nPlease find the image on the page I just opened,\nRight-click it -> "Copy Image Address",\nand paste it back here.');
                    btn.innerHTML = 'Manual Link ✎';
                }
            } catch (error) {
                btn.innerHTML = 'Error ✖';
            } finally {
                setTimeout(() => {
                    btn.innerHTML = originalText;
                    btn.disabled = false;
                    btn.style.color = '';
                }, 3000);
            }
        }, 2000); // 2 second delay for the new tab to "breathe"
    }

    // Handle Form Submission for Auto-Verification Window
    function handleIconScoutSubmit(form) {
        const imageUrlInput = form.querySelector('input[name="image_url"]');
        const url = imageUrlInput ? imageUrlInput.value : '';
        
        if (url && url.includes('iconscout.com')) {
            // Force open the verifying link in a new tab as requested
            window.open(url, '_blank');
            
            // Show a "Processing" state on the button
            const submitBtn = form.querySelector('button[type="submit"]');
            if (submitBtn) {
                submitBtn.innerHTML = 'Uploading & Saving... ✦';
                submitBtn.style.opacity = '0.7';
            }
        }
        return true; // Continue with form submission
    }
</script>
</body>
</html>