<?php

namespace App\Http\Controllers;

use App\Models\Order; // Add this line
use App\Models\Photos;   // Add this line
use App\Models\Products;   // Add this line
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductsController extends Controller
{
    //
    public function save(Request $request)
    {
        $items = new Products();
        $items->name = $request->name;
        $items->price = $request->price;

        $items->save();

        $imageName = $request->image->getClientOriginalName();
        $request->image->move(public_path('images'), $imageName);

        $photos = new Photos();
        $photos->path = 'images/'.$imageName;
        $photos->product_id = $items->id;
        $photos->save();

        return back()->with('message', 'Registered successfully!');
    }

    public function read()
    {
        // $items=Products::all();
        $items = Products::with('photo')->get();

        // dd($items);

        return view('welcome', compact('items'));
    }

    public function readData()
    {
        // $items=Products::all();
        $items = Products::with('photo')->get();

        // dd($items);

        return view('readData', compact('items'));
    }

    public function orderData()
    {
        $orders = Order::all();
        // $items = Order::with('photo')->get();

        // dd($items);

        return view('orderData', compact('orders'));
    }

    public function edit($id)
    {
        $item = Products::where('id', $id)->first();

        return view('editView', compact('item'));
    }

    public function update(ProductsRequest $request)
    {
        $items = Products::where('id', $request->id)->first();
        $items->name = $request->name;
        $items->price = $request->price;
        $items->quantity = $request->quantity;
        $items->update();

        if ($request->has('image')) {
            $photo = Photos::where('product_id', $items->id)->first();
            File::delete($photo->path);

            $imageName = $request->image->getClientOriginalName();
            $request->image->move(public_path('images'), $imageName);

            $photo->path = 'images/'.$imageName;
            $photo->product_id = $items->id;
            $photo->save();

        }

        return back()->with('message', 'Update successfully!');
    }

    public function delete(Request $request)
    {
        $photo = Photos::where('id', $request->id)->first();
        File::delete($photo->path);
        $photo->delete();

        Products::where('id', $request->id)->delete();

        return back()->with('message', 'Product deleted successfully!');
    }
}
