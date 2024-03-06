<?php

namespace App\Http\Controllers;

use App\Activity;
use App\MonthlyProgress;
use Illuminate\Http\Request;

class PracticeController extends Controller
{
    public function index()
    {
        $provinces = MonthlyProgress::groupBy('province_id')->get('province_id');
        $districts = MonthlyProgress::groupBy('district_id')->get('district_id');
        $villages = MonthlyProgress::groupBy('village_id')->get('village_id');

        return view('practice.index', compact('provinces', 'districts', 'villages'));
    }
}
