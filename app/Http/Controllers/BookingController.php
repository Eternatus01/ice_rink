<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Skate;
use App\Services\YooKassaService;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;

class BookingController extends Controller
{
    private const PRICE_PER_HOUR = 150;

    public function index(): View
    {
        $skates = Skate::where('quantity', '>', 0)->orderBy('model')->orderBy('size')->get();

        return view('booking.index', compact('skates'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'regex:/^\+7\s?\(?\d{3}\)?\s?\d{3}-?\d{2}-?\d{2}$/'],
            'hours' => ['required', 'integer', 'in:1,2,3,4'],
            'skate_id' => ['nullable', 'exists:skates,id'],
        ], [
            'name.required' => 'Укажите ФИО.',
            'phone.required' => 'Укажите номер телефона.',
            'phone.regex' => 'Телефон должен быть в формате +7 (___) ___-__-__.',
            'hours.required' => 'Выберите количество часов.',
            'hours.in' => 'Выберите от 1 до 4 часов.',
            'skate_id.exists' => 'Выбранные коньки недоступны.',
        ]);

        $hours = (int) $validated['hours'];
        $amount = $hours * self::PRICE_PER_HOUR;

        $booking = Booking::create([
            'name' => $validated['name'],
            'phone' => preg_replace('/\D/', '', $validated['phone']),
            'hours' => $hours,
            'skate_id' => $validated['skate_id'] ?: null,
            'amount' => $amount,
            'status' => 'pending',
        ]);

        $service = app(YooKassaService::class);
        $payment = $service->createPayment(
            (float) $amount,
            "Бронирование коньков — {$hours} ч.",
            ['type' => 'booking', 'booking_id' => $booking->id]
        );

        if (!$payment) {
            return redirect()->route('booking.index')
                ->with('success', 'Бронирование создано. Сумма к оплате: ' . $amount . '₽. Оплата временно недоступна.');
        }

        $booking->update(['payment_id' => $payment->getId()]);

        Session::put('payment_return', [
            'payment_id' => $payment->getId(),
            'type' => 'booking',
        ]);

        $confirmationUrl = $payment->getConfirmation()?->getConfirmationUrl();
        if ($confirmationUrl) {
            return redirect()->away($confirmationUrl);
        }

        return redirect()->route('booking.index')->with('success', 'Бронирование создано. Сумма к оплате: ' . $amount . '₽');
    }
}
