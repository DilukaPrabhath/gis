@extends('admin.layout.master_inqu_tbl')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">Inquery Table</h4>


                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Inquery Number</th>
                                <th>Student Name</th>
                                <th>Request Grade</th>
                                <th>Institute</th>
                                <th>Mobile</th>
                                <th>Status</th>
                                <th>Start date</th>
                                <th>Action</th>
                            </tr>
                            </thead>


                            <tbody>
                            <tr>
                                <td>INQ/000001</td>
                                <td>Tiger Nixon</td>
                                <td>Grade 5</td>
                                <td>School one</td>
                                <td>0770668362</td>
                                <td><span class="badge badge-success">Pending</span></td>
                                <td>2011/04/25</td>
                                <td>
                                    <a href="{{url('admin/inqueries/view')}}" type="button" class="btn btn-dropbox">
                                        <i class="fab far fa-eye" style="color: white; font-size:8px;"></i>
                                    </a>
                                    <a href="{{url('admin/inqueries/edit')}}" type="button" class="btn btn-danger">
                                        <i class="fab fas fa-pencil-alt" style="color: white; font-size:8px;"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>INQ/000002</td>
                                <td>Garrett Winters</td>
                                <td>Primary</td>
                                <td>School 2</td>
                                <td>0770668363</td>
                                <td><span class="badge badge-success">Pending</span></td>
                                <td>2011/07/25</td>
                                <td>
                                    <a href="{{url('admin/inqueries/view')}}" type="button" class="btn btn-dropbox">
                                        <i class="fab far fa-eye" style="color: white; font-size:8px;"></i>
                                    </a>
                                    <a href="{{url('admin/inqueries/edit')}}" type="button" class="btn btn-danger">
                                        <i class="fab fas fa-pencil-alt" style="color: white; font-size:8px;"></i>
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
