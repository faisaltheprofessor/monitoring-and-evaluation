<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = ['name', 'name_dari', 'user_id', 'unit_id', 'project_id', 'component_id', 'subcomponent_id', 'appraisal'];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function component()
    {
        return $this->belongsTo(Component::class);
    }

    public function subcomponent()
    {
        return $this->belongsTo(SubComponent::class);
    }


    public function plans()
    {
        return $this->hasMany(Plan::class);
    }
}
