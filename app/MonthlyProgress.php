<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MonthlyProgress extends Model
{
    use SoftDeletes;
    protected $table = 'monthly_progress';
    protected $fillable = [
        'plan_id',
        'province_id',
        'village_id',
        'district_id',
        'user_id',
        'month_id',
        'start_date',
        'end_date',
        'quantity',
        'cost',
        'lat_start',
        'lat_end',
        'long_start',
        'long_end',
        'progress',
        'command_area',
        'description',
        'remarks',
        'percentage',
        'project_id',
        'activity_id',
        'component_id',
        'subcomponent_id',
        'cumulative_progress'


    ];
    protected $dates = ['start_date', 'end_date'];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }
    public function district()
    {
        return $this->belongsTo(District::class);
    }
    public function village()
    {
        return $this->belongsTo(Village::class);
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


    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
