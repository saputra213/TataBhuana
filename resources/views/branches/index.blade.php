@extends('layouts.app')

@section('title', 'Cabang Kami - Tata Bhuana Scaffolding')
@section('description', 'Temukan lokasi cabang Tata Bhuana Scaffolding terdekat dengan Anda. Kami hadir di berbagai kota untuk melayani kebutuhan scaffolding Anda.')

@section('content')
<style>
.page-header-animated {
    animation: slideInTop 0.6s ease-out;
}

@keyframes slideInTop {
    from {
        opacity: 0;
        transform: translateY(-30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.branch-card {
    animation: fadeInUp 0.8s ease-out forwards;
    opacity: 0;
}

.branch-card:nth-child(1) { animation-delay: 0.1s; }
.branch-card:nth-child(2) { animation-delay: 0.3s; }

.branch-card {
    transition: all 0.3s ease;
}

.branch-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.15) !important;
}

.branches-hero {
    background: #dc2626;
    padding: 120px 0 80px;
    position: relative;
}

/* Responsive Design untuk Mobile */
@media (max-width: 768px) {
    .branches-hero {
        padding: 80px 0 50px;
    }
    
    .branches-hero h1 {
        font-size: 2rem !important;
    }
    
    .branches-hero .lead {
        font-size: 1rem;
        padding: 0 15px;
    }
}

@media (max-width: 576px) {
    .branches-hero {
        padding: 70px 0 40px;
    }
    
    .branches-hero h1 {
        font-size: 1.75rem !important;
        margin-bottom: 1rem !important;
    }
    
    .branches-hero .lead {
        font-size: 0.95rem;
    }
}
</style>

<!-- Page Header -->
<section class="branches-hero text-white py-5 page-header-animated">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-4 fw-bold mb-3">Cabang Kami</h1>
                <p class="lead">Temukan cabang Tata Bhuana Scaffolding terdekat dengan Anda</p>
            </div>
        </div>
    </div>
</section>

<!-- Branches Grid -->
<section class="py-5">
    <div class="container">
        @if($branches->count() > 0)
            <div class="row g-4">
                @foreach($branches as $branch)
                <div class="col-lg-6 col-md-6 col-12 mb-4">
                    <div class="card h-100 shadow-sm branch-card">
                        <div class="row g-0">
                            <!-- Image Section - Stacked di Mobile -->
                            <div class="col-md-4 col-12 branch-image-wrapper">
                                @if($branch->image)
                                    <img src="{{ asset('storage/' . $branch->image) }}" class="img-fluid w-100 branch-card-image" alt="{{ $branch->name }}">
                                @else
                                    <div class="bg-light d-flex align-items-center justify-content-center branch-placeholder">
                                        <div class="text-center">
                                            <i class="fas fa-building fa-2x text-muted mb-2"></i>
                                            <p class="text-muted small">Tidak ada gambar</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            
                            <!-- Content Section -->
                            <div class="col-md-8 col-12">
                                <div class="card-body d-flex flex-column h-100 p-3 p-md-4">
                                    <div class="d-flex justify-content-between align-items-start mb-2 flex-wrap gap-2">
                                        <h5 class="card-title fw-bold mb-0 flex-grow-1" style="font-size: clamp(1rem, 2.5vw, 1.25rem);">{{ $branch->name }}</h5>
                                        @if($branch->is_main_branch)
                                            <span class="badge bg-warning" style="white-space: nowrap; font-size: 0.75rem;">
                                                <i class="fas fa-star me-1"></i>Kantor Pusat
                                            </span>
                                        @endif
                                    </div>
                                    
                                    <p class="text-muted small mb-3" style="font-size: 0.875rem; line-height: 1.5;">{{ Str::limit($branch->description, 100) }}</p>
                                    
                                    <div class="mb-3 flex-grow-1">
                                        <div class="d-flex align-items-start mb-2">
                                            <i class="fas fa-map-marker-alt text-primary me-2 mt-1" style="font-size: 0.875rem; min-width: 16px;"></i>
                                            <small class="text-muted" style="font-size: 0.8rem; line-height: 1.4;">{{ $branch->address }}</small>
                                        </div>
                                        
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="fas fa-phone text-primary me-2" style="font-size: 0.875rem; min-width: 16px;"></i>
                                            <small class="text-muted" style="font-size: 0.8rem;">
                                                <a href="tel:{{ $branch->phone }}" class="text-decoration-none text-muted">{{ $branch->phone }}</a>
                                            </small>
                                        </div>
                                        
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="fas fa-envelope text-primary me-2" style="font-size: 0.875rem; min-width: 16px;"></i>
                                            <small class="text-muted" style="font-size: 0.8rem;">
                                                <a href="mailto:{{ $branch->email }}" class="text-decoration-none text-muted">{{ $branch->email }}</a>
                                            </small>
                                        </div>
                                        
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="fas fa-user text-primary me-2" style="font-size: 0.875rem; min-width: 16px;"></i>
                                            <small class="text-muted" style="font-size: 0.8rem;">Manager: {{ $branch->manager_name }}</small>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-auto">
                                        <div class="d-flex gap-2 flex-column flex-sm-row">
                                            <a href="{{ route('branches.show', $branch) }}" class="btn btn-success btn-sm flex-grow-1 text-center">
                                                <i class="fas fa-eye me-1"></i>Detail
                                            </a>
                                            <a href="{{ $branch->google_maps_url }}" target="_blank" class="btn btn-outline-primary btn-sm" style="min-width: 50px;">
                                                <i class="fas fa-map-marked-alt"></i>
                                                <span class="d-none d-sm-inline ms-1">Peta</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-5 px-3">
                <i class="fas fa-building fa-3x text-muted mb-3" style="font-size: clamp(2rem, 8vw, 3rem);"></i>
                <h4 class="text-muted mb-3" style="font-size: clamp(1.25rem, 4vw, 1.5rem);">Belum ada cabang yang tersedia</h4>
                <p class="text-muted mb-4" style="font-size: clamp(0.9rem, 2.5vw, 1rem);">Silakan hubungi kami untuk informasi lebih lanjut</p>
                <a href="https://wa.me/6281234567890?text=Halo, saya tertarik dengan layanan scaffolding dari Tata Bhuana" target="_blank" class="btn btn-success" style="font-size: clamp(0.875rem, 2.5vw, 1rem); padding: 0.75rem 1.5rem; min-height: 44px;">
                    <i class="fab fa-whatsapp me-2"></i>Hubungi via WhatsApp
                </a>
            </div>
        @endif
    </div>
</section>

<!-- Map Section -->
@if($branches->count() > 0 && isset($mainBranch) && $mainBranch->latitude && $mainBranch->longitude)
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="fw-bold mb-4 text-center" style="font-size: clamp(1.25rem, 4vw, 1.75rem);">Lokasi Kantor Pusat di Peta</h3>
                <p class="text-center text-muted mb-4" style="font-size: clamp(0.9rem, 2.5vw, 1rem);">
                    <i class="fas fa-map-marker-alt text-danger me-2"></i>{{ $mainBranch->address }}
                </p>
                <div class="ratio ratio-21x9" style="min-height: 300px;">
                    <iframe 
                        src="https://maps.google.com/maps?q={{ $mainBranch->latitude }},{{ $mainBranch->longitude }}&hl=id&z=15&output=embed" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade"
                        title="Lokasi {{ $mainBranch->name }}">
                    </iframe>
                </div>
                <div class="text-center mt-3">
                    <a href="{{ $mainBranch->google_maps_url }}" target="_blank" class="btn btn-outline-primary btn-sm">
                        <i class="fas fa-map-marked-alt me-2"></i>Buka di Google Maps
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@elseif($branches->count() > 0 && isset($mainBranch) && $mainBranch->address)
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="fw-bold mb-4 text-center" style="font-size: clamp(1.25rem, 4vw, 1.75rem);">Lokasi Kantor Pusat di Peta</h3>
                <p class="text-center text-muted mb-4" style="font-size: clamp(0.9rem, 2.5vw, 1rem);">
                    <i class="fas fa-map-marker-alt text-danger me-2"></i>{{ $mainBranch->address }}
                </p>
                <div class="ratio ratio-21x9" style="min-height: 300px;">
                    <iframe 
                        src="https://maps.google.com/maps?q={{ urlencode($mainBranch->address) }}&hl=id&z=15&output=embed" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade"
                        title="Lokasi {{ $mainBranch->name }}">
                    </iframe>
                </div>
                <div class="text-center mt-3">
                    <a href="{{ $mainBranch->google_maps_url }}" target="_blank" class="btn btn-outline-primary btn-sm">
                        <i class="fas fa-map-marked-alt me-2"></i>Buka di Google Maps
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Contact Information Section -->
@if(isset($profile))
<section class="py-5 bg-light">
    <div class="container">
        <div class="row text-center mb-4">
            <div class="col-12">
                <h2 class="display-5 fw-bold mb-3" style="font-size: clamp(1.5rem, 5vw, 2.5rem);">Hubungi Kami</h2>
                <p class="lead text-muted" style="font-size: clamp(1rem, 3vw, 1.25rem); padding: 0 15px;">Tim kami siap membantu kebutuhan scaffolding Anda</p>
            </div>
        </div>
        
        <div class="row g-4 icon-grid-3">
            <div class="col-md-4 col-12">
                <div class="text-center p-4 bg-white rounded shadow-sm h-100">
                    <div class="mb-3">
                        <div class="d-inline-flex align-items-center justify-content-center bg-primary text-white rounded-circle" style="width: 60px; height: 60px;">
                            <i class="fas fa-phone fa-lg"></i>
                        </div>
                    </div>
                    <h5 class="fw-bold mb-2" style="font-size: clamp(1rem, 2.5vw, 1.125rem);">Telepon</h5>
                    @if($profile->phone)
                        <p class="text-muted mb-0">
                            <a href="tel:{{ $profile->phone }}" class="text-decoration-none text-primary" style="font-size: clamp(0.875rem, 2vw, 1rem); word-break: break-all;">{{ $profile->phone }}</a>
                        </p>
                    @else
                        <p class="text-muted mb-0">-</p>
                    @endif
                </div>
            </div>
            
            <div class="col-md-4 col-12">
                <div class="text-center p-4 bg-white rounded shadow-sm h-100">
                    <div class="mb-3">
                        <div class="d-inline-flex align-items-center justify-content-center bg-success text-white rounded-circle" style="width: 60px; height: 60px;">
                            <i class="fas fa-envelope fa-lg"></i>
                        </div>
                    </div>
                    <h5 class="fw-bold mb-2" style="font-size: clamp(1rem, 2.5vw, 1.125rem);">Email</h5>
                    @if($profile->email)
                        <p class="text-muted mb-0">
                            <a href="mailto:{{ $profile->email }}" class="text-decoration-none text-primary" style="font-size: clamp(0.875rem, 2vw, 1rem); word-break: break-all;">{{ $profile->email }}</a>
                        </p>
                    @else
                        <p class="text-muted mb-0">-</p>
                    @endif
                </div>
            </div>
            
            <div class="col-md-4 col-12">
                <div class="text-center p-4 bg-white rounded shadow-sm h-100">
                    <div class="mb-3">
                        <div class="d-inline-flex align-items-center justify-content-center bg-danger text-white rounded-circle" style="width: 60px; height: 60px;">
                            <i class="fas fa-map-marker-alt fa-lg"></i>
                        </div>
                    </div>
                    <h5 class="fw-bold mb-2" style="font-size: clamp(1rem, 2.5vw, 1.125rem);">Alamat</h5>
                    @if($profile->address)
                        <p class="text-muted mb-0" style="font-size: clamp(0.8rem, 2vw, 0.875rem); line-height: 1.5; padding: 0 10px;">{{ Str::limit($profile->address, 80) }}</p>
                    @else
                        <p class="text-muted mb-0">-</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- CTA Section -->
<!-- CTA Section -->
<section class="py-5 bg-primary text-white">
    <div class="container text-center px-3">
        <h2 class="display-5 fw-bold mb-3" style="font-size: clamp(1.5rem, 5vw, 2.5rem);">Siap Memulai Proyek Anda?</h2>
        <p class="lead mb-4" style="font-size: clamp(1rem, 3vw, 1.25rem); padding: 0 15px;">Hubungi kami sekarang untuk konsultasi gratis dan penawaran terbaik</p>
        <a href="{{ route('contact') }}" class="btn btn-light btn-lg" style="font-size: clamp(0.875rem, 2.5vw, 1rem); padding: 0.75rem 1.5rem;">
            <i class="fas fa-phone me-2"></i>Hubungi Kami Sekarang
        </a>
    </div>
</section>

<!-- Scroll to Top Button -->
<button id="scrollToTopBtn" class="scroll-to-top-btn" title="Scroll ke Atas">
    <i class="fas fa-arrow-up"></i>
</button>

<script>
// Scroll to Top Button Functionality
document.addEventListener('DOMContentLoaded', function() {
    const scrollToTopBtn = document.getElementById('scrollToTopBtn');
    
    if (!scrollToTopBtn) {
        console.warn('Scroll to Top button not found');
        return;
    }
    
    function toggleScrollButton() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop || 0;
        
        if (scrollTop > 100) {
            scrollToTopBtn.classList.add('show');
        } else {
            scrollToTopBtn.classList.remove('show');
        }
    }
    
    window.addEventListener('scroll', toggleScrollButton, { passive: true });
    
    scrollToTopBtn.addEventListener('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
    
    // Tambahkan event listener untuk touch (mobile)
    scrollToTopBtn.addEventListener('touchstart', function(e) {
        e.stopPropagation();
        this.style.transform = 'scale(0.95)';
    }, { passive: true });
    
    scrollToTopBtn.addEventListener('touchend', function(e) {
        e.preventDefault();
        e.stopPropagation();
        this.style.transform = 'scale(1)';
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }, { passive: false });
    
    setTimeout(toggleScrollButton, 100);
});
</script>
@endsection

@push('styles')
<style>
.branch-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.branch-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
}

.branch-card .card-body {
    min-height: 280px;
}

/* Branch Image Styling */
.branch-image-wrapper {
    overflow: hidden;
}

.branch-card-image {
    object-fit: cover;
    height: 100%;
    min-height: 200px;
}

.branch-placeholder {
    height: 100%;
    min-height: 200px;
}

/* Desktop: rounded-start untuk image */
@media (min-width: 768px) {
    .branch-card-image,
    .branch-placeholder {
        border-radius: 0.375rem 0 0 0.375rem;
        height: 100%;
        min-height: 280px;
    }
}

/* Mobile: rounded top untuk image */
@media (max-width: 767.98px) {
    .branch-card-image,
    .branch-placeholder {
        border-radius: 0.375rem 0.375rem 0 0;
        height: 200px;
        width: 100%;
    }
}

/* Mobile Optimization untuk Card */
@media (max-width: 991.98px) {
    .branch-card .card-body {
        min-height: auto;
    }
    
    .branch-card .row.g-0 > [class*="col-"] {
        padding: 0;
    }
}

@media (max-width: 768px) {
    /* Section Padding Mobile */
    section {
        padding: 3rem 0 !important;
    }
    
    /* Card Improvements */
    .branch-card {
        margin-bottom: 1.5rem;
        border-radius: 12px;
        overflow: hidden;
    }
    
    .branch-card img {
        border-radius: 0 !important;
    }
    
    /* Contact Cards Mobile */
    .col-md-4 .bg-white {
        margin-bottom: 1rem;
    }
    
    /* Button Improvements Mobile */
    .btn-lg {
        font-size: 1rem !important;
        padding: 0.75rem 1.5rem !important;
    }
    
    .btn-sm {
        font-size: 0.8rem !important;
        padding: 0.5rem 1rem !important;
        min-height: 44px; /* Touch target minimum */
    }
    
    /* Typography Mobile */
    .display-5 {
        font-size: 1.75rem !important;
    }
    
    .display-4 {
        font-size: 2rem !important;
    }
    
    /* Map Responsive */
    .ratio-21x9 {
        --bs-aspect-ratio: 56.25%;
        min-height: 250px;
    }
    
    /* Gap adjustments */
    .gap-2 {
        gap: 0.75rem !important;
    }
    
    /* Padding adjustments */
    .p-4 {
        padding: 1.5rem !important;
    }
}

@media (max-width: 576px) {
    /* Extra Small Mobile */
    section {
        padding: 2rem 0 !important;
    }
    
    .container {
        padding-left: 1rem;
        padding-right: 1rem;
    }
    
    /* Card Padding */
    .card-body {
        padding: 1rem !important;
    }
    
    /* Button Full Width on Mobile */
    .btn-sm.flex-grow-1 {
        width: 100%;
    }
    
    /* Icon sizes */
    .fa-2x {
        font-size: 1.5em !important;
    }
    
    /* Badge adjustments */
    .badge {
        font-size: 0.7rem !important;
        padding: 0.35rem 0.6rem;
    }
    
    /* Map height */
    .ratio-21x9 {
        min-height: 200px;
    }
    
    /* Text adjustments */
    small {
        font-size: 0.75rem !important;
    }
    
    /* Contact section spacing */
    .col-md-4 {
        margin-bottom: 1.5rem;
    }
}

/* Button Styles - Jelas dan Konsisten */
.btn-success {
    background: #16a34a !important;
    color: white !important;
    font-weight: 600 !important;
    border: 2px solid #16a34a !important;
    border-radius: 8px;
    padding: 0.5rem 1rem;
    transition: all 0.3s ease;
    box-shadow: 0 3px 10px rgba(22, 163, 74, 0.4);
    text-decoration: none;
}

.btn-success:hover {
    background: #15803d !important;
    color: white !important;
    border-color: #15803d !important;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(22, 163, 74, 0.5);
}

.btn-success.btn-sm {
    padding: 0.4rem 0.8rem;
    font-size: 0.875rem;
}

.btn-success i {
    color: white !important;
}

.btn-outline-primary {
    background: transparent !important;
    color: #dc2626 !important;
    font-weight: 600 !important;
    border: 2px solid #dc2626 !important;
    border-radius: 8px;
    padding: 0.5rem 1rem;
    transition: all 0.3s ease;
    box-shadow: 0 2px 8px rgba(220, 38, 38, 0.2);
    text-decoration: none;
}

.btn-outline-primary:hover {
    background: #dc2626 !important;
    color: white !important;
    border-color: #dc2626 !important;
    box-shadow: 0 4px 12px rgba(220, 38, 38, 0.4);
    transform: translateY(-2px);
}

.btn-outline-primary.btn-sm {
    padding: 0.4rem 0.8rem;
    font-size: 0.875rem;
}

.btn-outline-primary i {
    color: inherit !important;
}

.btn-outline-primary:hover i {
    color: white !important;
}

.btn-light {
    background: white !important;
    color: #212529 !important;
    font-weight: 600 !important;
    border: 2px solid white !important;
    border-radius: 8px;
    padding: 0.6rem 1.2rem;
    transition: all 0.3s ease;
    box-shadow: 0 3px 10px rgba(255, 255, 255, 0.3);
    text-decoration: none;
}

.btn-light:hover {
    background: #f8f9fa !important;
    color: #212529 !important;
    border-color: #f8f9fa !important;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(255, 255, 255, 0.4);
}

.btn-light i {
    color: #212529 !important;
}

/* CTA Section */
.cta-section {
    background: #dc2626;
    position: relative;
    overflow: hidden;
}

.cta-section::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -10%;
    width: 500px;
    height: 500px;
    background: #16a34a;
    border-radius: 50%;
    opacity: 0.1;
    animation: float 6s ease-in-out infinite;
}

@keyframes float {
    0%, 100% {
        transform: translateY(0) rotate(0deg);
    }
    50% {
        transform: translateY(-20px) rotate(180deg);
    }
}

/* Scroll to Top Button */
.scroll-to-top-btn {
    position: fixed;
    bottom: 25px;
    right: 25px;
    width: 52px;
    height: 52px;
    border-radius: 50%;
    background: #dc2626;
    color: white;
    display: flex !important;
    align-items: center;
    justify-content: center;
    font-size: 1.35rem;
    border: none;
    cursor: pointer;
    box-shadow: 0 4px 15px rgba(220, 38, 38, 0.4), 0 0 0 3px rgba(255, 255, 255, 0.1);
    transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
    z-index: 9999;
    opacity: 0;
    transform: translateX(100px) scale(0.8);
    pointer-events: none;
    visibility: hidden;
}

.scroll-to-top-btn.show {
    opacity: 1;
    transform: translateX(0) scale(1);
    pointer-events: auto;
    visibility: visible;
}

.scroll-to-top-btn:hover {
    background: #b91c1c;
    transform: translateY(-8px) scale(1.08);
    box-shadow: 0 8px 30px rgba(220, 38, 38, 0.5), 0 0 0 4px rgba(255, 255, 255, 0.2);
}

.scroll-to-top-btn:active {
    transform: translateY(-4px) scale(1.03);
    box-shadow: 0 4px 20px rgba(220, 38, 38, 0.4), 0 0 0 3px rgba(255, 255, 255, 0.15);
}

.scroll-to-top-btn i {
    transition: transform 0.3s ease;
}

.scroll-to-top-btn:hover i {
    transform: translateY(-3px);
}

.btn-outline-light {
    background: transparent !important;
    color: white !important;
    font-weight: 600 !important;
    border: 2px solid white !important;
    border-radius: 8px;
    padding: 0.6rem 1.2rem;
    transition: all 0.3s ease;
    box-shadow: 0 2px 8px rgba(255, 255, 255, 0.2);
    text-decoration: none;
}

.btn-outline-light:hover {
    background: white !important;
    color: #dc2626 !important;
    border-color: white !important;
    box-shadow: 0 4px 12px rgba(255, 255, 255, 0.4);
    transform: translateY(-2px);
}

@media (max-width: 768px) {
    .scroll-to-top-btn {
        bottom: 90px; /* Lebih tinggi agar tidak bertumpuk dengan floating buttons */
        right: 20px;
        width: 48px;
        height: 48px;
        font-size: 1.2rem;
        z-index: 10000 !important; /* Pastikan di atas semua elemen */
        pointer-events: auto !important;
        touch-action: manipulation;
        -webkit-tap-highlight-color: rgba(220, 38, 38, 0.3);
    }
    
    .scroll-to-top-btn.show {
        pointer-events: auto !important;
        z-index: 10000 !important;
    }
}

/* Extra small mobile - posisi lebih tinggi lagi */
@media (max-width: 480px) {
    .scroll-to-top-btn {
        bottom: 100px; /* Lebih tinggi lagi untuk layar kecil */
        right: 15px;
        width: 50px; /* Lebih besar untuk memudahkan tap */
        height: 50px;
        font-size: 1.1rem;
        z-index: 10000 !important;
        pointer-events: auto !important;
        touch-action: manipulation;
        min-width: 50px;
        min-height: 50px;
    }
    
    .scroll-to-top-btn.show {
        pointer-events: auto !important;
        z-index: 10000 !important;
    }
}

/* Landscape mobile */
@media (max-width: 768px) and (orientation: landscape) {
    .scroll-to-top-btn {
        bottom: 80px;
        right: 20px;
    }
}
    
    /* Prevent hover effects on touch devices */
    .branch-card:hover {
        transform: none;
    }
    
    .btn-success:hover,
    .btn-outline-primary:hover,
    .btn-light:hover {
        transform: none;
    }


/* Touch device optimizations */
@media (hover: none) and (pointer: coarse) {
    .branch-card:hover {
        transform: none;
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important;
    }
    
    .branch-card:active {
        transform: scale(0.98);
    }
    
    .btn-success:active,
    .btn-outline-primary:active,
    .btn-light:active {
        transform: scale(0.95);
    }
}

/* Landscape mobile optimizations */
@media (max-width: 991.98px) and (orientation: landscape) {
    .branches-hero {
        padding: 60px 0 40px;
    }
    
    .branch-card .card-body {
        min-height: auto;
        padding: 1rem !important;
    }
}

/* Print styles */
@media print {
    .scroll-to-top-btn,
    .btn {
        display: none !important;
    }
    
    .branch-card {
        break-inside: avoid;
        page-break-inside: avoid;
    }
}
</style>
@endpush
