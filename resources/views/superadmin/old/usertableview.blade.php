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

    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Admins Account</h4>
                    {{-- <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6> --}}
                    <div class="table-responsive m-t-40">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>User ID</th>
                                    <th>Name</th>
                                    <th>NIC</th>
                                    <th>Mobile</th>
                                    <th>E Mail</th>
                                    <th>Start date</th>
                                    <th>State</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($users as $value)
                               <tr>
                                <td>{{$value->user_number}}</td>
                                <td>{{$value->full_name}}</td>
                                <td>{{$value->nic}}</td>
                                <td>{{$value->mobile}}</td>
                                <td>{{$value->email}}</td>
                                <td>{{ \Carbon\Carbon::parse($value->created_at)->format('d/m/Y H:i:s A')}}</td>

                                <td>
                                    @if ($value->status == 1)
                                    <span class="badge badge-success">Active</span>
                                    @elseif ($value->status == 0)
                                    <span class="badge badge-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                  <a class="btn btn-warning btn-circle btn-sm" href="{{url('superadmin/user/view')}}/{{$value->id}}"> <i class="fa fa-eye"> </i> </a>
                                  <a class="btn btn-danger btn-circle btn-sm" href="{{url('superadmin/user/edit')}}/{{$value->id}}"> <i class="fa fa-edit"> </i> </a>
                                </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
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
