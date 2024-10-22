<?php

namespace App\Http\Controllers;
use App\Models\AboutUs;
use App\Models\MenuProduct;
use App\Models\ContactInfo;
use App\Models\Gallery;
use App\Models\Banner;
use App\Models\Advertisement;
use App\Models\MenuCategory;
use Illuminate\Support\Str;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $contactInfo = ContactInfo::first();
        $about = AboutUs::first();
        $gallery = Gallery::all();
        $banner = Banner::all();
        $adv = Advertisement::all();
        $categories = MenuCategory::with('products')->whereNotIn('id', [10, 11])->get();
        $featuredproducts = MenuCategory::with('products')
    ->whereIn('id', [10, 11])
    ->get();
    $serviceCategories = ServiceCategory::with('sproducts')->get();
        
  
        
        return view('users.index', compact('about', 'contactInfo','gallery','categories','banner','adv','featuredproducts','serviceCategories'));
    }
    public function about() {
        $contactInfo = ContactInfo::first();
        $about = AboutUs::first();
        return view('users.pages.about',compact('about','contactInfo'));

    }
    public function shop() {
        $categories = MenuCategory::with('products')->whereNotIn('id', [10, 11])->get();
        $contactInfo = ContactInfo::first();
        return view('users.pages.shop',compact('contactInfo','categories'));

    }
    public function services() {
        $data = AboutUs::first();
        $contactInfo = ContactInfo::first();
        return view('users.pages.services',compact('contactInfo'));


    }
    public function contact() {

        $contactInfo = ContactInfo::first();
        return view('users.pages.contact',compact('contactInfo'));

    }
    public function show(ServiceCategory $category)
    {
        // Fetch the specific category with related products
        $category->load('sproducts');
        $contactInfo = ContactInfo::first();
        // Pass the data to the view
        return view('users.services', compact('category','contactInfo'));
    }
    
}
