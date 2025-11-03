<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Scaffolding;

class ScaffoldingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $scaffoldings = [
            [
                'name' => 'Frame Scaffolding 1.2m x 1.8m',
                'description' => 'Frame scaffolding dengan dimensi 1.2m x 1.8m, cocok untuk proyek konstruksi bangunan rendah hingga menengah. Terbuat dari material baja berkualitas tinggi dengan sistem penguncian yang aman.',
                'type' => 'frame',
                'material' => 'steel',
                'rental_price' => 50000,
                'sale_price' => 2500000,
                'dimensions' => '1.2m x 1.8m',
                'max_height' => 20,
                'max_load' => 200,
                'stock_quantity' => 50,
                'is_available' => true,
                'specifications' => '• Material: Baja Galvanized\n• Sistem Penguncian: Wedge Lock\n• Kapasitas Beban: 200kg per level\n• Tinggi Maksimal: 20 meter\n• Standar: SNI 7391:2008\n• Garansi: 1 tahun'
            ],
            [
                'name' => 'Tube Scaffolding 1.5m x 2.0m',
                'description' => 'Tube scaffolding dengan dimensi 1.5m x 2.0m, ideal untuk proyek konstruksi yang membutuhkan fleksibilitas tinggi. Mudah dirakit dan disesuaikan dengan kebutuhan proyek.',
                'type' => 'tube',
                'material' => 'galvanized',
                'rental_price' => 75000,
                'sale_price' => 3500000,
                'dimensions' => '1.5m x 2.0m',
                'max_height' => 30,
                'max_load' => 300,
                'stock_quantity' => 30,
                'is_available' => true,
                'specifications' => '• Material: Baja Galvanized\n• Diameter Tube: 48.3mm\n• Ketebalan: 3.2mm\n• Kapasitas Beban: 300kg per level\n• Tinggi Maksimal: 30 meter\n• Standar: EN 12811-1\n• Garansi: 2 tahun'
            ],
            [
                'name' => 'System Scaffolding Ringlock',
                'description' => 'System scaffolding dengan sistem ringlock yang memberikan stabilitas tinggi dan kemudahan perakitan. Cocok untuk proyek konstruksi skala besar dan kompleks.',
                'type' => 'system',
                'material' => 'steel',
                'rental_price' => 100000,
                'sale_price' => 5000000,
                'dimensions' => '2.0m x 2.0m',
                'max_height' => 50,
                'max_load' => 500,
                'stock_quantity' => 20,
                'is_available' => true,
                'specifications' => '• Material: Baja High Tensile\n• Sistem: Ringlock\n• Kapasitas Beban: 500kg per level\n• Tinggi Maksimal: 50 meter\n• Standar: EN 12811-1\n• Garansi: 3 tahun'
            ],
            [
                'name' => 'Mobile Scaffolding 1.0m x 1.5m',
                'description' => 'Mobile scaffolding dengan roda yang dapat dipindah-pindah dengan mudah. Sangat cocok untuk pekerjaan maintenance, painting, dan pekerjaan yang membutuhkan mobilitas tinggi.',
                'type' => 'mobile',
                'material' => 'aluminum',
                'rental_price' => 40000,
                'sale_price' => 1800000,
                'dimensions' => '1.0m x 1.5m',
                'max_height' => 8,
                'max_load' => 150,
                'stock_quantity' => 25,
                'is_available' => true,
                'specifications' => '• Material: Aluminium Alloy\n• Roda: 4 buah dengan rem\n• Kapasitas Beban: 150kg per level\n• Tinggi Maksimal: 8 meter\n• Berat: 45kg\n• Garansi: 1 tahun'
            ],
            [
                'name' => 'Frame Scaffolding 0.9m x 1.2m',
                'description' => 'Frame scaffolding dengan dimensi lebih kecil, cocok untuk proyek konstruksi bangunan kecil atau pekerjaan maintenance. Praktis dan mudah digunakan.',
                'type' => 'frame',
                'material' => 'steel',
                'rental_price' => 35000,
                'sale_price' => 1800000,
                'dimensions' => '0.9m x 1.2m',
                'max_height' => 15,
                'max_load' => 150,
                'stock_quantity' => 40,
                'is_available' => true,
                'specifications' => '• Material: Baja Galvanized\n• Sistem Penguncian: Wedge Lock\n• Kapasitas Beban: 150kg per level\n• Tinggi Maksimal: 15 meter\n• Standar: SNI 7391:2008\n• Garansi: 1 tahun'
            ],
            [
                'name' => 'Tube Scaffolding 1.8m x 2.4m',
                'description' => 'Tube scaffolding dengan dimensi besar untuk proyek konstruksi yang membutuhkan area kerja yang luas. Sangat stabil dan aman untuk pekerjaan di ketinggian.',
                'type' => 'tube',
                'material' => 'galvanized',
                'rental_price' => 90000,
                'sale_price' => 4200000,
                'dimensions' => '1.8m x 2.4m',
                'max_height' => 35,
                'max_load' => 400,
                'stock_quantity' => 15,
                'is_available' => true,
                'specifications' => '• Material: Baja Galvanized\n• Diameter Tube: 48.3mm\n• Ketebalan: 3.5mm\n• Kapasitas Beban: 400kg per level\n• Tinggi Maksimal: 35 meter\n• Standar: EN 12811-1\n• Garansi: 2 tahun'
            ]
        ];

        foreach ($scaffoldings as $scaffolding) {
            Scaffolding::create($scaffolding);
        }
    }
}





