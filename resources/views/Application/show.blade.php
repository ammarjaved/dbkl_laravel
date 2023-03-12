@extends('layouts.vertical', ['page_title' => 'Aplikasi'])


@section('css')
    <style>
        input[type='text'],
        input[type='number'],
        .disable {
            background-color: #F5F6F8 !important;

        }

        input {
            border-radius: 0px !important;
        }



        input[type='checkbox'] {
            border-radius: 0px !important;
            padding: 5px;
            margin-left: 3px
        }

        label {
            margin-left: 20px
        }

        button#profile-tab {
            color: black;
        }

        button.d-flex {
            background-color: #c9c3c3b8 !important;
            color: #000000ad !important;
            font-weight: 800 !important;
            border: none;
            padding: 15px !important;
        }

        button:focus {
            box-shadow: none !important;
        }

        i {
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
                <h4 class="page-title">Aplikasi terperinci</h4>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="container col-md-12">

            <div class="card p-3 ">

                {{-- 
                <ul class="nav nav-tabs border-0" id="myTab" role="tablist" style="background: #d2d0db">
                    <li class="nav-item p-0" role="presentation" style="width:50%">
                        <button class="nav-link active form-control rounded-0" id="application-tab" data-bs-toggle="tab" data-bs-target="#application"
                            type="button" role="tab" aria-controls="application" aria-selected="true">Permohonan Terperinci</button>
                    </li>
                    <li class="nav-item p-0" role="presentation" style="width:50%">
                        <button class="nav-link form-control rounded-0" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                            type="button" role="tab" aria-controls="profile" aria-selected="false">Permit Terperinci</button>
                    </li>



                </ul> --}}
                {{-- <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="application" role="tabpanel" aria-labelledby="application-tab"> --}}

                <button class="btn d-flex justify-content-between" type="button" data-bs-toggle="collapse"
                    data-bs-target="#application" aria-expanded="false" aria-controls="application"
                    onclick="changeIcon('application_icon')">
                    <span> Permohonan Terperinci</span> <i class="fas fa-minus" id="application_icon"></i>
                </button>
                <div class="collapse show" id="application">

                    <h3 class="text-center">Permohonan</h3>

                    <div class="row p-3 pb-0">
                        <div class="col-md-4"><label for="ref_num">Nombor Rujukan Utiliti</label></div>
                        <div class="col-md-5"><input type="text" class="form-control" value="{{ $app->ref_num }}"
                                disabled></div>
                    </div>

                    <div class="row p-3 pb-0">
                        <div class="col-md-4"><label for="application_type">Jenis Permohonan</label></div>
                        <div class="col-md-5">
                            <div class="row mb-2">
                                <div class="col-md-6"><input type="radio" name="work_type" id="emergency"
                                        value="emergency"
                                        {{ old('work_type', $app->work_type) == 'emergency' ? 'checked' : '' }}
                                        disabled><label for="emergency">Kecemasan</label></div>
                                <div class="col-md-6"><input type="radio" name="work_type" id="normal" value="normal"
                                        {{ old('work_type', $app->work_type) == 'normal' ? 'checked' : '' }} disabled><label
                                        for="normal">Biasa</label></div>
                            </div>
                            <input type="text" class="form-control" value="{{ $app->type_application }}" disabled>
                        </div>
                    </div>

                    <div class="row p-3 pb-0">
                        <div class="col-md-4"><label for="application_type">Panjang kabel</label></div>
                        <div class="col-md-5"><input type="text" class="form-control" value="{{ $app->cabel_length }}"
                                disabled></div>
                    </div>

                    <div class="row p-3 pb-0">
                        <div id="map" style="width: 100%;height: 500px;"></div>
                        <input type="hidden" id="appID" value="{{ $app->id }}">
                    </div>
                    <div class="row p-3 pb-0">
                        <div class="col-md-4"><label for="digout_area">Nama Division</label></div>
                        <div class="col-md-5"><input type="text" class="form-control" disabled
                                value="{{ $app->division }}"></div>
                    </div>
                    <div class="row p-3 pb-0">
                        <div class="col-md-4"><label for="name_of_applicant">Nama Pemohon</label></div>
                        <div class="col-md-5"><input type="text" class="form-control" disabled
                                value="{{ $app->name_of_applicant }}"></div>
                    </div>
                    <div class="row p-3 pb-0">
                        <div class="col-md-4"><label for="company_name">Nama Syarikat</label></div>
                        <div class="col-md-5"><input type="text" class="form-control" disabled
                                value="{{ $app->company_name }}"></div>
                    </div>
                    <div class="row p-3 pb-0 ">
                        <div class="col-md-4"><label for="telephone_no">No Telefon</label></div>
                        <div class="col-md-5"><input type="number" class="form-control" disabled
                                value="{{ $app->telephone_no }}"></div>
                    </div>
                    <div class="row p-3 pb-0">
                        <div class="col-md-4"><label for="address">Alamat Pemohon</label></div>
                        <div class="col-md-8">


                            <input type="text" class="form-control @error('address') is-invalid @enderror"
                                name="address" id="address" value="{{ $app->address }}" disabled>

                            {{-- <input type="text" class="form-control" disabled value="{{$app->address}}"> --}}
                        </div>
                    </div>
                    <div class="row p-3 pb-0">
                        <div class="col-md-4"><label for="parlimen">Parlimen*</label></div>
                        <div class="col-md-5">
                            @php
                                $parlimen = unserialize($app->parlimen);
                                
                            @endphp
                            {{-- <div class="col-md-7">

                                <input type="checkbox" name="parlimen[bukit_bintang]"
                                    {{ array_key_exists('bukit_bintang', $parlimen) ? 'checked' : '' }} id="bukit_bintang"
                                    class=" form-check-input "><label for=" ">Bukit
                                    Bintang</label><br>
                                <input type="checkbox" name="parlimen[bandar_tun_razak]"
                                    {{ array_key_exists('bandar_tun_razak', $parlimen) ? 'checked' : '' }}
                                    id="bandar_tun_razak" class=" form-check-input"><label for=" ">Bandar Tun
                                    Razak</label><br>
                                <input type="checkbox" name="parlimen[setiawangsa]"
                                    {{ array_key_exists('setiawangsa', $parlimen) ? 'checked' : '' }} id="setiawangsa"
                                    class=" form-check-input"><label for=" ">Setiawangsa</label><br>
                                <input type="checkbox" name="parlimen[wangsa_maju]"
                                    {{ array_key_exists('wangsa_maju', $parlimen) ? 'checked' : '' }} id="wangsa_maju"
                                    class="form-check-input "><label for=" ">Wangsa
                                    Maju</label><br>
                                <input type="checkbox" name="parlimen[seputeh]"
                                    {{ array_key_exists('seputeh', $parlimen) ? 'checked' : '' }} id="seputeh"
                                    class=" form-check-input"><label for=" ">Seputeh</label> <br>
                                <input type="checkbox" name="parlimen[titiwangsa]"
                                    {{ array_key_exists('titiwangsa', $parlimen) ? 'checked' : '' }} id="titiwangsa"
                                    class=" form-check-input"><label for=" ">Titiwangsa</label><br>
                                <input type="checkbox" name="parlimen[batu]"
                                    {{ array_key_exists('batu', $parlimen) ? 'checked' : '' }} id="batu"
                                    class=" form-check-input"><label for="batu">Batu</label><br>
                                <input type="checkbox" name="parlimen[segambut]"
                                    {{ array_key_exists('segambut', $parlimen) ? 'checked' : '' }} id="segambut"
                                    class=" form-check-input"><label for=" ">Segambut</label><br>
                                <input type="checkbox" name="parlimen[lembah_pantai]"
                                    {{ array_key_exists('lembah_pantai', $parlimen) ? 'checked' : '' }} id="lembah_pantai"
                                    class="form-check-input "><label for=" ">Lembah
                                    Pantai</label><br>
                                <input type="checkbox" name="parlimen[cheras]"
                                    {{ array_key_exists('cheras', $parlimen) ? 'checked' : '' }} id="cheras"
                                    class="form-check-input "><label for=" ">Cheras</label><br>
                                <input type="checkbox" name="parlimen[kepong]"
                                    {{ array_key_exists('kepong', $parlimen) ? 'checked' : '' }} id="kepong"
                                    class="form-check-input"><label for=" ">Kepong</label><br>
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
            
                            {{-- <input type="text" class="form-control" disabled value="{{$app->parlimen}}"></div> --}}
                        </div>

                        <div class="row p-3 pb-0">
                            <div class="col-md-4"><label for="road_involved">Senarai Jalan Yang Terlibat</label></div>
                            <div class="col-md-5">
                                <textarea type="text" class="form-control disable @error('road_involved') is-invalid @enderror"
                                    name="road_involved" id="road_involved" rows="7" disabled>{{ $app->road_involved }}</textarea>
                            </div>
                        </div>
                        {{-- <div class="  text-end">
                            <a href="{{ route('permit.show', $app->id) }}"> <button
                                    class="btn btn-primary bordered-0">NEXT</button></a>
                        </div>
 --}}

                        </div>
                    </div>

                    <button class="btn d-flex justify-content-between form-control my-3" type="button"
                        data-bs-toggle="collapse" data-bs-target="#sectionB" aria-expanded="false"
                        aria-controls="sectionB" onclick="changeIcon('section_b_B')">
                        <span> Permit Terperinci</span> <i class="fas fa-minus" id="section_b_B"></i>
                    </button>

                    <div class="collapse card px-4 show" id="sectionB">
                        @if ($permit != "")
                            
                       
                        <div class="row pb-3">
                            <button class="btn d-flex justify-content-between " type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseA" aria-expanded="false" aria-controls="collapseA"
                                id="section_a" onclick="changeIcon('section_a_icon')">
                                <span> A. Borang JKPB / P - 02</span> <i class="fas fa-minus" id="section_a_icon"></i>
                            </button>
                            <div class="collapse show" id="collapseA">
                                <div class="card card-body">
                                    <h3>KIRAAN DEPOSIT KOREKAN JALAN</h3>
                                    <div class="row mb-3">
                                        <div class="col-md-4 col-sm-12">Tajuk Kerja</div>
                                        <div class="col-md-8 col-sm-12">
                                            <textarea name="job_title" disabled class="form-control" id="job_title" cols="30" rows="7">{{ $permit->job_title }}</textarea>

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
                            <button class="btn d-flex justify-content-between" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseB" aria-expanded="false" aria-controls="collapseB"
                                onclick="changeIcon('section_b_icon')">
                                <span> BAHAGIAN B : CAJ GANTI RUGI</span> <i class="fas fa-plus" id="section_b_icon"></i>
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
                                                    <tr>
                                                        <td>{{ $loop->index + 1 }}</td>
                                                        <td>Pending</td>
                                                        <td class="text-center" id="lenght_{{ $loop->index }}">
                                                            {{ $map->length }}</td>
                                                        <td>

                                                            <span
                                                                id="kaedah_{{ $loop->index }}">{{ $permit->section_b->select }}</span>
                                                        </td>
                                                        <td id="sel_kaedah_{{ $loop->index }}" class="text-center">
                                                        </td>
                                                        <td id="kaedah_val_{{ $loop->index }}" class="text-center"></td>
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
                                                    <td>‘Horizontal Directional Drilling’(HDD), ‘Pipe Jacking’(PJ), ‘Micro
                                                        Trenching’ (MT) Dan
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
                            <button class="btn d-flex justify-content-between" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseC" aria-expanded="false" aria-controls="collapseC"
                                onclick="changeIcon('section_c_icon')">
                                <span> BAHAGIAN C: KADAR CAJ BAIK PULIH JALAN ( HORIZONTAL DIRECTIONAL DRILLING (HDD), PIPE
                                    JACKING DAN
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
                                                    <td>ACW (Asphaltic Concrete Wearing) + Tack Coat (Rs-1k) + Milling Works
                                                        + Road
                                                        Marking Works (as per specification)</td>
                                                    <td>pit</td>
                                                    <td><input type="number" class="form-control" name="lorong[key_1]"
                                                            id="section_c_1" onchange="logong('section_c',1)"
                                                            value="{{ $permit->section_c->key_1 }}"> </td>
                                                    <td><span id="section_c_val_1"
                                                            style="display:none">7200</span>7,200.00/pit </td>
                                                    <td><span id="section_c_t_1"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Stone Mastic Asphalt or Equivalent + Tack Coat (Rs-2k)+ Milling
                                                        Works + Road
                                                        Marking Works (as per specification)</td>
                                                    <td>pit </td>
                                                    <td><input type="number" class="form-control" name="lorong[key_2]"
                                                            id="section_c_2" onchange="logong('section_c',2)"
                                                            value="{{ $permit->section_c->key_2 }}"></td>
                                                    <td><span id="section_c_val_2"
                                                            style="display:none">10600</span>10,600.00/pit </td>
                                                    <td><span id="section_c_t_2"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Footpath with finishing Interlocking Concrete Paving / Clay Paver /
                                                        Granite
                                                        Tiled & Miscellaneous</td>
                                                    <td>m2</td>
                                                    <td><input type="number" class="form-control" name="lorong[key_3]"
                                                            id="section_c_3" onchange="logong('section_c',3)"
                                                            value="{{ $permit->section_c->key_3 }}"></td>
                                                    <td><span id="section_c_val_3" style="display:none">620</span>620.00 /
                                                        m2</td>
                                                    <td><span id="section_c_t_3"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>Ujian Loose Sample & Marshall Test
                                                        (Ujian bagi setiap 5 pit)</td>
                                                    <td>nos</td>
                                                    <td><input type="number" class="form-control" name="lorong[key_4]"
                                                            id="section_c_4" onchange="logong('section_c',4)"
                                                            value="{{ $permit->section_c->key_4 }}"></td>
                                                    <td><span id="section_c_val_4" style="display:none">2100</span>RM
                                                        2,100.00 /5 Pit</td>
                                                    <td><span id="section_c_t_4"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>5</td>
                                                    <td>Coring Test (Bagi Setiap Pit)</td>
                                                    <td>nos</td>
                                                    <td><input type="number" class="form-control" name="lorong[key_5]"
                                                            id="section_c_5" onchange="logong('section_c',5)"
                                                            value="{{ $permit->section_c->key_5 }}"></td>
                                                    <td><span id="section_c_val_5" style="display:none">132</span>RM
                                                        132.00 /
                                                        Pit </td>
                                                    <td><span id="section_c_t_5"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>6</td>
                                                    <td>Turfing</td>
                                                    <td>m2</td>
                                                    <td><input type="number" class="form-control" name="lorong[key_6]"
                                                            id="section_c_6" onchange="logong('section_c',6)"
                                                            value="{{ $permit->section_c->key_6 }}"></td>
                                                    <td><span id="section_c_val_6" style="display:none">30</span>30.00 /
                                                        m2</td>
                                                    <td><span id="section_c_t_6"></span></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5" class="text-end">JUMLAH KESELURUHAN BAHAGIAN C (RM)
                                                        = </td>
                                                    <td><input type="hidden" name="total_section_c">
                                                        <span id="total_section_c">{{ $permit->total_section_d }}</span>
                                                    </td>
                                                </tr>
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="row pb-3">
                            <button class="btn d-flex justify-content-between" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseD" aria-expanded="false" aria-controls="collapseD"
                                onclick="changeIcon('section_d_icon')">
                                <span> BAHAGIAN D: KADAR CAJ BAIK PULIH JALAN ( KOREKAN TERBUKA DAN MICRO
                                    TRENCHING)</span><i class="fas fa-plus" id="section_d_icon"></i>
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

                                                        ACW (Asphaltic Concrete Wearing) + Tack Coat (Rs-1k) + Milling Works
                                                        + Road Marking
                                                        Works (as per specification) </td>
                                                    <td>m</td>
                                                    <td><input type="number" class="form-control"
                                                            name="BILlorong[key_1]" id="section_d_1"
                                                            onchange="logong('section_d',1)"
                                                            value="{{ $permit->section_d->key_1 }}"> </td>
                                                    <td><span id="section_d_val_1"> 360</span>.00 /m </td>
                                                    <td><span id="section_d_t_1"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Stone Mastic Asphalt or Equivalent + Tack Coat (Rs-2k)+ Milling
                                                        Works + Road Marking
                                                        Works (as per specification)</td>
                                                    <td>m</td>
                                                    <td><input type="number" class="form-control"
                                                            name="BILlorong[key_2]" id="section_d_2"
                                                            onchange="logong('section_d',2)"
                                                            value="{{ $permit->section_d->key_2 }}"></td>
                                                    <td><span id="section_d_val_2">530</span>.00/m </td>
                                                    <td><span id="section_d_t_2"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Footpath with finishing Interlocking Concrete Paving / Clay Paver /
                                                        Granite Tiled &
                                                        Miscellaneous</td>
                                                    <td>m2</td>
                                                    <td><input type="number" class="form-control"
                                                            name="BILlorong[key_3]" id="section_d_3"
                                                            onchange="logong('section_d',3)"
                                                            value="{{ $permit->section_d->key_3 }}"></td>
                                                    <td><span id="section_d_val_3">620</span>.00 / m2</td>
                                                    <td><span id="section_d_t_3"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>Ujian Loose Sample & Marshall Test
                                                        (Ujian Bagi Setiap 1500m2 dengan kelebaran 1 lorong yang terlibat
                                                        dengan dengan
                                                        kerja pengorekan)</td>
                                                    <td>nos</td>
                                                    <td><input type="number" class="form-control"
                                                            name="BILlorong[key_4]" id="section_d_4"
                                                            onchange="logong('section_d',4)"
                                                            value="{{ $permit->section_d->key_4 }}"></td>
                                                    <td>RM <span id="section_d_val_4">2100</span>.00 /
                                                        1500m2</td>
                                                    <td><span id="section_d_t_4"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>5</td>
                                                    <td>Coring Test
                                                        (Jumlah ujian adalah berdasarkan 500m2 keluasan jalan sediada
                                                        daripada bebendul ke
                                                        bebendul - termasuk jalan yang tidak terlibat dengan kerja
                                                        pengorekan)</td>
                                                    <td>nos</td>
                                                    <td><input type="number" class="form-control"
                                                            name="BILlorong[key_5]" id="section_d_5"
                                                            onchange="logong('section_d',5)"
                                                            value="{{ $permit->section_d->key_5 }}"></td>
                                                    <td>RM <span id="section_d_val_5">132</span>.00 /
                                                        500m2</td>
                                                    <td><span id="section_d_t_5"></span></td>
                                                </tr>
                                                <tr>
                                                    <td>6</td>
                                                    <td>Turfing</td>
                                                    <td>m2</td>
                                                    <td><input type="number" class="form-control"
                                                            name="BILlorong[key_6]" id="section_d_6"
                                                            onchange="logong('section_d',6)"
                                                            value="{{ $permit->section_d->key_6 }}"></td>
                                                    <td><span id="section_d_val_6">30</span>.00 / m2</td>
                                                    <td><span id="section_d_t_6"></span></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5" class="text-end">JUMLAH KESELURUHAN BAHAGIAN D (RM)
                                                        =</td>
                                                    <td><input type="hidden" name="total_section_d"><span
                                                            id="total_section_d">{{ $permit->total_section_d }}</span>
                                                    </td>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-responsive">
                                            <thead>
                                                <th colspan="2" class="text-center">KIRAAN JUMLAH BAYARAN KERJA KOREKAN
                                                </th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th class="text-end">JUMLAH BAHAGIAN A</th>
                                                    <td class="col-md-2">5000.00 RM</td>
                                                </tr>
                                                <tr>
                                                    <th class="text-end"> JUMLAH BAHAGIAN B</th>
                                                    <td><span id="total_b"></span></td>
                                                </tr>
                                                <tr>
                                                    <th class="text-end">JUMLAH BAHAGIAN C + JUMLAH BAHAGIAN D</th>
                                                    <td><span id="sec_b_c"></span></td>
                                                </tr>
                                                <tr>
                                                    <th class="text-end">5 % KOS PERKHIDMATAN dari JUMLAH (BAHAGIAN A +
                                                        BAHAGIAN C + BAHAGIAN D</th>
                                                    <td><span id="service_cost"></span></td>
                                                </tr>
                                                <tr>
                                                    <th class="text-end">50 % DEPOSIT dari JUMLAH (BAHAGIAN A + BAHAGIAN C
                                                        + BAHAGIAN D)</th>
                                                    <td><span id="fifty_advacne"></span></td>
                                                </tr>
                                                {{-- <tr>
                                                    <th class="text-end">JUMLAH KESELURUHAN</th>
                                                    <td></td>
                                                </tr> --}}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    @if (Auth::user()->app_user_type == "vendor")
                        
                
                    <div class="text-end py-3">
                       <a href="{{route('permit.create',$app->id)}}"> <button class="btn btn-success btn-sm">Membuat Permit</button></a>
                    </div> 
                       @endif
                    <h3 class="text-center p-4">Tiada Permit Ditemui</h3>
                    @endif

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



                var drawnItems = new L.FeatureGroup();

                map.addControl(drawnItems);




                let appID = $('#appID').val();
                // alert(appID);
                $.ajax({
                    type: "GET",
                    url: `/get-application-geom/${appID}`,

                    success: function(data) {
                        // console.log(JSON.parse(data));
                        var myLayer = L.geoJSON(JSON.parse(data));
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
                    targetGroup.addLayer(sourceLayer);
                }
            }



            function kaedah(id) {
                let getkaedah = $(`#kaedah_${id}`).html()

                let kaedah = 0;
                if (getkaedah == 'BH') {
                    kaedah = 20
                } else if (getkaedah == 'KT') {
                    kaedah = 50
                } else if (getkaedah == 'HDD/PJ/MT/PT') {
                    kaedah = 30
                }
                let kaedah_l = kaedah === 20 ? 'no' : 'm'
                $(`#sel_kaedah_${id}`).html(`RM ${kaedah}.00 / ${ kaedah_l}`)
                len = parseInt($(`#lenght_${id}`).html())

                $(`#kaedah_val_${id}`).html(len * kaedah)
                $('#total_b').html(len * kaedah + ".00 RM")


            }

            var total_section_c = 0;
            var total_section_d = 0;
            var total = 0;
            var pre_total = 0;
            var num = 0;
            var pre = 0;

            function logong(section, id) {


                let val_1 = parseInt($(`#${section}_val_${id}`).html())

                if (section == "section_c") {
                    let pre_sum = pre_total * val_1
                    total_section_c = parseInt(total_section_c) - parseInt(pre_sum);
                    total = total_section_c
                    $(`input[name=total_${section}]`).val(total)
                    $(`#${section}_t_${id}`).html('')
                    $(`#total_${section}`).html(total)

                } else {
                    total_section_d = total_section_d - (pre_total * val_1);
                    total = total_section_d
                    $(`input[name=total_${section}]`).val(total)
                    $(`#${section}_t_${id}`).html('')
                    $(`#total_${section}`).html(total)
                }
                let inVal = parseInt($(`#${section}_${id}`).val())
                if ($(`#${section}_${id}`).val() != "") {
                    let sum = val_1 * inVal
                    $(`#${section}_t_${id}`).html(sum)
                    if (section == "section_d") {
                        total_section_d = total_section_d + sum
                        total = total_section_d
                    } else if (section == "section_c") {
                        total_section_c = total_section_c + sum
                        total = total_section_c
                    }

                    $(`input[name=total_${section}]`).val(total)
                    $(`#total_${section}`).html(total)

                } else {
                    $(`input[name=total_${section}]`).val(total)
                    $(`#${section}_t_${id}`).html('')
                    $(`#total_${section}`).html(total)
                }
            }


            $(document).ready(function() {
                callLogong()
                kaedah(0)

                let section_c_d = total_section_c + total_section_d
                $("#sec_b_c").html(section_c_d + ".00 RM");

                let section_a_total = 5000;

                $("#service_cost").html(Math.round((section_c_d + section_a_total) * 0.05) + ".00 RM")
                $("#fifty_advacne").html(Math.round((section_c_d + section_a_total) * 0.5) + ".00 RM")




            })

            function callLogong() {
                for (let index = 0; index < 6; index++) {
                    logong('section_c', index + 1)


                }
                for (let index = 0; index < 6; index++) {
                    logong('section_d', index + 1)


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

            function changeIcon(id) {
                if ($(`#${id}`).hasClass('fa-plus')) {
                    $(`#${id}`).removeClass('fa-plus')
                    $(`#${id}`).addClass('fa-minus')
                } else {
                    $(`#${id}`).removeClass('fa-minus')
                    $(`#${id}`).addClass('fa-plus')
                }


            }
            $("input[type='number']").click(function() {
                pre = this.value
                console.log(pre);
                if (this.value != "") {
                    pre_total = parseInt(this.value)
                } else {
                    pre_total = 0;
                }
                console.log("qweqw")
            })
        </script>
    @endsection
