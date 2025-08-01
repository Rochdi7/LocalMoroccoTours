<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ActivityCategory;
use App\Models\Location;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\ReviewRating;
use App\Models\RatingCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\JsonLd;
use Illuminate\Support\Str;

class FrontActivityController extends Controller
{

    public function index(Request $request)
    {
        // ✅ SEO meta for activity listing page
        $title = 'Best Things to Do in Morocco | Activities & Experiences';
        $description = 'Discover the top activities in Morocco including camel rides, hot air balloon experiences, cultural classes, and desert adventures. Book unforgettable moments today!';
        $url = url()->current();
        $image = asset('img/default-activity-cover.jpg'); // Replace with your site logo or generic activity banner

        SEOMeta::setTitle($title);
        SEOMeta::setDescription($description);
        SEOMeta::addKeyword([
            'Morocco activities',
            'camel ride Marrakech',
            'hot air balloon Morocco',
            'cultural activities',
            'things to do in Morocco',
            'Agafay desert',
            'Marrakech experiences',
            'Moroccan food tours',
            'excursions from Fes',
            'local activities Morocco'
        ]);

        OpenGraph::setTitle($title);
        OpenGraph::setDescription($description);
        OpenGraph::setUrl($url);
        OpenGraph::addImage($image);
        OpenGraph::setType('website');

        JsonLd::setTitle($title);
        JsonLd::setDescription($description);
        JsonLd::setUrl($url);
        JsonLd::setType('ItemList');
        JsonLd::addImage($image);

        $minPrice = Activity::min('base_price') ?? 0;
        $maxPrice = Activity::max('base_price') ?? 0;

        // Fetch distinct durations from DB to build the filter dropdown
        $durations = Activity::query()
            ->selectRaw('DISTINCT duration')
            ->whereNotNull('duration')
            ->orderByRaw(
                "CAST(REPLACE(REPLACE(duration, ' Hours', ''), ' Hour', '') AS DECIMAL(4,1)) ASC"
            )
            ->pluck('duration')
            ->toArray();

        $selectedCategories = $request->input('categories', []);
        $selectedDurations = $request->input('duration', []);
        $selectedPriceRange = array_map('floatval', $request->input('price', [$minPrice, $maxPrice]));
        $selectedSpecials = $request->input('specials', []);
        $selectedRatings = $request->input('ratings', []);
        $selectedLocations = $request->input('locations', []);
        $sortBy = $request->input('sort_by', 'featured');

        $activities = Activity::with(['category', 'location', 'media'])
            ->when(!empty($selectedCategories), function ($query) use ($selectedCategories) {
                $query->whereIn('category_id', $selectedCategories);
            })
            ->when(!empty($selectedDurations), function ($query) use ($selectedDurations) {
                $durationsNumeric = collect($selectedDurations)
                    ->map(function ($duration) {
                        return floatval(str_replace([' Hours', ' Hour'], '', $duration));
                    })
                    ->toArray();

                $placeholders = implode(',', array_fill(0, count($durationsNumeric), '?'));
                $query->whereRaw(
                    "CAST(REPLACE(REPLACE(duration, ' Hours', ''), ' Hour', '') AS DECIMAL(4,1)) IN ($placeholders)",
                    $durationsNumeric
                );
            })
            ->when(!empty($selectedSpecials), function ($query) use ($selectedSpecials) {
                if (in_array('free_cancellation', $selectedSpecials)) {
                    $query->where('free_cancellation_flag', 1);
                }
                if (in_array('bestseller', $selectedSpecials)) {
                    $query->where('bestseller_flag', 1);
                }
            })
            ->when(!empty($selectedLocations), function ($query) use ($selectedLocations) {
                $query->whereIn('location_id', $selectedLocations);
            })
            ->when($request->has('price'), function ($query) use ($selectedPriceRange) {
                $query->whereBetween('base_price', $selectedPriceRange);
            });

        switch ($sortBy) {
            case 'price_low_high':
                $activities->orderBy('base_price', 'asc');
                break;
            case 'price_high_low':
                $activities->orderBy('base_price', 'desc');
                break;
            case 'booked_count':
                $activities->orderBy('booked_count', 'desc');
                break;
            case 'bestseller':
                $activities->orderBy('bestseller_flag', 'desc');
                break;
            case 'free_cancellation':
                $activities->orderBy('free_cancellation_flag', 'desc');
                break;
            default:
                $activities->orderBy('created_at', 'desc');
                break;
        }

        $activities = $activities->paginate(5);
        $activityIds = $activities->pluck('id');

        $activityRatings = \App\Models\ReviewRating::query()
            ->selectRaw('reviews.reviewable_id, AVG(review_ratings.score) as avg_rating')
            ->join('reviews', 'reviews.id', '=', 'review_ratings.review_id')
            ->where('reviews.reviewable_type', \App\Models\Activity::class)
            ->whereIn('reviews.reviewable_id', $activityIds)
            ->groupBy('reviews.reviewable_id')
            ->pluck('avg_rating', 'reviews.reviewable_id');

        if (!empty($selectedRatings)) {
            $filtered = $activities->filter(function ($singleActivity) use ($selectedRatings) {
                return in_array(round($singleActivity->avg_rating), $selectedRatings);
            })->values();

            $activities = new LengthAwarePaginator(
                $filtered,
                $filtered->count(),
                $activities->perPage(),
                $activities->currentPage(),
                ['path' => request()->url(), 'query' => request()->query()]
            );
        }


        if (!empty($selectedRatings)) {
            $filtered = $activities->filter(function ($activity) use ($selectedRatings) {
                return in_array(round($activity->avg_rating), $selectedRatings);
            })->values();

            $activities = new \Illuminate\Pagination\LengthAwarePaginator(
                $filtered,
                $filtered->count(),
                $activities->perPage(),
                $activities->currentPage(),
                ['path' => request()->url(), 'query' => request()->query()]
            );
        }

        $activityCategories = \App\Models\ActivityCategory::all();
        $locations = \App\Models\Location::all();

        return view('front.activities.activity-list', compact(
            'activities',
            'activityCategories',
            'locations',
            'durations',
            'minPrice',
            'maxPrice'
        ));
    }


    public function show($slug)
    {
        $activity = Activity::with(['location', 'category', 'media', 'itineraries'])
            ->where('slug', $slug)
            ->firstOrFail();

        // ✅ SEO meta tags
        $title = $activity->title;
        $description = Str::limit(strip_tags($activity->overview ?? $activity->description ?? ''), 160);
        $image = $activity->getFirstMediaUrl('cover') ?: asset('img/default-cover.jpg');
        $url = route('front.activities.show', $activity->slug);
        $keywords = array_filter([$title, $activity->category->name ?? '', $activity->location->name ?? '']);

        SEOMeta::setTitle($title);
        SEOMeta::setDescription($description);
        SEOMeta::addKeyword($keywords);

        OpenGraph::setTitle($title);
        OpenGraph::setDescription($description);
        OpenGraph::setUrl($url);
        OpenGraph::addImage($image);

        JsonLd::setTitle($title);
        JsonLd::setDescription($description);
        JsonLd::addImage($image);
        JsonLd::setType('TouristTrip');
        JsonLd::setUrl($url);
        JsonLd::addValue('@id', $url);


        // 📌 Similar activities
        $similarActivities = Activity::with(['location', 'category', 'media'])
            ->where('location_id', $activity->location_id)
            ->where('id', '<>', $activity->id)
            ->take(8)
            ->get();

        $similarActivitiesCount = $similarActivities->count();

        // 📊 Average rating
        $activity->avg_rating = round($activity->reviews()->avg('rating'), 1) ?? 0;

        // 🏷️ Category-based ratings
        $categories = RatingCategory::all();

        $overallRatings = $categories->map(function ($category) use ($activity) {
            $scores = ReviewRating::whereHas('review', function ($q) use ($activity) {
                $q->where('reviewable_type', Activity::class)
                    ->where('reviewable_id', $activity->id);
            })->where('rating_category_id', $category->id)->pluck('score');

            $avgScore = $scores->count() > 0
                ? round($scores->avg(), 1)
                : 0.0;

            return [
                'label' => $category->label,
                'icon' => $category->icon ?? 'icon-star',
                'score' => $avgScore,
                'text' => $this->getRatingText($avgScore),
            ];
        });

        // 📝 Reviews
        $reviews = $activity->reviews()->latest()->get()->map(function ($review) {
            return (object)[
                'id' => $review->id,
                'name' => $review->name,
                'email' => $review->email,
                'title' => $review->title,
                'comment' => $review->comment,
                'images' => collect($review->images)->map(
                    fn($path) => asset('storage/' . $path)
                )->toArray(),
                'date' => $review->created_at->format('F Y'),
                'avatar' => asset('img/reviews/avatars/1.png'),
                'rating' => $review->rating,
                'helpful_count' => $review->helpful_count ?? 0,
                'not_helpful_count' => $review->not_helpful_count ?? 0,
            ];
        });

        return view('front.activities.activities-details', compact(
            'activity',
            'similarActivities',
            'similarActivitiesCount',
            'overallRatings',
            'reviews'
        ));
    }


    private function getRatingText($score)
    {
        if ($score >= 4.5) {
            return 'Excellent';
        } elseif ($score >= 4.0) {
            return 'Very Good';
        } elseif ($score >= 3.0) {
            return 'Good';
        } elseif ($score > 0) {
            return 'Average';
        }
        return '';
    }

    public function reserve(Request $request, $slug)
    {
        $activity = Activity::where('slug', $slug)->firstOrFail();

        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'address1' => 'required|string|max:255',
            'address2' => 'nullable|string|max:255',
            'state' => 'required|string|max:255',
            'zip' => 'required|string|max:20',
            'activity_content' => 'required|string',
        ]);

        // Save reservation logic

        return back()->with('success', [
            'message' => 'Your reservation was submitted!',
            'context' => 'reservation',
        ]);
    }

    public function leaveReview(Request $request, $slug)
    {
        $activity = Activity::where('slug', $slug)->firstOrFail();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'title' => 'required|string|max:255',
            'comment' => 'required|string',
            'categories' => 'required|array',
            'categories.*' => 'string',
            'ratings' => 'required|array',
            'ratings.*' => 'numeric|min:1|max:5',
            'images.*' => 'nullable|image|max:2048',
        ]);

        DB::transaction(function () use ($validated, $request, $activity) {
            $review = new Review([
                'reviewable_type' => Activity::class,
                'reviewable_id' => $activity->id,
                'name' => $validated['name'],
                'email' => $validated['email'],
                'title' => $validated['title'],
                'comment' => $validated['comment'],
                'rating' => collect($validated['ratings'])->avg(),
            ]);

            if ($request->hasFile('images')) {
                $imagePaths = [];
                foreach ($request->file('images') as $image) {
                    if ($image && $image->isValid()) {
                        $path = $image->store('reviews', 'public');
                        $imagePaths[] = $path;
                    }
                }
                $review->images = $imagePaths;
            }

            $review->save();

            foreach ($validated['categories'] as $categoryLabel) {
                $category = RatingCategory::where('label', $categoryLabel)->first();

                if ($category && isset($validated['ratings'][$categoryLabel])) {
                    ReviewRating::create([
                        'review_id' => $review->id,
                        'rating_category_id' => $category->id,
                        'score' => $validated['ratings'][$categoryLabel],
                    ]);
                }
            }
        });

        return redirect()
            ->route('front.activities.show', $activity->slug)
            ->with('success', [
                'message' => 'Your review has been submitted!',
                'context' => 'review',
            ]);
    }
}
