<?php

namespace App\Http\Controllers\Front;

use App\Enum\Product\ProductEnum;
use App\Http\Controllers\Controller;
use App\Models\Bid;
use Illuminate\Http\Request;

class FCartController extends Controller
{
    public function index()
    {
        $carts = Bid::where('user_id', auth()->id())
                    ->with(['product' => function($query){
                            $query->where('approve', ProductEnum::APPROVAL_APPROVED)
                                    ->where('visibility', ProductEnum::VISIBILITY_ACTIVE)
                                    ->where('stock', ProductEnum::STOCK_ACTIVE);
                    }])
                    ->get();

    }
}
