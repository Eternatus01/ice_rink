<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Админ') — {{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=manrope:400,500,600,700&display=swap" rel="stylesheet" />
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            ice: {
                                coral: '#E27D60',
                                sky: '#85CDCB',
                                peach: '#E8A87C',
                                rose: '#C38D9E',
                                teal: '#41B3A3',
                            }
                        }
                    }
                }
            }
        </script>
        <style>.shadow-card { box-shadow: 0 4px 20px rgba(0,0,0,0.06); }</style>
    @endif
</head>
<body class="font-sans antialiased bg-gray-50 text-gray-800 min-h-screen">
    <div class="flex flex-col md:flex-row">
        <aside class="w-full md:w-64 shrink-0 bg-white border-b md:border-b-0 md:border-r border-gray-200 p-4">
            <a href="{{ route('admin.index') }}" class="block font-semibold text-lg text-gray-800 mb-6">Админ-панель</a>
            <nav class="flex flex-wrap gap-2 md:flex-col md:gap-1">
                <a href="{{ route('admin.index') }}" class="px-4 py-2 rounded-lg text-gray-600 hover:bg-ice-teal/10 hover:text-ice-teal transition-colors">Главная</a>
                <a href="{{ route('admin.skates.index') }}" class="px-4 py-2 rounded-lg text-gray-600 hover:bg-ice-teal/10 hover:text-ice-teal transition-colors">Коньки</a>
                <a href="{{ route('admin.bookings.index') }}" class="px-4 py-2 rounded-lg text-gray-600 hover:bg-ice-teal/10 hover:text-ice-teal transition-colors">Бронирования</a>
                <a href="{{ route('admin.tickets.index') }}" class="px-4 py-2 rounded-lg text-gray-600 hover:bg-ice-teal/10 hover:text-ice-teal transition-colors">Билеты</a>
            </nav>
            <a href="{{ route('home') }}" class="block mt-8 px-4 py-2 rounded-lg text-gray-600 hover:bg-ice-teal/10 hover:text-ice-teal transition-colors w-fit">← На сайт</a>
        </aside>
        <main class="flex-1 p-4 sm:p-6 md:p-8 overflow-x-auto">
            @if (session('success'))
                <div class="mb-6 p-4 rounded-xl bg-ice-teal/10 border border-ice-teal/30 text-ice-teal">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="mb-6 p-4 rounded-xl bg-red-50 border border-red-200 text-red-700">{{ session('error') }}</div>
            @endif
            @yield('content')
        </main>
    </div>
</body>
</html>
