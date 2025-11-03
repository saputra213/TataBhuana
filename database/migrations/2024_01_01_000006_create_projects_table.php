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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('client_name');
            $table->string('location');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->string('project_type'); // konstruksi, renovasi, maintenance, etc
            $table->string('status'); // completed, ongoing, planning
            $table->json('images'); // array of image paths
            $table->text('challenges')->nullable();
            $table->text('solutions')->nullable();
            $table->text('results')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};





