<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdvertisementController extends Controller
{
    // Display all advertisements
    public function index()
    {
        $advertisements = Advertisement::all();
        return view('admin.pages.advertisements.index', compact('advertisements'));
    }

    // Show form for creating a new advertisement
    public function create()
    {
        return view('admin.pages.advertisements.create');
    }

    // Store a new advertisement
    public function store(Request $request)
    {
        $request->validate([
            'image_name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Generate a unique file name with the current timestamp
        $filename = time() . '.' . $request->image->getClientOriginalExtension();
        
        // Move the uploaded file to the 'uploads/advertisment' directory
        $request->image->move(public_path('uploads/advertisment'), $filename);

        // Create a new advertisement with the uploaded image
        Advertisement::create([
            'image_name' => $request->image_name,
            'image' => 'uploads/advertisment/' . $filename, // Store the image path
        ]);

        return redirect()->route('advertisements.index')->with('success', 'Advertisement added successfully.');
    }

    // Show form for editing the advertisement
    public function edit(Advertisement $advertisement)
    {
        return view('admin.pages.advertisements.edit', compact('advertisement'));
    }

    // Update the advertisement
    public function update(Request $request, Advertisement $advertisement)
    {
        $request->validate([
            'image_name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($advertisement->image) {
                Storage::delete($advertisement->image);
            }

            // Generate a new filename with the current timestamp
            $filename = time() . '.' . $request->image->getClientOriginalExtension();

            // Move the new image to the 'uploads/advertisment' directory
            $request->image->move(public_path('uploads/advertisment'), $filename);

            // Update the advertisement image path
            $advertisement->image = 'uploads/advertisment/' . $filename;
        }

        // Update the other fields
        $advertisement->image_name = $request->image_name;
        $advertisement->save();

        return redirect()->route('advertisements.index')->with('success', 'Advertisement updated successfully.');
    }

    // Delete the advertisement
    public function destroy(Advertisement $advertisement)
    {
        // Delete the associated image
        Storage::delete($advertisement->image);
        $advertisement->delete();

        return redirect()->route('advertisements.index')->with('success', 'Advertisement deleted successfully.');
    }
}
