<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('company_profiles', function (Blueprint $table) {
            if (!Schema::hasColumn('company_profiles', 'service_sales_hero_title')) {
                $table->text('service_sales_hero_title')->nullable();
            }
            if (!Schema::hasColumn('company_profiles', 'service_sales_hero_subtitle')) {
                $table->text('service_sales_hero_subtitle')->nullable();
            }
            if (!Schema::hasColumn('company_profiles', 'service_sales_intro_title')) {
                $table->text('service_sales_intro_title')->nullable();
            }
            if (!Schema::hasColumn('company_profiles', 'service_sales_intro_text')) {
                $table->text('service_sales_intro_text')->nullable();
            }
            if (!Schema::hasColumn('company_profiles', 'service_sales_section_title')) {
                $table->text('service_sales_section_title')->nullable();
            }
            if (!Schema::hasColumn('company_profiles', 'service_sales_section_bullets')) {
                $table->text('service_sales_section_bullets')->nullable();
            }
            if (!Schema::hasColumn('company_profiles', 'service_sales_extra_title')) {
                $table->text('service_sales_extra_title')->nullable();
            }
            if (!Schema::hasColumn('company_profiles', 'service_sales_extra_1_title')) {
                $table->text('service_sales_extra_1_title')->nullable();
            }
            if (!Schema::hasColumn('company_profiles', 'service_sales_extra_1_text')) {
                $table->text('service_sales_extra_1_text')->nullable();
            }
            if (!Schema::hasColumn('company_profiles', 'service_sales_extra_2_title')) {
                $table->text('service_sales_extra_2_title')->nullable();
            }
            if (!Schema::hasColumn('company_profiles', 'service_sales_extra_2_text')) {
                $table->text('service_sales_extra_2_text')->nullable();
            }
            if (!Schema::hasColumn('company_profiles', 'service_sales_side_title')) {
                $table->text('service_sales_side_title')->nullable();
            }
            if (!Schema::hasColumn('company_profiles', 'service_sales_side_text')) {
                $table->text('service_sales_side_text')->nullable();
            }
            if (!Schema::hasColumn('company_profiles', 'service_sales_side_button_text')) {
                $table->text('service_sales_side_button_text')->nullable();
            }
            if (!Schema::hasColumn('company_profiles', 'service_sales_side_footer_text')) {
                $table->text('service_sales_side_footer_text')->nullable();
            }

            if (!Schema::hasColumn('company_profiles', 'service_rental_hero_title')) {
                $table->text('service_rental_hero_title')->nullable();
            }
            if (!Schema::hasColumn('company_profiles', 'service_rental_hero_subtitle')) {
                $table->text('service_rental_hero_subtitle')->nullable();
            }
            if (!Schema::hasColumn('company_profiles', 'service_rental_intro_title')) {
                $table->text('service_rental_intro_title')->nullable();
            }
            if (!Schema::hasColumn('company_profiles', 'service_rental_intro_text')) {
                $table->text('service_rental_intro_text')->nullable();
            }
            if (!Schema::hasColumn('company_profiles', 'service_rental_section_title')) {
                $table->text('service_rental_section_title')->nullable();
            }
            if (!Schema::hasColumn('company_profiles', 'service_rental_section_bullets')) {
                $table->text('service_rental_section_bullets')->nullable();
            }
            if (!Schema::hasColumn('company_profiles', 'service_rental_extra_title')) {
                $table->text('service_rental_extra_title')->nullable();
            }
            if (!Schema::hasColumn('company_profiles', 'service_rental_extra_1_title')) {
                $table->text('service_rental_extra_1_title')->nullable();
            }
            if (!Schema::hasColumn('company_profiles', 'service_rental_extra_1_text')) {
                $table->text('service_rental_extra_1_text')->nullable();
            }
            if (!Schema::hasColumn('company_profiles', 'service_rental_extra_2_title')) {
                $table->text('service_rental_extra_2_title')->nullable();
            }
            if (!Schema::hasColumn('company_profiles', 'service_rental_extra_2_text')) {
                $table->text('service_rental_extra_2_text')->nullable();
            }
            if (!Schema::hasColumn('company_profiles', 'service_rental_side_title')) {
                $table->text('service_rental_side_title')->nullable();
            }
            if (!Schema::hasColumn('company_profiles', 'service_rental_side_text')) {
                $table->text('service_rental_side_text')->nullable();
            }
            if (!Schema::hasColumn('company_profiles', 'service_rental_side_button_text')) {
                $table->text('service_rental_side_button_text')->nullable();
            }
            if (!Schema::hasColumn('company_profiles', 'service_rental_side_footer_text')) {
                $table->text('service_rental_side_footer_text')->nullable();
            }

            if (!Schema::hasColumn('company_profiles', 'service_delivery_hero_title')) {
                $table->text('service_delivery_hero_title')->nullable();
            }
            if (!Schema::hasColumn('company_profiles', 'service_delivery_hero_subtitle')) {
                $table->text('service_delivery_hero_subtitle')->nullable();
            }
            if (!Schema::hasColumn('company_profiles', 'service_delivery_intro_title')) {
                $table->text('service_delivery_intro_title')->nullable();
            }
            if (!Schema::hasColumn('company_profiles', 'service_delivery_intro_text')) {
                $table->text('service_delivery_intro_text')->nullable();
            }
            if (!Schema::hasColumn('company_profiles', 'service_delivery_section_title')) {
                $table->text('service_delivery_section_title')->nullable();
            }
            if (!Schema::hasColumn('company_profiles', 'service_delivery_section_bullets')) {
                $table->text('service_delivery_section_bullets')->nullable();
            }
            if (!Schema::hasColumn('company_profiles', 'service_delivery_extra_title')) {
                $table->text('service_delivery_extra_title')->nullable();
            }
            if (!Schema::hasColumn('company_profiles', 'service_delivery_extra_1_title')) {
                $table->text('service_delivery_extra_1_title')->nullable();
            }
            if (!Schema::hasColumn('company_profiles', 'service_delivery_extra_1_text')) {
                $table->text('service_delivery_extra_1_text')->nullable();
            }
            if (!Schema::hasColumn('company_profiles', 'service_delivery_extra_2_title')) {
                $table->text('service_delivery_extra_2_title')->nullable();
            }
            if (!Schema::hasColumn('company_profiles', 'service_delivery_extra_2_text')) {
                $table->text('service_delivery_extra_2_text')->nullable();
            }
            if (!Schema::hasColumn('company_profiles', 'service_delivery_side_title')) {
                $table->text('service_delivery_side_title')->nullable();
            }
            if (!Schema::hasColumn('company_profiles', 'service_delivery_side_text')) {
                $table->text('service_delivery_side_text')->nullable();
            }
            if (!Schema::hasColumn('company_profiles', 'service_delivery_side_button_text')) {
                $table->text('service_delivery_side_button_text')->nullable();
            }
            if (!Schema::hasColumn('company_profiles', 'service_delivery_side_footer_text')) {
                $table->text('service_delivery_side_footer_text')->nullable();
            }

            if (!Schema::hasColumn('company_profiles', 'service_consultation_hero_title')) {
                $table->text('service_consultation_hero_title')->nullable();
            }
            if (!Schema::hasColumn('company_profiles', 'service_consultation_hero_subtitle')) {
                $table->text('service_consultation_hero_subtitle')->nullable();
            }
            if (!Schema::hasColumn('company_profiles', 'service_consultation_intro_title')) {
                $table->text('service_consultation_intro_title')->nullable();
            }
            if (!Schema::hasColumn('company_profiles', 'service_consultation_intro_text')) {
                $table->text('service_consultation_intro_text')->nullable();
            }
            if (!Schema::hasColumn('company_profiles', 'service_consultation_section_title')) {
                $table->text('service_consultation_section_title')->nullable();
            }
            if (!Schema::hasColumn('company_profiles', 'service_consultation_section_bullets')) {
                $table->text('service_consultation_section_bullets')->nullable();
            }
            if (!Schema::hasColumn('company_profiles', 'service_consultation_extra_title')) {
                $table->text('service_consultation_extra_title')->nullable();
            }
            if (!Schema::hasColumn('company_profiles', 'service_consultation_extra_1_title')) {
                $table->text('service_consultation_extra_1_title')->nullable();
            }
            if (!Schema::hasColumn('company_profiles', 'service_consultation_extra_1_text')) {
                $table->text('service_consultation_extra_1_text')->nullable();
            }
            if (!Schema::hasColumn('company_profiles', 'service_consultation_extra_2_title')) {
                $table->text('service_consultation_extra_2_title')->nullable();
            }
            if (!Schema::hasColumn('company_profiles', 'service_consultation_extra_2_text')) {
                $table->text('service_consultation_extra_2_text')->nullable();
            }
            if (!Schema::hasColumn('company_profiles', 'service_consultation_side_title')) {
                $table->text('service_consultation_side_title')->nullable();
            }
            if (!Schema::hasColumn('company_profiles', 'service_consultation_side_text')) {
                $table->text('service_consultation_side_text')->nullable();
            }
            if (!Schema::hasColumn('company_profiles', 'service_consultation_side_button_text')) {
                $table->text('service_consultation_side_button_text')->nullable();
            }
            if (!Schema::hasColumn('company_profiles', 'service_consultation_side_footer_text')) {
                $table->text('service_consultation_side_footer_text')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('company_profiles', function (Blueprint $table) {
            $columns = [
                'service_sales_hero_title',
                'service_sales_hero_subtitle',
                'service_sales_intro_title',
                'service_sales_intro_text',
                'service_sales_section_title',
                'service_sales_section_bullets',
                'service_sales_extra_title',
                'service_sales_extra_1_title',
                'service_sales_extra_1_text',
                'service_sales_extra_2_title',
                'service_sales_extra_2_text',
                'service_sales_side_title',
                'service_sales_side_text',
                'service_sales_side_button_text',
                'service_sales_side_footer_text',
                'service_rental_hero_title',
                'service_rental_hero_subtitle',
                'service_rental_intro_title',
                'service_rental_intro_text',
                'service_rental_section_title',
                'service_rental_section_bullets',
                'service_rental_extra_title',
                'service_rental_extra_1_title',
                'service_rental_extra_1_text',
                'service_rental_extra_2_title',
                'service_rental_extra_2_text',
                'service_rental_side_title',
                'service_rental_side_text',
                'service_rental_side_button_text',
                'service_rental_side_footer_text',
                'service_delivery_hero_title',
                'service_delivery_hero_subtitle',
                'service_delivery_intro_title',
                'service_delivery_intro_text',
                'service_delivery_section_title',
                'service_delivery_section_bullets',
                'service_delivery_extra_title',
                'service_delivery_extra_1_title',
                'service_delivery_extra_1_text',
                'service_delivery_extra_2_title',
                'service_delivery_extra_2_text',
                'service_delivery_side_title',
                'service_delivery_side_text',
                'service_delivery_side_button_text',
                'service_delivery_side_footer_text',
                'service_consultation_hero_title',
                'service_consultation_hero_subtitle',
                'service_consultation_intro_title',
                'service_consultation_intro_text',
                'service_consultation_section_title',
                'service_consultation_section_bullets',
                'service_consultation_extra_title',
                'service_consultation_extra_1_title',
                'service_consultation_extra_1_text',
                'service_consultation_extra_2_title',
                'service_consultation_extra_2_text',
                'service_consultation_side_title',
                'service_consultation_side_text',
                'service_consultation_side_button_text',
                'service_consultation_side_footer_text',
            ];

            foreach ($columns as $column) {
                if (Schema::hasColumn('company_profiles', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
