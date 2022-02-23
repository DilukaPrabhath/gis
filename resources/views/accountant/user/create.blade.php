<link href="{{asset('frogetor/assets/plugins/dropify/css/dropify.min.css')}}" rel="stylesheet">
@extends('accountant.layout.master')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Create User</h4>
                        <form action="{{url('accountant/users/store')}}" method="POST" autocomplete="off" id="regForm" enctype="multipart/form-data">
                            @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label for="fullname" class="col-sm-2 col-form-label text-right">Full Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="" id="fullname" name="fullname">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label text-right">Email</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="email" value="" id="email" name="email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="mobile" class="col-sm-2 col-form-label text-right">Mobile</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="number" value="" id="mobile" name="mobile" maxlength="10">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nic" class="col-sm-2 col-form-label text-right">NIC</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="" id="nic" name="nic" maxlength="12">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-right">User Type</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="usertype" name="usertype">
                                            <option value="">Select</option>
                                            @foreach ($user_type as $value)
                                            <option value="{{ $value->id}}">{{ $value->user_role }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-right">Institute</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="institute" name="institute">
                                            <option value="">Select</option>
                                            @foreach ($school as $value)
                                            <option value="{{ $value->id}}">{{ $value->institute_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label for="example-search-input" class="col-sm-2 col-form-label text-right">Image</label>
                                    <div class="col-sm-10">
                                        <input type="file" id="input-file-now" id="image" name="image" class="dropify" />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-success waves-effect waves-light" style="color: white;"><i class="mdi mdi-check-all mr-2"></i>Submit</button>

                                    <a type="button" href="{{url('accountant/users')}}" class="btn btn-primary waves-effect waves-light" style="margin-left: 5px;"><i class="mdi mdi-close" style="margin-right: 5px;"></i>Close</a>
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
                    fullname: {
                        required: true,
                        maxlength: 150,
                    },
                    email:{
                        email: true,
                        required: true,
                        maxlength: 100,
                        remote:'/accountant/validate-email',
                    },
                    nic: {
                        required: true,
                        remote:'/accountant/validate-nic',
                        idnfmt:function(element){return $("#ind").val()!= ''},

                    },
                    mobile: {
                        required: true,
                        minlength: 10,
                        maxlength: 10,
                        number: true,
                        remote:'/accountant/validate-mobile',
                    },
                    usertype: {
                        required: true,
                    },
                    institute: {
                        required: true,
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
                    },
                    institute: {
                        required: "School is required"
                    },
                    usertype: {
                        required:  "User Type password is required"
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

