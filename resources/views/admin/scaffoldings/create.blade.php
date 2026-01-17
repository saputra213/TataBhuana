@extends('layouts.admin')

@section('title', 'Tambah Scaffolding - Admin Panel')
@section('page-title', 'Tambah Scaffolding')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Form Tambah Scaffolding</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.scaffoldings.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Nama Scaffolding *</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="type" class="form-label">Jenis *</label>
                            <select class="form-select @error('type') is-invalid @enderror" id="type" name="type" required>
                                <option value="">Pilih Jenis</option>
                                <option value="frame" {{ old('type') == 'frame' ? 'selected' : '' }}>Frame Scaffolding</option>
                                <option value="tube" {{ old('type') == 'tube' ? 'selected' : '' }}>Tube Scaffolding</option>
                                <option value="system" {{ old('type') == 'system' ? 'selected' : '' }}>System Scaffolding</option>
                                <option value="mobile" {{ old('type') == 'mobile' ? 'selected' : '' }}>Mobile Scaffolding</option>
                            </select>
                            @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi *</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="material" class="form-label">Material *</label>
                            <select class="form-select @error('material') is-invalid @enderror" id="material" name="material" required>
                                <option value="">Pilih Material</option>
                                <option value="steel" {{ old('material') == 'steel' ? 'selected' : '' }}>Baja</option>
                                <option value="aluminum" {{ old('material') == 'aluminum' ? 'selected' : '' }}>Aluminium</option>
                                <option value="galvanized" {{ old('material') == 'galvanized' ? 'selected' : '' }}>Galvanized</option>
                            </select>
                            @error('material')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="dimensions" class="form-label">Dimensi *</label>
                            <input type="text" class="form-control @error('dimensions') is-invalid @enderror" id="dimensions" name="dimensions" value="{{ old('dimensions') }}" placeholder="Contoh: 1.2m x 1.8m" required>
                            @error('dimensions')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="max_height" class="form-label">Tinggi Maksimal (m) *</label>
                            <input type="number" class="form-control @error('max_height') is-invalid @enderror" id="max_height" name="max_height" value="{{ old('max_height') }}" min="0" required>
                            @error('max_height')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-4 mb-3">
                            <label for="max_load" class="form-label">Beban Maksimal (kg) *</label>
                            <input type="number" class="form-control @error('max_load') is-invalid @enderror" id="max_load" name="max_load" value="{{ old('max_load') }}" min="0" required>
                            @error('max_load')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="stock_quantity" class="form-label">Jumlah Stok</label>
                            <input type="number" class="form-control @error('stock_quantity') is-invalid @enderror" id="stock_quantity" name="stock_quantity" value="{{ old('stock_quantity', 0) }}" min="0">
                            @error('stock_quantity')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="image" class="form-label">Gambar Produk</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*,.webp">
                            <div class="form-text">Format: JPG, PNG, GIF, WEBP. Maksimal 5MB</div>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="is_available" name="is_available" value="1" {{ old('is_available', true) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_available">
                                Tersedia untuk disewa/dijual
                            </label>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="specifications" class="form-label">Detail Spesifikasi (Opsional)</label>
                        <textarea class="form-control @error('specifications') is-invalid @enderror" id="specifications" name="specifications" rows="5">{{ old('specifications') }}</textarea>
                        @error('specifications')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('admin.scaffoldings.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan Scaffolding</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card">
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
