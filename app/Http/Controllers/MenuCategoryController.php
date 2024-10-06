<?php

namespace App\Http\Controllers;

use App\Models\MenuCategory;
use Illuminate\Http\Request;

class MenuCategoryController extends Controller
{
    // Display the list of categories
    public function index()
    {
        $categories = MenuCategory::all();
        return view('admin.pages.menu-categories.index', compact('categories'));
    }

    // Show the form for creating a new category
    public function create()
    {
        return view('admin.pages.menu-categories.create');
    }

    // Store the newly created category in the database
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle the file upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('menu_categories', 'public');
        }

        // Store the category with the image path
        MenuCategory::create([
            'name' => $request->name,
            'image' => $imagePath,
        ]);

        return redirect()->route('menu-categories.index')->with('success', 'Category created successfully.');
    }

    // Show the form for editing an existing category
    public function edit(MenuCategory $menuCategory)
    {
        return view('admin.pages.menu-categories.edit', compact('menuCategory'));
    }

    // Update the category in the database
    public function update(Request $request, MenuCategory $menuCategory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle the file upload
        if ($request->hasFile('image')) {
            // Delete the old image if exists
            if ($menuCategory->image) {
                \Storage::disk('public')->delete($menuCategory->image);
            }

            // Store the new image
            $imagePath = $request->file('image')->store('menu_categories', 'public');
            $menuCategory->image = $imagePath;
        }

        // Update the name and image
        $menuCategory->update([
            'name' => $request->name,
            'image' => $menuCategory->image,
        ]);

        return redirect()->route('menu-categories.index')->with('success', 'Category updated successfully.');
    }

    // Delete a category from the database
    public function destroy(MenuCategory $menuCategory)
    {
        // Delete the image from storage if exists
        if ($menuCategory->image) {
            \Storage::disk('public')->delete($menuCategory->image);
        }

        // Delete the category from the database
        $menuCategory->delete();

        return redirect()->route('menu-categories.index')->with('success', 'Category deleted successfully.');
    }
}
