<?php

namespace App\Http\Controllers\GreenhouseMasterPlan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GreenhouseMasterPlan\saveoverplan;
use Illuminate\Support\Facades\Auth;

class OverPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request -> validate([
        //     'plantclass' => 'required',
        //     'plant' => 'required',
        //     'croplength' => 'required',
        //     'cropwidth' => 'required',
        //     'localcity' => 'required',
        //     'localarea' => 'required',
        //     'terrain' => 'required',
        //     'landform' => 'required',
        //     'greenhouse' => 'required',
        //     'greenhousepipe' => 'required',
        //     'domeforms' => 'required',
        //     'circulararchdistances' => 'required',
        //     'foundations' => 'required',
        //     'spans' => 'required',
        //     'shoulderheights' => 'required',
        //     'lengths' => 'required',
        //     'continuitys' => 'required',
        //     'coatingfilms' => 'required',
        // ]);
        $saveoverplan = new saveoverplan();
        $saveoverplan->plantclass = $request->plantclass;
        $saveoverplan->plant = $request->plant;
        $saveoverplan->croplength = $request->croplength;
        $saveoverplan->cropwidth = $request->cropwidth;
        $saveoverplan->localcity = $request->localcity;
        $saveoverplan->localarea = $request->localarea;
        $saveoverplan->terrain = $request->terrain;
        $saveoverplan->landform = $request->landform;
        $saveoverplan->greenhouse = $request->greenhouse;
        $saveoverplan->greenhousepipe = $request->greenhousepipe;
        $saveoverplan->domeforms = $request->domeforms;
        $saveoverplan->circulararchdistances = $request->circulararchdistances;
        $saveoverplan->foundations = $request->foundations;
        $saveoverplan->spans = $request->spans;
        $saveoverplan->shoulderheights = $request->shoulderheights;
        $saveoverplan->lengths = $request->lengths;
        $saveoverplan->continuitys = $request->continuitys;
        $saveoverplan->coatingfilms = $request->coatingfilms;
        $saveoverplan->save();
        return response()->json($saveoverplan);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Test\test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(test $test)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Test\test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit(test $test)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Test\test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, test $test)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Test\test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteoverplan = saveoverplan::where('pid', $id)->delete();
    }

    public function getJSON_OverPlan()
    {
        $JSON_OverPlan = saveoverplan::get();
        return $JSON_OverPlan;
    }
}
