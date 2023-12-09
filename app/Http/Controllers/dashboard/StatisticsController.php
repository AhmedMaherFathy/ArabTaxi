<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function get(){
        $users =User::all();
        $users_count = $users->count();
        // $users_active = User::where('status',1)->count();
        // $users_inactive = User::where('status',0)->count();
        return view('dashboard',['users' => $users_count ,
                                'User' => $users ]);
    }
}
