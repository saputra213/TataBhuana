@extends('layouts.admin')

@section('title', 'Kelola Beranda - Admin Panel')
@section('page-title', 'Kelola Beranda')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Edit Konten Beranda</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.home.update') }}" method="POST">
                    @csrf

                    <h6 class="fw-bold mb-3">Bagian Highlight Utama</h6>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="home_highlight_kicker" class="form-label">Teks Kecil di Atas Judul</label>
                            <input type="text" class="form-control @error('home_highlight_kicker') is-invalid @enderror" id="home_highlight_kicker" name="home_highlight_kicker" value="{{ old('home_highlight_kicker', $profile->home_highlight_kicker ?? '') }}">
                            @error('home_highlight_kicker')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-8 mb-3">
                            <label for="home_highlight_title" class="form-label">Judul Utama Highlight</label>
                            <input type="text" class="form-control @error('home_highlight_title') is-invalid @enderror" id="home_highlight_title" name="home_highlight_title" value="{{ old('home_highlight_title', $profile->home_highlight_title ?? '') }}">
                            @error('home_highlight_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Highlight 1 - Label</label>
                            <input type="text" class="form-control @error('home_highlight_1_label') is-invalid @enderror" name="home_highlight_1_label" value="{{ old('home_highlight_1_label', $profile->home_highlight_1_label ?? '') }}" placeholder="Contoh: Terjangkau">
                            @error('home_highlight_1_label')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Highlight 1 - Judul</label>
                            <input type="text" class="form-control @error('home_highlight_1_title') is-invalid @enderror" name="home_highlight_1_title" value="{{ old('home_highlight_1_title', $profile->home_highlight_1_title ?? '') }}">
                            @error('home_highlight_1_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Highlight 1 - Deskripsi</label>
                            <textarea class="form-control @error('home_highlight_1_text') is-invalid @enderror" name="home_highlight_1_text" rows="2">{{ old('home_highlight_1_text', $profile->home_highlight_1_text ?? '') }}</textarea>
                            @error('home_highlight_1_text')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Highlight 2 - Label</label>
                            <input type="text" class="form-control @error('home_highlight_2_label') is-invalid @enderror" name="home_highlight_2_label" value="{{ old('home_highlight_2_label', $profile->home_highlight_2_label ?? '') }}" placeholder="Contoh: Berkualitas">
                            @error('home_highlight_2_label')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Highlight 2 - Judul</label>
                            <input type="text" class="form-control @error('home_highlight_2_title') is-invalid @enderror" name="home_highlight_2_title" value="{{ old('home_highlight_2_title', $profile->home_highlight_2_title ?? '') }}">
                            @error('home_highlight_2_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Highlight 2 - Deskripsi</label>
                            <textarea class="form-control @error('home_highlight_2_text') is-invalid @enderror" name="home_highlight_2_text" rows="2">{{ old('home_highlight_2_text', $profile->home_highlight_2_text ?? '') }}</textarea>
                            @error('home_highlight_2_text')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Highlight 3 - Label</label>
                            <input type="text" class="form-control @error('home_highlight_3_label') is-invalid @enderror" name="home_highlight_3_label" value="{{ old('home_highlight_3_label', $profile->home_highlight_3_label ?? '') }}" placeholder="Contoh: Bergaransi">
                            @error('home_highlight_3_label')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Highlight 3 - Judul</label>
                            <input type="text" class="form-control @error('home_highlight_3_title') is-invalid @enderror" name="home_highlight_3_title" value="{{ old('home_highlight_3_title', $profile->home_highlight_3_title ?? '') }}">
                            @error('home_highlight_3_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Highlight 3 - Deskripsi</label>
                            <textarea class="form-control @error('home_highlight_3_text') is-invalid @enderror" name="home_highlight_3_text" rows="2">{{ old('home_highlight_3_text', $profile->home_highlight_3_text ?? '') }}</textarea>
                            @error('home_highlight_3_text')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <hr class="my-4">

                    <h6 class="fw-bold mb-3">Bagian Layanan</h6>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="home_services_heading_title" class="form-label">Judul Bagian Layanan</label>
                            <input type="text" class="form-control @error('home_services_heading_title') is-invalid @enderror" id="home_services_heading_title" name="home_services_heading_title" value="{{ old('home_services_heading_title', $profile->home_services_heading_title ?? '') }}">
                            @error('home_services_heading_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="home_services_heading_subtitle" class="form-label">Subjudul Bagian Layanan</label>
                            <input type="text" class="form-control @error('home_services_heading_subtitle') is-invalid @enderror" id="home_services_heading_subtitle" name="home_services_heading_subtitle" value="{{ old('home_services_heading_subtitle', $profile->home_services_heading_subtitle ?? '') }}">
                            @error('home_services_heading_subtitle')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="home_services_1_title" class="form-label">Layanan 1 - Judul</label>
                            <input type="text" class="form-control @error('home_services_1_title') is-invalid @enderror" id="home_services_1_title" name="home_services_1_title" value="{{ old('home_services_1_title', $profile->home_services_1_title ?? '') }}">
                            @error('home_services_1_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="home_services_2_title" class="form-label">Layanan 2 - Judul</label>
                            <input type="text" class="form-control @error('home_services_2_title') is-invalid @enderror" id="home_services_2_title" name="home_services_2_title" value="{{ old('home_services_2_title', $profile->home_services_2_title ?? '') }}">
                            @error('home_services_2_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="home_services_3_title" class="form-label">Layanan 3 - Judul</label>
                            <input type="text" class="form-control @error('home_services_3_title') is-invalid @enderror" id="home_services_3_title" name="home_services_3_title" value="{{ old('home_services_3_title', $profile->home_services_3_title ?? '') }}">
                            @error('home_services_3_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="home_services_4_title" class="form-label">Layanan 4 - Judul</label>
                            <input type="text" class="form-control @error('home_services_4_title') is-invalid @enderror" id="home_services_4_title" name="home_services_4_title" value="{{ old('home_services_4_title', $profile->home_services_4_title ?? '') }}">
                            @error('home_services_4_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <hr class="my-4">

                    <h6 class="fw-bold mb-3">Bagian Mengapa Memilih Kami</h6>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="home_features_heading_title" class="form-label">Judul Bagian</label>
                            <input type="text" class="form-control @error('home_features_heading_title') is-invalid @enderror" id="home_features_heading_title" name="home_features_heading_title" value="{{ old('home_features_heading_title', $profile->home_features_heading_title ?? '') }}">
                            @error('home_features_heading_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="home_features_heading_subtitle" class="form-label">Subjudul Bagian</label>
                            <input type="text" class="form-control @error('home_features_heading_subtitle') is-invalid @enderror" id="home_features_heading_subtitle" name="home_features_heading_subtitle" value="{{ old('home_features_heading_subtitle', $profile->home_features_heading_subtitle ?? '') }}">
                            @error('home_features_heading_subtitle')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="home_features_1_title" class="form-label">Keunggulan 1</label>
                            <input type="text" class="form-control @error('home_features_1_title') is-invalid @enderror" id="home_features_1_title" name="home_features_1_title" value="{{ old('home_features_1_title', $profile->home_features_1_title ?? '') }}">
                            @error('home_features_1_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="home_features_2_title" class="form-label">Keunggulan 2</label>
                            <input type="text" class="form-control @error('home_features_2_title') is-invalid @enderror" id="home_features_2_title" name="home_features_2_title" value="{{ old('home_features_2_title', $profile->home_features_2_title ?? '') }}">
                            @error('home_features_2_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="home_features_3_title" class="form-label">Keunggulan 3</label>
                            <input type="text" class="form-control @error('home_features_3_title') is-invalid @enderror" id="home_features_3_title" name="home_features_3_title" value="{{ old('home_features_3_title', $profile->home_features_3_title ?? '') }}">
                            @error('home_features_3_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="home_features_4_title" class="form-label">Keunggulan 4</label>
                            <input type="text" class="form-control @error('home_features_4_title') is-invalid @enderror" id="home_features_4_title" name="home_features_4_title" value="{{ old('home_features_4_title', $profile->home_features_4_title ?? '') }}">
                            @error('home_features_4_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="home_features_5_title" class="form-label">Keunggulan 5</label>
                            <input type="text" class="form-control @error('home_features_5_title') is-invalid @enderror" id="home_features_5_title" name="home_features_5_title" value="{{ old('home_features_5_title', $profile->home_features_5_title ?? '') }}">
                            @error('home_features_5_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="home_features_6_title" class="form-label">Keunggulan 6</label>
                            <input type="text" class="form-control @error('home_features_6_title') is-invalid @enderror" id="home_features_6_title" name="home_features_6_title" value="{{ old('home_features_6_title', $profile->home_features_6_title ?? '') }}">
                            @error('home_features_6_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <hr class="my-4">

                    <h6 class="fw-bold mb-3">Bagian Artikel Terbaru</h6>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="home_articles_heading_title" class="form-label">Judul Bagian Artikel</label>
                            <input type="text" class="form-control @error('home_articles_heading_title') is-invalid @enderror" id="home_articles_heading_title" name="home_articles_heading_title" value="{{ old('home_articles_heading_title', $profile->home_articles_heading_title ?? '') }}">
                            @error('home_articles_heading_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="home_articles_heading_subtitle" class="form-label">Subjudul Bagian Artikel</label>
                            <input type="text" class="form-control @error('home_articles_heading_subtitle') is-invalid @enderror" id="home_articles_heading_subtitle" name="home_articles_heading_subtitle" value="{{ old('home_articles_heading_subtitle', $profile->home_articles_heading_subtitle ?? '') }}">
                            @error('home_articles_heading_subtitle')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <hr class="my-4">

                    <h6 class="fw-bold mb-3">Bagian Proyek Unggulan</h6>
                    <div class="mb-3">
                        <label for="home_projects_heading_title" class="form-label">Judul Bagian Proyek</label>
                        <input type="text" class="form-control @error('home_projects_heading_title') is-invalid @enderror" id="home_projects_heading_title" name="home_projects_heading_title" value="{{ old('home_projects_heading_title', $profile->home_projects_heading_title ?? '') }}">
                        @error('home_projects_heading_title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <hr class="my-4">

                    <h6 class="fw-bold mb-3">Bagian CTA</h6>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="home_cta_title" class="form-label">Judul CTA</label>
                            <input type="text" class="form-control @error('home_cta_title') is-invalid @enderror" id="home_cta_title" name="home_cta_title" value="{{ old('home_cta_title', $profile->home_cta_title ?? '') }}">
                            @error('home_cta_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="home_cta_subtitle" class="form-label">Subjudul CTA</label>
                            <input type="text" class="form-control @error('home_cta_subtitle') is-invalid @enderror" id="home_cta_subtitle" name="home_cta_subtitle" value="{{ old('home_cta_subtitle', $profile->home_cta_subtitle ?? '') }}">
                            @error('home_cta_subtitle')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="home_cta_button_text" class="form-label">Teks Tombol CTA</label>
                            <input type="text" class="form-control @error('home_cta_button_text') is-invalid @enderror" id="home_cta_button_text" name="home_cta_button_text" value="{{ old('home_cta_button_text', $profile->home_cta_button_text ?? '') }}">
                            @error('home_cta_button_text')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

