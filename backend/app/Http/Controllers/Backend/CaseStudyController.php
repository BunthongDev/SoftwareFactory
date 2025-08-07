<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CaseStudy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;   // Using File facade for deleting files
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

// Add this 'use' statement at the top
use App\Http\Resources\CaseStudyResource;
class CaseStudyController extends Controller
{
    /**
     * Display all case studies in JSON format.
     */
    // This method is used for API responses, it returns a collection of case studies formatted using CaseStudyResource
    public function ApiAllCaseStudy()
    {
        $casestudies = CaseStudy::latest()->get();
        // Use the resource to format the collection into JSON
        return CaseStudyResource::collection($casestudies);
    }
    
    /**
     * Display all case studies.
     */
    public function AllCaseStudy()
    {
        $casestudies = CaseStudy::latest()->get();
        return view('backend.case-study.all_case_study', compact('casestudies'));
    }

    /**
     * Show the form for creating a new case study.
     */
    public function AddCaseStudy()
    {
        return view('backend.case-study.add_case_study');
    }

    /**
     * Store a newly created case study in storage.
     */
    public function StoreCaseStudy(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:204800',
        ]);

        $save_url = '';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            // Read, resize, and save the image
            $img = $manager->read($image->getPathname());
            $img->resize(500, 350)->save(public_path('upload/casestudies/' . $name_gen));

            // Set the database save path
            $save_url = 'upload/casestudies/' . $name_gen;
        }

        CaseStudy::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $save_url,
        ]);

        $notification = [
            'message' => 'Case Study Created Successfully!',
            'alert-type' => 'success'
        ];
        return redirect()->route('all.casestudy')->with($notification);
    }

    /**
     * Show the form for editing the specified case study.
     */
    public function EditCaseStudy($id)
    {
        $casestudy = CaseStudy::findOrFail($id);
        return view('backend.case-study.edit_case_study', compact('casestudy'));
    }

    /**
     * Update the specified case study in storage.
     */
    public function UpdateCaseStudy(Request $request, $id)
    {
        $casestudy = CaseStudy::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:204800',
        ]);

        $save_url = $casestudy->image;

        if ($request->hasFile('image')) {
            // If a new image is uploaded, delete the old one
            // --- IMPROVED: Using public_path() for accurate file check and deletion ---
            if ($casestudy->image && File::exists(public_path($casestudy->image))) {
                File::delete(public_path($casestudy->image));
            }

            // Process the new image
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            $img = $manager->read($image->getPathname());
            $img->resize(500, 350)->save(public_path('upload/casestudies/' . $name_gen));

            $save_url = 'upload/casestudies/' . $name_gen;
        }
        


        $casestudy->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $save_url,
        ]);

        $notification = [
            'message' => 'Case Study Updated Successfully!',
            'alert-type' => 'success'
        ];
        return redirect()->route('all.casestudy')->with($notification);
    }

    /**
     * Remove the specified case study from storage.
     */
    public function DeleteCaseStudy($id)
    {
        $casestudy = CaseStudy::findOrFail($id);

        // --- IMPROVED: Using public_path() for accurate file check and deletion ---
        if ($casestudy->image && File::exists(public_path($casestudy->image))) {
            File::delete(public_path($casestudy->image));
        }

        $casestudy->delete();

        $notification = [
            'message' => 'Case Study Deleted Successfully!',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }
}
