<?php


use App\Http\Controllers\ApiControllers\DBController;
use App\Http\Controllers\ApiControllers\UploadImagesController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:sanctum'], function(){

});


Route::post("/database/GetResults",[DBController::class,'GetResults']);
Route::post("/database/insert",[DBController::class,'insert']);
Route::post("/database/update",[DBController::class,'update']);
Route::post("/upload-application-images",[UploadImagesController::class,'insert']);

Route::post('/login',[App\Http\Controllers\ApiControllers\LoginController::class,"login"]);