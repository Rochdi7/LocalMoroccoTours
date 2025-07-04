<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SpecialOffer;
use Illuminate\Http\Request;

class SpecialOfferController extends Controller
{
    public function index()
    {
        $offers = SpecialOffer::orderBy('order')->get();
        return view('admin.special_offers.index', compact('offers'));
    }

    public function create()
    {
        return view('admin.special_offers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'text' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'link' => 'nullable|url|max:255',
            'order' => 'nullable|numeric|min:0',
            'is_active' => 'sometimes|boolean',
        ]);

        // Create the special offer excluding 'image' and 'is_active'
        $specialOffer = SpecialOffer::create($request->except('image', 'is_active'));

        // Set is_active based on checkbox presence
        $specialOffer->is_active = $request->has('is_active');
        $specialOffer->save();

        // Attach the uploaded image to media collection
        if ($request->hasFile('image')) {
            $specialOffer->addMediaFromRequest('image')->toMediaCollection('special_offers');
        }

        return redirect()->route('admin.special-offers.index')->with('success', 'Special offer created successfully.');
    }

    public function edit(SpecialOffer $specialOffer)
    {
        return view('admin.special_offers.edit', compact('specialOffer'));
    }

    public function update(Request $request, SpecialOffer $specialOffer)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'text' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'link' => 'nullable|url|max:255',
            'order' => 'nullable|numeric|min:0',
            'is_active' => 'sometimes|boolean',
        ]);

        $data = $request->except('image');
        $data['is_active'] = $request->has('is_active');

        $specialOffer->update($data);

        // If new image uploaded, clear old media and add new one
        if ($request->hasFile('image')) {
            $specialOffer->clearMediaCollection('special_offers');
            $specialOffer->addMediaFromRequest('image')->toMediaCollection('special_offers');
        }

        return redirect()->route('admin.special-offers.index')->with('success', 'Special offer updated successfully.');
    }

    public function destroy(SpecialOffer $specialOffer)
    {
        // Delete media and the offer record
        $specialOffer->clearMediaCollection('special_offers');
        $specialOffer->delete();

        return redirect()->route('admin.special-offers.index')->with('success', 'Special offer deleted successfully.');
    }
}
