<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = ['name', 'name_dari', 'user_id'];

    public function activiies()
    {
        return $this->belongsToMany('activity');
    }
}
