<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Trekking;
use App\Models\Location;
use App\Models\TrekkingCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TrekkingController extends Controller
{
    public function index()
    {
        $treks = Trekking::with(['category', 'media'])->paginate(10);
        return view('admin.trekking.index', compact('treks'));
    }

    public function create()
    {
        $categories = TrekkingCategory::all();
        return view('admin.trekking.create', compact('categories'));
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
            'difficulty_level' => 'required|in:Easy,Moderate,Hard,Expert',
            'max_altitude' => 'nullable|integer',
            'category_id' => 'required|exists:trekking_categories,id',
            'bestseller_flag' => 'boolean',
            'free_cancellation_flag' => 'boolean',
            'highlights' => 'nullable|string',
            'languages' => 'nullable|string',
            'map_frame' => 'nullable|string', // ✅ replaced map_coordinates
            'included' => 'nullable|string',
            'excluded' => 'nullable|string',
            'itinerary' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $validated['slug'] = $this->generateUniqueSlug($validated['title']);

        $validated['bestseller_flag'] = $request->has('bestseller_flag');
        $validated['free_cancellation_flag'] = $request->has('free_cancellation_flag');

        // Highlights → array
        $validated['highlights'] = !empty($validated['highlights'])
            ? array_map('trim', explode(',', $validated['highlights']))
            : [];

        // Languages → array
        $validated['languages'] = !empty($validated['languages'])
            ? array_map('trim', explode(',', $validated['languages']))
            : [];

        // Included/Excluded → arrays
        foreach (['included', 'excluded'] as $field) {
            $validated[$field] = !empty($validated[$field])
                ? array_map('trim', explode(',', $validated[$field]))
                : [];
        }

        // Itinerary → array
        $validated['itinerary'] = !empty($validated['itinerary'])
            ? array_filter(
                array_map(
                    'trim',
                    preg_split('/\r\n|\r|\n/', $validated['itinerary'])
                )
            )
            : [];

        // Encode arrays to JSON
        $validated['highlights'] = json_encode($validated['highlights']);
        $validated['languages'] = json_encode($validated['languages']);
        $validated['included'] = json_encode($validated['included']);
        $validated['excluded'] = json_encode($validated['excluded']);
        $validated['itinerary'] = json_encode($validated['itinerary']);

        $trek = Trekking::create($validated);

        if ($request->hasFile('image')) {
            $trek->addMediaFromRequest('image')->toMediaCollection('trekking');
        }

        return redirect()->route('admin.trekking.index')
            ->with('success', 'Trekking created successfully.');
    }

    public function edit(Trekking $trekking)
    {
        $categories = TrekkingCategory::all();
        $tour = $trekking;
        $locations = Location::all();
        return view('admin.trekking.edit', compact('trekking', 'categories', 'tour', 'locations'));
    }

    public function update(Request $request, Trekking $trekking)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'overview' => 'required',
            'duration' => 'required|string|max:255',
            'group_size' => 'required|integer',
            'age_range' => 'required|string|max:50',
            'base_price' => 'required|numeric',
            'difficulty_level' => 'required|in:Easy,Moderate,Hard,Expert',
            'max_altitude' => 'nullable|integer',
            'category_id' => 'required|exists:trekking_categories,id',
            'bestseller_flag' => 'boolean',
            'free_cancellation_flag' => 'boolean',
            'highlights' => 'nullable|string',
            'languages' => 'nullable|string',
            'map_frame' => 'nullable|string', // ✅ replaced map_coordinates
            'included' => 'nullable|string',
            'excluded' => 'nullable|string',
            'itinerary' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($trekking->title !== $validated['title']) {
            $validated['slug'] = $this->generateUniqueSlug($validated['title']);
        } else {
            $validated['slug'] = $trekking->slug;
        }

        $validated['bestseller_flag'] = $request->has('bestseller_flag');
        $validated['free_cancellation_flag'] = $request->has('free_cancellation_flag');

        $validated['highlights'] = !empty($validated['highlights'])
            ? array_map('trim', explode(',', $validated['highlights']))
            : [];

        $validated['languages'] = !empty($validated['languages'])
            ? array_map('trim', explode(',', $validated['languages']))
            : [];

        foreach (['included', 'excluded'] as $field) {
            $validated[$field] = !empty($validated[$field])
                ? array_map('trim', explode(',', $validated[$field]))
                : [];
        }

        $validated['itinerary'] = !empty($validated['itinerary'])
            ? array_filter(
                array_map(
                    'trim',
                    preg_split('/\r\n|\r|\n/', $validated['itinerary'])
                )
            )
            : [];

        // Encode arrays to JSON
        $validated['highlights'] = json_encode($validated['highlights']);
        $validated['languages'] = json_encode($validated['languages']);
        $validated['included'] = json_encode($validated['included']);
        $validated['excluded'] = json_encode($validated['excluded']);
        $validated['itinerary'] = json_encode($validated['itinerary']);

        $trekking->update($validated);

        if ($request->hasFile('image')) {
            $trekking->clearMediaCollection('trekking');
            $trekking->addMediaFromRequest('image')->toMediaCollection('trekking');
        }

        return redirect()->route('admin.trekking.index')
            ->with('success', 'Trekking updated.');
    }

    public function destroy(Trekking $trekking)
    {
        $trekking->delete();
        return redirect()->route('admin.trekking.index')
            ->with('success', 'Trekking deleted.');
    }

    /**
     * Generate a unique slug for Trekking
     */
    private function generateUniqueSlug($title)
    {
        $slug = Str::slug($title);
        $original = $slug;
        $counter = 1;

        while (Trekking::where('slug', $slug)->exists()) {
            $slug = $original . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}
