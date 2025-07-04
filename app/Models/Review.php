<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'reviewable_type',
        'reviewable_id',
        'name',
        'email',
        'title',
        'comment',
        'images',
        'rating',
    ];

    protected $casts = [
        'images' => 'array',
        'rating' => 'decimal:1', // ensures consistent decimal formatting
    ];

    /**
     * Polymorphic relation to the reviewable model (e.g. Tour, Product).
     */
    public function reviewable()
    {
        return $this->morphTo();
    }

    /**
     * One review has many individual category ratings.
     */
    public function ratings()
    {
        return $this->hasMany(ReviewRating::class, 'review_id');
    }

    /**
     * Many-to-many relationship to rating categories via review_ratings pivot.
     */
    public function ratingCategories()
    {
        return $this->belongsToMany(RatingCategory::class, 'review_ratings')
            ->withPivot('score')
            ->withTimestamps();
    }

    /**
     * Accessor: Get a formatted date for the review.
     */
    public function getFormattedDateAttribute()
    {
        return $this->created_at ? $this->created_at->format('F Y') : null;
    }

    /**
     * Accessor: Get avatar URL for the reviewer.
     * You can later replace this logic with user avatars from database.
     */
    public function getAvatarUrlAttribute()
    {
        return asset('img/reviews/avatars/1.png');
    }
}
