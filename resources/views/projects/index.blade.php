@extends('layouts.app')

@section('title', 'Galeri Proyek - Tata Bhuana Scaffolding')
@section('description', 'Lihat galeri proyek-proyek scaffolding yang telah berhasil diselesaikan oleh Tata Bhuana Scaffolding.')

@section('content')
<!-- Hero Section -->
<section class="projects-hero text-white py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center hero-content">
                <h1 class="display-3 fw-bold mb-3">Galeri Proyek</h1>
                <p class="lead hero-subtitle">Portofolio proyek scaffolding yang telah berhasil kami selesaikan</p>
            </div>
        </div>
    </div>
</section>


<!-- Filters -->
<section class="py-4 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form method="GET" action="{{ route('projects.index') }}" class="row g-3">
                    <div class="col-md-3">
                        <input type="text" name="search" class="form-control" placeholder="Cari proyek..." value="{{ request('search') }}">
                    </div>
                    
                    <div class="col-md-3">
                        <select name="type" class="form-select">
                            <option value="">Semua Jenis Proyek</option>
                            <option value="konstruksi" {{ request('type') == 'konstruksi' ? 'selected' : '' }}>Konstruksi</option>
                            <option value="renovasi" {{ request('type') == 'renovasi' ? 'selected' : '' }}>Renovasi</option>
                            <option value="maintenance" {{ request('type') == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                            <option value="event" {{ request('type') == 'event' ? 'selected' : '' }}>Event</option>
                        </select>
                    </div>
                    
                    <div class="col-md-3">
                        <select name="status" class="form-select">
                            <option value="">Semua Status</option>
                            <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Selesai</option>
                            <option value="ongoing" {{ request('status') == 'ongoing' ? 'selected' : '' }}>Berlangsung</option>
                            <option value="planning" {{ request('status') == 'planning' ? 'selected' : '' }}>Perencanaan</option>
                        </select>
                    </div>
                    
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-success-modern w-100">
                            <i class="fas fa-filter me-2"></i>Filter
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Projects Grid -->
<section class="py-5">
    <div class="container">
        @if($projects->count() > 0)
            <div class="row g-4">
                @foreach($projects as $project)
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 shadow-sm project-card">
                        @if($project->images && count($project->images) > 0)
                            <div class="project-image-container" style="position: relative; overflow: hidden;">
                                <img src="{{ asset('storage/' . $project->images[0]) }}" class="card-img-top" alt="{{ $project->title }}" style="height: 250px; object-fit: cover;">
                                @if(count($project->images) > 1)
                                    <div class="position-absolute top-0 end-0 m-2 image-count-badge">
                                        <small><i class="fas fa-images me-1"></i>{{ count($project->images) }}</small>
                                    </div>
                                @endif
                                @if($project->is_featured)
                                    <div class="position-absolute top-0 start-0 m-2 featured-badge">
                                        <small><i class="fas fa-star me-1"></i>Featured</small>
                                    </div>
                                @endif
                            </div>
                        @else
                            <div class="bg-light d-flex align-items-center justify-content-center" style="height: 250px;">
                                <div class="text-center">
                                    <i class="fas fa-image fa-3x text-muted mb-2"></i>
                                    <p class="text-muted">Tidak ada gambar</p>
                                </div>
                            </div>
                        @endif
                        
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold">{{ $project->title }}</h5>
                            <p class="card-text text-muted flex-grow-1">{{ Str::limit($project->description, 120) }}</p>
                            
                            <div class="mb-3">
                                <div class="row text-center">
                                    <div class="col-6">
                                        <small class="text-muted d-block">Klien</small>
                                        <strong class="small">{{ $project->client_name }}</strong>
                                    </div>
                                    <div class="col-6">
                                        <small class="text-muted d-block">Lokasi</small>
                                        <strong class="small">{{ $project->location }}</strong>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <span class="badge badge-primary-modern me-2">{{ ucfirst($project->project_type) }}</span>
                                <span class="badge badge-status-modern status-{{ $project->status_badge }}">{{ $project->status_text }}</span>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <small class="text-muted">Mulai:</small>
                                    <strong class="d-block">{{ $project->formatted_start_date }}</strong>
                                </div>
                                <div>
                                    <small class="text-muted">Durasi:</small>
                                    <strong class="d-block">{{ $project->duration }}</strong>
                                </div>
                            </div>
                            
                            <a href="{{ route('projects.show', $project) }}" class="btn btn-danger">
                                <i class="fas fa-eye me-2"></i>Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <!-- Pagination -->
            @if($projects->hasPages())
            <div class="row mt-5">
                <div class="col-12">
                    {{ $projects->links() }}
                </div>
            </div>
            @endif
        @else
            <div class="text-center py-5">
                <i class="fas fa-folder-open fa-3x text-muted mb-3"></i>
                <h4 class="text-muted">Tidak ada proyek yang ditemukan</h4>
                <p class="text-muted">Coba ubah filter pencarian Anda</p>
                <a href="{{ route('projects.index') }}" class="btn btn-danger">
                    <i class="fas fa-refresh me-2"></i>Reset Filter
                </a>
            </div>
        @endif
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
<section class="py-5 bg-danger text-white">
    <div class="container text-center">
        <h2 class="display-5 fw-bold mb-3">Siap Memulai Proyek Anda?</h2>
        <p class="lead mb-4">Hubungi kami sekarang untuk konsultasi gratis dan penawaran terbaik</p>
        <a href="{{ route('contact') }}" class="btn btn-light btn-lg">
            <i class="fas fa-phone me-2"></i>Hubungi Kami Sekarang
        </a>
    </div>
</section>

<!-- Scroll to Top Button -->
<button id="scrollToTopBtn" class="scroll-to-top-btn" title="Scroll ke Atas">
    <i class="fas fa-arrow-up"></i>
</button>
@endsection

@push('styles')
    @vite('resources/css/projects-index.css')
@endpush

@push('scripts')
    @vite('resources/js/projects-index.js')
@endpush
