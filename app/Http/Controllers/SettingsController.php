<?php

namespace App\Http\Controllers;


use App\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SettingsController extends Controller
{
    public function manageRolesAndPermissions()
    {
        $permissions = Permission::all();
        $roles = Role::all();
        return view('settings.permissions', compact('permissions', 'roles'));
    }

    public function storeRoleAndPermissions()
    {
        $input = \Illuminate\Support\Facades\Request::all();

        $role =  Role::create(['name' => $input['roleName']]);

        foreach ($input['name'] as $name) {
            $role->givePermissionTo($name);
        }
        Session::flash('success', 'true');
        return back();
    }


    public function units()
    {
        $units = Unit::all();
        return view('settings.units', compact('units'));
    }

    public function store_unit(Request $request)
    {
        // $request->validate(
        //     [
        //         'name' => 'required|unique:units',
        //         'name_dari' => 'required|unique:units'
        //     ]
        // );
        $request['user_id'] = Auth::user()->id;
        Unit::create($request->all());
        Session::flash('success', 'Unit saved successfully');
        return redirect('/unit');
    }



    public function showChangePasswordForm()
    {
        return view('auth.passwords.change');
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
        Session::flash('success', 'Password changed successfully.');
        return redirect()->back()->with("success", "Password changed successfully !");
    }
}
