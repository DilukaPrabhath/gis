<link href="{{asset('frogetor/assets/plugins/dropify/css/dropify.min.css')}}" rel="stylesheet">
@extends('data_entry.layout.master')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">View Event</h4>


                        <div class="row">
                            <div class="col-lg-6">
                                <table class="table table-hover mb-0">
                                    <tr>
                                        <th>Event</th>
                                        <td>{{$evet[0]->event}}</td>
                                    </tr>
                                    <tr>
                                        <th>School</th>
                                        <td>{{$evet[0]->institute}}</td>
                                    </tr>
                                    <tr>
                                        <th>Date</th>
                                        <td>{{$evet[0]->date}}</td>
                                    </tr>
                                    <tr>
                                        <th>Time</th>
                                        <td>@php
                                            $newDateTime = date('h:i A', strtotime($evet[0]->time));
                                        @endphp  {{$newDateTime}}</td>
                                    </tr>
                                    <tr>
                                        <th>Venue</th>
                                        <td>{{$evet[0]->venue}}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>@if ($evet[0]->status == 1)
                                             <span class="badge badge-success">Pending</span>
                                             @elseif ($evet[0]->status == 2)
                                             <span class="badge badge-danger">Cancelled</span>
                                             @elseif ($evet[0]->status == 3)
                                             <span class="badge badge-warning">Postponed</span>
                                             @elseif ($evet[0]->status == 4)
                                             <span class="badge badge-info">Finished</span>
                                           @endif</td>
                                    </tr>
                                    <tr>
                                        <th>Info</th>
                                        <td>{{$evet[0]->discription}}</td>
                                    </tr>

                                </table>
                            </div>
                            <div class="col-lg-6">
                                {{-- <table class="table table-hover mb-0">
                                    <tr>
                                        <th>Image</th>
                                        <td><img src="{{url('frogetor/assets/images/users/user1.jpg')}}" alt=""></td>
                                    </tr>
                                </table> --}}
                            </div>


                            <div class="row">
                                <div class="col-lg-12">
                                    <a type="button" href="{{url('data_entry/events')}}" class="btn btn-primary waves-effect waves-light" style="margin-left: 5px;"><i class="mdi mdi-close" style="margin-right: 5px;"></i>Close</a>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div>
    @stop
    <script src="{{asset('frogetor/assets/plugins/dropify/js/dropify.min.js')}}"></script>
    <script src="{{asset('frogetor/assets/pages/jquery.form-upload.init.js')}}"></script>
