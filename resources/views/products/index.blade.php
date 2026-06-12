@extends('layouts.app')

@section('title', 'Products')

@section('content')

<div class="bg-white rounded-xl shadow p-6">

    <div class="flex items-center justify-between mb-6">
        <h2 class="text-xl font-semibold text-gray-700">Products</h2>
        <a href="{{ route('products.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-4 py-2 rounded-lg">
            Add Product
        </a>
    </div>

    <table class="w-full text-sm text-left border-collapse">
        <thead>
            <tr class="border-b bg-gray-50">
                <th class="px-4 py-3 font-semibold text-gray-600">ID</th>
                <th class="px-4 py-3 font-semibold text-gray-600">Name</th>
                <th class="px-4 py-3 font-semibold text-gray-600">Category</th>
                <th class="px-4 py-3 font-semibold text-gray-600">Description</th>
                <th class="px-4 py-3 font-semibold text-gray-600">Price</th>
                <th class="px-4 py-3 font-semibold text-gray-600">Stock</th>
                <th class="px-4 py-3 font-semibold text-gray-600">Is Active</th>
                <th class="px-4 py-3 font-semibold text-gray-600">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
            <tr class="border-b hover:bg-gray-50">
                <td class="px-4 py-3 text-gray-700">{{ $product->id }}</td>
                <td class="px-4 py-3 text-gray-700">{{ $product->name }}</td>
                <td class="px-4 py-3 text-gray-500">{{ $product->category->name ?? '-' }}</td>
                <td class="px-4 py-3 text-gray-500">{{ $product->description }}</td>
                <td class="px-4 py-3 text-gray-700">${{ number_format($product->price, 2) }}</td>
                <td class="px-4 py-3 text-gray-700">{{ $product->stock }}</td>
                <td class="px-4 py-3">
                    @if($product->is_active)
                        <span class="text-green-600 font-medium">Active</span>
                    @else
                        <span class="text-gray-400 font-medium">In-Active</span>
                    @endif
                </td>
                <td class="px-4 py-3 space-x-2">
                    <a href="{{ route('products.edit', $product->id) }}"
                       class="text-blue-600 hover:underline">Edit</a>

                    <form action="{{ route('products.destroy', $product->id) }}"
                          method="POST" class="inline"
                          onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="text-blue-600 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="px-4 py-6 text-center text-gray-400">
                    No products found.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection