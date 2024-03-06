<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Component;
use App\District;
use App\Output;
use App\Project;

use App\Province;
use App\SubComponent;
use App\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;
use Collective\Html\Eloquent\FormAccessible;


class AjaxController extends Controller
{
    public function addAjaxItem()
    {
        $view = $_GET['view'];
        return view('modals/' . $view);
    }

    public function storeItem(Request $request)
    {
        $request['user_id'] = Auth::user()->id;


        $model = '\\App\\' . $request->input('model');
        //        Validation
        if ($model == '\App\Project') {
            $request->validate([
                'name' => 'unique:projects|required',
                'name_dari' => 'unique:projects',
                'abbreviation' => 'unique:projects|required'
            ]);
        } else if ($model == '\App\Component') {
            $request->validate([
                'name' => 'unique:components|required',
                'name_dari' => 'unique:components',
            ]);
        } else if ($model == '\App\SubComponent') {
            $request['project_id'] = Component::find($request->component_id)->project_id;
        }

        if ($model::create($request->all())) return 'Successfully Saved!';
        else {
            $errors = Session::get('errors');
            echo "<ul>";
            foreach ($errors->all() as $error) {
                echo "<li>$error</li>";
            }
            echo "</ul>";
        }
    }


    //    Refresh Project
    public function refreshProject(Request $request)
    {
        $search = $request->search;

        if ($search == '') {
            $list = Project::orderby('name', 'asc')->select('id', 'name')->limit(5)->get();
        } else {
            $list = Project::orderby('name', 'asc')->select('id', 'name')->where('name', 'like', '%' . $search . '%')->limit(5)->get();
        }


        $response = array();
        foreach ($list as $item) {
            $response[] = array(
                "id" => $item->id,
                "text" => $item->name
            );
        }

        echo json_encode($response);
        exit;
    }


    //Refresh Component
    public function refreshComponent(Request $request)
    {
        $search = $request->search;
        $project_id = $request->project_id;

        if ($search == '') {
            if ($project_id != null) $list = Component::orderby('name', 'asc')->select('id', 'name')->where('project_id', $project_id)->limit(5)->get();
            else $list = Component::orderby('name', 'asc')->select('id', 'name')->limit(5)->get();
        } else {
            if ($project_id != null) $list = Component::orderby('name', 'asc')->select('id', 'name')->where('name', 'like', '%' . $search . '%')->where('project_id', $project_id)->limit(5)->get();
            else $list = Component::orderby('name', 'asc')->select('id', 'name')->where('name', 'like', '%' . $search . '%')->limit(5)->get();
        }


        $response = array();
        foreach ($list as $item) {
            $response[] = array(
                "id" => $item->id,
                "text" => $item->name
            );
        }

        echo json_encode($response);
        exit;
    }

    //Refresh SubComponent
    public function refreshSubComponent(Request $request)
    {
        $search = $request->search;
        $component_id = $request->component_id;

        if ($search == '') {
            if ($component_id != null) $list = SubComponent::orderby('name', 'asc')->select('id', 'name')->where('component_id', $component_id)->limit(5)->get();
            else $list = SubComponent::orderby('name', 'asc')->select('id', 'name')->limit(5)->get();
        } else {
            if ($component_id != null) $list = SubComponent::orderby('name', 'asc')->select('id', 'name')->where('name', 'like', '%' . $search . '%')->where('component_id', $component_id)->limit(5)->get();
            else $list = SubComponent::orderby('name', 'asc')->select('id', 'name')->where('name', 'like', '%' . $search . '%')->limit(5)->get();
        }


        $response = array();
        foreach ($list as $item) {
            $response[] = array(
                "id" => $item->id,
                "text" => $item->name
            );
        }

        echo json_encode($response);
        exit;
    }

    //Refresh Activity
    public function refreshActivity(Request $request)
    {
        $search = $request->search;
        $project_id = $request->project_id;

        if ($search == '') {
            if ($project_id != null) $list = Activity::orderby('name', 'asc')->select('id', 'name')->where('project_id', $project_id)->limit(5)->get();
            else $list = Activity::orderby('name', 'asc')->select('id', 'name')->limit(5)->get();
        } else {
            if ($project_id != null) $list = Activity::orderby('name', 'asc')->select('id', 'name')->where('name', 'like', '%' . $search . '%')->where('project_id', $project_id)->limit(5)->get();
            else $list = Activity::orderby('name', 'asc')->select('id', 'name')->where('name', 'like', '%' . $search . '%')->limit(5)->get();
        }

        $response = array();
        foreach ($list as $item) {
            $response[] = array(
                "id" => $item->id,
                "text" => $item->name
            );
        }
        echo json_encode($response);
        exit;
    }
    //Refresh Provinces
    public function refreshProvince(Request $request)
    {
        $search = $request->search;
        $subcomponent_id = $request->subcomponent_id;

        if ($search == '') {
            if ($subcomponent_id != null) $list = Province::orderby('name', 'asc')->select('id', 'name')->where('subcomponent_id', $subcomponent_id)->limit(5)->get();
            else $list = Province::orderby('name', 'asc')->select('id', 'name')->limit(5)->get();
        } else {
            if ($subcomponent_id != null) $list = Province::orderby('name', 'asc')->select('id', 'name')->where('name', 'like', '%' . $search . '%')->where('subcomponent_id', $subcomponent_id)->limit(5)->get();
            else $list = Province::orderby('name', 'asc')->select('id', 'name')->where('name', 'like', '%' . $search . '%')->limit(5)->get();
        }

        $response = array();
        foreach ($list as $item) {
            $response[] = array(
                "id" => $item->id,
                "text" => $item->name
            );
        }
        echo json_encode($response);
        exit;
    }



    //Refresh District
    public function refreshDistrict(Request $request)
    {
        $search = $request->search;
        $province_id = $request->province_id;

        if ($search == '') {
            if ($province_id != null) $list = District::orderby('name', 'asc')->select('id', 'name')->where('province_id', $province_id)->limit(5)->get();
            else $list = District::orderby('name', 'asc')->select('id', 'name')->limit(5)->get();
        } else {
            if ($province_id != null) $list = District::orderby('name', 'asc')->select('id', 'name')->where('name', 'like', '%' . $search . '%')->where('province_id', $province_id)->limit(5)->get();
            else $list = District::orderby('name', 'asc')->select('id', 'name')->where('name', 'like', '%' . $search . '%')->limit(5)->get();
        }


        $response = array();
        foreach ($list as $item) {
            $response[] = array(
                "id" => $item->id,
                "text" => $item->name
            );
        }

        echo json_encode($response);
        exit;
    }




    //Refresh District
    public function refreshVillage(Request $request)
    {
        $search = $request->search;
        $district_id = $request->district_id;

        if ($search == '') {
            if ($district_id != null) $list = Village::orderby('name', 'asc')->select('id', 'name')->where('district_id', $district_id)->limit(5)->get();
            else $list = Village::orderby('name', 'asc')->select('id', 'name')->limit(5)->get();
        } else {
            if ($district_id != null) $list = Village::orderby('name', 'asc')->select('id', 'name')->where('name', 'like', '%' . $search . '%')->where('district_id', $district_id)->limit(5)->get();
            else $list = Village::orderby('name', 'asc')->select('id', 'name')->where('name', 'like', '%' . $search . '%')->limit(5)->get();
        }


        $response = array();
        foreach ($list as $item) {
            $response[] = array(
                "id" => $item->id,
                "text" => $item->name
            );
        }

        echo json_encode($response);
        exit;
    }

    public function updateOutput(Request $request)
    {
        $output =  Output::findOrFail($request->pk);
        $output->progress = $request->value;
        $output->update();
    }



    public function districts()
    {
        $province_id = $_GET['province_id'];
        $districts = District::where('province_id', $province_id)->pluck('name', 'id');
        // return $districts;
        $list_start = '<select class="form-control" id="district_id" name="district_id"><option selected="selected" value="">Select ...</option>';
        $list_content = '';
        $list_end = '</select>';

        foreach ($districts as $id => $name) {

            $list_content .= "<option value='$id'>$name</option>";
        }

        $list = $list_start . $list_content . $list_end;




        return $list;
    }
}
