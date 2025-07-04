<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    public function run()
    {
        Location::create([
            'name' => 'Marrakech',
            'description' => 'A major city in Morocco known for its markets and architecture.',
        ]);
    }
}

