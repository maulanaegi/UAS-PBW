<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Withpagination;
// use Livewire\Attributes\URL;
// // use App\Helpers\CartManagement;
use App\Models\Order;
// use Stripe\Stripe;
// use Stripe\Checkout\Session;

#[Title('My Orders Page - OnlySmart')]
class MyOrdersPage extends Component
{
    use WithPagination;
    public function render()
    {
        $my_orders = Order::where('user_id', auth()->id())->latest()->paginate(2);
        return view('livewire.my-orders-page', [
            'orders' => $my_orders,
        ]);
    }
}