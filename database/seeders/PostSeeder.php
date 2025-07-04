<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run()
    {
        Post::create([
            'title' => 'Top 5 Places to Visit in Morocco',
            'slug' => 'top-places-morocco',
            'excerpt' => 'Discover the best places to explore in Morocco.',
            'content' => '<p>Marrakech, Fes, Chefchaouen...</p>',
            'featured_image_url' => '/images/posts/morocco.jpg',
            'status' => 'published',
            'author_id' => 1,
            'category_id' => 1,
            'published_at' => now()
        ]);
    }
}

