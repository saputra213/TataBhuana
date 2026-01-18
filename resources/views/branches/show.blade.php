@extends('layouts.app')

@section('title', $branch->name . ' - Tata Bhuana Scaffolding')
@section('description', $branch->description)

@push('styles')
    @vite('resources/css/home.css')
@endpush

@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="py-3 bg-light">
    <div class="container">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ route('branches.index') }}">Cabang Kami</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $branch->name }}</li>
        </ol>
    </div>
</nav>

<!-- Branch Detail -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <!-- Branch Image -->
            <div class="col-lg-6 mb-4">
                @if($branch->image)
                    <img src="{{ asset('storage/' . $branch->image) }}" alt="{{ $branch->name }}" class="img-fluid rounded shadow" loading="eager" fetchpriority="high" decoding="async">
                @else
                    <div class="bg-light d-flex align-items-center justify-content-center rounded shadow" style="height: 400px;">
                        <div class="text-center">
                            <i class="fas fa-building fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted">Tidak ada gambar tersedia</h5>
                        </div>
                    </div>
                @endif
            </div>
            
            <!-- Branch Info -->
            <div class="col-lg-6">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <h1 class="display-5 fw-bold">{{ $branch->name }}</h1>
                    @if($branch->is_main_branch)
                        <span class="badge bg-warning fs-6">
                            <i class="fas fa-star me-1"></i>Kantor Pusat
                        </span>
                    @endif
                </div>
                
                <p class="lead text-muted mb-4">{{ $branch->description }}</p>
                
                <!-- Contact Information -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title fw-bold mb-3">Informasi Kontak</h5>
                        
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="d-flex align-items-start">
                                    <i class="fas fa-map-marker-alt text-primary me-3 mt-1"></i>
                                    <div>
                                        <h6 class="fw-bold mb-1">Alamat</h6>
                                        <p class="text-muted mb-0">{{ $branch->address }}</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-phone text-primary me-3"></i>
                                    <div>
                                        <h6 class="fw-bold mb-1">Telepon</h6>
                                        <p class="text-muted mb-0">
                                            <a href="tel:{{ $branch->phone }}" class="text-decoration-none">{{ $branch->phone }}</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-envelope text-primary me-3"></i>
                                    <div>
                                        <h6 class="fw-bold mb-1">Email</h6>
                                        <p class="text-muted mb-0">
                                            <a href="mailto:{{ $branch->email }}" class="text-decoration-none">{{ $branch->email }}</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Manager Information -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title fw-bold mb-3">Manager Cabang</h5>
                        
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-user text-primary me-3"></i>
                                    <div>
                                        <h6 class="fw-bold mb-1">Nama</h6>
                                        <p class="text-muted mb-0">{{ $branch->manager_name }}</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-phone text-primary me-3"></i>
                                    <div>
                                        <h6 class="fw-bold mb-1">Telepon</h6>
                                        <p class="text-muted mb-0">
                                            <a href="tel:{{ $branch->manager_phone }}" class="text-decoration-none">{{ $branch->manager_phone }}</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-envelope text-primary me-3"></i>
                                    <div>
                                        <h6 class="fw-bold mb-1">Email</h6>
                                        <p class="text-muted mb-0">
                                            <a href="mailto:{{ $branch->manager_email }}" class="text-decoration-none">{{ $branch->manager_email }}</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Action Buttons -->
                <div class="d-grid gap-2">
                    <a href="{{ $branch->google_maps_url }}" target="_blank" class="btn branch-map-btn btn-lg">
                        <i class="fas fa-map-marked-alt me-2"></i>Lihat di Google Maps
                    </a>
                    <a href="{{ $branch->whatsapp_url }}" target="_blank" class="btn branch-whatsapp-btn">
                        <i class="fab fa-whatsapp me-2"></i>Hubungi via WhatsApp
                    </a>
                    <a href="{{ route('branches.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Kembali ke Daftar Cabang
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Operating Hours & Services -->
        <div class="row mt-5">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-bold mb-3">Jam Operasional</h5>
                        @if($branch->operating_hours)
                            <div class="text-muted">
                                {!! $branch->operating_hours_formatted !!}
                            </div>
                        @else
                            <p class="text-muted">Senin - Jumat: 08:00 - 17:00<br>
                            Sabtu: 08:00 - 15:00<br>
                            Minggu: Tutup</p>
                        @endif
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-bold mb-3">Layanan Tersedia</h5>
                        @if($branch->services && count($branch->services) > 0)
                            <ul class="list-unstyled">
                                @foreach($branch->services as $service)
                                    <li class="mb-2">
                                        <i class="fas fa-check text-success me-2"></i>{{ $service }}
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <ul class="list-unstyled">
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Sewa Scaffolding</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Jual Scaffolding</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Pengiriman & Instalasi</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Konsultasi Teknis</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Maintenance & Perawatan</li>
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Map -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-bold mb-3">
                            <i class="fas fa-map-marked-alt text-primary me-2"></i>Lokasi di Peta
                        </h5>
                        <p class="text-muted mb-3">
                            <i class="fas fa-map-marker-alt text-danger me-2"></i>{{ $branch->address }}
                        </p>
                        <div class="ratio ratio-21x9" style="min-height: 400px;">
                            @if($branch->latitude && $branch->longitude)
                                <iframe 
                                    src="https://maps.google.com/maps?q={{ $branch->latitude }},{{ $branch->longitude }}&hl=id&z=16&output=embed" 
                                    style="border:0; border-radius: 8px;" 
                                    allowfullscreen="" 
                                    loading="lazy" 
                                    referrerpolicy="no-referrer-when-downgrade"
                                    title="Lokasi {{ $branch->name }}">
                                </iframe>
                            @elseif($branch->address)
                                <iframe 
                                    src="https://maps.google.com/maps?q={{ urlencode($branch->address) }}&hl=id&z=15&output=embed" 
                                    style="border:0; border-radius: 8px;" 
                                    allowfullscreen="" 
                                    loading="lazy" 
                                    referrerpolicy="no-referrer-when-downgrade"
                                    title="Lokasi {{ $branch->name }}">
                                </iframe>
                            @else
                                <div class="bg-light d-flex align-items-center justify-content-center h-100 rounded">
                                    <div class="text-center">
                                        <i class="fas fa-map-marker-alt fa-3x text-muted mb-3"></i>
                                        <p class="text-muted">Lokasi belum tersedia</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                        @if(($branch->latitude && $branch->longitude) || $branch->address)
                        <div class="mt-3">
                            <a href="{{ $branch->google_maps_url }}" target="_blank" class="btn branch-map-btn">
                                <i class="fas fa-map-marked-alt me-2"></i>Buka di Google Maps
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Information Section -->
@if(isset($profile))
<section class="py-5 bg-light">
    <div class="container">
        <div class="row text-center mb-4">
            <div class="col-12">
                <h2 class="display-5 fw-bold mb-3">Hubungi Kami</h2>
                <p class="lead text-muted">Tim kami siap membantu kebutuhan scaffolding Anda</p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-md-4">
                <div class="text-center p-4 bg-white rounded shadow-sm h-100">
                    <div class="mb-3">
                        <div class="d-inline-flex align-items-center justify-content-center bg-primary text-white rounded-circle" style="width: 60px; height: 60px;">
                            <i class="fas fa-phone fa-lg"></i>
                        </div>
                    </div>
                    <h5 class="fw-bold mb-2">Telepon</h5>
                    @if($profile->phone)
                        <p class="text-muted mb-0">
                            <a href="tel:{{ $profile->phone }}" class="text-decoration-none text-primary">{{ $profile->phone }}</a>
                        </p>
                    @else
                        <p class="text-muted mb-0">-</p>
                    @endif
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="text-center p-4 bg-white rounded shadow-sm h-100">
                    <div class="mb-3">
                        <div class="d-inline-flex align-items-center justify-content-center bg-success text-white rounded-circle" style="width: 60px; height: 60px;">
                            <i class="fas fa-envelope fa-lg"></i>
                        </div>
                    </div>
                    <h5 class="fw-bold mb-2">Email</h5>
                    @if($profile->email)
                        <p class="text-muted mb-0">
                            <a href="mailto:{{ $profile->email }}" class="text-decoration-none text-primary">{{ $profile->email }}</a>
                        </p>
                    @else
                        <p class="text-muted mb-0">-</p>
                    @endif
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="text-center p-4 bg-white rounded shadow-sm h-100">
                    <div class="mb-3">
                        <div class="d-inline-flex align-items-center justify-content-center bg-danger text-white rounded-circle" style="width: 60px; height: 60px;">
                            <i class="fas fa-map-marker-alt fa-lg"></i>
                        </div>
                    </div>
                    <h5 class="fw-bold mb-2">Alamat</h5>
                    @if($profile->address)
                        <p class="text-muted mb-0 small">{{ Str::limit($profile->address, 50) }}</p>
                    @else
                        <p class="text-muted mb-0">-</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- CTA Section -->
<section class="py-5 bg-danger home-cta-section">
    <div class="container">
        <div class="home-cta-inner mx-auto">
            <div class="row g-4 align-items-center">
                <div class="col-lg-7 text-white">
                    <div class="home-cta-kicker text-uppercase fw-semibold small mb-2">
                        Jangan tunda keamanan proyek Anda.
                    </div>
                    <h2 class="home-cta-title fw-bold mb-3">
                        {{ $profile?->home_cta_title ?? 'Siap Memulai Proyek Anda?' }}
                    </h2>
                    <p class="home-cta-subtitle lead mb-3 text-white-50">
                        {{ $profile?->home_cta_subtitle ?? 'Hubungi kami sekarang untuk konsultasi gratis dan penawaran terbaik' }}
                        @if($branch)
                            Cabang {{ $branch->name }} siap membantu Anda.
                        @endif
                    </p>
                    <div class="d-flex flex-wrap gap-2">
                        <span class="home-cta-chip home-cta-chip-red">
                            <i class="fas fa-shield-alt me-1"></i> Rekomendasi sistem scaffolding yang aman dan sesuai standar
                        </span>
                        <span class="home-cta-chip home-cta-chip-green">
                            <i class="fas fa-headset me-1"></i> Tim support siap membantu dari perencanaan hingga eksekusi
                        </span>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="home-cta-card bg-white text-start">
                        <div class="d-flex align-items-center mb-3">
                            <div class="home-cta-icon me-3">
                                <i class="fas fa-clipboard-check"></i>
                            </div>
                            <div>
                                <div class="fw-semibold small text-muted">
                                    Konsultasi dengan cabang kami
                                </div>
                                <div class="fw-bold">
                                    Cabang siap membantu Anda
                                </div>
                            </div>
                        </div>
                        <p class="small text-muted mb-3">
                            Hubungi cabang untuk penjelasan detail ketersediaan stok, jadwal pengiriman,
                            serta penawaran khusus sesuai lokasi proyek Anda.
                        </p>
                        <div class="d-grid gap-2">
                            <a href="{{ $branch->whatsapp_url ?? route('contact') }}" target="_blank" class="btn btn-success btn-lg">
                                <i class="fab fa-whatsapp me-2"></i>Hubungi cabang via WhatsApp
                            </a>
                            <a href="{{ route('contact') }}" class="btn btn-outline-danger btn-lg">
                                <i class="fas fa-phone me-2"></i>Kontak pusat lainnya
                            </a>
                        </div>
                        <div class="home-cta-meta small text-muted mt-3">
                            @if($branch)
                                <i class="fas fa-map-marker-alt me-1"></i> Lokasi cabang: {{ $branch->address }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

.branch-map-btn:hover,
.branch-map-btn:focus {
    background: #b91c1c;
    border-color: #b91c1c;
    color: #ffffff;
}

.branch-whatsapp-btn {
    background: #16a34a;
    border-color: #16a34a;
    color: #ffffff;
    font-weight: 600;
}

.branch-whatsapp-btn:hover,
.branch-whatsapp-btn:focus {
    background: #15803d;
    border-color: #15803d;
    color: #ffffff;
}
</style>
@endsection
