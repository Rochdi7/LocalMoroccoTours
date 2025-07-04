<?php
namespace Database\Seeders;

use App\Models\BlogCategory;
use Illuminate\Database\Seeder;

class BlogCategorySeeder extends Seeder
{
    public function run()
    {
        BlogCategory::create(['name' => 'Travel Tips', 'slug' => 'travel-tips']);
    }
}
