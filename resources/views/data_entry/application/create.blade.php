<link href="{{asset('frogetor/assets/plugins/dropify/css/dropify.min.css')}}" rel="stylesheet">
@extends('data_entry.layout.master')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Create Application</h4>


                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label text-right">Inquery Number</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="" id="example-text-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label text-right">Student Full Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="" id="example-text-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label text-right">Date of Birth</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="" id="example-text-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-right">Gender</label>
                                    <div class="col-md-10">
                                        <div class="form-check-inline my-1">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio5" checked="" name="customRadio3" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio5">Male</label>
                                            </div>
                                        </div>
                                        <div class="form-check-inline my-1">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio6" name="customRadio3" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio6">Female</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label text-right">Address</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" rows="2" id="message"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-email-input" class="col-sm-2 col-form-label text-right">Parent Email</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="email" value="" id="example-email-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-email-input" class="col-sm-2 col-form-label text-right">Father name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="" id="example-email-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-tel-input" class="col-sm-2 col-form-label text-right">Father Mobile</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="tel" value="" id="example-tel-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-password-input" class="col-sm-2 col-form-label text-right">Father NIC</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="" id="example-password-input">
                                    </div>
                                </div>


                            </div>


                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label for="example-email-input" class="col-sm-2 col-form-label text-right">Mother name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="" id="example-email-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-tel-input" class="col-sm-2 col-form-label text-right">Mother Mobile</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="tel" value="" id="example-tel-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-password-input" class="col-sm-2 col-form-label text-right">Mother NIC</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="" id="example-password-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-email-input" class="col-sm-2 col-form-label text-right">Gurdian name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="" id="example-email-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-tel-input" class="col-sm-2 col-form-label text-right">Gurdian Mobile</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="tel" value="" id="example-tel-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-password-input" class="col-sm-2 col-form-label text-right">Gurdian NIC</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="" id="example-password-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-right">Grade</label>
                                    <div class="col-sm-10">
                                        <select class="form-control">
                                            <option value="">Select Grade</option>
                                            <option value="0">Primary</option>
                                            <option value="1">Grade 1</option>
                                            <option value="2">Grade 2</option>
                                            <option value="3">Grade 3</option>
                                            <option value="4">Grade 4</option>
                                            <option value="5">Grade 5</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-right">Institute</label>
                                    <div class="col-sm-10">
                                        <select class="form-control">
                                            <option value="">Select</option>
                                            <option value="1">Institute 1</option>
                                            <option value="2">Institute 2</option>
                                            <option value="3">Institute 3</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <a type="button" class="btn btn-success waves-effect waves-light" style="color: white;"><i class="mdi mdi-check-all mr-2"></i>Submit</a>
                                    <a type="button" href="{{url('data_entry/applications')}}" class="btn btn-primary waves-effect waves-light" style="margin-left: 5px;"><i class="mdi mdi-close" style="margin-right: 5px;"></i>Close</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div>
    @stop
    {{-- <script src="{{asset('frogetor/assets/plugins/dropify/js/dropify.min.js')}}"></script>
    <script src="{{asset('frogetor/assets/pages/jquery.form-upload.init.js')}}"></script> --}}
