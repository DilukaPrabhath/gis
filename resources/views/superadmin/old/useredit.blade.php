@extends('superadmin.layouts.master')
@section('content')

<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Update User Details</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{url('/superadmin/users')}}">User Details</a></li>
                <li class="breadcrumb-item active">Update User Details</li>
            </ol>
        </div>

    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                          <div class="col-md-8" >
                            <form method="post" action="{{url('/superadmin/user/update')}}/{{$adminuser->id}}" id="frmdt" name="frmdt" autocomplete="off" enctype="multipart/form-data" >
                                {{ csrf_field() }}
                                <div class="form-group row">
                                    <label for="admin_name" class="col-2 col-form-label">User ID</label>
                                    <div class="col-10">
                                      <input class="form-control" type="text" value="{{$adminuser->user_number}}" disabled>

                                    </div>
                                  </div>
                                <div class="form-group row">
                                    <label for="admin_name" class="col-2 col-form-label">Full Name</label>
                                    <div class="col-10">
                                      <input class="form-control" type="text" name="admin_name" value="{{$adminuser->full_name}}" id="admin_name">
                                      @error('admin_name')
                                      <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div>
                                      @enderror
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="nwi" class="col-2 col-form-label">Name with Initial</label>
                                    <div class="col-10">
                                      <input class="form-control" type="text" name="nwi" id="nwi" value="{{$adminuser->nwi}}">
                                      @error('nwi')
                                      <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div>
                                      @enderror
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="nic" class="col-2 col-form-label">NIC</label>
                                    <div class="col-10">
                                      <input type="text" class="form-control text-uppercase" name="nic" id="nic" value="{{$adminuser->nic}}" autocomplete="off" maxlength="12" >
                                      @error('nic')
                                      <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div>
                                      @enderror
                                    </div>
                                  </div>

                                  <div class="form-group row">
                                    <label for="email" class="col-2 col-form-label">E Mail</label>
                                    <div class="col-10">
                                      <input class="form-control" type="email" name="email" id="email" value="{{$adminuser->email}}" autocomplete="off">
                                      @error('email')
                                      <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div>
                                      @enderror
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="mobile" class="col-2 col-form-label">Mobile</label>
                                    <div class="col-10">
                                      <input class="form-control" type="tel" name="mobile" id="mobile" value="{{$adminuser->mobile}}">
                                      @error('mobile')
                                      <div class="alert" style="color: red;padding-left: 0px;">{{ $message }}</div>
                                      @enderror
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="tel" class="col-2 col-form-label">Telephone</label>
                                    <div class="col-10">
                                      <input class="form-control" type="tel" name="tel" id="tel" value="{{$adminuser->tele}}">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="address" class="col-2 col-form-label">Address</label>
                                    <div class="col-10">
                                      <input class="form-control" type="text" name="address" id="address" value="{{$adminuser->address}}">
                                      @error('address')
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
                                      <input type="file" name="image" style="text-align: center;" id="input-file-now-custom-2" data-default-file="{{url('userimg/'.$adminuser->image)}}" class="dropify" data-max-file-size="1M" data-max-height="3000" data-height="200" />
                                  </div>
                                </div>
                                <hr>
                          <div class="form-group row">
                            <div class="col-4">
                                <a class="btn btn-danger" href="{{url('superadmin/users/password')}}/{{$adminuser->id}}" style="width: 150px; margin-top: 5px;">Password Reset</a>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="tel" class="col-4 col-form-label">Status</label>
                            <div class="col-8">
                                @if ($adminuser->status == 1)
                                <span class="badge badge-success">Active</span>
                                @elseif ($adminuser->status == 0)
                                <span class="badge badge-danger">Inactive</span>
                                @endif
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="tel" class="col-4 col-form-label">Create at</label>
                            <div class="col-8">
                                <span>{{ \Carbon\Carbon::parse($adminuser->created_at)->format('d/m/Y H:i:s A')}}</span>
                            </div>
                          </div>
                          @if ($adminuser->updated_at != null)
                          <div class="form-group row">
                            <label for="tel" class="col-4 col-form-label">Update at</label>
                            <div class="col-8">
                                <span>{{ \Carbon\Carbon::parse($adminuser->updated_at)->format('d/m/Y H:i:s A')}}</span>
                            </div>
                          </div>
                          @endif


                          </div>

                      </div>
                          <hr>
                          <div class="form-group row">
                            <div class="col-4">

                                <input type="submit" class="btn btn-success" style="width: 100px; margin-top: 5px;" value="Update">
                                <a class="btn btn-inverse waves-effect waves-light" href="{{url('superadmin/users')}}" style="width: 100px; margin-top: 5px;">Back</a>
                            </div>
                        </div>

                    </form>
                      </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->

</div>


@stop
