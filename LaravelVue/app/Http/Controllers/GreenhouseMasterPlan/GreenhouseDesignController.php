<?php

namespace App\Http\Controllers\GreenhouseMasterPlan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GreenhouseMasterPlan\greenhousedesign;
use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\Rugged\strongcontinuity;
use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\Rugged\strongcostratio;
use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\Rugged\strongfoundation;
use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\Rugged\stronggreenhouseprofile;
use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\Rugged\stronglength;
use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\Rugged\strongroofform;
use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\Rugged\strongshoulderheight;
use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\Rugged\strongspan;
use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\Rugged\strongupperarchdistance;

use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\Simple\simplecirculararchdistance;
use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\Simple\simplecoatingfilm;
use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\Simple\simplecontinuity;
use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\Simple\simplecostratio;
use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\Simple\simpledomeform;
use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\Simple\simplefoundation;
use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\Simple\simplegreenhousepipe;
use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\Simple\simplelength;
use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\Simple\simpleshoulderheight;
use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\Simple\simplespan;

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
        if ($request['uid']){
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
        if ($request['greenhousetype'] == '簡易溫室'){
            if ($request['item'] == '溫室管材') {
                $simplegreenhousepipe = new simplegreenhousepipe();
                $simplegreenhousepipe->Expert = $request->Expert;
                $simplegreenhousepipe->BuildItem = $request->BuildItem;
                $simplegreenhousepipe->Cost = $request->Cost;
                $simplegreenhousepipe->StructuralRisk = $request->StructuralRisk;
                $simplegreenhousepipe->JobDifficulty = $request->JobDifficulty;
                $simplegreenhousepipe->save();
                return response()->json($simplegreenhousepipe);
            } else if ($request['item'] == '圓頂形式') {
                $simpledomeform = new simpledomeform();
                $simpledomeform->Expert = $request->Expert;
                $simpledomeform->BuildItem = $request->BuildItem;
                $simpledomeform->Cost = $request->Cost;
                $simpledomeform->StructuralRisk = $request->StructuralRisk;
                $simpledomeform->JobDifficulty = $request->JobDifficulty;
                $simpledomeform->save();
                return response()->json($simpledomeform);
            } else if ($request['item'] == '圓拱距') {
                $simplecirculararchdistance = new simplecirculararchdistance();
                $simplecirculararchdistance->Expert = $request->Expert;
                $simplecirculararchdistance->BuildItem = $request->BuildItem;
                $simplecirculararchdistance->Cost = $request->Cost;
                $simplecirculararchdistance->StructuralRisk = $request->StructuralRisk;
                $simplecirculararchdistance->JobDifficulty = $request->JobDifficulty;
                $simplecirculararchdistance->save();
                return response()->json($simplecirculararchdistance);
            } else if ($request['item'] == '基礎') {
                $simplefoundation = new simplefoundation();
                $simplefoundation->Expert = $request->Expert;
                $simplefoundation->BuildItem = $request->BuildItem;
                $simplefoundation->Cost = $request->Cost;
                $simplefoundation->StructuralRisk = $request->StructuralRisk;
                $simplefoundation->JobDifficulty = $request->JobDifficulty;
                $simplefoundation->save();
                return response()->json($simplefoundation);
            } else if ($request['item'] == '跨距') {
                $simplespan = new simplespan();
                $simplespan->Expert = $request->Expert;
                $simplespan->BuildItem = $request->BuildItem;
                $simplespan->Cost = $request->Cost;
                $simplespan->StructuralRisk = $request->StructuralRisk;
                $simplespan->JobDifficulty = $request->JobDifficulty;
                $simplespan->save();
                return response()->json($simplespan);
            } else if ($request['item'] == '肩高') {
                $simpleshoulderheight = new simpleshoulderheight();
                $simpleshoulderheight->Expert = $request->Expert;
                $simpleshoulderheight->BuildItem = $request->BuildItem;
                $simpleshoulderheight->Cost = $request->Cost;
                $simpleshoulderheight->StructuralRisk = $request->StructuralRisk;
                $simpleshoulderheight->JobDifficulty = $request->JobDifficulty;
                $simpleshoulderheight->save();
                return response()->json($simpleshoulderheight);
            } else if ($request['item'] == '長度') {
                $simplelength = new simplelength();
                $simplelength->Expert = $request->Expert;
                $simplelength->BuildItem = $request->BuildItem;
                $simplelength->Cost = $request->Cost;
                $simplelength->StructuralRisk = $request->StructuralRisk;
                $simplelength->JobDifficulty = $request->JobDifficulty;
                $simplelength->save();
                return response()->json($simplelength);
            } else if ($request['item'] == '連續性') {
                $simplecontinuity = new simplecontinuity();
                $simplecontinuity->Expert = $request->Expert;
                $simplecontinuity->BuildItem = $request->BuildItem;
                $simplecontinuity->Cost = $request->Cost;
                $simplecontinuity->StructuralRisk = $request->StructuralRisk;
                $simplecontinuity->JobDifficulty = $request->JobDifficulty;
                $simplecontinuity->save();
                return response()->json($simplecontinuity);
            } else if ($request['item'] == '披覆材料') {
                $simplecoatingfilm = new simplecoatingfilm();
                $simplecoatingfilm->Expert = $request->Expert;
                $simplecoatingfilm->BuildItem = $request->BuildItem;
                $simplecoatingfilm->Cost = $request->Cost;
                $simplecoatingfilm->StructuralRisk = $request->StructuralRisk;
                $simplecoatingfilm->JobDifficulty = $request->JobDifficulty;
                $simplecoatingfilm->save();
                return response()->json($simplecoatingfilm);
            }
        } else if ($request['greenhousetype'] == '強固溫室'){
            if ($request['item'] == '溫室型材') {
                $stronggreenhouseprofile = new stronggreenhouseprofile();
                $stronggreenhouseprofile->Expert = $request->Expert;
                $stronggreenhouseprofile->BuildItem = $request->BuildItem;
                $stronggreenhouseprofile->Cost = $request->Cost;
                $stronggreenhouseprofile->StructuralRisk = $request->StructuralRisk;
                $stronggreenhouseprofile->JobDifficulty = $request->JobDifficulty;
                $stronggreenhouseprofile->save();
                return response()->json($stronggreenhouseprofile);
            } else if ($request['item'] == '屋頂形式') {
                $strongroofform = new strongroofform();
                $strongroofform->Expert = $request->Expert;
                $strongroofform->BuildItem = $request->BuildItem;
                $strongroofform->Cost = $request->Cost;
                $strongroofform->StructuralRisk = $request->StructuralRisk;
                $strongroofform->JobDifficulty = $request->JobDifficulty;
                $strongroofform->save();
                return response()->json($strongroofform);
            } else if ($request['item'] == '上拱距') {
                $strongupperarchdistance = new strongupperarchdistance();
                $strongupperarchdistance->Expert = $request->Expert;
                $strongupperarchdistance->BuildItem = $request->BuildItem;
                $strongupperarchdistance->Cost = $request->Cost;
                $strongupperarchdistance->StructuralRisk = $request->StructuralRisk;
                $strongupperarchdistance->JobDifficulty = $request->JobDifficulty;
                $strongupperarchdistance->save();
                return response()->json($strongupperarchdistance);
            } else if ($request['item'] == '基礎') {
                $strongfoundation = new strongfoundation();
                $strongfoundation->Expert = $request->Expert;
                $strongfoundation->BuildItem = $request->BuildItem;
                $strongfoundation->Cost = $request->Cost;
                $strongfoundation->StructuralRisk = $request->StructuralRisk;
                $strongfoundation->JobDifficulty = $request->JobDifficulty;
                $strongfoundation->save();
                return response()->json($strongfoundation);
            } else if ($request['item'] == '跨距') {
                $strongspan = new strongspan();
                $strongspan->Expert = $request->Expert;
                $strongspan->BuildItem = $request->BuildItem;
                $strongspan->Cost = $request->Cost;
                $strongspan->StructuralRisk = $request->StructuralRisk;
                $strongspan->JobDifficulty = $request->JobDifficulty;
                $strongspan->save();
                return response()->json($strongspan);
            } else if ($request['item'] == '肩高') {
                $strongshoulderheight = new strongshoulderheight();
                $strongshoulderheight->Expert = $request->Expert;
                $strongshoulderheight->BuildItem = $request->BuildItem;
                $strongshoulderheight->Cost = $request->Cost;
                $strongshoulderheight->StructuralRisk = $request->StructuralRisk;
                $strongshoulderheight->JobDifficulty = $request->JobDifficulty;
                $strongshoulderheight->save();
                return response()->json($strongshoulderheight);
            } else if ($request['item'] == '長度') {
                $stronglength = new stronglength();
                $stronglength->Expert = $request->Expert;
                $stronglength->BuildItem = $request->BuildItem;
                $stronglength->Cost = $request->Cost;
                $stronglength->StructuralRisk = $request->StructuralRisk;
                $stronglength->JobDifficulty = $request->JobDifficulty;
                $stronglength->save();
                return response()->json($stronglength);
            } else if ($request['item'] == '連續性') {
                $strongcontinuity = new strongcontinuity();
                $strongcontinuity->Expert = $request->Expert;
                $strongcontinuity->BuildItem = $request->BuildItem;
                $strongcontinuity->Cost = $request->Cost;
                $strongcontinuity->StructuralRisk = $request->StructuralRisk;
                $strongcontinuity->JobDifficulty = $request->JobDifficulty;
                $strongcontinuity->save();
                return response()->json($strongcontinuity);
            } else if ($request['item'] == '披覆材料') {
                $simplecoatingfilm = new simplecoatingfilm();
                $simplecoatingfilm->Expert = $request->Expert;
                $simplecoatingfilm->BuildItem = $request->BuildItem;
                $simplecoatingfilm->Cost = $request->Cost;
                $simplecoatingfilm->StructuralRisk = $request->StructuralRisk;
                $simplecoatingfilm->JobDifficulty = $request->JobDifficulty;
                $simplecoatingfilm->save();
                return response()->json($simplecoatingfilm);
            }
        }
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
