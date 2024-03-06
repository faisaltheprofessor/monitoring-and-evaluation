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
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function index()
    {
        $projects = Project::pluck('name', 'id')->toArray();
        $components = Component::pluck('name', 'id')->toArray();
        $subcomponents = SubComponent::pluck('name', 'id')->toArray();
        $activities = Activity::pluck('name', 'id')->toArray();
        $provinces = Province::pluck('name', 'id')->toArray();
        $districts = District::pluck('name', 'id')->toArray();
        $villages = Village::pluck('name', 'id')->toArray();
        $implementingPartners = ImplementingPartner::pluck('name', 'id')->toArray();
        $beneficiaries = Beneficiary::pluck('name', 'id')->toArray();

        return view('reports.index', compact('projects', 'components', 'subcomponents', 'activities', 'provinces', 'districts', 'villages', 'implementingPartners', 'beneficiaries'));
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

        if ($request->has('subcomponent_id')) {
            $progress->where('subcomponent_id', $request->subcomponent_id);
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

        if ($request->has('end_date')) {
            $progress->where('end_date', $request->end_date);
        }

        if ($request->has('cost')) {
            $progress->where('cost', $request->cost);
        }

        if ($request->has('progress')) {
            $progress->where('percentage', $request->progress);
        }

        // Detecting Month and Year


        if ($request->has('year')) {
            $progress->whereYear('start_date', $request->year);
        }

        if ($request->has('month')) {
            $progress->whereMonth('start_date', $request->month);
        }




        //        $plans =  $plan->get();
        if (isset($_GET['paginate-records'])) $progress = $progress->paginate(100)->appends($request->all());
        else  if (isset($_GET['fetch-all-records'])) $progress = $progress->get();


        return view('reports.result', compact('progress'));
    }

    public function test()
    {
        return view('reports.result');
    }

    function cumulativeReport()
    {
        $projects = Project::pluck('name', 'id')->toArray();
        $components = Component::pluck('name', 'id')->toArray();
        $subcomponents = SubComponent::pluck('name', 'id')->toArray();
        $activities = Activity::pluck('name', 'id')->toArray();
        $provinces = Province::pluck('name', 'id')->toArray();
        $districts = District::pluck('name', 'id')->toArray();
        $villages = Village::pluck('name', 'id')->toArray();
        $implementingPartners = ImplementingPartner::pluck('name', 'id')->toArray();
        $beneficiaries = Beneficiary::pluck('name', 'id')->toArray();
        return view('reports.cumulative_report', compact('projects', 'components', 'subcomponents', 'activities', 'provinces', 'districts', 'villages', 'implementingPartners', 'beneficiaries'));

    }
    public function cumulativeReportResult(Request $request)
    {

        //        $plan = (new Plan)->newQuery();
        $progress = (new MonthlyProgress)->newQuery();

        if ($request->has('project_id')) {
            $progress->where('project_id', $request->project_id);
        }


        if ($request->has('component_id')) {
            $progress->where('component_id', $request->component_id);
        }

        if ($request->has('subcomponent_id')) {
            $progress->where('subcomponent_id', $request->subcomponent_id);
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

        if ($request->has('end_date')) {
            $progress->where('end_date', $request->end_date);
        }

        if ($request->has('cost')) {
            $progress->where('cost', $request->cost);
        }

        if ($request->has('progress')) {
            $progress->where('percentage', $request->progress);
        }

        // Detecting Month and Year


        if ($request->has('year')) {
            $progress->whereYear('start_date', $request->year);
        }

        if ($request->has('month')) {
            $progress->whereMonth('start_date', $request->month);
        }




        //        $plans =  $plan->get();
        if (isset($_GET['paginate-records'])) $progress = $progress->paginate(100)->appends($request->all());
        else  if (isset($_GET['fetch-all-records'])) $progress = $progress->groupBy('activity_id')->get();


        return view('reports.cumulative_report_result', compact('progress'));
    }

}
