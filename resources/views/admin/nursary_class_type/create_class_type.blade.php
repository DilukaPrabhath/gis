<link href="{{asset('frogetor/assets/plugins/dropify/css/dropify.min.css')}}" rel="stylesheet">
{{-- <style>

div.sel_id {
    visibility: hidden;
}

</style> --}}

@extends('admin.layout.master')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-12">
                <form action="{{url('/admin/nursary/class_type/store')}}" method="POST" autocomplete="off" id="regForm" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Nursary Class Type</h4>
                        <div class="row" style="margin-bottom: 15px;">

                        </div>

                        <div class="row">

                            <div class="col-lg-6">

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label text-right">Institute</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="institute" name="institute">
                                            <option value="">Select</option>
                                            @foreach ($school as $inst)
                                            <option value="{{$inst['id']}}">{{$inst['institute_name']}}</option>
                                            @endforeach
                                        </select>
                                        @error('institute')
                                        <div class="alert" style="color: #f93b7a;padding-left: 0px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="class_types_name" class="col-md-3 col-form-label text-right">Class Type Name</label>
                                    <div class="col-md-9">
                                        <input type="text" id="class_types_name" name="class_types_name" class="form-control">
                                    @error('class_types_name')
                                        <div class="alert" style="color: #f93b7a;padding-left: 0px;">{{ $message }}</div>
                                    @enderror
                                    </div>

                                </div>



                                <div class="row">
                                    <div class="col-2"></div>
                                    <div class="form-group row">
                                        <button type="submit" id="x" class="btn btn-success waves-effect waves-light" style="color: white;"><i class="mdi mdi-check-all mr-2"></i>Submit</button>
                                        <a type="button" href="{{url('/admin/nursary/class_type')}}" class="btn btn-primary waves-effect waves-light" style="margin-left: 5px;"><i class="mdi mdi-close" style="margin-right: 5px;"></i>Close</a>
                                    </div>
                                </div>

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








    @stop
