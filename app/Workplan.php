<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workplan extends Model
{
    protected $fillable = ['workplan', 'project_id', 'user_id'];

    public function project(){
        return $this->belongsTo(Project::class);
    }
}
