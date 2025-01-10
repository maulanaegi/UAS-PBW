<?php

namespace App\Listeners;

use App\Events\TransactionCreated;
use App\Models\User;
use App\Notifications\NewTransactionNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Log;

class SendTransactionNotification
{
    public function handle(TransactionCreated $event)
    {
        $provider = User::find($event->transaction->provider_id);

        if ($provider) {
            Notification::send($provider, new NewTransactionNotification($event->transaction));
        } else {
            Log::error('Provider not found for transaction', ['transaction_id' => $event->transaction->id]);
        }
    }


}
