<?php

namespace App\Http\Controllers\GreenhouseMasterPlan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\GreenhouseMasterPlan\GeographicalEnvironmentAnalysis\regionalwindspeed;
use App\Models\GreenhouseMasterPlan\GeographicalEnvironmentAnalysis\windspeedcontrol;
use App\Models\GreenhouseMasterPlan\GeographicalEnvironmentAnalysis\windlandingandpath;

class GeographicalController extends Controller
{
    // 將資料庫的WindSpeedControl資料表  轉成JSON
    public function getJSON_WindSpeedControl()
    {
        $windspeed = windspeedcontrol::get();
        return $windspeed;
    }

    // 將資料庫的RegionalWindSpeed資料表  轉成JSON
    public function getJSON_RegionalWindSpeed()
    {
        $regionalwindspeed = regionalwindspeed::get();
        return $regionalwindspeed;
    }

    // 將資料庫的WindLandingAndPath資料表  轉成JSON
    public function getJSON_WindLandingAndPath()
    {
        $windlandingandpath = windlandingandpath::get();
        return $windlandingandpath;
    }


}
