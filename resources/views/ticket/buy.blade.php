@extends('layouts.app')

@section('title', 'Купить билет')

@section('content')
<section class="py-16 md:py-24">
    <div class="max-w-xl mx-auto px-4 sm:px-6 lg:px-8">
        @if (session('error'))
            <div class="mb-6 p-4 rounded-xl bg-red-50 border border-red-200 text-red-700">
                {{ session('error') }}
            </div>
        @endif

        <div class="bg-white rounded-2xl shadow-card border border-gray-100 p-6 sm:p-8 md:p-10">
            <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-2">Покупка билета</h1>
            <p class="text-gray-600 mb-8">Стоимость входа на каток: <span class="font-semibold text-ice-teal text-xl">300₽</span></p>
            <p class="text-gray-400 text-sm mb-8">Оплачивается один раз. После оплаты вы получаете доступ на каток.</p>
            <form action="{{ route('ticket.purchase') }}" method="POST" class="space-y-6">
                @csrf
                <button type="submit" class="w-full py-4 rounded-xl bg-ice-teal text-white font-semibold hover:bg-ice-coral transition-colors duration-300">
                    Оплатить 300₽
                </button>
            </form>
        </div>
    </div>
</section>
@endsection
