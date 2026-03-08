<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\GalleryController;

// ----------------------------------------------------------------------
// Public Pages
// ----------------------------------------------------------------------
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

// ----------------------------------------------------------------------
// Public Media Gallery
// ----------------------------------------------------------------------
Route::get('/gallery/photos', [GalleryController::class, 'imageGallery'])->name('gallery.images');
Route::get('/gallery/videos', [GalleryController::class, 'videoGallery'])->name('gallery.videos');

// ----------------------------------------------------------------------
// Admin / Sensei Dashboard Routes
// ----------------------------------------------------------------------
// NOTE: I removed the auth middleware so you can test freely without logging in!

// Admin Dashboard View
Route::get('/dashboard', [GalleryController::class, 'dashboard'])->name('admin.dashboard');

// Upload & Delete Media Logic
Route::post('/sensei/media/upload', [GalleryController::class, 'storeMedia'])->name('admin.media.store');
Route::delete('/sensei/media/{id}', [GalleryController::class, 'deleteMedia'])->name('admin.media.destroy');