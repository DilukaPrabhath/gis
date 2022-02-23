@extends('superadmin.layouts.master')
@section('content')

<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">institutes</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">institutes</li>
            </ol>
        </div>

    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">institutes</h4>
                    {{-- <a class="btn btn-circle btn-success pull-right" href="{{url('superadmin/institutes/add')}}"> <i class="fa fa-plus" style="padding-top:3px;"> </i> </a> --}}

                    {{-- <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6> --}}
                    <div class="table-responsive m-t-40">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Institute ID</th>
                                    <th>Institute Name</th>
                                    <th>Telephone</th>
                                    <th>E Mail</th>
                                    <th>Start date</th>
                                    <th>State</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($institute as $value)
                               <tr>
                                <td>{{$value->inst_num}}</td>
                                <td>{{$value->institute}}</td>
                                <td>{{$value->tele}}</td>
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
                                  <a class="btn btn-warning btn-circle btn-sm" href="{{url('superadmin/institutes/view')}}/{{$value->id}}"> <i class="fa fa-eye"> </i> </a>
                                  <a class="btn btn-danger btn-circle btn-sm" href="{{url('superadmin/institutes/edit')}}/{{$value->id}}"> <i class="fa fa-edit"> </i> </a>
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
