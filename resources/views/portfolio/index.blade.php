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
<title>Portfolio - {{ $settings['site_title'] ?? 'Hariz Fauzil A.' }}</title>
<meta content="{{ $settings['site_description'] ?? 'Explore the full range of 3D icons and environments created by Hariz Fauzil A.' }}" name="description"/>
@vite(['resources/css/app.css', 'resources/js/app.js'])
<script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
<script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        primary: "#D946EF", // Electric Purple/Pink
                        secondary: "#06B6D4", // Cyan
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
    </style>
</head>
<body class="bg-background-light dark:bg-background-dark text-gray-800 dark:text-gray-300 font-sans antialiased transition-colors duration-300" :class="{ 'dark': dark }">
<nav class="fixed w-full z-50 top-0 transition-all duration-300 glass border-b border-black/5 dark:border-white/5" x-data="{ mobileMenuOpen: false }">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="flex items-center justify-between h-20">
<div class="flex-shrink-0">
<a class="text-2xl font-black text-gray-900 dark:text-white tracking-tighter" href="/">HARIZ.</a>
</div>
<div class="hidden lg:flex items-center space-x-6">
<div class="flex items-baseline space-x-6 mr-4">
<a class="text-gray-900 dark:text-white hover:text-primary px-3 py-2 rounded-md text-xs font-bold uppercase tracking-widest transition-colors" href="/#home">Home</a>
<a class="text-gray-400 hover:text-primary px-3 py-2 rounded-md text-xs font-bold uppercase tracking-widest transition-colors" href="/#capabilities">Capabilities</a>
<a class="text-gray-400 hover:text-primary px-3 py-2 rounded-md text-xs font-bold uppercase tracking-widest transition-colors" href="/#workflow">Workflow</a>
<a class="text-primary bg-primary/10 px-4 py-2 rounded-full text-xs font-bold uppercase tracking-widest transition-colors" href="#">Portfolio</a>
<a class="text-gray-400 hover:text-primary px-3 py-2 rounded-md text-xs font-bold uppercase tracking-widest transition-colors" href="/#contact">Contact</a>
</div>

<!-- Theme Toggle -->
<button @click="toggle()" class="w-10 h-10 rounded-full glass flex items-center justify-center text-gray-900 dark:text-white hover:text-primary transition-colors">
    <i x-show="!dark" class="fas fa-moon text-sm"></i>
    <i x-show="dark" class="fas fa-sun text-sm"></i>
</button>

<a class="bg-gray-900 dark:bg-white text-white dark:text-black hover:opacity-90 px-6 py-2.5 rounded-full text-[10px] font-black uppercase tracking-widest transition-all shadow-xl shadow-black/5" href="/#contact">Let's Talk</a>
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
        <a @click="mobileMenuOpen = false" class="block text-white hover:text-primary px-3 py-4 text-sm font-bold uppercase tracking-widest border-b border-white/5" href="/#home">Home</a>
        <a @click="mobileMenuOpen = false" class="block text-gray-400 hover:text-primary px-3 py-4 text-sm font-bold uppercase tracking-widest border-b border-white/5" href="/#capabilities">Capabilities</a>
        <a @click="mobileMenuOpen = false" class="block text-gray-400 hover:text-primary px-3 py-4 text-sm font-bold uppercase tracking-widest border-b border-white/5" href="/#portfolio">Work</a>
        <a @click="mobileMenuOpen = false" class="block text-gray-400 hover:text-primary px-3 py-4 text-sm font-bold uppercase tracking-widest border-b border-white/5" href="/#contact">Contact</a>
        
        <div class="pt-6 flex items-center justify-between px-3">
            <button @click="toggle(); mobileMenuOpen = false" class="flex items-center gap-3 text-white font-bold uppercase tracking-widest text-xs">
                <i x-show="!dark" class="fas fa-moon"></i>
                <i x-show="dark" class="fas fa-sun"></i>
                <span x-text="dark ? 'Light Mode' : 'Dark Mode'"></span>
            </button>
            <a @click="mobileMenuOpen = false" class="bg-white text-black px-6 py-2 rounded-full text-xs font-black uppercase tracking-widest" href="/#contact">Contact</a>
        </div>
    </div>
</div>
</nav>

<main class="pt-32 pb-24 min-h-screen bg-background-light dark:bg-background-dark">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-20 text-center md:text-left">
        <span class="text-primary text-[10px] font-black tracking-[0.2em] uppercase block mb-3">Museum of Icons</span>
        <h1 class="text-5xl md:text-7xl font-black text-gray-900 dark:text-white tracking-tighter uppercase leading-[0.9]">
            Complete <br/><span class="text-gradient">Artifacts</span>
        </h1>
        <p class="mt-6 text-gray-600 dark:text-gray-400 max-w-lg font-medium leading-relaxed">A deep dive into my 3D explorations, from customized icons to immersive environments.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($portfolios as $work)
        <div class="group cursor-pointer">
            <a href="{{ $work->project_url ?? '#' }}" target="_blank" class="block rounded-3xl overflow-hidden border border-white/10 relative aspect-square md:aspect-[4/5] bg-surface-card transition-all duration-300 card-hover">
                @if($work->image_url)
                <img alt="{{ $work->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 opacity-80 group-hover:opacity-100" src="{{ $work->image_url }}"/>
                @else
                <div class="w-full h-full flex items-center justify-center text-6xl opacity-10">🧊</div>
                @endif
                <div class="absolute inset-0 bg-gradient-to-t from-black via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500 flex flex-col justify-end p-8">
                    <span class="text-primary text-[10px] font-black uppercase tracking-widest mb-2">{{ $work->category }}</span>
                    <h3 class="text-white font-bold text-2xl mb-2">{{ $work->title }}</h3>
                    <p class="text-gray-400 text-sm line-clamp-2 mb-4">{{ $work->description }}</p>
                    <div class="flex">
                        <span class="px-4 py-2 bg-white text-black text-[10px] font-black uppercase tracking-widest rounded-full">View Case Study</span>
                    </div>
                </div>
            </a>
            <div class="hidden md:flex justify-between items-center mt-6 px-2">
                <h3 class="text-gray-900 dark:text-white font-black uppercase text-sm tracking-tight">{{ $work->title }}</h3>
                <span class="text-gray-400 dark:text-gray-600 text-[10px] font-bold uppercase tracking-widest">{{ $work->category }}</span>
            </div>
        </div>
        @endforeach
    </div>
</div>
</main>

<footer class="py-24 bg-white dark:bg-black border-t border-black/5 dark:border-white/5">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-5xl font-black text-gray-900 dark:text-white uppercase mb-4 tracking-tighter">Let's Build Something.</h2>
            <a class="text-gradient font-black text-xs uppercase tracking-[0.2em] hover:opacity-80 transition-opacity" href="/#contact">GET IN TOUCH <i class="fa-solid fa-arrow-right ml-2 text-sm"></i></a>
        </div>

        <div class="pt-12 border-t border-black/5 dark:border-white/5 flex flex-col md:flex-row justify-between items-center">
            <div class="text-center md:text-left mb-8 md:mb-0">
                <div class="font-black text-gray-900 dark:text-white text-xl uppercase tracking-tighter">Hariz Fauzil A.</div>
                <div class="text-[10px] font-bold text-gray-400 dark:text-gray-500 uppercase tracking-widest mt-1">3D Modeling Artist</div>
            </div>

            <div class="text-[10px] font-bold uppercase tracking-widest text-gray-400 dark:text-gray-500 mb-8 md:mb-0 text-center">
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
</footer>

<div class="fixed bottom-0 left-0 w-full h-1 bg-gradient-to-r from-primary via-purple-500 to-secondary z-50"></div>

</body>
</html>
