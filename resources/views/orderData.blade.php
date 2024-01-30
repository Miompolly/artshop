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
                            <th>Client Email</th>
                            <th>Total Amount</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Update At</th>
                            <th>Edit</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->product_name }}</td>
                                <td>{{ $order->user_email }}</td>
                                <td>{{ number_format($order->total_amount, 2) }}</td>
                                <td>{{ $order->status }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td>{{ $order->updated_at }}</td>
                                <td>
                                    <input class="bg-blue-500 text-white px-4 py-2 rounded btn btn-primary" type="button"
                                        value="Edit" onclick="edit({{ $order->id }})">
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
