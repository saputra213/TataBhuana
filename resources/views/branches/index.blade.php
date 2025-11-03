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
                <div class="col-lg-6 col-md-6">
                    <div class="card h-100 shadow-sm branch-card">
                        <div class="row g-0">
                            <div class="col-md-4">
                                @if($branch->image)
                                    <img src="{{ asset('storage/' . $branch->image) }}" class="img-fluid rounded-start h-100" alt="{{ $branch->name }}" style="object-fit: cover;">
                                @else
                                    <div class="bg-light d-flex align-items-center justify-content-center h-100">
                                        <div class="text-center">
                                            <i class="fas fa-building fa-2x text-muted mb-2"></i>
                                            <p class="text-muted small">Tidak ada gambar</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            
                            <div class="col-md-8">
                                <div class="card-body d-flex flex-column h-100">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <h5 class="card-title fw-bold mb-0">{{ $branch->name }}</h5>
                                        @if($branch->is_main_branch)
                                            <span class="badge bg-warning">
                                                <i class="fas fa-star me-1"></i>Kantor Pusat
                                            </span>
                                        @endif
                                    </div>
                                    
                                    <p class="text-muted small mb-3">{{ Str::limit($branch->description, 100) }}</p>
                                    
                                    <div class="mb-3">
                                        <div class="d-flex align-items-start mb-2">
                                            <i class="fas fa-map-marker-alt text-primary me-2 mt-1"></i>
                                            <small class="text-muted">{{ $branch->address }}</small>
                                        </div>
                                        
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="fas fa-phone text-primary me-2"></i>
                                            <small class="text-muted">{{ $branch->phone }}</small>
                                        </div>
                                        
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="fas fa-envelope text-primary me-2"></i>
                                            <small class="text-muted">{{ $branch->email }}</small>
                                        </div>
                                        
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="fas fa-user text-primary me-2"></i>
                                            <small class="text-muted">Manager: {{ $branch->manager_name }}</small>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-auto">
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('branches.show', $branch) }}" class="btn btn-success btn-sm flex-grow-1">
                                                <i class="fas fa-eye me-1"></i>Detail
                                            </a>
                                            <a href="{{ $branch->google_maps_url }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                                <i class="fas fa-map-marked-alt"></i>
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
            <div class="text-center py-5">
                <i class="fas fa-building fa-3x text-muted mb-3"></i>
                <h4 class="text-muted">Belum ada cabang yang tersedia</h4>
                <p class="text-muted">Silakan hubungi kami untuk informasi lebih lanjut</p>
                <a href="https://wa.me/6281234567890?text=Halo, saya tertarik dengan layanan scaffolding dari Tata Bhuana" target="_blank" class="btn btn-success">
                    <i class="fab fa-whatsapp me-2"></i>Hubungi via WhatsApp
                </a>
            </div>
        @endif
    </div>
</section>

<!-- Map Section -->
@if($branches->count() > 0)
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="fw-bold mb-4 text-center">Lokasi Cabang di Peta</h3>
                <div class="ratio ratio-21x9">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.521260322283!2d106.81956131576984!3d-6.194745895493029!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5390917b759%3A0x6b45e67356080477!2sJakarta%2C%20Indonesia!5e0!3m2!1sen!2sus!4v1635781234567!5m2!1sen!2sus" 
                            style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
                <h2 class="display-5 fw-bold mb-3">Hubungi Kami</h2>
                <p class="lead text-muted">Tim kami siap membantu kebutuhan scaffolding Anda</p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-md-4">
                <div class="text-center p-4 bg-white rounded shadow-sm h-100">
                    <div class="mb-3">
                        <div class="d-inline-flex align-items-center justify-content-center bg-primary text-white rounded-circle" style="width: 60px; height: 60px;">
                            <i class="fas fa-phone fa-lg"></i>
                        </div>
                    </div>
                    <h5 class="fw-bold mb-2">Telepon</h5>
                    @if($profile->phone)
                        <p class="text-muted mb-0">
                            <a href="tel:{{ $profile->phone }}" class="text-decoration-none text-primary">{{ $profile->phone }}</a>
                        </p>
                    @else
                        <p class="text-muted mb-0">-</p>
                    @endif
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="text-center p-4 bg-white rounded shadow-sm h-100">
                    <div class="mb-3">
                        <div class="d-inline-flex align-items-center justify-content-center bg-success text-white rounded-circle" style="width: 60px; height: 60px;">
                            <i class="fas fa-envelope fa-lg"></i>
                        </div>
                    </div>
                    <h5 class="fw-bold mb-2">Email</h5>
                    @if($profile->email)
                        <p class="text-muted mb-0">
                            <a href="mailto:{{ $profile->email }}" class="text-decoration-none text-primary">{{ $profile->email }}</a>
                        </p>
                    @else
                        <p class="text-muted mb-0">-</p>
                    @endif
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="text-center p-4 bg-white rounded shadow-sm h-100">
                    <div class="mb-3">
                        <div class="d-inline-flex align-items-center justify-content-center bg-danger text-white rounded-circle" style="width: 60px; height: 60px;">
                            <i class="fas fa-map-marker-alt fa-lg"></i>
                        </div>
                    </div>
                    <h5 class="fw-bold mb-2">Alamat</h5>
                    @if($profile->address)
                        <p class="text-muted mb-0 small">{{ Str::limit($profile->address, 50) }}</p>
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
    <div class="container text-center">
        <h2 class="display-5 fw-bold mb-3">Siap Memulai Proyek Anda?</h2>
        <p class="lead mb-4">Hubungi kami sekarang untuk konsultasi gratis dan penawaran terbaik</p>
        <a href="{{ route('contact') }}" class="btn btn-light btn-lg">
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
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
    
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
        bottom: 20px;
        right: 20px;
        width: 48px;
        height: 48px;
        font-size: 1.2rem;
    }
}
</style>
@endpush
