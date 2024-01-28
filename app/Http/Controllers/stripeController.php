<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class stripeController extends Controller
{
    public function checkout()
    {
        return view('cart');
    }

    public function session(Request $request)
    {
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

        // Save order data in the database
        Order::create([
            'product_name' => $productname,
            'total_amount' => $total,
            // Add more fields as needed
        ]);

        return redirect()->away($session->url);
    }

    public function success()
    {
        // Fetch the order data from the database based on your logic
        $order = Order::latest()->first();

        // Render the success page with the order details
        return view('success', ['order' => $order]);
    }
}
