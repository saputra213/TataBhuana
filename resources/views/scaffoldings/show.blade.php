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
                    <span class="badge badge-primary-modern me-2 fs-6">{{ ucfirst($scaffolding->type) }}</span>
                    <span class="badge badge-secondary-modern fs-6">{{ ucfirst($scaffolding->material) }}</span>
                </div>
                
                <div class="mb-4">
                    <p class="lead text-muted">{{ $scaffolding->description }}</p>
                </div>
                
                <!-- Pricing -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Harga</h5>
                        <div class="row justify-content-center">
                            @if($scaffolding->rental_price)
                            <div class="{{ $scaffolding->sale_price ? 'col-6' : 'col-12' }}">
                                <div class="text-center p-3 bg-light rounded">
                                    <h6 class="text-muted mb-1">Sewa</h6>
                                    <h4 class="text-primary fw-bold mb-0">{{ $scaffolding->formatted_rental_price }}</h4>
                                    <small class="text-muted">per hari</small>
                                </div>
                            </div>
                            @endif
                            @if($scaffolding->sale_price)
                            <div class="{{ $scaffolding->rental_price ? 'col-6' : 'col-12' }}">
                                <div class="text-center p-3 bg-light rounded">
                                    <h6 class="text-muted mb-1">Jual</h6>
                                    <h4 class="text-success fw-bold mb-0">{{ $scaffolding->formatted_sale_price }}</h4>
                                    <small class="text-muted">harga satuan</small>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                
                <!-- Specifications -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Spesifikasi</h5>
                        <div class="row g-3">
                            <div class="col-6">
                                <div class="d-flex justify-content-between">
                                    <span class="text-muted">Dimensi:</span>
                                    <strong>{{ $scaffolding->dimensions }}</strong>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex justify-content-between">
                                    <span class="text-muted">Tinggi Maks:</span>
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
                                    @if($scaffolding->stock_quantity > 0)
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
                                    @if($related->rental_price)
                                        <span class="text-primary fw-bold">{{ $related->formatted_rental_price }}/hari</span>
                                    @endif
                                    @if($related->sale_price && !$related->rental_price)
                                        <span class="text-success fw-bold">{{ $related->formatted_sale_price }}</span>
                                    @endif
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
