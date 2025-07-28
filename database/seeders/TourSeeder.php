<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Tour;
use App\Models\TourCategory;
use App\Models\Location;

class TourSeeder extends Seeder
{
    public function run(): void
    {
        // marrakech tours start
        $categoryId = TourCategory::where('slug', 'marrakech-desert-tours')->value('id');
        $locationId = Location::where('name', 'Marrakech')->value('id');

        $agadirTour = Tour::create([
            'title' => '2-Day Tour from Marrakech to Agadir: Coastal Exploration',
            'slug' => Str::slug('2-Day Tour from Marrakech to Agadir: Coastal Exploration'),
            'type' => 'multi_day',
            'duration' => '2 Days',
            'group_size' => 'Flexible',
            'age_range' => 'All ages',
            'base_price' => 0,
            'bestseller_flag' => false,
            'free_cancellation_flag' => true,
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?pb=..." width="655" height="548" frameborder="0" style="border:0" allowfullscreen></iframe>',
            'overview' => 'We provide a two-day Marrakech package to Agadir on the Atlantic coast, offering a combination of culture, coastal charm, and relaxation. Travelers will experience scenic drives through the Atlas Mountains, explore local Berber villages, and enjoy the seaside ambiance of Agadir. The tour includes visits to Kasbah Agadir Oufella, Souk El Had, artisan workshops, and free time at the beach. It’s a perfect short escape from Marrakech for those seeking a mix of discovery and leisure.',
            'highlights' => json_encode([
                'Visit Kasbah Agadir Oufella',
                'Local Souk El Had',
                'Agadir Medina',
                'Beach relaxation',
                'Scenic drive through Atlas Mountains'
            ]),
            'included' => json_encode([
                'All hotel pick up transfers',
                'Travel in comfort and privacy in an A/C car',
                'Experienced local tour guide',
                'Dinners and breakfasts',
                'Drop off at your accommodation at the conclusion of the tour',
            ]),
            'excluded' => json_encode([
                'Lunches and soft drinks',
                'Admission fees and gratuities'
            ]),
            'languages' => json_encode(['English', 'Spanish', 'French']),
            'category_id' => $categoryId,
            'location_id' => $locationId,
        ]);

        $agadirTour->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Day 1: Marrakech to Agadir',
                'content' => json_encode([
                    'Pickup in Marrakech and drive through Atlas Mountains',
                    'Visit Agadir’s Kasbah, fishing port, and souk',
                    'Free time in the Medina and overnight in hotel/riad',
                ]),
            ],
            [
                'day_number' => 2,
                'title' => 'Day 2: Agadir - Return to Marrakech',
                'content' => json_encode([
                    'Morning visit to Medina and artisan studios',
                    'Free time at the beach',
                    'Return to Marrakech in the evening',
                ]),
            ],
        ]);

        $agadirEssaouiraTour = Tour::create([
            'title' => '2-Day Tour from Marrakech to Ait Agadir and Essaouira: Discover Coastal Morocco',
            'slug' => Str::slug('2-Day Tour from Marrakech to Ait Agadir and Essaouira: Discover Coastal Morocco'),
            'type' => 'multi_day',
            'duration' => '2 Days',
            'group_size' => 'Flexible',
            'age_range' => 'All ages',
            'base_price' => 0,
            'bestseller_flag' => false,
            'free_cancellation_flag' => true,
            'map_frame' => '',
            'overview' => 'We provide Atlantic coast tours and true Berber cultural experiences with local guides. This two-day journey from Marrakech includes a scenic drive through the High Atlas, a visit to the UNESCO-listed Ait Benhaddou, and exploration of Ouarzazate’s film studios. Enjoy the charm of Essaouira’s old Medina and Argan oil cooperatives before returning to Marrakech. It’s a balanced blend of heritage, nature, and relaxation perfect for travelers short on time but eager to explore.',
            'highlights' => json_encode([
                "Tizi n'Tichka pass in the High Atlas Mountains",
                "UNESCO-listed Ait Benhaddou Kasbah",
                "Ouarzazate film studios",
                "Kasbah Taourirt visit",
                "Optional quad activities"
            ]),
            'included' => json_encode([
                'All hotel pick up transfers',
                'Travel in comfort and privacy in an A/C car',
                'Experienced local tour guide',
                'Dinners and breakfasts',
                'Drop off at your accommodation at the conclusion of the tour',
            ]),
            'excluded' => json_encode([
                'Lunches and soft drinks',
                'Admission fees and gratuities'
            ]),
            'languages' => json_encode(['English', 'Spanish', 'French']),
            'category_id' => $categoryId,
            'location_id' => $locationId,
        ]);

        $agadirEssaouiraTour->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Day 1: Marrakech - Agadir',
                'content' => json_encode([
                    'Pickup from your Marrakech hotel or riad',
                    'Drive to Agadir via scenic route',
                    'Visit Kasbah and souks, free beach time',
                    'Overnight stay in Agadir',
                ]),
            ],
            [
                'day_number' => 2,
                'title' => 'Day 2: Agadir - Essaouira - Marrakech',
                'content' => json_encode([
                    'Drive to Essaouira, visit Unesco Medina and Argan cooperative',
                    'Free time and lunch in Essaouira',
                    'Return to Marrakech in the evening',
                ]),
            ],
        ]);

        $ouarzazateTour = Tour::create([
            'title' => "2-Day Tour from Marrakech to Ait Benhaddou and Ouarzazate: Discover Morocco's Cultural Treasures",
            'slug' => Str::slug("2-Day Tour from Marrakech to Ait Benhaddou and Ouarzazate: Discover Morocco's Cultural Treasures"),
            'type' => 'multi_day',
            'duration' => '2 Days',
            'group_size' => 'Flexible',
            'age_range' => 'All ages',
            'base_price' => 0,
            'bestseller_flag' => false,
            'free_cancellation_flag' => true,
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?pb=!1m34!1m12!1m3!1d872961.5763546523!2d-8.01653935126496!3d31.275924890252767!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m19!3e0!4m5!1s0xdafee8d96179e51%3A0x5950b6534f87adb8!2sMarrakesh!3m2!1d31.6294723!2d-7.9810845!4m5!1s0xdbae06120411439%3A0x4d090f64a0ec123a!2sA%C3%AFt+Benhaddou!3m2!1d31.047043!2d-7.1318996!4m5!1s0xdbb104077422057%3A0x26b3cb529b37ab00!2sOuarzazate!3m2!1d30.9335436!2d-6.937016!5e0!3m2!1sen!2sma!4v1555330625659!5m2!1sen!2sma" width="655" height="548" frameborder="0" style="border:0" allowfullscreen></iframe>',
            'overview' => "We provide private tours from Marrakech including transportation in comfortable vehicles and an English-speaking local guide. Discover the magic of Morocco's south with a scenic drive through the High Atlas Mountains, guided exploration of the UNESCO-listed Ait Benhaddou, and an overnight stay in Ouarzazate. On day two, visit the famous film studios and Kasbah Taourirt before returning to Marrakech via mountain roads. This short cultural adventure is ideal for history lovers and photography enthusiasts.",
            'highlights' => json_encode([
                "Tizi n'Tichka pass in the High Atlas Mountains",
                "UNESCO-listed Ait Benhaddou Kasbah",
                "Ouarzazate film studios",
                "Kasbah Taourirt visit",
                "Optional quad activities"
            ]),
            'included' => json_encode([
                'All hotel pick up transfers',
                'Travel in comfort and privacy in an A/C car',
                'Experienced local tour guide',
                'Dinners and breakfasts',
                'Drop off at your accommodation at the conclusion of the tour',
            ]),
            'excluded' => json_encode([
                'Lunches and soft drinks',
                'Admission fees and gratuities',
            ]),
            'languages' => json_encode(['English', 'Spanish', 'French']),
            'category_id' => $categoryId,
            'location_id' => $locationId,
        ]);

        $ouarzazateTour->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Day 1: Marrakech - Ait Benhaddou - Ouarzazate',
                'content' => json_encode([
                    'Departure from your hotel or riad in Marrakech after breakfast.',
                    'Drive through Tizi n\'Tichka in the High Atlas Mountains.',
                    'Guided visit to Ait Benhaddou kasbah – a UNESCO World Heritage Site.',
                    'Free afternoon and transfer to Ouarzazate.',
                    'Overnight in hotel or riad near Ouarzazate.',
                ]),
            ],
            [
                'day_number' => 2,
                'title' => 'Day 2: Ouarzazate - Marrakech',
                'content' => json_encode([
                    'Visit Taourirt Kasbahs and optional tour of film studios.',
                    'Free time or optional quad activity.',
                    'Drive back to Marrakech through Atlas Mountains.',
                    'Drop-off at your accommodation.',
                ]),
            ],
        ]);

        $casablancaRabatTour = Tour::create([
            'title' => '2-Day Tour from Marrakech to Casablanca and Rabat: Explore Morocco\'s Capital Cities',
            'slug' => Str::slug('2-Day Tour from Marrakech to Casablanca and Rabat: Explore Morocco\'s Capital Cities'),
            'type' => 'multi_day',
            'duration' => '2 Days',
            'group_size' => 'Flexible',
            'age_range' => 'All ages',
            'base_price' => 0,
            'bestseller_flag' => false,
            'free_cancellation_flag' => true,
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?pb=!1m34!1m12!1m3!1d1717140.277758049!2d-8.558026515960275!3d32.79783752015477!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m19!3e0!4m5!1s0xdafee8d96179e51%3A0x5950b6534f87adb8!2sMarrakesh!3m2!1d31.6294723!2d-7.9810845!4m5!1s0xda7cd4778aa113b%3A0xb06c1d84f310fd3!2sCasablanca!3m2!1d33.5731104!2d-7.5898433999999995!4m5!1s0xda76b871f50c5c1%3A0x7ac946ed7408076b!2sRabat!3m2!1d33.9715904!2d-6.8498129!5e0!3m2!1sen!2sma!4v1555330790927!5m2!1sen!2sma" width="655" height="548" frameborder="0" style="border:0" allowfullscreen></iframe>',
            'overview' => "This two-day excursion from Marrakech to Rabat via Casablanca offers a rich introduction to Morocco's capital cities. You'll explore iconic landmarks such as Hassan Tower, Mohammed V's Mausoleum, and the Udayas Kasbah in Rabat. In Casablanca, enjoy guided visits to the famous Hassan II Mosque, United Nations Square, and the oceanfront Corniche. This is a perfect blend of culture, architecture, and coastal charm ideal for history and city lovers alike.",
            'highlights' => json_encode([
                "Hassan II Mosque in Casablanca",
                "United Nations Square",
                "Casablanca Corniche",
                "Hassan Tower in Rabat",
                "Mausoleum of Mohammed V",
                "Udayas Kasbah",
                "Royal Palace of Rabat"
            ]),
            'included' => json_encode([
                'All hotel pick up transfers',
                'Travel in comfort and privacy in an A/C car',
                'Experienced local tour guide',
                'Dinners and breakfasts',
                'Drop off at your accommodation at the conclusion of the tour',
            ]),
            'excluded' => json_encode([
                'Lunches and soft drinks',
                'Admission fees and gratuities',
            ]),
            'languages' => json_encode(['English', 'Spanish', 'French']),
            'category_id' => $categoryId,
            'location_id' => $locationId,
        ]);


        $casablancaRabatTour->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Day 1: Marrakech - Casablanca - Rabat',
                'content' => json_encode([
                    'Pickup from your hotel or riad in Marrakech.',
                    'Drive to Casablanca and explore historical landmarks.',
                    'Visit United Nations Square, the central market, and Royal Palace.',
                    'Tour the famous Hassan II Mosque and walk along the Corniche.',
                    'Transfer to Rabat and enjoy a free evening. Overnight stay at a local riad.',
                ]),
            ],
            [
                'day_number' => 2,
                'title' => 'Day 2: Rabat Sightseeing and Return to Marrakech',
                'content' => json_encode([
                    'Morning visit to the Udayas Kasbah and local museum.',
                    'Explore the Royal Palace and Mausoleum of Mohammed V.',
                    'Walk to the Atlantic Ocean shoreline and visit Hassan Tower.',
                    'Afternoon return to Marrakech with drop-off at your accommodation.',
                ]),
            ],
        ]);

        $essaouiraTour = Tour::create([
            'title' => 'Marrakech Atlantic Coast Tour with Private Transfers: A 2-Day Tour from Marrakech to Essaouira',
            'slug' => Str::slug('Marrakech Atlantic Coast Tour with Private Transfers: A 2-Day Tour from Marrakech to Essaouira'),
            'type' => 'multi_day',
            'duration' => '2 Days',
            'group_size' => 'Flexible',
            'age_range' => 'All ages',
            'base_price' => 0,
            'bestseller_flag' => false,
            'free_cancellation_flag' => true,
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d840826.8715248782!2d-5.827771971548679!3d34.59202278851181!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e0!4m5!1s0xdafee8d96179e51%3A0x5950b6534f87adb8!2sMarrakesh!3m2!1d31.6294723!2d-7.9810845!4m5!1s0xdad9a4e9f588ccf%3A0x57421a176d5d7d30!2sEssaouira!3m2!1d31.5084926!2d-9.7595041!5e0!3m2!1sen!2sma!4v1555329450160!5m2!1sen!2sma" width="655" height="548" frameborder="0" style="border:0" allowfullscreen></iframe>',
            'overview' => 'This two-day excursion from Marrakech to Essaouira lets you experience the best of the Atlantic coast, including ancient Mogador, the historic medina, and the fishing port. Essaouira is a UNESCO World Heritage Site full of charm and culture. Walk along the sandy beaches, visit a local Argan oil cooperative, and enjoy the laid-back seaside vibe with guided visits and plenty of free time to explore.',
            'highlights' => json_encode([
                'Visit to Argan oil cooperative',
                'Ancient Mogador city',
                'Essaouira medina (UNESCO)',
                'Essaouira fishing port',
                'Ramparts and Moulay El-Hassan Square',
                'Siaghine Alley',
                'Beach relaxation'
            ]),
            'included' => json_encode([
                'All hotel pick up transfers',
                'Travel in comfort and privacy in an A/C car',
                'Experienced local tour guide',
                'Dinners and breakfasts',
                'Drop off at your accommodation at the conclusion of the tour',
            ]),
            'excluded' => json_encode([
                'Lunches and soft drinks',
                'Admission fees and gratuities',
            ]),
            'languages' => json_encode(['English', 'Spanish', 'French']),
            'category_id' => $categoryId,
            'location_id' => $locationId,
        ]);

        $essaouiraTour->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Day 1: Marrakech - Essaouira',
                'content' => json_encode([
                    'Pickup from your hotel or riad in Marrakech.',
                    'Drive toward Essaouira with a stop at an Argan oil cooperative.',
                    'Arrive in Essaouira and visit the Medina and city port.',
                    'Enjoy your free afternoon and explore at your own pace.',
                    'Overnight stay in a local riad or hotel.',
                ]),
            ],
            [
                'day_number' => 2,
                'title' => 'Day 2: Essaouira - Marrakech',
                'content' => json_encode([
                    'Relax on the beach or enjoy a walk along the ramparts.',
                    'Visit Moulay El-Hassan Square and stroll through Siaghine Alley.',
                    'Explore Essaouira\'s medina and main attractions.',
                    'Return transfer to Marrakech and drop-off at your accommodation.',
                ]),
            ],
        ]);

        $merzougaTour = Tour::create([
            'title' => '2-Day Tour from Marrakech to Merzouga Desert: Discover Sahara Magic',
            'slug' => Str::slug('2-Day Tour from Marrakech to Merzouga Desert: Discover Sahara Magic'),
            'type' => 'multi_day',
            'duration' => '2 Days',
            'group_size' => 'Flexible',
            'age_range' => 'All ages',
            'base_price' => 0,
            'bestseller_flag' => false,
            'free_cancellation_flag' => true,
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?pb=..." width="655" height="548" frameborder="0" style="border:0"></iframe>',
            'overview' => 'This two-day tour from Marrakech to Merzouga takes you through the High Atlas, Dades Valley, and Sahara Desert. Ride camels across Erg Chebbi dunes, sleep under the stars in a Berber camp, and explore Morocco’s kasbahs and oases with experienced local guides.',
            'highlights' => json_encode([
                "Tizi N'Tichka Pass (High Atlas)",
                "Ait Benhaddou (UNESCO)",
                "Ouarzazate film studios",
                "Dades and Todra Gorges",
                "Camel trek in Erg Chebbi dunes",
                "Berber music around campfire",
                "Sunrise over Sahara"
            ]),
            'included' => json_encode([
                'Transfers from/to the airport/hotels',
                'Private transportation in a spacious and air-conditioned car',
                'Experienced local tour guide',
                'Includes all dinners and breakfasts',
                'A night in Sahara Camp',
                'Desert guide',
            ]),
            'excluded' => json_encode([
                'Lunches and soft drinks',
                'Admission fees and gratuities',
            ]),
            'languages' => json_encode(['English', 'Spanish', 'French']),
            'category_id' => $categoryId,
            'location_id' => $locationId,
        ]);

        $merzougaTour->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Day 1: Marrakech - High Atlas - Dades - Merzouga (Camel Ride & Camp)',
                'content' => json_encode([
                    'Pickup from your Marrakech hotel or riad.',
                    'Drive across the Tizi N\'Tichka Pass in the High Atlas Mountains.',
                    'Visit the UNESCO Ait Benhaddou Kasbah with a local guide.',
                    'Continue through Ouarzazate and the Dades Valley.',
                    'Explore Todra Gorge, pass through Tinghir and Erfoud.',
                    'Arrive in Merzouga and begin camel trek to Erg Chebbi dunes.',
                    'Dinner and Berber music under the stars at Sahara camp.',
                ]),
            ],
            [
                'day_number' => 2,
                'title' => 'Day 2: Merzouga - Agdz - Marrakech',
                'content' => json_encode([
                    'Watch the sunrise over the Sahara Desert.',
                    'Camel ride back to Merzouga village.',
                    'Drive through Berber villages: Alnif, Tazarine, N\'kob.',
                    'Pass through Agdz and return via the Atlas Mountains.',
                    'Evening drop-off at your Marrakech accommodation.',
                ]),
            ],
        ]);

        $zagoraTour = Tour::create([
            'title' => '2-Day Tour from Marrakech to Zagora Desert: Draa Valley & Camel Camp Experience',
            'slug' => Str::slug('2-Day Tour from Marrakech to Zagora Desert: Draa Valley & Camel Camp Experience'),
            'type' => 'multi_day',
            'duration' => '2 Days',
            'group_size' => 'Flexible',
            'age_range' => 'All ages',
            'base_price' => 0,
            'bestseller_flag' => false,
            'free_cancellation_flag' => true,
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?pb=..." width="655" height="548" frameborder="0" style="border:0" allowfullscreen></iframe>',
            'overview' => 'This two-day journey from Marrakech to Zagora offers a magical Sahara experience. Travel through the High Atlas Mountains, explore the Draa Valley and Ait Benhaddou, ride camels to a desert camp in Zagora, and enjoy Berber hospitality under the stars.',
            'highlights' => json_encode([
                'High Atlas Mountains via Tizi n\'Tichka Pass',
                'Ait Benhaddou Kasbah (UNESCO)',
                'Taourirt Kasbah in Ouarzazate',
                'Scenic drive through Draa Valley',
                'Camel trek to Zagora dunes',
                'Overnight stay in desert camp',
                'Berber music and campfire experience'
            ]),
            'included' => json_encode([
                'Transfers from/to the airport/hotels',
                'Private transportation in a spacious and air-conditioned car',
                'Experienced local tour guide',
                'Includes all dinners and breakfasts',
                'A night in Zagora Sahara Camp',
            ]),
            'excluded' => json_encode([
                'Lunches and soft drinks',
                'Admission fees and gratuities',
            ]),
            'languages' => json_encode(['English', 'Spanish', 'French']),
            'category_id' => $categoryId,
            'location_id' => $locationId,
        ]);

        $zagoraTour->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Day 1: Marrakech - Ouarzazate - Zagora (Camel Ride & Desert Camp)',
                'content' => json_encode([
                    'Depart from Marrakech, crossing the Tizi n\'Tichka Pass in the High Atlas Mountains.',
                    'Visit Ait Benhaddou Kasbah (UNESCO) and Taourirt Kasbah in Ouarzazate.',
                    'Drive along the Draa Valley, passing through Agdz.',
                    'Arrive in Zagora and enjoy a camel ride to the desert camp.',
                    'Dinner and Berber music at the camp under the stars.',
                    'Overnight in your selected desert bivouac.',
                ]),
            ],
            [
                'day_number' => 2,
                'title' => 'Day 2: Zagora - Draa Valley - Ait Benhaddou - Marrakech',
                'content' => json_encode([
                    'Watch the sunrise over the dunes and ride camels back to Zagora.',
                    'After breakfast, begin the return journey to Marrakech.',
                    'Stop again at Ait Benhaddou for a guided walk through the ksar.',
                    'Drive across the High Atlas Mountains via Tizi n\'Tichka Pass.',
                    'Evening drop-off at your accommodation in Marrakech.',
                ]),
            ],
        ]);

        $chigagaTour = Tour::create([
            'title' => '3-Day Sahara Desert Adventure from Marrakech to Erg Chigaga with Private Transfers',
            'slug' => Str::slug('3-Day Sahara Desert Adventure from Marrakech to Erg Chigaga with Private Transfers'),
            'type' => 'multi_day',
            'duration' => '3 Days',
            'group_size' => 'Flexible',
            'age_range' => 'All ages',
            'base_price' => 0,
            'bestseller_flag' => false,
            'free_cancellation_flag' => true,
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?..."></iframe>',
            'overview' => 'Experience the vast Erg Chigaga dunes with this 3-day adventure from Marrakech. Visit Ait Benhaddou, Ouarzazate, and the Draa Valley. Ride camels across desert sands, explore Berber villages, and spend nights in authentic riads and a luxury Sahara camp.',
            'highlights' => 'Tizi n\'Tichka Pass, Ait Benhaddou (UNESCO), Atlas Film Studios in Ouarzazate, Draa Valley and palm groves, Camel trekking in Erg Chigaga dunes, Night in luxury desert camp, Visit to Koranic library in Tamegroute, Berber villages and carpets in Taznakht',
            'included' => json_encode([
                'Transfers from/to the airport/hotels',
                'Private transportation in a spacious and air-conditioned car',
                'Experienced local tour guide',
                'Includes all dinners and breakfasts',
                'A night in hotels / riads and desert camp',
            ]),
            'excluded' => json_encode([
                'Lunches and soft drinks',
                'Admission fees and gratuities',
            ]),
            'languages' => 'English, Spanish, French',
            'category_id' => $categoryId,
            'location_id' => $locationId,
        ]);

        $chigagaTour->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Day 1: Marrakech - Ait Benhaddou - Ouarzazate - Agdz - Zagora',
                'content' => json_encode([
                    'Pickup from your hotel or riad in Marrakech.',
                    'Drive through the High Atlas Mountains via Tizi n\'Tichka Pass.',
                    'Visit Ait Benhaddou Kasbah and Ouarzazate’s Atlas Film Studios.',
                    'Continue through Agdz and enjoy views of the Draa Valley palm groves.',
                    'Overnight in a traditional riad in Zagora with dinner.',
                ]),
            ],
            [
                'day_number' => 2,
                'title' => 'Day 2: Zagora - Tamegroute - Mhamid - Erg Chigaga',
                'content' => json_encode([
                    'Breakfast and departure from Zagora.',
                    'Stop in Tamegroute to visit the Koranic Library and local pottery artisans.',
                    'Continue to Mhamid and begin the 4x4 excursion into Erg Chigaga dunes.',
                    'Camel ride to reach the desert camp.',
                    'Dinner, Berber music around the fire, and overnight in a luxury Sahara tent.',
                ]),
            ],
            [
                'day_number' => 3,
                'title' => 'Day 3: Erg Chigaga - Foum Zguid - Taznakht - Marrakech',
                'content' => json_encode([
                    'Sunrise camel ride in the dunes of Erg Chigaga.',
                    'Drive to Foum Zguid through the dry lake of Iriqui.',
                    'Stop at Taznakht, known for traditional Berber carpets.',
                    'Return to Marrakech via the High Atlas Mountains.',
                    'Evening drop-off at your Marrakech accommodation.',
                ]),
            ],
        ]);

        $merzougaLuxuryTour = Tour::create([
            'title' => '3-Day Private Marrakech to Merzouga Desert Tour: Best Sahara Experience',
            'slug' => Str::slug('3-Day Private Marrakech to Merzouga Desert Tour: Best Sahara Experience'),
            'type' => 'multi_day',
            'duration' => '3 Days',
            'group_size' => 'Flexible',
            'age_range' => 'All ages',
            'base_price' => 0,
            'bestseller_flag' => false,
            'free_cancellation_flag' => true,
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?..."></iframe>',
            'overview' => 'Experience a tailor-made 3-day desert tour from Marrakech to Merzouga. Journey across the High Atlas, visit kasbahs, gorges, and traditional villages, and spend the night in a desert camp after a camel trek through Erg Chebbi.',
            'highlights' => 'Tizi n\'Tichka Pass (High Atlas), Ait Benhaddou (UNESCO), Ouarzazate film studios, Skoura and Road of 1000 Kasbahs, Dades and Todra Gorges, Camel trekking in Merzouga dunes, Overnight in Berber tent, Sunrise over the Sahara',
            'included' => json_encode([
                'Transfers from/to the airport/hotels',
                'Private transportation in a spacious and air-conditioned car',
                'Experienced local tour guide',
                'Includes all dinners and breakfasts',
                'A night in hotels / riads and desert camp',
            ]),
            'excluded' => json_encode([
                'Lunches and soft drinks',
                'Admission fees and gratuities',
            ]),
            'languages' => 'English, Spanish, French',
            'category_id' => $categoryId,
            'location_id' => $locationId,
        ]);

        $merzougaLuxuryTour->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Day 1: Marrakech - Ait Benhaddou - Ouarzazate - Skoura - Dades Gorges',
                'content' => json_encode([
                    'Pickup from your hotel or riad in Marrakech.',
                    'Drive across the Tizi n\'Tichka Pass in the High Atlas Mountains.',
                    'Visit Ait Benhaddou Kasbah (UNESCO) and Ouarzazate film studios.',
                    'Continue through Skoura along the Road of 1000 Kasbahs.',
                    'Dinner and overnight in a kasbah or hotel in Dades Gorges.',
                ]),
            ],
            [
                'day_number' => 2,
                'title' => 'Day 2: Dades Gorges - Todra Gorges - Erfoud - Merzouga (Camel Ride)',
                'content' => json_encode([
                    'Breakfast and visit to Todra Gorge.',
                    'Drive via Tinghir, Tinjdad, and Erfoud with optional Marble Fossil stop.',
                    'Pass through Rissani and arrive in Merzouga.',
                    'Camel trek through Erg Chebbi dunes to your desert camp.',
                    'Dinner, Berber music, and overnight in a nomadic tent.',
                ]),
            ],
            [
                'day_number' => 3,
                'title' => 'Day 3: Merzouga - Agdz - Draa Valley - Marrakech',
                'content' => json_encode([
                    'Wake early to catch the Sahara sunrise.',
                    'Camel ride back to Merzouga, followed by breakfast.',
                    'Drive through Rissani, Nkob, and the Draa Valley.',
                    'Stop in Agdz and continue across the Atlas Mountains.',
                    'Evening drop-off at your accommodation in Marrakech.',
                ]),
            ],
        ]);

        $marrakechToFesTour = Tour::create([
            'title' => '3-Day Marrakech to Fes via Sahara Desert: Best Private Tour Experience',
            'slug' => Str::slug('3-Day Marrakech to Fes via Sahara Desert: Best Private Tour Experience'),
            'type' => 'multi_day',
            'duration' => '3 Days',
            'group_size' => 'Flexible',
            'age_range' => 'All ages',
            'base_price' => 0,
            'bestseller_flag' => false,
            'free_cancellation_flag' => true,
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?pb=!1m64!1m12...allowfullscreen></iframe>',
            'overview' => 'This 3-day journey takes you from Marrakech to Fes via the spectacular Sahara Desert. Discover the High Atlas Mountains, Ait Benhaddou, Dades and Todra Gorges, and Merzouga. Enjoy a camel trek and overnight in a Berber desert camp before ending in Fes.',
            'highlights' => 'Tizi n\'Tichka Pass (High Atlas), Ait Benhaddou (UNESCO), Valley of Roses & Skoura, Dades and Todra Gorges, Camel ride in Erg Chebbi dunes, Sunset & sunrise in Merzouga, Middle Atlas Cedar Forest, Ifrane and Fes',
            'included' => json_encode([
                'Transfers from/to the airport/hotels',
                'Private travel to Fes in A/C comfortable 4x4 or minibus',
                'Experienced local tour guide',
                'Includes all dinners and breakfasts',
                'A night in hotels / riads and desert camp',
            ]),
            'excluded' => json_encode([
                'Lunches and soft drinks',
                'Admission fees and gratuities',
            ]),
            'languages' => 'English, Spanish, French',
            'category_id' => $categoryId,
            'location_id' => $locationId,
        ]);

        $marrakechToFesTour->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Day 1: Marrakech - Ait Benhaddou - Ouarzazate - Skoura - Dades Gorges',
                'content' => json_encode([
                    'Departure from Marrakech through the Tizi n\'Tichka Pass in the High Atlas.',
                    'Visit the Ait Benhaddou Kasbah (UNESCO World Heritage Site).',
                    'Explore Ouarzazate including film studios and kasbahs.',
                    'Drive through Skoura and the Valley of Roses.',
                    'Dinner and overnight in a traditional kasbah in Boumalne Dades.',
                ]),
            ],
            [
                'day_number' => 2,
                'title' => 'Day 2: Dades Gorges - Todra Gorge - Erfoud - Merzouga (Camel Ride & Camp)',
                'content' => json_encode([
                    'Visit the dramatic rock canyons of Dades and Todra Gorges.',
                    'Pass through Tinghir, Tinjdad, Jorf, and fossil shops in Erfoud.',
                    'Arrive in Merzouga and begin camel trek to the Erg Chebbi dunes.',
                    'Watch the sunset and enjoy traditional music in a Berber camp.',
                    'Dinner and overnight in a desert tent in Merzouga.',
                ]),
            ],
            [
                'day_number' => 3,
                'title' => 'Day 3: Merzouga - Midelt - Azrou - Ifrane - Fes',
                'content' => json_encode([
                    'Wake early for sunrise over the Sahara and camel ride back.',
                    'Drive through Rissani, Erfoud, and the Ziz Valley.',
                    'Pass Midelt, the Cedar Forest of Azrou, and the alpine town of Ifrane.',
                    'Arrive in Fes and drop-off at your hotel or riad.',
                ]),
            ],
        ]);

        $merzougaZagoraTour = Tour::create([
            'title' => '4-Day Marrakech to Merzouga and Zagora Desert Tour: Dades, Todra & Draa Valleys',
            'slug' => Str::slug('4-Day Marrakech to Merzouga and Zagora Desert Tour: Dades, Todra & Draa Valleys'),
            'type' => 'multi_day',
            'duration' => '4 Days',
            'group_size' => 'Flexible',
            'age_range' => 'All ages',
            'base_price' => 0,
            'bestseller_flag' => false,
            'free_cancellation_flag' => true,
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?pb=!1m76...style="border:0"></iframe>',
            'overview' => 'This immersive 4-day journey from Marrakech to Merzouga and Zagora takes you through the High Atlas Mountains, the Valley of Roses, Todra and Dades Gorges, Erg Chebbi dunes, and the Draa Valley. Includes camel trekking, desert camp, and kasbah stays.',
            'highlights' => 'Tizi n\'Tichka Pass (High Atlas), Film studios in Ouarzazate, Skoura Oasis and Rose Valley, Dades and Todra Gorges, Camel trek in Merzouga dunes, Sunset in Sahara, Berber campfire music, Draa Valley palm groves, Ait Benhaddou (UNESCO)',
            'included' => json_encode([
                'Transfers from/to the airport/hotels',
                'Private transportation in a spacious and air-conditioned car',
                'Experienced local tour guide',
                'Includes all dinners and breakfasts',
                'A night in hotels, riads, desert camp',
                'Desert guide, Merzouga camel trek',
            ]),
            'excluded' => json_encode([
                'Lunches and soft drinks',
                'Admission fees and gratuities',
            ]),
            'languages' => 'English, Spanish, French',
            'category_id' => $categoryId,
            'location_id' => $locationId,
        ]);

        $merzougaZagoraTour->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Day 1: Marrakech - Ouarzazate - Skoura - Dades Gorges',
                'content' => json_encode([
                    'Pickup from your hotel or riad in Marrakech.',
                    'Drive through the High Atlas Mountains and Tizi n\'Tichka Pass.',
                    'Visit Ouarzazate and Atlas Film Studios.',
                    'Explore the Skoura Oasis and Valley of Roses.',
                    'Dinner and overnight in a traditional kasbah in Dades Gorges.',
                ]),
            ],
            [
                'day_number' => 2,
                'title' => 'Day 2: Dades Gorges - Todra Gorge - Merzouga (Camel Ride)',
                'content' => json_encode([
                    'Visit Todra Gorge, a famous spot for rock climbing.',
                    'Drive through Erfoud and local Berber villages.',
                    'Reach Merzouga and begin camel trek into Erg Chebbi dunes.',
                    'Watch the sunset, enjoy dinner and Berber music in desert camp.',
                    'Overnight stay in Berber tents under the stars.',
                ]),
            ],
            [
                'day_number' => 3,
                'title' => 'Day 3: Merzouga - Rissani - Nkob - Zagora - Ouarzazate',
                'content' => json_encode([
                    'Sunrise camel ride and breakfast in Merzouga.',
                    'Drive through Rissani, Alnif, Tazzarine, and Nkob.',
                    'Enjoy palm groves in the scenic Draa Valley.',
                    'Stop in Zagora then cross Tizi n\'Tniffift to reach Ouarzazate.',
                    'Dinner and overnight in a traditional kasbah.',
                ]),
            ],
            [
                'day_number' => 4,
                'title' => 'Day 4: Ouarzazate - Ait Benhaddou - High Atlas - Marrakech',
                'content' => json_encode([
                    'Visit UNESCO-listed Ait Benhaddou village.',
                    'Drive through the High Atlas back to Marrakech.',
                    'Evening drop-off at your hotel or riad.',
                ]),
            ],
        ]);

        $chefchaouenTour = Tour::create([
            'title' => '4-Day Marrakech to Chefchaouen via Merzouga Desert Tour: Sahara & Rif Discovery',
            'slug' => Str::slug('4-Day Marrakech to Chefchaouen via Merzouga Desert Tour: Sahara & Rif Discovery'),
            'type' => 'multi_day',
            'duration' => '4 Days',
            'group_size' => 'Flexible',
            'age_range' => 'All ages',
            'base_price' => 0,
            'bestseller_flag' => false,
            'free_cancellation_flag' => true,
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?pb=!1m70...allowfullscreen></iframe>',
            'overview' => 'Explore the beauty of Morocco on this 4-day private tour from Marrakech to Chefchaouen via Merzouga. Visit Ait Benhaddou, ride camels into the Erg Chebbi dunes, discover Fes and the Rif Mountains, and end in the charming blue city of Chefchaouen.',
            'highlights' => 'Ait Benhaddou (UNESCO), Atlas Film Studios in Ouarzazate, Dades and Todra Gorges, Camel trek in Erg Chebbi dunes, Sunrise over the Sahara, Cedar Forest in Azrou, Historic medina of Fes, Blue city of Chefchaouen',
            'included' => json_encode([
                'Transfers from/to the airport/hotels',
                'Private transportation in a spacious and air-conditioned car',
                'Experienced local tour guide',
                'Includes all dinners and breakfasts',
                'A night in hotels, riads, desert camp',
                'Desert guide, Merzouga camel trek',
            ]),
            'excluded' => json_encode([
                'Lunches and soft drinks',
                'Admission fees and gratuities',
            ]),
            'languages' => 'English, Spanish, French',
            'category_id' => $categoryId,
            'location_id' => $locationId,
        ]);

        $chefchaouenTour->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Day 1: Marrakech - Ait Benhaddou - Ouarzazate - Skoura - Dades Gorges',
                'content' => json_encode([
                    'Departure from Marrakech through the High Atlas Mountains.',
                    'Visit Ait Benhaddou Kasbah (UNESCO).',
                    'Stop at film studios in Ouarzazate.',
                    'Pass Skoura and Valley of the Roses.',
                    'Dinner and overnight in Dades Gorges.',
                ]),
            ],
            [
                'day_number' => 2,
                'title' => 'Day 2: Dades Gorges - Todra Gorge - Erfoud - Merzouga (Camel Ride)',
                'content' => json_encode([
                    'Visit Todra Gorge, a canyon popular with climbers.',
                    'Explore Berber villages along the way to Erfoud.',
                    'Continue to Merzouga and ride camels into the Erg Chebbi dunes.',
                    'Enjoy dinner, music, and overnight in a desert camp.',
                ]),
            ],
            [
                'day_number' => 3,
                'title' => 'Day 3: Merzouga - Rissani - Midelt - Ifrane - Fes',
                'content' => json_encode([
                    'Sunrise in the Sahara and camel ride back to Merzouga.',
                    'Visit Rissani market and drive through the Ziz Valley.',
                    'Stop in Midelt, Azrou (Cedar Forest), and Ifrane.',
                    'Arrival in Fes and overnight in a traditional riad.',
                ]),
            ],
            [
                'day_number' => 4,
                'title' => 'Day 4: Fes (Half-Day Visit) - Chefchaouen',
                'content' => json_encode([
                    'Guided medina tour in Fes to explore historic monuments.',
                    'Drive north through the Rif Mountains to Chefchaouen.',
                    'Free time to explore the blue and white medina.',
                    'End of tour with drop-off in Chefchaouen (or optional continuation to Tangier, Casablanca, or Marrakech).',
                ]),
            ],
        ]);

        $merzouga5DayTour = Tour::create([
            'title' => '5-Day Marrakech to Merzouga Desert Tour: Best Sahara Adventure & Camel Trek',
            'slug' => Str::slug('5-Day Marrakech to Merzouga Desert Tour: Best Sahara Adventure & Camel Trek'),
            'type' => 'multi_day',
            'duration' => '5 Days',
            'group_size' => 'Flexible',
            'age_range' => 'All ages',
            'base_price' => 0,
            'bestseller_flag' => true,
            'free_cancellation_flag' => true,
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?pb=!1m76...4v1433115577295" width="655" height="548" frameborder="0" style="border:0"></iframe>',
            'overview' => 'Explore the heart of Morocco with this 5-day Sahara tour from Marrakech to Merzouga. Visit kasbahs, trek through gorges, ride camels into Erg Chebbi dunes, and sleep in a desert camp. Includes local cultural encounters, Berber music, and scenic High Atlas mountain drives.',
            'highlights' => 'Tizi n’Tichka Pass, Ait Benhaddou Kasbah, Atlas Film Studios, Valley of Roses, Dades Gorge, Todra Canyon, Merzouga Camel Ride, Nomad Encounters, Draa Valley, Kasbah Taourirt',
            'included' => json_encode([
                'Transfers from/to the airport/hotels',
                'Private transportation in a spacious and air-conditioned car',
                'Experienced local tour guide',
                'Includes all dinners and breakfasts',
                'A night in hotels / riads and desert camp',
                'Camel ride with desert guide',
            ]),
            'excluded' => json_encode([
                'Lunches and soft drinks',
                'Admission fees and gratuities',
            ]),
            'languages' => 'English, Spanish, French',
            'category_id' => $categoryId,
            'location_id' => $locationId,
        ]);

        $merzouga5DayTour->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Day 1: Marrakech - Tizi n\'Tichka - Ait Benhaddou - Ouarzazate - Dades Gorges',
                'content' => json_encode([
                    'Pickup from your accommodation in Marrakech.',
                    'Drive over the Tizi n\'Tichka Pass through scenic Berber villages.',
                    'Guided visit to Ait Benhaddou Kasbah (UNESCO site).',
                    'Stop in Ouarzazate and film studios in Skoura.',
                    'Dinner and overnight in a kasbah in Dades Gorges.',
                ]),
            ],
            [
                'day_number' => 2,
                'title' => 'Day 2: Dades Valley - Todra Gorges - Erfoud - Merzouga',
                'content' => json_encode([
                    'Morning visit to Dades rock formations ("monkey fingers").',
                    'Explore Todra Gorge and its granite cliffs.',
                    'Pass through Jorf, Erfoud, and Berber villages.',
                    'Arrive in Merzouga and check into a desert hotel.',
                ]),
            ],
            [
                'day_number' => 3,
                'title' => 'Day 3: Merzouga Desert Excursion and Camel Ride',
                'content' => json_encode([
                    'Visit nomad families, Khamlia Gnawa music village, and Nomad Museum.',
                    'Afternoon camel ride into Erg Chebbi dunes for sunset.',
                    'Dinner, Berber music, and overnight in a Sahara desert camp.',
                ]),
            ],
            [
                'day_number' => 4,
                'title' => 'Day 4: Merzouga - Rissani - Alnif - Agdz - Ouarzazate',
                'content' => json_encode([
                    'Sunrise over dunes and camel ride back.',
                    'Visit Rissani souk and Alnif trilobite center.',
                    'Drive through the palm groves of Draa Valley and N\'Qob.',
                    'Dinner and overnight in Ouarzazate.',
                ]),
            ],
            [
                'day_number' => 5,
                'title' => 'Day 5: Ouarzazate - Telouet - Atlas Mountains - Return to Marrakech',
                'content' => json_encode([
                    'Visit Kasbah Taourirt and optionally Telouet and Kasbah el Glaoui.',
                    'Scenic drive over Tizi n’Tichka Pass.',
                    'Drop-off in Marrakech in the evening.',
                ]),
            ],
        ]);

        $eightDayTour = Tour::create([
            'title' => '8-Day Desert Journey from Marrakech to Zagora and Merzouga',
            'slug' => Str::slug('8-Day Desert Journey from Marrakech to Zagora and Merzouga'),
            'type' => 'multi_day',
            'duration' => '8 Days',
            'group_size' => 'Flexible',
            'age_range' => 'All ages',
            'base_price' => 0,
            'bestseller_flag' => false,
            'free_cancellation_flag' => true,
            'map_frame' => '', // Add map iframe if needed
            'overview' => 'A private tour through the High Atlas Mountains, ancient kasbahs, palm oases, and the majestic dunes of Merzouga. Includes camel rides, music, and authentic Berber hospitality.',
            'highlights' => 'Explore Ait Benhaddou UNESCO Kasbah, Visit Atlas Studios in Ouarzazate, Kasbah of Tamnougalt & Draa Valley, Camel trek into Erg Chebbi dunes, Sunset and music in Sahara camp, Todra Gorges & Dades rock formations, Skoura Oasis and Kasbah Amridil, Guided tour of Marrakech Medina',
            'included' => json_encode([
                'Transfers from/to airport or hotels',
                'Private A/C transport with driver',
                'Dinners and breakfasts included',
                'Accommodation in hotels/riads/camps',
                'Camel trekking and desert guides',
            ]),
            'excluded' => json_encode([
                'Lunches and soft drinks',
                'Entrance fees and personal tips',
            ]),
            'languages' => 'English, French, Spanish',
            'category_id' => $categoryId,
            'location_id' => $locationId,
        ]);

        $eightDayTour->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Arrival in Marrakech',
                'content' => json_encode([
                    'Welcome at airport and transfer to riad. Explore Djemaa el Fna and local souks.',
                ]),
            ],
            [
                'day_number' => 2,
                'title' => 'Marrakech - Ait Benhaddou - Ouarzazate',
                'content' => json_encode([
                    'Drive via Tizi n’Tichka to Ait Benhaddou. Visit Atlas Studios. Overnight in kasbah.',
                ]),
            ],
            [
                'day_number' => 3,
                'title' => 'Ouarzazate - Agdz - Zagora',
                'content' => json_encode([
                    'Visit Tamnougalt Kasbah. Scenic drive through Draa Valley to Zagora.',
                ]),
            ],
            [
                'day_number' => 4,
                'title' => 'Zagora - Merzouga Desert',
                'content' => json_encode([
                    'Lunch in Alnif. Reach Merzouga, camel trek to desert camp. Berber music night.',
                ]),
            ],
            [
                'day_number' => 5,
                'title' => 'Merzouga - Tinghir - Dades Gorges',
                'content' => json_encode([
                    'Sunrise in dunes. Visit Rissani & Todra Valley. Overnight in Dades Valley.',
                ]),
            ],
            [
                'day_number' => 6,
                'title' => 'Dades - Ouarzazate - Marrakech',
                'content' => json_encode([
                    'Drive via Kalaat Mgouna, Skoura and return through Atlas Mountains.',
                ]),
            ],
            [
                'day_number' => 7,
                'title' => 'Marrakech Excursion',
                'content' => json_encode([
                    'Guided visit to Koutoubia, Bahia Palace, Saadian Tombs, souks. Optional activities.',
                ]),
            ],
            [
                'day_number' => 8,
                'title' => 'Departure',
                'content' => json_encode([
                    'Transfer to Marrakech Airport for departure.',
                ]),
            ],
        ]);

        $elevenDayTour = Tour::create([
            'title' => '11-Day Around Morocco Tour from Marrakech',
            'slug' => Str::slug('11-Day Around Morocco Tour from Marrakech'),
            'type' => 'multi_day',
            'duration' => '11 Days',
            'group_size' => 'Flexible',
            'age_range' => 'All ages',
            'base_price' => 0,
            'bestseller_flag' => false,
            'free_cancellation_flag' => true,
            'map_frame' => '', // Add your iframe if needed
            'overview' => 'This grand tour from Marrakech to Merzouga, Fes, Chefchaouen, Rabat, and Casablanca lets you experience Morocco’s cultural and natural treasures.',
            'highlights' => json_encode([
                'Explore the historic medina of Marrakech',
                'Visit UNESCO Kasbah of Ait Benhaddou',
                'Ride camels in Erg Chebbi dunes',
                'Camp under stars in the Sahara',
                'Wander through Fes ancient Medina',
                'Discover blue streets of Chefchaouen',
                'Tour Tangier and Cap Spartel',
                'See Rabat’s mausoleum and ruins',
                'Visit Hassan II Mosque in Casablanca',
            ]),
            'included' => json_encode([
                'Airport transfers in Marrakech',
                'Comfortable private vehicle and guide',
                'Dinners and breakfasts included',
                'Hotel, riad, and desert camp accommodation',
                'Camel ride in Merzouga',
            ]),
            'excluded' => json_encode([
                'Lunches and drinks',
                'Monument entrance fees and tips',
            ]),
            'languages' => json_encode([
                'English',
                'French',
                'Spanish',
            ]),
            'category_id' => $categoryId,
            'location_id' => $locationId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $elevenDayTour->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Arrival in Marrakech',
                'content' => json_encode([
                    'Meet your driver at airport. Transfer to hotel/riad.',
                ]),
            ],
            [
                'day_number' => 2,
                'title' => 'Marrakech City Tour',
                'content' => json_encode([
                    'Guided visit of Koutoubia, Bahia Palace, Saadian Tombs, and souks.',
                ]),
            ],
            [
                'day_number' => 3,
                'title' => 'Marrakech - Ait Benhaddou - Ouarzazate',
                'content' => json_encode([
                    'Drive over Tichka Pass to visit Kasbahs and Atlas Studios.',
                ]),
            ],
            [
                'day_number' => 4,
                'title' => 'Ouarzazate - Dades - Todra - Merzouga',
                'content' => json_encode([
                    'Through Skoura, Dades Valley, and Todra Gorges. Camel trek to Sahara camp.',
                ]),
            ],
            [
                'day_number' => 5,
                'title' => 'Merzouga - Midelt - Fes',
                'content' => json_encode([
                    'Sunrise camel ride. Drive through Ziz Valley and cedar forests to Fes.',
                ]),
            ],
            [
                'day_number' => 6,
                'title' => 'Fes Guided Tour',
                'content' => json_encode([
                    'Visit Royal Palace, Mellah, tanneries, Kairouyine Mosque, ceramics workshops.',
                ]),
            ],
            [
                'day_number' => 7,
                'title' => 'Fes - Ouazane - Chefchaouen',
                'content' => json_encode([
                    'Scenic ride to blue city in Rif mountains. Explore medina.',
                ]),
            ],
            [
                'day_number' => 8,
                'title' => 'Chefchaouen Exploration',
                'content' => json_encode([
                    'Free day with optional local guide hike or medina visit.',
                ]),
            ],
            [
                'day_number' => 9,
                'title' => 'Chefchaouen - Tangier - Asilah - Rabat',
                'content' => json_encode([
                    'Stop in Tangier and Asilah, continue to Rabat. Overnight in medina.',
                ]),
            ],
            [
                'day_number' => 10,
                'title' => 'Rabat - Casablanca - Marrakech',
                'content' => json_encode([
                    'Visit Rabat highlights, Hassan II Mosque in Casablanca. Arrive in Marrakech.',
                ]),
            ],
            [
                'day_number' => 11,
                'title' => 'Departure',
                'content' => json_encode([
                    'Transfer to Marrakech airport. End of tour.',
                ]),
            ],
        ]);

        $eightDayChefchaouenTour = Tour::create([
            'title' => 'Best Marrakech Tour for 8 Days: Top Ranked Marrakech Desert Tour to Chefchaouen',
            'slug' => 'best-marrakech-tour-8-days',
            'type' => 'multi_day',
            'duration' => '8 Days',
            'group_size' => 'Private Tour',
            'age_range' => 'All ages',
            'base_price' => 0,
            'bestseller_flag' => false,
            'free_cancellation_flag' => true,
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?..."></iframe>', // shortened for clarity
            'overview' => 'Explore Marrakech, Merzouga, Fes, Chefchaouen, and more in this 8-day Morocco adventure with Local Morocco Tours.',
            'highlights' => json_encode([
                "Guided tour of Marrakech's historic landmarks",
                "Visit Ait Benhaddou Kasbah, a UNESCO World Heritage Site",
                "Overnight in Dades Gorges and camel trek in Merzouga",
                "Explore ancient medinas of Fes and Chefchaouen",
                "Scenic drive through the Rif and Atlas Mountains",
                "Hassan II Mosque visit in Casablanca"
            ]),
            'included' => json_encode([
                "Transfers from/to the airport/hotels",
                "Private transportation in air-conditioned vehicle",
                "Experienced local tour guide",
                "Dinners and breakfasts",
                "Accommodation in hotels, riads, and desert camp",
                "Desert guide, Merzouga camel trek"
            ]),
            'excluded' => json_encode([
                "Lunches and soft drinks",
                "Admission fees and gratuities"
            ]),
            'languages' => json_encode(["English", "Spanish", "French"]),
            'category_id' => 1,
            'location_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $eightDayChefchaouenTour->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Arrival in Marrakech',
                'content' => json_encode([
                    'Arrival in Marrakech and transfer to riad.',
                    'Optional free time in Jemaa el-Fnaa square.'
                ]),
            ],
            [
                'day_number' => 2,
                'title' => 'Marrakech - Ait Benhaddou - Ouarzazate',
                'content' => json_encode([
                    'Drive through Tizi n’Tichka Pass.',
                    'Visit UNESCO Ait Benhaddou Kasbah.',
                    'Explore Ouarzazate and the film studios.'
                ]),
            ],
            [
                'day_number' => 3,
                'title' => 'Ouarzazate - Dades - Merzouga',
                'content' => json_encode([
                    'Scenic route through Dades Valley.',
                    'Pass through Todra Gorges.',
                    'Camel trek into Sahara at Merzouga.',
                    'Overnight at desert camp under stars.'
                ]),
            ],
            [
                'day_number' => 4,
                'title' => 'Merzouga - Ziz Valley - Midelt',
                'content' => json_encode([
                    'Sunrise camel ride.',
                    'Drive through Ziz Valley.',
                    'Arrive in Midelt for overnight stay.'
                ]),
            ],
            [
                'day_number' => 5,
                'title' => 'Midelt - Ifrane - Fes',
                'content' => json_encode([
                    'Visit Ifrane, known as Morocco’s “Switzerland.”',
                    'Pass through cedar forests.',
                    'Arrival in Fes and check-in.'
                ]),
            ],
            [
                'day_number' => 6,
                'title' => 'Fes Guided Tour',
                'content' => json_encode([
                    'Explore Fes Medina and Kairaouine Mosque.',
                    'Visit tanneries, Mellah, and ceramic artisans.',
                ]),
            ],
            [
                'day_number' => 7,
                'title' => 'Fes - Chefchaouen',
                'content' => json_encode([
                    'Scenic drive through Rif Mountains.',
                    'Explore blue-painted streets of Chefchaouen.'
                ]),
            ],
            [
                'day_number' => 8,
                'title' => 'Chefchaouen - Casablanca - Departure',
                'content' => json_encode([
                    'Morning departure from Chefchaouen.',
                    'Visit Hassan II Mosque in Casablanca.',
                    'Transfer to the airport.'
                ]),
            ],
        ]);
        // marrakech tours END

        // fes tours start 
        $categoryId = TourCategory::where('slug', 'fes-desert-tours')->value('id');
        $locationId = Location::where('slug', 'fes')->value('id');

        $tour = Tour::create([
            'title' => '3-Day Tour from Fes to Merzouga Desert: Authentic Sahara Experience',
            'slug' => Str::slug('3-Day Tour from Fes to Merzouga Desert: Authentic Sahara Experience'),
            'type' => 'multi_day',
            'duration' => '3 Days',
            'group_size' => 'Flexible',
            'age_range' => 'All ages',
            'base_price' => 0,
            'bestseller_flag' => true,
            'free_cancellation_flag' => true,
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13611.22987634031!2d-3.9960448167875043!3d31.099509004781504!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd9b24965c5929c3%3A0x6f17822be40a973a!2sMerzouga!5e0!3m2!1sen!2sma!4v1689551175044!5m2!1sen!2sma" width="600" height="450" style="border:0;" allowfullscreen loading="lazy"></iframe>',
            'overview' => 'Join us on a 3-day private tour from Fes to Merzouga Desert. Discover the beauty of the Middle Atlas Mountains, meet monkeys in Azrou, pass through Ziz Valley, and enjoy a camel trek across the golden dunes of Erg Chebbi. This tour is perfect for those who want to experience authentic Moroccan culture and the vast Sahara.',
            'highlights' => json_encode([
                'Drive through the Middle Atlas Mountains and cedar forests',
                'Meet wild Barbary macaques in Azrou',
                'Cross the Ziz Valley and stop for panoramic views',
                'Ride camels into the Sahara Desert at sunset',
                'Enjoy a traditional Berber dinner and music around the campfire',
                'Overnight in a luxury or standard desert camp under the stars',
                'Witness a beautiful desert sunrise before returning to Fes',
            ]),
            'included' => json_encode([
                'Hotel pickup and drop-off in Fes',
                'Private air-conditioned transport',
                'English/French/Spanish-speaking driver/guide',
                'Overnight stay in a Merzouga desert camp',
                'Breakfast and dinner',
                'Camel rides at sunset and sunrise',
                'Sandboarding experience (optional)',
            ]),
            'excluded' => json_encode([
                'Lunches and drinks',
                'Admission fees',
                'Tips and personal expenses',
            ]),
            'languages' => json_encode(['English', 'French', 'Spanish']),
            'category_id' => $categoryId,
            'location_id' => $locationId,
        ]);
        $tour->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Fes – Ifrane – Azrou – Midelt – Ziz Valley – Merzouga',
                'content' => json_encode([
                    'Depart from Fes after breakfast and head south.',
                    'Stop in Ifrane (nicknamed the Switzerland of Morocco) for photos.',
                    'Continue to Azrou to meet wild monkeys in the cedar forest.',
                    'Drive through Midelt and stop for lunch.',
                    'Admire panoramic views of Ziz Valley and palm groves.',
                    'Arrive in Merzouga and settle into a desert hotel near the dunes.',
                    'Dinner and overnight stay at the hotel/lodge.',
                ]),
            ],
            [
                'day_number' => 2,
                'title' => 'Merzouga Exploration & Erg Chebbi Camel Trek',
                'content' => json_encode([
                    'After breakfast, enjoy a day of discovery in the Merzouga area.',
                    'Visit nomadic families, fossil workshops, and the village of Khamlia for Gnawa music.',
                    'In the afternoon, ride camels into the dunes of Erg Chebbi.',
                    'Witness the stunning desert sunset.',
                    'Arrive at the Berber camp and enjoy a traditional dinner.',
                    'Experience live drumming and stargazing by the campfire.',
                ]),
            ],
            [
                'day_number' => 3,
                'title' => 'Merzouga – Midelt – Ifrane – Fes',
                'content' => json_encode([
                    'Wake up early for a magical sunrise over the dunes.',
                    'Camel ride back to the village and breakfast at a local guesthouse.',
                    'Drive back north through Rissani and Ziz Valley.',
                    'Stop in Midelt for lunch and continue through Azrou and Ifrane.',
                    'Return to Fes by evening and drop-off at your hotel.',
                ]),
            ],
        ]);

        $categoryId = TourCategory::where('slug', 'fes-desert-tours')->value('id');
        $locationId = Location::where('slug', 'fes')->value('id');

        $tour = Tour::create([
            'title' => '2-Day Tour from Fes to Merzouga Desert: Sahara Adventure & Camel Trek',
            'slug' => Str::slug('2-Day Tour from Fes to Merzouga Desert: Sahara Adventure & Camel Trek'),
            'type' => 'multi_day',
            'duration' => '2 Days',
            'group_size' => 'Flexible',
            'age_range' => 'All ages',
            'base_price' => 0,
            'bestseller_flag' => false,
            'free_cancellation_flag' => true,
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?pb=!1m52!1m12!1m3!1d1722013.2447155092!2d-5.7422915349114865!3d32.54464778278658!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m37!3e0!4m5!1s0xd9f8b484d445777%3A0x10e6aaaeedd802ef!2sFes!3m2!1d34.0181246!2d-5.0078451!4m5!1s0xda1d772f32d140b%3A0x7253cf1d404c7ca3!2sIfran!3m2!1d33.5228062!2d-5.110955199999999!4m5!1s0xda1db356fb826b3%3A0xb4f27cf230f6e50b!2sAzrou!3m2!1d33.4347305!2d-5.231887899999999!4m5!1s0xd98bf42e8441e9f%3A0x88269ca6a8dbb536!2sMidelt!3m2!1d32.6799423!2d-4.7329267999999995!4m5!1s0xd977b2c5079550b%3A0xf04c523511a64215!2sErfoud!3m2!1d31.436633399999998!2d-4.234383!4m5!1s0xd973c279834dfe5%3A0x5639fab2b5de4a44!2sMerzouga%2C+Morocco!3m2!1d31.0801676!2d-4.013361!5e0!3m2!1sen!2sma!4v1556136536188!5m2!1sen!2sma" width="655" height="548" frameborder="0" style="border:0" allowfullscreen></iframe>',
            'overview' => 'Experience the magic of the Moroccan Sahara with our 2-day tour from Fes to Merzouga Desert. Cross the scenic Middle Atlas, meet monkeys in Azrou, and travel through Midelt and Erfoud before arriving in the golden dunes of Erg Chebbi. Enjoy an unforgettable camel trek, a traditional Berber dinner, and a night under the stars in a desert camp.',
            'highlights' => json_encode([
                'Scenic drive through the Middle Atlas Mountains',
                'Visit Ifrane and Azrou cedar forest',
                'Lunch stop in Midelt',
                'Sunset camel ride through the dunes of Erg Chebbi',
                'Overnight in Berber camp under the stars',
                'Traditional Berber music and campfire experience',
                'Desert sunrise and return journey to Fes via Rissani',
            ]),
            'included' => json_encode([
                'Hotel pickup and drop-off in Fes',
                'Private transport in air-conditioned vehicle',
                'English/French/Spanish-speaking driver/guide',
                'Camel trek in the dunes of Merzouga',
                'Overnight stay in standard or luxury desert camp',
                'Dinner and breakfast at the camp',
            ]),
            'excluded' => json_encode([
                'Lunches and soft drinks',
                'Admission fees',
                'Tips and personal expenses',
            ]),
            'languages' => json_encode(['English', 'French', 'Spanish']),
            'category_id' => $categoryId,
            'location_id' => $locationId,
        ]);
        $tour->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Fes – Ifrane – Azrou – Midelt – Errachidia – Erfoud – Merzouga',
                'content' => json_encode([
                    'Pick-up from your hotel or riad in Fes at 8:00 AM.',
                    'Stop in Ifrane to admire its alpine-style architecture.',
                    'Continue to Azrou and see wild monkeys in the cedar forest.',
                    'Lunch break in Midelt, famous for apple orchards.',
                    'Drive through Errachidia and Erfoud before reaching Merzouga.',
                    'Camel trek across the Erg Chebbi dunes at sunset.',
                    'Arrival at the desert camp, dinner, and traditional Berber music.',
                    'Overnight in a standard or luxury tent under the stars.',
                ]),
            ],
            [
                'day_number' => 2,
                'title' => 'Merzouga – Rissani – Midelt – Azrou – Fes',
                'content' => json_encode([
                    'Wake early to enjoy the sunrise over the dunes.',
                    'Camel ride back to Merzouga village.',
                    'Breakfast and shower at a local guesthouse.',
                    'Drive to Rissani, then continue via Midelt and the Middle Atlas.',
                    'Short stops in Azrou and Ifrane.',
                    'Arrival in Fes by evening and drop-off at your accommodation.',
                ]),
            ],
        ]);
        $categoryId = TourCategory::where('slug', 'fes-desert-tours')->value('id');
        $locationId = Location::where('slug', 'fes')->value('id');

        $tour = Tour::create([
            'title' => '3-Day Tour from Fes to Merzouga Desert and Back: Private Camel Trekking Adventure',
            'slug' => Str::slug('3-Day Tour from Fes to Merzouga Desert and Back: Private Camel Trekking Adventure'),
            'type' => 'multi_day',
            'duration' => '3 Days',
            'group_size' => 'Flexible',
            'age_range' => 'All ages',
            'base_price' => 0,
            'bestseller_flag' => true,
            'free_cancellation_flag' => true,
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?pb=!1m52!1m12!1m3!1d1722013.2447155092!2d-5.7422915349114865!3d32.54464778278658!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m37!3e0!4m5!1s0xd9f8b484d445777%3A0x10e6aaaeedd802ef!2sFes!3m2!1d34.0181246!2d-5.0078451!4m5!1s0xda1d772f32d140b%3A0x7253cf1d404c7ca3!2sIfran!3m2!1d33.5228062!2d-5.110955199999999!4m5!1s0xda1db356fb826b3%3A0xb4f27cf230f6e50b!2sAzrou!3m2!1d33.4347305!2d-5.231887899999999!4m5!1s0xd98bf42e8441e9f%3A0x88269ca6a8dbb536!2sMidelt!3m2!1d32.6799423!2d-4.7329267999999995!4m5!1s0xd977b2c5079550b%3A0xf04c523511a64215!2sErfoud!3m2!1d31.436633399999998!2d-4.234383!4m5!1s0xd973c279834dfe5%3A0x5639fab2b5de4a44!2sMerzouga%2C+Morocco!3m2!1d31.0801676!2d-4.013361!5e0!3m2!1sen!2sma!4v1556136536188!5m2!1sen!2sma" width="655" height="548" frameborder="0" style="border:0" allowfullscreen></iframe>',
            'overview' => 'This 3-day private tour from Fes to Merzouga Desert and back offers the perfect balance of scenic mountain drives, camel trekking, and cultural immersion. Travel through the Middle Atlas, visit Azrou and Midelt, and enjoy two nights in the Sahara — one in a desert lodge and another in a traditional Berber camp.',
            'highlights' => json_encode([
                'Visit Ifrane and Azrou cedar forest',
                'Cross the Middle Atlas and stop in Midelt',
                'Camel ride into the dunes of Erg Chebbi',
                'Two nights in Merzouga: one in hotel/riad, one in desert camp',
                'Berber music and dinner under the stars',
                'Sunrise and sunset in the Sahara',
                'Visit Khamlia village and nomadic families',
                'Return to Fes via Ziz Valley and Errachidia',
            ]),
            'included' => json_encode([
                'Hotel pickup and drop-off in Fes',
                'Private transport in air-conditioned vehicle',
                'English/French/Spanish-speaking driver/guide',
                'Camel trek in Erg Chebbi dunes',
                '1 night in hotel/riad in Merzouga',
                '1 night in standard or luxury desert camp',
                'Dinners and breakfasts',
            ]),
            'excluded' => json_encode([
                'Lunches and soft drinks',
                'Admission fees and tips',
            ]),
            'languages' => json_encode(['English', 'French', 'Spanish']),
            'category_id' => $categoryId,
            'location_id' => $locationId,
        ]);

        $tour->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Fes – Ifrane – Azrou – Midelt – Erfoud – Merzouga',
                'content' => json_encode([
                    'Departure from Fes at 8:00 AM after hotel pickup.',
                    'Stop in Ifrane for a photo break in the “Switzerland of Morocco.”',
                    'Visit Azrou cedar forest and meet wild Barbary monkeys.',
                    'Lunch in Midelt and continuation via Errachidia and Erfoud.',
                    'Arrival in Merzouga and camel trek to the desert camp.',
                    'Sunset over the dunes, dinner, Berber music, and overnight stay in the camp.',
                ]),
            ],
            [
                'day_number' => 2,
                'title' => 'Merzouga Desert Exploration & Camel Trek to Second Camp',
                'content' => json_encode([
                    'Breakfast in the camp and optional shower.',
                    'Visit nomadic families and Khamlia village (Gnawa music).',
                    'Lunch in Merzouga or Rissani.',
                    'Afternoon camel trek into the dunes to a second desert camp.',
                    'Enjoy the sunset and another evening under the stars with Berber dinner and music.',
                ]),
            ],
            [
                'day_number' => 3,
                'title' => 'Merzouga – Ziz Valley – Midelt – Azrou – Fes',
                'content' => json_encode([
                    'Wake up early for sunrise in the dunes.',
                    'Camel ride back and breakfast at guesthouse.',
                    'Drive through Ziz Valley and Midelt.',
                    'Stops in Azrou and Ifrane before reaching Fes in the evening.',
                    'Drop-off at your hotel in Fes.',
                ]),
            ],
        ]);

        $categoryId = TourCategory::where('slug', 'fes-desert-tours')->value('id');
        $locationId = Location::where('slug', 'fes')->value('id');

        $tour = Tour::create([
            'title' => '3-Day Tour from Fes to Merzouga Desert and Marrakech',
            'slug' => Str::slug('3-Day Tour from Fes to Merzouga Desert and Marrakech'),
            'type' => 'multi_day',
            'duration' => '3 Days 2 Nights',
            'group_size' => 'Flexible',
            'age_range' => 'All ages',
            'base_price' => 0,
            'bestseller_flag' => true,
            'free_cancellation_flag' => true,
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?pb=!1m76!1m12!1m3!1d1723461.4832632923!2d-7.116934670178039!3d32.46906173905571!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m61!3e0!4m5!1s0xd9f8b484d445777%3A0x10e6aaaeedd802ef!2sFes!3m2!1d34.0181246!2d-5.0078451!4m5!1s0xda1d772f32d140b%3A0x7253cf1d404c7ca3!2sIfran!3m2!1d33.5228062!2d-5.110955199999999!4m5!1s0xda1db356fb826b3%3A0xb4f27cf230f6e50b!2sAzrou!3m2!1d33.4347305!2d-5.231887899999999!4m5!1s0xd98bf42e8441e9f%3A0x88269ca6a8dbb536!2sMidelt!3m2!1d32.6799423!2d-4.7329267999999995!4m5!1s0xd977b2c5079550b%3A0xf04c523511a64215!2sErfoud!3m2!1d31.436633399999998!2d-4.234383!4m5!1s0xd973c279834dfe5%3A0x5639fab2b5de4a44!2sMerzouga%2C+Morocco!3m2!1d31.0801676!2d-4.013361!4m5!1s0xdbd331a6d3914af%3A0xcdb9c0416d74335c!2sTodrha%2C+Tinghir!3m2!1d31.479999999999997!2d-5.51!4m5!1s0xda3328c8a8c64bf%3A0x257d57d5120009c0!2sDadès+Gorges!3m2!1d31.4532146!2d-5.9675869!4m5!1s0xdbb104077422057%3A0x26b3cb529b37ab00!2sOuarzazate!3m2!1d30.9335436!2d-6.937016!4m5!1s0xdafee8d96179e51%3A0x5950b6534f87adb8!2sMarrakesh!3m2!1d31.6294723!2d-7.9810845!5e0!3m2!1sen!2sma!4v1556138650171!5m2!1sen!2sma" width="655" height="548" frameborder="0" style="border:0" allowfullscreen></iframe>',
            'overview' => 'Experience a breathtaking 3-day journey from Fes to Marrakech via the Sahara Desert. Ride camels in Merzouga, explore the Todra and Dades Gorges, and visit the iconic Ait Benhaddou before crossing the High Atlas to reach the Red City.',
            'highlights' => json_encode([
                'Stop at Ifrane and Azrou cedar forest',
                'Drive through Middle Atlas and Ziz Valley',
                'Camel trekking and overnight in Merzouga desert camp',
                'Explore Todra and Dades Gorges',
                'Visit Rose Valley, Skoura, and Ouarzazate film studios',
                'Tour Ait Benhaddou (UNESCO site)',
                'Cross Tizi n’Tichka Pass to Marrakech',
            ]),
            'included' => json_encode([
                'Hotel/riad pickup in Fes and drop-off in Marrakech',
                'Private A/C transport with driver-guide',
                'Camel ride in Erg Chebbi dunes',
                '1 night in Merzouga desert camp',
                '1 night in Dades Valley hotel',
                '2 breakfasts and 2 dinners',
            ]),
            'excluded' => json_encode([
                'Lunches and soft drinks',
                'Entry fees and tips',
            ]),
            'languages' => json_encode(['English', 'French', 'Spanish']),
            'category_id' => $categoryId,
            'location_id' => $locationId,
        ]);
        $tour->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Fes – Ifrane – Azrou – Midelt – Erfoud – Merzouga',
                'content' => json_encode([
                    'Depart from your hotel in Fes at 8:00 AM.',
                    'Stop in Ifrane, the “Switzerland of Morocco”, for photos.',
                    'Visit Azrou cedar forest and see Barbary apes.',
                    'Lunch in Midelt and continuation through Ziz Valley.',
                    'Explore Erfoud fossil workshops.',
                    'Arrive in Merzouga and camel trek to desert camp.',
                    'Enjoy sunset over the dunes, Berber dinner, and overnight in camp.',
                ]),
            ],
            [
                'day_number' => 2,
                'title' => 'Merzouga – Rissani – Todra Gorge – Dades Valley',
                'content' => json_encode([
                    'Early wake-up for sunrise over the dunes.',
                    'Camel ride back to Merzouga and breakfast.',
                    'Drive through Rissani and Erfoud.',
                    'Stop to explore Todra Gorge with free time.',
                    'Continue to Dades Valley and enjoy dinner and overnight in local kasbah.',
                ]),
            ],
            [
                'day_number' => 3,
                'title' => 'Dades – Skoura – Ait Benhaddou – Marrakech',
                'content' => json_encode([
                    'Breakfast in Dades, then explore the Gorge.',
                    'Drive through Rose Valley and Skoura palm groves.',
                    'Visit Ouarzazate (Taourirt Kasbah and Atlas Studios).',
                    'Guided visit of Ait Benhaddou (UNESCO site).',
                    'Cross Tizi n’Tichka pass through the High Atlas Mountains.',
                    'Arrival in Marrakech in the evening, hotel drop-off.',
                ]),
            ],
        ]);
        $categoryId = TourCategory::where('slug', 'fes-desert-tours')->value('id');
        $locationId = Location::where('slug', 'fes')->value('id');

        $tour = Tour::create([
            'title' => '4-Day Tour from Fes to Merzouga and Marrakech',
            'slug' => Str::slug('4-Day Tour from Fes to Merzouga and Marrakech'),
            'type' => 'multi_day',
            'duration' => '4 Days 3 Nights',
            'group_size' => 'Flexible',
            'age_range' => 'All ages',
            'base_price' => 0,
            'bestseller_flag' => true,
            'free_cancellation_flag' => true,
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?pb=!1m76!1m12!1m3!1d1723461.4832632923!2d-7.116934670178039!3d32.46906173905571!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m61!... (truncated for brevity)</iframe>',
            'overview' => 'Explore the beauty of southern Morocco in a 4-day journey from Fes to Marrakech. Visit Ifrane, the cedar forests of Azrou, the dunes of Merzouga, Todra Gorges, Dades Valley, and the iconic Ait Benhaddou Kasbah.',
            'highlights' => json_encode([
                'Stop at Ifrane and cedar forest in Azrou',
                'Drive through Middle Atlas and Ziz Valley',
                'Explore Rissani souk and Khamlia village',
                'Camel trek and night in Sahara camp',
                'Todra Gorges and Dades Valley adventure',
                'Visit Ouarzazate and film studios',
                'Guided tour of Ait Benhaddou Kasbah',
                'Cross Tizi n’Tichka pass to Marrakech',
            ]),
            'included' => json_encode([
                'Hotel/riad pickup in Fes and drop-off in Marrakech',
                'Private A/C vehicle with driver-guide',
                'Camel trek in Erg Chebbi dunes',
                '1 night in Merzouga hotel',
                '1 night in Sahara desert camp',
                '1 night in Dades Valley kasbah',
                'Dinners and breakfasts included',
            ]),
            'excluded' => json_encode([
                'Lunches and soft drinks',
                'Entrance fees and tips',
            ]),
            'languages' => json_encode(['English', 'French', 'Spanish']),
            'category_id' => $categoryId,
            'location_id' => $locationId,
        ]);

        $tour->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Fes – Ifrane – Midelt – Erfoud – Merzouga',
                'content' => json_encode([
                    'Pickup from your hotel/riad in Fes.',
                    'Drive through Ifrane (known as Morocco’s Switzerland).',
                    'Visit the cedar forest near Azrou and observe Barbary apes.',
                    'Lunch stop in Midelt, then continue through the Ziz Valley.',
                    'Arrival in Merzouga and overnight at a desert hotel with dinner.',
                ]),
            ],
            [
                'day_number' => 2,
                'title' => 'Merzouga Desert Excursion – Camel Ride – Camp',
                'content' => json_encode([
                    'Explore Rissani’s traditional souk.',
                    'Visit Hassilabiad Nomad museum and Khamlia Gnaoua music village.',
                    'In the afternoon, camel trek across Erg Chebbi dunes.',
                    'Enjoy a beautiful desert sunset.',
                    'Dinner and overnight in a luxury desert camp with Berber music.',
                ]),
            ],
            [
                'day_number' => 3,
                'title' => 'Merzouga – Todra Gorge – Dades Valley',
                'content' => json_encode([
                    'Early wake-up to watch the sunrise in the dunes.',
                    'Camel ride back and breakfast at the hotel.',
                    'Drive through Erfoud and Tinghir to reach Todra Gorge.',
                    'Explore the dramatic canyon famous for rock climbing.',
                    'Continue to Dades Valley for dinner and overnight in a local kasbah.',
                ]),
            ],
            [
                'day_number' => 4,
                'title' => 'Dades – Rose Valley – Ouarzazate – Ait Benhaddou – Marrakech',
                'content' => json_encode([
                    'Explore Dades Valley after breakfast.',
                    'Drive through Kalaat M’Gouna and Rose Valley.',
                    'Visit Skoura oasis and film studios in Ouarzazate.',
                    'Guided tour of Ait Benhaddou, UNESCO-listed site.',
                    'Cross the High Atlas Mountains via Tizi n’Tichka pass.',
                    'Arrive in Marrakech and hotel drop-off.',
                ]),
            ],
        ]);
        $categoryId = TourCategory::where('slug', 'fes-desert-tours')->value('id');
        $locationId = Location::where('slug', 'fes')->value('id');

        $tour = Tour::create([
            'title' => '5-Day Tour from Fes to Marrakech via Merzouga Desert',
            'slug' => Str::slug('5-Day Tour from Fes to Marrakech via Merzouga Desert'),
            'type' => 'multi_day',
            'duration' => '5 Days',
            'group_size' => 'Flexible',
            'age_range' => 'All ages',
            'base_price' => 0,
            'bestseller_flag' => true,
            'free_cancellation_flag' => true,
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?pb=!1m76!... (truncated)</iframe>',
            'overview' => 'Discover the magic of Morocco on this 5-day tour from Fes to Marrakech. Experience the Middle Atlas Mountains, Sahara dunes, Todra and Dades Valleys, Skoura, and the UNESCO World Heritage Kasbah Ait Benhaddou.',
            'highlights' => json_encode([
                'Visit Ifrane and the cedar forests of Azrou',
                'Cross the Middle Atlas Mountains via Midelt and Errachidia',
                'Explore Erfoud’s fossil workshops',
                'Camel trek in the Erg Chebbi dunes with desert sunset',
                'Night in luxury desert camp with Berber music',
                'Discover Todra Gorge and Dades Valley',
                'Visit Skoura palm grove and Ouarzazate film studios',
                'Explore Ait Benhaddou Kasbah and drive through Tizi n’Tichka pass',
            ]),
            'included' => json_encode([
                'Hotel pickup in Fes and drop-off in Marrakech',
                'Private air-conditioned vehicle and local driver',
                'Camel ride in the Sahara Desert',
                '1 night in Merzouga kasbah hotel',
                '1 night in desert camp',
                '2 nights in local kasbahs (Todra & Ouarzazate)',
                'Breakfasts and dinners included',
            ]),
            'excluded' => json_encode([
                'Lunches and soft drinks',
                'Entrance fees and personal expenses',
            ]),
            'languages' => json_encode(['English', 'French', 'Spanish']),
            'category_id' => $categoryId,
            'location_id' => $locationId,
        ]);
        $tour->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Fes – Ifrane – Azrou – Midelt – Errachidia – Erfoud – Merzouga',
                'content' => json_encode([
                    'Pickup from your hotel or riad in Fes.',
                    'Drive to Ifrane, known as the "Switzerland of Morocco".',
                    'Visit cedar forest in Azrou and observe Barbary apes.',
                    'Continue through the Middle Atlas Mountains to Midelt for lunch.',
                    'Drive through Errachidia, Ziz Valley, and reach Erfoud to visit a fossil workshop.',
                    'Arrival in Merzouga and check-in at local kasbah hotel with dinner.',
                ]),
            ],
            [
                'day_number' => 2,
                'title' => 'Merzouga Desert Excursion – Camel Ride – Camp',
                'content' => json_encode([
                    'After breakfast, visit Hassilabied Nomad Museum.',
                    'Explore Khamlia village and enjoy a live Gnawa music performance.',
                    'In the afternoon, camel trek into the dunes of Erg Chebbi.',
                    'Watch the desert sunset and arrive at the desert camp.',
                    'Dinner and overnight in a comfortable nomadic tent with Berber music.',
                ]),
            ],
            [
                'day_number' => 3,
                'title' => 'Merzouga – Rissani – Erfoud – Todra Valley',
                'content' => json_encode([
                    'Early wake-up for desert sunrise and camel ride back.',
                    'Breakfast at hotel then depart to Rissani to explore its traditional souk.',
                    'Drive through Erfoud and reach Todra Valley, famous for its palm grove and canyons.',
                    'Dinner and overnight in a kasbah hotel.',
                ]),
            ],
            [
                'day_number' => 4,
                'title' => 'Todra – Dades – Skoura – Ouarzazate',
                'content' => json_encode([
                    'Depart through the Road of 1000 Kasbahs passing Berber villages.',
                    'Short stop in Dades Valley for photos.',
                    'Continue through the palm groves of Skoura.',
                    'Arrival in Ouarzazate to visit Taourirt Kasbah and film studios.',
                    'Dinner and overnight in a hotel.',
                ]),
            ],
            [
                'day_number' => 5,
                'title' => 'Ouarzazate – Ait Benhaddou – Tizi n’Tichka – Marrakech',
                'content' => json_encode([
                    'After breakfast, visit the UNESCO-listed Ait Benhaddou Kasbah.',
                    'Continue through the High Atlas Mountains via Tizi n’Tichka Pass.',
                    'Panoramic stops and views on the way.',
                    'Arrive in Marrakech by evening and drop-off at your hotel or riad.',
                ]),
            ],
        ]);
        // Fes tour END

        // chefchaouen tours start
        $categoryId = TourCategory::where('slug', 'chefchaouen-to-sahara-tours')->value('id');
        $locationId = Location::where('slug', 'chefchaouen')->value('id');

        // Create tour
        $chefchaouenTour = Tour::create([
            'title' => '5-Day Morocco Adventure Tour from Chefchaouen to the Sahara Desert',
            'slug' => Str::slug('5-Day Morocco Adventure Tour from Chefchaouen to the Sahara Desert'),
            'type' => 'multi_day',
            'duration' => '5 Days',
            'group_size' => 'Flexible',
            'age_range' => 'All ages',
            'base_price' => 0,
            'bestseller_flag' => false,
            'free_cancellation_flag' => true,
            'overview' => "We organize Morocco private tours from Chefchaouen to the Sahara desert, including Merzouga dunes exploration, in family tours departing from Chefchaouen. This itinerary offers cultural visits to Fes, Roman ruins, Berber villages, camel trekking, and stunning desert and mountain landscapes.",
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?...(your iframe)..."></iframe>',
            'highlights' => json_encode([
                "Visit to Fes, Roman ruins of Volubilis, and Moulay Idriss",
                "Guided city tour of Fes medina including Al Qaraouine and tanneries",
                "Camel ride and overnight in Berber camp in Merzouga desert",
                "Explore Todra Gorges and Dades Valley",
                "Visit Ait Benhaddou Kasbah and Ouarzazate Atlas Studios",
            ], JSON_UNESCAPED_UNICODE),
            'languages' => json_encode(['English', 'French', 'Spanish'], JSON_UNESCAPED_UNICODE),
            'included' => json_encode([
                "All hotel pick up transfers with experienced drivers",
                "Private A/C vehicle from Chefchaouen",
                "Camel trek in Merzouga desert",
                "Overnight stays in riads/hotels and desert camp",
                "Dinners and breakfasts",
            ], JSON_UNESCAPED_UNICODE),
            'excluded' => json_encode([
                "Lunches and soft drinks",
                "Entrance fees and tips",
            ], JSON_UNESCAPED_UNICODE),
            'category_id' => $categoryId,
            'location_id' => $locationId,
        ]);

        // Create structured itinerary
        $chefchaouenTour->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Chefchaouen - Ouazane - Fes',
                'content' => json_encode([
                    "In a private Morocco tour departing from Chefchaouen, you will discover the top destinations.",
                    "Today we head to Fes, where you can see the Roman ruins of Volubilis. Then we will visit Moulay Idriss, a sacred city, before continuing to Fes, where we will arrive in the afternoon.",
                    "Dinner and overnight stay in a nearby hotel.",
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'day_number' => 2,
                'title' => 'Excursion in Fes City',
                'content' => json_encode([
                    "Today you will take a guided tour of Fes's medina with a native guide.",
                    "You go to the famed Souks and historical sites such as Al Qaraouine University and the traditional tanneries.",
                    "Overnight at a hotel or riad.",
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'day_number' => 3,
                'title' => 'Fes - Ifrane - Midelt - Merzouga Desert',
                'content' => json_encode([
                    "We will travel from Fes to Ifrane and Midelt, with scenic stops along the way.",
                    "You will pass through Errachidia and Erfoud before arriving in Merzouga.",
                    "After arrival, we prepare for a camel trek into the Erg Chebbi dunes and enjoy a 90-minute ride to the desert camp.",
                    "After dinner, we gather around the campfire to enjoy traditional Berber drumming.",
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'day_number' => 4,
                'title' => 'Merzouga Desert - Todra - Dades Gorges',
                'content' => json_encode([
                    "We wake early to catch the magical Sahara sunrise, then ride camels back and enjoy breakfast.",
                    "We continue to Rissani and Tinghir, then explore the dramatic Todra Canyons — Morocco's narrowest gorges.",
                    "After lunch, we head to the Dades Valley where we spend the night in a local kasbah or hotel.",
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'day_number' => 5,
                'title' => 'Dades Gorges - Skoura - Marrakech',
                'content' => json_encode([
                    "After breakfast, we explore the Dades Valley and drive through the Route of Thousand Kasbahs toward Kalaa M'gouna and Skoura.",
                    "We stop in Ouarzazate to visit the Atlas Film Studios and continue to the UNESCO-listed Ait Benhaddou Kasbah.",
                    "After lunch, we cross the High Atlas Mountains and Berber villages en route to Marrakech, where the tour concludes.",
                ], JSON_UNESCAPED_UNICODE),
            ],
        ]);

        // Retrieve IDs
        $categoryId = TourCategory::where('slug', 'chefchaouen-to-sahara-tours')->value('id');
        $locationId = Location::where('slug', 'chefchaouen')->value('id');

        // Create tour
        $chefchaouenTour2 = Tour::create([
            'title' => '6-Day Morocco Desert Tour from Chefchaouen to Marrakech',
            'slug' => Str::slug('6-Day Morocco Desert Tour from Chefchaouen to Marrakech'),
            'type' => 'multi_day',
            'duration' => '6 Days',
            'group_size' => 'Flexible',
            'age_range' => 'All ages',
            'base_price' => 0,
            'bestseller_flag' => false,
            'free_cancellation_flag' => true,
            'overview' => "Adventure excursion from Chefchaouen through the desert, via Fes, to Merzouga and Marrakech. Includes guided medina tours, camel trekking, Berber music, desert camp, kasbahs, and cultural discovery.",
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?...your map iframe..."></iframe>',
            'highlights' => json_encode([
                "Roman ruins at Volubilis and Moulay Ismail Mausoleum in Meknes",
                "Royal Palace, Al Karaouine, tanneries & Attarine Museum in Fes",
                "Camel trek to Merzouga desert camp with Berber music show",
                "Visit Khamlia village, explore Erg Chebbi dunes",
                "Sunrise over Merzouga dunes and Todra Gorges exploration",
                "Dades Valley, Ait Benhaddou, and scenic drive over Atlas Mountains"
            ], JSON_UNESCAPED_UNICODE),
            'languages' => json_encode(['English', 'Spanish', 'French'], JSON_UNESCAPED_UNICODE),
            'included' => json_encode([
                "All hotel pick up transfers with experienced drivers",
                "Comfortable private travel from Chefchaouen in A/C vehicle",
                "Merzouga camel trek desert experience",
                "Accommodation in riads/hotels and desert camp",
                "Dinners and breakfasts"
            ], JSON_UNESCAPED_UNICODE),
            'excluded' => json_encode([
                "Lunches and soft drinks",
                "Entrance fees and tips"
            ], JSON_UNESCAPED_UNICODE),
            'category_id' => $categoryId,
            'location_id' => $locationId,
        ]);

        // Itinerary creation
        $chefchaouenTour2->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Chefchaouen - Volubilis - Meknes - Fes',
                'content' => json_encode([
                    "After breakfast, we drive to Volubilis via Ouazane for a guided tour of the Roman ruins.",
                    "Then we proceed to Meknes to visit the medina walls, Bab El Mansour, and Moulay Ismail's Mausoleum.",
                    "Arrival in Fes and overnight in a traditional riad."
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'day_number' => 2,
                'title' => 'Fes Medina Guided Tour',
                'content' => json_encode([
                    "Guided tour of Fes including Royal Palace Gate, Al Karaouine University, the tanneries, and the Attarine Museum.",
                    "Experience Fes’s spiritual and artisanal heritage. Overnight in a riad."
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'day_number' => 3,
                'title' => 'Fes - Ifrane - Midelt - Erfoud - Merzouga',
                'content' => json_encode([
                    "Depart Fes to Ifrane and continue through the cedar forests of Azrou.",
                    "Lunch stop in Midelt, then on to Aoufous, Erfoud, and Merzouga.",
                    "Dinner and overnight in a kasbah or desert guesthouse near the dunes."
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'day_number' => 4,
                'title' => 'Merzouga & Camel Trek to Desert Camp',
                'content' => json_encode([
                    "After breakfast, visit the Gnaoua musicians in Khamlia village.",
                    "Camel trek in the afternoon into the Erg Chebbi dunes.",
                    "Watch the sunset, enjoy dinner, and overnight in a Berber desert camp."
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'day_number' => 5,
                'title' => 'Merzouga - Tinghir - Todra Gorges - Dades Valley',
                'content' => json_encode([
                    "Early sunrise in the desert followed by camel ride back and breakfast.",
                    "Travel through Tinghir and explore Todra Gorges, Morocco's tallest canyons.",
                    "Continue to Dades Valley and stay overnight in a kasbah or local hotel."
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'day_number' => 6,
                'title' => 'Dades Gorges - Skoura - Ait Benhaddou - Marrakech',
                'content' => json_encode([
                    "Drive the Route of a Thousand Kasbahs via Kalaat Mgouna and Skoura.",
                    "Visit Ouarzazate and the famous Ait Benhaddou Kasbah (UNESCO site).",
                    "Cross the High Atlas Mountains to reach Marrakech. End of tour."
                ], JSON_UNESCAPED_UNICODE),
            ],
        ]);

        // Get category/location IDs
        $categoryId = TourCategory::where('slug', 'chefchaouen-to-sahara-tours')->value('id');
        $locationId = Location::where('slug', 'chefchaouen')->value('id');

        // Create Tour
        $tour = Tour::create([
            'title' => '7-Day Morocco Tour from Chefchaouen to Marrakech via Fes & Sahara',
            'slug' => Str::slug('7-Day Morocco Tour from Chefchaouen to Marrakech via Fes & Sahara'),
            'type' => 'multi_day',
            'duration' => '7 Days',
            'group_size' => 'Flexible',
            'age_range' => 'All ages',
            'base_price' => 0,
            'bestseller_flag' => false,
            'free_cancellation_flag' => true,
            'overview' => "This 7-day Morocco tour from Chefchaouen includes guided visits to Fes, Meknes, the Roman ruins of Volubilis, camel trek in Merzouga, desert camp, Todra & Dades Gorges, Ouarzazate, Ait Benhaddou, and ends in Marrakech with a city tour and airport transfer.",
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?...your full map iframe..."></iframe>',
            'highlights' => json_encode([
                "Private tour from Chefchaouen via Fes, Merzouga, and Marrakech",
                "Visit Roman ruins of Volubilis and spiritual town Moulay Idriss",
                "Explore Fes medina: Karaouiyne Mosque, Nejjarine Fountain",
                "Camel trek to Merzouga desert camp with sunset and Berber show",
                "Visit Todra and Dades Gorges, Skoura palm oasis",
                "Explore Ouarzazate studios and Ait Benhaddou Kasbah (UNESCO)",
                "Marrakech city tour with transfer to airport"
            ], JSON_UNESCAPED_UNICODE),
            'languages' => json_encode(['English', 'Spanish', 'French'], JSON_UNESCAPED_UNICODE),
            'included' => json_encode([
                "All hotel pick up and airport transfers",
                "Private A/C vehicle from Chefchaouen with experienced driver",
                "Accommodation in riads, hotels and desert camp",
                "Camel trek in Merzouga",
                "Breakfasts and dinners"
            ], JSON_UNESCAPED_UNICODE),
            'excluded' => json_encode([
                "Lunches and soft drinks",
                "Tips and entrance fees"
            ], JSON_UNESCAPED_UNICODE),
            'category_id' => $categoryId,
            'location_id' => $locationId,
        ]);

        // Itinerary
        $tour->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Chefchaouen - Volubilis - Moulay Idriss - Meknes - Fes',
                'content' => json_encode([
                    "Pickup from Chefchaouen or airport. Brief guided tour in Chefchaouen.",
                    "Visit Roman ruins at Volubilis and the spiritual town of Moulay Idriss.",
                    "Explore Meknes: medina, Bab Mansour, and Moulay Ismail Mosque.",
                    "Arrive in Fes for dinner and overnight in riad or hotel."
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'day_number' => 2,
                'title' => 'Full Day Fes Medina Tour',
                'content' => json_encode([
                    "Visit Fes medina: Karaouiyne Mosque, Nejjarine Fountain, Attarine Museum.",
                    "Explore tanneries and artisan souks with a local guide.",
                    "Overnight in traditional riad in Fes."
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'day_number' => 3,
                'title' => 'Fes - Ifrane - Midelt - Errachidia - Merzouga',
                'content' => json_encode([
                    "Depart Fes toward Ifrane (the Moroccan Switzerland).",
                    "Pass Azrou cedar forest and cross the High Atlas to Midelt.",
                    "Drive through Errachidia and Erfoud to reach Merzouga.",
                    "Camel ride to desert camp, dinner under the stars with Berber music."
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'day_number' => 4,
                'title' => 'Merzouga - Rissani - Todra Gorge - Dades Valley',
                'content' => json_encode([
                    "Sunrise in the Sahara followed by camel trek return.",
                    "Visit Rissani’s local market and fossils in Erfoud.",
                    "Explore Todra Gorge, Morocco’s narrowest canyons.",
                    "Dinner and overnight in hotel or kasbah in Dades Valley."
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'day_number' => 5,
                'title' => 'Dades - Skoura Oasis - Ouarzazate',
                'content' => json_encode([
                    "Travel through Kalaat M’Gouna to Skoura palm grove.",
                    "Visit Kasbah Amridil and continue to Ouarzazate.",
                    "Explore Atlas film studios and overnight in Ouarzazate."
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'day_number' => 6,
                'title' => 'Ouarzazate - Ait Benhaddou - Marrakech',
                'content' => json_encode([
                    "Morning visit to Ait Benhaddou (UNESCO site, film location).",
                    "Cross Tizi n'Tichka pass through High Atlas Mountains.",
                    "Arrival in Marrakech and overnight in a central riad or hotel."
                ], JSON_UNESCAPED_UNICODE),
            ],
            [
                'day_number' => 7,
                'title' => 'Marrakech City Tour & Departure',
                'content' => json_encode([
                    "Guided tour of Marrakech: Koutoubia, Bahia Palace, Jemaa el-Fnaa.",
                    "Free time for last shopping or relaxation.",
                    "Transfer to airport (Marrakech or Casablanca). Optional hotel stay if needed."
                ], JSON_UNESCAPED_UNICODE),
            ],
        ]);
        // chefchaouen END

        $categoryId = TourCategory::where('slug', 'agadir-desert-adventures')->value('id');
        $locationId = Location::where('slug', 'agadir')->value('id');

        // agadir start 
        $tour = Tour::create([
            'title' => '2-Day Desert Tour from Agadir to Zagora with Camel Trek',
            'slug' => Str::slug('2-Day Desert Tour from Agadir to Zagora with Camel Trek'),
            'type' => 'multi_day',
            'duration' => '2 Days',
            'group_size' => 'Flexible',
            'age_range' => 'All ages',
            'base_price' => 0,
            'bestseller_flag' => false,
            'free_cancellation_flag' => true,
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?pb=!1m52!1m12!1m3!1d1750731.9148116696!2d-8.84004349279545!3d31.015151554880706!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m37!3e0!4m5!1s0xdb3b6e9daad1cc9%3A0xbcf8d0b78bf48474!2sAgadir!3m2!1d30.427754699999998!2d-9.5981072!4m5!1s0xdb17309901e7a19%3A0x9b0fdf4f4b50237a!2sTaroudant!3m2!1d30.472712599999998!2d-8.8748765!4m5!1s0xdba516cbde6130b%3A0x154cbc79ab579f13!2sTazenakht!3m2!1d30.573151399999997!2d-7.2032754!4m5!1s0xdbc36ea58680e95%3A0x75e9e9fb616de232!2sZagora!3m2!1d30.345899799999998!2d-5.8406587!4m5!1s0xdafee8d96179e51%3A0x5950b6534f87adb8!2sMarrakesh!3m2!1d31.6294723!2d-7.9810845!4m5!1s0xdb3b6e9daad1cc9%3A0xbcf8d0b78bf48474!2sAgadir!3m2!1d30.427754699999998!2d-9.5981072!5e0!3m2!1sen!2sma!4v1570019685576!5m2!1sen!2sma" width="655" height="548" frameborder="0" style="border:0;" allowfullscreen=""></iframe>',
            'overview' => 'We offer a two-day Agadir desert tour to Zagora including camel ride, overnight in Berber camp, pottery village visits, and return via Ait Benhaddou and Marrakech.',
            'highlights' => json_encode([
                "Camel ride in Zagora desert and overnight in Berber tent",
                "Visit to Tamegroute pottery village and Koranic library",
                "Explore the scenic Draa Valley oasis and Anti Atlas villages",
                "Visit to Ait Benhaddou Kasbah (UNESCO World Heritage)",
                "Travel through the High Atlas Mountains and Tichka Pass"
            ]),
            'languages' => json_encode(['English', 'French', 'Spanish']),
            'included' => json_encode([
                "Transfers from/to airport or hotel in Agadir",
                "Private transportation in A/C vehicle",
                "Experienced local desert guide",
                "Camel trek and guide in Zagora",
                "1 night in Berber desert camp with dinner and breakfast"
            ]),
            'excluded' => json_encode([
                "Lunches and soft drinks",
                "Admission fees and tips"
            ]),
            'category_id' => TourCategory::where('slug', 'agadir-desert-adventures')->value('id'),
            'location_id' => Location::where('slug', 'agadir')->value('id'),
        ]);

        $tour->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Agadir to Zagora via Taliouine and Draa Valley',
                'content' => [
                    'Departure from Agadir at 7:30 a.m. through Souss plain and Anti-Atlas villages.',
                    'Stop in Taliouine, Taznakht, and Agdz for lunch.',
                    'Visit Tamegroute pottery village and Koranic library.',
                    'Camel trek to Berber camp, admire sunset and enjoy dinner under stars.'
                ]
            ],
            [
                'day_number' => 2,
                'title' => 'Zagora – Ouarzazate – Ait Benhaddou – Marrakech – Agadir',
                'content' => [
                    'Sunrise camel ride, breakfast in Zagora.',
                    'Drive to Ouarzazate and explore Ait Benhaddou with local guide.',
                    'Cross Tizi n’Tichka pass in High Atlas.',
                    'Short medina visit in Marrakech then drop off at hotel in Agadir.'
                ]
            ],
        ]);

        $categoryId = TourCategory::where('slug', 'agadir-desert-adventures')->value('id');
        $locationId = Location::where('slug', 'agadir')->value('id');

        $tour = Tour::create([
            'title' => '3-Day Desert Tour from Agadir to Erg Chigaga with Camel Trek',
            'slug' => Str::slug('3-Day Desert Tour from Agadir to Erg Chigaga with Camel Trek'),
            'type' => 'multi_day',
            'duration' => '3 Days',
            'group_size' => 'Flexible',
            'age_range' => 'All ages',
            'base_price' => 0,
            'bestseller_flag' => false,
            'free_cancellation_flag' => true,
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?pb=!1m52!1m12!1m3!1d1750731.9148116696!2d-8.84004349279545!3d31.015151554880706!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m37!3e0!4m5!1s0xdb3b6e9daad1cc9%3A0xbcf8d0b78bf48474!2sAgadir!3m2!1d30.427754699999998!2d-9.5981072!4m5!1s0xdb17309901e7a19%3A0x9b0fdf4f4b50237a!2sTaroudant!3m2!1d30.472712599999998!2d-8.8748765!4m5!1s0xdba516cbde6130b%3A0x154cbc79ab579f13!2sTazenakht!3m2!1d30.573151399999997!2d-7.2032754!4m5!1s0xdbc36ea58680e95%3A0x75e9e9fb616de232!2sZagora!3m2!1d30.345899799999998!2d-5.8406587!4m5!1s0xdafee8d96179e51%3A0x5950b6534f87adb8!2sMarrakesh!3m2!1d31.6294723!2d-7.9810845!4m5!1s0xdb3b6e9daad1cc9%3A0xbcf8d0b78bf48474!2sAgadir!3m2!1d30.427754699999998!2d-9.5981072!5e0!3m2!1sen!2sma!4v1570019685576!5m2!1sen!2sma" width="655" height="548" frameborder="0" style="border:0;" allowfullscreen=""></iframe>',
            'overview' => 'This 3-day Erg Chigaga desert tour from Agadir includes camel trekking, Berber bivouac, visits to Taroudant, Lake Iriqui, and Ait Benhaddou, ending in Marrakech and returning to Agadir.',
            'highlights' => json_encode([
                "Scenic drive through Taroudant and Anti-Atlas villages",
                "Camel trekking and overnight in Erg Chigaga desert camp",
                "Visit saffron capital Taliouine and Foum Zguid",
                "Cross Lake Iriqui and explore Ouarzazate",
                "Visit Ait Benhaddou and return via Marrakech"
            ]),
            'languages' => json_encode(['English', 'French', 'Spanish']),
            'included' => json_encode([
                "Transfers from/to Agadir hotels or airport",
                "Private A/C transportation with local guide",
                "Camel ride in Erg Chigaga dunes",
                "1 night in desert camp, 1 night in riad or hotel",
                "All breakfasts and dinners included"
            ]),
            'excluded' => json_encode([
                "Lunches and soft drinks",
                "Admission fees and tips"
            ]),
            'category_id' => $categoryId,
            'location_id' => $locationId,
        ]);

        $tour->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Agadir – Taroudant – Taliouine – Foum Zguid – Erg Chigaga',
                'content' => [
                    'Depart from Agadir and visit Taroudant (Little Marrakech).',
                    'Drive through saffron-rich Taliouine and tea break with saffron.',
                    'Continue to Foum Zguid and cross to Erg Chigaga dunes.',
                    'Enjoy camel ride, sunset views, and Berber tent camp dinner.'
                ]
            ],
            [
                'day_number' => 2,
                'title' => 'Erg Chigaga – Lake Iriqui – Ouarzazate',
                'content' => [
                    'Watch sunrise and have breakfast in desert camp.',
                    'Drive across dry Lake Iriqui and desert plateaus.',
                    'Arrive at Ouarzazate and explore the area.',
                    'Dinner and overnight in local riad or hotel.'
                ]
            ],
            [
                'day_number' => 3,
                'title' => 'Ouarzazate – Ait Benhaddou – Marrakech – Agadir',
                'content' => [
                    'Visit Ait Benhaddou Kasbah with local guide.',
                    'Travel via Tizi n’Tichka pass and High Atlas.',
                    'Stop in Marrakech for a brief city visit.',
                    'Transfer back to your hotel in Agadir.'
                ]
            ],
        ]);
        $categoryId = TourCategory::where('slug', 'agadir-desert-adventures')->value('id');
        $locationId = Location::where('slug', 'agadir')->value('id');

        $tour = Tour::create([
            'title' => '4-Day Sahara Tour from Agadir to Merzouga via Chegaga',
            'slug' => Str::slug('4-Day Sahara Tour from Agadir to Merzouga via Chegaga'),
            'type' => 'multi_day',
            'duration' => '4 Days',
            'group_size' => 'Flexible',
            'age_range' => 'All ages',
            'base_price' => 0,
            'bestseller_flag' => false,
            'free_cancellation_flag' => true,
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?pb=!1m70!1m12!1m3!1d1750985.5215432371!2d-7.926103361067204!3d31.001343994077857!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m55!3e0!4m5!1s0xdb3b6e9daad1cc9%3A0xbcf8d0b78bf48474!2sAgadir!3m2!1d30.427754699999998!2d-9.5981072!4m5!1s0xdb17309901e7a19%3A0x9b0fdf4f4b50237a!2sTaroudant!3m2!1d30.472712599999998!2d-8.8748765!4m5!1s0xdba516cbde6130b%3A0x154cbc79ab579f13!2sTazenakht!3m2!1d30.573151399999997!2d-7.2032754!4m5!1s0xdbc36ea58680e95%3A0x75e9e9fb616de232!2sZagora!3m2!1d30.345899799999998!2d-5.8406587!4m5!1s0xd973c279834dfe5%3A0x5639fab2b5de4a44!2sMerzouga%2C%20Morocco!3m2!1d31.0801676!2d-4.013361!4m5!1s0xdbd331a6d3914af%3A0xcdb9c0416d74335c!2sTodrha%2C%20Tinghir!3m2!1d31.479999999999997!2d-5.51!4m5!1s0xdbae06120411439%3A0x4d090f64a0ec123a!2sA%C3%AFt%20Benhaddou!3m2!1d31.047043!2d-7.1318996!4m5!1s0xdafee8d96179e51%3A0x5950b6534f87adb8!2sMarrakesh!3m2!1d31.6294723!2d-7.9810845!4m5!1s0xdb3b6e9daad1cc9%3A0xbcf8d0b78bf48474!2sAgadir!3m2!1d30.427754699999998!2d-9.5981072!5e0!3m2!1sen!2sma!4v1570019791609!5m2!1sen!2sma" width="655" height="548" frameborder="0" style="border:0;" allowfullscreen=""></iframe>',
            'overview' => 'Experience a 4-day adventure from Agadir to Merzouga via Chegaga dunes, featuring camel rides, desert camps, Todra Gorge, Dades Valley, Ait Benhaddou, and Marrakech with private transfers and expert guides.',
            'highlights' => json_encode([
                "Explore Taliouine, Taznakht, Lake Iriqui, and Chegaga dunes",
                "Camel ride and overnight in Chegaga and Merzouga camps",
                "Visit Zagora, M'Hamid, and Nkob villages",
                "Scenic drive through Todra Gorge, Dades, and Skoura",
                "Ait Benhaddou visit and guided medina walk in Marrakech"
            ]),
            'languages' => json_encode(['English', 'French', 'Spanish']),
            'included' => json_encode([
                "Transfers from/to Agadir hotels or airport",
                "Private transportation in air-conditioned vehicle",
                "Camel rides in Chegaga and Merzouga dunes",
                "2 nights in desert camps and 1 in riad/hotel",
                "All breakfasts and dinners included"
            ]),
            'excluded' => json_encode([
                "Lunches and soft drinks",
                "Admission fees and tips"
            ]),
            'category_id' => $categoryId,
            'location_id' => $locationId,
        ]);

        $tour->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Agadir – Taroudant – Taznakht – Foum Zguid – Chegaga',
                'content' => [
                    'Depart Agadir, drive through Taroudant and saffron-rich Taliouine.',
                    'Lunch in Foum Zguid and cross Lake Iriqui trail.',
                    'Arrive at Erg Chegaga dunes and enjoy camel trek.',
                    'Dinner and overnight in desert camp under stars.'
                ]
            ],
            [
                'day_number' => 2,
                'title' => 'Chegaga – M\'Hamid – Nkob – Merzouga',
                'content' => [
                    'Morning drive to M\'Hamid and explore local kasbahs.',
                    'Pass through Zagora, Tansikhte, and Nkob.',
                    'Arrive in Merzouga for camel ride and desert camp.',
                    'Dinner and night in the Merzouga Sahara camp.'
                ]
            ],
            [
                'day_number' => 3,
                'title' => 'Merzouga – Todra Gorge – Dades Valley – Ouarzazate',
                'content' => [
                    'Watch sunrise in Merzouga and breakfast.',
                    'Drive through Todra Gorges and Boumalne Dades.',
                    'Continue via Valley of Roses, Skoura, and arrive in Ouarzazate.',
                    'Dinner and overnight in kasbah or riad.'
                ]
            ],
            [
                'day_number' => 4,
                'title' => 'Ouarzazate – Ait Benhaddou – Marrakech – Agadir',
                'content' => [
                    'Visit Ait Benhaddou (UNESCO site) with guide.',
                    'Cross High Atlas via Tizi n’Tichka pass.',
                    'Short stop in Marrakech medina and Jmaa El Fna plaza.',
                    'Transfer back to Agadir for drop-off.'
                ]
            ],
        ]);
        // agadir END

        // combined Start 

        $categoryId = TourCategory::where('slug', 'combined-atlas-desert-tours')->value('id');
        $locationId = Location::where('slug', 'atlas-mountains')->value('id');

        $tour = Tour::create([
            'title' => '4-Day Atlas and Sahara Desert Tour to Zagora',
            'slug' => Str::slug('4-Day Atlas and Sahara Desert Tour to Zagora'),
            'type' => 'multi_day',
            'duration' => '4 Days',
            'group_size' => 'Flexible',
            'age_range' => 'All ages',
            'base_price' => 0,
            'bestseller_flag' => false,
            'free_cancellation_flag' => true,
            'overview' => 'This 4-day Atlas and Sahara desert tour takes you from the peaks of Toubkal to the golden dunes of Zagora. Includes trekking, camel ride, and cultural visits.',
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?pb=!1m58!1m12!1m3!1d875619.5814495233!2d-7.546271706057722!3d30.98752900729943!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m43!...</iframe>',
            'highlights' => json_encode([
                "Trekking in Toubkal with scenic Atlas mountain views",
                "Visit to Imlil, Aremd village, and Sidi Chamarouch",
                "Camel trek to desert camp in Zagora with Berber music",
                "Explore Ait Benhaddou and Ouarzazate Atlas Studios"
            ]),
            'languages' => json_encode(['English', 'French', 'Spanish']),
            'included' => json_encode([
                "Transfers with local driver",
                "Comfortable and private A/C vehicle",
                "Guided trek in Toubkal",
                "Camel trek in Sahara desert",
                "Overnight in riads/hotels and desert camp",
                "Dinners and breakfasts"
            ]),
            'excluded' => json_encode([
                "Lunches and soft drinks",
                "Entrance fees and tips"
            ]),
            'category_id' => $categoryId,
            'location_id' => $locationId,
        ]);

        $tour->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Marrakech – Imlil – Toubkal Refuge',
                'content' => [
                    'Pickup from Marrakech to Imlil.',
                    'Trek through Mizane Valley, Aremd village, and Sidi Chamarouch.',
                    'Climb to Toubkal Refuge at 3206m for overnight stay.'
                ]
            ],
            [
                'day_number' => 2,
                'title' => 'Toubkal Summit – Imlil – Marrakech',
                'content' => [
                    'Early morning summit of Toubkal.',
                    'Enjoy panoramic views of Atlas and Sahara.',
                    'Return to Imlil and transfer back to Marrakech.'
                ]
            ],
            [
                'day_number' => 3,
                'title' => 'Marrakech – Ait Benhaddou – Ouarzazate – Zagora',
                'content' => [
                    'Drive through Atlas to Ait Benhaddou and visit UNESCO site.',
                    'Visit Atlas Studios and Taourirt Kasbah in Ouarzazate.',
                    'Continue through Draa Valley to Zagora.',
                    'Camel ride to Berber desert camp with dinner and music.'
                ]
            ],
            [
                'day_number' => 4,
                'title' => 'Zagora – Ouarzazate – Marrakech',
                'content' => [
                    'Camel ride at sunrise.',
                    'Return via Ouarzazate and High Atlas Mountains.',
                    'Drop off at your accommodation in Marrakech.'
                ]
            ],
        ]);

        $categoryId = TourCategory::where('slug', 'combined-atlas-desert-tours')->value('id');
        $locationId = Location::where('slug', 'atlas-mountains')->value('id');

        $tour = Tour::create([
            'title' => '5-Day Atlas and Sahara Desert Tour from Marrakech to Merzouga',
            'slug' => Str::slug('5-Day Atlas and Sahara Desert Tour from Marrakech to Merzouga'),
            'type' => 'multi_day',
            'duration' => '5 Days',
            'group_size' => 'Flexible',
            'age_range' => 'All ages',
            'base_price' => 0,
            'bestseller_flag' => false,
            'free_cancellation_flag' => true,
            'overview' => 'This 5-day tour combines trekking in the Atlas Mountains and an unforgettable camel ride in the Merzouga desert. Discover Toubkal, Ait Benhaddou, and Dades Valley on this adventure-packed trip.',
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?pb=!1m76!1m12!1m3!1d1748341.5095079564!2d-7.193124480464587!3d31.14502582756437!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m61!..."></iframe>',
            'highlights' => json_encode([
                "Trekking to Toubkal summit with scenic Atlas views",
                "Visit Ait Benhaddou UNESCO site and Ouarzazate studios",
                "Explore Dades Gorges and Todra Canyon",
                "Camel ride and overnight in Merzouga desert camp"
            ]),
            'languages' => json_encode(['English', 'French', 'Spanish']),
            'included' => json_encode([
                "Transfers with local driver",
                "Comfortable and private travel in A/C vehicle",
                "Camel trek in Sahara desert, guided trek in Atlas - Toubkal",
                "Overnight in riads/hotels and desert camp",
                "Dinners and breakfasts. All meals during Atlas trek"
            ]),
            'excluded' => json_encode([
                "Lunches and soft drinks",
                "Entrance fees and tips"
            ]),
            'category_id' => $categoryId,
            'location_id' => $locationId,
        ]);

        $tour->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Marrakech – Imlil – Toubkal Refuge',
                'content' => [
                    'Transfer from Marrakech to Imlil.',
                    'Meet your trekking team and pass Aremd village and Sidi Chamarouch.',
                    'Hike to Toubkal Refuge (3206m). Dinner and overnight stay.'
                ]
            ],
            [
                'day_number' => 2,
                'title' => 'Toubkal Summit – Imlil – Marrakech',
                'content' => [
                    'Early morning summit of Mount Toubkal.',
                    'Enjoy stunning views of Atlas Mountains and Sahara Desert.',
                    'Return to Imlil then transfer to your accommodation in Marrakech.'
                ]
            ],
            [
                'day_number' => 3,
                'title' => 'Marrakech – Ait Benhaddou – Ouarzazate – Dades',
                'content' => [
                    'Cross Tizi n’Tichka pass to Ait Benhaddou.',
                    'Visit Atlas Studios and Taourirt Kasbah in Ouarzazate.',
                    'Continue through Skoura to Dades Valley. Dinner and overnight in riad.'
                ]
            ],
            [
                'day_number' => 4,
                'title' => 'Dades – Todra Gorges – Merzouga',
                'content' => [
                    'Drive through Tinjdad to Todra Gorges and Erfoud.',
                    'Visit fossil shops and reach Merzouga desert.',
                    'Camel ride to desert camp, dinner, and Berber music show.'
                ]
            ],
            [
                'day_number' => 5,
                'title' => 'Merzouga – Nkob – Atlas Mountains – Marrakech',
                'content' => [
                    'Watch sunrise over Erg Chebbi dunes.',
                    'Camel ride back and breakfast at camp.',
                    'Return to Marrakech via Nkob, Agdz, and Ouarzazate.'
                ]
            ],
        ]);
        // combined END
        // spain tour Start 
        $categoryId = TourCategory::where('slug', 'grand-morocco-tours')->value('id');
        $locationId = Location::where('slug', 'spain')->value('id');

        $tour = Tour::create([
            'title' => '15-Day Spain and Morocco Private Tour: From Spain to Sahara Desert',
            'slug' => Str::slug('15-Day Spain and Morocco Private Tour: From Spain to Sahara Desert'),
            'type' => 'multi_day',
            'duration' => '15 Days',
            'group_size' => 'Flexible',
            'age_range' => 'All ages',
            'base_price' => 0,
            'bestseller_flag' => true,
            'free_cancellation_flag' => true,
            'overview' => 'Embark on a comprehensive 15-day private tour through Madrid, Andalusia, and Morocco. From guided city tours to Sahara camel rides and luxurious desert camps, experience the best of Spain and Morocco.',
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?pb=!1m64!...YOUR_IFRAME_HERE..." width="655" height="548" frameborder="0" style="border:0" allowfullscreen></iframe>',
            'highlights' => json_encode([
                "Royal Palace & Retiro Park in Madrid",
                "Alhambra Palace in Granada",
                "Picasso Museum and Alcazaba in Malaga",
                "Blue streets of Chefchaouen",
                "Roman ruins of Volubilis",
                "Camel ride in Merzouga Sahara",
                "Sunrise over Erg Chebbi dunes",
                "UNESCO Ait Ben Haddou visit",
                "Jemaa el-Fnaa & Bahia Palace in Marrakech"
            ]),
            'languages' => json_encode(['English', 'French', 'Spanish']),
            'included' => json_encode([
                "Comfortable AC transport with dedicated driver",
                "Local guides for city tours",
                "Camel ride in the Sahara desert",
                "Luxury desert camp overnight stay",
                "Accommodation with daily breakfast",
                "Ferry tickets from Spain to Morocco",
                "2 dinners included"
            ]),
            'excluded' => json_encode([
                "Lunch and dinner (unless specified)",
                "Flights / Tips for guides"
            ]),
            'category_id' => $categoryId,
            'location_id' => $locationId,
        ]);

        $tour->itineraries()->createMany([
            ['day_number' => 1, 'title' => 'Madrid Arrival', 'content' => ['Arrival in Madrid, transfer to hotel, overnight in Madrid.']],
            ['day_number' => 2, 'title' => 'Madrid Exploration', 'content' => ['Visit Royal Palace, Retiro Park, Puerta del Sol, overnight in Madrid.']],
            ['day_number' => 3, 'title' => 'Madrid – Granada – Malaga', 'content' => ['Drive to Granada, visit Alhambra Palace, continue to Malaga.']],
            ['day_number' => 4, 'title' => 'Malaga Delights', 'content' => ['Explore Alcazaba, Picasso Museum, evening by the Mediterranean.']],
            ['day_number' => 5, 'title' => 'Malaga – Marbella', 'content' => ['Drive to Marbella, walk through Old Town and Puerto Banus.']],
            ['day_number' => 6, 'title' => 'Free Day in Marbella', 'content' => ['Relax on the beach or shop in local boutiques.']],
            ['day_number' => 7, 'title' => 'Marbella – Tarifa – Tangier – Chefchaouen', 'content' => ['Cross to Morocco by ferry, drive to Chefchaouen.']],
            ['day_number' => 8, 'title' => 'Chefchaouen – Volubilis – Meknes – Fes', 'content' => ['Visit Roman ruins in Volubilis, tour Meknes, arrive in Fes.']],
            ['day_number' => 9, 'title' => 'Fes Exploration', 'content' => ['Tour Al Quaraouiyine, tanneries, and Nejjarine Museum.']],
            ['day_number' => 10, 'title' => 'Fes – Ifrane – Merzouga', 'content' => ['Pass through Ifrane, arrive in Merzouga, camel ride to desert camp.']],
            ['day_number' => 11, 'title' => 'Merzouga – Todra – Dades', 'content' => ['Sunrise, explore Todra Gorges, continue to Dades Valley.']],
            ['day_number' => 12, 'title' => 'Dades – Ouarzazate – Ait Ben Haddou – Marrakech', 'content' => ['Visit Ait Ben Haddou, arrive in Marrakech.']],
            ['day_number' => 13, 'title' => 'Marrakech Guided Tour', 'content' => ['Visit Bahia Palace, Koutoubia Mosque, Jemaa el-Fnaa.']],
            ['day_number' => 14, 'title' => 'Free Day in Marrakech', 'content' => ['Free time for shopping, gardens, or hammam.']],
            ['day_number' => 15, 'title' => 'Departure from Marrakech to Casablanca Airport', 'content' => ['Transfer to Casablanca airport for flight departure.']],
        ]);
        // spain end    
        // tangier start

        $categoryId = TourCategory::where('slug', 'north-morocco-tours')->value('id');
        $locationId = Location::where('slug', 'tangier')->value('id');

        $tangierChefchaouenTour = Tour::create([
            'title' => 'Best 2 Days Tangier Tour to Chefchaouen: Morocco\'s Blue City Adventure',
            'slug' => Str::slug('Best 2 Days Tangier Tour to Chefchaouen: Morocco\'s Blue City Adventure'),
            'type' => 'multi_day',
            'duration' => '2 Days',
            'group_size' => 'Flexible',
            'age_range' => 'All ages',
            'base_price' => 0,
            'bestseller_flag' => false,
            'free_cancellation_flag' => true,
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d415926.5180605655!2d-5.831333539343702!3d35.469004339038236!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e0!4m5!1s0xd0b875cf04c132d%3A0x76bfc571bfb4e17a!2sTangier!3m2!1d35.7594651!2d-5.833954299999999!4m5!1s0xd0b265e6402d907%3A0x91548980ce97ea0c!2sChefchaouen!3m2!1d35.168796!2d-5.268364099999999!5e0!3m2!1sen!2sma!4v1556190134401!5m2!1sen!2sma" width="655" height="548" frameborder="0" style="border:0" allowfullscreen></iframe>',
            'overview' => 'We organise adventure travel in Morocco with the best 2-day Tangier Tour to Chefchaouen in the Rif mountains. Explore the charm of Morocco\'s Blue City, its medina, kasbah, and scenic mountain trails on this enriching short getaway.',
            'highlights' => json_encode([
                'Explore the blue-painted streets of Chefchaouen',
                'Guided walk through the medina and Kasbah museum',
                'Scenic drive through Rif mountains from Tangier',
                'Optional trekking or panoramic views of Ras El Ma',
                'Overnight in local riad in Chefchaouen'
            ]),
            'included' => json_encode([
                'All hotel pick up transfers with experienced drivers',
                'Comfortable and private travel from Tangier in A/C vehicle',
                'Excursion in Rif mountains',
                'A night in riad/hotel',
                'Dinners and breakfasts as per itinerary',
            ]),
            'excluded' => json_encode([
                'Lunches and soft drinks',
                'Entrance fees and personal tips',
            ]),
            'languages' => json_encode(['English', 'Spanish', 'French']),
            'category_id' => $categoryId,
            'location_id' => $locationId,
        ]);

        $tangierChefchaouenTour->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Day 1: Tangier to Chefchaouen',
                'content' => json_encode([
                    'Pickup in Tangier and start the drive to Chefchaouen via the Rif Mountains.',
                    'Arrive and explore the medina with its iconic blue-washed walls.',
                    'Visit the Kasbah Museum and enjoy a relaxed afternoon exploring.',
                    'Dinner and overnight stay in a traditional riad.',
                ]),
            ],
            [
                'day_number' => 2,
                'title' => 'Day 2: Chefchaouen to Tangier',
                'content' => json_encode([
                    'Optional morning hike or panoramic viewpoint at Ras El Ma.',
                    'Free time for final exploration or shopping.',
                    'Return drive to Tangier.',
                    'Drop-off at your hotel. End of tour.',
                ]),
            ],
        ]);
        $categoryId = TourCategory::where('slug', 'north-morocco-tours')->value('id');
        $locationId = Location::where('slug', 'tangier')->value('id');

        $northMoroccoTour = Tour::create([
            'title' => 'Authentic 3-Day North Morocco Tour from Tangier: Chefchaouen, Fes, Meknes, Rabat & Asilah',
            'slug' => Str::slug('Authentic 3-Day North Morocco Tour from Tangier: Chefchaouen, Fes, Meknes, Rabat & Asilah'),
            'type' => 'multi_day',
            'duration' => '3 Days',
            'group_size' => 'Flexible',
            'age_range' => 'All ages',
            'base_price' => 0,
            'bestseller_flag' => false,
            'free_cancellation_flag' => true,
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?pb=!1m58!1m12!1m3!1d1678010.626630424!2d-7.051767477910181!3d34.77159800554415!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m43!3e0!4m5!1s0xd0b875cf04c132d%3A0x76bfc571bfb4e17a!2sTangier!3m2!1d35.7594651!2d-5.833954299999999!4m5!1s0xd0b265e6402d907%3A0x91548980ce97ea0c!2sChefchaouen!3m2!1d35.168796!2d-5.268364099999999!4m5!1s0xd9f8b484d445777%3A0x10e6aaaeedd802ef!2sFes!3m2!1d34.0181246!2d-5.0078451!4m5!1s0xda044d23bfc49d1%3A0xfbbf80a99e4cde18!2sMeknes!3m2!1d33.8730164!2d-5.5407299!4m5!1s0xda0687d6a592af5%3A0x89bf317b312f3e62!2sVolubilis%2C+Meknes!3m2!1d34.072947899999996!2d-5.5549259!4m5!1s0xda76b871f50c5c1%3A0x7ac946ed7408076b!2sRabat!3m2!1d33.9715904!2d-6.8498129!4m5!1s0xd0b875cf04c132d%3A0x76bfc571bfb4e17a!2sTangier!3m2!1d35.7594651!2d-5.833954299999999!5e0!3m2!1sen!2sma!4v1556191160678!5m2!1sen!2sma" width="655" height="548" frameborder="0" style="border:0" allowfullscreen></iframe>',
            'overview' => 'We organize authentic Moroccan travel with this 3-day private tour from Tangier through Chefchaouen, Fes, Meknes, and Rabat. Explore UNESCO heritage, scenic Rif landscapes, Roman ruins, and the Atlantic coast. A complete northern Morocco experience.',
            'highlights' => json_encode([
                'Wander the blue streets of Chefchaouen',
                'Guided visit of Fes medina and historical tanneries',
                'Explore Roman ruins of Volubilis',
                'Discover Meknes imperial gates and medina',
                'Sightseeing in Rabat: Hassan Tower and royal landmarks',
                'Scenic Atlantic coast and visit to artistic town of Asilah'
            ]),
            'included' => json_encode([
                'All hotel pick up transfers with experienced drivers',
                'Comfortable and private travel from Tangier in A/C vehicle',
                'Explore medina in Fes with local guide',
                'Two nights in local riads/hotels',
                'Dinners and breakfasts as per itinerary',
            ]),
            'excluded' => json_encode([
                'Lunches and soft drinks',
                'Entrance fees and personal tips',
            ]),
            'languages' => json_encode(['English', 'Spanish', 'French']),
            'category_id' => $categoryId,
            'location_id' => $locationId,
        ]);

        $northMoroccoTour->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Day 1: Tangier - Chefchaouen - Fes',
                'content' => json_encode([
                    'Morning departure from Tangier after hotel pickup.',
                    'Drive via Tetouan and arrive in Chefchaouen.',
                    'Explore Chefchaouen medina with blue-painted streets.',
                    'Continue to Fes for a free evening in the old medina.',
                    'Overnight stay in local riad in Fes.',
                ]),
            ],
            [
                'day_number' => 2,
                'title' => 'Day 2: Fes City Tour - Volubilis - Meknes',
                'content' => json_encode([
                    'Guided city tour of Fes including tanneries and UNESCO landmarks.',
                    'Visit the Roman archaeological site of Volubilis.',
                    'Continue to Meknes, explore Bab Mansour and the medina.',
                    'Dinner and overnight stay in a riad in Meknes.',
                ]),
            ],
            [
                'day_number' => 3,
                'title' => 'Day 3: Meknes - Rabat - Asilah - Tangier',
                'content' => json_encode([
                    'Depart to Rabat, Morocco\'s capital.',
                    'Visit Hassan Tower, Mausoleum of Mohammed V, and Oudayas Kasbah.',
                    'Continue along the Atlantic coast to Asilah.',
                    'Explore Asilah\'s medina and murals.',
                    'Return to Tangier in the evening for drop-off at your hotel.',
                ]),
            ],
        ]);
        $categoryId = TourCategory::where('slug', 'north-morocco-tours')->value('id');
        $locationId = Location::where('slug', 'tangier')->value('id');

        $tangierFesAtlanticTour = Tour::create([
            'title' => '4-Day Tour from Tangier to Fes via Chefchaouen and the Atlantic Coast',
            'slug' => Str::slug('4-Day Tour from Tangier to Fes via Chefchaouen and the Atlantic Coast'),
            'type' => 'multi_day',
            'duration' => '4 Days',
            'group_size' => 'Flexible',
            'age_range' => 'All ages',
            'base_price' => 0,
            'bestseller_flag' => false,
            'free_cancellation_flag' => true,
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?pb=!1m58!1m12!1m3!1d1678010.626630424!2d-7.051767477910181!3d34.77159800554415!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m43!3e0!4m5!1s0xd0b875cf04c132d%3A0x76bfc571bfb4e17a!2sTangier!3m2!1d35.7594651!2d-5.833954299999999!4m5!1s0xd0b265e6402d907%3A0x91548980ce97ea0c!2sChefchaouen!3m2!1d35.168796!2d-5.268364099999999!4m5!1s0xd9f8b484d445777%3A0x10e6aaaeedd802ef!2sFes!3m2!1d34.0181246!2d-5.0078451!4m5!1s0xda044d23bfc49d1%3A0xfbbf80a99e4cde18!2sMeknes!3m2!1d33.8730164!2d-5.5407299!4m5!1s0xda0687d6a592af5%3A0x89bf317b312f3e62!2sVolubilis%2C+Meknes!3m2!1d34.072947899999996!2d-5.5549259!4m5!1s0xda76b871f50c5c1%3A0x7ac946ed7408076b!2sRabat!3m2!1d33.9715904!2d-6.8498129!4m5!1s0xd0b875cf04c132d%3A0x76bfc571bfb4e17a!2sTangier!3m2!1d35.7594651!2d-5.833954299999999!5e0!3m2!1sen!2sma!4v1556191160678!5m2!1sen!2sma" width="655" height="548" frameborder="0" style="border:0" allowfullscreen></iframe>',
            'overview' => 'We organize the best 4-day private journey from Tangier to Fes via Chefchaouen, Rabat, and Asilah. This Atlantic coast route offers a unique blend of historic medinas, coastal charm, and UNESCO heritage guided by local experts.',
            'highlights' => json_encode([
                'Walk through Chefchaouen’s blue-painted alleys',
                'Guided Fes city tour including tanneries and UNESCO sites',
                'Visit to Qaraouiyine Mosque and Batha Museum',
                'Explore Meknes imperial medina and gates',
                'Discover Rabat’s Hassan Tower and Oudayas Kasbah',
                'Relax in the artistic coastal town of Asilah',
            ]),
            'included' => json_encode([
                'All hotel pick up transfers with experienced drivers',
                'Comfortable and private travel from Tangier in A/C vehicle',
                'Guided excursion in medina of Fes',
                'Accommodation in riads and hotels',
                'Dinners and breakfasts as per itinerary',
            ]),
            'excluded' => json_encode([
                'Lunches and soft drinks',
                'Entrance fees and personal tips',
            ]),
            'languages' => json_encode(['English', 'Spanish', 'French']),
            'category_id' => $categoryId,
            'location_id' => $locationId,
        ]);

        $tangierFesAtlanticTour->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Day 1: Tangier – Chefchaouen – Fes',
                'content' => json_encode([
                    'Morning departure from Tangier toward the Rif Mountains.',
                    'Stop and walk through Chefchaouen medina and visit the Kasbah.',
                    'Continue via Ouazzane to reach Fes.',
                    'Dinner and overnight in a traditional riad in Fes.',
                ]),
            ],
            [
                'day_number' => 2,
                'title' => 'Day 2: Fes City Excursion',
                'content' => json_encode([
                    'Guided visit of Medersa Bou Inania and Medersa el-Attarine.',
                    'Explore the tanneries and Borj Nord with views over the medina.',
                    'Visit the Merenid Tombs, Qaraouiyine Mosque, Batha Museum, and Nejjarine Fountain.',
                    'Free afternoon and overnight stay in Fes.',
                ]),
            ],
            [
                'day_number' => 3,
                'title' => 'Day 3: Fes – Meknes – Rabat',
                'content' => json_encode([
                    'Travel to Meknes and explore Bab Mansour, old medina, and royal granaries.',
                    'Continue to Rabat for city exploration including Hassan Tower and Oudayas Kasbah.',
                    'Overnight in a comfortable hotel in Rabat.',
                ]),
            ],
            [
                'day_number' => 4,
                'title' => 'Day 4: Rabat – Asilah – Tangier',
                'content' => json_encode([
                    'Drive along the Atlantic coast to Asilah, free time to explore murals and beach.',
                    'Continue to Tangier with evening drop-off at your hotel.',
                ]),
            ],
        ]);
        $categoryId = TourCategory::where('slug', 'north-morocco-tours')->value('id');
        $locationId = Location::where('slug', 'tangier')->value('id');

        $tangierSaharaTour = Tour::create([
            'title' => '6-Day Private Tour from Tangier to Sahara Desert and Marrakech',
            'slug' => Str::slug('6-Day Private Tour from Tangier to Sahara Desert and Marrakech'),
            'type' => 'multi_day',
            'duration' => '6 Days',
            'group_size' => 'Flexible',
            'age_range' => 'All ages',
            'base_price' => 0,
            'bestseller_flag' => true,
            'free_cancellation_flag' => true,
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?pb=!1m64!1m12!1m3!1d3413505.429264109!2d-8.239042219931768!3d33.33184842492146!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m49!3e0!4m5!1s0xd0b875cf04c132d%3A0x76bfc571bfb4e17a!2sTangier!3m2!1d35.7594651!2d-5.833954299999999!4m5!1s0xd0b265e6402d907%3A0x91548980ce97ea0c!2sChefchaouen!3m2!1d35.168796!2d-5.268364099999999!4m5!1s0xd9f8b484d445777%3A0x10e6aaaeedd802ef!2sFes!3m2!1d34.0181246!2d-5.0078451!4m5!1s0xd973c279834dfe5%3A0x5639fab2b5de4a44!2sMerzouga%2C+Morocco!3m2!1d31.0801676!2d-4.013361!4m5!1s0xdbd331a6d3914af%3A0xcdb9c0416d74335c!2sTodrha%2C+Tinghir!3m2!1d31.479999999999997!2d-5.51!4m5!1s0xda3328c8a8c64bf%3A0x257d57d5120009c0!2sDad%C3%A8s+Gorges!3m2!1d31.4532146!2d-5.9675869!4m5!1s0xdbae06120411439%3A0x4d090f64a0ec123a!2sA%C3%AFt+Benhaddou!3m2!1d31.047043!2d-7.1318996!4m5!1s0xdafee8d96179e51%3A0x5950b6534f87adb8!2sMarrakesh!3m2!1d31.6294723!2d-7.9810845!5e0!3m2!1sen!2sma!4v1556191568036!5m2!1sen!2sma" width="655" height="548" frameborder="0" style="border:0" allowfullscreen></iframe>',
            'overview' => 'This 6-day private tour from Tangier to the Sahara Desert and Marrakech is a perfect blend of imperial cities, blue medinas, desert camel trekking, and UNESCO kasbahs. Explore Chefchaouen, Fes, Merzouga dunes, Todra Canyon, and the Atlas Mountains with Local Morocco Tours.',
            'highlights' => json_encode([
                'Explore the blue medina of Chefchaouen',
                'Guided walking tour of Fes including tanneries and medersas',
                'Visit Volubilis and Moulay Idriss',
                'Camel trek in Erg Chebbi dunes and overnight in desert camp',
                'Witness sunrise over the Sahara and visit Todra Gorge',
                'See Ait Benhaddou and travel through Atlas Mountains to Marrakech'
            ]),
            'included' => json_encode([
                'All hotel pick up transfers with experienced drivers',
                'Private travel in A/C vehicle from Tangier',
                'Guided city tour in Fes',
                'Merzouga desert camel trek experience',
                'Accommodation in riads/hotels and desert camp',
                'Dinners and breakfasts as per itinerary',
            ]),
            'excluded' => json_encode([
                'Lunches and soft drinks',
                'Entrance fees and personal tips',
            ]),
            'languages' => json_encode(['English', 'Spanish', 'French']),
            'category_id' => $categoryId,
            'location_id' => $locationId,
        ]);

        $tangierSaharaTour->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Day 1: Tangier – Chefchaouen',
                'content' => json_encode([
                    'Departure from Tangier to the Rif Mountains.',
                    'Arrive in Chefchaouen and explore its blue-painted medina.',
                    'Dinner and overnight in a local riad.',
                ]),
            ],
            [
                'day_number' => 2,
                'title' => 'Day 2: Chefchaouen – Volubilis – Moulay Idriss – Fes',
                'content' => json_encode([
                    'Drive to the Roman ruins of Volubilis for a guided visit.',
                    'Stop in Moulay Idriss, one of Morocco\'s holiest towns.',
                    'Continue to Fes, free time in the medina.',
                    'Dinner and overnight in a hotel or riad.',
                ]),
            ],
            [
                'day_number' => 3,
                'title' => 'Day 3: Fes City Tour',
                'content' => json_encode([
                    'Guided exploration of Fes including Al Qaraouine University, tanneries, and artisan quarters.',
                    'Visit Medersa Bou Inania and Nejjarine Fountain.',
                    'Dinner and overnight in Fes.',
                ]),
            ],
            [
                'day_number' => 4,
                'title' => 'Day 4: Fes – Ifrane – Midelt – Errachidia – Merzouga',
                'content' => json_encode([
                    'Drive via Ifrane and Midelt through cedar forests.',
                    'Continue through Errachidia and Erfoud to reach Merzouga.',
                    'Camel ride to desert camp in Erg Chebbi dunes.',
                    'Dinner and traditional Berber music around campfire.',
                ]),
            ],
            [
                'day_number' => 5,
                'title' => 'Day 5: Merzouga – Rissani – Todra Gorge – Dades Valley',
                'content' => json_encode([
                    'Sunrise over the dunes and camel ride back to Merzouga.',
                    'Travel to Rissani, Tinghir, and Todra Gorge for a canyon walk.',
                    'Continue to Dades Valley. Overnight in hotel or kasbah.',
                ]),
            ],
            [
                'day_number' => 6,
                'title' => 'Day 6: Dades – Skoura – Ouarzazate – Ait Benhaddou – Marrakech',
                'content' => json_encode([
                    'Drive along Route of 1000 Kasbahs through Skoura and Ouarzazate.',
                    'Visit Ait Benhaddou (UNESCO site).',
                    'Cross the High Atlas Mountains via Tizi n\'Tichka Pass.',
                    'Evening arrival and drop-off in Marrakech.',
                ]),
            ],
        ]);
        $categoryId = TourCategory::where('slug', 'north-morocco-tours')->value('id');
        $locationId = Location::where('slug', 'tangier')->value('id');

        $tangierMerzougaTour = Tour::create([
            'title' => '9-Day Tour from Tangier to Merzouga Desert and Marrakech',
            'slug' => Str::slug('9-Day Tour from Tangier to Merzouga Desert and Marrakech'),
            'type' => 'multi_day',
            'duration' => '9 Days',
            'group_size' => 'Flexible',
            'age_range' => 'All ages',
            'base_price' => 0,
            'bestseller_flag' => true,
            'free_cancellation_flag' => true,
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?pb=!1m64!1m12!1m3!1d3413505.429264109!2d-8.239042219931768!3d33.33184842492146!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m49!3e0!4m5!1s0xd0b875cf04c132d%3A0x76bfc571bfb4e17a!2sTangier!3m2!1d35.7594651!2d-5.833954299999999!4m5!1s0xd0b265e6402d907%3A0x91548980ce97ea0c!2sChefchaouen!3m2!1d35.168796!2d-5.268364099999999!4m5!1s0xd9f8b484d445777%3A0x10e6aaaeedd802ef!2sFes!3m2!1d34.0181246!2d-5.0078451!4m5!1s0xd973c279834dfe5%3A0x5639fab2b5de4a44!2sMerzouga%2C+Morocco!3m2!1d31.0801676!2d-4.013361!4m5!1s0xdbd331a6d3914af%3A0xcdb9c0416d74335c!2sTodrha%2C+Tinghir!3m2!1d31.479999999999997!2d-5.51!4m5!1s0xda3328c8a8c64bf%3A0x257d57d5120009c0!2sDad%C3%A8s+Gorges!3m2!1d31.4532146!2d-5.9675869!4m5!1s0xdbae06120411439%3A0x4d090f64a0ec123a!2sA%C3%AFt+Benhaddou!3m2!1d31.047043!2d-7.1318996!4m5!1s0xdafee8d96179e51%3A0x5950b6534f87adb8!2sMarrakesh!3m2!1d31.6294723!2d-7.9810845!5e0!3m2!1sen!2sma!4v1556191568036!5m2!1sen!2sma" width="655" height="548" frameborder="0" style="border:0" allowfullscreen></iframe>',
            'overview' => 'This 9-day Morocco tour from Tangier to the Merzouga Desert and Marrakech explores the best of the north and Sahara region, including Chefchaouen, Fes, camel trekking in Erg Chebbi, Todra Gorges, and a guided tour of Marrakech.',
            'highlights' => json_encode([
                'Explore Tangier and Chefchaouen medinas',
                'Guided walking tour in Fes including Royal Palace and tanneries',
                'Visit Volubilis Roman ruins and Meknes',
                'Scenic drive through Middle Atlas and cedar forests',
                'Camel trek in Merzouga and overnight desert camp',
                'Visit Todra Gorges and Dades Valley',
                'Discover UNESCO-listed Ait Benhaddou',
                'Cross High Atlas Mountains to reach Marrakech',
                'Guided visit to Jamaa El Fna and Majorelle Gardens in Marrakech',
            ]),
            'included' => json_encode([
                'All hotel pick up and airport transfers',
                'Private A/C vehicle with experienced driver',
                'Fes and Marrakech guided city tours',
                'Merzouga desert camel trek and camp',
                'Accommodation in hotels/riads and desert camp',
                'Dinners and breakfasts as per itinerary',
            ]),
            'excluded' => json_encode([
                'Lunches and soft drinks',
                'Entrance fees and tips',
            ]),
            'languages' => json_encode(['English', 'Spanish', 'French']),
            'category_id' => $categoryId,
            'location_id' => $locationId,
        ]);

        $tangierMerzougaTour->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Day 1: Arrival in Tangier',
                'content' => json_encode([
                    'Meet at airport and transfer to hotel.',
                    'Explore Tangier medina and beach.',
                    'Free afternoon and overnight in Tangier.',
                ]),
            ],
            [
                'day_number' => 2,
                'title' => 'Day 2: Tangier – Ouazzane – Chefchaouen',
                'content' => json_encode([
                    'Drive through Rif Mountains and stop in Ouazzane.',
                    'Arrive in Chefchaouen and explore the blue-washed medina.',
                    'Overnight in a traditional riad.',
                ]),
            ],
            [
                'day_number' => 3,
                'title' => 'Day 3: Chefchaouen – Volubilis – Meknes – Fes',
                'content' => json_encode([
                    'Visit the Roman ruins of Volubilis with guided tour.',
                    'Explore Moulay Idriss and imperial Meknes.',
                    'Continue to Fes for overnight stay in a riad.',
                ]),
            ],
            [
                'day_number' => 4,
                'title' => 'Day 4: Fes Guided City Tour',
                'content' => json_encode([
                    'Explore Al Karaouine University, tanneries, Attarine museum.',
                    'Visit the Royal Palace gate and Jewish quarter.',
                    'Dinner and overnight in Fes.',
                ]),
            ],
            [
                'day_number' => 5,
                'title' => 'Day 5: Fes – Ifrane – Midelt – Merzouga',
                'content' => json_encode([
                    'Travel through the Middle Atlas via Ifrane and Azrou cedar forests.',
                    'Lunch in Midelt then pass through Aoufous and Erfoud.',
                    'Arrive in Merzouga and overnight in a kasbah or guesthouse.',
                ]),
            ],
            [
                'day_number' => 6,
                'title' => 'Day 6: Merzouga Desert – Camel Trek & Camp',
                'content' => json_encode([
                    'Visit Khamlia village to enjoy Gnawa music.',
                    'Afternoon camel ride into Erg Chebbi dunes.',
                    'Sunset, dinner, and overnight in desert camp.',
                ]),
            ],
            [
                'day_number' => 7,
                'title' => 'Day 7: Merzouga – Todra Gorge – Dades Valley',
                'content' => json_encode([
                    'Sunrise camel ride back to Merzouga.',
                    'Travel to Todra Valley and explore the canyon.',
                    'Dinner and overnight in Dades Valley hotel or kasbah.',
                ]),
            ],
            [
                'day_number' => 8,
                'title' => 'Day 8: Dades – Skoura – Ouarzazate – Ait Benhaddou – Marrakech',
                'content' => json_encode([
                    'Drive through Rose Valley and Skoura Oasis.',
                    'Visit Atlas Studios in Ouarzazate.',
                    'Stop at Ait Benhaddou for guided kasbah visit.',
                    'Cross the High Atlas and arrive in Marrakech.',
                ]),
            ],
            [
                'day_number' => 9,
                'title' => 'Day 9: Marrakech Guided Tour and Departure',
                'content' => json_encode([
                    'Explore Jamaa El Fna, Saadian Tombs, and Majorelle Gardens.',
                    'Transfer to Marrakech airport.',
                    'End of 9-day Morocco desert tour from Tangier.',
                ]),
            ],
        ]);
        Tour::create([
            'title' => '12 Days Grand Tour from Tangier',
            'slug' => Str::slug('12 Days Grand Tour from Tangier'),
            'type' => 'multi_day',
            'duration' => '12 Days',
            'group_size' => 'Flexible',
            'age_range' => 'All ages',
            'base_price' => 0,
            'bestseller_flag' => true,
            'free_cancellation_flag' => true,
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?pb=!1m76!..."></iframe>',
            'overview' => 'Embark on a 12-day private tour from Tangier to explore the best of Morocco including Fes, the Sahara desert, Marrakech, Casablanca, and Rabat. Ride camels in Merzouga, explore ancient medinas, and discover vibrant cities and historic Kasbahs.',
            'highlights' => json_encode([
                'Guided tour in Tangier, Chefchaouen, and Fes',
                'Visit Volubilis ruins and holy town of Moulay Idriss',
                'Camel trek & overnight in Sahara camp',
                'Visit Todra Gorges and Dades Valley',
                'Explore Skoura Oasis & Ouarzazate film studios',
                'Ait Benhaddou UNESCO Kasbah visit',
                'Sightseeing in Marrakech & Casablanca',
                'Visit Rabat and coastal town of Asilah',
            ]),
            'languages' => json_encode(['English', 'French', 'Spanish']),
            'included' => json_encode([
                'Private A/C vehicle with driver',
                'Hotel/riad accommodation with dinners & breakfasts',
                'Camel trek in Merzouga & desert camp stay',
                'Local guides in major cities',
                'Airport transfers',
            ]),
            'excluded' => json_encode([
                'Lunches and drinks',
                'Tips and personal expenses',
                'Monument entrance fees',
            ]),
            'location_id' => Location::where('slug', 'tangier')->value('id'),
            'category_id' => TourCategory::where('slug', 'grand-morocco-tours')->value('id'),
        ]);
        $tour->itineraries()->createMany([
            ['day_number' => 1, 'title' => 'Tangier', 'content' => ['Arrival, transfer from airport, medina walking tour, overnight in riad.']],
            ['day_number' => 2, 'title' => 'Tangier to Chefchaouen', 'content' => ['Drive via Rif Mountains, explore Chefchaouen medina, overnight in riad.']],
            ['day_number' => 3, 'title' => 'Chefchaouen - Volubilis - Fes', 'content' => ['Visit Roman ruins of Volubilis, holy town of Moulay Idriss, then explore Meknes medina and travel to Fes.']],
            ['day_number' => 4, 'title' => 'Fes City Tour', 'content' => ['Visit Al Karaouiyne, Nejjarine Fountain, tanneries, museums, overnight in medina.']],
            ['day_number' => 5, 'title' => 'Fes - Ifrane - Midelt - Merzouga', 'content' => ['Stop at Ifrane, cedar forest of Azrou, Midelt, Errachidia, Erfoud. Overnight in Merzouga.']],
            ['day_number' => 6, 'title' => 'Merzouga Desert Excursion', 'content' => ['Gnawa village, off-road dunes tour, camel trek to camp, dinner with Berber music under stars.']],
            ['day_number' => 7, 'title' => 'Merzouga - Todra - Dades', 'content' => ['Watch sunrise, visit Rissani and Erfoud, hike Todra Gorge, night in Dades.']],
            ['day_number' => 8, 'title' => 'Dades - Skoura - Ouarzazate', 'content' => ['Drive via Rose Valley, visit Kasbah Amridil in Skoura, tour Ouarzazate film studios.']],
            ['day_number' => 9, 'title' => 'Ouarzazate - Ait Benhaddou - Marrakech', 'content' => ['Tour Ait Benhaddou kasbah, cross High Atlas to Marrakech.']],
            ['day_number' => 10, 'title' => 'Marrakech City Tour', 'content' => ['Explore Jamaa el-Fna, Saadian Tombs, Majorelle Gardens, medina and souks.']],
            ['day_number' => 11, 'title' => 'Marrakech - Casablanca - Rabat', 'content' => ['Visit Casablanca Hassan II Mosque, then Rabat landmarks. Overnight in Rabat.']],
            ['day_number' => 12, 'title' => 'Rabat - Asilah - Tangier', 'content' => ['Drive along coast to Asilah, end in Tangier with drop-off.']],
        ]);
        // tangier END
        // casablanca start

        $categoryId = TourCategory::where('slug', 'casablanca-imperial-desert-tours')->value('id');
        $locationId = Location::where('slug', 'casablanca')->value('id');

        $casablancaToMarrakechTour = Tour::create([
            'title' => '2-Day Casablanca to Marrakech Tour',
            'slug' => Str::slug('2-Day Casablanca to Marrakech Tour'),
            'type' => 'multi_day',
            'duration' => '2 Days',
            'group_size' => 'Flexible',
            'age_range' => 'All ages',
            'base_price' => 0,
            'bestseller_flag' => false,
            'free_cancellation_flag' => true,
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d860464.3649349917!2d-8.627824171542702!3d32.60114829961537!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e0!4m5!1s0xda7cd4778aa113b%3A0xb06c1d84f310fd3!2sCasablanca!3m2!1d33.5731104!2d-7.5898433999999995!4m5!1s0xdafee8d96179e51%3A0x5950b6534f87adb8!2sMarrakesh!3m2!1d31.6294723!2d-7.9810845!5e0!3m2!1sen!2sma!4v1556148661671!5m2!1sen!2sma" width="655" height="548" frameborder="0" style="border:0" allowfullscreen></iframe>',
            'overview' => 'We will provide you with the best drivers, local guides, and a once-in-a-lifetime experience during your selected private tour of Casablanca and the medina in Marrakech. Explore iconic sites like the Saadian Tombs, Bahia Palace, Jemaa el Fna, and the modern Gueliz district, with the option to enjoy camel or quad rides in Agafay. This private 2-day experience includes guided tours, free time, and comfortable overnight accommodation in a traditional riad.',
            'highlights' => json_encode([
                'Menara Garden and Saadian Tombs',
                'Bahia Palace and Marrakech Medina',
                'Jemaa el Fna square and souks',
                'Gueliz modern district',
                'Optional Agafay desert camel or quad ride'
            ]),
            'included' => json_encode([
                'All hotel pick up transfers with local drivers',
                'Comfortable and private A/C vehicle travel from Casablanca',
                'Guided excursion in medina of Marrakech',
                'Overnight in hotel or riad',
                'Dinners and breakfasts as per itinerary'
            ]),
            'excluded' => json_encode([
                'Lunches and soft drinks',
                'Admission fees and gratuities'
            ]),
            'languages' => json_encode(['English', 'Spanish', 'French']),
            'category_id' => $categoryId,
            'location_id' => $locationId,
        ]);

        $casablancaToMarrakechTour->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Day 1: Casablanca to Marrakech',
                'content' => json_encode([
                    'Pickup from your Casablanca hotel at 8:00 AM.',
                    'Drive to Marrakech and visit Menara Garden, Saadian Tombs, and Bahia Palace.',
                    'Explore the medina and souks, and enjoy time in Jemaa el Fna square.',
                    'Free time in the afternoon for personal discovery.',
                    'Overnight stay in a traditional riad in Marrakech.'
                ]),
            ],
            [
                'day_number' => 2,
                'title' => 'Day 2: Marrakech - Casablanca',
                'content' => json_encode([
                    'Visit Gueliz district and enjoy optional activities (camel ride, quad, Agafay).',
                    'Free time for shopping or relaxing in a café.',
                    'Return drive to Casablanca with drop-off at your hotel.'
                ]),
            ],
        ]);
        $categoryId = TourCategory::where('slug', 'casablanca-imperial-desert-tours')->value('id');
        $locationId = Location::where('slug', 'casablanca')->value('id');

        $casablancaChefFesTour = Tour::create([
            'title' => '3-Day Casablanca to Chefchaouen & Fes Tour',
            'slug' => Str::slug('3-Day Casablanca to Chefchaouen & Fes Tour'),
            'type' => 'multi_day',
            'duration' => '3 Days',
            'group_size' => 'Flexible',
            'age_range' => 'All ages',
            'base_price' => 0,
            'bestseller_flag' => false,
            'free_cancellation_flag' => true,
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?pb=!1m34!1m12!1m3!1d844476.9339144808!2d-6.843042953739146!3d34.225003038091714!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m19!3e0!4m5!1s0xda7cd4778aa113b%3A0xb06c1d84f310fd3!2sCasablanca!3m2!1d33.5731104!2d-7.5898433999999995!4m5!1s0xd0b265e6402d907%3A0x91548980ce97ea0c!2sChefchaouen!3m2!1d35.168796!2d-5.268364099999999!4m5!1s0xd9f8b484d445777%3A0x10e6aaaeedd802ef!2sFes!3m2!1d34.0181246!2d-5.0078451!5e0!3m2!1sen!2sma!4v1556149012344!5m2!1sen!2sma" width="655" height="548" frameborder="0" style="border:0" allowfullscreen></iframe>',
            'overview' => 'This 3-day private tour from Casablanca takes you through Morocco’s scenic north. Visit the capital Rabat, explore the stunning blue medina of Chefchaouen in the Rif Mountains, and discover the ancient walled city of Fes. Includes guided tours, local insight, and overnight stays in charming riads.',
            'highlights' => json_encode([
                'Visit to Rabat historical monuments',
                'Explore the blue-washed medina of Chefchaouen',
                'Discover UNESCO-listed Fes medina',
                'Optional return transfer to Casablanca',
                'Flexible pickup and drop-off schedule'
            ]),
            'included' => json_encode([
                'All hotel pick up transfers with local drivers',
                'Private A/C vehicle travel from Casablanca',
                'Overnight stays in riads or traditional hotels',
                'Guided excursion in Fes and Chefchaouen',
                'Dinners and breakfasts as per itinerary'
            ]),
            'excluded' => json_encode([
                'Lunches and soft drinks',
                'Admission fees and gratuities'
            ]),
            'languages' => json_encode(['English', 'Spanish', 'French']),
            'category_id' => $categoryId,
            'location_id' => $locationId,
        ]);

        $casablancaChefFesTour->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Day 1: Casablanca – Rabat – Chefchaouen',
                'content' => json_encode([
                    'Pickup from your hotel in Casablanca at 8:00 AM.',
                    'Drive to Rabat and explore landmarks like Hassan Tower and Oudayas Kasbah.',
                    'Continue north via Ouazzane into the Rif Mountains.',
                    'Arrive in Chefchaouen and explore its blue-washed alleys.',
                    'Overnight stay in a local riad.'
                ]),
            ],
            [
                'day_number' => 2,
                'title' => 'Day 2: Chefchaouen – Meknes (optional) – Fes',
                'content' => json_encode([
                    'Morning departure from Chefchaouen.',
                    'Optional stop in Meknes or continue directly to Fes.',
                    'Leisure time and guided orientation in Fes medina.',
                    'Overnight stay in a traditional riad in Fes.'
                ]),
            ],
            [
                'day_number' => 3,
                'title' => 'Day 3: Fes Guided Tour & Return to Casablanca',
                'content' => json_encode([
                    'Guided exploration of Fes: Al Karaouine Mosque, tanneries, souks, medina gates.',
                    'Lunch and free time for shopping or exploring.',
                    'Return to Casablanca with drop-off at your hotel (optional).'
                ]),
            ],
        ]);
        $categoryId = TourCategory::where('slug', 'casablanca-imperial-desert-tours')->value('id');
        $locationId = Location::where('slug', 'casablanca')->value('id');

        $casablancaToEssaouiraTour = Tour::create([
            'title' => '3-Day Casablanca to Marrakech & Essaouira Tour',
            'slug' => Str::slug('3-Day Casablanca to Marrakech & Essaouira Tour'),
            'type' => 'multi_day',
            'duration' => '3 Days',
            'group_size' => 'Flexible',
            'age_range' => 'All ages',
            'base_price' => 0,
            'bestseller_flag' => false,
            'free_cancellation_flag' => true,
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?pb=!1m34!1m12!1m3!1d1722310.7107372049!2d-9.774393255120783!3d32.529135283675934!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m19!3e0!4m5!1s0xda7cd4778aa113b%3A0xb06c1d84f310fd3!2sCasablanca!3m2!1d33.5731104!2d-7.5898433999999995!4m5!1s0xdafee8d96179e51%3A0x5950b6534f87adb8!2sMarrakesh!3m2!1d31.6294723!2d-7.9810845!4m5!1s0xdad9a4e9f588ccf%3A0x57421a176d5d7d30!2sEssaouira!3m2!1d31.5084926!2d-9.7595041!5e0!3m2!1sen!2sma!4v1556148980480!5m2!1sen!2sma" width="655" height="548" frameborder="0" style="border:0" allowfullscreen></iframe>',
            'overview' => 'We provide a 3-day / 2-night Morocco tour from Casablanca to Marrakech and Essaouira. Explore historical landmarks in the red city, wander through the famous Jemaa el Fna, and admire the Majorelle Gardens. Then head to the Atlantic coast and discover Essaouira’s harbor, medina, beach, and artisan cooperatives. This itinerary is ideal for travelers seeking a cultural and coastal blend.',
            'highlights' => json_encode([
                'Explore Marrakech medina and Jemaa el Fna',
                'Visit Menara and Majorelle Gardens',
                'Drive along the scenic Atlantic coast',
                'UNESCO medina of Essaouira',
                'Moulay El Hassan square and Argan cooperative'
            ]),
            'included' => json_encode([
                'All hotel pick up transfers with local drivers',
                'Private A/C vehicle travel from Casablanca',
                'Overnight stays in Marrakech and Essaouira riads/hotels',
                'Guided medina tours in Marrakech and Essaouira',
                'Dinners and breakfasts as per itinerary'
            ]),
            'excluded' => json_encode([
                'Lunches and soft drinks',
                'Admission fees and gratuities'
            ]),
            'languages' => json_encode(['English', 'Spanish', 'French']),
            'category_id' => $categoryId,
            'location_id' => $locationId,
        ]);

        $casablancaToEssaouiraTour->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Day 1: Casablanca to Marrakech',
                'content' => json_encode([
                    'Pickup from your hotel in Casablanca at 8:00 AM.',
                    'Drive via highway to Marrakech.',
                    'Visit Jemaa el Fna square, medina souks, Menara Gardens, and Majorelle Gardens.',
                    'Free time for optional activities or relaxing.',
                    'Overnight stay in a city riad in Marrakech.'
                ]),
            ],
            [
                'day_number' => 2,
                'title' => 'Day 2: Marrakech to Essaouira',
                'content' => json_encode([
                    'Depart from Marrakech at 8:00 AM.',
                    'Drive to Essaouira on the Atlantic coast.',
                    'Explore harbor, Moulay El Hassan square, and the UNESCO medina.',
                    'Lunch at a local fish restaurant.',
                    'Visit an Argan oil cooperative.',
                    'Free time in the afternoon and overnight in Essaouira.'
                ]),
            ],
            [
                'day_number' => 3,
                'title' => 'Day 3: Essaouira to Casablanca',
                'content' => json_encode([
                    'Free morning in Essaouira for relaxing or exploring.',
                    'Afternoon return drive to Casablanca.',
                    'Drop-off at your hotel in Casablanca.'
                ]),
            ],
        ]);
        $categoryId = TourCategory::where('slug', 'casablanca-imperial-desert-tours')->value('id');
        $locationId = Location::where('slug', 'casablanca')->value('id');

        $casablancaSaharaTour = Tour::create([
            'title' => '5-Day Sahara Desert Tour from Casablanca',
            'slug' => Str::slug('5-Day Sahara Desert Tour from Casablanca'),
            'type' => 'multi_day',
            'duration' => '5 Days',
            'group_size' => 'Flexible',
            'age_range' => 'All ages',
            'base_price' => 0,
            'bestseller_flag' => false,
            'free_cancellation_flag' => true,
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?pb=!1m76!1m12!1m3!1d1723327.9122725741!2d-7.116934616197105!3d32.47603959404556!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m61!... (truncated for brevity) ..." width="655" height="548" frameborder="0" style="border:0" allowfullscreen></iframe>',
            'overview' => 'This private 5-day Morocco desert tour from Casablanca takes you through Rabat, Fes, Ifrane, the Sahara dunes of Merzouga, Todra and Dades Gorges, and finishes in Marrakech. You’ll explore historic medinas, ride camels across the golden Erg Chebbi dunes, and sleep under the stars in a desert camp.',
            'highlights' => json_encode([
                'Explore Rabat, Meknes, and Fes',
                'Visit cedar forests and Middle Atlas mountains',
                'Camel trek in Erg Chebbi dunes',
                'Desert camp under the stars',
                'Todra and Dades gorges landscapes',
                'Ait Benhaddou Kasbah and High Atlas Mountains'
            ]),
            'included' => json_encode([
                'All hotel pick up and drop off transfers',
                'Private A/C vehicle and driver',
                'Camel ride in the Sahara Desert',
                'Overnights in riads, hotels, and desert camp',
                'Dinners and breakfasts as per itinerary'
            ]),
            'excluded' => json_encode([
                'Lunches and soft drinks',
                'Admission fees and tips'
            ]),
            'languages' => json_encode(['English', 'Spanish', 'French']),
            'category_id' => $categoryId,
            'location_id' => $locationId,
        ]);

        $casablancaSaharaTour->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Day 1: Casablanca – Rabat – Meknes – Fes',
                'content' => json_encode([
                    'After breakfast, depart for Rabat and visit the Mausoleums of Mohamed V and Hassan Tower.',
                    'Continue to Meknes for a tour of Roman ruins and historic medina.',
                    'Evening arrival in Fes. Overnight at a hotel or riad.'
                ]),
            ],
            [
                'day_number' => 2,
                'title' => 'Day 2: Guided Fes City Tour',
                'content' => json_encode([
                    'Explore Fes’s historic medina with a local guide.',
                    'Visit the tanneries, Nejjarine Fountain, Qayrawan Mosque, and souks.',
                    'Discover cultural and artisanal highlights of Fes.',
                    'Overnight stay in a local hotel or riad.'
                ]),
            ],
            [
                'day_number' => 3,
                'title' => 'Day 3: Fes – Ifrane – Midelt – Merzouga',
                'content' => json_encode([
                    'Depart Fes and travel through Ifrane and Azrou cedar forest (monkeys).',
                    'Continue via Midelt and Errachidia toward Merzouga.',
                    'Arrive for camel ride into the dunes and desert camp dinner under the stars.',
                    'Overnight in Berber tents in the Sahara.'
                ]),
            ],
            [
                'day_number' => 4,
                'title' => 'Day 4: Merzouga – Todra Gorge – Dades Valley',
                'content' => json_encode([
                    'Watch sunrise over the dunes, then breakfast at camp.',
                    'Travel to Todra Gorge for sightseeing and short hike.',
                    'Continue to Dades Gorges. Overnight in local kasbah.'
                ]),
            ],
            [
                'day_number' => 5,
                'title' => 'Day 5: Dades – Skoura – Ait Benhaddou – Marrakech',
                'content' => json_encode([
                    'Drive through Valley of Roses and visit palm groves in Skoura.',
                    'Explore UNESCO-listed Ait Benhaddou village.',
                    'Cross the Atlas Mountains and arrive in Marrakech by evening.',
                    'Tour ends with drop-off at your hotel.'
                ]),
            ],
        ]);
        $categoryId = TourCategory::where('slug', 'casablanca-imperial-desert-tours')->value('id');
        $locationId = Location::where('slug', 'casablanca')->value('id');

        $grandCasablancaTour = Tour::create([
            'title' => '11-Day Grand Tour from Casablanca: Discover Morocco\'s Beauty',
            'slug' => Str::slug('11-Day Grand Tour from Casablanca: Discover Morocco\'s Beauty'),
            'type' => 'multi_day',
            'duration' => '11 Days',
            'group_size' => 'Flexible',
            'age_range' => 'All ages',
            'base_price' => 0,
            'bestseller_flag' => true,
            'free_cancellation_flag' => true,
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?pb=!1m76!1m12!1m3!1d3425217.975049385!2d-8.261487782224826!3d33.03172622763463!...(truncated)" width="655" height="548" frameborder="0" style="border:0" allowfullscreen></iframe>',
            'overview' => 'This 11-day Morocco Grand Tour from Casablanca includes the imperial cities of Rabat, Fes, and Marrakech, plus a full Sahara desert adventure in Merzouga, visits to Chefchaouen, Volubilis, Todra, Dades, and Ait Benhaddou. The perfect blend of history, nature, and culture.',
            'highlights' => json_encode([
                'Explore Casablanca, Rabat, Chefchaouen, Fes, Marrakech',
                'Visit Volubilis and the UNESCO imperial cities',
                'Trek in Rif mountains (optional)',
                'Camel trek and night in Sahara desert camp',
                'Visit Todra and Dades gorges',
                'Ait Benhaddou and High Atlas Mountains',
                'Fully guided city tours'
            ]),
            'included' => json_encode([
                'All hotel and airport transfers',
                'Private A/C vehicle with driver',
                'Guided tours in imperial cities',
                'Camel ride in Sahara desert',
                'Overnight in riads, hotels, and desert camp',
                'Dinners and breakfasts as per itinerary'
            ]),
            'excluded' => json_encode([
                'Lunches and drinks',
                'Entrance fees and tips'
            ]),
            'languages' => json_encode(['English', 'Spanish', 'French']),
            'category_id' => $categoryId,
            'location_id' => $locationId,
        ]);

        $grandCasablancaTour->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Day 1: Casablanca Arrival',
                'content' => json_encode([
                    'Pickup from airport and transfer to your hotel.',
                    'Sightseeing around Casablanca’s major landmarks.',
                    'Overnight stay in a nearby hotel.'
                ]),
            ],
            [
                'day_number' => 2,
                'title' => 'Day 2: Casablanca – Rabat – Chefchaouen',
                'content' => json_encode([
                    'Visit Rabat’s Mausoleum of Mohamed V and Hassan Tower.',
                    'Continue to Chefchaouen in the Rif Mountains.',
                    'Explore the blue-painted streets of the Medina.',
                    'Overnight stay in a hotel in Chefchaouen.'
                ]),
            ],
            [
                'day_number' => 3,
                'title' => 'Day 3: Chefchaouen Free Day',
                'content' => json_encode([
                    'Free day to relax or enjoy optional trekking in the Rif Mountains.',
                    'Overnight stay in Chefchaouen.'
                ]),
            ],
            [
                'day_number' => 4,
                'title' => 'Day 4: Chefchaouen – Meknes – Volubilis – Fes',
                'content' => json_encode([
                    'Drive to Meknes and visit its historic medina.',
                    'Guided tour of Volubilis Roman ruins.',
                    'Arrival in Fes. Overnight stay in the city.'
                ]),
            ],
            [
                'day_number' => 5,
                'title' => 'Day 5: Guided Fes City Tour',
                'content' => json_encode([
                    'Full-day guided walking tour of Fes.',
                    'Visit tanneries, Nejjarine Fountain, and Qayrawan Mosque.',
                    'Explore souks and artisan quarters.',
                    'Overnight in a hotel or riad.'
                ]),
            ],
            [
                'day_number' => 6,
                'title' => 'Day 6: Fes – Ifrane – Midelt – Erfoud – Merzouga',
                'content' => json_encode([
                    'Drive via Ifrane and Azrou’s cedar forest to Midelt.',
                    'Pass through the Ziz Valley and reach Erfoud.',
                    'Arrive in Merzouga for dinner and night at a desert hotel.'
                ]),
            ],
            [
                'day_number' => 7,
                'title' => 'Day 7: Merzouga Desert Exploration and Camel Ride',
                'content' => json_encode([
                    'Explore Khamlia village and Hassilabied area.',
                    'Camel ride to desert camp in the afternoon.',
                    'Enjoy dinner and Berber music under the stars.'
                ]),
            ],
            [
                'day_number' => 8,
                'title' => 'Day 8: Merzouga – Todra Gorge – Dades Gorges',
                'content' => json_encode([
                    'Sunrise in the Sahara, then depart for Todra Gorge.',
                    'Continue to Dades Gorges. Overnight in a traditional kasbah.'
                ]),
            ],
            [
                'day_number' => 9,
                'title' => 'Day 9: Dades – Skoura – Ait Benhaddou – Marrakech',
                'content' => json_encode([
                    'Visit Rose Valley and palm groves of Skoura.',
                    'Explore Ait Benhaddou Kasbah (UNESCO site).',
                    'Cross Atlas Mountains to Marrakech.',
                    'Overnight stay in Marrakech.'
                ]),
            ],
            [
                'day_number' => 10,
                'title' => 'Day 10: Marrakech City Tour',
                'content' => json_encode([
                    'Full-day guided city tour of Marrakech.',
                    'Visit Majorelle Garden, Koutoubia Mosque, Medina, and more.',
                    'Overnight in a Marrakech riad.'
                ]),
            ],
            [
                'day_number' => 11,
                'title' => 'Day 11: Marrakech – Casablanca',
                'content' => json_encode([
                    'Transfer from Marrakech to Casablanca.',
                    'Drop-off at the airport or hotel. End of tour.'
                ]),
            ],
        ]);

        $categoryId = TourCategory::where('slug', 'casablanca-imperial-desert-tours')->value('id');
        $locationId = Location::where('slug', 'casablanca')->value('id');

        $tour = Tour::create([
            'title' => '14-Day Grand Morocco Tour from Casablanca',
            'slug' => Str::slug('14-Day Grand Morocco Tour from Casablanca'),
            'type' => 'multi_day',
            'duration' => '14 Days',
            'group_size' => 'Flexible',
            'age_range' => 'All ages',
            'base_price' => 0,
            'bestseller_flag' => true,
            'free_cancellation_flag' => true,
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?pb=!1m76!...your-full-map-url..." width="655" height="548" frameborder="0" style="border:0" allowfullscreen></iframe>',
            'overview' => 'We organize Sahara trips from Casablanca with a native tour driver and desert guides who are Sahara dunes specialists. We go via the Atlas Mountains to reach the Sahara camp.',
            'highlights' => json_encode([
                "Hassan II Mosque in Casablanca",
                "Rabat Hassan Tower & Oudaya Kasbah",
                "Chefchaouen Blue City guided tour",
                "Roman ruins of Volubilis",
                "Meknes imperial city walls",
                "Fes medina UNESCO site & tanneries",
                "Camel ride & desert camp in Merzouga",
                "Todra & Dades Gorges hike",
                "Kasbah Ait Benhaddou visit",
                "Marrakech historical guided tour",
                "Essaouira Atlantic coastal walk"
            ]),
            'included' => json_encode([
                "Airport and hotel transfers",
                "Private A/C transport with local driver",
                "Experienced local guide",
                "Camel trekking experience",
                "All dinners and breakfasts",
                "Overnight stays in hotels, riads, and luxury desert camp"
            ]),
            'excluded' => json_encode([
                "Lunches and soft drinks",
                "Entrance fees and personal expenses",
                "Gratuities"
            ]),
            'languages' => json_encode(["English", "French", "Spanish"]),
            'location_id' => $locationId,
            'category_id' => $categoryId,
        ]);

        $tour->itineraries()->createMany([
            ['day_number' => 1, 'title' => 'Casablanca - Rabat', 'content' => [
                'Pickup from your hotel in Casablanca.',
                'Visit the Hassan II Mosque and coastal sights.',
                'Continue to Rabat to see the Hassan Tower and Oudaya Kasbah.',
                'Overnight stay in a riad or hotel.'
            ]],
            ['day_number' => 2, 'title' => 'Rabat - Ouazane - Chefchaouen', 'content' => [
                'Drive through the Rif mountains.',
                'Arrive in Chefchaouen, the blue-painted city.',
                'Overnight in a local riad.'
            ]],
            ['day_number' => 3, 'title' => 'Chefchaouen Exploration', 'content' => [
                'Guided tour of Chefchaouen medina.',
                'Optional hiking in the Rif Mountains.',
                'Free afternoon and overnight stay.'
            ]],
            ['day_number' => 4, 'title' => 'Chefchaouen - Volubilis - Meknes - Fes', 'content' => [
                'Visit Roman ruins of Volubilis.',
                'Stop in Meknes to explore the Medina and walls.',
                'Arrive in Fes and overnight stay.'
            ]],
            ['day_number' => 5, 'title' => 'Fes City Tour', 'content' => [
                'Explore Fes medina with local guide.',
                'Visit tanneries, Al Quaraouiyine University, Nejjarine square.',
                'Free time and overnight in riad.'
            ]],
            ['day_number' => 6, 'title' => 'Fes - Ifrane - Azrou - Midelt', 'content' => [
                'Drive through Ifrane (Swiss-style town).',
                'See cedar forests and monkeys in Azrou.',
                'Dinner and overnight in Midelt.'
            ]],
            ['day_number' => 7, 'title' => 'Midelt - Erfoud - Rissani - Merzouga', 'content' => [
                'Cross the Ziz Valley to reach the desert.',
                'Stop at Erfoud fossil museum and Rissani souks.',
                'Camel ride to desert camp in Merzouga.',
                'Dinner and Berber music.'
            ]],
            ['day_number' => 8, 'title' => 'Merzouga - Todra Gorges - Dades', 'content' => [
                'Sunrise over dunes, camel trek back.',
                'Visit Todra Gorge and hike.',
                'Dinner and overnight in Dades Gorges.'
            ]],
            ['day_number' => 9, 'title' => 'Dades - Skoura - Ouarzazate - Ait Benhaddou - Marrakech', 'content' => [
                'Drive via Valley of Roses and Skoura oasis.',
                'Visit Atlas Studios in Ouarzazate.',
                'Explore Ait Benhaddou.',
                'Cross the High Atlas via Tizi n’Tichka to Marrakech.'
            ]],
            ['day_number' => 10, 'title' => 'Marrakech Guided Tour', 'content' => [
                'Visit Bahia Palace, Koutoubia, Saadian Tombs, and Majorelle Gardens.',
                'Stroll through Jemaa el Fna and souks.',
                'Overnight stay in a riad.'
            ]],
            ['day_number' => 11, 'title' => 'Marrakech to Essaouira', 'content' => [
                'Drive along Atlantic coast to Essaouira.',
                'Stop by argan tree cooperatives.',
                'Explore old medina and port.',
                'Overnight in Essaouira.'
            ]],
            ['day_number' => 12, 'title' => 'Essaouira Exploration', 'content' => [
                'Visit Skala Fortress and relax on the beach.',
                'Free afternoon and overnight stay.'
            ]],
            ['day_number' => 13, 'title' => 'Essaouira - Casablanca', 'content' => [
                'Return to Casablanca via the Atlantic road.',
                'Check-in at local hotel.'
            ]],
            ['day_number' => 14, 'title' => 'Casablanca Airport Drop-off', 'content' => [
                'Transfer to Casablanca airport.',
                'End of 14-day Grand Morocco Tour.'
            ]],
        ]);

        $categoryId = TourCategory::where('slug', 'casablanca-imperial-desert-tours')->value('id');
        $locationId = Location::where('slug', 'casablanca')->value('id');

        $tour = Tour::create([
            'title' => '7-Day Private Tour from Casablanca to Imperial Cities & Sahara',
            'slug' => Str::slug('7-Day Private Tour from Casablanca to Imperial Cities & Sahara'),
            'type' => 'multi_day',
            'duration' => '7 Days',
            'group_size' => 'Flexible',
            'age_range' => 'All ages',
            'base_price' => 0,
            'bestseller_flag' => true,
            'free_cancellation_flag' => true,
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?pb=!1m76!1m12!1m3!1d3425217.975049385!2d-8.261487782224826!3d33.03172622763463!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m61!..."></iframe>',
            'overview' => 'This 7-day private tour from Casablanca explores Morocco’s imperial cities and Sahara Desert. Visit Rabat, Chefchaouen, Fes, Merzouga, Todra Gorge, Dades Valley, and Marrakech with expert local guides and comfortable desert camping.',
            'highlights' => json_encode([
                "Visit Rabat’s Hassan Tower & Mausoleum",
                "Explore blue medina of Chefchaouen",
                "Fes city tour with local guide",
                "Camel ride in Erg Chebbi dunes",
                "Overnight in Sahara desert camp",
                "Todra & Dades Gorges exploration",
                "Ait Benhaddou Kasbah visit",
                "Marrakech guided medina tour"
            ]),
            'included' => json_encode([
                "Airport and hotel transfers",
                "Private transport in A/C vehicle",
                "Camel trek in Sahara desert",
                "Accommodation in riads/hotels",
                "1 night in luxury desert camp",
                "Dinners and breakfasts",
                "Local guide in Fes and Marrakech"
            ]),
            'excluded' => json_encode([
                "Lunches and soft drinks",
                "Admission fees",
                "Gratuities"
            ]),
            'languages' => json_encode(["English", "Spanish", "French"]),
            'category_id' => $categoryId,
            'location_id' => $locationId,
        ]);

        $tour->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Casablanca To Rabat And Chefchaouen',
                'content' => [
                    'Visit Hassan II Mosque in Casablanca.',
                    'Continue to Rabat for guided visit: Mausoleum of Mohamed V, Mohamed II Mosque.',
                    'Drive through Ouazane to reach Chefchaouen.',
                    'Explore the blue medina and stay overnight.'
                ]
            ],
            [
                'day_number' => 2,
                'title' => 'Chefchaouen to Meknes and Fes',
                'content' => [
                    'Depart Chefchaouen and head to Meknes.',
                    'Visit medina and UNESCO sites.',
                    'Explore Volubilis Roman ruins.',
                    'Drive to Fes and overnight stay.'
                ]
            ],
            [
                'day_number' => 3,
                'title' => 'Fes City Excursion',
                'content' => [
                    'Visit tanneries, Place an-Nejjarine, and Qayrawan mosque.',
                    'Explore medina with local guide.',
                    'Free afternoon and overnight stay.'
                ]
            ],
            [
                'day_number' => 4,
                'title' => 'Fes - Midelt - Erfoud - Merzouga',
                'content' => [
                    'Drive through Ifrane and Azrou cedar forest.',
                    'See Barbary apes.',
                    'Continue via Midelt and Errachidia to Merzouga.',
                    'Camel trek and overnight in desert camp.'
                ]
            ],
            [
                'day_number' => 5,
                'title' => 'Merzouga - Todra - Dades Gorges',
                'content' => [
                    'Watch sunrise in Sahara.',
                    'Drive to Todra Gorge and then to Dades Gorge.',
                    'Dinner and overnight in kasbah.'
                ]
            ],
            [
                'day_number' => 6,
                'title' => 'Dades - Skoura - Ait Benhaddou - Marrakech',
                'content' => [
                    'Visit Rose Valley, Skoura palm grove.',
                    'Tour Atlas Studios in Ouarzazate.',
                    'Explore Ait Benhaddou Kasbah.',
                    'Cross Atlas Mountains to Marrakech.'
                ]
            ],
            [
                'day_number' => 7,
                'title' => 'Marrakech Guided Tour',
                'content' => [
                    'Visit top landmarks with local guide: Koutoubia, Jamaa el-Fna, Majorelle Garden, and Saadian Tombs.',
                    'Drop-off at your hotel.'
                ]
            ],
        ]);
        $categoryId = TourCategory::where('slug', 'casablanca-imperial-desert-tours')->value('id');
        $locationId = Location::where('slug', 'casablanca')->value('id');
        Tour::create([
            'title' => '9-Day Private Tour from Casablanca: Explore Morocco\'s Wonders',
            'slug' => Str::slug('9-Day Private Tour from Casablanca: Explore Morocco\'s Wonders'),
            'type' => 'multi_day',
            'duration' => '9 Days',
            'group_size' => 'Flexible',
            'age_range' => 'All ages',
            'base_price' => 0,
            'bestseller_flag' => false,
            'free_cancellation_flag' => true,
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?pb=!1m76!1m12!1m3!1d3425397.0907728905!2d-8.26143745711403!3d33.027117815806534!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m61!..."></iframe>',
            'location_id' => Location::where('slug', 'casablanca')->value('id'),
            'category_id' => TourCategory::where('slug', 'casablanca-imperial-desert-tours')->value('id'),
            'overview' => 'Take advantage of the best holidays by embarking on a 9-day tour from Casablanca to the desert and Marrakech Fes across the Atlas and Sahara.',
            'highlights' => json_encode([
                'Explore Casablanca & Hassan II Mosque',
                'Discover Rabat and Chefchaouen',
                'Fes Medina & Al Quaraouiyine University',
                'Camel Trek in Merzouga Desert',
                'Todra & Dades Gorges',
                'UNESCO Ait Benhaddou visit',
                'Guided Marrakech city tour'
            ]),
            'included' => json_encode([
                'Hotel pick-up and drop-off',
                'Private A/C transport',
                'Camel trek in Merzouga',
                'Accommodation in riads/hotels/camp',
                'Daily breakfasts and dinners'
            ]),
            'excluded' => json_encode([
                'Lunches and drinks',
                'Entrance fees and tips'
            ]),
            'languages' => json_encode(['English', 'French', 'Spanish']),
        ]);

        $tour = Tour::where('slug', '9-day-private-tour-from-casablanca-explore-moroccos-wonders')->first();

        $tour->itineraries()->createMany([
            ['day_number' => 1, 'title' => 'Casablanca - Rabat', 'content' => [
                'Meet at Casablanca airport and visit Hassan II Mosque.',
                'Continue to Rabat to visit Hassan Tower, Oudaya Kasbah, and overnight in riad.'
            ]],
            ['day_number' => 2, 'title' => 'Rabat - Chefchaouen', 'content' => [
                'Drive through the Rif Mountains.',
                'Guided tour of the blue city Chefchaouen.'
            ]],
            ['day_number' => 3, 'title' => 'Chefchaouen - Volubilis - Meknes - Fes', 'content' => [
                'Visit Roman ruins at Volubilis.',
                'Stop at Meknes, then continue to Fes.'
            ]],
            ['day_number' => 4, 'title' => 'Fes Guided Tour', 'content' => [
                'Visit Fes El Bali, tanneries, and Al Quaraouiyine.',
                'Explore the car-free medina with a local guide.'
            ]],
            ['day_number' => 5, 'title' => 'Fes - Ifrane - Midelt - Merzouga', 'content' => [
                'Drive via Ifrane and Azrou cedar forest.',
                'Pass Midelt, Erfoud, and Rissani to reach Merzouga.',
                'Camel trek and night in desert camp.'
            ]],
            ['day_number' => 6, 'title' => 'Merzouga - Todra Gorges - Dades Gorges', 'content' => [
                'Sunrise camel ride, then visit Todra Gorges.',
                'Dinner and overnight in Dades valley.'
            ]],
            ['day_number' => 7, 'title' => 'Dades - Rose Valley - Ait Benhaddou - Marrakech', 'content' => [
                'Drive via Skoura and visit Ait Benhaddou Kasbah.',
                'Cross High Atlas via Tizi n’Tichka to reach Marrakech.'
            ]],
            ['day_number' => 8, 'title' => 'Marrakech Guided Tour', 'content' => [
                'Visit Majorelle Gardens, Saadian Tombs, Bahia Palace, souks, and Jamma el Fna.'
            ]],
            ['day_number' => 9, 'title' => 'Marrakech - Casablanca', 'content' => [
                'Transfer to Casablanca and end of tour.'
            ]],
        ]);
        $categoryId = TourCategory::where('slug', 'casablanca-imperial-desert-tours')->value('id');
        $locationId = Location::where('slug', 'casablanca')->value('id');
        Tour::create([
            'title' => '2-Day Casablanca to Chefchaouen Trip',
            'slug' => Str::slug('2-Day Casablanca to Chefchaouen Trip'),
            'type' => 'multi_day',
            'duration' => '2 Days',
            'group_size' => 'Flexible',
            'age_range' => 'All ages',
            'base_price' => 0,
            'bestseller_flag' => false,
            'free_cancellation_flag' => true,
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?pb=!1m40!1m12!1m3!1d843099.6733193425!2d-6.986244306926307!3d34.36681134451436!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m25!3e0!4m5!1s0xda7cd4778aa113b%3A0xb06c1d84f310fd3!2sCasablanca!3m2!1d33.5731104!2d-7.5898433999999995!4m5!1s0xda76b871f50c5c1%3A0x7ac946ed7408076b!2sRabat!3m2!1d33.9715904!2d-6.8498129!4m5!1s0xd0b265e6402d907%3A0x91548980ce97ea0c!2sChefchaouen!3m2!1d35.168796!2d-5.268364099999999!4m5!1s0xda7cd4778aa113b%3A0xb06c1d84f310fd3!2sCasablanca!3m2!1d33.5731104!2d-7.5898433999999995!5e0!3m2!1sen!2sma!4v1632980193236!5m2!1sen!2sma" width="655" height="548" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
            'location_id' => Location::where('slug', 'casablanca')->value('id'),
            'category_id' => TourCategory::where('slug', 'casablanca-imperial-desert-tours')->value('id'),
            'overview' => 'The most advantageous option is to take a privately guided trip from Casablanca to Chefchaouen. This includes a stop in Rabat, Morocco’s capital.',
            'highlights' => json_encode([
                'Visit the capital city Rabat on the way',
                'Wander through Chefchaouen’s charming blue streets',
                'Free time to explore local attractions',
                'Private transportation with English-speaking driver',
                'Stay in a traditional riad or hotel in Chefchaouen'
            ]),
            'included' => json_encode([
                'Hotel pick-up and drop-off',
                'Transportation in A/C 4WD or minivan',
                'English-speaking driver/guide',
                'Fuel',
                '1-night accommodation in riad or hotel with breakfast'
            ]),
            'excluded' => json_encode([
                'Lunches, dinner, soft drinks',
                'Entrance fees and gratuities'
            ]),
            'languages' => json_encode(['English', 'French', 'Spanish']),
        ]);

        $tour = Tour::where('slug', '2-day-casablanca-to-chefchaouen-trip')->first();

        $tour->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Casablanca to Chefchaouen',
                'content' => [
                    'Pick-up from your accommodation in Casablanca at 8:00 AM.',
                    'Drive to Chefchaouen with a scenic stop in Rabat to explore key sites.',
                    'Free time upon arrival to enjoy the beauty of the blue city.',
                    'Overnight stay in a charming hotel or riad.'
                ]
            ],
            [
                'day_number' => 2,
                'title' => 'Chefchaouen to Casablanca',
                'content' => [
                    'Enjoy breakfast and more time to explore Chefchaouen’s medina.',
                    'Return trip to Casablanca with scenic views along the way.',
                    'Drop-off at your accommodation in Casablanca by 6:00 PM.'
                ]
            ]
        ]);
        // casablanca END

        // DAY TRIPS START
        $categoryId = TourCategory::firstOrCreate(
            ['slug' => 'day-trips-from-marrakech'],
            ['name' => 'Day Trips from Marrakech']
        )->id;

        $locationId = Location::where('slug', 'marrakech')->value('id');

        $essaouiraDayTrip = Tour::create([
            'title' => 'Essaouira Day Trip from Marrakech: Atlantic Coast Adventure',
            'slug' => Str::slug('Essaouira Day Trip from Marrakech: Atlantic Coast Adventure'),
            'type' => 'day_trip',
            'duration' => '1 Day',
            'group_size' => 'Flexible',
            'age_range' => 'All ages',
            'base_price' => 0,
            'bestseller_flag' => true,
            'free_cancellation_flag' => true,
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d435008.44727927516!2d-9.14821487903051!3d31.592660697899042!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0xdafee8d96179e51%3A0x5950b6534f87adb8!2sMarrakesh+40000%2C+Morocco!3m2!1d31.6294723!2d-7.9810845!4m5!1s0xdad9a4e9f588ccf%3A0x57421a176d5d7d30!2sEssaouira%2C+Morocco!3m2!1d31.5084926!2d-9.7595041!5e0!3m2!1sen!2s!4v1468079809371" width="655" height="548" frameborder="0" style="border:0" allowfullscreen></iframe>',
            'overview' => 'Enjoy a full-day private excursion from Marrakech to Essaouira on the Atlantic coast. This guided adventure includes a visit to an Argan oil cooperative, exploration of the UNESCO-listed Essaouira medina, a walk along the sandy beach, optional camel rides, and lunch by the sea. Ideal for families and private groups looking for a refreshing coastal escape.',
            'highlights' => json_encode([
                'Visit Argan oil cooperative',
                'Explore Essaouira medina (UNESCO)',
                'Guided walking tour of fishing port and ramparts',
                'Camel ride along the Atlantic beach (optional)',
                'Souks and artisan shops',
                'Seafood lunch by the ocean'
            ]),
            'included' => json_encode([
                'Hotel pick-up and drop-off in Marrakech',
                'Private A/C transport with experienced driver',
                'Local English/French/Spanish-speaking guide',
                'Guided city tour of Essaouira',
                'Flexible stops and private itinerary'
            ]),
            'excluded' => json_encode([
                'Lunch and soft drinks',
                'Entrance fees (if any)',
                'Tips and personal expenses'
            ]),
            'languages' => json_encode(['English', 'Spanish', 'French']),
            'category_id' => $categoryId,
            'location_id' => $locationId,
        ]);

        $essaouiraDayTrip->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Full-Day Trip: Marrakech to Essaouira',
                'content' => json_encode([
                    'Morning departure from your Marrakech hotel or riad.',
                    'Drive through the countryside with stop at an Argan oil cooperative.',
                    'Arrive in Essaouira and begin guided walking tour of the medina, ramparts, and harbor.',
                    'Free time for seafood lunch and exploring local artisan shops.',
                    'Optional camel ride on the beach.',
                    'Late afternoon return to Marrakech with hotel drop-off.',
                ]),
            ],
        ]);
        $categoryId = TourCategory::firstOrCreate(
            ['slug' => 'day-trips-from-marrakech'],
            ['name' => 'Day Trips from Marrakech']
        )->id;

        $locationId = Location::where('slug', 'marrakech')->value('id');

        $agafayDayTrip = Tour::create([
            'title' => 'Agafay Desert Day Trip from Marrakech with Berber Lunch & Transfers',
            'slug' => Str::slug('Agafay Desert Day Trip from Marrakech with Berber Lunch & Transfers'),
            'type' => 'day_trip',
            'duration' => '1 Day',
            'group_size' => 'Flexible',
            'age_range' => 'All ages',
            'base_price' => 0,
            'bestseller_flag' => true,
            'free_cancellation_flag' => true,
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d108813.7057540484!2d-8.158017424937979!3d31.53985827189824!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e0!4m5!1s0xdafee8d96179e51%3A0x5950b6534f87adb8!2sMarrakesh!3m2!1d31.6294723!2d-7.9810845!4m5!1s0xdafdebf8ccf172d%3A0xcbc413a6095f3638!2sAgafay+Desert+Camp!3m2!1d31.4345502!2d-8.2008295!5e0!3m2!1sen!2sma!4v1556239818659!5m2!1sen!2sma" width="655" height="548" frameborder="0" style="border:0" allowfullscreen></iframe>',
            'overview' => 'Escape the city and explore the rocky Agafay Desert on this full-day tour from Marrakech. Discover hidden Berber villages, visit Lalla Takerkoust Dam, enjoy optional camel rides, and savor a Berber lunch with views over the Atlas Mountains. This tour offers a serene and scenic alternative to the busy Sahara routes.',
            'highlights' => json_encode([
                'Scenic drive from Marrakech to Agafay Desert',
                'Visit Lalla Takerkoust Lake and Dam',
                'Stop in Moulay Brahim village and Kik Plateau',
                'Optional camel or quad ride experience',
                'Berber-style lunch in a desert camp',
                'Panoramic views of High Atlas Mountains'
            ]),
            'included' => json_encode([
                'Hotel pick-up and drop-off in Marrakech',
                'Private A/C transport with experienced driver',
                'Local English/French/Spanish-speaking guide',
                'Guided desert and village visit',
                'Optional Berber lunch in Agafay'
            ]),
            'excluded' => json_encode([
                'Lunch and drinks',
                'Optional camel or quad activities',
                'Tips and personal expenses'
            ]),
            'languages' => json_encode(['English', 'Spanish', 'French']),
            'category_id' => $categoryId,
            'location_id' => $locationId,
        ]);

        $agafayDayTrip->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Full-Day Agafay Desert Adventure from Marrakech',
                'content' => json_encode([
                    'Morning pickup from your hotel or riad in Marrakech.',
                    'Drive through the countryside toward the Agafay Desert.',
                    'Stop at Lalla Takerkoust Lake and Kik Plateau.',
                    'Visit Moulay Brahim village and panoramic viewpoints.',
                    'Arrive at Agafay Desert for optional camel or quad ride.',
                    'Enjoy Berber lunch (optional) in a desert camp setting.',
                    'Relax and explore the peaceful desert environment.',
                    'Return drive to Marrakech with drop-off by late afternoon.',
                ]),
            ],
        ]);

        $categoryId = TourCategory::firstOrCreate(
            ['slug' => 'day-trips-from-marrakech'],
            ['name' => 'Day Trips from Marrakech']
        )->id;

        $locationId = Location::where('slug', 'marrakech')->value('id');

        $aitBenhaddouDayTrip = Tour::create([
            'title' => 'Ait Benhaddou & Ouarzazate Day Trip from Marrakech',
            'slug' => Str::slug('Ait Benhaddou & Ouarzazate Day Trip from Marrakech'),
            'type' => 'day_trip',
            'duration' => '1 Day',
            'group_size' => 'Flexible',
            'age_range' => 'All ages',
            'base_price' => 0,
            'bestseller_flag' => true,
            'free_cancellation_flag' => true,
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?pb=!1m34!1m12!1m3!1d436473.8503382801!2d-7.736266684596173!3d31.277424137151222!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m19!3e0!4m5!1s0xdafee8d96179e51%3A0x5950b6534f87adb8!2sMarrakesh!3m2!1d31.6294723!2d-7.9810845!4m5!1s0xdbae06120411439%3A0x4d090f64a0ec123a!2sA%C3%AFt+Benhaddou!3m2!1d31.047043!2d-7.1318996!4m5!1s0xdbb104077422057%3A0x26b3cb529b37ab00!2sOuarzazate!3m2!1d30.9335436!2d-6.937016!5e0!3m2!1sen!2sma!4v1556287906352!5m2!1sen!2sma" width="655" height="548" frameborder="0" style="border:0" allowfullscreen></iframe>',
            'overview' => 'Enjoy a full-day guided trip from Marrakech to the High Atlas Mountains, Kasbah Telouet, the UNESCO World Heritage site of Ait Benhaddou, and the film capital of Morocco—Ouarzazate. Travel through the Tizi n’Tichka Pass and discover stunning desert scenery, Berber architecture, and iconic film studios.',
            'highlights' => json_encode([
                'Drive across the scenic Tizi n\'Tichka Pass (High Atlas)',
                'Visit the historic Kasbah Telouet',
                'Explore Ait Benhaddou (UNESCO site)',
                'Discover Atlas Film Studios in Ouarzazate',
                'Visit the old Taourirt Kasbah',
                'Optional camel or quad rides'
            ]),
            'included' => json_encode([
                'Hotel pickup and drop-off in Marrakech',
                'Private A/C transportation with local driver',
                'Local English/French/Spanish-speaking guide',
                'Flexible stops along the route',
                'Family-friendly itinerary'
            ]),
            'excluded' => json_encode([
                'Lunches and soft drinks',
                'Entrance fees to monuments or studios',
                'Tips and personal expenses'
            ]),
            'languages' => json_encode(['English', 'Spanish', 'French']),
            'category_id' => $categoryId,
            'location_id' => $locationId,
        ]);

        $aitBenhaddouDayTrip->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Full-Day Ait Benhaddou & Ouarzazate Excursion',
                'content' => json_encode([
                    'Pickup from your accommodation in Marrakech in the morning.',
                    'Drive through the Tizi n\'Tichka Pass and admire Atlas Mountain scenery.',
                    'Stop at Kasbah Telouet for guided visit.',
                    'Continue to Ait Benhaddou and explore the famous fortified village.',
                    'Head to Ouarzazate for a visit to Atlas Studios and Taourirt Kasbah.',
                    'Optional activities such as camel ride or quad biking (if requested).',
                    'Return to Marrakech in the late afternoon for drop-off.',
                ]),
            ],
        ]);
        $categoryId = TourCategory::firstOrCreate(
            ['slug' => 'day-trips-from-marrakech'],
            ['name' => 'Day Trips from Marrakech']
        )->id;

        $locationId = Location::where('slug', 'marrakech')->value('id');

        $ourikaDayTrip = Tour::create([
            'title' => 'Ourika Valley Day Trip from Marrakech: Atlas Mountains & Waterfalls',
            'slug' => Str::slug('Ourika Valley Day Trip from Marrakech: Atlas Mountains & Waterfalls'),
            'type' => 'day_trip',
            'duration' => '1 Day',
            'group_size' => 'Flexible',
            'age_range' => 'All ages',
            'base_price' => 0,
            'bestseller_flag' => true,
            'free_cancellation_flag' => true,
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d108858.75879269728!2d-7.974213606412728!3d31.50118554554589!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0xdafee8d96179e51%3A0x5950b6534f87adb8!2sMarrakesh+40000%2C+Morocco!3m2!1d31.6294723!2d-7.9810845!4m5!1s0xdb0000c4d9d59e1%3A0x575f0b6fa2ee16b5!2sOurika%2C+Morocco!3m2!1d31.3745358!2d-7.7905758!5e0!3m2!1sen!2s!4v1468079877301" width="655" height="548" frameborder="0" style="border:0" allowfullscreen></iframe>',
            'overview' => 'Join a full-day private tour from Marrakech to the beautiful Ourika Valley in the Atlas Mountains. Visit an Argan oil cooperative, explore the village of Setti Fatma, and hike to the famous seven waterfalls. This peaceful retreat from the city includes scenic views, Berber culture, and optional lunch by the riverside.',
            'highlights' => json_encode([
                'Scenic drive through Atlas Mountains',
                'Visit to an Argan oil cooperative',
                'Explore Berber village of Setti Fatma',
                'Guided walk to the seven waterfalls',
                'Enjoy riverside lunch (optional)',
                'Cultural experience in Berber markets'
            ]),
            'included' => json_encode([
                'Hotel pickup and drop-off in Marrakech',
                'Private A/C vehicle with experienced driver',
                'Local English/French/Spanish-speaking guide',
                'Flexible photo and stop points',
                'Family-friendly full-day tour'
            ]),
            'excluded' => json_encode([
                'Lunch and drinks',
                'Waterfall entry fees (if any)',
                'Tips and personal expenses'
            ]),
            'languages' => json_encode(['English', 'Spanish', 'French']),
            'category_id' => $categoryId,
            'location_id' => $locationId,
        ]);

        $ourikaDayTrip->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Full-Day Excursion to Ourika Valley',
                'content' => json_encode([
                    'Depart from your hotel or riad in Marrakech in the morning.',
                    'Stop at a local Argan oil cooperative for a short visit.',
                    'Drive through the scenic Atlas foothills toward Setti Fatma.',
                    'Explore the Berber village and enjoy a guided hike to the waterfalls.',
                    'Optional lunch by the river or in a traditional Berber restaurant.',
                    'Afternoon return drive through the valley with optional stops.',
                    'Arrival back in Marrakech by early evening.',
                ]),
            ],
        ]);
        $categoryId = TourCategory::firstOrCreate(
            ['slug' => 'day-trips-from-marrakech'],
            ['name' => 'Day Trips from Marrakech']
        )->id;

        $locationId = Location::where('slug', 'marrakech')->value('id');

        $ouzoudDayTrip = Tour::create([
            'title' => 'Ouzoud Waterfalls Day Trip from Marrakech: Private Excursion with Hotel Pick-up',
            'slug' => Str::slug('Ouzoud Waterfalls Day Trip from Marrakech: Private Excursion with Hotel Pick-up'),
            'type' => 'day_trip',
            'duration' => '1 Day',
            'group_size' => 'Flexible',
            'age_range' => 'All ages',
            'base_price' => 0,
            'bestseller_flag' => true,
            'free_cancellation_flag' => true,
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d433931.5276524407!2d-7.634569157145516!3d31.822540369733527!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0xdafee8d96179e51%3A0x5950b6534f87adb8!2sMarrakesh+40000%2C+Morocco!3m2!1d31.6294723!2d-7.9810845!4m5!1s0xda48d6dca06773b%3A0x563a015ef8fc80d4!2sOuzoud+Waterfalls%2C+Azilal%2C+Morocco!3m2!1d32.015228799999996!2d-6.7196658!5e0!3m2!1sen!2s!4v1468079853736" width="655" height="548" frameborder="0" style="border:0" allowfullscreen></iframe>',
            'overview' => 'Escape the city and explore the stunning Ouzoud Waterfalls on this full-day trip from Marrakech. Visit one of Morocco’s most beautiful natural sights in the Atlas Mountains. See monkeys in their natural habitat, hike to multiple viewpoints, and enjoy a traditional Berber meal overlooking the falls.',
            'highlights' => json_encode([
                'Scenic drive through the Atlas foothills',
                'Guided visit to 100+ meter Ouzoud waterfalls',
                'Watch wild Barbary monkeys in nature',
                'Optional panoramic hike around the falls',
                'Traditional Berber lunch with a view',
                'Free time for relaxing or swimming'
            ]),
            'included' => json_encode([
                'Hotel pick-up and drop-off in Marrakech',
                'Private A/C transport with experienced driver',
                'Local English/French/Spanish-speaking guide',
                'Guided walking tour at the falls',
                'Flexible private itinerary'
            ]),
            'excluded' => json_encode([
                'Lunch and drinks',
                'Entrance fees (if any)',
                'Tips and personal expenses'
            ]),
            'languages' => json_encode(['English', 'Spanish', 'French']),
            'category_id' => $categoryId,
            'location_id' => $locationId,
        ]);

        $ouzoudDayTrip->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Full-Day Excursion to Ouzoud Waterfalls',
                'content' => json_encode([
                    'Pickup from your Marrakech hotel or riad in the morning.',
                    'Drive through scenic landscapes to the Ouzoud village.',
                    'Begin a guided hike to the waterfalls with multiple viewpoints.',
                    'Watch playful monkeys and birds in their natural surroundings.',
                    'Enjoy free time or lunch in a local restaurant overlooking the falls.',
                    'Optional boat ride or swimming near the base of the cascades.',
                    'Afternoon return to Marrakech and drop-off at your accommodation.',
                ]),
            ],
        ]);
        $categoryId = TourCategory::firstOrCreate(
            ['slug' => 'day-trips-from-fes'],
            ['name' => 'Day Trips from Fes']
        )->id;

        $locationId = Location::where('slug', 'fes')->value('id');

        $middleAtlasTrip = Tour::create([
            'title' => 'Middle Atlas Mountains Day Trip from Fes: Azrou & Ifrane Excursion',
            'slug' => Str::slug('Middle Atlas Mountains Day Trip from Fes: Azrou & Ifrane Excursion'),
            'type' => 'day_trip',
            'duration' => '1 Day',
            'group_size' => 'Flexible',
            'age_range' => 'All ages',
            'base_price' => 0,
            'bestseller_flag' => false,
            'free_cancellation_flag' => true,
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d542504.2112301436!2d-5.65006744915746!3d33.69025482629534!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e0!4m5!1s0xd9f8b259b2a791b%3A0xa1a6a7156a7a1c8d!2sFes%2C+Morocco!3m2!1d34.033125!2d-5.0000001!4m5!1s0xd9cb69db9b6d13b%3A0x6d5bb5b01f7b9f87!2sAzrou%2C+Morocco!3m2!1d33.438021!2d-5.221008!5e0!3m2!1sen!2sma!4v1651234567890" width="655" height="548" frameborder="0" style="border:0" allowfullscreen></iframe>',
            'overview' => 'Enjoy a scenic day trip from Fes to the Middle Atlas Mountains. Discover the “Switzerland of Morocco” in Ifrane, explore Azrou’s cedar forests with Barbary macaques, and visit charming Imouzzer on a comfortable private tour with a local guide.',
            'highlights' => json_encode([
                'Visit Ifrane – the Switzerland of Morocco',
                'Explore Imouzzer, known for its Apple Festival',
                'Walk through cedar forests near Azrou',
                'See and feed wild Barbary macaque monkeys',
                'Enjoy panoramic mountain views and Berber towns',
                'Private transportation from and to Fes'
            ]),
            'included' => json_encode([
                'Hotel pickup and drop-off from Fes',
                'Private A/C vehicle with experienced driver',
                'Guided tour with local expert',
                'Stops in Ifrane, Azrou, Imouzzer',
                'Flexible itinerary for families or groups'
            ]),
            'excluded' => json_encode([
                'Lunch and drinks',
                'Entrance fees',
                'Tips and personal expenses'
            ]),
            'languages' => json_encode(['English', 'Spanish', 'French']),
            'category_id' => $categoryId,
            'location_id' => $locationId,
        ]);

        $middleAtlasTrip->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Day Trip from Fes to Ifrane, Imouzzer, and Azrou',
                'content' => json_encode([
                    'Pickup from your riad or hotel in Fes.',
                    'Drive to Imouzzer, famous for its apples and Berber charm.',
                    'Continue to Ifrane – Morocco’s cleanest town and a ski resort known for Swiss-style buildings.',
                    'Explore the cedar forest near Azrou and see the Barbary macaques.',
                    'Free time to enjoy the mountain air or shop for local crafts.',
                    'Afternoon return to Fes and drop-off at your accommodation.'
                ]),
            ],
        ]);
        $categoryId = TourCategory::firstOrCreate(
            ['slug' => 'day-trips-from-fes'],
            ['name' => 'Day Trips from Fes']
        )->id;

        $locationId = Location::where('slug', 'fes')->value('id');

        $chefchaouenTrip = Tour::create([
            'title' => 'Chefchaouen Day Trip from Fes: Blue City Private Excursion',
            'slug' => Str::slug('Chefchaouen Day Trip from Fes: Blue City Private Excursion'),
            'type' => 'day_trip',
            'duration' => '1 Day',
            'group_size' => 'Flexible',
            'age_range' => 'All ages',
            'base_price' => 0,
            'bestseller_flag' => true,
            'free_cancellation_flag' => true,
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?pb=!1m34!1m12!1m3!1d421349.65446081554!2d-5.567719659632383!3d34.406577101672994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m19!3e0!4m5!1s0xd9f8b484d445777%3A0x10e6aaaeedd802ef!2sFes!3m2!1d34.0181246!2d-5.0078451!4m5!1s0xd0af214a9a5c247%3A0x78e0bca6569eeaf0!2sOuazzane!3m2!1d34.7953732!2d-5.567558!4m5!1s0xd9f8b484d445777%3A0x10e6aaaeedd802ef!2sFes!3m2!1d34.0181246!2d-5.0078451!5e0!3m2!1sen!2sma!4v1556287812852!5m2!1sen!2sma" width="655" height="548" frameborder="0" style="border:0" allowfullscreen></iframe>',
            'overview' => 'Experience the magical Blue City of Chefchaouen on a full-day private tour from Fes. Wander through the charming blue-washed medina, explore local artisan shops, and enjoy a scenic drive through the Rif Mountains with a professional guide.',
            'highlights' => json_encode([
                'Full-day tour to the Blue City of Chefchaouen',
                'Explore the narrow blue alleys and whitewashed buildings',
                'Visit Place Uta El Hammam and local souks',
                'Opportunity to buy local handicrafts and goat cheese',
                'Optional hike in the Rif Mountains',
                'Private air-conditioned transport from Fes'
            ]),
            'included' => json_encode([
                'Hotel pickup and drop-off in Fes',
                'Comfortable private transport in A/C vehicle',
                'Guided tour with local expert',
                'Flexible itinerary for families or groups'
            ]),
            'excluded' => json_encode([
                'Lunch and drinks',
                'Entrance fees',
                'Tips and personal expenses'
            ]),
            'languages' => json_encode(['English', 'Spanish', 'French']),
            'category_id' => $categoryId,
            'location_id' => $locationId,
        ]);

        $chefchaouenTrip->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Day Trip to Chefchaouen from Fes',
                'content' => json_encode([
                    'Pickup from your hotel or riad in Fes.',
                    'Drive through the scenic Rif Mountains passing through Ouazzane.',
                    'Arrival in Chefchaouen – the famous Blue City.',
                    'Wander through the medina, visit Uta El Hammam square, and explore local markets.',
                    'Free time for lunch and exploring artisan shops.',
                    'Optional walk to a panoramic viewpoint or light hiking in the Rif hills.',
                    'Return drive to Fes in the afternoon and drop-off at your accommodation.'
                ]),
            ],
        ]);
        $categoryId = TourCategory::firstOrCreate(
            ['slug' => 'day-trips-from-fes'],
            ['name' => 'Day Trips from Fes']
        )->id;

        $locationId = Location::where('slug', 'fes')->value('id');

        $meknesVolubilisTrip = Tour::create([
            'title' => 'Meknes and Volubilis Day Trip from Fes: Full-Day UNESCO Excursion',
            'slug' => Str::slug('Meknes and Volubilis Day Trip from Fes: Full-Day UNESCO Excursion'),
            'type' => 'day_trip',
            'duration' => '1 Day',
            'group_size' => 'Flexible',
            'age_range' => 'All ages',
            'base_price' => 0,
            'bestseller_flag' => true,
            'free_cancellation_flag' => true,
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?pb=!1m40!1m12!1m3!1d211698.03511148258!2d-5.432838994603868!3d33.99813801318891!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m25!3e0!4m5!1s0xd9f8b484d445777%3A0x10e6aaaeedd802ef!2sFes!3m2!1d34.0181246!2d-5.0078451!4m5!1s0xda044d23bfc49d1%3A0xfbbf80a99e4cde18!2sMeknes!3m2!1d33.8730164!2d-5.5407299!4m5!1s0xda0687d6a592af5%3A0x89bf317b312f3e62!2sVolubilis%2C+Meknes!3m2!1d34.072947899999996!2d-5.5549259!4m5!1s0xd9f8b484d445777%3A0x10e6aaaeedd802ef!2sFes!3m2!1d34.0181246!2d-5.0078451!5e0!3m2!1sen!2sma!4v1556285791843!5m2!1sen!2sma" width="655" height="548" frameborder="0" style="border:0" allowfullscreen></iframe>',
            'overview' => 'Enjoy a private full-day excursion from Fes to the historical sites of Meknes and Volubilis. Explore the Imperial city of Meknes, then discover the Roman ruins of Volubilis and the sacred town of Moulay Idriss.',
            'highlights' => json_encode([
                'Explore the Imperial city of Meknes with a local guide',
                'Discover UNESCO World Heritage Sites in the region',
                'Visit the ancient Roman ruins of Volubilis',
                'Stop in the sacred town of Moulay Idriss Zerhoun',
                'Comfortable transport with hotel pick-up and drop-off',
                'Family-friendly and flexible itinerary'
            ]),
            'included' => json_encode([
                'Hotel pickup and drop-off in Fes',
                'Private air-conditioned vehicle with driver',
                'Guided city tour in Meknes and Volubilis',
                'Free time for exploration and shopping',
            ]),
            'excluded' => json_encode([
                'Lunch and drinks',
                'Museum or site entrance fees',
                'Tips and personal expenses',
            ]),
            'languages' => json_encode(['English', 'Spanish', 'French']),
            'category_id' => $categoryId,
            'location_id' => $locationId,
        ]);

        $meknesVolubilisTrip->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Day Trip to Meknes, Volubilis & Moulay Idriss from Fes',
                'content' => json_encode([
                    'Pick-up from your hotel or riad in Fes.',
                    'Drive to Meknes and begin guided visit of the medina, royal stables, Bab Mansour, and other landmarks.',
                    'Continue to Volubilis – a UNESCO-listed site with Roman ruins, temples, mosaics, and the triumphal arch.',
                    'Optional stop in the holy town of Moulay Idriss Zerhoun.',
                    'Lunch break at a local restaurant or free time to explore.',
                    'Return to Fes in the late afternoon and drop-off at your accommodation.'
                ]),
            ],
        ]);
        $categoryId = TourCategory::firstOrCreate(
            ['slug' => 'day-trips-from-fes'],
            ['name' => 'Day Trips from Fes']
        )->id;

        $locationId = Location::where('slug', 'fes')->value('id');

        $rabatTrip = Tour::create([
            'title' => 'Full-Day Rabat Excursion from Fes: Discover Morocco’s Capital',
            'slug' => Str::slug('Full-Day Rabat Excursion from Fes: Discover Morocco’s Capital'),
            'type' => 'day_trip',
            'duration' => '1 Day',
            'group_size' => 'Flexible',
            'age_range' => 'All ages',
            'base_price' => 0,
            'bestseller_flag' => false,
            'free_cancellation_flag' => true,
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?pb=!1m34!1m12!1m3!1d847712.5326241003!2d-6.489905559571711!3d33.90569337980672!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m19!3e0!4m5!1s0xd9f8b484d445777%3A0x10e6aaaeedd802ef!2sFes!3m2!1d34.0181246!2d-5.0078451!4m5!1s0xda044d23bfc49d1%3A0xfbbf80a99e4cde18!2sMeknes!3m2!1d33.8730164!2d-5.5407299!4m5!1s0xda76b871f50c5c1%3A0x7ac946ed7408076b!2sRabat!3m2!1d33.9715904!2d-6.8498129!5e0!3m2!1sen!2sma!4v1556287844075!5m2!1sen!2sma" width="655" height="548" frameborder="0" style="border:0" allowfullscreen></iframe>',
            'overview' => 'Embark on a full-day private trip from Fes to Rabat, Morocco’s capital city. Discover its most famous attractions including Hassan Tower, the Kasbah of the Udayas, and the historic Chellah ruins, with comfortable transfers and expert local guidance.',
            'highlights' => json_encode([
                'Guided visit to Rabat’s medina and UNESCO-listed Oudaya Kasbah',
                'Explore the Mausoleum of Mohammed V and Hassan Tower',
                'Walk through the peaceful Oudaya Gardens',
                'Visit Chellah ruins and the ramparts of Mechouar',
                'Private transport with hotel pick-up in Fes',
                'Family-friendly cultural excursion'
            ]),
            'included' => json_encode([
                'Hotel pickup and drop-off in Fes',
                'Private air-conditioned vehicle with driver',
                'Professional guide in Rabat',
                'Free time for exploration and shopping',
            ]),
            'excluded' => json_encode([
                'Lunch and drinks',
                'Entrance fees to monuments',
                'Tips and personal expenses',
            ]),
            'languages' => json_encode(['English', 'Spanish', 'French']),
            'category_id' => $categoryId,
            'location_id' => $locationId,
        ]);

        $rabatTrip->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Full-Day Trip from Fes to Rabat via Meknes',
                'content' => json_encode([
                    'Pick-up from your hotel or riad in Fes.',
                    'Drive to Meknes for a brief visit to the main square and medina.',
                    'Continue to Rabat where your local guide awaits.',
                    'Explore Hassan Tower and the Mausoleum of Mohammed V.',
                    'Visit the historic Oudaya Kasbah and stroll the gardens.',
                    'Discover Chellah’s Roman and Islamic ruins.',
                    'Enjoy lunch and some free time in the medina.',
                    'Drive back to Fes in the afternoon and drop off at your hotel.',
                ]),
            ],
        ]);
        $categoryId = TourCategory::firstOrCreate(
            ['slug' => 'day-trips-from-fes'],
            ['name' => 'Day Trips from Fes']
        )->id;

        $locationId = Location::where('slug', 'fes')->value('id');

        $fesMedinaTour = Tour::create([
            'title' => 'Fes Medina Excursion: Full-Day Sightseeing Tour with Guide',
            'slug' => Str::slug('Fes Medina Excursion: Full-Day Sightseeing Tour with Guide'),
            'type' => 'day_trip',
            'duration' => '1 Day',
            'group_size' => 'Flexible',
            'age_range' => 'All ages',
            'base_price' => 0,
            'bestseller_flag' => false,
            'free_cancellation_flag' => true,
            'map_frame' => null,
            'overview' => 'Discover the cultural and spiritual heart of Morocco on this full-day guided tour of Fes. Explore the UNESCO-listed medina, artisan quarters, and historical monuments with a local expert.',
            'highlights' => json_encode([
                'Explore Fes’s ancient medina with a professional guide',
                'Visit the Karaouine Mosque and Medersa el-Attarine',
                'See the famous Chouara tanneries and Nejjarine Museum',
                'Stroll through souks and artisan shops',
                'Discover the ceramic quarter and new city highlights',
                'Hotel pick-up and drop-off with private driver',
            ]),
            'included' => json_encode([
                'Hotel or riad pickup and drop-off in Fes',
                'Guided tour of the medina and surrounding sites',
                'Private vehicle with A/C and experienced driver',
                'Flexible schedule for families and private groups',
            ]),
            'excluded' => json_encode([
                'Lunch and drinks',
                'Entrance fees to monuments',
                'Tips and personal expenses',
            ]),
            'languages' => json_encode(['English', 'Spanish', 'French']),
            'category_id' => $categoryId,
            'location_id' => $locationId,
        ]);

        $fesMedinaTour->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Full-Day Guided Tour of Fes Medina',
                'content' => json_encode([
                    'Hotel pickup from your riad in Fes.',
                    'Start the guided walking tour with a certified local guide.',
                    'Visit Bab Boujloud gate and enter the UNESCO-listed medina.',
                    'Explore the Medersa el-Attarine, Nejjarine Museum, and the Karaouine Mosque.',
                    'Observe traditional craftsmanship at the famous tanneries.',
                    'Break for lunch in a local restaurant inside the medina.',
                    'Continue to the ceramics quarter and artisan souks.',
                    'Drive through the Ville Nouvelle (new town) and royal palace exterior.',
                    'Return to your riad in the late afternoon.',
                ]),
            ],
        ]);
        $categoryId = TourCategory::firstOrCreate(
            ['slug' => 'day-trips-from-casablanca'],
            ['name' => 'Day Trips from Casablanca']
        )->id;

        $locationId = Location::where('slug', 'casablanca')->value('id');

        $casablancaToFesTour = Tour::create([
            'title' => 'Fes Medina Full-Day Sightseeing Tour from Casablanca',
            'slug' => Str::slug('Fes Medina Full-Day Sightseeing Tour from Casablanca'),
            'type' => 'day_trip',
            'duration' => '1 Day',
            'group_size' => 'Flexible',
            'age_range' => 'All ages',
            'base_price' => 0,
            'bestseller_flag' => false,
            'free_cancellation_flag' => true,
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?pb=!1m34!1m12!1m3!1d848767.4284972305!2d-6.85952312616874!3d33.799465425905005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m19!3e0!4m5!1s0xda7cd4778aa113b%3A0xb06c1d84f310fd3!2sCasablanca!3m2!1d33.5731104!2d-7.5898433999999995!4m5!1s0xda76b871f50c5c1%3A0x7ac946ed7408076b!2sRabat!3m2!1d33.9715904!2d-6.8498129!4m5!1s0xd9f8b484d445777%3A0x10e6aaaeedd802ef!2sFes!3m2!1d34.0181246!2d-5.0078451!5e0!3m2!1sen!2sma!4v1556303580157!5m2!1sen!2sma" width="655" height="548" frameborder="0" style="border:0" allowfullscreen></iframe>',
            'overview' => 'Embark on a full-day private excursion from Casablanca to Fes to explore the UNESCO-listed medina, spiritual sites, artisan quarters, and historical monuments with a local guide.',
            'highlights' => json_encode([
                'Visit the imperial city of Fes in a private day trip from Casablanca',
                'Explore the UNESCO-listed medina with a certified local guide',
                'Discover the Attarine and Nejjarine Fountain',
                'See Moulay Idriss Mausoleum and the Karaouine Mosque',
                'Visit traditional tanneries and artisan quarters',
                'Hotel pickup and drop-off included from Casablanca',
            ]),
            'included' => json_encode([
                'Hotel pickup and drop-off in Casablanca',
                'Private A/C vehicle with experienced driver',
                'Certified guide in Fes Medina',
                'Family-friendly day excursion with flexible itinerary',
            ]),
            'excluded' => json_encode([
                'Lunch and soft drinks',
                'Entrance fees to monuments',
                'Tips and personal expenses',
            ]),
            'languages' => json_encode(['English', 'Spanish', 'French']),
            'category_id' => $categoryId,
            'location_id' => $locationId,
        ]);

        $casablancaToFesTour->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Full-Day Sightseeing Tour of Fes Medina',
                'content' => json_encode([
                    'Hotel pickup from your riad or hotel in Casablanca at 8:00 a.m.',
                    'Drive to Fes, the cultural and spiritual capital of Morocco.',
                    'Meet your local guide in Fes and begin the medina walking tour.',
                    'Visit the Nejjarine Fountain and the Moulay Idriss Mausoleum.',
                    'Explore the Attarine Medersa and the Karaouine Mosque.',
                    'Observe the famous tanneries and browse the artisan souks.',
                    'Enjoy free time for lunch and shopping.',
                    'Return to Casablanca in the evening.',
                ]),
            ],
        ]);
        $categoryId = TourCategory::firstOrCreate(
            ['slug' => 'day-trips-from-casablanca'],
            ['name' => 'Day Trips from Casablanca']
        )->id;

        $locationId = Location::where('slug', 'casablanca')->value('id');

        $casablancaToMarrakechTour = Tour::create([
            'title' => 'Marrakech Medina Full-Day Sightseeing Tour from Casablanca',
            'slug' => Str::slug('Marrakech Medina Full-Day Sightseeing Tour from Casablanca'),
            'type' => 'day_trip',
            'duration' => '1 Day',
            'group_size' => 'Flexible',
            'age_range' => 'All ages',
            'base_price' => 0,
            'bestseller_flag' => false,
            'free_cancellation_flag' => true,
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d860446.3210193302!2d-8.190988618698913!3d32.603026887666594!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e0!4m5!1s0xda7cd4778aa113b%3A0xb06c1d84f310fd3!2sCasablanca!3m2!1d33.5731104!2d-7.5898433999999995!4m5!1s0xdafee8d96179e51%3A0x5950b6534f87adb8!2sMarrakesh!3m2!1d31.6294723!2d-7.9810845!5e0!3m2!1sen!2sma!4v1556303617107!5m2!1sen!2sma" width="655" height="548" frameborder="0" style="border:0" allowfullscreen></iframe>',
            'overview' => 'Enjoy a full-day private trip from Casablanca to Marrakech. Explore the medina, UNESCO sites, historical palaces, vibrant souks, and gardens in the company of a local guide.',
            'highlights' => json_encode([
                'Private day trip from Casablanca to Marrakech',
                'Guided walking tour through the UNESCO-listed Medina',
                'Visit the Bahia Palace and admire its intricate architecture',
                'Stroll through the souks and explore the spice markets',
                'See the Koutoubia Mosque and Jamaa El Fna Square',
                'Relax in the Menara and Majorelle Gardens',
                'Drive through the modern Gueliz district',
            ]),
            'included' => json_encode([
                'Hotel pickup and drop-off from Casablanca',
                'Private A/C vehicle with professional driver',
                'Certified guide in Marrakech',
                'Family-friendly itinerary and flexible pacing',
            ]),
            'excluded' => json_encode([
                'Lunch and drinks',
                'Entrance fees to monuments',
                'Tips and personal expenses',
            ]),
            'languages' => json_encode(['English', 'Spanish', 'French']),
            'category_id' => $categoryId,
            'location_id' => $locationId,
        ]);

        $casablancaToMarrakechTour->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Full-Day Guided Tour of Marrakech from Casablanca',
                'content' => json_encode([
                    'Pick-up from your hotel or riad in Casablanca at 8:00 a.m.',
                    'Drive via highway to the red city of Marrakech.',
                    'Meet your local guide upon arrival.',
                    'Visit Bahia Palace and walk through the historic medina.',
                    'Admire the exterior of Koutoubia Mosque.',
                    'Explore the vibrant Jamaa El Fna Square.',
                    'Stroll through the spice souks and artisan shops.',
                    'Visit Majorelle and Menara Gardens.',
                    'Drive through the modern district of Gueliz.',
                    'Return transfer to Casablanca in the evening.',
                ]),
            ],
        ]);
        $categoryId = TourCategory::firstOrCreate(
            ['slug' => 'day-trips-from-casablanca'],
            ['name' => 'Day Trips from Casablanca']
        )->id;

        $locationId = Location::where('slug', 'casablanca')->value('id');

        $rabatDayTrip = Tour::create([
            'title' => 'Rabat Full-Day Excursion from Casablanca',
            'slug' => Str::slug('Rabat Full-Day Excursion from Casablanca'),
            'type' => 'day_trip',
            'duration' => '1 Day',
            'group_size' => 'Flexible',
            'age_range' => 'All ages',
            'base_price' => 0,
            'bestseller_flag' => false,
            'free_cancellation_flag' => true,
            'map_frame' => '<iframe src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d212265.82237784902!2d-7.359170262369172!3d33.769619385074186!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e0!4m5!1s0xda7cd4778aa113b%3A0xb06c1d84f310fd3!2sCasablanca!3m2!1d33.5731104!2d-7.5898433999999995!4m5!1s0xda76b871f50c5c1%3A0x7ac946ed7408076b!2sRabat!3m2!1d33.9715904!2d-6.8498129!5e0!3m2!1sen!2sma!4v1556303645219!5m2!1sen!2sma" width="655" height="548" frameborder="0" style="border:0" allowfullscreen></iframe>',
            'overview' => 'Enjoy a private day trip from Casablanca to Rabat, Morocco’s capital. Discover the Kasbah of the Udayas, Hassan Tower, the Mausoleum of Mohammed V, and the old medina with a local guide.',
            'highlights' => json_encode([
                'Private day excursion from Casablanca to Rabat',
                'Visit the historic Kasbah of the Udayas (UNESCO site)',
                'Admire Hassan Tower and Mausoleum of Mohammed V',
                'Explore the Old Medina of Rabat and its hidden gems',
                'Hotel pickup and drop-off in Casablanca included',
                'Comfortable private transport with local driver',
                'Professional guide for a cultural immersion',
            ]),
            'included' => json_encode([
                'Hotel pickup and drop-off from Casablanca',
                'Private A/C vehicle with experienced driver',
                'Local city guide in Rabat',
                'Family-friendly day excursion',
            ]),
            'excluded' => json_encode([
                'Lunch and drinks',
                'Entrance fees',
                'Tips and personal expenses',
            ]),
            'languages' => json_encode(['English', 'Spanish', 'French']),
            'category_id' => $categoryId,
            'location_id' => $locationId,
        ]);

        $rabatDayTrip->itineraries()->createMany([
            [
                'day_number' => 1,
                'title' => 'Full-Day Guided Tour of Rabat from Casablanca',
                'content' => json_encode([
                    'Pick-up from your hotel or riad in Casablanca at 8:00 a.m.',
                    'Drive to Rabat, the capital of Morocco.',
                    'Visit the Kasbah of the Udayas overlooking the ocean.',
                    'Admire the Hassan Tower and explore the nearby Mausoleum of Mohammed V.',
                    'Stroll through the Old Medina and its palaces, mosques, and vibrant souks.',
                    'Free time for lunch and relaxation in the medina.',
                    'Drive back to Casablanca in the late afternoon.',
                ]),
            ],
        ]);
        // Day trips END
    }
}
