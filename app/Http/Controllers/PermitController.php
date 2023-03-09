<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Application\ApplicationGeom;
use App\Models\infoApplicant;
use App\Models\Permit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PermitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
   
        $data = [];
        $data['id'] = $id;
        $app = infoApplicant::find($id);
        if ($app) {
            $data['app'] = $app;
            $data['geom'] = DB::table('application_geom_info')
                ->where('application_id', $id)
                ->get();

            return view('Permit.create', ['data' => $data]);
        }
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('tbl_permit_application')->insert([
            'job_title' => $request->job_title,
            'section_c' => json_encode($request->lorong),
            'section_d' => json_encode($request->BILlorong),
            'section_b' => json_encode($request->section_b),
            'application_id' => $request->id,
            'total_section_c' => $request->total_section_c,
            'total_section_d' => $request->total_section_d,
        ]);
        return redirect()->route('application.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //`
        $permit = Permit::where('application_id', $id)->first();
        if ($permit) {
            $permit['section_c'] = json_decode($permit->section_c);
            $permit['section_b'] = json_decode($permit->section_b);
            $permit['section_d'] = json_decode($permit->section_d);
            // return $permit ;
            $data['geom'] = DB::table('application_geom_info')
                ->where('application_id', $id)
                ->get();
            return view('Permit.show', ['permit' => $permit, 'data' => $data]);
        }
        return redirect()->route('permit.create', $id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        // return $id;
       
        $permit = Permit::where('application_id', $id)->first();
 
        if ($permit) {
            $permit['section_c'] = json_decode($permit->section_c);
            $permit['section_b'] = json_decode($permit->section_b);
            $permit['section_d'] = json_decode($permit->section_d);
            // return $permit ;
            $data['geom'] = DB::table('application_geom_info')
                ->where('application_id', $id)
                ->get();
            return view('Permit.edit', ['permit' => $permit, 'data' => $data]);
            
         
    }
 
        return redirect()->route('permit.create',$id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        Permit::find($id)->update([
            'job_title' => $request->job_title,
            'section_c' => json_encode($request->lorong),
            'section_d' => json_encode($request->BILlorong),
            'section_b' => json_encode($request->section_b),
            'total_section_c' => $request->total_section_c,
            'total_section_d' => $request->total_section_d,
        ]);
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
