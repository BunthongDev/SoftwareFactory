<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\File;

class FooterController extends Controller
{
    /**
     * API endpoint to get all footer data for the frontend.
     */
    public function ApiFooterData()
    {
        // There will only ever be one footer record, so we get the first one.
        $footer = Footer::first();

        if (!$footer) {
            return response()->json(['message' => 'Footer data not found'], 404);
        }

        // Manually build the response to match the frontend's needs
        return response()->json([
            'logo' => asset($footer->logo),
            'slogan' => $footer->slogan,
            'socials' => [
                'facebook' => $footer->facebook_url,
                'linkedin' => $footer->linkedin_url,
                'telegram' => $footer->telegram_url,
                'instagram' => $footer->instagram_url,
                'youtube' => $footer->youtube_url,
            ],
            'cta' => [
                'title' => $footer->cta_title,
                'description' => $footer->cta_description,
                'link' => $footer->cta_button_link,
            ],
            'copyright' => $footer->copyright_text,
            'colors' => [
                'background' => $footer->background_color,
                'font' => $footer->font_color,
            ]
        ]);
    }

    /**
     * Show the form for editing the footer.
     */
    public function edit()
    {
        // Find the first record, or create a new empty one if it doesn't exist
        $footer = Footer::firstOrCreate(['id' => 1]);
        return view('backend.footer.edit', compact('footer'));
    }

    /**
     * Update the footer content.
     */
    public function update(Request $request)
    {
        $footer = Footer::findOrFail(1);

        $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // Add validation for other fields as needed
        ]);

        // Handle the logo upload
        if ($request->hasFile('logo')) {
            if (File::exists($footer->logo)) {
                File::delete($footer->logo);
            }
            $manager = new ImageManager(new Driver());
            $image = $request->file('logo');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $save_url = 'upload/footer/' . $name_gen;
            $manager->read($image)->save(public_path($save_url));
            $footer->logo = $save_url;
        }

        // Update all other fields
        $footer->fill($request->except('logo'));
        $footer->save();

        $notification = [
            'message' => 'Footer Updated Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}
