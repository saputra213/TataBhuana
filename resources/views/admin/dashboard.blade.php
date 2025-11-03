@extends('layouts.admin')

@section('title', 'Dashboard - Admin Panel')
@section('page-title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-12">
        <h2 class="mb-4">Selamat Datang, {{ auth('admin')->user()->name }}!</h2>
    </div>
</div>

<!-- Stats Cards -->
<div class="row g-4 mb-5">
    <div class="col-lg-3 col-md-6">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="card-title">Total Scaffolding</h6>
                        <h3 class="mb-0">{{ $scaffoldingCount }}</h3>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-building fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6">
        <div class="card bg-success text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="card-title">Tersedia</h6>
                        <h3 class="mb-0">{{ $availableScaffolding }}</h3>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-check-circle fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6">
        <div class="card bg-warning text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="card-title">Tidak Tersedia</h6>
                        <h3 class="mb-0">{{ $scaffoldingCount - $availableScaffolding }}</h3>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-times-circle fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6">
        <div class="card bg-info text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="card-title">Total Proyek</h6>
                        <h3 class="mb-0">{{ $projectCount }}</h3>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-project-diagram fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4 mb-5">
    <div class="col-lg-3 col-md-6">
        <div class="card bg-success text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="card-title">Proyek Selesai</h6>
                        <h3 class="mb-0">{{ $completedProjects }}</h3>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-check-circle fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6">
        <div class="card bg-warning text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="card-title">Total Cabang</h6>
                        <h3 class="mb-0">{{ $branchCount }}</h3>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-map-marker-alt fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6">
        <div class="card bg-secondary text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="card-title">Kantor Pusat</h6>
                        <h3 class="mb-0">{{ $mainBranches }}</h3>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-building fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6">
        <div class="card bg-dark text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h6 class="card-title">Total Stok</h6>
                        <h3 class="mb-0">{{ \App\Models\Scaffolding::sum('stock_quantity') }}</h3>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-boxes fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="row g-4 mb-5">
    <div class="col-12">
        <h4 class="mb-3">Aksi Cepat</h4>
    </div>
    
    <div class="col-lg-3 col-md-6">
        <div class="card h-100">
            <div class="card-body text-center">
                <i class="fas fa-plus-circle fa-3x text-primary mb-3"></i>
                <h5 class="card-title">Tambah Scaffolding</h5>
                <p class="card-text text-muted">Tambahkan produk scaffolding baru ke katalog</p>
                <a href="{{ route('admin.scaffoldings.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>Tambah
                </a>
            </div>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6">
        <div class="card h-100">
            <div class="card-body text-center">
                <i class="fas fa-list fa-3x text-success mb-3"></i>
                <h5 class="card-title">Kelola Scaffolding</h5>
                <p class="card-text text-muted">Lihat dan edit semua produk scaffolding</p>
                <a href="{{ route('admin.scaffoldings.index') }}" class="btn btn-success">
                    <i class="fas fa-list me-2"></i>Kelola
                </a>
            </div>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6">
        <div class="card h-100">
            <div class="card-body text-center">
                <i class="fas fa-project-diagram fa-3x text-info mb-3"></i>
                <h5 class="card-title">Kelola Proyek</h5>
                <p class="card-text text-muted">Tambah dan edit galeri proyek</p>
                <a href="{{ route('admin.projects.index') }}" class="btn btn-info">
                    <i class="fas fa-list me-2"></i>Kelola
                </a>
            </div>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6">
        <div class="card h-100">
            <div class="card-body text-center">
                <i class="fas fa-map-marker-alt fa-3x text-warning mb-3"></i>
                <h5 class="card-title">Kelola Cabang</h5>
                <p class="card-text text-muted">Tambah dan edit cabang perusahaan</p>
                <a href="{{ route('admin.branches.index') }}" class="btn btn-warning">
                    <i class="fas fa-list me-2"></i>Kelola
                </a>
            </div>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6">
        <div class="card h-100">
            <div class="card-body text-center">
                <i class="fas fa-building fa-3x text-secondary mb-3"></i>
                <h5 class="card-title">Profil Perusahaan</h5>
                <p class="card-text text-muted">Edit informasi profil perusahaan</p>
                <a href="{{ route('admin.profile') }}" class="btn btn-secondary">
                    <i class="fas fa-edit me-2"></i>Edit
                </a>
            </div>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6">
        <div class="card h-100">
            <div class="card-body text-center">
                <i class="fas fa-external-link-alt fa-3x text-info mb-3"></i>
                <h5 class="card-title">Lihat Website</h5>
                <p class="card-text text-muted">Buka website untuk melihat hasil</p>
                <a href="{{ route('home') }}" target="_blank" class="btn btn-info">
                    <i class="fas fa-external-link-alt me-2"></i>Buka
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Recent Scaffoldings -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Scaffolding Terbaru</h5>
                <a href="{{ route('admin.scaffoldings.index') }}" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
            </div>
            <div class="card-body">
                @php
                    $recentScaffoldings = \App\Models\Scaffolding::latest()->take(5)->get();
                @endphp
                
                @if($recentScaffoldings->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Jenis</th>
                                    <th>Material</th>
                                    <th>Harga Sewa</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentScaffoldings as $scaffolding)
                                <tr>
                                    <td>{{ $scaffolding->name }}</td>
                                    <td><span class="badge bg-primary">{{ ucfirst($scaffolding->type) }}</span></td>
                                    <td><span class="badge bg-secondary">{{ ucfirst($scaffolding->material) }}</span></td>
                                    <td>
                                        @if($scaffolding->rental_price)
                                            {{ $scaffolding->formatted_rental_price }}/hari
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($scaffolding->is_available)
                                            <span class="badge bg-success">Tersedia</span>
                                        @else
                                            <span class="badge bg-danger">Tidak Tersedia</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.scaffoldings.edit', $scaffolding) }}" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-4">
                        <i class="fas fa-building fa-3x text-muted mb-3"></i>
                        <h6 class="text-muted">Belum ada scaffolding</h6>
                        <a href="{{ route('admin.scaffoldings.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i>Tambah Scaffolding Pertama
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
