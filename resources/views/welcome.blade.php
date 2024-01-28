@extends('layouts.master')

@section('title', 'home page')

@section('content')
    <div class="card-header my-3">All Art</div>
    <div class="row">

        @foreach ($items as $item)
            <div class="col-md-3 my-3">
                <form action="/session" method="POST">

                    <div class="card w-100" style="width: 18rem;">

                        {{-- <img src="{{ URL::asset($item->photo->path) }}" class="w-8 h-8 rounded-full"> --}}

                        <img class="card-img-top" style="width:100%;height: 200px;" src="{{ optional($item->photo)->path }}"
                            alt="Hot Mansion">

                        <div class="card-body">

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <h5 class="card-title"> <input type='hidden' name="productname"
                                    value="{{ $item->name }}">{{ $item->name }}</h5>
                            <h6 class="price"><input type='hidden' name="total" value="{{ $item->price }}">Price: $
                                {{ $item->price }}</h6>
                            <div class="mt-3 d-flex justify-content-between">
                                <button class="btn btn-dark" onclick="addToCart(1)">Add to Cart</button>
                                <button type="submit" class="btn btn-primary" onclick="orderClick()">Order Now</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        @endforeach


    </div>
@endsection
