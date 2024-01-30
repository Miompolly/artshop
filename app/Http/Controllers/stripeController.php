<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class stripeController extends Controller
{
    public function checkout()
    {
        return view('cart');
    }

    public function session(Request $request)
    {
        $user = Auth::user();
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $productname = $request->get('productname');
        $totalprice = $request->get('total');

        $two0 = '00';
        $total = "$totalprice$two0";

        $session = \Stripe\Checkout\Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'USD',
                        'product_data' => [
                            'name' => $productname,
                        ],
                        'unit_amount' => $total,
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('success'),
            'cancel_url' => route('checkout'),
        ]);

        Order::create([
            'user_id' => $user->id,
            'product_name' => $productname,
            'user_email' => $user->email,
            'total_amount' => $total,
            'status' => 'pending',
        ]);

        return redirect()->away($session->url);
    }

    public function success()
    {

        $order = Order::latest()->first();

        return view('success', ['order' => $order]);
    }
}
