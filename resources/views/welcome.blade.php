@extends('layouts.master')

@section('title', 'Home Page')

@section('content')
    <div class="card-header my-3">All Art</div>
    <div class="row">

        @foreach ($items as $item)
            <div class="col-md-3 my-3">
                <div class="card w-100" style="width: 18rem;">
                    <img class="card-img-top" style="width:100%; height: 200px;" src="{{ optional($item->photo)->path }}"
                        alt="Artwork Image">

                    <div class="card-body">
                        <h5 class="card-title">{{ $item->name }}</h5>
                        <h6 class="price">Price: ${{ $item->price }}</h6>


                        <div class="mt-3 d-flex justify-content-between">
                            <form action="{{ route('addToCart') }}" method="POST" class="mb-2" id="addToCartForm">
                                @csrf
                                <input type='hidden' name="productname" value="{{ $item->name }}">
                                <input type='hidden' name="total" value="{{ $item->price }}">
                                <input type='hidden' name="quantity" value="1">
                                <button type="button" class="btn btn-dark" onclick="addToCart()">Add to Cart</button>
                            </form>


                            <form action="{{ route('orderNow') }}" method="POST">
                                @csrf
                                <input type='hidden' name="productname" value="{{ $item->name }}">
                                <input type='hidden' name="total" value="{{ $item->price }}">
                                <button type="submit" class="btn btn-primary">Order Now</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection
