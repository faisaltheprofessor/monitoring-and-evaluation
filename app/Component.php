<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    protected $fillable = ['name', 'name_dari', 'user_id', 'project_id'];


    public function subComponents()
    {
        return $this->hasMany(SubComponent::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
