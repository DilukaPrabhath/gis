
@extends('accountant.layout.master')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Create Activity Payments</h4>
                        <form action="{{url('accountant/activities_payments/store')}}" method="POST" autocomplete="off" id="regForm" enctype="multipart/form-data">
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
                                    <label for="activity" class="col-sm-3 col-form-label text-right">Activity</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="activity" id="activity">
                                            <option value="">Select</option>
                                            @foreach($acti as $cls)
                                            <option value="{{$cls->id}}" {{ old('grade') ==$cls->id ? 'selected="selected"' : '' }}>{{$cls->activity}}</option>
                                            @endForeach
                                        </select>
                                        @error('activity')
                                        <div class="alert" style="color: #f93b7a;padding-left: 0px;">{{ $message }}</div>
                                        @enderror
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
                                    <a type="button" href="{{url('accountant/activities_payments/create')}}" class="btn btn-primary waves-effect waves-light" style="margin-left: 5px;"><i class="mdi mdi-close" style="margin-right: 5px;"></i>Close</a>
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
                        maxlength: 15,
                        remote:'/accountant/validate-activity-pay',
                    },
                    activity: {
                        required: true,
                    },
                    price: {
                        required: true,
                        maxlength: 7,
                        number: true,
                    },

                },
                messages: {
                    st_id_num: {
                        required: "Inquery Number is required",
                        maxlength: "Inquery Number cannot be more than 13 characters",
                        remote:"Student ID Not Available",
                    },
                    activity: {
                        required: "Inquery Number is required",
                    },
                    price: {
                        required: "Price is required",
                        maxlength: "Price cannot be more than 4 characters",

                    }
                }
            });

        });


    //get price
    $(document).ready(function () {
    $(document).on('change', '#activity', function() {
        var activity_id = $(this).val();
        console.log('activity_id');
        if(activity_id == ''){
            document.getElementById('price').value = " ";
        }
        $.ajax({
            type: 'post',
            url: '{{ url('/accountant/activity_price_get') }}',
            data: {'id':activity_id},
            headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function(data){
                console.log(data);
                document.getElementById('price').value = data;
                // //alert("Success!");
                // $('#branch1').html(data);
                // $('#branch1').selectpicker('refresh');

            },
            error: function(){
                console.log('success');
            },

        });
    });
});

    </script>

<script>
    //   autocomplete
    $(document).ready(function(){
    //console.log("HI");
    $('#st_id_num').autocomplete({

        source: function(request, response) {
          $.getJSON("{{ url('/accountant/student_id') }}",
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

