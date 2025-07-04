<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Location extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = ['name', 'parent_id', 'description'];

    /**
     * Parent location relationship.
     */
    public function parent()
    {
        return $this->belongsTo(Location::class, 'parent_id');
    }

    /**
     * Child locations relationship.
     */
    public function children()
    {
        return $this->hasMany(Location::class, 'parent_id');
    }

    /**
     * Related tours.
     */
    public function tours()
    {
        return $this->hasMany(Tour::class);
    }

    /**
     * Register the media collections (optional, can define conversions here too).
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('locations')
            ->singleFile(); // Only one image per location
    }

    /**
     * Shortcut to get image URL or a default fallback.
     */
    public function getImageUrlAttribute(): string
    {
        return $this->getFirstMediaUrl('locations') ?: asset('img/locations/default.jpg');
    }
}
