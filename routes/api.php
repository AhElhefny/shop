<?php

use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::group(['middleware'=>['api'],'namespace'=>'Api','prefix'=>'user'],function (){        //,'checkPassword'
    Route::post('login',[UserController::class,'login']);
    Route::post('register',[UserController::class,'register']);
    Route::post('logout',[UserController::class,'logout'])->middleware(['guardAssign:User_api']);
});

Route::group(['middleware'=>['api','checkPassword'],'namespace'=>'Api'],function (){
    Route::post('storeContact',[ContactController::class,'contact'])->middleware(['guardAssign:User_api']);

});
//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
