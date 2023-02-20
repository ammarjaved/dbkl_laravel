@extends('layouts.vertical', ['page_title' => 'Application'])
@section('css')
    <!-- third party css -->
    <link href="{{ asset('assets/libs/ladda/ladda.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- third party css end -->

    <style>
        input,textarea {
            border-radius: 0px !important;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
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
            <form action="{{ route('application.store') }}" method="POST">
                @csrf
                <div class="row p-3 pb-0">
                    <div class="col-md-4"><label for="ref_num form-label">Nombor Rujukan Utiliti</label><br>
                        <span class="text-danger">
                            @error('ref_num')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-md-5">

                        <input type="text" class="form-control  @error('ref_num') is-invalid @enderror" name="ref_num"
                            id="ref_num" value="{{ old('ref_num') }}">
                    </div>
                </div>

                <div class="row p-3 pb-0">
                    <div class="col-md-4"><label for="">Jenis Permohonan</label></div>
                    <div class="col-md-5"><strong>KURANG DARI 200 METER</strong></div>
                </div>

                <div class="row p-3 pb-0">
                    <div class="col-md-4"><label for="application_type">Panjang kabel</label><br>
                        <span class="text-danger">
                            @error('application_type')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-md-3"><input type="text"
                            class="form-control @error('application_type') is-invalid @enderror" name="application_type"
                            id="application_type" value="{{ old('application_type') }}"></div>
                    <div class="col-md-1 pt-2 text-center">Meter</div>
                </div>
                <div class="row p-3 pb-0">
                    <div class="col-md-4"><label for="digout_area">Nama Division</label><br>
                        <span class="text-danger">
                            @error('digout_area')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-md-5"><input type="text"
                            class="form-control @error('digout_area') is-invalid @enderror" name="digout_area"
                            id="digout_area" value="{{ old('digout_area') }}"></div>
                </div>
                <div class="row p-3 pb-0">
                    <div class="col-md-4"><label for="name_of_applicant">Nama Pemohon</label><br>
                        <span class="text-danger">
                            @error('name_of_applicant')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-md-5"><input type="text"
                            class="form-control @error('name_of_applicant') is-invalid @enderror" name="name_of_applicant"
                            id="name_of_applicant" value="{{ old('name_of_applicant') }}"></div>
                </div>
                <div class="row p-3 pb-0">
                    <div class="col-md-4"><label for="company_name">Nama Syarikat</label><br>
                        <span class="text-danger">
                            @error('company_name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-md-5"><input type="text"
                            class="form-control @error('company_name') is-invalid @enderror" name="company_name"
                            id="company_name" value="{{ old('company_name') }}"></div>
                </div>
                <div class="row p-3 pb-0 ">
                    <div class="col-md-4"><label for="telephone_no">No Telefon</label><br>
                        <span class="text-danger">
                            @error('telephone_no')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-md-5"><input type="number"
                            class="form-control @error('telephone_no') is-invalid @enderror" name="telephone_no"
                            id="telephone_no" value="{{ old('telephone_no') }}"></div>
                </div>
                <div class="row p-3 pb-0">
                    <div class="col-md-4"><label for="address">Alamat Pemohon</label><br>
                        <span class="text-danger">
                            @error('address')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" class="form-control @error('address') is-invalid @enderror"
                                    name="address" id="address" value="{{ old('address') }}">
                            </div>
                            <div class="col-md-12 pt-2">
                                <input type="text" class="form-control " name="address_2" id="address_2"
                                    value="{{ old('addres_2') }}">
                            </div>
                            <div class="col-md-3 pt-2">
                                <input type="text" class="form-control " name="address_3" id="address_3"
                                    value="{{ old('address_3') }}">
                            </div>
                            <div class="col-md-3 pt-2">
                                <input type="text" class="form-control " name="address_4" id="address_4"
                                    value="{{ old('address_4') }}">
                            </div>
                            <div class="col-md-3 pt-2">
                                <input type="text" class="form-control " name="address_5" id="address_5"
                                    value="{{ old('address_5') }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row p-3 pb-0">
                    <div class="col-md-4"><label for="parlimen">Parlimen*</label><br>
                        <span class="text-danger">
                            @error('parlimen')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    {{-- <div class="col-md-5"><input type="text"
                            class="form-control @error('parlimen') is-invalid @enderror" name="parlimen" id="parlimen"
                            value="{{ old('parlimen') }}"></div> --}}
                    <div class="col-md-5">
                       
                        <input type="checkbox" name="parlimen[bukit_bintang]" {{old("parlimen.bukit_bintang")== 'on' ? 'checked' : ''}}  id="bukit_bintang" class=" form-check-input "><label
                            for="bukit_bintang">Bukit Bintang</label><br>
                        <input type="checkbox" name="parlimen[bandar_tun_razak]" {{old("parlimen.bandar_tun_razak")== 'on' ? 'checked' : ''}} id="bandar_tun_razak" class=" form-check-input"><label
                            for="bandar_tun_razak">Bandar Tun Razak</label><br>
                        <input type="checkbox" name="parlimen[setiawangsa]" {{old("parlimen.setiawangsa")== 'on' ? 'checked' : ''}} id="setiawangsa" class=" form-check-input"><label
                            for="setiawangsa">Setiawangsa</label><br>
                        <input type="checkbox" name="parlimen[wangsa_maju]" {{old("parlimen.wangsa_maju")== 'on' ? 'checked' : ''}} id="wangsa_maju" class="form-check-input "><label
                            for="wangsa_maju">Wangsa Maju</label><br>
                        <input type="checkbox" name="parlimen[seputeh]" {{old("parlimen.seputeh")== 'on' ? 'checked' : ''}} id="seputeh" class=" form-check-input"><label
                            for="seputeh">Seputeh</label> <br>
                        <input type="checkbox" name="parlimen[titiwangsa]" {{old("parlimen.titiwangsa")== 'on' ? 'checked' : ''}} id="titiwangsa" class=" form-check-input"><label
                            for="titiwangsa">Titiwangsa</label><br>
                        <input type="checkbox" name="parlimen[batu]" {{old("parlimen.batu")== 'on' ? 'checked' : ''}} id="batu" class=" form-check-input"><label for="batu">Batu</label><br>
                        <input type="checkbox" name="parlimen[segambut]" {{old("parlimen.segambut")== 'on' ? 'checked' : ''}} id="segambut" class=" form-check-input"><label
                            for="segambut">Segambut</label><br>
                        <input type="checkbox" name="parlimen[lembah_pantai]" {{old("parlimen.lembah_pantai")== 'on' ? 'checked' : ''}} id="lembah_pantai" class="form-check-input "><label
                            for="lembah_pantai">Lembah Pantai</label><br>
                        <input type="checkbox" name="parlimen[cheras]" {{old("parlimen.cheras")== 'on' ? 'checked' : ''}} id="cheras" class="form-check-input "><label
                            for="cheras">Cheras</label><br>
                        <input type="checkbox" name="parlimen[kepong]" {{old("parlimen.kepong")== 'on' ? 'checked' : ''}} id="kepong" class="form-check-input"><label
                            for="kepong">Kepong</label><br>
                    </div>
                </div>

                <div class="row p-3 pb-0">
                    <div class="col-md-4"><label for="road_involved">Senarai Jalan Yang Terlibat</label><br>
                        <span class="text-danger">
                            @error('road_involved')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-md-5"><textarea type="text"
                            class="form-control @error('road_involved') is-invalid @enderror" name="road_involved"
                            id="road_involved"  rows="7">{{ old('road_involved') }}</textarea></div>
                </div>

                <div class="text-center p-4"><button class=" ladda-button btn btn-success btn-sm" dir="ltr"
                        data-style="zoom-out">Submit</button></div>
            </form>
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

    <script>
        document.getElementsByTagName("input").addEventListener("change", myFunction);

        function myFunction() {
            var x = document.getElementsByTagName("input");
            x.value = x.value.toUpperCase();
        }
    </script>
@endsection
