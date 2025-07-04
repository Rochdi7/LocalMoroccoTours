<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use App\Models\TourCategory;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TourController extends Controller
{
    public function index()
    {
        $tours = Tour::with(['category', 'location'])->paginate(10);
        return view('admin.tours.index', compact('tours'));
    }

    public function create()
    {
        $categories = TourCategory::all();
        $locations = Location::all();
        return view('admin.tours.create', compact('categories', 'locations'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'overview' => 'required',
            'duration' => 'required|string|max:255',
            'group_size' => 'required|integer',
            'age_range' => 'required|string|max:50',
            'base_price' => 'required|numeric',
            'category_id' => 'required|exists:tour_categories,id',
            'location_id' => 'required|exists:locations,id',
            'bestseller_flag' => 'boolean',
            'free_cancellation_flag' => 'boolean',
            'highlights' => 'nullable|string',
            'map_frame' => 'nullable|string',
            'languages' => 'nullable|string',
            'included' => 'nullable|string',
            'excluded' => 'nullable|string',
            'itinerary' => 'nullable|string',
            'gallery' => 'nullable|array',
            'gallery.*' => 'nullable|image|max:2048',
            'image' => 'nullable|image|max:2048',
        ]);

        $validated['bestseller_flag'] = $request->has('bestseller_flag');
        $validated['free_cancellation_flag'] = $request->has('free_cancellation_flag');

        // Generate unique slug
        $validated['slug'] = $this->generateUniqueSlug($validated['title']);

        // Convert fields to arrays
        $validated['languages'] = !empty($validated['languages'])
            ? array_map('trim', explode(',', $validated['languages']))
            : [];

        foreach (['included', 'excluded'] as $field) {
            if (!empty($validated[$field])) {
                $validated[$field] = array_map(
                    'trim',
                    explode(',', $validated[$field])
                );
            } else {
                $validated[$field] = [];
            }
        }

        if (!empty($validated['itinerary'])) {
            $validated['itinerary'] = array_filter(
                array_map(
                    'trim',
                    preg_split('/\r\n|\r|\n/', $validated['itinerary'])
                )
            );
        } else {
            $validated['itinerary'] = [];
        }

        // Encode arrays to JSON
        $validated['languages'] = json_encode($validated['languages']);
        $validated['included'] = json_encode($validated['included']);
        $validated['excluded'] = json_encode($validated['excluded']);
        $validated['itinerary'] = json_encode($validated['itinerary']);

        $tour = Tour::create($validated);

        if ($request->hasFile('image')) {
            $tour->addMediaFromRequest('image')->toMediaCollection('cover');
        }

        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $galleryImage) {
                $tour->addMedia($galleryImage)->toMediaCollection('gallery');
            }
        }

        return redirect()->route('admin.tours.index')
            ->with('success', 'Tour created successfully.');
    }

    public function edit(Tour $tour)
    {
        $categories = TourCategory::all();
        $locations = Location::all();
        return view('admin.tours.edit', compact('tour', 'categories', 'locations'));
    }

    public function update(Request $request, Tour $tour)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'overview' => 'required',
            'duration' => 'required|string|max:255',
            'group_size' => 'required|integer',
            'age_range' => 'required|string|max:50',
            'base_price' => 'required|numeric',
            'category_id' => 'required|exists:tour_categories,id',
            'location_id' => 'required|exists:locations,id',
            'bestseller_flag' => 'boolean',
            'free_cancellation_flag' => 'boolean',
            'highlights' => 'nullable|string',
            'map_frame' => 'nullable|string',
            'languages' => 'nullable|string',
            'included' => 'nullable|string',
            'excluded' => 'nullable|string',
            'itinerary' => 'nullable|string',
            'gallery' => 'nullable|array',
            'gallery.*' => 'nullable|image|max:2048',
            'image' => 'nullable|image|max:2048',
        ]);

        $validated['bestseller_flag'] = $request->has('bestseller_flag');
        $validated['free_cancellation_flag'] = $request->has('free_cancellation_flag');

        if ($tour->title !== $validated['title']) {
            $validated['slug'] = $this->generateUniqueSlug($validated['title']);
        } else {
            $validated['slug'] = $tour->slug;
        }

        // Convert fields to arrays
        $validated['languages'] = !empty($validated['languages'])
            ? array_map('trim', explode(',', $validated['languages']))
            : [];

        foreach (['included', 'excluded'] as $field) {
            if (!empty($validated[$field])) {
                $validated[$field] = array_map(
                    'trim',
                    explode(',', $validated[$field])
                );
            } else {
                $validated[$field] = [];
            }
        }

        if (!empty($validated['itinerary'])) {
            $validated['itinerary'] = array_filter(
                array_map(
                    'trim',
                    preg_split('/\r\n|\r|\n/', $validated['itinerary'])
                )
            );
        } else {
            $validated['itinerary'] = [];
        }

        // Encode arrays to JSON
        $validated['languages'] = json_encode($validated['languages']);
        $validated['included'] = json_encode($validated['included']);
        $validated['excluded'] = json_encode($validated['excluded']);
        $validated['itinerary'] = json_encode($validated['itinerary']);

        $tour->update($validated);

        if ($request->hasFile('image')) {
            $tour->clearMediaCollection('cover');
            $tour->addMediaFromRequest('image')->toMediaCollection('cover');
        }

        if ($request->hasFile('gallery')) {
            $tour->clearMediaCollection('gallery');
            foreach ($request->file('gallery') as $galleryImage) {
                $tour->addMedia($galleryImage)->toMediaCollection('gallery');
            }
        }

        return redirect()->route('admin.tours.index')
            ->with('success', 'Tour updated successfully.');
    }

    public function destroy(Tour $tour)
    {
        $tour->delete();
        return redirect()->route('admin.tours.index')
            ->with('success', 'Tour deleted.');
    }

    /**
     * Generate a unique slug for Tour
     */
    private function generateUniqueSlug($title)
    {
        $slug = Str::slug($title);
        $original = $slug;
        $counter = 1;

        while (Tour::where('slug', $slug)->exists()) {
            $slug = $original . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}
