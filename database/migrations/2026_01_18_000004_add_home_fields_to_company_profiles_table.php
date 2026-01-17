<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('company_profiles', function (Blueprint $table) {
            $table->string('home_highlight_kicker')->nullable();
            $table->string('home_highlight_title')->nullable();
            $table->string('home_highlight_1_label')->nullable();
            $table->string('home_highlight_1_title')->nullable();
            $table->text('home_highlight_1_text')->nullable();
            $table->string('home_highlight_2_label')->nullable();
            $table->string('home_highlight_2_title')->nullable();
            $table->text('home_highlight_2_text')->nullable();
            $table->string('home_highlight_3_label')->nullable();
            $table->string('home_highlight_3_title')->nullable();
            $table->text('home_highlight_3_text')->nullable();
            $table->string('home_services_heading_title')->nullable();
            $table->string('home_services_heading_subtitle')->nullable();
            $table->string('home_services_1_title')->nullable();
            $table->string('home_services_2_title')->nullable();
            $table->string('home_services_3_title')->nullable();
            $table->string('home_services_4_title')->nullable();
            $table->string('home_features_heading_title')->nullable();
            $table->string('home_features_heading_subtitle')->nullable();
            $table->string('home_features_1_title')->nullable();
            $table->string('home_features_2_title')->nullable();
            $table->string('home_features_3_title')->nullable();
            $table->string('home_features_4_title')->nullable();
            $table->string('home_features_5_title')->nullable();
            $table->string('home_features_6_title')->nullable();
            $table->string('home_articles_heading_title')->nullable();
            $table->string('home_articles_heading_subtitle')->nullable();
            $table->string('home_projects_heading_title')->nullable();
            $table->string('home_cta_title')->nullable();
            $table->string('home_cta_subtitle')->nullable();
            $table->string('home_cta_button_text')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('company_profiles', function (Blueprint $table) {
            $table->dropColumn([
                'home_highlight_kicker',
                'home_highlight_title',
                'home_highlight_1_label',
                'home_highlight_1_title',
                'home_highlight_1_text',
                'home_highlight_2_label',
                'home_highlight_2_title',
                'home_highlight_2_text',
                'home_highlight_3_label',
                'home_highlight_3_title',
                'home_highlight_3_text',
                'home_services_heading_title',
                'home_services_heading_subtitle',
                'home_services_1_title',
                'home_services_2_title',
                'home_services_3_title',
                'home_services_4_title',
                'home_features_heading_title',
                'home_features_heading_subtitle',
                'home_features_1_title',
                'home_features_2_title',
                'home_features_3_title',
                'home_features_4_title',
                'home_features_5_title',
                'home_features_6_title',
                'home_articles_heading_title',
                'home_articles_heading_subtitle',
                'home_projects_heading_title',
                'home_cta_title',
                'home_cta_subtitle',
                'home_cta_button_text',
            ]);
        });
    }
};

