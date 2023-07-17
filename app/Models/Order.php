<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'user_id',
        'seller_id',
        'address_id',
        'order_number',
        'product_id',
        'product_title',
        'product_slug',
        'product_bid_price',
        'product_price',
        'product_total',
        'status',
        'paid_at',
        'cancelled_at',
        'shipped_at',
        'delivered_at',
        'returned_at',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }


}
