<?php

namespace App\Http\Controllers;

use App\Models\County;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function getDistrict(Request $request)
    {
        //dd($request->id);
        $districts = County::where('city_id', $request->id)->get();
        if($districts->count() > 0)
        {
            return response()->json([
                'status' => 'success',
                'data' => $districts
            ], 200);
        }
        return response()->json([
            'status' => 'error',
            'message' => 'İlçe bulunamadı'
        ], 401);
    }
}
