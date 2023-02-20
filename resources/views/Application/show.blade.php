@extends('layouts.vertical', ['page_title' => 'Application'])


@section('css')
<style>
    input[type='text'], input[type='number'] , .disable{
        background-color:#F5F6F8 !important;

    }
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
                    <li class="breadcrumb-item"><a href="#">Application</a></li>
                    <li class="breadcrumb-item active">detail</li>
                </ol>
            </div>
            <h4 class="page-title">Add Application</h4>
        </div>
    </div>
</div>


<div class="container col-md-12">

    <div class="card p-3 ">

        <h3 class="text-center">Applicaiton</h3>

        <div class="row p-3 pb-0">
            <div class="col-md-4"><label for="ref_num">Nombor Rujukan Utiliti</label></div>
            <div class="col-md-5"><input type="text" class="form-control" value="{{$app->ref_num}}" disabled></div>
        </div>
        <div class="row p-3 pb-0">
            <div class="col-md-4"><label for="application_type">Panjang kabel</label></div>
            <div class="col-md-5"><input type="text" class="form-control"  value="{{$app->application_type}}" disabled></div>
        </div>
        <div class="row p-3 pb-0">
            <div class="col-md-4"><label for="digout_area">Nama Division</label></div>
            <div class="col-md-5"><input type="text" class="form-control" disabled value="{{$app->digout_area}}"></div>
        </div>
        <div class="row p-3 pb-0">
            <div class="col-md-4"><label for="name_of_applicant">Nama Pemohon</label></div>
            <div class="col-md-5"><input type="text" class="form-control" disabled value="{{$app->name_of_applicant}}"></div>
        </div>
        <div class="row p-3 pb-0">
            <div class="col-md-4"><label for="company_name">Nama Syarikat</label></div>
            <div class="col-md-5"><input type="text" class="form-control" disabled value="{{$app->company_name}}"></div>
        </div>
        <div class="row p-3 pb-0 ">
            <div class="col-md-4"><label for="telephone_no">No Telefon</label></div>
            <div class="col-md-5"><input type="number" class="form-control" disabled value="{{$app->telephone_no}}"></div>
        </div>
        <div class="row p-3 pb-0">
            <div class="col-md-4"><label for="address">Alamat Pemohon</label></div>
            <div class="col-md-8">
                <div class="row">
                    @php
                      $address =   explode(" --",$app->address);
                    @endphp
                    <div class="col-md-12">
                        <input type="text" class="form-control @error('address') is-invalid @enderror"
                            name="address" id="address" value="{{ $address[0]}}" disabled>
                    </div>
                    <div class="col-md-12 pt-2">
                        <input type="text" class="form-control " name="address_2" id="address_2" disabled
                            value="{{ $address[1] }}">
                    </div>
                    <div class="col-md-3 pt-2">
                        <input type="text" class="form-control " name="address_3" id="address_3" disabled
                            value="{{ $address[2] }}">
                    </div>
                    <div class="col-md-3 pt-2">
                        <input type="text" class="form-control " name="address_4" id="address_4" disabled
                            value="{{$address[3] }}">
                    </div>
                    <div class="col-md-3 pt-2">
                        <input type="text" class="form-control " name="address_5" id="address_5" disabled
                            value="{{ $address[4]}}">
                    </div>
                </div>
                {{-- <input type="text" class="form-control" disabled value="{{$app->address}}"> --}}
            </div>
        </div>
        <div class="row p-3 pb-0">
            <div class="col-md-4"><label for="parlimen">Parlimen*</label></div>
            <div class="col-md-5">
                @php
                $parlimen = unserialize($app->parlimen)  ;
            
                @endphp
                <div class="col-md-7">
                       
                    <input type="checkbox" name="parlimen[bukit_bintang]" {{array_key_exists('bukit_bintang', $parlimen)  ? 'checked' : ''}}  id="bukit_bintang" class=" form-check-input "><label
                        for=" ">Bukit Bintang</label><br>
                    <input type="checkbox" name="parlimen[bandar_tun_razak]" {{array_key_exists('bandar_tun_razak', $parlimen)? 'checked' : ''}} id="bandar_tun_razak" class=" form-check-input"><label
                        for=" ">Bandar Tun Razak</label><br>
                    <input type="checkbox" name="parlimen[setiawangsa]" {{array_key_exists('setiawangsa', $parlimen)  ? 'checked' : ''}} id="setiawangsa" class=" form-check-input"><label
                        for=" ">Setiawangsa</label><br>
                    <input type="checkbox" name="parlimen[wangsa_maju]" {{array_key_exists('wangsa_maju', $parlimen)  ? 'checked' : ''}} id="wangsa_maju" class="form-check-input "><label
                        for=" ">Wangsa Maju</label><br>
                    <input type="checkbox" name="parlimen[seputeh]" {{array_key_exists('seputeh', $parlimen) ? 'checked' : ''}} id="seputeh" class=" form-check-input"><label
                        for=" ">Seputeh</label> <br>
                    <input type="checkbox" name="parlimen[titiwangsa]" {{array_key_exists('titiwangsa', $parlimen)  ? 'checked' : ''}} id="titiwangsa" class=" form-check-input"><label
                        for=" ">Titiwangsa</label><br>
                    <input type="checkbox" name="parlimen[batu]" {{array_key_exists('batu', $parlimen)  ? 'checked' : ''}} id="batu" class=" form-check-input"><label for="batu">Batu</label><br>
                    <input type="checkbox" name="parlimen[segambut]" {{array_key_exists('segambut', $parlimen)  ? 'checked' : ''}} id="segambut" class=" form-check-input"><label
                        for=" ">Segambut</label><br>
                    <input type="checkbox" name="parlimen[lembah_pantai]" {{array_key_exists('lembah_pantai', $parlimen)  ? 'checked' : ''}} id="lembah_pantai" class="form-check-input "><label
                        for=" ">Lembah Pantai</label><br>
                    <input type="checkbox" name="parlimen[cheras]" {{array_key_exists('cheras', $parlimen)  ? 'checked' : ''}} id="cheras" class="form-check-input "><label
                        for=" ">Cheras</label><br>
                    <input type="checkbox" name="parlimen[kepong]" {{array_key_exists('kepong', $parlimen) ? 'checked' : ''}} id="kepong" class="form-check-input"><label
                        for=" ">Kepong</label><br>
                </div>
                {{-- <input type="text" class="form-control" disabled value="{{$app->parlimen}}"></div> --}}
        </div>

        <div class="row p-3 pb-0">
            <div class="col-md-4"><label for="road_involved">Senarai Jalan Yang Terlibat</label></div>
            <div class="col-md-5"> <textarea type="text"
                class="form-control disable @error('road_involved') is-invalid @enderror" name="road_involved"
                id="road_involved"  rows="7" disabled>{{ $app->road_involved }}</textarea></div>
        </div>

    </div>


</div>


@endsection

@section('script')
    <script>
        let name =document.querySelectorAll('input[type="checkbox"]');
        for (let index = 0; index < name.length; index++) {
           name[index].setAttribute("disabled", "disabled")
            
        }
        console.log(name);
    </script>
@endsection