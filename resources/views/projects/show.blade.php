@extends('layouts.app')

@section('title', $project->title . ' - Galeri Proyek Tata Bhuana')
@section('description', $project->description)

@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="py-3 bg-light">
    <div class="container">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ route('projects.index') }}">Galeri Proyek</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $project->title }}</li>
        </ol>
    </div>
</nav>

<!-- Project Detail -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <!-- Project Images -->
            <div class="col-lg-8 mb-4">
                @if($project->images && count($project->images) > 0)
                    <div id="projectCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            @foreach($project->images as $index => $image)
                                <button type="button" data-bs-target="#projectCarousel" data-bs-slide-to="{{ $index }}" 
                                        class="{{ $index === 0 ? 'active' : '' }}" aria-current="{{ $index === 0 ? 'true' : 'false' }}" 
                                        aria-label="Slide {{ $index + 1 }}"></button>
                            @endforeach
                        </div>
                        
                        <div class="carousel-inner">
                            @foreach($project->images as $index => $image)
                                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                    <img src="{{ asset('storage/' . $image) }}" class="d-block w-100 rounded shadow" 
                                         alt="{{ $project->title }}" style="height: 500px; object-fit: cover;">
                                </div>
                            @endforeach
                        </div>
                        
                        <button class="carousel-control-prev" type="button" data-bs-target="#projectCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#projectCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                @else
                    <div class="bg-light d-flex align-items-center justify-content-center rounded shadow" style="height: 500px;">
                        <div class="text-center">
                            <i class="fas fa-image fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted">Tidak ada gambar tersedia</h5>
                        </div>
                    </div>
                @endif
            </div>
            
            <!-- Project Info -->
            <div class="col-lg-4">
                <div class="card shadow">
                    <div class="card-body">
                        <h1 class="h3 fw-bold mb-3">{{ $project->title }}</h1>
                        
                        @if($project->is_featured)
                            <div class="mb-3">
                                <span class="badge bg-warning fs-6">
                                    <i class="fas fa-star me-1"></i>Proyek Unggulan
                                </span>
                            </div>
                        @endif
                        
                        <div class="mb-4">
                            <p class="text-muted">{{ $project->description }}</p>
                        </div>
                        
                        <!-- Project Details -->
                        <div class="row g-3 mb-4">
                            <div class="col-6">
                                <div class="text-center p-3 bg-light rounded">
                                    <h6 class="text-muted mb-1">Klien</h6>
                                    <strong>{{ $project->client_name }}</strong>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-center p-3 bg-light rounded">
                                    <h6 class="text-muted mb-1">Lokasi</h6>
                                    <strong>{{ $project->location }}</strong>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-center p-3 bg-light rounded">
                                    <h6 class="text-muted mb-1">Jenis</h6>
                                    <strong>{{ ucfirst($project->project_type) }}</strong>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-center p-3 bg-light rounded">
                                    <h6 class="text-muted mb-1">Status</h6>
                                    <span class="badge bg-{{ $project->status_badge }}">{{ $project->status_text }}</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Timeline -->
                        <div class="mb-4">
                            <h6 class="fw-bold mb-3">Timeline Proyek</h6>
                            <div class="timeline">
                                <div class="timeline-item">
                                    <div class="timeline-marker bg-primary"></div>
                                    <div class="timeline-content">
                                        <h6 class="mb-1">Mulai Proyek</h6>
                                        <p class="text-muted mb-0">{{ $project->formatted_start_date }}</p>
                                    </div>
                                </div>
                                @if($project->end_date)
                                <div class="timeline-item">
                                    <div class="timeline-marker bg-success"></div>
                                    <div class="timeline-content">
                                        <h6 class="mb-1">Selesai</h6>
                                        <p class="text-muted mb-0">{{ $project->formatted_end_date }}</p>
                                    </div>
                                </div>
                                @endif
                                <div class="timeline-item">
                                    <div class="timeline-marker bg-info"></div>
                                    <div class="timeline-content">
                                        <h6 class="mb-1">Durasi</h6>
                                        <p class="text-muted mb-0">{{ $project->duration }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Action Buttons -->
                        <div class="d-grid gap-2">
                            <a href="{{ route('contact') }}" class="btn btn-success-modern btn-lg">
                                <i class="fas fa-phone me-2"></i>Konsultasi Proyek Serupa
                            </a>
                            <a href="{{ route('projects.index') }}" class="btn btn-outline-red-modern">
                                <i class="fas fa-arrow-left me-2"></i>Kembali ke Galeri
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        
        <!-- Related Projects -->
        @if($relatedProjects->count() > 0)
        <div class="row mt-5">
            <div class="col-12">
                <h3 class="fw-bold mb-4">Proyek Terkait</h3>
                <div class="row g-4">
                    @foreach($relatedProjects as $related)
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100 shadow-sm">
                            @if($related->images && count($related->images) > 0)
                                <img src="{{ asset('storage/' . $related->images[0]) }}" class="card-img-top" alt="{{ $related->title }}" style="height: 200px; object-fit: cover;">
                            @else
                                <div class="bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                                    <i class="fas fa-image fa-2x text-muted"></i>
                                </div>
                            @endif
                            
                            <div class="card-body d-flex flex-column">
                                <h6 class="card-title fw-bold">{{ $related->title }}</h6>
                                <p class="card-text text-muted small flex-grow-1">{{ Str::limit($related->description, 80) }}</p>
                                
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="badge badge-primary-modern">{{ ucfirst($related->project_type) }}</span>
                                    <a href="{{ route('projects.show', $related) }}" class="btn btn-sm btn-outline-red-modern">Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
    </div>
</section>

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
        
        <div class="row g-4 icon-grid-3">
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


<style>
/* Button Styles - Jelas dan Konsisten */
.btn-success-modern {
    background: #16a34a;
    color: white !important;
    font-weight: 600;
    border: 2px solid #16a34a;
    border-radius: 8px;
    padding: 0.6rem 1.2rem;
    transition: all 0.3s ease;
    box-shadow: 0 3px 10px rgba(22, 163, 74, 0.4);
    text-decoration: none;
}

.btn-success-modern:hover {
    background: #15803d;
    color: white !important;
    border-color: #15803d;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(22, 163, 74, 0.5);
}

.btn-outline-red-modern {
    background: transparent;
    color: #dc2626 !important;
    font-weight: 600;
    border: 2px solid #dc2626;
    border-radius: 8px;
    padding: 0.6rem 1.2rem;
    transition: all 0.3s ease;
    box-shadow: 0 2px 8px rgba(220, 38, 38, 0.2);
    text-decoration: none;
}

.btn-outline-red-modern:hover {
    background: #dc2626;
    color: white !important;
    border-color: #dc2626;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(220, 38, 38, 0.4);
}

.btn-sm.btn-outline-red-modern {
    font-size: 0.875rem;
    padding: 0.25rem 0.75rem;
}

/* Badge Styles */
.badge-primary-modern {
    background: #dc2626;
    color: white;
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

.cta-content {
    position: relative;
    z-index: 2;
}

.cta-button {
    background: white;
    color: #dc2626;
    font-weight: 700;
    border-radius: 50px;
    border: none;
    transition: all 0.4s ease;
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
}

.cta-button:hover {
    transform: translateY(-5px) scale(1.05);
    box-shadow: 0 15px 40px rgba(0,0,0,0.3);
    color: #dc2626;
    background: white;
}

.cta-button i {
    animation: phone-ring 2s ease-in-out infinite;
}

@keyframes phone-ring {
    0%, 100% {
        transform: rotate(0deg);
    }
    10%, 30% {
        transform: rotate(-15deg);
    }
    20% {
        transform: rotate(15deg);
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

@media (max-width: 768px) {
    .scroll-to-top-btn {
        bottom: 90px; /* Lebih tinggi agar tidak bertumpuk dengan floating buttons */
        right: 20px;
        width: 48px;
        height: 48px;
        font-size: 1.2rem;
        z-index: 10000 !important; /* Pastikan di atas semua elemen termasuk floating buttons */
        pointer-events: auto !important; /* Pastikan bisa diklik */
        touch-action: manipulation; /* Optimasi untuk touch */
        -webkit-tap-highlight-color: rgba(220, 38, 38, 0.3); /* Highlight saat tap di mobile */
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
        width: 50px; /* Sedikit lebih besar untuk memudahkan tap */
        height: 50px;
        font-size: 1.1rem;
        z-index: 10000 !important;
        pointer-events: auto !important;
        touch-action: manipulation;
        min-width: 50px; /* Minimum touch target size */
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
        z-index: 10000 !important;
        pointer-events: auto !important;
    }
}
</style>

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
    
    // Function to show/hide button based on scroll position
    function toggleScrollButton() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop || 0;
        
        // Button muncul setelah scroll 100px saja
        if (scrollTop > 100) {
            scrollToTopBtn.classList.add('show');
        } else {
            scrollToTopBtn.classList.remove('show');
        }
    }
    
    // Listen to scroll event
    window.addEventListener('scroll', toggleScrollButton, { passive: true });
    
    // Scroll to top when button is clicked
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
    }, { passive: true });
    
    scrollToTopBtn.addEventListener('touchend', function(e) {
        e.preventDefault();
        e.stopPropagation();
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }, { passive: false });
    
    // Check initial scroll position setelah sedikit delay
    setTimeout(toggleScrollButton, 100);
});
</script>
@endsection

@push('styles')
<style>
.timeline {
    position: relative;
    padding-left: 30px;
}

.timeline::before {
    content: '';
    position: absolute;
    left: 15px;
    top: 0;
    bottom: 0;
    width: 2px;
    background: #dee2e6;
}

.timeline-item {
    position: relative;
    margin-bottom: 20px;
}

.timeline-marker {
    position: absolute;
    left: -22px;
    top: 5px;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    border: 2px solid #fff;
    box-shadow: 0 0 0 2px #dee2e6;
}

.timeline-content {
    padding-left: 10px;
}
</style>
@endpush




