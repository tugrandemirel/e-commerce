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
