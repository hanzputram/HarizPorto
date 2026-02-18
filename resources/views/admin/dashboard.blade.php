<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard — Hariz Studio</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .sidebar-link { font-family: 'Outfit', sans-serif; }
        .minimal-scroll::-webkit-scrollbar { width: 4px; }
        .minimal-scroll::-webkit-scrollbar-track { background: transparent; }
        .minimal-scroll::-webkit-scrollbar-thumb { background: rgba(0,0,0,0.05); border-radius: 10px; }
    </style>
</head>
<body class="bg-lavender-light text-[#1A1A1A] antialiased selection:bg-lavender selection:text-lavender-dark transition-colors duration-300">
    <!-- Mobile Header -->
    <div class="md:hidden bg-white border-b border-black/5 p-4 sticky top-0 z-60 flex items-center justify-between transition-colors">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 rounded-xl bg-linear-to-br from-lavender to-lavender-dark flex items-center justify-center text-white text-xs font-bold shadow-sm">H</div>
            <span class="font-extrabold text-xs uppercase tracking-tight text-black">Hariz <span class="text-lavender-dark">Studio</span></span>
        </div>
        <button onclick="document.getElementById('sidebar').classList.toggle('-translate-x-full')" class="p-2 bg-lavender-light rounded-xl text-lavender-dark">
            <span class="text-xl">☰</span>
        </button>
    </div>

    <!-- Sidebar Overlay (Mobile) -->
    <div id="sidebar-overlay" onclick="document.getElementById('sidebar').classList.add('-translate-x-full')" class="md:hidden fixed inset-0 bg-black/20 backdrop-blur-sm z-40 hidden"></div>

    <!-- Sidebar -->
    <aside id="sidebar" class="w-72 bg-white flex flex-col fixed inset-y-0 left-0 border-r border-black/3 z-50 transition-all duration-300 -translate-x-full md:translate-x-0 transition-colors">
        <!-- Collapse Toggle Button (Desktop Only) -->
        <button onclick="toggleSidebar()" class="hidden md:flex absolute -right-4 top-8 w-8 h-8 bg-white border border-black/5 rounded-full items-center justify-center shadow-lg hover:bg-lavender hover:text-lavender-dark transition-all z-10">
            <span id="toggle-icon" class="text-sm">◀</span>
        </button>
        <div class="p-10 flex items-center gap-4">
            <div class="w-10 h-10 rounded-2xl bg-linear-to-br from-lavender to-lavender-dark flex items-center justify-center text-white shadow-lg shadow-lavender/30">
                <span class="text-lg font-bold">H</span>
            </div>
            <div>
                <h1 class="font-extrabold text-sm tracking-tight leading-none uppercase text-black">Hariz <span class="text-lavender-dark">Studio</span></h1>
                <p class="text-[9px] font-bold text-black/20 uppercase tracking-[0.2em] mt-1">Management v2.0</p>
            </div>
        </div>
        
        <nav class="flex-1 px-6 space-y-1 overflow-y-auto minimal-scroll">
            <p class="px-4 text-[9px] font-black uppercase tracking-[0.2em] text-black/20 mb-4 mt-6">Content Editor</p>
            <a href="#portfolio" class="sidebar-link group">
                <span class="w-8 h-8 rounded-xl bg-linear-to-br from-black/5 to-black/10 flex items-center justify-center group-hover:from-lavender group-hover:to-lavender-dark group-hover:text-white transition-all">📂</span>
                <span class="text-black group-hover:text-lavender-dark transition-colors">Portfolio</span>
            </a>
            <a href="#capabilities" class="sidebar-link group">
                <span class="w-8 h-8 rounded-xl bg-black/5 flex items-center justify-center group-hover:bg-lavender group-hover:text-lavender-dark transition-all">🎯</span>
                <span class="text-black group-hover:text-lavender-dark transition-colors">Capabilities</span>
            </a>
            <a href="#workflows" class="sidebar-link group">
                <span class="w-8 h-8 rounded-xl bg-black/5 flex items-center justify-center group-hover:bg-lavender group-hover:text-lavender-dark transition-all">⚡</span>
                <span class="text-black group-hover:text-lavender-dark transition-colors">Workflow</span>
            </a>
            
            <p class="px-4 text-[9px] font-black uppercase tracking-[0.2em] text-black/20 mb-4 mt-8">Business Data</p>
            <a href="#stats" class="sidebar-link group">
                <span class="w-8 h-8 rounded-xl bg-black/5 flex items-center justify-center group-hover:bg-lavender group-hover:text-lavender-dark transition-all">📊</span>
                <span class="text-black group-hover:text-lavender-dark transition-colors">Statistics</span>
            </a>
            <a href="#pricing" class="sidebar-link group">
                <span class="w-8 h-8 rounded-xl bg-black/5 flex items-center justify-center group-hover:bg-lavender group-hover:text-lavender-dark transition-all">💰</span>
                <span class="text-black group-hover:text-lavender-dark transition-colors">Pricing Plans</span>
            </a>
            
            <p class="px-4 text-[9px] font-black uppercase tracking-[0.2em] text-black/20 mb-4 mt-8">Engagement</p>
            <a href="#reviews" class="sidebar-link group">
                <span class="w-8 h-8 rounded-xl bg-black/5 flex items-center justify-center group-hover:bg-lavender group-hover:text-lavender-dark transition-all">💬</span>
                <span class="text-black group-hover:text-lavender-dark transition-colors">Testimonials</span>
            </a>
            <a href="#faq" class="sidebar-link group">
                <span class="w-8 h-8 rounded-xl bg-black/5 flex items-center justify-center group-hover:bg-lavender group-hover:text-lavender-dark transition-all">❓</span>
                <span class="text-black group-hover:text-lavender-dark transition-colors">Support FAQ</span>
            </a>
            
            <p class="px-4 text-[9px] font-black uppercase tracking-[0.2em] text-black/20 mb-4 mt-8">Configuration</p>
            <a href="#settings" class="sidebar-link group">
                <span class="w-8 h-8 rounded-xl bg-black/5 flex items-center justify-center group-hover:bg-lavender group-hover:text-lavender-dark transition-all">⚙️</span>
                <span class="text-black group-hover:text-lavender-dark transition-colors">Site Settings</span>
            </a>
        </nav>

        <div class="p-8 border-t border-black/3">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="w-full group flex items-center justify-between p-4 rounded-2xl bg-red-50 hover:bg-red-500 hover:text-white transition-all duration-500">
                    <span class="text-[10px] font-bold uppercase tracking-widest text-red-500 group-hover:text-white transition-colors">Terminate Session</span>
                    <span class="text-sm">➜</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content Container -->
    <div id="main-content" class="min-h-screen transition-all duration-300" style="margin-left: 0;">
        <style>
            @media (min-width: 768px) {
                #main-content {
                    margin-left: 288px !important;
                }
                #main-content.sidebar-collapsed {
                    margin-left: 0 !important;
                }
            }
            #sidebar.collapsed {
                width: 0 !important;
                overflow: hidden;
            }
        </style>
        <main class="p-6 md:p-12">
            <div class="w-full max-w-screen-2xl mx-auto">
            
            <header class="flex justify-between items-center mb-16">
                <div>
                    <h2 class="text-4xl font-extrabold tracking-tight text-black transition-colors">Dashboard Hub</h2>
                    <div class="flex items-center gap-3 mt-2">
                        <span class="inline-block w-2 h-2 rounded-full bg-green-400 animate-pulse"></span>
                        <p class="text-[10px] text-black/40 font-bold uppercase tracking-widest transition-colors">System Operational — Ver 2.0.4</p>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <!-- Dark Mode Toggle -->


                    <button onclick="toggleSidebar()" class="hidden md:flex px-4 py-2.5 bg-white border border-black/5 rounded-2xl shadow-sm text-[11px] font-bold text-black/60 hover:bg-lavender hover:text-lavender-dark transition-all items-center gap-2">
                        <span class="text-sm">☰</span>
                        <span>Toggle Sidebar</span>
                    </button>


                    <a href="/" class="px-6 py-2.5 bg-white border border-black/5 rounded-2xl shadow-sm text-[11px] font-bold text-black/60 hover:bg-black hover:text-white transition-all flex items-center gap-2">
                        <span>Preview Live Site</span>
                        <span class="text-sm">↗</span>
                    </a>
                </div>
            </header>

            @if(session('success'))
                <div class="mb-12 p-6 bg-green-50 border border-green-200 rounded-[32px] text-sm font-bold text-green-700 flex items-center gap-4 shadow-xl shadow-green-500/5">
                    <span class="w-10 h-10 rounded-2xl bg-green-500 text-white flex items-center justify-center text-lg shadow-lg shadow-green-500/20">✨</span>
                    <div>
                        <p class="uppercase text-[10px] tracking-[0.2em] opacity-50">Success Action</p>
                        <p>{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            <!-- PORTFOLIO MANAGE -->
            <section id="portfolio" class="mb-24">
                <div class="flex justify-between items-end mb-10">
                    <div>
                        <h3 class="text-2xl font-bold tracking-tight text-black transition-colors">Portfolio Works</h3>
                        <p class="text-xs text-black/30 font-medium mt-1 transition-colors">Manage and curate your professional showcase</p>
                    </div>
                </div>

                <div class="grid lg:grid-cols-12 gap-10 items-start">
                    <!-- ADD FORM -->
                    <div class="lg:col-span-4 bg-white p-8 rounded-[40px] border border-black/3 shadow-xl shadow-black/5 sticky top-12 transition-colors">
                        <div class="flex items-center gap-3 mb-8">
                            <div class="w-8 h-8 rounded-xl bg-lavender flex items-center justify-center text-lavender-dark text-sm">✦</div>
                            <h4 class="text-xs font-black uppercase tracking-widest text-black/70">New Creation</h4>
                        </div>
                        <form action="/admin/portfolio" method="POST" enctype="multipart/form-data" class="space-y-5">
                            @csrf
                            <input type="text" name="title" placeholder="Visual Title" class="neo-input text-xs" required>
                            <input type="text" name="category" placeholder="Render Type / Style" class="neo-input text-xs" required>
                            <div class="p-4 bg-lavender-light/50 rounded-2xl border border-dashed border-black/10 transition-colors">
                                <label class="text-[9px] font-black text-black/30 uppercase tracking-[0.2em] block mb-2 px-1 transition-colors">Upload Image</label>
                                <input type="file" name="image" class="text-[10px] font-bold text-black/40 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-[10px] file:font-black file:bg-white file:text-lavender-dark file:shadow-sm">
                            </div>
                            <div class="relative">
                                <input type="text" name="image_url" placeholder="Direct image URL (optional)" class="neo-input text-xs">
                                <p class="text-[8px] text-black/20 mt-1.5 px-2 font-medium transition-colors">💡 Or leave empty - we'll auto-fetch from Project URL below</p>
                            </div>
                            <input type="text" name="project_url" placeholder="Project URL (auto-fetches thumbnail)" class="neo-input text-xs">
                            <textarea name="description" placeholder="Project aesthetic breakdown..." class="neo-input text-xs h-32 resize-none"></textarea>
                            <button type="submit" class="w-full py-5 bg-black text-white rounded-3xl font-black text-[10px] uppercase tracking-[0.3em] shadow-2xl shadow-black/20 hover:scale-[1.02] active:scale-[0.98] transition-all">
                                Deploy to Studio ✨
                            </button>
                        </form>
                    </div>

                    <!-- GALLERY LIST -->
                    <div class="lg:col-span-8">
                        <div class="grid sm:grid-cols-2 gap-6">
                            @foreach($portfolios as $item)
                            <div class="bg-white p-6 rounded-[32px] border border-black/3 shadow-lg group hover:border-lavender hover:shadow-2xl hover:shadow-lavender/10 transition-all duration-700 overflow-hidden">
                                <div class="relative h-48 rounded-2xl overflow-hidden mb-6 bg-lavender-light border border-black/5 transition-colors">
                                    @if($item->image_url) 
                                        <img src="{{ $item->image_url }}" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
                                    @else 
                                        <div class="w-full h-full flex items-center justify-center text-4xl opacity-10">🧊</div>
                                    @endif
                                    <div class="absolute inset-0 bg-linear-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-end p-6">
                                        <div class="flex gap-2">
                                            <button onclick="document.getElementById('edit-portfolio-{{ $item->id }}').classList.toggle('hidden')" class="w-10 h-10 rounded-xl bg-white/20 backdrop-blur-md flex items-center justify-center text-white hover:bg-white hover:text-black transition-all">✎</button>
                                            <form action="/admin/portfolio/{{ $item->id }}" method="POST" onsubmit="return confirm('Delete this project?')">
                                                @csrf @method('DELETE')
                                                <button class="w-10 h-10 rounded-xl bg-red-500/20 backdrop-blur-md flex items-center justify-center text-red-200 hover:bg-red-500 hover:text-white transition-all">×</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                
                                <h5 class="font-bold text-sm tracking-tight text-black mb-1 italic transition-colors">{{ $item->title }}</h5>
                                <div class="flex items-center justify-between">
                                    <span class="text-[9px] font-black uppercase tracking-[0.2em] text-lavender-dark bg-lavender/20 px-3 py-1 rounded-full">{{ $item->category }}</span>
                                    <span class="text-[10px] text-black/20 font-medium transition-colors">#{{ $loop->iteration }}</span>
                                </div>

                                <div id="edit-portfolio-{{ $item->id }}" class="hidden mt-8 pt-6 border-t border-black/3 animate-fade-in">
                                    <form action="/admin/portfolio/{{ $item->id }}" method="POST" enctype="multipart/form-data" class="space-y-3 pb-2">
                                        @csrf @method('PUT')
                                        <input type="text" name="title" value="{{ $item->title }}" class="neo-input text-[10px] py-3 bg-[#FBFBFF]" required>
                                        <input type="text" name="category" value="{{ $item->category }}" class="neo-input text-[10px] py-3 bg-[#FBFBFF]" required>
                                        <input type="text" name="image_url" value="{{ $item->image_url }}" class="neo-input text-[10px] py-3 bg-[#FBFBFF]" placeholder="Image URL">
                                        <input type="text" name="project_url" value="{{ $item->project_url }}" class="neo-input text-[10px] py-3 bg-[#FBFBFF]" placeholder="Project Link">
                                        <button type="submit" class="w-full py-3 bg-lavender text-lavender-dark rounded-xl text-[9px] font-black uppercase tracking-widest hover:bg-lavender-dark hover:text-white transition-all">Update Project</button>
                                    </form>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
            
            <!-- STATS MANAGEMENT -->
            <section id="stats" class="mb-24">
                <div class="flex justify-between items-center mb-10">
                    <div>
                        <h3 class="text-2xl font-bold tracking-tight text-lavender-dark">Impact Metrics</h3>
                        <p class="text-xs text-black/30 font-medium transition-colors">Quantifying your professional growth</p>
                    </div>
                    <button onclick="document.getElementById('add-stat-form').classList.toggle('hidden')" class="px-5 py-2 bg-white border border-black/5 rounded-xl text-[10px] font-black uppercase tracking-widest text-black hover:bg-lavender hover:text-lavender-dark transition-all">+ Register Metric</button>
                </div>

                <div id="add-stat-form" class="hidden bg-white p-8 rounded-[32px] border border-black/3 shadow-xl mb-12 animate-fade-in max-w-2xl transition-colors">
                    <form action="/admin/stat" method="POST" class="grid sm:grid-cols-2 gap-6">
                        @csrf
                        <div class="space-y-1">
                            <label class="text-[9px] font-black text-black/20 uppercase tracking-widest pl-4 transition-colors">Metric Value</label>
                            <input type="text" name="value" placeholder="e.g. 100+" class="neo-input text-sm" required>
                        </div>
                        <div class="space-y-1">
                            <label class="text-[9px] font-black text-black/20 uppercase tracking-widest pl-4 transition-colors">Metric Label</label>
                            <input type="text" name="label" placeholder="e.g. Models Rendered" class="neo-input text-sm" required>
                        </div>
                        <button type="submit" class="sm:col-span-2 py-4 bg-black text-white rounded-2xl font-black text-[10px] uppercase tracking-[0.2em] shadow-lg transition-all">Activate Metric</button>
                    </form>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @forelse($stats as $stat)
                    <div class="p-8 bg-white rounded-[32px] border border-black/3 shadow-md group relative hover:shadow-xl hover:border-lavender transition-all duration-500">
                        <div class="text-3xl font-black mb-1 tracking-tighter text-black transition-colors">{{ $stat->value }}</div>
                        <div class="text-[10px] font-black uppercase text-black/20 tracking-[0.2em] transition-colors">{{ $stat->label }}</div>
                        
                        <div class="absolute top-6 right-6 flex gap-2">
                            <button onclick="document.getElementById('edit-stat-{{ $stat->id }}').classList.toggle('hidden')" class="w-8 h-8 flex items-center justify-center rounded-xl bg-lavender-light text-lavender-dark opacity-0 group-hover:opacity-100 transition-all text-xs">✎</button>
                            <form action="/admin/stat/{{ $stat->id }}" method="POST" onsubmit="return confirm('Delete this stat?')">
                                @csrf @method('DELETE')
                                <button class="w-8 h-8 flex items-center justify-center rounded-xl bg-red-50 text-red-400 opacity-0 group-hover:opacity-100 transition-all">×</button>
                            </form>
                        </div>

                        <div id="edit-stat-{{ $stat->id }}" class="hidden mt-6 pt-6 border-t border-black/3 animate-fade-in">
                            <form action="/admin/stat/{{ $stat->id }}" method="POST" class="space-y-3">
                                @csrf @method('PUT')
                                <input type="text" name="value" value="{{ $stat->value }}" class="neo-input text-[10px] py-3 bg-[#FBFBFF]" required>
                                <input type="text" name="label" value="{{ $stat->label }}" class="neo-input text-[10px] py-3 bg-[#FBFBFF]" required>
                                <button type="submit" class="w-full py-2 bg-black text-white rounded-xl text-[8px] font-black uppercase tracking-widest">Update</button>
                            </form>
                        </div>
                    </div>
                    @empty
                    <div class="col-span-full py-20 bg-white rounded-[40px] border border-dashed border-black/5 text-center flex flex-col items-center justify-center transition-colors">
                        <span class="text-4xl mb-4 opacity-10">📊</span>
                        <p class="text-[11px] font-bold text-black/20 uppercase tracking-widest italic transition-colors">No impact metrics registered yet</p>
                    </div>
                    @endforelse
                </div>
            </section>

            <!-- WORKFLOW MANAGEMENT -->
            <section id="workflows" class="mb-24">
                <div class="flex justify-between items-center mb-10">
                    <div>
                        <h3 class="text-2xl font-bold tracking-tight text-lavender-dark">Production Pipeline</h3>
                        <p class="text-xs text-black/30 font-medium">Standardizing your creative process</p>
                    </div>
                    <button onclick="document.getElementById('add-workflow-form').classList.toggle('hidden')" class="px-5 py-2 bg-white border border-black/5 rounded-xl text-[10px] font-black uppercase tracking-widest hover:bg-lavender hover:text-lavender-dark transition-all">+ Add Step</button>
                </div>

                <div id="add-workflow-form" class="hidden bg-white p-10 rounded-[40px] border border-black/3 shadow-2xl mb-12 animate-fade-in">
                    <form action="/admin/workflow" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid sm:grid-cols-3 gap-6">
                            <div class="sm:col-span-2 space-y-1">
                                <label class="text-[9px] font-black text-black/20 uppercase tracking-widest pl-4">Step Name</label>
                                <input type="text" name="title" placeholder="e.g. Mesh Optimization" class="neo-input text-sm" required>
                            </div>
                            <div class="space-y-1">
                                <label class="text-[9px] font-black text-black/20 uppercase tracking-widest pl-4">Pipeline Order</label>
                                <input type="number" name="order" value="{{ count($workflows) + 1 }}" class="neo-input text-sm" required>
                            </div>
                        </div>
                        <div class="space-y-1">
                            <label class="text-[9px] font-black text-black/20 uppercase tracking-widest pl-4">Process Breakdown</label>
                            <textarea name="description" placeholder="Briefly explain this production phase..." class="neo-input text-sm h-32 resize-none" required></textarea>
                        </div>
                        <button type="submit" class="w-full py-5 bg-black text-white rounded-3xl font-black text-[10px] uppercase tracking-[0.3em] shadow-xl">Inject into Pipeline</button>
                    </form>
                </div>

                <div class="grid md:grid-cols-2 gap-8">
                    @forelse($workflows as $step)
                    <div class="p-8 bg-white rounded-[40px] border border-black/3 relative group shadow-lg hover:shadow-2xl hover:border-lavender transition-all duration-700">
                        <div class="flex items-center gap-6 mb-6">
                            <div class="w-14 h-14 rounded-3xl bg-lavender-light flex items-center justify-center text-lg font-black text-lavender-dark italic shadow-inner shadow-lavender-dark/10 transition-colors">{{ str_pad($step->order, 2, '0', STR_PAD_LEFT) }}</div>
                            <h5 class="text-lg font-bold tracking-tight text-black flex-1 mt-1 transition-colors">{{ $step->title }}</h5>
                        </div>
                        <p class="text-[13px] text-black/40 leading-[1.8] font-medium transition-colors">{{ $step->description }}</p>
                        
                        <div class="absolute top-8 right-8 flex gap-2">
                            <button onclick="document.getElementById('edit-workflow-{{ $step->id }}').classList.toggle('hidden')" class="w-8 h-8 flex items-center justify-center rounded-xl bg-lavender-light text-lavender-dark opacity-0 group-hover:opacity-100 transition-all text-xs">✎</button>
                            <form action="/admin/workflow/{{ $step->id }}" method="POST" onsubmit="return confirm('Delete this step?')">
                                @csrf @method('DELETE')
                                <button class="w-8 h-8 flex items-center justify-center rounded-xl bg-red-50 text-red-400 opacity-0 group-hover:opacity-100 transition-all text-sm">×</button>
                            </form>
                        </div>

                        <div id="edit-workflow-{{ $step->id }}" class="hidden mt-8 pt-8 border-t border-black/3 animate-fade-in">
                            <form action="/admin/workflow/{{ $step->id }}" method="POST" class="space-y-4">
                                @csrf @method('PUT')
                                <div class="grid grid-cols-2 gap-4">
                                    <input type="text" name="title" value="{{ $step->title }}" class="neo-input text-[11px] py-4 bg-[#FBFBFF]" required>
                                    <input type="number" name="order" value="{{ $step->order }}" class="neo-input text-[11px] py-4 bg-[#FBFBFF]" required>
                                </div>
                                <textarea name="description" class="neo-input text-[11px] py-4 h-28 bg-[#FBFBFF] resize-none">{{ $step->description }}</textarea>
                                <button type="submit" class="w-full py-4 bg-lavender text-lavender-dark rounded-2xl text-[10px] font-black uppercase tracking-widest hover:bg-lavender-dark hover:text-white transition-all">Update Phase</button>
                            </form>
                        </div>
                    </div>
                    @empty
                    <div class="col-span-full py-20 bg-white rounded-[50px] border border-dashed border-black/10 text-center flex flex-col items-center justify-center transition-colors">
                        <span class="text-4xl mb-4 opacity-10">⚡</span>
                        <p class="text-[11px] font-bold text-black/20 uppercase tracking-widest italic transition-colors">No workflow pipeline defined yet</p>
                    </div>
                    @endforelse
                </div>
            </section>


            <!-- CAPABILITIES MANAGEMENT -->
            <section id="capabilities" class="mb-24">
                <div class="flex justify-between items-center mb-10">
                    <div>
                        <h3 class="text-2xl font-bold tracking-tight text-lavender-dark">Expertise & Skillsets</h3>
                        <p class="text-xs text-black/30 font-medium tracking-tight">Technical and artistic mastery domains</p>
                    </div>
                    <button onclick="document.getElementById('add-capability-form').classList.toggle('hidden')" class="px-5 py-2 bg-white border border-black/5 rounded-xl text-[10px] font-black uppercase tracking-widest hover:bg-lavender hover:text-lavender-dark transition-all">+ Register Skill</button>
                </div>

                <!-- SECTION CONFIGURATION -->
                <div class="bg-white p-10 rounded-[40px] border border-black/5 mb-12 shadow-xl shadow-black/5 transition-colors">
                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-10 h-10 rounded-2xl bg-lavender flex items-center justify-center text-lavender-dark text-lg">⚙️</div>
                        <h4 class="text-[11px] font-black uppercase tracking-[0.2em] text-black/60 transition-colors">Global Section Config</h4>
                    </div>
                    <form action="/admin/settings" method="POST" class="space-y-8">
                        @csrf
                        <div class="grid sm:grid-cols-2 gap-8">
                            <div class="space-y-1">
                                <label class="text-[9px] font-black uppercase tracking-widest text-black/30 pl-4 block transition-colors">Section Label</label>
                                <input type="text" name="capabilities_label" value="{{ $settings['capabilities_label'] ?? 'Artistic Core' }}" class="neo-input text-xs" placeholder="e.g. Mastered Skills">
                            </div>
                            <div class="space-y-1">
                                <label class="text-[9px] font-black uppercase tracking-widest text-black/30 pl-4 block transition-colors">Main Heading</label>
                                <input type="text" name="capabilities_heading" value="{{ $settings['capabilities_heading'] ?? 'Pastel Precision.' }}" class="neo-input text-xs" placeholder="Large Heading Text">
                            </div>
                        </div>
                        <div class="space-y-1">
                            <label class="text-[9px] font-black uppercase tracking-widest text-black/30 pl-4 block transition-colors">Section Narrative</label>
                            <textarea name="capabilities_description" class="neo-input text-xs h-24 resize-none">{{ $settings['capabilities_description'] ?? 'Melting hard geometry into soft visual experiences across all domains of 3D art.' }}</textarea>
                        </div>
                        <button type="submit" class="w-full py-4 bg-lavender text-lavender-dark rounded-[24px] text-[10px] font-black uppercase tracking-[0.2em] hover:bg-lavender-dark hover:text-white shadow-lg transition-all">Save Architecture Config</button>
                    </form>
                </div>

                <!-- ADD NEW CAPABILITY -->
                <div id="add-capability-form" class="hidden bg-white p-10 rounded-[40px] border border-black/3 shadow-2xl mb-12 animate-fade-in">
                    <form action="/admin/capability" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid sm:grid-cols-12 gap-6">
                            <div class="sm:col-span-6 space-y-1">
                                <label class="text-[9px] font-black text-black/20 uppercase tracking-widest pl-4">Skill Title</label>
                                <input type="text" name="title" placeholder="e.g. Photorealistic Texturing" class="neo-input text-sm" required>
                            </div>
                            <div class="sm:col-span-2 space-y-1 text-center">
                                <label class="text-[9px] font-black text-black/20 uppercase tracking-widest block">Icon</label>
                                <input type="text" name="icon" value="📐" class="neo-input text-center text-lg py-3">
                            </div>
                            <div class="sm:col-span-2 space-y-1 text-center">
                                <label class="text-[9px] font-black text-black/20 uppercase tracking-widest block">ID #</label>
                                <input type="text" name="module_number" value="01" class="neo-input text-center text-sm font-black py-3">
                            </div>
                            <div class="sm:col-span-2 space-y-1 text-center">
                                <label class="text-[9px] font-black text-black/20 uppercase tracking-widest block">Priority</label>
                                <input type="number" name="order" value="{{ isset($capabilities) ? count($capabilities) + 1 : 1 }}" class="neo-input text-center text-sm font-black py-3" required>
                            </div>
                        </div>
                        <div class="space-y-1">
                            <label class="text-[9px] font-black text-black/20 uppercase tracking-widest pl-4">Capability Depth</label>
                            <textarea name="description" placeholder="Technical breakdown of this expertise..." class="neo-input text-sm h-32 resize-none" required></textarea>
                        </div>
                        <button type="submit" class="w-full py-5 bg-black text-white rounded-[24px] font-black text-[10px] uppercase tracking-[0.3em] shadow-xl">Register Expertise ✨</button>
                    </form>
                </div>

                <div class="grid md:grid-cols-2 gap-8">
                    @isset($capabilities)
                    @forelse($capabilities as $capability)
                    <div class="p-10 bg-white rounded-[40px] border border-black/3 relative group shadow-lg hover:shadow-2xl hover:border-lavender transition-all duration-700 transition-colors">
                        <div class="flex items-start gap-8">
                            <div class="w-20 h-20 rounded-[32px] bg-lavender-light/30 flex items-center justify-center text-4xl shadow-inner shadow-lavender/5 transition-all duration-500 group-hover:scale-110">{{ $capability->icon }}</div>
                            <div class="flex-1">
                                <div class="flex items-center gap-3 mb-3">
                                    <span class="text-[9px] font-black uppercase tracking-[0.2em] text-lavender-dark bg-lavender/20 px-4 py-1.5 rounded-full transition-colors">Unit {{ $capability->module_number }}</span>
                                    <span class="w-1.5 h-1.5 rounded-full bg-black/5 transition-colors"></span>
                                    <span class="text-[9px] font-black uppercase tracking-[0.2em] text-black/10 transition-colors">Pos: {{ $capability->order }}</span>
                                </div>
                                <h5 class="font-bold text-xl mb-3 tracking-tight text-black transition-colors">{{ $capability->title }}</h5>
                                <p class="text-[13px] text-black/40 font-medium leading-relaxed transition-colors">{{ $capability->description }}</p>
                            </div>
                        </div>

                        <div class="absolute top-10 right-10 flex gap-2">
                            <button onclick="document.getElementById('edit-capability-{{ $capability->id }}').classList.toggle('hidden')" class="w-9 h-9 flex items-center justify-center rounded-2xl bg-lavender-light text-lavender-dark opacity-0 group-hover:opacity-100 transition-all shadow-sm">✎</button>
                            <form action="/admin/capability/{{ $capability->id }}" method="POST" onsubmit="return confirm('Delete this capability?')">
                                @csrf @method('DELETE')
                                <button class="w-9 h-9 flex items-center justify-center rounded-2xl bg-red-50 text-red-400 opacity-0 group-hover:opacity-100 transition-all shadow-sm">×</button>
                            </form>
                        </div>

                        <div id="edit-capability-{{ $capability->id }}" class="hidden mt-10 pt-10 border-t border-black/3 animate-fade-in">
                            <form action="/admin/capability/{{ $capability->id }}" method="POST" class="space-y-4">
                                @csrf @method('PUT')
                                <input type="text" name="title" value="{{ $capability->title }}" class="neo-input text-[11px] py-4 bg-[#FBFBFF]" required>
                                <div class="grid grid-cols-3 gap-4">
                                    <div class="space-y-1">
                                        <label class="text-[8px] font-black uppercase tracking-widest pl-2">Icon</label>
                                        <input type="text" name="icon" value="{{ $capability->icon }}" class="neo-input text-center text-sm py-3">
                                    </div>
                                    <div class="space-y-1">
                                        <label class="text-[8px] font-black uppercase tracking-widest pl-2">ID #</label>
                                        <input type="text" name="module_number" value="{{ $capability->module_number }}" class="neo-input text-center text-sm py-3">
                                    </div>
                                    <div class="space-y-1">
                                        <label class="text-[8px] font-black uppercase tracking-widest pl-2">Pos</label>
                                        <input type="number" name="order" value="{{ $capability->order }}" class="neo-input text-center text-sm py-3">
                                    </div>
                                </div>
                                <textarea name="description" class="neo-input text-[11px] py-4 h-28 bg-[#FBFBFF] resize-none">{{ $capability->description }}</textarea>
                                <button type="submit" class="w-full py-4 bg-lavender text-lavender-dark rounded-2xl text-[10px] font-black uppercase tracking-widest hover:bg-lavender-dark hover:text-white transition-all">Update Unit</button>
                            </form>
                        </div>
                    </div>
                    @empty
                    <div class="col-span-full py-24 bg-white rounded-[50px] border border-dashed border-black/10 text-center flex flex-col items-center justify-center transition-colors">
                        <span class="text-5xl mb-6 opacity-10">🎯</span>
                        <p class="text-[12px] font-bold text-black/20 uppercase tracking-[0.2em] italic transition-colors">No technical capabilities defined yet</p>
                    </div>
                    @endforelse
                    @endisset
                </div>
            </section>

            <!-- REVIEWS MANAGEMENT -->
            <section id="reviews" class="mb-24">
                <div class="flex justify-between items-center mb-10">
                    <div>
                        <h3 class="text-2xl font-bold tracking-tight text-lavender-dark">Client Testimonials</h3>
                        <p class="text-xs text-black/30 font-medium tracking-tight">Vouching for your creative excellence</p>
                    </div>
                    <button onclick="document.getElementById('add-review-form').classList.toggle('hidden')" class="px-5 py-2 bg-white border border-black/5 rounded-xl text-[10px] font-black uppercase tracking-widest hover:bg-lavender hover:text-lavender-dark transition-all">+ Add Vouch</button>
                </div>

                <div id="add-review-form" class="hidden bg-white p-10 rounded-[40px] border border-black/3 shadow-2xl mb-12 animate-fade-in max-w-3xl">
                    <form action="/admin/review" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid sm:grid-cols-2 gap-6">
                            <div class="space-y-1">
                                <label class="text-[9px] font-black text-black/20 uppercase tracking-widest pl-4">Client Name / Studio</label>
                                <input type="text" name="client_name" placeholder="Full Name" class="neo-input text-sm" required>
                            </div>
                            <div class="space-y-1">
                                <label class="text-[9px] font-black text-black/20 uppercase tracking-widest pl-4">Vibe Rating (1-5)</label>
                                <input type="number" name="rating" min="1" max="5" value="5" class="neo-input text-sm" required>
                            </div>
                        </div>
                        <div class="space-y-1">
                            <label class="text-[9px] font-black text-black/20 uppercase tracking-widest pl-4">The Testimonial</label>
                            <textarea name="comment" placeholder="What they said about your work..." class="neo-input text-sm h-32 resize-none" required></textarea>
                        </div>
                        <button type="submit" class="w-full py-5 bg-black text-white rounded-[24px] font-black text-[10px] uppercase tracking-[0.3em] shadow-xl">Publish Vouch ✨</button>
                    </form>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse($reviews as $review)
                    <div class="p-8 bg-white rounded-[40px] border border-black/3 relative group shadow-lg hover:shadow-2xl transition-all duration-700 transition-colors">
                        <div class="flex items-center gap-1 mb-4">
                            @for($i=0; $i<$review->rating; $i++) <span class="text-xs">⭐</span> @endfor
                        </div>
                        <p class="text-[13px] text-black/50 leading-relaxed font-medium mb-6 italic transition-colors">"{{ $review->comment }}"</p>
                        <div class="flex items-center justify-between transition-colors">
                            <h5 class="text-[11px] font-black uppercase tracking-widest text-black/80 transition-colors">{{ $review->client_name }}</h5>
                            <span class="text-[10px] text-black/20 font-bold uppercase transition-colors">Verified Client</span>
                        </div>

                        <div class="absolute top-8 right-8 flex gap-2">
                            <button onclick="document.getElementById('edit-review-{{ $review->id }}').classList.toggle('hidden')" class="w-8 h-8 flex items-center justify-center rounded-xl bg-lavender-light text-lavender-dark opacity-0 group-hover:opacity-100 transition-all text-xs">✎</button>
                            <form action="/admin/review/{{ $review->id }}" method="POST" onsubmit="return confirm('Delete this review?')">
                                @csrf @method('DELETE')
                                <button class="w-8 h-8 flex items-center justify-center rounded-xl bg-red-50 text-red-400 opacity-0 group-hover:opacity-100 transition-all text-sm">×</button>
                            </form>
                        </div>

                        <div id="edit-review-{{ $review->id }}" class="hidden mt-8 pt-8 border-t border-black/3 animate-fade-in">
                            <form action="/admin/review/{{ $review->id }}" method="POST" class="space-y-4">
                                @csrf @method('PUT')
                                <div class="grid grid-cols-2 gap-4">
                                    <input type="text" name="client_name" value="{{ $review->client_name }}" class="neo-input text-[11px] py-4 bg-[#FBFBFF]" required>
                                    <input type="number" name="rating" value="{{ $review->rating }}" min="1" max="5" class="neo-input text-[11px] py-4 bg-[#FBFBFF]" required>
                                </div>
                                <textarea name="comment" class="neo-input text-[11px] py-4 h-28 bg-[#FBFBFF] resize-none">{{ $review->comment }}</textarea>
                                <button type="submit" class="w-full py-4 bg-lavender text-lavender-dark rounded-2xl text-[10px] font-black uppercase tracking-widest hover:bg-lavender-dark hover:text-white transition-all">Update Vouch</button>
                            </form>
                        </div>
                    </div>
                    @empty
                    <div class="col-span-full py-16 bg-white rounded-[40px] border border-dashed border-black/5 text-center flex flex-col items-center justify-center transition-colors">
                        <span class="text-4xl mb-4 opacity-10">💬</span>
                        <p class="text-[11px] font-bold text-black/20 uppercase tracking-widest italic transition-colors">No client vouches registered yet</p>
                    </div>
                    @endforelse
                </div>
            </section>

            <!-- PRICING MANAGEMENT -->
            <section id="pricing" class="mb-24">
                <div class="flex justify-between items-center mb-10">
                    <div>
                        <h3 class="text-2xl font-bold tracking-tight text-lavender-dark">Service Tiers</h3>
                        <p class="text-xs text-black/30 font-medium tracking-tight">Structured creative investments</p>
                    </div>
                    <button onclick="document.getElementById('add-pricing-form').classList.toggle('hidden')" class="px-5 py-2 bg-white border border-black/5 rounded-xl text-[10px] font-black uppercase tracking-widest hover:bg-lavender hover:text-lavender-dark transition-all">+ Configure Tier</button>
                </div>

                <div id="add-pricing-form" class="hidden bg-white p-10 rounded-[40px] border border-black/3 shadow-2xl mb-12 animate-fade-in">
                    <form action="/admin/pricing" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid sm:grid-cols-3 gap-6">
                            <div class="space-y-1">
                                <label class="text-[9px] font-black text-black/20 uppercase tracking-widest pl-4">Tier Identity</label>
                                <input type="text" name="plan_name" placeholder="e.g. Starter Pack" class="neo-input text-sm" required>
                            </div>
                            <div class="space-y-1">
                                <label class="text-[9px] font-black text-black/20 uppercase tracking-widest pl-4">Investment ($)</label>
                                <input type="text" name="price" placeholder="e.g. 499" class="neo-input text-sm" required>
                            </div>
                            <div class="flex items-end pb-3 gap-3">
                                <label class="flex items-center gap-3 cursor-pointer group">
                                    <input type="checkbox" name="is_featured" value="1" class="w-5 h-5 rounded-lg border-black/10 text-lavender-dark focus:ring-lavender-dark">
                                    <span class="text-[10px] font-black uppercase tracking-widest text-black/40 group-hover:text-black">Mark as Hot Tier</span>
                                </label>
                            </div>
                        </div>
                        <div class="space-y-1">
                            <label class="text-[9px] font-black text-black/20 uppercase tracking-widest pl-4">Capabilities Included (Comma Separated)</label>
                            <textarea name="features" placeholder="3D Model, 4K Rendering, Source Files..." class="neo-input text-sm h-24 resize-none" required></textarea>
                        </div>
                        <button type="submit" class="w-full py-5 bg-black text-white rounded-[24px] font-black text-[10px] uppercase tracking-[0.3em] shadow-xl">Deploy Pricing Tier</button>
                    </form>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse($pricings as $tier)
                    <div class="p-10 bg-white rounded-[40px] border @if($tier->is_featured) border-lavender ring-4 ring-lavender/10 @else border-black/3 @endif relative group shadow-lg hover:shadow-2xl transition-all duration-700 transition-colors">
                        @if($tier->is_featured)
                        <div class="absolute -top-4 left-1/2 -translate-x-1/2 px-6 py-1.5 bg-lavender text-lavender-dark text-[10px] font-black uppercase tracking-[0.3em] rounded-full shadow-lg shadow-lavender/20">Recommended</div>
                        @endif
                        
                        <h5 class="text-xs font-black uppercase tracking-[0.2em] text-black/30 mb-2 transition-colors">{{ $tier->plan_name }}</h5>
                        <div class="flex items-baseline gap-1 mb-8">
                            <span class="text-3xl font-black text-black tracking-tighter transition-colors">{{ $tier->price }}</span>
                            <span class="text-[10px] font-black text-black/20 uppercase transition-colors">/ starting</span>
                        </div>
                        
                        <ul class="space-y-4 mb-10">
                            @foreach(explode(',', $tier->features) as $feature)
                            <li class="flex items-center gap-3 text-[11px] font-medium text-black/60 transition-colors">
                                <span class="w-1.5 h-1.5 rounded-full bg-lavender-dark"></span>
                                {{ trim($feature) }}
                            </li>
                            @endforeach
                        </ul>

                        <div class="absolute top-10 right-10 flex gap-2">
                            <button onclick="document.getElementById('edit-pricing-{{ $tier->id }}').classList.toggle('hidden')" class="w-8 h-8 flex items-center justify-center rounded-xl bg-lavender-light text-lavender-dark opacity-0 group-hover:opacity-100 transition-all text-xs">✎</button>
                            <form action="/admin/pricing/{{ $tier->id }}" method="POST" onsubmit="return confirm('Delete this pricing tier?')">
                                @csrf @method('DELETE')
                                <button class="w-8 h-8 flex items-center justify-center rounded-xl bg-red-50 text-red-400 opacity-0 group-hover:opacity-100 transition-all text-sm">×</button>
                            </form>
                        </div>
                        
                        <div id="edit-pricing-{{ $tier->id }}" class="hidden mt-8 pt-8 border-t border-black/3 animate-fade-in">
                            <form action="/admin/pricing/{{ $tier->id }}" method="POST" class="space-y-4">
                                @csrf @method('PUT')
                                <div class="grid grid-cols-2 gap-4">
                                    <input type="text" name="plan_name" value="{{ $tier->plan_name }}" class="neo-input text-[11px] py-4 bg-[#FBFBFF]" required>
                                    <input type="text" name="price" value="{{ $tier->price }}" class="neo-input text-[11px] py-4 bg-[#FBFBFF]" required>
                                </div>
                                <div class="flex items-center gap-3 p-2">
                                    <input type="hidden" name="is_featured" value="0">
                                    <input type="checkbox" name="is_featured" value="1" @if($tier->is_featured) checked @endif class="rounded border-black/10 transition-colors">
                                    <span class="text-[10px] font-bold uppercase text-black/30 transition-colors">Popular Tier</span>
                                </div>
                                <textarea name="features" class="neo-input text-[11px] py-4 h-28 bg-[#FBFBFF] resize-none">{{ $tier->features }}</textarea>
                                <button type="submit" class="w-full py-4 bg-lavender text-lavender-dark rounded-2xl text-[10px] font-black uppercase tracking-widest">Update Tier</button>
                            </form>
                        </div>
                    </div>
                    @empty
                    <div class="col-span-full py-16 bg-white rounded-[50px] border border-dashed border-black/5 text-center flex flex-col items-center justify-center transition-colors">
                        <span class="text-4xl mb-4 opacity-10">💰</span>
                        <p class="text-[11px] font-bold text-black/20 uppercase tracking-widest italic transition-colors">No service tiers configured yet</p>
                    </div>
                    @endforelse
                </div>
            </section>

            <!-- FAQ MANAGEMENT -->
            <section id="faq" class="mb-24">
                <div class="flex justify-between items-center mb-10">
                    <div>
                        <h3 class="text-2xl font-bold tracking-tight text-lavender-dark">Support Intelligence</h3>
                        <p class="text-xs text-black/30 font-medium tracking-tight">Answering the recursive curiosities</p>
                    </div>
                    <button onclick="document.getElementById('add-faq-form').classList.toggle('hidden')" class="px-5 py-2 bg-white border border-black/5 rounded-xl text-[10px] font-black uppercase tracking-widest hover:bg-lavender hover:text-lavender-dark transition-all">+ Register Query</button>
                </div>

                <div id="add-faq-form" class="hidden bg-white p-10 rounded-[40px] border border-black/3 shadow-2xl mb-12 animate-fade-in max-w-3xl transition-colors">
                    <form action="/admin/faq" method="POST" class="space-y-6">
                        @csrf
                        <div class="space-y-1">
                            <label class="text-[9px] font-black text-black/20 uppercase tracking-widest pl-4 transition-colors">The Question</label>
                            <input type="text" name="question" placeholder="Common inquiry..." class="neo-input text-sm" required>
                        </div>
                        <div class="space-y-1">
                            <label class="text-[9px] font-black text-black/20 uppercase tracking-widest pl-4 transition-colors">The Solution</label>
                            <textarea name="answer" placeholder="Detailed architectural response..." class="neo-input text-sm h-32 resize-none" required></textarea>
                        </div>
                        <button type="submit" class="w-full py-5 bg-black text-white rounded-[24px] font-black text-[10px] uppercase tracking-[0.3em] shadow-xl transition-all">Inject Support Logic</button>
                    </form>
                </div>

                <div class="space-y-4">
                    @forelse($faqs as $faq)
                    <div class="bg-white p-8 rounded-[32px] border border-black/3 group relative shadow-md hover:shadow-xl transition-all duration-700 transition-colors overflow-hidden">
                        <div class="flex justify-between items-start transition-colors">
                            <div class="flex-1 transition-colors">
                                <h5 class="text-[13px] font-bold text-black mb-3 pr-20 transition-colors">{{ $faq->question }}</h5>
                                <p class="text-[12px] text-black/40 leading-relaxed font-medium transition-colors">{{ $faq->answer }}</p>
                            </div>
                            <div class="flex gap-2">
                                <button onclick="document.getElementById('edit-faq-{{ $faq->id }}').classList.toggle('hidden')" class="w-8 h-8 flex items-center justify-center rounded-xl bg-lavender-light text-lavender-dark opacity-0 group-hover:opacity-100 transition-all text-xs">✎</button>
                                <form action="/admin/faq/{{ $faq->id }}" method="POST" onsubmit="return confirm('Delete this FAQ?')">
                                    @csrf @method('DELETE')
                                    <button class="w-8 h-8 flex items-center justify-center rounded-xl bg-red-50 text-red-400 opacity-0 group-hover:opacity-100 transition-all text-sm">×</button>
                                </form>
                            </div>
                        </div>

                        <div id="edit-faq-{{ $faq->id }}" class="hidden mt-8 pt-8 border-t border-black/3 animate-fade-in">
                            <form action="/admin/faq/{{ $faq->id }}" method="POST" class="space-y-4">
                                @csrf @method('PUT')
                                <input type="text" name="question" value="{{ $faq->question }}" class="neo-input text-[11px] py-4 bg-[#FBFBFF]" required>
                                <textarea name="answer" class="neo-input text-[11px] py-4 h-28 bg-[#FBFBFF] resize-none">{{ $faq->answer }}</textarea>
                                <button type="submit" class="w-full py-4 bg-lavender text-lavender-dark rounded-2xl text-[10px] font-black uppercase tracking-widest hover:bg-lavender-dark hover:text-white transition-all">Update Logic</button>
                            </form>
                        </div>
                    </div>
                    @empty
                    <div class="py-16 bg-white rounded-[40px] border border-dashed border-black/5 text-center flex flex-col items-center justify-center transition-colors">
                        <span class="text-4xl mb-4 opacity-10">❓</span>
                        <p class="text-[11px] font-bold text-black/20 uppercase tracking-widest italic transition-colors">No Support queries registered yet</p>
                    </div>
                    @endforelse
                </div>
            </section>

            <!-- SITE SETTINGS -->
            <section id="settings" class="mb-32">
                <div class="flex justify-between items-center mb-10">
                    <div>
                        <h3 class="text-2xl font-bold tracking-tight text-lavender-dark">Core Configuration</h3>
                        <p class="text-xs text-black/30 font-medium tracking-tight transition-colors">Main architecture and site-wide state</p>
                    </div>
                </div>

                <div class="bg-white p-12 rounded-[50px] border border-black/3 shadow-2xl relative overflow-hidden transition-colors">
                    <form action="/admin/settings" method="POST" class="space-y-12">
                        @csrf
                        
                        <!-- HERO SECTION -->
                        <div class="space-y-8">
                            <div class="flex items-center gap-4 mb-6">
                                <div class="w-10 h-10 rounded-2xl bg-lavender flex items-center justify-center text-lavender-dark shadow-lg shadow-lavender/20 transition-colors">✨</div>
                                <h4 class="text-xs font-black uppercase tracking-[0.3em] text-black/40 transition-colors">Hero Identity</h4>
                            </div>
                            
                            <div class="grid lg:grid-cols-2 gap-8">
                                <div class="space-y-2">
                                    <label class="text-[9px] font-black uppercase tracking-widest text-black/20 pl-4 transition-colors">Tagline / Status</label>
                                    <input type="text" name="hero_tagline" value="{{ $settings['hero_tagline'] ?? 'AVAILABLE FOR PROJECTS' }}" class="neo-input" placeholder="e.g. READY TO SHIP">
                                </div>
                                <div class="space-y-2">
                                    <label class="text-[9px] font-black uppercase tracking-widest text-black/20 pl-4 transition-colors">Visual Title</label>
                                    <input type="text" name="hero_title" value="{{ $settings['hero_title'] ?? 'Digital Architect.' }}" class="neo-input" placeholder="Hero Main Text">
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label class="text-[9px] font-black uppercase tracking-widest text-black/20 pl-4 transition-colors">Core Narrative</label>
                                <textarea name="hero_description" class="neo-input h-32 resize-none" placeholder="Explain your visual philosophy...">{{ $settings['hero_description'] ?? 'Crafting immersive 3D experiences through precision geometry and soft-lit aesthetics.' }}</textarea>
                            </div>
                        </div>

                        <hr class="border-black/5 transition-colors">

                        <!-- ABOUT SECTION -->
                        <div class="space-y-8">
                            <div class="flex items-center gap-4 mb-6">
                                <div class="w-10 h-10 rounded-2xl bg-lavender flex items-center justify-center text-lavender-dark shadow-lg shadow-lavender/20 transition-colors">👤</div>
                                <h4 class="text-xs font-black uppercase tracking-[0.3em] text-black/40 transition-colors">Professional Bio</h4>
                            </div>

                            <div class="grid lg:grid-cols-2 gap-8">
                                <div class="space-y-2">
                                    <label class="text-[9px] font-black uppercase tracking-widest text-black/20 pl-4 transition-colors">About Label</label>
                                    <input type="text" name="about_label" value="{{ $settings['about_label'] ?? 'THE STUDIO' }}" class="neo-input">
                                </div>
                                <div class="space-y-2">
                                    <label class="text-[9px] font-black uppercase tracking-widest text-black/20 pl-4 transition-colors">Secondary Heading</label>
                                    <input type="text" name="about_heading" value="{{ $settings['about_heading'] ?? 'Pure Form.' }}" class="neo-input">
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label class="text-[9px] font-black uppercase tracking-widest text-black/20 pl-4 transition-colors">Biography / Story</label>
                                <textarea name="about_description" class="neo-input h-40 resize-none">{{ $settings['about_description'] ?? 'Hariz is a technical artist specializing in pastel environments and structural visualization.' }}</textarea>
                            </div>
                        </div>

                        <hr class="border-black/5 transition-colors">

                        <!-- INFO CARDS -->
                        <div class="space-y-8">
                            <div class="flex items-center gap-4 mb-6">
                                <div class="w-10 h-10 rounded-2xl bg-lavender flex items-center justify-center text-lavender-dark shadow-lg shadow-lavender/20 transition-colors">📊</div>
                                <h4 class="text-xs font-black uppercase tracking-[0.3em] text-black/40 transition-colors">About Stats Cards</h4>
                            </div>

                            <div class="grid md:grid-cols-2 gap-8">
                                <div class="p-6 bg-lavender-light/30 rounded-[32px] border border-black/3 space-y-4 transition-colors">
                                    <p class="text-[10px] font-black uppercase tracking-widest text-black/20 transition-colors">Card 1 : Mastery</p>
                                    <input type="text" name="about_card1_label" value="{{ $settings['about_card1_label'] ?? 'Expertise' }}" class="neo-input text-xs py-3" placeholder="Card Title">
                                    <input type="text" name="about_experience_years" value="{{ $settings['about_experience_years'] ?? '5+ Years in 3D' }}" class="neo-input text-xs py-3" placeholder="Card Value">
                                </div>
                                <div class="p-6 bg-lavender-light/30 rounded-[32px] border border-black/3 space-y-4 transition-colors">
                                    <p class="text-[10px] font-black uppercase tracking-widest text-black/20 transition-colors">Card 2 : Stack</p>
                                    <input type="text" name="about_card2_label" value="{{ $settings['about_card2_label'] ?? 'Pipeline' }}" class="neo-input text-xs py-3" placeholder="Card Title">
                                    <input type="text" name="about_pipeline_tools" value="{{ $settings['about_pipeline_tools'] ?? 'Blender, Unreal, ZBrush' }}" class="neo-input text-xs py-3" placeholder="Card Value">
                                </div>
                            </div>
                        </div>

                        <!-- SUBMIT -->
                        <div class="pt-6">
                            <button type="submit" class="w-full py-6 bg-linear-to-r from-lavender-dark to-lavender text-white rounded-[30px] font-black tracking-[0.3em] text-xs shadow-xl shadow-lavender/30 hover:shadow-2xl hover:scale-[1.01] transition-all">
                                UPDATE GLOBAL ARCHITECTURE ✨
                            </button>
                        </div>
                    </form>
                </div>
            </section>

            <!-- SOCIAL MEDIA LINKS -->
            <section id="social-media" class="mb-24">
                <div class="flex justify-between items-center mb-10">
                    <div>
                        <h3 class="text-2xl font-bold tracking-tight text-lavender-dark">Social Media Links</h3>
                        <p class="text-xs text-black/30 font-medium tracking-tight transition-colors">Manage your social media presence</p>
                    </div>
                </div>

                <div class="bg-white p-10 rounded-[40px] border border-black/3 shadow-2xl transition-colors">
                    <form action="/admin/settings" method="POST" class="space-y-8">
                        @csrf

                        <div class="grid md:grid-cols-3 gap-8">
                            <!-- WhatsApp -->
                            <div class="space-y-2">
                                <div class="flex items-center gap-3 mb-2">
                                    <div class="w-8 h-8 rounded-xl bg-green-500 flex items-center justify-center text-white text-sm shadow-lg shadow-green-500/20 transition-colors">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                                    </div>
                                    <label class="text-[9px] font-black uppercase tracking-widest text-black/40 transition-colors">WhatsApp</label>
                                </div>
                                <input type="url" name="social_whatsapp" value="{{ $settings['social_whatsapp'] ?? '' }}" class="neo-input text-xs" placeholder="https://wa.me/1234567890">
                            </div>

                            <!-- Dribbble -->
                            <div class="space-y-2">
                                <div class="flex items-center gap-3 mb-2">
                                    <div class="w-8 h-8 rounded-xl bg-pink-500 flex items-center justify-center text-white text-sm shadow-lg shadow-pink-500/20 transition-colors">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 24C5.385 24 0 18.615 0 12S5.385 0 12 0s12 5.385 12 12-5.385 12-12 12zm10.12-10.358c-.35-.11-3.17-.953-6.384-.438 1.34 3.684 1.887 6.684 1.992 7.308 2.3-1.555 3.936-4.02 4.395-6.87zm-6.115 7.808c-.153-.9-.75-4.032-2.19-7.77l-.066.02c-5.79 2.015-7.86 6.025-8.04 6.4 1.73 1.358 3.92 2.166 6.29 2.166 1.42 0 2.77-.29 4-.814zm-11.62-2.58c.232-.4 3.045-5.055 8.332-6.765.135-.045.27-.084.405-.12-.26-.585-.54-1.167-.832-1.74C7.17 11.775 2.206 11.71 1.756 11.7l-.004.312c0 2.633.998 5.037 2.634 6.855zm-2.42-8.955c.46.008 4.683.026 9.477-1.248-1.698-3.018-3.53-5.558-3.8-5.928-2.868 1.35-5.01 3.99-5.676 7.17zM9.6 2.052c.282.38 2.145 2.914 3.822 6 3.645-1.365 5.19-3.44 5.373-3.702-1.81-1.61-4.19-2.586-6.795-2.586-.825 0-1.63.1-2.4.285zm10.335 3.483c-.218.29-1.935 2.493-5.724 4.04.24.49.47.985.68 1.486.08.18.15.36.22.53 3.41-.43 6.8.26 7.14.33-.02-2.42-.88-4.64-2.31-6.38z"/></svg>
                                    </div>
                                    <label class="text-[9px] font-black uppercase tracking-widest text-black/40 transition-colors">Dribbble</label>
                                </div>
                                <input type="url" name="social_dribbble" value="{{ $settings['social_dribbble'] ?? '' }}" class="neo-input text-xs" placeholder="https://dribbble.com/yourusername">
                            </div>

                            <!-- Instagram -->
                            <div class="space-y-2">
                                <div class="flex items-center gap-3 mb-2">
                                    <div class="w-8 h-8 rounded-xl bg-linear-to-br from-purple-500 via-pink-500 to-orange-500 flex items-center justify-center text-white text-sm shadow-lg shadow-purple-500/20 transition-colors">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                                    </div>
                                    <label class="text-[9px] font-black uppercase tracking-widest text-black/40 transition-colors">Instagram</label>
                                </div>
                                <input type="url" name="social_instagram" value="{{ $settings['social_instagram'] ?? '' }}" class="neo-input text-xs" placeholder="https://instagram.com/yourusername">
                            </div>
                        </div>

                        <!-- SUBMIT -->
                        <div class="pt-6">
                            <button type="submit" class="w-full py-6 bg-linear-to-r from-lavender-dark to-lavender text-white rounded-[30px] font-black tracking-[0.3em] text-xs shadow-xl shadow-lavender/30 hover:shadow-2xl hover:scale-[1.01] transition-all">
                                UPDATE SOCIAL LINKS ✨
                            </button>
                        </div>
                    </form>
                </div>
            </section>
        </main>

        <footer class="p-12 border-t border-black/3 text-center transition-colors">
            <p class="text-[10px] font-black uppercase tracking-[0.3em] text-black/20 transition-colors">Hariz Studio 3D • Management System • © {{ date('Y') }}</p>
        </footer>
    </div>

    <div class="fixed top-20 right-20 w-64 h-64 bg-lavender/10 rounded-full blur-3xl pointer-events-none -z-10 animate-pulse"></div>
    <div class="fixed bottom-20 left-64 w-96 h-96 bg-lavender-dark/10 rounded-full blur-3xl pointer-events-none -z-10 animate-float"></div>

    <script>
        // Toggle mobile sidebar overlay
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebar-overlay');
        
        const observer = new MutationObserver(() => {
            if (sidebar.classList.contains('-translate-x-full')) {
                overlay.classList.add('hidden');
                document.body.style.overflow = 'auto';
            } else {
                overlay.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }
        });
        
        observer.observe(sidebar, { attributes: true, attributeFilter: ['class'] });

        // Smooth scroll for anchors
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const target = document.querySelector(targetId);
                if (target) {
                    // Close sidebar on mobile
                    if (window.innerWidth < 768) {
                        sidebar.classList.add('-translate-x-full');
                    }
                    
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Activity logic for sidebar
        const navObserverOptions = {
            threshold: 0.2,
            rootMargin: "-10% 0px -70% 0px"
        };

        const navObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                const id = entry.target.getAttribute('id');
                const navLink = document.querySelector(`.sidebar-link[href="#${id}"]`);
                if (entry.isIntersecting) {
                    document.querySelectorAll('.sidebar-link').forEach(link => link.classList.remove('active'));
                    navLink?.classList.add('active');
                }
            });
        }, navObserverOptions);

        document.querySelectorAll('section[id]').forEach(section => navObserver.observe(section));


        // Toggle sidebar collapse/expand
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('main-content');
            const toggleIcon = document.getElementById('toggle-icon');
            
            sidebar.classList.toggle('collapsed');
            mainContent.classList.toggle('sidebar-collapsed');
            
            // Update toggle icon
            if (sidebar.classList.contains('collapsed')) {
                toggleIcon.textContent = '▶';
            } else {
                toggleIcon.textContent = '◀';
            }
        }
    </script>
</body>
</html>
