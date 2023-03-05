<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class StorePermitRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'job_title_a' => 'required',
            'advance_deposit_a' => 'required',
            'streetname_b' => 'required',
            'distance_b' => 'required',
            'damage_method_b' => 'required',
            'damage_rate_per_unit_b' => 'required',
            'total_cost_b' => 'required',
            'road_repair_descriptioon_c' => 'required',
            'repair_perunit_chages_c' => 'required',
            'total_road_repair_cost_c' => 'required',
            'applicant_id' => 'required',
            'contractor_id' => 'required',
            'owner_id' => 'required',
            // 'geom'=>'required'
        ];
    }



    public function store(){
        DB::table('tbl_permit_application')->insert(   array(
            'job_title' => 'taylor@example.com',
            'advance_deposit'=>'200',
            'section_c'=>json_encode( $_REQUEST['lorong']),
            'section_d'=>json_encode($_REQUEST['BILlorong']), 
            'section_b'=> json_encode($_REQUEST['kaedah']),
            'application_id'=>$_REQUEST['id']
            )) ;
    }
}
