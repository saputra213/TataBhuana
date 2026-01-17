@extends('layouts.app')

@push('styles')
    @vite('resources/css/home.css')
@endpush

@section('title', 'Beranda - Tata Bhuana Scaffolding')
@section('description', 'Perusahaan penyedia jasa sewa dan jual scaffolding berkualitas tinggi untuk proyek konstruksi Anda.')

@section('content')
@php
    $heroTitle = $profile?->hero_title ?? 'Mitra Konstruksi Andal';
    $heroDescription = $profile?->hero_description ?? ($profile?->description ?? 'Scaffolding berkualitas untuk proyek Anda, aman dan efisien.');
    $slides = [];
    if (is_array($profile?->hero_slides) && count($profile->hero_slides) > 0) {
        $slides = $profile->hero_slides;
    } else {
        $heroImages = [];
        if (!empty($profile?->hero_images) && is_array($profile->hero_images)) {
            $heroImages = $profile->hero_images;
        } elseif (!empty($profile?->hero_image)) {
            $heroImages = [$profile->hero_image];
        }
        foreach ($heroImages as $img) {
            $slides[] = [
                'image' => $img,
                'title' => $heroTitle,
                'description' => $heroDescription,
            ];
        }
    }

    $homeHighlightKicker = $profile?->home_highlight_kicker ?? 'Keunggulan Utama';
    $homeHighlightTitle = $profile?->home_highlight_title ?? 'Solusi Scaffolding Terjangkau, Berkualitas, dan Bergaransi';
    $homeHighlight1Label = $profile?->home_highlight_1_label ?? 'Terjangkau';
    $homeHighlight1Title = $profile?->home_highlight_1_title ?? 'Harga Kompetitif Sesuai Kebutuhan Proyek';
    $homeHighlight1Text = $profile?->home_highlight_1_text ?? 'Menawarkan paket sewa dan jual scaffolding yang fleksibel dengan penawaran yang disesuaikan skala proyek tanpa mengorbankan kualitas.';
    $homeHighlight2Label = $profile?->home_highlight_2_label ?? 'Berkualitas';
    $homeHighlight2Title = $profile?->home_highlight_2_title ?? 'Standar Mutu Untuk Keamanan Pekerja';
    $homeHighlight2Text = $profile?->home_highlight_2_text ?? 'Produk terpelihara dengan baik dan melalui pengecekan berkala sehingga siap pakai dan mendukung standar keselamatan kerja di lapangan.';
    $homeHighlight3Label = $profile?->home_highlight_3_label ?? 'Bergaransi';
    $homeHighlight3Title = $profile?->home_highlight_3_title ?? 'Dukungan Purna Jual dan Layanan Responsif';
    $homeHighlight3Text = $profile?->home_highlight_3_text ?? 'Didukung tim yang siap membantu saat dibutuhkan, mulai dari konsultasi teknis hingga penanganan keluhan selama masa penggunaan.';

    $homeServicesHeadingTitle = $profile?->home_services_heading_title ?? 'Layanan Kami';
    $homeServicesHeadingSubtitle = $profile?->home_services_heading_subtitle ?? 'Pilihan layanan utama untuk mendukung proyek konstruksi Anda';
    $homeService1Title = $profile?->home_services_1_title ?? 'Penjualan';
    $homeService2Title = $profile?->home_services_2_title ?? 'Persewaan';
    $homeService3Title = $profile?->home_services_3_title ?? 'Pengiriman';
    $homeService4Title = $profile?->home_services_4_title ?? 'Konsultasi';

    $homeFeaturesHeadingTitle = $profile?->home_features_heading_title ?? 'Mengapa Memilih Kami?';
    $homeFeaturesHeadingSubtitle = $profile?->home_features_heading_subtitle ?? 'Kualitas Selalu Terjaga, Layanan Terpercaya';
    $homeFeature1Title = $profile?->home_features_1_title ?? 'Keamanan Terjamin';
    $homeFeature2Title = $profile?->home_features_2_title ?? 'Pengiriman Cepat';
    $homeFeature3Title = $profile?->home_features_3_title ?? 'Stok Produk Lengkap';
    $homeFeature4Title = $profile?->home_features_4_title ?? 'Cepat & Responsif';
    $homeFeature5Title = $profile?->home_features_5_title ?? 'Produk Berkualitas';
    $homeFeature6Title = $profile?->home_features_6_title ?? 'Dukungan Teknis';

    $homeArticlesHeadingTitle = $profile?->home_articles_heading_title ?? 'Artikel Terbaru';
    $homeArticlesHeadingSubtitle = $profile?->home_articles_heading_subtitle ?? 'Update informasi dan insight seputar dunia konstruksi';

    $homeProjectsHeadingTitle = $profile?->home_projects_heading_title ?? 'Proyek Unggulan';

    $homeCtaTitle = $profile?->home_cta_title ?? 'Siap Memulai Proyek Anda?';
    $homeCtaSubtitle = $profile?->home_cta_subtitle ?? 'Hubungi kami sekarang untuk konsultasi gratis dan penawaran terbaik';
    $homeCtaButtonText = $profile?->home_cta_button_text ?? 'Hubungi Kami Sekarang';
@endphp
@if(count($slides) > 0)
<section class="hero-triple-slider position-relative overflow-hidden">
    <div id="heroTripleCarousel" class="carousel slide h-100" data-bs-ride="carousel" data-bs-interval="9000">
        <div class="carousel-inner h-100">
            @foreach($slides as $idx => $slide)
                @php
                    $path = $slide['image'] ?? null;
                    if (!$path) continue;
                    $src = asset('storage/' . $path);
                    $title = $slide['title'] ?? $heroTitle;
                    $desc = $slide['description'] ?? $heroDescription;
                    $btnText = $slide['button_text'] ?? 'Hubungi Kami';
                    $btnRoute = $slide['button_route'] ?? 'contact';
                    $btnUrl = '#';
                    if ($btnRoute === 'none') {
                        $btnUrl = '#';
                    } elseif ($btnRoute === 'custom') {
                        $btnUrl = $slide['button_url'] ?? '#';
                    } else {
                        try {
                            switch ($btnRoute) {
                                case 'contact':
                                    $btnUrl = route('contact');
                                    break;
                                case 'services':
                                    $btnUrl = route('services');
                                    break;
                                case 'scaffoldings':
                                    $btnUrl = route('scaffoldings.index');
                                    break;
                                case 'projects':
                                    $btnUrl = route('projects.index');
                                    break;
                                case 'articles':
                                    $btnUrl = route('articles.index');
                                    break;
                                case 'about':
                                    $btnUrl = route('about');
                                    break;
                                case 'branches':
                                    $btnUrl = route('branches.index');
                                    break;
                                default:
                                    $btnUrl = route('contact');
                                    break;
                            }
                        } catch (\Throwable $e) {
                            $btnUrl = '#';
                        }
                    }
                @endphp
                <div class="carousel-item h-100 {{ $idx === 0 ? 'active' : '' }}">
                    <div class="triple-slide-container">
                        <div class="slide-panel slide-panel-center">
                            <div class="center-image-container">
                                <img src="{{ $src }}" data-src="{{ $src }}" alt="Hero {{ $idx + 1 }}" class="center-main-image">
                                <div class="center-overlay"></div>
                            </div>
                            <div class="center-content">
                                <h1 class="hero-main-title text-white mb-3">
                                    {{ $title }}
                                </h1>
                                <p class="hero-subtitle-text text-white-50 mb-4">
                                    {{ \Illuminate\Support\Str::limit($desc, 180) }}
                                </p>
                                @if($btnRoute !== 'none')
                                    <a href="{{ $btnUrl }}" class="btn hero-contact-btn">
                                        <i class="fas fa-phone me-2"></i>{{ $btnText }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-triple carousel-control-prev" type="button" data-bs-target="#heroTripleCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon-custom">
                <i class="fas fa-chevron-left"></i>
            </span>
        </button>
        <button class="carousel-control-triple carousel-control-next" type="button" data-bs-target="#heroTripleCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon-custom">
                <i class="fas fa-chevron-right"></i>
            </span>
        </button>
    </div>
</section>
@else
<section class="hero-slideshow position-relative overflow-hidden">
    <div class="hero-slides-container">
        <div class="hero-bg-fallback"></div>
        <div class="hero-overlay"></div>
    </div>
    <div class="container position-relative" style="z-index: 2;">
        <div class="row">
            <div class="col-12 text-center py-5 my-4">
                <h1 class="display-3 fw-bold text-white mb-3">
                    {{ $heroTitle }}
                </h1>
                <p class="lead text-white-50 mb-4">
                    {{ $heroDescription }}
                </p>
                <a href="{{ route('contact') }}" class="btn btn-light btn-lg">
                    <i class="fas fa-phone-alt me-2"></i>Hubungi Kami
                </a>
            </div>
        </div>
    </div>
</section>
@endif

<section class="py-5 home-highlight-section">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12 text-center">
                <p class="text-uppercase text-muted fw-semibold small mb-1">{{ $homeHighlightKicker }}</p>
                <h2 class="fw-bold mb-0">{{ $homeHighlightTitle }}</h2>
            </div>
        </div>
        <div class="home-highlight-grid">
            <div class="home-highlight-card">
                <div class="home-highlight-label">{{ $homeHighlight1Label }}</div>
                <div class="home-highlight-icon">
                    <i class="fas fa-tags"></i>
                </div>
                <h3 class="home-highlight-title">{{ $homeHighlight1Title }}</h3>
                <p class="home-highlight-text">
                    {{ $homeHighlight1Text }}
                </p>
                <div class="home-highlight-index">01</div>
            </div>
            <div class="home-highlight-card home-highlight-card-primary">
                <div class="home-highlight-label">{{ $homeHighlight2Label }}</div>
                <div class="home-highlight-icon">
                    <i class="fas fa-medal"></i>
                </div>
                <h3 class="home-highlight-title">{{ $homeHighlight2Title }}</h3>
                <p class="home-highlight-text">
                    {{ $homeHighlight2Text }}
                </p>
                <div class="home-highlight-index">02</div>
            </div>
            <div class="home-highlight-card">
                <div class="home-highlight-label">{{ $homeHighlight3Label }}</div>
                <div class="home-highlight-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="home-highlight-title">{{ $homeHighlight3Title }}</h3>
                <p class="home-highlight-text">
                    {{ $homeHighlight3Text }}
                </p>
                <div class="home-highlight-index">03</div>
            </div>
        </div>
    </div>
</section>

<!-- Company Profile Section -->
<section class="py-5">
    <div class="container">
        <div class="company-profile-wrapper">
            <div class="row align-items-center g-4">
                <div class="col-lg-5">
                    <div class="company-profile-image-wrapper">
                        @if($profile && $profile->logo)
                            <img src="{{ asset('storage/' . $profile->logo) }}" alt="{{ $profile->company_name ?? 'Profil Perusahaan' }}" class="company-profile-image" loading="lazy" decoding="async">
                        @else
                            <img src="{{ asset('storage/projects/VnqaffFD7MT1xzG0x4FPlmjPsr3s4iXAWUrxlnO3.jpg') }}" alt="Proyek Kami" class="company-profile-image" loading="lazy" decoding="async">
                        @endif
                    </div>
                </div>
                <div class="col-lg-7">
                    <p class="text-danger text-uppercase fw-bold small mb-2">Tentang Kami</p>
                    <h2 class="fw-bold mb-3">
                        {{ $profile?->company_name ?? 'Tata Bhuana Scaffolding' }}
                    </h2>
                    <p class="text-muted mb-3">
                        {{ $profile?->about_main_text ?? 'Kami dikenal sebagai perusahaan penyedia layanan sewa dan penjualan scaffolding (perancah) utama yang berpusat di Daerah Istimewa Yogyakarta. Dengan komitmen untuk memberikan layanan terbaik, kami telah dipercaya oleh berbagai klien untuk mendukung proyek konstruksi mereka dengan aman, berkualitas, dan efisien.' }}
                    </p>
                    <ul class="list-unstyled mb-0">
                        <li class="d-flex align-items-center mb-2">
                            <span class="badge rounded-circle bg-danger me-2 d-flex align-items-center justify-content-center" style="width: 28px; height: 28px;">
                                <i class="fas fa-check text-white"></i>
                            </span>
                            <span>{{ $profile?->about_feature_1 ?? 'Tim Profesional Berpengalaman' }}</span>
                        </li>
                        <li class="d-flex align-items-center mb-2">
                            <span class="badge rounded-circle bg-danger me-2 d-flex align-items-center justify-content-center" style="width: 28px; height: 28px;">
                                <i class="fas fa-check text-white"></i>
                            </span>
                            <span>{{ $profile?->about_feature_2 ?? 'Produk Berkualitas Standar SNI' }}</span>
                        </li>
                        <li class="d-flex align-items-center">
                            <span class="badge rounded-circle bg-danger me-2 d-flex align-items-center justify-content-center" style="width: 28px; height: 28px;">
                                <i class="fas fa-check text-white"></i>
                            </span>
                            <span>{{ $profile?->about_feature_3 ?? 'Layanan Cepat & Responsif' }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Quick Services Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12 text-center home-services-heading">
                <h2 class="fw-bold mb-1">{{ $homeServicesHeadingTitle }}</h2>
                <p class="text-muted mb-0">{{ $homeServicesHeadingSubtitle }}</p>
            </div>
        </div>
        <div class="row g-3">
            <div class="col-6 col-md-6 col-lg-3">
                <a href="{{ route('services') }}" class="service-quick-card text-decoration-none service-animate">
                    <div class="service-icon-box bg-red-gradient">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <h5 class="fw-bold mt-3 mb-2">{{ $homeService1Title }} <i class="fas fa-arrow-right ms-2 text-muted"></i></h5>
                </a>
            </div>
            
            <div class="col-6 col-md-6 col-lg-3">
                <a href="{{ route('services') }}" class="service-quick-card text-decoration-none service-animate" style="animation-delay: 0.1s;">
                    <div class="service-icon-box bg-green-gradient">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h5 class="fw-bold mt-3 mb-2">{{ $homeService2Title }} <i class="fas fa-arrow-right ms-2 text-muted"></i></h5>
                </a>
            </div>
            
            <div class="col-6 col-md-6 col-lg-3">
                <a href="{{ route('services') }}" class="service-quick-card text-decoration-none service-animate" style="animation-delay: 0.2s;">
                    <div class="service-icon-box bg-red-gradient">
                        <i class="fas fa-truck"></i>
                    </div>
                    <h5 class="fw-bold mt-3 mb-2">{{ $homeService3Title }} <i class="fas fa-arrow-right ms-2 text-muted"></i></h5>
                </a>
            </div>
            
            <div class="col-6 col-md-6 col-lg-3">
                <a href="{{ route('contact') }}" class="service-quick-card text-decoration-none service-animate" style="animation-delay: 0.3s;">
                    <div class="service-icon-box bg-green-gradient">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h5 class="fw-bold mt-3 mb-2">{{ $homeService4Title }} <i class="fas fa-arrow-right ms-2 text-muted"></i></h5>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-5">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-12 home-features-heading">
                <h2 class="display-5 fw-bold mb-3">{{ $homeFeaturesHeadingTitle }}</h2>
                <p class="lead text-muted">{{ $homeFeaturesHeadingSubtitle }}</p>
            </div>
        </div>
        
        <div class="row g-4 justify-content-center">
            <div class="col-6 col-md-4 col-lg-2">
                <div class="feature-card text-center h-100 p-5 bg-white rounded shadow-sm border-0">
                    <div class="feature-icon bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-4 shadow">
                        <i class="fas fa-shield-alt fa-2x"></i>
                    </div>
                    <h4 class="fw-bold mb-0">{{ $homeFeature1Title }}</h4>
                </div>
            </div>
            
            <div class="col-6 col-md-4 col-lg-2">
                <div class="feature-card text-center h-100 p-5 bg-white rounded shadow-sm border-0">
                    <div class="feature-icon bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-4 shadow">
                        <i class="fas fa-clock fa-2x"></i>
                    </div>
                    <h4 class="fw-bold mb-0">{{ $homeFeature2Title }}</h4>
                </div>
            </div>
            
            <div class="col-6 col-md-4 col-lg-2">
                <div class="feature-card text-center h-100 p-5 bg-white rounded shadow-sm border-0">
                    <div class="feature-icon bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-4 shadow">
                        <i class="fas fa-boxes fa-2x"></i>
                    </div>
                    <h4 class="fw-bold mb-0">{{ $homeFeature3Title }}</h4>
                </div>
            </div>
            
            <div class="col-6 col-md-4 col-lg-2">
                <div class="feature-card text-center h-100 p-5 bg-white rounded shadow-sm border-0">
                    <div class="feature-icon bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-4 shadow">
                        <i class="fas fa-bolt fa-2x"></i>
                    </div>
                    <h4 class="fw-bold mb-0">{{ $homeFeature4Title }}</h4>
                </div>
            </div>
            
            <div class="col-6 col-md-4 col-lg-2">
                <div class="feature-card text-center h-100 p-5 bg-white rounded shadow-sm border-0">
                    <div class="feature-icon bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-4 shadow">
                        <i class="fas fa-trophy fa-2x"></i>
                    </div>
                    <h4 class="fw-bold mb-0">{{ $homeFeature5Title }}</h4>
                </div>
            </div>
            
            <div class="col-6 col-md-4 col-lg-2">
                <div class="feature-card text-center h-100 p-5 bg-white rounded shadow-sm border-0">
                    <div class="feature-icon bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-4 shadow">
                        <i class="fas fa-headset fa-2x"></i>
                    </div>
                    <h4 class="fw-bold mb-0">{{ $homeFeature6Title }}</h4>
                </div>
            </div>
        </div>
    </div>
</section>

@if($latestArticles->count() > 0)
<section class="py-5 bg-light">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12 text-center home-latest-articles-heading">
                <h2 class="fw-bold mb-1">{{ $homeArticlesHeadingTitle }}</h2>
                <p class="text-muted mb-0">{{ $homeArticlesHeadingSubtitle }}</p>
            </div>
        </div>
        <div class="row g-4">
            @foreach($latestArticles as $article)
            @php
                $latestImageSrc = $article->image;
                if ($latestImageSrc && !\Illuminate\Support\Str::startsWith($latestImageSrc, ['http://', 'https://'])) {
                    $latestImageSrc = asset('storage/' . $latestImageSrc);
                }
            @endphp
            <div class="col-12 col-md-4">
                <div class="card home-article-card h-100 border-0">
                    @if($latestImageSrc)
                    <div class="card-img-top">
                        <img src="{{ $latestImageSrc }}" alt="{{ $article->title }}" class="img-fluid home-article-card-img" loading="lazy" decoding="async">
                    </div>
                    @endif
                    <div class="card-body">
                        @if($article->formatted_published_date)
                        <p class="text-muted small mb-2">{{ $article->formatted_published_date }}</p>
                        @endif
                        <h5 class="card-title fw-semibold mb-2">{{ $article->title }}</h5>
                        @php
                            $excerpt = $article->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($article->content), 110);
                        @endphp
                        <p class="card-text text-muted mb-3">{{ $excerpt }}</p>
                        <a href="{{ route('articles.show', $article) }}" class="btn btn-link text-danger ps-0">
                            Baca Selengkapnya <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row mt-4">
            <div class="col-12 text-center">
                <a href="{{ route('articles.index') }}" class="btn btn-outline-danger">
                    Lihat Semua Artikel
                </a>
            </div>
        </div>
    </div>
</section>
@endif

@if($featuredProjects->count() > 0)
<section class="py-5">
    <div class="container mb-3">
        <div class="row">
            <div class="col-12 d-flex align-items-center justify-content-between">
                <h2 class="fw-bold mb-0">{{ $homeProjectsHeadingTitle }}</h2>
                <div class="d-flex gap-2">
                    <button class="btn btn-outline-danger btn-sm" id="fpPrev"><i class="fas fa-chevron-left"></i></button>
                    <button class="btn btn-outline-danger btn-sm" id="fpNext"><i class="fas fa-chevron-right"></i></button>
                </div>
            </div>
        </div>
    </div>
    <div id="featuredProjectsStrip" class="featured-projects-strip">
        <div class="strip-container">
            @foreach($featuredProjects as $project)
            <a href="{{ route('projects.show', $project) }}" class="strip-item text-decoration-none">
                @php
                    $img = null;
                    if ($project->images && is_array($project->images) && count($project->images) > 0) {
                        $img = asset('storage/' . $project->images[0]);
                    }
                @endphp
                @if($img)
                    <img src="{{ $img }}" alt="{{ $project->title }}" loading="lazy" decoding="async">
                @else
                    <div class="strip-thumb-fallback"></div>
                @endif
                <div class="strip-content">
                    <div class="strip-content-inner">
                        <h6 class="mb-1 fw-bold">{{ $project->title }}</h6>
                        <p class="small mb-0">{{ Str::limit($project->description, 80) }}</p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- CTA Section -->
<section class="py-5 bg-danger text-white home-cta-section">
    <div class="container text-center">
        <h2 class="display-5 fw-bold mb-3">{{ $homeCtaTitle }}</h2>
        <p class="lead mb-4">{{ $homeCtaSubtitle }}</p>
        <a href="{{ route('contact') }}" class="btn btn-light btn-lg">
            <i class="fas fa-phone me-2"></i>{{ $homeCtaButtonText }}
        </a>
    </div>
</section>

<!-- Scroll To Top Button -->
<button id="scrollToTopBtn" class="scroll-to-top-btn" title="Scroll ke Atas">
    <i class="fas fa-arrow-up"></i>
    <span class="visually-hidden">Kembali ke atas</span>
</button>

@push('scripts')
    @vite('resources/js/home.js')
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const slides = document.querySelectorAll('.hero-bg-slide');
        if (!slides || slides.length === 0) return;
        slides.forEach(img => {
            if (img && img.src) {
                const loader = new Image();
                loader.src = img.src;
            }
        });
        let current = 0;
        const intervalMs = 7000;
        function show(index) {
            slides.forEach((img, i) => {
                if (i === index) {
                    img.classList.add('active');
                } else {
                    img.classList.remove('active');
                }
            });
        }
        show(current);
        if (slides.length > 1) {
            setInterval(() => {
                current = (current + 1) % slides.length;
                show(current);
            }, intervalMs);
        }
    });
    </script>
@endpush

@endsection
