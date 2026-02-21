<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Services\YooKassaService;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;

class TicketController extends Controller
{
    private const TICKET_PRICE = 300;

    public function show(): View
    {
        return view('ticket.buy');
    }

    public function purchase(Request $request): RedirectResponse
    {
        $service = app(YooKassaService::class);
        $payment = $service->createPayment(
            self::TICKET_PRICE,
            'Входной билет на каток',
            ['type' => 'ticket']
        );

        if (!$payment) {
            return redirect()->route('ticket.buy')
                ->with('error', 'Ошибка создания платежа. Проверьте настройки ЮKassa.');
        }

        $ticket = Ticket::create([
            'payment_id' => $payment->getId(),
            'amount' => self::TICKET_PRICE,
            'status' => 'pending',
        ]);

        Session::put('payment_return', [
            'payment_id' => $payment->getId(),
            'type' => 'ticket',
        ]);

        $confirmationUrl = $payment->getConfirmation()?->getConfirmationUrl();
        if ($confirmationUrl) {
            return redirect()->away($confirmationUrl);
        }

        return redirect()->route('ticket.buy')->with('error', 'Не удалось получить ссылку на оплату.');
    }
}
