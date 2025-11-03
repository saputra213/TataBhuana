<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Konstruksi Gedung Perkantoran 20 Lantai',
                'description' => 'Proyek konstruksi gedung perkantoran modern dengan 20 lantai di kawasan bisnis Jakarta. Menggunakan system scaffolding untuk pekerjaan eksterior dan interior.',
                'client_name' => 'PT. Bangun Jaya Konstruksi',
                'location' => 'Jakarta Selatan',
                'start_date' => '2023-01-15',
                'end_date' => '2023-08-30',
                'project_type' => 'konstruksi',
                'status' => 'completed',
                'images' => [],
                'challenges' => 'Tantangan utama dalam proyek ini adalah kondisi cuaca yang tidak menentu dan keterbatasan ruang di lokasi konstruksi. Selain itu, pekerjaan harus dilakukan tanpa mengganggu aktivitas perkantoran di sekitar lokasi.',
                'solutions' => 'Kami menggunakan system scaffolding yang dapat disesuaikan dengan kondisi cuaca dan ruang terbatas. Tim kami bekerja dengan sistem shift 24 jam untuk memastikan proyek selesai tepat waktu.',
                'results' => 'Proyek berhasil diselesaikan 2 minggu lebih cepat dari jadwal yang direncanakan. Tidak ada kecelakaan kerja selama proyek berlangsung dan klien sangat puas dengan kualitas pekerjaan.',
                'is_featured' => true,
                'sort_order' => 1
            ],
            [
                'title' => 'Renovasi Mall Tua di Bandung',
                'description' => 'Proyek renovasi total mall tua di Bandung dengan menggunakan frame scaffolding untuk pekerjaan eksterior dan fasad bangunan.',
                'client_name' => 'PT. Mall Bandung Raya',
                'location' => 'Bandung',
                'start_date' => '2023-03-01',
                'end_date' => '2023-10-15',
                'project_type' => 'renovasi',
                'status' => 'completed',
                'images' => [],
                'challenges' => 'Mall masih beroperasi selama renovasi, sehingga perlu koordinasi yang ketat dengan manajemen mall untuk meminimalkan gangguan terhadap pengunjung.',
                'solutions' => 'Kami menggunakan frame scaffolding dengan sistem modular yang dapat dipasang dan dibongkar dengan cepat. Pekerjaan dilakukan pada malam hari dan hari libur untuk mengurangi gangguan.',
                'results' => 'Renovasi berhasil meningkatkan nilai estetika mall dan meningkatkan jumlah pengunjung sebesar 40%. Proyek selesai sesuai jadwal tanpa mengganggu operasional mall.',
                'is_featured' => true,
                'sort_order' => 2
            ],
            [
                'title' => 'Maintenance Jembatan Layang',
                'description' => 'Proyek maintenance dan perbaikan jembatan layang menggunakan mobile scaffolding untuk akses ke area yang sulit dijangkau.',
                'client_name' => 'Dinas Pekerjaan Umum Jakarta',
                'location' => 'Jakarta Utara',
                'start_date' => '2023-05-10',
                'end_date' => '2023-07-20',
                'project_type' => 'maintenance',
                'status' => 'completed',
                'images' => [],
                'challenges' => 'Pekerjaan dilakukan di atas jalan raya yang ramai, sehingga perlu koordinasi dengan kepolisian untuk pengaturan lalu lintas.',
                'solutions' => 'Kami menggunakan mobile scaffolding yang dapat dipindahkan dengan cepat dan sistem pengaman yang ketat untuk melindungi pekerja dan pengguna jalan.',
                'results' => 'Maintenance berhasil memperpanjang umur jembatan dan meningkatkan keamanan pengguna jalan. Tidak ada gangguan lalu lintas yang signifikan selama proyek.',
                'is_featured' => false,
                'sort_order' => 3
            ],
            [
                'title' => 'Event Pameran Konstruksi',
                'description' => 'Penyediaan scaffolding untuk event pameran konstruksi dengan berbagai jenis scaffolding sesuai kebutuhan booth dan display.',
                'client_name' => 'PT. Event Organizer Indonesia',
                'location' => 'Jakarta Convention Center',
                'start_date' => '2023-09-01',
                'end_date' => '2023-09-05',
                'project_type' => 'event',
                'status' => 'completed',
                'images' => [],
                'challenges' => 'Event berlangsung dalam waktu singkat dengan setup yang kompleks dan berbagai jenis scaffolding yang dibutuhkan.',
                'solutions' => 'Kami menyediakan berbagai jenis scaffolding dan tim instalasi yang berpengalaman untuk memastikan setup cepat dan aman.',
                'results' => 'Event berjalan lancar dengan setup scaffolding yang sempurna. Klien puas dengan layanan dan akan menggunakan jasa kami untuk event selanjutnya.',
                'is_featured' => false,
                'sort_order' => 4
            ],
            [
                'title' => 'Konstruksi Pabrik Kimia',
                'description' => 'Proyek konstruksi pabrik kimia dengan scaffolding khusus yang tahan terhadap bahan kimia dan kondisi lingkungan yang ekstrem.',
                'client_name' => 'PT. Kimia Industri Nusantara',
                'location' => 'Cilegon, Banten',
                'start_date' => '2023-06-01',
                'end_date' => '2024-02-28',
                'project_type' => 'konstruksi',
                'status' => 'ongoing',
                'images' => [],
                'challenges' => 'Lingkungan pabrik kimia memerlukan scaffolding dengan material khusus yang tahan korosi dan bahan kimia.',
                'solutions' => 'Kami menggunakan scaffolding galvanized dengan coating khusus dan sistem keamanan yang ketat sesuai standar industri kimia.',
                'results' => 'Proyek berjalan sesuai rencana dengan tingkat keamanan yang tinggi. Tidak ada insiden keamanan selama proyek berlangsung.',
                'is_featured' => true,
                'sort_order' => 5
            ]
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}





