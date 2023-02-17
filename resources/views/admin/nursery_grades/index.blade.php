@extends('admin.layout.master')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">Nursary Grade Table</h4>


                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Grade Name</th>
                                <th>Class Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>


                            <tbody>
                                @foreach ($data as $val)
                                <tr>
                                    <td>{{$val->grade_name}}</td>
                                    <td>{{$val->class_name}}</td>
                                    <td>
                                    @if ($val->status == 1)
                                        <span class="badge badge-success">Active</span>
                                    @elseif ($val->status == 2)
                                        <span class="badge badge-danger">Inactive</span>
                                    @endif
                                    </td>
                                    <td>
                                        <a href="{{url('/admin/nursery_grades/view')}}/{{$val->id}}" type="button" class="btn btn-dropbox">
                                            <i class="fab far fa-eye" style="color: white; font-size:8px;"></i>
                                        </a>
                                        <a href="{{url('/admin/nursery_grades/edit')}}/{{$val->id}}" type="button" class="btn btn-danger">
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
        <a href="{{url('/admin/nursery_grades/create')}}" class="btn btn-info px-4 align-self-center report-btn">Add</a>
    </div>
    @stop

    @section('scripts')

    @stop
