<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReviewRating extends Model
{
    protected $fillable = [
        'review_id',
        'rating_category_id',
        'score',
    ];

    public function review()
    {
        return $this->belongsTo(Review::class);
    }

    public function ratingCategory()
    {
        return $this->belongsTo(RatingCategory::class, 'rating_category_id');
    }
}
