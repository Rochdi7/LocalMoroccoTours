<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('tours', function (Blueprint $table) {
            $table->decimal('base_price', 10, 2)->nullable()->change();
        });

        Schema::table('activities', function (Blueprint $table) {
            $table->decimal('base_price', 10, 2)->nullable()->change();
        });

        Schema::table('trekking', function (Blueprint $table) {
            $table->decimal('base_price', 10, 2)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tours', function (Blueprint $table) {
            $table->decimal('base_price', 10, 2)->nullable(false)->change();
        });

        Schema::table('activities', function (Blueprint $table) {
            $table->decimal('base_price', 10, 2)->nullable(false)->change();
        });

        Schema::table('trekking', function (Blueprint $table) {
            $table->decimal('base_price', 10, 2)->nullable(false)->change();
        });
    }
};
