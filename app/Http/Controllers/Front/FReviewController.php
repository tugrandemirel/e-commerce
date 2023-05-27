<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class FReviewController extends Controller
{
    public function store(Request $request, Product $product)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'rating' => 'required|numeric|min:1|max:5',
            'comment' => 'required|string|max:500',
        ]);



        return redirect()->back()->with('success', 'Review submitted successfully.');
    }
}
