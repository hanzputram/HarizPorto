<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Hariz 3D</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="bg-lavender-light text-black min-h-screen flex items-center justify-center p-6 transition-colors duration-300">
    <div class="neo-card p-10 bg-white w-full max-w-md border border-black/5" data-aos="zoom-in">
        <div class="text-center mb-10">
            <h1 class="text-2xl font-extrabold tracking-tighter text-black transition-colors">ADMIN <span class="text-lavender-dark">ACCESS</span></h1>
            <p class="text-black/30 text-xs font-bold uppercase tracking-widest mt-2 transition-colors">Personal branding portal</p>
        </div>

        <form action="/login" method="POST" class="space-y-6">
            @csrf
            <div>
                <label class="block text-[10px] font-black uppercase tracking-widest mb-2 opacity-50 text-black">Email Address</label>
                <input type="email" name="email" class="neo-input" placeholder="admin@hariz.com" required>
            </div>
            <div>
                <label class="block text-[10px] font-black uppercase tracking-widest mb-2 opacity-50 text-black">Secure Password</label>
                <input type="password" name="password" class="neo-input" placeholder="••••••••" required>
            </div>
            
            @if($errors->any())
                <p class="text-red-400 text-xs font-bold">{{ $errors->first() }}</p>
            @endif

            <button type="submit" class="neo-btn w-full text-white!">Authorize ✨</button>
        </form>
        
        <div class="mt-8 text-center">
            <a href="/" class="text-[10px] font-bold text-black/20 hover:text-black transition-colors uppercase tracking-widest">Back to public site</a>
        </div>
    </div>
</body>
</html>
