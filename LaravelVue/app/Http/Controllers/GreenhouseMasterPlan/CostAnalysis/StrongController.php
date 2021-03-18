<?php

namespace App\Http\Controllers\GreenhouseMasterPlan\CostAnalysis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\Rugged\strongcostratio;         // 各建構項目比例
use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\Rugged\strongcoatingfilm;       // 披覆膜
use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\Rugged\strongcontinuity;        // 連續性
use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\Rugged\strongfoundation;        // 基礎
use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\Rugged\stronggreenhouseprofile; // 溫室型材
use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\Rugged\stronglength;            // 長度
use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\Rugged\strongroofform;          // 屋頂形式
use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\Rugged\strongshoulderheight;    // 肩高
use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\Rugged\strongspan;              // 跨距
use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\Rugged\strongupperarchdistance; // 上拱距

class StrongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
        //
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
        //
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

    /* 強固型各建構項目比例 */
    public function getJSON_StrongCostRatio()
    {
        $StrongCostRatio = strongcostratio::get();
        return $StrongCostRatio;
    }

    /* 強固型披覆膜 */
    public function getJSON_StrongCoatingFilm()
    {
        $StrongCoatingFilm = strongcoatingfilm::get();
        return $StrongCoatingFilm;
    }

    /* 強固型連續性 */
    public function getJSON_StrongContinuity()
    {
        $StrongContinuity = strongcontinuity::get();
        return $StrongContinuity;
    }

    /* 強固型基礎 */
    public function getJSON_StrongFoundation()
    {
        $StrongFoundation = strongfoundation::get();
        return $StrongFoundation;
    }

    /* 強固型溫室型材 */
    public function getJSON_StrongGreenhouseProfile()
    {
        $StrongGreenhouseProfile = stronggreenhouseprofile::get();
        return $StrongGreenhouseProfile;
    }

    /* 強固型長度 */
    public function getJSON_StrongLength()
    {
        $StrongLength = stronglength::get();
        return $StrongLength;
    }

    /* 強固型屋頂形式 */
    public function getJSON_StrongRoofForm()
    {
        $StrongRoofForm = strongroofform::get();
        return $StrongRoofForm;
    }

    /* 強固型肩高 */
    public function getJSON_StrongShoulderHeight()
    {
        $StrongShoulderHeight = strongshoulderheight::get();
        return $StrongShoulderHeight;
    }

    /* 強固型跨距 */
    public function getJSON_StrongSpan()
    {
        $StrongSpan = strongspan::get();
        return $StrongSpan;
    }

    /* 強固型上拱距 */
    public function getJSON_StrongUpperArchDistance()
    {
        $StrongUpperArchDistance = strongupperarchdistance::get();
        return $StrongUpperArchDistance;
    }

}
