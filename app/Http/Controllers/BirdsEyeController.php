<?php

namespace App\Http\Controllers;

use App\MonthlyProgress;
use Illuminate\Http\Request;

class BirdsEyeController extends Controller
{
    function index(){

        $progress = MonthlyProgress::groupBy('activity_id')->get();
        return view('birdseye.index', compact('progress'));
    }
}
