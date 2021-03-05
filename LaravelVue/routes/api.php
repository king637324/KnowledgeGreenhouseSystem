<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\VerificationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


use App\Http\Controllers\TestController;
Route::resource('/categories',TestController::class);

use App\Http\Controllers\GreenhouseTechnologyKnowledgeBase\KnowledgeEditorController;
Route::resource('/MaterialsAndDesignKnowledgeBase/Article',KnowledgeEditorController::class);

use App\Http\Controllers\GreenhouseMasterPlan\CropController;
Route::resource('/GreenhouseMasterPlan/CropSelection',CropController::class);

Route::prefix('auth')-> group(function(){
    Route::post('/register',[AuthController::class,'register']);

    Route::post('/login',[AuthController::class,'login']);
    Route::get('email/verify/{id}', [VerificationController::class,'verify'])->name('verification.verify');
    Route::get('email/resend', [VerificationController::class,'resend'])->name('verification.resend');
    Route::get('refresh',[AuthController::class,'refresh']);

    Route::group(['middleware'=>'auth:api'],function(){
        Route::get('user',[AuthController::class,'user']);
        Route::post('logout',[AuthController::class,'logout']);
    });

        // Send reset password mail
        Route::post('/reset-password', [AuthController::class,'sendPasswordResetLink']);
        // 處理重置密碼
        // Route::post('/reset/password', [AuthController::class,'callResetPassword']);

});

/*
api/auth/register  路由將用於創建用戶。
api/auth/login  路由將用於登入。
api/auth/refresh  路由將用於刷新令牌。

api/auth/user  路由將用於獲取用戶信息。
api/auth/logout  路由將用於登出。

*/

// Route::group(['middleware' => 'auth:api'], function(){
//     // Users
//     Route::get('users', 'UserController@index')->middleware('isAdmin');
//     Route::get('users/{id}', 'UserController@show')->middleware('isAdminOrSelf');
// });


