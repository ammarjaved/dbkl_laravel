<?php

use App\Http\Controllers\application;
use App\Http\Controllers\ApplicationGeom;
use App\Http\Controllers\MapController;
use App\Http\Controllers\PermitController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutingController;
use App\Http\Controllers\UpdateStatus;

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


require __DIR__ . '/auth.php';

Route::group(['middleware' => 'auth'], function () {

    Route::get('getmap',[MapController::class,'index']) ;
    Route::view('dashboard',"dashboard");
    Route::resource('permit',PermitController::class);
    Route::resource('application',application::class);
    Route::resource('permohan',permohanController::class);
    Route::get('get-application-geom/{id}',[ApplicationGeom::class,'getGeom']);
    Route::get('get-application-geom',[ApplicationGeom::class,'getallGeom']);
    
    Route::group(['middleware' => 'dbkl'], function () {
    Route::get('/',[PermitController::class,'index']);
    Route::post('update-status',[UpdateStatus::class,'changeStatus']);

    });

    Route::get('/',[PermitController::class,'index']);

    

    
});


Route::group(['prefix' => '/asd'], function () {
    Route::get('', [RoutingController::class, 'index'])->name('root');
    Route::get('{first}/{second}/{third}', [RoutingController::class, 'thirdLevel'])->name('third');
    Route::get('{first}/{second}', [RoutingController::class, 'secondLevel'])->name('second');
    Route::get('{any}', [RoutingController::class, 'root'])->name('any');
});
