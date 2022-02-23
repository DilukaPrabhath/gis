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
                            <form method="post" action="{{url('/superadmin/institutes/update')}}/{{$institute->id}}" id="frmdt" name="frmdt" autocomplete="off" enctype="multipart/form-data" >
                                {{ csrf_field() }}
                                <div class="form-group row">
                                    <label for="institute_name" class="col-2 col-form-label">Institute ID</label>
                                    <div class="col-10">
                                      <input class="form-control" value="{{$institute->inst_num}}" type="text" disabled>
                                      @error('institute_name')
                                      <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div>
                                      @enderror
                                    </div>
                                  </div>
                              <div class="form-group row">
                                  <label for="institute_name" class="col-2 col-form-label">Institute Name</label>
                                  <div class="col-10">
                                    <input class="form-control" type="text" value="{{$institute->institute}}" name="institute_name" id="institute_name">
                                    @error('institute_name')
                                    <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div>
                                    @enderror
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="institute_address" class="col-2 col-form-label">Institute Address</label>
                                  <div class="col-10">
                                    <input class="form-control" type="text" value="{{$institute->address}}"  name="institute_address" id="institute_address">
                                    @error('institute_address')
                                    <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div>
                                    @enderror
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="email" class="col-2 col-form-label">Institute E Mail</label>
                                  <div class="col-10">
                                    <input class="form-control" type="email" value="{{$institute->email}}" name="email" id="email" autocomplete="off">
                                    @error('email')
                                    <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div>
                                    @enderror
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="telephone" class="col-2 col-form-label">Institute Telephone</label>
                                  <div class="col-10">
                                    <input class="form-control" type="number" name="telephone" id="telephone" value="{{$institute->tele}}">
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
                                            <option value="1" {{$institute->payment=='1'?'selected':''}}>Monthly</option>
                                            <option value="2" {{$institute->payment=='2'?'selected':''}}>Anualy</option>
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
                                            <option value="1" {{$institute->card=='1'?'selected':''}}>Laminate</option>
                                            <option value="2" {{$institute->card=='2'?'selected':''}}>Plastic</option>
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
                                      <input type="file" name="image" style="text-align: center;" id="input-file-now-custom-2 " class="dropify" data-default-file="{{url('insimg/'.$institute->ins_img)}}" data-max-file-size="1M" data-max-height="3000" data-height="200" />
                                  </div>
                                </div>
                                <div class="form-group row">
                                    <label for="img" class="col-12 col-form-label">Status</label>
                                  </div>
                                  <div class="form-group row">
                                  <div class="col-10">
                                    <select class="custom-select col-md-12" name="status" id="status">
                                        <option selected value="">Select Status</option>
                                        <option value="1" {{$institute->status=='1'?'selected':''}}>Active</option>
                                        <option value="2" {{$institute->status=='0'?'selected':''}}>Inactive</option>
                                    </select>
                                @error('status')
                                  <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div>
                                @enderror
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
