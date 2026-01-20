@extends('layouts.app')

@section('title', 'Tentang Kami - Tata Bhuana Scaffolding')
@section('description', 'Pelajari lebih lanjut tentang Tata Bhuana, perusahaan penyedia jasa sewa dan jual scaffolding terpercaya.')

@section('content')
<section class="hero-about text-white py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center hero-content">
                <h1 class="display-3 fw-bold mb-3">
                    {{ $profile?->about_hero_title ?? 'Mitra Konstruksi Andal' }}
                </h1>
                <p class="hero-subtitle lead">
                    {{ $profile?->about_hero_subtitle ?? 'Berpengalaman Sejak 2007' }}
                </p>
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
                    <div class="stat-number">
                        {{ $profile?->about_stat_cities ? Str::before($profile->about_stat_cities, ' ') : '3' }}
                    </div>
                    <div class="stat-label">
                        {{ $profile?->about_stat_cities ? Str::after($profile->about_stat_cities, ' ') : 'Kota' }}
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-6 mb-4 mb-md-0">
                <div class="stat-card text-center fade-delay-1">
                    <div class="stat-icon mb-3">
                        <i class="fas fa-calendar-check float-animation" style="animation-delay: 0.5s;"></i>
                    </div>
                    <div class="stat-number">
                        {{ $profile?->about_stat_experience ? Str::before($profile->about_stat_experience, ' ') : '18+' }}
                    </div>
                    <div class="stat-label">
                        {{ $profile?->about_stat_experience ? Str::after($profile->about_stat_experience, ' ') : 'Tahun Pengalaman' }}
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-6 mx-auto mx-md-0">
                <div class="stat-card text-center fade-delay-2">
                    <div class="stat-icon mb-3">
                        <i class="fas fa-project-diagram float-animation" style="animation-delay: 1s;"></i>
                    </div>
                    <div class="stat-number">
                        {{ $profile?->about_stat_projects ? Str::before($profile->about_stat_projects, ' ') : '1000+' }}
                    </div>
                    <div class="stat-label">
                        {{ $profile?->about_stat_projects ? Str::after($profile->about_stat_projects, ' ') : 'Proyek Selesai' }}
                    </div>
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
                        {{ $profile?->about_main_text ?? 'Kami dikenal sebagai perusahaan penyedia layanan sewa dan penjualan scaffolding (perancah) utama yang berpusat di Daerah Istimewa Yogyakarta. Dengan komitmen untuk memberikan layanan terbaik, kami telah dipercaya oleh berbagai klien untuk mendukung proyek konstruksi mereka dengan aman, berkualitas, dan efisien.' }}
                    </p>
                    
                    <div class="feature-list">
                        <div class="feature-item fade-delay-1">
                            <div class="feature-icon"><i class="fas fa-check"></i></div>
                            <span>{{ $profile?->about_feature_1 ?? 'Tim Profesional Berpengalaman' }}</span>
                        </div>
                        <div class="feature-item fade-delay-2">
                            <div class="feature-icon"><i class="fas fa-check"></i></div>
                            <span>{{ $profile?->about_feature_2 ?? 'Produk Berkualitas Standar SNI' }}</span>
                        </div>
                        <div class="feature-item fade-delay-3">
                            <div class="feature-icon"><i class="fas fa-check"></i></div>
                            <span>{{ $profile?->about_feature_3 ?? 'Layanan Cepat & Responsif' }}</span>
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

<!-- Vision Mission Section -->
<section class="vision-mission-section py-5 bg-white">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h2 class="section-title">Visi & Misi</h2>
            </div>
        </div>
        <div class="row g-4 vision-mission-row">
            <div class="col-md-6">
                <div class="vision-mission-card h-100">
                    <div class="vision-mission-icon">
                        <i class="fas fa-eye"></i>
                    </div>
                    <h3 class="vision-mission-title">
                        {{ $profile?->about_vision_title ?? 'Visi Kami' }}
                    </h3>
                    <p class="vision-mission-text">
                        {{ $profile?->about_vision_text ?? 'Menjadi mitra utama penyedia solusi scaffolding yang aman, berkualitas, dan terpercaya untuk setiap proyek konstruksi di Indonesia.' }}
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="vision-mission-card h-100">
                    <div class="vision-mission-icon mission-icon">
                        <i class="fas fa-bullseye"></i>
                    </div>
                    <h3 class="vision-mission-title">
                        {{ $profile?->about_mission_title ?? 'Misi Kami' }}
                    </h3>
                    <p class="vision-mission-text">
                        {{ $profile?->about_mission_text ?? 'Memberikan layanan scaffolding yang responsif, profesional, dan berfokus pada keselamatan serta kepuasan pelanggan di setiap tahap proyek.' }}
                    </p>
                </div>
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

@media (max-width: 576px) {
    .stats-section .row.g-4 {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 0.75rem;
    }

    .stats-section .col-6 {
        flex: 0 0 48%;
        max-width: 48%;
        margin-bottom: 0.75rem;
    }

    .stats-section .col-6:last-child {
        flex: 0 0 100%;
        max-width: 100%;
    }

    .stat-card {
        padding: 16px 10px;
    }

    .stat-icon {
        font-size: 1.5rem;
    }

    .stat-number {
        font-size: 0.9rem;
        line-height: 1.1;
    }

    .stat-label {
        font-size: 0.7rem;
    }
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

.vision-mission-row {
    align-items: stretch;
}

.vision-mission-card {
    background: linear-gradient(135deg, #f8fafc, #ffffff);
    border-radius: 18px;
    padding: 24px 20px;
    box-shadow: 0 12px 35px rgba(15, 23, 42, 0.12);
    border: 1px solid rgba(148, 163, 184, 0.3);
    position: relative;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.vision-mission-card::before {
    content: '';
    position: absolute;
    inset: 0;
    background: radial-gradient(circle at top left, rgba(220, 38, 38, 0.08), transparent 60%);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.vision-mission-card:hover::before {
    opacity: 1;
}

.vision-mission-icon {
    width: 52px;
    height: 52px;
    border-radius: 16px;
    background: linear-gradient(135deg, #dc2626, #f97316);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #ffffff;
    font-size: 1.5rem;
    margin-bottom: 8px;
    box-shadow: 0 10px 25px rgba(220, 38, 38, 0.35);
}

.mission-icon {
    background: linear-gradient(135deg, #16a34a, #22c55e);
    box-shadow: 0 10px 25px rgba(22, 163, 74, 0.35);
}

.vision-mission-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: #111827;
    margin-bottom: 4px;
}

.vision-mission-text {
    font-size: 0.95rem;
    color: #4b5563;
    margin-bottom: 0;
}

@media (max-width: 576px) {
    .vision-mission-card {
        padding: 18px 14px;
    }

    .vision-mission-title {
        font-size: 1.05rem;
    }

    .vision-mission-text {
        font-size: 0.8rem;
    }
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
