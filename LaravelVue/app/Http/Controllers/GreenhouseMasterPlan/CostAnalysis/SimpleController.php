<?php

namespace App\Http\Controllers\GreenhouseMasterPlan\CostAnalysis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\Simple\simplecostratio;                 // 各建構項目比例
use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\Simple\simplecirculararchdistance;      // 圓拱距
use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\Simple\simplecoatingfilm;               // 披覆膜
use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\Simple\simplecontinuity;                // 連續性
use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\Simple\simpledomeform;                  // 圓頂形式
use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\Simple\simplefoundation;                // 基礎
use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\Simple\simplegreenhousepipe;            // 溫室管材
use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\Simple\simplelength;                    // 長度
use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\Simple\simpleshoulderheight;            // 肩高
use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\Simple\simplespan;                      // 跨距


class SimpleController extends Controller
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

    /* 簡易型各建構項目比例 */
    public function getJSON_SimpleCostRatio()
    {
        $SimpleCostRatio = simplecostratio::get();
        return $SimpleCostRatio;
    }

    /* 簡易型圓拱距 */
    public function getJSON_SimpleCircularArchDistance()
    {
        $SimpleCircularArchDistance = simplecirculararchdistance::get();
        return $SimpleCircularArchDistance;
    }

    /* 簡易型披覆膜 */
    public function getJSON_SimpleCoatingFilm()
    {
        $SimpleCoatingFilm = simplecoatingfilm::get();
        return $SimpleCoatingFilm;
    }

    /* 簡易型連續性 */
    public function getJSON_SimpleContinuity()
    {
        $SimpleContinuity = simplecontinuity::get();
        return $SimpleContinuity;
    }

    /* 簡易型圓頂形式 */
    public function getJSON_SimpleDomeForm()
    {
        $SimpleDomeForm = simpledomeform::get();
        return $SimpleDomeForm;
    }

    /* 簡易型基礎 */
    public function getJSON_SimpleFoundation()
    {
        $SimpleFoundation = simplefoundation::get();
        return $SimpleFoundation;
    }

    /* 簡易型溫室管材 */
    public function getJSON_SimpleGreenhousePipe()
    {
        $SimpleGreenhousePipe = simplegreenhousepipe::get();
        return $SimpleGreenhousePipe;
    }

    /* 簡易型長度 */
    public function getJSON_SimpleLength()
    {
        $SimpleLength = simplelength::get();
        return $SimpleLength;
    }

    /* 簡易型肩高 */
    public function getJSON_SimpleShoulderHeight()
    {
        $SimpleShoulderHeight = simpleshoulderheight::get();
        return $SimpleShoulderHeight;
    }

    /* 簡易型跨距 */
    public function getJSON_SimpleSpan()
    {
        $SimpleSpan = simplespan::get();
        return $SimpleSpan;
    }


}
