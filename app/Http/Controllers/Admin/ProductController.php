<?php

namespace App\Http\Controllers\Admin;

use App\Enum\Category\CategoryEnum;
use App\Enum\Product\ProductEnum;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('seller')
            ->where(function ($query){
                $query->where('approve', ProductEnum::APPROVAL_PENDING)
                    ->orWhere('approve', ProductEnum::APPROVAL_RESEND);
            })->get();
        return view('admin.product.index', compact('products'));
    }

    public function show(Product $product)
    {
        if (!$product->approve == ProductEnum::APPROVAL_PENDING || !$product->approve = ProductEnum::APPROVAL_RESEND)
            abort(404);

        $category = $product->category()->get();
        $brand = $product->brand()->get();
        return view('admin.product.show', compact('product', 'category', 'brand'));
    }

    public function reject(Request $request, Product $product)
    {
        $product->approve = ProductEnum::APPROVAL_REJECTED;
        $product->feedback = $request->feedback;
        $product->save();
        return redirect()->back()->with('success', 'Ürün başarıyla reddedildi.');
    }

    public function approve(Request $request, Product $product)
    {
        $product->approve = ProductEnum::APPROVAL_APPROVED;
        $product->save();
        return redirect()->back()->with('success', 'Ürün başarıyla onaylandı.');
    }
}
