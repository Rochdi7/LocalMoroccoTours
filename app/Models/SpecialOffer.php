<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class SpecialOffer extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'title', 'subtitle', 'text', 'image_path', 'link',
        'order', 'is_active'
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('special_offers')->useDisk('public')->singleFile();
    }
}
