<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('company_profiles', function (Blueprint $table) {
            $table->text('footer_company_name')->nullable()->after('footer_copyright_text');
            $table->text('footer_company_description')->nullable()->after('footer_company_name');
            $table->text('footer_contact_title')->nullable()->after('footer_company_description');
            $table->text('footer_contact_address')->nullable()->after('footer_contact_title');
            $table->text('footer_contact_phone')->nullable()->after('footer_contact_address');
            $table->text('footer_contact_email')->nullable()->after('footer_contact_phone');
        });
    }

    public function down(): void
    {
        Schema::table('company_profiles', function (Blueprint $table) {
            $table->dropColumn([
                'footer_company_name',
                'footer_company_description',
                'footer_contact_title',
                'footer_contact_address',
                'footer_contact_phone',
                'footer_contact_email',
            ]);
        });
    }
};

