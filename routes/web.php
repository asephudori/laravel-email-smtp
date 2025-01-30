<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/send-payment-reminder', [PaymentController::class, 'sendPaymentReminder']);
Route::get('/send-payment-success', [PaymentController::class, 'sendPaymentSuccess']);
