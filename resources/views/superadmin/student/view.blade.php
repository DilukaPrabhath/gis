
@extends('superadmin.layout.master')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">View Student</h4>



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
                                        <table class="table table-hover mb-0">
                                            <tr>
                                                <th>Application Number</th>
                                                <td>APL/0000010</td>
                                            </tr>
                                            <tr>
                                                <th>Full Name</th>
                                                <td>Garrett Winters</td>
                                            </tr>
                                            <tr>
                                                <th>DOB</th>
                                                <td>2018/05/05</td>
                                            </tr>
                                            <tr>
                                                <th>Address</th>
                                                <td>Pellawaththa,Colombo</td>
                                            </tr>
                                            <tr>
                                                <th>Grade</th>
                                                <td>Primary</td>
                                            </tr>
                                            <tr>
                                                <th>Institute</th>
                                                <td>GIS Primary School</td>
                                            </tr>
                                            <tr>
                                                <th>Status</th>
                                                <td><span class="badge badge-success">Active</span></td>
                                            </tr>

                                        </table>
                                    </div>


                                    <div class="col-lg-6">
                                        <table class="table table-hover mb-0">
                                            <tr>
                                                <th>Image</th>
                                                <td><img src="{{url('frogetor/assets/images/users/user1.jpg')}}" alt=""></td>
                                            </tr>
                                        </table>
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
                                        <table class="table table-hover mb-0">
                                            <tr>
                                                <th>Gurdian 1 Full Name</th>
                                                <td>Sumudu Kolambage</td>
                                            </tr>
                                            <tr>
                                                <th>Gurdian 1 Relationship</th>
                                                <td>Father</td>
                                            </tr>
                                            <tr>
                                                <th>Gurdian 1 Mobile</th>
                                                <td>0770652584</td>
                                            </tr>
                                            <tr>
                                                <th>Gurdian 1 NIC</th>
                                                <td>932745217V</td>
                                            </tr>

                                            <tr>
                                                <th>Gurdian 2 Full Name</th>
                                                <td>Nihara Kolambage</td>
                                            </tr>
                                            <tr>
                                                <th>Gurdian 2 Relationship</th>
                                                <td>Mother</td>
                                            </tr>
                                            <tr>
                                                <th>Gurdian 2 Mobile</th>
                                                <td>0770652854</td>
                                            </tr>
                                            <tr>
                                                <th>Gurdian 2 NIC</th>
                                                <td>952745217V</td>
                                            </tr>
                                        </table>
                                    </div>


                                    <div class="col-lg-6">
                                        <table class="table table-hover mb-0">

                                            <tr>
                                                <th>Emargancy Contact Person</th>
                                                <td>Sumudu Kolambage</td>
                                            </tr>
                                            <tr>
                                                <th>Emargancy Contact Number</th>
                                                <td>0770652584</td>
                                            </tr>
                                            <tr>
                                                <th>Relationship</th>
                                                <td>Father</td>
                                            </tr>

                                        </table>
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
                                        <table class="table table-hover mb-0">
                                            <tr>
                                                <th>Apply Type</th>
                                                <td>Physical</td>
                                            </tr>
                                            <tr>
                                                <th>Registration Date</th>
                                                <td>10/25/2021</td>
                                            </tr>
                                            <tr>
                                                <th>Payment Type</th>
                                                <td>Online</td>
                                            </tr>
                                            <tr>
                                                <th>Apply Type</th>
                                                <td>Physical</td>
                                            </tr>
                                            <tr>
                                                <th>Interview Type</th>
                                                <td>Online</td>
                                            </tr>
                                            <tr>
                                                <th>Interview Status</th>
                                                <td>Pass</td>
                                            </tr>
                                            <tr>
                                                <th>GIS Pre School Attend</th>
                                                <td>Yes</td>
                                            </tr>
                                            <tr>
                                                <th>GIS Pre School SID Number</th>
                                                <td>GIS/PR/211025-0005</td>
                                            </tr>
                                        </table>
                                    </div>



                                    <div class="col-lg-6">
                                        <table class="table table-hover mb-0">
                                            <tr>
                                                <th>Admition Fee Paid Status</th>
                                                <td>Yes</td>
                                            </tr>
                                            <tr>
                                                <th>Admition Fee Recipt Number</th>
                                                <td>admi-2015475</td>
                                            </tr>
                                            <tr>
                                                <th>Student Registration Type</th>
                                                <td>Out sider</td>
                                            </tr>
                                            <tr>
                                                <th>Records</th>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th>ID Issue Status</th>
                                                <td>Issued</td>
                                            </tr>
                                            <tr>
                                                <th>ID Fee Status</th>
                                                <td>Paid</td>
                                            </tr>
                                            <tr>
                                                <th>Syllubus Type</th>
                                                <td>Local</td>
                                            </tr>
                                        </table>
                                    </div>


                                    <div class="row">
                                        <div class="col-lg-12">

                                            <a type="button" data-toggle="tab" id="setprebtn" href="#profile-1" class="btn btn-outline-info waves-effect waves-light" onClick="refresh4(this)"  role="tab"><i class="fas fa-chevron-left" style="margin-right: 5px;"></i>Previous</a>

                                    <a type="button" href="{{url('superadmin/students')}}" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-close" style="margin-right: 5px;"></i>Close</a>
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

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">Awards Table</h4>


                        <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Student ID</th>
                                <th>Awards</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>STU/211004/0001</td>
                                <td>relay 100m 2nd place - 2021-01-25</td>
                                <td>
                                    <a href="{{url('superadmin/students/awards/view')}}" type="button" class="btn btn-dropbox">
                                        <i class="fab far fa-eye" style="color: white; font-size:8px;"></i>
                                    </a>

                                </td>
                            </tr>
                            <tr>
                                <td>STU/211004/0001</td>
                                <td>Grade 1, Class 1st - 2021-04-30 1st sem</td>
                                <td>
                                    <a href="{{url('superadmin/students/awards/view')}}" type="button" class="btn btn-dropbox">
                                        <i class="fab far fa-eye" style="color: white; font-size:8px;"></i>
                                    </a>

                                </td>


                            </tr>


                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">Complaints Table</h4>


                        <table id="datatable2" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Student ID</th>
                                <th>Subject</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>STU/211004/0001</td>
                                <td>Strugle with a boy - 2021-01-27</td>
                                <td>
                                    <a href="{{url('superadmin/students/complaints/view')}}" type="button" class="btn btn-dropbox">
                                        <i class="fab far fa-eye" style="color: white; font-size:8px;"></i>
                                    </a>

                                </td>
                            </tr>


                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div>
    @stop

    <script>


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
