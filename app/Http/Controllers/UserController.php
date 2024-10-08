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
        
        return view('users.index', compact('about', 'contactInfo','gallery','categories'));
    }
    public function about() {
        $data = AboutUs::first();
        return view('users.pages.about',);

    }
    public function shop() {
        $data = AboutUs::first();
        return view('users.pages.shop',);

    }
    public function services() {
        $data = AboutUs::first();
        return view('users.pages.services',);

    }
    public function contact() {
        $data = AboutUs::first();
        return view('users.pages.contact',);

    }
    
}
