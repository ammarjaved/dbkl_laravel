@extends('layouts.vertical', ['page_title' => 'Application'])


@section('css')
<style>
   .left-side-menu{
    display: none;
   }
   .content-page{
    margin-left: 0px !important
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
                    <li class="breadcrumb-item"><a href="#">Application</a></li>
                    <li class="breadcrumb-item active">detail</li>
                </ol>
            </div>
            <h4 class="page-title">View Application Details</h4>
        </div>
    </div>
</div>
<div class="row">

<div class="container col-md-12">

    <div class="card p-3 ">

       

        <div  class="row p-3 pb-0">
            <div id="map" style="width: 100%;height: 500px;"></div>
    
        </div>    
        
      
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
        L.tileLayer(
        'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 18
        }).addTo(map);


//setTimeout(function(){
   

    var drawnItems = new L.FeatureGroup();
         
         map.addControl(drawnItems  );

         function polystyle(feature) { return {
        fillColor: 'blue',
        weight: 4,
        opacity: 1,
        color: 'green',  //Outline color
        fillOpacity: 0.7
    };
}

      
        // alert(appID);
            $.ajax({
                type: "GET",
                url: `/get-application-geom`,

                success: function(data) {
                      // console.log(JSON.parse(data));
                      var myLayer = L.geoJSON(JSON.parse(data),{style:polystyle});
                    //   console.log(JSON.parse(data))
                      $('#GeomID').val(JSON.parse(data));
                    addNonGroupLayers(myLayer, drawnItems);
                    map.fitBounds(myLayer.getBounds());
                },
            });

 //},2000)
});

function addNonGroupLayers(sourceLayer, targetGroup) {
            if (sourceLayer instanceof L.LayerGroup) {
                sourceLayer.eachLayer(function(layer) {
                    addNonGroupLayers(layer, targetGroup);
                });
            } else {
                console.log();
                targetGroup.addLayer(sourceLayer).bindPopup(` <table class="table table-striped table-bordered table-condensed custom-table-css" >
                    <tr>
                        <th>Id</th>
                        <td>${sourceLayer.feature.id}</td>
                        </tr>
                    </table>`);
            }
        }
    </script>
@endsection
