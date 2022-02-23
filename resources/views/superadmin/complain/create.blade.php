<link href="{{asset('frogetor/assets/plugins/dropify/css/dropify.min.css')}}" rel="stylesheet">
@extends('superadmin.layout.master')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Complaints</h4>

                        <form action="{{url('/superadmin/complaints/store')}}" method="POST" autocomplete="off" id="regForm" enctype="multipart/form-data">
                            @csrf
                        <div class="row" style="margin-bottom: 15px;">

                            <div class="input-group col-6">
                                <input class="form-control" type="text" placeholder="Student ID" value="" name="stu_id" id="stu_id">

                            </div>
                        </div>

                        <div class="row">

                            <div class="col-lg-6">

                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label text-right">Full Name</label>
                                    <div class="col-sm-9">
                                        <label for="" id="lbl_nm" style="padding-top: 6px;"></label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label text-right">Institute</label>
                                    <div class="col-sm-9">
                                        <label for="" id="lbl_ins" style="padding-top: 6px;"></label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label text-right">Grade</label>
                                    <div class="col-sm-9">
                                        <label for="" id="lbl_grd" style="padding-top: 6px;"></label>
                                    </div>
                                </div>

                            </div>


                            <div class="col-lg-6">

                                <input type="hidden" id="ins" name="ins">
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label text-right">Complaints</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" rows="2" id="complaints" name="complaints"></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-3 col-form-label text-right">Discription</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" rows="2" id="discription" name="discription"></textarea>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-2"></div>
                                    <div class="form-group row">
                                        <button type="submit" class="btn btn-success waves-effect waves-light" style="color: white;"><i class="mdi mdi-check-all mr-2"></i>Submit</button>
                                        <a type="button" href="{{url('/home')}}" class="btn btn-primary waves-effect waves-light" style="margin-left: 5px;"><i class="mdi mdi-close" style="margin-right: 5px;"></i>Close</a>
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

            $("#regForm").validate({
                rules: {
                    stu_id: {
                        required: true,
                        maxlength: 20,
                        remote:'/superadmin/validate_profile',
                    },
                    complaints: {
                        required: true,
                        maxlength: 100,
                    },
                    discription: {
                        required: true,
                        maxlength: 300,
                    },
                },
                messages: {
                    stu_id: {
                        required: "Student ID is required",
                        maxlength: "Student ID cannot be more than 20 characters",
                        remote : "Student ID Not Exsist."
                    },
                    complaints:{
                        required: "Complaints is required",
                        maxlength: "Complaints cannot be more than 100 characters",
                    },
                    discription:{
                        required: "Discription is required",
                        maxlength: "Discription cannot be more than 300 characters",
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
          $.getJSON("{{ url('/superadmin/complaints/students/search') }}",
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

            document.getElementById('lbl_nm').innerHTML = ui.item.student_name;
            document.getElementById('lbl_ins').innerHTML = ui.item.ins;
            document.getElementById('lbl_grd').innerHTML = ui.item.grd;
            document.getElementById('ins').value = ui.item.ins_id;

         },
    });
     });
          </script>
    @stop
