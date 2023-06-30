<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class TestController extends Controller
{
    private object $product;
    public function SellerAuctionEndNotification()
    {
         $this->product = Product::first();
        dd($this->product->seller);
    }
}
