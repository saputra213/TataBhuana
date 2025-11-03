<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Branch;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $branches = [
            [
                'name' => 'Kantor Pusat Jakarta',
                'code' => 'JKT',
                'description' => 'Kantor pusat Tata Bhuana Scaffolding yang melayani seluruh wilayah Jakarta dan sekitarnya. Dilengkapi dengan gudang penyimpanan scaffolding terbesar dan tim teknis berpengalaman.',
                'address' => 'Jl. Raya Industri No. 123, Kawasan Industri Cikarang, Bekasi 17530',
                'phone' => '+62 21 1234 5678',
                'email' => 'jakarta@tatabhuana.com',
                'manager_name' => 'Budi Santoso',
                'manager_phone' => '+62 812 3456 7890',
                'manager_email' => 'budi.santoso@tatabhuana.com',
                'latitude' => -6.194745,
                'longitude' => 106.819561,
                'operating_hours' => [
                    'senin' => '08:00 - 17:00',
                    'selasa' => '08:00 - 17:00',
                    'rabu' => '08:00 - 17:00',
                    'kamis' => '08:00 - 17:00',
                    'jumat' => '08:00 - 17:00',
                    'sabtu' => '08:00 - 15:00',
                    'minggu' => 'Tutup'
                ],
                'services' => [
                    'Sewa Scaffolding',
                    'Jual Scaffolding',
                    'Pengiriman & Instalasi',
                    'Konsultasi Teknis',
                    'Maintenance & Perawatan',
                    'Training & Sertifikasi'
                ],
                'is_main_branch' => true,
                'is_active' => true,
                'sort_order' => 1
            ],
            [
                'name' => 'Cabang Magelang',
                'code' => 'MGL',
                'description' => 'Cabang Magelang melayani wilayah Jawa Tengah dengan fokus pada proyek konstruksi dan renovasi. Tim lokal yang berpengalaman dalam proyek-proyek di Magelang dan sekitarnya.',
                'address' => 'Jl. Raya Payaman, Gembongan, Secang, Magelang',
                'phone' => '081392832658',
                'email' => 'magelang@tatabhuana.com',
                'manager_name' => 'Manager Magelang',
                'manager_phone' => '081392832658',
                'manager_email' => 'magelang@tatabhuana.com',
                'whatsapp_number' => '081392832658',
                'whatsapp_message' => 'Halo, saya tertarik dengan layanan scaffolding dari cabang Magelang',
                'latitude' => -7.3900,
                'longitude' => 110.2200,
                'maps_url' => 'https://maps.app.goo.gl/UyH5VVmcmgSAVpwR9?g_st=ac',
                'operating_hours' => [
                    'senin' => '08:00 - 17:00',
                    'selasa' => '08:00 - 17:00',
                    'rabu' => '08:00 - 17:00',
                    'kamis' => '08:00 - 17:00',
                    'jumat' => '08:00 - 17:00',
                    'sabtu' => '08:00 - 15:00',
                    'minggu' => 'Tutup'
                ],
                'services' => [
                    'Sewa Scaffolding',
                    'Jual Scaffolding',
                    'Pengiriman & Instalasi',
                    'Konsultasi Teknis',
                    'Maintenance & Perawatan'
                ],
                'is_main_branch' => false,
                'is_active' => true,
                'sort_order' => 2
            ],
            [
                'name' => 'Cabang Purwokerto',
                'code' => 'PWT',
                'description' => 'Cabang Purwokerto melayani wilayah Banyumas dan sekitarnya dengan fokus pada proyek konstruksi dan infrastruktur. Tim lokal yang berpengalaman dalam proyek-proyek di wilayah Jawa Tengah.',
                'address' => 'Jl. Menteri Supeno Karangkedawung, Sokaraja, Banyumas',
                'phone' => '082156457224',
                'email' => 'purwokerto@tatabhuana.com',
                'manager_name' => 'Manager Purwokerto',
                'manager_phone' => '082156457224',
                'manager_email' => 'purwokerto@tatabhuana.com',
                'whatsapp_number' => '082156457224',
                'whatsapp_message' => 'Halo, saya tertarik dengan layanan scaffolding dari cabang Purwokerto',
                'latitude' => -7.4229,
                'longitude' => 109.2353,
                'maps_url' => 'https://share.google/YONWfRXDrAGTVpEwa',
                'operating_hours' => [
                    'senin' => '08:00 - 17:00',
                    'selasa' => '08:00 - 17:00',
                    'rabu' => '08:00 - 17:00',
                    'kamis' => '08:00 - 17:00',
                    'jumat' => '08:00 - 17:00',
                    'sabtu' => '08:00 - 15:00',
                    'minggu' => 'Tutup'
                ],
                'services' => [
                    'Sewa Scaffolding',
                    'Jual Scaffolding',
                    'Pengiriman & Instalasi',
                    'Konsultasi Teknis',
                    'Maintenance & Perawatan'
                ],
                'is_main_branch' => false,
                'is_active' => true,
                'sort_order' => 3
            ],
            [
                'name' => 'Cabang Medan',
                'code' => 'MDN',
                'description' => 'Cabang Medan melayani wilayah Sumatera Utara dengan fokus pada proyek perkebunan dan industri. Tim yang berpengalaman dengan kondisi geografis Sumatera.',
                'address' => 'Jl. Gatot Subroto No. 321, Medan 20112',
                'phone' => '+62 61 1357 9246',
                'email' => 'medan@tatabhuana.com',
                'manager_name' => 'Rina Sari',
                'manager_phone' => '+62 815 6789 0123',
                'manager_email' => 'rina.sari@tatabhuana.com',
                'latitude' => 3.595196,
                'longitude' => 98.672222,
                'operating_hours' => [
                    'senin' => '08:00 - 17:00',
                    'selasa' => '08:00 - 17:00',
                    'rabu' => '08:00 - 17:00',
                    'kamis' => '08:00 - 17:00',
                    'jumat' => '08:00 - 17:00',
                    'sabtu' => '08:00 - 15:00',
                    'minggu' => 'Tutup'
                ],
                'services' => [
                    'Sewa Scaffolding',
                    'Jual Scaffolding',
                    'Pengiriman & Instalasi',
                    'Konsultasi Teknis',
                    'Maintenance & Perawatan'
                ],
                'is_main_branch' => false,
                'is_active' => true,
                'sort_order' => 4
            ],
            [
                'name' => 'Cabang Makassar',
                'code' => 'MKS',
                'description' => 'Cabang Makassar melayani wilayah Sulawesi Selatan dengan fokus pada proyek infrastruktur dan konstruksi. Tim yang memahami karakteristik proyek di Sulawesi.',
                'address' => 'Jl. Veteran Selatan No. 654, Makassar 90231',
                'phone' => '+62 411 2468 1357',
                'email' => 'makassar@tatabhuana.com',
                'manager_name' => 'Hasan Basri',
                'manager_phone' => '+62 816 7890 1234',
                'manager_email' => 'hasan.basri@tatabhuana.com',
                'latitude' => -5.147665,
                'longitude' => 119.432731,
                'operating_hours' => [
                    'senin' => '08:00 - 17:00',
                    'selasa' => '08:00 - 17:00',
                    'rabu' => '08:00 - 17:00',
                    'kamis' => '08:00 - 17:00',
                    'jumat' => '08:00 - 17:00',
                    'sabtu' => '08:00 - 15:00',
                    'minggu' => 'Tutup'
                ],
                'services' => [
                    'Sewa Scaffolding',
                    'Jual Scaffolding',
                    'Pengiriman & Instalasi',
                    'Konsultasi Teknis',
                    'Maintenance & Perawatan'
                ],
                'is_main_branch' => false,
                'is_active' => true,
                'sort_order' => 5
            ]
        ];

        foreach ($branches as $branch) {
            Branch::create($branch);
        }
    }
}





