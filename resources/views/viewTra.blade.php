@extends('layouts.master')

@section('title', 'Order Success')

@section('content')

    <div class="row mt-5">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    <h2>All Receipts</h2>
                </div>
                <div class="card-body">
                    @foreach ($orders as $order)
                        <div class="receipt-container" id="receipt-{{ $order->id }}">
                            <h3>Order Receipt - {{ $order->id }}</h3>
                            <p><strong>Product Name:</strong> {{ $order->product_name }}</p>
                            <p><strong>Total Amount:</strong> ${{ $order->total_amount }}</p>
                            <p><strong>User Email:</strong> {{ $order->user_email }}</p>
                            <p><strong>Status:</strong> {{ $order->status }}</p>
                            <p><strong>Order Date:</strong> {{ $order->created_at->format('Y-m-d H:i:s') }}</p>
                            <p><strong>Last Updated:</strong> {{ $order->updated_at->format('Y-m-d H:i:s') }}</p>

                            @auth
                                <button onclick="printReceipt('receipt-{{ $order->id }}')" class="btn btn-success">Print
                                    Receipt</button>
                            @endauth
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script>
        function printReceipt(elementId) {
            var printContent = document.getElementById(elementId).innerHTML;
            var originalContent = document.body.innerHTML;

            document.body.innerHTML = printContent;

            window.print();

            document.body.innerHTML = originalContent;
        }
    </script>

@endsection
