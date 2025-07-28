<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TourCategory;
use Illuminate\Support\Str;

class TourCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Marrakech Desert Tours',
            'Fes Desert Tours',
            'Casablanca Imperial & Desert Tours',
            'Tangier Grand & Desert Tours',
            'Ouarzazate to Desert Tours',
            'Chefchaouen to Sahara Tours',
            'Agadir Desert Adventures',
            'Combined Atlas & Desert Tours',
            'Grand Morocco Tours',
            'North Morocco Tours',
        ];

        foreach ($categories as $name) {
            TourCategory::updateOrCreate(
                ['slug' => Str::slug($name)],
                ['name' => $name]
            );
        }
    }
}
