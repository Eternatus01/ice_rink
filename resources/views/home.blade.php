@extends('layouts.app')

@section('title', 'Главная')

@section('content')
{{-- Hero секция --}}
<section class="relative overflow-hidden bg-gradient-to-br from-ice-teal/10 via-white to-ice-sky/10">
    <div class="absolute inset-0 opacity-30">
        <div class="absolute top-20 left-10 w-72 h-72 bg-ice-teal/20 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-ice-coral/10 rounded-full blur-3xl"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-20 md:py-28">
        <div class="text-center max-w-3xl mx-auto">
            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-gray-800 mb-6 animate-fade-in">
                Ледовый каток
            </h1>
            <p class="text-lg md:text-xl text-gray-600 mb-10 animate-fade-in" style="animation-delay: 0.1s">
                Катайтесь на коньках в комфортной атмосфере. Бронируйте коньки онлайн и наслаждайтесь льдом.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center animate-fade-in" style="animation-delay: 0.2s">
                <a href="{{ route('ticket.buy') }}" class="inline-flex items-center justify-center gap-2 px-8 py-4 rounded-xl bg-ice-teal text-white font-semibold shadow-card hover:bg-ice-coral hover:shadow-card-hover transition-all duration-300 hover:scale-[1.02]">
                    Купить билет — 300₽
                </a>
                <a href="{{ route('booking.index') }}" class="inline-flex items-center justify-center gap-2 px-8 py-4 rounded-xl border-2 border-ice-teal text-ice-teal font-semibold hover:bg-ice-teal/5 transition-all duration-300">
                    Забронировать коньки
                </a>
            </div>
        </div>
    </div>
</section>

{{-- О катке --}}
<section id="about" class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-800 text-center mb-12">О катке</h2>
        <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6 md:gap-8">
            <div class="p-6 sm:p-8 rounded-2xl bg-white border border-gray-100 shadow-card hover:shadow-card-hover transition-all duration-300 group">
                <div class="w-14 h-14 rounded-xl bg-ice-teal/10 flex items-center justify-center mb-6 group-hover:bg-ice-teal group-hover:scale-110 transition-all duration-300">
                    <svg class="w-7 h-7 text-ice-teal group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-3">Удобный график</h3>
                <p class="text-gray-600">Работаем ежедневно. Выберите удобное время для катания.</p>
            </div>
            <div class="p-6 sm:p-8 rounded-2xl bg-white border border-gray-100 shadow-card hover:shadow-card-hover transition-all duration-300 group">
                <div class="w-14 h-14 rounded-xl bg-ice-peach/30 flex items-center justify-center mb-6 group-hover:bg-ice-peach group-hover:scale-110 transition-all duration-300">
                    <svg class="w-7 h-7 text-ice-coral group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-3">Безопасность</h3>
                <p class="text-gray-600">Профессиональный лёд и прокат качественных коньков.</p>
            </div>
            <div class="p-6 sm:p-8 rounded-2xl bg-white border border-gray-100 shadow-card hover:shadow-card-hover transition-all duration-300 group">
                <div class="w-14 h-14 rounded-xl bg-ice-rose/30 flex items-center justify-center mb-6 group-hover:bg-ice-rose group-hover:scale-110 transition-all duration-300">
                    <svg class="w-7 h-7 text-ice-rose group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-3">Онлайн-бронирование</h3>
                <p class="text-gray-600">Забронируйте коньки заранее или приходите со своими.</p>
            </div>
        </div>
    </div>
</section>

{{-- Цены --}}
<section id="prices" class="py-16 md:py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-800 text-center mb-12">Цены</h2>
        <div class="grid sm:grid-cols-2 gap-6 md:gap-8 max-w-2xl mx-auto">
            <div class="p-6 sm:p-8 rounded-2xl bg-white shadow-card border-2 border-ice-teal hover:shadow-card-hover transition-all duration-300">
                <div class="text-ice-teal font-semibold mb-2">Вход на каток</div>
                <div class="text-4xl font-bold text-gray-800 mb-2">300₽</div>
                <p class="text-gray-600">Оплачивается один раз. Доступ на каток на весь день.</p>
            </div>
            <div class="p-6 sm:p-8 rounded-2xl bg-white shadow-card border border-gray-100 hover:border-ice-peach hover:shadow-card-hover transition-all duration-300">
                <div class="text-ice-peach font-semibold mb-2">Аренда коньков</div>
                <div class="text-4xl font-bold text-gray-800 mb-2">150₽ <span class="text-lg font-normal text-gray-500">/ час</span></div>
                <p class="text-gray-600">1, 2, 3 или 4 часа. Можно прийти со своими коньками.</p>
            </div>
        </div>
    </div>
</section>

{{-- CTA --}}
<section id="contacts" class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-6">Готовы кататься?</h2>
        <p class="text-gray-600 mb-8 max-w-xl mx-auto">Купите билет онлайн и забронируйте коньки. Оплата через ЮKassa — быстро и безопасно.</p>
        <a href="{{ route('ticket.buy') }}" class="inline-flex items-center gap-2 px-8 py-4 rounded-xl bg-ice-teal text-white font-semibold shadow-card hover:bg-ice-coral hover:shadow-card-hover transition-all duration-300 hover:scale-[1.02]">
            Купить билет
        </a>
    </div>
</section>
@endsection
