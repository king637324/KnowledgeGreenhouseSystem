<?php

namespace App\Http\Controllers\GreenhouseMasterPlan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GreenhouseMasterPlan\saveoverplan;

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
        $saveoverplan = new saveoverplan();
        $saveoverplan->userclass = $request->userclass;
        $saveoverplan->usercodename = $request->usercodename;
        $saveoverplan->palntclass = $request->palntclass;
        $saveoverplan->cropplant = $request->cropplant;
        $saveoverplan->localcity = $request->localcity;
        $saveoverplan->localarea = $request->localarea;
        $saveoverplan->terrain = $request->terrain;
        $saveoverplan->landform = $request->landform;
        $saveoverplan->landcondition = $request->landcondition;
        $saveoverplan->croplength = $request->croplength;
        $saveoverplan->cropwidth = $request->cropwidth;
        $saveoverplan->croparea = $request->croparea;
        $saveoverplan->position = $request->position;
        $saveoverplan->quality = $request->quality;
        $saveoverplan->risk = $request->risk;
        $saveoverplan->speed = $request->speed;
        $saveoverplan->cost = $request->cost;
        $saveoverplan->save();
        return response()->json($saveoverplan);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Test\test  $test
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Test\test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->only(['palntclass']);
        $EditCropData  = saveoverplan::where('pid',$id);
        $EditCropData->update($data);
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
