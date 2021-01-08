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
Route::get('/GreenhouseCostJSON',[CostAnalysisController::class, 'getJSON_GreenhouseCost']);
Route::get('/GreenhouseCostRatioJSON',[CostAnalysisController::class, 'getJSON_GreenhouseCostRatio']);
