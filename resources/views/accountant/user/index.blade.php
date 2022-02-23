@extends('accountant.layout.master')
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
                                <th>School</th>
                                <th>Mobile</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>


                            <tbody>

                                @foreach ($usr_tbl as $value)
                                <tr>
                                    <td>{{$value->name}}</td>
                                    @if ($value->user_role == 1)
                                    <td>Admin</td>
                                    @elseif ($value->user_role == 2)
                                    <td>Registrar</td>
                                    @elseif ($value->user_role == 3)
                                    <td>Deputary Registrar</td>
                                    @elseif ($value->user_role == 4)
                                    <td>Accountant</td>
                                    @elseif ($value->user_role == 5)
                                    <td>Data Entry</td>
                                    @elseif ($value->user_role == 6)
                                    <td>Super Admin</td>
                                    @endif

                                    <td>{{$value->school}}</td>
                                    <td>{{$value->mobile}}</td>

                                    @if ($value->status == 1)
                                    <td><span class="badge badge-success">Active</span></td>
                                    @elseif ($value->status == 2)
                                    <td><span class="badge badge-danger">Inactive</span></td>
                                    @endif
                                    <td><img src="{{asset('image/user')}}/{{$value->image}}" alt="" width="50" height="50"></td>
                                    <td>
                                        <a href="{{url('accountant/users/view')}}/{{$value->id}}" type="button" class="btn btn-dropbox">
                                            <i class="fab far fa-eye" style="color: white; font-size:8px;"></i>
                                        </a>
                                        <a href="{{url('accountant/users/edit')}}/{{$value->id}}" type="button" class="btn btn-danger">
                                            <i class="fab fas fa-pencil-alt" style="color: white; font-size:8px;"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach

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
        <a href="{{url('accountant/users/create')}}" class="btn btn-info px-4 align-self-center report-btn">Add</a>
    </div>
    @stop
