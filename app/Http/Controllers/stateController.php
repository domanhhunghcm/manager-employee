<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;
use App\Http\Requests\stateRequest;
use Illuminate\Support\Facades\DB;

class stateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $state=state::all();
        return view("state.index",compact("state"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $country=Country::all();
        return view("state.create",compact("country"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(stateRequest $request)
    {
        state::create([
            "country_id"=>$request->country_id,
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
    public function edit(State $state)
    {
        $country=Country::all();
        return view("state.edit",compact("state","country"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(stateRequest $request, $id)
    {
        State::where("id","=",$id)->update([
            "country_id"=>$request->country_id,
            "name"=>$request->name,
        ]);
        return redirect()->route("state.index")->with("success","state store save success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('states')->where('id', '=', $id)->delete();
        return redirect()->route("state.index")->with("success","statye delete success");
    }
}
