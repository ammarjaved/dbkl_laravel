<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\infoApplicant;
use Illuminate\Http\Request;
use Exception;
use File;

class UploadImagesController extends Controller
{
    //

    public function insert(Request $request)
    {
        if(!$request->has('id')){
            return response()->json(['message'=>'application id is required']);
        }
        
        $destinationPath = 'asset/images/upload-images';
        $img_exits = public_path().'/asset/images/upload-images/';

        $application = infoApplicant::find($request->id);
        if(!$application){
            return response()->json(['status'=>'404','message'=>"user not found"]);
        }

    

        for($i = 1 ; $i < 7 ; $i++){
            $img = 'image_'.$i;
            if($request->has($img)){
                
                
                if(File::exists($img_exits.$application->$img)){
                    File::delete($img_exits.$application->$img);
                }
    
                $file5 = $request->file($img);   
    
                $exc = $file5->getClientOriginalExtension();    
                $filename =   $application->ref_num.'-image-'.$i.strtotime(now()).'.'.$exc;
                $file5->move($destinationPath, $filename);
                $application->$img ="http://dbkl.aerosynergy.com.my/".$destinationPath."/". $filename;
    
            }
    
    
        }

        if ($request->has('work_status')) {
            $application->work_status= $request->work_status;
        }
        // return $application;

        try {
            $application->update();
        }catch(Exception $e){ 
            return response()->json(['status'=>'500' ,'message'=>"failed"]);
            return $e->getMessage();
        }
        return response()->json(['status'=>'200','message'=>"success"]);
    }
}
