
@extends('admin.layout.master')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Create Nursery Classes</h4>
                        <form action="{{url('admin/nursery_classes/store')}}" method="POST" autocomplete="off" id="regForm" enctype="multipart/form-data">
                            @csrf

                        <div class="row">
                            <div class="col-lg-6">

                                <div class="form-group row">
                                    <label for="nursery_class_name" class="col-sm-3 col-form-label text-right">Nursery Classes Name</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" value="" name="nursery_class_name" id="nursery_class_name">
                                    </div>
                                    @error('nursery_class_name')
                                        <div class="alert" style="color: #f93b7a;padding-left: 0px;">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <label for="nursery_class_status" class="col-sm-3 col-form-label text-right">Nursery Classes Status</label>
                                    <div class="col-sm-9">
                                    <select class="form-control" name="nursery_class_status" id="nursery_class_status">
                                        <option value="">Select Type</option>
                                        <option value="1">Active</option>
                                        <option value="2">Inactive</option>
                                    </select>
                                    @error('nursery_class_status')
                                        <div class="alert" style="color: #f93b7a;padding-left: 0px;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="submit" id="x" class="btn btn-success waves-effect waves-light" style="color: white;"><i class="mdi mdi-check-all mr-2"></i>Submit</button>
                                    <a type="button" href="{{url('admin/nursery_classes')}}" class="btn btn-primary waves-effect waves-light" style="margin-left: 5px;"><i class="mdi mdi-close" style="margin-right: 5px;"></i>Close</a>
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
                    nursery_class_name: {
                        required: true,
                        maxlength: 70,
                        remote:'/validate-nursery_class_name',
                    },
                    nursery_class_status: {
                        required: true,
                        maxlength: 7,
                        number: true,
                    },

                },
                messages: {
                    nursery_class_name: {
                        required: "Nursery class name is required",
                        maxlength: "Nursery class name cannot be more than 70 characters",
                        remote:"Nursery class name Not Available",
                    },
                    nursery_class_status: {
                        required: "Nursery class status is required",

                    }
                }
            });

        });


    </script>

<script>
    //   autocomplete
    $(document).ready(function(){
    //console.log("HI");
    $('#st_id_num').autocomplete({

        source: function(request, response) {
          $.getJSON("{{ url('/admition/student_id') }}",
           {st_id_num:$("#st_id_num").val()},
              response);
        },
        minLength: 1,
        width: "100%",
        open: function(event,ui){
            var autocomplete=$(".ui-autocomplete:visible");
            var oldTop=autocomplete.offset().top;
            var newTop = oldTop-$("#st_id_num").height()+25;
            autocomplete.css("top", newTop);
        },
        select:function(event,ui){
            console.log('success!');

         },
    });
     });
          </script>


    @stop

