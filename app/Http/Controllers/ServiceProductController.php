<?php

namespace App\Http\Controllers;

use App\Models\ServiceProduct;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class ServiceProductController extends Controller
{
    public function index()
    {
        $products = ServiceProduct::with('scategory')->get();
        return view('admin.pages.service-products.index', compact('products'));
    }


    public function create()
    {
        $categories = ServiceCategory::all();
        return view('admin.pages.service-products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_category_id' => 'required|exists:service_categories,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        ServiceProduct::create($request->all());

        return redirect()->route('service-products.index')->with('success', 'Product created successfully.');
    }

    public function edit(ServiceProduct $serviceProduct)
    {
        $categories = ServiceCategory::all();
        return view('admin.pages.service-products.edit', compact('serviceProduct', 'categories'));
    }

    public function update(Request $request, ServiceProduct $serviceProduct)
    {
        $request->validate([
            'service_category_id' => 'required|exists:service_categories,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $serviceProduct->update($request->all());

        return redirect()->route('service-products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(ServiceProduct $serviceProduct)
    {
        $serviceProduct->delete();
        return redirect()->route('service-products.index')->with('success', 'Product deleted successfully.');
    }
}

