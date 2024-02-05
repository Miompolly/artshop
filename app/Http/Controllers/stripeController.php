<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class stripeController extends Controller
{
    public function checkout()
    {
        return view('cart');
    }

    public function orderNow(Request $request)
    {
        $user = Auth::user();

        // Set up Stripe API key from the configuration file
        Stripe::setApiKey(Config::get('stripe.sk'));

        $productname = $request->get('productname');
        $total = $request->get('total');

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'USD', // Update to your currency
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
            'stripe_session_id' => $session->id,
        ]);

        return redirect()->away($session->url);
    }

    public function success()
    {

        $order = Order::latest()->first();

        return view('success', ['order' => $order]);
    }





    public function addToCart(Request $request)
    {
        $request->validate([
            'productname' => 'required|string',
            'total' => 'required|numeric',
            'quantity' => 'required|integer|min:1',
        ]);

        $productname = $request->input('productname');
        $total = $request->input('total');
        $quantity = $request->input('quantity');

        // Perform any additional logic you need, such as storing in the session or database
        // For now, let's assume you want to store in the session

        $cart = session()->get('cart', []);
        $cart[] = [
            'productname' => $productname,
            'total' => $total,
            'quantity' => $quantity,
        ];

        session(['cart' => $cart]);

        return response()->json($cart);
    }
}


