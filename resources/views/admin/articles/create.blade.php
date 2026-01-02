@extends('layouts.admin')

@section('title', 'Tambah Artikel - Admin Panel')
@section('page-title', 'Tambah Artikel')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Ringkasan (opsional)</label>
                <input type="text" name="excerpt" class="form-control" value="{{ old('excerpt') }}" maxlength="255">
            </div>

            <div class="mb-3">
                <label class="form-label">Konten</label>
                <textarea name="content" class="form-control" rows="8" required>{{ old('content') }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Gambar Sampul (opsional)</label>
                <input type="file" name="image" class="form-control" accept="image/*">
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="is_published" id="is_published" {{ old('is_published') ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_published">Publikasikan</label>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="mb-3">
                        <label class="form-label">Tanggal Publikasi (opsional)</label>
                        <input type="datetime-local" name="published_at" class="form-control" value="{{ old('published_at') }}">
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ route('admin.articles.index') }}" class="btn btn-secondary me-2">
                    <i class="fas fa-arrow-left me-1"></i>Kembali
                </a>
                <button class="btn btn-primary">
                    <i class="fas fa-save me-1"></i>Simpan
                </button>
            </div>
        </form>
    </div>
@endsection

