<!-- resources/views/orders.blade.php -->

@extends('layouts.dash')

@section('title', 'Order List')

@section('content')
    <div class="container mt-8">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Total Amount</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Approved At</th>
                            <th>Edit</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->product_name }}</td>
                                <td>{{ number_format($order->total_amount, 2) }}</td>
                                <td>{{ $order->status }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td>{{ $order->updated_at }}</td>
                                <td>
                                    <a href="" class="btn btn-primary">Edit</a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
