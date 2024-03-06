<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    public function create()
    {
        $roles = Role::pluck('name', 'id')->toArray();
        return view('users.create', compact('roles'));
    }
}
