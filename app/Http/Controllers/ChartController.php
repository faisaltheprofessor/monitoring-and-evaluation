<?php

namespace App\Http\Controllers;

use App\Activity;
use App\District;
use App\MonthlyProgress;
use App\Plan;
use App\Province;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    function index()
    {
        return view('charts.index');
    }


    function chartProvinces(Request $request)
    {
        $provinceSeries =  [];
        $monthSeries =  [];
        $plan_id = $request->plan_id;
        $province_ids = MonthlyProgress::where('plan_id', $plan_id)->distinct('province_id')->get('province_id');
        $district_id = MonthlyProgress::where('plan_id', $plan_id)->distinct('district_id')->get('district_id');

        $provinces = Province::findMany($province_ids);

        foreach ($provinces as $province) {
            $series = intval(MonthlyProgress::where('province_id', $province->id)->where('plan_id', $plan_id)->sum('quantity'));
            array_push($provinceSeries, $series);
            array_push($monthSeries, intval($series));
        }

        $provinces = $provinces->pluck('name');

        return response()->json(
            [
                'provinces' => $provinces,
                'provinceSeries' => $provinceSeries,
                'monthSeries' => $monthSeries
            ]
        );
    }


    function getChartName(Request $request)
    {

        $progress = MonthlyProgress::where('plan_id', $request->plan_id)->first();
        return $chartName = $progress->activity->name . ' - ' . $progress->plan->year;
    }



    function chartDistricts(Request $request)
    {
        $districtSeries =  [];
        $monthSeries =  [];
        $plan_id = $request->plan_id;
        $district_ids = MonthlyProgress::where('plan_id', $plan_id)->distinct('district_id')->get('district_id');
        $district_id = MonthlyProgress::where('plan_id', $plan_id)->distinct('district_id')->get('district_id');

        $districts = District::findMany($district_ids);

        foreach ($districts as $district) {
            $series = intval(MonthlyProgress::where('district_id', $district->id)->where('plan_id', $plan_id)->sum('quantity'));
            array_push($districtSeries, $series);
            array_push($monthSeries, $series);
        }

        $districts = $districts->pluck('name');

        return response()->json(
            [
                'districts' => $districts,
                'districtSeries' => $districtSeries,
                'monthSeries' => $monthSeries
            ]
        );
    }


    function chartMonths(Request $request)
    {
        $monthSeries =  [];
        $plan_id = $request->plan_id;
        $months = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
        foreach ($months as $month) {
            $series = intval(MonthlyProgress::whereMonth('start_date', $month)->where('plan_id', $plan_id)->sum('quantity'));
            array_push($monthSeries, $series);
        }

        return response()->json(
            [
                'monthSeries' => $monthSeries
            ]
        );
    }



    function getEntryProgressDetails()
    {
        $series = [];
        $dates = [];
        $groups = MonthlyProgress::orderBy('created_at')->get()->groupBy(function ($item) {
            return $item->created_at->format('Y-m-d');
        });
        foreach ($groups as $group => $val) {
            array_push($series, count($val));
            array_push($dates, $group);
        }
        return response()->json([
            'series' => $series,
            'dates' => $dates
        ]);
    }

    // Activity/show
    function activityDetails(Request $request)
    {
        $years = Plan::where('activity_id', $request->activity_id)->groupBy('year')->pluck('year');
        $planned = [];
        $actual = [];
        $chartName = Activity::where('id', $request->activity_id)->pluck('name');
        $unit = Activity::find($request->activity_id)->unit->name;

        foreach ($years as $year) {
            array_push($planned, intval(Plan::where('year', $year)->where('activity_id', $request->activity_id)->pluck('quantity')->first()));
            array_push($actual, intval(MonthlyProgress::whereYear('start_date', $year)->where('activity_id', $request->activity_id)->sum('quantity')));
        }
        return response()->json([
            'years' => $years,
            'planned' => $planned,
            'actual' => $actual,
            'chartName' => $chartName,
            'unit' => $unit

        ]);
    }


    // Actual Vs Planned
    function getActualVsPlannedDetails()
    {
        $years = Plan::groupBy('year')->pluck('year');
        $planned = [];
        $actual = [];

        foreach ($years as $year) {
            array_push($planned, intval(Plan::where('year', $year)->sum('quantity')));
            array_push($actual, intval(MonthlyProgress::whereYear('start_date', $year)->sum('quantity')));
        }
        return response()->json([
            'years' => $years,
            'planned' => $planned,
            'actual' => $actual
        ]);
    }
}
