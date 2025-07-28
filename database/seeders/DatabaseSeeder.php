<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            TrekkingCategorySeeder::class, 
            LocationSeeder::class,        
            TrekkingSeeder::class,         
            ActivityCategorySeeder::class,
            ActivitySeeder::class,       
            TourCategorySeeder::class,     
            TourSeeder::class,             
            RatingCategorySeeder::class,
        ]);
    }
}
