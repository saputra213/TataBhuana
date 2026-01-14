@extends('layouts.admin')

@section('title', 'Kelola Cabang - Admin Panel')
@section('page-title', 'Kelola Cabang')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Daftar Cabang</h2>
    <a href="{{ route('admin.branches.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Tambah Cabang
    </a>
</div>

@if($branches->count() > 0)
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Gambar</th>
                            <th>Nama Cabang</th>
                            <th>Kode</th>
                            <th>Alamat</th>
                            <th>Manager</th>
                            <th>Telepon</th>
                            <th>Status</th>
                            <th>Tipe</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($branches as $branch)
                        <tr>
                            <td>
                                @if($branch->image)
                                    <img src="{{ asset('storage/' . $branch->image) }}" alt="{{ $branch->name }}" class="img-thumbnail" style="width: 60px; height: 60px; object-fit: cover;">
                                @else
                                    <div class="bg-light d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                        <i class="fas fa-building text-muted"></i>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <strong>{{ $branch->name }}</strong>
                                <br>
                                <small class="text-muted">{{ Str::limit($branch->description, 50) }}</small>
                            </td>
                            <td><span class="badge bg-secondary">{{ $branch->code }}</span></td>
                            <td>{{ Str::limit($branch->address, 30) }}</td>
                            <td>{{ $branch->manager_name }}</td>
                            <td>{{ $branch->phone }}</td>
                            <td>
                                @if($branch->is_active)
                                    <span class="badge bg-success">Aktif</span>
                                @else
                                    <span class="badge bg-danger">Tidak Aktif</span>
                                @endif
                            </td>
                            <td>
                                @if($branch->is_main_branch)
                                    <span class="badge bg-warning">
                                        <i class="fas fa-star me-1"></i>Pusat
                                    </span>
                                @else
                                    <span class="badge bg-info">Cabang</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.branches.show', $branch) }}" class="btn btn-sm btn-outline-primary" title="Lihat">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.branches.edit', $branch) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-outline-danger" title="Hapus" onclick="confirmDelete({{ $branch->id }})">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                                
                                <!-- Delete Form -->
                                <form id="delete-form-{{ $branch->id }}" action="{{ route('admin.branches.destroy', $branch) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <!-- Pagination -->
    @if($branches->hasPages())
    <div class="d-flex justify-content-center mt-4">
        {{ $branches->links() }}
    </div>
    @endif
@else
    <div class="text-center py-5">
        <i class="fas fa-map-marker-alt fa-3x text-muted mb-3"></i>
        <h4 class="text-muted">Belum ada cabang</h4>
        <p class="text-muted">Mulai dengan menambahkan cabang pertama Anda</p>
        <a href="{{ route('admin.branches.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Tambah Cabang Pertama
        </a>
    </div>
@endif
@endsection

@push('scripts')
@vite('resources/js/admin/confirmDelete.js')
@endpush



