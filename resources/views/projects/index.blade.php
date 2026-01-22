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
                <form method="GET" action="{{ route('projects.index') }}" class="row g-2 align-items-center" id="projectFilterForm">
                    <!-- Search -->
                    <div class="col-12 col-lg-6">
                        <div class="input-group">
                            <span class="input-group-text bg-white text-muted border-end-0"><i class="fas fa-search"></i></span>
                            <input type="text" name="search" class="form-control border-start-0 ps-0" placeholder="Cari proyek..." value="{{ request('search') }}">
                        </div>
                    </div>

                    <input type="hidden" name="type" id="projectInputType" value="{{ request('type') }}">
                    <input type="hidden" name="status" id="projectInputStatus" value="{{ request('status') }}">
                    
                    <!-- Type Filter -->
                    <div class="col-6 col-lg-2">
                        <div class="dropdown w-100">
                            <button class="btn bg-white border shadow-sm w-100 dropdown-toggle text-start d-flex justify-content-between align-items-center" type="button" id="projectDropdownType" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="text-truncate">
                                    {{ 
                                        request('type') == 'konstruksi' ? 'Konstruksi' : 
                                        (request('type') == 'renovasi' ? 'Renovasi' : 
                                        (request('type') == 'maintenance' ? 'Maintenance' : 
                                        (request('type') == 'event' ? 'Event' : 'Jenis Proyek')))
                                    }}
                                </span>
                            </button>
                            <ul class="dropdown-menu shadow-sm w-100" aria-labelledby="projectDropdownType">
                                <li><a class="dropdown-item {{ request('type') == '' ? 'active' : '' }}" href="#" onclick="setProjectFilter('type', ''); return false;">Semua Jenis</a></li>
                                <li><a class="dropdown-item {{ request('type') == 'konstruksi' ? 'active' : '' }}" href="#" onclick="setProjectFilter('type', 'konstruksi'); return false;">Konstruksi</a></li>
                                <li><a class="dropdown-item {{ request('type') == 'renovasi' ? 'active' : '' }}" href="#" onclick="setProjectFilter('type', 'renovasi'); return false;">Renovasi</a></li>
                                <li><a class="dropdown-item {{ request('type') == 'maintenance' ? 'active' : '' }}" href="#" onclick="setProjectFilter('type', 'maintenance'); return false;">Maintenance</a></li>
                                <li><a class="dropdown-item {{ request('type') == 'event' ? 'active' : '' }}" href="#" onclick="setProjectFilter('type', 'event'); return false;">Event</a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <!-- Status Filter -->
                    <div class="col-6 col-lg-2">
                        <div class="dropdown w-100">
                            <button class="btn bg-white border shadow-sm w-100 dropdown-toggle text-start d-flex justify-content-between align-items-center" type="button" id="projectDropdownStatus" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="text-truncate">
                                    {{ 
                                        request('status') == 'completed' ? 'Selesai' : 
                                        (request('status') == 'ongoing' ? 'Berlangsung' : 
                                        (request('status') == 'planning' ? 'Perencanaan' : 'Status'))
                                    }}
                                </span>
                            </button>
                            <ul class="dropdown-menu shadow-sm w-100" aria-labelledby="projectDropdownStatus">
                                <li><a class="dropdown-item {{ request('status') == '' ? 'active' : '' }}" href="#" onclick="setProjectFilter('status', ''); return false;">Semua Status</a></li>
                                <li><a class="dropdown-item {{ request('status') == 'completed' ? 'active' : '' }}" href="#" onclick="setProjectFilter('status', 'completed'); return false;">Selesai</a></li>
                                <li><a class="dropdown-item {{ request('status') == 'ongoing' ? 'active' : '' }}" href="#" onclick="setProjectFilter('status', 'ongoing'); return false;">Berlangsung</a></li>
                                <li><a class="dropdown-item {{ request('status') == 'planning' ? 'active' : '' }}" href="#" onclick="setProjectFilter('status', 'planning'); return false;">Perencanaan</a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <!-- Filter Button -->
                    <div class="col-12 col-lg-2">
                        <button type="submit" class="btn btn-danger w-100">
                            <i class="fas fa-filter me-1"></i> Filter
                        </button>
                    </div>
                </form>

                <script>
                    function setProjectFilter(name, value) {
                        var id = 'projectInput' + name.charAt(0).toUpperCase() + name.slice(1);
                        var input = document.getElementById(id);
                        if (input) {
                            input.value = value;
                        }
                        document.getElementById('projectFilterForm').submit();
                    }
                </script>
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
                <div class="col-6 col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm project-card">
                        @if($project->images && count($project->images) > 0)
                            <div class="project-image-container" style="position: relative; overflow: hidden;">
                                <img src="{{ asset('storage/' . $project->images[0]) }}" class="card-img-top" alt="{{ $project->title }}" style="height: 250px; object-fit: cover;" loading="lazy" decoding="async">
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
                            <p class="card-text text-muted flex-grow-1 d-none d-md-block">{{ Str::limit($project->description, 120) }}</p>
                            
                            <div class="mb-3 project-client-location d-none d-md-block">
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
                            
                            <div class="mb-3 d-none d-md-block">
                                <span class="badge badge-primary-modern me-2">{{ ucfirst($project->project_type) }}</span>
                                <span class="badge badge-status-modern status-{{ $project->status_badge }}">{{ $project->status_text }}</span>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center mb-3 d-none d-md-flex">
                                <div>
                                    <small class="text-muted">Mulai:</small>
                                    <strong class="d-block">{{ $project->formatted_start_date }}</strong>
                                </div>
                                <div>
                                    <small class="text-muted">Durasi:</small>
                                    <strong class="d-block">{{ $project->duration }}</strong>
                                </div>
                            </div>
                            
                            <a href="{{ route('projects.show', $project) }}" class="btn btn-danger mt-auto w-100">
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
                                    Konsultasi Proyek & Kebutuhan Scaffolding
                                </div>
                                <div class="fw-bold">
                                    Tim siap membantu Anda
                                </div>
                            </div>
                        </div>
                        <p class="small text-muted mb-3">
                            Ceritakan secara singkat jenis pekerjaan, ketinggian kerja, dan lokasi proyek Anda.
                            Kami akan merangkum kebutuhan scaffolding, estimasi biaya, serta opsi sewa atau jual
                            yang paling pas untuk tim Anda.
                        </p>
                        <div class="d-grid">
                            <a href="{{ route('contact') }}" class="btn btn-danger btn-lg">
                                <i class="fas fa-file-signature me-2"></i> Minta penawaran & konsultasi
                            </a>
                        </div>
                        <div class="home-cta-meta small text-muted mt-3">
                            <i class="fas fa-map-marker-alt me-1"></i> Berbasis di Yogyakarta, melayani berbagai proyek di sekitarnya.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Scroll to Top Button -->
<button id="scrollToTopBtn" class="scroll-to-top-btn" title="Scroll ke Atas">
    <i class="fas fa-arrow-up"></i>
</button>
@endsection

@push('styles')
    @vite('resources/css/projects-index.css')
    @vite('resources/css/home.css')
@endpush

@push('scripts')
    @vite('resources/js/projects-index.js')
@endpush
