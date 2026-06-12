<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;

class ProductController extends Controller
{
    // GET /api/products
    public function index()
    {
        $products = Product::with('category')->latest()->get();

        return response()->json([
            'success' => true,
            'message' => 'Products retrieved successfully.',
            'data'    => ProductResource::collection($products),
        ], 200);
    }

    // POST /api/products
    public function store(StoreProductRequest $request)
    {
        $product = Product::create([
            'category_id' => $request->category_id,
            'name'        => $request->name,
            'description' => $request->description,
            'price'       => $request->price,
            'stock'       => $request->stock,
            'is_active'   => $request->is_active ?? false,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Product created successfully.',
            'data'    => new ProductResource($product->load('category')),
        ], 201);
    }

    // GET /api/products/{id}
    public function show(Product $product)
    {
        return response()->json([
            'success' => true,
            'message' => 'Product retrieved successfully.',
            'data'    => new ProductResource($product->load('category')),
        ], 200);
    }

    // PUT /api/products/{id}
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update([
            'category_id' => $request->category_id,
            'name'        => $request->name,
            'description' => $request->description,
            'price'       => $request->price,
            'stock'       => $request->stock,
            'is_active'   => $request->is_active ?? $product->is_active,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Product updated successfully.',
            'data'    => new ProductResource($product->load('category')),
        ], 200);
    }

    // DELETE /api/products/{id}
    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json([
            'success' => true,
            'message' => 'Product deleted successfully.',
            'data'    => null,
        ], 200);
    }
}