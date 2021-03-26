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
            'Expert' => 'required',
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
            // 溫室管材
            'GreenhousePipeCost' => 'required',
            'GreenhousePipeStructuralRisk' => 'required',
            'GreenhousePipeJobDifficulty' => 'required',
            // 圓頂形式
            'DomeFormCost' => 'required',
            'DomeFormStructuralRisk' => 'required',
            'DomeFormJobDifficulty' => 'required',
            // 圓拱距
            'ArcDistanceCost' => 'required',
            'ArcDistanceStructuralRisk' => 'required',
            'ArcDistanceJobDifficulty' => 'required',
            // 基礎
            'BasisCost' => 'required',
            'BasisStructuralRisk' => 'required',
            'BasisJobDifficulty' => 'required',
            // 跨距
            'SpanCost' => 'required',
            'SpanStructuralRisk' => 'required',
            'SpanJobDifficulty' => 'required',
            // 肩高
            'ShoulderHeightCost' => 'required',
            'ShoulderHeightStructuralRisk' => 'required',
            'ShoulderHeightJobDifficulty' => 'required',
            // 長度
            'LengthCost' => 'required',
            'LengthStructuralRisk' => 'required',
            'LengthJobDifficulty' => 'required',
            // 連續性
            'ContinuityCost' => 'required',
            'ContinuityStructuralRisk' => 'required',
            'ContinuityJobDifficulty' => 'required',
            // 披覆膜
            'CoatedFilmCost' => 'required',
            'CoatedFilmStructuralRisk' => 'required',
            'CoatedFilmJobDifficulty' => 'required',
        ]);

        /******** 溫室管材  ********/
        // 標準管材
        $GreenhousePipe = new simplegreenhousepipe(); // 溫室管材
        $GreenhousePipe->Expert = $request->Expert;
        $GreenhousePipe->BuildItem = '標準管材';
        $GreenhousePipe->Cost = $request->StandardPipeCost;
        $GreenhousePipe->StructuralRisk = $request->StandardPipeStructureRisk;
        $GreenhousePipe->JobDifficulty = $request->StandardPipeWorkDifficulty;
        $GreenhousePipe->save();

        // 高強管材
        $GreenhousePipe = new simplegreenhousepipe(); // 溫室管材
        $GreenhousePipe->Expert = $request->Expert;
        $GreenhousePipe->BuildItem = '高強管材';
        $GreenhousePipe->Cost = $request->HighStrengthPipeCostCost;
        $GreenhousePipe->StructuralRisk = $request->HighStrengthPipeStructureRisk;
        $GreenhousePipe->JobDifficulty = $request->HighStrengthPipeWorkDifficulty;
        $GreenhousePipe->save();

        // 耐蝕管材
        $GreenhousePipe = new simplegreenhousepipe(); // 溫室管材
        $GreenhousePipe->Expert = $request->Expert;
        $GreenhousePipe->BuildItem = '耐蝕管材';
        $GreenhousePipe->Cost = $request->CorrosionResistantPipeCostCost;
        $GreenhousePipe->StructuralRisk = $request->CorrosionResistantPipeStructureRisk;
        $GreenhousePipe->JobDifficulty = $request->CorrosionResistantPipeWorkDifficulty;
        $GreenhousePipe->save();

        // 高強高耐蝕管材
        $GreenhousePipe = new simplegreenhousepipe(); // 溫室管材
        $GreenhousePipe->Expert = $request->Expert;
        $GreenhousePipe->BuildItem = '高強高耐蝕管材';
        $GreenhousePipe->Cost = $request->HighStrengthCorrosionResistantPipeCost;
        $GreenhousePipe->StructuralRisk = $request->HighStrengthCorrosionResistantPipeStructureRisk;
        $GreenhousePipe->JobDifficulty = $request->HighStrengthCorrosionResistantPipeWorkDifficulty;
        $GreenhousePipe->save();

        /******** 圓頂形式  ********/
        // 單一圓拱
        $Domeform = new simpledomeform();  // 圓頂形式
        $Domeform->Expert = $request->Expert;
        $Domeform->BuildItem = '單一圓拱';
        $Domeform->Cost = $request->SingleRoundArchCost;
        $Domeform->StructuralRisk = $request->SingleRoundArchStructureRisk;
        $Domeform->JobDifficulty = $request->SingleRoundArchWorkDifficulty;
        $Domeform->save();
        // 下橫樑
        $Domeform = new simpledomeform();  // 圓頂形式
        $Domeform->Expert = $request->Expert;
        $Domeform->BuildItem = '下橫樑';
        $Domeform->Cost = $request->LowerBeamCost;
        $Domeform->StructuralRisk = $request->LowerBeamStructureRisk;
        $Domeform->JobDifficulty = $request->LowerBeamWorkDifficulty;
        $Domeform->save();
        // 上1/3橫梁
        $Domeform = new simpledomeform();  // 圓頂形式
        $Domeform->Expert = $request->Expert;
        $Domeform->BuildItem = '上1/3橫梁';
        $Domeform->Cost = $request->UpperOneThreeBeamCost;
        $Domeform->StructuralRisk = $request->UpperOneThreeBeamStructureRisk;
        $Domeform->JobDifficulty = $request->UpperOneThreeBeamWorkDifficulty;
        $Domeform->save();
        // 上二橫梁
        $Domeform = new simpledomeform();  // 圓頂形式
        $Domeform->Expert = $request->Expert;
        $Domeform->BuildItem = '上二橫梁';
        $Domeform->Cost = $request->UpperSecondBeamCost;
        $Domeform->StructuralRisk = $request->UpperSecondBeamStructureRisk;
        $Domeform->JobDifficulty = $request->UpperSecondBeamWorkDifficulty;
        $Domeform->save();
        // T型樑
        $Domeform = new simpledomeform();  // 圓頂形式
        $Domeform->Expert = $request->Expert;
        $Domeform->BuildItem = 'T型樑';
        $Domeform->Cost = $request->TBeamCost;
        $Domeform->StructuralRisk = $request->TBeamStructureRisk;
        $Domeform->JobDifficulty = $request->TBeamWorkDifficulty;
        $Domeform->save();
        // 三支集中樑
        $Domeform = new simpledomeform();  // 圓頂形式
        $Domeform->Expert = $request->Expert;
        $Domeform->BuildItem = '三支集中樑';
        $Domeform->Cost = $request->ThreeConcentratedBeamsCost;
        $Domeform->StructuralRisk = $request->ThreeConcentratedBeamsStructureRisk;
        $Domeform->JobDifficulty = $request->ThreeConcentratedBeamsWorkDifficulty;
        $Domeform->save();
        // 三支垂支梁
        $Domeform = new simpledomeform();  // 圓頂形式
        $Domeform->Expert = $request->Expert;
        $Domeform->BuildItem = '三支垂支梁';
        $Domeform->Cost = $request->ThreeVerticalBeamsCost;
        $Domeform->StructuralRisk = $request->ThreeVerticalBeamsStructureRisk;
        $Domeform->JobDifficulty = $request->ThreeVerticalBeamsWorkDifficulty;
        $Domeform->save();
        // V型樑
        $Domeform = new simpledomeform();  // 圓頂形式
        $Domeform->Expert = $request->Expert;
        $Domeform->BuildItem = 'V型樑';
        $Domeform->Cost = $request->VBeamCost;
        $Domeform->StructuralRisk = $request->VBeamStructureRisk;
        $Domeform->JobDifficulty = $request->VBeamWorkDifficulty;
        $Domeform->save();
        // W型樑
        $Domeform = new simpledomeform();  // 圓頂形式
        $Domeform->Expert = $request->Expert;
        $Domeform->BuildItem = 'W型樑';
        $Domeform->Cost = $request->WBeamCost;
        $Domeform->StructuralRisk = $request->WBeamStructureRisk;
        $Domeform->JobDifficulty = $request->WBeamWorkDifficulty;
        $Domeform->save();

        /******** 圓拱距  ********/
        // 1M-1"
        $CircularArchDistance = new simplecirculararchdistance();   // 圓拱距
        $CircularArchDistance->Expert = $request->Expert;
        $CircularArchDistance->BuildItem = '1M-1"';
        $CircularArchDistance->Cost = $request->oneMoneCost;
        $CircularArchDistance->StructuralRisk = $request->oneMoneStructureRisk;
        $CircularArchDistance->JobDifficulty = $request->oneMoneWorkDifficulty;
        $CircularArchDistance->save();
        // 1M-1-1/4"
        $CircularArchDistance = new simplecirculararchdistance();   // 圓拱距
        $CircularArchDistance->Expert = $request->Expert;
        $CircularArchDistance->BuildItem = '1M-1-1/4"';
        $CircularArchDistance->Cost = $request->oneMone_OneFourCost;
        $CircularArchDistance->StructuralRisk = $request->oneMone_OneFourStructureRisk;
        $CircularArchDistance->JobDifficulty = $request->oneMone_OneFourWorkDifficulty;
        $CircularArchDistance->save();
        // 1M-1-1/2"
        $CircularArchDistance = new simplecirculararchdistance();   // 圓拱距
        $CircularArchDistance->Expert = $request->Expert;
        $CircularArchDistance->BuildItem = '1M-1-1/2"';
        $CircularArchDistance->Cost = $request->oneMone_OneTwoCost;
        $CircularArchDistance->StructuralRisk = $request->oneMone_OneTwoStructureRisk;
        $CircularArchDistance->JobDifficulty = $request->oneMone_OneTwoWorkDifficulty;
        $CircularArchDistance->save();
        // 1.5M-1-1/2"
        $CircularArchDistance = new simplecirculararchdistance();   // 圓拱距
        $CircularArchDistance->Expert = $request->Expert;
        $CircularArchDistance->BuildItem = '1.5M-1-1/2"';
        $CircularArchDistance->Cost = $request->onefiveMone_OneTwoCost;
        $CircularArchDistance->StructuralRisk = $request->onefiveMone_OneTwoStructureRisk;
        $CircularArchDistance->JobDifficulty = $request->onefiveMone_OneTwoWorkDifficulty;
        $CircularArchDistance->save();
        // 2M-2"
        $CircularArchDistance = new simplecirculararchdistance();   // 圓拱距
        $CircularArchDistance->Expert = $request->Expert;
        $CircularArchDistance->BuildItem = '2M-2"';
        $CircularArchDistance->Cost = $request->twoMtwoCost;
        $CircularArchDistance->StructuralRisk = $request->twoMtwoStructureRisk;
        $CircularArchDistance->JobDifficulty = $request->twoMtwoWorkDifficulty;
        $CircularArchDistance->save();
        // 0.5M-1"
        $CircularArchDistance = new simplecirculararchdistance();   // 圓拱距
        $CircularArchDistance->Expert = $request->Expert;
        $CircularArchDistance->BuildItem = '0.5M-1"';
        $CircularArchDistance->Cost = $request->zerofiveMoneCost;
        $CircularArchDistance->StructuralRisk = $request->zerofiveMoneStructureRisk;
        $CircularArchDistance->JobDifficulty = $request->zerofiveMoneWorkDifficulty;
        $CircularArchDistance->save();
        // 0.5-3/4"
        $CircularArchDistance = new simplecirculararchdistance();   // 圓拱距
        $CircularArchDistance->Expert = $request->Expert;
        $CircularArchDistance->BuildItem = '0.5-3/4"';
        $CircularArchDistance->Cost = $request->zerofiveMthreefourCost;
        $CircularArchDistance->StructuralRisk = $request->zerofiveMthreefourStructureRisk;
        $CircularArchDistance->JobDifficulty = $request->zerofiveMthreefourWorkDifficulty;
        $CircularArchDistance->save();
        // 0.5-1/2"
        $CircularArchDistance = new simplecirculararchdistance();   // 圓拱距
        $CircularArchDistance->Expert = $request->Expert;
        $CircularArchDistance->BuildItem = '0.5-1/2"';
        $CircularArchDistance->Cost = $request->zerofiveMonetwoCost;
        $CircularArchDistance->StructuralRisk = $request->zerofiveMonetwoStructureRisk;
        $CircularArchDistance->JobDifficulty = $request->zerofiveMonetwoWorkDifficulty;
        $CircularArchDistance->save();

        /******** 基礎  ********/
        // 直插40cm
        $Foundation = new simplefoundation();   // 基礎
        $Foundation->Expert = $request->Expert;
        $Foundation->BuildItem = '直插40cm';
        $Foundation->Cost = $request->fourtycmCost;
        $Foundation->StructuralRisk = $request->fourtycmStructureRisk;
        $Foundation->JobDifficulty = $request->fourtycmWorkDifficulty;
        $Foundation->save();
        // 直插50cm
        $Foundation = new simplefoundation();   // 基礎
        $Foundation->Expert = $request->Expert;
        $Foundation->BuildItem = '直插50cm';
        $Foundation->Cost = $request->fiftycmCost;
        $Foundation->StructuralRisk = $request->fiftycmStructureRisk;
        $Foundation->JobDifficulty = $request->fiftycmWorkDifficulty;
        $Foundation->save();
        // 直插30cm
        $Foundation = new simplefoundation();   // 基礎
        $Foundation->Expert = $request->Expert;
        $Foundation->BuildItem = '直插30cm';
        $Foundation->Cost = $request->thirtycmCost;
        $Foundation->StructuralRisk = $request->thirtycmStructureRisk;
        $Foundation->JobDifficulty = $request->thirtycmWorkDifficulty;
        $Foundation->save();
        // 直插40cm+地錨
        $Foundation = new simplefoundation();   // 基礎
        $Foundation->Expert = $request->Expert;
        $Foundation->BuildItem = '直插40cm+地錨';
        $Foundation->Cost = $request->fourtycmPlusCost;
        $Foundation->StructuralRisk = $request->fourtycmPlusStructureRisk;
        $Foundation->JobDifficulty = $request->fourtycmPlusWorkDifficulty;
        $Foundation->save();
        // 直插50cm+地錨
        $Foundation = new simplefoundation();   // 基礎
        $Foundation->Expert = $request->Expert;
        $Foundation->BuildItem = '直插50cm+地錨';
        $Foundation->Cost = $request->fiftycmPlusCost;
        $Foundation->StructuralRisk = $request->fiftycmPlusStructureRisk;
        $Foundation->JobDifficulty = $request->fiftycmPlusWorkDifficulty;
        $Foundation->save();
        // 直插30cm+地錨
        $Foundation = new simplefoundation();   // 基礎
        $Foundation->Expert = $request->Expert;
        $Foundation->BuildItem = '直插30cm+地錨';
        $Foundation->Cost = $request->thirtycmPlusCost;
        $Foundation->StructuralRisk = $request->thirtycmPlusStructureRisk;
        $Foundation->JobDifficulty = $request->thirtycmPlusWorkDifficulty;
        $Foundation->save();

        /******** 跨距  ********/
        // 5.4m
        $Span = new simplespan();   // 跨距
        $Span->Expert = $request->Expert;
        $Span->BuildItem = '5.4m';
        $Span->Cost = $request->FiveFourmCost;
        $Span->StructuralRisk = $request->FiveFourmStructureRisk;
        $Span->JobDifficulty = $request->FiveFourmWorkDifficulty;
        $Span->save();
        // 6m
        $Span = new simplespan();   // 跨距
        $Span->Expert = $request->Expert;
        $Span->BuildItem = '6m';
        $Span->Cost = $request->SixmCost;
        $Span->StructuralRisk = $request->SixmStructureRisk;
        $Span->JobDifficulty = $request->SixmWorkDifficulty;
        $Span->save();
        // 7.2m
        $Span = new simplespan();   // 跨距
        $Span->Expert = $request->Expert;
        $Span->BuildItem = '7.2m';
        $Span->Cost = $request->SevenmCost;
        $Span->StructuralRisk = $request->SevenmStructureRisk;
        $Span->JobDifficulty = $request->SevenmWorkDifficulty;
        $Span->save();
        // 8m
        $Span = new simplespan();   // 跨距
        $Span->Expert = $request->Expert;
        $Span->BuildItem = '8m';
        $Span->Cost = $request->eightmCost;
        $Span->StructuralRisk = $request->eightmStructureRisk;
        $Span->JobDifficulty = $request->eightmWorkDifficulty;
        $Span->save();

        /******** 肩高  ********/
        // 2m
        $ShoulderHeight = new simpleshoulderheight();   // 肩高
        $ShoulderHeight->Expert = $request->Expert;
        $ShoulderHeight->BuildItem = '2m';
        $ShoulderHeight->Cost = $request->TwomCost;
        $ShoulderHeight->StructuralRisk = $request->TwomStructureRisk;
        $ShoulderHeight->JobDifficulty = $request->TwomWorkDifficulty;
        $ShoulderHeight->save();
        // 2.5m
        $ShoulderHeight = new simpleshoulderheight();   // 肩高
        $ShoulderHeight->Expert = $request->Expert;
        $ShoulderHeight->BuildItem = '2.5m';
        $ShoulderHeight->Cost = $request->TwoFivemCost;
        $ShoulderHeight->StructuralRisk = $request->TwoFivemStructureRisk;
        $ShoulderHeight->JobDifficulty = $request->TwoFivemWorkDifficulty;
        $ShoulderHeight->save();
        // 3m
        $ShoulderHeight = new simpleshoulderheight();   // 肩高
        $ShoulderHeight->Expert = $request->Expert;
        $ShoulderHeight->BuildItem = '3m';
        $ShoulderHeight->Cost = $request->ThreemCost;
        $ShoulderHeight->StructuralRisk = $request->ThreemStructureRisk;
        $ShoulderHeight->JobDifficulty = $request->ThreemWorkDifficulty;
        $ShoulderHeight->save();
        // 3.5m
        $ShoulderHeight = new simpleshoulderheight();   // 肩高
        $ShoulderHeight->Expert = $request->Expert;
        $ShoulderHeight->BuildItem = '3.5m';
        $ShoulderHeight->Cost = $request->ThreeFivemCost;
        $ShoulderHeight->StructuralRisk = $request->ThreeFivemStructureRisk;
        $ShoulderHeight->JobDifficulty = $request->ThreeFivemWorkDifficulty;
        $ShoulderHeight->save();
        // 4m
        $ShoulderHeight = new simpleshoulderheight();   // 肩高
        $ShoulderHeight->Expert = $request->Expert;
        $ShoulderHeight->BuildItem = '4m';
        $ShoulderHeight->Cost = $request->FourmCost;
        $ShoulderHeight->StructuralRisk = $request->FourmStructureRisk;
        $ShoulderHeight->JobDifficulty = $request->FourmWorkDifficulty;
        $ShoulderHeight->save();

        /******** 長度  ********/
        // 30m
        $Length = new simplelength();   // 長度
        $Length->Expert = $request->Expert;
        $Length->BuildItem = '30m';
        $Length->Cost = $request->ThirtymCost;
        $Length->StructuralRisk = $request->ThirtymStructureRisk;
        $Length->JobDifficulty = $request->ThirtymWorkDifficulty;
        $Length->save();
        // 60m
        $Length = new simplelength();   // 長度
        $Length->Expert = $request->Expert;
        $Length->BuildItem = '60m';
        $Length->Cost = $request->SixtymCost;
        $Length->StructuralRisk = $request->SixtymStructureRisk;
        $Length->JobDifficulty = $request->SixtymWorkDifficulty;
        $Length->save();
        // 90m
        $Length = new simplelength();   // 長度
        $Length->Expert = $request->Expert;
        $Length->BuildItem = '90m';
        $Length->Cost = $request->NinetymCost;
        $Length->StructuralRisk = $request->NinetymStructureRisk;
        $Length->JobDifficulty = $request->NinetymWorkDifficulty;
        $Length->save();
        // 120m
        $Length = new simplelength();   // 長度
        $Length->Expert = $request->Expert;
        $Length->BuildItem = '120m';
        $Length->Cost = $request->OneHundredTwentymCost;
        $Length->StructuralRisk = $request->OneHundredTwentymStructureRisk;
        $Length->JobDifficulty = $request->OneHundredTwentymWorkDifficulty;
        $Length->save();

        /******** 連續性  ********/
        // 獨棟
        $Continuity = new simplecontinuity();   // 連續性
        $Continuity->Expert = $request->Expert;
        $Continuity->BuildItem = '獨棟';
        $Continuity->Cost = $request->DetachedHouseCost;
        $Continuity->StructuralRisk = $request->DetachedHouseStructureRisk;
        $Continuity->JobDifficulty = $request->DetachedHouseWorkDifficulty;
        $Continuity->save();
        // 二連棟
        $Continuity = new simplecontinuity();   // 連續性
        $Continuity->Expert = $request->Expert;
        $Continuity->BuildItem = '二連棟';
        $Continuity->Cost = $request->TwoStoryBuildingCost;
        $Continuity->StructuralRisk = $request->TwoStoryBuildingStructureRisk;
        $Continuity->JobDifficulty = $request->TwoStoryBuildingWorkDifficulty;
        $Continuity->save();
        // 三連棟
        $Continuity = new simplecontinuity();   // 連續性
        $Continuity->Expert = $request->Expert;
        $Continuity->BuildItem = '三連棟';
        $Continuity->Cost = $request->ThreeStoryCost;
        $Continuity->StructuralRisk = $request->ThreeStoryStructureRisk;
        $Continuity->JobDifficulty = $request->ThreeStoryWorkDifficulty;
        $Continuity->save();
        // 四連棟
        $Continuity = new simplecontinuity();   // 連續性
        $Continuity->Expert = $request->Expert;
        $Continuity->BuildItem = '四連棟';
        $Continuity->Cost = $request->FourStoryCost;
        $Continuity->StructuralRisk = $request->FourStoryStructureRisk;
        $Continuity->JobDifficulty = $request->FourStoryWorkDifficulty;
        $Continuity->save();

        /******** 披覆膜  ********/
        // PE
        $CoatingFilm = new simplecoatingfilm(); // 披覆膜
        $CoatingFilm->Expert = $request->Expert;
        $CoatingFilm->BuildItem = 'PE';
        $CoatingFilm->Cost = $request->PECost;
        $CoatingFilm->StructuralRisk = $request->PEStructureRisk;
        $CoatingFilm->JobDifficulty = $request->PEWorkDifficulty;
        $CoatingFilm->save();
        // PO
        $CoatingFilm = new simplecoatingfilm(); // 披覆膜
        $CoatingFilm->Expert = $request->Expert;
        $CoatingFilm->BuildItem = 'PO';
        $CoatingFilm->Cost = $request->POCost;
        $CoatingFilm->StructuralRisk = $request->POStructureRisk;
        $CoatingFilm->JobDifficulty = $request->POWorkDifficulty;        
        $CoatingFilm->save();
        // 硬質塑材
        $CoatingFilm = new simplecoatingfilm(); // 披覆膜
        $CoatingFilm->Expert = $request->Expert;
        $CoatingFilm->BuildItem = '硬質塑材';
        $CoatingFilm->Cost = $request->RigidPlasticCost;
        $CoatingFilm->StructuralRisk = $request->RigidPlasticStructureRisk;
        $CoatingFilm->JobDifficulty = $request->RigidPlasticWorkDifficulty;        
        $CoatingFilm->save();
        // ETFE
        $CoatingFilm = new simplecoatingfilm(); // 披覆膜
        $CoatingFilm->Expert = $request->Expert;
        $CoatingFilm->BuildItem = 'ETFE';
        $CoatingFilm->Cost = $request->ETFECost;
        $CoatingFilm->StructuralRisk = $request->ETFEStructureRisk;
        $CoatingFilm->JobDifficulty = $request->ETFEWorkDifficulty;
        $CoatingFilm->save();
        // 玻璃
        $CoatingFilm = new simplecoatingfilm(); // 披覆膜
        $CoatingFilm->Expert = $request->Expert;
        $CoatingFilm->BuildItem = '玻璃';
        $CoatingFilm->Cost = $request->GlassCost;
        $CoatingFilm->StructuralRisk = $request->GlassStructureRisk;
        $CoatingFilm->JobDifficulty = $request->GlassWorkDifficulty;
        $CoatingFilm->save();

        /******** 各成本比例  ********/
        // 溫室管材
        $CcostRatio = new simplecostratio();    // 各建構項目比例
        $CcostRatio->BuildItem = '溫室管材';
        $CcostRatio->Cost = $request->GreenhousePipeCost;
        $CcostRatio->StructuralRisk = $request->GreenhousePipeStructuralRisk;
        $CcostRatio->JobDifficulty = $request->GreenhousePipeJobDifficulty;
        $CcostRatio->save();

        // 圓頂形式
        $CcostRatio = new simplecostratio();    // 各建構項目比例
        $CcostRatio->BuildItem = '圓頂形式';
        $CcostRatio->Cost = $request->DomeFormCost;
        $CcostRatio->StructuralRisk = $request->DomeFormStructuralRisk;
        $CcostRatio->JobDifficulty = $request->DomeFormJobDifficulty;
        $CcostRatio->save();

        // 圓拱距
        $CcostRatio = new simplecostratio();    // 各建構項目比例
        $CcostRatio->BuildItem = '圓拱距';
        $CcostRatio->Cost = $request->ArcDistanceCost;
        $CcostRatio->StructuralRisk = $request->ArcDistanceStructuralRisk;
        $CcostRatio->JobDifficulty = $request->ArcDistanceJobDifficulty;
        $CcostRatio->save();

        // 基礎
        $CcostRatio = new simplecostratio();    // 各建構項目比例
        $CcostRatio->BuildItem = '基礎';
        $CcostRatio->Cost = $request->BasisCost;
        $CcostRatio->StructuralRisk = $request->BasisStructuralRisk;
        $CcostRatio->JobDifficulty = $request->BasisJobDifficulty;
        $CcostRatio->save();

        // 跨距
        $CcostRatio = new simplecostratio();    // 各建構項目比例
        $CcostRatio->BuildItem = '跨距';
        $CcostRatio->Cost = $request->SpanCost;
        $CcostRatio->StructuralRisk = $request->SpanStructuralRisk;
        $CcostRatio->JobDifficulty = $request->SpanJobDifficulty;
        $CcostRatio->save();

        // 肩高
        $CcostRatio = new simplecostratio();    // 各建構項目比例
        $CcostRatio->BuildItem = '肩高';
        $CcostRatio->Cost = $request->ShoulderHeightCost;
        $CcostRatio->StructuralRisk = $request->ShoulderHeightStructuralRisk;
        $CcostRatio->JobDifficulty = $request->ShoulderHeightJobDifficulty;
        $CcostRatio->save();

        // 長度
        $CcostRatio = new simplecostratio();    // 各建構項目比例
        $CcostRatio->BuildItem = '長度';
        $CcostRatio->Cost = $request->LengthCost;
        $CcostRatio->StructuralRisk = $request->LengthStructuralRisk;
        $CcostRatio->JobDifficulty = $request->LengthJobDifficulty;
        $CcostRatio->save();

        // 連續性
        $CcostRatio = new simplecostratio();    // 各建構項目比例
        $CcostRatio->BuildItem = '連續性';
        $CcostRatio->Cost = $request->ContinuityCost;
        $CcostRatio->StructuralRisk = $request->ContinuityStructuralRisk;
        $CcostRatio->JobDifficulty = $request->ContinuityJobDifficulty;
        $CcostRatio->save();

        // 披覆膜
        $CcostRatio = new simplecostratio();    // 各建構項目比例
        $CcostRatio->BuildItem = '披覆膜';
        $CcostRatio->Cost = $request->CoatedFilmCost;
        $CcostRatio->StructuralRisk = $request->CoatedFilmStructuralRisk;
        $CcostRatio->JobDifficulty = $request->CoatedFilmJobDifficulty;
        $CcostRatio->save();

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
        // 設定必填欄位 & 必填欄位的的條件
        $request -> validate([
                'Expert' => 'required',
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
                // 溫室管材
                'GreenhousePipeCost' => 'required',
                'GreenhousePipeStructuralRisk' => 'required',
                'GreenhousePipeJobDifficulty' => 'required',
                // 圓頂形式
                'DomeFormCost' => 'required',
                'DomeFormStructuralRisk' => 'required',
                'DomeFormJobDifficulty' => 'required',
                // 圓拱距
                'ArcDistanceCost' => 'required',
                'ArcDistanceStructuralRisk' => 'required',
                'ArcDistanceJobDifficulty' => 'required',
                // 基礎
                'BasisCost' => 'required',
                'BasisStructuralRisk' => 'required',
                'BasisJobDifficulty' => 'required',
                // 跨距
                'SpanCost' => 'required',
                'SpanStructuralRisk' => 'required',
                'SpanJobDifficulty' => 'required',
                // 肩高
                'ShoulderHeightCost' => 'required',
                'ShoulderHeightStructuralRisk' => 'required',
                'ShoulderHeightJobDifficulty' => 'required',
                // 長度
                'LengthCost' => 'required',
                'LengthStructuralRisk' => 'required',
                'LengthJobDifficulty' => 'required',
                // 連續性
                'ContinuityCost' => 'required',
                'ContinuityStructuralRisk' => 'required',
                'ContinuityJobDifficulty' => 'required',
                // 披覆膜
                'CoatedFilmCost' => 'required',
                'CoatedFilmStructuralRisk' => 'required',
                'CoatedFilmJobDifficulty' => 'required',
            ]);

        $data = $request->only(['id','Expert','classification','VegetableTypes','Goodlight','Photoperiod','Illuminance','PPFD','LightSaturationPoint','LightCompensationPoint','Temperatureadaptability','LowestGrowthTemperature','OptimalGrowthTemperature','HighestGrowthTemperature','LowestGerminationTemperature','OptimumGerminationTemperature','HighestGerminationTemperature','CO2IncreasedProductionRate']);
        $EditCropData  = vegetable::where('id',$id);

        $EditCropData->update($data);
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
