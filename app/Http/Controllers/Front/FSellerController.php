<?php

namespace App\Http\Controllers\Front;

use App\Enum\Product\ProductEnum;
use App\Enum\Review\ReviewEnum;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Seller;
use Illuminate\Http\Request;

class FSellerController extends Controller
{
    public function index($slug)
    {
        $nextDate = date('Y-m-d', strtotime('+1 day'));
        $prevDate = date('Y-m-d', strtotime('-3 month'));
        $seller = Seller::where('slug', $slug)
                ->with(['products' => function($query){
                    $query->where('visibility', ProductEnum::VISIBILITY_ACTIVE)
                        ->where('stock', ProductEnum::STOCK_ACTIVE)
                        ->where('approve', ProductEnum::APPROVAL_APPROVED)
                        ->with(['reviews' => function($query){
                            $query->where('is_approved', ReviewEnum::APPROVED_ACTIVE)
                                ->where('is_pushed', ReviewEnum::PUSHED_ACTIVE);
                        }])
                        ->orderBy('end_date', 'desc');
                }])
                ->firstOrFail();

        /*
         *  1.product 2.product avg
         *  5           4       (5+4/2) = 3.5
         *
         * 1.product 2.product 3.product avg
         * 5           4           3       (5+4+3/3) = 4
         *
         * 1.product 2.product 3.product 4.product avg
         * 5           5          5          5   (5+5+5+5/4) = 5
         *
         * 1.product 2.product 3.product 4.product 5.product avg
         *
         * 5           2          3          1         1   (5+2+3+1+1/5) = 2.4
         */
        return view('front.seller.index', compact('seller'));
    }
}
