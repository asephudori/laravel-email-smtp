<?php

namespace App\Http\Controllers;

use App\Notifications\PaymentReminder;
use App\Notifications\PaymentSuccess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class PaymentController extends Controller
{
    public function sendPaymentReminder()
    {
        $email = "21104064@ittelkom-pwt.ac.id";  // Ganti dengan email tujuan

        // Kirim email pengingat pembayaran
        Notification::route('mail', $email)->notify(new PaymentReminder('2025-02-28'));

        return response()->json(['message' => 'Email pengingat pembayaran telah dikirim!']);
    }

    public function sendPaymentSuccess()
    {
        $email = "21104064@ittelkom-pwt.ac.id";  // Ganti dengan email tujuan

        // Kirim email konfirmasi pembayaran
        Notification::route('mail', $email)->notify(new PaymentSuccess());

        return response()->json(['message' => 'Email konfirmasi pembayaran berhasil telah dikirim!']);
    }
}
