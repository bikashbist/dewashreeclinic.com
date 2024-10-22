<?php

namespace App\Http\Controllers;

use App\Models\MenuProduct;
use App\Models\MenuCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; // Import File facade

class MenuProductController extends Controller
{
    // Display the list of products
    public function index()
    {
        $products = MenuProduct::with('category')->get();
        return view('admin/pages/menu-products.index', compact('products'));
    }

    // Show the form for creating a new product
    public function create()
    {
        $categories = MenuCategory::all();
        return view('admin/pages/menu-products.create', compact('categories'));
    }

    // Store the newly created product in the database
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'menu_category_id' => 'required|exists:menu_categories,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle the file upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            // Define the new file name
            $imageName = time() . '_' . $image->getClientOriginalName();
            // Move the image to the 'uploads/menu_products' directory
            $imagePath = 'uploads/menu_products/' . $imageName;
            $image->move(public_path('uploads/menu_products'), $imageName);
        }

        // Store the product with the image path
        MenuProduct::create([
            'menu_category_id' => $request->menu_category_id,
            'name' => $request->name,
            'price' => $request->price,
            'image' => $imagePath,
        ]);

        return redirect()->route('menu-products.index')->with('success', 'Product created successfully.');
    }

    // Show the form for editing an existing product
    public function edit(MenuProduct $menuProduct)
    {
        $categories = MenuCategory::all();
        return view('admin/pages/menu-products.edit', compact('menuProduct', 'categories'));
    }

    // Update the product in the database
    public function update(Request $request, MenuProduct $menuProduct)
    {
        $request->validate([
            'menu_category_id' => 'required|exists:menu_categories,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle the file upload
        if ($request->hasFile('image')) {
            // Delete the old image if exists
            if ($menuProduct->image) {
                $oldImagePath = public_path($menuProduct->image);
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }

            // Move the new image
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = 'uploads/menu_products/' . $imageName;
            $image->move(public_path('uploads/menu_products'), $imageName);
            $menuProduct->image = $imagePath;
        }

        // Update the product details
        $menuProduct->update([
            'menu_category_id' => $request->menu_category_id,
            'name' => $request->name,
            'price' => $request->price,
            'image' => $menuProduct->image,
        ]);

        return redirect()->route('menu-products.index')->with('success', 'Product updated successfully.');
    }

    // Delete a product from the database
    public function destroy(MenuProduct $menuProduct)
    {
        // Delete the image from storage if exists
        if ($menuProduct->image) {
            $imagePath = public_path($menuProduct->image);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }

        // Delete the product from the database
        $menuProduct->delete();

        return redirect()->route('menu-products.index')->with('success', 'Product deleted successfully.');
    }
}
