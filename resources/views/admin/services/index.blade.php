@extends('layouts.admin')

@section('title', 'Kelola Halaman Layanan - Admin Panel')
@section('page-title', 'Kelola Halaman Layanan')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Edit Konten Halaman Layanan</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.services.update') }}" method="POST">
                    @csrf

                    <p class="text-muted small mb-4">
                        Di bawah ini Anda bisa mengatur teks untuk setiap bagian di masing-masing halaman layanan.
                        Semua field bersifat opsional, jika dikosongkan maka akan menggunakan teks bawaan.
                    </p>

                    <h5 class="fw-bold mt-3 mb-3">Penjualan</h5>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Judul Hero <small class="text-muted">(Maks. 255 karakter)</small></label>
                            <input type="text" name="service_sales_hero_title" class="form-control @error('service_sales_hero_title') is-invalid @enderror" value="{{ old('service_sales_hero_title', $profile->service_sales_hero_title ?? '') }}" maxlength="255">
                            @error('service_sales_hero_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Subjudul Hero <small class="text-muted">(Maks. 255 karakter)</small></label>
                            <input type="text" name="service_sales_hero_subtitle" class="form-control @error('service_sales_hero_subtitle') is-invalid @enderror" value="{{ old('service_sales_hero_subtitle', $profile->service_sales_hero_subtitle ?? '') }}" maxlength="255">
                            @error('service_sales_hero_subtitle')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Judul Bagian Pembuka <small class="text-muted">(Maks. 255 karakter)</small></label>
                        <input type="text" name="service_sales_intro_title" class="form-control @error('service_sales_intro_title') is-invalid @enderror" value="{{ old('service_sales_intro_title', $profile->service_sales_intro_title ?? '') }}" maxlength="255">
                        @error('service_sales_intro_title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Teks Bagian Pembuka <small class="text-muted">(Maks. 500 karakter)</small></label>
                        <textarea name="service_sales_intro_text" rows="3" class="form-control @error('service_sales_intro_text') is-invalid @enderror" maxlength="500">{{ old('service_sales_intro_text', $profile->service_sales_intro_text ?? '') }}</textarea>
                        @error('service_sales_intro_text')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Judul Keunggulan <small class="text-muted">(Maks. 255 karakter)</small></label>
                        <input type="text" name="service_sales_section_title" class="form-control @error('service_sales_section_title') is-invalid @enderror" value="{{ old('service_sales_section_title', $profile->service_sales_section_title ?? '') }}" maxlength="255">
                        @error('service_sales_section_title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Daftar Keunggulan (satu baris satu poin) <small class="text-muted">(Maks. 1000 karakter)</small></label>
                        <textarea name="service_sales_section_bullets" rows="4" class="form-control @error('service_sales_section_bullets') is-invalid @enderror" maxlength="1000">{{ old('service_sales_section_bullets', $profile->service_sales_section_bullets ?? '') }}</textarea>
                        @error('service_sales_section_bullets')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Judul Contoh Penggunaan <small class="text-muted">(Maks. 255 karakter)</small></label>
                        <input type="text" name="service_sales_extra_title" class="form-control @error('service_sales_extra_title') is-invalid @enderror" value="{{ old('service_sales_extra_title', $profile->service_sales_extra_title ?? '') }}" maxlength="255">
                        @error('service_sales_extra_title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Card 1 - Judul <small class="text-muted">(Maks. 255 karakter)</small></label>
                            <input type="text" name="service_sales_extra_1_title" class="form-control @error('service_sales_extra_1_title') is-invalid @enderror" value="{{ old('service_sales_extra_1_title', $profile->service_sales_extra_1_title ?? '') }}" maxlength="255">
                            @error('service_sales_extra_1_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Card 1 - Deskripsi <small class="text-muted">(Maks. 500 karakter)</small></label>
                            <textarea name="service_sales_extra_1_text" rows="2" class="form-control @error('service_sales_extra_1_text') is-invalid @enderror" maxlength="500">{{ old('service_sales_extra_1_text', $profile->service_sales_extra_1_text ?? '') }}</textarea>
                            @error('service_sales_extra_1_text')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Card 2 - Judul <small class="text-muted">(Maks. 255 karakter)</small></label>
                            <input type="text" name="service_sales_extra_2_title" class="form-control @error('service_sales_extra_2_title') is-invalid @enderror" value="{{ old('service_sales_extra_2_title', $profile->service_sales_extra_2_title ?? '') }}" maxlength="255">
                            @error('service_sales_extra_2_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Card 2 - Deskripsi <small class="text-muted">(Maks. 500 karakter)</small></label>
                            <textarea name="service_sales_extra_2_text" rows="2" class="form-control @error('service_sales_extra_2_text') is-invalid @enderror" maxlength="500">{{ old('service_sales_extra_2_text', $profile->service_sales_extra_2_text ?? '') }}</textarea>
                            @error('service_sales_extra_2_text')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Sidebar - Judul <small class="text-muted">(Maks. 255 karakter)</small></label>
                        <input type="text" name="service_sales_side_title" class="form-control @error('service_sales_side_title') is-invalid @enderror" value="{{ old('service_sales_side_title', $profile->service_sales_side_title ?? '') }}" maxlength="255">
                        @error('service_sales_side_title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Sidebar - Teks <small class="text-muted">(Maks. 500 karakter)</small></label>
                        <textarea name="service_sales_side_text" rows="3" class="form-control @error('service_sales_side_text') is-invalid @enderror" maxlength="500">{{ old('service_sales_side_text', $profile->service_sales_side_text ?? '') }}</textarea>
                        @error('service_sales_side_text')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Sidebar - Teks Tombol <small class="text-muted">(Maks. 50 karakter)</small></label>
                            <input type="text" name="service_sales_side_button_text" class="form-control @error('service_sales_side_button_text') is-invalid @enderror" value="{{ old('service_sales_side_button_text', $profile->service_sales_side_button_text ?? '') }}" maxlength="50">
                            @error('service_sales_side_button_text')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Sidebar - Teks Kecil Bawah <small class="text-muted">(Maks. 255 karakter)</small></label>
                            <textarea name="service_sales_side_footer_text" rows="2" class="form-control @error('service_sales_side_footer_text') is-invalid @enderror" maxlength="255">{{ old('service_sales_side_footer_text', $profile->service_sales_side_footer_text ?? '') }}</textarea>
                            @error('service_sales_side_footer_text')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <hr class="my-4">

                    <h5 class="fw-bold mt-3 mb-3">Persewaan</h5>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Judul Hero <small class="text-muted">(Maks. 255 karakter)</small></label>
                            <input type="text" name="service_rental_hero_title" class="form-control @error('service_rental_hero_title') is-invalid @enderror" value="{{ old('service_rental_hero_title', $profile->service_rental_hero_title ?? '') }}" maxlength="255">
                            @error('service_rental_hero_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Subjudul Hero <small class="text-muted">(Maks. 255 karakter)</small></label>
                            <input type="text" name="service_rental_hero_subtitle" class="form-control @error('service_rental_hero_subtitle') is-invalid @enderror" value="{{ old('service_rental_hero_subtitle', $profile->service_rental_hero_subtitle ?? '') }}" maxlength="255">
                            @error('service_rental_hero_subtitle')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Judul Bagian Pembuka <small class="text-muted">(Maks. 255 karakter)</small></label>
                        <input type="text" name="service_rental_intro_title" class="form-control @error('service_rental_intro_title') is-invalid @enderror" value="{{ old('service_rental_intro_title', $profile->service_rental_intro_title ?? '') }}" maxlength="255">
                        @error('service_rental_intro_title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Teks Bagian Pembuka <small class="text-muted">(Maks. 500 karakter)</small></label>
                        <textarea name="service_rental_intro_text" rows="3" class="form-control @error('service_rental_intro_text') is-invalid @enderror" maxlength="500">{{ old('service_rental_intro_text', $profile->service_rental_intro_text ?? '') }}</textarea>
                        @error('service_rental_intro_text')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Judul Benefit <small class="text-muted">(Maks. 255 karakter)</small></label>
                        <input type="text" name="service_rental_section_title" class="form-control @error('service_rental_section_title') is-invalid @enderror" value="{{ old('service_rental_section_title', $profile->service_rental_section_title ?? '') }}" maxlength="255">
                        @error('service_rental_section_title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Daftar Benefit (satu baris satu poin) <small class="text-muted">(Maks. 1000 karakter)</small></label>
                        <textarea name="service_rental_section_bullets" rows="4" class="form-control @error('service_rental_section_bullets') is-invalid @enderror" maxlength="1000">{{ old('service_rental_section_bullets', $profile->service_rental_section_bullets ?? '') }}</textarea>
                        @error('service_rental_section_bullets')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Judul Alur Penyewaan <small class="text-muted">(Maks. 255 karakter)</small></label>
                        <input type="text" name="service_rental_extra_title" class="form-control @error('service_rental_extra_title') is-invalid @enderror" value="{{ old('service_rental_extra_title', $profile->service_rental_extra_title ?? '') }}" maxlength="255">
                        @error('service_rental_extra_title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Langkah 1 <small class="text-muted">(Maks. 500 karakter)</small></label>
                            <textarea name="service_rental_extra_1_text" rows="2" class="form-control @error('service_rental_extra_1_text') is-invalid @enderror" maxlength="500">{{ old('service_rental_extra_1_text', $profile->service_rental_extra_1_text ?? '') }}</textarea>
                            @error('service_rental_extra_1_text')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Langkah 2 <small class="text-muted">(Maks. 500 karakter)</small></label>
                            <textarea name="service_rental_extra_2_text" rows="2" class="form-control @error('service_rental_extra_2_text') is-invalid @enderror" maxlength="500">{{ old('service_rental_extra_2_text', $profile->service_rental_extra_2_text ?? '') }}</textarea>
                            @error('service_rental_extra_2_text')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Sidebar - Judul <small class="text-muted">(Maks. 255 karakter)</small></label>
                        <input type="text" name="service_rental_side_title" class="form-control @error('service_rental_side_title') is-invalid @enderror" value="{{ old('service_rental_side_title', $profile->service_rental_side_title ?? '') }}" maxlength="255">
                        @error('service_rental_side_title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Sidebar - Teks <small class="text-muted">(Maks. 500 karakter)</small></label>
                        <textarea name="service_rental_side_text" rows="3" class="form-control @error('service_rental_side_text') is-invalid @enderror" maxlength="500">{{ old('service_rental_side_text', $profile->service_rental_side_text ?? '') }}</textarea>
                        @error('service_rental_side_text')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Sidebar - Teks Tombol <small class="text-muted">(Maks. 50 karakter)</small></label>
                            <input type="text" name="service_rental_side_button_text" class="form-control @error('service_rental_side_button_text') is-invalid @enderror" value="{{ old('service_rental_side_button_text', $profile->service_rental_side_button_text ?? '') }}" maxlength="50">
                            @error('service_rental_side_button_text')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Sidebar - Teks Kecil Bawah <small class="text-muted">(Maks. 255 karakter)</small></label>
                            <textarea name="service_rental_side_footer_text" rows="2" class="form-control @error('service_rental_side_footer_text') is-invalid @enderror" maxlength="255">{{ old('service_rental_side_footer_text', $profile->service_rental_side_footer_text ?? '') }}</textarea>
                            @error('service_rental_side_footer_text')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <hr class="my-4">

                    <h5 class="fw-bold mt-3 mb-3">Pengiriman</h5>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Judul Hero <small class="text-muted">(Maks. 255 karakter)</small></label>
                            <input type="text" name="service_delivery_hero_title" class="form-control @error('service_delivery_hero_title') is-invalid @enderror" value="{{ old('service_delivery_hero_title', $profile->service_delivery_hero_title ?? '') }}" maxlength="255">
                            @error('service_delivery_hero_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Subjudul Hero <small class="text-muted">(Maks. 255 karakter)</small></label>
                            <input type="text" name="service_delivery_hero_subtitle" class="form-control @error('service_delivery_hero_subtitle') is-invalid @enderror" value="{{ old('service_delivery_hero_subtitle', $profile->service_delivery_hero_subtitle ?? '') }}" maxlength="255">
                            @error('service_delivery_hero_subtitle')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Judul Bagian Utama <small class="text-muted">(Maks. 255 karakter)</small></label>
                        <input type="text" name="service_delivery_intro_title" class="form-control @error('service_delivery_intro_title') is-invalid @enderror" value="{{ old('service_delivery_intro_title', $profile->service_delivery_intro_title ?? '') }}" maxlength="255">
                        @error('service_delivery_intro_title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Teks Bagian Utama <small class="text-muted">(Maks. 500 karakter)</small></label>
                        <textarea name="service_delivery_intro_text" rows="3" class="form-control @error('service_delivery_intro_text') is-invalid @enderror" maxlength="500">{{ old('service_delivery_intro_text', $profile->service_delivery_intro_text ?? '') }}</textarea>
                        @error('service_delivery_intro_text')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Judul Poin Pengiriman <small class="text-muted">(Maks. 255 karakter)</small></label>
                        <input type="text" name="service_delivery_section_title" class="form-control @error('service_delivery_section_title') is-invalid @enderror" value="{{ old('service_delivery_section_title', $profile->service_delivery_section_title ?? '') }}" maxlength="255">
                        @error('service_delivery_section_title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Daftar Poin Pengiriman (satu baris satu poin) <small class="text-muted">(Maks. 1000 karakter)</small></label>
                        <textarea name="service_delivery_section_bullets" rows="4" class="form-control @error('service_delivery_section_bullets') is-invalid @enderror" maxlength="1000">{{ old('service_delivery_section_bullets', $profile->service_delivery_section_bullets ?? '') }}</textarea>
                        @error('service_delivery_section_bullets')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Judul Informasi Tambahan <small class="text-muted">(Maks. 255 karakter)</small></label>
                        <input type="text" name="service_delivery_extra_title" class="form-control @error('service_delivery_extra_title') is-invalid @enderror" value="{{ old('service_delivery_extra_title', $profile->service_delivery_extra_title ?? '') }}" maxlength="255">
                        @error('service_delivery_extra_title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Teks Informasi Tambahan <small class="text-muted">(Maks. 500 karakter)</small></label>
                        <textarea name="service_delivery_extra_1_text" rows="3" class="form-control @error('service_delivery_extra_1_text') is-invalid @enderror" maxlength="500">{{ old('service_delivery_extra_1_text', $profile->service_delivery_extra_1_text ?? '') }}</textarea>
                        @error('service_delivery_extra_1_text')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Sidebar - Judul <small class="text-muted">(Maks. 255 karakter)</small></label>
                        <input type="text" name="service_delivery_side_title" class="form-control @error('service_delivery_side_title') is-invalid @enderror" value="{{ old('service_delivery_side_title', $profile->service_delivery_side_title ?? '') }}" maxlength="255">
                        @error('service_delivery_side_title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Sidebar - Teks <small class="text-muted">(Maks. 500 karakter)</small></label>
                        <textarea name="service_delivery_side_text" rows="3" class="form-control @error('service_delivery_side_text') is-invalid @enderror" maxlength="500">{{ old('service_delivery_side_text', $profile->service_delivery_side_text ?? '') }}</textarea>
                        @error('service_delivery_side_text')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Sidebar - Teks Tombol <small class="text-muted">(Maks. 50 karakter)</small></label>
                            <input type="text" name="service_delivery_side_button_text" class="form-control @error('service_delivery_side_button_text') is-invalid @enderror" value="{{ old('service_delivery_side_button_text', $profile->service_delivery_side_button_text ?? '') }}" maxlength="50">
                            @error('service_delivery_side_button_text')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Sidebar - Teks Kecil Bawah <small class="text-muted">(Maks. 255 karakter)</small></label>
                            <textarea name="service_delivery_side_footer_text" rows="2" class="form-control @error('service_delivery_side_footer_text') is-invalid @enderror" maxlength="255">{{ old('service_delivery_side_footer_text', $profile->service_delivery_side_footer_text ?? '') }}</textarea>
                            @error('service_delivery_side_footer_text')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <hr class="my-4">

                    <h5 class="fw-bold mt-3 mb-3">Konsultasi</h5>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Judul Hero <small class="text-muted">(Maks. 255 karakter)</small></label>
                            <input type="text" name="service_consultation_hero_title" class="form-control @error('service_consultation_hero_title') is-invalid @enderror" value="{{ old('service_consultation_hero_title', $profile->service_consultation_hero_title ?? '') }}" maxlength="255">
                            @error('service_consultation_hero_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Subjudul Hero <small class="text-muted">(Maks. 255 karakter)</small></label>
                            <input type="text" name="service_consultation_hero_subtitle" class="form-control @error('service_consultation_hero_subtitle') is-invalid @enderror" value="{{ old('service_consultation_hero_subtitle', $profile->service_consultation_hero_subtitle ?? '') }}" maxlength="255">
                            @error('service_consultation_hero_subtitle')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Judul Bagian Utama <small class="text-muted">(Maks. 255 karakter)</small></label>
                        <input type="text" name="service_consultation_intro_title" class="form-control @error('service_consultation_intro_title') is-invalid @enderror" value="{{ old('service_consultation_intro_title', $profile->service_consultation_intro_title ?? '') }}" maxlength="255">
                        @error('service_consultation_intro_title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Teks Bagian Utama <small class="text-muted">(Maks. 1000 karakter)</small></label>
                        <textarea name="service_consultation_intro_text" rows="3" class="form-control @error('service_consultation_intro_text') is-invalid @enderror" maxlength="1000">{{ old('service_consultation_intro_text', $profile->service_consultation_intro_text ?? '') }}</textarea>
                        @error('service_consultation_intro_text')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Judul Poin Pembahasan <small class="text-muted">(Maks. 255 karakter)</small></label>
                        <input type="text" name="service_consultation_section_title" class="form-control @error('service_consultation_section_title') is-invalid @enderror" value="{{ old('service_consultation_section_title', $profile->service_consultation_section_title ?? '') }}" maxlength="255">
                        @error('service_consultation_section_title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Daftar Topik (satu baris satu poin) <small class="text-muted">(Maks. 1000 karakter)</small></label>
                        <textarea name="service_consultation_section_bullets" rows="4" class="form-control @error('service_consultation_section_bullets') is-invalid @enderror" maxlength="1000">{{ old('service_consultation_section_bullets', $profile->service_consultation_section_bullets ?? '') }}</textarea>
                        @error('service_consultation_section_bullets')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Judul Data yang Disiapkan <small class="text-muted">(Maks. 255 karakter)</small></label>
                        <input type="text" name="service_consultation_extra_title" class="form-control @error('service_consultation_extra_title') is-invalid @enderror" value="{{ old('service_consultation_extra_title', $profile->service_consultation_extra_title ?? '') }}" maxlength="255">
                        @error('service_consultation_extra_title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Teks Data yang Disiapkan <small class="text-muted">(Maks. 1000 karakter)</small></label>
                        <textarea name="service_consultation_extra_1_text" rows="3" class="form-control @error('service_consultation_extra_1_text') is-invalid @enderror" maxlength="1000">{{ old('service_consultation_extra_1_text', $profile->service_consultation_extra_1_text ?? '') }}</textarea>
                        @error('service_consultation_extra_1_text')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Sidebar - Judul <small class="text-muted">(Maks. 255 karakter)</small></label>
                        <input type="text" name="service_consultation_side_title" class="form-control @error('service_consultation_side_title') is-invalid @enderror" value="{{ old('service_consultation_side_title', $profile->service_consultation_side_title ?? '') }}" maxlength="255">
                        @error('service_consultation_side_title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Sidebar - Teks <small class="text-muted">(Maks. 500 karakter)</small></label>
                        <textarea name="service_consultation_side_text" rows="3" class="form-control @error('service_consultation_side_text') is-invalid @enderror" maxlength="500">{{ old('service_consultation_side_text', $profile->service_consultation_side_text ?? '') }}</textarea>
                        @error('service_consultation_side_text')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Sidebar - Teks Tombol <small class="text-muted">(Maks. 50 karakter)</small></label>
                            <input type="text" name="service_consultation_side_button_text" class="form-control @error('service_consultation_side_button_text') is-invalid @enderror" value="{{ old('service_consultation_side_button_text', $profile->service_consultation_side_button_text ?? '') }}" maxlength="50">
                            @error('service_consultation_side_button_text')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Sidebar - Teks Kecil Bawah <small class="text-muted">(Maks. 255 karakter)</small></label>
                            <textarea name="service_consultation_side_footer_text" rows="2" class="form-control @error('service_consultation_side_footer_text') is-invalid @enderror" maxlength="255">{{ old('service_consultation_side_footer_text', $profile->service_consultation_side_footer_text ?? '') }}</textarea>
                            @error('service_consultation_side_footer_text')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
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
