<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('review_ratings', function (Blueprint $table) {
            $table->id();

            $table->foreignId('review_id')->constrained('reviews')->onDelete('cascade');
            $table->foreignId('rating_category_id')->constrained('rating_categories')->onDelete('cascade');
            
            $table->decimal('score', 3, 1);
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('review_ratings');
    }
};
