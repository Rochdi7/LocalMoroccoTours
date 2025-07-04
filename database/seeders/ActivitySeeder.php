<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    public function run()
    {
        Activity::create([
            'title' => 'Moroccan Cooking Class',
            'overview' => 'Learn to cook traditional Moroccan dishes.',
            'highlights' => json_encode(['Tagine Making', 'Spice Market Tour']),
            'duration' => '4 hours',
            'group_size' => 8,
            'age_range' => '15-70 yrs',
            'base_price' => 45.00,
            'bestseller_flag' => true,
            'free_cancellation_flag' => true,
            'booked_count' => 500,
            'map_coordinates' => '31.6330,-7.9990',
            'category_id' => 1
        ]);
    }
}

