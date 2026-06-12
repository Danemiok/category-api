@extends('layouts.app')

@section('title', 'Edit Product')

@section('content')

<div class="max-w-3xl bg-white rounded-xl shadow p-6">

    <div class="flex items-center justify-between mb-6">
        <h2 class="text-xl font-semibold text-gray-700">Edit Product</h2>
        <a href="{{ route('products.index') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-4 py-2 rounded-lg">
            Back
        </a>
    </div>

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-sm text-gray-600 mb-1">Category</label>
            <select name="category_id"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
                <option value="">-- Select Category --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @if($errors->has('category_id'))
                <p class="text-red-500 text-xs mt-1">{{ $errors->first('category_id') }}</p>
            @endif
        </div>

        <div class="mb-4">
            <label class="block text-sm text-gray-600 mb-1">Name</label>
            <input type="text" name="name" value="{{ old('name', $product->name) }}"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
            @if($errors->has('name'))
                <p class="text-red-500 text-xs mt-1">{{ $errors->first('name') }}</p>
            @endif
        </div>

        <div class="mb-4">
            <label class="block text-sm text-gray-600 mb-1">Description</label>
            <textarea name="description" rows="4"
                      class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">{{ old('description', $product->description) }}</textarea>
            @if($errors->has('description'))
                <p class="text-red-500 text-xs mt-1">{{ $errors->first('description') }}</p>
            @endif
        </div>

        <div class="mb-4">
            <label class="block text-sm text-gray-600 mb-1">Price</label>
            <input type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
            @if($errors->has('price'))
                <p class="text-red-500 text-xs mt-1">{{ $errors->first('price') }}</p>
            @endif
        </div>

        <div class="mb-4">
            <label class="block text-sm text-gray-600 mb-1">Stock</label>
            <input type="number" name="stock" value="{{ old('stock', $product->stock) }}"
                   class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
            @if($errors->has('stock'))
                <p class="text-red-500 text-xs mt-1">{{ $errors->first('stock') }}</p>
            @endif
        </div>

        <div class="mb-6 flex items-center gap-2">
            <input type="checkbox" name="is_active" id="is_active" value="1"
                   {{ old('is_active', $product->is_active) ? 'checked' : '' }}
                   class="w-4 h-4 text-blue-600">
            <label for="is_active" class="text-sm text-gray-600">Is Active</label>
        </div>

        <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-6 py-2 rounded-lg">
            Update
        </button>
    </form>

</div>

@endsection