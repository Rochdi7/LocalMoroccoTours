<?php

namespace Database\Seeders;

use App\Models\TourCategory;
use Illuminate\Database\Seeder;

class TourCategorySeeder extends Seeder
{
    public function run()
    {
        TourCategory::create(['name' => 'Adventure Tours', 'slug' => 'adventure-tours']);
    }
}
