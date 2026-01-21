@extends('layouts.app')

@section('title', 'Kontak - Tata Bhuana Scaffolding')
@section('description', 'Hubungi kami untuk konsultasi dan penawaran scaffolding terbaik untuk proyek konstruksi Anda.')

@section('content')
<style>
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

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
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

.page-header-animated {
    animation: slideInTop 0.6s ease-out;
}

.contact-card {
    animation: fadeInUp 0.8s ease-out forwards;
    opacity: 0;
}

.contact-card:nth-child(1) { animation-delay: 0.1s; }
.contact-card:nth-child(2) { animation-delay: 0.2s; }
.contact-card:nth-child(3) { animation-delay: 0.3s; }
.contact-card:nth-child(4) { animation-delay: 0.4s; }

.branch-card {
    animation: fadeInUp 0.8s ease-out forwards;
    opacity: 0;
}

.branch-card:nth-child(1) { animation-delay: 0.1s; }
.branch-card:nth-child(2) { animation-delay: 0.3s; }
.branch-card:nth-child(3) { animation-delay: 0.5s; }
</style>

<!-- Hero Section -->
<section class="contact-hero text-white py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center hero-content">
                <h1 class="display-3 fw-bold mb-3">Hubungi Kami</h1>
                <p class="lead hero-subtitle">Kami siap membantu kebutuhan scaffolding proyek Anda</p>
            </div>
        </div>
    </div>
</section>

<!-- Quick Contact Section -->
@if($profile)
<section class="py-5 bg-white">
    <div class="container">
        <div class="row g-4 mb-5 icon-grid-3">
            <div class="col-lg-3 col-md-6">
                <div class="contact-card h-100">
                    <div class="contact-icon bg-primary">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <h5 class="fw-bold mt-3 mb-2">Telepon</h5>
                    <p class="text-muted mb-0">
                        <a href="tel:{{ $profile->phone }}" class="text-decoration-none">{{ $profile->phone }}</a>
                    </p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="contact-card h-100">
                    <div class="contact-icon bg-success">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h5 class="fw-bold mt-3 mb-2">Email</h5>
                    <p class="text-muted mb-0">
                        <a href="mailto:{{ $profile->email }}" class="text-decoration-none">{{ $profile->email }}</a>
                    </p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="contact-card h-100">
                    <div class="contact-icon bg-info">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h5 class="fw-bold mt-3 mb-2">Alamat</h5>
                    <p class="text-muted mb-0 small">{{ Str::limit($profile->address, 50) }}</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="contact-card h-100">
                    <div class="contact-icon bg-warning">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h5 class="fw-bold mt-3 mb-2">Jam Operasional</h5>
                    <p class="text-muted mb-0 small">Senin - Jumat: 08:00 - 17:00</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Branches Section -->
<section class="py-5 bg-light">
    <div class="container">
    
        
        @if($branches->count() > 0)
            <div class="row g-4">
                @foreach($branches as $branch)
                <div class="col-lg-4 col-md-6">
                    <div class="branch-card card h-100 shadow-sm border-0 position-relative overflow-hidden">
                        @if($branch->is_main_branch)
                        <div class="branch-badge" title="Kantor Pusat" data-bs-toggle="tooltip">
                            <i class="fas fa-star"></i>
                        </div>
                        @endif
                        
                        <div class="card-body p-4">
                            <h4 class="fw-bold mb-3">{{ $branch->name }}</h4>
                            
                            <div class="branch-info mb-3">
                                <div class="info-item mb-2">
                                    <i class="fas fa-map-marker-alt text-primary me-2"></i>
                                    <span class="small">{{ $branch->address }}</span>
                                </div>
                                
                                <div class="info-item mb-2">
                                    <i class="fas fa-phone text-primary me-2"></i>
                                    <span class="small">{{ $branch->phone }}</span>
                                </div>
                            </div>

                            @php
                                $wa_number = preg_replace('/[^0-9]/', '', $branch->phone);
                                if(substr($wa_number, 0, 1) == '0') {
                                    $wa_number = '62' . substr($wa_number, 1);
                                }
                            @endphp
                            <a href="https://wa.me/{{ $wa_number }}" target="_blank" rel="noopener" class="btn btn-success w-100 mt-auto">
                                <i class="fab fa-whatsapp me-2"></i>Hubungi via WhatsApp
                            </a>
                            
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-info text-center">
                <i class="fas fa-info-circle me-2"></i>Informasi cabang akan segera ditambahkan.
            </div>
        @endif
    </div>
</section>

<style>
.contact-card {
    text-align: center;
    padding: 2rem;
    border-radius: 15px;
    background: white;
    box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
    border: 1px solid #f0f0f0;
}

.contact-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
}

.contact-icon {
    width: 70px;
    height: 70px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    font-size: 1.5rem;
    color: white;
    background: #dc2626;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

.contact-card:hover .contact-icon {
    transform: rotate(360deg) scale(1.1);
    background: #16a34a;
}

.branch-card {
    transition: all 0.3s ease;
    border-radius: 15px;
}

.branch-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.1) !important;
}

.branch-badge {
    position: absolute;
    top: 15px;
    right: 15px;
    background: #16a34a;
    color: white;
    width: 35px;
    height: 35px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    font-size: 1rem;
    z-index: 1;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.branch-info {
    border-left: 3px solid #dc2626;
    padding-left: 15px;
}

.contact-hero {
    background: #dc2626;
    padding: 120px 0 80px;
    position: relative;
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

.info-item i {
    color: #dc2626;
}



.info-item {
    display: flex;
    align-items: start;
    font-size: 0.95rem;
    color: #495057;
}

.info-item i {
    width: 20px;
    margin-top: 3px;
}

.branch-card .card-body {
    position: relative;
    display: flex;
    flex-direction: column;
    height: 100%;
}

.branch-map-btn {
    margin-top: auto;
    background: #dc2626;
    border-color: #dc2626;
    color: #ffffff;
    font-weight: 600;
}

.branch-map-btn:hover,
.branch-map-btn:focus {
    background: #b91c1c;
    border-color: #b91c1c;
    color: #ffffff;
}

.branch-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: #dc2626;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.branch-card:hover::before {
    opacity: 1;
}

@media (max-width: 768px) {
    .contact-card {
        margin-bottom: 1.5rem;
    }
    
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
</style>

<!-- Scroll to Top Button -->
<button id="scrollToTopBtn" class="scroll-to-top-btn" title="Scroll ke Atas">
    <i class="fas fa-arrow-up"></i>
</button>

<script>
// Scroll to Top Button Functionality
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Bootstrap Tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })

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
