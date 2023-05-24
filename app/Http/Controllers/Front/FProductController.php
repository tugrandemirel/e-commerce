<?php

namespace App\Http\Controllers\Front;

use App\Enum\Product\ProductEnum;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class FProductController extends Controller
{
    public function index()
    {
        $products = Product::where('visibility', ProductEnum::VISIBILITY_ACTIVE)
                            ->where('approve', ProductEnum::APPROVAL_APPROVED)
                            ->orderBy('id', 'desc')
                            ->paginate(20);
        return view('front.product.index', compact('products'));
    }
    public function detail($slug)
    {
        $product = $this->productControl($slug);
        if (!$product) {
            return redirect()->route('index');
        }

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
