@extends('admin.layout.master')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">Due Payment Reports</h4>


                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <select class="form-control" name="date" id="date_option">
                                        <option value="">Select Date Option</option>
                                        <option value="1" >Month Wise</option>
                                        <option value="2" >Year Wise</option>
                                    </select>

                                </div>
                            </div>


                            <form action="{{url('admin/duefee/date')}}" method="POST" autocomplete="off" id="regForm1" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row" id="date_div">

                                    <div class="col-sm-3">
                                        <select class="form-control" name="school_date" id="school_date">
                                            <option value="">Month Count</option>
                                            <option value="1">01 Month</option>
                                            <option value="2">02 Months</option>
                                            <option value="3">03 Months</option>
                                            <option value="4">04 Months</option>
                                            <option value="5">05 Months</option>
                                            <option value="6">06 Months</option>
                                            <option value="7">07 Months</option>
                                            <option value="8">08 Months</option>
                                            <option value="9">09 Months</option>
                                            <option value="10">10 Months</option>
                                            <option value="11">11 Months</option>
                                        </select>

                                    </div>
                                    <div class="col-sm-3">
                                        <button type="submit" class="btn btn-success waves-effect waves-light" style="color: white;"><i class="mdi mdi-check-all mr-2"></i>Submit</button>
                                    </div>
                                </div>
                            </form>

                            <form action="{{url('admin/duefee/daterange')}}" method="POST" autocomplete="off" id="regForm2" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row" id="date_range_div">

                                    <div class="col-sm-2">
                                        <select class="form-control" name="school_daterange" id="school_daterange">
                                            <option value="">Year Count</option>
                                            <option value="1">01 Year</option>
                                            <option value="2">02 Year</option>
                                            <option value="3">03 Year</option>
                                            <option value="4">04 Year</option>
                                            <option value="5">05 Year</option>
                                        </select>

                                    </div>
                                    <div class="col-sm-3">
                                        <button type="submit" class="btn btn-success waves-effect waves-light" style="color: white;"><i class="mdi mdi-check-all mr-2"></i>Submit</button>
                                    </div>
                                </div>
                            </form>


                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Student ID</th>
                                <th>Student Name</th>
                                <th>Grade</th>
                                <th>Total Payment</th>
                                <th>Total Paid</th>
                                <th>Due Amount</th>
                            </tr>
                            </thead>


                            <tbody>


                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div>
    @stop

    @section('scripts')

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
                    school_date:{
                        required: true,
                    }
                },
                messages: {
                    school_date: {
                        required: "School is required",
                    }
                }
            });

        });

    </script>



<script>
    $(document).ready(function() {

$("#regForm2").validate({
    rules: {
        school_daterange:{
            required: true,
        }
    },
    messages: {
        school_daterange: {
            required: "Year Count is required",
        }
    }
});

});
</script>
@stop
