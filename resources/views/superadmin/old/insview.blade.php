@extends('superadmin.layouts.master')
@section('content')

<div class="container-fluid">

    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Institute Details View</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Institute Details</li>
            </ol>
        </div>

    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">View Institute Data</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="table-responsive m-t-40">
                                <table class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                    <tbody>
                                        <tr>
                                          <th scope="row">Institute ID</th>
                                          <td>{{$institute->inst_num}}</td>
                                        </tr>
                                        <tr>
                                          <th scope="row">Institute Name</th>
                                          <td>{{$institute->institute}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">E Mail</th>
                                            <td>{{$institute->email}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Telephone</th>
                                            <td>{{$institute->tele}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Card Type</th>
                                            <td>
                                              @if ($institute->card == 1)
                                              <span>Laminate</span>
                                              @elseif ($institute->card == 2)
                                              <span>Plastic</span>
                                              @endif
                                          </td>
                                          </tr>
                                          <tr>
                                            <th scope="row">Payment Type</th>
                                            <td>
                                              @if ($institute->payment == 1)
                                              <span>Monthly</span>
                                              @elseif ($institute->payment == 2)
                                              <span>Anualy</span>
                                              @endif
                                          </td>
                                          </tr>

                                      </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="table-responsive m-t-40">
                            <table class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                <tbody>
                                    <tr>
                                      <th scope="row">User Image</th>
                                      <td><img src="{{asset('insimg/'.$institute->ins_img)}}" alt="" alt="" width="100px" height="100px"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Address</th>
                                        <td>{{$institute->address}}</td>
                                    </tr>
                                    <tr>
                                      <th scope="row">Status</th>
                                      <td>
                                        @if ($institute->status == 1)
                                        <span class="badge badge-success">Active</span>
                                        @elseif ($institute->status == 0)
                                        <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    </tr>
                                    <tr>
                                      <th scope="row">Create at</th>
                                      <td>{{$institute->created_at}}</td>
                                    </tr>
                                      @if ($institute->updated_at != null)
                                      <tr>
                                      <th scope="row">Update at</th>
                                      <td>{{$institute->updated_at}}</td>
                                      </tr>
                                      @endif
                                  </tbody>
                            </table>
                        </div>
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-4">
                            <a class="btn btn-inverse waves-effect waves-light" href="{{url('superadmin/institutes')}}" style="width: 100px; padding-top: 5px;">Back</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


</div>


@stop
