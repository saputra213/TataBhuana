@extends('layouts.app')

@section('title', 'Konsultasi Proyek & Scaffolding - Tata Bhuana Scaffolding')
@section('description', 'Detail layanan konsultasi untuk membantu merencanakan kebutuhan scaffolding dan keselamatan kerja di proyek Anda.')

@section('content')
@php
    $heroTitle = $profile?->service_consultation_hero_title ?? 'Konsultasi Proyek & Scaffolding';
    $heroSubtitle = $profile?->service_consultation_hero_subtitle ?? 'Diskusi teknis sebelum Anda menentukan skema sewa atau beli';
    $introTitle = $profile?->service_consultation_intro_title ?? 'Apa yang dibahas dalam sesi konsultasi?';
    $introText = $profile?->service_consultation_intro_text ?? 'Layanan konsultasi dirancang untuk membantu Anda memahami kebutuhan scaffolding secara menyeluruh, baik dari sisi keamanan, efisiensi biaya, maupun kemudahan operasional di lapangan.';
    $sectionTitle = $profile?->service_consultation_section_title ?? 'Topik yang biasanya kami bahas';
    $sectionBulletsRaw = $profile?->service_consultation_section_bullets;
    $sectionBullets = $sectionBulletsRaw ? preg_split('/\r\n|\r|\n/', $sectionBulletsRaw) : [
        'Jenis scaffolding yang paling sesuai dengan karakter pekerjaan.',
        'Perkiraan jumlah set dan konfigurasi yang dibutuhkan.',
        'Perbandingan skema sewa vs beli berdasarkan durasi dan frekuensi penggunaan.',
        'Hal-hal penting terkait akses lokasi, keselamatan kerja, dan area penyimpanan.',
    ];
    $extraTitle = $profile?->service_consultation_extra_title ?? 'Data yang sebaiknya Anda siapkan';
    $extraText = $profile?->service_consultation_extra_1_text ?? 'Agar sesi konsultasi lebih efektif, siapkan informasi mengenai jenis pekerjaan, tinggi kerja, luas area, jadwal pelaksanaan, serta dokumentasi foto atau gambar kerja bila tersedia.';
    $sideTitle = $profile?->service_consultation_side_title ?? 'Mulai sesi konsultasi';
    $sideText = $profile?->service_consultation_side_text ?? 'Hubungi kami melalui formulir kontak untuk menjadwalkan sesi konsultasi singkat seputar kebutuhan scaffolding di proyek Anda.';
    $sideButtonText = $profile?->service_consultation_side_button_text ?? 'Ajukan konsultasi sekarang';
    $sideFooterText = $profile?->service_consultation_side_footer_text ?? 'Kami akan menghubungi Anda kembali melalui nomor telepon atau email yang tercantum dengan rangkuman kebutuhan dan rekomendasi awal.';
@endphp

<section class="services-hero text-white py-5" style="background:#16a34a; padding-top:120px; padding-bottom:80px; position:relative;">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-3 fw-bold mb-3">{{ $heroTitle }}</h1>
                <p class="lead mb-0">{{ $heroSubtitle }}</p>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-white">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-8">
                <h2 class="fw-bold mb-3">{{ $introTitle }}</h2>
                <p class="text-muted">
                    {{ $introText }}
                </p>

                <h3 class="fw-bold mt-4 mb-3">{{ $sectionTitle }}</h3>
                <ul class="list-unstyled mb-4">
                    @foreach($sectionBullets as $bullet)
                        @php $bulletTrimmed = trim($bullet); @endphp
                        @if($bulletTrimmed !== '')
                            <li class="d-flex mb-2">
                                <i class="fas fa-check text-success me-2 mt-1"></i>
                                <span>{{ $bulletTrimmed }}</span>
                            </li>
                        @endif
                    @endforeach
                </ul>

                <h3 class="fw-bold mt-4 mb-3">{{ $extraTitle }}</h3>
                <p class="text-muted mb-0">
                    {{ $extraText }}
                </p>
            </div>

            <div class="col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3">{{ $sideTitle }}</h5>
                        <p class="text-muted mb-3">
                            {{ $sideText }}
                        </p>
                        <a href="{{ route('contact') }}" class="btn btn-success w-100 mb-3">
                            <i class="fas fa-headset me-2"></i>{{ $sideButtonText }}
                        </a>
                        <p class="small text-muted mb-0">
                            {{ $sideFooterText }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
