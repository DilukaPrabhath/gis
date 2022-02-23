@extends('superadmin.layouts.master')
@section('content')

<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Payments</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Payments</li>
            </ol>
        </div>

    </div>

    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">

                          <div class="col-md-8" >
                            <form method="post" action="" id="frmdt" name="frmdt" autocomplete="off" enctype="multipart/form-data" >
                                {{ csrf_field() }}
                            <div class="form-group row">
                                <label for="example-month-input" class="col-md-2 col-form-label">Institute</label>
                                <div class="col-4">
                                    <select class="custom-select col-md-8" name="nic" id="nic">
                                        <option selected value="">Select Institute</option>
                                        <option value="1">INS/GAM/21070001</option>
                                        <option value="2">INS/GAM/21070002</option>
                                        <option value="3">INS/GAM/21070003</option>
                                        <option value="4">INS/GAM/21070004</option>
                                    </select>
                                @error('nic')
                                  <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                              <div class="form-group row">
                                  <label for="institute_name" class="col-2 col-form-label">Payment Amount</label>
                                  <div class="col-10">
                                    <input class="form-control" type="text" name="institute_name" id="institute_name">
                                    @error('institute_name')
                                    <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div>
                                    @enderror
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="Institute_email" class="col-2 col-form-label">Date</label>
                                  <div class="col-10">
                                    <input class="form-control" type="date" name="Institute_email" id="Institute_email" autocomplete="off">
                                    @error('Institute_email')
                                    <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div>
                                    @enderror
                                  </div>
                                </div>
                                <div class="form-group row">
                                    <label for="payment" class="col-md-2 col-form-label">Payment Type</label>
                                    <div class="col-10">
                                        <select class="custom-select" name="payment" id="payment" >
                                            <option selected value="">Select Type</option>
                                            <option value="1">Monthly</option>
                                            <option value="2">Anualy</option>
                                        </select>
                                    @error('payment')
                                      <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-12">

                                <input type="submit" class="btn btn-success" style="width: 100px;" value="Save">
                                <a class="btn btn-inverse waves-effect waves-light" href="{{url('superadmin/payments')}}" style="width: 100px; padding-top: 5px;">Back</a>
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
