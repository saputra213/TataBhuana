@extends('layouts.admin')

@section('title', 'Detail Scaffolding - Admin Panel')
@section('page-title', 'Detail Scaffolding')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">{{ $scaffolding->name }}</h5>
                <div>
                    <a href="{{ route('admin.scaffoldings.edit', $scaffolding) }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-edit me-2"></i>Edit
                    </a>
                    <a href="{{ route('admin.scaffoldings.index') }}" class="btn btn-sm btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Kembali
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        @if($scaffolding->image)
                            <img src="{{ asset('storage/' . $scaffolding->image) }}" alt="{{ $scaffolding->name }}" class="img-fluid rounded mb-3">
                        @else
                            <div class="bg-light d-flex align-items-center justify-content-center rounded mb-3" style="height: 300px;">
                                <div class="text-center">
                                    <i class="fas fa-image fa-3x text-muted mb-2"></i>
                                    <p class="text-muted">Tidak ada gambar</p>
                                </div>
                            </div>
                        @endif
                    </div>
                    
                    <div class="col-md-6">
                        <h6 class="fw-bold">Deskripsi</h6>
                        <p class="text-muted mb-4">{{ $scaffolding->description }}</p>
                        
                        <h6 class="fw-bold">Spesifikasi</h6>
                        <div class="row g-3 mb-4">
                            <div class="col-6">
                                <div class="d-flex justify-content-between">
                                    <span class="text-muted">Jenis:</span>
                                    <strong>
                                        {{ 
                                            $scaffolding->type == 'scaffolding' ? 'Scaffolding' : 
                                            ($scaffolding->type == 'accessories' ? 'Accessories' : 
                                            ($scaffolding->type == 'bekisting' ? 'Bekisting' : ucfirst($scaffolding->type)))
                                        }}
                                    </strong>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex justify-content-between">
                                    <span class="text-muted">Dimensi:</span>
                                    <strong>{{ $scaffolding->dimensions }}</strong>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex justify-content-between">
                                    <span class="text-muted">Tinggi Maks:</span>
                                    <strong>{{ $scaffolding->max_height }}m</strong>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex justify-content-between">
                                    <span class="text-muted">Beban Maks:</span>
                                    <strong>{{ $scaffolding->max_load }}kg</strong>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex justify-content-between">
                                    <span class="text-muted">Status Stok:</span>
                                    <div>
                                        @if($scaffolding->stock_quantity > 0)
                                            <span class="badge bg-success">Tersedia ({{ $scaffolding->stock_quantity }})</span>
                                        @else
                                            <span class="badge bg-danger">Tidak Tersedia</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <h6 class="fw-bold">Ketersediaan</h6>
                        <p class="mb-0">
                            @if($scaffolding->is_available)
                                <span class="badge bg-primary">Aktif</span>
                            @else
                                <span class="badge bg-secondary">Non-aktif</span>
                            @endif
                        </p>
                    </div>
                </div>
                
                @if($scaffolding->specifications)
                <hr>
                <h6 class="fw-bold">Spesifikasi Detail</h6>
                <div class="text-muted">
                    {!! nl2br(e($scaffolding->specifications)) !!}
                </div>
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
                <p class="mb-2"><strong>Dibuat:</strong> {{ $scaffolding->created_at->format('d M Y H:i') }}</p>
                <p class="mb-2"><strong>Diupdate:</strong> {{ $scaffolding->updated_at->format('d M Y H:i') }}</p>
                <p class="mb-0"><strong>ID:</strong> #{{ $scaffolding->id }}</p>
            </div>
        </div>
        
        <div class="card mt-3">
            <div class="card-header">
                <h6 class="mb-0">Aksi</h6>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.scaffoldings.edit', $scaffolding) }}" class="btn btn-primary">
                        <i class="fas fa-edit me-2"></i>Edit Scaffolding
                    </a>
                    <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $scaffolding->id }})">
                        <i class="fas fa-trash me-2"></i>Hapus Scaffolding
                    </button>
                </div>
                
                <!-- Delete Form -->
                <form id="delete-form-{{ $scaffolding->id }}" action="{{ route('admin.scaffoldings.destroy', $scaffolding) }}" method="POST" style="display: none;">
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
                <p class="text-muted small mb-3">Lihat bagaimana scaffolding ini tampil di website</p>
                <a href="{{ route('scaffoldings.show', $scaffolding) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                    <i class="fas fa-external-link-alt me-2"></i>Lihat di Website
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
@vite('resources/js/admin/confirmDelete.js')
@endpush
