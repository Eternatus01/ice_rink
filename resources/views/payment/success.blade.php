@extends('layouts.app')

@section('title', 'Оплата прошла успешно')

@section('content')
<section class="py-16 md:py-24">
    <div class="max-w-xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl shadow-card border border-gray-100 p-8 md:p-10 text-center">
            <div class="w-16 h-16 rounded-full bg-ice-teal/10 flex items-center justify-center mx-auto mb-6">
                <svg class="w-8 h-8 text-ice-teal" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
            </div>
            <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-2">Оплата прошла успешно</h1>
            <p class="text-gray-600 mb-8">
                @if ($type === 'ticket')
                    Билет на каток оплачен. Добро пожаловать!
                @elseif ($type === 'booking')
                    Бронирование коньков оплачено. Ждём вас на катке!
                @else
                    Спасибо за оплату.
                @endif
            </p>
            <a href="{{ route('home') }}" class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-ice-teal text-white font-semibold hover:bg-ice-coral transition-colors duration-300">
                На главную
            </a>
        </div>
    </div>
</section>
@endsection
