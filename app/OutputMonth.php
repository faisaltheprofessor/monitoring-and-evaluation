<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OutputMonth extends Model
{
    protected $table = 'month_output';
    protected $fillable = ['user_id', 'progress', 'output_id', 'month_id'];
}
