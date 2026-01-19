@extends('layouts.admin')

@section('title', 'Pengaturan Footer - Admin Panel')
@section('page-title', 'Pengaturan Footer')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Edit Konten Footer</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.footer.update') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="footer_company_name" class="form-label">Nama Perusahaan di Footer</label>
                        <input
                            type="text"
                            id="footer_company_name"
                            name="footer_company_name"
                            class="form-control @error('footer_company_name') is-invalid @enderror"
                            value="{{ old('footer_company_name', $profile->footer_company_name ?? ($profile->company_name ?? 'Tata Bhuana')) }}"
                        >
                        @error('footer_company_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="footer_company_description" class="form-label">Deskripsi Perusahaan di Footer</label>
                        <textarea
                            id="footer_company_description"
                            name="footer_company_description"
                            rows="3"
                            class="form-control @error('footer_company_description') is-invalid @enderror"
                        >{{ old('footer_company_description', $profile->footer_company_description ?? ($profile->description ?? 'Perusahaan penyedia jasa sewa dan jual scaffolding berkualitas tinggi untuk proyek konstruksi Anda.')) }}</textarea>
                        @error('footer_company_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="footer_services_title" class="form-label">Judul Kolom Layanan</label>
                        <input
                            type="text"
                            id="footer_services_title"
                            name="footer_services_title"
                            class="form-control @error('footer_services_title') is-invalid @enderror"
                            value="{{ old('footer_services_title', $profile->footer_services_title ?? 'Layanan Kami') }}"
                        >
                        @error('footer_services_title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="footer_services_items_text" class="form-label">Menu Layanan</label>
                        <textarea
                            id="footer_services_items_text"
                            name="footer_services_items_text"
                            rows="6"
                            class="form-control @error('footer_services_items_text') is-invalid @enderror"
                        >{{ old('footer_services_items_text', $footerItemsLines) }}</textarea>
                        <div class="form-text">
                            Satu baris untuk satu menu. Format:
                            <strong>Teks Menu | URL</strong>.
                            Contoh: <code>Sewa Scaffolding | {{ route('scaffoldings.index') }}</code>
                        </div>
                        @error('footer_services_items_text')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="footer_copyright_text" class="form-label">Teks Hak Cipta</label>
                        <input
                            type="text"
                            id="footer_copyright_text"
                            name="footer_copyright_text"
                            class="form-control @error('footer_copyright_text') is-invalid @enderror"
                            value="{{ old('footer_copyright_text', $profile->footer_copyright_text ?? '. Semua hak dilindungi.') }}"
                        >
                        <div class="form-text">
                            Teks ini akan muncul setelah nama perusahaan dan tahun.
                        </div>
                        @error('footer_copyright_text')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <hr>

                    <h6 class="fw-bold mb-3">Kontak di Footer</h6>

                    <div class="mb-3">
                        <label for="footer_contact_title" class="form-label">Judul Kolom Kontak</label>
                        <input
                            type="text"
                            id="footer_contact_title"
                            name="footer_contact_title"
                            class="form-control @error('footer_contact_title') is-invalid @enderror"
                            value="{{ old('footer_contact_title', $profile->footer_contact_title ?? 'Kontak Kami') }}"
                        >
                        @error('footer_contact_title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="footer_contact_address" class="form-label">Alamat di Footer</label>
                        <textarea
                            id="footer_contact_address"
                            name="footer_contact_address"
                            rows="2"
                            class="form-control @error('footer_contact_address') is-invalid @enderror"
                        >{{ old('footer_contact_address', $profile->footer_contact_address ?? ($profile->address ?? '')) }}</textarea>
                        @error('footer_contact_address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="footer_contact_phone" class="form-label">Telepon di Footer</label>
                        <input
                            type="text"
                            id="footer_contact_phone"
                            name="footer_contact_phone"
                            class="form-control @error('footer_contact_phone') is-invalid @enderror"
                            value="{{ old('footer_contact_phone', $profile->footer_contact_phone ?? ($profile->phone ?? '')) }}"
                        >
                        @error('footer_contact_phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="footer_contact_email" class="form-label">Email di Footer</label>
                        <input
                            type="email"
                            id="footer_contact_email"
                            name="footer_contact_email"
                            class="form-control @error('footer_contact_email') is-invalid @enderror"
                            value="{{ old('footer_contact_email', $profile->footer_contact_email ?? ($profile->email ?? '')) }}"
                        >
                        @error('footer_contact_email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Simpan Perubahan
                        </button>
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
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
                <h6 class="mb-0">Informasi</h6>
            </div>
            <div class="card-body">
                <ul class="list-unstyled mb-0">
                    <li class="mb-2">
                        <i class="fas fa-info-circle text-primary me-2"></i>
                        <small>Kolom ini hanya mengatur teks di footer, bukan data profil.</small>
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-info-circle text-primary me-2"></i>
                        <small>Alamat, telepon, email, dan ikon media sosial diambil dari menu Profil Perusahaan.</small>
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-info-circle text-primary me-2"></i>
                        <small>Gunakan URL lengkap agar link dapat diklik dengan benar.</small>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
