@extends('layouts.admin')

@section('title', 'Kelola Proyek - Admin Panel')
@section('page-title', 'Kelola Proyek')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Daftar Proyek</h2>
    <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Tambah Proyek
    </a>
</div>

@if($projects->count() > 0)
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Gambar</th>
                            <th>Judul Proyek</th>
                            <th>Klien</th>
                            <th>Lokasi</th>
                            <th>Jenis</th>
                            <th>Status</th>
                            <th>Tanggal Mulai</th>
                            <th>Featured</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($projects as $project)
                        <tr>
                            <td>
                                @if($project->images && count($project->images) > 0)
                                    <img src="{{ asset('storage/' . $project->images[0]) }}" alt="{{ $project->title }}" class="img-thumbnail" style="width: 60px; height: 60px; object-fit: cover;">
                                @else
                                    <div class="bg-light d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                        <i class="fas fa-image text-muted"></i>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <strong>{{ $project->title }}</strong>
                                <br>
                                <small class="text-muted">{{ Str::limit($project->description, 50) }}</small>
                            </td>
                            <td>{{ $project->client_name }}</td>
                            <td>{{ $project->location }}</td>
                            <td><span class="badge bg-primary">{{ ucfirst($project->project_type) }}</span></td>
                            <td>
                                <span class="badge bg-{{ $project->status_badge }}">{{ $project->status_text }}</span>
                            </td>
                            <td>{{ $project->formatted_start_date }}</td>
                            <td>
                                @if($project->is_featured)
                                    <span class="badge bg-warning">
                                        <i class="fas fa-star me-1"></i>Featured
                                    </span>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-sm btn-outline-info" title="Lihat">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-outline-danger" title="Hapus" onclick="confirmDelete({{ $project->id }})">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                                
                                <!-- Delete Form -->
                                <form id="delete-form-{{ $project->id }}" action="{{ route('admin.projects.destroy', $project) }}" method="POST" style="display: none;">
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
    @if($projects->hasPages())
    <div class="d-flex justify-content-center mt-4">
        {{ $projects->links() }}
    </div>
    @endif
@else
    <div class="text-center py-5">
        <i class="fas fa-project-diagram fa-3x text-muted mb-3"></i>
        <h4 class="text-muted">Belum ada proyek</h4>
        <p class="text-muted">Mulai dengan menambahkan proyek pertama Anda</p>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Tambah Proyek Pertama
        </a>
    </div>
@endif
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





