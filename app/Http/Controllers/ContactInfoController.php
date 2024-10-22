<?php

namespace App\Http\Controllers;

use App\Models\ContactInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ContactInfoController extends Controller
{
    // Display the contact info
    public function index()
    {
        $contactInfo = ContactInfo::first();
        return view('admin.pages.contact-info.index', compact('contactInfo'));
    }

    // Show the form for creating new contact info
    public function create()
    {
        return view('admin.pages.contact-info.create');
    }

    // Store the newly created contact info in the database
    public function store(Request $request)
    {
        $request->validate([
            'phone' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = time() . '_' . $logo->getClientOriginalName();
            // Store logo inside the uploads folder
            $logoPath = 'uploads/contact_info/' . $logoName;
            $logo->move(public_path('uploads/contact_info'), $logoName);
        }

        ContactInfo::create([
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'logo' => $logoPath,
        ]);

        return redirect()->route('contact-info.index')->with('success', 'Contact Info created successfully.');
    }

    // Show the form for editing existing contact info
    public function edit($id)
    {
        $contactInfo = ContactInfo::findOrFail($id);
        return view('admin.pages.contact-info.edit', compact('contactInfo'));
    }

    // Update the contact info in the database
    public function update(Request $request, ContactInfo $contactInfo)
    {
        $request->validate([
            'phone' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $logoPath = $contactInfo->logo;
        if ($request->hasFile('logo')) {
            // Delete the old logo if exists
            if ($contactInfo->logo) {
                $oldLogoPath = public_path($contactInfo->logo);
                if (File::exists($oldLogoPath)) {
                    File::delete($oldLogoPath);
                }
            }
            // Move the new logo
            $logo = $request->file('logo');
            $logoName = time() . '_' . $logo->getClientOriginalName();
            $logoPath = 'uploads/contact_info/' . $logoName;
            $logo->move(public_path('uploads/contact_info'), $logoName);
        }

        $contactInfo->update([
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'logo' => $logoPath,
        ]);

        return redirect()->route('contact-info.index')->with('success', 'Contact Info updated successfully.');
    }

    // Delete contact info from the database
    public function destroy(ContactInfo $contactInfo)
    {
        // Delete the logo from storage if exists
        if ($contactInfo->logo) {
            $logoPath = public_path($contactInfo->logo);
            if (File::exists($logoPath)) {
                File::delete($logoPath);
            }
        }
        $contactInfo->delete();
        return redirect()->route('contact-info.index')->with('success', 'Contact Info deleted successfully.');
    }
}
