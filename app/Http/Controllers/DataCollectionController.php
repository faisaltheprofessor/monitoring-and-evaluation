<?php

namespace App\Http\Controllers;

use App\DataCollection;
use Illuminate\Http\Request;

class DataCollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('data_collection.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data_coolection.create');
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
     * @param  \App\DataCollection  $dataCollection
     * @return \Illuminate\Http\Response
     */
    public function show(DataCollection $dataCollection)
    {
        return view('data_coolection.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DataCollection  $dataCollection
     * @return \Illuminate\Http\Response
     */
    public function edit(DataCollection $dataCollection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DataCollection  $dataCollection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataCollection $dataCollection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DataCollection  $dataCollection
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataCollection $dataCollection)
    {
        //
    }
}
