<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationSeller extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'email',
        'phone',
        'company',
        'city',
        'county',
        'category_id',
        'identity_number',
        'agreement',
        'status',
    ];

    protected $casts = [
        'agreement' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
