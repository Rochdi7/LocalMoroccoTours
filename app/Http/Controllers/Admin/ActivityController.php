<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\ActivityCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Activity::with(['category', 'media'])->paginate(10);
        return view('admin.activities.index', compact('activities'));
    }

    public function create()
    {
        $categories = ActivityCategory::all();
        return view('admin.activities.create', compact('categories'));
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
            'category_id' => 'required|exists:activity_categories,id',
            'bestseller_flag' => 'boolean',
            'free_cancellation_flag' => 'boolean',
            'highlights' => 'nullable|string',
            'included' => 'nullable|string',
            'excluded' => 'nullable|string',
            'itinerary' => 'nullable|string',
            'map_frame' => 'nullable|string',  // ✅ replaced map_coordinates
            'languages' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $validated['slug'] = $this->generateUniqueSlug($validated['title']);

        $validated['bestseller_flag'] = $request->has('bestseller_flag');
        $validated['free_cancellation_flag'] = $request->has('free_cancellation_flag');

        $validated['highlights'] = !empty($validated['highlights'])
            ? array_map('trim', explode(',', $validated['highlights']))
            : [];

        foreach (['included', 'excluded'] as $field) {
            $validated[$field] = !empty($validated[$field])
                ? array_map('trim', explode(',', $validated[$field]))
                : [];
        }

        $validated['itinerary'] = !empty($validated['itinerary'])
            ? array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $validated['itinerary'])))
            : [];

        if (!empty($validated['languages'])) {
            $langs = array_map('trim', explode(',', $validated['languages']));
            $validated['languages'] = json_encode($langs);
        } else {
            $validated['languages'] = null;
        }

        // Encode arrays to JSON
        $validated['highlights'] = json_encode($validated['highlights']);
        $validated['included'] = json_encode($validated['included']);
        $validated['excluded'] = json_encode($validated['excluded']);
        $validated['itinerary'] = json_encode($validated['itinerary']);

        $activity = Activity::create($validated);

        if ($request->hasFile('image')) {
            $activity->addMediaFromRequest('image')->toMediaCollection('activities');
        }

        return redirect()->route('admin.activities.index')
            ->with('success', 'Activity created successfully.');
    }

    public function edit(Activity $activity)
    {
        $categories = ActivityCategory::all();
        return view('admin.activities.edit', compact('activity', 'categories'));
    }

    public function update(Request $request, Activity $activity)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'overview' => 'required',
            'duration' => 'required|string|max:255',
            'group_size' => 'required|integer',
            'age_range' => 'required|string|max:50',
            'base_price' => 'required|numeric',
            'category_id' => 'required|exists:activity_categories,id',
            'bestseller_flag' => 'boolean',
            'free_cancellation_flag' => 'boolean',
            'highlights' => 'nullable|string',
            'included' => 'nullable|string',
            'excluded' => 'nullable|string',
            'itinerary' => 'nullable|string',
            'map_frame' => 'nullable|string',  // ✅ replaced map_coordinates
            'languages' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($activity->title !== $validated['title']) {
            $validated['slug'] = $this->generateUniqueSlug($validated['title']);
        } else {
            $validated['slug'] = $activity->slug;
        }

        $validated['bestseller_flag'] = $request->has('bestseller_flag');
        $validated['free_cancellation_flag'] = $request->has('free_cancellation_flag');

        $validated['highlights'] = !empty($validated['highlights'])
            ? array_map('trim', explode(',', $validated['highlights']))
            : [];

        foreach (['included', 'excluded'] as $field) {
            $validated[$field] = !empty($validated[$field])
                ? array_map('trim', explode(',', $validated[$field]))
                : [];
        }

        $validated['itinerary'] = !empty($validated['itinerary'])
            ? array_filter(array_map('trim', preg_split('/\r\n|\r|\r\n/', $validated['itinerary'])))
            : [];

        if (!empty($validated['languages'])) {
            $langs = array_map('trim', explode(',', $validated['languages']));
            $validated['languages'] = json_encode($langs);
        } else {
            $validated['languages'] = null;
        }

        // Encode arrays to JSON
        $validated['highlights'] = json_encode($validated['highlights']);
        $validated['included'] = json_encode($validated['included']);
        $validated['excluded'] = json_encode($validated['excluded']);
        $validated['itinerary'] = json_encode($validated['itinerary']);

        $activity->update($validated);

        if ($request->hasFile('image')) {
            $activity->clearMediaCollection('activities');
            $activity->addMediaFromRequest('image')->toMediaCollection('activities');
        }

        return redirect()->route('admin.activities.index')
            ->with('success', 'Activity updated successfully.');
    }

    public function destroy(Activity $activity)
    {
        $activity->delete();
        return redirect()->route('admin.activities.index')
            ->with('success', 'Activity deleted successfully.');
    }

    private function generateUniqueSlug($title)
    {
        $slug = Str::slug($title);
        $original = $slug;
        $counter = 1;

        while (Activity::where('slug', $slug)->exists()) {
            $slug = $original . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}
