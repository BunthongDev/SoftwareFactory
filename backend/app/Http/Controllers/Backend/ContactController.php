<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ContactPage;
use App\Models\ContactLink;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * API endpoint to get all "Contact Us" data for the frontend.
     */
    public function ApiContactUsData()
    {
        // Use first() because there will only ever be one "Contact Us" page entry
        $page = ContactPage::first();
        $links = ContactLink::where('is_visible', true)->orderBy('order', 'asc')->get();

        // If the page doesn't exist yet, return empty data to prevent errors
        if (!$page) {
            return response()->json([
                'page_content' => [],
                'contact_links' => [],
            ]);
        }

        // Manually structure the JSON response
        return response()->json([
            'page_content' => [
                'title' => $page->title,
                'description' => $page->description,
                'map_url' => $page->map_url,
            ],
            'contact_links' => $links->map(function ($link) {
                return [
                    'id' => $link->id,
                    'title' => $link->title,
                    'detail' => $link->detail,
                    'href' => $link->href,
                    'icon' => $link->icon_class,
                    'hoverClass' => $link->hover_color,
                ];
            }),
        ]);
    }

    /**
     * Show the form for editing the "Contact Us" page.
     */
    public function edit()
    {
        // Find the first record, or create a new empty one if it doesn't exist
        $page = ContactPage::firstOrNew([]);
        $contactLinks = ContactLink::orderBy('order', 'asc')->get();

        return view('backend.contact-us.edit', compact('page', 'contactLinks'));
    }

    /**
     * Update the "Contact Us" page content.
     */
    public function update(Request $request)
    {
        // --- 1. Update or Create the main page content ---
        ContactPage::updateOrCreate(['id' => 1], $request->only([
            'title', 'description', 'map_url'
        ]));

        // --- 2. Update, Create, and Delete Contact Links ---
        if ($request->has('links')) {
            foreach ($request->links as $id => $data) {
                // Handle deletion
                if (isset($data['delete']) && $data['delete'] == '1') {
                    $linkToDelete = ContactLink::find($id);
                    if ($linkToDelete) $linkToDelete->delete();
                    continue;
                }
                
                // Handle visibility toggle
                $data['is_visible'] = isset($data['is_visible']);

                // Update or create the record
                ContactLink::updateOrCreate(['id' => $id], $data);
            }
        }

        $notification = [
            'message' => 'Contact Us Page Updated Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}
