<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    protected $fillable = ['name', 'name_dari', 'province_id', 'district_id', 'user_id'];
    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
