@extends('admin.layout.master')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">Class Type Table</h4>


                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>School Name</th>
                                <th>Class Type Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            @foreach ($data as $classtype)
                            <tr>
                                <td>{{$classtype->institute}}</td>
                                <td>{{$classtype->class_types_name}}</td>
                                <td>
                                    @if ($classtype->status == 1)
                                        <span>Active</span>
                                    @elseif ($classtype->status == 0)
                                        <span>Deactive</span>
                                    @endif
                                </td>
                                <th>
                                    <a href="{{url('admin/nursary/class_type/view')}}/{{$classtype->id}}" type="button" class="btn btn-dropbox">
                                        <i class="fab far fa-eye" style="color: white; font-size:8px;"></i>
                                    </a>
                                    <a href="{{url('admin/nursary/class_type/edit')}}/{{$classtype->id}}" type="button" class="btn btn-danger ">
                                        <i class="fab fas fa-pencil-alt" style="color: white; font-size:8px;"></i>
                                    </a>
                                    <a href="{{url('admin/nursary/class_type/add')}}/{{$classtype->id}}" type="button" class="btn btn-warning">
                                        <i class="fab fa fa-plus" style="color: white; font-size:8px;"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach

                            <tbody>


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
        <a href="{{url('/admin/nursary/class_type/create')}}" class="btn btn-info px-4 align-self-center report-btn">Add</a>
    </div>
    @stop

    @section('scripts')

    @stop
