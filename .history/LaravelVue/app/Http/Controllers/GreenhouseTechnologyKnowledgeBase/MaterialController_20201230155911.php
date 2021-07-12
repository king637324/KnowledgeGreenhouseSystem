<?php

namespace App\Http\Controllers\GreenhouseTechnologyKnowledgeBase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\GreenhouseTechnologyKnowledgeBase\MaterialStructureAnalysis\materialformat;
use App\Models\GreenhouseTechnologyKnowledgeBase\MaterialStructureAnalysis\trussheightanalysi;
use App\Models\GreenhouseTechnologyKnowledgeBase\MaterialStructureAnalysis\trussbellyrodangleanalysi;
use App\Models\GreenhouseTechnologyKnowledgeBase\MaterialStructureAnalysis\trussbellyrodsizeupperlowerchord;
use App\Models\GreenhouseTechnologyKnowledgeBase\MaterialStructureAnalysis\trussroofcombinationchange;


class MaterialController extends Controller
{
    public function ToJSON(){

        $formats = materialformat::get();

        $ChartData = array();

        foreach ($formats as $value){
            array_push($ChartData, [$value -> Material_id,$value -> length,$value -> width,$value -> foot,$value -> diameter,$value -> NominalSize,$value -> DiameterSize,$value -> height,$value -> breadth,$value -> thickness,$value -> SectionalArea,$value -> UnitWeight,$value -> Material,$value -> SectionModulus,$value -> MomentOfInertia,$value -> SurfaceMomentOfInertia,$value -> YieldStrength,$value -> TensileStrength,$value -> MaximumStress,$value -> MaximumVariable,$value -> MaximumStressMap,$value -> MaximumVariableGraph]);
        }

        return $ChartData;

    }

    // 將資料庫的trussheightanalysis資料表  轉成JSON
    public function getJSON_trussheightanalysis()
    {
        $trussheight = trussheightanalysi::get();
        return $trussheight;
    }

    // 將資料庫的trussbellyrodangleanalysis資料表  轉成JSON
    public function getJSON_trussbellyrodangleanalysis()
    {
        $trussbellyrodangle = trussbellyrodangleanalysi::get();
        return $trussbellyrodangle;
    }

    // 將資料庫的trussbellyrodsizeupperlowerchords資料表  轉成JSON
    public function getJSON_trussbellyrodsizeupperlowerchords()
    {
        $upperlowerchord = trussbellyrodsizeupperlowerchord::get();
        return $upperlowerchord;
    }

    // 將資料庫的trussroofcombinationchanges資料表  轉成JSON
    public function getJSON_trussroofcombinationchanges()
    {
        $roofcombinationchange = trussroofcombinationchange::get();
        return $roofcombinationchange;
    }
}
