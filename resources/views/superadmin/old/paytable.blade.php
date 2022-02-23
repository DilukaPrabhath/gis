@extends('superadmin.layouts.master')
@section('content')

<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Payments</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Payments</li>
            </ol>
        </div>

    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Institute Payments</h4>
                    <a class="btn btn-circle btn-success pull-right" href="{{url('superadmin/payments/add')}}"> <i class="fa fa-plus" style="padding-top:3px;"> </i> </a>

                    {{-- <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6> --}}
                    <div class="table-responsive m-t-40">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Institute ID</th>
                                    <th>Amount</th>
                                    <th>Paid Date</th>
                                    <th>Payment Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>

                               <tr>
                                <td>INS/GAM/201700001</td>
                                <td>Rs 3000.00</td>
                                <td>2021/08/20</td>
                                <td>Monthly</td>
                                <td>
                                  <a class="btn btn-warning btn-circle btn-sm" href="{{url('superadmin/payments/view/2')}}"> <i class="fa fa-eye"> </i> </a>
                                  <a class="btn btn-danger btn-circle btn-sm" href="{{url('superadmin/payments/edit/2')}}"> <i class="fa fa-edit"> </i> </a>
                                </td>
                                </tr>
                                <tr>
                                <td>INS/GAM/201700002</td>
                                <td>Rs 3000.00</td>
                                <td>2021/08/20</td>
                                <td>Monthly</td>
                                <td>
                                    <a class="btn btn-warning btn-circle btn-sm" href="{{url('superadmin/payments/view/1')}}"> <i class="fa fa-eye"> </i> </a>
                                    <a class="btn btn-danger btn-circle btn-sm" href="{{url('superadmin/payments/edit/1')}}"> <i class="fa fa-edit"> </i> </a>
                                </td>
                                </tr>


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
