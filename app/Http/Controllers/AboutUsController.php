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

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $aboutUs = new AboutUs();
        $aboutUs->title = $request->title;
        $aboutUs->description = $request->description;
    
        if ($request->hasFile('image')) {
            $filePath = $request->file('image')->store('about-images', 'public');
            $aboutUs->image = $filePath;
        }
    
        $aboutUs->save();
    
        return redirect()->route('about-us.index')->with('success', 'About Us created successfully.');
    }
    

    public function edit($id)
    {
        $aboutUs = AboutUs::findOrFail($id);
        return view('admin.pages.about-us.edit', compact('aboutUs'));
    }
    
    public function update(Request $request, $id) {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $aboutUs = AboutUs::findOrFail($id);
        $aboutUs->title = $request->title;
        $aboutUs->description = $request->description;
    
        if ($request->hasFile('image')) {
            $filePath = $request->file('image')->store('about-images', 'public');
            $aboutUs->image = $filePath;
        }
    
        $aboutUs->save();
    
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
