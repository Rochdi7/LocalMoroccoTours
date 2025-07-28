<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Trekking;
use Illuminate\Support\Str;

class TrekkingSeeder extends Seeder
{
    public function run(): void
    {
        /**
         * ✅ 1. Best 2 Day Mount Toubkal Trek
         */
        $toubkal = Trekking::create([
            'title' => 'Best 2 Day Mount Toubkal Trek from Marrakech',
            'slug' => Str::slug('Best 2 Day Mount Toubkal Trek from Marrakech'),
            'overview' => 'A breathtaking two-day adventure through the majestic High Atlas Mountains, including a guided ascent of Mount Toubkal (4167m). Discover Moroccan landscapes, local culture, and unforgettable views with experienced local guides.',
            'highlights' => [
                "Toubkal summit ascent",
                "Panoramic views of the Atlas Mountains and Sahara",
                "Overnight in mountain refuge at 3200m",
                "Guided trek from Imlil to summit",
                "Private transfer from Marrakech",
                "Local guides, cook, and mule support",
            ],
            'duration' => '2 Day',
            'group_size' => 12,
            'age_range' => '18-60 years',
            'base_price' => 1200,
            'difficulty_level' => 'Hard',
            'max_altitude' => 4167,
            'bestseller_flag' => true,
            'free_cancellation_flag' => true,
            'booked_count' => 0,
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?pb=!1m34!1m12!1m3!1d518680.77175851463!2d-8.18859529480893!3d31.269342857555056!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m19!3e0!4m5!1s0xdafee8d96179e51%3A0x5950b6534f87adb8!2sMarrakesh!3m2!1d31.6294723!2d-7.9810845!4m5!1s0xdb00e5efec05a9d%3A0x965e72a7f152f377!2sImlil!3m2!1d31.137744899999998!2d-7.9197941!4m5!1s0xdb00cfde4f96ed1%3A0x7934f4c42445d7f9!2sToubkal!3m2!1d31.060071899999997!2d-7.9147482!5e0!3m2!1sen!2sma!4v1550274043988" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>',
            'included' => [
                "Private transfers from Marrakech to Imlil",
                "Experienced local mountain guide",
                "Cook and muleteers",
                "All meals during the trek",
                "Comfortable accommodation at mountain refuge"
            ],
            'excluded' => ["Travel insurance", "Tips"],
            'languages' => ["English", "French", "Spanish"],
            'category_id' => 1,
            'location_id' => 3,
        ]);

        $toubkal->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Day 1: Marrakech – Imlil – Toubkal Refuge (3200m)',
                'content' => "Start from your hotel in Marrakech at 7:00 AM.\nDrive to Imlil (1740m) and meet your trekking team.\nHike through Aremd and Sidi Chamharouch for a short break.\nContinue through stunning valleys to reach the Toubkal Refuge (3207m).\nDinner and overnight at the refuge in the Atlas Mountains."
            ],
            [
                'day_number' => 2,
                'title' => 'Day 2: Toubkal Summit – Return to Marrakech',
                'content' => "Early start to reach the summit of Mount Toubkal (4167m) and enjoy sunrise views.\nPanoramic landscapes of the Atlas Mountains and Sahara Desert.\nDescend to the refuge for a rest and lunch.\nContinue down to Imlil and return to your hotel in Marrakech."
            ],
        ]);

        /**
         * ✅ 2. 3 Valleys Trekking: Berber Villages
         */
        $valleys = Trekking::create([
            'title' => '3 Valleys Trekking: Best 3 Day Berber Villages Trek in Atlas Mountains',
            'slug' => Str::slug('3 Valleys Trekking: Best 3 Day Berber Villages Trek in Atlas Mountains'),
            'overview' => 'Explore the heart of the Atlas Mountains through a 3-day Berber villages trek. Experience valleys, mountain passes, and authentic local hospitality with experienced local guides.',
            'highlights' => [
                "Tamatert and Mzik mountain passes",
                "Traditional Berber villages and local gîtes",
                "Panoramic views of the Atlas and Toubkal peaks",
                "Scenic mule trails and forest walks",
                "Private transfer from Marrakech",
                "All-inclusive with meals and local support"
            ],
            'duration' => '3 Day',
            'group_size' => 12,
            'age_range' => '18-60 years',
            'base_price' => 1350,
            'difficulty_level' => 'Moderate',
            'max_altitude' => 2500,
            'bestseller_flag' => false,
            'free_cancellation_flag' => true,
            'booked_count' => 0,
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6830.062407459897!2d-7.918696400000001!3d31.136648149999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xdb00e5efec05a9d%3A0x965e72a7f152f377!2sImlil!5e0!3m2!1sen!2sma!4v1753477965022!5m2!1sen!2sma" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            'included' => [
                "Private transfers from Marrakech to Imlil",
                "Local mountain guide and cook",
                "Mules and muleteers",
                "All meals during the trek",
                "Accommodation in traditional Berber houses"
            ],
            'excluded' => ["Travel insurance", "Tips"],
            'languages' => ["English", "French", "Spanish"],
            'category_id' => 1,
            'location_id' => 3,
        ]);

        $valleys->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Day 1: Marrakech – Imlil – Tamatert Pass – Tinerhourhine',
                'content' => "Transfer from Marrakech to Imlil (1740m).\nHike up to Tamatert Pass (2280m) and enjoy panoramic views.\nContinue to Tinerhourhine village passing through traditional hamlets.\nDinner and overnight in a local gîte."
            ],
            [
                'day_number' => 2,
                'title' => 'Day 2: Tinerhourhine – Ageursioual Pass – Ait Aissa',
                'content' => "After breakfast, hike up to Ageursioual Pass (2000m) with great views over Mizane Valley.\nDescend via mule trail to Aguersioual village.\nContinue into Azzaden Valley for dinner and overnight at a Berber house in Ait Aissa."
            ],
            [
                'day_number' => 3,
                'title' => 'Day 3: Ait Aissa – Mzik Pass – Imlil – Marrakech',
                'content' => "Trek through forested trails and ascend Mzik Pass (2500m).\nEnjoy panoramic views over Imlil Valley.\nDescend to Imlil and transfer back to your hotel in Marrakech."
            ],
        ]);
        /**
         * ✅ 3. 3 Day Mount Toubkal (Long Weekend) Trek
         */
        $toubkal3 = Trekking::create([
            'title' => '3 Day Mount Toubkal (Long Weekend Trip): Toubkal 3 Day 2 Night Summit Trek',
            'slug' => Str::slug('3 Day Mount Toubkal (Long Weekend Trip): Toubkal 3 Day 2 Night Summit Trek'),
            'overview' => 'We offer a long-weekend Toubkal trek in the Atlas Mountains: a 3-day, 2-night adventure with stunning views, mountain passes, waterfalls, and a summit hike led by experienced local guides.',
            'highlights' => [
                "3-day trek with 2-night overnight stays",
                "Tizi n’Mazzik and Tizi n’Ougelzim passes",
                "Igholidn waterfall and scenic valleys",
                "Climb to Mount Toubkal summit (4167m)",
                "Local mountain gîtes and refuge experience",
                "All-inclusive Atlas hiking with local support"
            ],
            'duration' => '3 Day',
            'group_size' => 12,
            'age_range' => '18-60 years',
            'base_price' => 1400,
            'difficulty_level' => 'Hard',
            'max_altitude' => 4167,
            'bestseller_flag' => false,
            'free_cancellation_flag' => true,
            'booked_count' => 0,
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?pb=!1m34!1m12!1m3!1d518680.77175851463!2d-8.18859529480893!3d31.269342857555056!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m19!3e0!4m5!1s0xdafee8d96179e51%3A0x5950b6534f87adb8!2sMarrakesh!3m2!1d31.6294723!2d-7.9810845!4m5!1s0xdb00e5efec05a9d%3A0x965e72a7f152f377!2sImlil!3m2!1d31.137744899999998!2d-7.9197941!4m5!1s0xdb00cfde4f96ed1%3A0x7934f4c42445d7f9!2sToubkal!3m2!1d31.060071899999997!2d-7.9147482!5e0!3m2!1sen!2sma!4v1550274043988" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>',
            'included' => [
                "Private transfers from Marrakech to Imlil",
                "Local mountain guide and cook",
                "Mules and muleteers",
                "All meals during the trek",
                "Accommodation in gîtes and mountain refuge"
            ],
            'excluded' => ["Travel insurance", "Tips"],
            'languages' => ["English", "French", "Spanish"],
            'category_id' => 1,
            'location_id' => 3,
        ]);

        $toubkal3->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Day 1: Marrakech – Imlil – Tizi n’Mazzik – Tamssoult',
                'content' => "Transfer from Marrakech to Imlil via Asni in the Atlas Mountains.\nHike up to Tizi n’Mazzik pass and enjoy views over Azzaden Valley.\nLunch on the trail.\nContinue to Tamssoult (2250m) and spend the night in a mountain refuge or camp.\nDinner included."
            ],
            [
                'day_number' => 2,
                'title' => 'Day 2: Tamssoult – Igholidn Waterfall – Tizi n’Ougelzim – Toubkal Refuge',
                'content' => "Breakfast at the refuge.\nHike to Igholidn waterfall, then ascend to Tizi n’Ougelzim mountain pass.\nEnjoy panoramic views of Mount Toubkal.\nDescend to Toubkal refuge (3207m) for dinner and overnight stay."
            ],
            [
                'day_number' => 3,
                'title' => 'Day 3: Toubkal Summit – Ouawgant Valley – Imlil – Marrakech',
                'content' => "Early start for the summit climb of Mount Toubkal (4167m).\nEnjoy sunrise and breathtaking views of the Atlas and Sahara.\nDescend to the refuge, then continue through Ouawgant Valley.\nLunch en route, then transfer back to Marrakech."
            ],
        ]);
    }
}
