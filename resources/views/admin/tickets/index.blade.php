@extends('admin.layouts.app')

@section('title', 'Билеты')

@section('content')
<h1 class="text-2xl font-bold text-gray-800 mb-8">Оплаченные билеты</h1>
<div class="bg-white rounded-2xl shadow-card border border-gray-100 overflow-x-auto">
    <table class="w-full min-w-[400px]">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">ID</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Сумма</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Статус</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Дата</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse ($tickets as $ticket)
                <tr class="hover:bg-gray-50/50">
                    <td class="px-6 py-4">#{{ $ticket->id }}</td>
                    <td class="px-6 py-4">{{ $ticket->amount }}₽</td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 rounded-lg text-xs font-medium {{ $ticket->status === 'succeeded' ? 'bg-ice-teal/20 text-ice-teal' : 'bg-gray-100 text-gray-600' }}">
                            {{ $ticket->status === 'succeeded' ? 'Оплачено' : 'Ожидает' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-gray-500 text-sm">{{ $ticket->created_at->format('d.m.Y H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="px-6 py-12 text-center text-gray-500">Нет билетов</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
