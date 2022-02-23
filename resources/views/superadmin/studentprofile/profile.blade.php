
@extends('superadmin.layout.master')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title" style="margin-bottom: 15px;">Student Profile</h4>
                        <div class="row" style="margin-bottom: 35px;">

                            {{-- <div class="input-group col-6">
                                <input type="text" class="form-control" aria-label="" id="rnum" placeholder="Enter Student Register Number.">
                                <span class="input-group-append">
                                    <button class="btn btn-primary" type="button" id="go">Go</button>
                                </span>
                            </div> --}}
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
                                                            <img src="{{asset('/image/student')}}/{{$stu_data[0]->stu_img}}" width="110" height="110" id="stu_image" alt="" class="rounded-circle">
                                                        </div>
                                                        <div class="fro_profile_user-detail">
                                                            <h5 class="fro_user-name" id="stu_name">{{$stu_data[0]->student_full_name}}</h5>
                                                            <p class="mb-0 fro_user-name-post" id="stu_id_no">{{$stu_data[0]->student_id}}</p>
                                                            <p class="mb-0 fro_user-name-post" id="stu_sc">{{$school->institute_name}}</p>
                                                            @if ($data->prmy != 1)
                                                            <p class="mb-0 fro_user-name-post" id="stu_grd">{{$grd->grade}}</p>
                                                             @else
                                                             <p class="mb-0 fro_user-name-post" id="stu_grd">Nursary</p>
                                                            @endif
                                                            @if ($stu_data[0]->syllubus_type == 1)
                                                            <p class="mb-0 fro_user-name-post" id="stu_sub_type">Local Sylabus</p>
                                                            @elseif ($stu_data[0]->syllubus_type == 2)
                                                            <p class="mb-0 fro_user-name-post" id="stu_sub_type">Edexl Sylabus</p>
                                                            @elseif ($stu_data[0]->syllubus_type == 0)
                                                            <p class="mb-0 fro_user-name-post" id="stu_sub_type">Nursary</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div><!--end col-->

                                                <div class="col-lg-4 mb-3 mb-lg-0">
                                                    <div class="header-title">Parent 1 Contact Details</div>
                                                    <div class="row">
                                                        <div class="col-7">
                                                            <div class="seling-report">
                                                                <ul class="list-inline mb-0">
                                                                    <li class="mb-2 list-inline-item font-13" style="color: rgb(33, 78, 202);"><i class="mdi mdi-label mr-2" style="color: rgb(33, 78, 202);">{{$father->parent_name}}</i></li>
                                                                    <li class="mb-2 list-inline-item font-13" style="color: rgb(33, 78, 202);"><i class="mdi mdi-label mr-2" style="color: rgb(33, 78, 202);">{{$father->parent_mobile}}</i></li>
                                                                    <li class="mb-2 list-inline-item font-13" style="color: rgb(33, 78, 202);"><i class="mdi mdi-label mr-2" style="color: rgb(33, 78, 202);"></i>{{$father->parent_email}}</li>
                                                                </ul>

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div><!--end col-->
                                                <div class="col-lg-4 mb-3 mb-lg-0">
                                                    <div class="header-title">Parent 2 Contact Details</div>
                                                    <div class="row">
                                                        <div class="col-7">
                                                            <div class="seling-report">
                                                                <ul class="list-inline mb-0">
                                                                    <li class="mb-2 list-inline-item font-13" style="color: rgb(33, 78, 202);"><i class="mdi mdi-label mr-2" style="color: rgb(33, 78, 202);">{{$mother->parent_name}}</i></li>
                                                                    <li class="mb-2 list-inline-item font-13" style="color: rgb(33, 78, 202);"><i class="mdi mdi-label mr-2" style="color: rgb(33, 78, 202);">{{$mother->parent_mobile}}</i></li>
                                                                    <li class="mb-2 list-inline-item font-13" style="color: rgb(33, 78, 202);"><i class="mdi mdi-label mr-2" style="color: rgb(33, 78, 202);"></i>{{$mother->parent_email}}</li>
                                                                </ul>

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div><!--end col-->

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

                                                                @foreach ($stu_img as $key => $value)
                                                                <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                                                                    <div class="text-center">

                                                                        <img src="{{asset('/image/student')}}/{{$value->pro_image}}" alt="user" class="" width="220" height="210" style="margin-top: -35pt;">

                                                                    </div>
                                                                </div>
                                                                @endforeach

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
                                <a class="nav-link active" id="tabbasic" data-toggle="tab" href="#home-1" role="tab">Inquery Infomation</a>
                            </li>
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link" data-toggle="tab" id="tabprofile" href="#profile-1" role="tab">Application Infomation</a>
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
                                                <th>Inquery Number</th>
                                                <td>{{$data->inq_number}}</td>
                                            </tr>
                                            <tr>
                                                <th>Student Full Name</th>
                                                <td>{{$data->student_full_name}}</td>
                                            </tr>
                                            <tr>
                                                <th>Name With Initials</th>
                                                <td>{{$data->nwi}}</td>
                                            </tr>
                                            <tr>
                                                <th>Date of Birth</th>
                                                <td>{{$data->dob}}</td>
                                            </tr>
                                            <tr>
                                                <th>Gender</th>
                                                <td>@if ($data->gender == 1)
                                                    <span class="">Male</span>
                                                   @elseif ($data->gender == 2)
                                                    <span class="" >Female</span>
                                                   @endif</td>
                                            </tr>
                                            <tr>
                                                <th>Religion</th>
                                                <td>{{$data->religion}}</td>
                                            </tr>
                                            <tr>
                                                <th>Nationality</th>
                                                <td>{{$data->nationality}}</td>
                                            </tr>



                                        </table>
                                    </div>


                                    <div class="col-lg-6">
                                        <table class="table table-hover mb-0">

                                            <tr>
                                                <th>Contact Number</th>
                                                <td>{{$data->contact_number}}</td>
                                            </tr>
                                            <tr>
                                                <th>Address</th>
                                                <td>{{$data->address}}</td>
                                            </tr>
                                            <tr>
                                                <th>Inquery Type</th>
                                                <td>{{$data->nationality}}</td>
                                            </tr>
                                            <tr>
                                                <th>Inquery Status</th>
                                                <td>@if ($data->inq_status == 1)
                                                    <span class="badge badge-danger" style="background-color: purple;">Investigating</span>
                                                   @elseif ($data->inq_status == 2)
                                                    <span class="badge badge-danger" style="background-color: orange;">Confirm</span>
                                                    @elseif ($data->inq_status == 3)
                                                    <span class="badge badge-danger" style="background-color: red;">Not Comming</span>
                                                    @elseif ($data->inq_status ==4)
                                                    <span class="badge badge-danger" style="background-color: green;">Student</span>
                                                   @endif</td>
                                            </tr>
                                            <tr>
                                                <th>Student Status</th>
                                                <td>@if ($data->stu_status == 1)
                                                    <span class="badge badge-danger" style="background-color: purple;">Investigating Step</span>
                                                   @elseif ($data->stu_status == 2)
                                                    <span class="badge badge-danger" style="background-color: orange;">Application Step</span>
                                                    @elseif ($data->stu_status == 3)
                                                    <span class="badge badge-danger" style="background-color: blue;">Interview Step</span>
                                                    @elseif ($data->stu_status == 4)
                                                    <span class="badge badge-danger" style="background-color: green;">Registration Step</span>
                                                    @elseif ($data->stu_status == 5)
                                                    <span class="badge badge-danger" style="background-color: green;">Student</span>
                                                    @elseif ($data->stu_status == 6)
                                                    <span class="badge badge-danger" style="background-color: red;">Leved</span>
                                                   @endif</td>
                                            </tr>

                                        </table>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <a type="button" data-toggle="tab" id="homebtnext"  href="#profile-1" class="btn btn-outline-info waves-effect waves-light" onClick="refresh1(this)" role="tab"><i class="fas fa-chevron-right" style="margin-right: 5px;"></i>Next</a>
                                            <a type="button" href="{{url('superadmin/student/profile')}}" class="btn btn-primary waves-effect waves-light" style="margin-left: 5px;"><i class="mdi mdi-close" style="margin-right: 5px;"></i>Close</a>

                                        </div>
                                    </div>
                                </div>



                            </div>
                            <div class="tab-pane p-3" id="profile-1" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <table class="table table-hover mb-0">
                                            <tr>
                                                <th>Application Payment</th>
                                                @if ($data->application_status == 1)
                                                <td> Yes </td>
                                                @else
                                                <td> No </td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <th>Interview Type</th>
                                                @if ($data->interview_type == 1)
                                                <td> Online </td>
                                                @elseif ($data->interview_type ==2)
                                                <td> Over the Phone </td>
                                                @elseif ($data->interview_type == 3)
                                                <td> Physicaly </td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <th>Interview Status</th>
                                                @if ($data->interview_status == 1)
                                                <td> Pass </td>
                                                @elseif ($data->interview_status ==2)
                                                <td> Fail </td>
                                                @endif
                                            </tr>

                                            <tr>
                                                <th>Appeal Process</th>
                                                @if ($data->re_interview_apply == 1)
                                                <td> Yes </td>
                                                @elseif ($data->re_interview_apply ==2)
                                                <td> No </td>
                                                @endif
                                            </tr>

                                        </table>
                                    </div>


                                    <div class="col-lg-6">

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
                                                <th>School</th>
                                                <td>{{$school->institute_name}}</td>
                                            </tr>
                                            <tr>
                                                <th>Grade</th>
                                                @if ($data->prmy!= 1)
                                                <td>{{$grd->grade}}</td>
                                                @else
                                                <td>Nursary</td>
                                                @endif

                                            </tr>
                                            <tr>
                                                <th>Registration Date</th>
                                                <td>{{$data->registration_date}}</td>
                                            </tr>
                                            <tr>
                                                <th>GIS Pre School Attend</th>
                                                @if ($data->pre_sc_att == 1)
                                                <td>Yes</td>
                                                @else
                                                <td>No</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <th>GIS Pre School SID Number</th>
                                                <td>{{$data->pre_school_id}}</td>
                                            </tr>
                                            <tr>
                                                <th>Records</th>
                                                <td>{{$data->recod}}</td>
                                            </tr>
                                            <tr>
                                                <th>Is Student ID issue?</th>
                                                    @if ($data->is_id_issue == 1)
                                                    <td>Yes</td>
                                                    @else
                                                    <td>No</td>
                                                    @endif
                                            </tr>
                                            <tr>
                                                <th>Is ID Fee Paid ?</th>
                                                    @if ($data->is_id_fee_paid == 1)
                                                    <td>Yes</td>
                                                    @else
                                                    <td>No</td>
                                                    @endif
                                            </tr>
                                            <tr>
                                                <th>Syllubus Type</th>
                                                    @if ($data->syllubus_type == 1)
                                                    <td>Local</td>
                                                    @else
                                                    <td>Edexcel</td>
                                                    @endif
                                            </tr>
                                            <tr>
                                                <th>Payment Type</th>
                                                    @if ($data->pamt_typ == 1)
                                                    <td>Anualy</td>
                                                    @elseif ($data->pamt_typ ==2)
                                                    <td>Qutar</td>
                                                    @elseif ($data->pamt_typ ==3)
                                                    <td>Monthly</td>
                                                    @endif
                                            </tr>


                                        </table>

                                        <div class="form-group row">
                                            <label for="gis_sid" class="col-form-label text-left" style="color: rgb(0, 3, 153); margin-left:20pt; margin-top:10pt;">Emergency Contact Details</label>
                                        </div>

                                        <table class="table table-hover mb-0">
                                            <tr>
                                                <th>Name</th>
                                                <td>{{$data->emergency_contact_name}}</td>
                                            </tr>
                                            <tr>
                                                <th>NIC Number</th>
                                                <td>{{$data->emergency_contact_nic}}</td>
                                            </tr>
                                            <tr>
                                                <th>Mobile</th>
                                                <td>{{$data->emergency_contact_mobile}}</td>
                                            </tr>
                                            <tr>
                                                <th>Relationship</th>
                                                <td>{{$data->emergency_contact_relationship}}</td>
                                            </tr>

                                        </table>
                                    </div>



                                    <div class="col-lg-6">


                                        <div class="form-group row">
                                            <label for="gis_sid" class="col-form-label text-left" style="color: rgb(0, 3, 153); margin-left:20pt;">Father Details</label>
                                        </div>

                                        <table class="table table-hover mb-0">
                                            <tr>
                                                <th>Name</th>
                                                <td>{{$father->parent_name}}</td>
                                            </tr>
                                            <tr>
                                                <th>NIC Number</th>
                                                <td>{{$father->parent_nic}}</td>
                                            </tr>
                                            <tr>
                                                <th>Mobile</th>
                                                <td>{{$father->parent_mobile}}</td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td>{{$father->parent_email}}</td>
                                            </tr>
                                            <tr>
                                                <th>Occupation</th>
                                                <td>{{$father->parent_ocupation}}</td>
                                            </tr>
                                            <tr>
                                                <th>Address of Work Place</th>
                                                <td>{{$father->parent_work_address}}</td>
                                            </tr>

                                        </table>

                                        <div class="form-group row">
                                            <label for="gis_sid" class="col-form-label text-left" style="color: rgb(0, 3, 153); margin-left:20pt;">Mother Details</label>
                                        </div>

                                        <table class="table table-hover mb-0">
                                            <tr>
                                                <th>Name</th>
                                                <td>{{$mother->parent_name}}</td>
                                            </tr>
                                            <tr>
                                                <th>NIC Number</th>
                                                <td>{{$mother->parent_nic}}</td>
                                            </tr>
                                            <tr>
                                                <th>Mobile</th>
                                                <td>{{$mother->parent_mobile}}</td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td>{{$mother->parent_email}}</td>
                                            </tr>
                                            <tr>
                                                <th>Occupation</th>
                                                <td>{{$mother->parent_ocupation}}</td>
                                            </tr>
                                            <tr>
                                                <th>Address of Work Place</th>
                                                <td>{{$mother->parent_work_address}}</td>
                                            </tr>

                                        </table>
                                    </div>


                                    <div class="row">
                                        <div class="col-lg-12">

                                            <a type="button" data-toggle="tab" id="setprebtn" href="#profile-1" class="btn btn-outline-info waves-effect waves-light" onClick="refresh4(this)"  role="tab"><i class="fas fa-chevron-left" style="margin-right: 5px;"></i>Previous</a>

                                    <a type="button" href="{{url('superadmin/student/profile')}}" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-close" style="margin-right: 5px;"></i>Close</a>
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





        @if ($data->prmy == 1)
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                        <div class="col-lg-6">

                                <div class="form-group row">
                                    <label for="gis_sid" class="col-form-label text-left" style="color: rgb(0, 3, 153); margin-left:20pt;">Special need for Child</label>
                                </div>

                                <table class="table table-hover mb-0">
                                    <tr>
                                        <th>Has any Disability or Medical Condition</th>
                                        @if ($data->any_medi_con == 1)
                                        <td>Yes</td>
                                        @else
                                        <td>No</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <th>Details about Medical Condition</th>
                                        <td>{{$data->medi_con_det}}</td>
                                    </tr>
                                    <tr>
                                        <th>need any Special attention ?</th>
                                        <td>{{$data->special_attention}}</td>
                                    </tr>

                                </table>

                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <label for="gis_sid" class="col-form-label text-left" style="color: rgb(0, 3, 153); margin-left:20pt;">Other Details</label>
                            </div>

                            <table class="table table-hover mb-0">
                                <tr>
                                    <th>Have any Siblins</th>
                                    @if ($data->have_siblin == 1)
                                    <td>Yes</td>
                                    @else
                                    <td>No</td>
                                    @endif
                                </tr>
                                <tr>
                                    <th>Siblin's Details</th>
                                    <td>{{$data->siblin_details}}</td>
                                </tr>
                                <tr>
                                    <th>How does the child spend leisure time</th>
                                    <td>{{$data->leisure}}</td>
                                </tr>
                                <tr>
                                    <th>With whome does the child spend leisure time</th>
                                    <td>{{$data->whome_les}}</td>
                                </tr>

                            </table>
                        </div>
                    </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

        @endif








        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">Academic Awards Table</h4>


                        <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th style="width: 90%;">Awards</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($acc_award as $acc)
                                <tr>
                                    <td>{{$acc->title}}</td>
                                    <td>
                                        <a href="{{url('superadmin/students/awards/view')}}/{{$acc->id}}" type="button" class="btn btn-dropbox">
                                            <i class="fab far fa-eye" style="color: white; font-size:8px;"></i>
                                        </a>

                                    </td>
                                </tr>
                                @endforeach
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

                        <h4 class="mt-0 header-title">Non Academic Awards Table</h4>


                        <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th style="width: 90%;">Awards</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($non_acc_award as $no_acc)
                                <tr>
                                    <td>{{$no_acc->title}}</td>
                                    <td>
                                        <a href="{{url('/superadmin/nonacc/students/awards/view')}}/{{$no_acc->id}}" type="button" class="btn btn-dropbox">
                                            <i class="fab far fa-eye" style="color: white; font-size:8px;"></i>
                                        </a>

                                    </td>
                                </tr>
                                @endforeach
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
                                <th style="width: 90%;">Subject</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($complain as $com)
                                <tr>
                                    <td>{{$com->title}}</td>
                                    <td>
                                        <a href="{{url('superadmin/students/complaints/view')}}/{{$com->title}}" type="button" class="btn btn-dropbox">
                                            <i class="fab far fa-eye" style="color: white; font-size:8px;"></i>
                                        </a>

                                    </td>
                                </tr>
                                @endforeach
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
          $.getJSON("{{ url('/superadmin/student/profile/id') }}",
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


