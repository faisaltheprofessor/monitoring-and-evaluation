<?php

namespace App\Http\Controllers;

use App\MonthlyProgress;
use App\User;
use Illuminate\Http\Request;

class FetchController extends Controller
{

    function loadUsers(){
        $user_ids = MonthlyProgress::get('user_id')->unique('user_id');
//            ->having('count', '>', 100)

        $users = User::findMany($user_ids);

        return $users;
    }
}
