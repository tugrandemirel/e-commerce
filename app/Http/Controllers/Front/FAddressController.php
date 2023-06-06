<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Address;
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
        $data['user_id'] = $user->id;
        $address = $user->address()->create($data);
        if ($address)
            return redirect()->back()->with('success', 'Adres başarıyla eklendi.');
        else
            return redirect()->back()->with('error', 'Adres eklenirken bir hata oluştu.');
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $address = Address::find($id);
        if ($address)
            return response()->json($address);
        else
            return response()->json(['error' => 'Adres bulunamadı.'], 404);
    }

    public function update(Request $request)
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
        $id = $request->id;
        $address = Address::find($id);
        if ($address->update($data))
            return redirect()->back()->with('success', 'Adres başarıyla güncellendi.');
        else
            return redirect()->back()->with('error', 'Adres güncellenirken bir hata oluştu.');

    }
    public function delete(Request $request)
    {
        $id = $request->id;
        $address = Address::find($id);
        if ($address->delete())
            return redirect()->back()->with('success', 'Adres başarıyla silindi.');
        else
            return redirect()->back()->with('error', 'Adres silinirken bir hata oluştu.');

    }
}
