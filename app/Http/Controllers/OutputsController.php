<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Beneficiary;
use App\Component;
use App\District;
use App\ImplementingPartner;
use App\Indicator;
use App\Month;
use App\MonthlyProgress;
use App\Output;
use App\Plan;
use App\Project;
use App\Province;
use App\SubComponent;
use App\Unit;
use App\Village;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Redirect;

class OutputsController extends Controller
{
    public function index()
    {
        $outputs = MonthlyProgress::groupBy('plan_id')->paginate(50);
        return view('outputs.index', compact('outputs'));
    }

    public function create()
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
        $units = Unit::pluck('name', 'id')->toArray();
        $indicators = Indicator::pluck('name', 'id')->toArray();
        $plan = Plan::findOrFail($_GET['plan_id']);
        return view('outputs.create', compact('projects', 'components', 'subComponents', 'activities', 'provinces', 'districts', 'villages', 'implementingPartners', 'beneficiaries', 'units', 'indicators', 'plan'));
    }

    public function store(Request $request)
    {
        $request['user_id'] = Auth::user()->id;
        Output::create($request->all());
        Session::flash("success", "Output saved successfully");
        return back();
    }


    public function show()
    {
        return view('outputs.show');
    }


    public function createForPlan()
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
        $units = Unit::pluck('name', 'id')->toArray();
        $indicators = Indicator::pluck('name', 'id')->toArray();
        //        $plan = Plan::findOrFail($_GET['plan_id']);
        $plans = Plan::join('activities', 'plans.activity_id', '=', 'activities.id')->pluck('activities.name', 'plans.id');
        return view('outputs.create-for-plan', compact('projects', 'components', 'subComponents', 'activities', 'provinces', 'districts', 'villages', 'implementingPartners', 'beneficiaries', 'units', 'indicators', 'plans'));
    }


    public function storeForPlan(Request $request)
    {
        $request['user_id'] = Auth::user()->id;
        $plan = Plan::findOrFail($request->plan_id);
        $request['project_id'] = $plan->project_id;
        $request['component_id'] = $plan->component_id;
        $request['subcomponent_id'] = $plan->subcomponent_id;
        $request['activity_id'] = $plan->activity_id;
        $request['unit_id'] = $plan->unit_id;
        $request['indicator_id'] = $plan->indicator_id;
        $request['province_id'] = $plan->province_id;
        $request['village_id'] = $plan->village_id;
        $request['district_id'] = $plan->district_id;
        $request['district_id'] = $plan->district_id;
        $request['indicator_id'] = $plan->indicator_id;
        $request->validate([
            'plan_id' => 'unique:outputs|required'
        ]);
        Output::create($request->all());
        Session::flash("success", "Output saved successfully");
        return back();
    }

    public function outputs()
    {
        $outputs = Output::all();
        return view('plans.outputs')->withOutputs($outputs);
    }

    public function update(Request $request)
    {
        $output = Output::findOrFail($request->id);
        $output->progress = $request->progress;
        $output->remarks = $request->remarks;
        $output->quantity = $request->quantity;
        $output->cost = $request->cost;
        $output->update();
        Session::flash('update', 'Output updated successfully');
        return back();
    }


    public function MonthlyProgress($id)
    {
        $output = Output::findOrFail($id);
        return view('outputs.monthlyProgress', compact('output'));
    }


    public function StoreMonthlyProgress(Request $request)
    {
        // $request->validate([
        //     'plan_id' => 'unique_with:monthly_progress,province_id,district_id,quantity,start_date'
        // ]);
        $year = $request['year'];
        $month = $request['month'];
        $request = $request->toArray();
        $plan = Plan::findOrFail($request['plan_id']);
        $request['project_id'] = $plan->project_id;
        $request['component_id'] = $plan->component_id;
        $request['subcomponent_id'] = $plan->subcomponent_id;
        $request['activity_id'] = $plan->activity_id;
        if ($plan->quantity != 0)
            $progress = $plan->progress + ($request['quantity'] / $plan->quantity * 100);
        else $progress = 0;
        $plan->progress = $progress;
        $plan->update();
        $request['user_id'] = Auth::user()->id;
        $request['cumulative_progress'] = $progress;
        $request['month_id'] = $request['month'];
        //        return $request;
        $start_date = Carbon::createFromDate($year, $month, 1);
        $end_date =  Carbon::parse($start_date)->endOfMonth();
        $request['start_date'] = $start_date;
        $request['end_date'] = $end_date;
        MonthlyProgress::create($request);

        Session::flash('success', 'Progress Updated successfully.');
        // return Redirect::back()->with('year', $year)->with('month', $month);
        return redirect('/plan/' . $request['plan_id'] . "?month=$month&year=$year");
        // return back();
    }



    public function edit_progress(MonthlyProgress $progress)
    {

        $provinces = Province::pluck('name', 'id')->toArray();
        $districts = District::pluck('name', 'id')->toArray();
        $villages = Village::pluck('name', 'id')->toArray();

        return view('outputs.edit_progress', compact('progress', 'provinces', 'districts', 'villages'));
    }

    public function update_progress(Request $request)
    {
        $progress = MonthlyProgress::find($request->id);
        if (Auth::user()->id != 1) {
            if ($progress->user_id != Auth::user()->id) {
                Session::flash('failure', 'Not authorized to edit this record');
                return redirect('/plan/' . $progress->plan_id);
            }
        }
        $request = $request->toArray();
        $start_date = Carbon::createFromDate($request['year'], $request['month'], 1);
        $end_date =  Carbon::parse($start_date)->endOfMonth();
        $request['start_date'] = $start_date;
        $request['end_date'] = $end_date;

        $progress->update($request);

        Session::flash('success', 'Progress Updated Successfullay');
        return redirect("/plan/" . $progress->plan->id);
    }


    function datatable()
    {
        $start = microtime(1);
        // $progress = MonthlyProgress::with('activity', 'project', 'component', 'subcomponent', 'user')->paginate(500);
        $progress = MonthlyProgress::paginate(5000);
        $end = microtime(10);
        $duration = $end - $start;
        return view('datatable', compact('progress', 'duration'));
    }

    function getProgress()
    {
        $progress = MonthlyProgress::with('activity', 'project', 'component', 'subcomponent', 'activity', 'province', 'district')->limit(200)->get();
        return $progress;
    }
}
