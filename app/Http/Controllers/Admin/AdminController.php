<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Skate;
use App\Models\Ticket;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index(): View
    {
        return view('admin.index', [
            'skatesCount' => Skate::count(),
            'bookingsCount' => Booking::count(),
            'ticketsCount' => Ticket::where('status', 'succeeded')->count(),
        ]);
    }
}
