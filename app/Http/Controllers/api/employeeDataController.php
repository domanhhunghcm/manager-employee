<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use PHPUnit\Framework\Constraint\Count;

class employeeDataController extends Controller
{
    public function getCountries()
    {
        $countries=Country::all();
        return response()->json($countries);
    }
    public function getState($countries)
    {
       $state=Country::where("id","=",$countries)->first()->state;
       return response()->json($state);
    }
    public function getCity($state)
    {
        $city=State::where("id","=",$state)->first()->city;
        return response()->json($city);
    }
}
