@extends('layouts.app')

@section('title', 'Persewaan Scaffolding - Tata Bhuana Scaffolding')
@section('description', 'Detail layanan persewaan scaffolding fleksibel untuk berbagai durasi dan skala proyek.')

@section('content')
@php
    $heroTitle = $profile?->service_rental_hero_title ?? 'Persewaan Scaffolding';
    $heroSubtitle = $profile?->service_rental_hero_subtitle ?? 'Pilihan ekonomis untuk proyek jangka pendek maupun menengah';
    $introTitle = $profile?->service_rental_intro_title ?? 'Mengapa sewa scaffolding?';
    $introText = $profile?->service_rental_intro_text ?? 'Penyewaan scaffolding ideal untuk proyek dengan durasi terbatas atau kebutuhan yang tidak terus-menerus, sehingga Anda tidak perlu memikirkan biaya penyimpanan dan perawatan jangka panjang.';
    $sectionTitle = $profile?->service_rental_section_title ?? 'Benefit layanan sewa kami';
    $sectionBulletsRaw = $profile?->service_rental_section_bullets;
    $sectionBullets = $sectionBulletsRaw ? preg_split('/\r\n|\r|\n/', $sectionBulletsRaw) : [
        'Pilihan paket harian, mingguan, hingga bulanan sesuai kebutuhan proyek.',
        'Peralatan dicek secara berkala agar siap pakai dan aman saat digunakan.',
        'Dukungan penyesuaian jumlah set jika ada perubahan kebutuhan di lapangan.',
        'Opsi jasa pengiriman dan pengambilan kembali scaffolding setelah proyek selesai.',
    ];
    $extraTitle = $profile?->service_rental_extra_title ?? 'Alur penyewaan singkat';
    $step1Text = $profile?->service_rental_extra_1_text ?? 'Kirimkan informasi lokasi proyek, durasi pekerjaan, dan estimasi tinggi kerja.';
    $step2Text = $profile?->service_rental_extra_2_text ?? 'Tim kami menghitung kebutuhan set scaffolding dan mengirimkan penawaran sewa.';
    $step3Text = 'Setelah disetujui, kami siapkan jadwal pengiriman dan serah terima peralatan.';
    $sideTitle = $profile?->service_rental_side_title ?? 'Hitung kebutuhan sewa Anda';
    $sideText = $profile?->service_rental_side_text ?? 'Sampaikan durasi sewa, jenis pekerjaan, dan tinggi kerja agar kami bisa menghitung kebutuhan set dengan tepat.';
    $sideButtonText = $profile?->service_rental_side_button_text ?? 'Konsultasi sewa scaffolding';
    $sideFooterText = $profile?->service_rental_side_footer_text ?? 'Kami siap memberikan rekomendasi konfigurasi dan simulasi biaya sesuai kebutuhan proyek Anda.';
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
                <ol class="list-group list-group-numbered mb-4">
                    <li class="list-group-item border-0 ps-0">
                        {{ $step1Text }}
                    </li>
                    <li class="list-group-item border-0 ps-0">
                        {{ $step2Text }}
                    </li>
                    <li class="list-group-item border-0 ps-0">
                        {{ $step3Text }}
                    </li>
                </ol>
            </div>

            <div class="col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3">{{ $sideTitle }}</h5>
                        <p class="text-muted mb-3">
                            {{ $sideText }}
                        </p>
                        <a href="{{ route('contact') }}" class="btn btn-success w-100 mb-3">
                            <i class="fas fa-comments me-2"></i>{{ $sideButtonText }}
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
