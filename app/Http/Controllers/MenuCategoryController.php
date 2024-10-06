<?php

namespace App\Http\Controllers;

use App\Models\MenuCategory;
use Illuminate\Http\Request;

class MenuCategoryController extends Controller
{
    public function index()
    {
        $categories = MenuCategory::all();
        return view('admin/pages/menu-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin/pages/menu-categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        MenuCategory::create([
            'name' => $request->name,
        ]);

        return redirect()->route('menu-categories.index')->with('success', 'Category created successfully.');
    }

    public function edit(MenuCategory $menuCategory)
    {
        return view('admin/pages/menu-categories.edit', compact('menuCategory'));
    }

    public function update(Request $request, MenuCategory $menuCategory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $menuCategory->update([
            'name' => $request->name,
        ]);

        return redirect()->route('menu-categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(MenuCategory $menuCategory)
    {
        $menuCategory->delete();
        return redirect()->route('menu-categories.index')->with('success', 'Category deleted successfully.');
    }
}

