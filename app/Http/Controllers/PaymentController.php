<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\PaymentReminder;
use App\Notifications\PaymentSuccess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class PaymentController extends Controller
{
    // Mengirim pengingat pembayaran ke semua mahasiswa
    public function sendPaymentReminder()
    {
        $students = User::where('role', 'mahasiswa')->get();

        foreach ($students as $student) {
            Notification::route('mail', $student->email)->notify(new PaymentReminder('2025-02-28'));
        }

        return response()->json(['message' => 'Email pengingat pembayaran telah dikirim ke semua mahasiswa']);
    }

    // Mengirim konfirmasi pembayaran ke satu mahasiswa berdasarkan email
    public function sendPaymentSuccess(Request $request)
    {
        $student = User::where('email', $request->email)->first();

        if ($student) {
            Notification::route('mail', $student->email)->notify(new PaymentSuccess());
            return response()->json(['message' => 'Email konfirmasi pembayaran telah dikirim ke ' . $student->email]);
        }

        return response()->json(['message' => 'Mahasiswa tidak ditemukan'], 404);
    }
}
