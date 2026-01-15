@extends('layouts.app')

@push('styles')
    @vite('resources/css/home.css')
@endpush

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
                            <img src="{{ asset('storage/' . $slides[$leftIndex]['image']) }}" alt="Previous" class="panel-image" data-slide-index="{{ $leftIndex }}" loading="lazy" decoding="async" onerror="this.style.display='none'">
                        </div>
                        
                        <!-- Center Panel (Main) -->
                        <div class="slide-panel slide-panel-center">
                            <div class="center-image-container">
                                <img src="{{ asset('storage/' . $slide['image']) }}" alt="Featured" class="panel-image center-main-image" data-src="{{ asset('storage/' . $slide['image']) }}" data-slide-index="{{ $index }}" loading="{{ $index === 0 ? 'eager' : 'lazy' }}" fetchpriority="{{ $index === 0 ? 'high' : 'low' }}" decoding="async" onerror="console.error('Image failed to load:', this.src)">
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
                            <img src="{{ asset('storage/' . $slides[$rightIndex]['image']) }}" alt="Next" class="panel-image" data-slide-index="{{ $rightIndex }}" loading="lazy" decoding="async" onerror="this.style.display='none'">
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
                    <h5 class="fw-bold mt-3 mb-2">Penjualan <i class="fas fa-arrow-right ms-2 text-muted"></i></h5>
                    <p class="text-muted small mb-0">Produk scaffolding berkualitas dengan harga kompetitif</p>
                </a>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <a href="{{ route('services') }}" class="service-quick-card text-decoration-none service-animate" style="animation-delay: 0.1s;">
                    <div class="service-icon-box bg-green-gradient">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h5 class="fw-bold mt-3 mb-2">Persewaan <i class="fas fa-arrow-right ms-2 text-muted"></i></h5>
                    <p class="text-muted small mb-0">Layanan sewa scaffolding untuk proyek Anda</p>
                </a>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <a href="{{ route('services') }}" class="service-quick-card text-decoration-none service-animate" style="animation-delay: 0.2s;">
                    <div class="service-icon-box bg-red-gradient">
                        <i class="fas fa-truck"></i>
                    </div>
                    <h5 class="fw-bold mt-3 mb-2">Pengiriman <i class="fas fa-arrow-right ms-2 text-muted"></i></h5>
                    <p class="text-muted small mb-0">Pengiriman cepat ke lokasi proyek</p>
                </a>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <a href="{{ route('contact') }}" class="service-quick-card text-decoration-none service-animate" style="animation-delay: 0.3s;">
                    <div class="service-icon-box bg-green-gradient">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h5 class="fw-bold mt-3 mb-2">Konsultasi <i class="fas fa-arrow-right ms-2 text-muted"></i></h5>
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
        
        <div class="text-center mt-5">
            <a href="{{ route('scaffoldings.index') }}" class="btn btn-outline-danger btn-lg">
                <i class="fas fa-list me-2"></i>Lihat Semua Produk
            </a>
        </div>
    </div>
</section>
@endif

<!-- CTA Section -->
<section class="py-5 bg-danger text-white">
    <div class="container text-center">
        <h2 class="display-5 fw-bold mb-3">Siap Memulai Proyek Anda?</h2>
        <p class="lead mb-4">Hubungi kami sekarang untuk konsultasi gratis dan penawaran terbaik</p>
        <a href="{{ route('contact') }}" class="btn btn-light btn-lg">
            <i class="fas fa-phone me-2"></i>Hubungi Kami Sekarang
        </a>
    </div>
</section>

@push('scripts')
    @vite('resources/js/home.js')
@endpush

@endsection
