<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;

class DBController extends Controller
{
    //

    public function GetResults(Request $req)
    {

        
        try {
            $data = DB::select($req->qury);
        } 
            catch (Exception $e) {
              return  response()
                ->json([
                    'message'=> "failed",
                    'data'=>[]
                    ]) ;
            }

        return $req->function_name == "InsertQuery" ?
             response()
                ->json([
                    'message'=> "Insert successfully"
                    ]) :   response()
                         ->json([
                        'message'=> "Insert successfully",
                        'data'=> $data
                        ]);

    }

    public function insert(Request $req)
    {
        
        try {
            $data = DB::select($req->qury);
        } 
            catch (Exception $e) {
                return response()->json([
                    'message'=>'failed'
                ]);
            }

            return response()->json([
                'message'=>'success'
            ]);
    }

    public function update(Request $req)
    {       
        try {
            $data = DB::select($req->qury);
        } 
            catch (Exception $e) {
                return response()->json([
                    'message'=>'failed'
                ]);
            }

            return response()->json([
                'message'=>'success'
            ]);
    }
    
}
