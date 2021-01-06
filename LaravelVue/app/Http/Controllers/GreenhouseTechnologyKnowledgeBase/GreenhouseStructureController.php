<?php

namespace App\Http\Controllers\GreenhouseTechnologyKnowledgeBase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\GreenhouseTechnologyKnowledgeBase\GreenhouseStructureAnalysis\structuralanalysi;


class GreenhouseStructureController extends Controller
{
    // 將資料庫的structuralanalysis資料表  轉成JSON
    public function getJSON_structuralanalysi()
    {
        $structural = structuralanalysi::get();
        return $structural;
    }
}
