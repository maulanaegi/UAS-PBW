<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class NewTransactionNotification extends Notification
{
    protected $transaction;

    public function __construct($transaction)
    {
        $this->transaction = $transaction;
    }

    public function via($notifiable)
    {
        return ['database', 'mail'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'transaction_id' => $this->transaction->id,
            'message' => 'Pesanan baru dari ' . $this->transaction->user->name,
        ];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Pesanan Baru')
            ->line('Anda menerima pesanan baru.')
            ->action('Lihat Pesanan', url('/transactions/' . $this->transaction->id));
    }
}
