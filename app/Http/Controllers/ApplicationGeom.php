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
        $geom = DB::select("SELECT json_build_object('type', 'FeatureCollection','crs',  json_build_object('type','name', 'properties', json_build_object('name', 'EPSG:4326'  )),'features', json_agg(json_build_object('type','Feature','id',id,'geometry',ST_AsGeoJSON(geom)::json,
        'properties', json_build_object(
  'id', id,
        'application_id',application_id,
        'geom',geom
    
        )))) as geojson
        FROM ( select id , application_id , geom from application_geom_info ) as tbl1");
         return $geom[0]->geojson;
    }
}
