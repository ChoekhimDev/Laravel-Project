<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>✨ CrudBlog | @yield('title', 'Laravel CMS')</title>

    <!-- Google Fonts Premium -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&family=Playfair+Display:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Font Awesome 6 (Free CDN) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Bootstrap 5 Icons & CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        /* ========== GLOBAL VARIABLES ========== */
        :root {
            --primary-deep: #0f2b1d;
            --primary-mid: #1e4a2f;
            --primary-soft: #2d6a4f;
            --accent-gold: #f4a261;
            --accent-amber: #e9c46a;
            --accent-sunset: #e76f51;
            --bg-light: #fef9f0;
            --bg-cream: #fff8ed;
            --text-dark: #1e2a2e;
            --text-muted: #5c6b5e;
            --shadow-sm: 0 8px 20px rgba(0,0,0,0.05);
            --shadow-md: 0 15px 35px rgba(0,0,0,0.08);
            --shadow-lg: 0 25px 50px -12px rgba(0,0,0,0.15);
            --shadow-glow: 0 0 20px rgba(244, 162, 97, 0.2);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(145deg, var(--bg-light) 0%, #f5efe3 100%);
            color: var(--text-dark);
            overflow-x: hidden;
            position: relative;
        }

        /* ========== ANIMATED BACKGROUND PARTICLES ========== */
        .bg-particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 0;
            overflow: hidden;
        }

        .particle {
            position: absolute;
            background: radial-gradient(circle, var(--accent-gold), transparent);
            border-radius: 50%;
            opacity: 0.08;
            animation: floatParticle linear infinite;
        }

        @keyframes floatParticle {
            0% {
                transform: translateY(100vh) rotate(0deg);
                opacity: 0;
            }
            10% { opacity: 0.08; }
            90% { opacity: 0.08; }
            100% {
                transform: translateY(-20vh) rotate(360deg);
                opacity: 0;
            }
        }

        /* Generate random particles with PHP/JS later, using CSS for now */

        /* ========== MAIN WRAPPER ========== */
        .creative-app {
            position: relative;
            z-index: 2;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* ========== NAVIGATION ========== */
        .nav-creative {
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(244, 162, 97, 0.2);
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: var(--shadow-sm);
        }

        .nav-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .logo {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--primary-deep), var(--accent-gold));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            text-decoration: none;
            letter-spacing: -0.02em;
            transition: all 0.3s ease;
        }

        .logo i {
            background: linear-gradient(135deg, var(--accent-gold), var(--accent-amber));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            font-size: 1.6rem;
        }

        .logo:hover {
            transform: scale(1.02);
            text-decoration: none;
        }

        .nav-stats {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .stat-badge {
            background: linear-gradient(135deg, var(--primary-soft), var(--primary-mid));
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 40px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        /* ========== MAIN CONTENT ========== */
        .main-content {
            flex: 1;
            max-width: 1400px;
            margin: 2rem auto;
            padding: 0 1.5rem;
            width: 100%;
        }

        .content-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            border-radius: 48px;
            padding: 2rem;
            box-shadow: var(--shadow-md);
            border: 1px solid rgba(244, 162, 97, 0.15);
            transition: all 0.3s ease;
        }

        /* ========== ALERT STYLES ========== */
        .alert-creative {
            border: none;
            border-radius: 60px;
            padding: 1rem 1.5rem;
            margin-bottom: 2rem;
            background: linear-gradient(135deg, #e8f5e9, #c8e6c9);
            color: #2e7d32;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            box-shadow: var(--shadow-sm);
            animation: slideInRight 0.5s ease;
        }

        @keyframes slideInRight {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        /* ========== FOOTER ========== */
        .footer-creative {
            text-align: center;
            padding: 2rem;
            margin-top: 3rem;
            border-top: 1px solid rgba(244, 162, 97, 0.15);
            color: var(--text-muted);
            font-size: 0.85rem;
        }

        /* ========== RESPONSIVE ========== */
        @media (max-width: 768px) {
            .nav-container {
                flex-direction: column;
                text-align: center;
            }
            .content-card {
                padding: 1.25rem;
                border-radius: 32px;
            }
            .logo {
                font-size: 1.4rem;
            }
            .main-content {
                padding: 0 1rem;
                margin: 1rem auto;
            }
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb {
            background: var(--accent-gold);
            border-radius: 10px;
        }
    </style>
</head>
<body>

<div class="bg-particles" id="particles"></div>

<div class="creative-app">
    <nav class="nav-creative">
        <div class="nav-container">
            <a href="{{ route('posts.index') }}" class="logo">
                <i class="fas fa-feather-alt"></i> Crud<span style="color: var(--accent-gold);">Blog</span>
            </a>
            <div class="nav-stats">
                <div class="stat-badge">
                    <i class="fas fa-palette"></i> Express Yourself
                </div>
            </div>
        </div>
    </nav>

    <main class="main-content">
        <div class="content-card" data-aos="fade-up">
            @if(session('success'))
                <div class="alert-creative">
                    <i class="fas fa-sparkles fa-fw"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger rounded-pill mb-4">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    Please fix the errors below.
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    <footer class="footer-creative">
        <p><i class="fas fa-heart" style="color: var(--accent-sunset);"></i> Crafted with creativity • {{ date('Y') }} CreativeBlog</p>
    </footer>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    // Initialize AOS
    AOS.init({
        duration: 800,
        once: true,
        offset: 50,
        easing: 'ease-out-quad'
    });

    // Generate floating particles
    function createParticles() {
        const container = document.getElementById('particles');
        for (let i = 0; i < 50; i++) {
            const particle = document.createElement('div');
            particle.classList.add('particle');
            const size = Math.random() * 60 + 10;
            particle.style.width = size + 'px';
            particle.style.height = size + 'px';
            particle.style.left = Math.random() * 100 + '%';
            particle.style.animationDuration = Math.random() * 20 + 10 + 's';
            particle.style.animationDelay = Math.random() * 10 + 's';
            particle.style.background = `radial-gradient(circle, rgba(244,162,97,0.15), rgba(233,196,106,0.05))`;
            container.appendChild(particle);
        }
    }
    createParticles();

    // Auto-hide alerts after 5 seconds
    setTimeout(() => {
        document.querySelectorAll('.alert-creative').forEach(alert => {
            alert.style.opacity = '0';
            alert.style.transition = 'opacity 0.5s';
            setTimeout(() => alert.remove(), 500);
        });
    }, 5000);
</script>
@stack('scripts')
</body>
</html>
