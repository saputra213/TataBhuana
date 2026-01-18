@extends('layouts.app')

@section('title', 'Penjualan Scaffolding - Tata Bhuana Scaffolding')
@section('description', 'Detail layanan penjualan scaffolding berkualitas tinggi lengkap dengan spesifikasi, benefit, dan skenario penggunaan.')

@section('content')
<section class="services-hero text-white py-5" style="background:#dc2626; padding-top:120px; padding-bottom:80px; position:relative;">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-3 fw-bold mb-3">Penjualan Scaffolding</h1>
                <p class="lead mb-0">Solusi kepemilikan scaffolding jangka panjang yang aman dan ekonomis</p>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-white">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-8">
                <h2 class="fw-bold mb-3">Untuk siapa layanan penjualan ini?</h2>
                <p class="text-muted">
                    Layanan penjualan scaffolding cocok untuk kontraktor, developer, dan perusahaan yang rutin
                    melakukan pekerjaan konstruksi, renovasi, maupun pemeliharaan gedung sehingga lebih efisien
                    jika memiliki scaffolding sendiri.
                </p>

                <h3 class="fw-bold mt-4 mb-3">Keunggulan membeli scaffolding di {{ $profile->company_name ?? 'Tata Bhuana Scaffolding' }}</h3>
                <ul class="list-unstyled mb-4">
                    <li class="d-flex mb-2">
                        <i class="fas fa-check text-success me-2 mt-1"></i>
                        <span>Bahan berkualitas dengan standar keamanan kerja yang telah teruji di lapangan.</span>
                    </li>
                    <li class="d-flex mb-2">
                        <i class="fas fa-check text-success me-2 mt-1"></i>
                        <span>Pilihan tipe dan konfigurasi sesuai kebutuhan tinggi kerja dan beban proyek.</span>
                    </li>
                    <li class="d-flex mb-2">
                        <i class="fas fa-check text-success me-2 mt-1"></i>
                        <span>Penawaran harga paket untuk pembelian dalam jumlah besar.</span>
                    </li>
                    <li class="d-flex mb-2">
                        <i class="fas fa-check text-success me-2 mt-1"></i>
                        <span>Panduan teknis dasar cara perakitan dan perawatan scaffolding.</span>
                    </li>
                </ul>

                <h3 class="fw-bold mt-4 mb-3">Contoh skenario penggunaan</h3>
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="p-3 border rounded h-100">
                            <h5 class="fw-bold mb-2">Perusahaan kontraktor</h5>
                            <p class="text-muted mb-0">
                                Untuk proyek berulang di banyak lokasi sehingga biaya sewa jangka panjang bisa
                                dikonversi menjadi aset perusahaan.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 border rounded h-100">
                            <h5 class="fw-bold mb-2">Gedung komersial dan pabrik</h5>
                            <p class="text-muted mb-0">
                                Untuk pekerjaan pemeliharaan berkala seperti pengecatan, pembersihan fasad,
                                dan perbaikan atap.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3">Diskusikan kebutuhan pembelian Anda</h5>
                        <p class="text-muted mb-3">
                            Kirimkan detail kebutuhan jumlah set, tinggi kerja, dan jenis pekerjaan yang akan dilakukan.
                        </p>
                        <a href="{{ route('contact') }}" class="btn btn-danger w-100 mb-3">
                            <i class="fas fa-file-signature me-2"></i>Minta penawaran pembelian
                        </a>
                        <p class="small text-muted mb-0">
                            Tim kami akan membantu menyesuaikan kombinasi komponen, estimasi biaya, dan jadwal pengiriman terbaik.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

