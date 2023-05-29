<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'content',
        'is_active',
        'order',
        'header',
        'navbar',
        'footer',
        'meta_title',
        'meta_description',
        'meta_keywords'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'header' => 'boolean',
        'navbar' => 'boolean',
        'footer' => 'boolean'
    ];
}
