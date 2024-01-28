@extends('layouts.dash')
@section('title', 'dashboard')



@section('content')


    <div class="container  mt-8"
        style="width: 50%;border:1px solid rgba(119, 117, 117, 0.747);padding:10px;border-radius:8px;">
        <form method="post" action="{{ url('save-products') }}" enctype="multipart/form-data"
            class="bg-white p-8 rounded shadow-md md:w-2/3 lg:w-1/2">
            @csrf

            <div class="mb-4">
                @if ($errors->any())
                    <div class="text-danger bg-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('message'))
                    <div class="bg-success text-success">
                        {{ session('message') }}
                    </div>
                @endif
            </div>

            <div class="mb-4">
                <label for="name" class="form-label text-gray-600 text-sm font-medium mb-2">Name</label>
                <input type="text" id="name" name="name"
                    class="form-control rounded-md focus:outline-none focus:border-blue-500" placeholder="Type your name"
                    required>
            </div>

            <!-- Price Input -->

            <div class="mb-4">
                <label for="price" class="form-label text-gray-600 text-sm font-medium mb-2">Price</label>
                <input type="number" id="price" name="price" value="{{ old('name') }}"
                    class="form-control rounded-md focus:outline-none focus:border-blue-500" placeholder="Type your price"
                    required>
            </div>


            <!-- Image Input -->
            <div class="mb-4">
                <label for="image" class="form-label text-gray-600 text-sm font-medium mb-2">Image</label>
                <input type="file" id="image" name="image" accept="image/*"
                    class="form-control rounded-md focus:outline-none focus:border-blue-500" placeholder="Quantity"
                    required>
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="btn btn-primary w-full rounded-md focus:outline-none hover:bg-blue-600">Register</button>

        </form>
    </div>

@endsection
