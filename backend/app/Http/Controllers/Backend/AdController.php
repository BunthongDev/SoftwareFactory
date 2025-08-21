<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdResource;
use App\Models\Ad;
use Illuminate\Http\Request;

class AdController extends Controller
{
    /**
     * Fetch and group all active ads for the frontend API.
     */
    public function index()
    {
        $activeAds = Ad::where('is_active', true)->get();
        $groupedAds = $activeAds->groupBy('placement');
        return response()->json(
            $groupedAds->map(function ($ads) {
                return AdResource::collection($ads);
            })
        );
    }

    /**
     * Display a listing of the ads in the admin panel.
     */
    public function manage()
    {
        $ads = Ad::latest()->get();
        return view('backend.ads.index', compact('ads'));
    }

    /**
     * Show the form for creating a new ad.
     */
    public function create()
    {
        return view('backend.ads.create');
    }

    /**
     * Store a newly created ad in the database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'link_url' => 'nullable|url',
            'placement' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:20480',
        ]);

        $ad = new Ad($request->except('image'));

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            // We'll create an 'ads' folder inside 'upload' to keep things organized
            $request->image->move(public_path('upload/ads'), $imageName);
            $ad->image_url = 'ads/' . $imageName;
        }

        $ad->is_active = $request->has('is_active');
        $ad->save();

        return redirect()->route('admin.ads.manage')->with('success', 'Ad created successfully.');
    }

    /**
     * Show the form for editing the specified ad.
     */
    public function edit(Ad $ad)
    {
        return view('backend.ads.edit', compact('ad'));
    }

    /**
     * Update the specified ad in the database.
     */
    public function update(Request $request, Ad $ad)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'link_url' => 'nullable|url',
            'placement' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:20480',
        ]);

        $ad->fill($request->except('image'));

        if ($request->hasFile('image')) {
            // --- START: DELETE OLD IMAGE LOGIC ---
            // Check if an old image exists and delete it
            if ($ad->image_url && file_exists(public_path('upload/' . $ad->image_url))) {
                unlink(public_path('upload/' . $ad->image_url));
            }
            // --- END: DELETE OLD IMAGE LOGIC ---

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('upload/ads'), $imageName);
            $ad->image_url = 'ads/' . $imageName;
        }

        $ad->is_active = $request->has('is_active');
        $ad->save();

        return redirect()->route('admin.ads.manage')->with('success', 'Ad updated successfully.');
    }

    /**
     * Remove the specified ad from the database.
     */
    public function destroy(Ad $ad)
    {
        // --- START: DELETE IMAGE ON DESTROY LOGIC ---
        // Check if an image exists and delete it before deleting the record
        if ($ad->image_url && file_exists(public_path('upload/' . $ad->image_url))) {
            unlink(public_path('upload/' . $ad->image_url));
        }
        // --- END: DELETE IMAGE ON DESTROY LOGIC ---

        $ad->delete();
        return redirect()->route('admin.ads.manage')->with('success', 'Ad deleted successfully.');
    }
}
