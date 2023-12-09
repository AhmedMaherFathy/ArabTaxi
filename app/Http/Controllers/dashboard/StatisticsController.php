<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Ride;
use App\Models\User;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function get(){
        $users =User::all();
        // $user_id = auth()->user()->id;
        // return view('dashboard',['users' => $user_id]);
        // $rides = Ride::where($users['id','user_id');
        // return  view('dashboard',['price' => $rides->price]);
        $users_count = $users->count();
        // $users_active = User::where('status',1)->count();
        // $users_inactive = User::where('status',0)->count();

        return view('dashboard',['users' => $users_count ]);
    }
}
