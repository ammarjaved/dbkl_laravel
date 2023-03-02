<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Models\infoApplicant;
use Illuminate\Http\Request;

class ApplicationProgress extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $app = infoApplicant::where('status', 'approved')->get();
        return view('ApplicationProgress.index', ['applications' => $app]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $destinationPath = 'asset/images/Permit';

        if ($request->before_image1 != '') {
            $file = $request->file('before_image1');
            $img4_loccap = $file->getClientOriginalExtension();
            $filename = 'Permit-' . $request->ref_num . '-before-image-' . strtotime(now()) . '.' . $img4_loccap;

            $request['before_image'] = asset('asset/images/Permit') . '/' . $filename;
            $file->move($destinationPath, $filename);
        }

        if ($request->after_image1 != '') {
            $file = $request->file('after_image1');
            $img4_loccap = $file->getClientOriginalExtension();
            $filename = 'Permit-' . $request->ref_num . '-after-image-' . strtotime(now()) . '.' . $img4_loccap;

            $request['after_image'] = asset('asset/images/Permit') . '/' . $filename;
            $file->move($destinationPath, $filename);
        }

        

        infoApplicant::find($request->id)->update($request->all());

        return redirect()->route('application-progress.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $app = infoApplicant::find($id);
        $data ['before_image'] = $app->before_image;
        $data ['after_image'] = $app->after_image;
        return response()->json(['data'=>$data,'status'=>'200']);
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
        return response()->json(['data'=>"Asdasd",'status'=>'200']);
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
