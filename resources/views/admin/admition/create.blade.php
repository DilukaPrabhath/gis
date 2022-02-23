
@extends('admin.layout.master')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Create Admition Payments</h4>
                        <form action="{{url('admin/admition/store')}}" method="POST" autocomplete="off" id="regForm" enctype="multipart/form-data">
                            @csrf

                        <div class="row">
                            <div class="col-lg-6">

                                <div class="form-group row">
                                    <label for="st_id_num" class="col-sm-3 col-form-label text-right">Student ID Number</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" value="" name="st_id_num" id="st_id_num">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="price" class="col-sm-3 col-form-label text-right">Price</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" value="" name="price" id="price">
                                    </div>
                                </div>


                            </div>


                            <div class="col-lg-6">



                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="submit" id="x" class="btn btn-success waves-effect waves-light" style="color: white;"><i class="mdi mdi-check-all mr-2"></i>Submit</button>
                                    <a type="button" href="{{url('admin/admition')}}" class="btn btn-primary waves-effect waves-light" style="margin-left: 5px;"><i class="mdi mdi-close" style="margin-right: 5px;"></i>Close</a>
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
                    st_id_num: {
                        required: true,
                        maxlength: 20,
                        remote:'/validate-admition-pay',
                    },
                    price: {
                        required: true,
                        maxlength: 7,
                        number: true,
                    },

                },
                messages: {
                    st_id_num: {
                        required: "Student Number is required",
                        maxlength: "Student Number cannot be more than 20 characters",
                        remote:"Student ID Not Available",
                    },
                    price: {
                        required: "Price is required",
                        maxlength: "Price cannot be more than 7 characters",

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

