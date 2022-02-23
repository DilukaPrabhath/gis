@extends('accountant.layout.master')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">Institute Class Fee Table</h4>


                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>School</th>
                                <th>Contact</th>
                                <th>City</th>
                                <th>School Type</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>


                            <tbody>

                            @foreach ($data as $value)
                            <tr>
                                <td>{{$value->institute_name}}</td>
                                <td>{{$value->contact_number}}</td>
                                <td>{{$value->city}}</td>
                                <td>@if ($value->pre_or_sch == 1)
                                    <span class="badge badge-danger" style="background-color: purple;">Nursary</span>
                                   @elseif ($value->pre_or_sch == 2)
                                    <span class="badge badge-danger" style="background-color: green;">School</span>
                                   @endif
                                </td>
                                <td>@if ($value->status == 1)
                                    <span class="badge badge-success">Active</span>
                                   @elseif ($value->status == 2)
                                    <span class="badge badge-danger">Inactive</span>
                                   @endif
                                </td>
                                <td>
                                    <a href="{{url('accountant/classfee/create')}}/{{$value->id}}" type="button" class="btn btn-warning sm">
                                        <i class="fab fa fa-plus" style="color: white; font-size: 8px;"></i></a>
                                    </a>
                                    <a href="{{url('accountant/classfee/view')}}/{{$value->id}}" type="button" class="btn btn-dropbox">
                                        <i class="fab far fa-eye" style="color: white; font-size:8px;"></i>
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
    {{-- <div class="float-right align-item-center mt-2">
        <a href="{{url('/accountant/event_tickets/create')}}" class="btn btn-info px-4 align-self-center report-btn">Add</a>
    </div> --}}
    @stop
