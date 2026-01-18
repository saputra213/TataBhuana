@extends('layouts.app')

@section('title', 'Konsultasi Proyek & Scaffolding - Tata Bhuana Scaffolding')
@section('description', 'Detail layanan konsultasi untuk membantu merencanakan kebutuhan scaffolding dan keselamatan kerja di proyek Anda.')

@section('content')
<section class="services-hero text-white py-5" style="background:#16a34a; padding-top:120px; padding-bottom:80px; position:relative;">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-3 fw-bold mb-3">Konsultasi Proyek & Scaffolding</h1>
                <p class="lead mb-0">Diskusi teknis sebelum Anda menentukan skema sewa atau beli</p>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-white">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-8">
                <h2 class="fw-bold mb-3">Apa yang dibahas dalam sesi konsultasi?</h2>
                <p class="text-muted">
                    Layanan konsultasi dirancang untuk membantu Anda memahami kebutuhan scaffolding secara
                    menyeluruh, baik dari sisi keamanan, efisiensi biaya, maupun kemudahan operasional di lapangan.
                </p>

                <h3 class="fw-bold mt-4 mb-3">Topik yang biasanya kami bahas</h3>
                <ul class="list-unstyled mb-4">
                    <li class="d-flex mb-2">
                        <i class="fas fa-check text-success me-2 mt-1"></i>
                        <span>Jenis scaffolding yang paling sesuai dengan karakter pekerjaan.</span>
                    </li>
                    <li class="d-flex mb-2">
                        <i class="fas fa-check text-success me-2 mt-1"></i>
                        <span>Perkiraan jumlah set dan konfigurasi yang dibutuhkan.</span>
                    </li>
                    <li class="d-flex mb-2">
                        <i class="fas fa-check text-success me-2 mt-1"></i>
                        <span>Perbandingan skema sewa vs beli berdasarkan durasi dan frekuensi penggunaan.</span>
                    </li>
                    <li class="d-flex mb-2">
                        <i class="fas fa-check text-success me-2 mt-1"></i>
                        <span>Hal-hal penting terkait akses lokasi, keselamatan kerja, dan area penyimpanan.</span>
                    </li>
                </ul>

                <h3 class="fw-bold mt-4 mb-3">Data yang sebaiknya Anda siapkan</h3>
                <p class="text-muted mb-0">
                    Agar sesi konsultasi lebih efektif, siapkan informasi mengenai jenis pekerjaan, tinggi kerja,
                    luas area, jadwal pelaksanaan, serta dokumentasi foto atau gambar kerja bila tersedia.
                </p>
            </div>

            <div class="col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3">Mulai sesi konsultasi</h5>
                        <p class="text-muted mb-3">
                            Hubungi kami melalui formulir kontak untuk menjadwalkan sesi konsultasi singkat seputar
                            kebutuhan scaffolding di proyek Anda.
                        </p>
                        <a href="{{ route('contact') }}" class="btn btn-success w-100 mb-3">
                            <i class="fas fa-headset me-2"></i>Ajukan konsultasi sekarang
                        </a>
                        <p class="small text-muted mb-0">
                            Kami akan menghubungi Anda kembali melalui nomor telepon atau email yang tercantum
                            dengan rangkuman kebutuhan dan rekomendasi awal.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

