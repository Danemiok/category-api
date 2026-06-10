<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use Illuminate\Http\Request;
use App\Http\Resources\CategoryResource;
use App\Models\Category;

class CategoryController extends Controller
{
    // GET /api/categories
    public function index()
    {
        $categories = Category::latest()->get();

        return response()->json([
            'success' => true,
            'message' => 'Categories retrieved successfully.',
            'data'    => CategoryResource::collection($categories),
        ], 200);
    }

    // POST /api/categories
    public function store(StoreCategoryRequest $request)
    {
        $category = Category::create([
            'name'        => $request->name,
            'description' => $request->description,
            'is_active'   => $request->is_active ?? false,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Category created successfully.',
            'data'    => new CategoryResource($category),
        ], 201);
    }

    // GET /api/categories/{id}
    public function show(Category $category)
    {
        return response()->json([
            'success' => true,
            'message' => 'Category retrieved successfully.',
            'data'    => new CategoryResource($category),
        ], 200);
    }

    // PUT /api/categories/{id}
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update([
            'name'        => $request->name,
            'description' => $request->description,
            'is_active'   => $request->is_active ?? $category->is_active,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Category updated successfully.',
            'data'    => new CategoryResource($category),
        ], 200);
    }

    // DELETE /api/categories/{id}
    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json([
            'success' => true,
            'message' => 'Category deleted successfully.',
            'data'    => null,
        ], 200);
    }
}