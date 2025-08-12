<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\File;

class ClientController extends Controller
{
    /**
     * API endpoint to get all clients for the frontend.
     */
    public function ApiAllClients()
    {
        $clients = Client::latest()->get();
        return ClientResource::collection($clients);
    }

    /**
     * Display all clients in the admin dashboard.
     */
    public function index()
    {
        $clients = Client::latest()->get();
        return view('backend.client.index', compact('clients'));
    }

    /**
     * Show the form for creating a new client.
     */
    public function create()
    {
        return view('backend.client.create');
    }

    /**
     * Store a newly created client in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'website_url' => 'nullable|url|max:255',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:90480000',
        ]);

        // Handle the logo image upload
        $manager = new ImageManager(new Driver());
        $image = $request->file('logo');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $save_url = 'upload/clients/' . $name_gen;

        $resizedImage = $manager->read($image);
        $resizedImage->save(public_path($save_url));

        Client::create([
            'name' => $request->name,
            'website_url' => $request->website_url,
            'logo' => $save_url,
        ]);

        $notification = [
            'message' => 'Client Created Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('client.index')->with($notification);
    }

    /**
     * Show the form for editing the specified client.
     */
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('backend.client.edit', compact('client'));
    }

    /**
     * Update the specified client in storage.
     */
    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);

        $request->validate([
            'name' => 'nullable|string|max:255',
            'website_url' => 'nullable|url|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:90480000',
        ]);

        $save_url = $client->logo;

        if ($request->hasFile('logo')) {
            if (File::exists($client->logo)) {
                File::delete($client->logo);
            }

            $manager = new ImageManager(new Driver());
            $image = $request->file('logo');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $save_url = 'upload/clients/' . $name_gen;

            $resizedImage = $manager->read($image);
            $resizedImage->save(public_path($save_url));
        }

        $client->update([
            'name' => $request->name,
            'website_url' => $request->website_url,
            'logo' => $save_url,
        ]);

        $notification = [
            'message' => 'Client Updated Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->route('client.index')->with($notification);
    }

    /**
     * Remove the specified client from storage.
     */
    public function destroy($id)
    {

        $client = Client::findOrFail($id);

        if (File::exists($client->logo)) {
            File::delete($client->logo);
        }

        $client->delete();

        $notification = [
            'message' => 'Client Deleted Successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}
