@extends('layouts.app')

@section('title', 'Artikel & Berita - Tata Bhuana')
@section('description', 'Kumpulan artikel dan berita terbaru seputar scaffolding dan proyek.')

@section('content')
<section class="py-5 bg-light">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-0">Artikel & Berita</h1>
            <form action="{{ route('articles.index') }}" method="GET" class="d-flex" style="max-width: 360px;">
                <input type="text" name="search" value="{{ request('search') }}" class="form-control me-2" placeholder="Cari artikel...">
                <button class="btn btn-primary" type="submit"><i class="fas fa-search me-1"></i>Cari</button>
            </form>
        </div>

        @if($articles->count() > 0)
            <div class="row">
                @foreach($articles as $article)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100">
                            @if($article->image)
                                <img src="{{ asset('storage/' . $article->image) }}" class="card-img-top" alt="{{ $article->title }}" style="height: 200px; object-fit: cover;">
                            @endif
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $article->title }}</h5>
                                @if($article->excerpt)
                                    <p class="card-text text-muted">{{ $article->excerpt }}</p>
                                @else
                                    <p class="card-text text-muted">{{ \Illuminate\Support\Str::limit(strip_tags($article->content), 120) }}</p>
                                @endif
                                <div class="mt-auto d-flex justify-content-between align-items-center">
                                    <small class="text-muted">
                                        <i class="far fa-calendar-alt me-1"></i>
                                        {{ $article->formatted_published_date ?? $article->created_at->format('d M Y') }}
                                    </small>
                                    <a href="{{ route('articles.show', $article) }}" class="btn btn-outline-primary btn-sm">
                                        Baca Selengkapnya
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="d-flex justify-content-center">
                {{ $articles->withQueryString()->links() }}
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-newspaper fa-3x text-muted mb-3"></i>
                <h5 class="text-muted">Belum ada artikel yang dipublikasikan</h5>
            </div>
        @endif
    </div>
@endsection

