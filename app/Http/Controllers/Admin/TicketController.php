<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\View\View;

class TicketController extends Controller
{
    public function index(): View
    {
        $tickets = Ticket::latest()->get();

        return view('admin.tickets.index', compact('tickets'));
    }
}
