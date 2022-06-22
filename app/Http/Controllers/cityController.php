<?php

namespace App\Http\Controllers;

use App\Http\Requests\cityRequest;
use Illuminate\Http\Request;
use App\Models\State;
use App\Models\City;

class cityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $citys=City::all();
        return view("city.index",compact("citys"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $state=state::all();
        return view("city.create",compact("state"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(cityRequest $request)
    {
        City::create([
            "state_id"=>$request->state_id,
            "name"=>$request->name,
        ]);
        return redirect()->route("city.index")->with("success","city save success");
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
        $state=State::all();
        $city=City::where("id","=",$id)->first();
        return view("city.edit",compact("city","state"));
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
        City::where("id","=",$id)->update([
            "state_id"=>$request->state_id,
            "name"=>$request->name,
        ]);
        return redirect()->route("city.index")->with("success","state store save success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
