<header class="sticky top-0 z-50 bg-white/95 backdrop-blur-sm border-b border-gray-100 shadow-sm">
    <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 md:h-20">
            {{-- Логотип --}}
            <a href="{{ route('home') }}" class="flex items-center gap-2 group">
                <div class="w-10 h-10 rounded-xl bg-ice-teal flex items-center justify-center transition-all duration-300 group-hover:scale-105 group-hover:shadow-card">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z"/>
                    </svg>
                </div>
                <span class="font-semibold text-lg text-gray-800 hidden sm:block">Ледовый каток</span>
            </a>

            {{-- Навигация --}}
            <div class="hidden md:flex items-center gap-8">
                <a href="{{ route('home') }}#about" class="text-gray-600 hover:text-ice-teal transition-colors duration-200 font-medium">О катке</a>
                <a href="{{ route('home') }}#prices" class="text-gray-600 hover:text-ice-teal transition-colors duration-200 font-medium">Цены</a>
                <a href="{{ route('booking.index') }}" class="text-gray-600 hover:text-ice-teal transition-colors duration-200 font-medium">Бронирование</a>
                <a href="{{ route('home') }}#contacts" class="text-gray-600 hover:text-ice-teal transition-colors duration-200 font-medium">Контакты</a>
            </div>

            {{-- Мобильное меню кнопка --}}
            <button type="button" id="mobile-menu-btn" class="md:hidden p-2 rounded-lg text-gray-600 hover:bg-ice-teal/10" aria-label="Меню">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>

            {{-- Админ-панель --}}
            <a href="{{ route('admin.index') }}" class="hidden md:inline-flex items-center gap-2 px-4 py-2 rounded-xl text-gray-600 hover:text-ice-teal hover:bg-ice-teal/10 transition-colors font-medium text-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                Админ
            </a>
            {{-- Кнопка Купить билет (desktop) --}}
            <a href="{{ route('ticket.buy') }}" class="hidden md:inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-ice-teal text-white font-semibold text-sm shadow-card hover:bg-ice-coral hover:shadow-card-hover transition-all duration-300 hover:scale-[1.02] active:scale-[0.98]">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/>
                </svg>
                Купить билет
            </a>
        </div>

        {{-- Мобильное меню --}}
        <div id="mobile-menu" class="md:hidden hidden py-4 border-t border-gray-100">
            <div class="flex flex-col gap-2">
                <a href="{{ route('home') }}#about" class="px-4 py-2 text-gray-600 hover:bg-ice-teal/10 rounded-lg transition-colors">О катке</a>
                <a href="{{ route('home') }}#prices" class="px-4 py-2 text-gray-600 hover:bg-ice-teal/10 rounded-lg transition-colors">Цены</a>
                <a href="{{ route('booking.index') }}" class="px-4 py-2 text-gray-600 hover:bg-ice-teal/10 rounded-lg transition-colors">Бронирование</a>
                <a href="{{ route('home') }}#contacts" class="px-4 py-2 text-gray-600 hover:bg-ice-teal/10 rounded-lg transition-colors">Контакты</a>
                <a href="{{ route('admin.index') }}" class="px-4 py-2 text-gray-600 hover:bg-ice-teal/10 rounded-lg transition-colors">Админ-панель</a>
                <a href="{{ route('ticket.buy') }}" class="mx-4 mt-2 px-4 py-3 rounded-xl bg-ice-teal text-white font-semibold text-center hover:bg-ice-coral transition-colors">Купить билет</a>
            </div>
        </div>
    </nav>
</header>
