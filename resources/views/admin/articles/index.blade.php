@extends('layouts.admin')

@section('title', 'Kelola Artikel - Admin Panel')
@section('page-title', 'Kelola Artikel')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Daftar Artikel</h2>
    <a href="{{ route('admin.articles.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Tambah Artikel
    </a>
</div>

@if($articles->count() > 0)
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Gambar</th>
                            <th>Judul</th>
                            <th>Status</th>
                            <th>Dipublikasikan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($articles as $article)
                        <tr>
                            <td>
                                @if($article->image)
                                    <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="img-thumbnail" style="width: 60px; height: 60px; object-fit: cover;">
                                @else
                                    <div class="bg-light d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                                        <i class="fas fa-image text-muted"></i>
                                    </div>
                                @endif
                            </td>
                            <td>{{ $article->title }}</td>
                            <td>
                                @if($article->is_published)
                                    <span class="badge bg-success">Dipublikasikan</span>
                                @else
                                    <span class="badge bg-secondary">Draft</span>
                                @endif
                            </td>
                            <td>{{ $article->formatted_published_date ?? '-' }}</td>
                            <td>
                                <a href="{{ route('admin.articles.show', $article) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-eye me-1"></i>Lihat
                                </a>
                                <a href="{{ route('admin.articles.edit', $article) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit me-1"></i>Edit
                                </a>
                                <form action="{{ route('admin.articles.destroy', $article) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus artikel ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash me-1"></i>Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                {{ $articles->links() }}
            </div>
        </div>
    </div>
@else
    <div class="text-center py-5">
        <i class="fas fa-newspaper fa-3x text-muted mb-3"></i>
        <h5 class="text-muted">Belum ada artikel</h5>
    </div>
@endif
@endsection
