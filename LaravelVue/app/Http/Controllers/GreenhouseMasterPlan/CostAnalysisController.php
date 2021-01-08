<?php

namespace App\Http\Controllers\GreenhouseMasterPlan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\greenhousecostanalysi;
use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\greenhousecostratio;


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
}
