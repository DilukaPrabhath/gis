
@extends('de_registar.layout.master')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title" style="margin-bottom: 15px;">Student Profile</h4>
                        <div class="row" style="margin-bottom: 35px;">

                            <div class="input-group col-6">
                                <input type="text" class="form-control" aria-label="" id="rnum" placeholder="Enter Student Register Number.">
                                <span class="input-group-append">
                                    <button class="btn btn-primary" type="button" id="go">Go</button>
                                </span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body border-bottom">
                                        <div class="fro_profile">
                                            <div class="row">
                                                <div class="col-lg-4 mb-3 mb-lg-0">
                                                    <div class="fro_profile-main">
                                                        <div class="fro_profile-main-pic">
                                                            <img src="{{asset('frogetor/assets/images/users/user-4.jpg')}}" id="stu_image" alt="" class="rounded-circle">
                                                        </div>
                                                        <div class="fro_profile_user-detail">
                                                            <h5 class="fro_user-name" id="stu_name"></h5>
                                                            <p class="mb-0 fro_user-name-post" id="stu_id_no"></p>
                                                            <p class="mb-0 fro_user-name-post" id="stu_grd"></p>
                                                            <p class="mb-0 fro_user-name-post" id="stu_sub_type"></p>
                                                        </div>
                                                    </div>
                                                </div><!--end col-->

                                                <div class="col-lg-4 mb-3 mb-lg-0">
                                                    <div class="header-title">Contact Details</div>
                                                    <div class="row">
                                                        <div class="col-7">
                                                            <div class="seling-report">
                                                                <ul class="list-inline mb-0">
                                                                    <li class="mb-2 list-inline-item text-muted font-13"><i class="mdi mdi-label text-success mr-2" id="stu_mobi"></i></li>
                                                                    <li class="mb-2 list-inline-item text-muted font-13"><i class="mdi mdi-label text-danger mr-2" id="stu_email"></i></li>
                                                                    <li class="mb-2 list-inline-item text-muted font-13"><i class="mdi mdi-label text-warning mr-2" id="stu_address"></i></li>
                                                                </ul>

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div><!--end col-->
                                                {{-- <div class="col-lg-4 mb-2 mb-lg-0">
                                                    <div class="header-title">Revenue Report</div>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="seling-report">
                                                                <h3 class="seling-data mb-1">$2353</h3>
                                                                <p class="text-muted">Today's Revenue</p>
                                                                <h5 class="seling-data-detail">Total Payment Clear</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <span class="peity-bar" data-peity='{ "fill": ["#44a2d2", "#e6edf3"]}' data-width="100%" data-height="100">6,2,8,4,3,8,1,3,6,5,9,2,8,1,4,8</span>
                                                        </div>
                                                    </div>
                                                </div><!--end col--> --}}
                                            </div><!--end row-->
                                        </div><!--end f_profile-->
                                    </div><!--end card-body-->

                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-lg-5" >
                                                <div class="card overflow-hidden" >
                                                    <div class="card-body dash-info-carousel" style="height:200px;">
                                                        <div id="carousel_best_saler" class="carousel slide" data-ride="carousel">
                                                            <div class="carousel-inner">
                                                                <div class="carousel-item active">
                                                                    <div class="text-center">
                                                                        <img src="{{url('frogetor/assets/images/users/user-4.jpg')}}" alt="user" class="rounded-circle thumb-xl img-thumbnail mb-1">
                                                                        <h5>Nancy Flanary</h5>
                                                                        <p class="font-12 text-muted"><i class="fas fa-globe mr-2"></i>USA Dealer</p>

                                                                    </div>
                                                                </div>
                                                                <div class="carousel-item">
                                                                    <div class="text-center">
                                                                        <img src="{{url('frogetor/assets/images/users/user-2.jpg')}}" alt="user" class="rounded-circle thumb-xl img-thumbnail mb-1">
                                                                        <h5>Donald Gardner</h5>
                                                                        <p class="font-12 text-muted"><i class="fas fa-globe mr-2"></i>Russia Dealer</p>

                                                                    </div>
                                                                </div>
                                                                <div class="carousel-item">
                                                                    <div class="text-center">
                                                                        <img src="{{url('frogetor/assets/images/users/user-4.jpg')}}" alt="user" class="rounded-circle thumb-xl img-thumbnail mb-1">
                                                                        <h5>Matt Rosales</h5>
                                                                        <p class="font-12 text-muted"><i class="fas fa-globe mr-2"></i>Spain Dealer</p>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <a class="carousel-control-prev" href="#carousel_best_saler" role="button" data-slide="prev">
                                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                            <span class="sr-only">Previous</span>
                                                            </a>
                                                            <a class="carousel-control-next" href="#carousel_best_saler" role="button" data-slide="next">
                                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                            <span class="sr-only">Next</span>
                                                            </a>
                                                        </div>
                                                    </div><!--end card-body-->
                                                </div><!--end card-->
                                            </div><!--end col-->

                                            <div class="card overflow-hidden col-lg-5" >
                                                <div class="card-body dash-info-carousel" >
                                                    <div id="carousel_review" class="carousel slide" data-ride="carousel">
                                                        <div class="carousel-inner">
                                                            <div class="carousel-item">
                                                                <div class="media">
                                                                    <img src="{{url('frogetor/assets/images/flags/us_flag.jpg')}}" class="mr-2 thumb-xs rounded-circle" alt="...">
                                                                    <div class="media-body align-self-center">
                                                                        <h6 class="m-0">USA Store</h6>
                                                                    </div>
                                                                </div>
                                                                <div class="text-center">
                                                                    <p class="review-data mb-0">4.8<span>/ 5.0</span></p>
                                                                    <p class="px-4 py-1 bg-soft-success d-inline-block rounded">Very Good</p>


                                                                </div>
                                                            </div>
                                                            <div class="carousel-item">
                                                                <div class="media">
                                                                    <img src="{{url('frogetor/assets/images/flags/spain_flag.jpg')}}" class="mr-2 thumb-xs rounded-circle" alt="...">
                                                                    <div class="media-body align-self-center">
                                                                        <h6 class="m-0">Spain Store</h6>
                                                                    </div>
                                                                </div>
                                                                <div class="text-center">
                                                                    <p class="review-data mb-0">4.6<span>/ 5.0</span></p>
                                                                    <p class="px-4 py-1 bg-soft-success d-inline-block rounded">Very Good</p>

                                                                </div>
                                                            </div>
                                                            <div class="carousel-item active">
                                                                <div class="media">
                                                                    <img src="{{url('frogetor/assets/images/flags/russia_flag.jpg')}}" class="mr-2 thumb-xs rounded-circle" alt="...">
                                                                    <div class="media-body align-self-center">
                                                                        <h6 class="m-0">Russia Store</h6>
                                                                    </div>
                                                                </div>
                                                                <div class="text-center">
                                                                    <p class="review-data mb-0">5.0<span>/ 5.0</span></p>
                                                                    <p class="px-4 py-1 bg-soft-success d-inline-block rounded">Exellent</p>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <a class="carousel-control-prev" href="#carousel_review" role="button" data-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Previous</span>
                                                        </a>
                                                        <a class="carousel-control-next" href="#carousel_review" role="button" data-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Next</span>
                                                        </a>
                                                    </div>
                                                </div><!--end card-body-->
                                            </div>
                                            <div class="text-center col-lg-2">
                                                <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".bd-example-modal-xl">Add Image</button>
                                            </div>


                                        </div>

                                    </div><!--end card-body-->

                                    {{-- 2nd card --}}

                                </div><!--end card-->
                            </div><!--end col-->
                        </div><!--end row-->

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
                                                <th>Studet Number</th>
                                                <td>APL/0000010</td>
                                            </tr>
                                            <tr>
                                                <th>Inquery Number</th>
                                                <td>INQ/0000100</td>
                                            </tr>
                                            <tr>
                                                <th>Application Number</th>
                                                <td>APL/0000050</td>
                                            </tr>
                                            <tr>
                                                <th>Student Name</th>
                                                <td>Rosa Dodson</td>
                                            </tr>

                                            <tr>
                                                <th>DOB</th>
                                                <td>2018/05/05</td>
                                            </tr>
                                        </table>
                                    </div>


                                    <div class="col-lg-6">
                                        <table class="table table-hover mb-0">
                                            <tr>
                                                <th>Grade</th>
                                                <td>10</td>
                                            </tr>
                                            <tr>
                                                <th>Address</th>
                                                <td>Pellawaththa,Colombo</td>
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
                                    <a href="{{url('de_registar/students/awards/view')}}" type="button" class="btn btn-dropbox">
                                        <i class="fab far fa-eye" style="color: white; font-size:8px;"></i>
                                    </a>

                                </td>
                            </tr>
                            <tr>
                                <td>STU/211004/0001</td>
                                <td>Grade 1, Class 1st - 2021-04-30 1st sem</td>
                                <td>
                                    <a href="{{url('de_registar/students/awards/view')}}" type="button" class="btn btn-dropbox">
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
                                    <a href="{{url('de_registar/students/complaints/view')}}" type="button" class="btn btn-dropbox">
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

    <!-- sample modal content -->
    <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Add Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form action="">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" class="" name="">
                        </div>
                        <div class="col-md-6">
                            ssssssssss
                        </div>
                    </div>
                </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

</div><!--end card-body-->
</div><!--end card-->
</div><!--end col-->

    @stop

    @section('scripts')


        <script src="{{asset('frogetor/assets/plugins/ticker/jquery.jConveyorTicker.min.js')}}"></script>
        <script src="{{asset('frogetor/assets/plugins/peity-chart/jquery.peity.min.js')}}"></script>
        <script src="{{asset('frogetor/assets/plugins/chartjs/chart.min.js')}}"></script>
        <script src="{{asset('frogetor/assets/pages/jquery.profile.init.js')}}"></script>
        <script src="{{asset('frogetor/assets/plugins/custombox/custombox.min.js')}}"></script>
        <script src="{{asset('frogetor/assets/plugins/custombox/custombox.legacy.min.js')}}"></script>

        <script src="{{asset('frogetor/assets/pages/jquery.modal-animation.js')}}"></script>


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
    <script>
        $(document).ready(function(){
            $('#go').click(function(){
            var bla = $('#rnum').val();
              console.log(bla);
           });
        });
        </script>

<script>
    //   autocomplete
    $(document).ready(function(){
    //console.log("HI");
    $('#rnum').autocomplete({

        source: function(request, response) {
          $.getJSON("{{ url('/de_registar/student/profile/id') }}",
           {rnum:$("#rnum").val()},
              response);
        },
        minLength: 1,
        width: "100%",
        open: function(event,ui){
            var autocomplete=$(".ui-autocomplete:visible");
            var oldTop=autocomplete.offset().top;
            var newTop = oldTop-$("#rnum").height()+25;
            autocomplete.css("top", newTop);
        },
        select:function(event,ui){
            console.log(ui);
            // var father_name = ui.item.father_name;
            // var father_mobile = ui.item.father_mobile;
            // var father_email = ui.item.father_email;
            // var father_work_address = ui.item.father_work_address;
            // var parent_ocupation = ui.item.parent_ocupation;

            // document.getElementById('father_name').value = father_name;
            // document.getElementById('father_email').value = father_email;
            // document.getElementById('father_mobile').value = father_mobile;
            // document.getElementById('father_address_of_work_place').value = father_work_address;
            // document.getElementById('father_occupation').value = parent_ocupation;
         },
    });
     });
          </script>
    @stop


