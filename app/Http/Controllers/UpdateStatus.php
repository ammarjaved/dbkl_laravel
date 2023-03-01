<?php

namespace App\Http\Controllers;

use App\Models\infoApplicant;
use Exception;
use Illuminate\Http\Request;

class UpdateStatus extends Controller
{
    //

    public function changeStatus(Request $req)
    {
    try{
        infoApplicant::find($req->id)->update(['status'=>$req->status]);
        }catch(Exception $e){
            return redirect()->back();
        }
        return redirect()->back();
    }
}
