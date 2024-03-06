<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Project extends Model
{
    use SoftDeletes;
    use \Staudenmeir\EloquentHasManyDeep\HasRelationships;


    protected $fillable = ['name', 'name_dari', 'abbreviation', 'user_id', 'logo'];

    public function components()
    {
        return $this->hasMany(Component::class);
    }

    public function subcomponents()
    {
        return $this->hasManyThrough(Subcomponent::class, Component::class);
    }

    public function activities()
    {
        return $this->hasManyDeep(Activity::class, [Component::class, SubComponent::class], [null, null, 'subcomponent_id']);
    }

    public function plans()
    {
        return $this->hasMany(Plan::class);
    }








    public function logframes()
    {
        return $this->hasMany(Logframe::class);
    }


    public function workplans()
    {
        return $this->hasMany(Workplan::class);
    }
}
