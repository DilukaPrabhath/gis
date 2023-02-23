
@extends('admin.layout.master')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">View Nursery Grade</h4>
                        <form action="" method="POST" autocomplete="off" id="regForm" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="data_id" value="{{$data->id}}">
                        <div class="row">
                            <div class="col-lg-6">

                                <div class="form-group row">
                                    <label for="nursery_class_id" class="col-sm-3 col-form-label text-right">Nursery Class Name</label>
                                    <div class="col-sm-9">
                                    <select class="form-control" name="nursery_class_id" id="nursery_class_id" disabled>
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
                                    <label for="grade_name" class="col-sm-3 col-form-label text-right">Grade Name</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" value="{{$data->grade_name}}" name="grade_name" id="grade_name" readonly>
                                    </div>
                                    @error('grade_name')
                                        <div class="alert" style="color: #f93b7a;padding-left: 0px;">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <label for="nursery_grade_status" class="col-sm-3 col-form-label text-right">Nursery Grade Status</label>
                                    <div class="col-sm-9">
                                    <select class="form-control" name="nursery_grade_status" id="nursery_grade_status" disabled>
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



    @stop

