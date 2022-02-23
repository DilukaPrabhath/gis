<link href="{{asset('frogetor/assets/plugins/dropify/css/dropify.min.css')}}" rel="stylesheet">
@extends('accountant.layout.master')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Create Inquery</h4>
                        <form action="{{url('accountant/inqueries/store')}}" method="POST" autocomplete="off" id="regForm" enctype="multipart/form-data">
                            @csrf

                        <div class="row">
                            <div class="col-lg-6">

                                <div class="form-group row">
                                    <label for="student_name" class="col-sm-3 col-form-label text-right">Student Full Name</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" value="" name="student_name" id="student_name">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name_with_initial" class="col-sm-3 col-form-label text-right">Name with Initials</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" value="" name="name_with_initial" id="name_with_initial">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="dob" class="col-sm-3 col-form-label text-right">Date of Birth</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="date" value="" name="dob" id="dob">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label text-right">Gender</label>
                                    <div class="col-md-9">
                                        <div class="form-check-inline my-1">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="male" checked="" name="gender" class="custom-control-input">
                                                <label class="custom-control-label" for="male">Male</label>
                                            </div>
                                        </div>
                                        <div class="form-check-inline my-1">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="female" name="gender" class="custom-control-input">
                                                <label class="custom-control-label" for="female">Female</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="religion" class="col-sm-3 col-form-label text-right">Religion</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" value="" name="religion" id="religion">
                                    </div>
                                </div>







                            </div>


                            <div class="col-lg-6">

                                <div class="form-group row">
                                    <label for="nationality" class="col-sm-3 col-form-label text-right">Nationality</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" value="" name="nationality" id="nationality">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="address" class="col-sm-3 col-form-label text-right">Address</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="address" id="address" rows="3" cols="50"></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="contact_number" class="col-sm-3 col-form-label text-right">Contact Number</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="number" value="" name="contact_number" id="contact_number">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label text-right">Inquery Type</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="inquery_type" id="inquery_type">
                                            <option value="">Select Type</option>
                                            <option value="1">Online</option>
                                            <option value="2">Over The Phone</option>
                                            <option value="3">Physically</option>
                                        </select>
                                    </div>
                                </div>

                                {{-- <div class="form-group row">
                                    <label for="parent_nic" class="col-sm-3 col-form-label text-right">Parent NIC</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" value="" name="parent_nic" id="parent_nic">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="parent_name" class="col-sm-3 col-form-label text-right">Parent Name</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" value="" name="parent_name" id="parent_name">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="parent_email" class="col-sm-3 col-form-label text-right">Parent Email</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="email" value="" name="parent_email" id="parent_email">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="parent_mobile" class="col-sm-3 col-form-label text-right">Parent Mobile</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="number" value="" name="parent_mobile" id="parent_mobile">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="address" class="col-sm-3 col-form-label text-right">Parent Address</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" value="" name="address" id="address">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="relationship" class="col-sm-3 col-form-label text-right">Relationship</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" value="" name="relationship" id="relationship">
                                    </div>
                                </div> --}}

                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="submit" id="x" class="btn btn-success waves-effect waves-light" style="color: white;"><i class="mdi mdi-check-all mr-2"></i>Submit</button>
                                    <a type="button" href="{{url('accountant/inqueries')}}" class="btn btn-primary waves-effect waves-light" style="margin-left: 5px;"><i class="mdi mdi-close" style="margin-right: 5px;"></i>Close</a>
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
                    student_name: {
                        required: true,
                        maxlength: 150
                    },
                    dob: {
                        required: true,
                    },
                    inquery_type: {
                        required: true,
                    },
                    address: {
                        required: true,
                        maxlength: 150
                    },
                    nationality: {
                        required: true,
                        maxlength: 50
                    },
                    religion: {
                        required: true,
                        maxlength: 50
                    },
                    name_with_initial: {
                        required: true,
                        maxlength: 100
                    },
                    contact_number: {
                        required: true,
                        maxlength: 10,
                        minlength: 10,
                        number: true,
                    },

                },
                messages: {
                    student_name: {
                        required: "Student Name is required",
                        maxlength: "Student Name cannot be more than 100 characters"
                    },
                    name_with_initial: {
                        required: "Name with Initial is required",
                        maxlength: "Name with Initial cannot be more than 100 characters"
                    },
                    religion: {
                        required: "Religion is required",
                        maxlength: "Religion cannot be more than 100 characters"
                    },
                    nationality: {
                        required: "Nationality is required",
                        maxlength: "Nationality cannot be more than 100 characters"
                    },
                    dob: {
                        required: "Date of Birth is required"
                    },
                    contact_number: {
                        required: "Contact Number is required",
                        maxlength: "Contact Number cannot be more than 10 characters",
                        minlength: "Contact Number cannot be less than 10 characters"

                    },
                    inquery_type: {
                        required: "Inquery Type is required"
                    },
                    address: {
                        required: "Address is required"
                    }
                }
            });

        });

    </script>

<script>

    $(document).ready(function(){
        $("#student_name").blur(function(){
            var name = $("#student_name").val();
            var lsnm = $("#student_name").val();
            if(name.split(' ').length > 1){
                if(name.split(' ').length >= 3){
                    name = name.split(' ')
                    lsnm = name.splice(-2);
                    console.log(name);
                    console.log(lsnm);
                    var frnm = lsnm[0]+' '+lsnm[1];
                    frnm = frnm.toLowerCase().replace(/\b[a-z]/g, function(letter) {
                        return letter.toUpperCase();
                    });
                    $("#name_with_initial").val(getInitials(name)+' '+frnm);
                }else{
                    name = name.split(' ')
                    lsnm = name.splice(-1);
                    var lssn = lsnm[0];
                    console.log(name);
                    console.log(lsnm);
                    lssn = lssn.toLowerCase().replace(/\b[a-z]/g, function(letter) {
                        return letter.toUpperCase();
                    });
                    $("#name_with_initial").val(getInitials(name)+' '+lssn);
                }
            }

        })

    })
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

      </script>

<script>
    //   autocomplete
$(document).ready(function(){
 console.log("HI2");
$('#parent_nic').autocomplete({

 source: function(request, response) {
   $.getJSON("{{ url('/accountant/student/parent2_nic') }}",
    {parent_nic2:$("#parent_nic").val()},
       response);
 },
 minLength: 1,
 width: "100%",
 open: function(event,ui){
     var autocomplete=$(".ui-autocomplete:visible");
     var oldTop=autocomplete.offset().top;
     var newTop = oldTop-$("#parent_nic").height()+25;
     autocomplete.css("top", newTop);
 },
 select:function(event,ui){
     //console.log(ui);
     var name = ui.item.parent_name2;
     var email = ui.item.parent_email2;
     var mobile = ui.item.parent_mobile2;
     var address = ui.item.parent_address2;

     document.getElementById('parent_name').value = name;
     document.getElementById('parent_email').value = email;
     document.getElementById('parent_mobile').value = mobile;
     document.getElementById('address').value = address;

 },
});
});
   </script>
    @stop

