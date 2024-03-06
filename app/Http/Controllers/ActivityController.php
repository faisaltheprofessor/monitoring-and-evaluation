<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Component;
use App\Project;
use App\SubComponent;
use App\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Console\Input\Input;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Activity::all();
        $subComponents = SubComponent::pluck('name', 'id')->toArray();
        $units = Unit::pluck('name', 'id')->toArray();
        return view('activities.index', compact('activities', 'subComponents', 'units'));
    }
    public function create()
    {
        //        $projects = Project::all();
        $subComponents = SubComponent::pluck('name', 'id')->toArray();
        $units = Unit::pluck('name', 'id')->toArray();
        return view('activities.create', compact('subComponents', 'units'));
    }


    public function store(Request $request)
    {
        // $request->validate([
        // 	'name' => 'unique_with:activities,name,subcomponent_id'
        // ]);
        $subComponent = SubComponent::find($request['subcomponent_id']);
        $component_id = $subComponent->component->id;
        $project_id = $subComponent->project->id;
        $request = $request->toArray();
        $request['user_id'] = Auth::user()->id;
        $request['component_id'] = $component_id;
        $request['project_id'] = $project_id;


        Activity::create($request);
        Session::flash('success', 'Activity saved successfully');
        return back();
    }



    public function show(Activity $activity)
    {
        return view('activities.show', compact('activity'));
    }
}
