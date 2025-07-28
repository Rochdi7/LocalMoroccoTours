<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class ActivityCoverImageSeeder extends Seeder
{
    public function run()
    {
        // Use project public path for activities directory
        $basePath = public_path('assets/images/localmoroccotour_images/');
        // Fallback for external directory
        $externalBasePath = 'C:/Users/Outlaw/Desktop/localmoroccotour_images/';

        $activities = [
            ['id' => 1, 'image' => 'activities/marrakech/Agafay Luxury Camp Experience/bcb03fa4d90b7ca9805adffcbe6f86e4.webp'],
            ['id' => 2, 'image' => 'activities/marrakech/Agafay Luxury Camp Experience/inara-camp-cochlea-174.webp'],
            ['id' => 3, 'image' => 'activities/marrakech/Camel ride in Marrakech palmeries/MARRAKECH-HALF-DAY-CAMEL-RIDE-IN-PALM-GROVE.webp'],
            ['id' => 4, 'image' => 'activities/marrakech/Marrakech Chez Ali Fantasia Show/marrakech-moroccan-dinner-and-fantasia-show-at-chez-ali_07pMp.webp'],
            ['id' => 5, 'image' => 'activities/marrakech/Hot Air Balloon over Marrakech/ballooningmarrakech.webp'],
            ['id' => 6, 'image' => 'activities/marrakech/Marrakech Cooking Class/c-fakepath-urban-adventures-morocco_marrakech_cooking_class_prep.webp'],
            ['id' => 7, 'image' => 'activities/marrakech/Marrakech\'s Gastronomic Food Tour/tour-gastronomico-marrakech-589x392.webp'],
            ['id' => 8, 'image' => 'activities/marrakech/Marrakech Hammam and Massage/Spa-Hammam-Massage-Marrakech-Riad-Al-Ksar-2.webp'],
            ['id' => 9, 'image' => 'activities/marrakech/Marrakech Jewish Heritage Tour/2c.webp'],
            ['id' => 10, 'image' => 'activities/marrakech/Marrakech Medina Half Day Tour/Marrakesh-Visiting-the-Old-Medina-and-its-surrounding-Souks.webp'],
            ['id' => 11, 'image' => 'activities/marrakech/Quad and buggy in Marrakech/ZOOM-D-450.webp'],
            ['id' => 12, 'image' => 'activities/marrakech/Visit Best Gardens in Marrakech/Majorelle-Gardens-Marrakech-Travel-Exploration-Morocco-1.webp'],
        ];

        foreach ($activities as $activityData) {
            Log::info("Processing activity ID: {$activityData['id']}");

            $activity = Activity::find($activityData['id']);
            if (!$activity) {
                Log::warning("Activity with ID {$activityData['id']} not found in the activities table.");
                continue;
            }

            // Check if the activity already has a cover image
            $existingMedia = $activity->getMedia('photos')->first();
            $imagePath = $basePath . $activityData['image'];

            // Try external path if file doesn't exist in project directory
            if (!file_exists($imagePath)) {
                $imagePath = $externalBasePath . $activityData['image'];
                Log::info("Trying external path for activity ID {$activityData['id']}: {$imagePath}");
            }

            // Log if image exists or not
            if (!file_exists($imagePath)) {
                Log::error("Image not found for activity ID {$activityData['id']}: {$imagePath}");
                continue;
            }

            // Only update if no media exists or if the existing media's file_name doesn't match
            if (!$existingMedia || $existingMedia->file_name !== basename($activityData['image'])) {
                Log::info("Updating cover image for activity ID {$activityData['id']} with image: {$activityData['image']}");

                // Clear existing cover image to enforce singleFile constraint
                $activity->clearMediaCollection('photos');

                try {
                    $media = $activity->addMedia($imagePath)->toMediaCollection('photos');
                    $media->setCustomProperty('alt', 'Cover image for activity ID ' . $activityData['id']);
                    $media->setCustomProperty('generated_conversions', ['thumb' => true, 'slider' => true]);
                    $media->save();
                    Log::info("Successfully added media for activity ID {$activityData['id']}");
                } catch (\Exception $e) {
                    Log::error("Failed to add media for activity ID {$activityData['id']}: {$e->getMessage()}");
                }
            } else {
                Log::info("Skipping activity ID {$activityData['id']} - existing media matches: {$existingMedia->file_name}");
            }
        }
    }
}
