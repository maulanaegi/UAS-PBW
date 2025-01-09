<?php

namespace App\Notifications;

use App\Models\Transaction;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ProviderStatusChanged extends Notification
{
    use Queueable;

    protected $transaction;

    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Transaksi Anda Mulai Diproses')
            ->line('Status transaksi Anda telah berubah menjadi "Dalam Proses".')
            ->action('Lihat Transaksi', url('/transactions/' . $this->transaction->id));
    }

    public function toDatabase($notifiable)
    {
        return [
            'transaction_id' => $this->transaction->id,
            'message' => 'Status transaksi Anda telah berubah menjadi "Dalam Proses".',
        ];
    }
}
