<?php

namespace App\Http\Controllers;

use App\Component;
use App\Project;
use App\SubComponent;
use App\Activity;
use App\MonthlyProgress;
use App\Plan;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FilterController extends Controller
{
    function index()
    {
        return view('filters.index');
    }

    function essentials()
    {
        $projects = Project::all();
        $components = Component::all();
        $subcomponents = SubComponent::all();
        $activities = Activity::all();
        $plans = Plan::all();
        // $outputs = MonthlyProgress::all();
        return response()->json(
            [
                'projects' => $projects,
                'components' => $components,
                'subcomponents' => $subcomponents,
                'activities' => $activities,
                'plans' => $plans,
                // 'outputs' => $outputs
            ]
        );
    }

    function components(Request $request)
    {
        $components = Component::where('project_id', $request->project_id)->get();
        return response()->json($components);
    }
    function subcomponents(Request $request)
    {
        $subcomponents = SubComponent::where('component_id', $request->component_id)->get();
        return response()->json($subcomponents);
    }

    function activities(Request $request)
    {
        $activities = Activity::where('subcomponent_id', $request->subcomponent_id)->get();
        return response()->json($activities);
    }

    function plans(Request $request)
    {
        $plans = Plan::with('activity')->where('activity_id', $request->activity_id)->orderBy('year')->get();
        return response()->json($plans);
    }

    function provinces(Request $request)
    {
        $provinces = MonthlyProgress::with('province')->where('plan_id', $request->plan_id)->groupBy('province_id')->get('province_id');
        // $provinces = MonthlyProgress::limit(10)->get();
        return response()->json($provinces);
    }
}
