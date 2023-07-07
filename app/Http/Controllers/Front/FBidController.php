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

        $request->validate([
            'product_id' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        $user = auth()->user();

        if ($user->id == $this->productControl($request->product_id)->user_id)
            return response()->json(['error' => 'Kendi ürününüze teklif veremezsiniz.']);

        if (!$user->wallet)
            return response()->json(['error' => 'Lütfen cüzdan oluşturunuz.']);

        if ($user->wallet->availableBalance < $request->price)
            return response()->json(['error' => 'Bakiyeniz yetersiz.']);

        $product = $this->productControl($request->product_id);
        if (is_null($request->price) || is_null($request->product_id))
            return response()->json(['error' => 'Lütfen geçerli bir fiyat giriniz.']);

        if ($product->price >= $request->price)
            return response()->json(['error' => 'Ürün fiyatından daha düşük bir fiyat giremezsiniz.']);

        $lastOffer = $product->bid()->latest('bid_price')->first();

        if (!is_null($lastOffer) && $lastOffer->bid_price >= $request->price)
            return response()->json(['error' => 'Son tekliften daha düşük bir fiyat giremezsiniz.']);

        $product->bid()->create([
            'user_id' => $user->id,
            'bid_price' => $request->price,
            'paid_at' => now(),
        ]);

        $user->wallet->update([
            'locked_balance' => $user->wallet->locked_balance + $request->price,
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
