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
        $data =[];

        foreach ($fluid as $value){
            $data['name']=$value -> GreenhouseId;
            $temp['a']=$value -> AverageWindPressure_a;
            $temp['b']=$value -> AverageWindPressure_b;
            $temp['c']=$value -> AverageWindPressure_c;
            $temp['d']=$value -> AverageWindPressure_d;
            $temp['e']=$value -> AverageWindPressure_e;
            $temp['f']=$value -> AverageWindPressure_f;
            $temp['g']=$value -> AverageWindPressure_g;
            $temp['h']=$value -> AverageWindPressure_h;
            $data['data']=$temp;

            array_push($ChartData, $data);

        }
        return $ChartData;
    }
}
