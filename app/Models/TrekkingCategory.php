<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class TrekkingCategory extends Model
{
    protected $fillable = ['name', 'slug'];

    // Optional: Auto-generate slug
    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->slug) {
                $model->slug = Str::slug($model->name);
            }
        });
    }

    // Example relationship (if you add a Trekking model later)
    public function treks()
    {
        return $this->hasMany(Trekking::class);
    }
}
