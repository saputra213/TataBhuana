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
                                <option value="frame" {{ old('type', $scaffolding->type) == 'frame' ? 'selected' : '' }}>Frame Scaffolding</option>
                                <option value="tube" {{ old('type', $scaffolding->type) == 'tube' ? 'selected' : '' }}>Tube Scaffolding</option>
                                <option value="system" {{ old('type', $scaffolding->type) == 'system' ? 'selected' : '' }}>System Scaffolding</option>
                                <option value="mobile" {{ old('type', $scaffolding->type) == 'mobile' ? 'selected' : '' }}>Mobile Scaffolding</option>
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
                        <div class="col-md-6 mb-3">
                            <label for="material" class="form-label">Material *</label>
                            <select class="form-select @error('material') is-invalid @enderror" id="material" name="material" required>
                                <option value="">Pilih Material</option>
                                <option value="steel" {{ old('material', $scaffolding->material) == 'steel' ? 'selected' : '' }}>Baja</option>
                                <option value="aluminum" {{ old('material', $scaffolding->material) == 'aluminum' ? 'selected' : '' }}>Aluminium</option>
                                <option value="galvanized" {{ old('material', $scaffolding->material) == 'galvanized' ? 'selected' : '' }}>Galvanized</option>
                            </select>
                            @error('material')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="dimensions" class="form-label">Dimensi *</label>
                            <input type="text" class="form-control @error('dimensions') is-invalid @enderror" id="dimensions" name="dimensions" value="{{ old('dimensions', $scaffolding->dimensions) }}" placeholder="Contoh: 1.2m x 1.8m" required>
                            @error('dimensions')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="max_height" class="form-label">Tinggi Maksimal (m) *</label>
                            <input type="number" class="form-control @error('max_height') is-invalid @enderror" id="max_height" name="max_height" value="{{ old('max_height', $scaffolding->max_height) }}" min="0" required>
                            @error('max_height')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-4 mb-3">
                            <label for="max_load" class="form-label">Beban Maksimal (kg) *</label>
                            <input type="number" class="form-control @error('max_load') is-invalid @enderror" id="max_load" name="max_load" value="{{ old('max_load', $scaffolding->max_load) }}" min="0" required>
                            @error('max_load')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-4 mb-3">
                            <label for="stock_quantity" class="form-label">Jumlah Stok *</label>
                            <input type="number" class="form-control @error('stock_quantity') is-invalid @enderror" id="stock_quantity" name="stock_quantity" value="{{ old('stock_quantity', $scaffolding->stock_quantity) }}" min="0" required>
                            @error('stock_quantity')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="rental_price" class="form-label">Harga Sewa (per hari)</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control @error('rental_price') is-invalid @enderror" id="rental_price" name="rental_price" value="{{ old('rental_price', $scaffolding->rental_price) }}" min="0" step="0.01">
                            </div>
                            @error('rental_price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="sale_price" class="form-label">Harga Jual</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control @error('sale_price') is-invalid @enderror" id="sale_price" name="sale_price" value="{{ old('sale_price', $scaffolding->sale_price) }}" min="0" step="0.01">
                            </div>
                            @error('sale_price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar</label>
                        @if($scaffolding->image)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $scaffolding->image) }}" alt="{{ $scaffolding->name }}" class="img-thumbnail" style="max-width: 200px;">
                                <p class="text-muted small">Gambar saat ini</p>
                            </div>
                        @endif
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                        <div class="form-text">Format: JPG, PNG, GIF. Maksimal 5MB. Gambar akan otomatis resize max 1200px dan background menjadi putih. Kosongkan jika tidak ingin mengubah gambar.</div>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="specifications" class="form-label">Spesifikasi Detail</label>
                        <textarea class="form-control @error('specifications') is-invalid @enderror" id="specifications" name="specifications" rows="4">{{ old('specifications', $scaffolding->specifications) }}</textarea>
                        @error('specifications')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Update
                        </button>
                        <a href="{{ route('admin.scaffoldings.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times me-2"></i>Batal
                        </a>
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
                        <small>Harga sewa dan harga jual bersifat opsional</small>
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
