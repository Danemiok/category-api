<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

    {{-- Navbar --}}
    <nav class="bg-white shadow">
        <div class="max-w-6xl mx-auto px-6">
            <div class="flex items-center justify-between h-16">

                <div class="flex items-center gap-8">
                    <a href="{{ url('/') }}" class="text-lg font-bold text-gray-800">
                        Admin Panel
                    </a>

                    <div class="flex gap-6">
                        <a href="{{ route('categories.index') }}"
                           class="text-sm font-medium {{ request()->routeIs('categories.*') ? 'text-blue-600' : 'text-gray-600 hover:text-blue-600' }}">
                            Categories
                        </a>

                        <a href="{{ route('products.index') }}"
                           class="text-sm font-medium {{ request()->routeIs('products.*') ? 'text-blue-600' : 'text-gray-600 hover:text-blue-600' }}">
                            Products
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </nav>

    {{-- Page Content --}}
    <main class="max-w-6xl mx-auto p-6">

        {{-- Success Message --}}
        @if(session('success'))
            <div class="mb-4 px-4 py-3 bg-green-100 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')

    </main>

</body>
</html>