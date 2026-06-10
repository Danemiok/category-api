<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-8">

    <div class="max-w-3xl mx-auto bg-white rounded-xl shadow p-6">

        <div class="flex items-center justify-between mb-6">
            <h2 class="text-xl font-semibold text-gray-700">Edit Categories</h2>
            <a href="{{ route('categories.index') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-4 py-2 rounded-lg">
                Back
            </a>
        </div>

        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Name --}}
            <div class="mb-4">
                <label class="block text-sm text-gray-600 mb-1">Name</label>
                <input type="text" name="name"
                       value="{{ old('name', $category->name) }}"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Description --}}
            <div class="mb-4">
                <label class="block text-sm text-gray-600 mb-1">Description</label>
                <textarea name="description" rows="4"
                          class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">{{ old('description', $category->description) }}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Is Active --}}
            <div class="mb-6 flex items-center gap-2">
                <input type="checkbox" name="is_active" id="is_active" value="1"
                       {{ old('is_active', $category->is_active) ? 'checked' : '' }}
                       class="w-4 h-4 text-blue-600">
                <label for="is_active" class="text-sm text-gray-600">Is Active</label>
            </div>

            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-6 py-2 rounded-lg">
                Update
            </button>
        </form>

    </div>

</body>
</html>