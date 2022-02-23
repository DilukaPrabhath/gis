<link href="{{asset('frogetor/assets/plugins/dropify/css/dropify.min.css')}}" rel="stylesheet">
@extends('registar.layout.master')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Create Bank</h4>


                        <form action="{{url('/registar/banks/store')}}" method="POST" autocomplete="off" id="regForm" enctype="multipart/form-data">
                            @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label for="bank_name" class="col-sm-2 col-form-label text-right">Bank Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="" name="bank_name" id="bank_name">
                                        @error('bank_name')
                                        <div class="alert" style="color: #f93b7a;padding-left: 0px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-right">Status</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="status" id="status">
                                            <option value="">Select</option>
                                            <option value="1" selected>Active</option>
                                            <option value="2">Inactive</option>
                                        </select>
                                        @error('status')
                                        <div class="alert" style="color: #f93b7a;padding-left: 0px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <button type="submit" id="x" class="btn btn-success waves-effect waves-light" style="color: white;"><i class="mdi mdi-check-all mr-2"></i>Submit</button>
                                        <a type="button" href="{{url('/registar/banks')}}" class="btn btn-primary waves-effect waves-light" style="margin-left: 5px;"><i class="mdi mdi-close" style="margin-right: 5px;"></i>Close</a>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-6">
                                <div class="form-group row">


                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Bank Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>


                            <tbody>
                                @foreach ($data as $value)
                                <tr>
                                    <td>{{$value->bank_name}}</td>
                                    <td>@if ($value->status == 1)
                                        <span class="badge badge-success">Active</span>
                                       @elseif ($value->status == 2)
                                        <span class="badge badge-danger">Inactive</span>
                                       @endif
                                    </td>
                                    <td>
                                        <a href="{{url('registar/banks/edit')}}/{{$value->id}}" type="button" class="btn btn-danger">
                                            <i class="fab fas fa-pencil-alt" style="color: white; font-size:8px;"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach


                            </tbody>
                        </table>

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
                    bank_name: {
                        required: true,
                        maxlength: 100,
                        remote:'/registar/validate-bank',
                    },
                    status: {
                        required: true,
                    }

                },
                messages: {
                    bank_name: {
                        required: "Bank Name is required",
                        maxlength: "Bank Name cannot be more than 100 characters",
                        remote : "Bank Name alredy taken."
                    },
                    status: {
                        required: "Status is required"
                    }
                }
            });

        });

    </script>
    @stop
