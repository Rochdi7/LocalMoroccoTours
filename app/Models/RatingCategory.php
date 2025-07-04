<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RatingCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'label',
        'icon',
        'description',
    ];

    public function reviewRatings()
    {
        return $this->hasMany(ReviewRating::class, 'rating_category_id');
    }

    public function reviews()
    {
        return $this->belongsToMany(Review::class, 'review_ratings')
            ->withPivot('score')
            ->withTimestamps();
    }
}
