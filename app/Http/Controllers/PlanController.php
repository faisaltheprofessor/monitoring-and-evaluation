<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Beneficiary;
use App\Component;
use App\District;
use App\ImplementingPartner;
use App\Indicator;
use App\MonthlyProgress;
use App\Output;
use App\Plan;
use App\Project;
use App\Province;
use App\SubComponent;
use App\Unit;
use App\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Console\Helper\ProgressBar;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

//        $result = Plan::select(DB::raw('YEAR(start_date) as year'))->distinct()->get();
        $clapyears = Plan::groupBy('year')->where('project_id', '1')->pluck('year');
        $snapp2years = Plan::groupBy('year')->where('project_id', '2')->pluck('year');
        $firstQuarterPlans = Plan::where('quarter', 1)->get();
        $secondQuarterPlans = Plan::where('quarter', 2)->get();
        $thirdQuarterPlans = Plan::where('quarter', 3)->get();
        $fourthQuarterPlans = Plan::where('quarter', 4)->get();
        $plans = Plan::all();
        return view('plans.index', compact('clapyears','snapp2years', 'firstQuarterPlans', 'secondQuarterPlans', 'thirdQuarterPlans', 'fourthQuarterPlans', 'plans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $indicators = Indicator::pluck('name', 'id')->toArray();
        $units = Unit::pluck('name', 'id')->toArray();

        return view('plans.create', compact('projects', 'components', 'subComponents', 'activities', 'provinces', 'districts', 'villages', 'implementingPartners', 'beneficiaries', 'indicators', 'units'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $activity  = Activity::find($request['activity_id']);
        $request['user_id'] = Auth::user()->id;
        $request['component_id'] = $activity->component_id;
        $request['subcomponent_id'] = $activity->subcomponent_id;
        Plan::create($request->all());
        Session::flash("success","Plan saved successfully");
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function show(Plan $plan)
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
        $indicators = Indicator::pluck('name', 'id')->toArray();
        $units = Unit::pluck('name', 'id')->toArray();

        return view('plans.show', compact('plan','projects', 'components', 'subComponents', 'activities', 'provinces', 'districts', 'villages', 'implementingPartners', 'beneficiaries', 'indicators', 'units'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function edit(Plan $plan)
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
        $indicators = Indicator::pluck('name', 'id')->toArray();
        $units = Unit::pluck('name', 'id')->toArray();

        return view('plans.edit', compact('projects', 'components', 'subComponents', 'activities', 'provinces', 'districts', 'villages', 'implementingPartners', 'beneficiaries', 'indicators', 'units', 'plan'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plan $plan)
    {
        $activity = Activity::find($request['activity_id']);
        $request['component_id'] = $activity->component_id;
        $request['subcomponent_id'] = $activity->subcomponent_id;
        $plan->update($request->all());
        Session::flash("success","Plan update successfully");
        return redirect('/plan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plan $plan)
    {
        //
    }


    public function progressForProvince($plan, $province)
    {
        $progresses = '';
        if(isset($_GET['sort']))  $progresses = MonthlyProgress::where('plan_id', $plan)->where('province_id', $province)->orderBy('id', 'desc')->get();

        else $progresses = MonthlyProgress::where('plan_id', $plan)->where('province_id', $province)->get();
        return view('plans.province_progress', compact('progresses'));
    }


}
