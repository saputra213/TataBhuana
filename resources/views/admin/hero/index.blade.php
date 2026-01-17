@extends('layouts.admin')

@section('title', 'Hero Beranda - Admin Panel')
@section('page-title', 'Hero Beranda')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Pengaturan Hero Beranda</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.hero.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @for($i = 0; $i < 3; $i++)
                        @php
                            $slide = $slides[$i] ?? [];
                        @endphp
                        <div class="border rounded p-3 mb-3">
                            <h6 class="fw-bold mb-3">Slide {{ $i + 1 }}</h6>

                            <div class="mb-3">
                                <label class="form-label">Judul Slide</label>
                                <input type="text" name="slides[{{ $i }}][title]" class="form-control @error("slides.$i.title") is-invalid @enderror" value="{{ old("slides.$i.title", $slide['title'] ?? '') }}" placeholder="Contoh: Mitra Konstruksi Andal">
                                @error("slides.$i.title")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Deskripsi Slide</label>
                                <textarea name="slides[{{ $i }}][description]" class="form-control @error("slides.$i.description") is-invalid @enderror" rows="3" placeholder="Deskripsi singkat untuk slide ini">{{ old("slides.$i.description", $slide['description'] ?? '') }}</textarea>
                                @error("slides.$i.description")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Teks Tombol</label>
                                <input type="text" name="slides[{{ $i }}][button_text]" class="form-control @error("slides.$i.button_text") is-invalid @enderror" value="{{ old("slides.$i.button_text", $slide['button_text'] ?? 'Hubungi Kami') }}" placeholder="Contoh: Hubungi Kami">
                                @error("slides.$i.button_text")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Link Tombol</label>
                                <select name="slides[{{ $i }}][button_route]" class="form-select @error("slides.$i.button_route") is-invalid @enderror">
                                    @php
                                        $routeValue = old("slides.$i.button_route", $slide['button_route'] ?? 'contact');
                                    @endphp
                                    <option value="contact" {{ $routeValue === 'contact' ? 'selected' : '' }}>Kontak</option>
                                    <option value="services" {{ $routeValue === 'services' ? 'selected' : '' }}>Layanan</option>
                                    <option value="scaffoldings" {{ $routeValue === 'scaffoldings' ? 'selected' : '' }}>Produk Scaffolding</option>
                                    <option value="projects" {{ $routeValue === 'projects' ? 'selected' : '' }}>Proyek</option>
                                    <option value="articles" {{ $routeValue === 'articles' ? 'selected' : '' }}>Artikel</option>
                                    <option value="about" {{ $routeValue === 'about' ? 'selected' : '' }}>Tentang Kami</option>
                                    <option value="branches" {{ $routeValue === 'branches' ? 'selected' : '' }}>Cabang</option>
                                    <option value="custom" {{ $routeValue === 'custom' ? 'selected' : '' }}>URL Kustom</option>
                                    <option value="none" {{ $routeValue === 'none' ? 'selected' : '' }}>Tidak ada link</option>
                                </select>
                                @error("slides.$i.button_route")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Pilih tujuan tombol. Pilih "URL Kustom" jika ingin link bebas.</div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">URL Kustom (opsional)</label>
                                <input type="url" name="slides[{{ $i }}][button_url]" class="form-control @error("slides.$i.button_url") is-invalid @enderror" value="{{ old("slides.$i.button_url", $slide['button_url'] ?? '') }}" placeholder="https://contoh.com/atau-link-whatsapp">
                                @error("slides.$i.button_url")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Dipakai hanya jika pilihan di atas "URL Kustom". Bisa diisi link WhatsApp atau halaman lain.</div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Gambar Slide</label>
                                @if(!empty($slide['image']))
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $slide['image']) }}" alt="Slide {{ $i + 1 }}" class="img-thumbnail" style="max-width: 200px;">
                                        <p class="text-muted small mb-0">Gambar saat ini</p>
                                    </div>
                                @endif
                                <input type="file" name="slides[{{ $i }}][image]" class="form-control @error("slides.$i.image") is-invalid @enderror" accept="image/*,.webp">
                                <div class="form-text">Format: JPG, PNG, GIF, WEBP. Maksimal 5MB</div>
                                @error("slides.$i.image")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    @endfor

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i>Simpan Hero Beranda
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
