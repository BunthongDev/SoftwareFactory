<?php

namespace App\Http\Controllers\Backend;;

use App\Http\Controllers\Controller;
use App\Http\Resources\TopNavbarResource;
use App\Models\TopNavbar;
use Illuminate\Http\Request;

class TopNavbarController extends Controller
{

    /**
     * Display the Top Navbar settings page.
     * Finds the first record, or creates one if it doesn't exist.
     */
    public function ApiTopNav()
    {
        // Find the first settings record. Since there's only one, this is all we need.
        $topnav = TopNavbar::first();

        // If for some reason the record doesn't exist, return an empty response.
        if (!$topnav) {
            return response()->json(['data' => []]);
        }

        // Use the resource to format the data into clean JSON.
        return new TopNavbarResource($topnav);
    }
    
    
    
    /**
     * Display the Top Navbar settings page.
     * Finds the first record, or creates one if it doesn't exist.
     */
    public function EditTopNav()
    {
        // We assume there will only ever be one row of settings.
        // firstOrCreate will find the first record, or create a new empty one if the table is empty.
        $topnav = TopNavbar::firstOrCreate([]);

        // The view path should match where you saved your 'top_navbar.blade.php' file.
        return view('backend.top-navbar.top_navbar', compact('topnav'));
    }

    /**
     * Update the Top Navbar settings in the database.
     */
    public function UpdateTopNav(Request $request, $id)
    {
        // Find the specific settings record by its ID.
        $topnav = TopNavbar::findOrFail($id);

        // Update the main contact information.
        $topnav->address = $request->address;
        $topnav->email = $request->email;

        // --- Update Social Media Links and Statuses ---

        // Helper array to loop through all social fields easily.
        $socials = ['facebook', 'linkedin', 'twitter', 'instagram', 'youtube', 'telegram'];

        foreach ($socials as $social) {
            // Update the URL field for the current social media.
            $topnav->{$social . '_url'} = $request->{$social . '_url'};

            // Update the status (the on/off toggle).
            // If the request has the status field (meaning the box was checked), set it to 1 (true).
            // Otherwise, set it to 0 (false).
            $topnav->{$social . '_status'} = $request->has($social . '_status') ? 1 : 0;
        }

        // Save all the changes to the database.
        $topnav->save();

        // Prepare a success notification to show the user.
        $notification = [
            'message' => 'Top Navbar Settings Updated Successfully!',
            'alert-type' => 'success'
        ];

        // Redirect the user back to the same page with the success message.
        return redirect()->back()->with($notification);
    }
}
