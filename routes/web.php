<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Frontend Website Routes
Route::get('/', function () {
    return view('home');
})->name('home');

// Dashboard route - redirects to admin dashboard
Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Admin Panel Routes (Protected by authentication)
Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified'])->group(function () {

    // Dashboard
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Inventory
    Route::get('/inventory', function () {
        return view('admin.inventory');
    })->name('inventory');

    // Products
    Route::prefix('products')->name('products.')->group(function () {
        Route::get('/create', function () {
            return view('admin.products.create');
        })->name('create');
    });

    // Reports
    Route::get('/reports', function () {
        return view('admin.reports');
    })->name('reports');

});

// Auth routes
require __DIR__.'/auth.php';
