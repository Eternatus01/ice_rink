@extends('admin.layouts.app')

@section('title', 'Бронирования')

@section('content')
<h1 class="text-2xl font-bold text-gray-800 mb-8">Бронирования</h1>
<div class="bg-white rounded-2xl shadow-card border border-gray-100 overflow-x-auto">
    <table class="w-full min-w-[700px]">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">ФИО</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Телефон</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Часы</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Коньки</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Сумма</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Статус</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Дата</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse ($bookings as $booking)
                <tr class="hover:bg-gray-50/50">
                    <td class="px-6 py-4">{{ $booking->name }}</td>
                    <td class="px-6 py-4">+7 {{ substr($booking->phone, 1, 3) }} {{ substr($booking->phone, 4, 3) }}-{{ substr($booking->phone, 7, 2) }}-{{ substr($booking->phone, 9, 2) }}</td>
                    <td class="px-6 py-4">{{ $booking->hours }} ч.</td>
                    <td class="px-6 py-4">{{ $booking->skate?->display_name ?? '—' }}</td>
                    <td class="px-6 py-4">{{ $booking->amount }}₽</td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 rounded-lg text-xs font-medium {{ $booking->status === 'succeeded' ? 'bg-ice-teal/20 text-ice-teal' : 'bg-gray-100 text-gray-600' }}">
                            {{ $booking->status === 'succeeded' ? 'Оплачено' : 'Ожидает' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-gray-500 text-sm">{{ $booking->created_at->format('d.m.Y H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="px-6 py-12 text-center text-gray-500">Нет бронирований</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
