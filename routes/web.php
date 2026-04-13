<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $categoryCount = Category::count();
    $productCount = Product::count();
    $recentProducts = Product::with('category')
        ->where('created_at', '>=', now()->subDays(7))
        ->latest()
        ->get();
    return view('dashboard', compact('categoryCount', 'productCount', 'recentProducts'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('orders', OrderController::class);

    // Redirect old sneat/dashboard to main dashboard
    Route::get('/sneat/dashboard', function () {
        return redirect()->route('dashboard');
    });
});

require __DIR__.'/auth.php';
