<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use Illuminate\Http\Request;

class DriverListController extends Controller
{
    public function index(){
        $maleDrivers = Driver::where('gender' , 'male')->get();
        return view('maleDrivers',compact('maleDrivers'));
    }
}
