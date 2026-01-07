@extends('layouts.app')

@section('title', 'Artikel & Berita - Tata Bhuana')
@section('description', 'Kumpulan artikel dan berita terbaru seputar scaffolding dan proyek.')

@section('content')
<!-- Hero Section -->
<section class="articles-hero text-white py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center hero-content">
                <h1 class="display-3 fw-bold mb-3">Artikel & Berita</h1>
                <p class="lead hero-subtitle">Kumpulan artikel dan berita terbaru seputar scaffolding dan proyek</p>
            </div>
        </div>
    </div>
</section>

<!-- Search Section -->
<section class="py-4 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <form action="{{ route('articles.index') }}" method="GET" class="d-flex shadow-sm rounded overflow-hidden">
                    <input type="text" name="search" value="{{ request('search') }}" class="form-control border-0 py-3 px-4" placeholder="Cari artikel..." style="border-radius: 0;">
                    <button class="btn btn-primary px-4" type="submit" style="border-radius: 0;"><i class="fas fa-search me-1"></i> Cari</button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Articles Grid -->
<section class="py-5">
    <div class="container">
        @if($articles->count() > 0)
            <div class="row g-4">
                @foreach($articles as $article)
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 shadow-sm article-card">
                            <div class="card-img-wrapper overflow-hidden position-relative">
                                @if($article->image)
                                    <img src="{{ asset('storage/' . $article->image) }}" class="card-img-top" alt="{{ $article->title }}" style="height: 250px; object-fit: cover;">
                                @else
                                    <div class="bg-light d-flex align-items-center justify-content-center" style="height: 250px; width: 100%;">
                                        <i class="fas fa-newspaper fa-3x text-muted"></i>
                                    </div>
                                @endif
                                <div class="card-overlay">
                                    <a href="{{ route('articles.show', $article) }}" class="btn btn-light btn-sm rounded-pill px-3">Baca Artikel</a>
                                </div>
                            </div>
                            
                            <div class="card-body d-flex flex-column p-4">
                                <div class="mb-2 text-muted small d-flex align-items-center">
                                    <i class="far fa-calendar-alt me-2 text-primary"></i>
                                    {{ $article->formatted_published_date ?? $article->created_at->format('d M Y') }}
                                </div>
                                
                                <h5 class="card-title fw-bold mb-3">
                                    <a href="{{ route('articles.show', $article) }}" class="text-decoration-none text-dark stretched-link-fake">
                                        {{ $article->title }}
                                    </a>
                                </h5>
                                
                                @if($article->excerpt)
                                    <p class="card-text text-muted flex-grow-1">{{ $article->excerpt }}</p>
                                @else
                                    <p class="card-text text-muted flex-grow-1">{{ \Illuminate\Support\Str::limit(strip_tags($article->content), 120) }}</p>
                                @endif
                                
                                <div class="mt-3 pt-3 border-top">
                                    <a href="{{ route('articles.show', $article) }}" class="text-primary text-decoration-none fw-bold small">
                                        BACA SELENGKAPNYA <i class="fas fa-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="d-flex justify-content-center mt-5">
                {{ $articles->withQueryString()->links() }}
            </div>
        @else
            <div class="text-center py-5">
                <div class="mb-4">
                    <div class="d-inline-flex align-items-center justify-content-center bg-light rounded-circle" style="width: 100px; height: 100px;">
                        <i class="fas fa-newspaper fa-3x text-muted"></i>
                    </div>
                </div>
                <h4 class="text-muted mb-2">Belum ada artikel yang dipublikasikan</h4>
                @if(request('search'))
                    <p class="text-muted">Tidak ditemukan artikel dengan kata kunci "{{ request('search') }}"</p>
                    <a href="{{ route('articles.index') }}" class="btn btn-outline-primary mt-2">
                        <i class="fas fa-sync-alt me-2"></i>Reset Pencarian
                    </a>
                @endif
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
        
        <div class="row g-4 icon-grid-3">
            <div class="col-md-4">
                <div class="text-center p-4 bg-white rounded shadow-sm h-100 contact-card">
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
                <div class="text-center p-4 bg-white rounded shadow-sm h-100 contact-card">
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
                <div class="text-center p-4 bg-white rounded shadow-sm h-100 contact-card">
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
/* Hero Section */
.articles-hero {
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

/* Article Cards */
.article-card {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    border: none;
    border-radius: 12px;
    overflow: hidden;
}

.article-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1) !important;
}

.card-img-wrapper img {
    transition: transform 0.5s ease;
}

.article-card:hover .card-img-wrapper img {
    transform: scale(1.1);
}

.card-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.3);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.article-card:hover .card-overlay {
    opacity: 1;
}

.stretched-link-fake:hover {
    color: #dc2626 !important;
}

/* Contact Card */
.contact-card {
    transition: transform 0.3s ease;
}

.contact-card:hover {
    transform: translateY(-5px);
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
    .articles-hero {
        padding: 80px 0 60px;
    }
    
    .scroll-to-top-btn {
        bottom: 90px;
        right: 20px;
        width: 48px;
        height: 48px;
        font-size: 1.2rem;
        z-index: 9996;
    }
}

@media (max-width: 480px) {
    .scroll-to-top-btn {
        bottom: 100px;
        right: 15px;
        width: 46px;
        height: 46px;
        font-size: 1.1rem;
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
