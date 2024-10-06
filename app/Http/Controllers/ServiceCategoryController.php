<?php

namespace App\Http\Controllers;

use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class ServiceCategoryController extends Controller
{
    public function index()
    {
        $categories = ServiceCategory::all();
        return view('admin.pages.service-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.pages.service-categories.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);
        ServiceCategory::create($request->all());
        return redirect()->route('service-categories.index')->with('success', 'Category created successfully.');
    }

    public function edit(ServiceCategory $serviceCategory)
    {
        return view('admin.pages.service-categories.edit', compact('serviceCategory'));
    }

    public function update(Request $request, ServiceCategory $serviceCategory)
    {
        $request->validate(['name' => 'required|string|max:255']);
        $serviceCategory->update($request->all());
        return redirect()->route('service-categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(ServiceCategory $serviceCategory)
    {
        $serviceCategory->delete();
        return redirect()->route('service-categories.index')->with('success', 'Category deleted successfully.');
    }
}
