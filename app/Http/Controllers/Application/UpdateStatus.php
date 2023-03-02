<?php

namespace App\Http\Controllers\Application;
use App\Models\infoApplicant;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


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
