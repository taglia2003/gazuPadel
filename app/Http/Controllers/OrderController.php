<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function show(Order $order): View
    {
        $order->load('items');

        return view('orders.show', compact('order'));
    }
}
