<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable = ['name', 'name_dari', 'province_id', 'user_id', 'lat', 'long'];
    public function province()
    {
        return $this->belongsTo(Province::class);
    }
}
