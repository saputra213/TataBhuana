@extends('layouts.admin')

@section('title', 'Kelola Scaffolding - Admin Panel')
@section('page-title', 'Kelola Scaffolding')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Daftar Scaffolding</h2>
    <a href="{{ route('admin.scaffoldings.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Tambah Scaffolding
    </a>
</div>

@if($scaffoldings->count() > 0)
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Gambar</th>
                            <th>Nama</th>
                            <th>Jenis</th>
                            <th>Material</th>
                            <th>Status Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($scaffoldings as $scaffolding)
                        <tr>
                            <td>
                                @if($scaffolding->image)
                                    <img src="{{ asset('storage/' . $scaffolding->image) }}" alt="{{ $scaffolding->name }}" class="img-thumbnail" style="width: 60px; height: 60px; object-fit: cover;">
                                @else
                                    <div class="bg-light d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                        <i class="fas fa-image text-muted"></i>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <strong>{{ $scaffolding->name }}</strong>
                                <br>
                                <small class="text-muted">{{ Str::limit($scaffolding->description, 50) }}</small>
                            </td>
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
                                @if($scaffolding->sale_price)
                                    {{ $scaffolding->formatted_sale_price }}
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>
                                @if($scaffolding->stock_quantity > 0)
                                    <span class="badge bg-success">Tersedia</span>
                                @else
                                    <span class="badge bg-danger">Tidak Tersedia</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.scaffoldings.show', $scaffolding) }}" class="btn btn-sm btn-outline-primary" title="Lihat">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.scaffoldings.edit', $scaffolding) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-outline-danger" title="Hapus" onclick="confirmDelete({{ $scaffolding->id }})">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                                
                                <!-- Delete Form -->
                                <form id="delete-form-{{ $scaffolding->id }}" action="{{ route('admin.scaffoldings.destroy', $scaffolding) }}" method="POST" style="display: none;">
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
    @if($scaffoldings->hasPages())
    <div class="d-flex justify-content-center mt-4">
        {{ $scaffoldings->links() }}
    </div>
    @endif
@else
    <div class="text-center py-5">
        <i class="fas fa-building fa-3x text-muted mb-3"></i>
        <h4 class="text-muted">Belum ada scaffolding</h4>
        <p class="text-muted">Mulai dengan menambahkan scaffolding pertama Anda</p>
        <a href="{{ route('admin.scaffoldings.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Tambah Scaffolding Pertama
        </a>
    </div>
@endif
@endsection

@push('scripts')
@vite('resources/js/admin/confirmDelete.js')
@endpush
