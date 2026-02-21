<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function showLogin(): View
    {
        return view('admin.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $password = config('app.admin_password');

        if (!$password || $request->password !== $password) {
            return back()->with('error', 'Неверный пароль.');
        }

        session(['admin_authenticated' => true]);

        return redirect()->route('admin.index');
    }
}
