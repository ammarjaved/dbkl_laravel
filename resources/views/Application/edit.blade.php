@extends('layouts.vertical', ['page_title' => 'Aplikasi'])


@section('css')
<style>
    /* input[type='text'], input[type='number'] , .disable{
        background-color:#F5F6F8 !important;

    } */
 
        input {
            border-radius: 0px !important;
        }

       

        input[type='checkbox']{
            border-radius: 0px !important;
            padding: 5px;
            margin-left: 3px
        }
        label{
            margin-left: 20px   
        }

</style>

@endsection


@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Aero</a></li>
                    <li class="breadcrumb-item"><a href="/">Aplikasi</a></li>
                   
                    <li class="breadcrumb-item active">edit</li>
                </ol>
            </div>
            <h4 class="page-title">Edit  Aplikasi </h4>
        </div>
    </div>
</div>

    <div class="row">
<div class="container col-md-12">

    <div class="card p-3 ">

        <h3 class="text-center">Permohonan</h3>
        <form action="{{ route('application.update', $app->id) }}" method="POST">
            @method('PATCH')
            @csrf
        <div class="row p-3 pb-0">
            <div class="col-md-4"><label for="ref_num">Nombor Rujukan Utiliti</label><br>
                <span class="text-danger">
                    @error('ref_num')
                        {{ $message }}
                    @enderror
                </span></div>
            <div class="col-md-5"><input type="text" class="form-control" name="ref_num" id="ref_num" value="{{old('ref_num', $app->ref_num)}}"></div>
        </div>


        <div class="row p-3 pb-0">
            <div class="col-md-4"><label for="type_application">Jenis Permohonan</label><br>
                <span class="text-danger">
                    @error('type_application')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="col-md-5">
                <div class="row mb-2">
                    <div class="col-md-6"><input type="radio" name="work_type" id="emergency" value="emergency" {{old('work_type',$app->work_type) == "emergency" ? 'checked' : ''}} onclick="changeTypeApplication('emergency')"><label for="emergency" onclick="changeTypeApplication('emergency')">Kecemasan</label></div>
                    <div class="col-md-6"><input type="radio" name="work_type" id="normal" value="normal" {{old('work_type',$app->work_type) == "normal" ? 'checked' : ''}} onclick="changeTypeApplication('normal')"><label for="normal" onclick="changeTypeApplication('normal')">Biasa</label></div>
                </div>
                <select name="type_application" id="type_application" class="form-select @error('type_application') is-invalid @enderror">
                                
                </select>
        </div>


        <div class="row p-3 pb-0">
            <div class="col-md-4"><label for="cabel_length">Panjang kabel</label><br>
                <span class="text-danger">
                    @error('cabel_length')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="col-md-3"><input type="text"
                    class="form-control @error('cabel_length') is-invalid @enderror" name="cabel_length"
                    id="cabel_length" value="{{ old('cabel_length', $app->cabel_length) }}"></div>
            <div class="col-md-1 pt-2 text-center">Meter</div>
        </div>

        <div  class="row p-3 pb-0">
            <div id="map" style="width: 100%;height: 500px;"></div>
            <input type="hidden" name="geom" id="geomID" value="{{old('geom')}}">
        </div>    
        <div class="row p-3 pb-0">
            <div class="col-md-4"><label for="division">Nama Division</label><br>
                <span class="text-danger">
                    @error('division')
                        {{ $message }}
                    @enderror
                </span></div>
            <div class="col-md-5"><input type="text" class="form-control" name="division" id="division" value="{{old('division', $app->division)}}"></div>
        </div>
        <div class="row p-3 pb-0">
            <div class="col-md-4"><label for="name_of_applicant">Nama Pemohon</label><br>
                <span class="text-danger">
                    @error('name_of_applicant')
                        {{ $message }}
                    @enderror
                </span></div>
            <div class="col-md-5"><input type="text" class="form-control" name="name_of_applicant" id="name_of_applicant" value="{{old('name_of_applicant', $app->name_of_applicant)}}"></div>
        </div>
        <div class="row p-3 pb-0">
            <div class="col-md-4"><label for="company_name">Nama Syarikat</label><br>
                <span class="text-danger">
                    @error('company_name')
                        {{ $message }}
                    @enderror
                </span></div>
            <div class="col-md-5"><input type="text" class="form-control" name="company_name" id="company_name" value="{{old('company_name', $app->company_name)}}"></div>
        </div>
        <div class="row p-3 pb-0 ">
            <div class="col-md-4"><label for="telephone_no">No Telefon</label><br>
                <span class="text-danger">
                    @error('telephone_no')
                        {{ $message }}
                    @enderror
                </span></div>
            <div class="col-md-5"><input type="number" class="form-control" name="telephone_no" id="telephone_no" value="{{old('telephone_no', $app->telephone_no)}}"></div>
        </div>
        <div class="row p-3 pb-0">
            <div class="col-md-4"><label for="address">Alamat Pemohon</label><br>
                <span class="text-danger">
                    @error('address')
                        {{ $message }}
                    @enderror
                </span></div>
                <input type="hidden" id="appID" value="{{$app->id}}">
            <div class="col-md-8">
               
                    <input type="text" class="form-control @error('address') is-invalid @enderror"
                        name="address" id="address" value="{{ old('address',$app->address) }}">
              
            </div>
        </div>
        <div class="row p-3 pb-0">
            <div class="col-md-4"><label for="parlimen">Parlimen*</label><br>
                <span class="text-danger">
                    @error('parlimen')
                        {{ $message }}
                    @enderror
                </span></div>
                @php
                $parlimen = unserialize($app->parlimen)  ;
            
                @endphp
                {{-- <div class="col-md-7">
                       
                    <input type="checkbox" name="parlimen[bukit_bintang]" {{array_key_exists('bukit_bintang', $parlimen)  ? 'checked' : ''}}  id="bukit_bintang" class=" form-check-input "><label
                        for="bukit_bintang">Bukit Bintang</label><br>
                    <input type="checkbox" name="parlimen[bandar_tun_razak]" {{array_key_exists('bandar_tun_razak', $parlimen)? 'checked' : ''}} id="bandar_tun_razak" class=" form-check-input"><label
                        for="bandar_tun_razak">Bandar Tun Razak</label><br>
                    <input type="checkbox" name="parlimen[setiawangsa]" {{array_key_exists('setiawangsa', $parlimen)  ? 'checked' : ''}} id="setiawangsa" class=" form-check-input"><label
                        for="setiawangsa">Setiawangsa</label><br>
                    <input type="checkbox" name="parlimen[wangsa_maju]" {{array_key_exists('wangsa_maju', $parlimen)  ? 'checked' : ''}} id="wangsa_maju" class="form-check-input "><label
                        for="wangsa_maju">Wangsa Maju</label><br>
                    <input type="checkbox" name="parlimen[seputeh]" {{array_key_exists('seputeh', $parlimen) ? 'checked' : ''}} id="seputeh" class=" form-check-input"><label
                        for="seputeh">Seputeh</label> <br>
                    <input type="checkbox" name="parlimen[titiwangsa]" {{array_key_exists('titiwangsa', $parlimen)  ? 'checked' : ''}} id="titiwangsa" class=" form-check-input"><label
                        for="titiwangsa">Titiwangsa</label><br>
                    <input type="checkbox" name="parlimen[batu]" {{array_key_exists('batu', $parlimen)  ? 'checked' : ''}} id="batu" class=" form-check-input"><label for="batu">Batu</label><br>
                    <input type="checkbox" name="parlimen[segambut]" {{array_key_exists('segambut', $parlimen)  ? 'checked' : ''}} id="segambut" class=" form-check-input"><label
                        for="segambut">Segambut</label><br>
                    <input type="checkbox" name="parlimen[lembah_pantai]" {{array_key_exists('lembah_pantai', $parlimen)  ? 'checked' : ''}} id="lembah_pantai" class="form-check-input "><label
                        for="lembah_pantai">Lembah Pantai</label><br>
                    <input type="checkbox" name="parlimen[cheras]" {{array_key_exists('cheras', $parlimen)  ? 'checked' : ''}} id="cheras" class="form-check-input "><label
                        for="cheras">Cheras</label><br>
                    <input type="checkbox" name="parlimen[kepong]" {{array_key_exists('kepong', $parlimen) ? 'checked' : ''}} id="kepong" class="form-check-input"><label
                        for="kepong">Kepong</label><br>
                </div> --}}


                <div class="col-md-5">

                    <input type="checkbox" name="parlimen[kuala_langat]"
                    {{array_key_exists('kuala_langat', $parlimen)  ? 'checked' : ''}}  id="02_check"
                        class=" form-check-input "><label for="02_check">Kuala Langat</label><br>

                    <input type="checkbox" name="parlimen[kuala_selangor]"
                    {{array_key_exists('kuala_selangor', $parlimen)  ? 'checked' : ''}}  id="04_check"
                        class=" form-check-input"><label for="04_check">Kuala Selangor</label><br>

                    <input type="checkbox" name="parlimen[sabak_bernam]"
                    {{array_key_exists('sabak_bernam', $parlimen)  ? 'checked' : ''}}  id="05_check"
                        class=" form-check-input"><label for="05_check">Sabak Bernam</label><br>

                    <input type="checkbox" name="parlimen[ulu_langat]"
                    {{array_key_exists('ulu_langat', $parlimen)  ? 'checked' : ''}}  id="06_check"
                        class="form-check-input "><label for="06_check">Ulu Langat</label><br>

                    <input type="checkbox" name="parlimen[ulu_selangor]"
                    {{array_key_exists('ulu_selangor', $parlimen)  ? 'checked' : ''}}  id="07_check"
                        class=" form-check-input"><label for="07_check">Ulu Selangor</label> <br>

                    <input type="checkbox" name="parlimen[petaling]"
                    {{array_key_exists('petaling', $parlimen)  ? 'checked' : ''}}  id="08_check"
                        class=" form-check-input"><label for="08_check">Petaling</label><br>

                    <input type="checkbox" name="parlimen[Gombak]"
                    {{array_key_exists('Gombak', $parlimen)  ? 'checked' : ''}}  id="09_check"
                        class=" form-check-input"><label for="09_check">Gombak</label><br>

                    <input type="checkbox" name="parlimen[Sepang]"
                    {{array_key_exists('Sepang', $parlimen)  ? 'checked' : ''}}  id="10_check"
                        class=" form-check-input"><label for="10_check">Sepang</label><br>

                    <input type="checkbox" name="parlimen[Klang]"
                    {{array_key_exists('Klang', $parlimen)  ? 'checked' : ''}}  id="01_check"
                        class="form-check-input "><label for="01_check">Klang</label><br>

                </div>

        </div>

        <div class="row p-3 pb-0">
            <div class="col-md-4"><label for="road_involved">Senarai Jalan Yang Terlibat</label><br>
                <span class="text-danger">
                    @error('road_involved')
                        {{ $message }}
                    @enderror
                </span></div>
            <div class="col-md-5"><textarea type="text" class="form-control" name="road_involved" id="road_involved" rows="7">{{old('road_involved', $app->road_involved)}}</textarea></div>
        </div>

        <div class="text-center p-3"><button class="btn btn-primary ">Update</button></div>
        </form>
       
    </div>

    <div class="text-end">
        <a href="{{route('permit.edit',$app->id)}}"> <button class="btn btn-primary">NEXT</button></a>
    </div>
</div>
</div>

@endsection



@section('script')
    <!-- third party js -->
    <script src="{{ asset('assets/libs/ladda/ladda.min.js') }}"></script>
    <!-- third party js ends -->

    <!-- demo app -->
    <script src="{{ asset('assets/js/pages/loading-btn.init.js') }}"></script>
    <!-- end demo js-->


    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css"/>
    <link rel="stylesheet" href="{{ URL::asset('map/draw/leaflet.draw.css')}}"/>
       {{-- <link rel="stylesheet" href="{{ URL::asset('assets/src/leaflet.draw.css')}}"/>  --}}




    <script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>

    {{-- <script src="{{ URL::asset('map/draw/leaflet.draw-custom.js')}}"></script> --}}
    <<script src="{{ URL::asset('assets/js/leaflet.draw.js')}}"></script>

    <script src="{{ URL::asset('map/leaflet-groupedlayercontrol/leaflet.groupedlayercontrol.js')}}"></script>

    <script>
     var center = [3.016603, 101.858382];
    $(document).ready(function(){
        var map = L.map('map').setView(center, 11);

        // Set up the OSM layer
     

        var street = L.tileLayer(
                'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 18
                }).addTo(map);
            dark = L.tileLayer('https://cartodb-basemaps-{s}.global.ssl.fastly.net/dark_all/{z}/{x}/{y}.png'),
                googleSat = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
                    maxZoom: 20,
                    subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
                });

            var dp_submitted = L.tileLayer.wms("http://121.121.232.54:7090/geoserver/cite/wms", {
                layers: 'cite:selangor_district',
                format: 'image/png',
                maxZoom: 20,
                transparent: true
            }).addTo(map);



            var baseLayers = {
                "Street": street,
                "Dark": dark,
                "Satellite": googleSat,

            };

            var overlays = {

                "Selengor Districts": dp_submitted

            };

            L.control.layers(baseLayers, overlays).addTo(map);

   

    var drawnItems = new L.FeatureGroup();
         map.addLayer(drawnItems);
         var drawControl = new L.Control.Draw({
          draw :{
              circle:false,
            marker: true,
            polygon:true,
            polyline: {
            shapeOptions: {
                color: '#f357a1',
                weight: 10
            }
            },
            rectangle:true
          }
          ,
             edit: {
                 featureGroup: drawnItems
             }
         });
         
         map.addControl(drawControl);


         map.on('draw:created', function(e) {
            var type = e.layerType;
            layer = e.layer;
            drawnItems.addLayer(layer);
            // console.log(type);
            var data = layer.toGeoJSON();
             console.log(JSON.stringify(data.geometry));
             $('#geomID').val(JSON.stringify(data.geometry));
          //  $('#layer').val(JSON.stringify(data.geometry))
             if (e.layerType = 'polyline') {
                    var coords = layer.getLatLngs();
                    var length = 0;
                    for (var i = 0; i < coords.length - 1; i++) {
                    length += coords[i].distanceTo(coords[i + 1]);
                    }
                    $("#cabel_length").val(parseInt(length))
                    // if(length<=200){
                    //     $("#type_application").val('KURANG DARI 200 METER')
                    // }else if(length>200&&length<300){
                    //     $("#type_application").val('LEBIH DARI 200 METER')
                    // }else{
                    //     $("#type_application").val('KECEMASAN')
                    // }
            }

        })

        map.on('draw:edited', function(e) {
            var layers = e.layers;
            layers.eachLayer(function(data) {
                let layer_d = data.toGeoJSON();
                let layer = JSON.stringify(layer_d.geometry);
                $('#geomID').val(JSON.stringify(layer_d.geometry));
                // console.log(layer);
  
                $('#geomID').val(layer);
                if (e.layerType = 'polyline') {
                    var coords = data.getLatLngs();
                    var length = 0;
                    for (var i = 0; i < coords.length - 1; i++) {
                    length += coords[i].distanceTo(coords[i + 1]);
                    }
                    console.log(length);
                    $("#cabel_length").val(parseInt(length))
                    // if(length<=200){
                    //     $("#type_application").val('KURANG DARI 200 METER')
                    // }else if(length>200&&length<300){
                    //     $("#type_application").val('LEBIH DARI 200 METER')
                    // }else{
                    //     $("#type_application").val('KECEMASAN')
                    // }
            }
               
            });
        });


        map.on('draw:deleted', function(e) {
            var layers = e.layers;
            layers.eachLayer(function(layer) {
                $('#geomID').val('');
            });
        });

        let appID = $('#appID').val();
        // alert(appID);
            $.ajax({
                type: "GET",
                url: `/get-application-geom/${appID}`,

                success: function(data) {
                      // console.log(JSON.parse(data));
                      var myLayer = L.geoJSON(JSON.parse(data));
                      console.log(JSON.parse(data))
                      $('#GeomID').val(JSON.parse(data));
                    addNonGroupLayers(myLayer, drawnItems);
                    map.fitBounds(myLayer.getBounds());
                },
            });

 //},2000)
 let params = $('input[name="work_type"]:checked').val();;
 changeTypeApplication(params,"old");
});

function addNonGroupLayers(sourceLayer, targetGroup) {
            if (sourceLayer instanceof L.LayerGroup) {
                sourceLayer.eachLayer(function(layer) {
                    addNonGroupLayers(layer, targetGroup);
                });
            } else {
                targetGroup.addLayer(sourceLayer);
            }
        }



        
function changeTypeApplication(params,val) {
    $('#type_application').find('option').remove().end();
    if(params === 'emergency'){
   if(val === "old"){ 
       $('#type_application').append(`<option value='{{old('type_application',$app->type_application)}}' hidden>{{old('type_application',$app->type_application)}}</option>`)
   }else{
    $('#type_application').append(` <option value='{{old('type_application','')}}' hidden>{{old('type_application','Select Jenis Permohonan')}}</option>`)
   }
       $('#type_application').append(`<option value='KURANG DARI 200 METER KECEMASAN'>KURANG DARI 200 METER KECEMASAN</option>
       <option value='LEBIH DARI 200 METER KECEMASAN'>LEBIH DARI 200 METER KECEMASAN</option>`);
    }
    if(params === 'normal'){
     if(val === "old"){ 
       $('#type_application').append(`<option value='{{old('type_application',$app->type_application)}}' hidden>{{old('type_application',$app->type_application)}}</option>`)
   }else{
    $('#type_application').append(` <option value='{{old('type_application','')}}' hidden>{{old('type_application','Select Jenis Permohonan')}}</option>`)
   }
    $('#type_application').append(`
    <option value='KURANG DARI 200 METER'  }}>KURANG DARI 200 METER</option>
    <option value='LEBIH DARI 200 METER'>LEBIH DARI 200 METER</option>`);
 }
}
    </script>
@endsection
