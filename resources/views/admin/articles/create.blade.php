@extends('layouts.admin')

@section('title', 'Tambah Artikel - Admin Panel')
@section('page-title', 'Tambah Artikel')

@push('styles')
<!-- Summernote CSS -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<style>
    .note-editor .note-toolbar {
        background: #f8f9fa;
    }
</style>
@endpush

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Pengarang <small class="text-muted">(Maks. 255 karakter)</small></label>
                    <input type="text" name="author" class="form-control" value="{{ old('author', auth('admin')->user()->name) }}" placeholder="Admin" maxlength="255">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Kategori <span class="text-danger">*</span></label>
                    <select name="category" class="form-select" required>
                        <option value="" disabled {{ old('category') ? '' : 'selected' }}>Pilih salah satu opsi</option>
                        <option value="Berita" {{ old('category') == 'Berita' ? 'selected' : '' }}>Berita</option>
                        <option value="Tutorial" {{ old('category') == 'Tutorial' ? 'selected' : '' }}>Tutorial</option>
                        <option value="Tips & Trik" {{ old('category') == 'Tips & Trik' ? 'selected' : '' }}>Tips & Trik</option>
                        <option value="Lainnya" {{ old('category') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Judul Artikel <span class="text-danger">*</span> <small class="text-muted">(Maks. 255 karakter)</small></label>
                    <input type="text" name="title" class="form-control" value="{{ old('title') }}" required maxlength="255">
                </div>
                <div class="col-md-6">
                    <label class="form-label">URL Artikel <small class="text-muted">(Maks. 255 karakter)</small></label>
                    <input type="text" name="slug" class="form-control" value="{{ old('slug') }}" placeholder="kosongkan untuk generate otomatis" maxlength="255">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi <small class="text-muted">(Maks. 160 karakter)</small></label>
                <textarea name="excerpt" class="form-control" rows="3" maxlength="160" placeholder="Maksimal 160 Karakter (opsional)">{{ old('excerpt') }}</textarea>
                <div class="form-text">Maksimal 160 Karakter (opsional)</div>
            </div>

            <div class="mb-3">
                <label class="form-label">Keywords <small class="text-muted">(Maks. 255 karakter)</small></label>
                <input type="text" name="keywords" class="form-control" value="{{ old('keywords') }}" placeholder="Pisahkan dengan koma" maxlength="255">
                <div class="form-text">Pisahkan dengan koma</div>
            </div>

            <div class="mb-3">
                <label class="form-label">Gambar Thumbnail</label>
                <input type="file" name="image" class="form-control" accept="image/*,.webp">
                <div class="form-text">Seret & Jatuhkan berkas Anda atau Jelajahi</div>
            </div>

            <div class="mb-3">
                <label class="form-label">Tulis Artikel <span class="text-danger">*</span></label>
                <textarea name="content" id="summernote" class="form-control" required>{{ old('content') }}</textarea>
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
    </div>
</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/summernote-lite.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            placeholder: 'Tulis artikel anda disini...',
            tabsize: 2,
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    });
</script>
@endpush
