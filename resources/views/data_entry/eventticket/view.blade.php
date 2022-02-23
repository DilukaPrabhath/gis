<link href="{{asset('frogetor/assets/plugins/dropify/css/dropify.min.css')}}" rel="stylesheet">
@extends('data_entry.layout.master')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">View Ticket Category</h4>
                        <form action="" method="POST" autocomplete="off" id="regForm" enctype="multipart/form-data">
                            @csrf

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



                            </div>




                        </div>
                        <div class="col-lg-12">
                            <div class="form-group row">

                                <table id="" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>Event</th>
                                        <th>Category</th>
                                        <th>Price</th>
                                        <th>Max Count</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>


                                    <tbody>

                                    @foreach ($data as $value)
                                    <tr>
                                        <td>{{$value->event}}</td>
                                        <td>{{$value->ticket_category}}</td>
                                        <td>{{$value->price}}</td>
                                        <td>{{$value->max_count}}</td>
                                        <td>@if ($value->status == 1)
                                            <span class="badge badge-success">Active</span>
                                           @elseif ($value->status == 2)
                                            <span class="badge badge-danger">Inactive</span>
                                            @elseif ($value->status == 3)
                                            <span class="badge badge-warning">Sold Out</span>
                                           @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group row">

                                <div class="row">
                                    <div class="col-lg-12">
                                        <a type="button" href="{{url('data_entry/event_tickets')}}" class="btn btn-primary waves-effect waves-light" style="margin-left: 5px;"><i class="mdi mdi-close" style="margin-right: 5px;"></i>Close</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->

        </div> <!-- end row -->

    </div>
    @stop

    @section('scripts')

    <script>
        $(document).ready(function() {
            var id  = $("#t_id").val();
            var cat = $("#ticket_category").val();
            $("#regForm").validate({
                rules: {
                    ticket_category: {
                        required: true,
                        maxlength: 70,
                        remote: {
                             url: "/data_entry/check_ticket_category",
                             type: "get",
                             data: {"id" : id},
                                }
                    },
                    price: {
                        required: true,
                    },
                    issue_till: {
                        required: true,
                    },
                    max_count: {
                        required: true,
                    },
                    status: {
                        required: true,
                    }

                },
                messages: {
                    ticket_category: {
                        required: "Ticket Category Name is required",
                        maxlength: "Ticket Category  Name cannot be more than 70 characters",
                        remote:"Ticket Category  Name already taken",
                    },
                    max_count: {
                        required: "Count is required"
                    },
                    price: {
                        required: "Price is required"
                    },
                    issue_till: {
                        required: "Final issue Date is required"
                    },
                    status: {
                        required: "Status is required"
                    }
                }
            });

        });


    </script>


    @stop
