<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'type',
        'status',
        'balance',
        'locked_balance',
        'user_id'
    ];

    public function availableBalance() : Attribute
    {
        return Attribute::make(
            fn() => $this->balance - $this->locked_balance,
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
