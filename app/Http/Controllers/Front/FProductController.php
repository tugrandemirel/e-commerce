<?php

namespace App\Http\Controllers\Front;

use App\Enum\Product\ProductEnum;
use App\Enum\Review\ReviewEnum;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class FProductController extends Controller
{
    public function index()
    {
        $products = Product::where('visibility', ProductEnum::VISIBILITY_ACTIVE)
                            ->where('stock', ProductEnum::STOCK_ACTIVE)
                            ->where('approve', ProductEnum::APPROVAL_APPROVED)
                            ->orderBy('id', 'desc')
                            ->paginate(20);
        return view('front.product.index', compact('products'));
    }
    public function detail($slug)
    {
        $product = Product::where('slug', $slug)
            ->where('visibility', ProductEnum::VISIBILITY_ACTIVE)
            ->where('stock', ProductEnum::STOCK_ACTIVE)
            ->where('approve', ProductEnum::APPROVAL_APPROVED)
            ->firstOrFail();
        if (!$product) {
            return redirect()->route('index');
        }

        $product =  Product::where('slug', $slug)
                    ->where('visibility', ProductEnum::VISIBILITY_ACTIVE)
                    ->where('stock', ProductEnum::STOCK_ACTIVE)
                    ->where('approve', ProductEnum::APPROVAL_APPROVED)
                    ->with([
                        'bid' => function($query){
                            $query->orderBy('bid_price', 'desc');
                    },
                        'reviews' => function($query){
                            $query->where('is_approved', ReviewEnum::APPROVED_ACTIVE)
                                    ->where('is_pushed', ReviewEnum::PUSHED_ACTIVE)
                                    ->orderBy('rating', 'desc')
                                    ->limit(2);

                    }])
                    ->firstOrFail();

        return view('front.product.detail', compact('product'));
    }


    private function productControl($slug)
    {
        return Product::where('slug', $slug)
                        ->where('visibility', ProductEnum::VISIBILITY_ACTIVE)
                        ->where('approve', ProductEnum::APPROVAL_APPROVED)
                        ->firstOrFail();
    }
}
