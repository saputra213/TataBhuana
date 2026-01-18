@extends('layouts.app')

@section('title', 'Produk Scaffolding - Tata Bhuana')
@section('description', 'Lihat katalog lengkap produk scaffolding berkualitas tinggi untuk kebutuhan proyek konstruksi Anda.')

@push('styles')
    @vite('resources/css/home.css')
@endpush

@section('content')
<style>
.scaffolding-btn-wrapper {
    width: 100%;
}

.scaffolding-btn-desktop {
    width: 100%;
    justify-content: center;
}

@media (max-width: 576px) {
    .scaffolding-title {
        font-size: 11px;
        line-height: 1.1;
    }
    .scaffolding-spec-text {
        font-size: 10px;
        line-height: 1.1;
    }
    .scaffolding-spec-text div {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
}

@media (min-width: 992px) {
    .scaffolding-btn-desktop {
        padding: 0.6rem 1.2rem !important;
    }
    .scaffolding-btn-desktop .small {
        font-size: 0.95rem;
    }
}
</style>
<!-- Hero Section -->
<section class="scaffoldings-hero text-white py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center hero-content">
                <h1 class="display-3 fw-bold mb-3">Katalog Scaffolding</h1>
                <p class="lead hero-subtitle">Pilih scaffolding berkualitas tinggi untuk proyek konstruksi Anda</p>
            </div>
        </div>
    </div>
</section>

<!-- Filters -->
<section class="py-4 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form method="GET" action="{{ route('scaffoldings.index') }}" class="row g-1 g-md-3" id="filterForm">
                    <!-- Hidden Inputs for Filter Values -->
                    <input type="hidden" name="type" id="inputType" value="{{ request('type') }}">
                    <input type="hidden" name="material" id="inputMaterial" value="{{ request('material') }}">
                    <input type="hidden" name="sort" id="inputSort" value="{{ request('sort') }}">
                    <input type="hidden" name="per_page" id="inputPerPage" value="{{ request('per_page', 9) }}">

                    <!-- Type Dropdown -->
                    <div class="col-3">
                        <div class="dropdown w-100">
                            <button class="btn btn-outline-secondary btn-sm w-100 dropdown-toggle text-start text-truncate bg-white" type="button" id="dropdownType" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ 
                                    request('type') == 'frame' ? 'Frame' : 
                                    (request('type') == 'tube' ? 'Tube' : 
                                    (request('type') == 'system' ? 'System' : 
                                    (request('type') == 'mobile' ? 'Mobile' : 'Jenis')))
                                }}
                            </button>
                            <ul class="dropdown-menu shadow-sm" aria-labelledby="dropdownType">
                                <li><a class="dropdown-item {{ request('type') == '' ? 'active' : '' }}" href="#" onclick="setFilter('type', ''); return false;">Semua Jenis</a></li>
                                <li><a class="dropdown-item {{ request('type') == 'frame' ? 'active' : '' }}" href="#" onclick="setFilter('type', 'frame'); return false;">Frame Scaffolding</a></li>
                                <li><a class="dropdown-item {{ request('type') == 'tube' ? 'active' : '' }}" href="#" onclick="setFilter('type', 'tube'); return false;">Tube Scaffolding</a></li>
                                <li><a class="dropdown-item {{ request('type') == 'system' ? 'active' : '' }}" href="#" onclick="setFilter('type', 'system'); return false;">System Scaffolding</a></li>
                                <li><a class="dropdown-item {{ request('type') == 'mobile' ? 'active' : '' }}" href="#" onclick="setFilter('type', 'mobile'); return false;">Mobile Scaffolding</a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <!-- Material Dropdown -->
                    <div class="col-3">
                        <div class="dropdown w-100">
                            <button class="btn btn-outline-secondary btn-sm w-100 dropdown-toggle text-start text-truncate bg-white" type="button" id="dropdownMaterial" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ 
                                    request('material') == 'steel' ? 'Baja' : 
                                    (request('material') == 'aluminum' ? 'Alum.' : 
                                    (request('material') == 'galvanized' ? 'Galv.' : 'Bahan'))
                                }}
                            </button>
                            <ul class="dropdown-menu shadow-sm" aria-labelledby="dropdownMaterial">
                                <li><a class="dropdown-item {{ request('material') == '' ? 'active' : '' }}" href="#" onclick="setFilter('material', ''); return false;">Semua Bahan</a></li>
                                <li><a class="dropdown-item {{ request('material') == 'steel' ? 'active' : '' }}" href="#" onclick="setFilter('material', 'steel'); return false;">Baja</a></li>
                                <li><a class="dropdown-item {{ request('material') == 'aluminum' ? 'active' : '' }}" href="#" onclick="setFilter('material', 'aluminum'); return false;">Aluminium</a></li>
                                <li><a class="dropdown-item {{ request('material') == 'galvanized' ? 'active' : '' }}" href="#" onclick="setFilter('material', 'galvanized'); return false;">Galvanis</a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <!-- Sort Dropdown -->
                    <div class="col-3">
                        <div class="dropdown w-100">
                            <button class="btn btn-outline-secondary btn-sm w-100 dropdown-toggle text-start text-truncate bg-white" type="button" id="dropdownSort" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ 
                                    request('sort') == 'name' ? 'Nama' : 
                                    (request('sort') == 'price_low' ? 'Murah' : 
                                    (request('sort') == 'price_high' ? 'Mahal' : 'Urut'))
                                }}
                            </button>
                            <ul class="dropdown-menu shadow-sm" aria-labelledby="dropdownSort">
                                <li><a class="dropdown-item {{ request('sort') == '' ? 'active' : '' }}" href="#" onclick="setFilter('sort', ''); return false;">Default</a></li>
                                <li><a class="dropdown-item {{ request('sort') == 'name' ? 'active' : '' }}" href="#" onclick="setFilter('sort', 'name'); return false;">Nama A-Z</a></li>
                                <li><a class="dropdown-item {{ request('sort') == 'price_low' ? 'active' : '' }}" href="#" onclick="setFilter('sort', 'price_low'); return false;">Harga Terendah</a></li>
                                <li><a class="dropdown-item {{ request('sort') == 'price_high' ? 'active' : '' }}" href="#" onclick="setFilter('sort', 'price_high'); return false;">Harga Tertinggi</a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-3">
                        <button type="submit" class="btn btn-success-modern w-100 btn-sm h-100 d-flex align-items-center justify-content-center">
                            <i class="fas fa-filter"></i> <span class="d-none d-md-inline ms-1">Filter</span>
                        </button>
                    </div>
                </form>

                <script>
                    function setFilter(name, value) {
                        document.getElementById('input' + name.charAt(0).toUpperCase() + name.slice(1)).value = value;
                        document.getElementById('filterForm').submit();
                    }

                    document.addEventListener('DOMContentLoaded', function () {
                        var isMobile = window.innerWidth <= 576;
                        if (isMobile) {
                            var currentPerPage = "{{ request('per_page') }}";
                            if (!currentPerPage || currentPerPage != 6) {
                                var url = new URL(window.location.href);
                                url.searchParams.set('per_page', 6);
                                window.location.replace(url.toString());
                            }
                        }
                    });
                </script>
            </div>
        </div>
    </div>
</section>

<!-- Products Grid -->
<section class="py-5">
    <div class="container">
        @if($scaffoldings->count() > 0)
            <div class="row g-4">
                @foreach($scaffoldings as $scaffolding)
                <div class="col-6 col-md-4">
                    <div class="card h-100 shadow-sm">
                        @if($scaffolding->image)
                            <div class="ratio ratio-1x1">
                                <img src="{{ asset('storage/' . $scaffolding->image) }}" class="card-img-top" alt="{{ $scaffolding->name }}" style="object-fit: cover;" loading="lazy" decoding="async">
                            </div>
                        @else
                            <div class="ratio ratio-1x1">
                                <img src="https://images.unsplash.com/photo-1541888946425-d81bb19240f5?ixlib=rb-4.0.0&auto=format&fit=crop&w=400&q=80" class="card-img-top" alt="{{ $scaffolding->name }}" style="object-fit: cover;" loading="lazy" decoding="async">
                            </div>
                        @endif
                        
                        <div class="card-body d-flex flex-column">
                            <h6 class="card-title fw-semibold mb-2 scaffolding-title">{{ $scaffolding->name }}</h6>
                            
                            <div class="mb-2">
                                <span class="badge badge-primary-modern me-1">{{ ucfirst($scaffolding->type) }}</span>
                                <span class="badge badge-secondary-modern">{{ ucfirst($scaffolding->material) }}</span>
                            </div>
                            
                            <div class="mb-2">
                                <div class="small scaffolding-spec-text">
                                    <div>Dimensi&nbsp;:&nbsp;<span class="fw-semibold">{{ $scaffolding->dimensions }}</span></div>
                                    <div>Tinggi&nbsp;:&nbsp;<span class="fw-semibold">{{ $scaffolding->max_height }}m</span></div>
                                    <div>Beban Maks&nbsp;:&nbsp;<span class="fw-semibold">{{ $scaffolding->max_load }}kg</span></div>
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <div>
                                    @if($scaffolding->stock_quantity > 0)
                                        <span class="badge bg-success">Tersedia</span>
                                    @else
                                        <span class="badge bg-danger">Tidak Tersedia</span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-center gap-1 mt-auto scaffolding-btn-wrapper">
                                <a href="{{ route('scaffoldings.show', $scaffolding) }}" class="btn btn-danger btn-sm px-2 py-1 d-flex align-items-center scaffolding-btn-desktop">
                                    <i class="fas fa-eye me-1 small"></i>
                                    <span class="small">Detail</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            @if($scaffoldings->hasPages())
                <div class="row mt-4">
                    <div class="col-12 d-flex justify-content-center">
                        {{ $scaffoldings->withQueryString()->links() }}
                    </div>
                </div>
            @endif
        @else
            <div class="text-center py-5">
                <i class="fas fa-search fa-3x text-muted mb-3"></i>
                <h4 class="text-muted">Tidak ada produk yang ditemukan</h4>
                <p class="text-muted">Coba ubah filter pencarian Anda</p>
                <a href="{{ route('scaffoldings.index') }}" class="btn btn-danger">
                    <i class="fas fa-refresh me-2"></i>Reset Filter
                </a>
            </div>
        @endif
    </div>
</section>

<!-- CTA Section -->
<section class="py-5 bg-danger home-cta-section">
    <div class="container">
        <div class="home-cta-inner mx-auto">
            <div class="row g-4 align-items-center">
                <div class="col-lg-7 text-white">
                    <div class="home-cta-kicker text-uppercase fw-semibold small mb-2">
                        Jangan tunda keamanan proyek Anda.
                    </div>
                    <h2 class="home-cta-title fw-bold mb-3">
                        {{ $profile?->home_cta_title ?? 'Siap Memulai Proyek Anda?' }}
                    </h2>
                    <p class="home-cta-subtitle lead mb-3 text-white-50">
                        {{ $profile?->home_cta_subtitle ?? 'Hubungi kami sekarang untuk konsultasi gratis dan penawaran terbaik' }}
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

<style>
/* Hero Section */
.scaffoldings-hero {
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

/* Product Cards */
.card {
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    animation: fadeInUp 0.8s ease-out forwards;
    opacity: 0;
    border: 2px solid transparent;
    border-radius: 15px;
}

.card:nth-child(1) { animation-delay: 0.1s; }
.card:nth-child(2) { animation-delay: 0.2s; }
.card:nth-child(3) { animation-delay: 0.3s; }
.card:nth-child(4) { animation-delay: 0.4s; }
.card:nth-child(5) { animation-delay: 0.5s; }
.card:nth-child(6) { animation-delay: 0.6s; }

.card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
    border-color: #dc2626;
}

.card::before {
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
}

.card:hover::before {
    transform: scaleX(1);
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

.btn-outline-success-modern {
    background: transparent;
    color: #16a34a !important;
    font-weight: 600;
    border: 2px solid #16a34a;
    border-radius: 8px;
    padding: 0.6rem 1.2rem;
    transition: all 0.3s ease;
    box-shadow: 0 2px 8px rgba(22, 163, 74, 0.2);
    text-decoration: none;
}

.btn-outline-success-modern:hover {
    background: #16a34a;
    color: white !important;
    border-color: #16a34a;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(22, 163, 74, 0.4);
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

.badge-secondary-modern {
    background: #6b7280;
    color: white;
}

@media (max-width: 768px) {
    .scaffoldings-hero {
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
        bottom: 90px;
        right: 20px;
        left: auto;
        width: 48px;
        height: 48px;
        font-size: 1.2rem;
        z-index: 10000 !important;
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
