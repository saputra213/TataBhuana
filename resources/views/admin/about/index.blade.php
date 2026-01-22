@extends('layouts.admin')

@section('title', 'Kelola Halaman Tentang Kami - Admin Panel')
@section('page-title', 'Kelola Halaman Tentang Kami')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Edit Konten Halaman Tentang Kami</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.about.update') }}" method="POST">
                    @csrf
                    
                    <h6 class="fw-bold mb-3">Bagian Hero (Atas)</h6>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="about_hero_title" class="form-label">Judul Hero <small class="text-muted">(Maks. 255 karakter)</small></label>
                            <input type="text" class="form-control @error('about_hero_title') is-invalid @enderror" id="about_hero_title" name="about_hero_title" value="{{ old('about_hero_title', $profile->about_hero_title ?? '') }}" placeholder="Contoh: Mitra Konstruksi Andal" maxlength="255">
                            @error('about_hero_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="about_hero_subtitle" class="form-label">Subjudul Hero <small class="text-muted">(Maks. 255 karakter)</small></label>
                            <input type="text" class="form-control @error('about_hero_subtitle') is-invalid @enderror" id="about_hero_subtitle" name="about_hero_subtitle" value="{{ old('about_hero_subtitle', $profile->about_hero_subtitle ?? '') }}" placeholder="Contoh: Berpengalaman Sejak 2007" maxlength="255">
                            @error('about_hero_subtitle')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="about_main_text" class="form-label">Paragraf Utama <small class="text-muted">(Maks. 1000 karakter)</small></label>
                        <textarea class="form-control @error('about_main_text') is-invalid @enderror" id="about_main_text" name="about_main_text" rows="4" placeholder="Paragraf utama di halaman Tentang Kami" maxlength="1000">{{ old('about_main_text', $profile->about_main_text ?? '') }}</textarea>
                        @error('about_main_text')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <h6 class="fw-bold mb-3 mt-4">Statistik</h6>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="about_stat_cities" class="form-label">Statistik Kota <small class="text-muted">(Maks. 50 karakter)</small></label>
                            <input type="text" class="form-control @error('about_stat_cities') is-invalid @enderror" id="about_stat_cities" name="about_stat_cities" value="{{ old('about_stat_cities', $profile->about_stat_cities ?? '') }}" placeholder="Contoh: 3 Kota" maxlength="50">
                            @error('about_stat_cities')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="about_stat_experience" class="form-label">Statistik Pengalaman <small class="text-muted">(Maks. 50 karakter)</small></label>
                            <input type="text" class="form-control @error('about_stat_experience') is-invalid @enderror" id="about_stat_experience" name="about_stat_experience" value="{{ old('about_stat_experience', $profile->about_stat_experience ?? '') }}" placeholder="Contoh: 18+ Tahun Pengalaman" maxlength="50">
                            @error('about_stat_experience')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="about_stat_projects" class="form-label">Statistik Proyek <small class="text-muted">(Maks. 50 karakter)</small></label>
                            <input type="text" class="form-control @error('about_stat_projects') is-invalid @enderror" id="about_stat_projects" name="about_stat_projects" value="{{ old('about_stat_projects', $profile->about_stat_projects ?? '') }}" placeholder="Contoh: 1000+ Proyek Selesai" maxlength="50">
                            @error('about_stat_projects')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <h6 class="fw-bold mb-3 mt-4">Keunggulan (Features)</h6>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="about_feature_1" class="form-label">Keunggulan 1 <small class="text-muted">(Maks. 100 karakter)</small></label>
                            <input type="text" class="form-control @error('about_feature_1') is-invalid @enderror" id="about_feature_1" name="about_feature_1" value="{{ old('about_feature_1', $profile->about_feature_1 ?? '') }}" placeholder="Contoh: Tim Profesional Berpengalaman" maxlength="100">
                            @error('about_feature_1')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="about_feature_2" class="form-label">Keunggulan 2 <small class="text-muted">(Maks. 100 karakter)</small></label>
                            <input type="text" class="form-control @error('about_feature_2') is-invalid @enderror" id="about_feature_2" name="about_feature_2" value="{{ old('about_feature_2', $profile->about_feature_2 ?? '') }}" placeholder="Contoh: Produk Berkualitas Standar SNI" maxlength="100">
                            @error('about_feature_2')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="about_feature_3" class="form-label">Keunggulan 3 <small class="text-muted">(Maks. 100 karakter)</small></label>
                            <input type="text" class="form-control @error('about_feature_3') is-invalid @enderror" id="about_feature_3" name="about_feature_3" value="{{ old('about_feature_3', $profile->about_feature_3 ?? '') }}" placeholder="Contoh: Layanan Cepat & Responsif" maxlength="100">
                            @error('about_feature_3')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <h6 class="fw-bold mb-3 mt-4">Visi & Misi</h6>
                    <div class="mb-3">
                        <label for="about_vision_title" class="form-label">Judul Visi <small class="text-muted">(Maks. 255 karakter)</small></label>
                        <input type="text" class="form-control @error('about_vision_title') is-invalid @enderror" id="about_vision_title" name="about_vision_title" value="{{ old('about_vision_title', $profile->about_vision_title ?? '') }}" maxlength="255">
                        @error('about_vision_title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                                <label for="about_vision_text" class="form-label">Deskripsi Visi <small class="text-muted">(Maks. 500 karakter)</small></label>
                                <textarea class="form-control @error('about_vision_text') is-invalid @enderror" id="about_vision_text" name="about_vision_text" rows="3" maxlength="500">{{ old('about_vision_text', $profile->about_vision_text ?? '') }}</textarea>
                                @error('about_vision_text')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="about_mission_title" class="form-label">Judul Misi <small class="text-muted">(Maks. 255 karakter)</small></label>
                                <input type="text" class="form-control @error('about_mission_title') is-invalid @enderror" id="about_mission_title" name="about_mission_title" value="{{ old('about_mission_title', $profile->about_mission_title ?? '') }}" maxlength="255">
                                @error('about_mission_title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="about_mission_text" class="form-label">Deskripsi Misi <small class="text-muted">(Maks. 500 karakter)</small></label>
                                <textarea class="form-control @error('about_mission_text') is-invalid @enderror" id="about_mission_text" name="about_mission_text" rows="3" maxlength="500">{{ old('about_mission_text', $profile->about_mission_text ?? '') }}</textarea>
                                @error('about_mission_text')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                    <h6 class="fw-bold mb-3 mt-4">Layanan (Services)</h6>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="about_service_1_title" class="form-label">Layanan 1 - Judul <small class="text-muted">(Maks. 100 karakter)</small></label>
                            <input type="text" class="form-control @error('about_service_1_title') is-invalid @enderror" id="about_service_1_title" name="about_service_1_title" value="{{ old('about_service_1_title', $profile->about_service_1_title ?? '') }}" placeholder="Contoh: Sewa Scaffolding" maxlength="100">
                            @error('about_service_1_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="about_service_1_description" class="form-label">Layanan 1 - Deskripsi <small class="text-muted">(Maks. 255 karakter)</small></label>
                            <textarea class="form-control @error('about_service_1_description') is-invalid @enderror" id="about_service_1_description" name="about_service_1_description" rows="2" placeholder="Deskripsi singkat layanan pertama" maxlength="255">{{ old('about_service_1_description', $profile->about_service_1_description ?? '') }}</textarea>
                            @error('about_service_1_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="about_service_2_title" class="form-label">Layanan 2 - Judul <small class="text-muted">(Maks. 100 karakter)</small></label>
                            <input type="text" class="form-control @error('about_service_2_title') is-invalid @enderror" id="about_service_2_title" name="about_service_2_title" value="{{ old('about_service_2_title', $profile->about_service_2_title ?? '') }}" placeholder="Contoh: Jual Scaffolding" maxlength="100">
                            @error('about_service_2_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="about_service_2_description" class="form-label">Layanan 2 - Deskripsi <small class="text-muted">(Maks. 255 karakter)</small></label>
                            <textarea class="form-control @error('about_service_2_description') is-invalid @enderror" id="about_service_2_description" name="about_service_2_description" rows="2" placeholder="Deskripsi singkat layanan kedua" maxlength="255">{{ old('about_service_2_description', $profile->about_service_2_description ?? '') }}</textarea>
                            @error('about_service_2_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="about_service_3_title" class="form-label">Layanan 3 - Judul <small class="text-muted">(Maks. 100 karakter)</small></label>
                            <input type="text" class="form-control @error('about_service_3_title') is-invalid @enderror" id="about_service_3_title" name="about_service_3_title" value="{{ old('about_service_3_title', $profile->about_service_3_title ?? '') }}" placeholder="Contoh: Layanan Pengiriman" maxlength="100">
                            @error('about_service_3_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="about_service_3_description" class="form-label">Layanan 3 - Deskripsi <small class="text-muted">(Maks. 255 karakter)</small></label>
                            <textarea class="form-control @error('about_service_3_description') is-invalid @enderror" id="about_service_3_description" name="about_service_3_description" rows="2" placeholder="Deskripsi singkat layanan ketiga" maxlength="255">{{ old('about_service_3_description', $profile->about_service_3_description ?? '') }}</textarea>
                            @error('about_service_3_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="about_service_4_title" class="form-label">Layanan 4 - Judul <small class="text-muted">(Maks. 100 karakter)</small></label>
                            <input type="text" class="form-control @error('about_service_4_title') is-invalid @enderror" id="about_service_4_title" name="about_service_4_title" value="{{ old('about_service_4_title', $profile->about_service_4_title ?? '') }}" placeholder="Contoh: Konsultasi & Support" maxlength="100">
                            @error('about_service_4_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="about_service_4_description" class="form-label">Layanan 4 - Deskripsi <small class="text-muted">(Maks. 255 karakter)</small></label>
                            <textarea class="form-control @error('about_service_4_description') is-invalid @enderror" id="about_service_4_description" name="about_service_4_description" rows="2" placeholder="Deskripsi singkat layanan keempat" maxlength="255">{{ old('about_service_4_description', $profile->about_service_4_description ?? '') }}</textarea>
                            @error('about_service_4_description')
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
