
@extends('de_registar.layout.master')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Create Students</h4>



                        <!-- Nav tabs -->
                        <ul class="nav nav-pills nav-justified" role="tablist">
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link active" id="tabbasic" data-toggle="tab" href="#home-1" role="tab">Basic Infomation</a>
                            </li>
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link" data-toggle="tab" id="tabprofile" href="#profile-1" role="tab">Guardians Infomation</a>
                            </li>
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link" data-toggle="tab" id="tabsetting" href="#settings-1" role="tab">Registration Infomation </a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active p-3" id="home-1" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-right">Application Number</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" value="" id="example-text-input">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-right">Full Name</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" value="" id="example-text-input">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-right">DOB</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="date" value="" id="example-email-input">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-right">Address</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" rows="2" id="message"></textarea>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="col-lg-6">
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-3 col-form-label text-right">Image</label>
                                            <div class="col-sm-9">
                                                <input type="file" id="input-file-now" class="dropify" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <a type="button" data-toggle="tab" id="homebtnext"  href="#profile-1" class="btn btn-outline-info waves-effect waves-light" onClick="refresh1(this)" role="tab"><i class="fas fa-chevron-right" style="margin-right: 5px;"></i>Next</a>

                                        </div>
                                    </div>
                                </div>



                            </div>
                            <div class="tab-pane p-3" id="profile-1" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-right">Guardians 1 Full Name</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" value="" id="example-text-input">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-right">Guardians 1 Relationship</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" value="" id="example-text-input">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-right">Guardians 1 NIC</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" value="" id="example-text-input">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-right">Guardians 1 Mobile Number</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" value="" id="example-text-input">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-right">Guardians 2 Full Name</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" value="" id="example-text-input">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-right">Guardians 2 Relationship</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" value="" id="example-text-input">
                                            </div>
                                        </div>




                                    </div>


                                    <div class="col-lg-6">
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-right">Guardians 2 NIC</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" value="" id="example-text-input">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-right">Guardians 2 Mobile Number</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" value="" id="example-text-input">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-right">Emargancy Contact Person</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" value="" id="example-text-input">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-right">Relationship</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" value="" id="example-text-input">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-right">Emargancy Contact Number</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" value="" id="example-email-input">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">

                                            <a type="button" data-toggle="tab" id="proprebtn" href="#home-1" onClick="refresh2(this)" class="btn btn-outline-info waves-effect waves-light"  role="tab"><i class="fas fa-chevron-left" style="margin-right: 5px;"></i>Previous</a>
                                            <a type="button" data-toggle="tab" id="pronextbtn" href="#settings-1" onClick="refresh3(this)" class="btn btn-outline-info waves-effect waves-light"  role="tab"><i class="fas fa-chevron-right" style="margin-right: 5px;"></i>Next</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane p-3" id="settings-1" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label text-right">Apply Type</label>
                                            <div class="col-sm-9">
                                                <select class="form-control">
                                                    <option value="" selected>Select Type</option>
                                                    <option value="1">Online</option>
                                                    <option value="2">Physicaly</option>
                                                    <option value="3">Over the Phone</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-right">Registration Date</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="date" value="" id="example-text-input">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label text-right">Payment Type</label>
                                            <div class="col-sm-9">
                                                <select class="form-control">
                                                    <option value="" selected>Select Type</option>
                                                    <option value="1">Online</option>
                                                    <option value="2">Cache</option>
                                                    <option value="3">Credit card</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label text-right">Interview Type</label>
                                            <div class="col-sm-9">
                                                <select class="form-control">
                                                    <option value="" selected>Select Type</option>
                                                    <option value="1">Online</option>
                                                    <option value="2">Over the Phone</option>
                                                    <option value="3">Physicaly</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label text-right">Interview Status</label>
                                            <div class="col-md-9">
                                                <div class="form-check-inline my-1">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio9" checked="" name="customRadio5" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadio9">Pass</label>
                                                    </div>
                                                </div>
                                                <div class="form-check-inline my-1">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio10" name="customRadio5" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadio10">Fail</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label text-right">GIS Pre School Attend</label>
                                            <div class="col-md-9">
                                                <div class="form-check-inline my-1">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio7" checked="" name="customRadio4" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadio7">Yes</label>
                                                    </div>
                                                </div>
                                                <div class="form-check-inline my-1">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio8" name="customRadio4" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadio8">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-right">GIS Pre School SID Number</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" value="" id="example-email-input">
                                            </div>
                                        </div>


                                    </div>


                                    <div class="col-lg-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label text-right">Admition Fee Paid Status</label>
                                            <div class="col-md-9">
                                                <div class="form-check-inline my-1">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio1" checked="" name="customRadio1" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadio1">Yes</label>
                                                    </div>
                                                </div>
                                                <div class="form-check-inline my-1">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio2" name="customRadio1" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadio2">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-right">Admition Fee Recipt Number</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" value="" id="example-email-input">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label text-right">Student Registration Type</label>
                                            <div class="col-sm-9">
                                                <select class="form-control">
                                                    <option value="" selected>Select Type</option>
                                                    <option value="1">Old Boy Association</option>
                                                    <option value="2">Non Academic Staff</option>
                                                    <option value="3">Outsider</option>
                                                    <option value="4">Scholarship</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-right">Records</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" rows="2" id="message"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label text-right">Is ID Issue ?</label>
                                            <div class="col-md-9">
                                                <div class="form-check-inline my-1">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio3" checked="" name="customRadio2" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadio3">Yes</label>
                                                    </div>
                                                </div>
                                                <div class="form-check-inline my-1">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio4" name="customRadio2" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadio4">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label text-right">Is ID Fee Paid ?</label>
                                            <div class="col-md-9">
                                                <div class="form-check-inline my-1">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio5" checked="" name="customRadio3" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadio5">Yes</label>
                                                    </div>
                                                </div>
                                                <div class="form-check-inline my-1">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio6" name="customRadio3" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadio6">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label text-right">Syllubus Type</label>
                                            <div class="col-sm-9">
                                                <select class="form-control">
                                                    <option value="" selected>Select Type</option>
                                                    <option value="1">Local</option>
                                                    <option value="2">Edexcel</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">

                                            <a type="button" data-toggle="tab" id="setprebtn" href="#profile-1" class="btn btn-outline-info waves-effect waves-light" onClick="refresh4(this)"  role="tab"><i class="fas fa-chevron-left" style="margin-right: 5px;"></i>Previous</a>
                                            <a type="button" class="btn btn-success waves-effect waves-light" style="color: white;"><i class="mdi mdi-check-all mr-2"></i>Submit</a>
                                    <a type="button" href="{{url('de_registar/students')}}" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-close" style="margin-right: 5px;"></i>Close</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>



                            <div class="col-lg-6">

                            </div>

                            <div class="row">

                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div>
    @stop

    <script>
        // function refresh(){

        //     var element1 = document.getElementById("homebtnext");
        //     var element2 = document.getElementById("proprebtn");
        //     var element3 = document.getElementById("pronextbtn");
        //     var element4 = document.getElementById("setprebtn");
        //     element1.classList.remove("active");
        //     element2.classList.remove("active");
        //     element3.classList.remove("active");
        //     element4.classList.remove("active");
        //     }

        function refresh1(){

            var element1 = document.getElementById("homebtnext");
            var element2 = document.getElementById("tabbasic");
            var element3 = document.getElementById("tabprofile");
            var element4 = document.getElementById("setprebtn");
            var element5 = document.getElementById("pronextbtn");
            var element6 = document.getElementById("proprebtn");


            element1.classList.remove("active");
            element2.classList.remove("active");
            element3.classList.add("active");
            element4.classList.remove("active");
            element5.classList.remove("active");
            element6.classList.remove("active");
            }

            function refresh2(){

            var element1 = document.getElementById("proprebtn");
            var element2 = document.getElementById("tabbasic");
            var element3 = document.getElementById("tabprofile");
            var element4 = document.getElementById("homebtnext");
            var element5 = document.getElementById("setprebtn");
            var element6 = document.getElementById("pronextbtn");


            element1.classList.remove("active");
            element3.classList.remove("active");
            element2.classList.add("active");
            element4.classList.remove("active");
            element5.classList.remove("active");
            element6.classList.remove("active");
            }

            function refresh3(){

            var element1 = document.getElementById("pronextbtn");
            var element2 = document.getElementById("tabprofile");
            var element3 = document.getElementById("tabsetting");
            var element4 = document.getElementById("homebtnext");
            var element5 = document.getElementById("setprebtn");
            var element6 = document.getElementById("proprebtn");

            element1.classList.remove("active");
            element2.classList.remove("active");
            element3.classList.add("active");
            element4.classList.remove("active");
            element5.classList.remove("active");
            element6.classList.remove("active");
            }

            function refresh4(){

            var element1 = document.getElementById("setprebtn");
            var element2 = document.getElementById("tabprofile");
            var element3 = document.getElementById("tabsetting");
            var element4 = document.getElementById("homebtnext");
            var element5 = document.getElementById("pronextbtn");
            var element6 = document.getElementById("proprebtn");

            element1.classList.remove("active");
            element3.classList.remove("active");
            element2.classList.add("active");
            element4.classList.remove("active");
            element5.classList.remove("active");
            element6.classList.remove("active");
            }


      </script>
