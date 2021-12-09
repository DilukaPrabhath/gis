@extends('admin.layout.master')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">User Table</h4>


                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>User Type</th>
                                <th>Institute</th>
                                <th>Mobile</th>
                                <th>Status</th>
                                <th>Start date</th>
                                <th>Action</th>
                            </tr>
                            </thead>


                            <tbody>
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>User</td>
                                <td>School one</td>
                                <td>0770668362</td>
                                <td><span class="badge badge-success">Active</span></td>
                                <td>2011/04/25</td>
                                <td>
                                    <a href="{{url('admin/users/view')}}" type="button" class="btn btn-dropbox">
                                        <i class="fab far fa-eye" style="color: white; font-size:8px;"></i>
                                    </a>
                                    <a href="{{url('admin/users/edit')}}" type="button" class="btn btn-danger">
                                        <i class="fab fas fa-pencil-alt" style="color: white; font-size:8px;"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Garrett Winters</td>
                                <td>User</td>
                                <td>School 2</td>
                                <td>0770668363</td>
                                <td><span class="badge badge-success">Active</span></td>
                                <td>2011/07/25</td>
                                <td>
                                    <a href="{{url('admin/users/view')}}" type="button" class="btn btn-dropbox">
                                        <i class="fab far fa-eye" style="color: white; font-size:8px;"></i>
                                    </a>
                                    <a href="{{url('admin/users/edit')}}" type="button" class="btn btn-danger">
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

    @section('button')
    <div class="float-right align-item-center mt-2">
        <a href="{{url('admin/users/create')}}" class="btn btn-info px-4 align-self-center report-btn">Add</a>
    </div>
    @stop
