<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use Illuminate\Http\Request;

class FSellerController extends Controller
{
    public function index($slug)
    {
        $seller = Seller::where('slug', $slug)->firstOrFail();

        return view('front.seller.index', compact('seller'));
    }
}
