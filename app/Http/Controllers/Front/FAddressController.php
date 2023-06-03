<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FAddressController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'user_name' => 'required',
            'user_surname' => 'required',
            'user_phone' => 'required',
            'city' => 'required',
            'county' => 'required',
            'neighborhood' => 'required',
            'address' => 'required',
        ]);
        $user = auth()->user();
        $address = $user->addresses()->create($data);
        if ($address)
            return redirect()->back()->with('success', 'Adres başarıyla eklendi.');
        else
            return redirect()->back()->with('error', 'Adres eklenirken bir hata oluştu.');
    }
}
