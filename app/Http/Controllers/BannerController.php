<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        $imagePath = $request->file('image')->store('banners', 'public');

        Banner::create([
            'image_name' => $request->image_name,
            'image' => $imagePath,
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
            Storage::delete('public/' . $banner->image);
            $imagePath = $request->file('image')->store('banners', 'public');
        } else {
            $imagePath = $banner->image;
        }

        $banner->update([
            'image_name' => $request->image_name,
            'image' => $imagePath,
        ]);

        return redirect()->route('banner.index')->with('success', 'Banner updated successfully.');
    }

    // Delete the banner
    public function destroy(Banner $banner)
    {
        Storage::delete('public/' . $banner->image);
        $banner->delete();

        return redirect()->route('banner.index')->with('success', 'Banner deleted successfully.');
    }
}
