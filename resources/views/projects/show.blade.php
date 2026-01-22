@extends('layouts.app')

@section('title', $project->title . ' - Galeri Proyek Tata Bhuana')
@section('description', $project->description)

@section('content')
<!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="py-3 bg-light">
    <div class="container">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ route('projects.index') }}">Galeri Proyek</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $project->title }}</li>
        </ol>
    </div>
</nav>

<!-- Project Detail -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <!-- Project Images -->
            <div class="col-lg-8 mb-4">
                @if($project->images && count($project->images) > 0)
                    <div id="projectCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            @foreach($project->images as $index => $image)
                                <button type="button" data-bs-target="#projectCarousel" data-bs-slide-to="{{ $index }}" 
                                        class="{{ $index === 0 ? 'active' : '' }}" aria-current="{{ $index === 0 ? 'true' : 'false' }}" 
                                        aria-label="Slide {{ $index + 1 }}"></button>
                            @endforeach
                        </div>
                        
                        <div class="carousel-inner">
                            @foreach($project->images as $index => $image)
                                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                    <img src="{{ asset('storage/' . $image) }}" class="d-block w-100 rounded shadow" 
                                         alt="{{ $project->title }}" style="height: 500px; object-fit: cover;" loading="{{ $index === 0 ? 'eager' : 'lazy' }}" fetchpriority="{{ $index === 0 ? 'high' : 'low' }}" decoding="async">
                                </div>
                            @endforeach
                        </div>
                        
                        <button class="carousel-control-prev" type="button" data-bs-target="#projectCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#projectCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                @else
                    <div class="bg-light d-flex align-items-center justify-content-center rounded shadow" style="height: 500px;">
                        <div class="text-center">
                            <i class="fas fa-image fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted">Tidak ada gambar tersedia</h5>
                        </div>
                    </div>
                @endif
            </div>
            
            <!-- Project Info -->
            <div class="col-lg-4">
                <div class="card shadow">
                    <div class="card-body">
                        <h1 class="h3 fw-bold mb-3">{{ $project->title }}</h1>
                        
                        @if($project->is_featured)
                            <div class="mb-3">
                                <span class="badge bg-warning fs-6">
                                    <i class="fas fa-star me-1"></i>Proyek Unggulan
                                </span>
                            </div>
                        @endif
                        
                        <div class="mb-4">
                            <p class="text-muted">{{ $project->description }}</p>
                        </div>
                        
                        <!-- Project Details -->
                        <div class="row g-3 mb-4">
                            <div class="col-6">
                                <div class="text-center p-3 bg-light rounded">
                                    <h6 class="text-muted mb-1">Klien</h6>
                                    <strong>{{ $project->client_name }}</strong>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-center p-3 bg-light rounded">
                                    <h6 class="text-muted mb-1">Lokasi</h6>
                                    <strong>{{ $project->location }}</strong>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-center p-3 bg-light rounded">
                                    <h6 class="text-muted mb-1">Jenis</h6>
                                    <strong>{{ ucfirst($project->project_type) }}</strong>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-center p-3 bg-light rounded">
                                    <h6 class="text-muted mb-1">Status</h6>
                                    <span class="badge bg-{{ $project->status_badge }}">{{ $project->status_text }}</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Timeline -->
                        <div class="mb-4">
                            <h6 class="fw-bold mb-3">Timeline Proyek</h6>
                            <div class="timeline">
                                <div class="timeline-item">
                                    <div class="timeline-marker bg-primary"></div>
                                    <div class="timeline-content">
                                        <h6 class="mb-1">Mulai Proyek</h6>
                                        <p class="text-muted mb-0">{{ $project->formatted_start_date }}</p>
                                    </div>
                                </div>
                                @if($project->end_date)
                                <div class="timeline-item">
                                    <div class="timeline-marker bg-success"></div>
                                    <div class="timeline-content">
                                        <h6 class="mb-1">Selesai</h6>
                                        <p class="text-muted mb-0">{{ $project->formatted_end_date }}</p>
                                    </div>
                                </div>
                                @endif
                                <div class="timeline-item">
                                    <div class="timeline-marker bg-info"></div>
                                    <div class="timeline-content">
                                        <h6 class="mb-1">Durasi</h6>
                                        <p class="text-muted mb-0">{{ $project->duration }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Action Buttons -->
                        <div class="d-grid gap-2">
                            <a href="{{ route('contact') }}" class="btn btn-success-modern btn-lg">
                                <i class="fas fa-phone me-2"></i>Konsultasi Proyek Serupa
                            </a>
                            <a href="{{ route('projects.index') }}" class="btn btn-outline-red-modern">
                                <i class="fas fa-arrow-left me-2"></i>Kembali ke Galeri
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        
        <!-- Related Projects -->
        @if($relatedProjects->count() > 0)
        <div class="row mt-5">
            <div class="col-12">
                <h3 class="fw-bold mb-4">Proyek Terbaru</h3>
                <div class="row g-4">
                    @foreach($relatedProjects as $related)
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100 shadow-sm">
                            @if($related->images && count($related->images) > 0)
                                <img src="{{ asset('storage/' . $related->images[0]) }}" class="card-img-top" alt="{{ $related->title }}" style="height: 200px; object-fit: cover;" loading="lazy" decoding="async">
                            @else
                                <div class="bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                                    <i class="fas fa-image fa-2x text-muted"></i>
                                </div>
                            @endif
                            
                            <div class="card-body d-flex flex-column">
                                <h6 class="card-title fw-bold">{{ $related->title }}</h6>
                                <p class="card-text text-muted small flex-grow-1">{{ Str::limit($related->description, 80) }}</p>
                                
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="badge badge-primary-modern">{{ ucfirst($related->project_type) }}</span>
                                    <a href="{{ route('projects.show', $related) }}" class="btn btn-sm btn-outline-red-modern">Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
    </div>
</section>

<!-- Scroll to Top Button -->
<button id="scrollToTopBtn" class="scroll-to-top-btn" title="Scroll ke Atas">
    <i class="fas fa-arrow-up"></i>
</button>
@endsection

@push('styles')
    @vite('resources/css/projects-show.css')
@endpush

@push('scripts')
    @vite('resources/js/projects-show.js')
@endpush
