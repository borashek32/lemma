<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Mail\OrderNotification;
use App\Mail\OrderPlaced;
use App\Models\Address;
use App\Models\Contact;
use App\Models\OrderProduct;
use App\Models\Payment;
use App\Models\Shipment;
use Illuminate\Http\Request;
use Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function shipment()
    {
        $contacts  = Contact::all();
        $payments  = Payment::all();
        $user      = Auth::user();
        $address   = Address::where('user_id', $user->id)->first();

        return view('cart.order', compact('contacts', 'payments', 'address'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'payment_id' => 'required',
        ]);

        $order = new Order();
        $order->order_number      = uniqid('LA-');
        $order->status            = 'processing';
        $order->total             = Cart::total();
        $order->product_count     = Cart::count();
        $order->contact_id        = $request->contact_id;
        $order->payment_id        = $request->payment_id;
        $order->shipping_fullname = $request->shipping_fullname;
        $order->shipping_city     = $request->shipping_city;
        $order->shipping_postcode = $request->shipping_postcode;
        $order->shipping_address  = $request->shipping_address;
        $order->shipping_phone    = $request->shipping_phone;
        $order->notes             = $request->notes;
        $order->user_id           = auth()->id();
        $order->save();

        //save order products
        $cartProducts = Cart::content();
        foreach ($cartProducts as $item)
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item->model->id,
                'product_quantity' => $item->qty
            ]);

//            $order->products()->attach($product->id);
        //payment method

        //empty cart
        Cart::destroy();
        //send email to customer and admin
        Mail::to($request->user())->send(new OrderPlaced($order));
        Mail::to("borashek@inbox.ru")->send(new OrderNotification($order));
        //thank you page

        return redirect()->route('auto-parts')->with('success', 'Ваш заказ был успешно размещен');
        // redirect to orders page with all orders
    }
}
