<?php

namespace App\Http\Controllers;

use App\Models\infoApplicant;
use Illuminate\Http\Request;

class ApplicationByStatus extends Controller
{
    //

    public function index($status){
        $applications = infoApplicant::where('status',$status)->get();
        return view('dbkl.applications',['applications'=>$applications]);
    }
}
