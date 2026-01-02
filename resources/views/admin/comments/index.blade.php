@extends('layouts.admin')

@section('title', 'Kelola Komentar')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Komentar</h1>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Komentar</th>
                            <th>Artikel</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($comments as $comment)
                            <tr>
                                <td>{{ $loop->iteration + ($comments->currentPage() - 1) * $comments->perPage() }}</td>
                                <td>{{ $comment->name }}</td>
                                <td>{{ $comment->email }}</td>
                                <td>{{ Str::limit($comment->content, 100) }}</td>
                                <td>
                                    <a href="{{ route('articles.show', $comment->article) }}" target="_blank">
                                        {{ Str::limit($comment->article->title, 30) }}
                                    </a>
                                </td>
                                <td>
                                    @if($comment->is_approved)
                                        <span class="badge bg-success">Disetujui</span>
                                    @else
                                        <span class="badge bg-warning">Menunggu</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        @if(!$comment->is_approved)
                                            <form action="{{ route('admin.comments.approve', $comment) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-sm btn-success" title="Setujui">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            </form>
                                        @endif
                                        <form action="{{ route('admin.comments.destroy', $comment) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus komentar ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Tidak ada komentar.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                {{ $comments->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
