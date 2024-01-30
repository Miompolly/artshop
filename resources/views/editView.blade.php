
@extends('layouts.dash')
@section('title', 'update order status')



@section('content')


    <div class="container  mt-8"
        style="width: 50%;border:1px solid rgba(119, 117, 117, 0.747);padding:10px;border-radius:8px;">
        <form method="post" action="{{ url('update') }}">
            @csrf
            @method('put')

            <div class="mb-4">
                <input type="hidden" name="id" value="{{ $order->id }}">
                <input type="hidden" name="user_email" value="{{ $order->user_email }}">

            </div>

            <div class="mb-4">
                <label for="status" class="form-label text-gray-600 text-sm font-medium mb-2">Status</label>
                <select id="status" name="status"
                    class="form-control rounded-md focus:outline-none focus:border-blue-500" required>
                    <option value="Pending" {{ $order->status === 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Approved" {{ $order->status === 'Approved' ? 'selected' : '' }}>Approved</option>
                    <option value="Completed" {{ $order->status === 'Completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Status</button>
        </form>

    </div>

@endsection
