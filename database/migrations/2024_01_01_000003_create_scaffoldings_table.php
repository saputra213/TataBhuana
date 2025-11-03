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
        Schema::create('scaffoldings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('type'); // frame, tube, system, etc
            $table->string('material'); // steel, aluminum, etc
            $table->decimal('rental_price', 10, 2);
            $table->decimal('sale_price', 10, 2)->nullable();
            $table->string('dimensions');
            $table->integer('max_height');
            $table->integer('max_load');
            $table->string('image')->nullable();
            $table->boolean('is_available')->default(true);
            $table->integer('stock_quantity')->default(0);
            $table->text('specifications')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scaffoldings');
    }
};

