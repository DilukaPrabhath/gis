<link href="{{asset('frogetor/assets/plugins/dropify/css/dropify.min.css')}}" rel="stylesheet">
@extends('de_registar.layout.master')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body border-bottom">
                        <div class="fro_profile">
                            <div class="row">
                                <div class="col-lg-4 mb-3 mb-lg-0">
                                    <div class="fro_profile-main">
                                        <div class="fro_profile-main-pic">
                                            <img src="{{asset('image/user/'.Auth::user()->image)}}" alt="" width="100" height="100" class="rounded-circle">
                                            {{-- <span class="fro-profile_main-pic-change">
                                                <i class="fas fa-camera"></i>
                                            </span> --}}
                                        </div>
                                        <div class="fro_profile_user-detail">
                                            <h5 class="fro_user-name">{{Auth::user()->name}}</h5>
                                            <p class="mb-0 fro_user-name-post">{{$u_tyo->user_role}}</p>
                                        </div>
                                    </div>
                                </div><!--end col-->

                            </div><!--end row-->
                        </div><!--end f_profile-->
                    </div><!--end card-body-->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <form action="{{url('/de_registar/profile/edit/update')}}" method="POST" autocomplete="off" id="regForm" enctype="multipart/form-data">
                                        @csrf

                                    <div class="row">


                                        <input type="hidden" id="sid" name="sid" value="{{Auth::user()->id}}">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group row">
                                                    <label for="fullname" class="col-sm-3 col-form-label text-right">Full Name</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="text" value="{{$data->name}}" id="fullname" name="fullname">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="email" class="col-sm-3 col-form-label text-right">Email</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="email" value="{{$data->email}}" id="email" name="email">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="mobile" class="col-sm-3 col-form-label text-right">Mobile</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="number" value="{{$data->mobile}}" id="mobile" name="mobile" maxlength="10">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="nic" class="col-sm-3 col-form-label text-right">NIC</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="text" value="{{$data->nic}}" id="nic" name="nic" maxlength="12">
                                                    </div>
                                                </div>

                                                {{-- <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label text-right">User Type</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" id="usertype" disabled name="usertype">
                                                            <option value="">Select</option>
                                                            @foreach ($user_type as $value)
                                                            <option value="{{ $value->id}}" {{ $value->id == $data->user_role ? 'selected' : '' }}>{{ $value->user_role }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div> --}}
                                            </div>


                                            <div class="col-lg-6">
                                                <div class="form-group row">
                                                    <label for="example-search-input" class="col-sm-3 col-form-label text-right">Image</label>
                                                    <div class="col-sm-9">
                                                        <input type="file" id="input-file-now" class="dropify" value="{{$data->image}}" data-height="350" name="stu_img" id="stu_img" data-default-file="{{url('image/user/')}}/{{$data->image}}"/>
                                                    </div>
                                                </div>

                                                <div class="form-group row float-right align-item-center mt-2">
                                                    <a type="button" style="margin-right: 10pt;" href="{{url('de_registar/profile/password/edit')}}" class="btn btn-danger align-self-right report-btn">Update Password</a>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-lg-12" style="margin-left: 10px;">
                                                    <button type="submit" class="btn btn-success waves-effect waves-light" style="color: white;"><i class="mdi mdi-check-all mr-2"></i>Submit</button>

                                                    <a type="button" href="{{url('de_registar/profile')}}" class="btn btn-primary waves-effect waves-light" style="margin-left: 5px;"><i class="mdi mdi-close" style="margin-right: 5px;"></i>Close</a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                                    </form>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                </div><!--end card-->
            </div><!--end col-->
        </div><!--end row-->

    </div>
    @stop



    @section('scripts')

    <script>
        $(document).ready(function() {
            $("#regForm").validate({
                rules: {
                    fullname: {
                        required: true,
                        maxlength: 150,
                    },
                    email:{
                        email: true,
                        required: true,
                        maxlength: 100,
                        remote: {
                          url: '/de_registar/profile_update_email',
                            type: 'post',
                            headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            data: {
                                'sid': $('#sid').val()
                            }

                        }
                    },
                    nic: {
                        required: true,
                        remote: {
                          url: '/de_registar/profile_update_nic',
                            type: 'post',
                            headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            data: {
                                'sid': $('#sid').val()
                            }

                        },
                        idnfmt:function(element){return $("#nic").val()!= ''},

                    },
                    mobile: {
                        required: true,
                        minlength: 10,
                        maxlength: 10,
                        number: true,
                        remote: {
                          url: '/de_registar/profile_update_mobile',
                            type: 'post',
                            headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            data: {
                                'sid': $('#sid').val()
                            }

                        }
                    }

                },
                messages: {
                    fullname: {
                        required: "Full Name is required",
                        maxlength: "Full Name cannot be more than 150 characters"
                    },
                    email: {
                        required: "Email name is required",
                        email: "Email must be a valid email address",
                        remote:"Email already exist",
                        maxlength: "Email cannot be more than 100 characters"
                    },
                    nic: {
                        required: "NIC is required",
                        maxlength: "NIC cannot be more than 12 characters",
                        remote:"NIC already exist"
                    },
                    mobile: {
                        required: "Mobile number is required",
                        minlength: "Mobile number must be of 10 digits",
                        maxlength: "Mobile number must be of 10 digits",
                        remote:"Mobile already exist"
                    }
                }
            });

             //ID format
            jQuery.validator.addMethod("idnfmt",function(value,element){
                idno= value;
                if (idno.length == 10){
                    iddate=idno.substring(2, 5);
                }else{
                    iddate=idno.substring(4, 7);
                }
                return (this.optional(element) || (/^[0-9]{9}[vVxX]$/.test(value) && ( (iddate<367)||(iddate>500 && iddate<867) ) ) ||(/^[0-9]{12}$/.test(value) && ( (iddate<367)|| (iddate>500 && iddate<867) ))) ;
            },"Invalid NIC Number Format");

        });

         //get V for nic number
         $(document).ready(function(){
           $('#nic').keyup(function(){
           var nicn=$('#nic').val();
           var leng=nicn.length;
           if(leng==9){
             $('#nic').val($('#nic').val()+"V");
           if(this.setSelectionRange) {
             this.focus();
             this.setSelectionRange(9,10);
            } else if(this.createTextRange) {
            var range = this.createTextRange();
            range.collapse(true);
            range.moveEnd('character', end);
            range.moveStart('character', start);
            range.select();
        }
        }

    })
});


    </script>
  <script src="{{asset('frogetor/assets/plugins/dropify/js/dropify.min.js')}}"></script>
  <script src="{{asset('frogetor/assets/pages/jquery.form-upload.init.js')}}"></script>
  @stop
