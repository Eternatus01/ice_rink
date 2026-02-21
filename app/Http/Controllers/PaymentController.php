<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function success(Request $request): View|RedirectResponse
    {
        $returnData = Session::pull('payment_return');
        $paymentId = $returnData['payment_id'] ?? $request->query('payment_id');
        $type = $returnData['type'] ?? $request->query('type');

        if ($paymentId && $type === 'ticket') {
            $ticket = Ticket::where('payment_id', $paymentId)->first();
            if ($ticket) {
                $ticket->update(['status' => 'succeeded']);
            }
        }

        if ($paymentId && $type === 'booking') {
            $booking = Booking::where('payment_id', $paymentId)->first();
            if ($booking) {
                $booking->update(['status' => 'succeeded']);
            }
        }

        return view('payment.success', [
            'type' => $type ?? null,
            'payment_id' => $paymentId,
        ]);
    }

    public function cancel(): RedirectResponse
    {
        Session::forget('payment_return');
        return redirect()->route('home')->with('message', 'Оплата отменена.');
    }
}
