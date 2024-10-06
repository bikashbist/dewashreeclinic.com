<?php
// app/Http/Controllers/AboutUsController.php
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;

        // Handle file upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/about_us', 'public');
        }

        AboutUs::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('about-us.index')->with('success', 'About Us created successfully.');
    }

    public function edit($id)
    {
        $aboutUs = AboutUs::findOrFail($id);
        return view('admin.pages.about-us.edit', compact('aboutUs'));
    }
    
    public function update(Request $request, AboutUs $aboutUs)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $aboutUs->image;

        // Handle file upload
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($aboutUs->image) {
                \Storage::disk('public')->delete($aboutUs->image);
            }
            $imagePath = $request->file('image')->store('images/about_us', 'public');
        }

        $aboutUs->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('about-us.index')->with('success', 'About Us updated successfully.');
    }

    public function destroy(AboutUs $aboutUs)
    {
        // Delete the image from storage
        if ($aboutUs->image) {
            \Storage::disk('public')->delete($aboutUs->image);
        }
        $aboutUs->delete();
        return redirect()->route('about-us.index')->with('success', 'About Us deleted successfully.');
    }
}
