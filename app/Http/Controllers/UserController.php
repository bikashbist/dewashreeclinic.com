<?php

namespace App\Http\Controllers;
use App\Models\AboutUs;
use App\Models\MenuProduct;
use App\Models\ContactInfo;
use App\Models\Gallery;
use App\Models\MenuCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $contactInfo = ContactInfo::first();
        $about = AboutUs::first();
        $gallery = Gallery::all();
        $categories = MenuCategory::with('products')->get();
        
        return view('users/user-dashboard', compact('about', 'contactInfo','gallery','categories'));
    }
    
}
