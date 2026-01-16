<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('company_profiles', function (Blueprint $table) {
            $table->string('about_hero_title')->nullable();
            $table->string('about_hero_subtitle')->nullable();
            $table->text('about_main_text')->nullable();
            $table->string('about_stat_cities')->nullable();
            $table->string('about_stat_experience')->nullable();
            $table->string('about_stat_projects')->nullable();
            $table->string('about_feature_1')->nullable();
            $table->string('about_feature_2')->nullable();
            $table->string('about_feature_3')->nullable();
            $table->string('about_service_1_title')->nullable();
            $table->text('about_service_1_description')->nullable();
            $table->string('about_service_2_title')->nullable();
            $table->text('about_service_2_description')->nullable();
            $table->string('about_service_3_title')->nullable();
            $table->text('about_service_3_description')->nullable();
            $table->string('about_service_4_title')->nullable();
            $table->text('about_service_4_description')->nullable();
            $table->string('about_vision_title')->nullable();
            $table->text('about_vision_text')->nullable();
            $table->string('about_mission_title')->nullable();
            $table->text('about_mission_text')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('company_profiles', function (Blueprint $table) {
            $table->dropColumn([
                'about_hero_title',
                'about_hero_subtitle',
                'about_main_text',
                'about_stat_cities',
                'about_stat_experience',
                'about_stat_projects',
                'about_feature_1',
                'about_feature_2',
                'about_feature_3',
                'about_service_1_title',
                'about_service_1_description',
                'about_service_2_title',
                'about_service_2_description',
                'about_service_3_title',
                'about_service_3_description',
                'about_service_4_title',
                'about_service_4_description',
                'about_vision_title',
                'about_vision_text',
                'about_mission_title',
                'about_mission_text',
            ]);
        });
    }
};

