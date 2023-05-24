<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'user_id',
        'bid_price',
        'approved_at',
        'rejected_at',
        'expired_at',
        'canceled_at',
        'completed_at',
        'paid_at',
    ];

}
