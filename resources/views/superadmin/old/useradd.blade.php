
@extends('superadmin.layouts.master')
@section('content')

<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Add User</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Add Admin User</li>
            </ol>
        </div>
        {{-- <div class="col-md-7 col-4 align-self-center">
            <div class="d-flex m-t-10 justify-content-end">
                <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                    <div class="chart-text m-r-10">
                        <h6 class="m-b-0"><small>THIS MONTH</small></h6>
                        <h4 class="m-t-0 text-info">$58,356</h4></div>
                    <div class="spark-chart">
                        <div id="monthchart"></div>
                    </div>
                </div>
                <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                    <div class="chart-text m-r-10">
                        <h6 class="m-b-0"><small>LAST MONTH</small></h6>
                        <h4 class="m-t-0 text-primary">$48,356</h4></div>
                    <div class="spark-chart">
                        <div id="lastmonthchart"></div>
                    </div>
                </div>
                <div class="">
                    <button class="right-side-toggle waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                </div>
            </div>
        </div> --}}
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
            <div class="col-lg-12 col-xlg-12 col-md-12">
                <div class="card">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs profile-tab" role="tablist">

                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">Profile</a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#home" role="tab">Institute</a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Settings</a> </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="profile" role="tabpanel">
                            <div class="card-body">
                                <form method="post" action="{{url('/superadmin/user/store')}}" id="frmdt" name="frmdt" autocomplete="off" enctype="multipart/form-data" >
                                    {{ csrf_field() }}
                                    <div class="form-group row">
                                        <label for="admin_name" class="col-2 col-form-label">Full Name</label>
                                        <div class="col-10">
                                          <input class="form-control" type="text" name="admin_name" value="{{old('admin_name')}}" id="admin_name">
                                          @error('admin_name')
                                          <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div>
                                          @enderror
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="nwi" class="col-2 col-form-label">Name with Initial</label>
                                        <div class="col-10">
                                          <input class="form-control" type="text" name="nwi" id="nwi" value="{{old('nwi')}}">
                                          @error('nwi')
                                          <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div>
                                          @enderror
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="nic" class="col-2 col-form-label">NIC</label>
                                        <div class="col-10">
                                          <input type="text" class="form-control text-uppercase" name="nic" id="nic" value="{{old('nic')}}" autocomplete="off" maxlength="12" >
                                          @error('nic')
                                          <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div>
                                          @enderror
                                        </div>
                                      </div>

                                      <div class="form-group row">
                                        <label for="admin_email" class="col-2 col-form-label">E Mail</label>
                                        <div class="col-10">
                                          <input class="form-control" type="email" name="admin_email" id="admin_email" value="{{old('admin_email')}}" autocomplete="off">
                                          @error('admin_email')
                                          <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div>
                                          @enderror
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="mobile" class="col-2 col-form-label">Mobile</label>
                                        <div class="col-10">
                                          <input class="form-control" type="tel" name="mobile" id="mobile" value="{{old('mobile')}}">
                                          @error('mobile')
                                          <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div>
                                          @enderror
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="tel" class="col-2 col-form-label">Telephone</label>
                                        <div class="col-10">
                                          <input class="form-control" type="tel" name="tel" id="tel" value="{{old('tel')}}">
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="address" class="col-2 col-form-label">Address</label>
                                        <div class="col-10">
                                          <input class="form-control" type="text" name="address" id="address">
                                          @error('address')
                                          <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div>
                                          @enderror
                                        </div>
                                      </div>
                                      <hr>

                            </div>
                        </div>
                        <!--second tab-->
                        <div class="tab-pane" id="home" role="tabpanel">
                            <div class="card-body">
                          <div class="row">
                                <div class="col-md-8" >
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
                                      {{-- <div class="form-group row">
                                        <label for="Institute_district" class="col-2 col-form-label">Institute District</label>
                                        <div class="col-10">
                                          <input class="form-control" type="text" name="Institute_district" id="Institute_district">
                                          @error('Institute_district')
                                          <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div>
                                          @enderror
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="Institute_town" class="col-2 col-form-label">Institute Town</label>
                                        <div class="col-10">
                                          <input class="form-control" type="text" name="Institute_town" id="Institute_town">
                                          @error('Institute_town')
                                          <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div>
                                          @enderror
                                        </div>
                                      </div> --}}
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
                            </div>
                                <hr>

                            </div>
                        </div>
                        <div class="tab-pane" id="settings" role="tabpanel">
                            <div class="card-body">

                                    <div class="form-group row">
                                        <label for="example-month-input" class="col-md-2 col-form-label">User Type</label>
                                        <div class="col-4">
                                            <select class="custom-select col-md-6" id="usertype" disabled>
                                                <option selected>Admin</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-month-input" class="col-md-2 col-form-label">Status</label>
                                        <div class="col-4">
                                            <select class="custom-select col-md-6" id="status" disabled>
                                                <option selected>Active</option>
                                            </select>
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

                                    <div class="form-group row">
                                        <div class="col-4">

                                            <input type="submit" class="btn btn-success" style="width: 100px;" value="Save">
                                            <a class="btn btn-inverse waves-effect waves-light" href="{{url('superadmin/users')}}" style="width: 100px; padding-top: 5px;">Back</a>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->

</div>


@stop

{{-- <script>

  $(document).ready(function(){
      $("#admin_name").blur(function(){
          var name = $("#admin_name").val();
          var lsnm = $("#admin_name").val();
          if(name.split(' ').length > 1){
              if(name.split(' ').length >= 3){
                  name = name.split(' ')
                  lsnm = name.splice(-2);
                  var frnm = lsnm[0]+' '+lsnm[1];
                  frnm = frnm.toLowerCase().replace(/\b[a-z]/g, function(letter) {
                      return letter.toUpperCase();
                  });
                  $("#nwi").val(getInitials(name)+' '+frnm);
              }else{
                  name = name.split(' ')
                  lsnm = name.splice(-1);
                  var lssn = lsnm[0];
                  lssn = lssn.toLowerCase().replace(/\b[a-z]/g, function(letter) {
                      return letter.toUpperCase();
                  });
                  $("#nwi").val(getInitials(name)+' '+lssn);
              }
          }

      })

  });
  function getInitials(name){
      var parts = name
      var initials = ''
      for (var i = 0; i < parts.length; i++) {
          if (parts[i].length > 0 && parts[i] !== '') {
          initials += parts[i][0].toUpperCase()+'.'
          }
      }
      return initials
  }

    </script> --}}
