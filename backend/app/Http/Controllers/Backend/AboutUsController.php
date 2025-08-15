<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AboutUsPage;
use App\Models\TeamMember;
use App\Models\TimelineEvent;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\File;

class AboutUsController extends Controller
{
    /**
     * API endpoint to get all "About Us" data for the frontend.
     */
    public function ApiAboutUsData()
    {
        // We use first() because there will only ever be one "About Us" page entry
        $page = AboutUsPage::first();
        $team = TeamMember::orderBy('order', 'asc')->get();
        $timeline = TimelineEvent::orderBy('order', 'asc')->get();

        // If the page doesn't exist yet, return empty data to prevent errors
        if (!$page) {
            return response()->json([
                'page_content' => [],
                'team_members' => [],
                'timeline_events' => [],
            ]);
        }

        // We'll manually structure the JSON response
        return response()->json([
            'page_content' => [
                'hero_title' => $page->hero_title,
                'hero_description' => $page->hero_description,
                'hero_image1' => asset($page->hero_image1),
                'hero_image2' => asset($page->hero_image2),
                'stat1_number' => $page->stat1_number,
                'stat1_label' => $page->stat1_label,
                'stat2_number' => $page->stat2_number,
                'stat2_label' => $page->stat2_label,
                'journey_title' => $page->journey_title,
                'journey_description' => $page->journey_description,
                'team_title' => $page->team_title,
                'team_description' => $page->team_description,
            ],
            'team_members' => $team->map(function ($member) {
                return [
                    'id' => $member->id,
                    'name' => $member->name,
                    'role' => $member->role,
                    'avatar' => asset($member->avatar),
                    'socials' => [
                        'linkedin' => $member->linkedin_url,
                        'twitter' => $member->twitter_url,
                        'facebook' => $member->facebook_url,
                    ]
                ];
            }),
            'timeline_events' => $timeline->map(function ($event) {
                return [
                    'year' => $event->year,
                    'event' => $event->event,
                    'description' => $event->description,
                ];
            }),
        ]);
    }

    /**
     * Show the form for editing the "About Us" page.
     */
    public function edit()
    {
        // FIXED: Use firstOrNew to prevent errors on the first visit.
        // This will create a new, empty AboutUsPage object in memory if one doesn't exist in the database.
        $page = AboutUsPage::firstOrNew([]);
        $teamMembers = TeamMember::orderBy('order', 'asc')->get();
        $timelineEvents = TimelineEvent::orderBy('order', 'asc')->get();

        return view('backend.about-us.edit', compact('page', 'teamMembers', 'timelineEvents'));
    }

    /**
     * Update the "About Us" page content.
     */
    public function update(Request $request)
    {
        // --- 1. Update or Create the main page content ---
        // Use updateOrCreate to handle both creating the first record and updating it later.
        $page = AboutUsPage::updateOrCreate(['id' => 1], $request->only([
            'hero_title',
            'hero_description',
            'stat1_number',
            'stat1_label',
            'stat2_number',
            'stat2_label',
            'journey_title',
            'journey_description',
            'team_title',
            'team_description'
        ]));

        $manager = new ImageManager(new Driver());
        if ($request->hasFile('hero_image1')) {
            if (File::exists($page->hero_image1)) File::delete($page->hero_image1);
            $image = $request->file('hero_image1');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $save_url = 'upload/about-us/' . $name_gen;
            $manager->read($image)->save(public_path($save_url));
            $page->hero_image1 = $save_url;
        }
        if ($request->hasFile('hero_image2')) {
            if (File::exists($page->hero_image2)) File::delete($page->hero_image2);
            $image = $request->file('hero_image2');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $save_url = 'upload/about-us/' . $name_gen;
            $manager->read($image)->save(public_path($save_url));
            $page->hero_image2 = $save_url;
        }
        $page->save();


        // --- 2. Update, Create, and Delete Team Members ---
        if ($request->has('team')) {
            foreach ($request->team as $id => $data) {
                if (isset($data['delete']) && $data['delete'] == '1') {
                    $memberToDelete = TeamMember::find($id);
                    if ($memberToDelete) {
                        if (File::exists($memberToDelete->avatar)) File::delete($memberToDelete->avatar);
                        $memberToDelete->delete();
                    }
                    continue;
                }

                $member = TeamMember::findOrNew($id);
                $member->fill($data);
                if (isset($data['avatar'])) {
                    $image = $data['avatar'];
                    $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                    $save_url = 'upload/team/' . $name_gen;
                    $manager->read($image)->resize(400, 400)->save(public_path($save_url));
                    $member->avatar = $save_url;
                }
                $member->save();
            }
        }

        // --- 3. Update, Create, and Delete Timeline Events ---
        if ($request->has('timeline')) {
            foreach ($request->timeline as $id => $data) {
                if (isset($data['delete']) && $data['delete'] == '1') {
                    $eventToDelete = TimelineEvent::find($id);
                    if ($eventToDelete) $eventToDelete->delete();
                    continue;
                }
                TimelineEvent::updateOrCreate(['id' => $id], $data);
            }
        }

        $notification = [
            'message' => 'About Us Page Updated Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}
