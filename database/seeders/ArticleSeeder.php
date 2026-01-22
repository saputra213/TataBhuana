<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Dummy data generation disabled for production
        // $dummyImages = [
        //     'https://images.pexels.com/photos/2219024/pexels-photo-2219024.jpeg?auto=compress&cs=tinysrgb&w=900',
        //     'https://images.pexels.com/photos/585419/pexels-photo-585419.jpeg?auto=compress&cs=tinysrgb&w=900',
        //     'https://images.pexels.com/photos/1108101/pexels-photo-1108101.jpeg?auto=compress&cs=tinysrgb&w=900',
        //     'https://images.pexels.com/photos/2219025/pexels-photo-2219025.jpeg?auto=compress&cs=tinysrgb&w=900',
        //     'https://images.pexels.com/photos/544965/pexels-photo-544965.jpeg?auto=compress&cs=tinysrgb&w=900',
        // ];

        // for ($i = 1; $i <= 20; $i++) {
        //     $title = 'Artikel Dummy ' . $i;
        //     $image = $dummyImages[array_rand($dummyImages)];

        //     Article::create([
        //         'title' => $title,
        //         'slug' => Str::slug($title) . '-' . uniqid(),
        //         'excerpt' => 'Ini adalah artikel dummy ke ' . $i . ' untuk pengujian tampilan dan pagination.',
        //         'content' => 'Konten lengkap artikel dummy ke ' . $i . ' untuk pengujian tampilan daftar artikel, detail artikel, dan pagination di website Tata Bhuana Scaffolding.',
        //         'image' => $image,
        //         'is_published' => true,
        //         'published_at' => now(),
        //     ]);
        // }
    }
}
