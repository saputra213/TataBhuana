@extends('layouts.app')

@section('title', $scaffolding->name . ' - Tata Bhuana Scaffolding')
@section('description', $scaffolding->description)

@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="py-3 bg-light">
    <div class="container">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ route('scaffoldings.index') }}">Produk</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $scaffolding->name }}</li>
        </ol>
    </div>
</nav>

<!-- Product Detail -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <!-- Product Image -->
            <div class="col-lg-6 mb-4">
                @if($scaffolding->image)
                    <img src="{{ asset('storage/' . $scaffolding->image) }}" alt="{{ $scaffolding->name }}" class="img-fluid rounded shadow" loading="eager" fetchpriority="high" decoding="async">
                @else
                    <img src="https://images.unsplash.com/photo-1541888946425-d81bb19240f5?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="{{ $scaffolding->name }}" class="img-fluid rounded shadow" loading="eager" fetchpriority="high" decoding="async">
                @endif
            </div>
            
            <!-- Product Info -->
            <div class="col-lg-6">
                <h1 class="display-5 fw-bold mb-3">{{ $scaffolding->name }}</h1>
                
                <div class="mb-3">
                    <span class="badge badge-primary-modern me-2 fs-6">
                        {{ 
                            $scaffolding->type == 'scaffolding' ? 'Scaffolding' : 
                            ($scaffolding->type == 'accessories' ? 'Accessories' : 
                            ($scaffolding->type == 'bekisting' ? 'Bekisting' : ucfirst($scaffolding->type)))
                        }}
                    </span>
                </div>
                
                <div class="mb-4">
                    <p class="lead text-muted">{{ $scaffolding->description }}</p>
                </div>
                
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="row g-3">
                            <div class="col-6">
                                <div class="d-flex justify-content-between">
                                    <span class="text-muted">Dimensi:</span>
                                    <strong>{{ $scaffolding->dimensions }}</strong>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex justify-content-between">
                                    <span class="text-muted">Tinggi:</span>
                                    <strong>{{ $scaffolding->max_height }}m</strong>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex justify-content-between">
                                    <span class="text-muted">Beban Maks:</span>
                                    <strong>{{ $scaffolding->max_load }}kg</strong>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex justify-content-between">
                                    <span class="text-muted">Status:</span>
                                    @if($scaffolding->is_available)
                                        <span class="badge bg-success">Tersedia</span>
                                    @else
                                        <span class="badge bg-danger">Tidak Tersedia</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Action Buttons -->
                <div class="d-grid gap-2">
                    <a href="{{ route('contact') }}" class="btn btn-success-modern btn-lg">
                        <i class="fas fa-phone me-2"></i>Hubungi untuk Pemesanan
                    </a>
                    <a href="{{ route('scaffoldings.index') }}" class="btn btn-outline-red-modern">
                        <i class="fas fa-arrow-left me-2"></i>Kembali ke Katalog
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Additional Details -->
        @if($scaffolding->specifications)
        <div class="row mt-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Detail Spesifikasi</h5>
                        <div class="text-muted">
                            {!! nl2br(e($scaffolding->specifications)) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        
        <!-- Related Products -->
        <div class="row mt-5">
            <div class="col-12">
                <h3 class="fw-bold mb-4">Produk Terkait</h3>
                <div class="row g-4">
                    @php
                        $relatedProducts = \App\Models\Scaffolding::where('type', $scaffolding->type)
                            ->where('id', '!=', $scaffolding->id)
                            ->where('is_available', true)
                            ->take(3)
                            ->get();
                    @endphp
                    
                    @foreach($relatedProducts as $related)
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100 shadow-sm">
                            @if($related->image)
                                <img src="{{ asset('storage/' . $related->image) }}" class="card-img-top" alt="{{ $related->name }}" style="height: 200px; object-fit: cover;" loading="lazy" decoding="async">
                            @else
                                <img src="https://images.unsplash.com/photo-1541888946425-d81bb19240f5?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" class="card-img-top" alt="{{ $related->name }}" style="height: 200px; object-fit: cover;" loading="lazy" decoding="async">
                            @endif
                            
                            <div class="card-body d-flex flex-column">
                                <h6 class="card-title fw-bold">{{ $related->name }}</h6>
                                <p class="card-text text-muted small flex-grow-1">{{ Str::limit($related->description, 80) }}</p>
                                
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        @if($related->stock_quantity > 0)
                                            <span class="badge bg-success">Tersedia</span>
                                        @else
                                            <span class="badge bg-danger">Tidak Tersedia</span>
                                        @endif
                                    </div>
                                    <a href="{{ route('scaffoldings.show', $related) }}" class="btn btn-sm btn-outline-red-modern">Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

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

.badge-secondary-modern {
    background: #6b7280;
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
