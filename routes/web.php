<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FirmController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HeroImageController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ContactController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('products', [HomeController::class, 'product'])->name('products');
Route::get('products/{id}', [HomeController::class, 'productdetail'])->name('product.detail');
Route::get('our-images', [HomeController::class, 'gallery'])->name('images');
Route::get('about', [HomeController::class, 'about'])->name('about');
Route::get('members', [HomeController::class, 'members'])->name('members');
Route::get('contact', [HomeController::class, 'contact'])->name('contact');
Route::post('contact', [HomeController::class, 'contact_store'])->name('contact.store');

Route::middleware(['role:admin'])->group(function () {
    Route::get('/admin-dashboard', [AdminController::class, 'index']);
    // Route::resource('gallery', GalleryController::class);
    // Route::resource('product', ProductController::class);
});

Route::middleware(['role:user'])->group(function () {
    Route::resource('user', UserController::class);
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::resource('gallery', GalleryController::class);
    Route::resource('category', ProductCategoryController::class);
    Route::resource('event', EventController::class);
    Route::resource('heroimage', HeroImageController::class);
    Route::resource('team', TeamController::class);
    Route::resource('logo', LogoController::class);

    Route::get('admin-contact',[ContactController::class, 'index'])->name('admin.contact');
    Route::put('/admin-contact/{contact}', [ContactController::class, 'update'])->name('contact.changestatus');

    Route::get('/event/{id}/addimage', [EventController::class, 'addimage'])->name('event.addimage');
    Route::post('/event/{event}', [EventController::class, 'saveimage'])->name('event.saveimage');
    Route::resource('product', ProductController::class)->except(['create', 'store']);
    // Show the form to create a product under a specific category
    Route::get('/category/{category}/product/create', [ProductController::class, 'create'])->name('product.create');
    // Handle the POST request to store a product under a category
    Route::post('/category/{category}/product', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/{id}/addimage', [ProductController::class, 'addimage'])->name('product.addimage');
    Route::post('/product/{product}', [ProductController::class, 'saveimage'])->name('product.saveimage');
    Route::get('/product/{product}/changedp', [ProductController::class, 'changeimage'])->name('product.changeimage');
    Route::put('/product/{product}/changedp', [ProductController::class, 'savechangeimage'])->name('product.savechangeimage');
    Route::delete('/product/{product}/deleteimage', [ProductController::class, 'destroyimage'])->name('productimage.destroy');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/edit', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/edit-profile-picture', [ProfileController::class, 'changeimage'])->name('profile.editprofilepicture');
    Route::post('/profile/edit-profile-picture', [ProfileController::class, 'savechangeimage'])->name('profile.updateprofilepicture');
    Route::get('/profile/changepassword', [ProfileController::class, 'changepassword'])->name('profile.changepassword');
    Route::delete('/profile/delete', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['role:firm_admin'])->group(function () {
    Route::get('/firm-dashboard', [FirmController::class, 'index']);
    // Route::resource('profile', ProfileController::class);
});

require __DIR__.'/auth.php';
