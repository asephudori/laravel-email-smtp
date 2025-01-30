<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class PaymentReminder extends Notification
{
    protected $dueDate;

    public function __construct($dueDate)
    {
        $this->dueDate = $dueDate;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Reminder Pembayaran Uang Semester')
                    ->line('Ini adalah pengingat bahwa pembayaran uang semester Anda akan jatuh tempo pada ' . $this->dueDate . '.')
                    ->line('Mohon transaksi diproses sebelum waktu jatuh tempo.');
    }
}
