@extends('layouts.admin')

@section('title', 'Edit Scaffolding - Admin Panel')
@section('page-title', 'Edit Scaffolding')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Form Edit Scaffolding</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.scaffoldings.update', $scaffolding) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Nama Scaffolding *</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $scaffolding->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="type" class="form-label">Jenis *</label>
                            <select class="form-select @error('type') is-invalid @enderror" id="type" name="type" required>
                                <option value="">Pilih Jenis</option>
                                <option value="scaffolding" {{ old('type', $scaffolding->type) == 'scaffolding' ? 'selected' : '' }}>Scaffolding</option>
                                <option value="accessories" {{ old('type', $scaffolding->type) == 'accessories' ? 'selected' : '' }}>Accessories</option>
                                <option value="bekisting" {{ old('type', $scaffolding->type) == 'bekisting' ? 'selected' : '' }}>Bekisting</option>
                            </select>
                            @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi *</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" required>{{ old('description', $scaffolding->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="dimensions" class="form-label">Dimensi *</label>
                            <input type="text" class="form-control @error('dimensions') is-invalid @enderror" id="dimensions" name="dimensions" value="{{ old('dimensions', $scaffolding->dimensions) }}" placeholder="Contoh: 1.2m x 1.8m" required>
                            @error('dimensions')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="max_height" class="form-label">Tinggi Maksimal (m) *</label>
                            <input type="number" class="form-control @error('max_height') is-invalid @enderror" id="max_height" name="max_height" value="{{ old('max_height', $scaffolding->max_height) }}" min="0" required>
                            @error('max_height')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="max_load" class="form-label">Beban Maksimal (kg) *</label>
                            <input type="number" class="form-control @error('max_load') is-invalid @enderror" id="max_load" name="max_load" value="{{ old('max_load', $scaffolding->max_load) }}" min="0" required>
                            @error('max_load')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                        <div class="col-md-12 mb-3">
                            <label for="image" class="form-label">Gambar Produk (Biarkan kosong jika tidak ingin mengubah)</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*,.webp">
                            <div class="form-text">Format: JPG, PNG, GIF, WEBP. Maksimal 5MB</div>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            @if($scaffolding->image)
                                <div class="mt-2">
                                    <small class="text-muted">Gambar saat ini:</small>
                                    <div class="mt-1">
                                        <img src="{{ asset('storage/' . $scaffolding->image) }}" alt="Current Image" class="img-thumbnail" style="max-height: 100px;">
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="is_available" name="is_available" value="1" {{ old('is_available', $scaffolding->is_available) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_available">
                                Tersedia untuk disewa/dijual
                            </label>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="specifications" class="form-label">Detail Spesifikasi (Opsional)</label>
                        <textarea class="form-control @error('specifications') is-invalid @enderror" id="specifications" name="specifications" rows="5">{{ old('specifications', $scaffolding->specifications) }}</textarea>
                        @error('specifications')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('admin.scaffoldings.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h6 class="mb-0">Informasi Scaffolding</h6>
            </div>
            <div class="card-body">
                <p class="mb-2"><strong>Dibuat:</strong> {{ $scaffolding->created_at->format('d M Y H:i') }}</p>
                <p class="mb-2"><strong>Diupdate:</strong> {{ $scaffolding->updated_at->format('d M Y H:i') }}</p>
                <p class="mb-0"><strong>Status:</strong> 
                    @if($scaffolding->is_available)
                        <span class="badge bg-success">Tersedia</span>
                    @else
                        <span class="badge bg-danger">Tidak Tersedia</span>
                    @endif
                </p>
            </div>
        </div>
        
        <div class="card mt-3">
            <div class="card-header">
                <h6 class="mb-0">Tips</h6>
            </div>
            <div class="card-body">
                <ul class="list-unstyled mb-0">
                    <li class="mb-2">
                        <i class="fas fa-info-circle text-primary me-2"></i>
                        <small>Gunakan nama yang jelas dan deskriptif</small>
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-info-circle text-primary me-2"></i>
                        <small>Masukkan dimensi dalam format yang mudah dipahami</small>
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-info-circle text-primary me-2"></i>
                        <small>Gambar akan membantu pelanggan memahami produk</small>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
