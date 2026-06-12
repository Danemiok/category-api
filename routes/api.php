<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Support\Facades\Route;

Route::apiResource('categories', CategoryController::class)
    ->names('api.categories');

Route::apiResource('products', ProductController::class)->names('api.products');