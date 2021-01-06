<?php

namespace App\Http\Controllers\GreenhouseMasterPlan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\GreenhouseMasterPlan\vegetable;


class CropController extends Controller
{
    // 將資料庫的Vegetable資料表  轉成JSON
    public function getJSON_Vegetable()
    {
        $vegetable = vegetable::get();
        return $vegetable;
    }
}
