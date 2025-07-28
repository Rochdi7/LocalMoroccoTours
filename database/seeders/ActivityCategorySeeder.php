<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ActivityCategory;
use Illuminate\Support\Str;

class ActivityCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Desert Experiences',
            'Adventure & Trekking',
            'Cultural Tours',
            'City Excursions',
            'Wellness & Relaxation',
        ];

        foreach ($categories as $name) {
            ActivityCategory::updateOrCreate(
                ['slug' => Str::slug($name)],
                ['name' => $name]
            );
        }
    }
}
