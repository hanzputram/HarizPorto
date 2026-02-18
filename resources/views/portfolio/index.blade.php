<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Works | Hariz 3D</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-lavender-light min-h-screen font-sans">
    
    <header class="bg-white/80 backdrop-blur-md border-b border-black/5 sticky top-0 z-50">
        <nav class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <a href="/" class="font-bold text-xl tracking-tighter hover:opacity-70 transition-opacity">← HARIZ.</a>
            <span class="text-[10px] font-black uppercase tracking-widest opacity-30">Full Collection</span>
        </nav>
    </header>

    <main class="max-w-7xl mx-auto px-6 py-20">
        <div class="mb-20 text-center">
            <h1 class="text-5xl font-extrabold tracking-tighter uppercase mb-4">Complete <span class="text-lavender-dark">Artifacts</span></h1>
            <p class="text-black/40 font-medium">A timeline of three-dimensional progression and research.</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-12 text-left">
            @foreach($portfolios as $work)
            <div class="group">
                <a href="{{ $work->project_url ?? $work->image_url ?? '#' }}" target="_blank" class="block neo-card aspect-square bg-white flex items-center justify-center overflow-hidden mb-6 relative">
                    @if($work->image_url)
                        <img src="{{ $work->image_url }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    @else
                        <div class="text-6xl opacity-20">🧊</div>
                    @endif
                    <div class="absolute inset-0 bg-lavender-dark/90 opacity-0 group-hover:opacity-100 transition-all duration-300 flex flex-col items-center justify-center text-white p-8 text-center backdrop-blur-sm">
                        <span class="text-[10px] font-black uppercase tracking-[0.2em] mb-3 opacity-70">{{ $work->category }}</span>
                        <h4 class="text-xl font-extrabold mb-3 tracking-tighter">{{ $work->title }}</h4>
                        <p class="font-medium text-xs leading-relaxed">{{ $work->description }}</p>
                    </div>
                </a>
                <div class="flex justify-between items-center px-2">
                    <h4 class="font-bold tracking-tight text-black/80">{{ $work->title }}</h4>
                    <span class="text-[10px] font-black uppercase tracking-widest text-lavender-dark opacity-50">{{ $work->category }}</span>
                </div>
            </div>
            @endforeach
        </div>
    </main>

    <footer class="py-20 px-6 border-t border-black/5 text-center">
        <a href="/" class="text-sm font-bold uppercase tracking-widest hover:text-lavender-dark transition-colors">Return to Home</a>
    </footer>

</body>
</html>
