<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin 1
        Admin::create([
            'name' => 'Marketing Admin',
            'email' => 'mkt.tatabhuana@gmail.com',
            'password' => Hash::make('Mainframe17'),
            'role' => 'super_admin',
            'is_active' => true,
        ]);

        // Admin 2
        Admin::create([
            'name' => 'Gamers Baik Admin',
            'email' => 'gamersbaik@gmail.com',
            'password' => Hash::make('Mainframe171'),
            'role' => 'super_admin',
            'is_active' => true,
        ]);
    }
}





