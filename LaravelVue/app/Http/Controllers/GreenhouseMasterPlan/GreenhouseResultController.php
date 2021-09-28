<?php

namespace App\Http\Controllers\GreenhouseMasterPlan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GreenhouseMasterPlan\greenhouseresult;

class GreenhouseResultController extends Controller
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
        $greenhouseresult = new greenhouseresult();
        $greenhouseresult->name = $request->name;
        $greenhouseresult->uid = $request->uid;
        $greenhouseresult->baseid = $request->baseid;
        $greenhouseresult->lightid = $request->lightid;
        $greenhouseresult->tempid = $request->tempid;
        $greenhouseresult->windid = $request->windid;
        $greenhouseresult->filmid = $request->filmid;
        $greenhouseresult->steelid = $request->steelid;
        $greenhouseresult->greenhouseid = $request->greenhouseid;
        $greenhouseresult->weightid = $request->weightid;
        $greenhouseresult->save();
        return response()->json($greenhouseresult);
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
     * @param  \App\Models\Test\test  $test
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

    }

    public function getJSON_result()
    {
        $JSON_greenhouseresult = greenhouseresult::get();
        return $JSON_greenhouseresult;
    }
}
