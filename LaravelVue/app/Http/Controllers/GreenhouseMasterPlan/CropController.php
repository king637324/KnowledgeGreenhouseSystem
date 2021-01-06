<?php

namespace App\Http\Controllers\GreenhouseMasterPlan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\GreenhouseMasterPlan\vegetable;
use App\Models\GreenhouseMasterPlan\lme_metal_price;


class CropController extends Controller
{
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
