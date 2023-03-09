<?php

namespace App\Http\Controllers\Application;

use App\Http\Requests\application as RequestsApplication;
use App\Models\infoApplicant;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class application extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->app_user_type == 'dbkl') {
            $applications = infoApplicant::all();
            return view('dbkl.index', ['applications' => $applications]);
        } else {
            $applications = infoApplicant::where('created_by', Auth::user()->id)
                ->orderBy('id', 'asc')
                ->get();
            return view('Application.index', ['applications' => $applications]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user = Auth::user();
        //    return $user->phone;
        //     exit();
        return view('Application.create')->with('user', $user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(RequestsApplication $request)
    {
       
        $map = json_decode($request->geom);

        // $destinationPath = 'asset/images/Permit';

        $user = Auth::user();

        $request['file_no'] = "DRAF-".$request->ref_num;
        // $maxid = DB::table('tbl_application')
        //     ->orderBy('id', 'desc')
        //     ->value('id');
        // $maxid = $maxid + 1;
        // if ($user->vendor_user_type == 'Tenaga National Berhad') {
        //     $request['ref_num'] = 'TNB' . $maxid;
        // }
        // if ($user->vendor_user_type == 'Telekom Malaysia Berhad') {
        //     $request['ref_num'] = 'TELCO' . $maxid;
        // }
        // if ($user->vendor_user_type == 'Air Selangor Sdn Bhd') {
        //     $request['ref_num'] = 'Air' . $maxid;
        // }

        // $request['address'] = $request->address." --".$request->address_2." --".$request->address_3." --".$request->address_4." --".$request->address_5;
        $request['parlimen'] = serialize($request->parlimen);
        $request['created_by'] = $user->id;
        $request['status'] = 'inprocess';

        // return print_r($request->all());

        // dd($request->all());
        // dd($request->all());
        try {
            // dd($request);
            // return $request;
            $app = infoApplicant::create($request->all());

            DB::select("INSERT INTO application_geom_info (application_id, geom , length) VALUES ($app->id , st_geomfromgeojson('" . $request->geom . "') , " . $request->cabel_length . ')');
            // for ($i = 0; $i < sizeof($map); $i++) {
            //     # code...

            //     DB::select("INSERT INTO application_geom_info (application_id, geom , length) VALUES ($app->id , st_geomfromgeojson('" . $map[$i][0] . "') , " . $map[$i][1] . ')');
            // }
        } catch (Exception $e) {
            return $e->getMessage();
            return redirect()
                ->route('application.index')
                ->with('message', 'something is worng try again later');
        }
        return redirect()->route('permit.create',$app->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $app = infoApplicant::find($id);

        return $app ? view('Application.show', ['app' => $app]) : abort('404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $app = infoApplicant::find($id);

        return $app ? view('Application.edit', ['app' => $app]) : abort('404');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestsApplication $request, $id)
    {
        try {
            // $request['address'] = $request->address." --".$request->address_2." --".$request->address_3." --".$request->address_4." --".$request->address_5;
            $request['parlimen'] = serialize($request->parlimen);
            infoApplicant::find($id)->update($request->all());
            if ($request->geom != '') {
                DB::select("UPDATE application_geom_info set  geom = st_geomfromgeojson('$request->geom') WHERE application_id = $id");
            }
        } catch (Exception $e) {
            return $e->getMessage();
            return redirect()
                ->route('application.index')
                ->with('message', 'something is worng try again later');
        }
        return redirect()->route('application.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $application = infoApplicant::find($id);
            if ($application) {
                DB::select("DELETE FROM application_geom_info where application_id = $application->id");
                $application->delete();
            }
        } catch (Exception $e) {
            return redirect()
                ->back()
                ->with('message', 'something is worng try again later');
        }

        // return response()->json($data=[],$status= 200);

        return redirect()->route('application.index');
    }
}
