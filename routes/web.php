<?php

use App\Http\Controllers\Application\application;
use App\Http\Controllers\Application\ApplicationGeom;
use App\Http\Controllers\MapController;
use App\Http\Controllers\PermitController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutingController;
use App\Http\Controllers\Application\UpdateStatus;
use App\Http\Controllers\Application\ApplicationProgress;
use App\Http\Controllers\ApplicationByStatus;
use Dompdf\Dompdf;

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

    Route::get('update-ref-number',[UpdateStatus::class,'update']);

    Route::get('/send-to-dbkl/{id}',[UpdateStatus::class,'SendToDbkl']);


    Route::group(['middleware' => 'dbkl:dbkl'], function () {
        Route::get('/', [application::class, 'index']);
        Route::post('update-status', [UpdateStatus::class, 'changeStatus']);
        Route::get('getmap', [MapController::class, 'index']);
    });

    Route::get('/', [application::class, 'index']);

    Route::get("/get-distirict-by-line/{line}",[getLineDistrict::class,"GHJKGK"]);

    Route::get('/get-district-geom/{geom}',[ApplicationGeom::class,'getDisitrcit']);

    Route::resource('application-progress',ApplicationProgress::class);
    Route::get('/application-status/{status}',[ApplicationByStatus::class,'index']);
});


Route::get('/pdf-view', function () {
    return view('pdf_view');
});


// Route::get('/pdf', function () {
//     $dompdf = new Dompdf();
//     $dompdf->loadHtml(view('pdf_view'));
//     $dompdf->setPaper('A4', 'landscape');
//     $dompdf->render();
//     $dompdf->stream('document.pdf');
// });

Route::get('/pdf', function () {
    require_once __DIR__.'/../vendor/jimmyjs/laravel-report-generator/src/Facades/Pdf.php';
    $data = [
        'name' => 'John Doe',
        'email' => 'johndoe@example.com',
    ];
    $pdf = PDF::loadHTML(view('pdf_view', $data));
    return $pdf->stream('document.pdf');
});


// Route::group(['prefix' => '/'], function () {
//     Route::get('', [RoutingController::class, 'index'])->name('root');
//     Route::get('{first}/{second}/{third}', [RoutingController::class, 'thirdLevel'])->name('third');
//     Route::get('{first}/{second}', [RoutingController::class, 'secondLevel'])->name('second');
//     Route::get('{any}', [RoutingController::class, 'root'])->name('any');
// });
