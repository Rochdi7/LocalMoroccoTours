<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewVotesTable extends Migration
{
    public function up()
    {
        Schema::create('review_votes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('review_id')->constrained()->onDelete('cascade');
            $table->string('ip_address', 45);
            $table->enum('vote_type', ['helpful', 'not_helpful']);
            $table->timestamps();

            $table->unique(['review_id', 'ip_address', 'vote_type']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('review_votes');
    }
}
