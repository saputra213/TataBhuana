@extends('layouts.admin')

@section('title', 'Profil Perusahaan - Admin Panel')
@section('page-title', 'Profil Perusahaan')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Edit Profil Perusahaan</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="company_name" class="form-label">Nama Perusahaan *</label>
                            <input type="text" class="form-control @error('company_name') is-invalid @enderror" id="company_name" name="company_name" value="{{ old('company_name', $profile->company_name ?? '') }}" required>
                            @error('company_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email *</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $profile->email ?? '') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="phone" class="form-label">Telepon *</label>
                            <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $profile->phone ?? '') }}" required>
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="website" class="form-label">Website</label>
                            <input type="url" class="form-control @error('website') is-invalid @enderror" id="website" name="website" value="{{ old('website', $profile->website ?? '') }}">
                            @error('website')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat *</label>
                        <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="3" required>{{ old('address', $profile->address ?? '') }}</textarea>
                        @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi Singkat *</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" required>{{ old('description', $profile->description ?? '') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="about_us" class="form-label">Tentang Kami *</label>
                        <textarea class="form-control @error('about_us') is-invalid @enderror" id="about_us" name="about_us" rows="5" required>{{ old('about_us', $profile->about_us ?? '') }}</textarea>
                        @error('about_us')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="services" class="form-label">Layanan Kami *</label>
                        <textarea class="form-control @error('services') is-invalid @enderror" id="services" name="services" rows="4" required>{{ old('services', $profile->services ?? '') }}</textarea>
                        @error('services')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="logo" class="form-label">Logo Perusahaan</label>
                            @if($profile && $profile->logo)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $profile->logo) }}" alt="Logo" class="img-thumbnail" style="max-width: 150px;">
                                    <p class="text-muted small">Logo saat ini</p>
                                </div>
                            @endif
                            <input type="file" class="form-control @error('logo') is-invalid @enderror" id="logo" name="logo" accept="image/*,.webp">
                            <div class="form-text">Format: JPG, PNG, GIF, WEBP. Maksimal 5MB</div>
                            @error('logo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="hero_image" class="form-label">Gambar Hero</label>
                            @if($profile && $profile->hero_image)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $profile->hero_image) }}" alt="Hero Image" class="img-thumbnail" style="max-width: 150px;">
                                    <p class="text-muted small">Gambar hero saat ini</p>
                                </div>
                            @endif
                            <input type="file" class="form-control @error('hero_image') is-invalid @enderror" id="hero_image" name="hero_image" accept="image/*,.webp">
                            <div class="form-text">Format: JPG, PNG, GIF, WEBP. Maksimal 5MB</div>
                            @error('hero_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="hero_images" class="form-label">Gambar Hero Tambahan (bisa lebih dari satu)</label>
                        <input type="file" class="form-control @error('hero_images.*') is-invalid @enderror" id="hero_images" name="hero_images[]" accept="image/*,.webp" multiple>
                        <div class="form-text">Unggah beberapa gambar untuk slideshow hero. Format: JPG, PNG, GIF, WEBP. Maksimal 5MB per gambar.</div>
                        @error('hero_images.*')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    @if($profile && is_array($profile->hero_images) && count($profile->hero_images) > 0)
                        <div class="mb-3">
                            <label class="form-label">Gambar Hero Saat Ini</label>
                            <div class="d-flex flex-wrap gap-2">
                                @foreach($profile->hero_images as $img)
                                    <img src="{{ asset('storage/' . $img) }}" alt="Hero" class="img-thumbnail" style="width: 120px; height: 80px; object-fit: cover;">
                                @endforeach
                            </div>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="1" id="replace_hero_images" name="replace_hero_images">
                            <label class="form-check-label" for="replace_hero_images">
                                Ganti semua gambar hero dengan yang baru
                            </label>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="hero_title" class="form-label">Judul Hero (H1)</label>
                            <input type="text" class="form-control @error('hero_title') is-invalid @enderror" id="hero_title" name="hero_title" value="{{ old('hero_title', $profile->hero_title ?? '') }}" placeholder="Contoh: Mitra Konstruksi Andal">
                            @error('hero_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="hero_description" class="form-label">Deskripsi Hero</label>
                            <textarea class="form-control @error('hero_description') is-invalid @enderror" id="hero_description" name="hero_description" rows="3" placeholder="Teks singkat pendukung di bagian hero">{{ old('hero_description', $profile->hero_description ?? '') }}</textarea>
                            @error('hero_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <hr>
                    <h6 class="fw-bold mb-3">Konten Halaman Tentang Kami</h6>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="about_hero_title" class="form-label">Judul Hero Tentang Kami</label>
                            <input type="text" class="form-control @error('about_hero_title') is-invalid @enderror" id="about_hero_title" name="about_hero_title" value="{{ old('about_hero_title', $profile->about_hero_title ?? '') }}" placeholder="Contoh: Mitra Konstruksi Andal">
                            @error('about_hero_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="about_hero_subtitle" class="form-label">Subjudul Hero Tentang Kami</label>
                            <input type="text" class="form-control @error('about_hero_subtitle') is-invalid @enderror" id="about_hero_subtitle" name="about_hero_subtitle" value="{{ old('about_hero_subtitle', $profile->about_hero_subtitle ?? '') }}" placeholder="Contoh: Berpengalaman Sejak 2007">
                            @error('about_hero_subtitle')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="about_main_text" class="form-label">Paragraf Utama Tentang Kami</label>
                        <textarea class="form-control @error('about_main_text') is-invalid @enderror" id="about_main_text" name="about_main_text" rows="4" placeholder="Paragraf utama di halaman Tentang Kami">{{ old('about_main_text', $profile->about_main_text ?? '') }}</textarea>
                        @error('about_main_text')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="about_stat_cities" class="form-label">Statistik Kota</label>
                            <input type="text" class="form-control @error('about_stat_cities') is-invalid @enderror" id="about_stat_cities" name="about_stat_cities" value="{{ old('about_stat_cities', $profile->about_stat_cities ?? '') }}" placeholder="Contoh: 3 Kota">
                            @error('about_stat_cities')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="about_stat_experience" class="form-label">Statistik Pengalaman</label>
                            <input type="text" class="form-control @error('about_stat_experience') is-invalid @enderror" id="about_stat_experience" name="about_stat_experience" value="{{ old('about_stat_experience', $profile->about_stat_experience ?? '') }}" placeholder="Contoh: 18+ Tahun Pengalaman">
                            @error('about_stat_experience')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="about_stat_projects" class="form-label">Statistik Proyek</label>
                            <input type="text" class="form-control @error('about_stat_projects') is-invalid @enderror" id="about_stat_projects" name="about_stat_projects" value="{{ old('about_stat_projects', $profile->about_stat_projects ?? '') }}" placeholder="Contoh: 1000+ Proyek Selesai">
                            @error('about_stat_projects')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="about_feature_1" class="form-label">Keunggulan 1</label>
                            <input type="text" class="form-control @error('about_feature_1') is-invalid @enderror" id="about_feature_1" name="about_feature_1" value="{{ old('about_feature_1', $profile->about_feature_1 ?? '') }}" placeholder="Contoh: Tim Profesional Berpengalaman">
                            @error('about_feature_1')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="about_feature_2" class="form-label">Keunggulan 2</label>
                            <input type="text" class="form-control @error('about_feature_2') is-invalid @enderror" id="about_feature_2" name="about_feature_2" value="{{ old('about_feature_2', $profile->about_feature_2 ?? '') }}" placeholder="Contoh: Produk Berkualitas Standar SNI">
                            @error('about_feature_2')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="about_feature_3" class="form-label">Keunggulan 3</label>
                            <input type="text" class="form-control @error('about_feature_3') is-invalid @enderror" id="about_feature_3" name="about_feature_3" value="{{ old('about_feature_3', $profile->about_feature_3 ?? '') }}" placeholder="Contoh: Layanan Cepat & Responsif">
                            @error('about_feature_3')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="about_service_1_title" class="form-label">Layanan 1 - Judul</label>
                            <input type="text" class="form-control @error('about_service_1_title') is-invalid @enderror" id="about_service_1_title" name="about_service_1_title" value="{{ old('about_service_1_title', $profile->about_service_1_title ?? '') }}" placeholder="Contoh: Sewa Scaffolding">
                            @error('about_service_1_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="about_service_1_description" class="form-label">Layanan 1 - Deskripsi</label>
                            <textarea class="form-control @error('about_service_1_description') is-invalid @enderror" id="about_service_1_description" name="about_service_1_description" rows="2" placeholder="Deskripsi singkat layanan pertama">{{ old('about_service_1_description', $profile->about_service_1_description ?? '') }}</textarea>
                            @error('about_service_1_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="about_service_2_title" class="form-label">Layanan 2 - Judul</label>
                            <input type="text" class="form-control @error('about_service_2_title') is-invalid @enderror" id="about_service_2_title" name="about_service_2_title" value="{{ old('about_service_2_title', $profile->about_service_2_title ?? '') }}" placeholder="Contoh: Jual Scaffolding">
                            @error('about_service_2_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="about_service_2_description" class="form-label">Layanan 2 - Deskripsi</label>
                            <textarea class="form-control @error('about_service_2_description') is-invalid @enderror" id="about_service_2_description" name="about_service_2_description" rows="2" placeholder="Deskripsi singkat layanan kedua">{{ old('about_service_2_description', $profile->about_service_2_description ?? '') }}</textarea>
                            @error('about_service_2_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="about_service_3_title" class="form-label">Layanan 3 - Judul</label>
                            <input type="text" class="form-control @error('about_service_3_title') is-invalid @enderror" id="about_service_3_title" name="about_service_3_title" value="{{ old('about_service_3_title', $profile->about_service_3_title ?? '') }}" placeholder="Contoh: Layanan Pengiriman">
                            @error('about_service_3_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="about_service_3_description" class="form-label">Layanan 3 - Deskripsi</label>
                            <textarea class="form-control @error('about_service_3_description') is-invalid @enderror" id="about_service_3_description" name="about_service_3_description" rows="2" placeholder="Deskripsi singkat layanan ketiga">{{ old('about_service_3_description', $profile->about_service_3_description ?? '') }}</textarea>
                            @error('about_service_3_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="about_service_4_title" class="form-label">Layanan 4 - Judul</label>
                            <input type="text" class="form-control @error('about_service_4_title') is-invalid @enderror" id="about_service_4_title" name="about_service_4_title" value="{{ old('about_service_4_title', $profile->about_service_4_title ?? '') }}" placeholder="Contoh: Konsultasi & Support">
                            @error('about_service_4_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="about_service_4_description" class="form-label">Layanan 4 - Deskripsi</label>
                            <textarea class="form-control @error('about_service_4_description') is-invalid @enderror" id="about_service_4_description" name="about_service_4_description" rows="2" placeholder="Deskripsi singkat layanan keempat">{{ old('about_service_4_description', $profile->about_service_4_description ?? '') }}</textarea>
                            @error('about_service_4_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="about_vision_title" class="form-label">Judul Visi</label>
                            <input type="text" class="form-control @error('about_vision_title') is-invalid @enderror" id="about_vision_title" name="about_vision_title" value="{{ old('about_vision_title', $profile->about_vision_title ?? '') }}" placeholder="Contoh: Visi Kami">
                            @error('about_vision_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="about_mission_title" class="form-label">Judul Misi</label>
                            <input type="text" class="form-control @error('about_mission_title') is-invalid @enderror" id="about_mission_title" name="about_mission_title" value="{{ old('about_mission_title', $profile->about_mission_title ?? '') }}" placeholder="Contoh: Misi Kami">
                            @error('about_mission_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="about_vision_text" class="form-label">Isi Visi</label>
                            <textarea class="form-control @error('about_vision_text') is-invalid @enderror" id="about_vision_text" name="about_vision_text" rows="3" placeholder="Teks visi perusahaan">{{ old('about_vision_text', $profile->about_vision_text ?? '') }}</textarea>
                            @error('about_vision_text')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="about_mission_text" class="form-label">Isi Misi</label>
                            <textarea class="form-control @error('about_mission_text') is-invalid @enderror" id="about_mission_text" name="about_mission_text" rows="3" placeholder="Teks misi perusahaan">{{ old('about_mission_text', $profile->about_mission_text ?? '') }}</textarea>
                            @error('about_mission_text')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <hr>
                    <h6 class="fw-bold mb-3">Media Sosial</h6>
                    
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="facebook" class="form-label">Facebook</label>
                            <input type="url" class="form-control @error('facebook') is-invalid @enderror" id="facebook" name="facebook" value="{{ old('facebook', $profile->social_media['facebook'] ?? '') }}" placeholder="https://facebook.com/username">
                            @error('facebook')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-4 mb-3">
                            <label for="instagram" class="form-label">Instagram</label>
                            <input type="url" class="form-control @error('instagram') is-invalid @enderror" id="instagram" name="instagram" value="{{ old('instagram', $profile->social_media['instagram'] ?? '') }}" placeholder="https://instagram.com/username">
                            @error('instagram')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-4 mb-3">
                            <label for="whatsapp" class="form-label">WhatsApp</label>
                            <input type="text" class="form-control @error('whatsapp') is-invalid @enderror" id="whatsapp" name="whatsapp" value="{{ old('whatsapp', $profile->social_media['whatsapp'] ?? '') }}" placeholder="6281234567890">
                            <div class="form-text">Format: 6281234567890 (tanpa +)</div>
                            @error('whatsapp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Simpan Perubahan
                        </button>
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                            <i class="fas fa-times me-2"></i>Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">Preview Website</h6>
            </div>
            <div class="card-body">
                <p class="text-muted small mb-3">Lihat bagaimana profil perusahaan tampil di website</p>
                <a href="{{ route('home') }}" target="_blank" class="btn btn-outline-primary btn-sm">
                    <i class="fas fa-external-link-alt me-2"></i>Lihat Website
                </a>
            </div>
        </div>
        
        <div class="card mt-3">
            <div class="card-header">
                <h6 class="mb-0">Tips</h6>
            </div>
            <div class="card-body">
                <ul class="list-unstyled mb-0">
                    <li class="mb-2">
                        <i class="fas fa-info-circle text-primary me-2"></i>
                        <small>Isi semua informasi dengan lengkap dan akurat</small>
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-info-circle text-primary me-2"></i>
                        <small>Gunakan logo dan gambar berkualitas tinggi</small>
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-info-circle text-primary me-2"></i>
                        <small>Deskripsi singkat akan muncul di halaman utama</small>
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-info-circle text-primary me-2"></i>
                        <small>Media sosial akan ditampilkan di footer website</small>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
