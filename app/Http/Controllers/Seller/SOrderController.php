<?php

namespace App\Http\Controllers\Seller;

use App\Enum\Cart\CartEnum;
use App\Enum\Product\ProductEnum;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Seller;
use Illuminate\Http\Request;

class SOrderController extends Controller
{
    public function purchaseProduct()
    {
        $products = Seller::where('user_id', auth()->user()->id)
            ->with(['products' => function($query){
                $query->where('approve', ProductEnum::APPROVAL_APPROVED)
                    ->where('stock', ProductEnum::STOCK_ACTIVE)
                    ->where('visibility', ProductEnum::VISIBILITY_ACTIVE)
                    ->with(['cart' => function($query){
                        $query->where('status', CartEnum::STATUS_APPROVED);
                    }])
                    ->orderBy('id', 'desc');
            }])->first();
//        dd($products->products[0]->cart);

        return view('seller.order.purchase-product', compact('products'));
    }

    public function purchaseProductDetail(Product $product)
    {
        $product = $product
                    ->load(['cart' => function($query){
                    $query->where('status', CartEnum::STATUS_APPROVED)
                        ->with(['user' => function($query){
                            $query->with(['address']);
                        }]);
                }, 'category', 'brand']);

        return view('seller.order.purchase-product-detail', compact('product'));
    }
}
