<?php

namespace App\Http\Controllers;

use App\MonthlyProgress;
use App\Plan;
use Illuminate\Http\Request;

class RecheckingController extends Controller
{
    public function index()
    {
        $plans = Plan::orderBy('year', 'asc')->get();
        $activities = [];
        foreach ($plans as $plan) {
            $activities[$plan->id] =  $plan->activity->name . ' - ' . $plan->year;
        }
        $plans = $activities;
        $progresses = MonthlyProgress::with('province')->with('district')->where('plan_id', 124)->get();
        // return $progresses;
        return view('rechecking.index', compact('plans', 'progresses'));
    }


    public function trash()
    {
        $trashed_items = MonthlyProgress::onlyTrashed()->get();
        $plan_trashed_items = Plan::onlyTrashed()->get();
        return view('rechecking.trash', compact('trashed_items', 'plan_trashed_items'));
    }
}
