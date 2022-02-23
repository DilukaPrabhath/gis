<link href="{{asset('frogetor/assets/plugins/dropify/css/dropify.min.css')}}" rel="stylesheet">
@extends('data_entry.layout.master')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Create Scholarship</h4>
                        <form action="{{url('data_entry/scholarship/store')}}" method="POST" autocomplete="off" id="regForm" enctype="multipart/form-data">
                            @csrf

                        <div class="row">
                            <div class="col-lg-6">

                                <div class="form-group row">
                                    <label for="stu_id" class="col-sm-3 col-form-label text-right">Student ID</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" value="" name="stu_id" id="stu_id">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label text-right">Discount Type</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="dis_type" id="dis_type">
                                            <option value="" selected>Select Type</option>
                                            <option value="1">Presantage</option>
                                            <option value="2">Amount</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row" id="pt_div">
                                    <label for="precentage" class="col-sm-3 col-form-label text-right">Presantage</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" value="" maxlength="4" name="precentage" id="precentage">
                                        <input class="form-control" type="hidden" value="" maxlength="4" name="prtg_am" id="prtg_am">
                                    </div>
                                </div>

                                <div class="form-group row" id="di_div">
                                    <label for="dicu_amo" class="col-sm-3 col-form-label text-right">Discount Amount</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" value="" name="dicu_amo" id="dicu_amo">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="end_date" class="col-sm-3 col-form-label text-right">Student Class Fee</label>
                                    <div class="col-sm-9">
                                        <label for="" id="total_lbl" style="margin-top: 5pt;" ></label>
                                        <input class="form-control" type="hidden" value="" name="total" id="total">
                                        <input class="form-control" type="hidden" value="" name="total_dis_amo" id="total_dis_amo">
                                    </div>
                                </div>

                                <div class="form-group row" id="year_c">
                                    <label for="year_count" class="col-sm-3 col-form-label text-right">Total Years</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" value="" maxlength="2" name="year_count" id="year_count">
                                    </div>
                                </div>

                                <div class="form-group row" id="year_c">
                                    <label for="year_count" class="col-sm-3 col-form-label text-right">Note</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="note" id="note" cols="30" rows="4"></textarea>
                                    </div>
                                </div>


                            </div>

                            <div class="col-lg-6">

                                <div class="form-group row">
                                    <label for="student_name" class="col-sm-3 col-form-label text-right">Student Name</label>
                                    <div class="col-sm-9">
                                        <label for="" id="stuid_lbl" style="margin-top: 5pt"></label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="student_name" class="col-sm-3 col-form-label text-right">Institute</label>
                                    <div class="col-sm-9">
                                        <label for="" id="ins_lbl" style="margin-top: 5pt"></label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="student_name" class="col-sm-3 col-form-label text-right">Grade</label>
                                    <div class="col-sm-9">
                                        <label for="" id="grd_lbl" style="margin-top: 5pt"></label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="grd_fee_lbl" class="col-sm-3 col-form-label text-right">Grade Fee</label>
                                    <div class="col-sm-9">
                                        <input type="hidden" id="grd_fee_hid">
                                        <label for="" id="grd_fee_lbl" style="margin-top: 5pt"></label>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="submit" id="x" class="btn btn-success waves-effect waves-light" style="color: white;"><i class="mdi mdi-check-all mr-2"></i>Submit</button>
                                    <a type="button" href="{{url('data_entry/scholarship')}}" class="btn btn-primary waves-effect waves-light" style="margin-left: 5px;"><i class="mdi mdi-close" style="margin-right: 5px;"></i>Close</a>
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
        $( document ).ready(function() {
            // console.log("Onload");
        $("#di_div").hide();
        $("#pt_div").hide();
        });

    </script>

<script>
    $(document).ready(function() {

    $("#dis_type").change(function(){
    var type = $('#dis_type').val();
    console.log(type);
    if(type == "1"){
        $("#di_div").hide();
        $("#pt_div").show();
        $( "#dicu_amo" ).val("")
        $( "#total_lbl" ).val("")
        $( "#total" ).val("")

    }else if (type == "2") {
        $("#di_div").show();
        $("#pt_div").hide();
        $( "#precentage" ).val("")
        $( "#total_lbl" ).val("")
        $( "#total" ).val("")
    } else {

    }

     });

     });

    </script>

    <script>

        $(document).ready(function() {

            $("#regForm").validate({
                rules: {
                    stu_id: {
                        required: true,
                        maxlength: 20
                    },
                    dis_type: {
                        required: true,
                    },
                    note: {
                        required: true,
                    },
                    precentage: {
                        required: function () {
                                // return $(this).find('#dis_type option:selected').val() == 1;
                                // console.log("wwwwwww");

                                if($("#dis_type").val() == 1){
                                    return true;
                                }
                            }
                    },
                    dicu_amo: {
                        // required: true,
                        required: function () {
                               // return $(this).find('#dis_type option:selected').val() == 2;

                               if($("#dis_type").val() == 2){
                                    return true;
                                }
                            },
                        number:true,
                    },
                    year_count: {
                        required: true,
                    }
                },
                messages: {
                    stu_id: {
                        required: "Student ID is required",
                        maxlength: "Student ID cannot be more than 20 characters"
                    },
                    dis_type: {
                        required: "Discount Type is required"
                    },
                    precentage: {
                        required: "Precentage is required",
                    },
                    dicu_amo: {
                        required: "Discount Amount is required"
                    },
                    year_count: {
                        required: "Year Count is required"
                    },
                    note: {
                        required: "Note is required"
                    }
                }
            });

        });

    </script>

<script>
    //   autocomplete
    $(document).ready(function(){
    //console.log("HI");
    $('#stu_id').autocomplete({

        source: function(request, response) {
          $.getJSON("{{ url('/data_entry/sholarship_st_id_num') }}",
           {stu_id:$("#stu_id").val()},
              response);
        },
        minLength: 1,
        width: "100%",
        open: function(event,ui){
            var autocomplete=$(".ui-autocomplete:visible");
            var oldTop=autocomplete.offset().top;
            var newTop = oldTop-$("#stu_id").height()+25;
            autocomplete.css("top", newTop);
        },
        select:function(event,ui){
            console.log(ui);
            document.getElementById('stuid_lbl').innerHTML = ui.item.student_name;
            document.getElementById('ins_lbl').innerHTML = ui.item.school;
            document.getElementById('grd_lbl').innerHTML = ui.item.gd_name;
            document.getElementById('grd_fee_lbl').innerHTML = ui.item.class_fee;
            document.getElementById('grd_fee_hid').value = ui.item.class_fee;


         },
    });
     });
 </script>
<script>
    //   autocomplete
    $(document).ready(function(){
        $("#precentage").keyup(function(){
            var amt = $("#grd_fee_hid").val();
            var ptg = $("#precentage").val();
            console.log(amt);
            console.log(ptg);

            var pramo = Math.round((amt * ptg) / 100);
            console.log(pramo);
            var cpramo = parseInt(amt) - parseInt(pramo);
            console.log(cpramo);
            document.getElementById('total').value = cpramo;
            document.getElementById('total_lbl').innerHTML = cpramo;
            document.getElementById('prtg_am').value = pramo;
        });
    });
</script>

<script>
    //   autocomplete
    $(document).ready(function(){
        $("#dicu_amo").keyup(function(){
            var amt = $("#grd_fee_hid").val();
            var ptg = $("#dicu_amo").val();
            console.log(amt);
            console.log(ptg);

            // var pramo = Math.round((amt * ptg) / 100);
            // console.log(pramo);
            var cpramo = parseInt(amt) - parseInt(ptg);
            console.log(cpramo);
            document.getElementById('total').value = cpramo;
            document.getElementById('total_lbl').innerHTML = cpramo;
            document.getElementById('total_dis_amo').value = cpramo;
        });
    });
</script>

    @stop

