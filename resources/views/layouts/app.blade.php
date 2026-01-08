<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Tata Bhuana - Sewa & Jual Scaffolding')</title>
    <meta name="description" content="@yield('description', 'Perusahaan penyedia jasa sewa dan jual scaffolding berkualitas tinggi untuk proyek konstruksi Anda.')">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <style>
    /* Navbar Animations */
    .navbar {
        transition: all 0.3s ease;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    
    .navbar-brand {
        animation: fadeInLeft 0.8s ease-out;
        transition: all 0.3s ease;
        position: relative;
        padding: 0.5rem 1rem;
        border-radius: 8px;
        margin-right: 1rem;
        }
    
    .navbar-brand::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(90deg, rgba(22, 163, 74, 0.6) 0%, rgba(22, 163, 74, 0.5) 30%, rgba(22, 163, 74, 0.3) 60%, transparent 100%);
        border-radius: 8px;
        z-index: -1;
        transition: all 0.3s ease;
    }
    
    .navbar-brand:hover::before {
        background: linear-gradient(90deg, rgba(22, 163, 74, 0.7) 0%, rgba(22, 163, 74, 0.6) 30%, rgba(22, 163, 74, 0.4) 60%, transparent 100%);
    }
    
    .navbar-brand:hover {
        transform: scale(1.05);
    }
    
    .navbar-brand img {
        position: relative;
        z-index: 1;
    }
    <style>
    /* Global alignment untuk floating buttons di mobile */
    @media (max-width: 768px) {
        /* Pastikan semua floating buttons sejajar vertikal dengan left yang sama */
        .floating-whatsapp-transparent,
        .floating-facebook-transparent,
        .floating-instagram-transparent {
            left: max(15px, env(safe-area-inset-left, 15px)) !important;
        }
        
        /* Pastikan jarak konsisten antar button */
        .floating-whatsapp-transparent {
            bottom: max(20px, env(safe-area-inset-bottom, 20px)) !important;
        }
        
        .floating-facebook-transparent {
            bottom: max(95px, env(safe-area-inset-bottom, 95px)) !important;
        }
        
        .floating-instagram-transparent {
            bottom: max(170px, env(safe-area-inset-bottom, 170px)) !important;
        }
    }
    
    @media (max-width: 480px) {
        /* Pastikan semua floating buttons sejajar vertikal dengan left yang sama */
        .floating-whatsapp-transparent,
        .floating-facebook-transparent,
        .floating-instagram-transparent {
            left: max(15px, env(safe-area-inset-left, 15px)) !important;
        }
        
        /* Pastikan jarak konsisten antar button untuk layar kecil */
        .floating-whatsapp-transparent {
            bottom: max(15px, env(safe-area-inset-bottom, 15px)) !important;
        }
        
        .floating-facebook-transparent {
            bottom: max(85px, env(safe-area-inset-bottom, 85px)) !important;
        }
        
        .floating-instagram-transparent {
            bottom: max(155px, env(safe-area-inset-bottom, 155px)) !important;
        }
    }
    
    .nav-link {
        position: relative;
        transition: all 0.3s ease;
        padding: 0.5rem 1rem !important;
        margin: 0 0.25rem;
        border-radius: 8px;
    }
    
    .nav-link::before {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        width: 0;
        height: 2px;
        background: #16a34a;
        transition: all 0.3s ease;
        transform: translateX(-50%);
    }
    
    .nav-link:hover::before {
        width: 80%;
    }
    
    .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.1);
        transform: translateY(-2px);
    }
    
    .nav-link.active {
        background-color: rgba(255, 255, 255, 0.2) !important;
        color: #ffd700 !important;
        font-weight: bold;
    }
    
    /* Stagger animation for nav items */
    .navbar-nav .nav-item:nth-child(1) { animation: fadeInDown 0.8s ease-out 0.1s both; }
    .navbar-nav .nav-item:nth-child(2) { animation: fadeInDown 0.8s ease-out 0.2s both; }
    .navbar-nav .nav-item:nth-child(3) { animation: fadeInDown 0.8s ease-out 0.3s both; }
    .navbar-nav .nav-item:nth-child(4) { animation: fadeInDown 0.8s ease-out 0.4s both; }
    .navbar-nav .nav-item:nth-child(5) { animation: fadeInDown 0.8s ease-out 0.5s both; }
    .navbar-nav .nav-item:nth-child(6) { animation: fadeInDown 0.8s ease-out 0.6s both; }
    .navbar-nav .nav-item:nth-child(7) { animation: fadeInDown 0.8s ease-out 0.7s both; }
    .navbar-nav .nav-item:nth-child(8) { animation: fadeInDown 0.8s ease-out 0.8s both; }
    
    @keyframes fadeInLeft {
        from {
            opacity: 0;
            transform: translateX(-30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    
    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    /* Footer animations */
    footer {
        animation: fadeInUp 1s ease-out;
    }
    
    footer .list-unstyled li {
        transition: all 0.3s ease;
        padding: 0.25rem 0;
    }
    
    footer .list-unstyled li:hover {
        transform: translateX(5px);
        color: #28a745 !important;
    }
    
    footer .text-white:hover {
        transition: all 0.3s ease;
    }
    
    /* Smooth page transitions */
    main {
        animation: fadeIn 0.5s ease-out;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    /* Hamburger menu animation */
    .navbar-toggler {
        transition: all 0.3s ease;
    }
    
    .navbar-toggler:hover {
        transform: rotate(90deg);
    }
    
    /* Social media icons animation */
    footer a i {
        transition: all 0.3s ease;
        display: inline-block;
    }
    
    footer a:hover i {
        transform: scale(1.3) rotate(5deg);
        color: #28a745 !important;
    }
    </style>
    
    <style>
    /* Fix untuk scroll to top button di mobile - pastikan bisa diklik */
    @media (max-width: 768px) {
        .scroll-to-top-btn.show {
            z-index: 10000 !important;
            pointer-events: auto !important;
            touch-action: manipulation !important;
            -webkit-tap-highlight-color: rgba(220, 38, 38, 0.3) !important;
        }
        
        .scroll-to-top-btn {
            z-index: 10000 !important;
            pointer-events: auto !important;
            touch-action: manipulation !important;
        }
    }
    
    @media (max-width: 480px) {
        .scroll-to-top-btn {
            min-width: 50px !important;
            min-height: 50px !important;
            width: 50px !important;
            height: 50px !important;
        }
    }
    </style>
    
    @stack('styles')
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-gradient-primary fixed-top">
        <div class="container">
             <a class="navbar-brand fw-bold d-flex align-items-center" href="{{ route('home') }}">
                @if(file_exists(public_path('images/logo.png')))
                   <img src="{{ asset('images/logo.png') }}" alt="Logo {{ $profile->company_name ?? 'Tata Bhuana' }}" class="me-2" style="height: 40px; width: auto;">
                @else
                    <i class="fas fa-building me-2"></i>
                @endif
                @if($profile ?? false)
                    {{ $profile->company_name }}
                @else
                    Tata Bhuana
                @endif
                
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('services') ? 'active' : '' }}" href="{{ route('services') }}">Layanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('scaffoldings.index') ? 'active' : '' }}" href="{{ route('scaffoldings.index') }}">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('projects.index') ? 'active' : '' }}" href="{{ route('projects.index') }}">Galeri Proyek</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('branches.index') ? 'active' : '' }}" href="{{ route('branches.index') }}">Cabang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('articles.index') ? 'active' : '' }}" href="{{ route('articles.index') }}">Artikel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Kontak</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main style="margin-top: 76px;">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-light py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h5 class="fw-bold mb-3 d-flex align-items-center">
                        @if(file_exists(public_path('images/logo.png')))
                            <img src="{{ asset('images/logo.png') }}" alt="Logo {{ $profile->company_name ?? 'Tata Bhuana' }}" class="me-2" style="height: 30px; width: auto;">
                        @else
                            <i class="fas fa-building me-2"></i>
                        @endif
                        @if($profile ?? false)
                            {{ $profile->company_name }}
                        @else
                            Tata Bhuana
                        @endif
                    </h5>
                    <p class="text-white">
                        @if($profile ?? false)
                            {{ $profile->description }}
                        @else
                            Perusahaan penyedia jasa sewa dan jual scaffolding berkualitas tinggi untuk proyek konstruksi Anda.
                        @endif
                    </p>
                </div>
                
                <div class="col-lg-4 mb-4">
                    <h6 class="fw-bold mb-3">Layanan Kami</h6>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('services') }}" class="text-white text-decoration-none">Sewa Scaffolding</a></li>
                        <li><a href="{{ route('services') }}" class="text-white text-decoration-none">Jual Scaffolding</a></li>
                        <li><a href="{{ route('scaffoldings.index') }}" class="text-white text-decoration-none">Katalog Produk</a></li>
                        <li><a href="{{ route('projects.index') }}" class="text-white text-decoration-none">Galeri Proyek</a></li>
                        <li><a href="{{ route('articles.index') }}" class="text-white text-decoration-none">Artikel</a></li>
                        <li><a href="{{ route('branches.index') }}" class="text-white text-decoration-none">Cabang Kami</a></li>
                        <li><a href="{{ route('contact') }}" class="text-white text-decoration-none">Konsultasi</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-4 mb-4">
                    <h6 class="fw-bold mb-3">Kontak Kami</h6>
                    @if($profile ?? false)
                        <p class="text-white mb-2">
                            <i class="fas fa-map-marker-alt me-2"></i>
                            {{ $profile->address }}
                        </p>
                        <p class="text-white mb-2">
                            <i class="fas fa-phone me-2"></i>
                            {{ $profile->phone }}
                        </p>
                        <p class="text-white mb-2">
                            <i class="fas fa-envelope me-2"></i>
                            {{ $profile->email }}
                        </p>
                    @endif
                    
                    <div class="mt-3">
                        @if($profile ?? false && $profile->social_media)
                            @if($profile->social_media['facebook'])
                                <a href="{{ $profile->social_media['facebook'] }}" class="text-white me-3" target="_blank">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            @endif
                            @if($profile->social_media['instagram'])
                                <a href="{{ $profile->social_media['instagram'] }}" class="text-white me-3" target="_blank">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            @endif
                            @if($profile->social_media['whatsapp'])
                                <a href="https://wa.me/{{ $profile->social_media['whatsapp'] }}" class="text-white" target="_blank">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
            
            <hr class="my-4">
            <div class="text-center text-white">
                <p>&copy; {{ date('Y') }} 
                    @if($profile ?? false)
                        {{ $profile->company_name }}
                    @else
                        Tata Bhuana
                    @endif
                    . Semua hak dilindungi.
                </p>
            </div>
        </div>
    </footer>

    <!-- Transparent Floating WhatsApp Button -->
    @include('components.floating-whatsapp', ['branches' => \App\Models\Branch::where('is_active', true)->orderBy('sort_order')->get()])

    <!-- Transparent Floating Instagram Button -->
    @include('components.floating-instagram', ['profile' => $profile ?? null])

    <!-- Transparent Floating Facebook Button -->
    @include('components.floating-facebook', ['profile' => $profile ?? null])
    

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Scroll Animation Script -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Intersection Observer untuk scroll animation
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    // Unobserve setelah visible untuk performance
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);
        
        // Observe semua elemen dengan class fade-on-scroll
        const scrollElements = document.querySelectorAll('.fade-on-scroll, .fade-on-scroll-2, .fade-on-scroll-3, .fade-on-scroll-4');
        scrollElements.forEach(element => {
            observer.observe(element);
        });
    });
    </script>
    
    <!-- Global Script untuk Scroll to Top Button di Mobile -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Fix untuk scroll to top button di mobile
        const scrollToTopBtn = document.getElementById('scrollToTopBtn');
        
        if (scrollToTopBtn) {
            // Pastikan button bisa diklik di mobile dengan touch event
            scrollToTopBtn.addEventListener('touchstart', function(e) {
                e.stopPropagation();
                this.style.opacity = '0.8';
                this.style.transform = 'scale(0.95)';
            }, { passive: true });
            
            scrollToTopBtn.addEventListener('touchend', function(e) {
                e.preventDefault();
                e.stopPropagation();
                this.style.opacity = '1';
                this.style.transform = 'scale(1)';
                
                // Scroll to top
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            }, { passive: false });
            
            // Pastikan button tidak di-block oleh elemen lain
            scrollToTopBtn.style.zIndex = '10000';
            scrollToTopBtn.style.pointerEvents = 'auto';
            scrollToTopBtn.style.touchAction = 'manipulation';
        }
    });
    </script>
    
    @stack('scripts')
</body>
</html>
