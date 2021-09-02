<?php

namespace App\Http\Controllers\GreenhouseMasterPlan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GreenhouseMasterPlan\user_film;

class UserFilmController extends Controller
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
        $user_film = new user_film();
        $user_film->uid = $request->uid;
        $user_film->Expert = $request->Expert;
        $user_film->material = $request->material;
        $user_film->BuildItem = $request->BuildItem;
        $user_film->LightLoss = $request->LightLoss;
        $user_film->StructuralRisk = $request->StructuralRisk;
        $user_film->JobDifficulty = $request->JobDifficulty;
        $user_film->Cost = $request->Cost;
        $user_film->SideEffect = $request->SideEffect;
        $user_film->save();
        return response()->json($user_film);
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
        $deletefilm = user_film::where('id', $id)->delete();
    }

    public function getJSON_UserFilm()
    {
        $JSON_UserFilm = user_film::get();
        return $JSON_UserFilm;
    }
}
