<link href="{{asset('frogetor/assets/plugins/dropify/css/dropify.min.css')}}" rel="stylesheet">
{{-- <style>

div.sel_id {
    visibility: hidden;
}

</style> --}}

@extends('superadmin.layout.master')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">



            <div class="col-12">
                <form action="{{url('/superadmin/payments/store')}}" method="POST" autocomplete="off" id="regForm" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Class Fee Payment</h4>
                        <div class="row" style="margin-bottom: 15px;">

                            <div class="input-group col-6">
                                <input type="text" class="form-control" id="stu_id" name="stu_id" placeholder="Student ID" aria-label="">
                                <span class="input-group-append">
                                    <button class="btn btn-primary" id="go" name="go" style="height: 30pt;" type="button">Go</button>
                                </span>
                            </div>
                            @error('stu_id')
                            <div class="alert" style="color: #f93b7a;padding-left: 0px;">{{ $message }}</div>
                          @enderror

                        </div>

                        <div class="row">

                            <div class="col-lg-6">

                                <div class="form-group row">
                                    <label for="amout" class="col-md-3 col-form-label text-right">Amount</label>
                                    <div class="col-md-9">
                                        <input type="text" id="amout" name="amout" class="form-control">
                                    @error('amout')
                                        <div class="alert" style="color: #f93b7a;padding-left: 0px;">{{ $message }}</div>
                                    @enderror
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="prtg" class="col-sm-3 col-form-label text-right">Interest</label>
                                    <div class="col-3">
                                        <input type="text" class="form-control col-sm-9" id="prtg" name="prtg" value="" maxlength="2" aria-label="">
                                        @error('prtg')
                                        <div class="alert" style="color: #f93b7a;padding-left: 0px;">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label text-right">Total</label>
                                    <div class="col-sm-9">
                                        <input type="hidden" id="total" name="total" class="form-control">
                                        <label for="" id="total_lbl"></label>
                                        {{-- <div class="input-group-append">
                                            <span class="input-group-text">.00</span>
                                        </div> --}}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label text-right">Payment Type</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="pay_type" name="pay_type">
                                            <option value="">Select</option>
                                            <option value="1">Cash</option>
                                            <option value="2">Online</option>
                                            <option value="3">Cheque</option>
                                            <option value="4">Card</option>
                                        </select>
                                        @error('pay_type')
                                        <div class="alert" style="color: #f93b7a;padding-left: 0px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row" id="ref_num_div">
                                    <label for="example-tel-input" class="col-sm-3 col-form-label text-right">Date</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="date" value="" name="dip_date" id="dip_date">
                                    </div>
                                </div>

                                <div class="form-group row" id="dip_date_div">
                                    <label for="example-tel-input" class="col-sm-3 col-form-label text-right">Referance Number</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" value="" name="ref_num" id="ref_num">
                                    </div>
                                </div>

                                {{-- <div class="form-group row">
                                    <label class="col-sm-3 col-form-label text-right">Bank Name</label>
                                    <div class="col-sm-9">
                                        <select class="form-control">
                                            <option value="">Select</option>
                                            <option value="1">People Bank</option>
                                            <option value="2">Bank of Cylon</option>
                                        </select>
                                    </div>
                                </div> --}}

                                <div class="form-group row" id="ref_img_div">
                                    <label for="example-search-input" class="col-sm-3 col-form-label text-right">Recipt Image</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="ref_img" id="ref_img" class="dropify" />
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-2"></div>
                                    <div class="form-group row">
                                        <button type="submit" id="x" class="btn btn-success waves-effect waves-light" style="color: white;"><i class="mdi mdi-check-all mr-2"></i>Submit</button>
                                        <a type="button" href="{{url('superadmin/payments')}}" class="btn btn-primary waves-effect waves-light" style="margin-left: 5px;"><i class="mdi mdi-close" style="margin-right: 5px;"></i>Close</a>
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-6">

                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label text-right">Full Name</label>
                                    <div class="col-sm-9">
                                        <label for="" id="fnme" style="padding-top: 6px;"></label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label text-right">Grade</label>
                                    <div class="col-sm-9">
                                        <label for="" id="grad" style="padding-top: 6px;"></label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label text-right">Payment Type</label>
                                    <div class="col-sm-9">
                                        <label for="" id="pay_typelb" style="padding-top: 6px;"></label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label text-right">Totle Class Fee</label>
                                    <div class="col-sm-9">
                                        <label for="" id="tot_cls_fee_lb" style="padding-top: 6px;"></label>
                                    </div>
                                </div>
                                {{-- <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label text-right">Totle Paid Class Fee Amount</label>
                                    <div class="col-sm-9">
                                        <label for="" id="tot_paid_amo_lbl" style="padding-top: 6px;"></label>
                                    </div>
                                </div> --}}
                                {{-- <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label text-right">Due Amount</label>
                                    <div class="col-sm-9">
                                        <label for="" id="tot_due_amo_lb" style="padding-top: 6px;"></label>
                                    </div>
                                </div> --}}
                                <div class="form-group row" >

                                </div>

                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label text-right">Balance Forword</label>
                                    <div class="col-sm-9">
                                        <label for="" id="blnc_for_lbl" style="padding-top: 6px;"></label>
                                    </div>
                                </div>

                                {{-- <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label text-right">Sub Total</label>
                                    <div class="col-sm-9">
                                        <label for="" id="sub_totle" style="padding-top: 6px;"></label>
                                    </div>
                                </div> --}}

                                {{-- <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label text-right">Totle Anual Payment</label>
                                    <div class="col-sm-9">
                                        <label for="" style="padding-top: 6px;"></label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label text-right">Due Payment</label>
                                    <div class="col-sm-9">
                                        <label for="" style="padding-top: 6px;"></label>
                                    </div>
                                </div> --}}

                            </div>





                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
            </form>
        </div> <!-- end row -->


    </div>
    @stop

    @section('scripts')
    <script src="{{asset('frogetor/assets/plugins/dropify/js/dropify.min.js')}}"></script>
    <script src="{{asset('frogetor/assets/pages/jquery.form-upload.init.js')}}"></script>

    {{-- <script>
        $(document).ready(function() {
            $("#regForm").validate({
                rules: {
                    stu_id: {
                        required: true,
                        // maxlength: 150,

                    },
                    amout:{
                        required: true,
                        // maxlength: 7,
                        // number: true,
                        // eml:function(element){return $("#email").val()!= ''},

                    },
                    prtg: {
                        required: true,
                        // maxlength: 4,
                        // number: true,
                    }

                },
                messages: {
                    stu_id: {
                        required: "Student ID is required",
                        //maxlength: "Student ID cannot be more than 150 characters"
                    },
                    amout: {
                        required: "Amount is required",
                        //maxlength: "Amount cannot be more than 7 characters",
                        //eml:"Alredy exist"
                    },
                    prtg: {
                        required: "Presantage is required",
                        //maxlength: "Presantage must be of 4 digits",
                    }
                }
            });

        });

    </script> --}}

    <script>
        $(document).ready(function(){
          $("#prtg").keyup(function(){
            var amt = $("#amout").val();
            var ptg = $("#prtg").val();
            console.log(amt);
            console.log(ptg);
            //var pramo = amt * ptg / 100;
            // var pramo = Number(amt + ( amt * ptg / 100 )).toFixed(2);
            var pramo = Math.round((amt * ptg) / 100);
            console.log(pramo);
            var cpramo = parseInt(pramo) + parseInt(amt);
            console.log(cpramo);
            document.getElementById('total').value = cpramo;
            document.getElementById('total_lbl').innerHTML = cpramo;

          });
        });
    </script>


    <script>


    $(document).ready(function(){
        $("#go").click(function(){
          var stu_id = $("#stu_id").val();
        if (stu_id == null) {

          console.log("empty");


        }else{
        load_data();

          console.log("not empty");
        }
        });

        //function for laod data
      function load_data(){
        var stu_id = $("#stu_id").val();
        if(stu_id == ''){
        }else{
          $.ajax({
          type:"POST",
          url:"{{ url('/superadmin/select_pay_student') }}",
          async:false,
          data:{"stu_id": stu_id},
          headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          beforeSend: function(){},
          success: function(data){
           if(data[0].pamt_typ == 1){var py_ty = "Anualy"}else if(data[0].pamt_typ == 2){var py_ty = "Quater"}else if(data[0].pamt_typ == 3){var py_ty = "Monthly"}else{var py_ty = ""}
           if(data[0].grade_now == 1){var grd = "Grade 01"}else if(data[0].grade_now == 2){var grd = "Grade 02"}else if(data[0].grade_now == 3){var grd = "Grade 03"}else if(data[0].grade_now == 4){var grd = "Grade 04"}else if(data[0].grade_now == 5){var grd = "Grade 05"}else if(data[0].grade_now == 6){var grd = "Grade 06"}else if(data[0].grade_now == 7){var grd = "Grade 07"}else if(data[0].grade_now == 8){var grd = "Grade 08"}else if(data[0].grade_now == 9){var grd = "Grade 09"}else if(data[0].grade_now == 10){var grd = "Grade 10"}else if(data[0].grade_now == 11){var grd = "Grade 11"}else if(data[0].grade_now == 12){var grd = "Grade 12"}else if(data[0].grade_now == 13){var grd = "Grade 13"}else{var grd = ""}
           document.getElementById('fnme').innerHTML = data[0].student_full_name;
           document.getElementById('grad').innerHTML = grd;
           document.getElementById('pay_typelb').innerHTML = py_ty;
           document.getElementById('tot_cls_fee_lb').innerHTML = data[0].grade_fee;
          // document.getElementById('tot_paid_amo_lbl').innerHTML = data[0].total_need_pay;
        //    document.getElementById('tot_paid_amo').src = "client/"+data[0].pmg;
        //    document.getElementById('tot_due_amo_lb').innerHTML = data[0].due_fee;
           document.getElementById('blnc_for_lbl').innerHTML  = data[0].due_fee;
        //    document.getElementById('intrest').value     = data[0].cid;
          },
          error:function(){ $("body").css("cursor","default"); console.log("Error");  }
      });
        }

      }



      });

    </script>

    <script>
        //   autocomplete
        $(document).ready(function(){
        //console.log("HI");
        $('#stu_id').autocomplete({

            source: function(request, response) {
              $.getJSON("{{ url('/superadmin/class_st_id_num') }}",
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
                console.log('success!');

             },
        });
         });
     </script>

    <script>

        $( document ).ready(function() {

        $("#ref_num_div").hide();
        $("#dip_date_div").hide();
        $("#ref_img_div").hide();
        });
    </script>

    <script>
    $(document).ready(function() {

    $("#pay_type").change(function(){
    var cah = $('#pay_type').val();
    console.log(cah);
    if(cah!="1"){
        $("#ref_num_div").show();
        $("#dip_date_div").show();
        $("#ref_img_div").show();

    }else{
        console.log("HI not 2");
        $("#ref_num_div").hide();
        $("#dip_date_div").hide();
        $("#ref_img_div").hide();
        $( "#ref_num" ).val("")
        $( "#dip_date" ).val("")
        $( "#ref_img" ).val("")
        $("input[type='file']").textinput("refresh");
       }

     // $('#ira').val(rt);
     });

     });

    </script>



    @stop
