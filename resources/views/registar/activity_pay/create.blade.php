<link href="{{asset('frogetor/assets/plugins/dropify/css/dropify.min.css')}}" rel="stylesheet">
@extends('admin.layout.master')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Activity Fee Payment</h4>
                        <div class="row" style="margin-bottom: 15px;">

                            <div class="input-group col-6">
                                <input type="text" class="form-control" placeholder="Student ID" aria-label="">
                                <span class="input-group-append">
                                    <button class="btn btn-primary" type="button">Go</button>
                                </span>
                            </div>

                        </div>


                        <div class="row">

                            <div class="col-lg-6">

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
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label text-right">Gurdian Name</label>
                                    <div class="col-sm-9">
                                        <label for="" style="padding-top: 6px;">DInusha Abhekone</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label text-right">Gurdian Mobile</label>
                                    <div class="col-sm-9">
                                        <label for="" style="padding-top: 6px;">0770668964</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label text-right">Gurdian NIC</label>
                                    <div class="col-sm-9">
                                        <label for="" style="padding-top: 6px;">934578758V</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label text-right">Activity</label>
                                    <div class="col-sm-9">
                                        <select class="form-control">
                                            <option value="">Select</option>
                                            <option value="1">Cricket</option>
                                            <option value="2">Swimming</option>
                                            <option value="3">chess</option>
                                            <option value="4">Badminton</option>
                                        </select>
                                    </div>
                                </div>

                            </div>


                            <div class="col-lg-6">

                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label text-right">Payment</label>
                                    <div class="input-group col-sm-9">
                                        <input type="text" id="example-input3-group1" name="example-input3-group1" class="form-control">
                                        <div class="input-group-append">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label text-right">Payment Type</label>
                                    <div class="col-sm-9">
                                        <select class="form-control">
                                            <option value="">Select</option>
                                            <option value="1">Online</option>
                                            <option value="2">Cheque</option>
                                            <option value="3">Cash</option>
                                            <option value="4">Card</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-tel-input" class="col-sm-3 col-form-label text-right">Recipt Number</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="number" value="" id="example-tel-input">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label text-right">Bank Name</label>
                                    <div class="col-sm-9">
                                        <select class="form-control">
                                            <option value="">Select</option>
                                            <option value="1">People Bank</option>
                                            <option value="2">Bank of Cylon</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-search-input" class="col-sm-3 col-form-label text-right">Recipt Image</label>
                                    <div class="col-sm-9">
                                        <input type="file" id="input-file-now" class="dropify" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2"></div>
                                    <div class="form-group row">
                                        <a type="button" class="btn btn-success waves-effect waves-light" style="color: white;"><i class="mdi mdi-check-all mr-2"></i>Submit</a>
                                        <a type="button" href="{{url('admin/activities_pay')}}" class="btn btn-primary waves-effect waves-light" style="margin-left: 5px;"><i class="mdi mdi-close" style="margin-right: 5px;"></i>Close</a>
                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">Activity Payment History Table</h4>


                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Student ID</th>
                                <th>Activity</th>
                                <th>Payment</th>
                                <th>Payment Type</th>
                                <th>Payment date</th>
                                <th>Action</th>
                            </tr>
                            </thead>


                            <tbody>
                            <tr>
                                <td>STU/211004/0001</td>
                                <td>Cricket</td>
                                <td>Rs.10000.00</td>
                                <td>Cash</td>
                                <td>2021/01/10</td>
                                <td>
                                    <a href="{{url('admin/activities_pay/old/view')}}" type="button" class="btn btn-dropbox">
                                        <i class="fab far fa-eye" style="color: white; "></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>STU/211004/0001</td>
                                <td>Cricket</td>
                                <td>Rs.10000.00</td>
                                <td>Online</td>
                                <td>2021/05/10</td>
                                <td>
                                    <a href="{{url('admin/activities_pay/old/view')}}" type="button" class="btn btn-dropbox">
                                        <i class="fab far fa-eye" style="color: white;"></i>
                                    </a>
                                </td>
                            </tr>


                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div>
    @stop
    <script src="{{asset('frogetor/assets/plugins/dropify/js/dropify.min.js')}}"></script>
    <script src="{{asset('frogetor/assets/pages/jquery.form-upload.init.js')}}"></script>
