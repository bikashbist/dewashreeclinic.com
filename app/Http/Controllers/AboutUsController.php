<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        $aboutUs = AboutUs::first(); // Get the first record from the about_us table
        return view('admin/pages/about-us.index', compact('aboutUs'));
    }

    public function create()
    {
        return view('admin/pages/about-us.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $aboutUs = new AboutUs();
        $aboutUs->title = $request->title;
        $aboutUs->description = $request->description;

        if ($request->hasFile('image')) {
            // Get the file from the request
            $image = $request->file('image');

            // Generate a unique file name with the original extension
            $fileName = time() . '.' . $image->getClientOriginalExtension();

            // Move the file to the uploads/about directory
            $image->move(public_path('uploads/about'), $fileName);

            // Store the file name in the database
            $aboutUs->image = 'uploads/about/' . $fileName;
        }

        $aboutUs->save();

        return redirect()->route('about-us.index')->with('success', 'About Us created successfully.');
    }

    public function edit($id)
    {
        $aboutUs = AboutUs::findOrFail($id);
        return view('admin.pages.about-us.edit', compact('aboutUs'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $aboutUs = AboutUs::findOrFail($id);
        $aboutUs->title = $request->title;
        $aboutUs->description = $request->description;

        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($aboutUs->image && file_exists(public_path($aboutUs->image))) {
                unlink(public_path($aboutUs->image));
            }

            // Get the new image from the request
            $image = $request->file('image');

            // Generate a unique file name with the original extension
            $fileName = time() . '.' . $image->getClientOriginalExtension();

            // Move the file to the uploads/about directory
            $image->move(public_path('uploads/about'), $fileName);

            // Store the new file name in the database
            $aboutUs->image = 'uploads/about/' . $fileName;
        }

        $aboutUs->save();

        return redirect()->route('about-us.index')->with('success', 'About Us updated successfully.');
    }

    public function destroy(AboutUs $aboutUs)
    {
        // Delete the image from storage if it exists
        if ($aboutUs->image && file_exists(public_path($aboutUs->image))) {
            unlink(public_path($aboutUs->image));
        }

        $aboutUs->delete();
        return redirect()->route('about-us.index')->with('success', 'About Us deleted successfully.');
    }
}
