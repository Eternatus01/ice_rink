<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skate;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SkateController extends Controller
{
    public function index(): View
    {
        $skates = Skate::orderBy('model')->orderBy('size')->get();

        return view('admin.skates.index', compact('skates'));
    }

    public function create(): View
    {
        return view('admin.skates.form', ['skate' => null]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'model' => ['required', 'string', 'max:255'],
            'size' => ['required', 'integer', 'min:20', 'max:50'],
            'quantity' => ['required', 'integer', 'min:0'],
        ]);

        Skate::create($validated);

        return redirect()->route('admin.skates.index')->with('success', 'Коньки добавлены.');
    }

    public function edit(Skate $skate): View
    {
        return view('admin.skates.form', ['skate' => $skate]);
    }

    public function update(Request $request, Skate $skate): RedirectResponse
    {
        $validated = $request->validate([
            'model' => ['required', 'string', 'max:255'],
            'size' => ['required', 'integer', 'min:20', 'max:50'],
            'quantity' => ['required', 'integer', 'min:0'],
        ]);

        $skate->update($validated);

        return redirect()->route('admin.skates.index')->with('success', 'Коньки обновлены.');
    }

    public function destroy(Skate $skate): RedirectResponse
    {
        $skate->delete();

        return redirect()->route('admin.skates.index')->with('success', 'Коньки удалены.');
    }
}
