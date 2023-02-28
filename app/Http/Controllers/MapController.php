<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\infoApplicant;

class MapController extends Controller
{
    //

    public function index()
    {
  
        return view('Map.index');
    }
}
