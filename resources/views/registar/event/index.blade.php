@extends('registar.layout.master')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">Event Table</h4>


                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Event</th>
                                <th>School</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>


                            <tbody>
                                @foreach ($data as $value)
                                <tr>
                                    <td>{{$value->event}}</td>
                                    <td>{{$value->institute}}</td>
                                    <td>{{$value->date}}</td>
                                    <td>@php
                                        $newDateTime = date('h:i A', strtotime($value->time));
                                    @endphp  {{$newDateTime}}</td>
                                    <td>
                                    @if ($value->status == 1)
                                     <span class="badge badge-success">Pending</span>
                                    @elseif ($value->status == 2)
                                     <span class="badge badge-danger">Canceld</span>
                                     @elseif ($value->status == 3)
                                     <span class="badge badge-warning">Postponed</span>
                                     @elseif ($value->status == 4)
                                     <span class="badge badge-info">Finish</span>
                                    @endif
                                    </td>
                                    <td>
                                        <a href="{{url('/registar/events/view')}}/{{$value->id}}" type="button" class="btn btn-dropbox">
                                            <i class="fab far fa-eye" style="color: white; font-size:8px;"></i>
                                        </a>
                                        <a href="{{url('/registar/events/edit')}}/{{$value->id}}" type="button" class="btn btn-danger">
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
        <a href="{{url('registar/events/create')}}" class="btn btn-info px-4 align-self-center report-btn">Add</a>
    </div>
    @stop

    @section('scripts')

    @stop
