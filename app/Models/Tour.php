<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Tour extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'title',
        'slug',
        'overview',
        'highlights',
        'duration',
        'group_size',
        'age_range',
        'base_price',
        'bestseller_flag',
        'free_cancellation_flag',
        'booked_count',
        'map_frame',
        'category_id',
        'location_id',
        'gallery',
        'included',
        'excluded',
        'itinerary',
        'languages',
    ];

    protected $casts = [
        'gallery' => 'array',
        'included' => 'array',
        'excluded' => 'array',
        'itinerary' => 'array',
        'languages' => 'array',
    ];

    
    // Ensure highlights always returns an array
    public function getHighlightsArrayAttribute()
    {
        $val = $this->highlights;

        if (is_null($val)) return [];

        if (is_array($val)) return $val;

        $decoded = json_decode($val, true);
        if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
            return $decoded;
        }

        return array_filter(
            preg_split('/\r\n|\r|\n/', $val),
            fn($line) => trim($line) !== ''
        );
    }


    public function getLanguagesFormattedAttribute()
    {
        $lang = $this->languages;
        if (is_array($lang) && count($lang) > 0) {
            return implode(', ', $lang);
        }
        return 'English';
    }

    public function category()
    {
        return $this->belongsTo(TourCategory::class, 'category_id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('cover')->singleFile();
        $this->addMediaCollection('gallery');
    }

    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }
}
