<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Portfolio | Hariz 3D</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap" rel="stylesheet">

        <!-- AOS (Animate on Scroll) -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

        <!-- Swiper.js -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            section {
                scroll-margin-top: 100px;
            }
            .bg-pastel-gradient {
                background: linear-gradient(135deg, #F8F7FF 0%, #F1F8FE 100%);
            }
        </style>
    </head>
    <body class="overflow-x-hidden bg-lavender-light selection:bg-lavender font-sans">
        
        <!-- Navigation Bar -->
        <header class="fixed top-0 left-0 w-full z-50 bg-white/80 backdrop-blur-md border-b border-black/5">
            <nav class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
                <div class="flex-1">
                    <span class="font-bold text-xl tracking-tighter">HARIZ.</span>
                </div>
                
                <div class="hidden md:flex items-center justify-center gap-10 flex-2">
                    <a href="#hero" class="nav-link active">Home</a>
                    <a href="#services" class="nav-link">Capabilities</a>
                    <a href="#about" class="nav-link">About</a>
                    <a href="#work" class="nav-link">Work</a>
                    <a href="#pricing" class="nav-link">Pricing</a>
                    <a href="#contact" class="nav-link">Contact</a>
                </div>

                <div class="flex items-center justify-end gap-3 flex-1">
                    @auth
                        <a href="/admin" class="text-[10px] font-black uppercase text-lavender-dark hover:text-black transition-colors mr-4">Dashboard</a>
                    @else
                        <a href="/login" class="text-[10px] font-black uppercase text-black/20 hover:text-black transition-colors mr-4">Admin</a>
                    @endauth
                    <a href="#" class="neo-social-btn" title="X">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                    </a>
                </div>
            </nav>
        </header>

        <!-- Hero Section -->
        <section id="hero" class="min-h-screen flex flex-col items-center justify-center relative p-6 pt-20 bg-pastel-gradient">
            <div class="text-center z-10 max-w-4xl" data-aos="fade-up">
                <div class="inline-block px-4 py-1.5 mb-8 bg-white border border-black/5 rounded-full shadow-sm">
                    <span class="font-bold text-xs tracking-widest text-lavender-dark uppercase">3D Artist • Visualizer</span>
                </div>
                <h1 class="text-6xl md:text-8xl mb-8 leading-[0.9] font-extrabold tracking-tighter text-black uppercase">
                    Exploring the <br>
                    <span class="text-transparent bg-clip-text bg-linear-to-r from-lavender-dark to-skyblue">New Dimensions</span>
                </h1>
                <p class="max-w-xl mx-auto text-lg md:text-xl font-medium mb-12 text-black/40 leading-relaxed">
                    Sculpting digital realities through high-poly modeling and cinematic rendering. A minimalist approach to complex geometry.
                </p>
                <div class="flex flex-wrap gap-5 justify-center">
                    <a href="#work" class="neo-btn">View Portfolio</a>
                    <a href="#contact" class="px-8 py-3 font-bold rounded-full border border-black/5 bg-white hover:bg-black hover:text-white transition-all uppercase text-sm tracking-widest">Get in touch</a>
                </div>
            </div>

            <!-- Floating Soft Accents -->
            <div class="doodle top-1/4 left-1/4 w-32 h-32 bg-lavender blur-3xl rounded-full"></div>
            <div class="doodle bottom-1/4 right-1/4 w-40 h-40 bg-skyblue blur-3xl rounded-full"></div>
        </section>

        <!-- Capabilities Section -->
        <section id="services" class="py-32 px-6 bg-white">
            <div class="max-w-6xl mx-auto">
                <div class="flex flex-col md:flex-row justify-between items-end mb-20 gap-8" data-aos="fade-up">
                    <div class="max-w-xl">
                        <h2 class="text-5xl font-extrabold tracking-tight mb-6">Pastel Precision.</h2>
                        <p class="text-xl text-black/40 font-medium">Melting hard geometry into soft visual experiences across all domains of 3D art.</p>
                    </div>
                </div>
                <div class="grid md:grid-cols-3 gap-10">
                    <div class="neo-card p-10 bg-skyblue-light hover:bg-white" data-aos="fade-up" data-aos-delay="100">
                        <h3 class="text-2xl font-bold mb-4">Hard Surface</h3>
                        <p class="text-black/50 leading-relaxed">Industrial assets with clean topology and soft-edge aesthetics for high-end rendering.</p>
                    </div>
                    <div class="neo-card p-10 bg-lavender-light hover:bg-white" data-aos="fade-up" data-aos-delay="200">
                        <h3 class="text-2xl font-bold mb-4">World Building</h3>
                        <p class="text-black/50 leading-relaxed">Dreamy environments and spatial concepts optimized for real-time engines.</p>
                    </div>
                    <div class="neo-card p-10 bg-mint/30 hover:bg-white" data-aos="fade-up" data-aos-delay="300">
                        <h3 class="text-2xl font-bold mb-4">Visuals</h3>
                        <p class="text-black/50 leading-relaxed">Photorealistic cinematic lighting setups that emphasize material quality.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section id="about" class="py-32 px-6 bg-white border-t border-black/5">
            <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-16 items-center">
                <div class="relative" data-aos="fade-right">
                    <div class="neo-card aspect-square bg-skyblue flex items-center justify-center overflow-hidden">
                        <img src="https://api.dicebear.com/7.x/pixel-art/svg?seed=Hariz3D" alt="Hariz" class="w-full h-full object-cover">
                    </div>
                </div>
                <div data-aos="fade-left">
                    <h2 class="text-5xl font-extrabold mb-8 tracking-tighter uppercase">MASTERING THE <br><span class="text-lavender-dark">Z-AXIS</span></h2>
                    <p class="text-xl mb-8 leading-relaxed font-medium text-black/50">
                        {{ $settings['about_text'] ?? "I'm a 3D enthusiast with a deep obsession for geometry and lighting. My work blends Neo-brutalist aesthetics with futuristic 3D concepts." }}
                    </p>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="neo-card p-6 bg-lavender-light/30 border-transparent">
                            <h5 class="text-[10px] uppercase font-black text-lavender-dark tracking-widest mb-2">Primary Tools</h5>
                            <p class="font-bold text-sm text-black/70">{{ $settings['tools'] ?? 'Blender, ZBrush' }}</p>
                        </div>
                        <div class="neo-card p-6 bg-skyblue-light/30 border-transparent">
                            <h5 class="text-[10px] uppercase font-black text-skyblue tracking-widest mb-2">Pipeline</h5>
                            <p class="font-bold text-sm text-black/70">Cycles, Octane, Substance</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Work Section -->
        <section id="work" class="py-32 px-6 bg-lavender-light/30">
            <div class="max-w-6xl mx-auto text-center">
                <div class="mb-24" data-aos="fade-up">
                    <h2 class="text-5xl font-extrabold mb-4 tracking-tighter uppercase">Work Artifacts</h2>
                    <p class="text-black/30 font-bold uppercase tracking-widest text-[10px]">Featured Mesh Collection</p>
                </div>
                
                <div class="grid md:grid-cols-2 gap-12 lg:gap-16 mb-20 text-left">
                    @foreach($portfolios->take(4) as $work)
                    <div class="group" data-aos="fade-up">
                        <a href="{{ $work->image_url ?? '#' }}" target="_blank" class="block neo-card aspect-video bg-white flex items-center justify-center overflow-hidden mb-6 relative">
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
                            <h4 class="text-xl font-bold tracking-tight text-black/80">{{ $work->title }}</h4>
                            <span class="text-[10px] font-black uppercase tracking-widest text-lavender-dark">{{ $work->category }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div data-aos="fade-up">
                    <a href="/portfolio" class="inline-block px-10 py-4 bg-white border border-black/10 rounded-full font-bold text-sm uppercase tracking-widest hover:bg-black hover:text-white transition-all shadow-sm">See all creations →</a>
                </div>
            </div>
        </section>

        <!-- Reviews Section -->
        <section id="reviews" class="py-32 px-6 bg-white overflow-hidden">
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-24" data-aos="fade-up">
                    <h2 class="text-5xl font-extrabold mb-4 tracking-tighter uppercase">Client Feedback</h2>
                    <p class="text-black/30 font-bold uppercase tracking-widest text-[10px]">What they say about the dimension</p>
                </div>

                @if($reviews->isEmpty())
                <div class="grid md:grid-cols-3 gap-8 opacity-40 grayscale">
                    <div class="neo-card p-10 bg-lavender-light/10">
                        <div class="text-lavender-dark mb-4">★★★★★</div>
                        <p class="font-medium text-black/60 italic mb-6">"Exceptional quality and eye for detail. The pastel aesthetic is truly unique."</p>
                        <h5 class="font-bold text-sm">— Sample Client</h5>
                    </div>
                    <div class="neo-card p-10 bg-lavender-light/10">
                        <div class="text-lavender-dark mb-4">★★★★★</div>
                        <p class="font-medium text-black/60 italic mb-6">"Fast turnaround and perfect topology for our real-time engine needs."</p>
                        <h5 class="font-bold text-sm">— Digital Studio</h5>
                    </div>
                    <div class="neo-card p-10 bg-lavender-light/10">
                        <div class="text-lavender-dark mb-4">★★★★★</div>
                        <p class="font-medium text-black/60 italic mb-6">"Brought our conceptual mechs to life in ways we didn't think possible."</p>
                        <h5 class="font-bold text-sm">— Game Dev Lead</h5>
                    </div>
                </div>
                @else
                <div class="swiper reviews-swiper">
                    <div class="swiper-wrapper">
                        @foreach($reviews as $review)
                        <div class="swiper-slide p-4">
                            <div class="neo-card p-10 bg-lavender-light/10 h-full">
                                <div class="flex text-lavender-dark mb-4 drop-shadow-sm">
                                    @for($i=0; $i<$review->rating; $i++) ★ @endfor
                                </div>
                                <p class="font-medium text-black/60 italic mb-6 leading-relaxed">"{{ $review->comment }}"</p>
                                <h5 class="font-bold text-sm">— {{ $review->client_name }}</h5>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </section>

        <!-- Pricing Section -->
        <section id="pricing" class="py-32 px-6 bg-lavender-light/20 border-t border-black/5">
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-20">
                    <h2 class="text-5xl font-extrabold mb-4 tracking-tighter uppercase">Investment</h2>
                    <p class="text-black/40 font-medium">Transparent value for tailored 3D mesh solutions.</p>
                </div>
                <div class="grid md:grid-cols-3 gap-10">
                    @foreach($pricings as $price)
                    <div class="neo-card p-10 {{ $price->is_featured ? 'bg-lavender/40 border-lavender-dark scale-105' : 'bg-white' }}" data-aos="fade-up">
                        <h4 class="font-bold {{ $price->is_featured ? 'text-black' : 'text-lavender-dark' }} mb-2 uppercase tracking-widest text-[10px]">{{ $price->plan_name }}</h4>
                        <div class="text-4xl font-extrabold mb-8 tracking-tighter">{{ $price->price }}</div>
                        <ul class="space-y-4 mb-10">
                            @foreach(explode("\n", $price->features) as $feature)
                            <li class="text-xs text-black/50 font-bold flex items-center gap-2">
                                <span class="text-lavender-dark">✓</span> {{ trim($feature) }}
                            </li>
                            @endforeach
                        </ul>
                        <a href="#contact" class="block w-full text-center py-4 bg-black text-white rounded-xl font-bold active:scale-95 transition-transform uppercase text-xs tracking-widest">Enquire Now</a>
                    </div>
                    @endforeach
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

        <section id="faq" class="py-32 px-6 bg-white">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-16" data-aos="fade-up">
                    <h2 class="text-5xl font-extrabold mb-4 tracking-tighter uppercase">Have questions?</h2>
                    <p class="text-black/30 font-bold uppercase tracking-widest text-[10px] mb-6">Navigating the third dimension</p>
                    <p class="text-black/60 max-w-2xl mx-auto leading-relaxed">
                        I've gathered common questions and their answers to make your experience smoother. 
                        If you can't find what you're looking for, feel free to reach out to me.
                    </p>
                </div>

                <div class="border-t border-black/10">
                    @forelse($faqs as $faq)
                    <div class="border-b border-black/10 group faq-item" data-aos="fade-up">
                        <button onclick="toggleFaq(this)" class="w-full py-8 text-left flex justify-between items-center outline-none">
                            <span class="font-bold text-lg pr-8 tracking-tight">{{ $faq->question }}</span>
                            <div class="icon-wrapper w-10 min-w-10 h-10 rounded-full border border-black/5 flex items-center justify-center shrink-0 transition-all duration-300 group-hover:bg-lavender group-hover:border-lavender-dark group-hover:text-lavender-dark">
                                <svg class="faq-icon w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path class="plus-v" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6v12"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 12h12"/>
                                </svg>
                            </div>
                        </button>
                        <div class="faq-answer">
                            <div class="pb-10 text-black/50 font-medium leading-relaxed">
                                {{ $faq->answer }}
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="text-center py-20 opacity-20 italic">
                        No questions available yet.
                    </div>
                    @endforelse
                </div>
            </div>
        </section>

        <script>
            function toggleFaq(btn) {
                const answer = btn.nextElementSibling;
                const icon = btn.querySelector('.faq-icon');
                const verticalLine = btn.querySelector('.plus-v');
                
                const isOpen = answer.classList.contains('open');
                
                // Close all others
                document.querySelectorAll('.faq-answer').forEach(el => el.classList.remove('open'));
                document.querySelectorAll('.plus-v').forEach(el => el.classList.remove('opacity-0', 'scale-y-0'));
                document.querySelectorAll('.faq-icon').forEach(el => el.classList.remove('rotate-45'));

                if (!isOpen) {
                    answer.classList.add('open');
                    verticalLine.classList.add('opacity-0', 'scale-y-0');
                    icon.classList.add('rotate-45');
                }
            }
        </script>

        <!-- Contact Section -->
        <section id="contact" class="py-32 px-6 bg-white border-t border-black/5">
            <div class="max-w-3xl mx-auto" data-aos="zoom-in">
                <div class="text-center mb-16">
                    <h2 class="text-5xl font-extrabold mb-4 tracking-tighter uppercase">Start Render.</h2>
                    <p class="text-xl text-black/40 font-medium">Have a vision? Let's bring it into three dimensions.</p>
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
        <footer class="py-20 px-6 border-t border-black/5">
            <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-12">
                <div class="text-center md:text-left">
                    <h4 class="text-2xl font-bold tracking-tighter mb-2">HARIZ 3D.</h4>
                    <p class="text-black/30 font-medium text-sm">Minimalist 3D Modeling Artisan.</p>
                </div>
                <div class="flex gap-10 font-bold uppercase text-[10px] tracking-widest text-black/40">
                    <a href="#" class="hover:text-black">X</a>
                    <a href="#" class="hover:text-black">Dribbble</a>
                    <a href="#" class="hover:text-black">Instagram</a>
                </div>
            </div>
            <div class="text-center mt-20 text-black/10 text-[10px] font-black uppercase tracking-[0.2em]">
                Sculpting Form & Light &copy; {{ date('Y') }}
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
                breakpoints: {
                    768: {
                        slidesPerView: 2,
                    },
                    1024: {
                        slidesPerView: 3,
                    },
                }
            });
        </script>
    </body>
</html>
