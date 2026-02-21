@extends('layouts.app')

@section('title', 'Бронирование коньков')

@section('content')
<section class="py-16 md:py-24">
    <div class="max-w-xl mx-auto px-4 sm:px-6 lg:px-8">
        @if (session('success'))
            <div class="mb-6 p-4 rounded-xl bg-ice-teal/10 border border-ice-teal/30 text-ice-teal">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-2xl shadow-card border border-gray-100 p-8 md:p-10">
            <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-2">Бронирование коньков</h1>
            <p class="text-gray-600 mb-8">150₽ / 1 час. Можно прийти со своими коньками.</p>

            <form action="{{ route('booking.store') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">ФИО</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required
                        class="w-full px-4 py-3 rounded-xl border @error('name') border-red-500 @else border-gray-200 @enderror focus:border-ice-teal focus:ring-2 focus:ring-ice-teal/20 transition-colors"
                        placeholder="Иванов Иван Иванович">
                    @error('name')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Телефон</label>
                    <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" required
                        class="w-full px-4 py-3 rounded-xl border @error('phone') border-red-500 @else border-gray-200 @enderror focus:border-ice-teal focus:ring-2 focus:ring-ice-teal/20 transition-colors"
                        placeholder="+7 (___) ___-__-__" maxlength="18">
                    @error('phone')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="hours" class="block text-sm font-medium text-gray-700 mb-2">Количество часов</label>
                    <select id="hours" name="hours"
                        class="w-full px-4 py-3 rounded-xl border @error('hours') border-red-500 @else border-gray-200 @enderror focus:border-ice-teal focus:ring-2 focus:ring-ice-teal/20 transition-colors">
                        <option value="1" {{ old('hours', 1) == 1 ? 'selected' : '' }}>1 час — 150₽</option>
                        <option value="2" {{ old('hours') == 2 ? 'selected' : '' }}>2 часа — 300₽</option>
                        <option value="3" {{ old('hours') == 3 ? 'selected' : '' }}>3 часа — 450₽</option>
                        <option value="4" {{ old('hours') == 4 ? 'selected' : '' }}>4 часа — 600₽</option>
                    </select>
                    @error('hours')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="skate_id" class="block text-sm font-medium text-gray-700 mb-2">Коньки (необязательно)</label>
                    <select id="skate_id" name="skate_id"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-ice-teal focus:ring-2 focus:ring-ice-teal/20 transition-colors">
                        <option value="">Приду со своими коньками</option>
                        @foreach ($skates as $skate)
                            <option value="{{ $skate->id }}" {{ old('skate_id') == $skate->id ? 'selected' : '' }}>
                                {{ $skate->display_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('skate_id')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="w-full py-4 rounded-xl bg-ice-teal text-white font-semibold hover:bg-ice-coral transition-colors duration-300">
                    Забронировать
                </button>
            </form>
        </div>
    </div>
</section>
@endsection
