<?php

namespace App\Http\Controllers\Front;

use App\Enum\Product\ProductEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\AccountRequest;
use App\Models\Address;
use App\Models\Bid;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FAccountController extends Controller
{
    public function index()
    {

        $user = auth()->user();
        /*$bids = Bid::where('user_id', $user->id)
            ->with(['product' => function ($query) {
                $query->where('stock', ProductEnum::STOCK_ACTIVE)
                    ->where('visibility', ProductEnum::VISIBILITY_ACTIVE)
                    ->where('approve', ProductEnum::APPROVAL_APPROVED);
            }])
            ->get();*/
        $products = Product::where('stock', ProductEnum::STOCK_ACTIVE)
            ->where('visibility', ProductEnum::VISIBILITY_ACTIVE)
            ->where('approve', ProductEnum::APPROVAL_APPROVED)
            ->with(['bids' => function($q) use ($user) {
                $q->where('user_id', $user->id)
                    ->orderBy('bid_price', 'desc')
                    ->groupBy('product_id');
            }])
            ->get();

        $bids = [];
        foreach ($products as $product) {
            array_push($bids, $product->bids->first());
            // En yüksek teklifi veren kullanıcının teklifini alıyoruz.
        }

        $orders = Bid::where('user_id', $user->id)
            ->with(['product' => function ($query) {
                $query->where('stock', ProductEnum::STOCK_ACTIVE)
                    ->where('visibility', ProductEnum::VISIBILITY_ACTIVE)
                    ->where('approve', ProductEnum::APPROVAL_APPROVED);
            }])
            ->where(function ($query) {
                $query->where('approved_at', '!=', null)
                    ->orWhere('completed_at', '!=', null)
                    ->orWhere('paid_at', '!=', null);
            })
            ->get();
        $addresses = $user->addresses()->get();

        return view('front.account.index', compact('bids', 'orders', 'user', 'addresses'));
    }

    public function update(AccountRequest $request)
    {
        $data = $request->except('_token');

        $user = auth()->user();

        $update = $user->update($data);

        if ($update) {
            return redirect()->back()->with('success', 'Bilgileriniz başarıyla güncellendi.');
        } else {
            return redirect()->back()->with('error', 'Bilgileriniz güncellenirken bir hata oluştu.');
        }
    }

    public function passwordUpdate(Request $request)
    {
        $data = $request->validate([
            'password' => 'required|confirmed|min:8',
            'old_password' => 'required',
        ],[
            'password.required' => 'Yeni şifre alanı boş bırakılamaz.',
            'password.confirmed' => 'Şifreler birbiriyle uyuşmuyor.',
            'password.min' => 'Yeni şifre en az 8 karakter olmalıdır.',
            'old_password.required' => 'Eski şifre alanı boş bırakılamaz.',
        ]);


        $user = auth()->user();
        if (Hash::check($data['old_password'], $user->password)) {
            $user->password = Hash::make($data['password']);
            $user->save();
            return redirect()->back()->with('success', 'Şifreniz başarıyla güncellendi.');
        } else {
            return redirect()->back()->with('error', 'Eski şifreniz yanlış.');
        }
    }

}
