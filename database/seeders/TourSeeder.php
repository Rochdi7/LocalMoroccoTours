<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // It's good practice to disable foreign key checks while seeding
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Clean up the tables before seeding
        DB::table('tour_categories')->truncate();
        DB::table('locations')->truncate();
        DB::table('activity_categories')->truncate();
        DB::table('trekking_categories')->truncate();
        DB::table('blog_categories')->truncate();
        DB::table('tags')->truncate();
        DB::table('users')->truncate();
        DB::table('tours')->truncate();
        DB::table('activities')->truncate();
        DB::table('trekking')->truncate();
        DB::table('posts')->truncate();
        DB::table('post_comments')->truncate();
        DB::table('post_tag')->truncate();
        DB::table('special_offers')->truncate();


        // --- CATEGORIES & LOCATIONS ---

        DB::table('tour_categories')->insert([
            ['name' => 'Cultural Tours', 'slug' => 'cultural-tours', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Desert Safaris', 'slug' => 'desert-safaris', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'City Breaks', 'slug' => 'city-breaks', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);

        DB::table('locations')->insert([
            ['name' => 'Marrakech', 'parent_id' => null, 'description' => 'The vibrant heart of Morocco.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Fes', 'parent_id' => null, 'description' => 'The cultural and spiritual center of Morocco.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Atlas Mountains', 'parent_id' => 1, 'description' => 'Majestic mountain range near Marrakech.', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);

        DB::table('activity_categories')->insert([
            ['name' => 'Hot Air Balloon', 'slug' => 'hot-air-balloon', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Cooking Class', 'slug' => 'cooking-class', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Quad Biking', 'slug' => 'quad-biking', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);

        DB::table('trekking_categories')->insert([
            ['name' => 'Mountain Treks', 'slug' => 'mountain-treks', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Coastal Hikes', 'slug' => 'coastal-hikes', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Desert Treks', 'slug' => 'desert-treks', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);

        DB::table('blog_categories')->insert([
            ['name' => 'Travel Guides', 'slug' => 'travel-guides', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Cultural Insights', 'slug' => 'cultural-insights', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Food & Drink', 'slug' => 'food-drink', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);

        DB::table('tags')->insert([
            ['name' => 'Adventure', 'slug' => 'adventure', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'History', 'slug' => 'history', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Luxury', 'slug' => 'luxury', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);

        // --- USERS ---
        DB::table('users')->insert([
            ['name' => 'Admin User', 'email' => 'admin@example.com', 'password' => Hash::make('password'), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'John Doe', 'email' => 'john.doe@example.com', 'password' => Hash::make('password'), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Jane Smith', 'email' => 'jane.smith@example.com', 'password' => Hash::make('password'), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);


        // --- CORE CONTENT: TOURS, ACTIVITIES, TREKKING ---

        DB::table('tours')->insert([
            [
                'title' => 'Imperial Cities Discovery',
                'slug' => 'imperial-cities-discovery',
                'overview' => 'Explore the rich history of Morocco\'s four imperial cities: Marrakech, Fes, Meknes, and Rabat.',
                'highlights' => '["Visit Hassan II Mosque", "Explore the Fes medina", "Discover Roman ruins at Volubilis"]',
                'duration' => '8 Days',
                'group_size' => 12,
                'age_range' => '12-70',
                'base_price' => 1250.00,
                'bestseller_flag' => true,
                'free_cancellation_flag' => true,
                'booked_count' => 150,
                'map_coordinates' => '31.6295,-7.9811',
                'category_id' => 1, // Cultural Tours
                'location_id' => 1, // Marrakech
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now()
            ],
            [
                'title' => 'Sahara Desert Luxury Camp',
                'slug' => 'sahara-desert-luxury-camp',
                'overview' => 'Experience the magic of the Sahara with a 3-day tour from Marrakech to Merzouga, staying in a luxury desert camp.',
                'highlights' => '["Camel ride at sunset", "Stargazing in the desert", "Traditional Berber music"]',
                'duration' => '3 Days',
                'group_size' => 8,
                'age_range' => '10-65',
                'base_price' => 450.00,
                'bestseller_flag' => true,
                'free_cancellation_flag' => false,
                'booked_count' => 210,
                'map_coordinates' => '31.0931,-4.0116',
                'category_id' => 2, // Desert Safaris
                'location_id' => 1, // Marrakech
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now()
            ],
            [
                'title' => 'Fes Medina Guided Tour',
                'slug' => 'fes-medina-guided-tour',
                'overview' => 'A full-day guided tour exploring the labyrinthine streets of the ancient Fes medina, a UNESCO World Heritage site.',
                'highlights' => '["Visit Bou Inania Madrasa", "See the Chouara Tannery", "Explore the souks"]',
                'duration' => '1 Day',
                'group_size' => 6,
                'age_range' => 'All ages',
                'base_price' => 80.00,
                'bestseller_flag' => false,
                'free_cancellation_flag' => true,
                'booked_count' => 95,
                'map_coordinates' => '34.0637,-5.0033',
                'category_id' => 3, // City Breaks
                'location_id' => 2, // Fes
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now()
            ],
        ]);

        DB::table('activities')->insert([
            [
                'title' => 'Sunrise Hot Air Balloon Over Marrakech',
                'overview' => 'Witness a breathtaking sunrise over the Atlas Mountains from a hot air balloon, followed by a traditional Berber breakfast.',
                'highlights' => '["Stunning aerial views", "Berber breakfast in a tent", "Flight certificate"]',
                'duration' => '4 Hours',
                'group_size' => 16,
                'age_range' => '5+',
                'base_price' => 205.00,
                'bestseller_flag' => true,
                'free_cancellation_flag' => true,
                'booked_count' => 300,
                'map_coordinates' => '31.6295,-7.9811',
                'category_id' => 1, // Hot Air Balloon
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now()
            ],
            [
                'title' => 'Tagine Cooking Class in a Riad',
                'overview' => 'Learn the secrets of Moroccan cuisine by preparing a traditional tagine in a beautiful Marrakech riad.',
                'highlights' => '["Market visit for ingredients", "Hands-on cooking lesson", "Enjoy the meal you prepared"]',
                'duration' => '3.5 Hours',
                'group_size' => 10,
                'age_range' => '8+',
                'base_price' => 65.00,
                'bestseller_flag' => false,
                'free_cancellation_flag' => true,
                'booked_count' => 120,
                'map_coordinates' => '31.6258,-7.9945',
                'category_id' => 2, // Cooking Class
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now()
            ],
            [
                'title' => 'Agafay Desert Quad Biking Adventure',
                'overview' => 'Experience an adrenaline rush while quad biking through the rocky plains of the Agafay Desert, just outside Marrakech.',
                'highlights' => '["Thrilling off-road experience", "Tea break with a local family", "Views of the Atlas Mountains"]',
                'duration' => '2 Hours',
                'group_size' => 8,
                'age_range' => '16+',
                'base_price' => 75.00,
                'bestseller_flag' => true,
                'free_cancellation_flag' => false,
                'booked_count' => 180,
                'map_coordinates' => '31.4725,-8.1211',
                'category_id' => 3, // Quad Biking
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now()
            ],
        ]);

        DB::table('trekking')->insert([
            [
                'title' => 'Mount Toubkal Ascent (2 Days)',
                'overview' => 'Challenge yourself with a 2-day trek to the summit of Mount Toubkal, the highest peak in North Africa.',
                'highlights' => '["Summiting Toubkal (4,167m)", "Overnight stay in a mountain refuge", "Panoramic Atlas views"]',
                'duration' => '2 Days',
                'group_size' => 10,
                'age_range' => '18-60',
                'base_price' => 180.00,
                'difficulty_level' => 'Hard',
                'max_altitude' => 4167,
                'bestseller_flag' => true,
                'free_cancellation_flag' => false,
                'booked_count' => 115,
                'map_coordinates' => '31.0596,-7.9155',
                'category_id' => 1, // Mountain Treks
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now()
            ],
            [
                'title' => 'Three Valleys Trek',
                'overview' => 'A moderate day trek through three distinct valleys in the Atlas Mountains, experiencing Berber culture.',
                'highlights' => '["Lush green valleys", "Berber villages", "Lunch with a local family"]',
                'duration' => '1 Day',
                'group_size' => 12,
                'age_range' => '10-70',
                'base_price' => 90.00,
                'difficulty_level' => 'Moderate',
                'max_altitude' => 2200,
                'bestseller_flag' => false,
                'free_cancellation_flag' => true,
                'booked_count' => 85,
                'map_coordinates' => '31.2000,-7.9833',
                'category_id' => 1, // Mountain Treks
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now()
            ],
            [
                'title' => 'Essaouira Coastal Hike',
                'overview' => 'A beautiful coastal hike along the Atlantic, from Diabat to Sidi Kaouki, passing argan trees and secluded beaches.',
                'highlights' => '["Atlantic ocean views", "Sandy beaches", "Potential to see goats in argan trees"]',
                'duration' => '6 Hours',
                'group_size' => 8,
                'age_range' => '12+',
                'base_price' => 70.00,
                'difficulty_level' => 'Easy',
                'max_altitude' => 50,
                'bestseller_flag' => false,
                'free_cancellation_flag' => true,
                'booked_count' => 45,
                'map_coordinates' => '31.5085,-9.7595',
                'category_id' => 2, // Coastal Hikes
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now()
            ],
        ]);

        // --- BLOG CONTENT: POSTS, COMMENTS, TAGS ---

        DB::table('posts')->insert([
            [
                'title' => 'A First-Timer\'s Guide to Marrakech',
                'slug' => 'first-timers-guide-to-marrakech',
                'excerpt' => 'Navigating the Red City can be daunting. Here are our top tips for making the most of your first visit.',
                'content' => '<h1>Welcome to Marrakech!</h1><p>Marrakech is a city of sensory overload... (full content here)</p>',
                'status' => 'published',
                'author_id' => 1, // Admin User
                'category_id' => 1, // Travel Guides
                'published_at' => Carbon::now()->subDays(10),
                'created_at' => Carbon::now()->subDays(10), 'updated_at' => Carbon::now()->subDays(10)
            ],
            [
                'title' => 'The Art of Moroccan Mint Tea',
                'slug' => 'art-of-moroccan-mint-tea',
                'excerpt' => 'More than just a drink, Moroccan mint tea is a symbol of hospitality and culture. Learn how it\'s made.',
                'content' => '<h1>The Ceremony of Tea</h1><p>In Morocco, tea is a way of life... (full content here)</p>',
                'status' => 'published',
                'author_id' => 2, // John Doe
                'category_id' => 2, // Cultural Insights
                'published_at' => Carbon::now()->subDays(5),
                'created_at' => Carbon::now()->subDays(5), 'updated_at' => Carbon::now()->subDays(5)
            ],
            [
                'title' => 'Tasting Tagine: A Culinary Journey',
                'slug' => 'tasting-tagine-culinary-journey',
                'excerpt' => 'From lamb with prunes to chicken with lemons, we explore the delicious world of the Moroccan tagine.',
                'content' => '<h1>What is a Tagine?</h1><p>The tagine is both the pot and the stew... (full content here)</p>',
                'status' => 'draft',
                'author_id' => 1, // Admin User
                'category_id' => 3, // Food & Drink
                'published_at' => null,
                'created_at' => Carbon::now()->subDays(2), 'updated_at' => Carbon::now()->subDays(2)
            ],
        ]);

        DB::table('post_comments')->insert([
            [
                'post_id' => 1,
                'user_id' => 2, // John Doe
                'parent_id' => null,
                'guest_name' => null,
                'guest_email' => null,
                'comment_title' => 'Great tips!',
                'comment_body' => 'This was so helpful for my trip last month. Thanks!',
                'is_approved' => true,
                'created_at' => Carbon::now()->subDays(8),
            ],
            [
                'post_id' => 1,
                'user_id' => 1, // Admin User
                'parent_id' => 1,
                'guest_name' => null,
                'guest_email' => null,
                'comment_title' => 'Re: Great tips!',
                'comment_body' => 'So glad to hear that, John!',
                'is_approved' => true,
                'created_at' => Carbon::now()->subDays(7),
            ],
            [
                'post_id' => 2,
                'user_id' => null,
                'parent_id' => null,
                'guest_name' => 'A Guest',
                'guest_email' => 'guest@example.com',
                'comment_title' => 'Fascinating!',
                'comment_body' => 'I never knew there was so much tradition behind the tea.',
                'is_approved' => false,
                'created_at' => Carbon::now()->subDays(3),
            ],
        ]);

        // Junction table for post_tag
        DB::table('post_tag')->insert([
            ['post_id' => 1, 'tag_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()], // Post 1 -> Adventure
            ['post_id' => 1, 'tag_id' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()], // Post 1 -> History
            ['post_id' => 2, 'tag_id' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()], // Post 2 -> History
        ]);

        // --- MISC ---
        DB::table('special_offers')->insert([
            [
                'title' => 'Early Bird Discount',
                'subtitle' => 'Book 90 days in advance and save 15%!',
                'text' => 'Plan your adventure ahead of time and get rewarded.',
                'link' => '/tours',
                'order' => 1,
                'is_active' => true,
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now()
            ],
            [
                'title' => 'Sahara Summer Special',
                'subtitle' => '20% off all desert safaris in July & August.',
                'text' => 'Experience the magic of the desert for less this summer.',
                'link' => '/tours/desert-safaris',
                'order' => 2,
                'is_active' => true,
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now()
            ],
            [
                'title' => 'Last Minute Deal',
                'subtitle' => '10% off selected city breaks this weekend.',
                'text' => 'Spontaneous trip? We have you covered.',
                'link' => '/tours/city-breaks',
                'order' => 3,
                'is_active' => false,
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now()
            ],
        ]);

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
