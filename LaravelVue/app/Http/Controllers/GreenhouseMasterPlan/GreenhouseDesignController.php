<?php

namespace App\Http\Controllers\GreenhouseMasterPlan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GreenhouseMasterPlan\greenhousedesign;

class GreenhouseDesignController extends Controller
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
        $greenhousedesign = new greenhousedesign();
        $greenhousedesign->uid = $request->uid;
        $greenhousedesign->housetype = $request->housetype;
        $greenhousedesign->pipetype = $request->pipetype;
        $greenhousedesign->rooftype = $request->rooftype;
        $greenhousedesign->circlespan = $request->circlespan;
        $greenhousedesign->base = $request->base;
        $greenhousedesign->span = $request->span;
        $greenhousedesign->shoulder = $request->shoulder;
        $greenhousedesign->length = $request->length;
        $greenhousedesign->continue = $request->continue;
        $greenhousedesign->drape = $request->drape;
        $greenhousedesign->save();
        return response()->json($greenhousedesign);
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
        if ($request['housetype'] && $request['pipetype'] && $request['rooftype'] && $request['circlespan'] && $request['base'] && $request['span'] && $request['shoulder'] && $request['length'] && $request['continue'] && $request['drape']){
            $data = $request->only(['housetype','pipetype','rooftype','circlespan','base','span','shoulder','length','continue','drape']);
            $EditCropData  = greenhousedesign::where('id',$id);
            $EditCropData->update($data);
        } else if ($request['pipetype']){
            $data = $request->only(['pipetype']);
            $EditCropData  = greenhousedesign::where('id',$id);
            $EditCropData->update($data);
        } else if($request['rooftype']) {
            $data = $request->only(['rooftype']);
            $EditCropData  = greenhousedesign::where('id',$id);
            $EditCropData->update($data);
        } else if($request['circlespan']) {
            $data = $request->only(['circlespan']);
            $EditCropData  = greenhousedesign::where('id',$id);
            $EditCropData->update($data);
        } else if($request['base']) {
            $data = $request->only(['base']);
            $EditCropData  = greenhousedesign::where('id',$id);
            $EditCropData->update($data);
        } else if($request['span']) {
            $data = $request->only(['span']);
            $EditCropData  = greenhousedesign::where('id',$id);
            $EditCropData->update($data);
        } else if($request['shoulder']) {
            $data = $request->only(['shoulder']);
            $EditCropData  = greenhousedesign::where('id',$id);
            $EditCropData->update($data);
        } else if($request['length']) {
            $data = $request->only(['length']);
            $EditCropData  = greenhousedesign::where('id',$id);
            $EditCropData->update($data);
        } else if($request['continue']) {
            $data = $request->only(['continue']);
            $EditCropData  = greenhousedesign::where('id',$id);
            $EditCropData->update($data);
        } else if($request['drape']) {
            $data = $request->only(['drape']);
            $EditCropData  = greenhousedesign::where('id',$id);
            $EditCropData->update($data);
        } else if($request['housetype']) {
            $data = $request->only(['housetype']);
            $EditCropData  = greenhousedesign::where('id',$id);
            $EditCropData->update($data);
        } else if($request['croplength']) {
            $data = $request->only(['croplength']);
            $EditCropData  = greenhousedesign::where('id',$id);
            $EditCropData->update($data);
        }
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

    public function getJSON_design()
    {
        $JSON_greenhousedesign = greenhousedesign::get();
        return $JSON_greenhousedesign;
    }
}
