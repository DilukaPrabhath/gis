<link href="{{asset('frogetor/assets/plugins/dropify/css/dropify.min.css')}}" rel="stylesheet">
@extends('de_registar.layout.master')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Award Details Edit</h4>
                        {{-- <div class="row" style="margin-bottom: 15px;">

                            <div class="input-group col-6">
                                <input type="text" class="form-control" placeholder="Student ID" aria-label="" value="STU/211005/0001">
                                <span class="input-group-append">
                                    <button class="btn btn-primary" type="button">Go</button>
                                </span>
                            </div>
                        </div> --}}

                        <div class="row">

                            <div class="col-lg-6">

                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label text-right">Student ID</label>
                                    <div class="col-sm-9">
                                        <label for="" style="padding-top: 6px;">STU/211005/0001</label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label text-right">Full Name</label>
                                    <div class="col-sm-9">
                                        <label for="" style="padding-top: 6px;">Sadun Perera</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label text-right">Institute</label>
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

                            </div>


                            <div class="col-lg-6">


                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label text-right">Complain</label>
                                    <div class="col-sm-9">
                                        <label for="" style="padding-top: 6px;">Struggled with a boy.</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label text-right">Discription</label>
                                    <div class="col-sm-9">
                                        <label for="" style="padding-top: 6px;">The struggle is real is a phrase used to describe a small, everyday frustrating situation or setback, similar to the complaint of first-world problems. Its origin, however, is much more serious.</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2"></div>
                                    <div class="form-group row">
                                        <a type="button" href="{{url('/de_registar/students/view')}}" class="btn btn-primary waves-effect waves-light" style="margin-left: 5px;"><i class="mdi mdi-close" style="margin-right: 5px;"></i>Close</a>
                                    </div>
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
