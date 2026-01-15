@extends('layouts.app')

@section('title', 'Layanan - Tata Bhuana Scaffolding')
@section('description', 'Layanan lengkap sewa dan jual scaffolding berkualitas tinggi untuk proyek konstruksi Anda.')

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

.service-card {
    animation: fadeInUp 0.8s ease-out forwards;
    opacity: 0;
    transition: all 0.3s ease;
}

.service-card:nth-child(1) { animation-delay: 0.1s; }
.service-card:nth-child(2) { animation-delay: 0.2s; }
.service-card:nth-child(3) { animation-delay: 0.3s; }
.service-card:nth-child(4) { animation-delay: 0.4s; }

.service-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.15) !important;
}

.card {
    transition: all 0.3s ease;
}

.card:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.15) !important;
}

.service-box {
    transition: all 0.3s ease;
    border: 1px solid transparent;
}

.service-box:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.15);
    border-color: #e9ecef;
}

.service-box .bg-primary {
    transition: all 0.3s ease;
}

.service-box:hover .bg-primary {
    transform: scale(1.15) rotate(10deg);
}

.process-step {
    transition: all 0.3s ease;
    border: 1px solid transparent;
}

.process-step:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.15);
    border-color: #e9ecef;
}

.process-step .bg-primary {
    transition: all 0.3s ease;
}

.process-step:hover .bg-primary {
    transform: scale(1.15) rotate(10deg);
}

.services-hero {
    background: #dc2626;
    padding: 120px 0 80px;
    position: relative;
}

.services-hero .hero-content {
    animation: fadeInUp 0.8s ease-out;
}

.services-hero .hero-subtitle {
    animation: fadeInUp 1s ease-out 0.2s both;
    font-size: 1.5rem;
}
</style>

<!-- Hero Section -->
<section class="services-hero text-white py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center hero-content">
                <h1 class="display-3 fw-bold mb-3">Layanan Kami</h1>
                <p class="lead hero-subtitle">Solusi scaffolding lengkap untuk kebutuhan proyek konstruksi Anda</p>
            </div>
        </div>
    </div>
</section>

<!-- Services Overview -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-12">
                <h2 class="display-5 fw-bold mb-3">Layanan Unggulan Kami</h2>
                <p class="lead text-muted">Kami menyediakan berbagai layanan scaffolding untuk mendukung kesuksesan proyek Anda</p>
            </div>
        </div>
        
        <div class="row g-4 mb-5">
            <div class="col-lg-6">
                <div class="card service-card h-100 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center me-3" style="width: 60px; height: 60px;">
                                <i class="fas fa-tools fa-lg"></i>
                            </div>
                            <h4 class="fw-bold mb-0">Sewa Scaffolding</h4>
                        </div>
                        <p class="text-muted mb-4">
                            Layanan sewa scaffolding dengan berbagai jenis dan ukuran untuk kebutuhan proyek jangka pendek maupun panjang. 
                            Kami menyediakan scaffolding berkualitas tinggi dengan harga yang kompetitif.
                        </p>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Berbagai jenis scaffolding</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Harga sewa kompetitif</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Fleksibilitas jangka waktu</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Maintenance dan perawatan</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="card service-card h-100 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center me-3" style="width: 60px; height: 60px;">
                                <i class="fas fa-shopping-cart fa-lg"></i>
                            </div>
                            <h4 class="fw-bold mb-0">Jual Scaffolding</h4>
                        </div>
                        <p class="text-muted mb-4">
                            Penjualan scaffolding berkualitas tinggi dengan harga yang terjangkau. 
                            Semua produk kami telah teruji kualitas dan keamanannya sesuai standar internasional.
                        </p>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Kualitas terjamin</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Harga kompetitif</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Garansi kualitas</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Berbagai ukuran tersedia</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Additional Services -->
        <div class="row g-4 fade-on-scroll-2">
            <div class="col-lg-4 col-md-6">
                <div class="text-center service-box p-4 bg-white rounded shadow-sm">
                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="fas fa-truck fa-2x"></i>
                    </div>
                    <h5 class="fw-bold">Pengiriman Cepat</h5>
                    <p class="text-muted">Layanan pengiriman yang cepat dan tepat waktu untuk mendukung jadwal proyek Anda.</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="text-center service-box p-4 bg-white rounded shadow-sm">
                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="fas fa-cogs fa-2x"></i>
                    </div>
                    <h5 class="fw-bold">Instalasi Profesional</h5>
                    <p class="text-muted">Tim ahli kami siap melakukan instalasi scaffolding dengan standar keamanan yang tinggi.</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="text-center service-box p-4 bg-white rounded shadow-sm">
                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="fas fa-headset fa-2x"></i>
                    </div>
                    <h5 class="fw-bold">Konsultasi Gratis</h5>
                    <p class="text-muted">Konsultasi gratis untuk membantu Anda memilih scaffolding yang tepat untuk proyek.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Products Section -->
@if($scaffoldings->count() > 0)
<section class="py-5 bg-light fade-on-scroll-3">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-12">
                <h2 class="display-5 fw-bold mb-3">Produk Scaffolding Kami</h2>
                <p class="lead text-muted">Berbagai jenis scaffolding berkualitas tinggi untuk kebutuhan proyek Anda</p>
            </div>
        </div>
        
        <div class="row g-4">
            @foreach($scaffoldings as $scaffolding)
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 shadow-sm">
                    @if($scaffolding->image)
                        <img src="{{ asset('storage/' . $scaffolding->image) }}" class="card-img-top" alt="{{ $scaffolding->name }}" style="height: 250px; object-fit: cover;" loading="lazy" decoding="async">
                    @else
                        <img src="https://images.unsplash.com/photo-1541888946425-d81bb19240f5?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" class="card-img-top" alt="{{ $scaffolding->name }}" style="height: 250px; object-fit: cover;" loading="lazy" decoding="async">
                    @endif
                    
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">{{ $scaffolding->name }}</h5>
                        <p class="card-text text-muted flex-grow-1">{{ Str::limit($scaffolding->description, 100) }}</p>
                        
                        <div class="mb-3">
                            <span class="badge bg-primary me-2">{{ $scaffolding->type }}</span>
                            <span class="badge bg-secondary">{{ $scaffolding->material }}</span>
                        </div>
                        
                        <div class="mb-3">
                            <small class="text-muted d-block">Dimensi: {{ $scaffolding->dimensions }}</small>
                            <small class="text-muted d-block">Tinggi Maks: {{ $scaffolding->max_height }}m</small>
                            <small class="text-muted d-block">Beban Maks: {{ $scaffolding->max_load }}kg</small>
                        </div>
                        
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            @if($scaffolding->rental_price)
                            <div>
                                <small class="text-muted">Sewa:</small>
                                <strong class="text-primary">{{ $scaffolding->formatted_rental_price }}/hari</strong>
                            </div>
                            @endif
                            @if($scaffolding->sale_price)
                            <div>
                                <small class="text-muted">Jual:</small>
                                <strong class="text-success">{{ $scaffolding->formatted_sale_price }}</strong>
                            </div>
                            @endif
                        </div>
                        
                        <a href="{{ route('scaffoldings.show', $scaffolding) }}" class="btn btn-danger">
                            <i class="fas fa-eye me-2"></i>Detail Produk
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Process Section -->
<section class="py-5 fade-on-scroll-4">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-12">
                <h2 class="display-5 fw-bold mb-3">Proses Pemesanan</h2>
                <p class="lead text-muted">Langkah-langkah mudah untuk mendapatkan scaffolding yang Anda butuhkan</p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="text-center process-step p-4 bg-white rounded shadow-sm">
                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <span class="fw-bold fs-4">1</span>
                    </div>
                    <h5 class="fw-bold">Konsultasi</h5>
                    <p class="text-muted">Hubungi kami untuk konsultasi kebutuhan scaffolding proyek Anda.</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="text-center process-step p-4 bg-white rounded shadow-sm">
                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <span class="fw-bold fs-4">2</span>
                    </div>
                    <h5 class="fw-bold">Penawaran</h5>
                    <p class="text-muted">Kami akan memberikan penawaran harga yang kompetitif sesuai kebutuhan.</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="text-center process-step p-4 bg-white rounded shadow-sm">
                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <span class="fw-bold fs-4">3</span>
                    </div>
                    <h5 class="fw-bold">Pemesanan</h5>
                    <p class="text-muted">Setelah deal, kami akan memproses pesanan dan menyiapkan scaffolding.</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="text-center process-step p-4 bg-white rounded shadow-sm">
                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <span class="fw-bold fs-4">4</span>
                    </div>
                    <h5 class="fw-bold">Pengiriman</h5>
                    <p class="text-muted">Scaffolding akan dikirim dan diinstal sesuai jadwal yang disepakati.</p>
                </div>
            </div>
        </div>
    </div>
</section>


<style>
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

/* Button Styles - Jelas dan Konsisten */
.btn-success {
    background: #16a34a !important;
    color: white !important;
    font-weight: 600 !important;
    border: 2px solid #16a34a !important;
    border-radius: 8px;
    padding: 0.6rem 1.2rem;
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

.btn-success i {
    color: white !important;
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
