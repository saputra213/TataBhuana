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
                <form method="GET" action="{{ route('projects.index') }}" class="row g-1 g-md-3" id="projectFilterForm">
                    <div class="col-12">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Cari proyek..." value="{{ request('search') }}">
                            <button class="btn btn-outline-secondary d-flex align-items-center" type="submit">
                                <i class="fas fa-search"></i>
                                <span class="d-none d-sm-inline ms-1">Cari</span>
                            </button>
                        </div>
                    </div>

                    <input type="hidden" name="type" id="projectInputType" value="{{ request('type') }}">
                    <input type="hidden" name="status" id="projectInputStatus" value="{{ request('status') }}">
                    
                    <div class="col-4 col-md-3">
                        <div class="dropdown w-100">
                            <button class="btn btn-outline-secondary btn-sm w-100 dropdown-toggle text-start text-truncate bg-white" type="button" id="projectDropdownType" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ 
                                    request('type') == 'konstruksi' ? 'Konstruksi' : 
                                    (request('type') == 'renovasi' ? 'Renovasi' : 
                                    (request('type') == 'maintenance' ? 'Maint.' : 
                                    (request('type') == 'event' ? 'Event' : 'Jenis')))
                                }}
                            </button>
                            <ul class="dropdown-menu shadow-sm" aria-labelledby="projectDropdownType">
                                <li><a class="dropdown-item {{ request('type') == '' ? 'active' : '' }}" href="#" onclick="setProjectFilter('type', ''); return false;">Semua Jenis</a></li>
                                <li><a class="dropdown-item {{ request('type') == 'konstruksi' ? 'active' : '' }}" href="#" onclick="setProjectFilter('type', 'konstruksi'); return false;">Konstruksi</a></li>
                                <li><a class="dropdown-item {{ request('type') == 'renovasi' ? 'active' : '' }}" href="#" onclick="setProjectFilter('type', 'renovasi'); return false;">Renovasi</a></li>
                                <li><a class="dropdown-item {{ request('type') == 'maintenance' ? 'active' : '' }}" href="#" onclick="setProjectFilter('type', 'maintenance'); return false;">Maintenance</a></li>
                                <li><a class="dropdown-item {{ request('type') == 'event' ? 'active' : '' }}" href="#" onclick="setProjectFilter('type', 'event'); return false;">Event</a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-4 col-md-3">
                        <div class="dropdown w-100">
                            <button class="btn btn-outline-secondary btn-sm w-100 dropdown-toggle text-start text-truncate bg-white" type="button" id="projectDropdownStatus" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ 
                                    request('status') == 'completed' ? 'Selesai' : 
                                    (request('status') == 'ongoing' ? 'Jalan' : 
                                    (request('status') == 'planning' ? 'Rencana' : 'Status'))
                                }}
                            </button>
                            <ul class="dropdown-menu shadow-sm" aria-labelledby="projectDropdownStatus">
                                <li><a class="dropdown-item {{ request('status') == '' ? 'active' : '' }}" href="#" onclick="setProjectFilter('status', ''); return false;">Semua Status</a></li>
                                <li><a class="dropdown-item {{ request('status') == 'completed' ? 'active' : '' }}" href="#" onclick="setProjectFilter('status', 'completed'); return false;">Selesai</a></li>
                                <li><a class="dropdown-item {{ request('status') == 'ongoing' ? 'active' : '' }}" href="#" onclick="setProjectFilter('status', 'ongoing'); return false;">Berlangsung</a></li>
                                <li><a class="dropdown-item {{ request('status') == 'planning' ? 'active' : '' }}" href="#" onclick="setProjectFilter('status', 'planning'); return false;">Perencanaan</a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-4 col-md-3">
                        <button type="submit" class="btn btn-success-modern w-100 btn-sm h-100 d-flex align-items-center justify-content-center">
                            <i class="fas fa-filter"></i>
                            <span class="d-none d-md-inline ms-1">Filter</span>
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
