<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Str;
// Importing the Intervention Image library for image manipulation
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


class SliderController extends Controller
{
    
    // Display all sliders
    public function AllSlider(){
        $slider = Slider::latest()->get();
        return view('backend.slider.all_slider', compact('slider'));
    }

    // Add slider
    public function AddSlider(){
        return view('backend.slider.add_slider');
    }

    // Store slider
    public function StoreSlider(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'heading' => 'required',
            'description' => 'required',
            'link' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image->getPathname());
            $img->resize(1124, 750)->save(public_path('upload/slider/' . $name_gen));
            $save_url = 'upload/slider/' . $name_gen;

            Slider::create([
                'heading' => $request->heading,
                'description' => $request->description,
                'link' => $request->link,
                'image' => $save_url,
            ]);
        }

        $notification = array(
            'message' => 'Slider Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.slider')->with($notification);
    }
    
    // Edit slider 
    public function EditSlider($id){
        $slider = Slider::find($id);
        return view('backend.slider.edit_slider', compact('slider'));
    }
    
    
    // Update slider
    public function UpdateSlider(Request $request, $id)
    {
        $slider = Slider::find($id);
        $slider->heading = $request->heading;
        $slider->description = $request->description;
        $slider->link = $request->link;

        if ($request->hasFile('image')) {
            // Delete old image
            if (file_exists(public_path($slider->image))) {
                unlink(public_path($slider->image));
            }

            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image->getPathname());
            $img->resize(1124, 750)->save(public_path('upload/slider/' . $name_gen));
            $slider->image = 'upload/slider/' . $name_gen;
        }

        $slider->save();

        $notification = array(
            'message' => 'Slider Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.slider')->with($notification);
    }
    
    // Delete slider
    public function DeleteSlider($id){
        $item = Slider::find($id);
        $img = $item->image;
        unlink($img);
        
        Slider::find($id)->delete();
        
        $notification = array(
            'message' => 'Slider Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    
}
