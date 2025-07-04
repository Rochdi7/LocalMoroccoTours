<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReviewVote extends Model
{
    protected $fillable = ['review_id', 'ip_address', 'vote_type'];
}
