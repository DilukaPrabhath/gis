<link href="{{asset('frogetor/assets/plugins/dropify/css/dropify.min.css')}}" rel="stylesheet">
@extends('registar.layout.master')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Search</h4>


                        <form action="{{url('/registar/student/find')}}" method="POST" autocomplete="off" id="regForm" enctype="multipart/form-data">
                            @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group row">

                                    <div class="col-sm-12">
                                        <input class="form-control" type="text" placeholder="Student ID" value="" name="stu_id" id="stu_id">
                                        @error('stu_id')
                                        <div class="alert" style="color: #f93b7a;padding-left: 0px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <button type="submit" id="x" class="btn btn-success waves-effect waves-light" style="color: white;"><i class="mdi mdi-account-search-outline"></i>Search</button>
                                        <a type="button" href="{{url('/registar/student/profile')}}" class="btn btn-primary waves-effect waves-light" style="margin-left: 5px;"><i class="mdi mdi-close" style="margin-right: 5px;"></i>Close</a>
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
                        remote:'/registar/validate_profile',
                    },
                },
                messages: {
                    stu_id: {
                        required: "Student ID is required",
                        maxlength: "Student ID cannot be more than 20 characters",
                        remote : "Student ID Not Exsist."
                    },

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
          $.getJSON("{{ url('/registar/student/profile/id') }}",
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
            // var father_name = ui.item.father_name;
            // var father_mobile = ui.item.father_mobile;
            // var father_email = ui.item.father_email;
            // var father_work_address = ui.item.father_work_address;
            // var parent_ocupation = ui.item.parent_ocupation;

            // document.getElementById('father_name').value = father_name;
            // document.getElementById('father_email').value = father_email;
            // document.getElementById('father_mobile').value = father_mobile;
            // document.getElementById('father_address_of_work_place').value = father_work_address;
            // document.getElementById('father_occupation').value = parent_ocupation;
         },
    });
     });
          </script>
    @stop
