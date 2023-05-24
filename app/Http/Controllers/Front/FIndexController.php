<?php

namespace App\Http\Controllers\Front;

use App\Enum\Product\ProductEnum;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class FIndexController extends Controller
{
    public function Index()
    {
        $lastAddProducts = Product::where('approve', ProductEnum::APPROVAL_APPROVED)
                            ->where('visibility', ProductEnum::VISIBILITY_ACTIVE)->orderBy('updated_at', 'desc')->limit(6)->get();

        return view('front.index', compact('lastAddProducts'));
    }
}
