<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\Auth\AuthController;
Route::get('/UserJSON',[AuthController::class,'getJSON_User']);    // 會員資料

use App\Http\Controllers\GreenhouseTechnologyKnowledgeBase\FluidController;
// 溫室流體分析使用的JSON
Route::get('/FluidAnalysisJSON',[FluidController::class, 'ToJSON']);
// 溫室流體分析圖表分析使用的JSON
Route::get('/FluidAnalysisChartData',[FluidController::class, 'ChartData']);

use App\Http\Controllers\GreenhouseTechnologyKnowledgeBase\MaterialController;
// 材料分析使用的JSON
Route::get('/MaterialAnalysisJSON',[MaterialController::class, 'ToJSON']);
// 桁架高度分析使用的JSON
Route::get('/TrussHeightAnalysisJSON',[MaterialController::class, 'getJSON_trussheightanalysis']);
// 桁架腹桿角度分析使用的JSON
Route::get('/TrussBellyRodAngleanAlysisJSON',[MaterialController::class, 'getJSON_trussbellyrodangleanalysis']);
// 桁架上下弦與腹桿大小分析使用的JSON
Route::get('/TrussBellyRodSizeUpperLowerChordsJSON',[MaterialController::class, 'getJSON_trussbellyrodsizeupperlowerchords']);
// 屋頂桁架的優化組合設計使用的JSON
Route::get('/TrussRoofCombinationChangesJSON',[MaterialController::class, 'getJSON_trussroofcombinationchanges']);

use App\Http\Controllers\GreenhouseTechnologyKnowledgeBase\GreenhouseStructureController;
// 溫室結構分析使用的JSON
Route::get('/StructuralAnalysisJSON',[GreenhouseStructureController::class, 'getJSON_structuralanalysi']);

use App\Http\Controllers\GreenhouseMasterPlan\GeographicalController;
// 溫室總體規劃設計－地理環境分析
Route::get('/WindSpeedControlJSON',[GeographicalController::class, 'getJSON_WindSpeedControl']);
Route::get('/RegionalWindSpeedJSON',[GeographicalController::class, 'getJSON_RegionalWindSpeed']);
Route::get('/WindLandingAndPathJSON',[GeographicalController::class, 'getJSON_WindLandingAndPath']);

use App\Http\Controllers\GreenhouseMasterPlan\CropController;
// 溫室總體規劃設計－溫室作物選擇
Route::get('/VegetableJSON',[CropController::class, 'getJSON_Vegetable']);
Route::get('/LMEMetalPriceJSON',[CropController::class, 'LME']);  // 倫敦金屬交易所的金屬價格



use App\Http\Controllers\GreenhouseMasterPlan\CostAnalysisController;
// 溫室總體規劃設計－成本分析
Route::get('/USDPriceJSON',[CostAnalysisController::class, 'getJSON_USD']);  // 台灣銀行美金即期賣出價格
Route::get('/GreenhouseCostRatioJSON',[CostAnalysisController::class, 'getJSON_GreenhouseCostRatio']);
Route::get('/MaterialCostJSON',[CostAnalysisController::class, 'getJSON_MaterialCost']);    // 溫室材料成本分析
Route::get('/GreenhouseCostJSON',[CostAnalysisController::class, 'getJSON_GreenhouseCost']);    // 溫室構造成本分析
// 溫室構造成本
use App\Http\Controllers\GreenhouseMasterPlan\CostAnalysis\SimpleController;
Route::get('/SimpleCostRatioJSON',[SimpleController::class, 'getJSON_SimpleCostRatio']);    // 簡易型各建構項目比例
Route::get('/SimpleCircularArchDistanceJSON',[SimpleController::class, 'getJSON_SimpleCircularArchDistance']);    // 簡易型圓拱距
Route::get('/SimpleCoatingFilmJSON',[SimpleController::class, 'getJSON_SimpleCoatingFilm']);    // 簡易型披覆膜
Route::get('/SimpleContinuityJSON',[SimpleController::class, 'getJSON_SimpleContinuity']);    // 簡易型連續性
Route::get('/SimpleDomeFormJSON',[SimpleController::class, 'getJSON_SimpleDomeForm']);    // 簡易型圓頂形式
Route::get('/SimpleFoundationJSON',[SimpleController::class, 'getJSON_SimpleFoundation']);    // 簡易型基礎
Route::get('/SimpleGreenhousePipeJSON',[SimpleController::class, 'getJSON_SimpleGreenhousePipe']);    // 簡易型溫室管材
Route::get('/SimpleLengthJSON',[SimpleController::class, 'getJSON_SimpleLength']);    // 簡易型長度
Route::get('/SimpleShoulderHeightJSON',[SimpleController::class, 'getJSON_SimpleShoulderHeight']);    // 簡易型肩高
Route::get('/SimpleSpanJSON',[SimpleController::class, 'getJSON_SimpleSpan']);    // 簡易型跨距
use App\Http\Controllers\GreenhouseMasterPlan\CostAnalysis\StrongController;
Route::get('/StrongCostRatioJSON',[StrongController::class, 'getJSON_StrongCostRatio']);    // 強固型各建構項目比例
Route::get('/StrongCoatingFilmJSON',[StrongController::class, 'getJSON_StrongCoatingFilm']);    // 強固型披覆膜
Route::get('/StrongContinuityJSON',[StrongController::class, 'getJSON_StrongContinuity']);    // 強固型連續性
Route::get('/StrongFoundationJSON',[StrongController::class, 'getJSON_StrongFoundation']);    // 強固型基礎
Route::get('/StrongGreenhouseProfileJSON',[StrongController::class, 'getJSON_StrongGreenhouseProfile']);    // 強固型溫室型材
Route::get('/StrongLengthJSON',[StrongController::class, 'getJSON_StrongLength']);    // 強固型長度
Route::get('/StrongRoofFormJSON',[StrongController::class, 'getJSON_StrongRoofForm']);    // 強固型屋頂形式
Route::get('/StrongShoulderHeightJSON',[StrongController::class, 'getJSON_StrongShoulderHeight']);    // 強固型肩高
Route::get('/StrongSpanJSON',[StrongController::class, 'getJSON_StrongSpan']);    // 強固型跨距
Route::get('/StrongUpperArchDistanceJSON',[StrongController::class, 'getJSON_StrongUpperArchDistance']);    // 強固型上拱距

use App\Http\Controllers\GreenhouseTechnologyKnowledgeBase\KnowledgeEditorController;
Route::get('/KnowledgeJSON',[KnowledgeEditorController::class, 'getJSON_Knowledge']);    // 知識庫的資料
Route::get('/KnowledgeTreeJSON',[KnowledgeEditorController::class, 'getCategories']);    // 知識庫做樹狀結構
Route::get('/MaterialsAndDesignKnowledgeBase/Article/show/{title}',[KnowledgeEditorController::class, 'show']);    // 知識庫做獨立的頁面


use App\Http\Controllers\GreenhouseMasterPlan\OverPlanController;
Route::get('/OverPlanJson',[OverPlanController::class, 'getJSON_OverPlan']);

