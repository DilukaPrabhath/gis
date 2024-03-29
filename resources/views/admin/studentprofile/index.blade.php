<link href="{{asset('frogetor/assets/plugins/dropify/css/dropify.min.css')}}" rel="stylesheet">
@extends('admin.layout.master')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Search</h4>


                        {{-- <form action="{{url('/admin/student/find')}}" method="POST" autocomplete="off" id="regForm" enctype="multipart/form-data"> --}}
                            <form action="{{url('/admin/student/find')}}" method="POST" id="" enctype="multipart/form-data">
                            @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group row">

                                    <div class="col-sm-12">
                                        {{-- <select class="form-control" name="status" id="status">
                                            <option value="1" selected>Student ID</option>
                                            <option value="2" >Student Name</option>
                                        </select> --}}

                                        <input class="form-control" type="text" placeholder="Student ID" value="" name="student_id" id="student_id">
                                        @error('student_id')
                                        <div class="alert" style="color: #f93b7a;padding-left: 0px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <button type="submit" id="x" class="btn btn-success waves-effect waves-light" style="color: white;"><i class="mdi mdi-account-search-outline"></i>Search</button>
                                        <a type="button" href="{{url('/admin/student/profile')}}" class="btn btn-primary waves-effect waves-light" style="margin-left: 5px;"><i class="mdi mdi-close" style="margin-right: 5px;"></i>Close</a>
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
    //   autocomplete
    $(document).ready(function(){
    //console.log("HI");
    $('#stu_id').autocomplete({

        source: function(request, response) {
          $.getJSON("{{ url('/student/profile/id') }}",
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
