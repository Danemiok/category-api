<?php

use App\Http\Controllers\CategoryViewController; // ← Web controller
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('categories.index');
});

Route::resource('categories', CategoryViewController::class);