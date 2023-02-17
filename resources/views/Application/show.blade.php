@extends('layouts.vertical', ['page_title' => 'Application'])


@section('css')
<style>
    input[type='text'], input[type='number'] , .disable{
        background-color:#F5F6F8 !important;
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


<div class="container col-md-8">

    <div class="card p-3 ">

        <h3 class="text-center">Applicaiton</h3>

        <div class="row p-3 pb-0">
            <div class="col-md-5"><label for="ref_num">Nombor Rujukan Utiliti</label></div>
            <div class="col-md-7"><input type="text" class="form-control" value="{{$app->ref_num}}" disabled></div>
        </div>
        <div class="row p-3 pb-0">
            <div class="col-md-5"><label for="application_type">Panjang kabel</label></div>
            <div class="col-md-7"><input type="text" class="form-control"  value="{{$app->application_type}}" disabled></div>
        </div>
        <div class="row p-3 pb-0">
            <div class="col-md-5"><label for="digout_area">Nama Division</label></div>
            <div class="col-md-7"><input type="text" class="form-control" disabled value="{{$app->digout_area}}"></div>
        </div>
        <div class="row p-3 pb-0">
            <div class="col-md-5"><label for="name_of_applicant">Nama Pemohon</label></div>
            <div class="col-md-7"><input type="text" class="form-control" disabled value="{{$app->name_of_applicant}}"></div>
        </div>
        <div class="row p-3 pb-0">
            <div class="col-md-5"><label for="company_name">Nama Syarikat</label></div>
            <div class="col-md-7"><input type="text" class="form-control" disabled value="{{$app->company_name}}"></div>
        </div>
        <div class="row p-3 pb-0 ">
            <div class="col-md-5"><label for="telephone_no">No Telefon</label></div>
            <div class="col-md-7"><input type="number" class="form-control" disabled value="{{$app->telephone_no}}"></div>
        </div>
        <div class="row p-3 pb-0">
            <div class="col-md-5"><label for="address">Alamat Pemohon</label></div>
            <div class="col-md-7"><input type="text" class="form-control" disabled value="{{$app->address}}"></div>
        </div>
        <div class="row p-3 pb-0">
            <div class="col-md-5"><label for="parlimen">Parlimen*</label></div>
            <div class="col-md-7"><input type="text" class="form-control" disabled value="{{$app->parlimen}}"></div>
        </div>

        <div class="row p-3 pb-0">
            <div class="col-md-5"><label for="road_involved">Senarai Jalan Yang Terlibat</label></div>
            <div class="col-md-7"><input type="text" class="form-control disable" disabled value="{{$app->road_involved}}"></div>
        </div>

    </div>


</div>


@endsection