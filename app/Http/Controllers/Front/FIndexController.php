<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FIndexController extends Controller
{
    public function Index()
    {
        return view('front.index');
    }
}
