@extends('layouts.app')

@section('title', $article->title . ' - Tata Bhuana')
@section('description', $article->excerpt ?? \Illuminate\Support\Str::limit(strip_tags($article->content), 160))

@section('content')
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-4">
                    @if($article->image)
                        <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="card-img-top" style="max-height: 400px; object-fit: cover;">
                    @endif
                    <div class="card-body">
                        <h1 class="card-title">{{ $article->title }}</h1>
                        <p class="text-muted mb-3">
                            <i class="far fa-calendar-alt me-1"></i>
                            {{ $article->formatted_published_date ?? $article->created_at->format('d M Y') }}
                        </p>
                        <div class="card-text">
                            {!! nl2br(e($article->content)) !!}
                        </div>
                    </div>
                </div>

                <!-- Komentar Section -->
                <div class="card mb-4">
                    <div class="card-header bg-white">
                        <h5 class="mb-0">Komentar ({{ $article->comments->count() }})</h5>
                    </div>
                    <div class="card-body">
                        @if($article->comments->count() > 0)
                            @foreach($article->comments as $comment)
                                <div class="mb-3 border-bottom pb-3">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="fw-bold">{{ $comment->name }}</h6>
                                        <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                                    </div>
                                    <p class="mb-0">{{ $comment->content }}</p>
                                </div>
                            @endforeach
                        @else
                            <p class="text-muted">Belum ada komentar.</p>
                        @endif
                    </div>
                </div>

                <!-- Form Komentar -->
                <div class="card">
                    <div class="card-header bg-white">
                        <h5 class="mb-0">Tulis Komentar</h5>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('articles.comment.store', $article) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                                <small class="text-muted">Email tidak akan dipublikasikan.</small>
                            </div>
                            <div class="mb-3">
                                <label for="content" class="form-label">Komentar</label>
                                <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Kirim Komentar</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        Artikel Terkait
                    </div>
                    <div class="card-body">
                        @if($related->count() > 0)
                            <ul class="list-unstyled mb-0">
                                @foreach($related as $item)
                                    <li class="mb-3 d-flex">
                                        @if($item->image)
                                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="rounded me-3" style="width: 60px; height: 60px; object-fit: cover;">
                                        @endif
                                        <div>
                                            <a href="{{ route('articles.show', $item) }}" class="text-decoration-none">{{ $item->title }}</a>
                                            <div class="small text-muted">
                                                {{ $item->formatted_published_date ?? $item->created_at->format('d M Y') }}
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-muted mb-0">Tidak ada artikel terkait.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

