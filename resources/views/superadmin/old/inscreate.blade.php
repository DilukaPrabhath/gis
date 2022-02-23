@extends('superadmin.layouts.master')
@section('content')

<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>

    </div>

    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">

                          <div class="col-md-8" >
                            <form method="post" action="{{url('/superadmin/institutes/store')}}" id="frmdt" name="frmdt" autocomplete="off" enctype="multipart/form-data" >
                                {{ csrf_field() }}
                            <div class="form-group row">
                                <label for="example-month-input" class="col-md-2 col-form-label">Admin</label>
                                <div class="col-4">
                                    <select class="custom-select col-md-8" name="nic" id="nic">
                                        <option selected value="">Select Admin</option>
                                        @foreach($users as $data)
                                        <option value="{{$data->id}}">{{$data->nic}}</option>
                                        @endforeach
                                    </select>
                                @error('nic')
                                  <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                              <div class="form-group row">
                                  <label for="institute_name" class="col-2 col-form-label">Institute Name</label>
                                  <div class="col-10">
                                    <input class="form-control" type="text" name="institute_name" id="institute_name">
                                    @error('institute_name')
                                    <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div>
                                    @enderror
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="institute_address" class="col-2 col-form-label">Institute Address</label>
                                  <div class="col-10">
                                    <input class="form-control" type="text" name="institute_address" id="institute_address">
                                    @error('institute_address')
                                    <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div>
                                    @enderror
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="Institute_email" class="col-2 col-form-label">Institute E Mail</label>
                                  <div class="col-10">
                                    <input class="form-control" type="email" name="Institute_email" id="Institute_email" autocomplete="off">
                                    @error('Institute_email')
                                    <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div>
                                    @enderror
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="telephone" class="col-2 col-form-label">Institute Telephone</label>
                                  <div class="col-10">
                                    <input class="form-control" type="tel" name="telephone" id="telephone">
                                    @error('telephone')
                                    <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div>
                                    @enderror
                                  </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-month-input" class="col-md-2 col-form-label">Payment Type</label>
                                    <div class="col-4">
                                        <select class="custom-select col-md-6" name="payment" id="payment" >
                                            <option selected value="">Select Type</option>
                                            <option value="1">Monthly</option>
                                            <option value="2">Anualy</option>
                                        </select>
                                    @error('payment')
                                      <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-month-input" class="col-md-2 col-form-label">Card Type</label>
                                    <div class="col-4">
                                        <select class="custom-select col-md-6" name="card" id="card">
                                            <option selected value="">Select Type</option>
                                            <option value="1">Laminate</option>
                                            <option value="2">Plastic</option>
                                        </select>
                                    @error('card')
                                      <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>
                          </div>
                          <div class="col-md-4" >
                              <div class="form-group row">
                                  <label for="img" class="col-6 col-form-label">Institute Logo</label>
                                </div>
                              <div class="form-group row">
                                  <div class="col-10">
                                      <input type="file" name="image" style="text-align: center;" id="input-file-now-custom-2 " class="dropify" data-max-file-size="1M" data-max-height="3000" data-height="200" />
                                  </div>
                                </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-12">

                                <input type="submit" class="btn btn-success" style="width: 100px;" value="Save">
                                <a class="btn btn-inverse waves-effect waves-light" href="{{url('superadmin/institutes')}}" style="width: 100px; padding-top: 5px;">Back</a>
                            </div>
                        </div>
                        </form>
                      </div>
                          <hr>

                      </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->

</div>


@stop
