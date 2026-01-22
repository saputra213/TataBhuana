<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('company_profiles', function (Blueprint $table) {
            $table->longText('service_sales_content')->nullable();
            $table->longText('service_rental_content')->nullable();
            $table->longText('service_delivery_content')->nullable();
            $table->longText('service_consultation_content')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('company_profiles', function (Blueprint $table) {
            $table->dropColumn([
                'service_sales_content',
                'service_rental_content',
                'service_delivery_content',
                'service_consultation_content',
            ]);
        });
    }
};

