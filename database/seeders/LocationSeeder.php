<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Location;
use Illuminate\Support\Str;

class LocationSeeder extends Seeder
{
    public function run(): void
    {
        $locations = [
            'Marrakech',
            'Atlas Mountains',
            'Tangier',
            'Fes',
            'Chefchaouen',
            'Casablanca',
            'Rabat',
            'Agadir',
            'Spain',
        ];

        foreach ($locations as $name) {
            Location::firstOrCreate(
                ['slug' => Str::slug($name)],
                [
                    'name' => $name,
                    'description' => $name . ' - beautiful and culturally rich destination.',
                    'seo_alt' => $name,
                    'seo_caption' => 'Explore ' . $name,
                    'seo_description' => 'Discover the beauty and culture of ' . $name . ' with our curated travel experiences.',
                ]
            );
        }
    }
}
