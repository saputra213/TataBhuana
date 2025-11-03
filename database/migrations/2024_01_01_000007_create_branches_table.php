<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code'); // kode cabang seperti JKT, BDG, SBY
            $table->text('description');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->string('manager_name');
            $table->string('manager_phone');
            $table->string('manager_email');
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->string('image')->nullable();
            $table->json('operating_hours')->nullable(); // jam operasional
            $table->json('services')->nullable(); // layanan yang tersedia di cabang
            $table->boolean('is_main_branch')->default(false);
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
};





