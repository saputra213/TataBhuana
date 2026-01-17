@extends('layouts.app')

@section('title', $branch->name . ' - Tata Bhuana Scaffolding')
@section('description', $branch->description)

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
<section class="cta-section py-5 text-white">
    <div class="container text-center">
        <h2 class="display-5 fw-bold mb-3">Siap Bekerja Sama?</h2>
        <p class="lead mb-4">Hubungi cabang {{ $branch->name }} untuk konsultasi dan penawaran terbaik</p>
        <a href="{{ $branch->whatsapp_url ?? route('contact') }}" target="_blank" class="btn btn-light btn-lg me-2">
            <i class="fab fa-whatsapp me-2"></i>Hubungi via WhatsApp
        </a>
        <a href="{{ route('contact') }}" class="btn btn-outline-light btn-lg">
            <i class="fas fa-phone me-2"></i>Kontak Lainnya
        </a>
    </div>
</section>

<style>
.cta-section {
    background: #dc2626;
    position: relative;
    overflow: hidden;
}

.cta-section::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -10%;
    width: 500px;
    height: 500px;
    background: #16a34a;
    border-radius: 50%;
    opacity: 0.1;
    animation: float 6s ease-in-out infinite;
}

@keyframes float {
    0%, 100% {
        transform: translateY(0) rotate(0deg);
    }
    50% {
        transform: translateY(-20px) rotate(180deg);
    }
}

.btn-outline-light {
    background: transparent !important;
    color: white !important;
    font-weight: 600 !important;
    border: 2px solid white !important;
    border-radius: 8px;
    padding: 0.6rem 1.2rem;
    transition: all 0.3s ease;
    box-shadow: 0 2px 8px rgba(255, 255, 255, 0.2);
    text-decoration: none;
}

.btn-outline-light:hover {
    background: white !important;
    color: #dc2626 !important;
    border-color: white !important;
    box-shadow: 0 4px 12px rgba(255, 255, 255, 0.4);
    transform: translateY(-2px);
}

.branch-map-btn {
    background: #dc2626;
    border-color: #dc2626;
    color: #ffffff;
    font-weight: 600;
}

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
