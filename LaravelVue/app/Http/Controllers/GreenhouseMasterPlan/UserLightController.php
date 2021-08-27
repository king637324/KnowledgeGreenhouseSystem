<?php

namespace App\Http\Controllers\GreenhouseMasterPlan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GreenhouseMasterPlan\user_light;

class UserLightController extends Controller
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
        $user_light = new user_light();
        $user_light->ControlItem = $request->ControlItem;
        $user_light->ControlSystem = $request->ControlSystem;
        $user_light->QualityControl = $request->QualityControl;
        $user_light->StructuralRisk = $request->StructuralRisk;
        $user_light->JobDifficulty = $request->JobDifficulty;
        $user_light->Cost = $request->Cost;
        $user_light->SideEffect = $request->SideEffect;
        $user_light->save();
        return response()->json($user_light);
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Test\test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        user_light::where('id', $id)->delete();
    }

    public function getJSON_UserLight()
    {
        $JSON_UserLight = user_light::get();
        return $JSON_UserLight;
    }
}
