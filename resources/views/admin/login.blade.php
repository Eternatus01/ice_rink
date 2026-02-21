<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Вход — Админ</title>
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
                            ice: { coral: '#E27D60', sky: '#85CDCB', peach: '#E8A87C', rose: '#C38D9E', teal: '#41B3A3' }
                        }
                    }
                }
            }
        </script>
    @endif
</head>
<body class="font-sans antialiased bg-gray-50 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-sm p-8 bg-white rounded-2xl shadow-card border border-gray-100">
        <h1 class="text-xl font-bold text-gray-800 mb-6">Вход в админ-панель</h1>
        @if (session('error'))
            <div class="mb-4 p-3 rounded-lg bg-red-50 text-red-700 text-sm">{{ session('error') }}</div>
        @endif
        <form action="{{ route('admin.login') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Пароль</label>
                <input type="password" name="password" required
                    class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-ice-teal focus:ring-2 focus:ring-ice-teal/20">
            </div>
            <button type="submit" class="w-full py-3 rounded-xl bg-ice-teal text-white font-semibold hover:bg-ice-coral transition-colors">
                Войти
            </button>
        </form>
    </div>
</body>
</html>
