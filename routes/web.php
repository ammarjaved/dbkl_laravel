<?php

use App\Http\Controllers\application;
use App\Http\Controllers\ApplicationGeom;
use App\Http\Controllers\PermitController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutingController;
use App\Http\Controllers\mapController;


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

// Route::get('/home', function () {
//     return view('index');
// })->middleware('auth')->name('home');

require __DIR__ . '/auth.php';

Route::group(['middleware' => 'auth'], function () {

    Route::view('dashboard',"dashboard");
    Route::resource('permit',PermitController::class);
    Route::resource('application',application::class);
    Route::resource('permohan',permohanController::class);
    Route::get('get-application-geom/{id}',[ApplicationGeom::class,'getGeom']);

    Route::group(['middleware' => 'dbkl'], function () {
        Route::get('getmap',[mapController::class,'index']);
    });
    
    
});


Route::get('password-check/{val}',function($val){
    return $val;
});

Route::group(['prefix' => '/'], function () {
    Route::get('', [RoutingController::class, 'index'])->name('root');
    Route::get('{first}/{second}/{third}', [RoutingController::class, 'thirdLevel'])->name('third');
    Route::get('{first}/{second}', [RoutingController::class, 'secondLevel'])->name('second');
    Route::get('{any}', [RoutingController::class, 'root'])->name('any');
});
