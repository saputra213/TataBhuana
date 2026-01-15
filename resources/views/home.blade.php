@extends('layouts.app')

@push('styles')
    @vite('resources/css/home.css')
@endpush

@section('title', 'Beranda - Tata Bhuana Scaffolding')
@section('description', 'Perusahaan penyedia jasa sewa dan jual scaffolding berkualitas tinggi untuk proyek konstruksi Anda.')

@section('content')
<!-- Hero Slideshow Section -->
@php
    $bgImages = [];
    if (!empty($profile?->hero_images) && is_array($profile->hero_images)) {
        $bgImages = $profile->hero_images;
    } elseif (!empty($profile?->hero_image)) {
        $bgImages = [$profile->hero_image];
    }
@endphp
<section class="hero-slideshow position-relative overflow-hidden">
    <div class="hero-slides-container">
        @forelse($bgImages as $idx => $img)
            <img src="{{ asset('storage/' . $img) }}" alt="Hero {{ $idx + 1 }}" class="hero-bg-slide {{ $idx === 0 ? 'active' : '' }}" loading="{{ $idx === 0 ? 'eager' : 'lazy' }}" fetchpriority="{{ $idx === 0 ? 'high' : 'low' }}" decoding="async">
        @empty
            <div class="hero-bg-fallback"></div>
        @endforelse
        <div class="hero-overlay"></div>
    </div>
    <div class="container position-relative" style="z-index: 2;">
        <div class="row">
            <div class="col-12 text-center py-5 my-4">
                <h1 class="display-3 fw-bold text-white mb-3">
                    {{ $profile?->hero_title ?? 'Mitra Konstruksi Andal' }}
                </h1>
                <p class="lead text-white-50 mb-4">
                    {{ $profile?->hero_description ?? ($profile?->description ?? 'Scaffolding berkualitas untuk proyek Anda, aman dan efisien.') }}
                </p>
                <a href="{{ route('contact') }}" class="btn btn-light btn-lg">
                    <i class="fas fa-phone-alt me-2"></i>Hubungi Kami
                </a>
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
                    @if($profile && $profile->hero_image)
                        <div class="company-profile-image-wrapper">
                            <img src="{{ asset('storage/' . $profile->hero_image) }}" alt="{{ $profile->company_name ?? 'Profil Perusahaan' }}" class="company-profile-image" loading="lazy" decoding="async">
                        </div>
                    @else
                        <div class="company-profile-image-fallback d-flex align-items-center justify-content-center">
                            <span class="fw-bold text-white fs-3">{{ $profile->company_name ?? 'Tata Bhuana Scaffolding' }}</span>
                        </div>
                    @endif
                </div>
                <div class="col-lg-7">
                    <p class="text-danger text-uppercase fw-bold small mb-2">Tentang Kami</p>
                    <h2 class="fw-bold mb-3">
                        {{ $profile?->company_name ?? 'Tata Bhuana Scaffolding' }}
                    </h2>
                    <p class="text-muted mb-0">
                        {{ $profile?->about_us ?? 'Tata Bhuana Scaffolding adalah perusahaan penyedia sewa dan jual scaffolding yang berkomitmen memberikan solusi aman, berkualitas, dan efisien untuk berbagai proyek konstruksi Anda.' }}
                    </p>
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
                <h2 class="fw-bold mb-1">Layanan Kami</h2>
                <p class="text-muted mb-0">Pilihan layanan utama untuk mendukung proyek konstruksi Anda</p>
            </div>
        </div>
        <div class="row g-3">
            <div class="col-6 col-md-6 col-lg-3">
                <a href="{{ route('services') }}" class="service-quick-card text-decoration-none service-animate">
                    <div class="service-icon-box bg-red-gradient">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <h5 class="fw-bold mt-3 mb-2">Penjualan <i class="fas fa-arrow-right ms-2 text-muted"></i></h5>
                </a>
            </div>
            
            <div class="col-6 col-md-6 col-lg-3">
                <a href="{{ route('services') }}" class="service-quick-card text-decoration-none service-animate" style="animation-delay: 0.1s;">
                    <div class="service-icon-box bg-green-gradient">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h5 class="fw-bold mt-3 mb-2">Persewaan <i class="fas fa-arrow-right ms-2 text-muted"></i></h5>
                </a>
            </div>
            
            <div class="col-6 col-md-6 col-lg-3">
                <a href="{{ route('services') }}" class="service-quick-card text-decoration-none service-animate" style="animation-delay: 0.2s;">
                    <div class="service-icon-box bg-red-gradient">
                        <i class="fas fa-truck"></i>
                    </div>
                    <h5 class="fw-bold mt-3 mb-2">Pengiriman <i class="fas fa-arrow-right ms-2 text-muted"></i></h5>
                </a>
            </div>
            
            <div class="col-6 col-md-6 col-lg-3">
                <a href="{{ route('contact') }}" class="service-quick-card text-decoration-none service-animate" style="animation-delay: 0.3s;">
                    <div class="service-icon-box bg-green-gradient">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h5 class="fw-bold mt-3 mb-2">Konsultasi <i class="fas fa-arrow-right ms-2 text-muted"></i></h5>
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
                <h2 class="display-5 fw-bold mb-3">Mengapa Memilih Kami?</h2>
                <p class="lead text-muted">Kualitas Selalu Terjaga, Layanan Terpercaya</p>
            </div>
        </div>
        
        <div class="row g-4 justify-content-center">
            <div class="col-6 col-md-4 col-lg-2">
                <div class="feature-card text-center h-100 p-5 bg-white rounded shadow-sm border-0">
                    <div class="feature-icon bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-4 shadow">
                        <i class="fas fa-shield-alt fa-2x"></i>
                    </div>
                    <h4 class="fw-bold mb-0">Keamanan Terjamin</h4>
                </div>
            </div>
            
            <div class="col-6 col-md-4 col-lg-2">
                <div class="feature-card text-center h-100 p-5 bg-white rounded shadow-sm border-0">
                    <div class="feature-icon bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-4 shadow">
                        <i class="fas fa-clock fa-2x"></i>
                    </div>
                    <h4 class="fw-bold mb-0">Pengiriman Cepat</h4>
                </div>
            </div>
            
            <div class="col-6 col-md-4 col-lg-2">
                <div class="feature-card text-center h-100 p-5 bg-white rounded shadow-sm border-0">
                    <div class="feature-icon bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-4 shadow">
                        <i class="fas fa-boxes fa-2x"></i>
                    </div>
                    <h4 class="fw-bold mb-0">Stok Produk Lengkap</h4>
                </div>
            </div>
            
            <div class="col-6 col-md-4 col-lg-2">
                <div class="feature-card text-center h-100 p-5 bg-white rounded shadow-sm border-0">
                    <div class="feature-icon bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-4 shadow">
                        <i class="fas fa-bolt fa-2x"></i>
                    </div>
                    <h4 class="fw-bold mb-0">Cepat & Responsif</h4>
                </div>
            </div>
            
            <div class="col-6 col-md-4 col-lg-2">
                <div class="feature-card text-center h-100 p-5 bg-white rounded shadow-sm border-0">
                    <div class="feature-icon bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-4 shadow">
                        <i class="fas fa-trophy fa-2x"></i>
                    </div>
                    <h4 class="fw-bold mb-0">Produk Berkualitas</h4>
                </div>
            </div>
            
            <div class="col-6 col-md-4 col-lg-2">
                <div class="feature-card text-center h-100 p-5 bg-white rounded shadow-sm border-0">
                    <div class="feature-icon bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-4 shadow">
                        <i class="fas fa-headset fa-2x"></i>
                    </div>
                    <h4 class="fw-bold mb-0">Dukungan Teknis</h4>
                </div>
            </div>
        </div>
    </div>
</section>

@if($featuredProjects->count() > 0)
<section class="py-5">
    <div class="container mb-3">
        <div class="row">
            <div class="col-12 d-flex align-items-center justify-content-between">
                <h2 class="fw-bold mb-0">Proyek Unggulan</h2>
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
        <h2 class="display-5 fw-bold mb-3">Siap Memulai Proyek Anda?</h2>
        <p class="lead mb-4">Hubungi kami sekarang untuk konsultasi gratis dan penawaran terbaik</p>
        <a href="{{ route('contact') }}" class="btn btn-light btn-lg">
            <i class="fas fa-phone me-2"></i>Hubungi Kami Sekarang
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
