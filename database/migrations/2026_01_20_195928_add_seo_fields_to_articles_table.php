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
        Schema::table('articles', function (Blueprint $table) {
            if (!Schema::hasColumn('articles', 'author')) {
                $table->string('author')->nullable()->after('id');
            }
            if (!Schema::hasColumn('articles', 'category')) {
                $table->string('category')->nullable()->after('author');
            }
            if (!Schema::hasColumn('articles', 'keywords')) {
                $table->string('keywords')->nullable()->after('excerpt');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            if (Schema::hasColumn('articles', 'author')) {
                $table->dropColumn('author');
            }
            if (Schema::hasColumn('articles', 'category')) {
                $table->dropColumn('category');
            }
            if (Schema::hasColumn('articles', 'keywords')) {
                $table->dropColumn('keywords');
            }
        });
    }
};
