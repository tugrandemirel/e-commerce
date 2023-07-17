<?php

namespace App\Http\Controllers\Front;

use App\Enum\Order\OrderEnum;
use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FCheckoutController extends Controller
{
    public function index()
    {
        $carts = Cart::where('user_id', auth()->id())
            ->with(['product'])
            ->get();
        $addresses = Address::where('user_id', auth()->id())->get();
        return view('front.checkout.index', compact('carts', 'addresses'));
    }

    public function store(Request $request)
    {
        $data = $request->validate(['select_address' => 'required'], ['select_address.required' => 'Lütfen adres seçiniz!']);

        $carts = Cart::where('user_id', auth()->id())
            ->with(['product'])
            ->get();
        $orders = [];
        foreach ($carts as $cart){
            $order =  Order::create([
                'user_id' => auth()->id(),
                'seller_id' => $cart->product->seller->id,
                'address_id' => $data['select_address'],
                'order_number' => Str::uuid(),
                'product_id' => $cart->product_id,
                'product_title' => $cart->product->title,
                'product_slug' => $cart->product->slug,
                'product_bid_price' => $cart->bid_price,
                'product_price' => $cart->product->price,
                'product_total' => $cart->product->price + $cart->bid_price,
                'status' => OrderEnum::WAITING,
            ]);
            if ($order)
            {
                $orders[] = $order;
                $cart->delete();
            }
            else
                return redirect()->back()->with('error', 'Sipariş oluşturulamadı!');
        }
        session()->put('orders', $orders);
        return redirect()->route('front.checkout.show')->with('orders', $orders);

    }

    public function show(Request $request)
    {
        $orders = session()->get('orders');
        return view('front.checkout.show', compact('orders'));
    }

}
