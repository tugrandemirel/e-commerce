<?php

namespace App\Http\Controllers\Front;

use App\Enum\Review\ReviewEnum;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class FReviewController extends Controller
{
    public function store(Request $request, Product $product)
    {
        $request->validate([
            'rating' => 'required|numeric|min:1|max:5',
            'comment' => 'required|string|max:500',
        ]);
        dd($request->all());
        $data = $request->only(['rating', 'comment']);
        $data['user_id'] = auth()->id();
        $data['product_id'] = $product->id;
        $data['seller_id'] = $product->seller_id;
        $data['is_approved'] = ReviewEnum::APPROVED_PASSIVE;
        $data['is_pushed'] = ReviewEnum::PUSHED_PASSIVE;

        return redirect()->back()->with('success', 'Review submitted successfully.');
    }
}
