<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    
    // This function displays the admin profile
    public function AdminProfile(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.profile', compact('profileData'));
    }
    
    
    /**
     * Update the admin's profile information.
     */
    public function ProfileStore(Request $request){
       $id = Auth::user()->id;
       $data = User::find($id);
       
       $data->name = $request->name;
       $data->email = $request->email;
       
       $oldPhotoPath = $data->image;// Store the old photo path to delete it later if a new photo is uploaded
       
       if ($request->hasFile('image')) {
           $file = $request->file('image');
           $filename = time() . '.' . $file->getClientOriginalExtension();
           $file->move(public_path('upload/user_images/'), $filename);
           $data->image = $filename;
           
        //    If an old photo exists, delete it
           if ($oldPhotoPath && file_exists(public_path('upload/user_images/' . $oldPhotoPath))) {
               unlink(public_path('upload/user_images/' . $oldPhotoPath));
           }
       }
       $data->save();
       
    //    alert notification toastr
         $notification = array(
              'message' => 'Profile Updated Successfully',
              'alert-type' => 'success'
         );
       
       return redirect()->back()->with($notification);

    }
    
}