<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    /**
     * API endpoint to get all site settings for the frontend.
     */
    public function ApiSiteSettings()
    {
        // There will only ever be one settings record.
        $settings = Setting::first();

        if (!$settings) {
            return response()->json(['message' => 'Settings not found'], 404);
        }

        // Manually build the response to be clean for the frontend
        return response()->json([
            'site_title' => $settings->site_title,
            'site_tagline' => $settings->site_tagline,
            'logo_url' => asset($settings->logo),
            'favicon_url' => asset($settings->favicon),
        ]);
    }

    /**
     * Show the form for editing the site settings.
     */
    public function edit()
    {
        // Find the first record, or create a new empty one if it doesn't exist.
        $setting = Setting::firstOrCreate(['id' => 1]);
        return view('backend.setting.edit', compact('setting'));
    }

    /**
     * Update the site settings in storage.
     */
    public function update(Request $request)
    {
        $setting = Setting::findOrFail(1);

        $request->validate([
            'site_title' => 'nullable|string|max:255',
            'site_tagline' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'favicon' => 'nullable|image|mimes:ico,png|max:1024',
        ]);

        $manager = new ImageManager(new Driver());

        // Handle the logo upload
        if ($request->hasFile('logo')) {
            if (File::exists($setting->logo)) File::delete($setting->logo);
            $image = $request->file('logo');
            $name_gen = 'logo.' . $image->getClientOriginalExtension();
            $save_url = 'upload/setting/' . $name_gen;
            $manager->read($image)->save(public_path($save_url));
            $setting->logo = $save_url;
        }

        // Handle the favicon upload
        if ($request->hasFile('favicon')) {
            if (File::exists($setting->favicon)) File::delete($setting->favicon);
            $image = $request->file('favicon');
            $name_gen = 'favicon.' . $image->getClientOriginalExtension();
            $save_url = 'upload/setting/' . $name_gen;
            $manager->read($image)->resize(32, 32)->save(public_path($save_url));
            $setting->favicon = $save_url;
        }

        // Update text fields
        $setting->site_title = $request->site_title;
        $setting->site_tagline = $request->site_tagline;
        $setting->save();

        $notification = [
            'message' => 'Settings Updated Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}
