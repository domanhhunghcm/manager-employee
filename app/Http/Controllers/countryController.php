<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\countryRequest;
use App\Models\Country;
use Illuminate\Support\Facades\DB;

class countryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries=Country::get();
        return view("country.index",compact("countries"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("country.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(countryRequest $request)
    {
        Country::create([
            "country_code"=>$request->country_code,
            "name"=>$request->name,
        ]);
        return redirect()->route("country.index")->with("success","store save success");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $country=DB::table("countries")->where("id","=",$id)->first();
        return view("country.edit",compact("country"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Country::where("id","=",$id)->update([
            "country_code"=>$request->country_code,
            "name"=>$request->name,
        ]);
        return redirect()->route("country.index")->with("success","store save success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('countries')->where('id', '=', $id)->delete();
        return redirect()->route("country.index")->with("success","delete success");
    }
}
