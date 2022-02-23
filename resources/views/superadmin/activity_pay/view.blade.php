<link href="{{asset('frogetor/assets/plugins/dropify/css/dropify.min.css')}}" rel="stylesheet">
@extends('superadmin.layout.master')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">View Activity Payment</h4>


                        <div class="row">

                            <div class="col-lg-6">

                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label text-right">Full Name</label>
                                    <div class="col-sm-9">
                                        <label for="" style="padding-top: 6px;">Sadun Perera</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label text-right">School</label>
                                    <div class="col-sm-9">
                                        <label for="" style="padding-top: 6px;">Institute One</label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label text-right">Grade</label>
                                    <div class="col-sm-9">
                                        <label for="" style="padding-top: 6px;">Grade 1</label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label text-right">Activity</label>
                                    <div class="col-sm-9">
                                        <label for="" style="padding-top: 6px;">Cricket</label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label text-right">Payment Type</label>
                                    <div class="col-sm-9">
                                        <label for="" style="padding-top: 6px;">Online</label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label text-right">Payment</label>
                                    <div class="col-sm-9">
                                        <label for="" style="padding-top: 6px;">Rs.1000.00</label>
                                    </div>
                                </div>


                            </div>


                            <div class="col-lg-6">


                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label text-right">Resipt No </label>
                                    <div class="col-sm-9">
                                        <label for="" style="padding-top: 6px;">RCT/00000012</label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label text-right">Bank</label>
                                    <div class="col-sm-9">
                                        <label for="" style="padding-top: 6px;">People Bank</label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label text-right">Recipt Date</label>
                                    <div class="col-sm-9">
                                        <label for="" style="padding-top: 6px;">2021/05/21</label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label text-right">Recipt Image</label>
                                    <div class="col-sm-9">
                                        <img src="{{url('frogetor/assets/images/users/user1.jpg')}}" width="200" height="200" alt="">
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-lg-12">

                                    <a type="button" href="{{url('superadmin/activities_pay')}}" class="btn btn-primary waves-effect waves-light" style="margin-left: 15px;"><i class="mdi mdi-close" style="margin-right: 5px;"></i>Close</a>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div>
    @stop
    <script src="{{asset('frogetor/assets/plugins/dropify/js/dropify.min.js')}}"></script>
    <script src="{{asset('frogetor/assets/pages/jquery.form-upload.init.js')}}"></script>
