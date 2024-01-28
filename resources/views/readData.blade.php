@extends('layouts.dash')
@section('title', 'products')



@section('content')


    <div class="container mt-8">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th class="px-4 py-2 text-left">Id</th>
                            <th class="px-4 py-2 text-left">Name</th>
                            <th class="px-4 py-2 text-left">Price</th>
                            <th class="px-4 py-2 text-left">Image</th>
                            <th class="px-4 py-2 text-left">Edit</th>
                            <th class="px-4 py-2 text-left">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td class="px-4 py-2">{{ $item->id }}</td>
                                <td class="px-4 py-2">{{ $item->name }}</td>
                                <td class="px-4 py-2">{{ $item->price }}</td>
                                <td class="px-4 py-2">
                                    <img src="{{ URL::asset($item->photo->path) }}" style="width: 40px;height:40px;">
                                </td>
                                <td class="px-4 py-2">
                                    <button class="btn btn-primary" onclick="edit({{ $item->id }})">Edit</button>
                                </td>
                                <td class="px-4 py-2">
                                    <form method="post" action="delete">
                                        @csrf
                                        @method('delete')
                                        <input type="number" value="{{ $item->id }}" name="id" hidden readonly />
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
