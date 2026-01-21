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
    $homeHighlightTitle = $profile?->home_highlight_title ?? 'Keunggulan Utama Tatabhuana Scaffolding untuk Proyek Konstruksi & Industri.';
    $homeHighlightSubtitle = $profile?->home_highlight_subtitle ?? 'Solusi scaffolding profesional dengan harga kompetitif, standar mutu tinggi, dan dukungan layanan yang bergaransi.';
    $homeHighlight1Label = $profile?->home_highlight_1_label ?? 'Terjangkau';
    $homeHighlight1Title = $profile?->home_highlight_1_title ?? 'Harga Scaffolding Kompetitif Sesuai Kebutuhan Proyek';
    $homeHighlight1Text = $profile?->home_highlight_1_text ?? 'Tatabhuana Scaffolding menyediakan paket sewa dan penjualan scaffolding dengan harga terjangkau dan fleksibel, disesuaikan dengan skala proyek konstruksi tanpa mengorbankan kualitas dan keamanan kerja.';
    $homeHighlight2Label = $profile?->home_highlight_2_label ?? 'Berkualitas';
    $homeHighlight2Title = $profile?->home_highlight_2_title ?? 'Scaffolding Berkualitas dengan Standar Mutu & Keselamatan';
    $homeHighlight2Text = $profile?->home_highlight_2_text ?? 'Seluruh unit scaffolding kami dirawat secara berkala dan melalui proses pengecekan ketat untuk memastikan kekuatan struktur serta memenuhi standar keselamatan kerja di lapangan konstruksi dan industri.';
    $homeHighlight3Label = $profile?->home_highlight_3_label ?? 'Bergaransi';
    $homeHighlight3Title = $profile?->home_highlight_3_title ?? 'Dukungan Purna Jual & Layanan Scaffolding Responsif';
    $homeHighlight3Text = $profile?->home_highlight_3_text ?? 'Didukung tim profesional, Tatabhuana Scaffolding memberikan layanan purna jual dan dukungan teknis yang responsif, mulai dari konsultasi awal hingga pendampingan selama masa penggunaan scaffolding.';

    $homeServicesHeadingTitle = $profile?->home_services_heading_title ?? 'Layanan Kami';
    $homeServicesHeadingSubtitle = $profile?->home_services_heading_subtitle ?? 'Pilihan layanan utama untuk mendukung proyek konstruksi Anda';
    $homeService1Title = $profile?->home_services_1_title ?? 'Penjualan';
    $homeService2Title = $profile?->home_services_2_title ?? 'Persewaan';
    $homeService3Title = $profile?->home_services_3_title ?? 'Pengiriman';
    $homeService4Title = $profile?->home_services_4_title ?? 'Konsultasi';

    $homeFeaturesHeadingTitle = $profile?->home_features_heading_title ?? 'Mengapa Memilih Tatabhuana Scaffolding sebagai Partner Scaffolding Profesional?';
    $homeFeaturesHeadingSubtitle = $profile?->home_features_heading_subtitle ?? 'Tatabhuana Scaffolding adalah perusahaan penyedia scaffolding dan perancah bangunan profesional yang berfokus pada keamanan kerja, kualitas material, dan ketepatan waktu proyek. Kami melayani kebutuhan proyek konstruksi, industri, dan infrastruktur dengan sistem kerja terstandarisasi serta dukungan teknis berpengalaman.';
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
    <div id="heroTripleCarousel" class="carousel slide h-100" data-bs-ride="carousel" data-bs-interval="5000">
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
                <p class="text-uppercase text-muted fw-semibold small mb-1">{{ $homeHighlightKicker ?? 'Keunggulan Utama' }}</p>
                <h2 class="fw-bold mb-0">{{ $homeHighlightTitle ?? 'Keunggulan Utama Tatabhuana Scaffolding untuk Proyek Konstruksi & Industri.' }}</h2>
                <p class="text-muted mt-2">{{ $homeHighlightSubtitle ?? 'Solusi scaffolding profesional dengan harga kompetitif, standar mutu tinggi, dan dukungan layanan yang bergaransi.' }}</p>
            </div>
        </div>
        <div class="home-highlight-grid">
            <div class="home-highlight-card">
                <div class="home-highlight-label">{{ $homeHighlight1Label ?? 'TERJANGKAU' }}</div>
                <div class="home-highlight-icon">
                    <i class="fas fa-tags"></i>
                </div>
                <h3 class="home-highlight-title">{{ $homeHighlight1Title ?? 'Harga Scaffolding Kompetitif Sesuai Kebutuhan Proyek' }}</h3>
                <p class="home-highlight-text">
                    {{ $homeHighlight1Text ?? 'Tatabhuana Scaffolding menyediakan paket sewa dan penjualan scaffolding dengan harga terjangkau dan fleksibel, disesuaikan dengan skala proyek konstruksi tanpa mengorbankan kualitas dan keamanan kerja.' }}
                </p>
                <div class="home-highlight-index">01</div>
            </div>
            <div class="home-highlight-card home-highlight-card-primary">
                <div class="home-highlight-label">{{ $homeHighlight2Label ?? 'BERKUALITAS' }}</div>
                <div class="home-highlight-icon">
                    <i class="fas fa-medal"></i>
                </div>
                <h3 class="home-highlight-title">{{ $homeHighlight2Title ?? 'Scaffolding Berkualitas dengan Standar Mutu & Keselamatan' }}</h3>
                <p class="home-highlight-text">
                    {{ $homeHighlight2Text ?? 'Seluruh unit scaffolding kami dirawat secara berkala dan melalui proses pengecekan ketat untuk memastikan kekuatan struktur serta memenuhi standar keselamatan kerja di lapangan konstruksi dan industri.' }}
                </p>
                <div class="home-highlight-index">02</div>
            </div>
            <div class="home-highlight-card">
                <div class="home-highlight-label">{{ $homeHighlight3Label ?? 'BERGARANSI' }}</div>
                <div class="home-highlight-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="home-highlight-title">{{ $homeHighlight3Title ?? 'Dukungan Purna Jual & Layanan Scaffolding Responsif' }}</h3>
                <p class="home-highlight-text">
                    {{ $homeHighlight3Text ?? 'Didukung tim profesional, Tatabhuana Scaffolding memberikan layanan purna jual dan dukungan teknis yang responsif, mulai dari konsultasi awal hingga pendampingan selama masa penggunaan scaffolding.' }}
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
                    <p class="text-muted mb-3" style="text-align: justify;">
                        {{ $profile?->about_main_text ?? 'Kami dikenal sebagai perusahaan penyedia layanan sewa dan penjualan scaffolding (perancah) utama yang berpusat di Daerah Istimewa Yogyakarta. Dengan komitmen untuk memberikan layanan terbaik, kami telah dipercaya oleh berbagai klien untuk mendukung proyek konstruksi mereka dengan aman, berkualitas, dan efisien.' }}
                    </p>
                    <ul class="list-unstyled mb-0 d-flex flex-column flex-md-row gap-3 justify-content-between">
                        <li class="d-flex align-items-center">
                            <span class="badge rounded-circle bg-danger me-2 d-flex align-items-center justify-content-center flex-shrink-0" style="width: 28px; height: 28px;">
                                <i class="fas fa-check text-white"></i>
                            </span>
                            <span>{{ $profile?->about_feature_1 ?? 'Tim Profesional Berpengalaman' }}</span>
                        </li>
                        <li class="d-flex align-items-center">
                            <span class="badge rounded-circle bg-danger me-2 d-flex align-items-center justify-content-center flex-shrink-0" style="width: 28px; height: 28px;">
                                <i class="fas fa-check text-white"></i>
                            </span>
                            <span>{{ $profile?->about_feature_2 ?? 'Produk Berkualitas Standar SNI' }}</span>
                        </li>
                        <li class="d-flex align-items-center">
                            <span class="badge rounded-circle bg-danger me-2 d-flex align-items-center justify-content-center flex-shrink-0" style="width: 28px; height: 28px;">
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
        <div class="row g-4">
            <div class="col-6 col-md-6">
                <div class="service-feature" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#featureModal" data-title="{{ $profile?->about_service_1_title ?? 'Sewa Scaffolding' }}" data-description="{{ $profile?->about_service_1_description ?? 'Layanan sewa scaffolding dengan berbagai jenis dan ukuran untuk kebutuhan proyek jangka pendek maupun panjang dengan kualitas terjamin.' }}">
                    <div class="d-flex">
                        <div class="service-icon">
                            <i class="fas fa-tools"></i>
                        </div>
                        <div class="service-content">
                            <h4 class="fw-bold mb-3">
                                {{ $profile?->about_service_1_title ?? 'Sewa Scaffolding' }}
                            </h4>
                            <p class="text-muted mb-0">
                                {{ $profile?->about_service_1_description ?? 'Layanan sewa scaffolding dengan berbagai jenis dan ukuran untuk kebutuhan proyek jangka pendek maupun panjang dengan kualitas terjamin.' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-6 col-md-6">
                <div class="service-feature" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#featureModal" data-title="{{ $profile?->about_service_2_title ?? 'Jual Scaffolding' }}" data-description="{{ $profile?->about_service_2_description ?? 'Penjualan scaffolding berkualitas tinggi dengan harga kompetitif dan garansi kualitas terjamin, cocok untuk investasi jangka panjang.' }}">
                    <div class="d-flex">
                        <div class="service-icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <div class="service-content">
                            <h4 class="fw-bold mb-3">
                                {{ $profile?->about_service_2_title ?? 'Jual Scaffolding' }}
                            </h4>
                            <p class="text-muted mb-0">
                                {{ $profile?->about_service_2_description ?? 'Penjualan scaffolding berkualitas tinggi dengan harga kompetitif dan garansi kualitas terjamin, cocok untuk investasi jangka panjang.' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-6 col-md-6">
                <div class="service-feature" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#featureModal" data-title="{{ $profile?->about_service_3_title ?? 'Layanan Pengiriman' }}" data-description="{{ $profile?->about_service_3_description ?? 'Pengiriman cepat dan aman dengan dukungan tim profesional yang berpengalaman, melayani berbagai daerah di Indonesia.' }}">
                    <div class="d-flex">
                        <div class="service-icon">
                            <i class="fas fa-truck"></i>
                        </div>
                        <div class="service-content">
                            <h4 class="fw-bold mb-3">
                                {{ $profile?->about_service_3_title ?? 'Layanan Pengiriman' }}
                            </h4>
                            <p class="text-muted mb-0">
                                {{ $profile?->about_service_3_description ?? 'Pengiriman cepat dan aman dengan dukungan tim profesional yang berpengalaman, melayani berbagai daerah di Indonesia.' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-6 col-md-6">
                <div class="service-feature" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#featureModal" data-title="{{ $profile?->about_service_4_title ?? 'Konsultasi & Support' }}" data-description="{{ $profile?->about_service_4_description ?? 'Tim ahli kami siap memberikan konsultasi dan dukungan teknis untuk memastikan kesuksesan proyek konstruksi Anda.' }}">
                    <div class="d-flex">
                        <div class="service-icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <div class="service-content">
                            <h4 class="fw-bold mb-3">
                                {{ $profile?->about_service_4_title ?? 'Konsultasi & Support' }}
                            </h4>
                            <p class="text-muted mb-0">
                                {{ $profile?->about_service_4_description ?? 'Tim ahli kami siap memberikan konsultasi dan dukungan teknis untuk memastikan kesuksesan proyek konstruksi Anda.' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* Service Feature Cards (From About Us) */
.service-feature {
    background: white;
    border-radius: 15px;
    padding: 30px;
    border: 2px solid #e9ecef;
    transition: all 0.4s ease;
    position: relative;
    overflow: hidden;
    height: 100%;
}

.service-feature::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(220, 38, 38, 0.05), transparent);
    transition: left 0.6s;
}

.service-feature:hover::before {
    left: 100%;
}

.service-feature:hover {
    transform: translateX(10px);
    box-shadow: 0 15px 40px rgba(220, 38, 38, 0.15);
    border-color: #dc2626;
}

.service-icon {
    width: 70px;
    height: 70px;
    background: #dc2626;
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    color: white;
    margin-right: 20px;
    flex-shrink: 0;
    transition: all 0.4s ease;
}

.service-feature:hover .service-icon {
    transform: rotate(360deg) scale(1.1);
    background: #16a34a;
}

.service-content {
    flex: 1;
}

@media (max-width: 576px) {
    /* Mobile Typography Consistency */
    
    /* Section Headings */
    h2.fw-bold {
        font-size: 1.5rem !important; /* Unified Section Title Size */
        line-height: 1.3;
    }
    
    .display-6 {
        font-size: 1.5rem !important; /* Unified Display Title Size */
    }
    
    .lead {
        font-size: 0.95rem !important; /* Unified Lead Text Size */
    }
    
    p.text-muted {
        font-size: 0.85rem !important; /* Unified Body Text Size */
    }
    
    /* Hero Section Mobile */
    .hero-main-title {
        font-size: 1.75rem !important;
    }
    
    .hero-subtitle-text {
        font-size: 0.9rem !important;
    }
    
    /* Highlight Section Mobile */
    .home-highlight-title {
        font-size: 1.1rem !important;
    }
    
    .home-highlight-text {
        font-size: 0.85rem !important;
    }
    
    /* Company Profile Mobile */
    .company-profile-wrapper h2 {
        font-size: 1.5rem !important;
    }
    
    /* CTA Section Mobile */
    .home-cta-title {
        font-size: 1.5rem !important;
    }
    
    .home-cta-subtitle {
        font-size: 1rem !important;
    }
    
    /* Global Container Padding */
    .container {
        padding-left: 20px;
        padding-right: 20px;
    }
    
    /* Spacing Adjustments */
    .py-5 {
        padding-top: 3rem !important;
        padding-bottom: 3rem !important;
    }

    /* Unified Card Styles (Service & Features) */
    .service-feature, .feature-card {
        padding: 1rem !important;
        border-radius: 12px;
    }

    .service-feature .d-flex {
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    /* Icon Consistency */
    .service-icon {
        width: 45px;
        height: 45px;
        font-size: 1.25rem;
        margin-right: 0;
        margin-bottom: 0.5rem;
    }

    .feature-card .feature-icon {
        width: 45px !important;
        height: 45px !important;
        margin-bottom: 0.5rem !important;
    }
    
    .feature-card .feature-icon i {
        font-size: 1.25rem !important;
    }

    /* Title Consistency */
    .service-content h4, .feature-card h3 {
        font-size: 0.95rem !important;
        font-weight: 700;
        margin-bottom: 0 !important;
        line-height: 1.2;
    }

    /* Description Consistency - HIDDEN on Mobile */
    .service-content p, .feature-card p {
        display: none !important;
    }
    
    /* Feature Card Specifics */
    .feature-card h3 {
        min-height: auto;
        display: block;
    }

    /* Article Card Consistency */
    .home-article-card .card-body {
        padding: 1.25rem !important;
    }
    
    .home-article-card .card-title {
        font-size: 1.1rem !important;
        font-weight: 700;
    }
    
    .home-article-card .card-text {
        font-size: 0.85rem !important;
        line-height: 1.5;
    }

    /* Enable Desktop-like interactions on Mobile Touch via JS Class */
    .service-feature {
        transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
    }
    
    .service-feature.mobile-animate {
        transform: translateX(10px);
        box-shadow: 0 15px 40px rgba(220, 38, 38, 0.15);
        border-color: #dc2626;
    }
    
    .service-feature.mobile-animate .service-icon {
        transform: rotate(360deg) scale(1.1);
        background: #16a34a;
        transition: transform 0.4s ease, background 0.4s ease;
    }
}
</style>

<!-- Features Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-lg-10 mx-auto home-features-heading">
                <h2 class="display-6 fw-bold mb-3">{{ $homeFeaturesHeadingTitle ?? 'Mengapa Memilih Tatabhuana Scaffolding sebagai Partner Scaffolding Profesional?' }}</h2>
                <p class="lead text-muted">{{ $homeFeaturesHeadingSubtitle ?? 'Tatabhuana Scaffolding adalah perusahaan penyedia scaffolding dan perancah bangunan profesional yang berfokus pada keamanan kerja, kualitas material, dan ketepatan waktu proyek. Kami melayani kebutuhan proyek konstruksi, industri, dan infrastruktur dengan sistem kerja terstandarisasi serta dukungan teknis berpengalaman.' }}</p>
            </div>
        </div>
        
        <div class="row g-4 justify-content-center">
            <div class="col-6 col-md-6 col-lg-4">
                <div class="feature-card text-center h-100 p-4 bg-white rounded shadow-sm border-0" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#featureModal" data-title="Keamanan Scaffolding Terjamin & Bersertifikat" data-description="Seluruh unit scaffolding Tatabhuana menggunakan material berkualitas tinggi yang memenuhi standar keselamatan kerja konstruksi. Sistem perancah kami dirancang untuk memberikan stabilitas dan keamanan maksimal di berbagai kondisi proyek.">
                    <div class="feature-icon bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-4 shadow" style="width: 70px; height: 70px;">
                        <i class="fas fa-shield-alt fa-2x"></i>
                    </div>
                    <h3 class="h5 fw-bold mb-3">Keamanan Scaffolding Terjamin & Bersertifikat</h3>
                    <p class="text-muted small">
                        Seluruh unit scaffolding Tatabhuana menggunakan material berkualitas tinggi yang memenuhi standar keselamatan kerja konstruksi. Sistem perancah kami dirancang untuk memberikan stabilitas dan keamanan maksimal di berbagai kondisi proyek.
                    </p>
                </div>
            </div>
            
            <div class="col-6 col-md-6 col-lg-4">
                <div class="feature-card text-center h-100 p-4 bg-white rounded shadow-sm border-0" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#featureModal" data-title="Pengiriman Scaffolding Cepat & Tepat Waktu" data-description="Kami menyediakan layanan pengiriman scaffolding yang cepat dan terjadwal untuk memastikan kebutuhan proyek terpenuhi tanpa menghambat progres pekerjaan di lapangan.">
                    <div class="feature-icon bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-4 shadow" style="width: 70px; height: 70px;">
                        <i class="fas fa-clock fa-2x"></i>
                    </div>
                    <h3 class="h5 fw-bold mb-3">Pengiriman Scaffolding Cepat & Tepat Waktu</h3>
                    <p class="text-muted small">
                        Kami menyediakan layanan pengiriman scaffolding yang cepat dan terjadwal untuk memastikan kebutuhan proyek terpenuhi tanpa menghambat progres pekerjaan di lapangan.
                    </p>
                </div>
            </div>
            
            <div class="col-6 col-md-6 col-lg-4">
                <div class="feature-card text-center h-100 p-4 bg-white rounded shadow-sm border-0" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#featureModal" data-title="Stok Scaffolding Lengkap & Ready Stock" data-description="Tatabhuana Scaffolding memiliki stok scaffolding lengkap dan siap digunakan, mulai dari frame scaffolding, cross brace, joint pin, hingga aksesoris pendukung proyek konstruksi dan industri.">
                    <div class="feature-icon bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-4 shadow" style="width: 70px; height: 70px;">
                        <i class="fas fa-boxes fa-2x"></i>
                    </div>
                    <h3 class="h5 fw-bold mb-3">Stok Scaffolding Lengkap & Ready Stock</h3>
                    <p class="text-muted small">
                        Tatabhuana Scaffolding memiliki stok scaffolding lengkap dan siap digunakan, mulai dari frame scaffolding, cross brace, joint pin, hingga aksesoris pendukung proyek konstruksi dan industri.
                    </p>
                </div>
            </div>
            
            <div class="col-6 col-md-6 col-lg-4">
                <div class="feature-card text-center h-100 p-4 bg-white rounded shadow-sm border-0" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#featureModal" data-title="Layanan Cepat, Responsif & Profesional" data-description="Tim kami siap merespons setiap kebutuhan proyek dengan cepat, mulai dari konsultasi teknis hingga penyesuaian kebutuhan scaffolding di lokasi kerja.">
                    <div class="feature-icon bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-4 shadow" style="width: 70px; height: 70px;">
                        <i class="fas fa-bolt fa-2x"></i>
                    </div>
                    <h3 class="h5 fw-bold mb-3">Layanan Cepat, Responsif & Profesional</h3>
                    <p class="text-muted small">
                        Tim kami siap merespons setiap kebutuhan proyek dengan cepat, mulai dari konsultasi teknis hingga penyesuaian kebutuhan scaffolding di lokasi kerja.
                    </p>
                </div>
            </div>
            
            <div class="col-6 col-md-6 col-lg-4">
                <div class="feature-card text-center h-100 p-4 bg-white rounded shadow-sm border-0" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#featureModal" data-title="Produk Scaffolding Berkualitas Tinggi" data-description="Kami hanya menyediakan scaffolding dengan kualitas teruji, dirawat secara berkala, dan siap digunakan untuk proyek jangka pendek maupun jangka panjang.">
                    <div class="feature-icon bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-4 shadow" style="width: 70px; height: 70px;">
                        <i class="fas fa-trophy fa-2x"></i>
                    </div>
                    <h3 class="h5 fw-bold mb-3">Produk Scaffolding Berkualitas Tinggi</h3>
                    <p class="text-muted small">
                        Kami hanya menyediakan scaffolding dengan kualitas teruji, dirawat secara berkala, dan siap digunakan untuk proyek jangka pendek maupun jangka panjang.
                    </p>
                </div>
            </div>
            
            <div class="col-6 col-md-6 col-lg-4">
                <div class="feature-card text-center h-100 p-4 bg-white rounded shadow-sm border-0" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#featureModal" data-title="Dukungan Teknis & Konsultasi Proyek" data-description="Didukung oleh tenaga teknis berpengalaman, Tatabhuana Scaffolding memberikan pendampingan teknis mulai dari perencanaan, pemasangan, hingga evaluasi penggunaan scaffolding di lapangan.">
                    <div class="feature-icon bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-4 shadow" style="width: 70px; height: 70px;">
                        <i class="fas fa-headset fa-2x"></i>
                    </div>
                    <h3 class="h5 fw-bold mb-3">Dukungan Teknis & Konsultasi Proyek</h3>
                    <p class="text-muted small">
                        Didukung oleh tenaga teknis berpengalaman, Tatabhuana Scaffolding memberikan pendampingan teknis mulai dari perencanaan, pemasangan, hingga evaluasi penggunaan scaffolding di lapangan.
                    </p>
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

@include('partials.client-slider')

<!-- CTA Section -->
<section class="py-5 bg-danger home-cta-section">
    <div class="container">
        <div class="home-cta-inner mx-auto">
            <div class="row g-4 align-items-center">
                <div class="col-lg-7">
                    <div class="home-cta-kicker text-uppercase fw-semibold small mb-2">
                        Jangan tunda keamanan proyek Anda.
                    </div>
                    <h2 class="home-cta-title fw-bold mb-3 text-white">
                        {{ $homeCtaTitle }}
                    </h2>
                    <p class="home-cta-subtitle lead mb-3 text-white-50">
                        {{ $homeCtaSubtitle }}
                    </p>
                    <div class="d-flex flex-wrap gap-2">
                        <span class="home-cta-chip home-cta-chip-red">
                            <i class="fas fa-shield-alt me-1"></i> Rekomendasi sistem scaffolding yang aman dan sesuai standar
                        </span>
                        <span class="home-cta-chip home-cta-chip-green">
                            <i class="fas fa-headset me-1"></i> Tim support siap membantu dari perencanaan hingga eksekusi
                        </span>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="home-cta-card bg-white text-start">
                        <div class="d-flex align-items-center mb-3">
                            <div class="home-cta-icon me-3">
                                <i class="fas fa-clipboard-check"></i>
                            </div>
                            <div>
                                <div class="fw-semibold small text-muted">
                                    Konsultasi Proyek & Kebutuhan Scaffolding
                                </div>
                                <div class="fw-bold">
                                    Tim siap membantu Anda
                                </div>
                            </div>
                        </div>
                        <p class="small text-muted mb-3">
                            Ceritakan secara singkat jenis pekerjaan, ketinggian kerja, dan lokasi proyek Anda.
                            Kami akan merangkum kebutuhan scaffolding, estimasi biaya, serta opsi sewa atau jual
                            yang paling pas untuk tim Anda.
                        </p>
                        <div class="d-grid">
                            <a href="{{ route('contact') }}" class="btn btn-danger btn-lg">
                                <i class="fas fa-file-signature me-2"></i> Minta penawaran & konsultasi
                            </a>
                        </div>
                        <div class="home-cta-meta small text-muted mt-3">
                            <i class="fas fa-map-marker-alt me-1"></i> Berbasis di Yogyakarta, melayani berbagai proyek di sekitarnya.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Scroll To Top Button -->
<button id="scrollToTopBtn" class="scroll-to-top-btn" title="Scroll ke Atas">
    <i class="fas fa-arrow-up"></i>
    <span class="visually-hidden">Kembali ke atas</span>
</button>

<!-- Feature Detail Modal -->
<div class="modal fade" id="featureModal" tabindex="-1" aria-labelledby="featureModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header border-0 pb-0">
        <h5 class="modal-title fw-bold" id="featureModalLabel">Detail Fitur</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body pt-2 pb-4 text-center">
        <div id="modalFeatureIcon" class="mb-3 text-primary"></div>
        <h4 id="modalFeatureTitle" class="fw-bold mb-3"></h4>
        <p id="modalFeatureDescription" class="text-muted"></p>
      </div>
    </div>
  </div>
</div>

@push('scripts')
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Mobile Animation Logic for Service Features
        if (window.innerWidth <= 576) {
            const serviceCards = document.querySelectorAll('.service-feature');
            
            serviceCards.forEach(card => {
                card.addEventListener('click', function() {
                    // Remove class from all other cards first
                    serviceCards.forEach(c => c.classList.remove('mobile-animate'));
                    
                    // Add class to clicked card
                    this.classList.add('mobile-animate');
                    
                    // Remove class after animation completes (simulating hover out)
                    setTimeout(() => {
                        this.classList.remove('mobile-animate');
                    }, 800); // Durasi sedikit lebih lama agar user sempat melihat efeknya
                });
            });
        }
        
        var featureModal = document.getElementById('featureModal');
        if (featureModal) {
            featureModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;
                var title = button.getAttribute('data-title');
                var description = button.getAttribute('data-description');
                // Get icon from the card (support both feature-icon and service-icon)
                var iconElement = button.querySelector('.feature-icon') || button.querySelector('.service-icon');
                var iconHtml = iconElement ? iconElement.innerHTML : '';
                
                var modalTitle = featureModal.querySelector('#modalFeatureTitle');
                var modalDescription = featureModal.querySelector('#modalFeatureDescription');
                var modalIcon = featureModal.querySelector('#modalFeatureIcon');
                
                modalTitle.textContent = title;
                modalDescription.textContent = description;
                modalIcon.innerHTML = iconHtml;
                
                // Adjust icon size in modal
                var modalIconI = modalIcon.querySelector('i');
                if(modalIconI) {
                    modalIconI.classList.remove('fa-2x');
                    modalIconI.classList.add('fa-4x');
                }
            });
        }
    });
    </script>
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
