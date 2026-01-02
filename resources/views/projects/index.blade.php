@extends('layouts.app')

@section('title', 'Galeri Proyek - Tata Bhuana Scaffolding')
@section('description', 'Lihat galeri proyek-proyek scaffolding yang telah berhasil diselesaikan oleh Tata Bhuana Scaffolding.')

@section('content')
<!-- Hero Section -->
<section class="projects-hero text-white py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center hero-content">
                <h1 class="display-3 fw-bold mb-3">Galeri Proyek</h1>
                <p class="lead hero-subtitle">Portofolio proyek scaffolding yang telah berhasil kami selesaikan</p>
            </div>
        </div>
    </div>
</section>


<!-- Filters -->
<section class="py-4 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form method="GET" action="{{ route('projects.index') }}" class="row g-3">
                    <div class="col-md-3">
                        <input type="text" name="search" class="form-control" placeholder="Cari proyek..." value="{{ request('search') }}">
                    </div>
                    
                    <div class="col-md-3">
                        <select name="type" class="form-select">
                            <option value="">Semua Jenis Proyek</option>
                            <option value="konstruksi" {{ request('type') == 'konstruksi' ? 'selected' : '' }}>Konstruksi</option>
                            <option value="renovasi" {{ request('type') == 'renovasi' ? 'selected' : '' }}>Renovasi</option>
                            <option value="maintenance" {{ request('type') == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                            <option value="event" {{ request('type') == 'event' ? 'selected' : '' }}>Event</option>
                        </select>
                    </div>
                    
                    <div class="col-md-3">
                        <select name="status" class="form-select">
                            <option value="">Semua Status</option>
                            <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Selesai</option>
                            <option value="ongoing" {{ request('status') == 'ongoing' ? 'selected' : '' }}>Berlangsung</option>
                            <option value="planning" {{ request('status') == 'planning' ? 'selected' : '' }}>Perencanaan</option>
                        </select>
                    </div>
                    
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-success-modern w-100">
                            <i class="fas fa-filter me-2"></i>Filter
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Projects Grid -->
<section class="py-5">
    <div class="container">
        @if($projects->count() > 0)
            <div class="row g-4">
                @foreach($projects as $project)
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 shadow-sm project-card">
                        @if($project->images && count($project->images) > 0)
                            <div class="project-image-container" style="position: relative; overflow: hidden;">
                                <img src="{{ asset('storage/' . $project->images[0]) }}" class="card-img-top" alt="{{ $project->title }}" style="height: 250px; object-fit: cover;">
                                @if(count($project->images) > 1)
                                    <div class="position-absolute top-0 end-0 m-2 image-count-badge">
                                        <small><i class="fas fa-images me-1"></i>{{ count($project->images) }}</small>
                                    </div>
                                @endif
                                @if($project->is_featured)
                                    <div class="position-absolute top-0 start-0 m-2 featured-badge">
                                        <small><i class="fas fa-star me-1"></i>Featured</small>
                                    </div>
                                @endif
                            </div>
                        @else
                            <div class="bg-light d-flex align-items-center justify-content-center" style="height: 250px;">
                                <div class="text-center">
                                    <i class="fas fa-image fa-3x text-muted mb-2"></i>
                                    <p class="text-muted">Tidak ada gambar</p>
                                </div>
                            </div>
                        @endif
                        
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold">{{ $project->title }}</h5>
                            <p class="card-text text-muted flex-grow-1">{{ Str::limit($project->description, 120) }}</p>
                            
                            <div class="mb-3">
                                <div class="row text-center">
                                    <div class="col-6">
                                        <small class="text-muted d-block">Klien</small>
                                        <strong class="small">{{ $project->client_name }}</strong>
                                    </div>
                                    <div class="col-6">
                                        <small class="text-muted d-block">Lokasi</small>
                                        <strong class="small">{{ $project->location }}</strong>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <span class="badge badge-primary-modern me-2">{{ ucfirst($project->project_type) }}</span>
                                <span class="badge badge-status-modern status-{{ $project->status_badge }}">{{ $project->status_text }}</span>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <small class="text-muted">Mulai:</small>
                                    <strong class="d-block">{{ $project->formatted_start_date }}</strong>
                                </div>
                                <div>
                                    <small class="text-muted">Durasi:</small>
                                    <strong class="d-block">{{ $project->duration }}</strong>
                                </div>
                            </div>
                            
                            <a href="{{ route('projects.show', $project) }}" class="btn btn-success-modern">
                                <i class="fas fa-eye me-2"></i>Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <!-- Pagination -->
            @if($projects->hasPages())
            <div class="row mt-5">
                <div class="col-12">
                    {{ $projects->links() }}
                </div>
            </div>
            @endif
        @else
            <div class="text-center py-5">
                <i class="fas fa-folder-open fa-3x text-muted mb-3"></i>
                <h4 class="text-muted">Tidak ada proyek yang ditemukan</h4>
                <p class="text-muted">Coba ubah filter pencarian Anda</p>
                <a href="{{ route('projects.index') }}" class="btn btn-success-modern">
                    <i class="fas fa-refresh me-2"></i>Reset Filter
                </a>
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
<<!-- CTA Section -->
<section class="py-5 bg-primary text-white">
    <div class="container text-center">
        <h2 class="display-5 fw-bold mb-3">Siap Memulai Proyek Anda?</h2>
        <p class="lead mb-4">Hubungi kami sekarang untuk konsultasi gratis dan penawaran terbaik</p>
        <a href="{{ route('contact') }}" class="btn btn-light btn-lg">
            <i class="fas fa-phone me-2"></i>Hubungi Kami Sekarang
        </a>
    </div>
</section>

<style>
/* Hero Section */
.projects-hero {
    background: #dc2626;
    padding: 120px 0 80px;
    position: relative;
    overflow: hidden;
}

.hero-content {
    animation: fadeInUp 0.8s ease-out;
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

.hero-subtitle {
    animation: fadeInUp 1s ease-out 0.2s both;
    font-size: 1.5rem;
}

/* Project Cards */
.project-card {
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    animation: fadeInUp 0.8s ease-out forwards;
    opacity: 0;
    border: 2px solid transparent;
    border-radius: 15px;
    position: relative;
}

.project-card:nth-child(1) { animation-delay: 0.1s; }
.project-card:nth-child(2) { animation-delay: 0.2s; }
.project-card:nth-child(3) { animation-delay: 0.3s; }
.project-card:nth-child(4) { animation-delay: 0.4s; }
.project-card:nth-child(5) { animation-delay: 0.5s; }
.project-card:nth-child(6) { animation-delay: 0.6s; }

.project-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
    border-color: #dc2626;
}

.project-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
    background: #16a34a;
    transform: scaleX(0);
    transition: transform 0.4s ease;
    border-radius: 15px 15px 0 0;
    z-index: 1;
}

.project-card:hover::before {
    transform: scaleX(1);
}

.project-image-container {
    position: relative;
    overflow: hidden;
}

.image-count-badge {
    position: absolute;
    top: 10px;
    right: 10px;
    background: rgba(255, 255, 255, 0.95);
    color: #333;
    padding: 5px 12px;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 600;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    z-index: 2;
}

.featured-badge {
    position: absolute;
    top: 10px;
    left: 10px;
    background: #16a34a;
    color: white;
    padding: 5px 12px;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 600;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    z-index: 2;
}

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

/* Badge Styles */
.badge-primary-modern {
    background: #dc2626;
    color: white;
}

.badge-status-modern.status-success {
    background: #16a34a;
    color: white;
}

.badge-status-modern.status-warning {
    background: #f59e0b;
    color: white;
}

.badge-status-modern.status-danger {
    background: #ef4444;
    color: white;
}

.badge-status-modern.status-info {
    background: #3b82f6;
    color: white;
}

@media (max-width: 768px) {
    .projects-hero {
        padding: 80px 0 60px;
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
        z-index: 9996; /* Di bawah floating buttons tapi masih di atas konten */
    }
}

/* Extra small mobile - posisi lebih tinggi lagi */
@media (max-width: 480px) {
    .scroll-to-top-btn {
        bottom: 100px; /* Lebih tinggi lagi untuk layar kecil */
        right: 15px;
        width: 46px;
        height: 46px;
        font-size: 1.1rem;
    }
}

/* Landscape mobile */
@media (max-width: 768px) and (orientation: landscape) {
    .scroll-to-top-btn {
        bottom: 80px;
        right: 20px;
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
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
    
    // Check initial scroll position setelah sedikit delay
    setTimeout(toggleScrollButton, 100);
});
</script>
@endsection

