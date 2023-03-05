@extends('layouts.vertical', ['page_title' => 'Permit'])

@section('css')

<style>
    button.d-flex{
        background-color: #c9c3c3b8 !important;
    color: #000000ad !important;
    font-weight: 800 !important;
    border: none;
    padding: 15px !important;
}
    button:focus{
        box-shadow: none !important;
    }
    i{
        font-size: 20px
    }
    thead {
    background-color: #c9c3c340;
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
                        <li class="breadcrumb-item active">terperinci</li>
                    </ol>
                </div>
                <h4 class="page-title">Permit terperinci</h4>
            </div>
        </div>
        </div>

    <div class="card p-4">
     
        
        <div class="row pb-3">
            <button  class="btn d-flex justify-content-between " type="button" data-bs-toggle="collapse" data-bs-target="#collapseA"
                aria-expanded="false" aria-controls="collapseA" id="section_a" onclick="changeIcon('section_a_icon')">
              <span>  A. Borang JKPB / P - 02</span> <i class="fas fa-minus" id="section_a_icon"></i>
            </button>
            <div class="collapse show" id="collapseA">
                <div class="card card-body">
                    <h3>KIRAAN DEPOSIT KOREKAN JALAN</h3>
                    <div class="row mb-3">
                        <div class="col-md-4 col-sm-12">Tajuk Kerja</div>
                        <div class="col-md-8 col-sm-12">
                            <textarea name="job_title" disabled class="form-control" id="job_title" cols="30" rows="7">{{$permit->job_title}}</textarea>
                        
                        </div>
                    </div>
                    <p>BAHAGIAN A: MOBILIZATION AND DEMOBILIZATION</p>
                    {{-- <div class="row">
            <div class="col-md-4 col-sm-12">Bayaran</div>
            <div class="col-md-7 col-sm-12">5000.00</div>
            </div> --}}
            <div class="table-responsive">
                    <table class="table  table-bordered  ">
                        <thead>
                            <th>BIL</th>
                            <th>PERKARA</th>
                            <th>BAYARAN
                                (RM)</th>
                        </thead>
                        <tbody>
                            <td>1</td>
                            <td>Mobilization And Demobilization </td>
                            <td>5,000.00</td>
                        </tbody>
                    </table>

            </div>
                </div>
            </div>
        </div>


        <div class=" row pb-3">
            <button class="btn d-flex justify-content-between" type="button" data-bs-toggle="collapse" data-bs-target="#collapseB"
                aria-expanded="false" aria-controls="collapseB" onclick="changeIcon('section_b_icon')">
              <span>  BAHAGIAN B : CAJ GANTI RUGI</span> <i class="fas fa-plus" id="section_b_icon"></i>
            </button>
            <div class="collapse" id="collapseB">
                <div class="card card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered ">
                        <thead>
                            <th>BIL</th>
                            <th>NAMA JALAN</th>
                            <th>PANJANG (METER)</th>
                            <th>KAEDAH KERJA *</th>
                            <th>KADAR
                                (RM / METER)</th>
                            <th>BAYARAN
                                (RM)</th>
                        </thead>
                        <tbody>
                            @foreach ($data['geom'] as $map)
                                    @php
                                    $key = "key_".$map->id;
                                    @endphp
                            <tr>
                                <td>{{$loop->index + 1}}</td>
                                <td>Pending</td>
                                <td class="text-center" id="lenght_{{$loop->index}}">{{$map->length}}</td>
                                <td>

                                   <span>{{$permit->section_b->$key}}</span>
                                </td>
                                <td id="sel_kaedah_{{$loop->index}}" class="text-center"> </td>
                                <td id="kaedah_val_{{$loop->index}}" class="text-center"></td>
                            </tr>
                            
                            @endforeach
                        </tbody>
                    </table>
                </div>
                    <div class="table-responsive">
                    <table class="table table-bordered ">
                        <thead>
                            <th>*KOD</th>
                            <th>KAEDAH KERJA</th>
                            <th>CAJ GANTI RUGI </th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>KT</td>
                                <td>Korekan Terbuka</td>
                                <td>RM 50.00 / m </td>
                            </tr>
                            <tr>
                                <td>HDD/PJ/MT/PT</td>
                                <td>‘Horizontal Directional Drilling’(HDD), ‘Pipe Jacking’(PJ), ‘Micro Trenching’ (MT) Dan
                                    ‘Pilot Trenching’(PT)</td>
                                <td>RM 30.00 / m </td>
                            </tr>
                            <tr>
                                <td>BH</td>
                                <td>Penyiasatan tanah </td>
                                <td>RM 20.00 / no</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
        <div class="row pb-3">
            <button class="btn d-flex justify-content-between" type="button" data-bs-toggle="collapse" data-bs-target="#collapseC"
                aria-expanded="false" aria-controls="collapseC" onclick="changeIcon('section_c_icon')">
             <span>   BAHAGIAN C: KADAR CAJ BAIK PULIH JALAN ( HORIZONTAL DIRECTIONAL DRILLING (HDD), PIPE JACKING DAN
                PILOT TRENCHING)</span> <i class="fas fa-plus" id="section_c_icon"></i>
            </button>
            <div class="collapse" id="collapseC">
                <div class="card card-body">

                    <div class="table-responsive">
                    <table class="table table-bordered ">

                        <thead>
                            <th>BIL</th>
                            <th>DESCRIPTION</th>
                            <th>KUANTITI</th>
                            <th>BIL LORONG</th>
                            <th>KADAR
                                (RM)</th>
                            <th>BAYARAN
                                (RM)</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>ACW (Asphaltic Concrete Wearing) + Tack Coat (Rs-1k) + Milling Works + Road
                                    Marking Works (as per specification)</td>
                                <td>pit</td>
                                <td><input type="number" class="form-control"  name="lorong[key_1]" id="section_c_1" onchange="logong('section_c',1)" value="{{$permit->section_c->key_1}}"> </td>
                                <td><span id="section_c_val_1" style="display:none">7200</span>7,200.00/pit </td>
                                <td><span id="section_c_t_1"></span></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Stone Mastic Asphalt or Equivalent + Tack Coat (Rs-2k)+ Milling Works + Road
                                    Marking Works (as per specification)</td>
                                <td>pit </td>
                                <td><input type="number" class="form-control"  name="lorong[key_2]" id="section_c_2" onchange="logong('section_c',2)" value="{{$permit->section_c->key_2}}"></td>
                                <td><span id="section_c_val_2" style="display:none">10600</span>10,600.00/pit </td>
                                <td><span id="section_c_t_2"></span></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Footpath with finishing Interlocking Concrete Paving / Clay Paver / Granite
                                    Tiled & Miscellaneous</td>
                                <td>m2</td>
                                <td><input type="number" class="form-control"  name="lorong[key_3]" id="section_c_3" onchange="logong('section_c',3)" value="{{$permit->section_c->key_3}}"></td>
                                <td><span id="section_c_val_3" style="display:none">620</span>620.00 / m2</td>
                                <td><span id="section_c_t_3"></span></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Ujian Loose Sample & Marshall Test
                                    (Ujian bagi setiap 5 pit)</td>
                                <td>nos</td>
                                <td><input type="number" class="form-control"  name="lorong[key_4]" id="section_c_4" onchange="logong('section_c',4)" value="{{$permit->section_c->key_4}}"></td>
                                <td><span id="section_c_val_4" style="display:none">2100</span>RM 2,100.00 /5 Pit</td>
                                <td><span id="section_c_t_4"></span></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Coring Test (Bagi Setiap Pit)</td>
                                <td>nos</td>
                                <td><input type="number" class="form-control"  name="lorong[key_5]" id="section_c_5" onchange="logong('section_c',5)" value="{{$permit->section_c->key_5}}"></td>
                                <td><span id="section_c_val_5" style="display:none">132</span>RM 132.00 /
                                    Pit </td>
                                <td><span id="section_c_t_5"></span></td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Turfing</td>
                                <td>m2</td>
                                <td><input type="number" class="form-control"  name="lorong[key_6]" id="section_c_6" onchange="logong('section_c',6)" value="{{$permit->section_c->key_6}}"></td>
                                <td><span id="section_c_val_6" style="display:none">30</span>30.00 / m2</td>
                                <td><span id="section_c_t_6"></span></td>
                            </tr>
                            <tr>
                                <td colspan="5" class="text-end">JUMLAH KESELURUHAN BAHAGIAN C (RM) = </td>
                                <td><input type="hidden" name="total_section_c"  >
                                    <span id="total_section_c">{{$permit->total_section_d}}</span></td>
                            </tr>
                        </tbody>

                    </table>
                </div>
                </div>
            </div>
        </div>



        <div class="row pb-3">
            <button class="btn d-flex justify-content-between" type="button" data-bs-toggle="collapse" data-bs-target="#collapseD"
                aria-expanded="false" aria-controls="collapseD" onclick="changeIcon('section_d_icon')">
             <span>   BAHAGIAN D: KADAR CAJ BAIK PULIH JALAN ( KOREKAN TERBUKA DAN MICRO TRENCHING)</span><i class="fas fa-plus" id="section_d_icon"></i>
            </button>
                <div class="collapse" id="collapseD">
                    <div class="card card-body">
                        <div class="">
                        <table class="table table-bordered table-responsive">
                            <thead>
                                <th>BIL</th>
                                <th>DESCRIPTION</th>
                                <th>KUANTITI /
                                    PANJANG </th>
                                <th>BIL LORONG</th>
                                <th>KADAR
                                    (RM)</th>
                                <th>BAYARAN
                                    (RM)</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>DESCRIPTION

                                        ACW (Asphaltic Concrete Wearing) + Tack Coat (Rs-1k) + Milling Works + Road Marking
                                        Works (as per specification) </td>
                                    <td>m</td>
                                    <td><input type="number" class="form-control"  name="BILlorong[key_1]" id="section_d_1" onchange="logong('section_d',1)" value="{{$permit->section_d->key_1}}"> </td>
                                    <td><span id="section_d_val_1"> 360</span>.00 /m </td>
                                    <td><span id="section_d_t_1"></span></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Stone Mastic Asphalt or Equivalent + Tack Coat (Rs-2k)+ Milling Works + Road Marking
                                        Works (as per specification)</td>
                                    <td>m</td>
                                    <td><input type="number" class="form-control" name="BILlorong[key_2]" id="section_d_2" onchange="logong('section_d',2)" value="{{$permit->section_d->key_2}}"></td>
                                    <td><span id="section_d_val_2">530</span>.00/m </td>
                                    <td><span id="section_d_t_2"></span></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Footpath with finishing Interlocking Concrete Paving / Clay Paver / Granite Tiled &
                                        Miscellaneous</td>
                                    <td>m2</td>
                                    <td><input type="number" class="form-control" name="BILlorong[key_3]" id="section_d_3" onchange="logong('section_d',3)" value="{{$permit->section_d->key_3}}"></td>
                                    <td><span id="section_d_val_3">620</span>.00 / m2</td>
                                    <td><span id="section_d_t_3"></span></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Ujian Loose Sample & Marshall Test
                                        (Ujian Bagi Setiap 1500m2 dengan kelebaran 1 lorong yang terlibat dengan dengan
                                        kerja pengorekan)</td>
                                    <td>nos</td>
                                    <td><input type="number" class="form-control" name="BILlorong[key_4]" id="section_d_4" onchange="logong('section_d',4)" value="{{$permit->section_d->key_4}}"></td>
                                    <td>RM <span id="section_d_val_4">2100</span>.00 /
                                        1500m2</td>
                                    <td><span id="section_d_t_4"></span></td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Coring Test
                                        (Jumlah ujian adalah berdasarkan 500m2 keluasan jalan sediada daripada bebendul ke
                                        bebendul - termasuk jalan yang tidak terlibat dengan kerja pengorekan)</td>
                                    <td>nos</td>
                                    <td><input type="number" class="form-control" name="BILlorong[key_5]" id="section_d_5" onchange="logong('section_d',5)" value="{{$permit->section_d->key_5}}"></td>
                                    <td>RM <span id="section_d_val_5">132</span>.00 /
                                        500m2</td>
                                    <td><span id="section_d_t_5"></span></td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Turfing</td>
                                    <td>m2</td>
                                    <td><input type="number" class="form-control" name="BILlorong[key_6]" id="section_d_6" onchange="logong('section_d',6)" value="{{$permit->section_d->key_6}}"></td>
                                    <td><span id="section_d_val_6">30</span>.00 / m2</td>
                                    <td><span id="section_d_t_6"></span></td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-end">JUMLAH KESELURUHAN BAHAGIAN D (RM) =</td>
                                    <td><input type="hidden" name="total_section_d"  ><span id="total_section_d">{{$permit->total_section_d}}</span></td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                        <div class="table-responsive"> 
                        <table class="table table-bordered table-responsive">
                            <thead>
                                <th colspan="2" class="text-center">KIRAAN JUMLAH BAYARAN KERJA KOREKAN</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <th class="text-end">JUMLAH BAHAGIAN A</th>
                                    <td class="col-md-1"></td>
                                </tr>
                                <tr>
                                    <th class="text-end"> JUMLAH BAHAGIAN B</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th class="text-end">JUMLAH BAHAGIAN C + JUMLAH BAHAGIAN D</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th class="text-end">5 % KOS PERKHIDMATAN dari JUMLAH (BAHAGIAN A + BAHAGIAN C + BAHAGIAN D</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th class="text-end">50 % DEPOSIT dari JUMLAH (BAHAGIAN A + BAHAGIAN C + BAHAGIAN D)</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th class="text-end">JUMLAH KESELURUHAN</th>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div></div>
                </div>
        </div>
  
   
    </div>
@endsection


@section('script')

<script>
    

    function kaedah(id){
        let getkaedah = $(`#kaedah_${id}`).val()
        let kaedah = 0 ;
        if(getkaedah == 'BH'){
            kaedah = 20
        }else if(getkaedah == 'KT'){
            kaedah = 50
        }else if(getkaedah == 'HDD/PJ/MT/PT'){
            kaedah = 30
        }
        let kaedah_l = kaedah  === 20 ? 'no' : 'm'
        $(`#sel_kaedah_${id}`).html(`RM ${kaedah}.00 / ${ kaedah_l}`)
        len = parseInt($(`#lenght_${id}`).html())

        $(`#kaedah_val_${id}`).html(len*kaedah)


    }

    var total_section_c = 0;
    var total_section_d = 0;
    var total = 0;
    var num = 0 ;
    var pre = 0;
    // function logong(element , val){
    //     num = val
    //     if(element.value ){
    //     let tVal =  parseInt(element.value)*num;
    //     console.log($(`input[name="${element.name}"]`).parent().siblings(":last").html(tVal));
    //     console.log(tVal);
    //     total =  tVal + parseInt( total);
    //     console.log(total)
    //     $('#billorongTotal').html(total);
    //     $('input[name="total_section_d"]').val(total)
    //     }
      
       
    // }


    function logong(section ,id){
        let val_1 =parseInt($(`#${section}_val_${id}`).html())
        let inVal = parseInt($(`#${section}_${id}`).val())
        if($(`#section_d_${id}`).val() != ""){
            let sum = val_1*inVal
            $(`#${section}_t_${id}`).html(sum)
            if(section == "section_d"){
              total_section_d = total_section_d+sum
              total = total_section_d
            }else if(section == "section_c"){
                total_section_c = total_section_c+sum
                total = total_section_c
            }
        
            $(`input[name=total_${section}]`).val(total )
            $(`#total_${section}`).html(total)
            
        }
    }

  
    $(document).ready(function(){
       callLogong()
    })

    function callLogong(){
        for (let index = 0; index <6; index++) {
            logong('section_c',index+1)

            
        }  
        for (let index = 0; index <6; index++) {
            logong('section_d',index+1)
            
            
        }  
      }

        
    // $("input[type='number']").click(function(){
    //     pre = this.value
    //     console.log(pre);
    //     if(this.value){
            
    //         let tVal =   $(`input[name="${this.name}"]`).parent().siblings(":last").html()
    //         total  = total - parseInt(tVal)
           
    //     }
    //    console.log("qweqw")
    // })

    function changeIcon(id){
        if( $(`#${id}`).hasClass('fa-plus')){
            $(`#${id}`).removeClass('fa-plus')
            $(`#${id}`).addClass('fa-minus')
        }else{
            $(`#${id}`).removeClass('fa-minus')
            $(`#${id}`).addClass('fa-plus')
        }
        
       
    }
</script>


@endsection