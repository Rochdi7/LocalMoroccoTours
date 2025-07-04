<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Activity extends Model implements HasMedia
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
        'languages',
        'gallery',
        'included',
        'excluded',
        'itinerary',
    ];

    protected $casts = [
        'gallery' => 'array',
        'included' => 'array',
        'excluded' => 'array',
        'itinerary' => 'array',
        'highlights' => 'array',
        'languages' => 'array',
    ];

    protected $attributes = [
        'included' => '[]',
        'excluded' => '[]',
        'gallery' => '[]',
        'itinerary' => '[]',
        'highlights' => '[]',
        'languages' => '[]',
    ];

    public function category()
    {
        return $this->belongsTo(ActivityCategory::class, 'category_id');
    }

    public function location()
    {
        return $this->belongsTo(\App\Models\Location::class, 'location_id');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('cover')->singleFile();
        $this->addMediaCollection('gallery');
    }

    public function getLanguagesFormattedAttribute()
    {
        if (is_array($this->languages) && count($this->languages) > 0) {
            return implode(', ', $this->languages);
        }

        return 'English'; // default fallback
    }

    public function getHighlightsArrayAttribute()
    {
        if (empty($this->highlights)) {
            return [];
        }

        if (is_array($this->highlights)) {
            return $this->highlights;
        }

        return array_filter(
            preg_split('/\r\n|\r|\n/', $this->highlights),
            fn($line) => trim($line) !== ''
        );
    }

    public function reviews()
    {
        return $this->morphMany(\App\Models\Review::class, 'reviewable');
    }
}
