<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Tata Bhuana - Sewa & Jual Scaffolding')</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
    <meta name="description" content="@yield('description', 'Perusahaan penyedia jasa sewa dan jual scaffolding berkualitas tinggi untuk proyek konstruksi Anda.')">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="og:title" content="@yield('title', 'Tata Bhuana - Sewa & Jual Scaffolding')">
    <meta property="og:description" content="@yield('description', 'Perusahaan penyedia jasa sewa dan jual scaffolding berkualitas tinggi untuk proyek konstruksi Anda.')">
    @if(file_exists(public_path('images/logo.png')))
    <meta property="og:image" content="{{ asset('images/logo.png') }}">
    @endif
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    
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
                    <img src="{{ asset('images/logo.png') }}" alt="Logo {{ $profile->company_name ?? 'Tata Bhuana' }}" class="me-2" style="height: 40px; width: auto;" loading="eager" fetchpriority="high" decoding="async">

                @else
                    <i class="fas fa-building me-2"></i>
                @endif
                @if($profile ?? false)
                    <span class="brand-name">{{ $profile->company_name }}</span>
                @else
                    <span class="brand-name">Tata Bhuana</span>
                @endif

            </a>
            
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileNav" aria-controls="mobileNav" aria-label="Toggle navigation">
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

    <div class="offcanvas offcanvas-end text-bg-danger" tabindex="-1" id="mobileNav" aria-labelledby="mobileNavLabel" data-bs-backdrop="false">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="mobileNavLabel">
                @if($profile ?? false)
                    {{ $profile->company_name }}
                @else
                    Tata Bhuana
                @endif
            </h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">Tentang Kami</a>
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

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-light py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h5 class="fw-bold mb-3 d-flex align-items-center">
                        @if(file_exists(public_path('images/logo.png')))
                            <img src="{{ asset('images/logo.png') }}" alt="Logo {{ $profile->company_name ?? 'Tata Bhuana' }}" class="me-2" style="height: 30px; width: auto;" loading="lazy" decoding="async">
                        @else
                            <i class="fas fa-building me-2"></i>
                        @endif
                        @php
                            $footerCompanyName = $profile->footer_company_name ?? null;
                        @endphp
                        @if($footerCompanyName)
                            {{ $footerCompanyName }}
                        @elseif($profile ?? false)
                            {{ $profile->company_name }}
                        @else
                            Tata Bhuana
                        @endif
                    </h5>
                    <p class="text-white">
                        @php
                            $footerCompanyDescription = $profile->footer_company_description ?? null;
                        @endphp
                        @if($footerCompanyDescription)
                            {{ $footerCompanyDescription }}
                        @elseif($profile ?? false)
                            {{ $profile->description }}
                        @else
                            Perusahaan penyedia jasa sewa dan jual scaffolding berkualitas tinggi untuk proyek konstruksi Anda.
                        @endif
                    </p>
                </div>
                
                <div class="col-lg-4 mb-4">
                    <h6 class="fw-bold mb-3">
                        {{ $profile?->footer_services_title ?? 'Layanan Kami' }}
                    </h6>
                    <ul class="list-unstyled">
                        @if($profile && is_array($profile->footer_services_items) && count($profile->footer_services_items) > 0)
                            @foreach($profile->footer_services_items as $item)
                                @php
                                    $label = $item['label'] ?? null;
                                    $url = $item['url'] ?? '#';
                                @endphp
                                @if($label)
                                    <li>
                                        <a href="{{ $url }}" class="text-white text-decoration-none">{{ $label }}</a>
                                    </li>
                                @endif
                            @endforeach
                        @else
                            <li><a href="{{ route('scaffoldings.index') }}" class="text-white text-decoration-none">Sewa Scaffolding</a></li>
                            <li><a href="{{ route('scaffoldings.index') }}" class="text-white text-decoration-none">Jual Scaffolding</a></li>
                            <li><a href="{{ route('scaffoldings.index') }}" class="text-white text-decoration-none">Katalog Produk</a></li>
                            <li><a href="{{ route('projects.index') }}" class="text-white text-decoration-none">Galeri Proyek</a></li>
                            <li><a href="{{ route('branches.index') }}" class="text-white text-decoration-none">Cabang Kami</a></li>
                            <li><a href="{{ route('contact') }}" class="text-white text-decoration-none">Konsultasi</a></li>
                        @endif
                    </ul>
                </div>
                
                <div class="col-lg-4 mb-4">
                    @php
                        $footerContactTitle = $profile->footer_contact_title ?? null;
                        $footerContactAddress = $profile->footer_contact_address ?? null;
                        $footerContactPhone = $profile->footer_contact_phone ?? null;
                        $footerContactEmail = $profile->footer_contact_email ?? null;
                    @endphp
                    <h6 class="fw-bold mb-3">{{ $footerContactTitle ?: 'Kontak Kami' }}</h6>
                    <p class="text-white mb-2">
                        <i class="fas fa-phone me-2"></i> 0813-2500-8867 (Yogyakarta)
                    </p>
                    <p class="text-white mb-2">
                        <i class="fas fa-phone me-2"></i> 0813-9283-2658 (Magelang)
                    </p>
                    <p class="text-white mb-2">
                        <i class="fas fa-phone me-2"></i> 0821-5645-7224 (Purwokerto)
                    </p>
                    <p class="text-white mb-2">
                        <i class="fas fa-envelope me-2"></i> tatabhuana@gmail.com
                    </p>
                    
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
                <p>
                    &copy; {{ date('Y') }}
                    @if($profile ?? false)
                        {{ ' ' . $profile->company_name }}
                    @else
                        Tata Bhuana
                    @endif
                    @if($profile && $profile->footer_copyright_text)
                        {{ ' ' . $profile->footer_copyright_text }}
                    @else
                        . Semua hak dilindungi.
                    @endif
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
