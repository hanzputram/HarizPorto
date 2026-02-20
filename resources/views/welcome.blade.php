<!DOCTYPE html>
<html class="scroll-smooth" lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      x-data="{
        dark: localStorage.getItem('theme') === 'dark',
        toggle(){
          this.dark = !this.dark;
          localStorage.setItem('theme', this.dark ? 'dark' : 'light');
        }
      }"
      :class="{ 'dark': dark }">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>{{ $settings['site_title'] ?? 'Hariz Fauzil A.' }} - 3D Artist Portfolio</title>
<meta content="{{ $settings['site_description'] ?? 'Portfolio of Hariz Fauzil A., a freelance 3D designer based in Surabaya.' }}" name="description"/>
@vite(['resources/css/app.css', 'resources/js/app.js'])
<script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
  tailwind.config = {
    darkMode: "class",
    theme: {
      extend: {
        colors: {
          primary: "#D946EF",
          secondary: "#06B6D4",
          "background-light": "#F3F4F6",
          "background-dark": "#050505",
          "surface-dark": "#0F0F0F",
          "surface-card": "#121212",
        },
        fontFamily: {
          sans: ['Inter', 'sans-serif'],
          display: ['Inter', 'sans-serif'],
        },
        boxShadow: {
          'glow-purple': '0 0 20px -5px rgba(217, 70, 239, 0.3)',
          'glow-cyan': '0 0 20px -5px rgba(6, 182, 212, 0.3)',
          'glow-card': '0 0 40px -10px rgba(217, 70, 239, 0.1)',
        },
        backgroundImage: {
          'gradient-radial': 'radial-gradient(var(--tw-gradient-stops))',
        }
      },
    },
  };
</script>

<style>
  [x-cloak] { display: none !important; }

  /* Scrollbar: light + dark */
  ::-webkit-scrollbar { width: 8px; }
  ::-webkit-scrollbar-track { background: #f3f4f6; }
  ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
  ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }

  .dark ::-webkit-scrollbar-track { background: #050505; }
  .dark ::-webkit-scrollbar-thumb { background: #333; }
  .dark ::-webkit-scrollbar-thumb:hover { background: #444; }

  /* Glass: light + dark */
  .glass{
    background: rgba(255,255,255,0.65);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border: 1px solid rgba(0,0,0,0.06);
  }
  .dark .glass{
    background: rgba(255,255,255,0.03);
    border: 1px solid rgba(255,255,255,0.05);
  }

  .glass-btn{
    background: rgba(0,0,0,0.06);
    backdrop-filter: blur(4px);
    border: 1px solid rgba(0,0,0,0.08);
    transition: all 0.3s ease;
  }
  .glass-btn:hover{
    background: rgba(0,0,0,0.10);
    border-color: rgba(0,0,0,0.14);
    box-shadow: 0 0 15px rgba(217, 70, 239, 0.25);
  }
  .dark .glass-btn{
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.1);
  }
  .dark .glass-btn:hover{
    background: rgba(255, 255, 255, 0.2);
    border-color: rgba(255, 255, 255, 0.3);
    box-shadow: 0 0 15px rgba(217, 70, 239, 0.4);
  }

  .text-gradient {
    background: linear-gradient(to right, #D946EF, #06B6D4);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  }

  .card-hover:hover{
    border-color: rgba(217, 70, 239, 0.35);
    box-shadow: 0 0 20px rgba(217, 70, 239, 0.12);
    transform: translateY(-2px);
  }

  .workflow-node-box { transition: all 0.3s ease; }
  .dark .workflow-node-box{
    background-color: #340457 !important;
    border-color: rgba(217, 70, 239, 0.3);
    box-shadow: 0 0 20px rgba(52, 4, 87, 0.5);
  }

  /* ── Workflow step numbers ── */
  .workflow-num {
    color: rgba(0,0,0,0.08);
    font-size: 5rem;
    font-weight: 900;
    line-height: 1;
    position: absolute;
    top: -2.5rem;
    left: 0;
    user-select: none;
    transition: color 0.3s ease;
  }
  .dark .workflow-num { color: rgba(255,255,255,0.07); }
  .group:hover .workflow-num { color: rgba(217,70,239,0.18); }

  /* ── Capability cards ── */
  .cap-card {
    background: #f0f0f0;
    border: 1px solid rgba(0,0,0,0.09);
  }
  .dark .cap-card {
    background: #141414;
    border: 1px solid rgba(255,255,255,0.07);
  }
  .cap-card:hover {
    border-color: rgba(217,70,239,0.3);
    box-shadow: 0 0 24px rgba(217,70,239,0.10);
    transform: translateY(-2px);
  }

  /* ── About info cards ── */
  .about-card {
    background: #ebebeb;
    border: 1px solid rgba(0,0,0,0.09);
  }
  .dark .about-card {
    background: #161616;
    border: 1px solid rgba(255,255,255,0.07);
  }

  /* ── About outer wrapper ── */
  .about-wrap {
    background: #f5f5f5;
    border: 1px solid rgba(0,0,0,0.08);
  }
  .dark .about-wrap {
    background: #0f0f0f;
    border: 1px solid rgba(255,255,255,0.06);
  }

  /* ── Stats cards ── */
  .stat-card {
    background: #efefef;
    border: 1px solid rgba(0,0,0,0.09);
  }
  .dark .stat-card {
    background: #141414;
    border: 1px solid rgba(255,255,255,0.07);
  }

  /* ── Review cards ── */
  .review-card {
    background: #f2f2f2;
    border: 1px solid rgba(0,0,0,0.08);
  }
  .dark .review-card {
    background: #131313;
    border: 1px solid rgba(255,255,255,0.07);
  }

  /* ── FAQ items ── */
  .faq-item {
    background: #f0f0f0;
    border: 1px solid rgba(0,0,0,0.08);
  }
  .dark .faq-item {
    background: #141414;
    border: 1px solid rgba(255,255,255,0.07);
  }
  .faq-item[open] {
    background: #e8e8e8;
    border-color: rgba(217,70,239,0.25);
  }
  .dark .faq-item[open] {
    background: #1a1a1a;
    border-color: rgba(217,70,239,0.25);
  }

  /* ── Pricing Cards ── */
  .pricing-card {
    background: #f1f1f1;
    border: 1px solid rgba(0,0,0,0.10);
  }
  .dark .pricing-card {
    background: #111111;
    border: 1px solid rgba(255,255,255,0.08);
  }
  .pricing-card-featured {
    background: #ffffff;
    border: 2px solid rgba(217,70,239,0.30);
    box-shadow: 0 8px 40px rgba(217,70,239,0.10);
  }
  .dark .pricing-card-featured {
    background: #0e0e0e;
    border: 2px solid rgba(217,70,239,0.25);
    box-shadow: 0 8px 40px rgba(217,70,239,0.12);
  }

  /* ── Feature Item Boxes ── */
  .feature-item {
    background: rgba(0,0,0,0.05);
    border: 1px solid rgba(0,0,0,0.08);
    color: #374151;
  }
  .dark .feature-item {
    background: rgba(255,255,255,0.06);
    border: 1px solid rgba(255,255,255,0.08);
    color: #d1d5db;
  }
  .feature-item-featured {
    background: rgba(217,70,239,0.07);
    border: 1px solid rgba(217,70,239,0.15);
    color: #1f2937;
  }
  .dark .feature-item-featured {
    background: rgba(217,70,239,0.10);
    border: 1px solid rgba(217,70,239,0.18);
    color: #e5e7eb;
  }

  /* ── Pricing Buttons ── */
  .pricing-btn {
    background: #111111;
    color: #ffffff;
    border: none;
  }
  .pricing-btn:hover {
    background: #333333;
  }
  .dark .pricing-btn {
    background: #ffffff;
    color: #111111;
  }
  .dark .pricing-btn:hover {
    background: #e5e5e5;
  }
  .pricing-btn-featured {
    background: linear-gradient(to right, #D946EF, #06B6D4);
    color: #ffffff;
    border: none;
    box-shadow: 0 0 18px rgba(217,70,239,0.30);
  }
  .pricing-btn-featured:hover {
    opacity: 0.92;
    box-shadow: 0 0 28px rgba(217,70,239,0.50);
  }

  /* Swiper
  .swiper-pagination-bullet { background: rgba(0,0,0,0.2) !important; opacity: 1 !important; }
  .swiper-pagination-bullet-active { background: #D946EF !important; }
  .dark .swiper-pagination-bullet { background: rgba(255,255,255,0.2) !important; } */

  .swiper-button-next, .swiper-button-prev{
    color: currentColor !important;
    background: rgba(0,0,0,0.04);
    width: 50px !important;
    height: 50px !important;
    border-radius: 50%;
    border: 1px solid rgba(0,0,0,0.08);
    backdrop-filter: blur(10px);
    transition: all 0.3s ease;
  }
  .dark .swiper-button-next, .dark .swiper-button-prev{
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(255, 255, 255, 0.1);
    color: white !important;
  }

  .swiper-button-next:after, .swiper-button-prev:after{
    font-size: 18px !important;
    font-weight: 900;
  }
  .swiper-button-next:hover, .swiper-button-prev:hover{
    background: rgba(217, 70, 239, 0.12);
    border-color: rgba(217, 70, 239, 0.35);
    box-shadow: 0 0 15px rgba(217, 70, 239, 0.22);
  }
</style>
</head>

<body class="bg-gray-50 dark:bg-background-dark text-gray-900 dark:text-gray-300 font-sans antialiased transition-colors duration-300" :class="{ 'dark': dark }">

<nav class="fixed w-full z-50 top-0 transition-all duration-300 glass border-b border-black/5 dark:border-white/5"
     x-data="{ mobileMenuOpen: false }">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between h-20">
      <div class="flex-shrink-0">
        <a class="text-2xl font-black text-gray-900 dark:text-white tracking-tighter" href="#">HARIZ.</a>
      </div>

      <div class="hidden lg:flex items-center space-x-6">
        <div class="flex items-baseline space-x-6 mr-4">
          <a class="text-gray-900 dark:text-white hover:text-primary px-3 py-2 rounded-md text-xs font-bold uppercase tracking-widest transition-colors" href="#home">Home</a>
          <a class="text-gray-600 dark:text-gray-400 hover:text-primary px-3 py-2 rounded-md text-xs font-bold uppercase tracking-widest transition-colors" href="#capabilities">Capabilities</a>
          <a class="text-gray-600 dark:text-gray-400 hover:text-primary px-3 py-2 rounded-md text-xs font-bold uppercase tracking-widest transition-colors" href="#workflow">Workflow</a>
          <a class="text-gray-600 dark:text-gray-400 hover:text-primary px-3 py-2 rounded-md text-xs font-bold uppercase tracking-widest transition-colors" href="#works">Work</a>
          <a class="text-gray-600 dark:text-gray-400 hover:text-primary px-3 py-2 rounded-md text-xs font-bold uppercase tracking-widest transition-colors" href="#stats-section">Stats</a>
          <a class="text-gray-600 dark:text-gray-400 hover:text-primary px-3 py-2 rounded-md text-xs font-bold uppercase tracking-widest transition-colors" href="#faq">FAQ</a>
          <a class="text-gray-600 dark:text-gray-400 hover:text-primary px-3 py-2 rounded-md text-xs font-bold uppercase tracking-widest transition-colors" href="#pricing">Pricing</a>
        </div>

        <!-- Theme Toggle -->
        <button @click="toggle()" class="w-10 h-10 rounded-full glass flex items-center justify-center text-gray-900 dark:text-white hover:text-primary transition-colors">
          <i x-show="!dark" class="fas fa-moon"></i>
          <i x-show="dark" class="fas fa-sun"></i>
        </button>

        <a class="bg-gray-900 text-white dark:bg-white dark:text-black hover:opacity-90 px-5 py-2 rounded-full text-xs font-black uppercase tracking-widest transition-colors" href="#contact">Contact</a>
      </div>

      <div class="-mr-2 flex lg:hidden">
        <button @click="mobileMenuOpen = !mobileMenuOpen"
                class="inline-flex items-center justify-center p-2 rounded-md text-gray-700 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white hover:bg-black/5 dark:hover:bg-white/5 focus:outline-none transition-colors"
                type="button">
          <span class="sr-only">Open main menu</span>
          <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
               xmlns="http://www.w3.org/2000/svg"
               :class="{'hidden': mobileMenuOpen, 'block': !mobileMenuOpen }">
            <path d="M4 6h16M4 12h16M4 18h16" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
          </svg>
          <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
               xmlns="http://www.w3.org/2000/svg"
               :class="{'block': mobileMenuOpen, 'hidden': !mobileMenuOpen }" x-cloak>
            <path d="M6 18L18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
          </svg>
        </button>
      </div>
    </div>
  </div>

  <!-- Mobile Menu -->
  <div class="lg:hidden glass border-t border-black/5 dark:border-white/5" x-show="mobileMenuOpen" x-transition x-cloak>
    <div class="px-4 pt-2 pb-6 space-y-1 sm:px-3">
      <a @click="mobileMenuOpen = false" class="block text-gray-900 dark:text-white hover:text-primary px-3 py-4 text-sm font-bold uppercase tracking-widest border-b border-black/5 dark:border-white/5" href="#home">Home</a>
      <a @click="mobileMenuOpen = false" class="block text-gray-600 dark:text-gray-400 hover:text-primary px-3 py-4 text-sm font-bold uppercase tracking-widest border-b border-black/5 dark:border-white/5" href="#capabilities">Capabilities</a>
      <a @click="mobileMenuOpen = false" class="block text-gray-600 dark:text-gray-400 hover:text-primary px-3 py-4 text-sm font-bold uppercase tracking-widest border-b border-black/5 dark:border-white/5" href="#workflow">Workflow</a>
      <a @click="mobileMenuOpen = false" class="block text-gray-600 dark:text-gray-400 hover:text-primary px-3 py-4 text-sm font-bold uppercase tracking-widest border-b border-black/5 dark:border-white/5" href="#works">Work</a>
      <a @click="mobileMenuOpen = false" class="block text-gray-600 dark:text-gray-400 hover:text-primary px-3 py-4 text-sm font-bold uppercase tracking-widest border-b border-black/5 dark:border-white/5" href="#stats-section">Stats</a>
      <a @click="mobileMenuOpen = false" class="block text-gray-600 dark:text-gray-400 hover:text-primary px-3 py-4 text-sm font-bold uppercase tracking-widest border-b border-black/5 dark:border-white/5" href="#faq">FAQ</a>
      <a @click="mobileMenuOpen = false" class="block text-gray-600 dark:text-gray-400 hover:text-primary px-3 py-4 text-sm font-bold uppercase tracking-widest border-b border-black/5 dark:border-white/5" href="#pricing">Pricing</a>

      <div class="pt-6 flex items-center justify-between px-3">
        <button @click="toggle(); mobileMenuOpen = false" class="flex items-center gap-3 text-gray-900 dark:text-white font-bold uppercase tracking-widest text-xs">
          <i x-show="!dark" class="fas fa-moon"></i>
          <i x-show="dark" class="fas fa-sun"></i>
          <span x-text="dark ? 'Light Mode' : 'Dark Mode'"></span>
        </button>
        <a @click="mobileMenuOpen = false" class="bg-gray-900 text-white dark:bg-white dark:text-black px-6 py-2 rounded-full text-xs font-black uppercase tracking-widest" href="#contact">Contact</a>
      </div>
    </div>
  </div>
</nav>

<section class="relative min-h-screen flex items-center justify-center pt-20 overflow-hidden bg-white dark:bg-black" id="home">
  <div class="absolute top-1/4 left-1/2 -translate-x-1/2 w-[600px] h-[600px] bg-primary/20 rounded-full blur-[120px] pointer-events-none"></div>
  <div class="absolute bottom-0 right-0 w-[400px] h-[400px] bg-secondary/10 rounded-full blur-[100px] pointer-events-none"></div>

  <div class="relative z-10 text-center px-4 sm:px-6 lg:px-8 max-w-4xl mx-auto">
    <div class="inline-block px-4 py-1.5 rounded-full border border-black/10 dark:border-white/10 bg-black/5 dark:bg-white/5 backdrop-blur-sm mb-8">
      <span class="text-xs font-semibold tracking-wider text-gray-700 dark:text-gray-300 uppercase">{{ $settings['hero_tagline'] ?? '3D Artist & Designer' }}</span>
    </div>

    <h1 class="text-6xl sm:text-7xl md:text-9xl font-black text-gray-900 dark:text-white tracking-tighter mb-4 leading-tight">
      @php
        $heroTitle = $settings['hero_title'] ?? 'Digital Architect.';
        $titleParts = explode(' ', $heroTitle, 2);
      @endphp
      {{ $titleParts[0] ?? '' }} <br class="md:hidden"/>
      <span class="text-gradient">{{ $titleParts[1] ?? '' }}</span>
    </h1>

    <p class="mt-6 max-w-2xl mx-auto text-lg sm:text-xl text-gray-600 dark:text-gray-400 font-light leading-relaxed">
      {{ $settings['hero_description'] ?? "I'm a freelance 3D designer based in Surabaya specializing in creating immersive 3D icons and environments. I bring digital visions to life." }}
    </p>

    <div class="mt-10 flex flex-col sm:flex-row justify-center gap-4">
      <a class="px-8 py-4 rounded-full bg-gray-900 dark:bg-white text-white dark:text-black font-bold text-sm tracking-wide hover:opacity-90 transition-all transform hover:scale-105" href="#works">
        VIEW PORTFOLIO
      </a>
      <a class="px-8 py-4 rounded-full glass-btn text-gray-900 dark:text-white font-bold text-sm tracking-wide" href="#contact">
        GET IN TOUCH
      </a>
    </div>
  </div>
</section>

<section class="py-24 relative bg-white dark:bg-black" id="capabilities">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-16">
      <span class="text-primary text-xs font-bold tracking-widest uppercase block mb-2">Capabilities</span>
      <h2 class="text-4xl md:text-6xl font-black text-gray-900 dark:text-white tracking-tight uppercase leading-none">
        My <br/><span class="text-gray-500 dark:text-gray-600">Services</span>
      </h2>
      <p class="mt-4 text-gray-600 dark:text-gray-400 max-w-lg">The service I offer is specifically designed to meet your needs with precision and creativity.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      @foreach($capabilities as $index => $capability)
        <div class="group relative p-8 rounded-2xl cap-card transition-all duration-300 {{ $index % 3 == 0 ? 'lg:col-span-2' : '' }}">
          <div class="absolute top-8 right-8 text-xs text-gray-500 dark:text-gray-600 font-mono text-uppercase">
            MODULE {{ str_pad($capability->module_number ?? $index+1, 2, '0', STR_PAD_LEFT) }}
          </div>

          <div class="w-10 h-10 rounded-lg {{ $index % 2 == 0 ? 'bg-gradient-to-br from-primary to-secondary' : 'bg-gray-200 dark:bg-gray-800' }} flex items-center justify-center mb-6 group-hover:bg-primary transition-colors">
            <span class="text-white text-lg">{{ $capability->icon ?? '🧊' }}</span>
          </div>

          <h3 class="{{ $index % 3 == 0 ? 'text-2xl' : 'text-xl' }} font-bold text-gray-900 dark:text-white mb-3 uppercase">
            {{ $capability->title }}
          </h3>

          <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed {{ $index % 3 == 0 ? 'max-w-md' : '' }}">
            {{ $capability->description }}
          </p>
        </div>
      @endforeach
    </div>
  </div>
</section>

<section class="py-24 bg-white dark:bg-black relative" id="workflow">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-20">
      <span class="text-xs font-bold tracking-widest uppercase text-gray-500 block mb-2">Process</span>
      <h2 class="text-4xl md:text-5xl font-black text-gray-900 dark:text-white uppercase max-w-2xl leading-tight">
        My workflow is centered around being highly productive
      </h2>
    </div>

    <div class="relative grid grid-cols-1 md:grid-cols-4 gap-8">
      <div class="hidden md:block absolute top-[1.125rem] left-0 w-full h-px bg-gradient-to-r from-gray-200 via-gray-300 to-gray-200 dark:from-gray-800 dark:via-gray-700 dark:to-gray-800 z-0"></div>

      @foreach($workflows as $index => $step)
        <div class="relative z-10 group">
          <div class="workflow-num">
            {{ str_pad($step->order ?? $index+1, 2, '0', STR_PAD_LEFT) }}
          </div>

          <div class="w-4 h-4 rounded-full bg-white dark:bg-surface-dark border-2 {{ $index == 0 ? 'border-primary' : 'border-gray-300 dark:border-gray-700' }} group-hover:border-primary mb-6 relative z-10 mx-auto md:mx-0 transition-all workflow-node-box"></div>

          <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-3 uppercase tracking-wide">{{ $step->title }}</h3>
          <p class="text-sm text-gray-600 dark:text-gray-400 leading-relaxed">{{ $step->description }}</p>
        </div>
      @endforeach
    </div>
  </div>
</section>

<section class="py-24 bg-white dark:bg-black">
  <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="about-wrap rounded-3xl p-8 md:p-12 flex flex-col md:flex-row items-center md:items-start gap-12">
      <div class="flex-shrink-0 relative group">
        <div class="absolute -inset-1 bg-gradient-to-r from-primary to-secondary rounded-2xl blur opacity-25 group-hover:opacity-50 transition duration-1000 group-hover:duration-200"></div>
        <div class="relative w-48 h-48 md:w-64 md:h-64 bg-gray-100 dark:bg-[#0A0A0A] rounded-xl overflow-hidden flex items-center justify-center">
          @php $aboutImg = $settings['about_image'] ?? 'https://lh3.googleusercontent.com/aida-public/AB6AXuClvKk01I6_8TrXQOClo3z_bkELeWbNvtucvWZFoCmMpWyI9S8q9-16stSmKgkxd5cqiEPl0OJCWSh9QC9BiJLMe52wlBadCu3-qkCIyu6r9hY7QVMAZJnLwXEp_pc6-XwyMRLWU-LK_Z9gaW6Nya1uYCFWsnARyy3_qtj_WVQGBj6EUwKcojg0GAhAeGr4O2Lqwo4sxfURyvu-_fQNTizcUezQ-Vn39zMO6hlegZvMCGCXb9tAK7aObAjS0qGCXRxGMybQuB984a3M'; @endphp
          <img alt="Pixel Art Portrait" class="w-full h-full object-cover" src="{{ str_starts_with($aboutImg, 'http') ? $aboutImg : asset($aboutImg) }}" onerror="this.onerror=null; this.src='https://ui-avatars.com/api/?name=Avatar&background=random';"/>
        </div>
      </div>

      <div class="flex-1 text-center md:text-left">
        <h2 class="text-3xl md:text-5xl font-black text-gray-900 dark:text-white uppercase mb-2">
          @php
            $aboutHeading = $settings['about_heading'] ?? 'Pure Form.';
            $aboutParts = explode(' ', $aboutHeading, 2);
          @endphp
          {{ $aboutParts[0] ?? 'Hariz' }} <br/><span class="text-gradient">{{ $aboutParts[1] ?? 'Fauzil A' }}</span>
        </h2>

        <p class="text-gray-600 dark:text-gray-400 mb-8 max-w-xl text-sm leading-relaxed">
          {{ $settings['about_description'] ?? "I'm a freelance 3D designer based in Surabaya specializing in creating 3D icons. I'm very passionate about my work and constantly pushing boundaries." }}
        </p>

        <div class="grid grid-cols-2 gap-4">
          @foreach($infoCards as $card)
            <div class="p-4 about-card rounded-xl transition-colors">
              <span class="block text-xs text-gray-500 uppercase font-bold mb-1">{{ $card->label }}</span>
              <span class="text-gray-900 dark:text-white font-medium">{{ $card->value }}</span>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>

<section class="py-24 bg-white dark:bg-black" id="works">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-16">
      <h2 class="text-4xl md:text-5xl font-black text-gray-900 dark:text-white uppercase">My Works</h2>
      <p class="text-gray-500 mt-2 text-sm uppercase tracking-widest">Check out some of our awesome projects</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
      @foreach($portfolios->take(4) as $work)
        <div class="group cursor-pointer">
          <a href="{{ $work->project_url ?? '#' }}" target="_blank" class="block rounded-2xl overflow-hidden border border-black/10 dark:border-white/10 relative h-64 md:h-80 bg-white dark:bg-surface-card">
            @if($work->image_url)
              <img alt="{{ $work->title }}" class="w-full h-full object-cover transition-all duration-700 group-hover:scale-110 group-hover:blur-[2px] opacity-90 dark:opacity-80 group-hover:opacity-100" src="{{ $work->image_url }}"/>
            @else
              <div class="w-full h-full flex items-center justify-center text-6xl opacity-10">🧊</div>
            @endif
            <div class="absolute inset-0 bg-black/30 bg-gradient-to-t from-black/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
              <span class="px-3 py-1 bg-primary text-white text-xs font-bold rounded-full">View Project</span>
            </div>
          </a>

          <div class="flex justify-between items-center mt-4 px-2 text-left">
            <a href="{{ $work->project_url ?? '#' }}" target="_blank">
              <h3 class="text-gray-900 dark:text-white font-bold text-lg hover:text-primary transition-colors">{{ $work->title }}</h3>
            </a>
            <span class="text-gray-500 dark:text-gray-600 text-xs font-mono uppercase">{{ $work->category }}</span>
          </div>
        </div>
      @endforeach
    </div>

    <div class="mt-16 text-center">
      <a href="/portfolio" class="px-8 py-3 rounded-full border border-gray-300 dark:border-gray-700 text-gray-900 dark:text-white text-xs font-bold uppercase tracking-widest hover:bg-gray-900 hover:text-white dark:hover:bg-white dark:hover:text-black transition-all">
        See All Creations <i class="fa-solid fa-arrow-right ml-2"></i>
      </a>
    </div>
  </div>
</section>

<!-- Reviews Section -->
<section class="py-24 bg-white dark:bg-black overflow-hidden" id="reviews">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-16">
      <span class="text-secondary text-xs font-bold tracking-widest uppercase block mb-2">Testimonials</span>
      <h2 class="text-4xl md:text-5xl font-black text-gray-900 dark:text-white uppercase">Client Voices</h2>
    </div>

    <div class="swiper reviews-swiper pb-20">
      <div class="swiper-wrapper">
        @foreach($reviews as $review)
          <div class="swiper-slide h-auto">
            <div class="h-full p-8 rounded-3xl review-card flex flex-col">
              <div class="flex text-primary mb-6">
                @for($i = 0; $i < ($review->rating ?? 5); $i++)
                  <i class="fa-solid fa-star text-xs"></i>
                @endfor
              </div>

              <p class="text-gray-700 dark:text-gray-300 italic mb-8 flex-1 leading-relaxed">"{{ $review->comment }}"</p>

              <div class="flex items-center gap-4">
                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-primary to-secondary flex items-center justify-center text-white font-bold text-xs uppercase">
                  {{ substr($review->client_name, 0, 1) }}
                </div>
                <div>
                  <div class="text-gray-900 dark:text-gray-300 font-bold text-sm">{{ $review->client_name }}</div>
                  <div class="text-gray-500 text-[10px] uppercase font-bold tracking-widest">Satisfied Client</div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section>

<section class="py-20 bg-white dark:bg-black border-y border-black/5 dark:border-white/5" id="stats-section">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex flex-wrap justify-center gap-8">
      @foreach($stats as $stat)
        <div class="text-center p-8 rounded-2xl stat-card w-full sm:w-[240px]">
          <div class="text-4xl md:text-5xl font-black text-gray-900 dark:text-white mb-2 stat-value" data-target="{{ preg_replace('/[^0-9]/', '', $stat->value) }}">{{ $stat->value }}</div>
          <div class="text-gray-500 text-[10px] md:text-xs font-bold uppercase tracking-widest leading-loose">{{ $stat->label }}</div>
        </div>
      @endforeach
    </div>
  </div>
</section>

<!-- ===================== -->
<!-- UPDATED PRICING SECTION -->
<!-- ===================== -->
<section class="py-24 relative bg-white dark:bg-black overflow-hidden" id="pricing">
  <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[900px] h-[500px] bg-gradient-to-r from-primary/10 via-purple-500/5 to-secondary/10 rounded-full blur-[120px] pointer-events-none"></div>

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
    <div class="text-center mb-16">
      <h2 class="text-4xl md:text-6xl font-black text-gray-900 dark:text-white uppercase">Pricing</h2>
      <p class="text-gray-600 dark:text-gray-400 mt-4 max-w-xl mx-auto">
        Choose a plan that's built for your workflow. Simple pricing, no hidden fees.
      </p>

      <div class="inline-flex items-center gap-2 mt-6 px-4 py-2 rounded-full border border-black/10 dark:border-white/10 bg-white/70 dark:bg-white/5 backdrop-blur-sm">
        <span class="w-2 h-2 rounded-full bg-primary"></span>
        <span class="text-[11px] font-black uppercase tracking-[0.2em] text-gray-800 dark:text-gray-200">
          Recommended
        </span>
      </div>
    </div>

    <div class="flex flex-wrap justify-center gap-8 items-stretch">
      @foreach($pricings as $index => $price)
        <div class="relative w-full md:w-[380px] rounded-3xl p-8 flex flex-col transition-all duration-300 overflow-visible
                    {{ $price->is_featured ? 'pricing-card-featured' : 'pricing-card' }}">

          @if($price->is_featured)
            <!-- CENTERED BADGE (exact center of the card) -->
            <div class="absolute left-1/2 top-0 -translate-x-1/2 -translate-y-1/2 z-30 w-max">
              <div class="px-6 py-2 rounded-full
                          bg-gray-900 dark:bg-black backdrop-blur
                          border border-primary/40
                          shadow-[0_0_20px_rgba(217,70,239,0.25)]
                          flex items-center justify-center">
                <span class="text-white text-[10px] font-black uppercase tracking-[0.28em] leading-none">
                  Recommended
                </span>
              </div>
            </div>
          @endif

          <!-- header -->
          <div class="mb-6">
            <span class="text-[10px] font-black uppercase tracking-[0.24em]
                        {{ $price->is_featured ? 'text-primary' : 'text-gray-500 dark:text-gray-400' }}">
              {{ $price->plan_name }}
            </span>

            <div class="flex items-baseline gap-2 mt-3">
              <span class="text-5xl font-black tracking-tighter text-gray-900 dark:text-white">
                {{ $price->price }}
              </span>
              @if($price->price_subtitle)
                <span class="text-xs font-bold text-gray-400 uppercase tracking-widest">
                  {{ $price->price_subtitle }}
                </span>
              @endif
            </div>

            <div class="mt-4 h-px w-full" style="background: linear-gradient(to right, transparent, {{ $price->is_featured ? 'rgba(217,70,239,0.3)' : 'rgba(128,128,128,0.15)' }}, transparent)"></div>
          </div>

          <!-- features -->
          @if($price->benefits)
            <p class="text-[11px] text-gray-500 dark:text-gray-400 leading-relaxed mb-6 px-1">
              {{ $price->benefits }}
            </p>
          @endif

          <ul class="flex-1 space-y-3 my-8">
            @php
              $featuresList = str_contains($price->features, "\n") 
                ? explode("\n", $price->features) 
                : explode(",", $price->features);
            @endphp
            @foreach($featuresList as $feature)
              <li class="flex items-center gap-3 text-sm px-4 py-3 rounded-xl
                         {{ $price->is_featured ? 'feature-item-featured' : 'feature-item' }}">
                <span class="shrink-0 w-5 h-5 rounded-full flex items-center justify-center"
                      style="background: {{ $price->is_featured ? 'rgba(217,70,239,0.15)' : 'rgba(6,182,212,0.15)' }}">
                  <i class="fa-solid fa-check text-[9px]"
                     style="color: {{ $price->is_featured ? '#D946EF' : '#06B6D4' }}"></i>
                </span>
                <span class="leading-relaxed">{{ trim($feature) }}</span>
              </li>
            @endforeach
          </ul>

          <!-- CTA Button -->
          <button type="button"
             onclick="document.getElementById('contact').scrollIntoView({behavior:'smooth'})"
             class="mt-auto w-full py-4 rounded-2xl text-center
                    font-black text-[10px] uppercase tracking-[0.24em]
                    transition-all duration-300 transform active:scale-95 hover:scale-[1.01]
                    {{ $price->is_featured ? 'pricing-btn-featured' : 'pricing-btn' }}">
            Choose Plan
          </button>

          @if($price->is_featured)
            <!-- subtle glow ring for featured -->
            <div class="pointer-events-none absolute inset-0 rounded-3xl ring-1 ring-primary/25 dark:ring-primary/20"></div>
          @endif
        </div>
      @endforeach
    </div>
  </div>
</section>

<section class="py-24 bg-white dark:bg-black" id="faq">
  <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-12 flex justify-between items-end">
      <div>
        <h2 class="text-3xl md:text-5xl font-black text-gray-900 dark:text-white uppercase leading-tight">
          Frequently <br/>
          <span class="text-gradient">Asked Questions</span>
        </h2>
        <p class="text-gray-500 mt-4 max-w-md">I've gathered common questions. If you can't find what you're looking for, feel free to reach out.</p>
      </div>

      <div class="hidden md:block">
        <div class="w-12 h-12 bg-gray-900 dark:bg-white text-white dark:text-black rounded-full flex items-center justify-center font-bold text-xl">?</div>
      </div>
    </div>

    <div class="space-y-4">
      @foreach($faqs as $index => $faq)
        <details class="group faq-item rounded-xl overflow-hidden transition-all duration-300">
          <summary class="flex justify-between items-center p-6 cursor-pointer list-none">
            <span class="text-gray-900 dark:text-white font-bold uppercase text-sm tracking-wide flex items-center">
              <span class="text-xs text-gray-500 mr-4 font-mono">{{ str_pad($index+1, 2, '0', STR_PAD_LEFT) }}</span>
              {{ $faq->question }}
            </span>
            <span class="transition group-open:rotate-180">
              <i class="fa-solid fa-chevron-down text-gray-500 dark:text-gray-400"></i>
            </span>
          </summary>

          <div class="px-6 pb-6 pt-0 text-gray-600 dark:text-gray-400 text-sm leading-relaxed pl-14">
            {{ $faq->answer }}
          </div>
        </details>
      @endforeach
    </div>
  </div>
</section>

<section class="py-24 bg-white dark:bg-black border-t border-black/5 dark:border-white/5" id="contact">
  <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
    <h2 class="text-4xl md:text-6xl font-black text-gray-900 dark:text-white uppercase mb-4">Start Render.</h2>
    <p class="text-gray-600 dark:text-gray-400 mb-12">Have a vision? Let's bring it into three dimensions.</p>

    <div id="contact-success" class="hidden fixed top-24 left-1/2 -translate-x-1/2 z-[100] animate-fade-in">
        <div class="px-6 py-3 bg-green-500 text-white text-xs font-black uppercase tracking-widest rounded-full shadow-2xl shadow-green-500/20 flex items-center gap-3">
            <i class="fa-solid fa-circle-check"></i>
            Transmission received. I will get back to you soon!
        </div>
    </div>

    <div id="contact-error" class="hidden fixed top-24 left-1/2 -translate-x-1/2 z-[100] animate-fade-in">
        <div class="px-6 py-3 bg-red-500 text-white text-xs font-black uppercase tracking-widest rounded-full shadow-2xl shadow-red-500/20 flex items-center gap-3">
            <i class="fa-solid fa-circle-exclamation"></i>
            Something went wrong. Please try again later.
        </div>
    </div>

    <form id="contact-form" action="{{ route('contact.send') }}" method="POST">
      @csrf
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div class="group">
          <label class="block text-[10px] font-black text-gray-500 uppercase mb-3 tracking-[0.2em]" for="name">Your Name</label>
          <div class="relative">
            <input class="w-full bg-black/5 dark:bg-white/5 border border-black/10 dark:border-white/10 rounded-2xl px-6 py-4 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-600 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all outline-none"
                   id="name" name="name" placeholder="John Doe" type="text" required/>
            <div class="absolute bottom-0 left-6 right-6 h-0.5 bg-gradient-to-r from-primary to-secondary scale-x-0 group-focus-within:scale-x-100 transition-transform duration-500 origin-left"></div>
          </div>
        </div>

        <div class="group">
          <label class="block text-[10px] font-black text-gray-500 uppercase mb-3 tracking-[0.2em]" for="email">Your Email</label>
          <div class="relative">
            <input class="w-full bg-black/5 dark:bg-white/5 border border-black/10 dark:border-white/10 rounded-2xl px-6 py-4 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-600 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all outline-none"
                   id="email" name="_replyto" placeholder="john@example.com" type="email" required/>
            <div class="absolute bottom-0 left-6 right-6 h-0.5 bg-gradient-to-r from-primary to-secondary scale-x-0 group-focus-within:scale-x-100 transition-transform duration-500 origin-left"></div>
          </div>
        </div>
      </div>

      <div class="group mt-8">
        <label class="block text-[10px] font-black text-gray-500 uppercase mb-3 tracking-[0.2em]" for="message">Project Vision</label>
        <div class="relative">
          <textarea class="w-full bg-black/5 dark:bg-white/5 border border-black/10 dark:border-white/10 rounded-2xl px-6 py-4 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-600 focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all outline-none resize-none"
                    id="message" name="message" placeholder="What are we building?" rows="5" required></textarea>
          <div class="absolute bottom-0 left-6 right-6 h-0.5 bg-gradient-to-r from-primary to-secondary scale-x-0 group-focus-within:scale-x-100 transition-transform duration-500 origin-left"></div>
        </div>
      </div>

      <button id="contact-submit" class="w-full py-5 bg-gray-900 dark:bg-white text-white dark:text-black font-black uppercase tracking-[0.2em] text-xs hover:opacity-90 transition-all rounded-2xl mt-8 group relative overflow-hidden shadow-2xl shadow-black/5"
              type="submit">
        <span class="relative z-10">Send Transmission <i class="fa-solid fa-paper-plane ml-3 group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform"></i></span>
      </button>
    </form>

    <script>
      const contactForm = document.getElementById('contact-form');
      const contactSubmit = document.getElementById('contact-submit');
      const successMsg = document.getElementById('contact-success');
      const errorMsg = document.getElementById('contact-error');

      if (contactForm) {
        contactForm.addEventListener('submit', async (e) => {
          e.preventDefault();
          contactSubmit.disabled = true;
          contactSubmit.innerHTML = 'Sending...';

          try {
            const formData = new FormData(contactForm);
            const response = await fetch(contactForm.action, {
              method: 'POST',
              body: formData,
              headers: { 'Accept': 'application/json' }
            });

            if (response.ok) {
              successMsg.classList.remove('hidden');
              contactForm.reset();
              setTimeout(() => successMsg.classList.add('hidden'), 5000);
            } else {
              errorMsg.classList.remove('hidden');
              setTimeout(() => errorMsg.classList.add('hidden'), 5000);
            }
          } catch (error) {
            errorMsg.classList.remove('hidden');
            setTimeout(() => errorMsg.classList.add('hidden'), 5000);
          } finally {
            contactSubmit.disabled = false;
            contactSubmit.innerHTML = 'Send Transmission <i class="fa-solid fa-paper-plane ml-3"></i>';
          }
        });
      }
    </script>
    <div class="mt-20 pt-12 border-t border-black/5 dark:border-white/5 flex flex-col md:flex-row justify-between items-center">
      <div class="text-center md:text-left mb-8 md:mb-0">
        <div class="font-black text-gray-900 dark:text-white text-xl uppercase tracking-tighter">Hariz Fauzil A.</div>
        <div class="text-[10px] font-bold text-gray-400 dark:text-gray-500 uppercase tracking-widest mt-1">3D Modeling Artist</div>
      </div>

      <div class="text-[10px] font-bold uppercase tracking-widest text-gray-400 dark:text-gray-500 mb-8 md:mb-0">
        © {{ date('Y') }} Hariz Fauzil A. — All Rights Reserved.
      </div>

      <div class="flex space-x-8">
        @if(!empty($settings['social_whatsapp']))
          <a href="{{ $settings['social_whatsapp'] }}" target="_blank" class="text-gray-400 dark:text-gray-600 hover:text-primary transition-all hover:scale-110">
            <i class="fa-brands fa-whatsapp text-xl"></i>
          </a>
        @endif
        @if(!empty($settings['social_dribbble']))
          <a href="{{ $settings['social_dribbble'] }}" target="_blank" class="text-gray-400 dark:text-gray-600 hover:text-primary transition-all hover:scale-110">
            <i class="fa-brands fa-dribbble text-xl"></i>
          </a>
        @endif
        @if(!empty($settings['social_instagram']))
          <a href="{{ $settings['social_instagram'] }}" target="_blank" class="text-gray-400 dark:text-gray-600 hover:text-primary transition-all hover:scale-110">
            <i class="fa-brands fa-instagram text-xl"></i>
          </a>
        @endif
      </div>
    </div>
  </div>
</section>

<div class="fixed bottom-0 left-0 w-full h-1 bg-gradient-to-r from-primary via-purple-500 to-secondary z-50"></div>

<script>
  // Swiper Initialization
  new Swiper('.reviews-swiper', {
    slidesPerView: 1,
    spaceBetween: 20,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    breakpoints: {
      640: { slidesPerView: 2 },
      1024: { slidesPerView: 3 },
    }
  });

  // Stats Counting Animation
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const counters = entry.target.querySelectorAll('.stat-value');
        counters.forEach(counter => {
          const valueStr = counter.innerText;
          const suffix = valueStr.replace(/[0-9]/g, '');
          const target = parseInt(counter.getAttribute('data-target'));

          if (isNaN(target)) return;

          let current = 0;
          const duration = 2000;
          const startTime = performance.now();

          const update = (now) => {
            const elapsed = now - startTime;
            const progress = Math.min(elapsed / duration, 1);

            // Ease out quad
            const easeProgress = progress * (2 - progress);
            current = Math.floor(easeProgress * target);

            counter.innerText = current + suffix;

            if (progress < 1) {
              requestAnimationFrame(update);
            } else {
              counter.innerText = target + suffix;
            }
          };
          requestAnimationFrame(update);
        });
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.2 });

  const statsSection = document.getElementById('stats-section');
  if (statsSection) observer.observe(statsSection);
</script>

</body>
</html>