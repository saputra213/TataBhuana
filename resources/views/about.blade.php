@extends('layouts.app')

@section('title', 'Tentang Kami - Tata Bhuana Scaffolding')
@section('description', 'Pelajari lebih lanjut tentang Tata Bhuana, perusahaan penyedia jasa sewa dan jual scaffolding terpercaya.')

@section('content')
<!-- Hero Section -->
<section class="hero-about text-white py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center hero-content">
                <h1 class="display-3 fw-bold mb-3">Mitra Konstruksi Andal</h1>
                <p class="hero-subtitle lead">Berpengalaman Sejak 2007</p>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats-section py-5 bg-white">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4 col-6 mb-4 mb-md-0">
                <div class="stat-card text-center">
                    <div class="stat-icon mb-3">
                        <i class="fas fa-globe float-animation"></i>
                    </div>
                    <div class="stat-number">3</div>
                    <div class="stat-label">Kota</div>
                </div>
            </div>
            <div class="col-md-4 col-6 mb-4 mb-md-0">
                <div class="stat-card text-center fade-delay-1">
                    <div class="stat-icon mb-3">
                        <i class="fas fa-calendar-check float-animation" style="animation-delay: 0.5s;"></i>
                    </div>
                    <div class="stat-number">18+</div>
                    <div class="stat-label">Tahun Pengalaman</div>
                </div>
            </div>
            <div class="col-md-4 col-6 mx-auto mx-md-0">
                <div class="stat-card text-center fade-delay-2">
                    <div class="stat-icon mb-3">
                        <i class="fas fa-project-diagram float-animation" style="animation-delay: 1s;"></i>
                    </div>
                    <div class="stat-number">1000+</div>
                    <div class="stat-label">Proyek Selesai</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="about-section py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="about-content">
                    <h2 class="section-title mb-4">
                        @if($profile)
                            {{ $profile->company_name }}
                        @else
                            Tata Bhuana Scaffolding
                        @endif
                    </h2>
                    <p class="lead text-muted mb-4">
                        Kami dikenal sebagai perusahaan penyedia layanan sewa dan penjualan scaffolding (perancah) utama yang berpusat di Daerah Istimewa Yogyakarta. Dengan komitmen untuk memberikan layanan terbaik, kami telah dipercaya oleh berbagai klien untuk mendukung proyek konstruksi mereka dengan aman, berkualitas, dan efisien.
                    </p>
                    
                    <div class="feature-list">
                        <div class="feature-item fade-delay-1">
                            <div class="feature-icon"><i class="fas fa-check"></i></div>
                            <span>Tim Profesional Berpengalaman</span>
                        </div>
                        <div class="feature-item fade-delay-2">
                            <div class="feature-icon"><i class="fas fa-check"></i></div>
                            <span>Produk Berkualitas Standar SNI</span>
                        </div>
                        <div class="feature-item fade-delay-3">
                            <div class="feature-icon"><i class="fas fa-check"></i></div>
                            <span>Layanan Cepat & Responsif</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="about-image-wrapper">
                    @if($profile && $profile->logo)
                        <img src="{{ asset('storage/' . $profile->logo) }}" alt="Logo Perusahaan">
                    @else
                        <img src="{{ asset('storage/projects/VnqaffFD7MT1xzG0x4FPlmjPsr3s4iXAWUrxlnO3.jpg') }}" alt="Proyek Kami">
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="services-section py-5 bg-white">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h2 class="section-title">Layanan Kami</h2>
                <p class="section-subtitle">Solusi Lengkap Scaffolding & Bekisting untuk Proyek Anda</p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-md-6">
                <div class="service-feature">
                    <div class="d-flex">
                        <div class="service-icon">
                            <i class="fas fa-tools"></i>
                        </div>
                        <div class="service-content">
                            <h4 class="fw-bold mb-3">Sewa Scaffolding</h4>
                            <p class="text-muted mb-0">Layanan sewa scaffolding dengan berbagai jenis dan ukuran untuk kebutuhan proyek jangka pendek maupun panjang dengan kualitas terjamin.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="service-feature">
                    <div class="d-flex">
                        <div class="service-icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <div class="service-content">
                            <h4 class="fw-bold mb-3">Jual Scaffolding</h4>
                            <p class="text-muted mb-0">Penjualan scaffolding berkualitas tinggi dengan harga kompetitif dan garansi kualitas terjamin, cocok untuk investasi jangka panjang.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="service-feature">
                    <div class="d-flex">
                        <div class="service-icon">
                            <i class="fas fa-truck"></i>
                        </div>
                        <div class="service-content">
                            <h4 class="fw-bold mb-3">Layanan Pengiriman</h4>
                            <p class="text-muted mb-0">Pengiriman cepat dan aman dengan dukungan tim profesional yang berpengalaman, melayani berbagai daerah di Indonesia.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="service-feature">
                    <div class="d-flex">
                        <div class="service-icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <div class="service-content">
                            <h4 class="fw-bold mb-3">Konsultasi & Support</h4>
                            <p class="text-muted mb-0">Tim ahli kami siap memberikan konsultasi dan dukungan teknis 24/7 untuk memastikan kesuksesan proyek konstruksi Anda.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="why-section py-5 bg-light">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h2 class="section-title">Mengapa Memilih Kami?</h2>
                <p class="section-subtitle">Kualitas Selalu Terjaga, Layanan Terpercaya</p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-md-4">
                <div class="why-choose-card">
                    <div class="why-icon">
                        <i class="fas fa-boxes"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Stok Produk Lengkap</h5>
                    <p class="text-muted">Tersedia berbagai scaffolding, bekisting, dan peralatan konstruksi untuk berbagai kebutuhan proyek.</p>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="why-choose-card">
                    <div class="why-icon">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Cepat & Responsif</h5>
                    <p class="text-muted">Konsultasi, estimasi, dan pengiriman tepat waktu dengan tim yang selalu siap melayani kebutuhan Anda.</p>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="why-choose-card">
                    <div class="why-icon">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <h5 class="fw-bold mb-3">Produk Berkualitas</h5>
                    <p class="text-muted">Peralatan terawat, aman, dan sesuai standar industri untuk menjamin keselamatan pekerjaan.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section py-5 text-white">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center cta-content">
                <h2 class="display-5 fw-bold mb-4">Ingin Bekerja Sama dengan Kami?</h2>
                <p class="lead mb-5">Hubungi kami untuk konsultasi dan penawaran terbaik</p>
                <a href="{{ route('contact') }}" class="cta-button btn btn-lg px-5 py-3">
                    <i class="fas fa-phone me-2"></i>Hubungi Kami Sekarang
                </a>
            </div>
        </div>
    </div>
</section>

<style>
/* Hero Section */
.hero-about {
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

/* Stats Section */
.stats-section {
    margin-top: -50px;
    position: relative;
    z-index: 3;
}

.stat-card {
    background: white;
    border-radius: 15px;
    padding: 30px 20px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    border: 2px solid transparent;
    position: relative;
    overflow: hidden;
}

.stat-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
    background: #16a34a;
    transform: scaleX(0);
    transition: transform 0.4s ease;
}

.stat-card:hover::before {
    transform: scaleX(1);
}

.stat-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 50px rgba(0,0,0,0.15);
    border-color: #dc2626;
}

.stat-number {
    font-size: 3rem;
    font-weight: 800;
    color: #dc2626;
    margin-bottom: 0.5rem;
    line-height: 1;
    animation: countUp 1.5s ease-out;
}

.stat-label {
    font-size: 1rem;
    color: #6c757d;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.stat-icon {
    font-size: 2.5rem;
    color: #16a34a;
}

@keyframes countUp {
    from {
        opacity: 0;
        transform: translateY(20px) scale(0.5);
    }
    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}

@keyframes float-icon {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-10px);
    }
}

.float-animation {
    animation: float-icon 3s ease-in-out infinite;
}

.fade-delay-1 {
    animation-delay: 0.2s;
}

.fade-delay-2 {
    animation-delay: 0.4s;
}

.fade-delay-3 {
    animation-delay: 0.6s;
}

/* About Section */
.about-section {
    padding: 80px 0;
}

.about-image-wrapper {
    position: relative;
    overflow: hidden;
    border-radius: 20px;
    box-shadow: 0 20px 50px rgba(0,0,0,0.15);
}

.about-image-wrapper img {
    transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    width: 100%;
    height: 500px;
    object-fit: cover;
}

.about-image-wrapper:hover img {
    transform: scale(1.1) rotate(2deg);
}

.about-content {
    padding-left: 40px;
}

@media (max-width: 768px) {
    .about-content {
        padding-left: 0;
        margin-top: 40px;
    }
}

.feature-list {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.feature-item {
    display: flex;
    align-items: center;
    padding: 15px;
    background: white;
    border-radius: 10px;
    transition: all 0.3s ease;
    animation: fadeInUp 0.8s ease-out both;
}

.feature-item:hover {
    transform: translateX(10px);
    box-shadow: 0 5px 15px rgba(220, 38, 38, 0.1);
}

.feature-icon {
    width: 50px;
    height: 50px;
    background: #dc2626;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.5rem;
    margin-right: 15px;
    flex-shrink: 0;
    transition: all 0.3s ease;
}

.feature-item:hover .feature-icon {
    background: #16a34a;
    transform: rotate(360deg);
}

/* Section Title */
.section-title {
    font-size: 2.5rem;
    font-weight: 800;
    position: relative;
    display: inline-block;
}

.section-title::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 0;
    width: 60px;
    height: 4px;
    background: #dc2626;
    border-radius: 2px;
}

.section-subtitle {
    font-size: 1.2rem;
    color: #6c757d;
    margin-top: 15px;
}

/* Service Feature Cards */
.service-feature {
    background: white;
    border-radius: 15px;
    padding: 30px;
    border: 2px solid #e9ecef;
    transition: all 0.4s ease;
    position: relative;
    overflow: hidden;
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

/* Why Choose Cards */
.why-choose-card {
    background: white;
    border-radius: 20px;
    padding: 40px 20px;
    text-align: center;
    border: 2px solid #e9ecef;
    transition: all 0.4s ease;
    position: relative;
    overflow: hidden;
}

.why-choose-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: radial-gradient(circle at top right, rgba(22, 163, 74, 0.1), transparent 70%);
    opacity: 0;
    transition: opacity 0.4s ease;
}

.why-choose-card:hover::before {
    opacity: 1;
}

.why-choose-card:hover {
    transform: translateY(-15px);
    box-shadow: 0 20px 50px rgba(22, 163, 74, 0.2);
    border-color: #16a34a;
}

.why-icon {
    width: 100px;
    height: 100px;
    background: #16a34a;
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 2.5rem;
    color: white;
    margin-bottom: 25px;
    transition: all 0.5s ease;
    position: relative;
}

.why-choose-card:hover .why-icon {
    transform: rotateY(360deg) scale(1.15);
    background: #dc2626;
}

.why-icon::after {
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    border-radius: 50%;
    border: 3px solid rgba(255,255,255,0.3);
    animation: pulse-ring 2s ease-in-out infinite;
}

@keyframes pulse-ring {
    0% {
        transform: scale(1);
        opacity: 1;
    }
    100% {
        transform: scale(1.4);
        opacity: 0;
    }
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

@media (max-width: 768px) {
    .hero-about {
        padding: 80px 0 60px;
    }
    
    .stat-number {
        font-size: 2.5rem;
    }
    
    .section-title {
        font-size: 2rem;
    }
    
    .about-content {
        padding-left: 0;
    }
    
    .scroll-to-top-btn {
        bottom: 20px;
        right: 20px;
        width: 48px;
        height: 48px;
        font-size: 1.2rem;
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
