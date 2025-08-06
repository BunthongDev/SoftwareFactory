<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceResource;
use Illuminate\Http\Request;
use App\Models\Service;
// REMOVED: Intervention Image and File dependencies are no longer needed.

class ServiceController extends Controller
{

    //Start service api
    public function ApiAllService()
    {
        // Fetch services, ordered by the 'order' column for correct frontend display
        $services = Service::orderBy('order', 'asc')->get();

        // Return the collection of services, formatted by ServiceResource
        return ServiceResource::collection($services);
    }

    //End service api


    public function AllService()
    {
        $service = Service::latest()->get();
        return view('backend.service.all_service', compact('service'));
    }

    public function AddService()
    {
        return view('backend.service.add_service');
    }

    // Store service data (SIMPLIFIED FOR TEXT INPUT)
    public function StoreService(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255', // Validation changed to string
            'order' => 'nullable|integer',
        ]);

        Service::create([
            'title' => $request->title,
            'description' => $request->description,
            'icon' => $request->icon, // Directly use the text input
            'order' => $request->order,
        ]);

        $notification = [
            'message' => 'Service Created Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.service')->with($notification);
    }

    public function EditService($id)
    {
        $service = Service::findOrFail($id);
        return view('backend.service.edit_service', compact('service'));
    }

    // Update service (SIMPLIFIED FOR TEXT INPUT)
    public function UpdateService(Request $request)
    {
        $service_id = $request->id;

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'order' => 'nullable|integer',
            'icon' => 'nullable|string|max:255', // Validation changed to string
        ]);

        // All complex file handling is removed. We just update the text fields.
        Service::findOrFail($service_id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'order' => $request->order,
            'icon' => $request->icon, // Directly update with the new class name
        ]);

        $notification = [
            'message' => 'Service Updated Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.service')->with($notification);
    }

    // Remove service (SIMPLIFIED)
    public function DeleteService($id)
    {
        $service = Service::findOrFail($id);

        // REMOVED: No file to delete from server.

        // Just delete the database record
        $service->delete();

        $notification = [
            'message' => 'Service Deleted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}
