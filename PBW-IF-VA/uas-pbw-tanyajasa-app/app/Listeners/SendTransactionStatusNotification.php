<?php

namespace App\Listeners;

namespace App\Listeners;

use App\Events\TransactionStatusUpdated;
use App\Notifications\ProviderStatusChanged;
use App\Notifications\PaymentReceived;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendTransactionStatusNotification implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(TransactionStatusUpdated $event)
    {
        $transaction = $event->transaction;

        if ($transaction->status === 'in_progress') {
            // Kirim notifikasi ke provider ketika status transaksi menjadi 'in_progress'
            $transaction->provider->notify(new ProviderStatusChanged($transaction));
        }

        if ($transaction->status === 'paid') {
            // Kirim notifikasi ke user ketika status transaksi menjadi 'paid'
            $transaction->user->notify(new PaymentReceived($transaction));
        }
    }
}
