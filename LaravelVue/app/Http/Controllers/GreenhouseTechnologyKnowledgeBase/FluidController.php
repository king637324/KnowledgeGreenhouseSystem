<?php

namespace App\Http\Controllers\GreenhouseTechnologyKnowledgeBase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\GreenhouseTechnologyKnowledgeBase\GreenhouseFluidAnalysis\fluidanalysisresult;
use App\Models\GreenhouseTechnologyKnowledgeBase\GreenhouseFluidAnalysis\greenhouseformat;
use App\Models\GreenhouseTechnologyKnowledgeBase\GreenhouseFluidAnalysis\greenhousetype;

class FluidController extends Controller
{
    public function ToJSON(){

        $formats = greenhouseformat::get();


        $ChartData = array();

        foreach ($formats as $value){
            array_push($ChartData, [$value -> Greenhouse_Type,$value -> Greenhouse_id,$value -> width,$value -> ColumnHeight,$value -> ChordHeight,$value -> Donggao,$value -> Bevel,$value -> ShoulderHeight,$value -> Span]);
            // ,$value -> Greenhouse_id
        }
        return $ChartData;

    }

    public function ChartData(Request $request){
        $fluid = fluidanalysisresult::get();

        $ChartData = array();

        foreach ($fluid as $value){
            array_push($ChartData, [$value -> GreenhouseId,$value -> AverageWindPressure_a,$value -> AverageWindPressure_b,$value -> AverageWindPressure_c,$value -> AverageWindPressure_d,$value -> AverageWindPressure_e,$value -> AverageWindPressure_f,$value -> AverageWindPressure_g,$value -> AverageWindPressure_h]);
        }
        return $ChartData;
    }
}
