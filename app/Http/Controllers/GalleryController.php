<?php


namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::all();
        return view('admin.pages.gallery.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.pages.gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image_name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle file upload
        $imagePath = $request->file('image')->store('images/gallery', 'public');

        Gallery::create([
            'image_name' => $request->image_name,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('gallery.index')->with('success', 'Image added to gallery successfully.');
    }

    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('admin.pages.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'image_name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $gallery->image_path;

        // Handle file upload
        if ($request->hasFile('image')) {
            \Storage::disk('public')->delete($gallery->image_path);
            $imagePath = $request->file('image')->store('images/gallery', 'public');
        }

        $gallery->update([
            'image_name' => $request->image_name,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('gallery.index')->with('success', 'Gallery updated successfully.');
    }

    public function destroy(Gallery $gallery)
    {
        \Storage::disk('public')->delete($gallery->image_path);
        $gallery->delete();

        return redirect()->route('gallery.index')->with('success', 'Gallery deleted successfully.');
    }
}
