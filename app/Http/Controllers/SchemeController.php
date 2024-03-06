<?php

namespace App\Http\Controllers;

use App\District;
use App\ia;
use App\Irrigation;
use App\Scheme;
use App\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SchemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schemes = Scheme::all();
        return view('schemes.index', compact('schemes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Scheme  $scheme
     * @return \Illuminate\Http\Response
     */
    public function show(Scheme $scheme)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Scheme  $scheme
     * @return \Illuminate\Http\Response
     */
    public function edit($scheme)
    {
        $irrigationSchemes = Irrigation::all();
        $schemes = Scheme::pluck('name', 'id');
        $irrigation = Irrigation::find($scheme);
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
        return view('irrigation_schemes.edit', compact('schemes', 'villages', 'districts', 'IAs', 'irrigationSchemes', 'irrigation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Scheme  $scheme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $scheme)
    { {
            $user = Auth::user()->id;
            $request2 = $request->toArray();



            $village = Village::find($request['village_id']);
            $request2['district_id'] = $village->district->id;
            $request2['province_id'] = $village->district->province->id;


            $request2['province_id'] =
                $request2['province_id'] = District::find($request2['district_id'])->province->id;
            $request2['user_id'] = $user;



            $irrigation = Irrigation::find($scheme);
            if ($irrigation->update($request2)) Session::flash('success', 'Irrigation Scheme Updated!');
            else Session::flash('success', 'There was a problem updating the irrigation scheme');


            return redirect('/irrigation_scheme');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Scheme  $scheme
     * @return \Illuminate\Http\Response
     */
    public function destroy(Scheme $scheme)
    {
        //
    }
}
