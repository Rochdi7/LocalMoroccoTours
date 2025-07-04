<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::with('parent')->orderBy('name')->paginate(10);
        return view('admin.locations.index', compact('locations'));
    }

    public function create()
    {
        $parentLocations = Location::orderBy('name')->get();
        return view('admin.locations.create', compact('parentLocations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'parent_id'   => 'nullable|exists:locations,id',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $location = Location::create($request->except('image'));

        if ($request->hasFile('image')) {
            $location->addMediaFromRequest('image')->toMediaCollection('locations');
        }

        return redirect()->route('admin.locations.index')->with('toast', 'Location created successfully.');
    }

    public function edit(Location $location)
    {
        $parentLocations = Location::where('id', '!=', $location->id)->orderBy('name')->get();
        return view('admin.locations.edit', compact('location', 'parentLocations'));
    }

    public function update(Request $request, Location $location)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'parent_id'   => 'nullable|exists:locations,id|not_in:' . $location->id,
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $location->update($request->except('image'));

        if ($request->hasFile('image')) {
            // Remove old image and upload new one
            $location->clearMediaCollection('locations');
            $location->addMediaFromRequest('image')->toMediaCollection('locations');
        }

        return redirect()->route('admin.locations.index')->with('toast', 'Location updated successfully.');
    }

    public function destroy(Location $location)
    {
        $location->clearMediaCollection('locations');
        $location->delete();

        return redirect()->route('admin.locations.index')->with('toast', 'Location deleted successfully.');
    }

    public function show(Location $location)
{
    return view('front.locations.show', compact('location'));
}

}
