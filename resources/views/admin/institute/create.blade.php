<link href="{{asset('frogetor/assets/plugins/dropify/css/dropify.min.css')}}" rel="stylesheet">
@extends('admin.layout.master')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Create School</h4>

                        <form action="{{url('admin/institutes/store')}}" method="POST" autocomplete="off" id="regForm" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label text-right">School Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="" id="name" name="name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-right">Is Nursary School ?</label>
                                    <div class="col-md-9">
                                        <div class="form-check-inline my-1">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio9" checked="" name="pre_or_sch" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio9">Yes</label>
                                            </div>
                                        </div>
                                        <div class="form-check-inline my-1">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio10" name="pre_or_sch" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio10">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label text-right">Email</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="email" value="" id="email" name="email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone" class="col-sm-2 col-form-label text-right">Telephone</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="tel" value="" id="phone" name="phone">
                                    </div>
                                </div>


                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group row">
                                        <label for="address_line_1" class="col-sm-2 col-form-label text-right">Address Line 1</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" value="" name="address_line_1" id="address_line_1">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="address_line_2" class="col-sm-2 col-form-label text-right">Address Line 2</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" value="" name="address_line_2" id="address_line_2">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="city" class="col-sm-2 col-form-label text-right">City</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" value="" id="city" name="city">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label text-right">Status</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="status" name="status">
                                                <option value="">Select</option>
                                                <option value="1" selected>Active</option>
                                                <option value="2">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-6">

                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="submit" id="x" class="btn btn-success waves-effect waves-light" style="color: white;"><i class="mdi mdi-check-all mr-2"></i>Submit</button>
                                    <a type="button" href="{{url('admin/institutes')}}" class="btn btn-primary waves-effect waves-light" style="margin-left: 5px;"><i class="mdi mdi-close" style="margin-right: 5px;"></i>Close</a>
                                </div>
                            </div>

                        </form>
                        </div>
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
                    name: {
                        required: true,
                        maxlength: 150,
                        remote:'/validate-name',
                    },
                    email:{
                        email: true,
                        required: true,
                        maxlength: 100,
                        remote:'/validate-email',
                    },
                    phone: {
                        required: true,
                        minlength: 10,
                        maxlength: 10,
                        number: true,
                        remote:'/validate-phone',
                    },
                    address_line_1: {
                        required: true,
                    },
                    status: {
                        required: true,
                    },
                    city: {
                        required: true,
                    }

                },
                messages: {
                    name: {
                        required: "School Name is required",
                        remote:"School Name already exist",
                        maxlength: "School Name cannot be more than 150 characters"
                    },
                    email: {
                        required: "Email name is required",
                        email: "Email must be a valid email address",
                        remote:"Email already exist",
                        maxlength: "Email cannot be more than 100 characters"
                    },
                    phone: {
                        required: "Contact number is required",
                        minlength: "Contact number must be of 10 digits",
                        maxlength: "Contact number must be of 10 digits",
                        remote:"Contact already exist"
                    },
                    address_line_1: {
                        required: "Address Line 1 is required"
                    },
                    status: {
                        required: "Status is required"
                    },
                    city: {
                        required: "City is required"
                    }
                }
            });

        });


    </script>


    @stop
