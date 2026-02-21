<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class BookingController extends Controller
{
    public function index(): View
    {
        return view('booking.index');
    }

    public function store(Request $request): RedirectResponse
    {
        // Will be implemented with validation
        return redirect()->route('booking.index');
    }
}
