@extends('admin.layouts.app')

@section('title', 'Коньки')

@section('content')
<div class="flex items-center justify-between mb-8">
    <h1 class="text-2xl font-bold text-gray-800">Коньки</h1>
    <a href="{{ route('admin.skates.create') }}" class="px-4 py-2 rounded-xl bg-ice-teal text-white font-semibold hover:bg-ice-coral transition-colors">
        Добавить коньки
    </a>
</div>
<div class="bg-white rounded-2xl shadow-card border border-gray-100 overflow-x-auto">
    <table class="w-full min-w-[600px]">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Модель</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Размер</th>
                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Количество</th>
                <th class="px-6 py-4 text-right text-sm font-semibold text-gray-700">Действия</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            @forelse ($skates as $skate)
                <tr class="hover:bg-gray-50/50">
                    <td class="px-6 py-4">{{ $skate->model }}</td>
                    <td class="px-6 py-4">{{ $skate->size }}</td>
                    <td class="px-6 py-4">{{ $skate->quantity }}</td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('admin.skates.edit', $skate) }}" class="text-ice-teal hover:underline mr-4">Изменить</a>
                        <form action="{{ route('admin.skates.destroy', $skate) }}" method="POST" class="inline" onsubmit="return confirm('Удалить?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Удалить</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="px-6 py-12 text-center text-gray-500">Нет коньков. Добавьте первую модель.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
