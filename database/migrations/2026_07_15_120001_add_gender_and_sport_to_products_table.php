<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('gender')->default('Unisex')->after('category');
            $table->string('sport')->default('Pádel')->after('gender');
            $table->index('category');
            $table->index('gender');
            $table->index('sport');
        });

        Schema::table('product_variants', function (Blueprint $table) {
            $table->index('color');
            $table->index('size');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropIndex(['category']);
            $table->dropIndex(['gender']);
            $table->dropIndex(['sport']);
            $table->dropColumn(['gender', 'sport']);
        });

        Schema::table('product_variants', function (Blueprint $table) {
            $table->dropIndex(['color']);
            $table->dropIndex(['size']);
        });
    }
};
