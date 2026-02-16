<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel | Hariz 3D</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#FBFBFF] min-h-screen font-sans flex">
    
    <!-- Sidebar -->
    <aside class="w-64 bg-white border-r border-black/5 flex flex-col fixed inset-y-0 shadow-sm z-50">
        <div class="p-8 border-b border-black/5 flex items-center gap-3">
            <div class="w-8 h-8 rounded-lg bg-lavender flex items-center justify-center text-sm">🧊</div>
            <h1 class="font-extrabold text-lg tracking-tighter">ADMIN <span class="text-lavender-dark">PANEL</span></h1>
        </div>
        
        <nav class="p-6 flex-1 space-y-2">
            <a href="#portfolio" class="sidebar-link active">
                <span class="text-lg">📁</span> Portfolio
            </a>
            <a href="#reviews" class="sidebar-link">
                <span class="text-lg">💬</span> Reviews
            </a>
            <a href="#pricing" class="sidebar-link">
                <span class="text-lg">💰</span> Pricing
            </a>
            <a href="#faq" class="sidebar-link">
                <span class="text-lg">❓</span> FAQ
            </a>
            <a href="#settings" class="sidebar-link">
                <span class="text-lg">⚙️</span> Settings
            </a>
        </nav>

        <div class="p-6 border-t border-black/5">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="w-full flex items-center justify-center gap-2 p-4 rounded-2xl bg-red-50 text-red-400 font-black text-[10px] uppercase tracking-[0.2em] hover:bg-black hover:text-white transition-all duration-500">
                    Exit Panel
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="ml-64 flex-1 p-12 bg-[#FBFBFF] relative overflow-x-hidden min-h-screen">
        <div class="max-w-5xl mx-auto">
            <div class="flex justify-between items-center mb-16">
                <div>
                    <h2 class="text-4xl font-extrabold tracking-tighter">Control Center</h2>
                    <p class="text-black/30 text-xs font-bold uppercase tracking-widest mt-1">Status: Active / Authenticated</p>
                </div>
                <div class="flex items-center gap-4">
                    <a href="/" class="neo-btn bg-white! text-black px-6 py-2 text-[10px] border border-black/5">Live Preview ↗</a>
                </div>
            </div>

            @if(session('success'))
                <div class="mb-8 p-4 bg-mint border border-black/5 rounded-2xl text-xs font-bold text-emerald-800 flex items-center gap-3">
                    <span class="text-lg">✨</span> {{ session('success') }}
                </div>
            @endif

            <!-- PORTFOLIO MANAGE -->
            <section id="portfolio" class="mb-16">
                <div class="flex justify-between items-end mb-8">
                    <div>
                        <h3 class="text-xl font-bold mb-1">Portfolio Inputer</h3>
                        <p class="text-xs text-black/30 font-medium tracking-tight">Expand your dynamic gallery</p>
                    </div>
                </div>

                <div class="grid lg:grid-cols-3 gap-8 items-start">
                    <div class="neo-card p-8 bg-white lg:col-span-1">
                        <h4 class="text-sm font-black uppercase text-lavender-dark mb-6 tracking-widest">Add New Project</h4>
                        <form action="/admin/portfolio" method="POST" class="space-y-4">
                            @csrf
                            <input type="text" name="title" placeholder="Project Title" class="neo-input text-sm" required>
                            <input type="text" name="category" placeholder="Category" class="neo-input text-sm" required>
                            <input type="text" name="image_url" placeholder="Image URL" class="neo-input text-sm">
                            <textarea name="description" placeholder="Short Project Brief" class="neo-input text-sm h-32"></textarea>
                            <button type="submit" class="neo-btn w-full text-white! py-3">Confirm Mesh ✨</button>
                        </form>
                    </div>

                    <div class="lg:col-span-2">
                        <div class="grid sm:grid-cols-2 gap-4">
                            @foreach($portfolios as $item)
                            <div class="p-5 bg-white rounded-2xl border border-black/5 shadow-sm group hover:border-lavender-dark transition-all">
                                <div class="flex justify-between items-start mb-4">
                                    <div class="w-12 h-12 bg-lavender-light rounded-xl flex items-center justify-center text-xl overflow-hidden">
                                        @if($item->image_url) 
                                            <img src="{{ $item->image_url }}" class="w-full h-full object-cover">
                                        @else 🧊 @endif
                                    </div>
                                    <form action="/admin/portfolio/{{ $item->id }}" method="POST" onsubmit="return confirm('Delete this project?')">
                                        @csrf @method('DELETE')
                                        <button class="w-8 h-8 rounded-lg flex items-center justify-center bg-red-50 text-red-400 opacity-0 group-hover:opacity-100 transition-opacity">×</button>
                                    </form>
                                </div>
                                <h5 class="font-bold text-sm">{{ $item->title }}</h5>
                                <p class="text-[10px] text-black/30 font-black uppercase mt-1">{{ $item->category }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>

            <!-- REVIEWS & PRICING GRID -->
            <div class="grid lg:grid-cols-2 gap-12 mb-16">
                <!-- REVIEWS -->
                <section id="reviews">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold">Testimonials</h3>
                        <button onclick="document.getElementById('add-review-form').classList.toggle('hidden')" class="text-xs font-bold text-lavender-dark">+ Add New</button>
                    </div>

                    <div id="add-review-form" class="hidden neo-card p-8 bg-white mb-8">
                        <form action="/admin/review" method="POST" class="space-y-4">
                            @csrf
                            <input type="text" name="client_name" placeholder="Client/Studio Name" class="neo-input text-sm" required>
                            
                            <!-- Modern Star Rating Input -->
                            <div class="flex flex-col gap-3">
                                <label class="text-[10px] font-black uppercase tracking-widest text-black/30">Select Quality Level</label>
                                <div class="flex gap-4">
                                    @for($i = 1; $i <= 5; $i++)
                                    <label class="relative group/star cursor-pointer">
                                        <input type="radio" name="rating" value="{{ $i }}" class="hidden peer" {{ $i == 5 ? 'checked' : '' }}>
                                        <div class="w-12 h-12 flex items-center justify-center rounded-2xl bg-white border border-black/5 text-black/10 peer-checked:bg-lavender peer-checked:text-lavender-dark peer-checked:border-lavender-dark peer-checked:scale-110 peer-checked:shadow-lg peer-checked:shadow-lavender/20 transition-all duration-300 font-bold group-hover/star:border-lavender-dark">
                                            <div class="flex flex-col items-center">
                                                <span class="text-lg leading-none">★</span>
                                                <span class="text-[8px] font-black mt-1">{{ $i }}</span>
                                            </div>
                                        </div>
                                    </label>
                                    @endfor
                                </div>
                            </div>

                            <textarea name="comment" placeholder="What are they saying?" class="neo-input text-sm h-32" required></textarea>
                            <button type="submit" class="neo-btn w-full text-white! py-3">Publish Review</button>
                        </form>
                    </div>

                    <div class="space-y-4">
                        @foreach($reviews as $review)
                        <div class="p-6 bg-white rounded-2xl border border-black/5 shadow-sm flex justify-between items-center group relative overflow-hidden">
                            <div class="flex-1">
                                <div class="flex gap-1 text-[10px] text-lavender-dark mb-1">
                                    @for($i=0; $i<$review->rating; $i++) ★ @endfor
                                </div>
                                <h5 class="font-bold text-sm">{{ $review->client_name }}</h5>
                                <p class="text-xs text-black/40 line-clamp-1">{{ $review->comment }}</p>
                            </div>
                            
                            <div class="flex items-center gap-2">
                                <form action="/admin/review/{{ $review->id }}" method="POST" onsubmit="return confirm('Delete this review?')">
                                    @csrf @method('DELETE')
                                    <button class="px-4 py-2 rounded-xl bg-red-50 text-red-400 font-bold text-[10px] uppercase tracking-widest hover:bg-red-500 hover:text-white transition-all opacity-0 group-hover:opacity-100">Delete</button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </section>

                <!-- PRICING -->
                <section id="pricing">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold">Price Packages</h3>
                        <button onclick="document.getElementById('add-pricing-form').classList.toggle('hidden')" class="text-xs font-bold text-lavender-dark">+ Add New</button>
                    </div>

                    <div id="add-pricing-form" class="hidden neo-card p-8 bg-lavender-light/30 border-dashed border-2 mb-8">
                        <form action="/admin/pricing" method="POST" class="space-y-4">
                            @csrf
                            <input type="text" name="plan_name" placeholder="Plan Name" class="neo-input text-sm" required>
                            <input type="text" name="price" placeholder="Price" class="neo-input text-sm" required>
                            <textarea name="features" placeholder="Features" class="neo-input text-xs h-24" required></textarea>
                            <button type="submit" class="neo-btn w-full text-white! py-3">Create Plan</button>
                        </form>
                    </div>

                    <div class="space-y-6">
                        @foreach($pricings as $price)
                        <div class="neo-card p-8 bg-white relative group">
                            <form action="/admin/pricing/{{ $price->id }}" method="POST" onsubmit="return confirm('Delete this pricing plan?')">
                                @csrf @method('DELETE')
                                <button class="absolute top-4 right-4 text-xs font-bold text-red-300 opacity-0 group-hover:opacity-100 hover:text-red-500 transition-all">Delete Plan</button>
                            </form>

                            <form action="/admin/pricing/{{ $price->id }}" method="POST" class="space-y-4">
                                @csrf @method('PUT')
                                <div class="flex justify-between items-center">
                                    <h4 class="text-[10px] font-black uppercase text-lavender-dark tracking-widest">{{ $price->plan_name }}</h4>
                                    <button class="text-[10px] font-bold text-black/20 hover:text-black tracking-widest">Save Changes</button>
                                </div>
                                <input type="text" name="price" value="{{ $price->price }}" class="neo-input text-sm font-bold">
                                <textarea name="features" class="neo-input text-xs h-24">{{ $price->features }}</textarea>
                            </form>
                        </div>
                        @endforeach
                    </div>
                </section>
            </div>

            <!-- FAQ MANAGEMENT -->
            <section id="faq" class="mb-20">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-xl font-bold">Frequently Asked Questions</h3>
                    <button onclick="document.getElementById('add-faq-form').classList.toggle('hidden')" class="text-xs font-bold text-lavender-dark">+ Add Question</button>
                </div>

                <div id="add-faq-form" class="hidden neo-card p-8 bg-white mb-8">
                    <form action="/admin/faq" method="POST" class="space-y-4">
                        @csrf
                        <input type="text" name="question" placeholder="The Question" class="neo-input text-sm" required>
                        <textarea name="answer" placeholder="The Detailed Answer" class="neo-input text-sm h-32" required></textarea>
                        <button type="submit" class="neo-btn w-full text-white! py-3">Add FAQ</button>
                    </form>
                </div>

                <div class="border-t border-black/5">
                    @forelse($faqs as $faq)
                    <div class="py-6 border-b border-black/5 flex justify-between items-start group hover:bg-lavender/5 px-4 -mx-4 rounded-xl transition-all">
                        <div class="flex-1 pr-8">
                            <h5 class="font-bold text-sm mb-1">{{ $faq->question }}</h5>
                            <p class="text-xs text-black/40 leading-relaxed italic">"{{ $faq->answer }}"</p>
                        </div>
                        <form action="/admin/faq/{{ $faq->id }}" method="POST" onsubmit="return confirm('Delete this FAQ?')">
                            @csrf @method('DELETE')
                            <button class="w-8 h-8 rounded-lg bg-red-50 text-red-400 opacity-0 group-hover:opacity-100 transition-all flex items-center justify-center font-bold">×</button>
                        </form>
                    </div>
                    @empty
                    <div class="text-center py-12 opacity-30 italic text-sm">No FAQs configured.</div>
                    @endforelse
                </div>
            </section>

            <!-- SITE SETTINGS -->
            <section id="settings" class="mb-20">
                <h3 class="text-xl font-bold mb-6">Global Settings</h3>
                <div class="neo-card p-10 bg-skyblue-light">
                    <form action="/admin/settings" method="POST" class="grid md:grid-cols-2 gap-8">
                        @csrf
                        <div class="space-y-4">
                            <label class="text-[10px] font-black uppercase tracking-widest text-black/50 block">About Me Description</label>
                            <textarea name="about_text" class="neo-input text-sm h-48 bg-white">{{ $settings['about_text'] ?? '' }}</textarea>
                        </div>
                        <div class="space-y-6">
                            <div>
                                <label class="text-[10px] font-black uppercase tracking-widest text-black/50 block mb-3">Core Toolset</label>
                                <input type="text" name="tools" value="{{ $settings['tools'] ?? '' }}" class="neo-input text-sm bg-white">
                            </div>
                            <div class="p-6 bg-white/50 rounded-2xl border border-black/5">
                                <p class="text-[10px] font-bold text-black/40 leading-relaxed uppercase tracking-widest italic">
                                    Updating these fields will immediately change the descriptions reflected on the home page about section.
                                </p>
                            </div>
                            <button type="submit" class="neo-btn w-full text-white! py-4">Save Configuration ✨</button>
                        </div>
                    </form>
                </div>
            </section>
        </div>
        <div class="fixed top-20 right-20 w-64 h-64 bg-lavender/10 rounded-full blur-3xl pointer-events-none -z-10 animate-pulse"></div>
        <div class="fixed bottom-20 left-64 w-96 h-96 bg-skyblue/10 rounded-full blur-3xl pointer-events-none -z-10 animate-float"></div>

        <script>
            // Simple Scroll Spy for Sidebar
            const sections = document.querySelectorAll('section');
            const navLinks = document.querySelectorAll('.sidebar-link');

            window.addEventListener('scroll', () => {
                let current = '';
                sections.forEach(section => {
                    const sectionTop = section.offsetTop;
                    const sectionHeight = section.clientHeight;
                    if (pageYOffset >= (sectionTop - 200)) {
                        current = section.getAttribute('id');
                    }
                });

                navLinks.forEach(link => {
                    link.classList.remove('active');
                    if (link.getAttribute('href').includes(current)) {
                        link.classList.add('active');
                    }
                });
            });
        </script>
    </main>

</body>
</html>
