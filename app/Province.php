<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Province extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'name_dari', 'lat', 'long', 'user_id', 'region_id'];

    function districts()
    {
        return $this->hasMany(District::class);
    }

    function region()
    {
        return $this->belongsTo(Region::class);
    }
}
