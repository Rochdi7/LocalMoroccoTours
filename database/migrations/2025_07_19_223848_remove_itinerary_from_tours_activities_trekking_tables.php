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
        Schema::table('tours', function (Blueprint $table) {
            $table->dropColumn('itinerary');
        });

        Schema::table('activities', function (Blueprint $table) {
            $table->dropColumn('itinerary');
        });

        Schema::table('trekking', function (Blueprint $table) {
            $table->dropColumn('itinerary');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tours', function (Blueprint $table) {
            $table->json('itinerary')->nullable();
        });

        Schema::table('activities', function (Blueprint $table) {
            $table->json('itinerary')->nullable();
        });

        Schema::table('trekking', function (Blueprint $table) {
            $table->json('itinerary')->nullable();
        });
    }
};
