<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FApplicationFormController extends Controller
{
    public function sellerApplicationForm()
    {
        return view('front.application.seller');
    }

    public function sellerApplicationFormStore(Request $request)
    {
        return true;
    }
}
