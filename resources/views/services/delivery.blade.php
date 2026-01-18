@extends('layouts.app')

@section('title', 'Pengiriman Scaffolding - Tata Bhuana Scaffolding')
@section('description', 'Detail layanan pengiriman scaffolding yang rapi, aman, dan tepat waktu ke lokasi proyek Anda.')

@section('content')
@php
    $heroTitle = $profile?->service_delivery_hero_title ?? 'Pengiriman Scaffolding';
    $heroSubtitle = $profile?->service_delivery_hero_subtitle ?? 'Peralatan datang tepat waktu sehingga jadwal proyek Anda tetap terjaga';
    $introTitle = $profile?->service_delivery_intro_title ?? 'Area dan pola layanan pengiriman';
    $introText = $profile?->service_delivery_intro_text ?? 'Kami melayani pengiriman scaffolding dari basis operasional kami ke berbagai wilayah sekitar dengan jadwal yang disesuaikan dengan kebutuhan proyek. Pengiriman dilakukan dengan armada yang layak jalan dan penataan muatan yang aman.';
    $sectionTitle = $profile?->service_delivery_section_title ?? 'Apa saja yang kami perhatikan saat pengiriman?';
    $sectionBulletsRaw = $profile?->service_delivery_section_bullets;
    $sectionBullets = $sectionBulletsRaw ? preg_split('/\r\n|\r|\n/', $sectionBulletsRaw) : [
        'Perencanaan jadwal berangkat dan estimasi tiba agar sinkron dengan jadwal kerja di lapangan.',
        'Pengecekan ulang jumlah komponen sebelum berangkat dan setelah tiba di lokasi.',
        'Koordinasi titik bongkar muatan agar tidak mengganggu aktivitas di sekitar proyek.',
        'Dokumentasi serah terima peralatan bersama perwakilan dari pihak Anda.',
    ];
    $extraTitle = $profile?->service_delivery_extra_title ?? 'Informasi yang kami perlukan';
    $extraText = $profile?->service_delivery_extra_1_text ?? 'Saat berkonsultasi, mohon siapkan alamat lengkap lokasi proyek, akses jalan menuju lokasi, jam kerja yang diizinkan untuk bongkar muatan, serta kontak PIC di lapangan.';
    $sideTitle = $profile?->service_delivery_side_title ?? 'Atur jadwal pengiriman';
    $sideText = $profile?->service_delivery_side_text ?? 'Sampaikan rencana waktu mulai pekerjaan dan estimasi kebutuhan peralatan agar kami bisa menyiapkan jadwal pengiriman yang paling ideal.';
    $sideButtonText = $profile?->service_delivery_side_button_text ?? 'Konsultasi pengiriman';
    $sideFooterText = $profile?->service_delivery_side_footer_text ?? 'Kami akan membantu menyusun estimasi waktu pengiriman dan penjemputan kembali jika Anda menggunakan skema sewa.';
@endphp

<section class="services-hero text-white py-5" style="background:#dc2626; padding-top:120px; padding-bottom:80px; position:relative;">
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
                        <a href="{{ route('contact') }}" class="btn btn-danger w-100 mb-3">
                            <i class="fas fa-truck me-2"></i>{{ $sideButtonText }}
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
