@extends('layouts.vertical', ['page_title' => 'Application'])


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
                    <li class="breadcrumb-item"><a href="#">Application</a></li>
                    <li class="breadcrumb-item active">create</li>
                </ol>
            </div>
            <h4 class="page-title">Add Application</h4>
        </div>
    </div>
</div>


<div class="container col-md-12">

    <div class="card p-3 ">

        <h3 class="text-center">Applicaiton</h3>
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
            <div class="col-md-4"><label for="application_type">Panjang kabel</label><br>
                <span class="text-danger">
                    @error('application_type')
                        {{ $message }}
                    @enderror
                </span></div>
            <div class="col-md-5"><input type="text" class="form-control" name="application_type" id="application_type" value="{{old('application_type', $app->application_type)}}"></div>
        </div>
        <div class="row p-3 pb-0">
            <div class="col-md-4"><label for="digout_area">Nama Division</label><br>
                <span class="text-danger">
                    @error('digout_area')
                        {{ $message }}
                    @enderror
                </span></div>
            <div class="col-md-5"><input type="text" class="form-control" name="digout_area" id="digout_area" value="{{old('digout_area', $app->digout_area)}}"></div>
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
            <div class="col-md-8">
                @php
                $address =   explode(" --",$app->address);
              @endphp
                <div class="row">
                <div class="col-md-12">
                    <input type="text" class="form-control @error('address') is-invalid @enderror"
                        name="address" id="address" value="{{ old('address',$address[0]) }}">
                </div>
                <div class="col-md-12 pt-2">
                    <input type="text" class="form-control " name="address_2" id="address_2"
                        value="{{ old('addres_2',$address[1]) }}">
                </div>
                <div class="col-md-3 pt-2">
                    <input type="text" class="form-control " name="address_3" id="address_3"
                        value="{{ old('address_3',$address[2]) }}">
                </div>
                <div class="col-md-3 pt-2">
                    <input type="text" class="form-control " name="address_4" id="address_4"
                        value="{{ old('address_4',$address[3]) }}">
                </div>
                <div class="col-md-3 pt-2">
                    <input type="text" class="form-control " name="address_5" id="address_5"
                        value="{{ old('address_5',$address[4]) }}">
                </div>
            </div></div>
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
                <div class="col-md-7">
                       
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


</div>


@endsection