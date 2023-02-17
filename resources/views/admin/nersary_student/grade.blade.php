<link href="{{asset('frogetor/assets/plugins/dropify/css/dropify.min.css')}}" rel="stylesheet">
@extends('admin.layout.master')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Grade Update</h4>
                        <form action="{{url('admin/nursary/grade/update/store')}}/{{$id}}" method="POST" autocomplete="off" id="regForm" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-right">Class Now</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="class_new" name="class_new">
                                            <option value="">Select</option>
                                            @foreach($class as $class_new)
                                            <option value="{{$class_new->id}}"  {{ $class_new->id == $data->grade_now ? 'selected' : '' }}>{{$class_new->nursery_class_name}}</option>
                                            @endForeach
                                        </select>
                                        @error('class_new')
                                            <div class="alert" style="color: #f93b7a;padding-left: 0px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-right">Grade to Update</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="grade_to_update" name="grade_to_update">
                                            <option value="">Select</option>

                                        </select>
                                        @error('grade_to_update')
                                            <div class="alert" style="color: #f93b7a;padding-left: 0px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-right">Grade to year</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="grade_to_year" name="grade_to_year">
                                            <option value="">Select</option>
                                            @foreach($new_years as $new_years_gd)
                                            <option value="{{$new_years_gd}}" >{{$new_years_gd}}</option>
                                            @endForeach
                                        </select>
                                        @error('grade_to_year')
                                            <div class="alert" style="color: #f93b7a;padding-left: 0px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>



                                </div>

                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="submit" id="x" class="btn btn-success waves-effect waves-light" style="color: white;"><i class="mdi mdi-check-all mr-2"></i>Submit</button>
                                    <a type="button" href="{{url('admin/school/students/table')}}" class="btn btn-primary waves-effect waves-light" style="margin-left: 5px;"><i class="mdi mdi-close" style="margin-right: 5px;"></i>Close</a>
                                </div>
                            </div>

                        </form>
                        </div>
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
                    event: {
                        required: true,
                        maxlength: 100
                    },
                    institute: {
                        required: true,
                    },
                    date: {
                        required: true,
                    },
                    time: {
                        required: true,
                        greaterThan: "d",
                    },
                    venue: {
                        required: true,
                    },
                    status: {
                        required: true,
                    }

                },
                messages: {
                    activity: {
                        required: "Activity Name is required",
                        maxlength: "Activity Name cannot be more than 100 characters"
                    },
                    institute: {
                        required: "School is required"
                    },
                    date: {
                        required: "Date is required",
                        greaterThan: "DDD"
                    },
                    time: {
                        required: "Time is required"
                    },
                    venue: {
                        required: "Venue is required"
                    },
                    status: {
                        required: "Status is required"
                    }
                }
            });

        });

        $(document).ready(function() {
            $("#class_new").on('change', function() {
                var class_id = $(this).val();
                //   console.log(year);
                if (class_id) {
                    $.ajax({
                        url: "{{ url('admin/get/grades') }}",
                        type: "POST",
                        data: {
                            class_id: class_id,
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data) {
                            $('#grade_to_update').html(data);
                        },
                    });
                } else {
                    console.log("Eroor!");
                }
           });
     });
    </script>


    @stop
