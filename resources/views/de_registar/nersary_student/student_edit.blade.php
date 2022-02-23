<link href="{{asset('frogetor/assets/plugins/dropify/css/dropify.min.css')}}" rel="stylesheet">

<style>
    .ui-autocomplete {
        max-height: 150px;
        overflow-y: auto;   /* prevent horizontal scrollbar */
        overflow-x: hidden; /* add padding to account for vertical scrollbar */
    }
</style>

@extends('de_registar.layout.master')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">View registration Process</h4>



                        <!-- Nav tabs -->
                        <ul class="nav nav-pills nav-justified" role="tablist">
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link active" id="tabbasic" data-toggle="tab" href="#home-1" role="tab">Inquery Step</a>
                            </li>
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link" data-toggle="tab" id="tabprofile" href="#profile-1" role="tab">Application Step</a>
                            </li>
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link" data-toggle="tab" id="tabsetting" href="#settings-1" role="tab">Registration Step</a>
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
                                            <a type="button" href="{{url('de_registar/school/students/table')}}" class="btn btn-primary waves-effect waves-light" style="margin-left: 5px;"><i class="mdi mdi-close" style="margin-right: 5px;"></i>Close</a>

                                        </div>
                                    </div>
                                </div>



                            </div>
                            <div class="tab-pane p-3" id="profile-1" role="tabpanel">
                                <form action="{{url('/de_registar/applications/update')}}/{{$data->id}}" method="POST" autocomplete="off" id="regForm2"  enctype="multipart/form-data" >
                                    @csrf
                                <div class="row">

                                    <div class="col-lg-6">
                                        <table class="table table-hover mb-0">
                                            <tr>
                                                <th>Application Payment</th>
                                                <td>@if ($data->application_status == 2)
                                                    <span >No</span>
                                                   @elseif ($data->stu_status == 2)
                                                    <span>Yes</span>
                                                   @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Interview Type</th>
                                                <td>@if ($data->interview_type == 1)
                                                    <span >Online</span>
                                                   @elseif ($data->interview_type == 2)
                                                    <span>Over the Phone</span>
                                                   @elseif ($data->interview_type == 3)
                                                    <span>Physicaly</span>
                                                   @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Interview Status</th>
                                                <td>@if ($data->interview_status == 1)
                                                    <span >Pass</span>
                                                   @elseif ($data->interview_status == 2)
                                                    <span>Fail</span>
                                                   @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Appeal Process</th>
                                                <td>@if ($data->re_interview_apply == 1)
                                                    <span >Yes</span>
                                                   @elseif ($data->re_interview_apply == 2)
                                                    <span>No</span>
                                                   @endif
                                                </td>
                                            </tr>
                                        </table>
                                    </div>

                                    <div class="col-lg-6">
                                        <table class="table table-hover mb-0">
                                            <tr>
                                                <th>Recipt Number</th>
                                                <td><span>{{$data->resipt_number}}</span></td>
                                            </tr>
                                            <tr>
                                                <th>Recipt Image</th>
                                                <td><img src="{{url('image/ricipt')}}/{{$data->resipt_image}}" height="250" width="250" alt=""></td>
                                            </tr>
                                        </table>
                                    </div>



                                    <div class="row">
                                        <div class="col-lg-12">
                                            <a type="button" data-toggle="tab" id="proprebtn" href="#home-1" onClick="refresh2(this)" class="btn btn-outline-info waves-effect waves-light"  role="tab"><i class="fas fa-chevron-left" style="margin-right: 5px;"></i>Previous</a>
                                            <a type="button" data-toggle="tab" id="pronextbtn" href="#settings-1" onClick="refresh3(this)" class="btn btn-outline-info waves-effect waves-light"  role="tab"><i class="fas fa-chevron-right" style="margin-right: 5px;"></i>Next</a>
                                            <a type="button" href="{{url('de_registar/school/students/table')}}" class="btn btn-primary waves-effect waves-light" style="margin-left: 5px;"><i class="mdi mdi-close" style="margin-right: 5px;"></i>Close</a>
                                            @if ($st == 5 || $st == 6)
                                            @else
                                            <button type="submit" id="x" class="btn btn-success waves-effect waves-light" style="color: white;"><i class="mdi mdi-check-all mr-2"></i>Submit</button>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </form>
                            </div>

                            <div class="tab-pane p-3" id="settings-1" role="tabpanel">
                                <form action="{{url('/de_registar/nursary/student/update')}}/{{$data->id}}" method="POST" autocomplete="off" id="regForm3"  enctype="multipart/form-data" >
                                    @csrf
                                <div class="row">

                                    <div class="col-lg-6">

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label text-right">School</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="institute" id="institute">
                                                    <option value="">Select </option>
                                                    @foreach($institute as $value)
                                                    <option value="{{ $value->id }}" {{ $value->id == $data->institute ? 'selected' : '' }}>{{ $value->institute_name }}</option>
                                                    @endForeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label text-right">Grade</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="grade" id="grade">
                                                    <option value="">Select </option>
                                                    @foreach($grade as $value)
                                                    <option value="{{ $value->id }}" {{ $value->id == $data->grade_now ? 'selected' : '' }}>{{ $value->grade }}</option>
                                                    @endForeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="register_date" class="col-sm-3 col-form-label text-right">Registration Date</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="date" value="{{$data->registration_date}}" id="register_date" name="register_date">

                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label text-right">Is Student ID issue?</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="is_id_issue" id="is_id_issue">
                                                    <option value="">Select</option>
                                                    <option value="1" {{$data->is_id_issue=='1'?'selected':''}}>Yes</option>
                                                    <option value="2" {{$data->is_id_issue=='2'?'selected':''}}>No</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label text-right">Is ID Fee Paid ?</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="is_id_paid" id="is_id_paid">
                                                    <option value="">Select</option>
                                                    <option value="1" {{$data->is_id_fee_paid=='1'?'selected':''}}>Yes</option>
                                                    <option value="2" {{$data->is_id_fee_paid=='2'?'selected':''}}>No</option>
                                                </select>
                                            </div>
                                        </div>



                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label text-right">Payment Type</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="paymnt_type" id="paymnt_type">
                                                    <option value="">Select</option>
                                                    <option value="1" {{$data->pamt_typ=='1'?'selected':''}}>Anualy</option>
                                                    <option value="2" {{$data->pamt_typ=='2'?'selected':''}}>Qutar</option>
                                                    <option value="3" {{$data->pamt_typ=='3'?'selected':''}}>Monthly</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="stu_img" class="col-sm-3 col-form-label text-right">Student Image</label>
                                            <div class="col-sm-9">
                                                <input type="file" id="input-file-now" class="dropify" value="{{$data->stu_img}}" name="stu_img" id="stu_img" data-default-file="{{url('image/student/')}}/{{$data->stu_img}}"/>

                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label text-right">Student Status</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="student_status" id="student_status">
                                                    <option value="">Select</option>
                                                    <option value="5" {{$data->stu_status=='5'?'selected':''}}>Student</option>
                                                    <option value="6" {{$data->stu_status=='6'?'selected':''}}>Leave</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 text-left"></label>
                                            <label for="gis_sid" class="col-sm-9 text-left" style="color: black;">Special need for Child</label>
                                            <div class="form-group row">

                                            </div>

                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label text-right">Has any Disability or Medical Condition</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="any_medi_con" id="any_medi_con" >
                                                    <option value="">Select</option>
                                                    <option value="1" {{$data->any_medi_con=='1'?'selected':''}}>Yes</option>
                                                    <option value="2" {{$data->any_medi_con=='2'?'selected':''}}>No</option>
                                                </select>

                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="medi_con_det" class="col-sm-3 col-form-label text-right">Details about Medical Condition</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" rows="2" id="medi_con_det" name="medi_con_det">{{$data->medi_con_det}}</textarea>

                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="special_attention" class="col-sm-3 col-form-label text-right">need any Special attention ?</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" rows="2" id="special_attention" name="special_attention">{{$data->special_attention}}</textarea>

                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 text-left"></label>
                                            <label for="gis_sid" class="col-sm-9 text-left" style="color: black;">Other Details</label>
                                            <div class="form-group row">

                                            </div>

                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label text-right">Have any Siblins</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="have_siblin" id="have_siblin">
                                                    <option value="">Select</option>
                                                    <option value="1" {{$data->have_siblin=='1'?'selected':''}}>Yes</option>
                                                    <option value="2" {{$data->have_siblin=='2'?'selected':''}}>No</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="siblin_details" class="col-sm-3 col-form-label text-right">Siblin's Details</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" rows="2" id="siblin_details" name="siblin_details">{{$data->siblin_details}}</textarea>

                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="leisure" class="col-sm-3 col-form-label text-right">How does the child spend leisure time</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" rows="2" id="leisure" name="leisure" >{{$data->leisure}}</textarea>

                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="whome_les" class="col-sm-3 col-form-label text-right">With whome does the child spend leisure time</label>
                                            <div class="col-sm-9">

                                                <textarea class="form-control" rows="2" id="whome_les" name="whome_les">{{$data->whome_les}}</textarea>

                                            </div>
                                        </div>

                                        <hr>

                                        <div class="form-group row">
                                            <label for="gis_sid" class="col-form-label text-left" style="color: black;">Emergency Contact Details</label>
                                        </div>

                                        <div class="form-group row">
                                            <label for="nic" class="col-sm-3 col-form-label text-right">NIC</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" value="{{$data->emergency_contact_nic}}" name="nic" id="nic">

                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="name" class="col-sm-3 col-form-label text-right">Name</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" value="{{$data->emergency_contact_name}}" name="name" id="name">

                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="mobile" class="col-sm-3 col-form-label text-right">Mobile</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" value="{{$data->emergency_contact_mobile}}" name="mobile" id="mobile">

                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="relationship" class="col-sm-3 col-form-label text-right">Relationship</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" value="{{$data->emergency_contact_relationship}}" name="relationship" id="relationship">

                                            </div>
                                        </div>

                                        <hr>
                                    </div>




                                    <div class="col-lg-6">
                                        {{-- <hr> --}}






                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 text-left"></label>
                                            <label for="gis_sid" class="col-sm-9 text-left" style="color: black;">Father's Infomation</label>
                                            <div class="form-group row">

                                            </div>

                                        </div>


                                        {{-- <hr> --}}
                                        <input class="form-control" type="hidden" value="" name="prt_id" id="prt_id">


                                        <div class="form-group row">
                                            <label for="father_nic" class="col-sm-3 col-form-label text-right">NIC</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" value="{{$fa->parent_nic}}" name="father_nic" id="father_nic">

                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="father_name" class="col-sm-3 col-form-label text-right">Name</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" value="{{$fa->parent_name}}" name="father_name" id="father_name">

                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="father_email" class="col-sm-3 col-form-label text-right">Email</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" value="{{$fa->parent_email}}" name="father_email" id="father_email">

                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="father_mobile" class="col-sm-3 col-form-label text-right">Mobile</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" value="{{$fa->parent_mobile}}" name="father_mobile" id="father_mobile">

                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="father_occupation" class="col-sm-3 col-form-label text-right">Occupation</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" value="{{$fa->parent_ocupation}}" name="father_occupation" id="father_occupation">

                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="father_address_of_work_place" class="col-sm-3 col-form-label text-right">Address of Work Place</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" value="{{$fa->parent_work_address}}" name="father_address_of_work_place" id="father_address_of_work_place">

                                            </div>
                                        </div>





                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 text-left"></label>
                                            <label for="gis_sid" class="col-sm-9 text-left" style="color: black;">Mother's Infomation</label>
                                            <div class="form-group row">

                                            </div>

                                        </div>


                                        {{-- <hr> --}}
                                        <input class="form-control" type="hidden" value="" name="prt_id" id="prt_id">


                                        <div class="form-group row">
                                            <label for="mother_nic" class="col-sm-3 col-form-label text-right">NIC</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" value="{{$mo->parent_nic}}" name="mother_nic" id="mother_nic">

                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="mother_name" class="col-sm-3 col-form-label text-right">Name</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" value="{{$mo->parent_name}}" name="mother_name" id="mother_name">

                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="mother_email" class="col-sm-3 col-form-label text-right">Email</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" value="{{$mo->parent_email}}" name="mother_email" id="mother_email">

                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="mother_mobile" class="col-sm-3 col-form-label text-right">Mobile</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" value="{{$mo->parent_mobile}}" name="mother_mobile" id="mother_mobile">

                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="mother_occupation" class="col-sm-3 col-form-label text-right">Occupation</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" value="{{$mo->parent_ocupation}}" name="mother_occupation" id="mother_occupation">

                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="mother_address_of_work_place" class="col-sm-3 col-form-label text-right">Address of Work Place</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" value="{{$mo->parent_work_address}}" name="mother_address_of_work_place" id="mother_address_of_work_place">

                                            </div>
                                        </div>



                                    {{-- </div> --}}

                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">

                                            <a type="button" data-toggle="tab" id="setprebtn" href="#profile-1" class="btn btn-outline-info waves-effect waves-light" onClick="refresh4(this)"  role="tab"><i class="fas fa-chevron-left" style="margin-right: 5px;"></i>Previous</a>

                                            <button type="submit" id="x" class="btn btn-success waves-effect waves-light" style="color: white;"><i class="mdi mdi-check-all mr-2"></i>Submit</button>


                                            <a type="button" href="{{url('de_registar/school/students/table')}}" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-close" style="margin-right: 5px;"></i>Close</a>
                                        </div>
                                    </div>
                                </div>
                                </form>
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

            <!-- Comformation 2-->
{{-- <div class="message-box message-box-info animated fadeIn" data-sound="alert" id="message-box-conformb">
    <div class="mb-container">
      <div class="mb-middle">
        <div class="mb-title"><span class="fa fa-question">&nbsp;</span>Conformation</div>
        <div class="mb-content">
          <p id="test1" style="text-align:justify;">Do You want to remove this data ?</p>
        </div>

        <input type="hidden" id="tbl_rw_id" name="tbl_rw_id">
            <input type="hidden" id="tbl_rw_ttn1" name="tbl_rw_ttn1">
            <input type="hidden" id="tbl_rw_ttn2" name="tbl_rw_ttn2">

        <div class="mb-footer">
          <div class="pull-right">
            <a href="#" class="btn btn-default btn-lg cnfmsg" id="cnfmid" name="">Yes</a>
            <a href="#" class="btn btn-default btn-lg mb-control-close clse" id="clseid" >No</a>
          </div>
        </div>
      </div>
    </div>
  </div> --}}

  <div class="modal fade bs-example-modal-center" tabindex="-1" data-sound="alert" id="message-box-conformb" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="exampleModalLabel">Conformation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="mb-content">
                <p style="text-align: center;font-size: 14pt;">Do You want to remove this data ?</p>
              </div>

              <input type="hidden" id="tbl_rw_id" name="tbl_rw_id">
                  <input type="hidden" id="tbl_rw_ttn1" name="tbl_rw_ttn1">
                  <input type="hidden" id="tbl_rw_ttn2" name="tbl_rw_ttn2">

              <div class="justify-content-center mb-footer" >
                <div class="row">
                <div class="col-md-4"></div>
                <div class="pull-right col-md-4" style="margin-bottom: 5px;">
                  <a href="#" class="btn btn-danger btn-lg cnfmsg" id="cnfmid" name="" style="height: 30pt; margin:5px;">Yes</a>
                  <a href="#" class="btn btn-info btn-lg mb-control-close clse" id="clseid" style="height: 30pt;margin:5px;">No</a>
                </div>
                <div class="col-md-4"></div>
            </div>
              </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

    </div>


    @stop

    @section('scripts')


    <script src="{{asset('frogetor/assets/plugins/dropify/js/dropify.min.js')}}"></script>
    <script src="{{asset('frogetor/assets/pages/jquery.form-upload.init.js')}}"></script>

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


$(document).ready(function() {
$("#regForm2").validate({
    rules: {
        recipt_no: {
            required: true,
            maxlength: 18,
        },

    },
    messages: {
        recipt_no: {
            required: "Recipt Number is required",
            maxlength: "Recipt Number cannot be more than 18 characters"
        },
    }
});


});

$(document).ready(function() {
$("#regForm3").validate({
    rules: {
        institute: {
            required: true,
        },
        grade: {
            required: true,
        },
        register_date: {
            required: true,
        },
        paymnt_type: {
            required: true,
        },
        is_id_paid: {
            required: true,
        },
        is_id_issue: {
            required: true,
        },
        gis_pr_sc_at: {
            required: true,
        },
        nic: {
            required: true,
            maxlength: 12,
            minlength: 10,
        },
        name: {
            required: true,
            maxlength: 100
        },
        relationship: {
            required: true,
            maxlength: 100,
        },
        mobile: {
            required: true,
            maxlength: 10,
            minlength: 10,
            number: true,
        },
        father_nic: {
            required: true,
            maxlength: 12,
            minlength: 10,
        },
        father_name: {
            required: true,
            maxlength: 100
        },
        father_email: {
            email: true,
            required: true,
            maxlength: 100,
        },
        father_mobile: {
            required: true,
            maxlength: 10,
            minlength: 10,
        },
        father_occupation: {
            required: true,
            maxlength: 50,
        },
        father_address_of_work_place: {
            required: true,
            maxlength: 120,
        },
        mother_nic: {
            required: true,
            maxlength: 12,
            minlength: 10,
        },
        mother_name: {
            required: true,
            maxlength: 100
        },
        mother_email: {
            email: true,
            required: true,
            maxlength: 100,
        },
        mother_mobile: {
            required: true,
            maxlength: 10,
            minlength: 10,
        },
        mother_occupation: {
            required: true,
            maxlength: 50,
        },
        mother_address_of_work_place: {
            required: true,
            maxlength: 120,
        },
        student_status: {
            required: true,
        },


    },
    messages: {
        institute: {
            required: "School Name is required",
        },
        grade: {
            required: "Grade is required"
        },
        register_date: {
            required: "Date is required",
        },
        paymnt_type: {
            required: "Payment Type is required"
        },
        is_id_paid: {
            required: "Student ID Payment Status is required"
        },
        is_id_issue: {
            required: "Student ID Issue Status is required"
        },
        gis_pr_sc_at: {
            required: "GIS Pre School Attend? Status is required"
        },
        nic: {
            required: "Emargancy Contact NIC is required",
            maxlength: "Emargancy Contact NIC cannot be more than 12 characters",
            minlength: "Emargancy Contact NIC cannot be less than 10 characters"
        },
        name: {
            required: "Emargancy Contact Name is required",
            maxlength: "Emargancy Contact Name cannot be more than 100 characters"
        },
        mobile: {
            required: "Emargancy Contact Mobile Number is required",
            maxlength: "Emargancy Contact Mobile Number cannot be more than 10 characters",
            minlength: "Emargancy Contact Mobile cannot be less than 10 characters"
        },
        relationship: {
            required: "Emargancy Contact Relationship is required",
            maxlength: "Emargancy Contact Relationship cannot be more than 100 characters"
        },
        father_nic: {
            required: "Father's NIC is required",
            maxlength: "Father's NIC cannot be more than 12 characters",
            minlength: "Father's NIC cannot be less than 10 characters"
        },
        father_name: {
            required: "Father's Name is required",
            maxlength: "Father's Name cannot be more than 100 characters"
        },
        father_email: {
            required: "Father's email is required",
            maxlength: "Father's email cannot be more than 100 characters"
        },
        father_mobile: {
            required: "Father's Contact Number is required",
            maxlength: "Father's Contact Number cannot be more than 10 characters",
            minlength: "Father's Contact cannot be less than 10 characters"
        },
        father_occupation: {
            required: "Father's Ocupation is required",
            maxlength: "Father's Ocupation cannot be more than 100 characters",
        },
        father_address_of_work_place: {
            required: "Father's Address of Work Place is required",
            maxlength: "Father's Address of Work Place cannot be more than 50 characters"
        },
        mother_nic: {
            required: "Mother's NIC is required",
            maxlength: "Mother's NIC cannot be more than 12 characters",
            minlength: "Mother's NIC cannot be less than 10 characters"
        },
        mother_name: {
            required: "Mother's Name is required",
            maxlength: "Mother's Name cannot be more than 100 characters"
        },
        mother_email: {
            required: "Mother's email is required",
            maxlength: "Mother's email cannot be more than 100 characters"
        },
        mother_mobile: {
            required: "Mother's Contact Number is required",
            maxlength: "Mother's Contact Number cannot be more than 10 characters",
            minlength: "Mother's Contact cannot be less than 10 characters"
        },
        mother_occupation: {
            required: "Mother's Ocupation is required",
            maxlength: "Mother's Ocupation cannot be more than 100 characters",
        },
        mother_address_of_work_place: {
            required: "Mother's Address of Work Place is required",
            maxlength: "Mother's Address of Work Place cannot be more than 50 characters"
        },
        student_status: {
            required: "Student Status is required",
        },
    }
});


});


      </script>

<script>
//   autocomplete
$(document).ready(function(){
//console.log("HI");
$('#father_nic').autocomplete({

    source: function(request, response) {
      $.getJSON("{{ url('/de_registar/student/parent2_nic') }}",
       {father_nic:$("#father_nic").val()},
          response);
    },
    minLength: 1,
    width: "100%",
    open: function(event,ui){
        var autocomplete=$(".ui-autocomplete:visible");
        var oldTop=autocomplete.offset().top;
        var newTop = oldTop-$("#father_nic").height()+25;
        autocomplete.css("top", newTop);
    },
    select:function(event,ui){
        //console.log(ui);
        var father_name = ui.item.father_name;
        var father_mobile = ui.item.father_mobile;
        var father_email = ui.item.father_email;
        var father_work_address = ui.item.father_work_address;
        var parent_ocupation = ui.item.parent_ocupation;

        document.getElementById('father_name').value = father_name;
        document.getElementById('father_email').value = father_email;
        document.getElementById('father_mobile').value = father_mobile;
        document.getElementById('father_address_of_work_place').value = father_work_address;
        document.getElementById('father_occupation').value = parent_ocupation;
     },
});
 });
      </script>

<script>
    //   autocomplete
$(document).ready(function(){
 console.log("HI");
$('#mother_nic').autocomplete({

 source: function(request, response) {
   $.getJSON("{{ url('/de_registar/student/parent2_nic') }}",
    {father_nic:$("#mother_nic").val()},
       response);
 },
 minLength: 1,
 width: "100%",
 open: function(event,ui){
     var autocomplete=$(".ui-autocomplete:visible");
     var oldTop=autocomplete.offset().top;
     var newTop = oldTop-$("#mother_nic").height()+25;
     autocomplete.css("top", newTop);
 },
 select:function(event,ui){
     //console.log(ui);
     var father_name = ui.item.father_name;
     var father_mobile = ui.item.father_mobile;
     var father_email = ui.item.father_email;
     var father_work_address = ui.item.father_work_address;
     var parent_ocupation = ui.item.parent_ocupation;

     document.getElementById('mother_name').value = father_name;
     document.getElementById('mother_email').value = father_email;
     document.getElementById('mother_mobile').value = father_mobile;
     document.getElementById('mother_address_of_work_place').value = father_work_address;
     document.getElementById('mother_occupation').value = parent_ocupation;
  },
});
});
</script>

<script>
    //   autocomplete
$(document).ready(function(){
 console.log("HI2");
$('#nic').autocomplete({

 source: function(request, response) {
   $.getJSON("{{ url('/de_registar/student/parent2_nic') }}",
    {father_nic:$("#nic").val()},
       response);
 },
 minLength: 1,
 width: "100%",
 open: function(event,ui){
     var autocomplete=$(".ui-autocomplete:visible");
     var oldTop=autocomplete.offset().top;
     var newTop = oldTop-$("#nic").height()+25;
     autocomplete.css("top", newTop);
 },
 select:function(event,ui){
     //console.log(ui);
     var father_name = ui.item.father_name;
     var father_mobile = ui.item.father_mobile;

     document.getElementById('name').value = father_name;
     document.getElementById('mobile').value = father_mobile;

 },
});
});
   </script>









@stop
