@extends('layouts.vertical', ['page_title' => 'Application'])

@section('css')
    <link href="{{ asset('assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Aero</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Application</a></li>
                        <li class="breadcrumb-item active">index</li>
                    </ol>
                </div>
                <h4 class="page-title">Applications</h4>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-12">
            <div class="card ">
                <div class="col-8 text-center p-3">
                    @if (Session::has('message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-secondary') }}">{{ Session::get('message') }}
                        </p>
                    @endif
                </div>

                <div class="card-body" >
                    <h4 class="header-title">Applications</h4>
                    {{-- <p class="text-muted font-13 mb-4">
                    DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction
                    function:
                    <code>$().DataTable();</code>.
                </p> --}}

                    <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Nombor Rujukan Utiliti</th>
                                <th>No Telefon</th>
                                <th>Nama Syarikat</th>
                                <th>Nama Pemohon</th>
                                <th>Nama Division</th>
                               
                                <th>Status</th>
                               
                            </tr>
                        </thead>
                        @foreach ($applications as $application)
                            <tr>
                                <td>{{ $application->ref_num }}</td>
                                <td>{{ $application->telephone_no }}</td>
                                <td>{{ $application->company_name }}</td>
                                <td>{{ $application->name_of_applicant }}</td>
                                <td>{{ $application->division }}</td>
                                <td><button class="btn btn-sm dropdown-item" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal" onclick="getID({{ $application->id }})"
                                  >{{ $application->status }}</button></td>
                            </tr>
                        @endforeach
                        <tbody>

                        </tbody>
                    </table>

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row-->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="update-status" onsubmit="return submitFoam()" method="POST">
                <div class="modal-body">
                    
                        @csrf
                        <input type="hidden" name="id" id="id">
                        <span class="text-danger" id="er_status"></span>
                        <select name="status" id="status_s" class="form-select">
                            <option value="" hidden>Select status</option>
                            <option value="kiv">kiv</option>
                            <option value="approved">Approved</option>
                        </select>
                    
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save </button>

                </div>
            </form>
            </div></div></div>




    
@endsection

@section('script')
    <!-- third party js -->
    <script src="{{ asset('assets/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/pdfmake/pdfmake.min.js') }}"></script>
    <!-- third party js ends -->

    <!-- demo app -->
    <script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>
    <!-- end demo js-->



    <script>
        var val = "";
        $(document).ready(function() {
            $(".loader").hide();
        })

        function conDestory($id) {
            val = $id;
        }

        function getID(id){
            $('#id').val(id);
        }

        function submitFoam(){
            if($('#status_S').val() == null){
                $('#er_status').html("Select status")
                return false;
            }
        }
    </script>
@endsection
