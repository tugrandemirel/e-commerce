<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'user_name',
        'user_surname',
        'user_phone',
        'city',
        'county',
        'neighborhood',
        'address'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
