<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      class="scroll-smooth"
      x-data="{
        dark: localStorage.getItem('theme') === 'dark',
        toggle(){
          this.dark = !this.dark;
          localStorage.setItem('theme', this.dark ? 'dark' : 'light');
        }
      }"
      :class="{ 'dark': dark }">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Portfolio | Hariz 3D</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap" rel="stylesheet">

        <!-- Alpine (for Dark Mode Toggle) -->
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

        <!-- AOS (Animate on Scroll) -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

        <!-- Swiper.js -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- DARK MODE THEME OVERRIDES -->
        <style>
            /* =========================
               THEME TOKENS (LIGHT)
            ========================== */
            :root{
                --bg: #ffffff;
                --bg-soft: #FBFBFF;
                --text: #0b0b0f;
                --border: rgba(0,0,0,.06);
                --shadow: rgba(106, 90, 205, .12);
            }

            [x-cloak] { display: none !important; }

            /* =========================
               THEME TOKENS (DARK)
            ========================== */
            html.dark{
                color-scheme: dark;
                --bg: #070810;
                --bg-soft: #0b0d18;
                --text: rgba(255,255,255,.92);
                --border: rgba(255,255,255,.08);
                --shadow: rgba(184, 167, 255, .18);
            }

            /* =========================
               GLOBAL BASE
            ========================== */
            body{
                background: var(--bg) !important;
                color: var(--text) !important;
            }

            /* Background overrides for hardcoded classes */
            .bg-white{ background-color: var(--bg) !important; }
            .bg-\[\#FBFBFF\]{ background-color: var(--bg-soft) !important; }

            /* Border overrides */
            .border-black\/5{ border-color: var(--border) !important; }
            .border-black\/10{ border-color: var(--border) !important; }
            .border-t.border-black\/5{ border-top-color: var(--border) !important; }
            .border-b.border-black\/5{ border-bottom-color: var(--border) !important; }

            /* Text overrides ONLY in dark mode */
            html.dark .text-black{ color: var(--text) !important; }
            html.dark .text-black\/80{ color: rgba(255,255,255,.78) !important; }
            html.dark .text-black\/70{ color: rgba(255,255,255,.70) !important; }
            html.dark .text-black\/60{ color: rgba(255,255,255,.62) !important; }
            html.dark .text-black\/50{ color: rgba(255,255,255,.55) !important; }
            html.dark .text-black\/40{ color: rgba(255,255,255,.52) !important; }
            html.dark .text-black\/30{ color: rgba(255,255,255,.32) !important; }
            html.dark .text-black\/20{ color: rgba(255,255,255,.20) !important; }
            html.dark .text-black\/10{ color: rgba(255,255,255,.12) !important; }

            /* bg black/5 used as line/track -> use border token in dark */
            html.dark .bg-black\/5{ background-color: var(--border) !important; }

            /* Header backdrop in dark */
            html.dark header{
                background: rgba(7,8,16,.60) !important;
                border-bottom-color: var(--border) !important;
            }

            /* Cards/buttons/inputs (if defined in app.css, this helps) */
            html.dark .neo-card{
                background: var(--bg-soft) !important;
                border-color: var(--border) !important;
                box-shadow: 0 20px 60px var(--shadow) !important;
            }
            html.dark .neo-btn{
                background: rgba(255,255,255,.92) !important;
                color: #070810 !important;
                border-color: rgba(255,255,255,.12) !important;
            }
            html.dark .neo-input{
                background: rgba(255,255,255,.04) !important;
                color: var(--text) !important;
                border-color: var(--border) !important;
            }
            html.dark .neo-input::placeholder{
                color: rgba(255,255,255,.35) !important;
            }

            /* Hover inversion that exists in your buttons */
            html.dark .hover\:bg-black:hover{ background-color: rgba(255,255,255,.92) !important; }
            html.dark .hover\:text-white:hover{ color: #070810 !important; }

            /* Blueprint background slightly stronger in dark */
            html.dark .bg-blueprint-grid{ opacity: .06 !important; }

            /* Doodles a bit calmer in dark */
            html.dark .doodle{ opacity: .22 !important; }

            /* =========================
               REVIEWS: prevent shadow clipping (UPDATED)
            ========================== */
            .reviews-swiper,
            .reviews-swiper .swiper-wrapper,
            .reviews-swiper .swiper-slide{
                overflow: visible !important;
            }

            /* Navbar specific dark mode compatibility */
            html.dark .nav-link {
                color: rgba(255, 255, 255, 0.45) !important;
            }
            html.dark .nav-link:hover {
                color: #ffffff !important;
            }
            html.dark .nav-link.active {
                background: rgba(201, 160, 204, 0.15) !important;
                color: #ffffff !important;
            }

            /* Social buttons theme compatibility - Glassy idle state */
            html.dark .neo-social-btn {
                background: rgba(255, 255, 255, 0.03) !important;
                border-color: rgba(255, 255, 255, 0.08) !important;
                color: rgba(255, 255, 255, 0.8) !important;
            }
            html.dark .neo-social-btn:hover {
                background: rgba(201, 160, 204, 0.2) !important;
                border-color: #c9a0cc !important;
                color: #ffffff !important;
            }
        </style>
    </head>

    <body class="overflow-x-hidden bg-lavender-light selection:bg-lavender selection:text-black font-sans">

        <!-- Navigation Bar -->
        <header class="fixed top-0 left-0 w-full z-50 border-b border-black/5 backdrop-blur-md transition-all duration-300">
            <nav class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
                <div class="flex-1">
                    <span class="font-bold text-xl tracking-tighter text-black transition-colors">HARIZ.</span>
                </div>

                <div class="hidden md:flex items-center justify-center gap-10 flex-2">
                    <a href="#hero" class="nav-link">Home</a>
                    <a href="#capabilities" class="nav-link">Capabilities</a>
                    <a href="#about" class="nav-link">About</a>
                    <a href="#work" class="nav-link">Work</a>
                    <a href="#stats-section" class="nav-link">Statistics</a>
                    <a href="#pricing" class="nav-link">Pricing</a>
                    <a href="#contact" class="nav-link">Contact</a>
                </div>

                <div class="flex items-center justify-end gap-3 flex-1">

                    <!-- DARK MODE TOGGLE (UPDATED ICON SWITCH) -->
                    <button
                        @click="toggle()"
                        class="neo-social-btn flex items-center justify-center"
                        :title="dark ? 'Light mode' : 'Dark mode'"
                        aria-label="Toggle dark mode"
                    >
                        <!-- Moon (when light mode) -->
                        <svg x-show="!dark" x-cloak xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                             class="w-4 h-4 text-black/80">
                            <path fill="currentColor"
                                  d="M21.64 13a1 1 0 0 0-1.05-.14A8.05 8.05 0 0 1 17.22 13.6A8.15 8.15 0 0 1 10.4 2.78a1 1 0 0 0-1.19-1.2A10 10 0 1 0 22 14.19a1 1 0 0 0-.36-1.19Z"/>
                        </svg>

                        <!-- Sun (when dark mode) -->
                        <svg x-show="dark" x-cloak xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                             class="w-4 h-4 text-white/90">
                            <path fill="currentColor"
                                  d="M12 18a6 6 0 1 1 0-12a6 6 0 0 1 0 12Zm0-16a1 1 0 0 1 1 1v1a1 1 0 1 1-2 0V3a1 1 0 0 1 1-1Zm0 18a1 1 0 0 1 1 1v1a1 1 0 1 1-2 0v-1a1 1 0 0 1 1-1ZM4 11a1 1 0 1 1 0 2H3a1 1 0 1 1 0-2h1Zm18 0a1 1 0 1 1 0 2h-1a1 1 0 1 1 0-2h1ZM5.05 5.05a1 1 0 0 1 1.41 0l.71.71a1 1 0 1 1-1.41 1.41l-.71-.71a1 1 0 0 1 0-1.41Zm12.02 12.02a1 1 0 0 1 1.41 0l.71.71a1 1 0 1 1-1.41 1.41l-.71-.71a1 1 0 0 1 0-1.41ZM18.95 5.05a1 1 0 0 1 0 1.41l-.71.71a1 1 0 1 1-1.41-1.41l.71-.71a1 1 0 0 1 1.41 0ZM7.17 16.83a1 1 0 0 1 0 1.41l-.71.71a1 1 0 1 1-1.41-1.41l.71-.71a1 1 0 0 1 1.41 0Z"/>
                        </svg>
                    </button>

                    @if(!empty($settings['social_whatsapp']))
                    <a href="{{ $settings['social_whatsapp'] }}" target="_blank" class="neo-social-btn" title="WhatsApp">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                    </a>
                    @endif
                    @if(!empty($settings['social_dribbble']))
                    <a href="{{ $settings['social_dribbble'] }}" target="_blank" class="neo-social-btn" title="Dribbble">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M12 24C5.385 24 0 18.615 0 12S5.385 0 12 0s12 5.385 12 12-5.385 12-12 12zm10.12-10.358c-.35-.11-3.17-.953-6.384-.438 1.34 3.684 1.887 6.684 1.992 7.308 2.3-1.555 3.936-4.02 4.395-6.87zm-6.115 7.808c-.153-.9-.75-4.032-2.19-7.77l-.066.02c-5.79 2.015-7.86 6.025-8.04 6.4 1.73 1.358 3.92 2.166 6.29 2.166 1.42 0 2.77-.29 4-.814zm-11.62-2.58c.232-.4 3.045-5.055 8.332-6.765.135-.045.27-.084.405-.12-.26-.585-.54-1.167-.832-1.74C7.17 11.775 2.206 11.71 1.756 11.7l-.004.312c0 2.633.998 5.037 2.634 6.855zm-2.42-8.955c.46.008 4.683.026 9.477-1.248-1.698-3.018-3.53-5.558-3.8-5.928-2.868 1.35-5.01 3.99-5.676 7.17zM9.6 2.052c.282.38 2.145 2.914 3.822 6 3.645-1.365 5.19-3.44 5.373-3.702-1.81-1.61-4.19-2.586-6.795-2.586-.825 0-1.63.1-2.4.285zm10.335 3.483c-.218.29-1.935 2.493-5.724 4.04.24.49.47.985.68 1.486.08.18.15.36.22.53 3.41-.43 6.8.26 7.14.33-.02-2.42-.88-4.64-2.31-6.38z"/></svg>
                    </a>
                    @endif
                    @if(!empty($settings['social_instagram']))
                    <a href="{{ $settings['social_instagram'] }}" target="_blank" class="neo-social-btn" title="Instagram">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.069-4.85.069-3.204 0-3.584-.012-4.849-.069-3.242-.148-4.771-1.691-4.919-4.919-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.644-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </a>
                    @endif
                </div>
            </nav>
        </header>

        <!-- Hero Section -->
        <section id="hero" class="min-h-screen flex flex-col items-center justify-center relative px-6 py-24 pt-32 bg-pastel-gradient my-20">
            <div class="text-center z-10 max-w-4xl" data-aos="fade-up">
                <div class="inline-block px-4 py-1.5 mb-8 bg-white/50 border border-black/5 rounded-full shadow-sm">
                    <span class="font-bold text-xs tracking-widest text-lavender-dark uppercase">{{ $settings['hero_tagline'] ?? '3D Artist • Visualizer' }}</span>
                </div>
                <h1 class="text-5xl md:text-7xl lg:text-8xl mb-8 leading-[0.9] font-extrabold tracking-tighter text-black transition-colors uppercase">
                    @php
                        $heroTitle = $settings['hero_title'] ?? 'Digital Architect.';
                        $titleParts = explode(' ', $heroTitle, 2);
                    @endphp
                    {{ $titleParts[0] ?? '' }} <br>
                    <span class="text-transparent bg-clip-text bg-linear-to-r from-lavender-dark to-lavender">{{ $titleParts[1] ?? '' }}</span>
                </h1>
                <p class="max-w-xl mx-auto text-lg md:text-xl font-medium mb-12 text-black/40 leading-relaxed transition-colors text-center md:text-left">
                    {{ $settings['hero_description'] ?? 'Crafting immersive 3D experiences through precision geometry and soft-lit aesthetics. A minimalist approach to complex geometry.' }}
                </p>
                <div class="flex flex-wrap gap-5 justify-center">
                    <a href="#work" class="neo-btn">View Portfolio</a>
                    <a href="#contact" class="px-8 py-3 font-bold rounded-full border border-black/5 bg-white hover:bg-black hover:text-white transition-all uppercase text-sm tracking-widest text-black">Get in touch</a>
                </div>
            </div>

            <!-- Floating Soft Accents -->
            <div class="doodle top-1/4 left-1/4 w-32 h-32 bg-lavender blur-3xl rounded-full opacity-40 transition-opacity"></div>
            <div class="doodle bottom-1/4 right-1/4 w-40 h-40 bg-lavender-dark blur-3xl rounded-full opacity-40 transition-opacity"></div>
        </section>

        <!-- Redined Capabilities Section -->
        <section id="capabilities" class="py-32 md:py-48 px-6 overflow-hidden bg-white my-20 transition-colors">
            <div class="max-w-7xl mx-auto" data-aos="fade-up">
                <div class="flex flex-col lg:flex-row gap-16 lg:gap-24 items-start mb-20 lg:mb-32">
                    <div class="lg:w-1/2">
                        <span class="text-[10px] font-black uppercase tracking-[0.4em] text-lavender-dark mb-6 block">{{ $settings['capabilities_label'] ?? 'Artistic Core' }}</span>
                        <h2 class="text-5xl md:text-6xl lg:text-7xl font-extrabold tracking-tighter mb-8 uppercase leading-[0.9] text-black transition-colors">
                            @php
                                $heading = $settings['capabilities_heading'] ?? 'Pastel Precision.';
                                $parts = explode(' ', $heading, 2);
                            @endphp
                            {{ $parts[0] ?? 'Pastel' }} <br><span class="text-black/20 transition-colors">{{ $parts[1] ?? 'Precision.' }}</span>
                        </h2>
                        <p class="text-lg md:text-xl text-black/40 font-medium leading-relaxed max-w-lg transition-colors">{{ $settings['capabilities_description'] ?? 'Melting hard geometry into soft visual experiences across all domains of 3D art, from industrial accuracy to dreamy spatial concepts.' }}</p>
                    </div>
                    <div class="lg:w-1/2 grid grid-cols-1 gap-6 w-full">
                        @if($capabilities->count() > 0)
                            @foreach($capabilities->take(1) as $capability)
                            <div class="neo-card p-12 bg-[#FBFBFF] group/card hover:bg-lavender-light/10 transition-all duration-500 border-black/5" data-aos="fade-up">
                                <div class="flex justify-between items-start mb-8">
                                    <div class="w-12 h-12 rounded-2xl bg-white border border-black/5 flex items-center justify-center shadow-sm text-2xl transition-colors">{{ $capability->icon }}</div>
                                    <span class="text-[10px] font-black text-black/20 uppercase tracking-widest group-hover/card:text-lavender-dark transition-colors">Module {{ $capability->module_number }}</span>
                                </div>
                                <h3 class="text-3xl font-extrabold mb-4 tracking-tighter uppercase text-black transition-colors">{{ $capability->title }}</h3>
                                <p class="text-sm text-black/40 font-bold leading-relaxed uppercase tracking-widest max-w-sm transition-colors">{{ $capability->description }}</p>
                            </div>
                            @endforeach
                        @else
                            <!-- Fallback 1 -->
                            <div class="neo-card p-12 bg-[#FBFBFF] group/card hover:bg-lavender-light/10 transition-all duration-500 border-black/5" data-aos="fade-up">
                                <div class="flex justify-between items-start mb-8">
                                    <div class="w-12 h-12 rounded-2xl bg-white border border-black/5 flex items-center justify-center shadow-sm transition-colors">📐</div>
                                    <span class="text-[10px] font-black text-black/20 uppercase tracking-widest group-hover/card:text-lavender-dark transition-colors">Module 01</span>
                                </div>
                                <h3 class="text-3xl font-extrabold mb-4 tracking-tighter uppercase text-black transition-colors">Hard Surface</h3>
                                <p class="text-sm text-black/40 font-bold leading-relaxed uppercase tracking-widest max-w-sm transition-colors">Industrial assets with clean topology and soft-edge aesthetics optimized for cinematic high-poly rendering.</p>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-8">
                    @if($capabilities->count() > 1)
                        @foreach($capabilities->skip(1) as $index => $capability)
                        <div class="neo-card p-12 bg-[#FBFBFF] group/card hover:bg-lavender-light/10 transition-all duration-500 border-black/5" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                            <div class="flex justify-between items-start mb-8">
                                <div class="w-12 h-12 rounded-2xl bg-white border border-black/5 flex items-center justify-center shadow-sm text-2xl transition-colors">{{ $capability->icon }}</div>
                                <span class="text-[10px] font-black text-black/20 uppercase tracking-widest group-hover/card:text-lavender-dark transition-colors">Module {{ $capability->module_number }}</span>
                            </div>
                            <h3 class="text-3xl font-extrabold mb-4 tracking-tighter uppercase text-black transition-colors">{{ $capability->title }}</h3>
                            <p class="text-sm text-black/40 font-bold leading-relaxed uppercase tracking-widest transition-colors">{{ $capability->description }}</p>
                        </div>
                        @endforeach
                    @elseif($capabilities->count() === 0)
                        <!-- Fallback 2 -->
                        <div class="neo-card p-12 bg-[#FBFBFF] group/card hover:bg-lavender-light/10 transition-all duration-500 border-black/5" data-aos="fade-up" data-aos-delay="100">
                            <div class="flex justify-between items-start mb-8">
                                <div class="w-12 h-12 rounded-2xl bg-white border border-black/5 flex items-center justify-center shadow-sm transition-colors">🌍</div>
                                <span class="text-[10px] font-black text-black/20 uppercase tracking-widest group-hover/card:text-lavender-dark transition-colors">Module 02</span>
                            </div>
                            <h3 class="text-3xl font-extrabold mb-4 tracking-tighter uppercase text-black transition-colors">World Building</h3>
                            <p class="text-sm text-black/40 font-bold leading-relaxed uppercase tracking-widest transition-colors">Dreamy environmental states and spatial architectures optimized for real-time engines and immersion.</p>
                        </div>

                        <!-- Fallback 3 -->
                        <div class="neo-card p-12 bg-[#FBFBFF] group/card hover:bg-mint/10 transition-all duration-500 border-black/5" data-aos="fade-up" data-aos-delay="200">
                            <div class="flex justify-between items-start mb-8">
                                <div class="w-12 h-12 rounded-2xl bg-white border border-black/5 flex items-center justify-center shadow-sm transition-colors">✨</div>
                                <span class="text-[10px] font-black text-black/20 uppercase tracking-widest group-hover/card:text-mint-dark transition-colors">Module 03</span>
                            </div>
                            <h3 class="text-3xl font-extrabold mb-4 tracking-tighter uppercase text-black transition-colors">Visuals</h3>
                            <p class="text-sm text-black/40 font-bold leading-relaxed uppercase tracking-widest transition-colors">Photorealistic cinematic lighting environments that emphasize micro-surface quality and material physics.</p>
                        </div>
                    @endif
                </div>

            </div>
        </section>

        <!-- Advanced Production Pipeline Carousel -->
        <section id="workflow" class="py-32 md:py-48 px-6 overflow-hidden bg-white relative my-20 transition-colors">
            <div class="max-w-7xl mx-auto relative z-10">
                <div class="flex flex-col md:flex-row justify-between items-end mb-24 px-4" data-aos="fade-up">
                    <div class="max-w-xl text-center md:text-left">
                        <span class="text-[10px] font-black uppercase tracking-[0.4em] text-lavender-dark mb-4 block">Process</span>
                        <h2 class="text-4xl md:text-5xl lg:text-6xl font-extrabold mb-4 tracking-tighter uppercase leading-none text-black transition-colors">My workflow is centered around being highly productive</h2>
                    </div>
                    <div class="flex gap-4">
                        <button class="pipeline-prev w-12 h-12 rounded-full border border-black/5 flex items-center justify-center hover:bg-black hover:text-white transition-all text-black">←</button>
                        <button class="pipeline-next w-12 h-12 rounded-full border border-black/5 flex items-center justify-center hover:bg-black hover:text-white transition-all text-black">→</button>
                    </div>
                </div>

                <div class="relative px-4">
                    <!-- Pipeline Connector line (Background Track) -->
                    <div class="absolute top-[45px] left-0 w-full h-px bg-black/5 z-0 transition-colors"></div>

                    <div class="swiper workflow-swiper overflow-visible">
                        <div class="swiper-wrapper">
                            @forelse($workflows as $step)
                            <div class="swiper-slide h-auto group/node">
                                <div class="relative mb-12">
                                    <div class="w-24 h-24 rounded-[32px] bg-white shadow-2xl shadow-lavender/5 flex items-center justify-center relative group-hover/node:-translate-y-2 transition-all duration-500 z-10 mx-auto lg:mx-0 border border-black/5">
                                        <span class="text-3xl font-extrabold tracking-tighter text-black/10 group-hover/node:text-lavender transition-colors">{{ str_pad($step->order, 2, '0', STR_PAD_LEFT) }}</span>
                                        <div class="absolute -bottom-2 -right-2 w-8 h-8 rounded-xl bg-black flex items-center justify-center text-white text-[10px] font-black group-hover/node:bg-lavender-dark transition-colors">
                                            {{ $loop->iteration }}
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center lg:text-left">
                                    <h4 class="text-2xl font-extrabold mb-4 tracking-tighter uppercase text-black group-hover/node:text-lavender-dark transition-colors">{{ $step->title }}</h4>
                                    <div class="w-12 h-1 bg-black/5 mb-6 mx-auto lg:mx-0 group-hover/node:w-20 group-hover/node:bg-lavender transition-all duration-500"></div>
                                    <p class="text-sm text-black/40 font-bold leading-relaxed uppercase tracking-widest transition-colors">{{ $step->description }}</p>
                                </div>
                            </div>
                            @empty
                            @for($i=1; $i<=4; $i++)
                            <div class="swiper-slide opacity-10">
                                <div class="w-24 h-24 rounded-[32px] bg-black/5 mb-12"></div>
                                <div class="h-6 bg-black/5 w-2/3 mb-4"></div>
                                <div class="h-12 bg-black/5 w-full"></div>
                            </div>
                            @endfor
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section id="about" class="py-32 md:py-48 px-6 bg-white border-t border-black/5 my-20 transition-colors">
            <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-12 lg:gap-16 items-center">
                <div class="relative" data-aos="fade-right">
                    <div class="neo-card aspect-square bg-lavender-dark flex items-center justify-center overflow-hidden border-black/5">
                        <img src="{{ $settings['about_image_url'] ?? 'https://api.dicebear.com/7.x/pixel-art/svg?seed=Hariz3D' }}" alt="Avatar" class="w-full h-full object-cover">
                    </div>
                </div>
                <div data-aos="fade-left">
                    <h2 class="text-4xl md:text-5xl font-extrabold mb-8 tracking-tighter uppercase text-black transition-colors">
                        @php
                            $aboutHeading = $settings['about_heading'] ?? 'Pure Form.';
                            $aboutParts = explode(' ', $aboutHeading, 2);
                        @endphp
                        {{ $aboutParts[0] ?? '' }} <br><span class="text-lavender-dark">{{ $aboutParts[1] ?? '' }}</span>
                    </h2>
                    <p class="text-lg md:text-xl mb-8 leading-relaxed font-medium text-black/50 transition-colors">
                        {{ $settings['about_description'] ?? "I'm a 3D enthusiast with a deep obsession for geometry and lighting. My work blends Neo-brutalist aesthetics with futuristic 3D concepts." }}
                    </p>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="neo-card p-6 bg-lavender-light/30 border-transparent transition-colors">
                            <h5 class="text-[10px] uppercase font-black text-lavender-dark tracking-widest mb-2">{{ $settings['about_card1_label'] ?? 'Expertise' }}</h5>
                            <p class="font-bold text-sm text-black/70">{{ $settings['about_experience_years'] ?? '5+ Years in 3D' }}</p>
                        </div>
                        <div class="neo-card p-6 bg-lavender-light/30 border-transparent transition-colors">
                            <h5 class="text-[10px] uppercase font-black text-lavender-dark tracking-widest mb-2">{{ $settings['about_card2_label'] ?? 'Pipeline' }}</h5>
                            <p class="font-bold text-sm text-black/70">{{ $settings['about_pipeline_tools'] ?? 'Cycles, Octane, Substance' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Work Section -->
        <section id="work" class="py-32 md:py-48 px-6 bg-lavender-light/30 my-20 transition-colors">
            <div class="max-w-6xl mx-auto text-center">
                <div class="mb-24" data-aos="fade-up">
                    <h2 class="text-4xl md:text-5xl font-extrabold mb-4 tracking-tighter uppercase text-black transition-colors">My Works</h2>
                    <p class="text-black/30 font-bold uppercase tracking-widest text-[10px] transition-colors">Check out some of our awesome projects with creative ideas.</p>
                </div>

                <div class="grid sm:grid-cols-2 gap-8 md:gap-12 lg:gap-16 mb-20 text-left">
                    @foreach($portfolios->take(4) as $work)
                    <div class="group" data-aos="fade-up">
                        <a href="{{ $work->project_url ?? $work->image_url ?? '#' }}" target="_blank" class="neo-card aspect-video bg-white flex items-center justify-center overflow-hidden mb-6 relative border-black/5">
                            @if($work->image_url)
                                <img src="{{ $work->image_url }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                            @else
                                <div class="text-6xl opacity-20 group-hover:scale-110 transition-transform duration-500">🧊</div>
                            @endif
                            <div class="absolute inset-0 bg-lavender-dark/90 opacity-0 group-hover:opacity-100 transition-all duration-300 flex flex-col items-center justify-center text-white p-8 text-center backdrop-blur-sm">
                                <span class="text-[10px] font-black uppercase tracking-[0.2em] mb-3 opacity-70">{{ $work->category }}</span>
                                <h4 class="text-2xl font-extrabold mb-3 tracking-tighter">{{ $work->title }}</h4>
                                <p class="font-medium text-sm leading-relaxed max-w-xs">{{ $work->description }}</p>
                            </div>
                        </a>
                        <div class="flex justify-between items-center px-2">
                            <h4 class="text-xl font-bold tracking-tight text-black/80 transition-colors">{{ $work->title }}</h4>
                            <span class="text-[10px] font-black uppercase tracking-widest text-lavender-dark">{{ $work->category }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div data-aos="fade-up">
                    <a href="/portfolio" class="inline-block px-10 py-4 bg-white border border-black/10 rounded-full font-bold text-sm uppercase tracking-widest hover:bg-black hover:text-white transition-all shadow-sm text-black">See all creations →</a>
                </div>
            </div>
        </section>

        <!-- High-Fidelity Stats Section -->
        <section id="stats-section" class="py-24 bg-white relative overflow-hidden transition-colors">
            <!-- Blueprint Mesh Background -->
            <div class="bg-blueprint-grid absolute inset-0 z-0 opacity-[0.03]"></div>

            <div class="max-w-7xl mx-auto px-6 relative z-10">
                <div class="flex flex-col lg:flex-row justify-center items-center gap-12 lg:gap-20">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 w-full max-w-5xl mx-auto">
                        @forelse($stats as $stat)
                        <div class="p-10 bg-[#FBFBFF] border border-black/5 rounded-[40px] shadow-2xl shadow-lavender/5 group hover:-translate-y-2 transition-all duration-500 relative overflow-hidden" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 100 }}">
                            <!-- Floating Icon Decor -->
                            <div class="absolute -top-4 -right-4 w-20 h-20 bg-lavender/10 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-1000"></div>

                            <div class="relative z-10 flex flex-col items-center text-center">
                                <div class="flex items-baseline justify-center mb-2">
                                    <span class="text-7xl font-extrabold tracking-tighter text-black stat-counter transition-colors" data-value="{{ $stat->value }}">0</span>
                                    @php
                                        $suffix = Str::contains($stat->value, '%') ? '%' : (Str::contains($stat->value, '+') ? '+' : '');
                                    @endphp
                                    @if($suffix)
                                        <span class="text-3xl font-extrabold tracking-tighter text-lavender-dark ml-1">{{ $suffix }}</span>
                                    @endif
                                </div>
                                <h4 class="text-[10px] font-black uppercase tracking-[0.2em] text-black/30 transition-colors">{{ $stat->label }}</h4>
                            </div>
                        </div>
                        @empty
                        @php
                            $defaults = [
                                ['val' => '98', 'label' => 'Client Satisfaction', 'suffix' => '%'],
                                ['val' => '1200', 'label' => 'Meshes Rendered', 'suffix' => '+'],
                                ['val' => '430', 'label' => 'Active Simulations', 'suffix' => ''],
                                ['val' => '15', 'label' => 'Industry Awards', 'suffix' => '']
                            ];
                        @endphp
                        @foreach($defaults as $default)
                        <div class="p-10 bg-[#FBFBFF] border border-black/5 rounded-[40px] shadow-2xl shadow-lavender/5 group hover:-translate-y-2 transition-all duration-500 transition-colors flex flex-col items-center text-center" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 100 }}">
                            <div class="flex items-baseline justify-center mb-2">
                                <span class="text-7xl font-extrabold tracking-tighter text-black stat-counter transition-colors" data-value="{{ $default['val'] }}">0</span>
                                @if($default['suffix'])
                                    <span class="text-3xl font-extrabold tracking-tighter text-lavender-dark ml-1">{{ $default['suffix'] }}</span>
                                @endif
                            </div>
                            <h4 class="text-[10px] font-black uppercase tracking-[0.2em] text-black/30 transition-colors">{{ $default['label'] }}</h4>
                        </div>
                        @endforeach
                        @endforelse
                    </div>
                </div>
            </div>
        </section>

        <!-- Reviews Section -->
        <section id="reviews" class="py-24 bg-white transition-colors">
            <div class="max-w-6xl mx-auto px-6">
                <div class="text-center mb-20" data-aos="fade-up">
                    <h2 class="text-4xl md:text-5xl font-extrabold mb-4 tracking-tighter uppercase text-black transition-colors">Client Feedback</h2>
                    <p class="text-black/30 font-bold uppercase tracking-widest text-[10px] transition-colors">What they say about the dimension</p>
                </div>

                @if($reviews->isEmpty())
                <div class="grid md:grid-cols-3 gap-8 opacity-40 grayscale transition-opacity">
                    <div class="neo-card p-10 bg-white border border-black/5 transition-colors">
                        <div class="text-lavender-dark mb-4">★★★★★</div>
                        <p class="font-medium text-black/60 italic mb-6">"Exceptional quality and eye for detail. The pastel aesthetic is truly unique."</p>
                        <h5 class="font-bold text-sm text-black">— Sample Client</h5>
                    </div>
                    <div class="neo-card p-10 bg-white border border-black/5 transition-colors">
                        <div class="text-lavender-dark mb-4">★★★★★</div>
                        <p class="font-medium text-black/60 italic mb-6">"Fast turnaround and perfect topology for our real-time engine needs."</p>
                        <h5 class="font-bold text-sm text-black">— Digital Studio</h5>
                    </div>
                    <div class="neo-card p-10 bg-white border border-black/5 transition-colors">
                        <div class="text-lavender-dark mb-4">★★★★★</div>
                        <p class="font-medium text-black/60 italic mb-6">"Brought our conceptual mechs to life in ways we didn't think possible."</p>
                        <h5 class="font-bold text-sm text-black">— Game Dev Lead</h5>
                    </div>
                </div>
                @else
                <div class="relative px-12 " data-aos="fade-up">
                    <div class="swiper reviews-swiper overflow-visible">
                        <div class="swiper-wrapper">
                            @foreach($reviews as $review)
                            <div class="swiper-slide p-6 h-auto">
                                <div class="neo-card p-10 bg-lavender-light/10 border-black/5 h-full flex flex-col justify-between transition-colors">
                                    <div>
                                        <div class="flex text-lavender-dark mb-4 drop-shadow-sm">
                                            @for($i=0; $i<$review->rating; $i++) ★ @endfor
                                        </div>
                                        <p class="font-medium text-black/60 italic mb-6 leading-relaxed">"{{ $review->comment }}"</p>
                                    </div>
                                    <h5 class="font-bold text-sm text-black transition-colors">— {{ $review->client_name }}</h5>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Swiper Navigation Buttons -->
                    <button class="swiper-prev absolute left-0 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full border border-black/5 bg-white flex items-center justify-center text-xl transition-all hover:bg-black hover:text-white shadow-lg active:scale-95 z-20 text-black">←</button>
                    <button class="swiper-next absolute right-0 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full border border-black/5 bg-white flex items-center justify-center text-xl transition-all hover:bg-black hover:text-white shadow-lg active:scale-95 z-20 text-black">→</button>
                </div>
                @endif
            </div>
        </section>

        <!-- Pricing Section -->
        <section id="pricing" class="py-24 bg-white relative transition-colors">
            <div class="max-w-6xl mx-auto" data-aos="fade-up">
                <div class="bg-white rounded-[40px] p-16 md:p-20 shadow-2xl shadow-lavender/10 border border-black/5 relative overflow-hidden group transition-colors">
                    <!-- Background Decor -->
                    <div class="absolute -top-24 -left-24 w-64 h-64 bg-lavender/10 rounded-full blur-3xl group-hover:scale-110 transition-transform duration-1000"></div>

                    <div class="relative z-10">
                        <div class="text-center mb-16">
                            <h2 class="text-4xl md:text-5xl font-extrabold mb-4 tracking-tighter uppercase text-black transition-colors">Pricing</h2>
                            <p class="text-lg text-black/40 font-medium max-w-2xl mx-auto transition-colors">Choose a plan that’s built for your workflow.</p>
                        </div>

                        <div class="grid md:grid-cols-3 gap-8">
                            @foreach($pricings as $price)
                            <div class="neo-card p-10 bg-[#FBFBFF] transition-all duration-500 @if($price->is_featured) border-lavender ring-4 ring-lavender/10 shadow-2xl @else border-black/5 @endif hover:border-lavender-dark relative" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                                @if($price->is_featured)
                                <div class="absolute -top-4 left-1/2 -translate-x-1/2 px-6 py-1.5 bg-lavender text-lavender-dark text-[10px] font-black uppercase tracking-[0.3em] rounded-full shadow-lg shadow-lavender/20">Recommended</div>
                                @endif

                                <h4 class="font-bold text-lavender-dark mb-3 uppercase tracking-widest text-[10px]">{{ $price->plan_name }}</h4>
                                <div class="text-4xl font-extrabold mb-8 tracking-tighter text-black transition-colors">{{ $price->price }}</div>
                                <ul class="space-y-4 mb-10">
                                    @foreach(explode(',', $price->features) as $feature)
                                    <li class="text-[10px] text-black/40 font-black uppercase tracking-widest flex items-center gap-2 transition-colors">
                                        <span class="text-lavender-dark text-xs">●</span> {{ trim($feature) }}
                                    </li>
                                    @endforeach
                                </ul>
                                <a href="#contact" class="neo-btn w-full py-4 text-[10px]">Choose Plan</a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <style>
            .faq-answer {
                max-height: 0;
                overflow: hidden;
                transition: max-height 0.5s cubic-bezier(0, 1, 0, 1);
            }
            .faq-answer.open {
                max-height: 1000px;
                transition: max-height 1s ease-in-out;
            }
            .plus-v {
                transition: transform 0.5s ease, opacity 0.3s ease;
            }
            .faq-icon {
                transition: transform 0.5s ease;
            }
        </style>

        <!-- Modular FAQ Knowledge Hub -->
        <section id="faq" class="py-24 bg-white relative transition-colors">
            <div class="max-w-6xl mx-auto relative z-10">
                <div class="flex flex-col md:flex-row justify-between items-end mb-20 px-4" data-aos="fade-up">
                    <div class="max-w-xl text-center md:text-left">
                        <h2 class="text-4xl md:text-5xl lg:text-6xl font-extrabold mb-4 tracking-tighter uppercase leading-none text-black transition-colors">Frequently<br><span class="text-lavender-dark">Asked Questions</span></h2>
                        <p class="text-black/40 font-medium transition-colors">I've gathered common questions and their answers to make your experience smoother. If you can't find what you're looking for, feel free to reach out to me.</p>
                    </div>
                    <div class="hidden md:block">
                        <div class="p-8 bg-slate-50 border border-black/5 rounded-3xl transition-colors">❓</div>
                    </div>
                </div>

                <div class="grid lg:grid-cols-2 gap-8 items-start">
                    @forelse($faqs as $faq)
                    <div class="group/faq" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                        <div class="neo-card p-0 overflow-hidden bg-[#FBFBFF] transition-all duration-500 hover:shadow-2xl hover:shadow-lavender/20 border-black/5 group-hover/faq:border-lavender-dark">
                            <button onclick="toggleFaq(this)" class="w-full text-left p-10 flex gap-6 items-start outline-none">
                                <div class="w-10 h-10 rounded-2xl bg-white border border-black/5 flex items-center justify-center shrink-0 text-xs font-black text-black/20 group-hover/faq:text-lavender-dark transition-colors">
                                    {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                </div>
                                <div class="flex-1 pt-1">
                                    <h4 class="font-bold text-xl tracking-tight mb-0 text-black group-hover/faq:text-lavender-dark transition-colors">{{ $faq->question }}</h4>

                                    <div class="faq-answer max-h-0 overflow-hidden transition-all duration-700 ease-in-out opacity-0">
                                        <div class="pt-8 pb-4 text-black/50 font-medium leading-relaxed italic transition-colors">
                                            "{{ $faq->answer }}"
                                        </div>
                                    </div>
                                </div>
                                <div class="shrink-0 pt-2">
                                    <div class="w-6 h-6 flex items-center justify-center rounded-full bg-black/5 group-hover/faq:bg-lavender group-hover/faq:text-lavender-dark transition-all duration-300">
                                        <svg class="w-3 h-3 transition-transform duration-500 plus-icon text-black group-hover/faq:text-lavender-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 6v12M6 12h12"/>
                                        </svg>
                                    </div>
                                </div>
                            </button>
                        </div>
                    </div>
                    @empty
                    <div class="col-span-full text-center py-20 opacity-20 italic font-medium bg-lavender-light/10 rounded-[40px] border border-dashed border-black/10 text-black">No data entries available in the repository.</div>
                    @endforelse
                </div>
            </div>
            <!-- Background Decorative Glyph -->
            <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-lavender/5 rounded-full blur-3xl opacity-50 -z-10"></div>
        </section>

        <script>
            function toggleFaq(btn) {
                const card = btn.closest('.neo-card');
                const answer = btn.querySelector('.faq-answer');
                const icon = btn.querySelector('.plus-icon');

                const isOpen = answer.classList.contains('active');

                if (!isOpen) {
                    answer.classList.add('active');
                    answer.style.maxHeight = answer.scrollHeight + 100 + "px";
                    answer.style.opacity = 1;
                    icon.classList.add('rotate-45');
                } else {
                    answer.classList.remove('active');
                    answer.style.maxHeight = null;
                    answer.style.opacity = 0;
                    icon.classList.remove('rotate-45');
                }
            }
        </script>

        <!-- Contact Section -->
        <section id="contact" class="py-32 md:py-48 px-6 bg-white border-t border-black/5 my-20 transition-colors">
            <div class="max-w-3xl mx-auto" data-aos="zoom-in">
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-extrabold mb-4 tracking-tighter uppercase text-black transition-colors">Start Render.</h2>
                    <p class="text-lg md:text-xl text-black/40 font-medium transition-colors">Have a vision? Let's bring it into three dimensions.</p>
                </div>
                <form action="#" class="space-y-6">
                    <div class="grid md:grid-cols-2 gap-6">
                        <input type="text" class="neo-input" placeholder="Your Name">
                        <input type="email" class="neo-input" placeholder="Your Email">
                    </div>
                    <textarea class="neo-input h-48" placeholder="Tell us about your project requirements..."></textarea>
                    <button class="neo-btn w-full">Send Transmission ✨</button>
                </form>
            </div>
        </section>

        <!-- Footer -->
        <footer class="py-20 px-6 border-t border-black/5 bg-white transition-colors">
            <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-12">
                <div class="text-center md:text-left">
                    <h4 class="text-2xl font-bold tracking-tighter mb-2 text-black transition-colors">Hariz Fauzil A.</h4>
                    <p class="text-black/30 font-medium text-sm transition-colors">3D Modeling Artist</p>
                </div>
                <div class="flex gap-6">
                    @if(!empty($settings['social_whatsapp']))
                    <a href="{{ $settings['social_whatsapp'] }}" target="_blank" class="neo-social-btn" title="WhatsApp">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                    </a>
                    @endif
                    @if(!empty($settings['social_dribbble']))
                    <a href="{{ $settings['social_dribbble'] }}" target="_blank" class="neo-social-btn" title="Dribbble">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M12 24C5.385 24 0 18.615 0 12S5.385 0 12 0s12 5.385 12 12-5.385 12-12 12zm10.12-10.358c-.35-.11-3.17-.953-6.384-.438 1.34 3.684 1.887 6.684 1.992 7.308 2.3-1.555 3.936-4.02 4.395-6.87zm-6.115 7.808c-.153-.9-.75-4.032-2.19-7.77l-.066.02c-5.79 2.015-7.86 6.025-8.04 6.4 1.73 1.358 3.92 2.166 6.29 2.166 1.42 0 2.77-.29 4-.814zm-11.62-2.58c.232-.4 3.045-5.055 8.332-6.765.135-.045.27-.084.405-.12-.26-.585-.54-1.167-.832-1.74C7.17 11.775 2.206 11.71 1.756 11.7l-.004.312c0 2.633.998 5.037 2.634 6.855zm-2.42-8.955c.46.008 4.683.026 9.477-1.248-1.698-3.018-3.53-5.558-3.8-5.928-2.868 1.35-5.01 3.99-5.676 7.17zM9.6 2.052c.282.38 2.145 2.914 3.822 6 3.645-1.365 5.19-3.44 5.373-3.702-1.81-1.61-4.19-2.586-6.795-2.586-.825 0-1.63.1-2.4.285zm10.335 3.483c-.218.29-1.935 2.493-5.724 4.04.24.49.47.985.68 1.486.08.18.15.36.22.53 3.41-.43 6.8.26 7.14.33-.02-2.42-.88-4.64-2.31-6.38z"/></svg>
                    </a>
                    @endif
                    @if(!empty($settings['social_instagram']))
                    <a href="{{ $settings['social_instagram'] }}" target="_blank" class="neo-social-btn" title="Instagram">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </a>
                    @endif
                </div>
            </div>
            <div class="text-center mt-20 text-black/10 text-[10px] font-black uppercase tracking-[0.2em] transition-colors">
                Hariz Fauzil A. &copy; {{ date('Y') }}
            </div>
        </footer>

        <!-- Scripts -->
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init({ duration: 1000, once: true, offset: 100 });

            new Swiper('.reviews-swiper', {
                slidesPerView: 1,
                spaceBetween: 30,
                loop: true,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                navigation: {
                    nextEl: '.swiper-next',
                    prevEl: '.swiper-prev',
                },
                breakpoints: {
                    768: { slidesPerView: 2 },
                    1024: { slidesPerView: 3 },
                }
            });

            new Swiper('.workflow-swiper', {
                slidesPerView: 1,
                spaceBetween: 40,
                navigation: {
                    nextEl: '.pipeline-next',
                    prevEl: '.pipeline-prev',
                },
                breakpoints: {
                    640: { slidesPerView: 2 },
                    1024: { slidesPerView: 4 },
                }
            });

            // Improved Scroll Spy with Observer
            const sections = document.querySelectorAll('section');
            const navLinksArr = document.querySelectorAll('.nav-link');

            const observerOptions = {
                root: null,
                threshold: 0.3,
                rootMargin: '-80px 0px 0px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const id = entry.target.getAttribute('id');
                        navLinksArr.forEach(link => {
                            link.classList.remove('active');
                            if (link.getAttribute('href') === `#${id}`) {
                                link.classList.add('active');
                            }
                        });
                    }
                });
            }, observerOptions);

            sections.forEach(section => observer.observe(section));

            // Counting Animation
            const countStats = () => {
                const counters = document.querySelectorAll('.stat-counter');

                counters.forEach(counter => {
                    const targetStr = counter.getAttribute('data-value') || "0";
                    const target = parseInt(targetStr.replace(/[^0-9]/g, '')) || 0;

                    const duration = 2000; // 2 seconds
                    const startTime = performance.now();

                    const updateCount = (timestamp) => {
                        const progress = Math.min((timestamp - startTime) / duration, 1);
                        const current = Math.floor(progress * target);

                        counter.innerText = current.toLocaleString();

                        if (progress < 1) {
                            requestAnimationFrame(updateCount);
                        } else {
                            counter.innerText = target.toLocaleString();
                        }
                    };

                    requestAnimationFrame(updateCount);
                });
            };

            // Observer for Stats Counting
            const statsSection = document.querySelector('#stats-section');
            if (statsSection) {
                const statsObserver = new IntersectionObserver((entries) => {
                    if (entries[0].isIntersecting) {
                        countStats();
                        statsObserver.unobserve(statsSection);
                    }
                }, { threshold: 0.5 });
                statsObserver.observe(statsSection);
            }
        </script>
    </body>
</html>