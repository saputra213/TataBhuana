@extends('layouts.app')

@section('title', 'Pengiriman Scaffolding - Tata Bhuana Scaffolding')
@section('description', 'Detail layanan pengiriman scaffolding yang rapi, aman, dan tepat waktu ke lokasi proyek Anda.')

@section('content')
<section class="services-hero text-white py-5" style="background:#dc2626; padding-top:120px; padding-bottom:80px; position:relative;">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-3 fw-bold mb-3">Pengiriman Scaffolding</h1>
                <p class="lead mb-0">Peralatan datang tepat waktu sehingga jadwal proyek Anda tetap terjaga</p>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-white">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-8">
                <h2 class="fw-bold mb-3">Area dan pola layanan pengiriman</h2>
                <p class="text-muted">
                    Kami melayani pengiriman scaffolding dari basis operasional kami ke berbagai wilayah sekitar
                    dengan jadwal yang disesuaikan dengan kebutuhan proyek. Pengiriman dilakukan dengan armada yang
                    layak jalan dan penataan muatan yang aman.
                </p>

                <h3 class="fw-bold mt-4 mb-3">Apa saja yang kami perhatikan saat pengiriman?</h3>
                <ul class="list-unstyled mb-4">
                    <li class="d-flex mb-2">
                        <i class="fas fa-check text-success me-2 mt-1"></i>
                        <span>Perencanaan jadwal berangkat dan estimasi tiba agar sinkron dengan jadwal kerja di lapangan.</span>
                    </li>
                    <li class="d-flex mb-2">
                        <i class="fas fa-check text-success me-2 mt-1"></i>
                        <span>Pengecekan ulang jumlah komponen sebelum berangkat dan setelah tiba di lokasi.</span>
                    </li>
                    <li class="d-flex mb-2">
                        <i class="fas fa-check text-success me-2 mt-1"></i>
                        <span>Koordinasi titik bongkar muatan agar tidak mengganggu aktivitas di sekitar proyek.</span>
                    </li>
                    <li class="d-flex mb-2">
                        <i class="fas fa-check text-success me-2 mt-1"></i>
                        <span>Dokumentasi serah terima peralatan bersama perwakilan dari pihak Anda.</span>
                    </li>
                </ul>

                <h3 class="fw-bold mt-4 mb-3">Informasi yang kami perlukan</h3>
                <p class="text-muted mb-0">
                    Saat berkonsultasi, mohon siapkan alamat lengkap lokasi proyek, akses jalan menuju lokasi,
                    jam kerja yang diizinkan untuk bongkar muatan, serta kontak PIC di lapangan.
                </p>
            </div>

            <div class="col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3">Atur jadwal pengiriman</h5>
                        <p class="text-muted mb-3">
                            Sampaikan rencana waktu mulai pekerjaan dan estimasi kebutuhan peralatan agar kami bisa
                            menyiapkan jadwal pengiriman yang paling ideal.
                        </p>
                        <a href="{{ route('contact') }}" class="btn btn-danger w-100 mb-3">
                            <i class="fas fa-truck me-2"></i>Konsultasi pengiriman
                        </a>
                        <p class="small text-muted mb-0">
                            Kami akan membantu menyusun estimasi waktu pengiriman dan penjemputan kembali jika Anda menggunakan skema sewa.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

