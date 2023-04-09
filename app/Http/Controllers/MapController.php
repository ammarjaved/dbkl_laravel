<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\infoApplicant;
use Illuminate\Support\Facades\DB;

class MapController extends Controller
{
    //

    public function index()
    {
        $data = DB::select("
        SELECT a.status as kiv ,b.status as inprocess ,c.status as  approved,d.tnb,e.telco ,f.air FROM
                (SELECT count(*) status from tbl_application where status = 'kiv') a
                ,(SELECT count(*) status from tbl_application where status = 'inprocess') b,
                (SELECT count(*) status from tbl_application where status = 'approved' or status = 'Send To DBKL') c,
                (SELECT COUNT(*) as tnb FROM tbl_application WHERE created_by IN (SELECT id::text FROM users
                                                                                  WHERE app_user_type = 'vendor'
                                                                                  AND vendor_user_type = 'Tenaga National Berhad'))d,
                 (SELECT COUNT(*) as telco FROM tbl_application
        WHERE created_by IN (SELECT id::text FROM users WHERE app_user_type = 'vendor'
                            AND vendor_user_type = 'Telekom Malaysia Berhad')
                
                ) e,
                (SELECT COUNT(*) as air FROM tbl_application
        WHERE created_by IN (SELECT id::text FROM users WHERE app_user_type = 'vendor'
                            AND vendor_user_type = 'Air Selangor Sdn Bhd')
                ) f");
        // return
        // $data[0]->approved;
        return view('Map.index', ['data' => $data[0]]);
    }
}
