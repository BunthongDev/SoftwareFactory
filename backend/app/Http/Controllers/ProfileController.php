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
     * Update the user's profile information.
     */
    public function ProfileStore(Request $request){
       $id = Auth::user()->id;
       $data = User::find($id);
       
       $data->name = $request->name;
       $data->email = $request->email;
       
       
       
       if ($request->hasFile('image')) {
           $file = $request->file('image');
           $filename = time() . '.' . $file->getClientOriginalExtension();
           $file->move(public_path('upload/user_images/'), $filename);
           $data->image = $filename;
       }
       $data->save();
       return redirect()->back()->with('success', 'Profile Updated Successfully');

    }
    
}