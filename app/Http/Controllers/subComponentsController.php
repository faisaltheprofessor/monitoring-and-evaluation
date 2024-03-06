<?php

namespace App\Http\Controllers;

use App\Component;
use App\SubComponent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SubComponentsController extends Controller
{
    public function index()
    {
        $subcomponents = SubComponent::all();
        $components = Component::pluck('name', 'id');
        return view('subcomponents.index', compact('subcomponents', 'components'));

    }

    public function show($id)
    {
       return $subcomponent = SubComponent::findOrFail($id);
    }
    public function store(Request $request)
    {
        $request['user_id'] = Auth::user()->id;
        $request['project_id'] = Component::find($request['component_id'])->project->id;
        SubComponent::create($request->all());
        Session::flash('success', 'Subcomponent saved successfully.');
        return back();
    }


    public function create()
    {
        $components = Component::pluck('name', 'id')->toArray();
        $subcomponents = Subcomponent::all();
        return view('subcomponents.create', compact('components', 'subcomponents'));
    }
}
