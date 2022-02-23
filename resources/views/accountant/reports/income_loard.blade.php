
<!-- DataTables -->
{{-- <link href="{{asset('frogetor/assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('frogetor/assets/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{asset('frogetor/assets/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" /> --}}

@extends('accountant.layout.master')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">Income Report</h4>


                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <select class="form-control" name="date" id="date_option">
                                        <option value="">Select Date Option</option>
                                        <option value="1" >Date</option>
                                        <option value="2" >Date Range</option>
                                    </select>

                                </div>
                            </div>


                            <form action="{{url('accountant/income/date')}}" method="POST" autocomplete="off" id="regForm1" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row" id="date_div">
                                    <div class="col-sm-3">
                                        <input type="date" name="select_date" id="select_date"  class="form-control" >
                                    </div>
                                    <div class="col-sm-3">
                                        <select class="form-control" name="school_date" id="school_date">
                                            <option value="">Select School</option>
                                            @foreach ($school as $value)
                                            <option value="{{ $value->id}}">{{ $value->institute_name }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="col-sm-3">
                                        <button type="submit" class="btn btn-success waves-effect waves-light" style="color: white;"><i class="mdi mdi-check-all mr-2"></i>Submit</button>
                                    </div>
                                </div>
                            </form>

                            <form action="{{url('accountant/income/daterange')}}" method="POST" autocomplete="off" id="regForm2" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row" id="date_range_div">
                                    <div class="col-sm-3">
                                        <input type="date" class="form-control" name="date_start" id="date_start">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="date" class="form-control" name="date_end" id="date_end">
                                    </div>
                                    <div class="col-sm-3">
                                        <select class="form-control" name="school_daterange" id="school_daterange">
                                            <option value="">Select School</option>
                                            @foreach ($school as $value)
                                            <option value="{{ $value->id}}">{{ $value->institute_name }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="col-sm-3">
                                        <button type="submit" class="btn btn-success waves-effect waves-light" style="color: white;"><i class="mdi mdi-check-all mr-2"></i>Submit</button>
                                    </div>
                                </div>
                            </form>


                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Recipt No</th>
                                    <th>Student ID</th>
                                    <th>Student Name</th>
                                    <th>Grade</th>
                                    <th>Fee</th>
                                </tr>
                            </thead>


                            <tbody>
                                @foreach ($data as $value)
                                <tr>

                                    <td>@php
                                        $newDateTime = date('Y-m-d h:i A', strtotime($value->created_at));
                                        @endphp
                                       {{ $newDateTime }}</td>
                                    <td>{{$value->recipt_id}}</td>
                                    <td>{{$value->stu_num}}</td>
                                    <td>{{$value->student_full_name}}</td>
                                    <td>{{$value->grade}}</td>
                                    <td>{{$value->price}}</td>

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

    @section('scripts')
        <script src="{{asset('frogetor/assets/plugins/datatables/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('frogetor/assets/plugins/datatables/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{asset('frogetor/assets/plugins/datatables/jszip.min.js')}}"></script>
        <script src="{{asset('frogetor/assets/plugins/datatables/pdfmake.min.js')}}"></script>
        <script src="{{asset('frogetor/assets/plugins/datatables/vfs_fonts.js')}}"></script>
        <script src="{{asset('frogetor/assets/plugins/datatables/buttons.html5.min.js')}}"></script>
        <script src="{{asset('frogetor/assets/plugins/datatables/buttons.print.min.js')}}"></script>
        <script src="{{asset('frogetor/assets/plugins/datatables/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('frogetor/assets/plugins/datatables/buttons.html5.min.js')}}"></script>

    <script>
        $('#datatable-buttons').DataTable( {
    autoWidth: 'true',
    header:  false,
    dom: 'Bfrtip',
    buttons: [
        // 'pdf',
        // 'excel',
        // { "extend": 'pdf', "text":'Export PDF',"className": 'btn btn-info' },
        { "extend": 'excel', "text":'Export CSV',"className": 'btn btn-danger' }
   ],


} );
    </script>
    <script>
        $( document ).ready(function() {
            // console.log("Onload");
        $("#date_div").hide();
        $("#date_range_div").hide();
        });

    </script>

<script>
    $(document).ready(function() {

    $("#date_option").change(function(){
    var type = $('#date_option').val();
    console.log(type);
    if(type == "1"){
        $("#date_range_div").hide();
        $("#date_div").show();
        $( "#date_start" ).val("");
        $( "#date_end" ).val("");

    }else if (type == "2") {
        $("#date_range_div").show();
        $("#date_div").hide();
        $( "#date_1" ).val("");
    } else {

    }

     });

     });

    </script>
    <script>

        $(document).ready(function() {

            $("#regForm1").validate({
                rules: {
                    select_date: {
                        required: true,
                    },
                    school_date:{
                        required: true,
                    }
                },
                messages: {
                    select_date: {
                        required: "Date is required",
                    },
                    school_date: {
                        required: "School is required",
                    }
                }
            });

        });

    </script>

<script>

    $(document).ready(function() {

        var type2 = $('#date_start').val();
       // console.log(type2);
        $("#regForm2").validate({
            rules: {
                date_start: {
                    required: true,
                },
                date_end: {
                    required: true,
                },
                school_daterange: {
                    required: true,
                },
            },
            messages: {
                date_start: {
                    required: "Start Date is required",
                },
                date_end: {
                    required: "End Date is required",
                },
                school_daterange: {
                    required: "School is required",
                }
            }
        });

    });

</script>
    @stop

    @section('button')
    {{-- <div class="float-right align-item-center mt-2">
        <a href="{{url('admin/inqueries/create')}}" class="btn btn-info px-4 align-self-center report-btn">Add</a>
    </div> --}}
    @stop
