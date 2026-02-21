<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SkateController as AdminSkateController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Admin\TicketController as AdminTicketController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');

    Route::resource('skates', AdminSkateController::class)->except(['show']);
    Route::get('/bookings', [AdminBookingController::class, 'index'])->name('bookings.index');
    Route::get('/tickets', [AdminTicketController::class, 'index'])->name('tickets.index');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/ticket', [TicketController::class, 'show'])->name('ticket.buy');
Route::post('/ticket', [TicketController::class, 'purchase'])->name('ticket.purchase');
Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');

Route::get('/payment/success', [PaymentController::class, 'success'])->name('payment.success');
Route::get('/payment/cancel', [PaymentController::class, 'cancel'])->name('payment.cancel');
