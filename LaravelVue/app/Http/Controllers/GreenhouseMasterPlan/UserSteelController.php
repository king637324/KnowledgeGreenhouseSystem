<?php

namespace App\Http\Controllers\GreenhouseMasterPlan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GreenhouseMasterPlan\user_steelinfo;

class UserSteelController extends Controller
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
        $user_steel = new user_steelinfo();
        $user_steel->uid = $request->uid;
        $user_steel->Type = $request->Type;
        $user_steel->Price = $request->Price;
        $user_steel->MaterialName = $request->MaterialName;
        $user_steel->HighStrengthMaterial = $request->HighStrengthMaterial;
        $user_steel->SteelBillet = $request->SteelBillet;
        $user_steel->HotRolledSteelSheet = $request->HotRolledSteelSheet;
        $user_steel->ColdRolledSteelSheet = $request->ColdRolledSteelSheet;
        $user_steel->ContinuousHotDipGalvanizing = $request->ContinuousHotDipGalvanizing;
        $user_steel->ContinuousPaint = $request->ContinuousPaint;
        $user_steel->ColdForming = $request->ColdForming;
        $user_steel->Welding = $request->Welding;
        $user_steel->Processing = $request->Processing;
        $user_steel->AfterHotDipGalvanizing = $request->AfterHotDipGalvanizing;
        $user_steel->Galvalume = $request->Galvalume;
        $user_steel->MagnesiumAluminumZincPlating = $request->MagnesiumAluminumZincPlating;
        $user_steel->AfterBaking = $request->AfterBaking;
        $user_steel->Speed = $request->Speed;
        $user_steel->StructuralRisk = $request->StructuralRisk;
        $user_steel->Corrosive = $request->Corrosive;
        $user_steel->Weight = $request->Weight;
        $user_steel->save();
        return response()->json($user_steel);
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
        $deletesteel = user_steelinfo::where('id', $id)->delete();
    }

    public function getJSON_UserSteel()
    {
        $JSON_UserSteel = user_steelinfo::get();
        return $JSON_UserSteel;
    }
}
