
@extends('admin.layout.master')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Update Nursery Grade</h4>
                        <form action="{{url('admin/nursery_grade/update')}}/{{$data->id}}" method="POST" autocomplete="off" id="regForm" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="data_id" value="{{$data->id}}">
                        <div class="row">
                            <div class="col-lg-6">

                                <div class="form-group row">
                                    <label for="nursery_class_id" class="col-sm-3 col-form-label text-right"><span style="color: #f93b7a">*</span>Nursery Class Name</label>
                                    <div class="col-sm-9">
                                    <select class="form-control" name="nursery_class_id" id="nursery_class_id">
                                        <option value="">Select Class</option>
                                        @foreach ($class as $val)
                                        <option value="{{$val->id}}" {{ $val->id == $data->nursery_class_id ? 'selected' : '' }}>{{$val->nursery_class_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('nursery_class_id')
                                        <div class="alert" style="color: #f93b7a;padding-left: 0px;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                                <div class="form-group row">
                                    <label for="grade_name" class="col-sm-3 col-form-label text-right"><span style="color: #f93b7a">*</span>Grade Name</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" value="{{$data->grade_name}}" name="grade_name" id="grade_name">
                                    </div>
                                    @error('grade_name')
                                        <div class="alert" style="color: #f93b7a;padding-left: 0px;">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <label for="nursery_grade_status" class="col-sm-3 col-form-label text-right"><span style="color: #f93b7a">*</span>Nursery Grade Status</label>
                                    <div class="col-sm-9">
                                    <select class="form-control" name="nursery_grade_status" id="nursery_grade_status">
                                        <option value="">Select Status</option>
                                        <option value="1" {{$data->status=='1'?'selected':''}}>Active</option>
                                        <option value="2" {{$data->status=='2'?'selected':''}}>Deactive</option>
                                    </select>
                                    @error('nursery_grade_status')
                                        <div class="alert" style="color: #f93b7a;padding-left: 0px;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="submit" id="x" class="btn btn-success waves-effect waves-light" style="color: white;"><i class="mdi mdi-check-all mr-2"></i>Submit</button>
                                    <a type="button" href="{{url('admin/nursery_grades')}}" class="btn btn-primary waves-effect waves-light" style="margin-left: 5px;"><i class="mdi mdi-close" style="margin-right: 5px;"></i>Close</a>
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
               // var class_id = $('#nursery_class_name').val();
                rules: {
                    grade_name: {
                        required: true,
                        maxlength: 70,
                        remote:{
                            url:'/validate_update-nursery_grade_name',
                            // data: {'class_id': class_id},
                            data: {'class_id':function(){return $('#nursery_class_id').val()},'grd_id':function(){return $('#data_id').val()}},
                            async:false
                        }
                    },
                    nursery_class_id: {
                        required: true,
                    },
                    nursery_grade_status: {
                        required: true,
                        maxlength: 7,
                        number: true,
                    },

                },
                messages: {
                    grade_name: {
                        required: "Nursery Grade name is required",
                        maxlength: "Nursery Grade name cannot be more than 70 characters",
                        remote: "Nursery Grade name alredy Available",
                    },
                    nursery_class_id: {
                        required: "Nursery Class Name is required",
                    },
                    nursery_grade_status: {
                        required: "Nursery Grade status is required",
                    }
                }
            });

        });


    </script>


    @stop

