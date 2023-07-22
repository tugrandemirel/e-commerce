<?php

namespace App\Http\Controllers\Seller;

use App\Enum\Order\OrderEnum;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class SCargoController extends Controller
{
    public function index()
    {
        $orders = Order::where('seller_id', auth()->user()->seller->id)
            ->where('status', OrderEnum::APPROVED)
            ->with([
                'product' => function($query){
                    $query->with(['category', 'brand']);
                },
                'address'
            ])
            ->orderBy('updated_at', 'desc')
            ->get();
        return view('seller.order.cargo.index', compact('orders'));
    }
}
