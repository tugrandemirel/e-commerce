<?php

namespace App\Http\Controllers\Seller;

use App\Enum\Order\OrderEnum;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class SCargoController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->status;
        $orders = Order::query();
        $orders = $orders->where('seller_id', auth()->user()->seller->id)
            ->with([
                'product' => function($query){
                    $query->with(['category', 'brand']);
                },
                'address'
            ])
            ->orderBy('updated_at', 'desc');

        switch ($status)
        {
            case OrderEnum::SHIPPED->value:
                $orders = $orders->where('status', OrderEnum::SHIPPED)
                            ->get();
                break;
            case OrderEnum::DELIVERED->value:
                $orders = $orders->where('status', OrderEnum::DELIVERED)
                    ->get();
                break;
            case OrderEnum::CANCELLED->value:
                $orders = $orders->where('status', OrderEnum::CANCELLED)
                    ->get();
                break;
            case OrderEnum::RETURNED->value:
                $orders = $orders->where('status', OrderEnum::RETURNED)
                    ->get();
                break;
            default:
                $orders = $orders->whereNot('status', OrderEnum::WAITING)
                    ->get();
                break;
        }
        return view('seller.order.cargo.index', compact('orders'));
    }
}
