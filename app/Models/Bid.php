<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', // ürün id
        'user_id', // kullanıcı id
        'bid_price', // teklif fiyatı
        'approved_at', // onaylanma tarihi
        'rejected_at', // reddedilme tarihi
        'expired_at', // süresi dolma tarihi
        'canceled_at', // iptal tarihi
        'completed_at', // tamamlanma tarihi
        'paid_at', // ödeme tarihi
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }


}
