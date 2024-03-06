<?php

namespace App\Http\Controllers;

use App\Logframe;
use App\Project;
use App\Workplan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use Symfony\Component\Console\Input\Input;


class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;

        if ($request->logo) {
            $image = $request->logo;
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = 'images/projects/' . $request->name . '_logo.' . $filename;
            Image::make($image->getRealPath())->save($path);
            $data['logo'] = $path;
        }


        if ($request->logframe) {
            $image = $request->logframe;
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = 'images/projects/' . $request->name . '_logframe.' . $filename;
            Image::make($image->getRealPath())->save($path);
            $data['logframe'] = $path;
        }

        if ($request->workplan) {
            $image = $request->workplan;
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = 'images/projects/' . $request->name . '_workplan.' . $filename;
            Image::make($image->getRealPath())->save($path);
            $data['workplan'] = $path;
        }


        $project = Project::create($data);
        $project->logframes()->create($data);
        $project->workplans()->create($data);

        Session::flash('success', 'Project saved successfully.');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::findOrFail($id);
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function workplan($id)
    {
        $workplan = Workplan::where('project_id', ($id))->first();
        return view('projects.workplan', compact('workplan'));
    }

    public function workplans($id)
    {
        $workplans = Workplan::where('project_id', ($id))->get();
        return view('projects.workplans', compact('workplans'));
    }
}
