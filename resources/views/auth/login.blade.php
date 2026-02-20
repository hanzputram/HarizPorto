<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Hariz 3D</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root {
            --primary: #c9a0cc;
            --primary-dark: #b886bb;
            --primary-light: #efd9f2;
            --accent: #818cf8;
            --bg-canvas: #0a0a0c;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-canvas);
            margin: 0;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            color: white;
        }

        /* Animated Mesh Background */
        .background-blob {
            position: absolute;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(201, 160, 204, 0.15) 0%, rgba(201, 160, 204, 0) 70%);
            border-radius: 50%;
            filter: blur(80px);
            z-index: -1;
            animation: move 20s infinite alternate;
        }

        .blob-1 { top: -10%; left: -10%; animation-delay: 0s; }
        .blob-2 { bottom: -10%; right: -10%; background: radial-gradient(circle, rgba(129, 140, 248, 0.15) 0%, rgba(129, 140, 248, 0) 70%); animation-delay: -5s; }
        .blob-3 { top: 40%; left: 30%; background: radial-gradient(circle, rgba(239, 217, 242, 0.1) 0%, rgba(239, 217, 242, 0) 70%); animation-delay: -10s; }

        @keyframes move {
            0% { transform: translate(0, 0) scale(1); }
            33% { transform: translate(100px, 50px) scale(1.1); }
            66% { transform: translate(-50px, 100px) scale(0.9); }
            100% { transform: translate(0, 0) scale(1); }
        }

        .login-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 32px;
            padding: 3rem;
            width: 100%;
            max-width: 440px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            position: relative;
            z-index: 10;
        }

        .brand-logo {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .brand-logo h1 {
            font-size: 1.5rem;
            font-weight: 800;
            letter-spacing: -0.05em;
            margin-bottom: 0.5rem;
            text-transform: uppercase;
        }

        .brand-logo h1 span {
            color: var(--primary);
            text-shadow: 0 0 20px rgba(201, 160, 204, 0.3);
        }

        .brand-logo p {
            font-size: 0.7rem;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.4);
            letter-spacing: 0.2em;
            text-transform: uppercase;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            font-size: 0.65rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: rgba(255, 255, 255, 0.5);
            margin-bottom: 0.75rem;
            padding-left: 0.25rem;
        }

        .input-wrapper {
            position: relative;
        }

        .input-field {
            width: 100%;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 16px;
            padding: 1rem 1.25rem;
            color: white;
            font-size: 0.95rem;
            font-weight: 500;
            transition: all 0.3s ease;
            outline: none;
            box-sizing: border-box;
        }

        .input-field:focus {
            background: rgba(255, 255, 255, 0.08);
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(201, 160, 204, 0.1);
        }

        .input-field::placeholder {
            color: rgba(255, 255, 255, 0.2);
        }

        .error-msg {
            background: rgba(248, 113, 113, 0.1);
            border-left: 3px solid #f87171;
            padding: 0.75rem 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            font-size: 0.8rem;
            font-weight: 600;
            color: #f87171;
        }

        .submit-btn {
            width: 100%;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: black;
            border: none;
            border-radius: 16px;
            padding: 1rem;
            font-size: 0.9rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 10px 20px -5px rgba(201, 160, 204, 0.4);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px -5px rgba(201, 160, 204, 0.5);
            filter: brightness(1.1);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 2rem;
            font-size: 0.7rem;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.3);
            text-decoration: none;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            transition: all 0.3s ease;
        }

        .back-link:hover {
            color: white;
        }

        /* Subtle Noise Texture */
        .noise {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url("https://grainy-gradients.vercel.app/noise.svg");
            opacity: 0.05;
            pointer-events: none;
            z-index: 100;
        }
    </style>
</head>
<body>
    <div class="noise"></div>
    <div class="background-blob blob-1"></div>
    <div class="background-blob blob-2"></div>
    <div class="background-blob blob-3"></div>

    <div class="login-card">
        <div class="brand-logo">
            <h1>ADMIN <span>ACCESS</span></h1>
            <p>Personal branding portal</p>
        </div>

        <form action="/login" method="POST">
            @csrf
            
            @if($errors->any())
                <div class="error-msg">
                    {{ $errors->first() }}
                </div>
            @endif

            <div class="form-group">
                <label class="form-label">Email Address</label>
                <div class="input-wrapper">
                    <input type="email" name="email" class="input-field" placeholder="admin@hariz.com" required>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Secure Password</label>
                <div class="input-wrapper">
                    <input type="password" name="password" class="input-field" placeholder="••••••••" required>
                </div>
            </div>

            <button type="submit" class="submit-btn">
                Authorize ✨
            </button>
        </form>
        
        <a href="/" class="back-link">Back to public site</a>
    </div>
</body>
</html>
