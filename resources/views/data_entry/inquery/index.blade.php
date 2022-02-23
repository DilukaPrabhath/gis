@extends('data_entry.layout.master')
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
                                <th>Contact Number</th>
                                <th>Status</th>
                                <th>Process Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>


                            <tbody>
                                @foreach ($inq as $value)
                                        <tr>
                                            <td>{{$value->inq_number}}</td>
                                            <td>{{$value->student_full_name}}</td>
                                            <td>{{$value->contact_number}}</td>
                                            <td>@if ($value->inq_status == 1)
                                                <span class="badge badge-danger" style="background-color: purple;">Investigating</span>
                                               @elseif ($value->inq_status == 2)
                                                <span class="badge badge-danger" style="background-color: orange;">Confirm</span>
                                                @elseif ($value->inq_status == 3)
                                                <span class="badge badge-danger" style="background-color: red;">Not Coming</span>
                                                @elseif ($value->inq_status ==4)
                                                <span class="badge badge-danger" style="background-color: green;">Student</span>
                                               @endif
                                            </td>
                                            <td>@if ($value->stu_status == 1)
                                                <span class="badge badge-danger" style="background-color: purple;">Investigating Step</span>
                                               @elseif ($value->stu_status == 2)
                                                <span class="badge badge-danger" style="background-color: orange;">Application Step</span>
                                                @elseif ($value->stu_status == 3)
                                                <span class="badge badge-danger" style="background-color: blue;">Interview Step</span>
                                                @elseif ($value->stu_status == 4)
                                                <span class="badge badge-danger" style="background-color: green;">Registration Step</span>
                                                @elseif ($value->stu_status == 5)
                                                <span class="badge badge-danger" style="background-color: green;">Student</span>
                                                @elseif ($value->stu_status == 6)
                                                <span class="badge badge-danger" style="background-color: red;">Leved</span>
                                               @endif
                                            </td>
                                            <td>
                                                {{-- {{$value->institute_id}} --}}
                                                @if (Auth::user()->ins_id == $value->institute_id || $value->institute_id == "")
                                                <a href="{{url('data_entry/inqueries/view')}}/{{$value->id}}" type="button" class="btn btn-dropbox">
                                                    <i class="fab far fa-eye" style="color: white; font-size:8px;"></i>
                                                </a>
                                                <a href="{{url('data_entry/inqueries/edit')}}/{{$value->id}}" type="button" class="btn btn-danger">
                                                    <i class="fab fas fa-pencil-alt" style="color: white; font-size:8px;"></i>
                                                </a>
                                                @endif

                                                @if (Auth::user()->ins_id == $value->institute)
                                                1111
                                                @endif

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
        <a href="{{url('data_entry/inqueries/create')}}" class="btn btn-info px-4 align-self-center report-btn">Add</a>
    </div>
    @stop
