<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class FApplicationFormController extends Controller
{
    public function sellerApplicationForm()
    {
        $cities = City::all();
        return view('front.application.seller', compact('cities'));
    }

    public function sellerApplicationFormStore(Request $request)
    {
        return true;
    }
}
