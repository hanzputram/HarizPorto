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
                        primary: "#D946EF", // Electric Purple/Pink
                        secondary: "#06B6D4", // Cyan
                        "background-light": "#F3F4F6", // Light gray for light mode fallback (though this design is heavily dark)
                        "background-dark": "#050505", // Deep Obsidian Black
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
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #050505;
        }
        ::-webkit-scrollbar-thumb {
            background: #333;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #444;
        }.glass {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
        .glass-btn {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(4px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }
        .glass-btn:hover {
            background: rgba(255, 255, 255, 0.2);
            border-color: rgba(255, 255, 255, 0.3);
            box-shadow: 0 0 15px rgba(217, 70, 239, 0.4);
        }
        .text-gradient {
            background: linear-gradient(to right, #D946EF, #06B6D4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .card-hover:hover {
            border-color: rgba(217, 70, 239, 0.5);
            box-shadow: 0 0 20px rgba(217, 70, 239, 0.15);
            transform: translateY(-2px);
        }
        .workflow-node-box {
            transition: all 0.3s ease;
        }
        .dark .workflow-node-box {
            background-color: #340457 !important;
            border-color: rgba(217, 70, 239, 0.3);
            box-shadow: 0 0 20px rgba(52, 4, 87, 0.5);
        }
        .swiper-pagination-bullet {
            background: rgba(255,255,255,0.2) !important;
            opacity: 1 !important;
        }
        .swiper-pagination-bullet-active {
            background: #D946EF !important;
        }
    </style>
</head>
<body class="bg-background-light dark:bg-background-dark text-gray-800 dark:text-gray-300 font-sans antialiased transition-colors duration-300" :class="{ 'dark': dark }">
<nav class="fixed w-full z-50 top-0 transition-all duration-300 glass border-b border-white/5" x-data="{ mobileMenuOpen: false }">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="flex items-center justify-between h-20">
<div class="flex-shrink-0">
<a class="text-2xl font-black text-white tracking-tighter" href="#">HARIZ.</a>
</div>
<div class="hidden lg:flex items-center space-x-6">
<div class="flex items-baseline space-x-6 mr-4">
<a class="text-white hover:text-primary px-3 py-2 rounded-md text-xs font-bold uppercase tracking-widest transition-colors" href="#home">Home</a>
<a class="text-gray-400 hover:text-primary px-3 py-2 rounded-md text-xs font-bold uppercase tracking-widest transition-colors" href="#capabilities">Capabilities</a>
<a class="text-gray-400 hover:text-primary px-3 py-2 rounded-md text-xs font-bold uppercase tracking-widest transition-colors" href="#workflow">Workflow</a>
<a class="text-gray-400 hover:text-primary px-3 py-2 rounded-md text-xs font-bold uppercase tracking-widest transition-colors" href="#works">Work</a>
<a class="text-gray-400 hover:text-primary px-3 py-2 rounded-md text-xs font-bold uppercase tracking-widest transition-colors" href="#stats-section">Stats</a>
<a class="text-gray-400 hover:text-primary px-3 py-2 rounded-md text-xs font-bold uppercase tracking-widest transition-colors" href="#faq">FAQ</a>
<a class="text-gray-400 hover:text-primary px-3 py-2 rounded-md text-xs font-bold uppercase tracking-widest transition-colors" href="#pricing">Pricing</a>
</div>

<!-- Theme Toggle -->
<button @click="toggle()" class="w-10 h-10 rounded-full glass flex items-center justify-center text-white hover:text-primary transition-colors">
    <i x-show="!dark" class="fas fa-moon"></i>
    <i x-show="dark" class="fas fa-sun"></i>
</button>

<a class="bg-white text-black hover:bg-gray-200 px-5 py-2 rounded-full text-xs font-black uppercase tracking-widest transition-colors" href="#contact">Contact</a>
</div>

<div class="-mr-2 flex lg:hidden">
<button @click="mobileMenuOpen = !mobileMenuOpen" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-white/5 focus:outline-none transition-colors" type="button">
<span class="sr-only">Open main menu</span>
<svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" :class="{'hidden': mobileMenuOpen, 'block': !mobileMenuOpen }">
<path d="M4 6h16M4 12h16M4 18h16" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
</svg>
<svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" :class="{'block': mobileMenuOpen, 'hidden': !mobileMenuOpen }" x-cloak>
<path d="M6 18L18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
</svg>
</button>
</div>
</div>
</div>

<!-- Mobile Menu -->
<div class="lg:hidden glass border-t border-white/5" x-show="mobileMenuOpen" x-transition x-cloak>
    <div class="px-4 pt-2 pb-6 space-y-1 sm:px-3">
        <a @click="mobileMenuOpen = false" class="block text-white hover:text-primary px-3 py-4 text-sm font-bold uppercase tracking-widest border-b border-white/5" href="#home">Home</a>
        <a @click="mobileMenuOpen = false" class="block text-gray-400 hover:text-primary px-3 py-4 text-sm font-bold uppercase tracking-widest border-b border-white/5" href="#capabilities">Capabilities</a>
        <a @click="mobileMenuOpen = false" class="block text-gray-400 hover:text-primary px-3 py-4 text-sm font-bold uppercase tracking-widest border-b border-white/5" href="#workflow">Workflow</a>
        <a @click="mobileMenuOpen = false" class="block text-gray-400 hover:text-primary px-3 py-4 text-sm font-bold uppercase tracking-widest border-b border-white/5" href="#works">Work</a>
        <a @click="mobileMenuOpen = false" class="block text-gray-400 hover:text-primary px-3 py-4 text-sm font-bold uppercase tracking-widest border-b border-white/5" href="#stats-section">Stats</a>
        <a @click="mobileMenuOpen = false" class="block text-gray-400 hover:text-primary px-3 py-4 text-sm font-bold uppercase tracking-widest border-b border-white/5" href="#faq">FAQ</a>
        <a @click="mobileMenuOpen = false" class="block text-gray-400 hover:text-primary px-3 py-4 text-sm font-bold uppercase tracking-widest border-b border-white/5" href="#pricing">Pricing</a>
        
        <div class="pt-6 flex items-center justify-between px-3">
            <button @click="toggle(); mobileMenuOpen = false" class="flex items-center gap-3 text-white font-bold uppercase tracking-widest text-xs">
                <i x-show="!dark" class="fas fa-moon"></i>
                <i x-show="dark" class="fas fa-sun"></i>
                <span x-text="dark ? 'Light Mode' : 'Dark Mode'"></span>
            </button>
            <a @click="mobileMenuOpen = false" class="bg-white text-black px-6 py-2 rounded-full text-xs font-black uppercase tracking-widest" href="#contact">Contact</a>
        </div>
    </div>
</div>
</nav>
<section class="relative min-h-screen flex items-center justify-center pt-20 overflow-hidden bg-background-light dark:bg-black" id="home">
<div class="absolute top-1/4 left-1/2 -translate-x-1/2 w-[600px] h-[600px] bg-primary/20 rounded-full blur-[120px] pointer-events-none"></div>
<div class="absolute bottom-0 right-0 w-[400px] h-[400px] bg-secondary/10 rounded-full blur-[100px] pointer-events-none"></div>
<div class="relative z-10 text-center px-4 sm:px-6 lg:px-8 max-w-4xl mx-auto">
<div class="inline-block px-4 py-1.5 rounded-full border border-white/10 bg-white/5 backdrop-blur-sm mb-8">
<span class="text-xs font-semibold tracking-wider text-gray-300 uppercase">{{ $settings['hero_tagline'] ?? '3D Artist & Designer' }}</span>
</div>
<h1 class="text-6xl sm:text-7xl md:text-9xl font-black text-white tracking-tighter mb-4 leading-tight">
    @php
        $heroTitle = $settings['hero_title'] ?? 'Digital Architect.';
        $titleParts = explode(' ', $heroTitle, 2);
    @endphp
    {{ $titleParts[0] ?? '' }} <br class="md:hidden"/>
    <span class="text-gradient">{{ $titleParts[1] ?? '' }}</span>
</h1>
<p class="mt-6 max-w-2xl mx-auto text-lg sm:text-xl text-gray-400 font-light leading-relaxed">
    {{ $settings['hero_description'] ?? "I'm a freelance 3D designer based in Surabaya specializing in creating immersive 3D icons and environments. I bring digital visions to life." }}
</p>
<div class="mt-10 flex flex-col sm:flex-row justify-center gap-4">
<a class="px-8 py-4 rounded-full bg-white text-black font-bold text-sm tracking-wide hover:bg-gray-200 transition-all transform hover:scale-105" href="#works">
                    VIEW PORTFOLIO
                </a>
<a class="px-8 py-4 rounded-full glass-btn text-white font-bold text-sm tracking-wide" href="#contact">
                    GET IN TOUCH
                </a>
</div>
</div>
</section>
<section class="py-24 relative bg-black" id="capabilities">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="mb-16">
<span class="text-primary text-xs font-bold tracking-widest uppercase block mb-2">Capabilities</span>
<h2 class="text-4xl md:text-6xl font-black text-white tracking-tight uppercase leading-none">
                    My <br/><span class="text-gray-600">Services</span>
</h2>
<p class="mt-4 text-gray-400 max-w-lg">The service I offer is specifically designed to meet your needs with precision and creativity.</p>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
@foreach($capabilities as $index => $capability)
    <div class="group relative p-8 rounded-2xl glass border border-white/5 transition-all duration-300 card-hover bg-surface-card/40 {{ $index % 3 == 0 ? 'lg:col-span-2' : '' }}">
        <div class="absolute top-8 right-8 text-xs text-gray-600 font-mono text-uppercase">MODULE {{ str_pad($capability->module_number ?? $index+1, 2, '0', STR_PAD_LEFT) }}</div>
        <div class="w-10 h-10 rounded-lg {{ $index % 2 == 0 ? 'bg-gradient-to-br from-primary to-secondary' : 'bg-gray-800' }} flex items-center justify-center mb-6 group-hover:bg-primary transition-colors">
            <span class="text-white text-lg">{{ $capability->icon ?? '🧊' }}</span>
        </div>
        <h3 class="{{ $index % 3 == 0 ? 'text-2xl' : 'text-xl' }} font-bold text-white mb-3 uppercase">{{ $capability->title }}</h3>
        <p class="text-gray-400 text-sm leading-relaxed {{ $index % 3 == 0 ? 'max-w-md' : '' }}">{{ $capability->description }}</p>
    </div>
@endforeach
</div>
</div>
</section>
<section class="py-24 bg-black relative" id="workflow">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="mb-20">
<span class="text-xs font-bold tracking-widest uppercase text-gray-500 block mb-2">Process</span>
<h2 class="text-4xl md:text-5xl font-black text-white uppercase max-w-2xl leading-tight">
                    My workflow is centered around being highly productive
                </h2>
</div>
<div class="relative grid grid-cols-1 md:grid-cols-4 gap-8">
<div class="hidden md:block absolute top-[1.125rem] left-0 w-full h-px bg-gradient-to-r from-gray-800 via-gray-700 to-gray-800 z-0"></div>
@foreach($workflows as $index => $step)
<div class="relative z-10 group">
<div class="text-6xl font-black text-white/5 absolute -top-10 left-0 select-none group-hover:text-primary/10 transition-colors">{{ str_pad($step->order ?? $index+1, 2, '0', STR_PAD_LEFT) }}</div>
<div class="w-4 h-4 rounded-full bg-surface-dark border-2 {{ $index == 0 ? 'border-primary' : 'border-gray-700' }} group-hover:border-primary mb-6 relative z-10 mx-auto md:mx-0 transition-all workflow-node-box"></div>
<h3 class="text-lg font-bold text-white mb-3 uppercase tracking-wide">{{ $step->title }}</h3>
<p class="text-sm text-gray-400 leading-relaxed">{{ $step->description }}</p>
</div>
@endforeach
</div>
</div>
</section>
<section class="py-24 bg-black">
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="bg-surface-card border border-white/5 rounded-3xl p-8 md:p-12 flex flex-col md:flex-row items-center md:items-start gap-12 shadow-glow-card">
<div class="flex-shrink-0 relative group">
<div class="absolute -inset-1 bg-gradient-to-r from-primary to-secondary rounded-2xl blur opacity-25 group-hover:opacity-50 transition duration-1000 group-hover:duration-200"></div>
<div class="relative w-48 h-48 md:w-64 md:h-64 bg-[#0A0A0A] rounded-xl overflow-hidden flex items-center justify-center">
<img alt="Pixel Art Portrait" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuClvKk01I6_8TrXQOClo3z_bkELeWbNvtucvWZFoCmMpWyI9S8q9-16stSmKgkxd5cqiEPl0OJCWSh9QC9BiJLMe52wlBadCu3-qkCIyu6r9hY7QVMAZJnLwXEp_pc6-XwyMRLWU-LK_Z9gaW6Nya1uYCFWsnARyy3_qtj_WVQGBj6EUwKcojg0GAhAeGr4O2Lqwo4sxfURyvu-_fQNTizcUezQ-Vn39zMO6hlegZvMCGCXb9tAK7aObAjS0qGCXRxGMybQuB984a3M"/>
</div>
</div>
<div class="flex-1 text-center md:text-left">
<h2 class="text-3xl md:text-5xl font-black text-white uppercase mb-2">
    @php
        $aboutHeading = $settings['about_heading'] ?? 'Pure Form.';
        $aboutParts = explode(' ', $aboutHeading, 2);
    @endphp
    {{ $aboutParts[0] ?? 'Hariz' }} <br/><span class="text-gradient">{{ $aboutParts[1] ?? 'Fauzil A' }}</span>
</h2>
<p class="text-gray-400 mb-8 max-w-xl text-sm leading-relaxed">
    {{ $settings['about_description'] ?? "I'm a freelance 3D designer based in Surabaya specializing in creating 3D icons. I'm very passionate about my work and constantly pushing boundaries." }}
</p>
<div class="grid grid-cols-2 gap-4">
<div class="p-4 bg-background-dark/50 rounded-lg border border-white/5 hover:border-white/10 transition-colors">
<span class="block text-xs text-gray-500 uppercase font-bold mb-1">{{ $settings['about_card1_label'] ?? 'Primary Tools' }}</span>
<span class="text-white font-medium">{{ $settings['about_pipeline_tools'] ?? 'Blender, Cinema 4D' }}</span>
</div>
<div class="p-4 bg-background-dark/50 rounded-lg border border-white/5 hover:border-white/10 transition-colors">
<span class="block text-xs text-gray-500 uppercase font-bold mb-1">{{ $settings['about_card2_label'] ?? 'Experience' }}</span>
<span class="text-white font-medium">{{ $settings['about_experience_years'] ?? '5+' }} Years in 3D</span>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="py-24 bg-black" id="works">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="text-center mb-16">
<h2 class="text-4xl md:text-5xl font-black text-white uppercase">My Works</h2>
<p class="text-gray-500 mt-2 text-sm uppercase tracking-widest">Check out some of our awesome projects</p>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-8">
@foreach($portfolios->take(4) as $work)
<div class="group cursor-pointer">
<a href="{{ $work->project_url ?? '#' }}" target="_blank" class="block rounded-2xl overflow-hidden border border-white/10 relative h-64 md:h-80 bg-surface-card">
@if($work->image_url)
<img alt="{{ $work->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 opacity-80 group-hover:opacity-100" src="{{ $work->image_url }}"/>
@else
<div class="w-full h-full flex items-center justify-center text-6xl opacity-10">🧊</div>
@endif
<div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
<span class="px-3 py-1 bg-primary text-white text-xs font-bold rounded-full">View Project</span>
</div>
</a>
<div class="flex justify-between items-center mt-4 px-2 text-left">
<h3 class="text-white font-bold text-lg">{{ $work->title }}</h3>
<span class="text-gray-600 text-xs font-mono uppercase">{{ $work->category }}</span>
</div>
</div>
@endforeach
</div>
<div class="mt-16 text-center">
<a href="/portfolio" class="px-8 py-3 rounded-full border border-gray-700 text-white text-xs font-bold uppercase tracking-widest hover:bg-white hover:text-black transition-all">
                    See All Creations <i class="fa-solid fa-arrow-right ml-2"></i>
</a>
</div>
</div>
</section>

<!-- Reviews Section -->
<section class="py-24 bg-black overflow-hidden" id="reviews">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="text-secondary text-xs font-bold tracking-widest uppercase block mb-2">Testimonials</span>
            <h2 class="text-4xl md:text-5xl font-black text-white uppercase">Client Voices</h2>
        </div>
        
        <div class="swiper reviews-swiper pb-12">
            <div class="swiper-wrapper">
                @foreach($reviews as $review)
                <div class="swiper-slide h-auto">
                    <div class="h-full p-8 rounded-3xl glass border border-white/5 flex flex-col bg-surface-card/30">
                        <div class="flex text-primary mb-6">
                            @for($i = 0; $i < ($review->rating ?? 5); $i++)
                            <i class="fa-solid fa-star text-xs"></i>
                            @endfor
                        </div>
                        <p class="text-gray-300 italic mb-8 flex-1 leading-relaxed">"{{ $review->comment }}"</p>
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-primary to-secondary flex items-center justify-center text-white font-bold text-xs uppercase">
                                {{ substr($review->client_name, 0, 1) }}
                            </div>
                            <div>
                                <div class="text-white font-bold text-sm">{{ $review->client_name }}</div>
                                <div class="text-gray-500 text-[10px] uppercase font-bold tracking-widest">Satisfied Client</div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="swiper-pagination !-bottom-2"></div>
        </div>
    </div>
</section>
<section class="py-20 bg-black border-y border-white/5" id="stats-section">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="grid grid-cols-2 md:grid-cols-4 gap-8">
@foreach($stats as $stat)
<div class="text-center p-6 rounded-2xl bg-surface-card/20 backdrop-blur-sm border border-white/5">
<div class="text-4xl md:text-5xl font-black text-white mb-2 stat-value" data-target="{{ preg_replace('/[^0-9]/', '', $stat->value) }}">{{ $stat->value }}</div>
<div class="text-gray-500 text-[10px] md:text-xs font-bold uppercase tracking-widest">{{ $stat->label }}</div>
</div>
@endforeach
</div>
</div>
</section>
<section class="py-24 relative bg-black overflow-hidden" id="pricing">
<div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[400px] bg-primary/5 rounded-full blur-[100px] pointer-events-none"></div>
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
<div class="text-center mb-16">
<h2 class="text-4xl md:text-6xl font-black text-white uppercase">Pricing</h2>
<p class="text-gray-400 mt-4 max-w-xl mx-auto">Choose a plan that's built for your workflow. Simple pricing, no hidden fees.</p>
<div class="inline-block mt-4 px-3 py-1 bg-white/10 rounded-full text-xs font-medium text-primary">Recommended</div>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
@foreach($pricings as $index => $price)
<div class="rounded-3xl bg-surface-card border {{ $price->is_featured ? 'border-primary shadow-glow-purple md:-translate-y-4' : 'border-white/5 hover:border-white/20' }} p-8 flex flex-col transition-all group relative">
@if($price->is_featured)
<div class="absolute top-0 left-1/2 -translate-x-1/2 -translate-y-1/2 px-3 py-1 bg-primary text-white text-[10px] font-bold uppercase rounded-full">Recommended</div>
@endif
<div class="mb-4">
<span class="text-xs font-bold {{ $price->is_featured ? 'text-primary' : 'text-gray-500' }} uppercase tracking-widest">{{ $price->plan_name }}</span>
<div class="text-4xl font-black text-white mt-2">{{ $price->price }}</div>
</div>
<ul class="flex-1 space-y-4 my-8">
@foreach(explode(',', $price->features) as $feature)
<li class="flex items-start text-sm {{ $price->is_featured ? 'text-gray-300' : 'text-gray-400' }}">
<i class="fa-solid fa-check {{ $price->is_featured ? 'text-primary' : 'text-green-500' }} mt-1 mr-3"></i>
<span>{{ trim($feature) }}</span>
</li>
@endforeach
</ul>
<a class="w-full py-3 {{ $price->is_featured ? 'bg-gradient-to-r from-primary to-secondary text-white' : 'bg-white text-black hover:bg-gray-200' }} font-bold text-sm uppercase rounded-lg text-center transition-all" href="#contact">Choose Plan</a>
</div>
@endforeach
</div>
</div>
</section>
<section class="py-24 bg-black" id="faq">
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="mb-12 flex justify-between items-end">
<div>
<h2 class="text-3xl md:text-5xl font-black text-white uppercase leading-tight">
                        Frequently <br/>
<span class="text-gradient">Asked Questions</span>
</h2>
<p class="text-gray-500 mt-4 max-w-md">I've gathered common questions. If you can't find what you're looking for, feel free to reach out.</p>
</div>
<div class="hidden md:block">
<div class="w-12 h-12 bg-white rounded-full flex items-center justify-center font-bold text-xl">?</div>
</div>
</div>
<div class="space-y-4">
@foreach($faqs as $index => $faq)
<details class="group bg-surface-card border border-white/5 rounded-xl overflow-hidden transition-all duration-300 open:border-primary/30 open:bg-surface-card/80">
<summary class="flex justify-between items-center p-6 cursor-pointer list-none">
<span class="text-white font-bold uppercase text-sm tracking-wide flex items-center">
<span class="text-xs text-gray-600 mr-4 font-mono">{{ str_pad($index+1, 2, '0', STR_PAD_LEFT) }}</span>
                            {{ $faq->question }}
                        </span>
<span class="transition group-open:rotate-180">
<i class="fa-solid fa-chevron-down text-gray-400"></i>
</span>
</summary>
<div class="px-6 pb-6 pt-0 text-gray-400 text-sm leading-relaxed pl-14">
    {{ $faq->answer }}
</div>
</details>
@endforeach
</div>
</div>
</section>
<section class="py-24 bg-black border-t border-white/5" id="contact">
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
<h2 class="text-4xl md:text-6xl font-black text-white uppercase mb-4">Start Render.</h2>
<p class="text-gray-400 mb-12">Have a vision? Let's bring it into three dimensions.</p>
<form class="space-y-6 text-left max-w-xl mx-auto">
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
<div>
<label class="block text-xs font-bold text-gray-500 uppercase mb-2" for="name">Your Name</label>
<input class="w-full bg-surface-card border-b border-gray-700 focus:border-white focus:ring-0 text-white px-0 py-2 placeholder-gray-600 transition-colors" id="name" placeholder="John Doe" type="text"/>
</div>
<div>
<label class="block text-xs font-bold text-gray-500 uppercase mb-2" for="email">Your Email</label>
<input class="w-full bg-surface-card border-b border-gray-700 focus:border-white focus:ring-0 text-white px-0 py-2 placeholder-gray-600 transition-colors" id="email" placeholder="john@example.com" type="email"/>
</div>
</div>
<div>
<label class="block text-xs font-bold text-gray-500 uppercase mb-2" for="message">Tell us about your project</label>
<textarea class="w-full bg-surface-card border-b border-gray-700 focus:border-white focus:ring-0 text-white px-0 py-2 placeholder-gray-600 transition-colors resize-none" id="message" placeholder="Project requirements..." rows="4"></textarea>
</div>
<button class="w-full py-4 bg-white text-black font-bold uppercase tracking-widest text-sm hover:bg-gray-200 transition-all rounded-lg mt-8 group" type="submit">
                    Send Transmission <i class="fa-solid fa-paper-plane ml-2 group-hover:translate-x-1 transition-transform"></i>
</button>
</form>
<div class="mt-20 pt-8 border-t border-white/5 flex flex-col md:flex-row justify-between items-center">
<div class="text-left mb-4 md:mb-0">
<div class="font-bold text-white text-lg">Hariz Fauzil A.</div>
<div class="text-xs text-gray-500">3D Modeling Artist</div>
</div>
<div class="text-xs text-gray-600 mb-4 md:mb-0">
                    © {{ date('Y') }} Hariz Fauzil A. All Rights Reserved.
                </div>
<div class="flex space-x-6">
    @if(!empty($settings['social_whatsapp']))
    <a href="{{ $settings['social_whatsapp'] }}" target="_blank" class="text-gray-400 hover:text-white transition-colors"><i class="fa-brands fa-whatsapp text-lg"></i></a>
    @endif
    @if(!empty($settings['social_dribbble']))
    <a href="{{ $settings['social_dribbble'] }}" target="_blank" class="text-gray-400 hover:text-white transition-colors"><i class="fa-brands fa-dribbble text-lg"></i></a>
    @endif
    @if(!empty($settings['social_instagram']))
    <a href="{{ $settings['social_instagram'] }}" target="_blank" class="text-gray-400 hover:text-white transition-colors"><i class="fa-brands fa-instagram text-lg"></i></a>
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
</body></html>