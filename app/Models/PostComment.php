<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    protected $fillable = [
        'post_id',
        'user_id',
        'parent_id',
        'guest_name',
        'guest_email',
        'comment_title',
        'comment_body',
        'rating',
        'images',
        'helpful_count',
        'not_helpful_count',
        'is_approved',
    ];

    protected $casts = [
        'images' => 'array',
    ];

    public function ratings()
    {
        return $this->hasMany(PostCommentRating::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
