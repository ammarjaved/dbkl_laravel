@extends('layouts.vertical', ['page_title' => 'Application'])


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


<div class="container col-md-8">

    <div class="card p-3 ">

        <h3 class="text-center">Applicaiton</h3>
        <form action="{{ route('application.update', $app->id) }}" method="POST">
            @method('PATCH')
            @csrf
        <div class="row p-3 pb-0">
            <div class="col-md-5"><label for="ref_num">Nombor Rujukan Utiliti</label><br>
                <span class="text-danger">
                    @error('ref_num')
                        {{ $message }}
                    @enderror
                </span></div>
            <div class="col-md-7"><input type="text" class="form-control" name="ref_num" id="ref_num" value="{{old('ref_num', $app->ref_num)}}"></div>
        </div>
        <div class="row p-3 pb-0">
            <div class="col-md-5"><label for="application_type">Panjang kabel</label><br>
                <span class="text-danger">
                    @error('application_type')
                        {{ $message }}
                    @enderror
                </span></div>
            <div class="col-md-7"><input type="text" class="form-control" name="application_type" id="application_type" value="{{old('application_type', $app->application_type)}}"></div>
        </div>
        <div class="row p-3 pb-0">
            <div class="col-md-5"><label for="digout_area">Nama Division</label><br>
                <span class="text-danger">
                    @error('digout_area')
                        {{ $message }}
                    @enderror
                </span></div>
            <div class="col-md-7"><input type="text" class="form-control" name="digout_area" id="digout_area" value="{{old('digout_area', $app->digout_area)}}"></div>
        </div>
        <div class="row p-3 pb-0">
            <div class="col-md-5"><label for="name_of_applicant">Nama Pemohon</label><br>
                <span class="text-danger">
                    @error('name_of_applicant')
                        {{ $message }}
                    @enderror
                </span></div>
            <div class="col-md-7"><input type="text" class="form-control" name="name_of_applicant" id="name_of_applicant" value="{{old('name_of_applicant', $app->name_of_applicant)}}"></div>
        </div>
        <div class="row p-3 pb-0">
            <div class="col-md-5"><label for="company_name">Nama Syarikat</label><br>
                <span class="text-danger">
                    @error('company_name')
                        {{ $message }}
                    @enderror
                </span></div>
            <div class="col-md-7"><input type="text" class="form-control" name="company_name" id="company_name" value="{{old('company_name', $app->company_name)}}"></div>
        </div>
        <div class="row p-3 pb-0 ">
            <div class="col-md-5"><label for="telephone_no">No Telefon</label><br>
                <span class="text-danger">
                    @error('telephone_no')
                        {{ $message }}
                    @enderror
                </span></div>
            <div class="col-md-7"><input type="number" class="form-control" name="telephone_no" id="telephone_no" value="{{old('telephone_no', $app->telephone_no)}}"></div>
        </div>
        <div class="row p-3 pb-0">
            <div class="col-md-5"><label for="address">Alamat Pemohon</label><br>
                <span class="text-danger">
                    @error('address')
                        {{ $message }}
                    @enderror
                </span></div>
            <div class="col-md-7"><input type="text" class="form-control" name="address" id="address" value="{{old('address', $app->address)}}"></div>
        </div>
        <div class="row p-3 pb-0">
            <div class="col-md-5"><label for="parlimen">Parlimen*</label><br>
                <span class="text-danger">
                    @error('parlimen')
                        {{ $message }}
                    @enderror
                </span></div>
            <div class="col-md-7"><input type="text" class="form-control" name="parlimen" id="parlimen" value="{{old('parlimen', $app->parlimen)}}"></div>
        </div>

        <div class="row p-3 pb-0">
            <div class="col-md-5"><label for="road_involved">Senarai Jalan Yang Terlibat</label><br>
                <span class="text-danger">
                    @error('road_involved')
                        {{ $message }}
                    @enderror
                </span></div>
            <div class="col-md-7"><input type="text" class="form-control" name="road_involved" id="road_involved" value="{{old('road_involved', $app->road_involved)}}"></div>
        </div>

        <div class="text-center p-3"><button class="btn btn-primary ">Update</button></div>
        </form>
    </div>


</div>


@endsection