@extends('layouts.admin')

@section('title', 'Edit Artikel - Admin Panel')
@section('page-title', 'Edit Artikel')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.articles.update', $article) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $article->title) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Ringkasan (opsional)</label>
                <input type="text" name="excerpt" class="form-control" value="{{ old('excerpt', $article->excerpt) }}" maxlength="255">
            </div>

            <div class="mb-3">
                <label class="form-label">Konten</label>
                <textarea name="content" class="form-control rich-editor" rows="8" required>{{ old('content', $article->content) }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Gambar Sampul (opsional)</label>
                <input type="file" name="image" class="form-control" accept="image/*">
                @if($article->image)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="rounded" style="height: 80px; width: auto;">
                    </div>
                @endif
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="is_published" id="is_published" {{ old('is_published', $article->is_published) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_published">Publikasikan</label>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="mb-3">
                        <label class="form-label">Tanggal Publikasi (opsional)</label>
                        <input type="datetime-local" name="published_at" class="form-control" value="{{ old('published_at', optional($article->published_at)->format('Y-m-d\TH:i')) }}">
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ route('admin.articles.index') }}" class="btn btn-secondary me-2">
                    <i class="fas fa-arrow-left me-1"></i>Kembali
                </a>
                <button class="btn btn-primary">
                    <i class="fas fa-save me-1"></i>Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');
    document.querySelectorAll('textarea.rich-editor').forEach(function(el){
        ClassicEditor.create(el, {
            toolbar: {
                items: [
                    'heading', '|',
                    'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', '|',
                    'insertTable', 'undo', 'redo'
                ],
                shouldNotGroupWhenFull: true
            },
            heading: {
                options: [
                    { model: 'paragraph', title: 'Paragraf', class: 'ck-heading_paragraph' },
                    { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                    { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                    { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                    { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                    { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                    { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
                ]
            },
            placeholder: 'Tulis konten artikel di sini...',
            table: {
                contentToolbar: [ 'tableColumn', 'tableRow', 'mergeTableCells' ]
            }
        })
        .then(editor => {
            // Sinkronisasi data saat form disubmit
            if(form) {
                form.addEventListener('submit', () => {
                    editor.updateSourceElement();
                });
            }
            
            // Opsional: Sinkronisasi data saat mengetik (agar validasi HTML5 required berfungsi jika ada)
            editor.model.document.on('change:data', () => {
                editor.updateSourceElement();
            });
        })
        .catch(function(error){
            console.error(error);
        });
    });
});
</script>
@endpush
