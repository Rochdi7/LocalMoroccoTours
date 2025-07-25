<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use App\Models\TourCategory;
use App\Models\Location;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\ReviewRating;
use App\Models\RatingCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;

class FrontTourController extends Controller
{

    public function index(Request $request)
    {
        $minPrice = Tour::min('base_price') ?? 0;
        $maxPrice = Tour::max('base_price') ?? 0;

        $durations = [
            '0-3 hours',
            '3-5 hours',
            '5-7 hours',
            'Full day (7+ hours)',
            'Multi-day'
        ];

        $locationId = null;
        if ($request->filled('location_slug')) {
            $location = Location::where('slug', $request->location_slug)->first();
            if ($location) {
                $locationId = $location->id;
            }
        }

        $tourCategoryId = null;
        if ($request->filled('tour_category_slug')) {
            $category = TourCategory::where('slug', $request->tour_category_slug)->first();
            if ($category) {
                $tourCategoryId = $category->id;
            }
        }

        $selectedCategories = $request->input('categories', []);
        $selectedDurations = $request->input('duration', []);
        $selectedPriceRange = array_map('floatval', $request->input('price', [$minPrice, $maxPrice]));
        $selectedSpecials = $request->input('specials', []);
        $selectedRatings = $request->input('ratings', []);
        $selectedLocations = $request->input('locations', []);
        $sortBy = $request->input('sort_by', 'featured');

        $tours = Tour::with(['category', 'location'])
            ->when($request->filled('type'), fn($q) => $q->where('type', $request->type))
            ->when(!empty($selectedCategories), fn($q) => $q->whereIn('category_id', $selectedCategories))
            ->when($locationId, fn($q) => $q->where('location_id', $locationId))
            ->when($tourCategoryId, fn($q) => $q->where('category_id', $tourCategoryId))
            ->when($request->filled('group_size_min'), fn($q) => $q->where('group_size', '>=', $request->group_size_min))
            ->when($request->filled('group_size_max'), fn($q) => $q->where('group_size', '<=', $request->group_size_max))
            ->when(!empty($selectedDurations), fn($q) => $q->whereIn('duration', $selectedDurations))
            ->when(!empty($selectedSpecials), function ($q) use ($selectedSpecials) {
                if (in_array('free_cancellation', $selectedSpecials)) {
                    $q->where('free_cancellation_flag', 1);
                }
                if (in_array('bestseller', $selectedSpecials)) {
                    $q->where('bestseller_flag', 1);
                }
            })
            ->when(!empty($selectedLocations), fn($q) => $q->whereIn('location_id', $selectedLocations))
            ->when($request->has('price'), function ($q) use ($selectedPriceRange) {
                $q->whereBetween('base_price', $selectedPriceRange);
            });

        switch ($sortBy) {
            case 'price_low_high':
                $tours->orderBy('base_price', 'asc');
                break;
            case 'price_high_low':
                $tours->orderBy('base_price', 'desc');
                break;
            case 'booked_count':
                $tours->orderBy('booked_count', 'desc');
                break;
            case 'bestseller':
                $tours->orderBy('bestseller_flag', 'desc');
                break;
            case 'free_cancellation':
                $tours->orderBy('free_cancellation_flag', 'desc');
                break;
            default:
                $tours->orderBy('created_at', 'desc');
                break;
        }

        $tours = $tours->paginate(5);

        $tourIds = $tours->pluck('id');

        $avgRatings = \App\Models\Review::query()
            ->selectRaw('reviewable_id, AVG(rating) as avg_rating')
            ->where('reviewable_type', \App\Models\Tour::class)
            ->whereIn('reviewable_id', $tourIds)
            ->groupBy('reviewable_id')
            ->pluck('avg_rating', 'reviewable_id');

        $reviewCounts = \App\Models\Review::query()
            ->selectRaw('reviewable_id, COUNT(*) as count_reviews')
            ->where('reviewable_type', \App\Models\Tour::class)
            ->whereIn('reviewable_id', $tourIds)
            ->groupBy('reviewable_id')
            ->pluck('count_reviews', 'reviewable_id');

        foreach ($tours as $tour) {
            $tour->avg_rating = $avgRatings[$tour->id] ?? 0.0;
            $tour->reviews_count = $reviewCounts[$tour->id] ?? 0;
        }

        if (!empty($selectedRatings)) {
            $filtered = $tours->filter(fn($tour) => in_array(round($tour->avg_rating), $selectedRatings))->values();

            $tours = new \Illuminate\Pagination\LengthAwarePaginator(
                $filtered,
                $filtered->count(),
                $tours->perPage(),
                $tours->currentPage(),
                ['path' => request()->url(), 'query' => request()->query()]
            );
        }

        $tourCategories = TourCategory::all();
        $locations = Location::all();

        return view('front.tours.tour-list', compact(
            'tours',
            'tourCategories',
            'locations',
            'durations',
            'minPrice',
            'maxPrice'
        ));
    }


    public function show($slug)
    {
        $tour = Tour::with(['location', 'category', 'media'])
            ->withCount('reviews')
            ->where('slug', $slug)
            ->firstOrFail();
        $gallery = $tour->getMedia('gallery');


        // Calculate average rating for this tour
        $avgRating = Review::where('reviewable_type', Tour::class)
            ->where('reviewable_id', $tour->id)
            ->avg('rating');

        $avgRating = $avgRating ? round($avgRating, 1) : 0.0;

        // Store it on the model for convenience in views
        $tour->avg_rating = $avgRating;

        $similarTours = Tour::with(['location', 'category'])
            ->where('location_id', $tour->location_id)
            ->where('id', '<>', $tour->id)
            ->take(8)
            ->get();

        $similarTourIds = $similarTours->pluck('id');

        $avgRatings = \App\Models\Review::query()
            ->selectRaw('reviewable_id, AVG(rating) as avg_rating')
            ->where('reviewable_type', \App\Models\Tour::class)
            ->whereIn('reviewable_id', $similarTourIds)
            ->groupBy('reviewable_id')
            ->pluck('avg_rating', 'reviewable_id');

        foreach ($similarTours as $tour) {
            $tour->avg_rating = $avgRatings[$tour->id] ?? 0.0;
        }


        $similarToursCount = $similarTours->count();

        $categories = RatingCategory::all();

        $overallRatings = $categories->map(function ($category) use ($tour) {
            $scores = ReviewRating::whereHas('review', function ($q) use ($tour) {
                $q->where('reviewable_type', Tour::class)
                    ->where('reviewable_id', $tour->id);
            })
                ->where('rating_category_id', $category->id)
                ->pluck('score');

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

        $reviews = $tour->reviews()->latest()->get()->map(function ($review) {
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

        return view('front.tours.tours-details', compact(
            'tour',
            'gallery',
            'similarTours',
            'similarToursCount',
            'overallRatings',
            'reviews'
        ));
    }


    /**
     * Returns text label for a numeric score.
     */
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
        $tour = Tour::where('slug', $slug)->firstOrFail();

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
            'tour_content' => 'required|string',
        ]);

        // Save reservation logic (to be implemented)

        return back()->with('success', [
            'message' => 'Your reservation was submitted!',
            'context' => 'reservation',
        ]);
    }

    public function leaveReview(Request $request, $slug)
    {
        $tour = Tour::where('slug', $slug)->firstOrFail();

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

        DB::transaction(function () use ($validated, $request, $tour) {
            $review = new Review([
                'reviewable_type' => Tour::class,
                'reviewable_id' => $tour->id,
                'name' => $validated['name'],
                'email' => $validated['email'],
                'title' => $validated['title'],
                'comment' => $validated['comment'],
            ]);

            // Handle uploaded images
            if ($request->hasFile('images')) {
                $imagePaths = [];
                foreach ($request->file('images') as $image) {
                    $path = $image->store('reviews', 'public');
                    $imagePaths[] = $path;
                }
                $review->images = $imagePaths;
            }

            // Calculate average rating
            $review->rating = collect($validated['ratings'])->avg();

            $review->save();

            // Save ratings per category
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
            ->route('front.tours.show', $tour->slug)
            ->with('success', [
                'message' => 'Your review has been submitted!',
                'context' => 'review',
            ]);
    }
}
