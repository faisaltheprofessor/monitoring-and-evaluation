<?php

namespace App\Http\Controllers;

use App\District;
use App\Month;
use App\MonthlyProgress;
use App\Province;
use App\Project;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index()
    {
        return view('gis.interactive-map');
    }


    public function getMapInfo()
    {
        $provinces =  Province::all();
        foreach ($provinces as $province) {
            $province->no_of_districts = $province->districts->count();
            $province->districts = $province->districts;
            foreach ($province->districts as $district) {
                $district->percentage = $this->getDistrictPercentage($district->id);
            }
            $province->activity_count = $this->getActivitiesCount($province->id);
            $province->percentage = $this->getProvincePercentage($province->activity_count);
        }
        return $provinces;
    }

    function getDistrictsCoordinates()
    {
        $districts =  District::whereNotNull('long')->get();
        foreach ($districts as $district) {
            $district->projectActivityCount = $this->getDistrictProjectActivityCount($district->id);
        }


        return $districts;
    }

    function getActivitiesCount($province_id)
    {
        return  MonthlyProgress::where('province_id', $province_id)->count();
    }

    function getProvincePercentage($activityCount)
    {
        return round($activityCount / MonthlyProgress::count() * 100, 2);
    }

    function getDistrictPercentage($district_id)
    {
        return round(MonthlyProgress::where('district_id', $district_id)->count() / MonthlyProgress::count() * 100, 2);
    }

    function getDistrictProjectActivityCount($district_id)
    {
        $districtProjectActivitiesCount = [];
        foreach (Project::all() as $project) {

            $districtProjectActivitiesCount[$project->name] =  MonthlyProgress::where('project_id', $project->id)->where('district_id', $district_id)->count();
        }
        return $districtProjectActivitiesCount;
    }
}
