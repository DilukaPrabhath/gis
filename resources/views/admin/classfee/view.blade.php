<link href="{{asset('frogetor/assets/plugins/dropify/css/dropify.min.css')}}" rel="stylesheet">
@extends('admin.layout.master')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">View Class Fees</h4>
                        <form action="" method="POST" autocomplete="off" id="regForm" enctype="multipart/form-data">
                            @csrf

                        <div class="row">
                            <div class="col-lg-6">
                                <table class="table table-hover mb-0">
                                    <tr>
                                        <th>School</th>
                                        <td>{{$institute->institute_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Contact</th>
                                        <td>{{$institute->contact_number}}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{$institute->email}}</td>
                                    </tr>
                                    <tr>
                                        <th>City</th>
                                        <td>{{$institute->city}}</td>
                                    </tr>
                                    <tr>
                                        <th>School Type</th>
                                          <td>@if ($institute->status == 1)
                                            <span class="badge badge-success">Active</span>
                                           @elseif ($institute->status == 2)
                                            <span class="badge badge-danger">Inactive</span>
                                           @endif</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>@if ($institute->pre_or_sch == 1)
                                            <span class="badge">Pre School</span>
                                            @elseif ($institute->pre_or_sch == 2)
                                            <span class="badge">Secondary School</span>
                                            @endif</td>
                                    </tr>

                                </table>
                            </div>


                            <div class="col-lg-6">



                            </div>




                        </div>
                        <div class="col-lg-12">
                            <div class="form-group row">

                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>Grade</th>
                                        <th>Syllubus</th>
                                        <th>Price</th>
                                        <th>Year</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($grd as $value)
                                        <tr>
                                            <td>@if ($value->grd_id == 0)
                                                Primary
                                                @else
                                                {{$value->grade}}
                                                @endif</td>
                                            <td>@if ($value->grd_id == 0)
                                                Primary
                                                @else
                                                {{$value->syllubus}}
                                                @endif</td>
                                            <td>{{$value->fee}}</td>
                                            <td>{{$value->year}}</td>

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
                                        <a type="button" href="{{url('admin/classfee')}}" class="btn btn-primary waves-effect waves-light" style="margin-left: 5px;"><i class="mdi mdi-close" style="margin-right: 5px;"></i>Close</a>
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
                             url: "/check_ticket_category",
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
