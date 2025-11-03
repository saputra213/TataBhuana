<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Scaffolding;

class ScaffoldingImageSeeder extends Seeder
{
    public function run()
    {
        // Produk Scaffolding berdasarkan katalog yang ada
        Scaffolding::create([
            'name' => 'Siku',
            'description' => 'Siku scaffolding dengan sudut 90 derajat untuk konstruksi yang membutuhkan struktur sudut yang kuat dan stabil.',
            'type' => 'frame',
            'material' => 'galvanized',
            'rental_price' => 15000,
            'sale_price' => 250000,
            'dimensions' => '2m x 2m',
            'max_height' => 20,
            'max_load' => 200,
            'image' => 'scaffoldings/Siku.jpeg',
            'is_available' => true,
            'stock_quantity' => 50,
            'specifications' => 'Material: Galvanized Steel, Ketebalan: 2mm, Berat: 15kg'
        ]);

        Scaffolding::create([
            'name' => 'Balok Suri',
            'description' => 'Balok suri scaffolding untuk struktur horizontal yang kuat dan tahan lama.',
            'type' => 'frame',
            'material' => 'steel',
            'rental_price' => 12000,
            'sale_price' => 200000,
            'dimensions' => '2m x 1.5m',
            'max_height' => 15,
            'max_load' => 150,
            'image' => 'scaffoldings/Balok Suri.jpeg',
            'is_available' => true,
            'stock_quantity' => 30,
            'specifications' => 'Material: Steel, Ketebalan: 2.5mm, Berat: 12kg'
        ]);

        Scaffolding::create([
            'name' => 'Cat Walk',
            'description' => 'Cat walk scaffolding untuk akses horizontal yang aman dan nyaman.',
            'type' => 'system',
            'material' => 'galvanized',
            'rental_price' => 18000,
            'sale_price' => 300000,
            'dimensions' => '2.5m x 0.8m',
            'max_height' => 25,
            'max_load' => 250,
            'image' => 'scaffoldings/Cat Walk.jpeg',
            'is_available' => true,
            'stock_quantity' => 25,
            'specifications' => 'Material: Galvanized Steel, Ketebalan: 3mm, Berat: 18kg'
        ]);

        Scaffolding::create([
            'name' => 'Kawel Siku',
            'description' => 'Kawel siku untuk penguatan struktur sudut dengan sistem pengunci yang kuat.',
            'type' => 'frame',
            'material' => 'steel',
            'rental_price' => 10000,
            'sale_price' => 180000,
            'dimensions' => '1.5m x 1.5m',
            'max_height' => 12,
            'max_load' => 120,
            'image' => 'scaffoldings/Kawel Siku.jpeg',
            'is_available' => true,
            'stock_quantity' => 40,
            'specifications' => 'Material: Steel, Ketebalan: 2mm, Berat: 10kg'
        ]);

        Scaffolding::create([
            'name' => 'Ladder Frame',
            'description' => 'Ladder frame scaffolding untuk akses vertikal yang aman dan efisien.',
            'type' => 'frame',
            'material' => 'galvanized',
            'rental_price' => 20000,
            'sale_price' => 350000,
            'dimensions' => '2m x 0.6m',
            'max_height' => 30,
            'max_load' => 300,
            'image' => 'scaffoldings/Ladder Frame.jpeg',
            'is_available' => true,
            'stock_quantity' => 20,
            'specifications' => 'Material: Galvanized Steel, Ketebalan: 3.5mm, Berat: 22kg'
        ]);

        Scaffolding::create([
            'name' => 'Sabuk Kolom',
            'description' => 'Sabuk kolom untuk penguatan struktur vertikal dengan sistem pengikat yang kuat.',
            'type' => 'system',
            'material' => 'steel',
            'rental_price' => 8000,
            'sale_price' => 150000,
            'dimensions' => '1m x 0.5m',
            'max_height' => 10,
            'max_load' => 100,
            'image' => 'scaffoldings/Sabuk Kolom.jpeg',
            'is_available' => true,
            'stock_quantity' => 60,
            'specifications' => 'Material: Steel, Ketebalan: 2mm, Berat: 8kg'
        ]);

        Scaffolding::create([
            'name' => 'Main Frame',
            'description' => 'Main frame scaffolding sebagai struktur utama dengan kekuatan maksimal.',
            'type' => 'frame',
            'material' => 'galvanized',
            'rental_price' => 25000,
            'sale_price' => 400000,
            'dimensions' => '2m x 2m',
            'max_height' => 40,
            'max_load' => 400,
            'image' => 'scaffoldings/Main Frame.jpeg',
            'is_available' => true,
            'stock_quantity' => 15,
            'specifications' => 'Material: Galvanized Steel, Ketebalan: 4mm, Berat: 28kg'
        ]);

        Scaffolding::create([
            'name' => 'Kawel Balok',
            'description' => 'Kawel balok untuk penguatan struktur horizontal dengan sistem pengunci yang aman.',
            'type' => 'frame',
            'material' => 'steel',
            'rental_price' => 11000,
            'sale_price' => 190000,
            'dimensions' => '2m x 1m',
            'max_height' => 15,
            'max_load' => 150,
            'image' => 'scaffoldings/Kawel Balok.jpeg',
            'is_available' => true,
            'stock_quantity' => 35,
            'specifications' => 'Material: Steel, Ketebalan: 2.5mm, Berat: 11kg'
        ]);

        Scaffolding::create([
            'name' => 'Tangga',
            'description' => 'Tangga scaffolding untuk akses vertikal yang aman dan nyaman.',
            'type' => 'system',
            'material' => 'galvanized',
            'rental_price' => 14000,
            'sale_price' => 220000,
            'dimensions' => '2m x 0.5m',
            'max_height' => 20,
            'max_load' => 200,
            'image' => 'scaffoldings/Tangga.jpeg',
            'is_available' => true,
            'stock_quantity' => 30,
            'specifications' => 'Material: Galvanized Steel, Ketebalan: 2.5mm, Berat: 14kg'
        ]);

        Scaffolding::create([
            'name' => 'Pipa Support',
            'description' => 'Pipa support untuk struktur pendukung dengan fleksibilitas tinggi.',
            'type' => 'tube',
            'material' => 'steel',
            'rental_price' => 6000,
            'sale_price' => 120000,
            'dimensions' => '3m x 0.1m',
            'max_height' => 25,
            'max_load' => 150,
            'image' => 'scaffoldings/Pipa Support.jpeg',
            'is_available' => true,
            'stock_quantity' => 80,
            'specifications' => 'Material: Steel Pipe, Diameter: 48mm, Ketebalan: 2mm, Berat: 6kg'
        ]);

        Scaffolding::create([
            'name' => 'Cross Brace',
            'description' => 'Cross brace untuk penguatan diagonal dengan sistem pengunci yang kuat.',
            'type' => 'system',
            'material' => 'galvanized',
            'rental_price' => 7000,
            'sale_price' => 130000,
            'dimensions' => '2.5m x 0.05m',
            'max_height' => 20,
            'max_load' => 100,
            'image' => 'scaffoldings/Cross Brace.jpeg',
            'is_available' => true,
            'stock_quantity' => 70,
            'specifications' => 'Material: Galvanized Steel, Ketebalan: 2mm, Berat: 7kg'
        ]);
    }
}

