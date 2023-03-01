<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApplicationGeom extends Controller
{
    //


    public function getGeom($id)
    {
        $geom = DB::select("SELECT json_build_object('type', 'FeatureCollection','crs',  json_build_object('type','name', 'properties', json_build_object('name', 'EPSG:4326'  )),'features', json_agg(json_build_object('type','Feature','id',id,'geometry',ST_AsGeoJSON(geom)::json,
        'properties', json_build_object(
  'id', id,
        'application_id',application_id,
        'geom',geom
    
        )))) as geojson
        FROM ( select id , application_id , geom from application_geom_info where application_id = $id	) as tbl1");
         return $geom[0]->geojson;
    }


    public function getallGeom()
    {

        $sql="SELECT json_build_object('type', 'FeatureCollection','crs', json_build_object('type','name', 'properties', 
        json_build_object('name', 'EPSG:4326' )),'features', json_agg(json_build_object('type','Feature','application_id',application_id,'geometry',
        ST_AsGeoJSON(geom)::json, 'properties', json_build_object( 
        'application_id',application_id,
        'cabel_length',cabel_length,
        'type_application',type_application,
        'name_of_applicant',name_of_applicant,
        'company_name',company_name,
        'address',company_name,
        'parlimen',	parlimen,
        'road_involved',road_involved,
        'division',	division,
        'telephone_no',telephone_no,
        'before_image',before_image,
        'after_image',after_image,
        'status',status,	
        'geom',geom )))) as geojson 
        FROM ( select cabel_length, type_application, name_of_applicant, company_name, address, parlimen, road_involved,
              division, telephone_no,application_id,geom,before_image,after_image,status from tbl_application a,application_geom_info b where a.id=b.application_id ) as tbl1";
              
       
        $geom = DB::select( $sql);
         return $geom[0]->geojson;
    }
}
