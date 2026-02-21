@extends('admin.layouts.app')

@section('title', $skate ? 'Редактировать коньки' : 'Добавить коньки')

@section('content')
<h1 class="text-2xl font-bold text-gray-800 mb-8">{{ $skate ? 'Редактировать коньки' : 'Добавить коньки' }}</h1>
<div class="max-w-md">
    <form action="{{ $skate ? route('admin.skates.update', $skate) : route('admin.skates.store') }}" method="POST" class="space-y-6">
        @csrf
        @if ($skate) @method('PUT') @endif

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Модель</label>
            <input type="text" name="model" value="{{ old('model', $skate?->model) }}" required
                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-ice-teal focus:ring-2 focus:ring-ice-teal/20">
            @error('model')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Размер</label>
            <input type="number" name="size" value="{{ old('size', $skate?->size) }}" min="20" max="50" required
                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-ice-teal focus:ring-2 focus:ring-ice-teal/20">
            @error('size')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Количество</label>
            <input type="number" name="quantity" value="{{ old('quantity', $skate?->quantity ?? 0) }}" min="0" required
                class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-ice-teal focus:ring-2 focus:ring-ice-teal/20">
            @error('quantity')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
        </div>

        <div class="flex gap-4">
            <button type="submit" class="px-6 py-3 rounded-xl bg-ice-teal text-white font-semibold hover:bg-ice-coral transition-colors">
                {{ $skate ? 'Сохранить' : 'Добавить' }}
            </button>
            <a href="{{ route('admin.skates.index') }}" class="px-6 py-3 rounded-xl border border-gray-200 text-gray-600 hover:bg-gray-50 transition-colors">
                Отмена
            </a>
        </div>
    </form>
</div>
@endsection
