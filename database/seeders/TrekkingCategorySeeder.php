<?php

namespace Database\Seeders;

use App\Models\TrekkingCategory;
use Illuminate\Database\Seeder;

class TrekkingCategorySeeder extends Seeder
{
    public function run()
    {
        TrekkingCategory::create(['name' => 'Mountain Treks', 'slug' => 'mountain-treks']);
    }
}
