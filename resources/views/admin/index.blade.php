@extends('admin.layouts.app')

@section('title', 'Главная')

@section('content')
<h1 class="text-2xl font-bold text-gray-800 mb-8">Панель управления</h1>
<div class="grid md:grid-cols-3 gap-6">
    <div class="p-6 bg-white rounded-2xl shadow-card border border-gray-100">
        <div class="text-ice-teal font-semibold mb-1">Коньки</div>
        <div class="text-3xl font-bold text-gray-800">{{ $skatesCount }}</div>
        <a href="{{ route('admin.skates.index') }}" class="mt-2 text-sm text-ice-teal hover:underline">Перейти →</a>
    </div>
    <div class="p-6 bg-white rounded-2xl shadow-card border border-gray-100">
        <div class="text-ice-peach font-semibold mb-1">Бронирования</div>
        <div class="text-3xl font-bold text-gray-800">{{ $bookingsCount }}</div>
        <a href="{{ route('admin.bookings.index') }}" class="mt-2 text-sm text-ice-teal hover:underline">Перейти →</a>
    </div>
    <div class="p-6 bg-white rounded-2xl shadow-card border border-gray-100">
        <div class="text-ice-coral font-semibold mb-1">Оплаченные билеты</div>
        <div class="text-3xl font-bold text-gray-800">{{ $ticketsCount }}</div>
        <a href="{{ route('admin.tickets.index') }}" class="mt-2 text-sm text-ice-teal hover:underline">Перейти →</a>
    </div>
</div>
@endsection
