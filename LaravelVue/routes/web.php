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
Route::get('/FluidAnalysisJSON',[FluidController::class, 'ToJSON']); // 溫室流體分析使用的JSON
Route::get('/FluidAnalysisChartData',[FluidController::class, 'ChartData']); // 溫室流體分析圖表分析使用的JSON

