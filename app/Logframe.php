<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logframe extends Model
{
    protected $fillable = ['logframe', 'project_id', 'user_id'];

}
