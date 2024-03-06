<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Beneficiary;
use App\Benificiary;
use App\Component;
use App\District;
use App\ImplementingPartner;
use App\MonthlyProgress;
use App\Project;
use App\Province;
use App\SubComponent;
use App\Village;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function index()
    {
        $projects = Project::pluck('name', 'id')->toArray();
        $components = Component::pluck('name', 'id')->toArray();
        $subComponents = SubComponent::pluck('name', 'id')->toArray();
        $activities = Activity::pluck('name', 'id')->toArray();
        $provinces = Province::pluck('name', 'id')->toArray();
        $districts = District::pluck('name', 'id')->toArray();
        $villages = Village::pluck('name', 'id')->toArray();
        $implementingPartners = ImplementingPartner::pluck('name', 'id')->toArray();
        $beneficiaries = Beneficiary::pluck('name', 'id')->toArray();

        return view('reports.index', compact('projects', 'components', 'subComponents', 'activities', 'provinces', 'districts', 'villages', 'implementingPartners', 'beneficiaries'));
    }


    public function generate(Request $request)
    {
        //        $plan = (new Plan)->newQuery();
        $progress = (new MonthlyProgress)->newQuery();

        if ($request->has('project_id')) {
            $progress->where('project_id', $request->project_id);
        }


        if ($request->has('component_id')) {
            $progress->where('component_id', $request->component_id);
        }

        if ($request->has('activity_id')) {
            $progress->where('activity_id', $request->activity_id);
        }
        if ($request->has('province_id')) {
            $progress->where('province_id', $request->province_id);
        }

        if ($request->has('district_id')) {
            $progress->where('district_id', $request->district_id);
        }



        if ($request->has('village_id')) {
            $progress->where('village_id', $request->village_id);
        }

        if ($request->has('start_date')) {
            $progress->where('start_date', $request->start_date);
        }


        //        $plans =  $plan->get();
        $progress = $progress->get();

        // return view('reports.result', compact('progress'));
    }

    public function test()
    {
        return view('reports.result');
    }

    function advanced()
    {
        return view('reports.advanced');
    }
}
