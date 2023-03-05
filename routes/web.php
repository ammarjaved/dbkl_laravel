<?php

use App\Http\Controllers\Application\application;
use App\Http\Controllers\Application\ApplicationGeom;
use App\Http\Controllers\MapController;
use App\Http\Controllers\PermitController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutingController;
use App\Http\Controllers\Application\UpdateStatus;
use App\Http\Controllers\Application\ApplicationProgress;

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
   
    Route::view('dashboard', 'dashboard');
    Route::resource('permit', PermitController::class)->except([
        'create'
    ]);
    Route::get('permit/create/{id}',[PermitController::class,'create'])->name('permit.create');
    Route::resource('application', application::class);
    Route::resource('permohan', permohanController::class);
    Route::get('get-application-geom/{id}', [ApplicationGeom::class, 'getGeom']);
    Route::get('get-application-geom', [ApplicationGeom::class, 'getallGeom']);



    Route::group(['middleware' => 'dbkl'], function () {
        Route::get('/', [application::class, 'index']);
        Route::post('update-status', [UpdateStatus::class, 'changeStatus']);
        Route::get('getmap', [MapController::class, 'index']);
    });

    Route::get('/', [application::class, 'index']);
    Route::resource('application-progress',ApplicationProgress::class);
});

Route::group(['prefix' => '/asd'], function () {
    Route::get('', [RoutingController::class, 'index'])->name('root');
    Route::get('{first}/{second}/{third}', [RoutingController::class, 'thirdLevel'])->name('third');
    Route::get('{first}/{second}', [RoutingController::class, 'secondLevel'])->name('second');
    Route::get('{any}', [RoutingController::class, 'root'])->name('any');
});
