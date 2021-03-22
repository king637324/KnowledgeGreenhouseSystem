<?php

namespace App\Http\Controllers\GreenhouseMasterPlan\CostAnalysis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\Simple\simplecostratio;                 // 各建構項目比例
use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\Simple\simplecirculararchdistance;      // 圓拱距
use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\Simple\simplecoatingfilm;               // 披覆膜
use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\Simple\simplecontinuity;                // 連續性
use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\Simple\simpledomeform;                  // 圓頂形式
use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\Simple\simplefoundation;                // 基礎
use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\Simple\simplegreenhousepipe;            // 溫室管材
use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\Simple\simplelength;                    // 長度
use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\Simple\simpleshoulderheight;            // 肩高
use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\Simple\simplespan;                      // 跨距


class SimpleController extends Controller
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
    public function store(Request $request)  // 創建作物資訊
    {
        // 設定必填欄位 & 必填欄位的的條件
        $request -> validate([
            /******** 溫室管材  ********/
            // 標準管材
            'StandardPipeCost' => 'required',
            'StandardPipeStructureRisk' => 'required',
            'StandardPipeWorkDifficulty' => 'required',
            // 高強管材
            'HighStrengthPipeCostCost' => 'required',
            'HighStrengthPipeStructureRisk' => 'required',
            'HighStrengthPipeWorkDifficulty' => 'required',
            // 耐蝕管材
            'CorrosionResistantPipeCostCost' => 'required',
            'CorrosionResistantPipeStructureRisk' => 'required',
            'CorrosionResistantPipeWorkDifficulty' => 'required',
            // 高強高耐蝕管材
            'HighStrengthCorrosionResistantPipeCost' => 'required',
            'HighStrengthCorrosionResistantPipeStructureRisk' => 'required',
            'HighStrengthCorrosionResistantPipeWorkDifficulty' => 'required',
            /******** 圓頂形式  ********/
            // 單一圓拱
            'SingleRoundArchCost' => 'required',
            'SingleRoundArchStructureRisk' => 'required',
            'SingleRoundArchWorkDifficulty' => 'required',
            // 下橫樑
            'LowerBeamCost' => 'required',
            'LowerBeamStructureRisk' => 'required',
            'LowerBeamWorkDifficulty' => 'required',
            // 上1/3橫梁
            'UpperOneThreeBeamCost' => 'required',
            'UpperOneThreeBeamStructureRisk' => 'required',
            'UpperOneThreeBeamWorkDifficulty' => 'required',
            // 上二橫梁
            'UpperSecondBeamCost' => 'required',
            'UpperSecondBeamStructureRisk' => 'required',
            'UpperSecondBeamWorkDifficulty' => 'required',
            // T型樑
            'TBeamCost' => 'required',
            'TBeamStructureRisk' => 'required',
            'TBeamWorkDifficulty' => 'required',
            // 三支集中樑
            'ThreeConcentratedBeamsCost' => 'required',
            'ThreeConcentratedBeamsStructureRisk' => 'required',
            'ThreeConcentratedBeamsWorkDifficulty' => 'required',
            // 三支垂支梁
            'ThreeVerticalBeamsCost' => 'required',
            'ThreeVerticalBeamsStructureRisk' => 'required',
            'ThreeVerticalBeamsWorkDifficulty' => 'required',
            // V型樑
            'VBeamCost' => 'required',
            'VBeamStructureRisk' => 'required',
            'VBeamWorkDifficulty' => 'required',
            // W型樑
            'WBeamCost' => 'required',
            'WBeamStructureRisk' => 'required',
            'WBeamWorkDifficulty' => 'required',
            /******** 圓拱距  ********/
            // 1M-1"
            'oneMoneCost' => 'required',
            'oneMoneStructureRisk' => 'required',
            'oneMoneWorkDifficulty' => 'required',
            // 1M-1-1/4"
            'oneMone_OneFourCost' => 'required',
            'oneMone_OneFourStructureRisk' => 'required',
            'oneMone_OneFourWorkDifficulty' => 'required',
            // 1M-1-1/2"
            'oneMone_OneTwoCost' => 'required',
            'oneMone_OneTwoStructureRisk' => 'required',
            'oneMone_OneTwoWorkDifficulty' => 'required',
            // 1.5M-1-1/2"
            'onefiveMone_OneTwoCost' => 'required',
            'onefiveMone_OneTwoStructureRisk' => 'required',
            'onefiveMone_OneTwoWorkDifficulty' => 'required',
            // 2M-2"
            'twoMtwoCost' => 'required',
            'twoMtwoStructureRisk' => 'required',
            'twoMtwoWorkDifficulty' => 'required',
            // 0.5M-1"
            'zerofiveMoneCost' => 'required',
            'zerofiveMoneStructureRisk' => 'required',
            'zerofiveMoneWorkDifficulty' => 'required',
            // 0.5-3/4"
            'zerofiveMthreefourCost' => 'required',
            'zerofiveMthreefourStructureRisk' => 'required',
            'zerofiveMthreefourWorkDifficulty' => 'required',
            // 0.5-1/2"
            'zerofiveMonetwoCost' => 'required',
            'zerofiveMonetwoStructureRisk' => 'required',
            'zerofiveMonetwoWorkDifficulty' => 'required',
            /******** 基礎  ********/
            // 直插30cm
            'thirtycmCost' => 'required',
            'thirtycmStructureRisk' => 'required',
            'thirtycmWorkDifficulty' => 'required',
            // 直插40cm
            'fourtycmCost' => 'required',
            'fourtycmStructureRisk' => 'required',
            'fourtycmWorkDifficulty' => 'required',
            // 直插50cm
            'fiftycmCost' => 'required',
            'fiftycmStructureRisk' => 'required',
            'fiftycmWorkDifficulty' => 'required',
            // 直插30cm+地錨
            'thirtycmPlusCost' => 'required',
            'thirtycmPlusStructureRisk' => 'required',
            'thirtycmPlusWorkDifficulty' => 'required',
            // 直插40cm+地錨
            'fourtycmPlusCost' => 'required',
            'fourtycmPlusStructureRisk' => 'required',
            'fourtycmPlusWorkDifficulty' => 'required',
            // 直插50cm+地錨
            'fiftycmPlusCost' => 'required',
            'fiftycmPlusStructureRisk' => 'required',
            'fiftycmPlusWorkDifficulty' => 'required',
            /******** 跨距  ********/
            // 5.4m
            'FiveFourmCost' => 'required',
            'FiveFourmStructureRisk' => 'required',
            'FiveFourmWorkDifficulty' => 'required',
            // 6m
            'SixmCost' => 'required',
            'SixmStructureRisk' => 'required',
            'SixmWorkDifficulty' => 'required',
            // 7.2m
            'SevenmCost' => 'required',
            'SevenmStructureRisk' => 'required',
            'SevenmStructureRisk' => 'required',
            // 8m
            'eightmCost' => 'required',
            'eightmStructureRisk' => 'required',
            'eightmWorkDifficulty' => 'required',
            /******** 肩高  ********/
            // 2m
            'TwomCost' => 'required',
            'TwomStructureRisk' => 'required',
            'TwomWorkDifficulty' => 'required',
            // 2.5m
            'TwoFivemCost' => 'required',
            'TwoFivemStructureRisk' => 'required',
            'TwoFivemWorkDifficulty' => 'required',
            // 3m
            'ThreemCost' => 'required',
            'ThreemStructureRisk' => 'required',
            'ThreemWorkDifficulty' => 'required',
            // 3.5m
            'ThreeFivemCost' => 'required',
            'ThreeFivemStructureRisk' => 'required',
            'ThreeFivemWorkDifficulty' => 'required',
            // 4m
            'FourmCost' => 'required',
            'FourmStructureRisk' => 'required',
            'FourmWorkDifficulty' => 'required',
            /******** 長度  ********/
            // 30m
            'ThirtymCost' => 'required',
            'ThirtymStructureRisk' => 'required',
            'ThirtymWorkDifficulty' => 'required',
            // 60m
            'SixtymCost' => 'required',
            'SixtymStructureRisk' => 'required',
            'SixtymWorkDifficulty' => 'required',
            // 90m
            'NinetymCost' => 'required',
            'NinetymStructureRisk' => 'required',
            'NinetymWorkDifficulty' => 'required',
            // 120m
            'OneHundredTwentymCost' => 'required',
            'OneHundredTwentymStructureRisk' => 'required',
            'OneHundredTwentymWorkDifficulty' => 'required',
            /******** 連續性  ********/
            // 獨棟
            'DetachedHouseCost' => 'required',
            'DetachedHouseStructureRisk' => 'required',
            'DetachedHouseWorkDifficulty' => 'required',
            // 二連棟
            'TwoStoryBuildingCost' => 'required',
            'TwoStoryBuildingStructureRisk' => 'required',
            'TwoStoryBuildingWorkDifficulty' => 'required',
            // 三連棟
            'ThreeStoryCost' => 'required',
            'ThreeStoryStructureRisk' => 'required',
            'ThreeStoryWorkDifficulty' => 'required',
            // 四連棟
            'FourStoryCost' => 'required',
            'FourStoryStructureRisk' => 'required',
            'FourStoryWorkDifficulty' => 'required',
            /******** 披覆膜  ********/
            // PE
            'PECost' => 'required',
            'PEStructureRisk' => 'required',
            'PEWorkDifficulty' => 'required',
            // PO
            'POCost' => 'required',
            'POStructureRisk' => 'required',
            'POWorkDifficulty' => 'required',
            // 硬質塑材
            'RigidPlasticCost' => 'required',
            'RigidPlasticStructureRisk' => 'required',
            'RigidPlasticWorkDifficulty' => 'required',
            // ETFE
            'ETFECost' => 'required',
            'ETFEStructureRisk' => 'required',
            'ETFEWorkDifficulty' => 'required',
            // 玻璃
            'GlassCost' => 'required',
            'GlassStructureRisk' => 'required',
            'GlassWorkDifficulty' => 'required',
            /******** 各成本比例  ********/
            'GreenhousePipe' => 'required',   // 溫室管材
            'DomeForm' => 'required',   // 圓頂形式
            'ArcDistance' => 'required',   // 圓拱距
            'Basis' => 'required',   // 基礎
            'Span' => 'required',   // 跨距
            'ShoulderHeight' => 'required',   // 肩高
            'Length' => 'required',   // 長度
            'Continuity' => 'required',   // 連續性
            'CoatedFilm' => 'required',   // 披覆膜
        ]);

        $GreenhousePipe = new simplegreenhousepipe(); // 溫室管材
        /******** 溫室管材  ********/
        // 標準管材
        $GreenhousePipe->StandardPipeCost = $request->StandardPipeCost;
        $GreenhousePipe->StandardPipeStructureRisk = $request->StandardPipeStructureRisk;
        $GreenhousePipe->StandardPipeWorkDifficulty = $request->StandardPipeWorkDifficulty;
        // 高強管材
        $GreenhousePipe->HighStrengthPipeCostCost = $request->HighStrengthPipeCostCost;
        $GreenhousePipe->HighStrengthPipeStructureRisk = $request->HighStrengthPipeStructureRisk;
        $GreenhousePipe->HighStrengthPipeWorkDifficulty = $request->HighStrengthPipeWorkDifficulty;
        // 耐蝕管材
        $GreenhousePipe->CorrosionResistantPipeCostCost = $request->CorrosionResistantPipeCostCost;
        $GreenhousePipe->CorrosionResistantPipeStructureRisk = $request->CorrosionResistantPipeStructureRisk;
        $GreenhousePipe->CorrosionResistantPipeWorkDifficulty = $request->CorrosionResistantPipeWorkDifficulty;
        // 高強高耐蝕管材
        $GreenhousePipe->HighStrengthCorrosionResistantPipeCost = $request->HighStrengthCorrosionResistantPipeCost;
        $GreenhousePipe->HighStrengthCorrosionResistantPipeStructureRisk = $request->HighStrengthCorrosionResistantPipeStructureRisk;
        $GreenhousePipe->HighStrengthCorrosionResistantPipeWorkDifficulty = $request->HighStrengthCorrosionResistantPipeWorkDifficulty;

        $Domeform = new simpledomeform();  // 圓頂形式
        /******** 圓頂形式  ********/
        // 單一圓拱
        $GreenhousePipe->SingleRoundArchCost = $request->SingleRoundArchCost;
        $GreenhousePipe->SingleRoundArchStructureRisk = $request->SingleRoundArchStructureRisk;
        $GreenhousePipe->SingleRoundArchWorkDifficulty = $request->SingleRoundArchWorkDifficulty;
        // 下橫樑
        $GreenhousePipe->LowerBeamCost = $request->LowerBeamCost;
        $GreenhousePipe->LowerBeamStructureRisk = $request->LowerBeamStructureRisk;
        $GreenhousePipe->LowerBeamWorkDifficulty = $request->LowerBeamWorkDifficulty;
        // 上1/3橫梁
        $GreenhousePipe->UpperOneThreeBeamCost = $request->UpperOneThreeBeamCost;
        $GreenhousePipe->UpperOneThreeBeamStructureRisk = $request->UpperOneThreeBeamStructureRisk;
        $GreenhousePipe->UpperOneThreeBeamWorkDifficulty = $request->UpperOneThreeBeamWorkDifficulty;
        // 上二橫梁
        $GreenhousePipe->UpperSecondBeamCost = $request->UpperSecondBeamCost;
        $GreenhousePipe->UpperSecondBeamStructureRisk = $request->UpperSecondBeamStructureRisk;
        $GreenhousePipe->UpperSecondBeamWorkDifficulty = $request->UpperSecondBeamWorkDifficulty;
        // T型樑
        $GreenhousePipe->TBeamCost = $request->TBeamCost;
        $GreenhousePipe->TBeamStructureRisk = $request->TBeamStructureRisk;
        $GreenhousePipe->TBeamWorkDifficulty = $request->TBeamWorkDifficulty;
        // 三支集中樑
        $GreenhousePipe->ThreeConcentratedBeamsCost = $request->ThreeConcentratedBeamsCost;
        $GreenhousePipe->ThreeConcentratedBeamsStructureRisk = $request->ThreeConcentratedBeamsStructureRisk;
        $GreenhousePipe->ThreeConcentratedBeamsWorkDifficulty = $request->ThreeConcentratedBeamsWorkDifficulty;
        // 三支垂支梁
        $GreenhousePipe->ThreeVerticalBeamsCost = $request->ThreeVerticalBeamsCost;
        $GreenhousePipe->ThreeVerticalBeamsStructureRisk = $request->ThreeVerticalBeamsStructureRisk;
        $GreenhousePipe->ThreeVerticalBeamsWorkDifficulty = $request->ThreeVerticalBeamsWorkDifficulty;
        // V型樑
        $GreenhousePipe->VBeamCost = $request->VBeamCost;
        $GreenhousePipe->VBeamStructureRisk = $request->VBeamStructureRisk;
        $GreenhousePipe->VBeamWorkDifficulty = $request->VBeamWorkDifficulty;
        // W型樑
        $GreenhousePipe->WBeamCost = $request->WBeamCost;
        $GreenhousePipe->WBeamStructureRisk = $request->WBeamStructureRisk;
        $GreenhousePipe->WBeamWorkDifficulty = $request->WBeamWorkDifficulty;

        $CircularArchDistance = new simplecirculararchdistance();       // 圓拱距
        /******** 圓拱距  ********/
        // 1M-1"
        $GreenhousePipe->oneMoneCost = $request->oneMoneCost;
        $GreenhousePipe->oneMoneStructureRisk = $request->oneMoneStructureRisk;
        $GreenhousePipe->oneMoneWorkDifficulty = $request->oneMoneWorkDifficulty;
        // 1M-1-1/4"
        $GreenhousePipe->oneMone_OneFourCost = $request->oneMone_OneFourCost;
        $GreenhousePipe->oneMone_OneFourStructureRisk = $request->oneMone_OneFourStructureRisk;
        $GreenhousePipe->oneMone_OneFourWorkDifficulty = $request->oneMone_OneFourWorkDifficulty;
        // 1M-1-1/2"
        $GreenhousePipe->oneMone_OneTwoCost = $request->oneMone_OneTwoCost;
        $GreenhousePipe->oneMone_OneTwoStructureRisk = $request->oneMone_OneTwoStructureRisk;
        $GreenhousePipe->oneMone_OneTwoWorkDifficulty = $request->oneMone_OneTwoWorkDifficulty;
        // 1.5M-1-1/2"
        $GreenhousePipe->onefiveMone_OneTwoCost = $request->VonefiveMone_OneTwoCost;
        $GreenhousePipe->onefiveMone_OneTwoStructureRisk = $request->onefiveMone_OneTwoStructureRisk;
        $GreenhousePipe->onefiveMone_OneTwoWorkDifficulty = $request->onefiveMone_OneTwoWorkDifficulty;
        // 2M-2"
        $GreenhousePipe->twoMtwoCost = $request->twoMtwoCost;
        $GreenhousePipe->twoMtwoStructureRisk = $request->twoMtwoStructureRisk;
        $GreenhousePipe->twoMtwoWorkDifficulty = $request->twoMtwoWorkDifficulty;
        // 0.5M-1"
        $GreenhousePipe->zerofiveMoneCost = $request->zerofiveMoneCost;
        $GreenhousePipe->zerofiveMoneStructureRisk = $request->zerofiveMoneStructureRisk;
        $GreenhousePipe->zerofiveMoneWorkDifficulty = $request->zerofiveMoneWorkDifficulty;
        // 0.5-3/4"
        $GreenhousePipe->zerofiveMthreefourCost = $request->zerofiveMthreefourCost;
        $GreenhousePipe->zerofiveMthreefourStructureRisk = $request->zerofiveMthreefourStructureRisk;
        $GreenhousePipe->zerofiveMthreefourWorkDifficulty = $request->zerofiveMthreefourWorkDifficulty;
        // 0.5-1/2"
        $GreenhousePipe->zerofiveMonetwoCost = $request->zerofiveMonetwoCost;
        $GreenhousePipe->zerofiveMonetwoStructureRisk = $request->zerofiveMonetwoStructureRisk;
        $GreenhousePipe->zerofiveMonetwoWorkDifficulty = $request->zerofiveMonetwoWorkDifficulty;

        $Foundation = new simplefoundation();                           // 基礎
        /******** 基礎  ********/
        // 直插30cm
        $GreenhousePipe->thirtycmCost = $request->thirtycmCost;
        $GreenhousePipe->thirtycmStructureRisk = $request->thirtycmStructureRisk;
        $GreenhousePipe->thirtycmWorkDifficulty = $request->thirtycmWorkDifficulty;
        // 直插40cm
        $GreenhousePipe->fourtycmCost = $request->fourtycmCost;
        $GreenhousePipe->fourtycmStructureRisk = $request->fourtycmStructureRisk;
        $GreenhousePipe->fourtycmWorkDifficulty = $request->fourtycmWorkDifficulty;
        // 直插50cm
        $GreenhousePipe->fiftycmCost = $request->fiftycmCost;
        $GreenhousePipe->fiftycmStructureRisk = $request->fiftycmStructureRisk;
        $GreenhousePipe->fiftycmWorkDifficulty = $request->fiftycmWorkDifficulty;
        // 直插30cm+地錨
        $GreenhousePipe->thirtycmPlusCost = $request->thirtycmPlusCost;
        $GreenhousePipe->thirtycmPlusStructureRisk = $request->thirtycmPlusStructureRisk;
        $GreenhousePipe->thirtycmPlusWorkDifficulty = $request->thirtycmPlusWorkDifficulty;
        // 直插40cm+地錨
        $GreenhousePipe->fourtycmPlusCost = $request->fourtycmPlusCost;
        $GreenhousePipe->fourtycmPlusStructureRisk = $request->fourtycmPlusStructureRisk;
        $GreenhousePipe->fourtycmPlusWorkDifficulty = $request->fourtycmPlusWorkDifficulty;
        // 直插50cm+地錨
        $GreenhousePipe->fiftycmPlusCost = $request->fiftycmPlusCost;
        $GreenhousePipe->fiftycmPlusStructureRisk = $request->fiftycmPlusStructureRisk;
        $GreenhousePipe->fiftycmPlusWorkDifficulty = $request->fiftycmPlusWorkDifficulty;

        $Span = new simplespan();                                       // 跨距
        /******** 跨距  ********/
        // 5.4m
        $GreenhousePipe->FiveFourmCost = $request->FiveFourmCost;
        $GreenhousePipe->FiveFourmStructureRisk = $request->FiveFourmStructureRisk;
        $GreenhousePipe->FiveFourmWorkDifficulty = $request->FiveFourmWorkDifficulty;
        // 6m
        $GreenhousePipe->SixmCost = $request->SixmCost;
        $GreenhousePipe->SixmStructureRisk = $request->SixmStructureRisk;
        $GreenhousePipe->SixmWorkDifficulty = $request->SixmWorkDifficulty;
        // 7.2m
        $GreenhousePipe->SevenmCost = $request->SevenmCost;
        $GreenhousePipe->SevenmStructureRisk = $request->SevenmStructureRisk;
        $GreenhousePipe->SevenmWorkDifficulty = $request->SevenmWorkDifficulty;
        // 8m
        $GreenhousePipe->eightmCost = $request->eightmCost;
        $GreenhousePipe->eightmStructureRisk = $request->eightmStructureRisk;
        $GreenhousePipe->eightmWorkDifficulty = $request->eightmWorkDifficulty;

        $ShoulderHeight = new simpleshoulderheight();                   // 肩高
        /******** 肩高  ********/
        // 2m
        $GreenhousePipe->TwomCost = $request->TwomCost;
        $GreenhousePipe->TwomStructureRisk = $request->TwomStructureRisk;
        $GreenhousePipe->TwomWorkDifficulty = $request->TwomWorkDifficulty;
        // 2.5m
        $GreenhousePipe->TwoFivemCost = $request->TwoFivemCost;
        $GreenhousePipe->TwoFivemStructureRisk = $request->TwoFivemStructureRisk;
        $GreenhousePipe->TwoFivemWorkDifficulty = $request->TwoFivemWorkDifficulty;
        // 3m
        $GreenhousePipe->ThreemCost = $request->ThreemCost;
        $GreenhousePipe->ThreemStructureRisk = $request->ThreemStructureRisk;
        $GreenhousePipe->ThreemWorkDifficulty = $request->ThreemWorkDifficulty;
        // 3.5m
        $GreenhousePipe->ThreeFivemCost = $request->ThreeFivemCost;
        $GreenhousePipe->ThreeFivemStructureRisk = $request->ThreeFivemStructureRisk;
        $GreenhousePipe->ThreeFivemWorkDifficulty = $request->ThreeFivemWorkDifficulty;
        // 4m
        $GreenhousePipe->FourmCost = $request->FourmCost;
        $GreenhousePipe->FourmStructureRisk = $request->FourmStructureRisk;
        $GreenhousePipe->FourmWorkDifficulty = $request->FourmWorkDifficulty;

        $Length = new simplelength();                                   // 長度
        /******** 長度  ********/
        // 30m
        $GreenhousePipe->ThirtymCost = $request->ThirtymCost;
        $GreenhousePipe->ThirtymStructureRisk = $request->ThirtymStructureRisk;
        $GreenhousePipe->ThirtymWorkDifficulty = $request->ThirtymWorkDifficulty;
        // 60m
        $GreenhousePipe->SixtymCost = $request->SixtymCost;
        $GreenhousePipe->SixtymStructureRisk = $request->SixtymStructureRisk;
        $GreenhousePipe->SixtymWorkDifficulty = $request->SixtymWorkDifficulty;
        // 90m
        $GreenhousePipe->NinetymCost = $request->NinetymCost;
        $GreenhousePipe->NinetymStructureRisk = $request->NinetymStructureRisk;
        $GreenhousePipe->NinetymWorkDifficulty = $request->NinetymWorkDifficulty;
        // 120m
        $GreenhousePipe->OneHundredTwentymCost = $request->OneHundredTwentymCost;
        $GreenhousePipe->OneHundredTwentymStructureRisk = $request->OneHundredTwentymStructureRisk;
        $GreenhousePipe->OneHundredTwentymWorkDifficulty = $request->OneHundredTwentymWorkDifficulty;

        $Continuity = new simplecontinuity();                           // 連續性
        /******** 連續性  ********/
        // 獨棟
        $GreenhousePipe->DetachedHouseCost = $request->DetachedHouseCost;
        $GreenhousePipe->DetachedHouseStructureRisk = $request->DetachedHouseStructureRisk;
        $GreenhousePipe->DetachedHouseWorkDifficulty = $request->DetachedHouseWorkDifficulty;
        // 二連棟
        $GreenhousePipe->TwoStoryBuildingCost = $request->TwoStoryBuildingCost;
        $GreenhousePipe->TwoStoryBuildingStructureRisk = $request->TwoStoryBuildingStructureRisk;
        $GreenhousePipe->TwoStoryBuildingWorkDifficulty = $request->TwoStoryBuildingWorkDifficulty;
        // 三連棟
        $GreenhousePipe->ThreeStoryCost = $request->ThreeStoryCost;
        $GreenhousePipe->ThreeStoryStructureRisk = $request->ThreeStoryStructureRisk;
        $GreenhousePipe->ThreeStoryWorkDifficulty = $request->ThreeStoryWorkDifficulty;
        // 四連棟
        $GreenhousePipe->FourStoryCost = $request->FourStoryCost;
        $GreenhousePipe->FourStoryStructureRisk = $request->FourStoryStructureRisk;
        $GreenhousePipe->FourStoryWorkDifficulty = $request->FourStoryWorkDifficulty;

        $CoatingFilm = new simplecoatingfilm();                         // 披覆膜
        /******** 披覆膜  ********/
        // PE
        $GreenhousePipe->PECost = $request->PECost;
        $GreenhousePipe->PEStructureRisk = $request->PEStructureRisk;
        $GreenhousePipe->PEWorkDifficulty = $request->PEWorkDifficulty;
        // PO
        $GreenhousePipe->POCost = $request->POCost;
        $GreenhousePipe->POStructureRisk = $request->POStructureRisk;
        $GreenhousePipe->POWorkDifficulty = $request->POWorkDifficulty;        
        // 硬質塑材
        $GreenhousePipe->RigidPlasticCost = $request->RigidPlasticCost;
        $GreenhousePipe->RigidPlasticStructureRisk = $request->RigidPlasticStructureRisk;
        $GreenhousePipe->RigidPlasticWorkDifficulty = $request->RigidPlasticWorkDifficulty;        
        // ETFE
        $GreenhousePipe->ETFECost = $request->ETFECost;
        $GreenhousePipe->ETFEStructureRisk = $request->ETFEStructureRisk;
        $GreenhousePipe->ETFEWorkDifficulty = $request->ETFEWorkDifficulty;
        // 玻璃
        $GreenhousePipe->GlassCost = $request->GlassCost;
        $GreenhousePipe->GlassStructureRisk = $request->GlassStructureRisk;
        $GreenhousePipe->GlassWorkDifficulty = $request->GlassWorkDifficulty;

        $CcostRatio = new simplecostratio();                            // 各建構項目比例
        /******** 各成本比例  ********/
        $GreenhousePipe->GreenhousePipe = $request->GreenhousePipe; // 溫室管材
        $GreenhousePipe->DomeForm = $request->DomeForm;             // 圓頂形式
        $GreenhousePipe->ArcDistance = $request->ArcDistance;       // 圓拱距
        $GreenhousePipe->Basis = $request->Basis;                   // 基礎
        $GreenhousePipe->Span = $request->Span;                     // 跨距
        $GreenhousePipe->ShoulderHeight = $request->ShoulderHeight; // 肩高
        $GreenhousePipe->Length = $request->Length;                 // 長度
        $GreenhousePipe->Continuity = $request->Continuity;         // 連續性
        $GreenhousePipe->CoatedFilm = $request->CoatedFilm;         // 披覆膜

        // if($CropData->save()){
        //     return response()->json($CropData,200);
        // }else{
        //     return response()->json([
        //         'message' => '!!創建(store)作物資訊時發生錯誤!!',
        //         'status_code' => 500
        //     ],500);
        // }

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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /* 簡易型各建構項目比例 */
    public function getJSON_SimpleCostRatio()
    {
        $SimpleCostRatio = simplecostratio::get();
        return $SimpleCostRatio;
    }

    /* 簡易型圓拱距 */
    public function getJSON_SimpleCircularArchDistance()
    {
        $SimpleCircularArchDistance = simplecirculararchdistance::get();
        return $SimpleCircularArchDistance;
    }

    /* 簡易型披覆膜 */
    public function getJSON_SimpleCoatingFilm()
    {
        $SimpleCoatingFilm = simplecoatingfilm::get();
        return $SimpleCoatingFilm;
    }

    /* 簡易型連續性 */
    public function getJSON_SimpleContinuity()
    {
        $SimpleContinuity = simplecontinuity::get();
        return $SimpleContinuity;
    }

    /* 簡易型圓頂形式 */
    public function getJSON_SimpleDomeForm()
    {
        $SimpleDomeForm = simpledomeform::get();
        return $SimpleDomeForm;
    }

    /* 簡易型基礎 */
    public function getJSON_SimpleFoundation()
    {
        $SimpleFoundation = simplefoundation::get();
        return $SimpleFoundation;
    }

    /* 簡易型溫室管材 */
    public function getJSON_SimpleGreenhousePipe()
    {
        $SimpleGreenhousePipe = simplegreenhousepipe::get();
        return $SimpleGreenhousePipe;
    }

    /* 簡易型長度 */
    public function getJSON_SimpleLength()
    {
        $SimpleLength = simplelength::get();
        return $SimpleLength;
    }

    /* 簡易型肩高 */
    public function getJSON_SimpleShoulderHeight()
    {
        $SimpleShoulderHeight = simpleshoulderheight::get();
        return $SimpleShoulderHeight;
    }

    /* 簡易型跨距 */
    public function getJSON_SimpleSpan()
    {
        $SimpleSpan = simplespan::get();
        return $SimpleSpan;
    }


}
