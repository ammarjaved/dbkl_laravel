@extends('layouts.vertical', ['page_title' => 'Aplikasi'])


@section('css')
<style>
   
   .leaflet-control-attribution a{
    display: none
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
                    <li class="breadcrumb-item"><a href="/application">Aplikasi</a></li>
                    <li class="breadcrumb-item active">butiran</li>
                </ol>
            </div>
            <h4 class="page-title">Lihat Aplikasi Butiran</h4>
        </div>
    </div>
</div>
<div class="row">

<div class="container col-md-12">
<div class="row">


<div  class="col-md-4"><div style="height:80px" class="card p-2 bg-success text-center text-white rounded-0"> Approved <br /> 8</div></div>
<div  class=" col-md-4 "><div style="height:80px" class="card p-2 bg-danger text-center text-white rounded-0">Keep In View <br />12</div></div>
<div class="col-md-4  "><div style="height:80px" class="card p-2 bg-primary text-center text-white rounded-0">In Process <br /> 6</div></div>

 
</div>

    <div class="card p-3 ">

       

        <div  class="row p-3 pb-0">
            <div id="map" style="padding:0px 0px 0px 0px;width: 100%;height: 600px;">  </div>
    
        </div>    
        
      
    </div>
   <div class="row">
    <div id="container_pie" class=" col-md-6">
    </div>
    <div id="container_pie1" class=" col-md-6">
    </div>
    <div id="container3" class=" col-md-12">
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
            y: {{$data->approved}},
            sliced: true,
            selected: true
        },  {
            name: 'KIV',
            y: {{$data->kiv}}
        },  {
            name: 'inprocess',
            y: {{$data->inprocess}}
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
            y: {{$data->tnb}},
            color:'green',
            sliced: true,
            selected: true
        },  {
            name: 'Air Selengor',
            color:'red',
            y: {{$data->air}}
        },  {
            name: 'Telco',
            color:'yellow',
            y: {{$data->telco}}
        }]
    }]
});
}

function barChart(){
    Highcharts.chart('container3', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Monthly Average Companies  Applications'
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'no of applications per month'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'TNB',
        data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4,
            194.1, 95.6, 54.4]

    }, {
        name: 'TELCO',
        data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5,
            106.6, 92.3]

    }, {
        name: 'AIR Selengor',
        data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3,
            51.2]

    }]
});
}



     var center = [3.016603, 101.858382];
    $(document).ready(function(){
        var map = L.map('map').setView(center, 8);
        // Set up the OSM layer
        console.log({{$data->approved}});
        addpie();
        venderpie();
        barChart();
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

//          function polystyle(feature) { return {
//         fillColor: 'blue',
//         weight: 4,
//         opacity: 1,
//         color: 'green',  //Outline color
//         fillOpacity: 0.7
//     };
// }

$('.leaflet-control-attribution').append(`<img src="{{URL::asset('assets/images/legend.PNG')}}">`)

      
        // alert(appID);
            $.ajax({
                type: "GET",
                url: `/get-application-geom`,

                success: function(data) {
                      // console.log(JSON.parse(data));
                      var myLayer = L.geoJSON(JSON.parse(data),{
                        onEachFeature: function (feature, layer) {
                    if(feature.properties.status=='inprocess'){
                        layer.setStyle({
                        fillColor: 'blue',
                        weight: 4,
                        opacity: 1,
                        color: 'blue',  //Outline color
                        fillOpacity: 0.7
                    })
                }else if(feature.properties.status=='kiv'){
                    layer.setStyle({
                    fillColor: 'red',
                    weight: 4,
                    opacity: 1,
                    color: 'red',  //Outline color
                    fillOpacity: 0.7
                })

                }else{
                    layer.setStyle({
                    fillColor: 'green',
                    weight: 4,
                    opacity: 1,
                    color: 'green',  //Outline color
                    fillOpacity: 0.7
                })
                }


                            
                            layer.bindPopup(` <table class="table table-striped table-bordered table-condensed custom-table-css" >
                    <tr>
                        <th>Id</th>
                        <td>${feature.application_id}</td>
                        </tr>
                        <tr>
                        <th>Name Of Applicant</th>
                        <td>${feature.properties.name_of_applicant}</td>
                        </tr>
                        <tr>
                        <th>Company Name</th>
                        <td>${feature.properties.company_name}</td>
                        </tr>
                        <tr>
                        <th>Address</th>
                        <td>${feature.properties.address}</td>
                        </tr>
                        <tr>
                        <th>Division</th>
                        <td>${feature.properties.division}</td>
                        </tr>
                        
                        <tr>
                        <th>Telephone</th>
                        <td>${feature.properties.telephone_no}</td>
                        </tr>
                        <tr>
                        <th>Road Involved</th>
                        <td>${feature.properties.road_involved}</td>
                        </tr>
                        <tr>
                        <th>Cabel Length</th>
                        <td>${feature.properties.cabel_length}</td>
                        </tr>

                        <tr>
                        <th>Status</th>
                        <td>${feature.properties.status}</td>
                        </tr>

                        <tr>
                        <th>Before Image</th>
                        <td>
                            <a href="${feature.properties.before_image}"
                            data-lightbox="roadtrip"><img src="${feature.properties.before_image}" width="50px" height="50px" alt="no image Uploaded"/></a></td>
                        </tr>
                        <tr>
                        <th>After Image</th>
                        <td><a href="${feature.properties.after_image}"
                            data-lightbox="roadtrip"><img src="${feature.properties.after_image}" width="50px" height="50px" alt="no image  uploaded"/></a></td>
                        </tr>
                    </table>`);
                        }
                      }).addTo(map);
                    //   console.log(JSON.parse(data))
                    //   $('#GeomID').val(JSON.parse(data));
                    // addNonGroupLayers(myLayer, drawnItems);
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
                if(sourceLayer.feature.properties.status=='inprocess'){
                    sourceLayer.setStyle({
                        fillColor: 'blue',
                        weight: 4,
                        opacity: 1,
                        color: 'blue',  //Outline color
                        fillOpacity: 0.7
                    })
                }else if(sourceLayer.feature.properties.status=='kiv'){
                    sourceLayer.setStyle({
                    fillColor: 'red',
                    weight: 4,
                    opacity: 1,
                    color: 'red',  //Outline color
                    fillOpacity: 0.7
                })

                }else{
                    sourceLayer.setStyle({
                    fillColor: 'green',
                    weight: 4,
                    opacity: 1,
                    color: 'green',  //Outline color
                    fillOpacity: 0.7
                })
                }
                
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

                        <tr>
                        <th>Status</th>
                        <td>${sourceLayer.feature.properties.status}</td>
                        </tr>

                        <tr>
                        <th>Before Image</th>
                        <td>
                            <a href="${sourceLayer.feature.properties.before_image}"
                            data-lightbox="roadtrip"><img src="${sourceLayer.feature.properties.before_image}" width="50px" height="50px"/></a></td>
                        </tr>
                        <tr>
                        <th>After Image</th>
                        <td><a href="${sourceLayer.feature.properties.after_image}"
                            data-lightbox="roadtrip"><img src="${sourceLayer.feature.properties.after_image}" width="50px" height="50px"/></a></td>
                        </tr>
                    </table>`);
            }
        }
    </script>
@endsection
