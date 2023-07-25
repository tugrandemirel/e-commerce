<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Neighbourhood extends Model
{
    public $timestamps = false;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'neighbourhoods';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'post_code', 'district_id'];

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
