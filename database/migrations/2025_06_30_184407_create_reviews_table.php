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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();

            
            $table->morphs('reviewable'); 

            $table->string('name');
            $table->string('email');
            $table->string('title')->nullable();
            $table->text('comment')->nullable();
            $table->decimal('rating', 2, 1)->default(5.0); // e.g. 4.5

            $table->json('images')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
