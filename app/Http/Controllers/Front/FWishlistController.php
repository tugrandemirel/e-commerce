<?php

namespace App\Http\Controllers\Front;

use App\Enum\Product\ProductEnum;
use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class FWishlistController extends Controller
{
    public function index()
    {
        $wishlists = Wishlist::where('user_id', auth()->id())
                    ->with(['product' => function($query){
                        $query->where('stock', ProductEnum::STOCK_ACTIVE)
                                ->where('visibility', ProductEnum::VISIBILITY_ACTIVE)
                                ->where('approve', ProductEnum::APPROVAL_APPROVED)
                                ->with('brand');
                    }])
                    ->orderByDesc('created_at', 'DESC')
                    ->get();
        return view('front.wishlist.index', compact('wishlists'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer'
        ]);
        $control = Wishlist::where('user_id', auth()->id())->where('product_id', $request->product_id)->first();
        if ($control) {
            $control->delete();
            return response()->json(['error' => 'Ürün favorilerden kaldırıldı.', 'count' => $control == 0 ? 0 : $control]);
        }
        $create = Wishlist::create([
            'user_id' => auth()->id(),
            'product_id' => $request->product_id
        ]);
        $count = Wishlist::where('user_id', auth()->user()->id)->count();
        if ($create) {
           return response()->json([
               'success' => 'Ürün favorilere eklendi.',
                'count' => $count == 0 ? 0 : $count
           ]);
        } else {
            return response()->json(['error' => 'Ürün favorilere eklenemedi.']);
        }
    }

    public function destroy(Request $request)
    {
       $delete =  Wishlist::where('id', $request->wishlistId)->delete();
         if (!$delete)
              return response()->json(['error' => 'Ürün favorilerden kaldırılamadı.']);
        return response()->json(['success' => 'Ürün favorilerden kaldırıldı.']);
    }


}
