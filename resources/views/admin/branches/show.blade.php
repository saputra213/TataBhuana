@extends('layouts.admin')

@section('title', 'Detail Cabang - Admin Panel')
@section('page-title', 'Detail Cabang')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">{{ $branch->name }}</h5>
                <div>
                    <a href="{{ route('admin.branches.edit', $branch) }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-edit me-2"></i>Edit
                    </a>
                    <a href="{{ route('admin.branches.index') }}" class="btn btn-sm btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Kembali
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        @if($branch->image)
                            <img src="{{ asset('storage/' . $branch->image) }}" alt="{{ $branch->name }}" class="img-fluid rounded mb-3">
                        @else
                            <div class="bg-light d-flex align-items-center justify-content-center rounded mb-3" style="height: 300px;">
                                <div class="text-center">
                                    <i class="fas fa-building fa-3x text-muted mb-3"></i>
                                    <h5 class="text-muted">Tidak ada gambar tersedia</h5>
                                </div>
                            </div>
                        @endif
                    </div>
                    
                    <div class="col-md-6">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <h6 class="fw-bold mb-0">{{ $branch->name }}</h6>
                            @if($branch->is_main_branch)
                                <span class="badge bg-warning">
                                    <i class="fas fa-star me-1"></i>Kantor Pusat
                                </span>
                            @endif
                        </div>
                        
                        <p class="text-muted mb-4">{{ $branch->description }}</p>
                        
                        <h6 class="fw-bold">Informasi Kontak</h6>
                        <div class="row g-3 mb-4">
                            <div class="col-12">
                                <div class="d-flex align-items-start">
                                    <i class="fas fa-map-marker-alt text-primary me-3 mt-1"></i>
                                    <div>
                                        <h6 class="fw-bold mb-1">Alamat</h6>
                                        <p class="text-muted mb-0">{{ $branch->address }}</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-phone text-primary me-3"></i>
                                    <div>
                                        <h6 class="fw-bold mb-1">Telepon</h6>
                                        <p class="text-muted mb-0">{{ $branch->phone }}</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-envelope text-primary me-3"></i>
                                    <div>
                                        <h6 class="fw-bold mb-1">Email</h6>
                                        <p class="text-muted mb-0">{{ $branch->email }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <h6 class="fw-bold">Manager Cabang</h6>
                        <div class="row g-3 mb-4">
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-user text-primary me-3"></i>
                                    <div>
                                        <h6 class="fw-bold mb-1">Nama</h6>
                                        <p class="text-muted mb-0">{{ $branch->manager_name }}</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-phone text-primary me-3"></i>
                                    <div>
                                        <h6 class="fw-bold mb-1">Telepon</h6>
                                        <p class="text-muted mb-0">{{ $branch->manager_phone }}</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-envelope text-primary me-3"></i>
                                    <div>
                                        <h6 class="fw-bold mb-1">Email</h6>
                                        <p class="text-muted mb-0">{{ $branch->manager_email }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        @if($branch->whatsapp_number || $branch->whatsapp_message)
                        <hr>
                        <h6 class="fw-bold">WhatsApp Integration</h6>
                        <div class="row g-3 mb-4">
                            @if($branch->whatsapp_number)
                            <div class="col-12">
                                <div class="d-flex align-items-center">
                                    <i class="fab fa-whatsapp text-success me-3"></i>
                                    <div>
                                        <h6 class="fw-bold mb-1">Nomor WhatsApp</h6>
                                        <p class="text-muted mb-0">{{ $branch->whatsapp_number }}</p>
                                    </div>
                                </div>
                            </div>
                            @endif
                            
                            @if($branch->whatsapp_message)
                            <div class="col-12">
                                <div class="d-flex align-items-start">
                                    <i class="fas fa-comment text-primary me-3 mt-1"></i>
                                    <div>
                                        <h6 class="fw-bold mb-1">Pesan Default</h6>
                                        <p class="text-muted mb-0">{{ $branch->whatsapp_message }}</p>
                                    </div>
                                </div>
                            </div>
                            @endif
                            
                            <div class="col-12">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-link text-primary me-3"></i>
                                    <div>
                                        <h6 class="fw-bold mb-1">WhatsApp URL</h6>
                                        <p class="text-muted mb-0">
                                            <a href="{{ $branch->whatsapp_url }}" target="_blank" class="text-decoration-none">
                                                {{ $branch->whatsapp_url }}
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        
                        <h6 class="fw-bold">Status</h6>
                        <p class="mb-0">
                            @if($branch->is_active)
                                <span class="badge bg-success">Aktif</span>
                            @else
                                <span class="badge bg-danger">Tidak Aktif</span>
                            @endif
                        </p>
                    </div>
                </div>
                
                @if($branch->operating_hours || $branch->services)
                <hr>
                <div class="row">
                    @if($branch->operating_hours)
                    <div class="col-md-6">
                        <h6 class="fw-bold">Jam Operasional</h6>
                        <div class="text-muted">
                            {!! $branch->operating_hours_formatted !!}
                        </div>
                    </div>
                    @endif
                    
                    @if($branch->services && count($branch->services) > 0)
                    <div class="col-md-6">
                        <h6 class="fw-bold">Layanan Tersedia</h6>
                        <ul class="list-unstyled">
                            @foreach($branch->services as $service)
                                <li class="mb-1">
                                    <i class="fas fa-check text-success me-2"></i>{{ $service }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                @endif
                
                @if($branch->latitude && $branch->longitude)
                <hr>
                <h6 class="fw-bold">Koordinat GPS</h6>
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="d-flex justify-content-between">
                            <span class="text-muted">Latitude:</span>
                            <strong>{{ $branch->latitude }}</strong>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex justify-content-between">
                            <span class="text-muted">Longitude:</span>
                            <strong>{{ $branch->longitude }}</strong>
                        </div>
                    </div>
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
                <p class="mb-2"><strong>Kode:</strong> {{ $branch->code }}</p>
                <p class="mb-2"><strong>Dibuat:</strong> {{ $branch->created_at->format('d M Y H:i') }}</p>
                <p class="mb-2"><strong>Diupdate:</strong> {{ $branch->updated_at->format('d M Y H:i') }}</p>
                <p class="mb-0"><strong>ID:</strong> #{{ $branch->id }}</p>
            </div>
        </div>
        
        <div class="card mt-3">
            <div class="card-header">
                <h6 class="mb-0">Aksi</h6>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.branches.edit', $branch) }}" class="btn btn-primary">
                        <i class="fas fa-edit me-2"></i>Edit Cabang
                    </a>
                    <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $branch->id }})">
                        <i class="fas fa-trash me-2"></i>Hapus Cabang
                    </button>
                </div>
                
                <!-- Delete Form -->
                <form id="delete-form-{{ $branch->id }}" action="{{ route('admin.branches.destroy', $branch) }}" method="POST" style="display: none;">
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
                <p class="text-muted small mb-3">Lihat bagaimana cabang ini tampil di website</p>
                <a href="{{ route('branches.show', $branch) }}" target="_blank" class="btn btn-outline-primary btn-sm">
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
    if (confirm('Apakah Anda yakin ingin menghapus cabang ini?')) {
        document.getElementById('delete-form-' + id).submit();
    }
}
</script>
@endpush
