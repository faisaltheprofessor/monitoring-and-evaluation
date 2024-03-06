<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scheme extends Model
{
    protected $fillable = [
        'name', 'code', 'user_id', 'start_point_lat', 'start_point_long', 'end_point_lat', 'end_point_long',
        'ia_id', 'total_command_area', 'irrigated_area', 'nonirrigated_area', 'direct_beneficiaries', 'indirect_beneficiaries',
        'engineering_estimated_cost', 'engineering_estimated_cost_usd', 'project_status', 'contract_cost', 'contract_cost_usd',
        'remarks', 'village_id', 'district_id', 'province_id', 'project_id', 'start_date', 'end_date'
    ];


    function project()
    {
        return $this->belongsTo(Project::class);
    }
}
