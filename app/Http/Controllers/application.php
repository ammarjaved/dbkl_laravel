<?php

namespace App\Http\Controllers;

use App\Http\Requests\application as RequestsApplication;
use App\Models\ContractorInfo;
use App\Models\infoApplicant;
use App\Models\OwnerInfo;
use App\Models\Permit;
use Exception;
use Illuminate\Http\Request;

class application extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applications = infoApplicant::orderBy('id','asc')->get();

        return view('Application.index',['applications'=>$applications]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("Application.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestsApplication $request)
    {   
        $request['address'] = $request->address." --".$request->address_2." --".$request->address_3." --".$request->address_4." --".$request->address_5;
        $request['parlimen'] = serialize($request->parlimen);
        // dd($request->all());
        try{

        $app = infoApplicant::create($request->all());
     
        // $contractor = ContractorInfo::create($request->all());
        // $owner = OwnerInfo::create([
        //     'phone'=>$request->owner_phone,
        //     'fax'=>$request->owner_fax,
        //     'company_name'=>$request->owner_company_name,
        //     'address'=>$request->owner_address,
        //     'email'=>$request->email
        // ]);

        // $permit =  
        // Permit::create(
        //    $request->all()
          
        // );

        // $pprk = Permit::find($permit->id);
        
        // $permit->applicant_id = $app->id;
        // $permit->contractor_id =$contractor->id;
        // $permit->owner_id= $owner->id;
        // $permit->update();

      
           
         }catch(Exception $e){
            return $e->getMessage();
            return redirect()->route('application.index')->with('message','something is worng try again later');
        }
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
        //
        // $data=[];
         $app = infoApplicant::find($id);
        //  if($app){
        //    return $data['permit'] = Permit::where('applicant_id',$app->id)->get();
        //     $data['owner'] = OwnerInfo::find($data['permit'] ->owner_id);
        //     $data['contractor'] = ContractorInfo::find($data['permit'] ->contractor_id);
            
        //  }  
        //  dd($data);
        
        return $app  ? view('Application.show',['app'=>$app,]) : abort('404');
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
        
        return $app  ? view('Application.edit',['app'=>$app]) : abort('404');
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
            $request['address'] = $request->address." --".$request->address_2." --".$request->address_3." --".$request->address_4." --".$request->address_5;
            $request['parlimen'] = serialize($request->parlimen);
            infoApplicant::find($id)->update($request->all());
        }catch(Exception $e){
            return redirect()->route('application.index')->with('message','something is worng try again later');
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
        try{
           infoApplicant::find($id)->delete();
        }catch(Exception $e){
            return redirect()->back()->with('message','something is worng try again later');
        }

        // return response()->json($data=[],$status= 200);

        return redirect()->route('application.index');
    }
}
