<?php

namespace App\Http\Controllers\GreenhouseMasterPlan\CostAnalysis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\Rugged\strongcostratio;         // 各建構項目比例
use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\Rugged\strongcoatingfilm;       // 披覆膜
use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\Rugged\strongcontinuity;        // 連續性
use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\Rugged\strongfoundation;        // 基礎
use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\Rugged\stronggreenhouseprofile; // 溫室型材
use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\Rugged\stronglength;            // 長度
use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\Rugged\strongroofform;          // 屋頂形式
use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\Rugged\strongshoulderheight;    // 肩高
use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\Rugged\strongspan;              // 跨距
use App\Models\GreenhouseMasterPlan\CostAnalysis\GreenhouseConstructionCostAnalysis\Rugged\strongupperarchdistance; // 上拱距

class StrongController extends Controller
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
    public function store(Request $request) // 創建強固型溫室成本參數
    {
        // 設定必填欄位 & 必填欄位的的條件
        $request -> validate([
            'Expert' => 'required',
            /******** 溫室型材  ********/
            // 標準型材
            'StandardProfileCost' => 'required',
            'StandardProfileStructureRisk' => 'required',
            'StandardProfileWorkDifficulty' => 'required',
            // 高強型材
            'HighStrengthMoldMaterialCost' => 'required',
            'HighStrengthMoldMaterialStructureRisk' => 'required',
            'HighStrengthMoldMaterialWorkDifficulty' => 'required',
            // 耐蝕型材
            'CorrosionResistantMoldMaterialCost' => 'required',
            'CorrosionResistantMoldMaterialStructureRisk' => 'required',
            'CorrosionResistantMoldMaterialWorkDifficulty' => 'required',
            // 高強高耐蝕型材
            'HighStrengthHighCorrosionResistantMoldMaterialCost' => 'required',
            'HighStrengthHighCorrosionResistantMoldMaterialStructureRisk' => 'required',
            'HighStrengthHighCorrosionResistantMoldMaterialWorkDifficulty' => 'required',

            /******** 屋頂形式  ********/
            // 圓頂UBP
            'DomeUBPCost' => 'required',
            'DomeUBPStructureRisk' => 'required',
            'DomeUBPWorkDifficulty' => 'required',
            // 圓力霸UTP
            'TwistedPairUTPCost' => 'required',
            'TwistedPairUTPStructureRisk' => 'required',
            'TwistedPairUTPWorkDifficulty' => 'required',
            // 山型VBP
            'MountainTypeVBPCost' => 'required',
            'MountainTypeVBPStructureRisk' => 'required',
            'MountainTypeVBPWorkDifficulty' => 'required',
            // 山力霸VTP
            'YamarikiVTPCost' => 'required',
            'YamarikiVTPStructureRisk' => 'required',
            'YamarikiVTPWorkDifficulty' => 'required',
            // W型力霸
            'WTypeForceCost' => 'required',
            'WTypeForceStructureRisk' => 'required',
            'WTypeForceWorkDifficulty' => 'required',
            // 單斜SP
            'MonoclinicSPCost' => 'required',
            'MonoclinicSPStructureRisk' => 'required',
            'MonoclinicSPWorkDifficulty' => 'required',

            /******** 上拱距  ********/
            // 2M
            'twoMCost' => 'required',
            'twoMStructureRisk' => 'required',
            'twoMWorkDifficulty' => 'required',
            // 1.33M
            'oneThreeThreeMCost' => 'required',
            'oneThreeThreeMStructureRisk' => 'required',
            'oneThreeThreeMWorkDifficulty' => 'required',
            // 1M
            'oneMCost' => 'required',
            'oneMStructureRisk' => 'required',
            'oneMWorkDifficulty' => 'required',

            /******** 基礎  ********/
            // 獨立基礎
            'IndependenceFoundationCost' => 'required',
            'IndependenceFoundationStructureRisk' => 'required',
            'IndependenceFoundationWorkDifficulty' => 'required',
            // 連續樑
            'ContinuousBeamCost' => 'required',
            'ContinuousBeamStructureRisk' => 'required',
            'ContinuousBeamWorkDifficulty' => 'required',
            // 快速基礎
            'RapidBasicsCost' => 'required',
            'RapidBasicsStructureRisk' => 'required',
            'RapidBasicsWorkDifficulty' => 'required',

            /******** 跨距  ********/
            // 6m
            'sixMCost' => 'required',
            'sixMStructureRisk' => 'required',
            'sixMWorkDifficulty' => 'required',
            // 7m
            'sevenMCost' => 'required',
            'sevenMStructureRisk' => 'required',
            'sevenMWorkDifficulty' => 'required',
            // 8m
            'eightMCost' => 'required',
            'eightMStructureRisk' => 'required',
            'eightMWorkDifficulty' => 'required',
            // 9m
            'nineMCost' => 'required',
            'nineMStructureRisk' => 'required',
            'nineMWorkDifficulty' => 'required',
            // 10m
            'tenMCost' => 'required',
            'tenMStructureRisk' => 'required',
            'tenMWorkDifficulty' => 'required',

            /******** 肩高  ********/
            // 3m
            'threeMCost' => 'required',
            'threeMStructureRisk' => 'required',
            'threeMWorkDifficulty' => 'required',
            // 3.5m
            'threeFiveMCost' => 'required',
            'threeFiveMStructureRisk' => 'required',
            'threeFiveMWorkDifficulty' => 'required',
            // 4m
            'fourMCost' => 'required',
            'fourMStructureRisk' => 'required',
            'fourMWorkDifficulty' => 'required',
            // 4.5m
            'fourFiveMCost' => 'required',
            'fourFiveMStructureRisk' => 'required',
            'fourFiveMWorkDifficulty' => 'required',
            // 5m
            'fiveMCost' => 'required',
            'fiveMStructureRisk' => 'required',
            'fiveMWorkDifficulty' => 'required',

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
            // 溫室型材
            'GreenhouseProfileCost' => 'required',
            'GreenhouseProfileStructuralRisk' => 'required',
            'GreenhouseProfileJobDifficulty' => 'required',
            // 屋頂形式
            'RoofFormCost' => 'required',
            'RoofFormStructuralRisk' => 'required',
            'RoofFormJobDifficulty' => 'required',
            // 上拱距
            'UpperArchCost' => 'required',
            'UpperArchStructuralRisk' => 'required',
            'UpperArchJobDifficulty' => 'required',
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

        /******** 溫室型材  ********/
        // 標準型材
        $GreenhouseProfile = new stronggreenhouseprofile();// 溫室型材
        $GreenhouseProfile->Expert = $request->Expert;
        $GreenhouseProfile->BuildItem = '標準型材';
        $GreenhouseProfile->Cost = $request->StandardProfileCost;
        $GreenhouseProfile->StructuralRisk = $request->StandardProfileStructureRisk;
        $GreenhouseProfile->JobDifficulty = $request->StandardProfileWorkDifficulty;
        $GreenhouseProfile->save();      
        
        // 高強型材
        $GreenhouseProfile = new stronggreenhouseprofile();// 溫室型材
        $GreenhouseProfile->Expert = $request->Expert;
        $GreenhouseProfile->BuildItem = '高強型材';
        $GreenhouseProfile->Cost = $request->HighStrengthMoldMaterialCost;
        $GreenhouseProfile->StructuralRisk = $request->HighStrengthMoldMaterialStructureRisk;
        $GreenhouseProfile->JobDifficulty = $request->HighStrengthMoldMaterialWorkDifficulty;
        $GreenhouseProfile->save();      
        
        // 耐蝕型材
        $GreenhouseProfile = new stronggreenhouseprofile();// 溫室型材
        $GreenhouseProfile->Expert = $request->Expert;
        $GreenhouseProfile->BuildItem = '耐蝕型材';
        $GreenhouseProfile->Cost = $request->CorrosionResistantMoldMaterialCost;
        $GreenhouseProfile->StructuralRisk = $request->CorrosionResistantMoldMaterialStructureRisk;
        $GreenhouseProfile->JobDifficulty = $request->CorrosionResistantMoldMaterialWorkDifficulty;
        $GreenhouseProfile->save();  
        
        // 高強高耐蝕型材
        $GreenhouseProfile = new stronggreenhouseprofile();// 溫室型材
        $GreenhouseProfile->Expert = $request->Expert;
        $GreenhouseProfile->BuildItem = '高強高耐蝕型材';
        $GreenhouseProfile->Cost = $request->HighStrengthHighCorrosionResistantMoldMaterialCost;
        $GreenhouseProfile->StructuralRisk = $request->HighStrengthHighCorrosionResistantMoldMaterialStructureRisk;
        $GreenhouseProfile->JobDifficulty = $request->HighStrengthHighCorrosionResistantMoldMaterialWorkDifficulty;
        $GreenhouseProfile->save();

        /******** 屋頂形式  ********/
        // 圓頂UBP
        $GroofForm = new strongroofform();// 屋頂形式
        $GroofForm->Expert = $request->Expert;
        $GroofForm->BuildItem = '圓頂UBP';
        $GroofForm->Cost = $request->DomeUBPCost;
        $GroofForm->StructuralRisk = $request->DomeUBPStructureRisk;
        $GroofForm->JobDifficulty = $request->DomeUBPWorkDifficulty;
        $GroofForm->save();
        
        // 圓力霸UTP
        $GroofForm = new strongroofform();// 屋頂形式
        $GroofForm->Expert = $request->Expert;
        $GroofForm->BuildItem = '圓力霸UTP';
        $GroofForm->Cost = $request->TwistedPairUTPCost;
        $GroofForm->StructuralRisk = $request->TwistedPairUTPStructureRisk;
        $GroofForm->JobDifficulty = $request->TwistedPairUTPWorkDifficulty;
        $GroofForm->save();
        
        // 山型VBP
        $GroofForm = new strongroofform();// 屋頂形式
        $GroofForm->Expert = $request->Expert;
        $GroofForm->BuildItem = '山型VBP';
        $GroofForm->Cost = $request->MountainTypeVBPCost;
        $GroofForm->StructuralRisk = $request->MountainTypeVBPStructureRisk;
        $GroofForm->JobDifficulty = $request->MountainTypeVBPWorkDifficulty;
        $GroofForm->save();
        
        // 山力霸VTP
        $GroofForm = new strongroofform();// 屋頂形式
        $GroofForm->Expert = $request->Expert;
        $GroofForm->BuildItem = '山力霸VTP';
        $GroofForm->Cost = $request->YamarikiVTPCost;
        $GroofForm->StructuralRisk = $request->YamarikiVTPStructureRisk;
        $GroofForm->JobDifficulty = $request->YamarikiVTPWorkDifficulty;
        $GroofForm->save();
        
        // W型力霸
        $GroofForm = new strongroofform();// 屋頂形式
        $GroofForm->Expert = $request->Expert;
        $GroofForm->BuildItem = 'W型力霸';
        $GroofForm->Cost = $request->WTypeForceCost;
        $GroofForm->StructuralRisk = $request->WTypeForceStructureRisk;
        $GroofForm->JobDifficulty = $request->WTypeForceWorkDifficulty;
        $GroofForm->save();
        
        // 單斜SP
        $GroofForm = new strongroofform();// 屋頂形式
        $GroofForm->Expert = $request->Expert;
        $GroofForm->BuildItem = '單斜SP';
        $GroofForm->Cost = $request->MonoclinicSPCost;
        $GroofForm->StructuralRisk = $request->MonoclinicSPStructureRisk;
        $GroofForm->JobDifficulty = $request->MonoclinicSPWorkDifficulty;
        $GroofForm->save();
        
        /******** 上拱距  ********/
        // 2M
        $UpperArchDistance = new strongupperarchdistance();// 上拱距
        $UpperArchDistance->Expert = $request->Expert;
        $UpperArchDistance->BuildItem = '2M';
        $UpperArchDistance->Cost = $request->twoMCost;
        $UpperArchDistance->StructuralRisk = $request->twoMStructureRisk;
        $UpperArchDistance->JobDifficulty = $request->twoMWorkDifficulty;
        $UpperArchDistance->save();
        
        // 1.33M
        $UpperArchDistance = new strongupperarchdistance();// 上拱距
        $UpperArchDistance->Expert = $request->Expert;
        $UpperArchDistance->BuildItem = '1.33M';
        $UpperArchDistance->Cost = $request->oneThreeThreeMCost;
        $UpperArchDistance->StructuralRisk = $request->oneThreeThreeMStructureRisk;
        $UpperArchDistance->JobDifficulty = $request->oneThreeThreeMWorkDifficulty;
        $UpperArchDistance->save();
        
        // 1M
        $UpperArchDistance = new strongupperarchdistance();// 上拱距
        $UpperArchDistance->Expert = $request->Expert;
        $UpperArchDistance->BuildItem = '1M';
        $UpperArchDistance->Cost = $request->oneMCost;
        $UpperArchDistance->StructuralRisk = $request->oneMStructureRisk;
        $UpperArchDistance->JobDifficulty = $request->oneMWorkDifficulty;
        $UpperArchDistance->save();

        /******** 基礎  ********/
        // 獨立基礎
        $Foundation = new strongfoundation();// 基礎
        $Foundation->Expert = $request->Expert;
        $Foundation->BuildItem = '獨立基礎';
        $Foundation->Cost = $request->IndependenceFoundationCost;
        $Foundation->StructuralRisk = $request->IndependenceFoundationStructureRisk;
        $Foundation->JobDifficulty = $request->IndependenceFoundationWorkDifficulty;
        $Foundation->save();
        
        // 連續樑
        $Foundation = new strongfoundation();// 基礎
        $Foundation->Expert = $request->Expert;
        $Foundation->BuildItem = '連續樑';
        $Foundation->Cost = $request->ContinuousBeamCost;
        $Foundation->StructuralRisk = $request->ContinuousBeamStructureRisk;
        $Foundation->JobDifficulty = $request->ContinuousBeamWorkDifficulty;
        $Foundation->save();
        
        // 快速基礎
        $Foundation = new strongfoundation();// 基礎
        $Foundation->Expert = $request->Expert;
        $Foundation->BuildItem = '快速基礎';
        $Foundation->Cost = $request->RapidBasicsCost;
        $Foundation->StructuralRisk = $request->RapidBasicsStructureRisk;
        $Foundation->JobDifficulty = $request->RapidBasicsWorkDifficulty;
        $Foundation->save();

        /******** 跨距  ********/
        // 6m
        $Span = new strongspan();// 跨距基礎
        $Span->Expert = $request->Expert;
        $Span->BuildItem = '6m';
        $Span->Cost = $request->sixMCost;
        $Span->StructuralRisk = $request->sixMStructureRisk;
        $Span->JobDifficulty = $request->sixMWorkDifficulty;
        $Span->save();
        
        // 7m
        $Span = new strongspan();// 跨距基礎
        $Span->Expert = $request->Expert;
        $Span->BuildItem = '7m';
        $Span->Cost = $request->sevenMCost;
        $Span->StructuralRisk = $request->sevenMStructureRisk;
        $Span->JobDifficulty = $request->sevenMWorkDifficulty;
        $Span->save();
        
        // 8m
        $Span = new strongspan();// 跨距基礎
        $Span->Expert = $request->Expert;
        $Span->BuildItem = '8m';
        $Span->Cost = $request->eightMCost;
        $Span->StructuralRisk = $request->eightMStructureRisk;
        $Span->JobDifficulty = $request->eightMWorkDifficulty;
        $Span->save();
        
        // 9m
        $Span = new strongspan();// 跨距基礎
        $Span->Expert = $request->Expert;
        $Span->BuildItem = '9m';
        $Span->Cost = $request->nineMCost;
        $Span->StructuralRisk = $request->nineMStructureRisk;
        $Span->JobDifficulty = $request->nineMWorkDifficulty;
        $Span->save();
        
        // 10m
        $Span = new strongspan();// 跨距基礎
        $Span->Expert = $request->Expert;
        $Span->BuildItem = '10m';
        $Span->Cost = $request->tenMCost;
        $Span->StructuralRisk = $request->tenMStructureRisk;
        $Span->JobDifficulty = $request->tenMWorkDifficulty;
        $Span->save();

        /******** 肩高  ********/
        // 3m
        $ShoulderHeight = new strongshoulderheight();// 肩高
        $ShoulderHeight->Expert = $request->Expert;
        $ShoulderHeight->BuildItem = '3m';
        $ShoulderHeight->Cost = $request->threeMCost;
        $ShoulderHeight->StructuralRisk = $request->threeMStructureRisk;
        $ShoulderHeight->JobDifficulty = $request->threeMWorkDifficulty;
        $ShoulderHeight->save();
        
        // 3.5m
        $ShoulderHeight = new strongshoulderheight();// 肩高
        $ShoulderHeight->Expert = $request->Expert;
        $ShoulderHeight->BuildItem = '3.5m';
        $ShoulderHeight->Cost = $request->threeFiveMCost;
        $ShoulderHeight->StructuralRisk = $request->threeFiveMStructureRisk;
        $ShoulderHeight->JobDifficulty = $request->threeFiveMWorkDifficulty;
        $ShoulderHeight->save();
        
        // 4m
        $ShoulderHeight = new strongshoulderheight();// 肩高
        $ShoulderHeight->Expert = $request->Expert;
        $ShoulderHeight->BuildItem = '4m';
        $ShoulderHeight->Cost = $request->fourMCost;
        $ShoulderHeight->StructuralRisk = $request->fourMStructureRisk;
        $ShoulderHeight->JobDifficulty = $request->fourMWorkDifficulty;
        $ShoulderHeight->save();
        
        // 4.5m
        $ShoulderHeight = new strongshoulderheight();// 肩高
        $ShoulderHeight->Expert = $request->Expert;
        $ShoulderHeight->BuildItem = '4.5m';
        $ShoulderHeight->Cost = $request->fourFiveMCost;
        $ShoulderHeight->StructuralRisk = $request->fourFiveMStructureRisk;
        $ShoulderHeight->JobDifficulty = $request->fourFiveMWorkDifficulty;
        $ShoulderHeight->save();
        
        // 5m
        $ShoulderHeight = new strongshoulderheight();// 肩高
        $ShoulderHeight->Expert = $request->Expert;
        $ShoulderHeight->BuildItem = '5m';
        $ShoulderHeight->Cost = $request->fiveMCost;
        $ShoulderHeight->StructuralRisk = $request->fiveMStructureRisk;
        $ShoulderHeight->JobDifficulty = $request->fiveMWorkDifficulty;
        $ShoulderHeight->save();

        /******** 長度  ********/
        // 30m
        $Length = new stronglength();// 長度
        $Length->Expert = $request->Expert;
        $Length->BuildItem = '30m';
        $Length->Cost = $request->ThirtymCost;
        $Length->StructuralRisk = $request->ThirtymStructureRisk;
        $Length->JobDifficulty = $request->ThirtymWorkDifficulty;
        $Length->save();
        
        // 60m
        $Length = new stronglength();// 長度
        $Length->Expert = $request->Expert;
        $Length->BuildItem = '60m';
        $Length->Cost = $request->SixtymCost;
        $Length->StructuralRisk = $request->SixtymStructureRisk;
        $Length->JobDifficulty = $request->SixtymWorkDifficulty;
        $Length->save();
        
        // 90m
        $Length = new stronglength();// 長度
        $Length->Expert = $request->Expert;
        $Length->BuildItem = '90m';
        $Length->Cost = $request->NinetymCost;
        $Length->StructuralRisk = $request->NinetymStructureRisk;
        $Length->JobDifficulty = $request->NinetymWorkDifficulty;
        $Length->save();
        
        // 120m
        $Length = new stronglength();// 長度
        $Length->Expert = $request->Expert;
        $Length->BuildItem = '120m';
        $Length->Cost = $request->OneHundredTwentymCost;
        $Length->StructuralRisk = $request->OneHundredTwentymStructureRisk;
        $Length->JobDifficulty = $request->OneHundredTwentymWorkDifficulty;
        $Length->save();

        /******** 連續性  ********/
        // 獨棟
        $Continuity = new strongcontinuity();// 連續性
        $Continuity->Expert = $request->Expert;
        $Continuity->BuildItem = '獨棟';
        $Continuity->Cost = $request->DetachedHouseCost;
        $Continuity->StructuralRisk = $request->DetachedHouseStructureRisk;
        $Continuity->JobDifficulty = $request->DetachedHouseWorkDifficulty;
        $Continuity->save();
        
        // 二連棟
        $Continuity = new strongcontinuity();// 連續性
        $Continuity->Expert = $request->Expert;
        $Continuity->BuildItem = '二連棟';
        $Continuity->Cost = $request->TwoStoryBuildingCost;
        $Continuity->StructuralRisk = $request->TwoStoryBuildingStructureRisk;
        $Continuity->JobDifficulty = $request->TwoStoryBuildingWorkDifficulty;
        $Continuity->save();
        
        // 三連棟
        $Continuity = new strongcontinuity();// 連續性
        $Continuity->Expert = $request->Expert;
        $Continuity->BuildItem = '三連棟';
        $Continuity->Cost = $request->ThreeStoryCost;
        $Continuity->StructuralRisk = $request->ThreeStoryStructureRisk;
        $Continuity->JobDifficulty = $request->ThreeStoryWorkDifficulty;
        $Continuity->save();
        
        // 四連棟
        $Continuity = new strongcontinuity();// 連續性
        $Continuity->Expert = $request->Expert;
        $Continuity->BuildItem = '四連棟';
        $Continuity->Cost = $request->FourStoryCost;
        $Continuity->StructuralRisk = $request->FourStoryStructureRisk;
        $Continuity->JobDifficulty = $request->FourStoryWorkDifficulty;
        $Continuity->save();

        /******** 披覆膜  ********/
        // PE
        $CoatingFilm = new strongcoatingfilm();// 披覆膜
        $CoatingFilm->Expert = $request->Expert;
        $CoatingFilm->BuildItem = 'PE';
        $CoatingFilm->Cost = $request->PECost;
        $CoatingFilm->StructuralRisk = $request->PEStructureRisk;
        $CoatingFilm->JobDifficulty = $request->PEWorkDifficulty;
        $CoatingFilm->save();
        
        // PO
        $CoatingFilm = new strongcoatingfilm();// 披覆膜
        $CoatingFilm->Expert = $request->Expert;
        $CoatingFilm->BuildItem = 'PO';
        $CoatingFilm->Cost = $request->POCost;
        $CoatingFilm->StructuralRisk = $request->POStructureRisk;
        $CoatingFilm->JobDifficulty = $request->POWorkDifficulty;
        $CoatingFilm->save();
        
        // 硬質塑材
        $CoatingFilm = new strongcoatingfilm();// 披覆膜
        $CoatingFilm->Expert = $request->Expert;
        $CoatingFilm->BuildItem = '硬質塑材';
        $CoatingFilm->Cost = $request->RigidPlasticCost;
        $CoatingFilm->StructuralRisk = $request->RigidPlasticStructureRisk;
        $CoatingFilm->JobDifficulty = $request->RigidPlasticWorkDifficulty;
        $CoatingFilm->save();
        
        // ETFE
        $CoatingFilm = new strongcoatingfilm();// 披覆膜
        $CoatingFilm->Expert = $request->Expert;
        $CoatingFilm->BuildItem = 'ETFE';
        $CoatingFilm->Cost = $request->ETFECost;
        $CoatingFilm->StructuralRisk = $request->ETFEStructureRisk;
        $CoatingFilm->JobDifficulty = $request->ETFEWorkDifficulty;
        $CoatingFilm->save();
        
        // 玻璃
        $CoatingFilm = new strongcoatingfilm();// 披覆膜
        $CoatingFilm->Expert = $request->Expert;
        $CoatingFilm->BuildItem = '玻璃';
        $CoatingFilm->Cost = $request->GlassCost;
        $CoatingFilm->StructuralRisk = $request->GlassStructureRisk;
        $CoatingFilm->JobDifficulty = $request->GlassWorkDifficulty;
        $CoatingFilm->save();

        /******** 各成本比例  ********/
        // 溫室型材
        $Costratio = new strongcostratio();// 各成本比例
        $Costratio->Expert = $request->Expert;
        $Costratio->BuildItem = '溫室型材';
        $Costratio->Cost = $request->GreenhouseProfileCost;
        $Costratio->StructuralRisk = $request->GreenhouseProfileStructuralRisk;
        $Costratio->JobDifficulty = $request->GreenhouseProfileJobDifficulty;
        $Costratio->save();
        
        // 屋頂形式
        $Costratio = new strongcostratio();// 各成本比例
        $Costratio->Expert = $request->Expert;
        $Costratio->BuildItem = '屋頂形式';
        $Costratio->Cost = $request->RoofFormCost;
        $Costratio->StructuralRisk = $request->RoofFormStructuralRisk;
        $Costratio->JobDifficulty = $request->RoofFormJobDifficulty;
        $Costratio->save();
        
        // 上拱距
        $Costratio = new strongcostratio();// 各成本比例
        $Costratio->Expert = $request->Expert;
        $Costratio->BuildItem = '上拱距';
        $Costratio->Cost = $request->UpperArchCost;
        $Costratio->StructuralRisk = $request->UpperArchStructuralRisk;
        $Costratio->JobDifficulty = $request->UpperArchJobDifficulty;
        $Costratio->save();

        // 基礎
        $Costratio = new strongcostratio();// 各成本比例
        $Costratio->Expert = $request->Expert;
        $Costratio->BuildItem = '基礎';
        $Costratio->Cost = $request->BasisCost;
        $Costratio->StructuralRisk = $request->BasisStructuralRisk;
        $Costratio->JobDifficulty = $request->BasisJobDifficulty;
        $Costratio->save();
        
        // 跨距
        $Costratio = new strongcostratio();// 各成本比例
        $Costratio->Expert = $request->Expert;
        $Costratio->BuildItem = '跨距';
        $Costratio->Cost = $request->SpanCost;
        $Costratio->StructuralRisk = $request->SpanStructuralRisk;
        $Costratio->JobDifficulty = $request->SpanJobDifficulty;
        $Costratio->save();
        
        // 肩高
        $Costratio = new strongcostratio();// 各成本比例
        $Costratio->Expert = $request->Expert;
        $Costratio->BuildItem = '肩高';
        $Costratio->Cost = $request->ShoulderHeightCost;
        $Costratio->StructuralRisk = $request->ShoulderHeightStructuralRisk;
        $Costratio->JobDifficulty = $request->ShoulderHeightJobDifficulty;
        $Costratio->save();
        
        // 長度
        $Costratio = new strongcostratio();// 各成本比例
        $Costratio->Expert = $request->Expert;
        $Costratio->BuildItem = '長度';
        $Costratio->Cost = $request->LengthCost;
        $Costratio->StructuralRisk = $request->LengthStructuralRisk;
        $Costratio->JobDifficulty = $request->LengthJobDifficulty;
        $Costratio->save();
        
        // 連續性
        $Costratio = new strongcostratio();// 各成本比例
        $Costratio->Expert = $request->Expert;
        $Costratio->BuildItem = '連續性';
        $Costratio->Cost = $request->ContinuityCost;
        $Costratio->StructuralRisk = $request->ContinuityStructuralRisk;
        $Costratio->JobDifficulty = $request->ContinuityJobDifficulty;
        $Costratio->save();
        
        // 披覆膜
        $Costratio = new strongcostratio();// 各成本比例
        $Costratio->Expert = $request->Expert;
        $Costratio->BuildItem = '披覆膜';
        $Costratio->Cost = $request->CoatedFilmCost;
        $Costratio->StructuralRisk = $request->CoatedFilmStructuralRisk;
        $Costratio->JobDifficulty = $request->CoatedFilmJobDifficulty;
        $Costratio->save();
        
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
        dd('Controller裡 update');
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

    /* 強固型各建構項目比例 */
    public function getJSON_StrongCostRatio()
    {
        $StrongCostRatio = strongcostratio::get();
        return $StrongCostRatio;
    }

    /* 強固型披覆膜 */
    public function getJSON_StrongCoatingFilm()
    {
        $StrongCoatingFilm = strongcoatingfilm::get();
        return $StrongCoatingFilm;
    }

    /* 強固型連續性 */
    public function getJSON_StrongContinuity()
    {
        $StrongContinuity = strongcontinuity::get();
        return $StrongContinuity;
    }

    /* 強固型基礎 */
    public function getJSON_StrongFoundation()
    {
        $StrongFoundation = strongfoundation::get();
        return $StrongFoundation;
    }

    /* 強固型溫室型材 */
    public function getJSON_StrongGreenhouseProfile()
    {
        $StrongGreenhouseProfile = stronggreenhouseprofile::get();
        return $StrongGreenhouseProfile;
    }

    /* 強固型長度 */
    public function getJSON_StrongLength()
    {
        $StrongLength = stronglength::get();
        return $StrongLength;
    }

    /* 強固型屋頂形式 */
    public function getJSON_StrongRoofForm()
    {
        $StrongRoofForm = strongroofform::get();
        return $StrongRoofForm;
    }

    /* 強固型肩高 */
    public function getJSON_StrongShoulderHeight()
    {
        $StrongShoulderHeight = strongshoulderheight::get();
        return $StrongShoulderHeight;
    }

    /* 強固型跨距 */
    public function getJSON_StrongSpan()
    {
        $StrongSpan = strongspan::get();
        return $StrongSpan;
    }

    /* 強固型上拱距 */
    public function getJSON_StrongUpperArchDistance()
    {
        $StrongUpperArchDistance = strongupperarchdistance::get();
        return $StrongUpperArchDistance;
    }

}
