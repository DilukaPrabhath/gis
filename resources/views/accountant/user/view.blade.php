<link href="{{asset('frogetor/assets/plugins/dropify/css/dropify.min.css')}}" rel="stylesheet">
@extends('accountant.layout.master')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">View User</h4>


                        <div class="row">
                            <div class="col-lg-6">
                                <table class="table table-hover mb-0">
                                    <tr>
                                        <th>Full Name</th>
                                        <td>{{$adminuser->name}}</td>
                                    </tr>
                                    <tr>
                                        <th>NIC</th>
                                        <td>{{$adminuser->nic}}</td>
                                    </tr>
                                    <tr>
                                        <th>Mobile</th>
                                        <td>{{$adminuser->mobile}}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{$adminuser->email}}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        @if ($adminuser->status)
                                        <td><span class="badge badge-success">Active</span></td>
                                        @else
                                        <td><span class="badge badge-danger">Inactive</span></td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <th>User Type</th>
                                        <td>{{$u_tyo->user_role}}</td>
                                    </tr>
                                    <tr>
                                        <th>Inatitute</th>
                                        <td>{{$school->institute_name}}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-lg-6">
                                <table class="table table-hover mb-0">
                                    <tr>
                                        <th>Image</th>
                                        <td><img src="{{asset('image/user')}}/{{$adminuser->image}}" width="300" height="300" alt=""></td>
                                    </tr>
                                </table>
                            </div>


                            <div class="row">
                                <div class="col-lg-12">
                                    <a type="button" href="{{url('accountant/users')}}" class="btn btn-primary waves-effect waves-light" style="margin-left: 5px;"><i class="mdi mdi-close" style="margin-right: 5px;"></i>Close</a>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div>
     <script src="{{asset('frogetor/assets/plugins/dropify/js/dropify.min.js')}}"></script>
    <script src="{{asset('frogetor/assets/pages/jquery.form-upload.init.js')}}"></script>
    @stop
