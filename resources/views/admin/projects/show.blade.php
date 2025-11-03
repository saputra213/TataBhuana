@extends('layouts.admin')

@section('title', 'Detail Proyek - Admin Panel')
@section('page-title', 'Detail Proyek')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">{{ $project->title }}</h5>
                <div>
                    <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-edit me-2"></i>Edit
                    </a>
                    <a href="{{ route('admin.projects.index') }}" class="btn btn-sm btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Kembali
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        @if($project->images && count($project->images) > 0)
                            <div id="projectCarousel" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach($project->images as $index => $image)
                                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                            <img src="{{ asset('storage/' . $image) }}" class="d-block w-100 rounded" 
                                                 alt="{{ $project->title }}" style="height: 300px; object-fit: cover;">
                                        </div>
                                    @endforeach
                                </div>
                                
                                @if(count($project->images) > 1)
                                <button class="carousel-control-prev" type="button" data-bs-target="#projectCarousel" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#projectCarousel" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                                @endif
                            </div>
                        @else
                            <div class="bg-light d-flex align-items-center justify-content-center rounded" style="height: 300px;">
                                <div class="text-center">
                                    <i class="fas fa-image fa-3x text-muted mb-3"></i>
                                    <h5 class="text-muted">Tidak ada gambar tersedia</h5>
                                </div>
                            </div>
                        @endif
                    </div>
                    
                    <div class="col-md-6">
                        <h6 class="fw-bold">Deskripsi</h6>
                        <p class="text-muted mb-4">{{ $project->description }}</p>
                        
                        <h6 class="fw-bold">Detail Proyek</h6>
                        <div class="row g-3 mb-4">
                            <div class="col-6">
                                <div class="d-flex justify-content-between">
                                    <span class="text-muted">Klien:</span>
                                    <strong>{{ $project->client_name }}</strong>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex justify-content-between">
                                    <span class="text-muted">Lokasi:</span>
                                    <strong>{{ $project->location }}</strong>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex justify-content-between">
                                    <span class="text-muted">Jenis:</span>
                                    <strong>{{ ucfirst($project->project_type) }}</strong>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex justify-content-between">
                                    <span class="text-muted">Status:</span>
                                    <span class="badge bg-{{ $project->status_badge }}">{{ $project->status_text }}</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex justify-content-between">
                                    <span class="text-muted">Mulai:</span>
                                    <strong>{{ $project->formatted_start_date }}</strong>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex justify-content-between">
                                    <span class="text-muted">Durasi:</span>
                                    <strong>{{ $project->duration }}</strong>
                                </div>
                            </div>
                        </div>
                        
                        <h6 class="fw-bold">Status</h6>
                        <p class="mb-0">
                            @if($project->is_featured)
                                <span class="badge bg-warning fs-6">
                                    <i class="fas fa-star me-1"></i>Proyek Unggulan
                                </span>
                            @else
                                <span class="text-muted">Proyek Biasa</span>
                            @endif
                        </p>
                    </div>
                </div>
                
                @if($project->challenges || $project->solutions || $project->results)
                <hr>
                <h6 class="fw-bold">Kisah Proyek</h6>
                
                @if($project->challenges)
                <div class="mb-3">
                    <h6 class="text-danger mb-2">
                        <i class="fas fa-exclamation-triangle me-2"></i>Tantangan
                    </h6>
                    <div class="text-muted">
                        {!! nl2br(e($project->challenges)) !!}
                    </div>
                </div>
                @endif
                
                @if($project->solutions)
                <div class="mb-3">
                    <h6 class="text-primary mb-2">
                        <i class="fas fa-lightbulb me-2"></i>Solusi
                    </h6>
                    <div class="text-muted">
                        {!! nl2br(e($project->solutions)) !!}
                    </div>
                </div>
                @endif
                
                @if($project->results)
                <div class="mb-3">
                    <h6 class="text-success mb-2">
                        <i class="fas fa-trophy me-2"></i>Hasil
                    </h6>
                    <div class="text-muted">
                        {!! nl2br(e($project->results)) !!}
                    </div>
                </div>
                @endif
                @endif
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">Informasi</h6>
            </div>
            <div class="card-body">
                <p class="mb-2"><strong>Dibuat:</strong> {{ $project->created_at->format('d M Y H:i') }}</p>
                <p class="mb-2"><strong>Diupdate:</strong> {{ $project->updated_at->format('d M Y H:i') }}</p>
                <p class="mb-0"><strong>ID:</strong> #{{ $project->id }}</p>
            </div>
        </div>
        
        <div class="card mt-3">
            <div class="card-header">
                <h6 class="mb-0">Aksi</h6>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-primary">
                        <i class="fas fa-edit me-2"></i>Edit Proyek
                    </a>
                    <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $project->id }})">
                        <i class="fas fa-trash me-2"></i>Hapus Proyek
                    </button>
                </div>
                
                <!-- Delete Form -->
                <form id="delete-form-{{ $project->id }}" action="{{ route('admin.projects.destroy', $project) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>
        
        <div class="card mt-3">
            <div class="card-header">
                <h6 class="mb-0">Preview Website</h6>
            </div>
            <div class="card-body">
                <p class="text-muted small mb-3">Lihat bagaimana proyek ini tampil di website</p>
                <a href="{{ route('projects.show', $project) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                    <i class="fas fa-external-link-alt me-2"></i>Lihat di Website
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function confirmDelete(id) {
    if (confirm('Apakah Anda yakin ingin menghapus proyek ini?')) {
        document.getElementById('delete-form-' + id).submit();
    }
}
</script>
@endpush





