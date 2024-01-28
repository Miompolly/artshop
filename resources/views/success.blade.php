
@extends('layouts.master')

@section('title', 'Order Success')

@section('content')
    <div class="row mt-5">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    Order Success
                </div>
                <div class="card-body">
                    <p>Thanks for your order! You have just completed your payment.</p>
                    <p>Product Name: {{ $order->product_name }}</p>
                    <p>Total Amount: ${{ $order->total_amount }}</p>

                </div>
            </div>
        </div>
    </div>
@endsection
