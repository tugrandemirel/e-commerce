<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class FWishlistController extends Controller
{
    public function index()
    {
        return 'index';
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer'
        ]);
        $control = Wishlist::where('user_id', auth()->id())->where('product_id', $request->product_id)->first();
        if ($control) {
            $control->delete();
            return response()->json(['error' => 'Ürün favorilerden kaldırıldı.']);
        }
        $create = Wishlist::create([
            'user_id' => auth()->id(),
            'product_id' => $request->product_id
        ]);

        if ($create) {
           return response()->json(['success' => 'Ürün favorilere eklendi.']);
        } else {
            return response()->json(['error' => 'Ürün favorilere eklenemedi.']);
        }
    }

    public function destroy($id)
    {
        return 'destroy';
    }


}
