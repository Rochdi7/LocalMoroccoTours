<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Trekking extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $table = 'trekking';

    protected $fillable = [
        'title',
        'slug',
        'overview',
        'highlights',
        'duration',
        'group_size',
        'age_range',
        'base_price',
        'difficulty_level',
        'max_altitude',
        'bestseller_flag',
        'free_cancellation_flag',
        'booked_count',
        'map_frame',
        'included',
        'excluded',
        'itinerary',
        'languages',
        'gallery',
        'category_id',
        'location_id',
    ];

    protected $casts = [
        'highlights' => 'array',
        'included' => 'array',
        'excluded' => 'array',
        'itinerary' => 'array',
        'gallery' => 'array',
        'languages' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(TrekkingCategory::class, 'category_id');
    }

    public function location()
    {
        return $this->belongsTo(\App\Models\Location::class, 'location_id');
    }

    public function reviews()
    {
        return $this->morphMany(\App\Models\Review::class, 'reviewable');
    }
    public function getLanguagesFormattedAttribute()
{
    $languages = $this->languages;

    if (is_array($languages) && count($languages) > 0) {
        return implode(', ', $languages);
    }

    return 'English'; // default if empty
}

}
