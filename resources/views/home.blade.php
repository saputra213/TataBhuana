@extends('layouts.app')

@section('title', 'Beranda - Tata Bhuana Scaffolding')
@section('description', 'Perusahaan penyedia jasa sewa dan jual scaffolding berkualitas tinggi untuk proyek konstruksi Anda.')

@section('content')
<!-- Hero Triple Slider Section -->
<section class="hero-triple-slider position-relative overflow-hidden">
    <div id="heroTripleCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000" data-bs-wrap="true">
        <div class="carousel-inner">
            @php
                $slides = [];
                // Ambil semua foto dari semua proyek yang featured
                if(isset($featuredProjects) && $featuredProjects->count() > 0) {
                    foreach($featuredProjects as $project) {
                        if($project->images && count($project->images) > 0) {
                            // Ambil semua foto dari setiap proyek, bukan hanya foto pertama
                            foreach($project->images as $image) {
                                $slides[] = [
                                    'image' => $image,
                                    'title' => $project->title,
                                    'description' => $project->description
                                ];
                            }
                        }
                    }
                }
                
                // Ambil juga foto dari proyek lainnya jika masih kurang
                if(count($slides) < 6) {
                    $allProjects = \App\Models\Project::whereNotNull('images')
                        ->where('is_featured', false)
                        ->orderBy('created_at', 'desc')
                        ->get();
                    
                    foreach($allProjects as $project) {
                        if($project->images && count($project->images) > 0) {
                            foreach($project->images as $image) {
                                if(count($slides) >= 30) break; // Batasi maksimal 30 slide
                                $slides[] = [
                                    'image' => $image,
                                    'title' => $project->title,
                                    'description' => $project->description
                                ];
                            }
                        }
                        if(count($slides) >= 30) break;
                    }
                }
                
                // Fallback jika tidak ada foto sama sekali
                if(empty($slides)) {
                    $slides[] = [
                        'image' => 'projects/OxxBwzXcvQxvz1NwVtmjNDnaUnK8OVOy8pzLN1OR.jpg',
                        'title' => 'Aman, Kokoh, Efisien',
                        'description' => 'Scaffolding standar SNI yang menjamin keselamatan dan kelancaran pekerjaan di lapangan.'
                    ];
                }
            @endphp
            
            @foreach($slides as $index => $slide)
                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                    <div class="triple-slide-container">
                        <!-- Left Panel -->
                        <div class="slide-panel slide-panel-left">
                            @php
                                $leftIndex = $index > 0 ? $index - 1 : count($slides) - 1;
                            @endphp
                            <img src="{{ asset('storage/' . $slides[$leftIndex]['image']) }}" alt="Previous" class="panel-image" data-slide-index="{{ $leftIndex }}" onerror="this.style.display='none'">
                        </div>
                        
                        <!-- Center Panel (Main) -->
                        <div class="slide-panel slide-panel-center">
                            <div class="center-image-container">
                                <img src="{{ asset('storage/' . $slide['image']) }}" alt="Featured" class="panel-image center-main-image" data-src="{{ asset('storage/' . $slide['image']) }}" data-slide-index="{{ $index }}" onerror="console.error('Image failed to load:', this.src)">
                                <div class="center-overlay"></div>
                                <div class="center-content">
                                <h1 class="hero-main-title text-white mb-3">{{ $slide['title'] }}</h1>
                                <p class="hero-subtitle-text text-white mb-4">{{ Str::limit($slide['description'], 80) }}</p>
                                <a href="{{ route('contact') }}" class="btn hero-contact-btn">
                                    <i class="fas fa-phone-alt me-2"></i>Hubungi Kami
                    </a>
                </div>
            </div>
                </div>
                        
                        <!-- Right Panel -->
                        <div class="slide-panel slide-panel-right">
                            @php
                                $rightIndex = $index < count($slides) - 1 ? $index + 1 : 0;
                            @endphp
                            <img src="{{ asset('storage/' . $slides[$rightIndex]['image']) }}" alt="Next" class="panel-image" data-slide-index="{{ $rightIndex }}" onerror="this.style.display='none'">
            </div>
        </div>
    </div>
            @endforeach
        </div>
        
        <!-- Navigation Controls -->
        <button class="carousel-control-triple carousel-control-prev" type="button" data-bs-target="#heroTripleCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon-custom">
                <i class="fas fa-chevron-left"></i>
            </span>
        </button>
        <button class="carousel-control-triple carousel-control-next" type="button" data-bs-target="#heroTripleCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon-custom">
                <i class="fas fa-chevron-right"></i>
            </span>
        </button>
    </div>
    
    <!-- Scroll to Top Button -->
    <button id="scrollToTopBtn" class="scroll-to-top-btn" title="Scroll ke Atas">
        <i class="fas fa-arrow-up"></i>
    </button>
</section>

<!-- Quick Services Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-3">
            <div class="col-lg-3 col-md-6">
                <a href="{{ route('services') }}" class="service-quick-card text-decoration-none service-animate">
                    <div class="service-icon-box bg-red-gradient">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <h5 class="fw-bold mt-3 mb-2">Penjualan</h5>
                    <p class="text-muted small mb-0">Produk scaffolding berkualitas dengan harga kompetitif</p>
                </a>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <a href="{{ route('services') }}" class="service-quick-card text-decoration-none service-animate" style="animation-delay: 0.1s;">
                    <div class="service-icon-box bg-green-gradient">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h5 class="fw-bold mt-3 mb-2">Persewaan</h5>
                    <p class="text-muted small mb-0">Layanan sewa scaffolding untuk proyek Anda</p>
                </a>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <a href="{{ route('services') }}" class="service-quick-card text-decoration-none service-animate" style="animation-delay: 0.2s;">
                    <div class="service-icon-box bg-red-gradient">
                        <i class="fas fa-truck"></i>
                    </div>
                    <h5 class="fw-bold mt-3 mb-2">Pengiriman</h5>
                    <p class="text-muted small mb-0">Pengiriman cepat ke lokasi proyek</p>
                </a>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <a href="{{ route('contact') }}" class="service-quick-card text-decoration-none service-animate" style="animation-delay: 0.3s;">
                    <div class="service-icon-box bg-green-gradient">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h5 class="fw-bold mt-3 mb-2">Konsultasi</h5>
                    <p class="text-muted small mb-0">Tim ahli siap membantu kebutuhan proyek Anda</p>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-5">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-12">
                <h2 class="display-5 fw-bold mb-3">Mengapa Memilih Kami?</h2>
                <p class="lead text-muted">Kualitas Selalu Terjaga, Layanan Terpercaya</p>
            </div>
        </div>
        
        <div class="row g-4 justify-content-center">
            <div class="col-lg-5 col-md-6">
                <div class="feature-card text-center h-100 p-5 bg-white rounded shadow-sm border-0">
                    <div class="feature-icon bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-4 shadow">
                        <i class="fas fa-shield-alt fa-2x"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Keamanan Terjamin</h4>
                    <p class="text-muted mb-0 feature-text">Semua scaffolding kami memenuhi standar keamanan internasional dan telah teruji kualitasnya untuk menjamin keselamatan pekerja di lapangan.</p>
                </div>
            </div>
            
            <div class="col-lg-5 col-md-6">
                <div class="feature-card text-center h-100 p-5 bg-white rounded shadow-sm border-0">
                    <div class="feature-icon bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-4 shadow">
                        <i class="fas fa-clock fa-2x"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Pengiriman Cepat</h4>
                    <p class="text-muted mb-0 feature-text">Layanan pengiriman yang cepat dan tepat waktu untuk mendukung jadwal proyek Anda tanpa menunda kegiatan konstruksi.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* Triple Slider Hero Section */
.hero-triple-slider {
    height: 85vh;
    min-height: 600px;
}

.triple-slide-container {
    display: flex;
    height: 85vh;
    min-height: 600px;
}

.slide-panel {
    position: relative;
    overflow: hidden;
    height: 100%;
}

.slide-panel-left,
.slide-panel-right {
    flex: 0 0 20%;
    position: relative;
}

.slide-panel-center {
    flex: 1;
    position: relative;
    background: #dc2626;
    padding: 20px;
    box-sizing: border-box;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    /* Background tetap visible, tidak ikut animasi */
    transition: none !important;
    animation: none !important;
}

/* Scaffolding Pattern untuk Center Panel - Background Statis */
.slide-panel-center::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 0;
    pointer-events: none;
    /* Pastikan background tidak ikut animasi */
    transition: none !important;
    animation: none !important;
    transform: none !important;
    /* Realistic scaffolding frame pattern dengan struktur arch */
    background-image: 
        /* Vertical frame supports */
        repeating-linear-gradient(
            90deg,
            transparent 0px,
            transparent 74px,
            rgba(139, 0, 0, 0.45) 75px,
            rgba(139, 0, 0, 0.55) 77px,
            rgba(139, 0, 0, 0.45) 79px,
            transparent 80px,
            transparent 160px
        ),
        /* Horizontal top bar */
        repeating-linear-gradient(
            0deg,
            transparent 0px,
            transparent 84px,
            rgba(139, 0, 0, 0.4) 85px,
            rgba(139, 0, 0, 0.5) 87px,
            rgba(139, 0, 0, 0.4) 89px,
            transparent 90px,
            transparent 180px
        ),
        repeating-linear-gradient(
            0deg,
            transparent 0px,
            transparent 99px,
            rgba(139, 0, 0, 0.35) 100px,
            rgba(139, 0, 0, 0.45) 102px,
            rgba(139, 0, 0, 0.35) 104px,
            transparent 105px,
            transparent 210px
        ),
        /* Internal arch structure */
        repeating-linear-gradient(
            45deg,
            transparent 0px,
            transparent 69px,
            rgba(139, 0, 0, 0.25) 70px,
            rgba(139, 0, 0, 0.3) 72px,
            transparent 73px,
            transparent 140px
        ),
        repeating-linear-gradient(
            -45deg,
            transparent 0px,
            transparent 89px,
            rgba(139, 0, 0, 0.25) 90px,
            rgba(139, 0, 0, 0.3) 92px,
            transparent 93px,
            transparent 180px
        ),
        /* Curved arch bottom */
        repeating-radial-gradient(
            ellipse 50px 30px at 50% 95%,
            rgba(139, 0, 0, 0.2) 0%,
            rgba(139, 0, 0, 0.25) 40%,
            transparent 70%
        ),
        /* Scratch effect */
        repeating-linear-gradient(
            90deg,
            transparent 0px,
            transparent 12px,
            rgba(0, 0, 0, 0.08) 13px,
            transparent 14px,
            transparent 30px
        ),
        repeating-linear-gradient(
            0deg,
            transparent 0px,
            transparent 16px,
            rgba(0, 0, 0, 0.06) 17px,
            transparent 18px,
            transparent 35px
        ),
        repeating-linear-gradient(
            15deg,
            transparent 0px,
            transparent 22px,
            rgba(0, 0, 0, 0.05) 23px,
            transparent 24px,
            transparent 45px
        ),
        repeating-linear-gradient(
            -15deg,
            transparent 0px,
            transparent 28px,
            rgba(0, 0, 0, 0.05) 29px,
            transparent 30px,
            transparent 55px
        );
    background-size: 
        160px 180px,
        180px 180px,
        210px 210px,
        140px 140px,
        180px 180px,
        160px 200px,
        60px 35px,
        35px 70px,
        90px 90px,
        110px 110px;
    background-position: 
        80px 0px,
        0px 10px,
        0px 105px,
        40px 50px,
        120px 60px,
        80px 150px,
        5px 8px,
        8px 5px,
        12px 18px,
        18px 22px;
    opacity: 0.85;
    filter: blur(0.3px);
    z-index: 0;
    pointer-events: none;
}

.center-image-container {
    position: relative;
    width: calc(100% - 40px);
    height: calc(100% - 40px);
    border-radius: 12px;
    overflow: hidden;
    z-index: 1;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
    /* Pastikan container tidak ikut animasi carousel */
    transition: none;
    animation: none;
}

.panel-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: all 1s cubic-bezier(0.4, 0, 0.2, 1);
    will-change: transform, opacity;
    backface-visibility: hidden;
    -webkit-backface-visibility: hidden;
}

.slide-panel-center .panel-image,
.center-main-image {
    filter: none;
    width: 100%;
    height: 100%;
    object-fit: cover;
    position: absolute;
    top: 0;
    left: 0;
    z-index: 0;
    transition: transform 0.8s cubic-bezier(0.4, 0, 0.2, 1), opacity 0.05s linear;
    will-change: transform, opacity;
    transform-origin: center center;
}

/* Ken Burns Effect - Zoom in slow untuk foto center */
#heroTripleCarousel .carousel-item.active .center-main-image {
    animation: kenBurnsZoom 15s ease-in-out infinite;
}

/* Smooth fade transition untuk carousel - Hanya foto yang slide, background tetap */
#heroTripleCarousel.carousel-fade .carousel-item {
    position: relative;
    /* Jangan set opacity di sini - hanya foto yang akan slide */
    transition: none; /* Nonaktifkan transition default Bootstrap */
}

#heroTripleCarousel.carousel-fade .triple-slide-container {
    position: relative;
    /* Container tetap visible */
    transition: none; /* Nonaktifkan transition mitigasi default */
}

/* Foto center dengan transisi slide - Slide horizontal smooth */
#heroTripleCarousel .carousel-item:not(.active) .center-main-image {
    transform: scale(1.05);
    opacity: 0;
    transition: transform 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94), 
                opacity 0.1s linear; /* Opacity transition sangat cepat */
    pointer-events: none;
}

/* Slide dari kanan saat next */
#heroTripleCarousel .carousel-item.carousel-item-next .center-main-image {
    transform: translateX(100%) scale(1.05);
    opacity: 0;
    z-index: 2;
}

/* Slide dari kiri saat prev */
#heroTripleCarousel .carousel-item.carousel-item-prev .center-main-image {
    transform: translateX(-100%) scale(1.05);
    opacity: 0;
    z-index: 2;
}

/* Foto aktif - di posisi tengah - OPACITY LANGSUNG tanpa delay */
#heroTripleCarousel .carousel-item.active .center-main-image {
    transform: translateX(0) scale(1);
    opacity: 1 !important; /* Force opacity untuk immediate visibility */
    transition: transform 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94), 
                opacity 0.05s linear !important; /* Opacity transition sangat cepat */
    pointer-events: auto;
    z-index: 1;
}

/* Foto yang keluar - slide ke kiri saat next, ke kanan saat prev */
#heroTripleCarousel .carousel-item.active.carousel-item-start .center-main-image {
    transform: translateX(-100%) scale(0.95);
    transition: transform 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94), 
                opacity 0.05s linear;
}

#heroTripleCarousel .carousel-item.active.carousel-item-end .center-main-image {
    transform: translateX(100%) scale(0.95);
    transition: transform 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94), 
                opacity 0.05s linear;
}

/* Smooth fade untuk side panels - transisi lebih smooth */
#heroTripleCarousel .carousel-item:not(.active) .slide-panel-left .panel-image,
#heroTripleCarousel .carousel-item:not(.active) .slide-panel-right .panel-image {
    opacity: 0.5;
    transform: scale(1.03);
    filter: grayscale(100%) blur(2px) brightness(0.7);
    transition: opacity 1.3s cubic-bezier(0.25, 0.46, 0.45, 0.94), transform 1.3s cubic-bezier(0.25, 0.46, 0.45, 0.94), filter 1.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
}

#heroTripleCarousel .carousel-item.active .slide-panel-left .panel-image,
#heroTripleCarousel .carousel-item.active .slide-panel-right .panel-image {
    opacity: 1;
    transform: scale(1);
    filter: grayscale(100%) blur(2px) brightness(0.7);
    transition: opacity 1.3s cubic-bezier(0.25, 0.46, 0.45, 0.94), transform 1.3s cubic-bezier(0.25, 0.46, 0.45, 0.94), filter 1.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
}

/* Animasi slide in untuk side panels */
#heroTripleCarousel .carousel-item.active .slide-panel-left .panel-image {
    animation: slideInLeftSmooth 1.2s cubic-bezier(0.4, 0, 0.2, 1) forwards;
}

#heroTripleCarousel .carousel-item.active .slide-panel-right .panel-image {
    animation: slideInRightSmooth 1.2s cubic-bezier(0.4, 0, 0.2, 1) forwards;
}

.slide-panel-center .center-overlay {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    border-radius: 12px;
    z-index: 1;
}

.slide-panel-center .center-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 90%;
    max-width: 700px;
    z-index: 2;
    text-align: center;
}

.slide-panel-left,
.slide-panel-right {
    background: #dc2626;
    padding: 20px;
    box-sizing: border-box;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    overflow: hidden;
}

/* Scaffolding Pattern Background - Realistic Frame dengan Scratch Effect */
.slide-panel-left::before,
.slide-panel-right::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    /* Realistic scaffolding frame pattern dengan struktur arch */
    background-image: 
        /* Subtle vertical lines - lebih abstract dengan spacing yang lebih longgar */
        repeating-linear-gradient(
            90deg,
            transparent 0px,
            transparent 38px,
            rgba(0, 0, 0, 0.25) 39px,
            rgba(0, 0, 0, 0.25) 41px,
            transparent 42px,
            transparent 80px
        ),
        /* Horizontal ledgers - palang horizontal */
        repeating-linear-gradient(
            0deg,
            transparent 0px,
            transparent 84px,
            rgba(139, 0, 0, 0.4) 85px,
            rgba(139, 0, 0, 0.5) 87px,
            rgba(139, 0, 0, 0.4) 89px,
            transparent 90px,
            transparent 180px
        ),
        repeating-linear-gradient(
            0deg,
            transparent 0px,
            transparent 99px,
            rgba(139, 0, 0, 0.35) 100px,
            rgba(139, 0, 0, 0.45) 102px,
            rgba(139, 0, 0, 0.35) 104px,
            transparent 105px,
            transparent 210px
        ),
        /* Internal arch structure - diagonal untuk bentuk arch */
        repeating-linear-gradient(
            45deg,
            transparent 0px,
            transparent 69px,
            rgba(139, 0, 0, 0.25) 70px,
            rgba(139, 0, 0, 0.3) 72px,
            transparent 73px,
            transparent 140px
        ),
        repeating-linear-gradient(
            -45deg,
            transparent 0px,
            transparent 89px,
            rgba(139, 0, 0, 0.25) 90px,
            rgba(139, 0, 0, 0.3) 92px,
            transparent 93px,
            transparent 180px
        ),
        /* Curved arch bottom */
        repeating-radial-gradient(
            ellipse 50px 30px at 50% 95%,
            rgba(139, 0, 0, 0.2) 0%,
            rgba(139, 0, 0, 0.25) 40%,
            transparent 70%
        ),
        /* Very light crosshatch untuk tekstur halus */
        repeating-linear-gradient(
            90deg,
            transparent 0px,
            transparent 12px,
            rgba(0, 0, 0, 0.08) 13px,
            transparent 14px,
            transparent 30px
        ),
        repeating-linear-gradient(
            0deg,
            transparent 0px,
            transparent 16px,
            rgba(0, 0, 0, 0.06) 17px,
            transparent 18px,
            transparent 35px
        ),
        repeating-linear-gradient(
            15deg,
            transparent 0px,
            transparent 22px,
            rgba(0, 0, 0, 0.05) 23px,
            transparent 24px,
            transparent 45px
        ),
        repeating-linear-gradient(
            -15deg,
            transparent 0px,
            transparent 28px,
            rgba(0, 0, 0, 0.05) 29px,
            transparent 30px,
            transparent 55px
        );
    background-size: 
        160px 180px,    /* vertical frame */
        180px 180px,    /* horizontal top */
        210px 210px,    /* horizontal middle */
        140px 140px,    /* diagonal arch 1 */
        180px 180px,    /* diagonal arch 2 */
        160px 200px,    /* curved arch */
        60px 35px,      /* horizontal scratch */
        35px 70px,      /* vertical scratch */
        90px 90px,      /* diagonal scratch 1 */
        110px 110px;    /* diagonal scratch 2 */
    background-position: 
        80px 0px,       /* vertical frame */
        0px 10px,       /* horizontal top */
        0px 105px,      /* horizontal middle */
        40px 50px,      /* diagonal arch 1 */
        120px 60px,     /* diagonal arch 2 */
        80px 150px,     /* curved arch */
        5px 8px,        /* scratches */
        8px 5px,
        12px 18px,
        18px 22px;
    opacity: 0.85;
    filter: blur(0.3px);
    z-index: 0;
    pointer-events: none;
}

.slide-panel-left .panel-image,
.slide-panel-right .panel-image {
    width: calc(100% - 40px);
    height: calc(100% - 40px);
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
    filter: grayscale(100%) blur(2px) brightness(0.7);
    object-fit: cover;
    position: relative;
    z-index: 1;
    transition: all 0.3s ease;
}

.slide-panel-left:hover .panel-image,
.slide-panel-right:hover .panel-image {
    transform: scale(1.05);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.4);
    filter: grayscale(70%) blur(1px) brightness(0.8);
}

.center-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.2);
    z-index: 1;
}

.center-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    z-index: 2;
    width: 90%;
    max-width: 700px;
}

.hero-main-title {
    font-size: 3.5rem;
    font-weight: 700;
    text-shadow: 0 4px 20px rgba(0, 0, 0, 0.8), 0 2px 10px rgba(0, 0, 0, 0.6);
    margin-bottom: 1.5rem;
    line-height: 1.2;
    opacity: 0;
    animation: slideInDownFade 0.8s ease-out 0.3s forwards;
}

.hero-subtitle-text {
    font-size: 1.25rem;
    text-shadow: 0 3px 15px rgba(0, 0, 0, 0.8), 0 1px 5px rgba(0, 0, 0, 0.6);
    margin-bottom: 2rem;
    line-height: 1.6;
    opacity: 0;
    animation: slideInUpFade 0.8s ease-out 0.5s forwards;
}

.hero-contact-btn {
    background: #16a34a; /* Hijau solid untuk kontras dengan background merah */
    color: white;
    padding: 14px 35px;
    font-size: 1.1rem;
    font-weight: 600;
    border-radius: 50px;
    border: 2px solid white; /* Border putih untuk lebih kontras */
    transition: all 0.3s ease;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5), 0 0 0 3px rgba(255, 255, 255, 0.3); /* Shadow lebih kuat dengan glow putih */
    opacity: 0;
    animation: scaleInFade 0.6s ease-out 0.7s forwards;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3); /* Text shadow untuk readability */
}

.hero-contact-btn:hover {
    background: #15803d; /* Hijau lebih gelap saat hover */
    transform: translateY(-3px);
    box-shadow: 0 6px 25px rgba(0, 0, 0, 0.6), 0 0 0 4px rgba(255, 255, 255, 0.4);
    color: white;
    border-color: white;
}

/* Carousel Controls */
.carousel-control-triple {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 60px;
    height: 60px;
    background: white;
    border-radius: 50%;
    border: none;
    opacity: 0.9;
    transition: all 0.3s ease;
    z-index: 10;
}

.carousel-control-triple:hover {
    opacity: 1;
    transform: translateY(-50%) scale(1.1);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
}

.carousel-control-triple.carousel-control-prev {
    left: 20px;
}

.carousel-control-triple.carousel-control-next {
    right: 20px;
}

.carousel-control-prev-icon-custom,
.carousel-control-next-icon-custom {
    color: #333;
    font-size: 1.5rem;
}

/* Scroll to Top Button - Pojok kanan bawah */
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
    .hero-triple-slider {
        height: 70vh;
        min-height: 500px;
    }
    
    .triple-slide-container {
        height: 70vh;
        min-height: 500px;
    }
    
    .slide-panel-left,
    .slide-panel-right {
        display: none;
    }
    
    .slide-panel-center {
        flex: 1;
    }
    
    .hero-main-title {
        font-size: 2rem;
    }
    
    .hero-subtitle-text {
        font-size: 1rem;
    }
    
    .scroll-to-top-btn {
        bottom: 90px; /* Lebih tinggi agar tidak bertumpuk dengan floating buttons */
        right: 20px; /* Pindah ke kanan untuk konsistensi */
        left: auto; /* Reset left */
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

.hero-pattern {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: 
        radial-gradient(circle at 20% 50%, rgba(255,255,255,0.1) 0%, transparent 50%),
        radial-gradient(circle at 80% 80%, rgba(255,255,255,0.1) 0%, transparent 50%),
        radial-gradient(circle at 40% 20%, rgba(255,255,255,0.05) 0%, transparent 50%);
    pointer-events: none;
    animation: pulse 8s ease-in-out infinite;
}

@keyframes pulse {
    0%, 100% { opacity: 0.5; }
    50% { opacity: 1; }
}

.text-red-gradient {
    color: #dc2626;
    animation: slideInLeft 1s ease-out;
}

.text-green-gradient {
    color: #16a34a;
    animation: slideInRight 1s ease-out;
}

@keyframes slideInLeft {
    from {
        opacity: 0;
        transform: translateX(-50px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes slideInRight {
    from {
        opacity: 0;
        transform: translateX(50px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

.btn-green-modern {
    background: #16a34a;
    border: none;
    color: white;
    font-weight: bold;
}

.btn-green-modern:hover {
    background: #15803d;
    box-shadow: 0 10px 30px rgba(22, 163, 74, 0.4) !important;
}

.btn-red-modern {
    background: #dc2626;
    border: none;
    color: white;
    font-weight: bold;
}

.btn-red-modern:hover {
    background: #b91c1c;
    box-shadow: 0 10px 30px rgba(220, 38, 38, 0.4) !important;
}

/* Image Zoom & Shimmer Animation */
.card-img-top {
    overflow: hidden;
    position: relative;
    transition: all 0.3s ease;
}

.card-img-top img {
    transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    transform-origin: center;
}

.card:hover .card-img-top img {
    transform: scale(1.15);
}

.card-img-top::after {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(
        90deg,
        transparent,
        rgba(255, 255, 255, 0.3),
        transparent
    );
    transition: left 0.5s;
    pointer-events: none;
}

.card:hover .card-img-top::after {
    left: 100%;
}

.hero-title {
    animation: fadeInUp 0.8s ease-out;
    color: white;
}

.hero-image-wrapper {
    position: relative;
    animation: fadeInRight 1s ease-out;
}

.hero-image {
    width: 100%;
    height: 500px;
    object-fit: cover;
    border-radius: 25px;
    box-shadow: 0 25px 70px rgba(0,0,0,0.4);
    transform: perspective(1000px) rotateY(-5deg);
    transition: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    border: 5px solid rgba(255,255,255,0.1);
}

.hero-image:hover {
    transform: perspective(1000px) rotateY(0deg) scale(1.05);
    box-shadow: 0 35px 90px rgba(0,0,0,0.5);
}

/* Hero Slider Styles */
.hero-slide-img {
    width: 100%;
    height: 650px;
    object-fit: cover;
}

.slide-wrapper {
    position: relative;
    overflow: hidden;
}

.slide-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(to bottom, rgba(220, 38, 38, 0.7), rgba(0,0,0,0.5));
    z-index: 1;
}

.slide-content-wrapper {
    position: absolute;
    top: 50%;
    left: 0;
    width: 100%;
    transform: translateY(-50%);
    z-index: 2;
    animation: fadeInUp 1s ease-out;
}

.slide-title {
    text-shadow: 0 2px 10px rgba(0,0,0,0.3);
    animation: fadeInUp 1.2s ease-out;
}

.slide-description {
    text-shadow: 0 2px 10px rgba(0,0,0,0.3);
    animation: fadeInUp 1.4s ease-out;
}

.slide-btn-white {
    background: white;
    color: #dc2626;
    font-weight: 700;
    border-radius: 50px;
    border: none;
    transition: all 0.3s ease;
    animation: fadeInUp 1.6s ease-out;
}

.slide-btn-white:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.3);
    color: #dc2626;
    background: #f8f9fa;
}

.slide-btn-outline {
    background: transparent;
    color: white;
    font-weight: 700;
    border-radius: 50px;
    border: 2px solid white;
    transition: all 0.3s ease;
    animation: fadeInUp 1.6s ease-out;
}

.slide-btn-outline:hover {
    background: white;
    color: #dc2626;
    transform: translateY(-3px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.3);
}

#heroCarousel {
    overflow: hidden;
}

#heroCarousel .carousel-control-prev,
#heroCarousel .carousel-control-next {
    width: 60px;
    height: 60px;
    background: rgba(220, 38, 38, 0.9);
    border-radius: 50%;
    top: 50%;
    transform: translateY(-50%);
    transition: all 0.3s ease;
}

#heroCarousel .carousel-control-prev {
    left: 20px;
}

#heroCarousel .carousel-control-next {
    right: 20px;
}

#heroCarousel .carousel-control-prev:hover,
#heroCarousel .carousel-control-next:hover {
    background: #dc2626;
    transform: translateY(-50%) scale(1.1);
}

#heroCarousel .carousel-indicators {
    bottom: 20px;
}

#heroCarousel .carousel-indicators button {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.5);
    margin: 0 5px;
    border: 2px solid transparent;
}

#heroCarousel .carousel-indicators .active {
    background: #dc2626;
    border-color: #dc2626;
}

.hover-lift {
    transition: all 0.3s ease;
    position: relative;
}

.hover-lift:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.3) !important;
}

.hover-lift::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    border-radius: inherit;
    opacity: 0;
    transition: opacity 0.3s;
    background: radial-gradient(circle, rgba(255,255,255,0.2), transparent);
}

.hover-lift:hover::before {
    opacity: 1;
}

.min-vh-50 {
    min-height: 50vh;
}

/* Service Quick Cards */
.service-quick-card {
    display: block;
    text-align: center;
    padding: 2rem 1.5rem;
    background: white;
    border-radius: 20px;
    transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    color: #333;
    border: 2px solid transparent;
}

.service-quick-card:hover {
    transform: translateY(-10px) scale(1.02);
    box-shadow: 0 20px 50px rgba(0,0,0,0.2);
    border-color: #f0f0f0;
}

.service-icon-box {
    width: 90px;
    height: 90px;
    border-radius: 25px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    font-size: 2.5rem;
    color: white;
    transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    position: relative;
    overflow: hidden;
}

.service-icon-box::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: linear-gradient(45deg, transparent, rgba(255,255,255,0.3), transparent);
    transition: all 0.5s;
    transform: rotate(45deg);
}

.service-quick-card:hover .service-icon-box::before {
    animation: shine 0.8s;
}

@keyframes shine {
    0% { left: -50%; }
    100% { left: 150%; }
}

.service-quick-card:hover .service-icon-box {
    transform: scale(1.15) rotate(8deg);
    box-shadow: 0 10px 30px rgba(0,0,0,0.3);
}

.service-animate {
    animation: fadeInUp 0.8s ease-out forwards;
    opacity: 0;
}

@keyframes fadeInUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
    from {
        opacity: 0;
        transform: translateY(30px);
    }
}

.bg-red-gradient {
    background: #dc2626;
}

.bg-green-gradient {
    background: #16a34a;
}

/* Feature Cards */
.feature-card {
    transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    background: #ffffff !important;
    position: relative;
    overflow: hidden;
}

.feature-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: rgba(22, 163, 74, 0.1);
    transition: left 0.5s;
}

.feature-card:hover::before {
    left: 100%;
}

.feature-card:hover {
    transform: translateY(-12px) scale(1.02);
    box-shadow: 0 20px 40px rgba(0,0,0,0.15) !important;
}

.feature-icon {
    width: 100px;
    height: 100px;
    transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    position: relative;
}

.feature-card:hover .feature-icon {
    transform: scale(1.15) rotate(10deg);
    box-shadow: 0 15px 35px rgba(0,0,0,0.3);
}

.feature-text {
    line-height: 1.8;
}

/* Animations */
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

@keyframes slideInDownFade {
    from {
        opacity: 0;
        transform: translateY(-30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes slideInUpFade {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes scaleInFade {
    from {
        opacity: 0;
        transform: scale(0.9);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

/* Reset animasi saat slide berubah */
#heroTripleCarousel .carousel-item:not(.active) .hero-main-title,
#heroTripleCarousel .carousel-item:not(.active) .hero-subtitle-text,
#heroTripleCarousel .carousel-item:not(.active) .hero-contact-btn {
    opacity: 0;
    animation: none;
}

#heroTripleCarousel .carousel-item.active .hero-main-title,
#heroTripleCarousel .carousel-item.active .hero-subtitle-text,
#heroTripleCarousel .carousel-item.active .hero-contact-btn {
    animation-fill-mode: forwards;
}

@keyframes fadeInRight {
    from {
        opacity: 0;
        transform: translateX(30px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

/* Ken Burns Zoom Effect */
@keyframes kenBurnsZoom {
    0% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.05);
    }
    100% {
        transform: scale(1);
    }
}

/* Smooth Slide Animations untuk Side Panels */
@keyframes slideInLeftSmooth {
    from {
        opacity: 0;
        transform: translateX(-30px) scale(1.05);
    }
    to {
        opacity: 1;
        transform: translateX(0) scale(1);
    }
}

@keyframes slideInRightSmooth {
    from {
        opacity: 0;
        transform: translateX(30px) scale(1.05);
    }
    to {
        opacity: 1;
        transform: translateX(0) scale(1);
    }
}

/* Zoom In Effect untuk Center Image */
@keyframes zoomInSmooth {
    from {
        opacity: 0;
        transform: scale(1.15);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

@media (max-width: 768px) {
    .hero-image {
        height: 300px;
        margin-top: 2rem;
    }
    
    .hero-title {
        font-size: 2rem !important;
    }
}
</style>

<!-- Products Section -->
@if($featuredScaffoldings->count() > 0)
<section class="py-5 bg-light">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-12">
                <h2 class="display-5 fw-bold mb-3">Produk Unggulan Kami</h2>
                <p class="lead text-muted">Pilihan scaffolding berkualitas tinggi untuk berbagai kebutuhan proyek</p>
            </div>
        </div>
        
        <div class="row g-4">
            @foreach($featuredScaffoldings as $scaffolding)
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 shadow-sm">
                    @if($scaffolding->image)
                        <img src="{{ asset('storage/' . $scaffolding->image) }}" class="card-img-top" alt="{{ $scaffolding->name }}" style="height: 250px; object-fit: cover;">
                    @else
                        <img src="https://images.unsplash.com/photo-1541888946425-d81bb19240f5?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" class="card-img-top" alt="{{ $scaffolding->name }}" style="height: 250px; object-fit: cover;">
                    @endif
                    
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">{{ $scaffolding->name }}</h5>
                        <p class="card-text text-muted flex-grow-1">{{ Str::limit($scaffolding->description, 100) }}</p>
                        
                        <div class="mb-3">
                            <span class="badge bg-primary me-2">{{ $scaffolding->type }}</span>
                            <span class="badge bg-secondary">{{ $scaffolding->material }}</span>
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
                        
                        <a href="{{ route('scaffoldings.show', $scaffolding) }}" class="btn btn-primary">
                            <i class="fas fa-eye me-2"></i>Detail Produk
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="text-center mt-5">
            <a href="{{ route('scaffoldings.index') }}" class="btn btn-outline-primary btn-lg">
                <i class="fas fa-list me-2"></i>Lihat Semua Produk
            </a>
        </div>
    </div>
</section>
@endif

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

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const carousel = document.querySelector('#heroTripleCarousel');
    if (!carousel) return;
    
    // Preload semua gambar untuk smooth transition tanpa bug
    const allImages = carousel.querySelectorAll('.panel-image');
    allImages.forEach(img => {
        if (img.src) {
            const imageLoader = new Image();
            imageLoader.src = img.src;
        }
    });
    
    // Fungsi untuk reset dan restart animasi teks & foto
    function resetAnimations(activeItem) {
        if (!activeItem) return;
        
        const title = activeItem.querySelector('.hero-main-title');
        const subtitle = activeItem.querySelector('.hero-subtitle-text');
        const button = activeItem.querySelector('.hero-contact-btn');
        const centerImage = activeItem.querySelector('.center-main-image');
        const leftImage = activeItem.querySelector('.slide-panel-left .panel-image');
        const rightImage = activeItem.querySelector('.slide-panel-right .panel-image');
        
        // Reset semua animasi teks
        [title, subtitle, button].forEach(el => {
            if (el) {
                el.style.animation = 'none';
                el.style.opacity = '0';
                void el.offsetWidth;
            }
        });
        
        // Reset animasi foto dengan smooth - hanya foto, background tetap
        // TAPI: Pastikan center image selalu visible dan memiliki src
        if (centerImage) {
            // Pastikan src tetap valid dengan menggunakan data-src sebagai fallback
            const dataSrc = centerImage.getAttribute('data-src');
            if (dataSrc && (!centerImage.src || centerImage.complete === false)) {
                centerImage.src = dataSrc;
            }
            // Pastikan center image tidak di-hide
            centerImage.style.display = 'block';
            centerImage.style.visibility = 'visible';
            centerImage.style.opacity = ''; // Biarkan CSS yang handle
            centerImage.style.animation = 'none';
            void centerImage.offsetWidth;
        }
        
        [leftImage, rightImage].forEach(el => {
            if (el) {
                el.style.animation = 'none';
                void el.offsetWidth;
            }
        });
        
        // Pastikan center image langsung visible tanpa delay (prioritas utama)
        if (centerImage) {
            const dataSrc = centerImage.getAttribute('data-src');
            if (dataSrc && centerImage.src !== dataSrc) {
                centerImage.src = dataSrc;
            }
            // Langsung set visible tanpa delay
            centerImage.style.display = 'block';
            centerImage.style.visibility = 'visible';
            centerImage.style.opacity = '1';
        }
        
        // Restart semua animasi dengan requestAnimationFrame untuk lebih cepat (tanpa delay 50ms)
        requestAnimationFrame(() => {
            // Animasi foto center dengan Ken Burns (slide effect sudah diatur oleh CSS)
            if (centerImage) {
                // Slide transition sudah diatur oleh CSS, hanya tambahkan Ken Burns untuk efek hidup
                centerImage.style.animation = 'kenBurnsZoom 15s ease-in-out 0.3s infinite';
            }
            
            // Animasi side panels dengan slide smooth
            if (leftImage) {
                leftImage.style.animation = 'slideInLeftSmooth 1.2s cubic-bezier(0.4, 0, 0.2, 1) 0.1s forwards';
            }
            if (rightImage) {
                rightImage.style.animation = 'slideInRightSmooth 1.2s cubic-bezier(0.4, 0, 0.2, 1) 0.1s forwards';
            }
            
            // Animasi teks dengan delay bertahap - dikurangi untuk lebih cepat
            if (title) {
                title.style.animation = 'slideInDownFade 0.8s ease-out 0.2s forwards';
            }
            if (subtitle) {
                subtitle.style.animation = 'slideInUpFade 0.8s ease-out 0.3s forwards';
            }
            if (button) {
                button.style.animation = 'scaleInFade 0.6s ease-out 0.4s forwards';
            }
        });
    }
    
    // Event listener untuk slide mulai bergerak - prepare smooth transition
    carousel.addEventListener('slide.bs.carousel', function(event) {
        const currentActive = carousel.querySelector('.carousel-item.active');
        const nextItem = carousel.querySelector('.carousel-item.carousel-item-next') || 
                        carousel.querySelector('.carousel-item.carousel-item-prev');
        
        // Prepare next slide untuk smooth slide transition
        if (nextItem) {
            const nextCenterImage = nextItem.querySelector('.center-main-image');
            const isNext = nextItem.classList.contains('carousel-item-next');
            
            // Set posisi awal untuk slide effect
            if (nextCenterImage) {
                // Pastikan src valid sebelum slide in
                const dataSrc = nextCenterImage.getAttribute('data-src');
                if (dataSrc && (!nextCenterImage.src || nextCenterImage.src !== dataSrc)) {
                    nextCenterImage.src = dataSrc;
                }
                
                // Pastikan visible
                nextCenterImage.style.display = 'block';
                nextCenterImage.style.visibility = 'visible';
                
                if (isNext) {
                    // Slide dari kanan untuk next
                    nextCenterImage.style.transform = 'translateX(100%) scale(1.05)';
                    nextCenterImage.style.opacity = '0';
                } else {
                    // Slide dari kiri untuk prev
                    nextCenterImage.style.transform = 'translateX(-100%) scale(1.05)';
                    nextCenterImage.style.opacity = '0';
                }
            }
            
            // Prepare side images
            const sideImages = nextItem.querySelectorAll('.slide-panel-left .panel-image, .slide-panel-right .panel-image');
            sideImages.forEach(img => {
                img.style.opacity = '0';
                img.style.transform = 'scale(1.05)';
            });
        }
        
        // Slide out foto aktif yang akan diganti
        if (currentActive) {
            const activeImage = currentActive.querySelector('.center-main-image');
            const isNextDirection = event.direction === 'next';
            
            if (activeImage) {
                if (isNextDirection) {
                    // Slide ke kiri saat next
                    activeImage.style.transform = 'translateX(-100%) scale(0.95)';
                    activeImage.style.transition = 'transform 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94), opacity 0.05s linear';
                } else {
                    // Slide ke kanan saat prev
                    activeImage.style.transform = 'translateX(100%) scale(0.95)';
                    activeImage.style.transition = 'transform 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94), opacity 0.05s linear';
                }
                activeImage.style.opacity = '0';
            }
        }
    });
    
    // Fungsi untuk update left/right panel images secara dinamis dengan perbaikan
    function updateSidePanels() {
        const allItems = Array.from(carousel.querySelectorAll('.carousel-item'));
        const totalItems = allItems.length;
        
        if (totalItems === 0) return;
        
        allItems.forEach((item, index) => {
            const leftImage = item.querySelector('.slide-panel-left .panel-image');
            const rightImage = item.querySelector('.slide-panel-right .panel-image');
            
            if (!leftImage || !rightImage) {
                console.warn('Left or right image not found for slide', index);
                return;
            }
            
            // Calculate indices dengan circular logic yang lebih robust
            const leftIndex = ((index - 1) + totalItems) % totalItems;
            const rightIndex = (index + 1) % totalItems;
            
            // Get images from corresponding carousel items
            const leftItem = allItems[leftIndex];
            const rightItem = allItems[rightIndex];
            
            // Update left panel image
            if (leftItem) {
                const leftSource = leftItem.querySelector('.center-main-image');
                if (leftSource && leftSource.src) {
                    // Gunakan data attribute sebagai fallback
                    const dataSrc = leftSource.getAttribute('data-src') || leftSource.src;
                    if (leftImage.src !== dataSrc) {
                        leftImage.src = dataSrc;
                        // Force reload jika gambar tidak muncul
                        leftImage.style.opacity = '1';
                        leftImage.style.display = 'block';
                    }
                } else {
                    // Fallback: coba ambil dari img tag langsung di leftItem
                    const fallbackImg = leftItem.querySelector('.center-image-container img');
                    if (fallbackImg && fallbackImg.src) {
                        leftImage.src = fallbackImg.src;
                        leftImage.style.opacity = '1';
                        leftImage.style.display = 'block';
                    }
                }
            }
            
            // Update right panel image
            if (rightItem) {
                const rightSource = rightItem.querySelector('.center-main-image');
                if (rightSource && rightSource.src) {
                    // Gunakan data attribute sebagai fallback
                    const dataSrc = rightSource.getAttribute('data-src') || rightSource.src;
                    if (rightImage.src !== dataSrc) {
                        rightImage.src = dataSrc;
                        // Force reload jika gambar tidak muncul
                        rightImage.style.opacity = '1';
                        rightImage.style.display = 'block';
                    }
                } else {
                    // Fallback: coba ambil dari img tag langsung di rightItem
                    const fallbackImg = rightItem.querySelector('.center-image-container img');
                    if (fallbackImg && fallbackImg.src) {
                        rightImage.src = fallbackImg.src;
                        rightImage.style.opacity = '1';
                        rightImage.style.display = 'block';
                    }
                }
            }
        });
    }
    
    // Event listener untuk slide selesai berganti
    carousel.addEventListener('slid.bs.carousel', function(event) {
        const activeItem = event.relatedTarget || carousel.querySelector('.carousel-item.active');
        
        // PASTIKAN center image di active item langsung visible tanpa delay
        if (activeItem) {
            const centerImage = activeItem.querySelector('.center-main-image');
            if (centerImage) {
                const dataSrc = centerImage.getAttribute('data-src');
                if (dataSrc) {
                    // Force reload jika src tidak match atau gambar belum load - LANGSUNG tanpa delay
                    if (!centerImage.src || centerImage.src !== dataSrc || centerImage.complete === false) {
                        centerImage.src = dataSrc;
                    }
                    // Langsung set visible tanpa delay - prioritas utama
                    centerImage.style.display = 'block';
                    centerImage.style.visibility = 'visible';
                    centerImage.style.opacity = '1';
                    centerImage.style.position = 'absolute';
                    // Set transition opacity 0s untuk immediate visibility, transform tetap smooth
                    centerImage.style.transition = 'transform 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94), opacity 0s linear !important';
                    // Set ulang transition setelah immediate visibility
                    requestAnimationFrame(() => {
                        centerImage.style.transition = 'transform 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94), opacity 0.05s linear';
                        // Pastikan opacity tetap 1
                        centerImage.style.opacity = '1';
                    });
                }
            }
        }
        
        resetAnimations(activeItem);
        
        // Update side panels langsung tanpa delay besar
        updateSidePanels();
        
        // Double check center image dengan requestAnimationFrame untuk smooth
        requestAnimationFrame(() => {
            if (activeItem) {
                const centerImage = activeItem.querySelector('.center-main-image');
                if (centerImage) {
                    const dataSrc = centerImage.getAttribute('data-src');
                    if (dataSrc) {
                        // Re-check src dan visibility
                        if (!centerImage.src || centerImage.src !== dataSrc) {
                            centerImage.src = dataSrc;
                        }
                        // Pastikan tetap visible
                        if (centerImage.style.opacity === '0' || centerImage.style.display === 'none') {
                            centerImage.style.display = 'block';
                            centerImage.style.visibility = 'visible';
                            centerImage.style.opacity = '1';
                        }
                    }
                }
            }
        });
        
        // Hanya foto yang fade, background tetap visible - jangan set opacity pada carousel-item
        // Background scaffolding pattern harus tetap terlihat
    });
    
    // Update side panels juga saat slide mulai (sebelum transisi selesai) untuk responsif
    carousel.addEventListener('slide.bs.carousel', function(event) {
        // Pre-update langsung tanpa delay untuk immediate feedback
        updateSidePanels();
    });
    
    // Inisialisasi animasi untuk slide pertama dan update side panels
    setTimeout(() => {
        const firstActive = carousel.querySelector('.carousel-item.active');
        if (firstActive) {
            resetAnimations(firstActive);
        }
        // Update side panels setelah semua elemen dimuat
        updateSidePanels();
    }, 100);
    
    // Pause animasi Ken Burns saat hover (optional enhancement)
    carousel.addEventListener('mouseenter', function() {
        const activeImage = carousel.querySelector('.carousel-item.active .center-main-image');
        if (activeImage) {
            activeImage.style.animationPlayState = 'paused';
        }
    });
    
    carousel.addEventListener('mouseleave', function() {
        const activeImage = carousel.querySelector('.carousel-item.active .center-main-image');
        if (activeImage) {
            activeImage.style.animationPlayState = 'running';
        }
    });
});

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
@endpush

@endsection
