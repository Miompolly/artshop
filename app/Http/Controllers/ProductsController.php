<?php

namespace App\Http\Controllers;

// Add this line
use App\Models\EmailLog;  // Add this line
use App\Models\Order;   // Add this line
use App\Models\Photos;
use App\Models\Products;
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
        $order = Order::where('id', $id)->first();

        return view('editView', compact('order'));
    }

    public function update(Request $request)
    {
        $orders = Order::where('id', $request->id)->first();
        $orders->status = $request->status;
        $oldStatus = $orders->status;
        $orders->update();
        $subject = 'Order Status Update';
        $body = "Your order with ID {$orders->id} has been updated to {$request->status}.";

        EmailLog::create([
            'recipient_email' => $orders->user_email,
            'subject' => $subject,
            'body' => $body,
        ]);

        return back()->with('message', 'Status Updated successfully!');
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
