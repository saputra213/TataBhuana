<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CompanyProfile;

class CompanyProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CompanyProfile::create([
            'company_name' => 'Tata Bhuana Scaffolding',
            'description' => 'Perusahaan penyedia jasa sewa dan jual scaffolding berkualitas tinggi dengan standar keamanan internasional untuk mendukung kesuksesan proyek konstruksi Anda.',
            'address' => 'Yogyakarta',
            'phone' => '0813-2500-8867',
            'email' => 'tatabhuana@gmail.com',
            'website' => 'https://www.tatabhuana.com',
            'about_us' => 'Tata Bhuana Scaffolding adalah perusahaan yang telah berpengalaman dalam menyediakan jasa sewa dan jual scaffolding berkualitas tinggi. Dengan komitmen untuk memberikan layanan terbaik, kami telah dipercaya oleh berbagai klien untuk mendukung proyek konstruksi mereka.

Tim kami terdiri dari profesional berpengalaman yang memahami kebutuhan industri konstruksi. Kami selalu mengutamakan keamanan, kualitas, dan kepuasan pelanggan dalam setiap layanan yang kami berikan.

Kami menyediakan berbagai jenis scaffolding yang memenuhi standar keamanan internasional, mulai dari frame scaffolding, tube scaffolding, system scaffolding, hingga mobile scaffolding. Semua produk kami telah teruji kualitas dan keamanannya.',
            'services' => '• Sewa Scaffolding - Layanan sewa scaffolding dengan berbagai jenis dan ukuran untuk kebutuhan proyek jangka pendek maupun panjang
• Jual Scaffolding - Penjualan scaffolding berkualitas tinggi dengan harga kompetitif dan garansi kualitas terjamin
• Pengiriman & Instalasi - Layanan pengiriman cepat dan instalasi profesional untuk memastikan scaffolding terpasang dengan benar
• Konsultasi & Support - Tim ahli kami siap memberikan konsultasi dan dukungan teknis untuk kebutuhan proyek Anda
• Maintenance & Perawatan - Layanan perawatan dan maintenance scaffolding untuk memastikan performa optimal
• Training & Sertifikasi - Pelatihan penggunaan scaffolding yang aman sesuai standar keselamatan kerja',
            'social_media' => [
                'facebook' => null,
                'instagram' => 'https://www.instagram.com/tatabhuana?igsh=M2ZicjhxZzBpcnd3',
                'whatsapp' => '6281325008867'
            ]
        ]);
    }
}





