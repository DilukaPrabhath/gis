<link href="{{asset('frogetor/assets/plugins/dropify/css/dropify.min.css')}}" rel="stylesheet">
@extends('admin.layout.master')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <input type="hidden" name="old_email" id="mbna" value="{{ $value->email }}"/>
                        <input type="hidden" name="old_name" id="mbna" value="{{ $value->institute_name }}"/>
                        <input type="hidden" name="old_phone" id="mbna" value="{{ $value->contact_number }}"/>
                        <h4 class="mt-0 header-title">Update Institute</h4>

                        <form action="{{url('admin/institutes/update')}}/{{$value->id}}" method="POST" autocomplete="off" id="regForm" enctype="multipart/form-data">
                            @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label for="institute_name" class="col-sm-2 col-form-label text-right">Institute Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="{{$value->institute_name}}" id="institute_name" name="institute_name">
                                        @error('institute_name')
                                        <div class="alert" style="color: #f93b7a;padding-left: 0px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-right">Is Pre School ?</label>
                                    <div class="col-md-9">
                                        <div class="form-check-inline my-1">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio9" name="pre_or_sch" class="custom-control-input" value="1"  {{ ($value->pre_or_sch=="1")? "checked" : "" }}>
                                                <label class="custom-control-label" for="customRadio9">Yes</label>
                                            </div>
                                        </div>
                                        <div class="form-check-inline my-1">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio10" name="pre_or_sch" class="custom-control-input" value="2"  {{ ($value->pre_or_sch=="2")? "checked" : "" }}>
                                                <label class="custom-control-label" for="customRadio10">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label text-right">Email</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="email" value="{{$value->email}}" name="email" id="email">
                                        @error('email')
                                        <div class="alert" style="color: #f93b7a;padding-left: 0px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="contact_number" class="col-sm-2 col-form-label text-right">Phone</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="phone" value="{{$value->contact_number}}" name="contact_number" id="contact_number">
                                        @error('contact_number')
                                        <div class="alert" style="color: #f93b7a;padding-left: 0px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address_line_1" class="col-sm-2 col-form-label text-right">Address Line 1</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="{{$value->address_line_1}}" name="address_line_1" id="address_line_1">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address_line_2" class="col-sm-2 col-form-label text-right">Address Line 2</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="{{$value->address_line_2}}" name="address_line_2" id="address_line_2">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="city" class="col-sm-2 col-form-label text-right">City</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="{{$value->city}}" name="city" id="city">
                                        @error('city')
                                        <div class="alert" style="color: #f93b7a;padding-left: 0px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-right">Status</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="status">
                                            <option value="">Select</option>
                                            <option value="1" {{$value->status=='1'?'selected':''}}>Active</option>
                                            <option value="2" {{$value->status=='2'?'selected':''}}>Inactive</option>
                                        </select>
                                        @error('status')
                                        <div class="alert" style="color: #f93b7a;padding-left: 0px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                </div>
                                <div class="col-lg-6">
                                    {{-- <table class="table table-bordered mb-0 table-centered">
                                        <thead>
                                        <tr>
                                            <th>Grade</th>
                                            <th>Syllabus</th>
                                            <th>Class Fee</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>

                                        </tr>
                                        </tbody>
                                    </table><!--end /table--> --}}
                                </div>
                                <div>
                                    <div class="col-lg-6">

                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-6">

                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-success waves-effect waves-light" style="color: white;"><i class="mdi mdi-check-all mr-2"></i>Submit</button>
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

                    },
                    email:{
                        email: true,
                        required: true,
                        maxlength: 100,
                        // eml:function(element){return $("#email").val()!= ''},

                    },
                    contact_number: {
                        required: true,
                        minlength: 10,
                        maxlength: 10,
                        number: true,

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
                        required: "Institute Name is required",
                        remote:"Institute Name already exist",
                        maxlength: "Institute Name cannot be more than 150 characters"
                    },
                    email: {
                        required: "Email name is required",
                        email: "Email must be a valid email address",
                        remote:"Email already exist",
                        maxlength: "Email cannot be more than 100 characters",
                        //eml:"Alredy exist"
                    },
                    contact_number: {
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
