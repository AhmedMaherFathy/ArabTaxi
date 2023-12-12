<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use Illuminate\Http\Request;

class DriverListController extends Controller
{
    public function indexMale(){
        $maleDrivers = Driver::where('gender' , 'male')->get();
        return view('maleDrivers',compact('maleDrivers'));
    }
    public function indexFemale(){
        $femaleDrivers = Driver::where('gender' , 'female')->get();
        return view('femaleDrivers',compact('femaleDrivers'));
    }

    public function destroy($id)
    {
        $admin = Driver::findOrFail($id);
        $admin->delete();
        return redirect()->back()->with('delete','تمت ازالته');
    }
}
