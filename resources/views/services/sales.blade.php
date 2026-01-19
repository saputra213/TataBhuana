@extends('layouts.app')

@section('title', 'Penjualan Scaffolding - Tata Bhuana Scaffolding')
@section('description', 'Detail layanan penjualan scaffolding berkualitas tinggi lengkap dengan spesifikasi, benefit, dan skenario penggunaan.')

@section('content')
@php
    $heroTitle = $profile?->service_sales_hero_title ?? 'Penjualan Scaffolding';
    $heroSubtitle = $profile?->service_sales_hero_subtitle ?? 'Solusi kepemilikan scaffolding jangka panjang yang aman dan ekonomis';
    $introTitle = $profile?->service_sales_intro_title ?? 'Untuk siapa layanan penjualan ini?';
    $introText = $profile?->service_sales_intro_text ?? 'Layanan penjualan scaffolding cocok untuk kontraktor, developer, dan perusahaan yang rutin melakukan pekerjaan konstruksi, renovasi, maupun pemeliharaan gedung sehingga lebih efisien jika memiliki scaffolding sendiri.';
    $sectionTitle = $profile?->service_sales_section_title ?? 'Keunggulan membeli scaffolding di ' . ($profile->company_name ?? 'Tata Bhuana Scaffolding');
    $sectionBulletsRaw = $profile?->service_sales_section_bullets;
    $sectionBullets = $sectionBulletsRaw ? preg_split('/\r\n|\r|\n/', $sectionBulletsRaw) : [
        'Bahan berkualitas dengan standar keamanan kerja yang telah teruji di lapangan.',
        'Pilihan tipe dan konfigurasi sesuai kebutuhan tinggi kerja dan beban proyek.',
        'Penawaran harga paket untuk pembelian dalam jumlah besar.',
        'Panduan teknis dasar cara perakitan dan perawatan scaffolding.',
    ];
    $extraTitle = $profile?->service_sales_extra_title ?? 'Contoh skenario penggunaan';
    $extra1Title = $profile?->service_sales_extra_1_title ?? 'Perusahaan kontraktor';
    $extra1Text = $profile?->service_sales_extra_1_text ?? 'Untuk proyek berulang di banyak lokasi sehingga biaya sewa jangka panjang bisa dikonversi menjadi aset perusahaan.';
    $extra2Title = $profile?->service_sales_extra_2_title ?? 'Gedung komersial dan pabrik';
    $extra2Text = $profile?->service_sales_extra_2_text ?? 'Untuk pekerjaan pemeliharaan berkala seperti pengecatan, pembersihan fasad, dan perbaikan atap.';
    $sideTitle = $profile?->service_sales_side_title ?? 'Diskusikan kebutuhan pembelian Anda';
    $sideText = $profile?->service_sales_side_text ?? 'Kirimkan detail kebutuhan jumlah set, tinggi kerja, dan jenis pekerjaan yang akan dilakukan.';
    $sideButtonText = $profile?->service_sales_side_button_text ?? 'Minta penawaran pembelian';
    $sideFooterText = $profile?->service_sales_side_footer_text ?? 'Tim kami akan membantu menyesuaikan kombinasi komponen, estimasi biaya, dan jadwal pengiriman terbaik.';
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
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="p-3 border rounded h-100">
                            <h5 class="fw-bold mb-2">{{ $extra1Title }}</h5>
                            <p class="text-muted mb-0">
                                {{ $extra1Text }}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 border rounded h-100">
                            <h5 class="fw-bold mb-2">{{ $extra2Title }}</h5>
                            <p class="text-muted mb-0">
                                {{ $extra2Text }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3">{{ $sideTitle }}</h5>
                        <p class="text-muted mb-3">
                            {{ $sideText }}
                        </p>
                        <a href="{{ route('contact') }}" class="btn btn-danger w-100 mb-3">
                            <i class="fas fa-file-signature me-2"></i>{{ $sideButtonText }}
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
