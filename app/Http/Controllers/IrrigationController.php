<?php

namespace App\Http\Controllers;

use App\District;
use App\ia;
use App\Irrigation;
use App\Province;
use App\Scheme;
use App\Village;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IrrigationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */




    public function index()
    {
        $irrigationSchemes = Irrigation::all();
        $schemes = Scheme::pluck('name', 'id');
        $allVillages = Village::all();
        $allDistricts = District::all();
        $villages = [];
        $districts = [];
        $IAs = ia::pluck('name', 'id');
        foreach ($allVillages as $village) {
            $villages[$village->id] =  $village->name . ' - ' . $village->district->name;
        }
        foreach ($allDistricts as $district) {
            $districts[$district->id] =  $district->name . ' - ' . $district->province->name;
        }

        return view('irrigation_schemes.index', compact('schemes', 'villages', 'districts', 'IAs', 'irrigationSchemes'));
    }
    function getIrrigationEssentials()
    {
        $provinces = Province::get();
        return response()->json($provinces->all());
    }






    function store(Request $request)
    {
        $user = Auth::user()->id;
        $request2 = $request->toArray();
        if ($request->has('ia_name')) {
            $ia =  ia::create([
                'name' => $request->ia_name,
                'user_id' => $user
            ]);
            $request2['ia_id'] = $ia->id;
        }

        if ($request->has('village_name')) {
            $village = Village::create([
                'name' => $request->village_name,
                'district_id' => $request->district_id,
                'user_id' => $user
            ]);
            $request2['village_id'] = $village->id;
            $request2['district_id'] = $village->district->id;
            $request2['province_id'] = $village->district->province->id;
        } else {
            $village = Village::find($request['village_id']);
            $request2['district_id'] = $village->district->id;
            $request2['province_id'] = $village->district->province->id;
        }

        $request2['province_id'] =
            $request2['province_id'] = District::find($request2['district_id'])->province->id;
        $request2['user_id'] = $user;
        if ($request->has('scheme_name')) {
            $request2['name'] = $request['scheme_name'];
            $request2['code'] = $request['scheme_code'];
            unset($request2['scheme_name']);
            unset($request2['scheme_code']);
            $scheme = Scheme::create($request2);
            $request2['scheme_id'] = $scheme->id;
        }



        if (Irrigation::create($request2)) Session::flash('success', 'Irrigation Scheme Added!');
        else Session::flash('success', 'There was a problem saving the irrigation scheme');


        return back();
    }
}
