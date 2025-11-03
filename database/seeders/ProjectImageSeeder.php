<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use Carbon\Carbon;

class ProjectImageSeeder extends Seeder
{
    public function run()
    {
        // Proyek Gereja Katolik Paroki Santo Yusup Gunung Kidul
        Project::create([
            'title' => 'Gereja Katolik Paroki Santo Yusup Gunung Kidul',
            'description' => 'Proyek scaffolding untuk renovasi dan konstruksi gereja Katolik Paroki Santo Yusup di Gunung Kidul. Proyek ini melibatkan pembangunan struktur scaffolding yang aman dan kokoh untuk mendukung pekerjaan konstruksi pada bangunan gereja yang memiliki arsitektur unik.',
            'client_name' => 'Paroki Santo Yusup Gunung Kidul',
            'location' => 'Gunung Kidul, Yogyakarta',
            'start_date' => Carbon::parse('2024-01-15'),
            'end_date' => Carbon::parse('2024-03-20'),
            'project_type' => 'konstruksi',
            'status' => 'completed',
            'images' => [
                'projects/gereja-katolik-paroki-santo-yusup-gunung-kidul/IMG_2952.HEIC',
                'projects/gereja-katolik-paroki-santo-yusup-gunung-kidul/IMG_2953.HEIC',
                'projects/gereja-katolik-paroki-santo-yusup-gunung-kidul/IMG_3003.HEIC',
                'projects/gereja-katolik-paroki-santo-yusup-gunung-kidul/IMG_3052.HEIC'
            ],
            'challenges' => 'Tantangan utama dalam proyek ini adalah kondisi tanah yang tidak rata dan kebutuhan akan struktur scaffolding yang dapat menahan beban berat untuk pekerjaan konstruksi gereja.',
            'solutions' => 'Kami menggunakan sistem scaffolding frame dengan material galvanized yang tahan korosi dan dapat disesuaikan dengan kontur tanah yang tidak rata.',
            'results' => 'Proyek berhasil diselesaikan tepat waktu dengan tingkat keamanan yang tinggi. Struktur scaffolding mampu menahan semua beban konstruksi dengan baik.',
            'is_featured' => true,
            'sort_order' => 1
        ]);

        // Proyek Fakultas Teknologi Pertanian UGM
        Project::create([
            'title' => 'Fakultas Teknologi Pertanian UGM',
            'description' => 'Proyek scaffolding untuk renovasi dan maintenance gedung Fakultas Teknologi Pertanian Universitas Gadjah Mada. Proyek ini melibatkan pemasangan scaffolding untuk pekerjaan pemeliharaan dan renovasi fasilitas kampus.',
            'client_name' => 'Universitas Gadjah Mada',
            'location' => 'Yogyakarta',
            'start_date' => Carbon::parse('2024-02-01'),
            'end_date' => Carbon::parse('2024-04-15'),
            'project_type' => 'renovasi',
            'status' => 'completed',
            'images' => [
                'projects/fakultas-teknologi-pertanian-ugm/IMG_2630.HEIC',
                'projects/fakultas-teknologi-pertanian-ugm/IMG_2681.HEIC',
                'projects/fakultas-teknologi-pertanian-ugm/IMG_2711.HEIC',
                'projects/fakultas-teknologi-pertanian-ugm/IMG_2712.HEIC',
                'projects/fakultas-teknologi-pertanian-ugm/IMG_2739.HEIC'
            ],
            'challenges' => 'Tantangan utama adalah bekerja di lingkungan kampus yang aktif dengan banyak aktivitas mahasiswa dan kebutuhan akan scaffolding yang tidak mengganggu kegiatan akademik.',
            'solutions' => 'Kami menggunakan scaffolding modular yang mudah dipasang dan dibongkar, serta mengatur jadwal kerja yang tidak mengganggu kegiatan akademik.',
            'results' => 'Proyek berhasil diselesaikan tanpa mengganggu kegiatan akademik dan memberikan hasil renovasi yang memuaskan.',
            'is_featured' => true,
            'sort_order' => 2
        ]);

        // Proyek TK ABA
        Project::create([
            'title' => 'TK ABA (Aisyiyah Bustanul Athfal)',
            'description' => 'Proyek scaffolding untuk pembangunan dan renovasi gedung TK ABA. Proyek ini melibatkan pemasangan scaffolding untuk mendukung konstruksi bangunan pendidikan anak usia dini yang aman dan nyaman.',
            'client_name' => 'TK ABA',
            'location' => 'Yogyakarta',
            'start_date' => Carbon::parse('2024-03-01'),
            'end_date' => Carbon::parse('2024-05-10'),
            'project_type' => 'konstruksi',
            'status' => 'completed',
            'images' => [
                'projects/tk-aba/IMG_3663.HEIC',
                'projects/tk-aba/IMG_3665.HEIC',
                'projects/tk-aba/IMG_3875.HEIC'
            ],
            'challenges' => 'Tantangan utama adalah memastikan keamanan scaffolding di lingkungan pendidikan anak-anak dan meminimalkan gangguan terhadap kegiatan belajar mengajar.',
            'solutions' => 'Kami menggunakan scaffolding dengan sistem pengaman tambahan dan mengatur zona kerja yang jelas untuk memastikan keamanan anak-anak.',
            'results' => 'Proyek berhasil diselesaikan dengan tingkat keamanan yang tinggi dan tidak mengganggu kegiatan pendidikan.',
            'is_featured' => false,
            'sort_order' => 3
        ]);
    }
}

