<?php

use App\Http\Controllers\CategoryViewController; // ← Web controller
use App\Http\Controllers\ProductViewController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('categories.index');
});

Route::resource('categories', CategoryViewController::class);
Route::resource('products', ProductViewController::class);  