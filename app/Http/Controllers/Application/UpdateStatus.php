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
        // return date('m/y');
    try{
       $app =  infoApplicant::find($req->id);
       $app->update(['status'=>$req->status,'approved_file_no'=>"JKWAS P/LOO".date('m/y')."(".$app->file_no.")"]);
        }catch(Exception $e){
            return redirect()->back();
        }
        return redirect()->back();
    }

    public function update()
    {
        $app = infoApplicant::all();

        foreach ($app as $vab) {
          infoApplicant::find($vab->id)->update(['file_no'=>"DRAF-".$vab->ref_num]);
        }

    }

    public function SendToDbkl($id)
    {
  $app =    infoApplicant::find($id);
       $app->update(['status'=>'Send To DBKL']);
        return redirect()->route('application.index');
    }
}
