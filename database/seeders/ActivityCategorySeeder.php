<?php

namespace Database\Seeders;

use App\Models\ActivityCategory;
use Illuminate\Database\Seeder;

class ActivityCategorySeeder extends Seeder
{
    public function run()
    {
        ActivityCategory::create(['name' => 'Cooking Classes', 'slug' => 'cooking-classes']);
    }
}
