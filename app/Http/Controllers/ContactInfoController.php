<?php

namespace App\Http\Controllers;

use App\Models\ContactInfo;
use Illuminate\Http\Request;

class ContactInfoController extends Controller
{
    public function index()
    {
        $contactInfo = ContactInfo::first();
        return view('admin.pages.contact-info.index', compact('contactInfo'));
    }

    public function create()
    {
        return view('admin.pages.contact-info.create');
    }

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
            $logoPath = $request->file('logo')->store('images/contact_info', 'public');
        }

        ContactInfo::create([
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'logo' => $logoPath,
        ]);

        return redirect()->route('contact-info.index')->with('success', 'Contact Info created successfully.');
    }

    public function edit($id)
    {
        $contactInfo = ContactInfo::findOrFail($id);
        return view('admin.pages.contact-info.edit', compact('contactInfo'));
    }

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
            if ($contactInfo->logo) {
                \Storage::disk('public')->delete($contactInfo->logo);
            }
            $logoPath = $request->file('logo')->store('images/contact_info', 'public');
        }

        $contactInfo->update([
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'logo' => $logoPath,
        ]);

        return redirect()->route('contact-info.index')->with('success', 'Contact Info updated successfully.');
    }

    public function destroy(ContactInfo $contactInfo)
    {
        if ($contactInfo->logo) {
            \Storage::disk('public')->delete($contactInfo->logo);
        }
        $contactInfo->delete();
        return redirect()->route('contact-info.index')->with('success', 'Contact Info deleted successfully.');
    }
}
