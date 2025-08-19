<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Resources\MenuResource;
use App\Models\Menu;
use App\Models\MenuSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

// For image resizing
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class MenuController extends Controller
{

    /**
     * Display the menu settings form.
     */
    public function ApiMenu()
    {
        // ... (no changes in this method)
        $settings = MenuSetting::first();
        $menus = Menu::where('status', 1)->orderBy('order', 'asc')->get();
        if (!$settings) {
            return response()->json(['data' => []]);
        }
        return new MenuResource(['settings' => $settings, 'menus' => $menus]);
    }



    /**
     * Show the form for editing the menu settings.
     */
    public function EditMenu()
    {
        // ... (no changes in this method)
        $settings = MenuSetting::firstOrCreate([]);
        $menus = Menu::orderBy('order', 'asc')->get();
        return view('backend.menu.menu', compact('settings', 'menus'));
    }

    /**
     * Update all menu settings, including general settings and menu items.
     */
    public function UpdateMenuSettings(Request $request)
    {
        $settings = MenuSetting::firstOrCreate([]);

        // --- THIS ENTIRE "Handle Logo Upload" BLOCK IS UPDATED ---
        if ($request->hasFile('logo_path')) {
            // Delete old logo if it exists
            if ($settings->logo_path && File::exists(public_path($settings->logo_path))) {
                File::delete(public_path($settings->logo_path));
            }

            $image = $request->file('logo_path');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $save_path = 'upload/menu/' . $name_gen;

            // Create an instance of ImageManager
            $manager = new ImageManager(new Driver());

            // Read the image, resize it, and save
            $img = $manager->read($image->getPathname());

            // Resize the image to a width of 500px and constrain aspect ratio (auto height)
            // $img->resize(500, 200, function ($constraint) {
            //     $constraint->aspectRatio();
            // });

            $img->save(public_path($save_path));

            // Save the new path to the database
            $settings->logo_path = $save_path;
        }
        // --- END OF UPDATED BLOCK ---


        // Update other general settings
        $settings->consultancy_text = $request->consultancy_text;
        $settings->phone_number = $request->phone_number;
        $settings->background_color = $request->background_color;
        $settings->save();

        // Handle menu items
        if ($request->has('menus')) {
            $submitted_menu_ids = [];
            foreach ($request->menus as $key => $menuData) {
                $status = isset($menuData['status']);
                $data = [
                    'label'  => $menuData['label'],
                    'link'   => $menuData['link'],
                    'order'  => $menuData['order'],
                    'status' => $status,
                ];
                if (is_numeric($key)) {
                    Menu::where('id', $key)->update($data);
                    $submitted_menu_ids[] = $key;
                } else {
                    $newMenu = Menu::create($data);
                    $submitted_menu_ids[] = $newMenu->id;
                }
            }
            Menu::whereNotIn('id', $submitted_menu_ids)->delete();
        } else {
            Menu::truncate();
        }

        // Set a success notification
        $notification = [
            'message' => 'Menu Settings Updated Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}
