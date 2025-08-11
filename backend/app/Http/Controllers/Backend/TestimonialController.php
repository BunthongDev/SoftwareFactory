<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Resources\TestimonialResource;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
// UPDATED: Use the modern ImageManager class
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class TestimonialController extends Controller
{
    /**
     * API endpoint to get all testimonials for the frontend.
     */
    public function ApiAllTestimonials()
    {
        $testimonials = Testimonial::latest()->get();
        return TestimonialResource::collection($testimonials);
    }

    /**
     * Display all testimonials in the admin dashboard.
     */
    public function index()
    {
        $testimonials = Testimonial::latest()->get();
        return view('backend.testimonial.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new testimonial.
     */
    public function create()
    {
        return view('backend.testimonial.create');
    }

    /**
     * Store a newly created testimonial in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'quote' => 'required|string',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:204800',
        ]);

        //  Use the modern ImageManager class for image processing
        $manager = new ImageManager(new Driver());
        $image = $request->file('avatar');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $save_url = 'upload/testimonials/' . $name_gen;

        $resizedImage = $manager->read($image);
        $resizedImage->resize(100, 200);
        $resizedImage->save(public_path($save_url));


        Testimonial::create([
            'name' => $request->name,
            'role' => $request->role,
            'quote' => $request->quote,
            'avatar' => $save_url,
        ]);

        $notification = [
            'message' => 'Testimonial Created Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('testimonial.index')->with($notification);
    }

    /**
     * Show the form for editing the specified testimonial.
     */
    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('backend.testimonial.edit', compact('testimonial'));
    }

    /**
     * Update the specified testimonial in storage.
     */
    public function update(Request $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'quote' => 'required|string',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:204800',
        ]);

        $save_url = $testimonial->avatar;

        // If a new avatar is uploaded, process it
        // and delete the old one if it exists
        if ($request->hasFile('avatar')) {
            if (File::exists($testimonial->avatar)) {
                File::delete($testimonial->avatar);
            }

            //  Use the modern ImageManager class for image processing
            $manager = new ImageManager(new Driver());
            $image = $request->file('avatar');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $save_url = 'upload/testimonials/' . $name_gen;

            $resizedImage = $manager->read($image);
            $resizedImage->resize(100, 200);
            $resizedImage->save(public_path($save_url));
        }

        $testimonial->update([
            'name' => $request->name,
            'role' => $request->role,
            'quote' => $request->quote,
            'avatar' => $save_url,
        ]);

        $notification = [
            'message' => 'Testimonial Updated Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('testimonial.index')->with($notification);
    }

    /**
     * Remove the specified testimonial from storage.
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);

        if (File::exists($testimonial->avatar)) {
            File::delete($testimonial->avatar);
        }

        $testimonial->delete();

        $notification = [
            'message' => 'Testimonial Deleted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('testimonial.index')->with($notification);
    }
}
