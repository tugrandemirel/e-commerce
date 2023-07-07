<?php

namespace App\Http\Controllers\Front;

use App\Enum\Product\ProductEnum;
use App\Http\Controllers\Controller;
use App\Models\Bid;
use App\Models\Cart;
use Illuminate\Http\Request;

class FCartController extends Controller
{
    public function index()
    {
        $carts = Cart::where('user_id', auth()->id())
                        ->with(['product'])
                        ->get();
        return view('front.cart.index', compact('carts'));
    }

}
