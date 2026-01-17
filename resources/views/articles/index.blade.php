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
                                @php
                                    $imageSrc = $article->image;
                                    if ($imageSrc && !\Illuminate\Support\Str::startsWith($imageSrc, ['http://', 'https://'])) {
                                        $imageSrc = asset('storage/' . $imageSrc);
                                    }
                                @endphp
                                @if($imageSrc)
                                    <img src="{{ $imageSrc }}" class="card-img-top" alt="{{ $article->title }}" style="height: 250px; object-fit: cover;" loading="lazy" decoding="async">
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


@push('styles')
    @vite(['resources/css/articles/index.css'])
@endpush

<!-- Scroll to Top Button -->
<button id="scrollToTopBtn" class="scroll-to-top-btn" title="Scroll ke Atas">
    <i class="fas fa-arrow-up"></i>
</button>

@push('scripts')
    @vite(['resources/js/articles/index.js'])
@endpush
@endsection
