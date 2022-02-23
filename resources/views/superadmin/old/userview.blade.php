@extends('superadmin.layouts.master')
@section('content')

<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">User Details View</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">User Details</li>
            </ol>
        </div>
        {{-- <div class="col-md-7 col-4 align-self-center">
            <div class="d-flex m-t-10 justify-content-end">
                <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                    <div class="chart-text m-r-10">
                        <h6 class="m-b-0"><small>THIS MONTH</small></h6>
                        <h4 class="m-t-0 text-info">$58,356</h4></div>
                    <div class="spark-chart">
                        <div id="monthchart"></div>
                    </div>
                </div>
                <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                    <div class="chart-text m-r-10">
                        <h6 class="m-b-0"><small>LAST MONTH</small></h6>
                        <h4 class="m-t-0 text-primary">$48,356</h4></div>
                    <div class="spark-chart">
                        <div id="lastmonthchart"></div>
                    </div>
                </div>
                <div class="">
                    <button class="right-side-toggle waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                </div>
            </div>
        </div> --}}
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">View Admin Data</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="table-responsive m-t-40">
                                <table class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                    <tbody>
                                        <tr>
                                          <th scope="row">User ID</th>
                                          <td>{{$adminuser->user_number}}</td>
                                        </tr>
                                        <tr>
                                          <th scope="row">Name</th>
                                          <td>{{$adminuser->full_name}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Name with Initials</th>
                                            <td>{{$adminuser->nwi}}</td>
                                          </tr>
                                        <tr>
                                          <th scope="row">NIC</th>
                                          <td>{{$adminuser->nic}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Mobile</th>
                                            <td>{{$adminuser->mobile}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">E Mail</th>
                                            <td>{{$adminuser->email}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Telephone</th>
                                            <td>{{$adminuser->tele}}</td>
                                        </tr>

                                      </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="table-responsive m-t-40">
                            <table class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <tbody>
                                    <tr>
                                      <th scope="row">User Image</th>
                                      <td><img src="{{asset('userimg/'.$adminuser->image)}}" alt="" alt="" width="100px" height="100px"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Address</th>
                                        <td>{{$adminuser->address}}</td>
                                    </tr>
                                    <tr>
                                      <th scope="row">Status</th>
                                      <td>
                                        @if ($adminuser->status == 1)
                                        <span class="badge badge-success">Active</span>
                                        @elseif ($adminuser->status == 0)
                                        <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    </tr>
                                    <tr>
                                      <th scope="row">Create at</th>
                                      <td>{{$adminuser->created_at}}</td>
                                    </tr>
                                      @if ($adminuser->updated_at != null)
                                      <tr>
                                      <th scope="row">Update at</th>
                                      <td>{{$adminuser->updated_at}}</td>
                                      </tr>
                                      @endif
                                  </tbody>
                            </table>
                        </div>
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-4">
                            <a class="btn btn-inverse waves-effect waves-light" href="{{url('superadmin/users')}}" style="width: 100px; padding-top: 5px;">Back</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->

</div>


@stop
