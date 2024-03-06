<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubComponent extends Model
{
    protected $fillable = ['name', 'name_dari', 'user_id', 'project_id', 'component_id'];


    public function component()
    {
        return $this->belongsTo(Component::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function Activities()
    {
        return $this->hasMany(Activity::class, 'subcomponent_id');
    }
}
