<link href="{{asset('frogetor/assets/plugins/dropify/css/dropify.min.css')}}" rel="stylesheet">
@extends('admin.layout.master')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Create Scholarship Request</h4>
                        <form action="{{url('admin/scholarship/store')}}" method="POST" autocomplete="off" id="regForm" enctype="multipart/form-data">
                            @csrf

                        <div class="row">
                            <div class="col-lg-6">

                                <div class="form-group row">
                                    <label for="student_name" class="col-sm-3 col-form-label text-right">Student ID</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" value="" name="student_name" id="student_name">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label text-right">Inquery ID</label>
                                    <div class="col-sm-9">

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="dob" class="col-sm-3 col-form-label text-right">Date of Birth</label>
                                    <div class="col-sm-9">

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label text-right">Gender</label>

                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label text-right">Request Grade</label>

                                </div>

                            </div>


                            <div class="col-lg-6">

                                <div class="form-group row">
                                    <label for="note" class="col-sm-3 col-form-label text-right">Note</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" value="" name="note" id="note">
                                    </div>
                                </div>



                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="submit" id="x" class="btn btn-success waves-effect waves-light" style="color: white;"><i class="mdi mdi-check-all mr-2"></i>Submit</button>
                                    <a type="button" href="{{url('admin/scholarship')}}" class="btn btn-primary waves-effect waves-light" style="margin-left: 5px;"><i class="mdi mdi-close" style="margin-right: 5px;"></i>Close</a>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div>
    @stop


    @section('scripts')

    <script>

        $(document).ready(function() {

            $("#regForm").validate({
                rules: {
                    student_name: {
                        required: true,
                        maxlength: 150
                    },
                    dob: {
                        required: true,
                    },
                    institute: {
                        required: true,
                    },
                    request_grade: {
                        required: true,
                    },
                    inquery_type: {
                        required: true,
                    },
                    parent_nic: {
                        required: true,
                        maxlength: 12,
                    },
                    parent_name: {
                        required: true,
                        maxlength: 100
                    },
                    parent_email: {
                        required: true,
                        maxlength: 100,
                        email: true,
                    },
                    parent_mobile: {
                        required: true,
                        maxlength: 10
                    },
                    relationship: {
                        required: true,
                        maxlength: 50
                    },
                    address: {
                        required: true,
                        maxlength: 150
                    }

                },
                messages: {
                    student_name: {
                        required: "Student Name is required",
                        maxlength: "Student Name cannot be more than 100 characters"
                    },
                    dob: {
                        required: "Date of Birth is required"
                    },
                    institute: {
                        required: "Institute is required",
                    },
                    request_grade: {
                        required: "Grade is required"
                    },
                    inquery_type: {
                        required: "Inquery Type is required"
                    },
                    parent_nic: {
                        required: "Parent NIC is required"
                    },
                    parent_name: {
                        required: "Parent Name is required"
                    },
                    parent_email: {
                        required: "Parent Email is required"
                    },
                    parent_mobile: {
                        required: "Parent Mobile is required"
                    },
                    relationship: {
                        required: "Relationship is required"
                    },
                    address: {
                        required: "Address is required"
                    }
                }
            });

        });

    </script>


    @stop

