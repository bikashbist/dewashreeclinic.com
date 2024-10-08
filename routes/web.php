<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MenuCategoryController;
// routes/web.php
use App\Http\Controllers\MenuProductController;
// routes/web.php
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\GalleryController;

use App\Http\Controllers\ServiceCategoryController;
use App\Http\Controllers\ServiceProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\AdvertisementController;

// routes/web.php
use App\Http\Controllers\ContactInfoController;


use App\Http\Controllers\BannerController;



use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index']);
Route::get('/about', [UserController::class, 'about'])->name('about');
Route::get('/shop', [UserController::class, 'shop'])->name('shop');
Route::get('/services', [UserController::class, 'services'])->name('services');
Route::get('/contact', [UserController::class, 'contact'])->name('contact');

Route::get('/dashboard', function () {
    return view('admin/index');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');


Route::middleware(['auth'])->group(function () {
   
    Route::get('/admin/logout', [AdminController::class, 'Destroy'])->name('admin.logout');
    Route::resource('menu-categories', MenuCategoryController::class);
    Route::resource('menu-products', MenuProductController::class);
    Route::resource('about-us', AboutUsController::class);
    Route::resource('gallery', GalleryController::class);
    Route::resource('contact-info', ContactInfoController::class);
    Route::resource('service-categories', ServiceCategoryController::class);
    Route::resource('service-products', ServiceProductController::class);
    Route::get('/messages', [AdminController::class, 'Message'])->name('messages.index');
    Route::resource('banner', BannerController::class);
    Route::resource('advertisements', AdvertisementController::class);


});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
