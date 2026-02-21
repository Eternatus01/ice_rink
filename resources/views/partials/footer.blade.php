<footer class="bg-gray-50 border-t border-gray-100 mt-auto">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="flex flex-col md:flex-row items-center justify-between gap-6">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 rounded-lg bg-ice-teal flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2z"/>
                    </svg>
                </div>
                <span class="font-semibold text-gray-800">Ледовый каток</span>
            </div>
            <div class="flex gap-8 text-sm text-gray-600">
                <a href="{{ route('home') }}" class="hover:text-ice-teal transition-colors">Главная</a>
                <a href="{{ route('booking.index') }}" class="hover:text-ice-teal transition-colors">Бронирование</a>
            </div>
        </div>
        <p class="mt-8 text-center text-sm text-gray-500">© {{ date('Y') }} Ледовый каток. Все права защищены.</p>
    </div>
</footer>
