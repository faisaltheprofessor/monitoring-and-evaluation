<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beneficiary extends Model
{
    protected $fillable = ['name', 'name_dari', 'abbreviation', 'user_id'];
}
