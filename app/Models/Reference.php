<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ref_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
