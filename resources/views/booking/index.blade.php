@extends('layouts.app')

@section('title', 'Бронирование коньков')

@section('content')
<section class="py-16 md:py-24">
    <div class="max-w-xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl shadow-card border border-gray-100 p-8 md:p-10">
            <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-2">Бронирование коньков</h1>
            <p class="text-gray-600 mb-8">150₽ / 1 час. Можно прийти со своими коньками.</p>
            <form action="{{ route('booking.store') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">ФИО</label>
                    <input type="text" name="name" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-ice-teal focus:ring-2 focus:ring-ice-teal/20 transition-colors" placeholder="Иванов Иван Иванович">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Телефон</label>
                    <input type="tel" name="phone" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-ice-teal focus:ring-2 focus:ring-ice-teal/20 transition-colors" placeholder="+7 (___) ___-__-__">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Количество часов</label>
                    <select name="hours" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-ice-teal focus:ring-2 focus:ring-ice-teal/20 transition-colors">
                        <option value="1">1 час — 150₽</option>
                        <option value="2">2 часа — 300₽</option>
                        <option value="3">3 часа — 450₽</option>
                        <option value="4">4 часа — 600₽</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Коньки (необязательно)</label>
                    <select name="skate_id" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-ice-teal focus:ring-2 focus:ring-ice-teal/20 transition-colors">
                        <option value="">Приду со своими коньками</option>
                    </select>
                </div>
                <button type="submit" class="w-full py-4 rounded-xl bg-ice-teal text-white font-semibold hover:bg-ice-coral transition-colors duration-300">
                    Забронировать
                </button>
            </form>
        </div>
    </div>
</section>
@endsection
