<?php

namespace App\Http\Controllers\Seller;

use App\Enum\Cart\CartEnum;
use App\Enum\Order\OrderEnum;
use App\Enum\Product\ProductEnum;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Seller;
use App\Notifications\Product\ProductApprovedNotification;
use App\Notifications\Product\ProductDispprovedNotification;
use Illuminate\Http\Request;

class SOrderController extends Controller
{
    public function purchaseProduct()
    {
        $orders = Order::where('seller_id', auth()->user()->seller->id)
                        ->where('status', OrderEnum::WAITING)
                        ->with([
                            'product' => function($query){
                                $query->with(['category', 'brand']);
                            },
                            'address'
                        ])
                        ->get();
        return view('seller.order.purchase-product', compact('orders'));
    }

    public function purchaseProductDetail(Order $order)
    {
     /*   if ((int)$order->status == OrderEnum::WAITING)
        {
            return redirect()->route('seller.order.purchase')->with('error', 'Bu ürün için işlem yapamazsınız');
        }*/
        $order = $order
                    ->load([
                        'product' => function($query){
                            $query->with(['category', 'brand']);
                        },
                        'address' => function($query){
                            $query->with(['user']);
                        }
                    ]);
        return view('seller.order.purchase-product-detail', compact('order'));
    }

    public function updateOrderStatus(Request $request, Order $order)
    {
        if ($request->filled('status'))
        {
            $order->update([
                'status' => OrderEnum::REJECTED
            ]);
            $order->load([
                'product' => function($query){
                    $query->with(['category', 'brand']);
                },
                'address' => function($query){
                    $query->with(['user']);
                },
                'seller'
            ]);
            $order->seller->notify(new ProductDispprovedNotification($order));
            return redirect()->route('seller.order.purchase')->with('success', 'Ürün başarıyla reddedildi');
        }
        $order->update([
            'status' => OrderEnum::APPROVED
        ]);
        $order->load([
            'product' => function($query){
                $query->with(['category', 'brand']);
            },
            'address' => function($query){
                $query->with(['user']);
            },
            'seller'
        ]);
        $order->seller->notify(new ProductApprovedNotification($order));
        return redirect()->route('seller.order.purchase')->with('success', 'Ürün başarıyla gönderildi');
    }
}
