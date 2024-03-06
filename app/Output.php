<?php

namespace App;

use App\Http\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Output extends Model
{
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
        'unit_id',
        'indicator_id',
        'plan_id'

    ];

    protected $dates = ['start_date', 'end_date'];


    public static function boot()
    {
        parent::boot();

        static::updating(function ($output) {
            $output->history()->attach(Auth::user()->id, [
                'before' => json_encode(array_intersect_key($output->fresh()->toArray(), $output->getDirty())),
                'after' => json_encode($output->getDirty())
            ]);
        });
    }

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }


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

    public function implementingPartner()
    {
        return $this->belongsTo(ImplementingPartner::class);
    }

    public function history()
    {
        return $this->belongsToMany(User::class, 'output_history')
            ->withTimestamps()
            ->withPivot('before', 'after')
            ->latest('pivot_updated_at');
    }

    public function indicator()
    {
        return $this->belongsTo(Indicator::class);
    }


    public function progress()
    {
        return $this->belongsToMany(Month::class)->withTimeStamps();
    }
}
