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

                <div class="card-body">
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
                                <th>Status</th>
                                <th>Nama Division</th>
                                <th>Images</th>



                            </tr>
                        </thead>
                        @foreach ($applications as $application)
                            <tr>
                                <td>{{ $application->ref_num }}</td>
                                <td>{{ $application->telephone_no }}</td>
                                <td>{{ $application->company_name }}</td>
                                <td>{{ $application->status }}</td>
                                <td>{{ $application->division }}</td>
                                <td>
                                    @if ($application->before_image == '' && $application->after_image == '')
                                        <button class="btn btn-sm dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal" onclick="getID({{ $application->id }})">Upload
                                            Image</button>

                                    @else
                                    <button class="btn btn-sm dropdown-item" 
                                             onclick="EditImage({{ $application->id }})">Edit
                                            Image</button>

                                    @endif
                                </td>
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

    <div class="modal fade" id="exampleModal" tabindex="-1"  aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload Images</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('application-progress.store') }}"onsubmit="return submitFoam()" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">

                        @csrf
                        <input type="hidden" name="id" id="id">
                        {{-- <div class="row"><div class="col-md-6">
                            <label for="ref_num">Nombor Rujukan Utiliti</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text"  id="ref_num">    
                        </div></div> --}}
                        <span class="text-danger" id="er_status"></span>

                        <div class="row">
                            <div class="mb-3 row">
                                <label for="before_image">Before Image</label>
                                <div class="text-center p-2" id="before"></div>
                                <div class=" ">
                                <input type="file" class="form-control" onchange="encodeImageFileAsURL(this)" name="before_image1" id="before_image">
                            </div>
                            
                            </div>
                            <div class="row">
                                <label for="before_image">After Image</label>
                                <div class="text-center p-2" id="after"></div>
                                <div class=" ">
                                <input type="file" class="form-control" onchange="encodeImageFileAsURL(this)" name="after_image1" id="after_image">
                            </div>
                            
                            </div>
                        </div>


                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save </button>

                    </div>
                </form>
            </div>
        </div>
    </div>
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

        function getID(id) {
            // alert(ref);
            $('#id').val(id);
            // $('#ref_num').val(ref);
        }

        function submitFoam() {
            if ($('#before_image').val() == "" && $('#after_image').val() == "") {
                $('#er_status').html("must upload one image")
                return false;
            }
        }


        function EditImage(id) {
            $('#id').val(id);
            $.ajax({
                url: `application-progress/${id}`,
                mehtod: 'GET',
                dataType: 'json',
                success: function(data) {
                 
                    console.log(data.data.before_image);
                    $('#before').html('');
                    $('#after').html('')
                    $('#before').append(`<a href="${data.data.before_image}"
                            data-lightbox="roadtrip"><img src="${data.data.before_image}" height="162" width="140" alt="no image Uploaded"></a>`)
                    $('#after').append(`<a href="${data.data.after_image}"
                            data-lightbox="roadtrip"><img src="${data.data.after_image}" height="162" width="140" alt="no image uploaded"></a>`)
                    $('#exampleModal').modal('show');
                }
            })
        }

        function encodeImageFileAsURL(element) {
                var file = element.files[0];
                var reader = new FileReader();
                let chi = $(`#${element.id}`).parent().parent().children()
                console.log();
                reader.onloadend = function() {
                   // console.log('RESULT', reader.result)
                   $(`#${chi[1].id}`).html('');
                   $(`#${chi[1].id}`).append(`<a href="${reader.result}"
                            data-lightbox="roadtrip"><img src="${reader.result}" height="162" width="140" alt="no image Uploaded"></a>` );
                 
                }
                reader.readAsDataURL(file);
            }
    </script>
@endsection
