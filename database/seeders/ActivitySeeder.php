<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\ActivityCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ActivitySeeder extends Seeder
{
    public function run(): void
    {
        // Resolve Category & Location
        $desertCategoryId = ActivityCategory::where('slug', 'desert-experiences')->value('id');
        $locationId = 1; // Assuming Marrakech or Agafay is ID 1 in your locations table

        /**
         * ✅ 1. Sunset Camel Ride in Agafay Desert
         */
        $camelRide = Activity::create([
            'title' => 'Sunset Camel Ride in Agafay Desert',
            'slug' => Str::slug('Sunset Camel Ride in Agafay Desert'),
            'overview' => 'Experience the magic of the desert with a peaceful camel ride at sunset through the golden dunes of Agafay, near Marrakech. This tour is perfect for couples, families, and photographers looking to capture a stunning Moroccan sunset.',
            'duration' => '2 hours',
            'group_size' => 10,
            'age_range' => '6+',
            'base_price' => 300,
            'bestseller_flag' => true,
            'free_cancellation_flag' => true,
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18..." width="600" height="450" style="border:0;" allowfullscreen loading="lazy"></iframe>',
            'category_id' => $desertCategoryId,
            'location_id' => $locationId,
            'languages' => ['English', 'French', 'Spanish'],
            'highlights' => [
                'Ride camels through the scenic Agafay Desert at sunset',
                'Enjoy panoramic views of the Atlas Mountains',
                'Capture stunning photos with golden desert backdrops',
                'Visit a traditional Berber tent for mint tea',
            ],
            'included' => [
                'Camel ride with local guide',
                'Traditional mint tea in a Berber tent',
                'Round-trip transport from Marrakech',
            ],
            'excluded' => [
                'Personal expenses',
                'Tips and gratuities',
                'Travel insurance',
            ],
        ]);

        $camelRide->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Arrival & Camel Briefing',
                'content' => [
                    'Pick-up from your Marrakech accommodation and transfer to Agafay desert camp.',
                    'Meet your camel caravan and receive a short safety briefing from your guide.',
                ],
            ],
            [
                'day_number' => 2,
                'title' => 'Camel Ride & Sunset Views',
                'content' => [
                    'Enjoy a scenic camel ride through the stony dunes as the sun begins to set.',
                    'Stop at a panoramic viewpoint to take in the golden desert and capture memorable photos.',
                    'Relax in a Berber tent with traditional mint tea and Moroccan snacks before returning to Marrakech.',
                ],
            ],
        ]);

        /**
         * ✅ 2. Agafay Luxury Desert Camp Experience
         */
        $luxuryCamp = Activity::create([
            'title' => 'Agafay Luxury Desert Camp Experience with Dinner and Overnight Stay',
            'slug' => Str::slug('Agafay Luxury Desert Camp Experience with Dinner and Overnight Stay'),
            'overview' => 'Escape the bustling city and embark on a magical journey to the Agafay Desert with Local Morocco Tours. This luxury camp experience includes cultural performances, delicious Moroccan cuisine, and an unforgettable overnight stay under the stars.',
            'duration' => 'Overnight',
            'group_size' => 20,
            'age_range' => 'All ages',
            'base_price' => 950,
            'bestseller_flag' => true,
            'free_cancellation_flag' => true,
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18..." width="600" height="450" style="border:0;" allowfullscreen loading="lazy"></iframe>',
            'category_id' => $desertCategoryId,
            'location_id' => $locationId,
            'languages' => ['English', 'French', 'Spanish'],
            'highlights' => [
                'Luxury desert camp with panoramic views',
                'Cultural performances: music, drums, traditional dances',
                'Authentic Moroccan dinner and breakfast',
                'Comfortable overnight stay in private tents',
                'Stargazing experience and peaceful desert ambiance',
            ],
            'included' => [
                'Round-trip transportation from Marrakech',
                'Welcome drinks and refreshments',
                'Dinner with Moroccan dishes',
                'Breakfast at the camp',
                'Camel ride with experienced guide',
                'Private luxury tent with all amenities',
            ],
            'excluded' => [
                'Personal expenses',
                'Optional gratuities',
                'Travel insurance',
            ],
        ]);

        $luxuryCamp->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Arrival and Cultural Evening',
                'content' => [
                    'Transfer from your riad/hotel in Marrakech to the Agafay Desert, between 4pm and 6pm.',
                    'Warm welcome with drinks and traditional hospitality at the desert camp.',
                    'Enjoy live traditional music, drums, and Berber dance performances.',
                    'Savor a delicious Moroccan dinner under the stars with tagines, couscous, and grilled meats.',
                ],
            ],
            [
                'day_number' => 2,
                'title' => 'Morning in the Desert',
                'content' => [
                    'Wake up to a peaceful desert sunrise and enjoy breakfast at the camp.',
                    'Optional camel ride or walk around the golden dunes.',
                    'Relax and check out for transfer back to Marrakech.',
                ],
            ],
        ]);
        /**
         * ✅ 3. Camel Ride in Marrakech Palmeries
         */
        $palmeriesCamel = Activity::create([
            'title' => 'Camel Ride in Marrakech Palmeries',
            'slug' => Str::slug('Camel Ride in Marrakech Palmeries'),
            'overview' => 'Embark on an unforgettable camel ride adventure through the picturesque palmeries of Marrakech. Discover the desert landscape, immerse yourself in Berber culture, and enjoy traditional Moroccan tea on this authentic experience with Local Morocco Tours.',
            'duration' => '2 hours',
            'group_size' => 12,
            'age_range' => 'All ages',
            'base_price' => 280,
            'bestseller_flag' => false,
            'free_cancellation_flag' => true,
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18..." width="600" height="450" style="border:0;" allowfullscreen loading="lazy"></iframe>',
            'category_id' => ActivityCategory::where('slug', 'desert-experiences')->value('id'),
            'location_id' => 1,
            'languages' => ['English', 'French', 'Spanish'],
            'highlights' => [
                'Guided camel ride through Marrakech palmeries',
                'Learn about Berber culture and camel history',
                'Traditional Moroccan mint tea break',
                'Sunset views over the desert palm groves',
                'Transport to/from local Marrakech hotel',
            ],
            'included' => [
                'Camel ride with experienced local guide',
                'Traditional Moroccan mint tea',
                'Transportation from/to Marrakech hotel',
            ],
            'excluded' => [
                'Personal expenses',
                'Souvenirs',
                'Gratuities (optional)',
            ],
        ]);

        $palmeriesCamel->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Camel Introduction & Departure',
                'content' => [
                    'Pick-up from your hotel or riad in Marrakech.',
                    'Meet your friendly camel and receive a short introduction from the guide.',
                    'Mount your camel and begin your ride into the palm groves.',
                ],
            ],
            [
                'day_number' => 2,
                'title' => 'Berber Culture & Sunset Ride',
                'content' => [
                    'Explore winding trails through the palm groves while learning about Berber life.',
                    'Enjoy a traditional Moroccan mint tea break under the shade.',
                    'Witness the stunning sunset over the desert landscape and return to camp.',
                ],
            ],
        ]);
        // Inside ActivitySeeder.php

        $fantasiaShow = Activity::create([
            'title' => 'Marrakech Chez Ali Fantasia Show',
            'slug' => Str::slug('Marrakech Chez Ali Fantasia Show'),
            'overview' => 'Prepare to be mesmerized by the enchanting Marrakech Chez Ali Fantasia Show, a captivating evening filled with Moroccan culture, music, and thrilling performances. Enjoy a delicious dinner and traditional entertainment in an unforgettable atmosphere.',
            'duration' => '3 Hours',
            'group_size' => 50,
            'age_range' => 'All ages',
            'base_price' => 750,
            'bestseller_flag' => true,
            'free_cancellation_flag' => true,
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18..." width="600" height="450" style="border:0;" allowfullscreen loading="lazy"></iframe>',
            'category_id' => 3, // Cultural Tours
            'location_id' => 1,
            'languages' => ['English', 'French', 'Spanish'],
            'highlights' => [
                'Spectacular Fantasia Show with live music and dance',
                'Delicious traditional Moroccan dinner with local specialties',
                'Seamless hotel pickup and transfer to Chez Ali venue',
                'Cultural performances: acrobats, belly dancers, horsemen',
            ],
            'included' => [
                'Hotel pickup and drop-off',
                'Reserved table for the show',
                'Full Moroccan dinner',
                'Access to all performances and Fantasia show',
            ],
            'excluded' => [
                'Personal expenses',
                'Gratuities (optional)',
                'Souvenirs or extra drinks',
            ],
        ]);

        $fantasiaShow->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Dinner & Traditional Entertainment',
                'content' => [
                    'Pickup from your Marrakech hotel or riad around 7 PM.',
                    'Arrival at Chez Ali venue and seating at your reserved table.',
                    'Enjoy a full-course Moroccan dinner with local delicacies.',
                    'Live traditional performances during dinner: music, belly dancing, acrobats.',
                ],
            ],
            [
                'day_number' => 1,
                'title' => 'Fantasia Horse Show',
                'content' => [
                    'Move to the open arena to witness the majestic Fantasia show.',
                    'Watch skilled riders perform traditional war reenactments on horseback.',
                    'Experience a grand finale with fireworks, music, and cultural celebration.',
                    'Return transfer to your hotel after the show concludes.',
                ],
            ],
        ]);
        /**
         * ✅ 5. Hot Air Balloon Experience over Marrakech
         */
        $hotAirBalloon = Activity::create([
            'title' => 'Hot Air Balloon Experience over Marrakech',
            'slug' => Str::slug('Hot Air Balloon Experience over Marrakech'),
            'overview' => 'Soar above the captivating city of Marrakech in a hot air balloon with Local Morocco Tours. Enjoy breathtaking panoramic views, a peaceful flight over the Atlas Mountains, and a traditional Moroccan breakfast after landing.',
            'duration' => '4 Hours',
            'group_size' => 12,
            'age_range' => '6+',
            'base_price' => 1600,
            'bestseller_flag' => true,
            'free_cancellation_flag' => true,
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18..." width="600" height="450" style="border:0;" allowfullscreen loading="lazy"></iframe>',
            'category_id' => 1, // adjust if category differs
            'location_id' => 1,
            'languages' => ['English', 'French', 'Spanish'],
            'highlights' => [
                'Scenic sunrise hot air balloon flight',
                'Breathtaking views of Marrakech and Atlas Mountains',
                'Traditional Moroccan breakfast post-flight',
                'Professional pilot and experienced crew',
                'Certificate of flight included',
            ],
            'included' => [
                'Hotel pickup and drop-off',
                'Scenic hot air balloon flight',
                'Experienced pilot and crew',
                'Traditional Moroccan breakfast',
                'Flight certificate as a souvenir',
            ],
            'excluded' => [
                'Personal expenses',
                'Gratuities (optional)',
                'Travel insurance',
            ],
        ]);

        $hotAirBalloon->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Pre-flight & Takeoff',
                'content' => [
                    'Early morning pickup from your Marrakech hotel or riad.',
                    'Arrival at launch site and watch the balloon being prepared.',
                    'Safety briefing and gentle takeoff as the sun rises.',
                ],
            ],
            [
                'day_number' => 2,
                'title' => 'Scenic Flight & Breakfast',
                'content' => [
                    'Float peacefully over Marrakech and surrounding countryside.',
                    'Enjoy stunning views of the Atlas Mountains and palm groves.',
                    'After landing, enjoy a delicious Moroccan breakfast in a serene setting.',
                    'Receive a flight certificate as a memento before returning to your hotel.',
                ],
            ],
        ]);
        /**
         * ✅ 6. coockin class 
         */
        $cookingClass = Activity::create([
            'title' => 'Marrakech Cooking Class: Unleash Your Inner Chef',
            'slug' => Str::slug('Marrakech Cooking Class: Unleash Your Inner Chef'),
            'overview' => 'Immerse yourself in the culinary traditions of Morocco with a hands-on Marrakech Cooking Class. Learn to prepare authentic dishes like tagines and couscous under the guidance of expert local chefs. Choose from private or shared options with hotel pickup included.',
            'duration' => '3.5 Hours',
            'group_size' => 2,
            'age_range' => 'All ages',
            'base_price' => 600,
            'bestseller_flag' => false,
            'free_cancellation_flag' => true,
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18..." width="600" height="450" style="border:0;" allowfullscreen loading="lazy"></iframe>',
            'category_id' => 3,
            'location_id' => 1,
            'languages' => ['English', 'French', 'Spanish'],
            'highlights' => [
                'Hands-on Moroccan cooking class with expert chefs',
                'Prepare traditional dishes like tagines and couscous',
                'Choose between private or shared class formats',
                'Enjoy a delicious meal with Moroccan mint tea',
                'Includes hotel pickup and drop-off in Marrakech',
            ],
            'included' => [
                'All ingredients and cooking equipment',
                'Guided instruction by professional chef',
                'Hotel pick-up and drop-off',
                'Meal with dishes prepared during the class',
                'Traditional Moroccan mint tea',
            ],
            'excluded' => [
                'Personal expenses',
                'Tips for guide/chef',
                'Alcoholic beverages',
            ],
        ]);

        /**
         * ✅ 7. Explore Marrakech's Gastronomic Delights on a Half-Day Food Tour
         */
        $foodTour = Activity::create([
            'title' => "Explore Marrakech's Gastronomic Delights on a Half-Day Food Tour",
            'slug' => Str::slug("Explore Marrakech's Gastronomic Delights on a Half-Day Food Tour"),
            'overview' => 'Embark on a captivating culinary journey through Marrakech with our half-day food tour. Led by a licensed and passionate guide, you’ll discover the vibrant flavors, history, and cultural stories behind Morocco’s most iconic dishes through guided tastings and a delicious meal.',
            'duration' => '4 Hours',
            'group_size' => 8,
            'age_range' => '10+',
            'base_price' => 400,
            'bestseller_flag' => true,
            'free_cancellation_flag' => true,
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18..." width="600" height="450" style="border:0;" allowfullscreen loading="lazy"></iframe>',
            'category_id' => 3, // Cultural Tours
            'location_id' => 1, // Marrakech
            'languages' => ['English', 'French', 'Spanish'],
            'highlights' => [
                'Over 6 food tasting stops featuring Moroccan classics',
                'Expert local guide with culinary insights and stories',
                'A delicious main meal of traditional Moroccan dishes',
                'Explore local markets and hidden gems',
                'Learn about the ingredients, spices, and food culture of Marrakech',
            ],
            'included' => [
                'Hotel pick-up and drop-off',
                'Licensed local culinary guide',
                'Over 6 tasting stops',
                'Main meal with traditional Moroccan dishes',
            ],
            'excluded' => [
                'Personal expenses and souvenirs',
                'Tips for the guide (optional)',
            ],
        ]);

        $foodTour->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Culinary Exploration & Tastings',
                'content' => [
                    'Meet your guide and begin your journey through Marrakech’s food scene.',
                    'Enjoy over 6 curated tasting stops from authentic local stalls and vendors.',
                    'Learn about the history and preparation of traditional Moroccan dishes.',
                ],
            ],
            [
                'day_number' => 1,
                'title' => 'Main Meal & Cultural Insights',
                'content' => [
                    'Sit down for a full traditional meal featuring tagines, couscous, or other seasonal dishes.',
                    'Engage in conversation with your guide and fellow foodies, and ask questions about Moroccan gastronomy.',
                    'Wrap up with a sweet Moroccan pastry and mint tea before your return transfer.',
                ],
            ],
        ]);
        /**
         * ✅ 8. Relax and Rejuvenate with Marrakech Hammam and Massage Experience
         */
        $hammamMassage = Activity::create([
            'title' => 'Relax and Rejuvenate with Marrakech Hammam and Massage Experience',
            'slug' => Str::slug('Relax and Rejuvenate with Marrakech Hammam and Massage Experience'),
            'overview' => 'Indulge in a blissful retreat with Local Morocco Tours. This rejuvenating hammam and massage experience blends ancient Moroccan bathing rituals with soothing massage therapy, all set in a tranquil and serene environment.',
            'duration' => '2 Hours',
            'group_size' => 4,
            'age_range' => '16+',
            'base_price' => 450,
            'bestseller_flag' => true,
            'free_cancellation_flag' => true,
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18..." width="600" height="450" style="border:0;" allowfullscreen loading="lazy"></iframe>',
            'category_id' => 4, // Wellness & Spa
            'location_id' => 1, // Marrakech
            'languages' => ['English', 'French', 'Spanish'],
            'highlights' => [
                'Traditional hammam session with warm steam and black soap exfoliation',
                'Invigorating scrub with traditional Moroccan products',
                'Tailored massage session with aromatic oils',
                'Serene and relaxing spa atmosphere',
                'Perfect wellness escape from the city bustle',
            ],
            'included' => [
                'Hotel pickup and drop-off',
                'Traditional hammam bathing session',
                'Black soap exfoliation scrub',
                'Soothing massage with Moroccan oils',
                'Relaxing ambiance and tea service',
            ],
            'excluded' => [
                'Personal expenses and souvenirs',
                'Optional gratuities',
            ],
        ]);

        $hammamMassage->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Arrival & Hammam Ritual',
                'content' => [
                    'Pickup from your hotel and welcome at the wellness spa.',
                    'Begin your traditional hammam session with steam and aromatic oils.',
                    'Enjoy a full-body exfoliation using black soap and kessa glove.',
                ],
            ],
            [
                'day_number' => 1,
                'title' => 'Massage & Relaxation',
                'content' => [
                    'Unwind with a full-body massage tailored to your needs.',
                    'Fragrant Moroccan oils enhance the massage experience.',
                    'Relax with a cup of mint tea in a tranquil environment before return transfer.',
                ],
            ],
        ]);
        /**
         * ✅ 9. Explore Marrakech’s Jewish Heritage on a Full-Day Tour
         */
        $jewishHeritageTour = Activity::create([
            'title' => 'Explore Marrakech’s Jewish Heritage on a Full-Day Tour',
            'slug' => Str::slug('Explore Marrakech’s Jewish Heritage on a Full-Day Tour'),
            'overview' => 'Embark on an enriching journey through Marrakech\'s Jewish heritage on our full-day tour. As you explore the city\'s hidden gems and historical sites, you\'ll gain a deeper understanding of the significant Jewish presence in Marrakech throughout the centuries.',
            'duration' => '8 Hours',
            'group_size' => 12,
            'age_range' => 'All ages',
            'base_price' => null,
            'bestseller_flag' => false,
            'free_cancellation_flag' => true,
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18..." width="600" height="450" style="border:0;" allowfullscreen loading="lazy"></iframe>',
            'category_id' => 1,
            'location_id' => 1,
            'languages' => ['English', 'French', 'Spanish'],
            'highlights' => [
                'Explore the historic Mellah district, the old Jewish quarter of Marrakech',
                'Visit beautifully preserved synagogues and the Jewish cemetery',
                'Enjoy a traditional kosher meal in a local restaurant',
                'Discover the vibrant souks and artisan markets with Jewish influence',
                'Engage with local artisans and learn about Jewish contributions to Marrakech culture',
            ],
            'included' => [
                'Professional and knowledgeable guide',
                'Guided tours of synagogues, Mellah district, and Jewish cemetery',
                'Transportation during the tour',
                'Kosher meal at a traditional restaurant',
                'Hotel pick-up and drop-off',
            ],
            'excluded' => [
                'Personal expenses and souvenirs',
                'Gratuities for the tour guide (optional)',
                'Travel insurance',
            ],
        ]);

        $jewishHeritageTour->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Morning Exploration of the Mellah District',
                'content' => [
                    'Pick-up from your Marrakech riad or hotel between 8:00–10:00 am.',
                    'Walk through the Mellah district, once home to a thriving Jewish community.',
                    'Visit the historic synagogues and discover their significance.',
                ],
            ],
            [
                'day_number' => 1,
                'title' => 'Kosher Lunch & Artisan Visit',
                'content' => [
                    'Enjoy a traditional kosher meal at a local restaurant.',
                    'Engage with local artisans and witness their craftsmanship.',
                    'Visit the Jewish cemetery for a moment of reflection and history.',
                ],
            ],
            [
                'day_number' => 1,
                'title' => 'Afternoon Market Exploration & Return',
                'content' => [
                    'Stroll through the vibrant souks influenced by Jewish culture.',
                    'Learn about Jewish merchants\' roles in Marrakech\'s trade.',
                    'Return transfer to your accommodation by late afternoon.',
                ],
            ],
        ]);

        /**
         * ✅ 10. Discover the Best of Hidden Gems of Marrakech Medina
         */
        $medinaTour = Activity::create([
            'title' => 'Discover the Best of Hidden Gems of Marrakech Medina',
            'slug' => Str::slug('Discover the Best of Hidden Gems of Marrakech Medina'),
            'overview' => 'Embark on a remarkable journey through the enchanting Marrakech Medina with our expertly crafted half-day guided tour. Local Morocco Tours invites you to dive into the heart of this ancient city and immerse yourself in its vibrant atmosphere. Unveil the hidden gems, witness the colorful sights, and experience the soul of Marrakech like a true local.',
            'duration' => '4 Hours',
            'group_size' => 10,
            'age_range' => 'All ages',
            'base_price' => null,
            'bestseller_flag' => false,
            'free_cancellation_flag' => true,
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18..." width="600" height="450" style="border:0;" allowfullscreen loading="lazy"></iframe>',
            'category_id' => 1,
            'location_id' => 1,
            'languages' => ['English', 'French', 'Spanish'],
            'highlights' => [
                'Explore the winding streets and souks of the historic Marrakech Medina',
                'Visit iconic sites like Bahia Palace and Koutoubia Mosque',
                'Experience the colors, aromas, and energy of local markets',
                'Enjoy Moroccan mint tea and pastries at a traditional tea house',
                'Witness street performers and cultural displays in Djemaa el-Fna',
            ],
            'included' => [
                'Knowledgeable local guide',
                'Hotel pick-up and drop-off if needed',
                'Guided walking tour of the Medina and historic monuments',
                'Visit to Bahia Palace and Koutoubia Mosque',
                'Tea break in a traditional Moroccan tea house',
                'Experience of the vibrant Djemaa el-Fna square',
            ],
            'excluded' => [
                'Personal expenses and souvenirs',
                'Gratuities for the guide (optional)',
                'Travel insurance',
            ],
        ]);

        $medinaTour->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Morning Exploration of the Medina',
                'content' => [
                    'Pick-up from your riad or hotel and meet your local guide.',
                    'Begin your walking tour through the narrow alleys of Marrakech Medina.',
                    'Browse colorful souks filled with spices, textiles, leather goods, and handicrafts.',
                ],
            ],
            [
                'day_number' => 1,
                'title' => 'Visit Landmarks & Cultural Break',
                'content' => [
                    'Visit the iconic Bahia Palace and admire its intricate designs and gardens.',
                    'Admire the architecture of Koutoubia Mosque and hear its historical significance.',
                    'Stop for mint tea and pastries in a traditional Moroccan tea house.',
                ],
            ],
            [
                'day_number' => 1,
                'title' => 'Djemaa el-Fna Experience & Return',
                'content' => [
                    'Conclude the tour at Djemaa el-Fna square, observing street performers and local life.',
                    'Enjoy free time for shopping or photography.',
                    'Optional transfer back to your hotel or continue exploring on your own.',
                ],
            ],
        ]);
        /**
         * ✅ 11. Explore Marrakech Palmeries on a Thrilling 2-Hour Quad Excursion or Buggy Ride
         */
        $quadBuggyTour = Activity::create([
            'title' => 'Explore Marrakech Palmeries on a Thrilling 2-Hour Quad Excursion or Buggy Ride',
            'slug' => Str::slug('Explore Marrakech Palmeries on a Thrilling 2-Hour Quad Excursion or Buggy Ride'),
            'overview' => 'Get ready for an adrenaline-fueled adventure in the picturesque Palmeries of Marrakech with Local Morocco Tours. Choose between a 2-hour quad excursion or buggy ride and immerse yourself in the stunning natural beauty of this desert oasis.',
            'duration' => '2 Hours',
            'group_size' => 10,
            'age_range' => 'All ages (Minors must be accompanied)',
            'base_price' => null,
            'bestseller_flag' => true,
            'free_cancellation_flag' => true,
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18..." width="600" height="450" style="border:0;" allowfullscreen loading="lazy"></iframe>',
            'category_id' => 2, // Adventure & Trekking
            'location_id' => 1,
            'languages' => ['English', 'French', 'Spanish'],
            'highlights' => [
                '2-hour guided quad bike or buggy adventure in Marrakech Palmeries',
                'Drive through rugged trails, palm groves, and desert terrain',
                'Enjoy panoramic views and thrilling off-road moments',
                'No prior experience required – full safety briefing provided',
                'Choose between a powerful quad or a stable buggy',
            ],
            'included' => [
                'Experienced guide',
                'Safety briefing and vehicle instructions',
                'Quad or buggy rental',
                'Protective gear (helmet, goggles)',
                'Fuel for the excursion',
                'Hotel pickup and drop-off',
            ],
            'excluded' => [
                'Personal expenses and souvenirs',
                'Gratuities for the guide (optional)',
            ],
        ]);

        $quadBuggyTour->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Arrival and Preparation',
                'content' => [
                    'Hotel pick-up and transfer to Palmeries meeting point.',
                    'Meet your experienced guide for a full safety briefing.',
                    'Choose between quad bike or buggy. Gear up with helmet and goggles.',
                ],
            ],
            [
                'day_number' => 1,
                'title' => '2-Hour Off-Road Adventure',
                'content' => [
                    'Begin your thrilling ride through rugged terrain and palm groves.',
                    'Navigate sandy paths and dirt tracks with the guidance of your instructor.',
                    'Enjoy scenic stops to take in the desert views and take pictures.',
                ],
            ],
            [
                'day_number' => 1,
                'title' => 'Wrap-Up and Return',
                'content' => [
                    'Conclude your ride and return the gear.',
                    'Transfer back to your hotel with unforgettable memories.',
                ],
            ],
        ]);
        /**
         * ✅ 12. Discover the Beauty of Menara Gardens and Majorelle Gardens on a Guided Half-Day Tour
         */
        $gardensTour = Activity::create([
            'title' => 'Discover the Beauty of Menara Gardens and Majorelle Gardens on a Guided Half-Day Tour',
            'slug' => Str::slug('Discover the Beauty of Menara Gardens and Majorelle Gardens on a Guided Half-Day Tour'),
            'overview' => 'Immerse yourself in the captivating beauty of Marrakech\'s Menara Gardens and Majorelle Gardens on a half-day guided tour. Discover the serene landscapes, vibrant flora, and cultural significance of these iconic gardens with Local Morocco Tours.',
            'duration' => '4 Hours',
            'group_size' => 12,
            'age_range' => 'All ages',
            'base_price' => null,
            'bestseller_flag' => false,
            'free_cancellation_flag' => true,
            'map_frame' => '<iframe src="https://www.google.com/maps/d/embed?mid=1-E7nPaGAdH5zXBPHe1gLbF8LoAY&hl=en" width="600" height="450" style="border:0;" allowfullscreen loading="lazy"></iframe>',
            'category_id' => 5, // City Excursions
            'location_id' => 1,
            'languages' => ['English', 'French', 'Spanish'],
            'highlights' => [
                'Explore the tranquil Menara Gardens with stunning views of the Atlas Mountains',
                'Visit the famous Majorelle Gardens with its vivid blue buildings and exotic plants',
                'Learn about the history and design from a knowledgeable local guide',
                'Enjoy a half-day cultural escape in the heart of Marrakech',
                'Discover the legacy of Yves Saint Laurent and Jacques Majorelle',
            ],
            'included' => [
                'Professional local guide',
                'Entry fees to Menara and Majorelle Gardens',
                'Insightful guided commentary on plants, architecture, and history',
                'Hotel pickup and drop-off',
            ],
            'excluded' => [
                'Personal expenses and souvenirs',
                'Gratuities for the tour guide (optional)',
            ],
        ]);

        $gardensTour->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Explore Menara Gardens',
                'content' => [
                    'Meet your guide at your hotel and head to the historic Menara Gardens.',
                    'Stroll past olive groves and enjoy panoramic views of the reflecting pool and Atlas Mountains.',
                    'Learn about the origins of the gardens and their use by sultans for centuries.',
                ],
            ],
            [
                'day_number' => 1,
                'title' => 'Visit Majorelle Gardens',
                'content' => [
                    'Continue the journey to the Majorelle Gardens, designed by French artist Jacques Majorelle.',
                    'Admire the signature cobalt blue buildings and explore lush exotic plant collections.',
                    'Discover the history of the garden’s restoration by Yves Saint Laurent and its blend of Moorish and Art Deco architecture.',
                ],
            ],
            [
                'day_number' => 1,
                'title' => 'Conclusion and Return',
                'content' => [
                    'Wrap up the tour with a short commentary on the cultural impact of both gardens.',
                    'Transfer back to your hotel with new knowledge and photo memories.',
                ],
            ],
        ]);
    }
}
