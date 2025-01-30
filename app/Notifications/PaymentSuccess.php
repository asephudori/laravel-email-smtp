<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class PaymentSuccess extends Notification
{
    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Pembayaran Uang Semester Berhasil')
                    ->line('Pembayaran uang semester Anda telah berhasil diproses.')
                    ->line('Terima kasih telah melakukan pembayaran tepat waktu.');
    }
}
