<?php

namespace Database\Seeders;

use App\Models\Trekking;
use Illuminate\Database\Seeder;

class TrekkingSeeder extends Seeder
{
    public function run()
    {
        Trekking::create([
            'title' => 'Toubkal Summit Trek',
            'overview' => 'Reach the highest peak in North Africa.',
            'highlights' => json_encode(['Mountain Views', 'Berber Villages']),
            'duration' => '5 days',
            'group_size' => 12,
            'age_range' => '18-60 yrs',
            'base_price' => 320.00,
            'difficulty_level' => 'Hard',
            'max_altitude' => 4167,
            'bestseller_flag' => true,
            'free_cancellation_flag' => false,
            'booked_count' => 300,
            'map_coordinates' => '31.0667,-7.9167',
            'category_id' => 1
        ]);
    }
}
