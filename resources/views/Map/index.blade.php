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
<div class="row">
<div class="col-md-12" style="padding:0px 0px 0px 100px;">

<div style="height:100px" class="col-md-4 btn btn-success">Approved <br /> 8</div>
<div style="height:100px" class=" col-md-3 btn btn-danger">Keep In View <br />12</div>
<div style="height:100px" class="col-md-4 btn btn-primary">inprocess <br /> 6</div>

</div>
</div>

    <div class="card p-3 ">

       

        <div  class="row p-3 pb-0">
            <div id="map" style="padding:0px 0px 0px 0px;width: 100%;height: 500px;"></div>
    
        </div>    
        
      
    </div>
   <div class="row">
    <div id="container_pie" class=" col-md-6">
    </div>
    <div id="container_pie1" class=" col-md-6">
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

    <script src="https://code.highcharts.com/stock/highstock.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>

    {{-- <script src="{{ URL::asset('map/draw/leaflet.draw-custom.js')}}"></script> --}}
    <<script src="{{ URL::asset('assets/js/leaflet.draw.js')}}"></script>

    <script src="{{ URL::asset('map/leaflet-groupedlayercontrol/leaflet.groupedlayercontrol.js')}}"></script>

    <script>

function addpie(){
    Highcharts.chart('container_pie', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Applications Statistics',
        align: 'left'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [{
            name: 'Approved',
            y: 76,
            sliced: true,
            selected: true
        },  {
            name: 'KIV',
            y: 12
        },  {
            name: 'inprocess',
            y: 12
        }]
    }]
});
}


function venderpie(){
    Highcharts.chart('container_pie1', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Companies Statistics',
        align: 'left'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [{
            name: 'TNB',
            y: 76,
            sliced: true,
            selected: true
        },  {
            name: 'Air Selengor',
            y: 12
        },  {
            name: 'Telco',
            y: 12
        }]
    }]
});
}



     var center = [3.016603, 101.858382];
    $(document).ready(function(){
        var map = L.map('map').setView(center, 8);
        // Set up the OSM layer
        addpie();
        venderpie()
        var street = L.tileLayer(
        'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 18
        }).addTo(map);

    dark  = L.tileLayer('https://cartodb-basemaps-{s}.global.ssl.fastly.net/dark_all/{z}/{x}/{y}.png'),
    googleSat = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{
        maxZoom: 20,
        subdomains:['mt0','mt1','mt2','mt3']
    });

        var dp_submitted = L.tileLayer.wms("http://121.121.232.54:7090/geoserver/cite/wms", {
        layers: 'cite:selangor_district',
        format: 'image/png',
        maxZoom: 20,
        transparent: true
    }).addTo(map);

    var non_surveyed_dp = L.tileLayer.wms("http://121.121.232.54:7090/geoserver/cite/wms", {
        layers: 'cite:selangor',
        format: 'image/png',
        maxZoom: 20,
        transparent: true
    }).addTo(map);

    var pano_layer = L.tileLayer.wms("http://121.121.232.54:7090/geoserver/cite/wms", {
        layers: 'cite:kl_boundary',
        format: 'image/png',
        maxZoom: 20,
        transparent: true
    }).addTo(map);


    var baseLayers = {
    "Street": street,
    "Satellite": googleSat,
    "Dark": dark,
};

var overlays = {
    "KL Boundary": pano_layer,
    "Selengor Boundary": non_surveyed_dp,
    "Selengor Districts": dp_submitted
    
};

L.control.layers(baseLayers, overlays).addTo(map);

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
                 //   map.fitBounds(myLayer.getBounds());
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
                        <td>${sourceLayer.feature.application_id}</td>
                        </tr>
                        <tr>
                        <th>Name Of Applicant</th>
                        <td>${sourceLayer.feature.properties.name_of_applicant}</td>
                        </tr>
                        <tr>
                        <th>Company Name</th>
                        <td>${sourceLayer.feature.properties.company_name}</td>
                        </tr>
                        <tr>
                        <th>Address</th>
                        <td>${sourceLayer.feature.properties.address}</td>
                        </tr>
                        <tr>
                        <th>Division</th>
                        <td>${sourceLayer.feature.properties.division}</td>
                        </tr>
                        
                        <tr>
                        <th>Telephone</th>
                        <td>${sourceLayer.feature.properties.telephone_no}</td>
                        </tr>
                        <tr>
                        <th>Road Involved</th>
                        <td>${sourceLayer.feature.properties.road_involved}</td>
                        </tr>
                        <tr>
                        <th>Cabel Length</th>
                        <td>${sourceLayer.feature.properties.cabel_length}</td>
                        </tr>
                    </table>`);
            }
        }
    </script>
@endsection
