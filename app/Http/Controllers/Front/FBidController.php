<?php

namespace App\Http\Controllers\Front;

use App\Enum\Product\ProductEnum;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class FBidController extends Controller
{
    public function store(Request $request)
    {
        $product = $this->productControl($request->product_id);
        if (is_null($request->price) || is_null($request->product_id)) {
            return response()->json(['error' => 'Lütfen geçerli bir fiyat giriniz.']);
        }
        if ($product->price >= $request->price) {
            return response()->json(['error' => 'Ürün fiyatından daha düşük bir fiyat giremezsiniz.']);
        }
        $product->bid()->create([
            'user_id' => auth()->id(),
            'bid_price' => $request->price,
        ]);
        return response()->json(['success' => 'Teklifiniz başarıyla gönderildi.']);
    }


    private function productControl($product_id)
    {
        return Product::where('id', $product_id)
                        ->where('visibility', ProductEnum::VISIBILITY_ACTIVE)
                        ->where('approve', ProductEnum::APPROVAL_APPROVED)
                        ->firstOrFail();
    }
}
