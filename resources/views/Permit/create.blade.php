@extends('layouts.vertical', ['page_title' => 'Application'])

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
                        <li class="breadcrumb-item"><a href="#">Application</a></li>
                        <li class="breadcrumb-item active">create</li>
                    </ol>
                </div>
                <h4 class="page-title">Add Application</h4>
            </div>
        </div>
        </div>
<input type="hidden" name="id" id="" value="{{$id}}">
    <div class="card p-4">

        <div class="row pb-3">
            <button  class="btn d-flex justify-content-between " type="button" data-bs-toggle="collapse" data-bs-target="#collapseA"
                aria-expanded="false" aria-controls="collapseA">
              <span>  A. Borang JKPB / P - 02</span> <i class="fas fa-plus"></i>
            </button>
            <div class="collapse show" id="collapseA">
                <div class="card card-body">
                    <h3>KIRAAN DEPOSIT KOREKAN JALAN</h3>
                    <div class="row">
                        <div class="col-md-4 col-sm-12">Tajuk Kerja</div>
                        <div class="col-md-7 col-sm-12">
                            PERMOHONAN UNTUK MENDAPATKAN KELULUSAN PERMIT BAGI MENJALANKAN KERJA-KERJA VOLTAN RENDAH 415V DI
                            NO 7, LORONG SETIA BESTARI 1, 50490 KUALA LUMPUR DI DALAM KAWASAN REZAB JALAN WILAYAH
                            PERSEKUTUAN KUALA LUMPUR.
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
                aria-expanded="false" aria-controls="collapseB">
              <span>  BAHAGIAN B : CAJ GANTI RUGI</span> <i class="fas fa-plus"></i>
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
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
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
                aria-expanded="false" aria-controls="collapseB">
             <span>   BAHAGIAN C: KADAR CAJ BAIK PULIH JALAN ( HORIZONTAL DIRECTIONAL DRILLING (HDD), PIPE JACKING DAN
                PILOT TRENCHING)</span> <i class="fas fa-plus"></i>
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
                                <td>no</td>
                                <td>7,200.00/pit </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Stone Mastic Asphalt or Equivalent + Tack Coat (Rs-2k)+ Milling Works + Road
                                    Marking Works (as per specification)</td>
                                <td>pit </td>
                                <td>no</td>
                                <td>10,600.00/pit </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Footpath with finishing Interlocking Concrete Paving / Clay Paver / Granite
                                    Tiled & Miscellaneous</td>
                                <td>m2</td>
                                <td>-</td>
                                <td>620.00 / m2</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Ujian Loose Sample & Marshall Test
                                    (Ujian bagi setiap 5 pit)</td>
                                <td>nos</td>
                                <td>-</td>
                                <td>RM 2,100.00 /5 Pit</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Coring Test (Bagi Setiap Pit)</td>
                                <td>nos</td>
                                <td>- </td>
                                <td>RM 132.00 /
                                    Pit </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Turfing</td>
                                <td>m2</td>
                                <td>-</td>
                                <td>30.00 / m2</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="5" class="text-end">JUMLAH KESELURUHAN BAHAGIAN C (RM) = </td>
                                <td></td>
                            </tr>
                        </tbody>

                    </table>
                </div>
                </div>
            </div>
        </div>



        <div class="row pb-3">
            <button class="btn d-flex justify-content-between" type="button" data-bs-toggle="collapse" data-bs-target="#collapseD"
                aria-expanded="false" aria-controls="collapseD">
             <span>   BAHAGIAN D: KADAR CAJ BAIK PULIH JALAN ( KOREKAN TERBUKA DAN MICRO TRENCHING)</span><i class="fas fa-plus"></i>
            </button>
                <div class="collapse" id="collapseD">
                    <div class="card card-body">
                        <div class="table-responsive">
                        <table class="table table-bordered ">
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
                                    <td>no</td>
                                    <td>360.00 /m </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Stone Mastic Asphalt or Equivalent + Tack Coat (Rs-2k)+ Milling Works + Road Marking
                                        Works (as per specification)</td>
                                    <td>m</td>
                                    <td>no</td>
                                    <td>530.00/m </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Footpath with finishing Interlocking Concrete Paving / Clay Paver / Granite Tiled &
                                        Miscellaneous</td>
                                    <td>m2</td>
                                    <td>-</td>
                                    <td>620.00 / m2</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Ujian Loose Sample & Marshall Test
                                        (Ujian Bagi Setiap 1500m2 dengan kelebaran 1 lorong yang terlibat dengan dengan
                                        kerja pengorekan)</td>
                                    <td>nos</td>
                                    <td>-</td>
                                    <td>RM 2,100.00 /
                                        1500m2</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Coring Test
                                        (Jumlah ujian adalah berdasarkan 500m2 keluasan jalan sediada daripada bebendul ke
                                        bebendul - termasuk jalan yang tidak terlibat dengan kerja pengorekan)</td>
                                    <td>nos</td>
                                    <td>-</td>
                                    <td>RM 132.00 /
                                        500m2</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Turfing</td>
                                    <td>m2</td>
                                    <td>-</td>
                                    <td>30.00 / m2</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="5">JUMLAH KESELURUHAN BAHAGIAN D (RM) =</td>
                                    <td></td>

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
