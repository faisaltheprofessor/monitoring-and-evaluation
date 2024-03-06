<?php

namespace App\Http\Controllers;

use App\MonthlyProgress;
use App\Province;
use App\District;
use App\User;
use App\Village;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;


class EntryController extends Controller
{
    //    Change Password
    public function showChangePasswordForm()
    {
        return view('auth.changepassword');
    }

    public function changePassword(Request $request)
    {

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error", "Your current password does not matches with the password you provided. Please try again.");
        }

        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            //Current password and new password are same
            return redirect()->back()->with("error", "New Password cannot be same as your current password. Please choose a different password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success", "Password changed successfully !");
    }

    // public function users($username)
    // {
    //     $username = str_replace('-', ' ', $username);
    //     $user = User::where('name', '=', $username)->FirstOrFail();
    //     if (!$user->admin) return back();
    //     $farmers = Farmer::where('saved_by', '=', $user->id)->get();
    //     $farmersToday = Farmer::where('saved_by', '=', $user->id)->whereDate('created_at', '=', Carbon::today())
    //         ->count();
    //     $totalFarmersToday = Farmer::whereDate('created_at', '=', Carbon::today());
    //     return view('admin.user', compact('user', 'farmers', 'farmersToday', 'totalFarmersToday'));
    // }



    public function AllUsers()
    {
        // return "<h1 style='color:#C55B24; text-align:center; font-size:3em; margin-top:400px'>This page is down for maintainance. Kindly come back later.</h1>";
        $monthlyProgress = MonthlyProgress::first();
        $monthlyProgressToday = MonthlyProgress::whereDate('created_at', '=', Carbon::today())->get();
        $monthlyProgressYesterday = MonthlyProgress::whereDate('created_at', '=', Carbon::today()->subDay())->get();
        $monthlyProgressThisWeek = MonthlyProgress::whereDate('created_at', '>', Carbon::today()->subWeek(1))->get();
        $monthlyProgressThisMonth = MonthlyProgress::whereDate('created_at', '>', Carbon::today()->subMonth())->get();

        return view('admin.entry_summary', compact('monthlyProgress', 'monthlyProgressToday', 'monthlyProgressThisMonth', 'monthlyProgressThisWeek', 'monthlyProgressYesterday'));
    }


    public function SpecificDateEntryReportForSpecificUser($id, $date)
    {
        $monthlyProgresses = MonthlyProgress::where('user_id', '=', $id)->whereDate('created_at', '=', $date)->get();
        return view('admin.specific_date_user_entry_summary', compact('monthlyProgresses'));
    }

    public function myProgress()
    {
        $monthlyProgresses = MonthlyProgress::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(100);
        return view('admin.my_progress', compact('monthlyProgresses'));
    }


    // public function general_settings()
    // {
    //     $years = Farmer::pluck('year', 'year')->toArray();
    //     $selected_year = Setting::first()->year;
    //     return view('admin.settings.general_settings', compact('years', 'selected_year'));
    // }


    // public function store_general_settings()
    // {
    //     $year = $_GET['year'];
    //     $current_year = Setting::first();
    //     $current_year->year = $year;
    //     if ($current_year->update()) return $year;
    //     else return "Failed";
    // }
}
