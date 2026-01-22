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
        Schema::table('company_profiles', function (Blueprint $table) {
            $table->text('footer_services_title')->nullable()->after('social_media');
            $table->json('footer_services_items')->nullable()->after('footer_services_title');
            $table->text('footer_copyright_text')->nullable()->after('footer_services_items');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('company_profiles', function (Blueprint $table) {
            $table->dropColumn([
                'footer_services_title',
                'footer_services_items',
                'footer_copyright_text',
            ]);
        });
    }
};
