@extends('layouts.app')

@section('title', 'Persewaan Scaffolding - Tata Bhuana Scaffolding')
@section('description', 'Detail layanan persewaan scaffolding fleksibel untuk berbagai durasi dan skala proyek.')

@section('content')
<section class="services-hero text-white py-5" style="background:#16a34a; padding-top:120px; padding-bottom:80px; position:relative;">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-3 fw-bold mb-3">Persewaan Scaffolding</h1>
                <p class="lead mb-0">Pilihan ekonomis untuk proyek jangka pendek maupun menengah</p>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-white">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-8">
                <h2 class="fw-bold mb-3">Mengapa sewa scaffolding?</h2>
                <p class="text-muted">
                    Penyewaan scaffolding ideal untuk proyek dengan durasi terbatas atau kebutuhan yang tidak
                    terus-menerus, sehingga Anda tidak perlu memikirkan biaya penyimpanan dan perawatan jangka panjang.
                </p>

                <h3 class="fw-bold mt-4 mb-3">Benefit layanan sewa kami</h3>
                <ul class="list-unstyled mb-4">
                    <li class="d-flex mb-2">
                        <i class="fas fa-check text-success me-2 mt-1"></i>
                        <span>Pilihan paket harian, mingguan, hingga bulanan sesuai kebutuhan proyek.</span>
                    </li>
                    <li class="d-flex mb-2">
                        <i class="fas fa-check text-success me-2 mt-1"></i>
                        <span>Peralatan dicek secara berkala agar siap pakai dan aman saat digunakan.</span>
                    </li>
                    <li class="d-flex mb-2">
                        <i class="fas fa-check text-success me-2 mt-1"></i>
                        <span>Dukungan penyesuaian jumlah set jika ada perubahan kebutuhan di lapangan.</span>
                    </li>
                    <li class="d-flex mb-2">
                        <i class="fas fa-check text-success me-2 mt-1"></i>
                        <span>Opsi jasa pengiriman dan pengambilan kembali scaffolding setelah proyek selesai.</span>
                    </li>
                </ul>

                <h3 class="fw-bold mt-4 mb-3">Alur penyewaan singkat</h3>
                <ol class="list-group list-group-numbered mb-4">
                    <li class="list-group-item border-0 ps-0">
                        Kirimkan informasi lokasi proyek, durasi pekerjaan, dan estimasi tinggi kerja.
                    </li>
                    <li class="list-group-item border-0 ps-0">
                        Tim kami menghitung kebutuhan set scaffolding dan mengirimkan penawaran sewa.
                    </li>
                    <li class="list-group-item border-0 ps-0">
                        Setelah disetujui, kami siapkan jadwal pengiriman dan serah terima peralatan.
                    </li>
                </ol>
            </div>

            <div class="col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3">Hitung kebutuhan sewa Anda</h5>
                        <p class="text-muted mb-3">
                            Sampaikan durasi sewa, jenis pekerjaan, dan tinggi kerja agar kami bisa menghitung
                            kebutuhan set dengan tepat.
                        </p>
                        <a href="{{ route('contact') }}" class="btn btn-success w-100 mb-3">
                            <i class="fas fa-comments me-2"></i>Konsultasi sewa scaffolding
                        </a>
                        <p class="small text-muted mb-0">
                            Kami siap memberikan rekomendasi konfigurasi dan simulasi biaya sesuai kebutuhan proyek Anda.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

