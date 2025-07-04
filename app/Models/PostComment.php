<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    protected $fillable = [
        'post_id', 'user_id', 'parent_id', 'guest_name', 'guest_email',
        'comment_title', 'comment_body', 'is_approved'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    public function replies()
    {
        return $this->hasMany(PostComment::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(PostComment::class, 'parent_id');
    }
}
