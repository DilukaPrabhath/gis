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
                <form action="{{url('/admin/nursary/grade_type/store')}}" method="POST" autocomplete="off" id="regForm" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Nursary Class Type View</h4>
                        <div class="row" style="margin-bottom: 15px;">

                        </div>

                        <div class="row">

                            <div class="col-lg-6">
                                <input type="hidden" name="id" value="{{$id}}">

                                <div class="form-group row">
                                    <label for="grade_types_name" class="col-md-3 col-form-label text-right">Grade Type Name</label>
                                    <div class="col-md-9">
                                        <input type="text" id="grade_types_name" name="grade_types_name" value="{{}}" class="form-control">
                                    @error('grade_types_name')
                                        <div class="alert" style="color: #f93b7a;padding-left: 0px;">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="grade_types_name" class="col-md-3 col-form-label text-right">Status</label>
                                    <div class="col-md-9">
                                       @if ()

                                       @endif
                                    @error('grade_types_name')
                                        <div class="alert" style="color: #f93b7a;padding-left: 0px;">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-2"></div>
                                    <div class="form-group row">
                                        <button type="submit" id="x" class="btn btn-success waves-effect waves-light" style="color: white;"><i class="mdi mdi-check-all mr-2"></i>Submit</button>
                                        <a type="button" href="{{url('/admin/nursary/class_type/store')}}" class="btn btn-primary waves-effect waves-light" style="margin-left: 5px;"><i class="mdi mdi-close" style="margin-right: 5px;"></i>Close</a>
                                    </div>
                                </div>

                            </div>


                        </div>

                    </div>
                </div>
            </div> <!-- end col -->
            </form>
        </div> <!-- end row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">Grade Type Table</h4>


                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Grade Type Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            @foreach ($data as $grade)
                            <tr>
                                <td>{{$grade->grade_types_name}}</td>
                                <td>
                                    @if ($grade->status == 1)
                                        <span>Active</span>
                                    @elseif ($grade->status == 0)
                                        <span>Deactive</span>
                                    @endif
                                </td>
                                <th>
                                    <a href="{{url('admin/nursary/class_type/view')}}/{{$grade->id}}" target="_blank" type="button" class="btn btn-dropbox">
                                        <i class="fab far fa-eye" style="color: white; font-size:8px;"></i>
                                    </a>
                                    <a href="{{url('admin/nursary/class_type/edit')}}/{{$grade->id}}" target="_blank" type="button" class="btn btn-danger ">
                                        <i class="fab far fa-eye" style="color: white; font-size:8px;"></i>
                                    </a>
                                    <a href="{{url('admin/nursary/class_type/add')}}/{{$grade->id}}" target="_blank" type="button" class="btn btn-warning">
                                        <i class="fab far fa-eye" style="color: white; font-size:8px;"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach

                            <tbody>


                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div>
    @stop

    @section('scripts')
    <script src="{{asset('frogetor/assets/plugins/dropify/js/dropify.min.js')}}"></script>
    <script src="{{asset('frogetor/assets/pages/jquery.form-upload.init.js')}}"></script>


    @stop
