@extends('layouts.vertical', ['page_title' => 'Aplikasi'])
@section('css')
    <!-- third party css -->
    <link href="{{ asset('assets/libs/ladda/ladda.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- third party css end -->

    <style>
        input,
        textarea {
            border-radius: 0px !important;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }

        input[type='checkbox'] {
            border-radius: 0px !important;
            padding: 5px;
            margin-left: 3px
        }

        label {
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
                        <li class="breadcrumb-item"><a href="#">Aplikasi</a></li>
                        <li class="breadcrumb-item active">Buat</li>
                    </ol>
                </div>
                <h4 class="page-title">Buat Aplikasi</h4>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="container col-md-12">

            <div class="card p-3 ">

                <h3 class="text-center">Permohonan</h3>
                <form action="{{ route('application.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf


                    <div class="row p-3 pb-0">
                        <div class="col-md-4"><label for="ref_num">Refrence number</label><br>
                            <span class="text-danger">
                                @error('ref_num')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-5"><input type="text"
                                class="form-control @error('ref_num') is-invalid @enderror" name="ref_num" id="ref_num"
                                value="{{ old('ref_num') }}"></div>

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
                                <div class="col-md-6"><input type="radio" name="work_type" id="normal" value="normal"
                                        {{ old('work_type') == 'normal' ? 'checked' : '' }} checked
                                        onclick="changeTypeApplication('normal')"><label for="normal"
                                        onclick="changeTypeApplication('normal')">Biasa</label></div>
                                <div class="col-md-6"><input type="radio" name="work_type" id="emergency"
                                        value="emergency" {{ old('work_type') == 'emergency' ? 'checked' : '' }}
                                        onclick="changeTypeApplication('emergency')"><label for="emergency"
                                        onclick="changeTypeApplication('emergency')">Kecemasan</label></div>
                            </div>

                            <select name="type_application" id="type_application"
                                class="form-select @error('type_application') is-invalid @enderror">

                            </select>
                        </div>
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
                                id="cabel_length" value="{{ old('cabel_length') }}"></div>
                        <div class="col-md-1 pt-2 text-center">Meter</div>
                    </div>


                    <div class="row p-3 pb-0">
                        <span class="text-danger">
                            @error('geom')
                                {{ $message }}
                            @enderror
                        </span>
                        <div id="map" style="width: 100%;height: 500px;"></div>
                        <input type="hidden" name="geom" id="geomID" value="{{ old('geom') }}">
                    </div>

                    <div class="row p-3 pb-0">
                        <div class="col-md-4"><label for="division">Nama Division</label><br>
                            <span class="text-danger">
                                @error('division')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-5"><input type="text"
                                class="form-control @error('division') is-invalid @enderror" name="division" id="division"
                                value="{{ $user->division }}"></div>
                    </div>


                    <div class="row p-3 pb-0">
                        <div class="col-md-4"><label for="name_of_applicant">Nama Pemohon</label><br>
                            <span class="text-danger">
                                @error('name_of_applicant')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-5"><input type="text"
                                class="form-control @error('name_of_applicant') is-invalid @enderror"
                                name="name_of_applicant" id="name_of_applicant" value="{{ $user->name }}"></div>
                    </div>
                    <div class="row p-3 pb-0">
                        <div class="col-md-4"><label for="company_name">Nama Syarikat</label><br>
                            <span class="text-danger">
                                @error('company_name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-5">
                            @if ($user->app_user_type == 'vendor')
                                <input type="text" class="form-control @error('company_name') is-invalid @enderror"
                                    name="company_name" id="company_name" value="{{ $user->vendor_user_type }}">
                            @else
                                <input type="text" class="form-control @error('company_name') is-invalid @enderror"
                                    name="company_name" id="company_name" value="{{ $user->dbkl_user_type }}">
                            @endif
                        </div>
                    </div>
                    <div class="row p-3 pb-0 ">
                        <div class="col-md-4"><label for="telephone_no">No Telefon</label><br>
                            <span class="text-danger">
                                @error('telephone_no')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-5"><input type="text"
                                class="form-control @error('telephone_no') is-invalid @enderror" name="telephone_no"
                                id="telephone_no" value="{{ $user->phone }}"></div>
                    </div>
                    <div class="row p-3 pb-0">
                        <div class="col-md-4"><label for="address">Alamat Pemohon</label><br>
                            <span class="text-danger">
                                @error('address')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" class="form-control @error('address') is-invalid @enderror"
                                        name="address" id="address" value="{{ $user->address }}">
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="row p-3 pb-0">
                        <div class="col-md-4"><label for="parlimen">Parlimen*</label><br>
                            <span class="text-danger">
                                @error('parlimen')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        {{-- <div class="col-md-5">

                            <input type="checkbox" name="parlimen[bukit_bintang]"
                                {{ old('parlimen.bukit_bintang') == 'on' ? 'checked' : '' }} id="bukit_bintang"
                                class=" form-check-input "><label for="bukit_bintang">Bukit Bintang</label><br>
                            <input type="checkbox" name="parlimen[bandar_tun_razak]"
                                {{ old('parlimen.bandar_tun_razak') == 'on' ? 'checked' : '' }} id="bandar_tun_razak"
                                class=" form-check-input"><label for="bandar_tun_razak">Bandar Tun Razak</label><br>
                            <input type="checkbox" name="parlimen[setiawangsa]"
                                {{ old('parlimen.setiawangsa') == 'on' ? 'checked' : '' }} id="setiawangsa"
                                class=" form-check-input"><label for="setiawangsa">Setiawangsa</label><br>
                            <input type="checkbox" name="parlimen[wangsa_maju]"
                                {{ old('parlimen.wangsa_maju') == 'on' ? 'checked' : '' }} id="wangsa_maju"
                                class="form-check-input "><label for="wangsa_maju">Wangsa Maju</label><br>
                            <input type="checkbox" name="parlimen[seputeh]"
                                {{ old('parlimen.seputeh') == 'on' ? 'checked' : '' }} id="seputeh"
                                class=" form-check-input"><label for="seputeh">Seputeh</label> <br>
                            <input type="checkbox" name="parlimen[titiwangsa]"
                                {{ old('parlimen.titiwangsa') == 'on' ? 'checked' : '' }} id="titiwangsa"
                                class=" form-check-input"><label for="titiwangsa">Titiwangsa</label><br>
                            <input type="checkbox" name="parlimen[batu]"
                                {{ old('parlimen.batu') == 'on' ? 'checked' : '' }} id="batu"
                                class=" form-check-input"><label for="batu">Batu</label><br>
                            <input type="checkbox" name="parlimen[segambut]"
                                {{ old('parlimen.segambut') == 'on' ? 'checked' : '' }} id="segambut"
                                class=" form-check-input"><label for="segambut">Segambut</label><br>
                            <input type="checkbox" name="parlimen[lembah_pantai]"
                                {{ old('parlimen.lembah_pantai') == 'on' ? 'checked' : '' }} id="lembah_pantai"
                                class="form-check-input "><label for="lembah_pantai">Lembah Pantai</label><br>
                            <input type="checkbox" name="parlimen[cheras]"
                                {{ old('parlimen.cheras') == 'on' ? 'checked' : '' }} id="cheras"
                                class="form-check-input "><label for="cheras">Cheras</label><br>
                            <input type="checkbox" name="parlimen[kepong]"
                                {{ old('parlimen.kepong') == 'on' ? 'checked' : '' }} id="kepong"
                                class="form-check-input"><label for="kepong">Kepong</label><br>
                        </div> --}}


                        <div class="col-md-5">

                            <input type="checkbox" name="parlimen[kuala_langat]"
                                {{ old('parlimen.kuala_langat') == 'on' ? 'checked' : '' }} id="02_check"
                                class=" form-check-input "><label for="02_check">Kuala Langat</label><br>

                            <input type="checkbox" name="parlimen[kuala_selangor]"
                                {{ old('parlimen.kuala_selangor') == 'on' ? 'checked' : '' }} id="04_check"
                                class=" form-check-input"><label for="04_check">Kuala Selangor</label><br>

                            <input type="checkbox" name="parlimen[sabak_bernam]"
                                {{ old('parlimen.sabak_bernam') == 'on' ? 'checked' : '' }} id="05_check"
                                class=" form-check-input"><label for="05_check">Sabak Bernam</label><br>

                            <input type="checkbox" name="parlimen[ulu_langat]"
                                {{ old('parlimen.ulu_langat') == 'on' ? 'checked' : '' }} id="06_check"
                                class="form-check-input "><label for="06_check">Ulu Langat</label><br>

                            <input type="checkbox" name="parlimen[ulu_selangor]"
                                {{ old('parlimen.ulu_selangor') == 'on' ? 'checked' : '' }} id="07_check"
                                class=" form-check-input"><label for="07_check">Ulu Selangor</label> <br>

                            <input type="checkbox" name="parlimen[petaling]"
                                {{ old('parlimen.petaling') == 'on' ? 'checked' : '' }} id="08_check"
                                class=" form-check-input"><label for="08_check">Petaling</label><br>

                            <input type="checkbox" name="parlimen[Gombak]"
                                {{ old('parlimen.Gombak') == 'on' ? 'checked' : '' }} id="09_check"
                                class=" form-check-input"><label for="09_check">Gombak</label><br>

                            <input type="checkbox" name="parlimen[Sepang]"
                                {{ old('parlimen.Sepang') == 'on' ? 'checked' : '' }} id="10_check"
                                class=" form-check-input"><label for="10_check">Sepang</label><br>

                            <input type="checkbox" name="parlimen[Klang]"
                                {{ old('parlimen.Klang') == 'on' ? 'checked' : '' }} id="01_check"
                                class="form-check-input "><label for="01_check">Klang</label><br>

                        </div>
                    </div>

                    <div class="row p-3 pb-0">
                        <div class="col-md-4"><label for="road_involved">Senarai Jalan Yang Terlibat</label><br>
                            <span class="text-danger">
                                @error('road_involved')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-5">
                            <textarea type="text" class="form-control @error('road_involved') is-invalid @enderror" name="road_involved"
                                id="road_involved" rows="7">{{ old('road_involved') }}</textarea>
                        </div>
                    </div>

                    <div class="text-center p-4"><button class=" ladda-button btn btn-success " dir="ltr"
                            data-style="zoom-out">serahkan</button></div>
                </form>
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


    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" />
    <link rel="stylesheet" href="{{ URL::asset('map/draw/leaflet.draw.css') }}" />
    {{-- <link rel="stylesheet" href="{{ URL::asset('assets/src/leaflet.draw.css')}}"/>  --}}




    <script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>

    {{-- <script src="{{ URL::asset('map/draw/leaflet.draw-custom.js')}}"></script> --}}
    <<script src="{{ URL::asset('assets/js/leaflet.draw.js') }}"></script>

    <script src="{{ URL::asset('map/leaflet-groupedlayercontrol/leaflet.groupedlayercontrol.js') }}"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDBid44NzY6_Olyxu10cpexi_bO0F5bMI&libraries=places">
    </script>


    <script>
        var center = [3.016603, 101.858382];
        $(document).ready(function() {
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


            var GooglePlacesSearchBox = L.Control.extend({
                onAdd: function() {
                    var element = document.createElement("input");
                    element.id = "searchBox";
                    return element;
                }
            });
            (new GooglePlacesSearchBox).addTo(map);
            var input = document.getElementById("searchBox");
            var searchBox = new google.maps.places.SearchBox(input);

            searchBox.addListener('places_changed', function() {
                var places = searchBox.getPlaces();

                if (places.length == 0) {
                    return;
                }

                var group = L.featureGroup();

                places.forEach(function(place) {

                    // Create a marker for each place.
                    var marker = L.marker([
                        place.geometry.location.lat(),
                        place.geometry.location.lng()
                    ]);
                    group.addLayer(marker);
                });

                //group.addTo(map);
                map.fitBounds(group.getBounds());

            });


            var drawnItems = new L.FeatureGroup();
            map.addLayer(drawnItems);
            var drawControl = new L.Control.Draw({
                draw: {
                    circle: false,
                    marker: true,
                    polygon: true,
                    polyline: {
                        shapeOptions: {
                            color: '#f357a1',
                            weight: 10
                        }
                    },
                    rectangle: true
                },
                edit: {
                    featureGroup: drawnItems
                }
            });

            map.addControl(drawControl);

            // var mapData = [];
            var lineLenght = '';
            // var arr = [];

            map.on('draw:created', function(e) {
                var type = e.layerType;
                layer = e.layer;
                drawnItems.addLayer(layer);
                // console.log(type);
                var data = layer.toGeoJSON();
                //  console.log(JSON.stringify(data.geometry));


                if (e.layerType = 'polyline') {
                    var coords = layer.getLatLngs();
                    var length = 0;
                    for (var i = 0; i < coords.length - 1; i++) {
                        length += coords[i].distanceTo(coords[i + 1]);
                    }
                    mapLenght = parseInt(length)
                    $("#cabel_length").val(mapLenght)

                }
                // arr[0] = JSON.stringify(data.geometry)
                // arr[1] = parseInt(length)
                // mapData.push(arr);
                // arr = [];
                // console.log(mapData)
                $('#geomID').val(JSON.stringify(data.geometry));
                getDistrict(JSON.stringify(data.geometry));

            })

            map.on('draw:edited', function(e) {
                var layers = e.layers;
                layers.eachLayer(function(data) {
                    let layer_d = data.toGeoJSON();
                    let layer = JSON.stringify(layer_d.geometry);
                    // console.log(layer);

                    $('#geomID').val(layer);

                });
            });


            map.on('draw:deleted', function(e) {
                var layers = e.layers;
                layers.eachLayer(function(layer) {
                    $('#geomID').val('');
                });
                for (let index = 0; index < 11; index++) {
                if(index <= 9){
                    $(`#0${index}_check`).prop('checked', false);
                }else{
                    $(`#${index}_check`).prop('checked', false);
                }
               
            }
            });

            let params = $('input[name="work_type"]:checked').val();
           
            changeTypeApplication(params);
        });




        function getDistrict(geom) {

            for (let index = 0; index < 11; index++) {
                if(index <= 9){
                    $(`#0${index}_check`).prop('checked', false);
                }else{
                    $(`#${index}_check`).prop('checked', false);
                }
               
            }
            $.ajax({
                url: `/get-district-geom/${geom}`,
                type: 'GET',
                success: function(res) {
                    data = res.data;
                    for (let index = 0; index < data.length; index++) {

                     
                        $(`#${data[index].kod_daerah}_check`).prop('checked', true);
                       

                    }
                }
            })
        }

        function changeTypeApplication(params) {
            $('#type_application').find('option').remove().end();
            if (params === 'emergency') {

                $('#type_application').append(`
       <option value='{{ old('type_application', '') }}' hidden>{{ old('type_application', 'Select Jenis Permohonan') }}</option>
       <option value='KURANG DARI 200 METER KECEMASAN'>KURANG DARI 200 METER KECEMASAN</option>
       <option value='LEBIH DARI 200 METER KECEMASAN'>LEBIH DARI 200 METER KECEMASAN</option>`);
            }
            if (params === 'normal') {

                $('#type_application').append(`
    <option value="{{ old('type_application', '') }}" hidden>{{ old('type_application', 'Select Jenis Permohonan') }}</option>
    <option value='KURANG DARI 200 METER'  }}>KURANG DARI 200 METER</option>
    <option value='LEBIH DARI 200 METER'>LEBIH DARI 200 METER</option>`);
            }
        }
    </script>
@endsection
