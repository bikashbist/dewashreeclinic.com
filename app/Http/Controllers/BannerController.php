<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    // Display the list of banners
    public function index()
    {
        $banners = Banner::all();
        return view('admin.pages.banners.index', compact('banners'));
    }

    // Show the form to create a new banner
    public function create()
    {
        return view('admin.pages.banners.create');
    }

    // Store the newly created banner
    public function store(Request $request)
    {
        $request->validate([
            'image_name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Generate a unique file name with the current timestamp
        $filename = time() . '.' . $request->image->getClientOriginalExtension();

        // Move the uploaded file to the 'uploads/banner' directory
        $request->image->move(public_path('uploads/banner'), $filename);

        // Create the new banner with the image path
        Banner::create([
            'image_name' => $request->image_name,
            'image' => 'uploads/banner/' . $filename, // Store the image path
        ]);

        return redirect()->route('banner.index')->with('success', 'Banner created successfully.');
    }

    // Show the form to edit an existing banner
    public function edit(Banner $banner)
    {
        return view('admin.pages.banners.edit', compact('banner'));
    }

    // Update the banner
    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'image_name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete the old image from 'uploads/banner'
            $imagePath = public_path($banner->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);  // Delete the old image
            }

            // Generate a unique file name with the current timestamp
            $filename = time() . '.' . $request->image->getClientOriginalExtension();

            // Move the new image to the 'uploads/banner' directory
            $request->image->move(public_path('uploads/banner'), $filename);

            // Update the banner image path
            $imagePath = 'uploads/banner/' . $filename;
        } else {
            $imagePath = $banner->image;
        }

        // Update the other fields
        $banner->update([
            'image_name' => $request->image_name,
            'image' => $imagePath,
        ]);

        return redirect()->route('banner.index')->with('success', 'Banner updated successfully.');
    }

    // Delete the banner
    public function destroy(Banner $banner)
    {
        // Delete the associated image from 'uploads/banner'
        $imagePath = public_path($banner->image);
        if (file_exists($imagePath)) {
            unlink($imagePath);  // Delete the image
        }

        // Delete the banner record from the database
        $banner->delete();

        return redirect()->route('banner.index')->with('success', 'Banner deleted successfully.');
    }
}
