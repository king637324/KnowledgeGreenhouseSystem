<?php

namespace App\Http\Controllers\GreenhouseMasterPlan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\GreenhouseMasterPlan\usdollar; // 美金

use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseMaterialCostAnalysis\materialcost; // 材料成本

use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\greenhousecostanalysi;  // 構造成本
use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\greenhousecostratio;    // 構造成本參數


class CostAnalysisController extends Controller
{
    /* 溫室構造成本分析 */
    // 將資料庫的greenhousecostanalysis資料表  轉成JSON
    public function getJSON_GreenhouseCost()
    {
        $MaterialCost = greenhousecostanalysi::get();
        return $MaterialCost;
    }

    // 將資料庫的greenhousecostratio資料表  轉成JSON
    public function getJSON_GreenhouseCostRatio()
    {
        $MaterialCost = greenhousecostratio::get();
        return $MaterialCost;
    }


    /* 溫室材料成本分析 */
    // materialcost  轉成JSON
    public function getJSON_MaterialCost()
    {
        $MaterialCost = materialcost::get();
        return $MaterialCost;
    }

    /* 溫室材料成本分析－美金 */
    // 將資料庫的usdollar資料表  轉成JSON
    public function getJSON_USD()
    {
        $USD = usdollar::get();
        return $USD;
    }
}
