<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Ледовый каток') — {{ config('app.name') }}</title>

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
        <style>
            .shadow-card { box-shadow: 0 4px 20px rgba(0,0,0,0.06); }
            .shadow-card-hover { box-shadow: 0 8px 30px rgba(65,179,163,0.15); }
            .animate-fade-in { animation: fadeIn 0.6s ease-out forwards; opacity: 0; }
            @keyframes fadeIn { from { opacity: 0; transform: translateY(16px); } to { opacity: 1; transform: translateY(0); } }
        </style>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var btn = document.getElementById('mobile-menu-btn');
                var menu = document.getElementById('mobile-menu');
                if (btn && menu) btn.addEventListener('click', function() { menu.classList.toggle('hidden'); });
                var phoneInput = document.querySelector('input[name="phone"]');
                if (phoneInput) {
                    phoneInput.addEventListener('input', function(e) {
                        var v = e.target.value.replace(/\D/g, '');
                        if (v.startsWith('8')) v = '7' + v.slice(1);
                        if (v.startsWith('7')) v = v.slice(1);
                        v = v.slice(0, 10);
                        var f = '+7';
                        if (v.length > 0) f += ' (' + v.slice(0, 3);
                        if (v.length >= 3) f += ') ' + v.slice(3, 6);
                        if (v.length >= 6) f += '-' + v.slice(6, 8);
                        if (v.length >= 8) f += '-' + v.slice(8, 10);
                        e.target.value = f;
                    });
                    phoneInput.addEventListener('focus', function(e) { if (e.target.value === '') e.target.value = '+7 ('; });
                    phoneInput.addEventListener('blur', function(e) { if (e.target.value === '+7 (' || e.target.value === '+7') e.target.value = ''; });
                }
            });
        </script>
    @endif
    @stack('styles')
</head>
<body class="font-sans antialiased bg-white text-gray-800 min-h-screen flex flex-col">
    @include('partials.header')

    <main class="flex-1">
        @yield('content')
    </main>

    @include('partials.footer')

    @stack('scripts')
</body>
</html>
