<?php

namespace App\Http\Controllers\GreenhouseMasterPlan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\GreenhouseMasterPlan\vegetable;
use App\Models\GreenhouseMasterPlan\lme_metal_price;

class CropController extends Controller
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
    public function store(Request $request) // 創建作物資訊
    {
        // 設定必填欄位 & 必填欄位的的條件
        $request -> validate([
            'Expert' => 'required',
            'classification' => 'required',
            'VegetableTypes' => 'required',
            'Goodlight' => 'required',
            'Photoperiod' => 'required',
            'Illuminance' => 'required',
            'PPFD' => 'required',
            'LightSaturationPoint' => 'required',
            'LightCompensationPoint' => 'required',
            'Temperatureadaptability' => 'required',
            'LowestGrowthTemperature' => 'required',
            'OptimalGrowthTemperature' => 'required',
            'HighestGrowthTemperature' => 'required',
            'LowestGerminationTemperature' => 'required',
            'OptimumGerminationTemperature' => 'required',
            'HighestGerminationTemperature' => 'required',
            'CO2IncreasedProductionRate' => 'required',
        ]);

        $CropData = new vegetable();
        $CropData->Expert = $request->Expert;
        $CropData->classification =$request->classification;
        $CropData->VegetableTypes = $request->VegetableTypes;
        $CropData->Goodlight = $request->Goodlight;
        $CropData->Photoperiod = $request->Photoperiod;
        $CropData->Illuminance = $request->Illuminance;
        $CropData->PPFD = $request->PPFD;
        $CropData->LightSaturationPoint = $request->LightSaturationPoint;
        $CropData->LightCompensationPoint = $request->LightCompensationPoint;
        $CropData->Temperatureadaptability = $request->Temperatureadaptability;
        $CropData->LowestGrowthTemperature = $request->LowestGrowthTemperature;
        $CropData->OptimalGrowthTemperature = $request->OptimalGrowthTemperature;
        $CropData->HighestGrowthTemperature = $request->HighestGrowthTemperature;
        $CropData->LowestGerminationTemperature = $request->LowestGerminationTemperature;
        $CropData->OptimumGerminationTemperature = $request->OptimumGerminationTemperature;
        $CropData->HighestGerminationTemperature = $request->HighestGerminationTemperature;
        $CropData->CO2IncreasedProductionRate = $request->CO2IncreasedProductionRate;

        if($CropData->save()){
            return response()->json($CropData,200);
        }else{
            return response()->json([
                'message' => '!!創建(store)作物資訊時發生錯誤!!',
                'status_code' => 500
            ],500);
        }
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
    public function update(Request $request, $id)   // 修改作物資訊
    {

        $request -> validate([
            'Expert' => 'required',
            'classification' => 'required',
            'VegetableTypes' => 'required',
            'Goodlight' => 'required',
            'Photoperiod' => 'required',
            'Illuminance' => 'required',
            'PPFD' => 'required',
            'LightSaturationPoint' => 'required',
            'LightCompensationPoint' => 'required',
            'Temperatureadaptability' => 'required',
            'LowestGrowthTemperature' => 'required',
            'OptimalGrowthTemperature' => 'required',
            'HighestGrowthTemperature' => 'required',
            'LowestGerminationTemperature' => 'required',
            'OptimumGerminationTemperature' => 'required',
            'HighestGerminationTemperature' => 'required',
            'CO2IncreasedProductionRate' => 'required',
        ]);

        $data = $request->only(['id','Expert','classification','VegetableTypes','Goodlight','Photoperiod','Illuminance','PPFD','LightSaturationPoint','LightCompensationPoint','Temperatureadaptability','LowestGrowthTemperature','OptimalGrowthTemperature','HighestGrowthTemperature','LowestGerminationTemperature','OptimumGerminationTemperature','HighestGerminationTemperature','CO2IncreasedProductionRate']);
        $EditCropData  = vegetable::where('id',$id);

        if($EditCropData->update($data)){
            return response()->json($data,200);
        }else{
            return response()->json([
                'message' => '!!作物資訊 更新(update)發生錯誤!!',
                'status_code' => 500
            ],500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)    // 刪除作物資訊
    {

        $deleteCrop = vegetable::where('id', $id);

        if($deleteCrop->delete()){
            return response()->json([
                'message' => '刪除已完成!!',
                'status_code' => 200
            ],200);
        }else{
            return response()->json([
                'message' => '!!刪除發生錯誤!!',
                'status_code' => 500
            ],500);
        }

    }

    // 將資料庫的Vegetable資料表  轉成JSON
    public function getJSON_Vegetable()
    {
        $vegetable = vegetable::get();
        return $vegetable;
    }

    // 將資料庫的LME倫敦金屬價格 資料表  轉成JSON
    public function LME(){
        $MetalPrice = lme_metal_price::get();
        $Metal = array();

        // sprintf("%.3f",$lme_metal_price -> MetalPrice) 是將 價格從 字串 轉成 浮點數
        foreach ($MetalPrice as $lme_metal_price){
            array_push($Metal, [$lme_metal_price -> MetalName,sprintf("%.3f",$lme_metal_price -> MetalPrice),$lme_metal_price -> MetalDate,$lme_metal_price -> MetalLink]);
        }
        return $Metal;

    }
}
