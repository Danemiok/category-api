<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-8">

    <div class="max-w-5xl mx-auto bg-white rounded-xl shadow p-6">

        {{-- Success Message --}}
        @if(session('success'))
            <div class="mb-4 px-4 py-3 bg-green-100 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex items-center justify-between mb-6">
            <h2 class="text-xl font-semibold text-gray-700">Categories</h2>
            <a href="{{ route('categories.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-4 py-2 rounded-lg">
                Add Category
            </a>
        </div>

        <table class="w-full text-sm text-left border-collapse">
            <thead>
                <tr class="border-b bg-gray-50">
                    <th class="px-4 py-3 font-semibold text-gray-600">ID</th>
                    <th class="px-4 py-3 font-semibold text-gray-600">Name</th>
                    <th class="px-4 py-3 font-semibold text-gray-600">Description</th>
                    <th class="px-4 py-3 font-semibold text-gray-600">Is Active</th>
                    <th class="px-4 py-3 font-semibold text-gray-600">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-3 text-gray-700">{{ $category->id }}</td>
                    <td class="px-4 py-3 text-gray-700">{{ $category->name }}</td>
                    <td class="px-4 py-3 text-gray-500">{{ $category->description }}</td>
                    <td class="px-4 py-3">
                        @if($category->is_active)
                            <span class="text-green-600 font-medium">Active</span>
                        @else
                            <span class="text-gray-400 font-medium">In-Active</span>
                        @endif
                    </td>
                    <td class="px-4 py-3 space-x-2">
                        <a href="{{ route('categories.edit', $category->id) }}"
                           class="text-blue-600 hover:underline">Edit</a>

                        <form action="{{ route('categories.destroy', $category->id) }}"
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
                    <td colspan="5" class="px-4 py-6 text-center text-gray-400">
                        No categories found.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</body>
</html>