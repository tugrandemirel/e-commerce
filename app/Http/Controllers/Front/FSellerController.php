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

        return view('front.seller.index', compact('seller'));
    }
}
