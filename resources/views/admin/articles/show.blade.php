@extends('layouts.admin')

@section('title', 'Detail Artikel - Admin Panel')
@section('page-title', 'Detail Artikel')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">{{ $article->title }}</h5>
                <div>
                    <a href="{{ route('admin.articles.edit', $article) }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-edit me-2"></i>Edit
                    </a>
                    <a href="{{ route('admin.articles.index') }}" class="btn btn-sm btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Kembali
                    </a>
                </div>
            </div>
            <div class="card-body">
                @if($article->image)
                    <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="img-fluid rounded mb-3">
                @else
                    <div class="bg-light d-flex align-items-center justify-content-center rounded mb-3" style="height: 300px;">
                        <div class="text-center">
                            <i class="fas fa-image fa-3x text-muted mb-2"></i>
                            <p class="text-muted">Tidak ada gambar</p>
                        </div>
                    </div>
                @endif
                
                <p class="mb-2">
                    Status:
                    @if($article->is_published)
                        <span class="badge bg-success">Dipublikasikan</span>
                    @else
                        <span class="badge bg-secondary">Draft</span>
                    @endif
                </p>
                <p class="text-muted">
                    Dipublikasikan: {{ $article->formatted_published_date ?? '-' }}
                </p>

                <hr>

                <div class="mt-3">
                    {!! $article->content !!}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                Informasi
            </div>
            <div class="card-body">
                <p class="mb-2"><strong>Slug:</strong> {{ $article->slug }}</p>
                @if($article->excerpt)
                    <p class="mb-2"><strong>Ringkasan:</strong> {{ $article->excerpt }}</p>
                @endif
                <a href="{{ route('articles.show', $article) }}" target="_blank" class="btn btn-outline-primary">
                    <i class="fas fa-external-link-alt me-2"></i>Lihat di Website
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
