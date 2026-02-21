<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class TicketController extends Controller
{
    public function show(): View
    {
        return view('ticket.buy');
    }

    public function purchase(Request $request): RedirectResponse
    {
        // Will be implemented with YooKassa
        return redirect()->route('home');
    }
}
