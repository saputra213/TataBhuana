<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Tata Bhuana - Sewa & Jual Scaffolding')</title>
    <meta name="description" content="@yield('description', 'Perusahaan penyedia jasa sewa dan jual scaffolding berkualitas tinggi untuk proyek konstruksi Anda.')">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/layouts/app.css'])
    
    @vite('resources/js/layouts/app.js')
    
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
    @stack('scripts')
    
</body>
</html>
