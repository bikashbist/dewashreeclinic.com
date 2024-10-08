<?php

namespace App\Http\Controllers;

use App\Models\MenuProduct;
use App\Models\MenuCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuProductController extends Controller
{
    public function index()
    {
        $products = MenuProduct::with('category')->get();
        return view('admin/pages/menu-products.index', compact('products'));
    }

    public function create()
    {
        $categories = MenuCategory::all();
        return view('admin/pages/menu-products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'menu_category_id' => 'required|exists:menu_categories,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->file('image') ? $request->file('image')->store('menu_products', 'public') : null;

        MenuProduct::create([
            'menu_category_id' => $request->menu_category_id,
            'name' => $request->name,
            'price' => $request->price,
            'image' => $imagePath,
        ]);

        return redirect()->route('menu-products.index')->with('success', 'Product created successfully.');
    }

    public function edit(MenuProduct $menuProduct)
    {
        $categories = MenuCategory::all();
        return view('admin/pages/menu-products.edit', compact('menuProduct', 'categories'));
    }

    public function update(Request $request, MenuProduct $menuProduct)
    {
        $request->validate([
            'menu_category_id' => 'required|exists:menu_categories,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($menuProduct->image) {
                Storage::delete('public/' . $menuProduct->image);
            }
            $imagePath = $request->file('image')->store('menu_products', 'public');
        } else {
            $imagePath = $menuProduct->image;
        }

        $menuProduct->update([
            'menu_category_id' => $request->menu_category_id,
            'name' => $request->name,
            'price' => $request->price,
            'image' => $imagePath,
        ]);

        return redirect()->route('menu-products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(MenuProduct $menuProduct)
    {
        if ($menuProduct->image) {
            Storage::delete('public/' . $menuProduct->image);
        }

        $menuProduct->delete();

        return redirect()->route('menu-products.index')->with('success', 'Product deleted successfully.');
    }
}
