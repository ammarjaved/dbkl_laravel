<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\tbl_login;
use App\Models\User;

class LoginController extends Controller
{
    //

    public function login(Request $req){

        $input = $req->all();


        if (  auth()->attempt(['username' => $input['name'], 'password' => $input['password']])) {
                    
            return response()
                    ->json([
                        'statusCode' => 200, 
                        'message' => 'Success', 
                        'type' => Auth::user()->app_user_type,
                        
                    ]);
        } else {

            return response()
                    ->json([
                        'statusCode' => 404, 
                        'message' => 'Failed', 
                        'type' => 'N/A',
                    ]);
        }
    }

    public function test(){
        return "Asdas";
    }
}
