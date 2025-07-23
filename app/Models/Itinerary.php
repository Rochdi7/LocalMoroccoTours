<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itinerary extends Model
{
    use HasFactory;

    protected $fillable = [
        'tour_id',
        'day_number',
        'title',
        'content',
    ];

    /**
     * Relationship: Each itinerary belongs to one tour.
     */
    public function itineraryable()
{
    return $this->morphTo();
}

}
