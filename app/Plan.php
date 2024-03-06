<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'activity_id',
        'project_id',
        'component_id',
        'subcomponent_id',
        'user_id',
        'start_date',
        'end_date',
        'quantity',
        'description',
        'province_id',
        'district_id',
        'village_id',
        'cost',
        'long_start',
        'long_end',
        'lat_start',
        'lat_end',
        'implementing_partner_id',
        'direct_beneficiary_id',
        'indirect_beneficiary_id',
        'command_area',
        'remarks',
        'output_details',
        'progress',
        'quarter',
        'year',
        'month',
        'day',
        'indicator_id',
        'unit_id'
    ];

    protected $dates = ['start_date', 'end_date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function activity()
    {
        return $this->belongsTo(Activity::class);
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

    public function beneficiary()
    {
        return $this->belongsTo(Benificiary::class);
    }

    public function implementing_partner()
    {
        return $this->belongsTo(ImplementingPartner::class);
    }

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

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function implementingPartner()
    {
        return $this->belongsTo(ImplementingPartner::class);
    }

    public function output()
    {
        return $this->hasOne(Output::class);
    }

    public function overallProgress()
    {
        return $this->hasMany(MonthlyProgress::class)
            ->orderBy('id', 'asc');
    }
}
