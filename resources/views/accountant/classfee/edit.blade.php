
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
@extends('accountant.layout.master')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Update {{$sch->institute_name}} Class Fees</h4>
                        <form action="{{url('/accountant/classfee/update')}}/{{$cls_id}}" method="POST" autocomplete="off" id="regForm" enctype="multipart/form-data">
                            @csrf

                            <input class="form-control" type="hidden" value="{{$fee->ins_id}}" name="c_id" id="c_id">
                            <input class="form-control" type="hidden" value="{{$sch->pre_or_sch}}" name="s_ty" id="s_ty">
                            <input class="form-control" type="hidden" value="" name="year2" id="year2">
                        <div class="row">
                            <div class="col-lg-6">

                                <div class="form-group row">
                                    <label for="year" class="col-sm-2 col-form-label text-right">Selected Year</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="{{$fee->year}}" name="year" id="year">
                                        @error('year')
                                        <div class="alert" style="color: #f93b7a;padding-left: 0px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="fee" class="col-sm-2 col-form-label text-right">Class Fee</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="number" value="{{$fee->fee}}" name="fee" id="fee">
                                        @error('fee')
                                        <div class="alert" style="color: #f93b7a;padding-left: 0px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>



                            </div>


                            <div class="col-lg-6">



                                @if ($sch->pre_or_sch == 2)
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-right">Syllabus</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="syllabus" id="syllabus">
                                            <option value="">Select</option>
                                            <option value="1" {{$fee->syl_id=='1'?'selected':''}}>Local</option>
                                            <option value="2" {{$fee->syl_id=='2'?'selected':''}}>Edexcel</option>
                                        </select>
                                        @error('syllabus')
                                        <div class="alert" style="color: #f93b7a;padding-left: 0px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                @endif

                                <div class="form-group row">
                                    <label for="ticket_category" class="col-sm-2 col-form-label text-right">Grade</label>
                                    @if ($sch->pre_or_sch == 1)
                                    <div class="col-sm-10">
                                        <select class="form-control" name="grade" id="grade">
                                            <option value="2" {{$fee->grade_id=='0'?'selected':''}}>Primary</option>
                                        </select>
                                        @error('grade')
                                        <div class="alert" style="color: #f93b7a;padding-left: 0px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    @elseif (($sch->pre_or_sch == 2))
                                    <div class="col-sm-10">
                                        <select class="form-control" name="grade" id="grade">
                                            <option value="">Select</option>

                                            @foreach($cls as $cls)
                                            <option value="{{$cls->id}}" {{ $cls->id == $fee->grd_id ? 'selected' : '' }}>{{$cls->grade}}</option>
                                            @endForeach
                                        </select>
                                        @error('grade')
                                        <div class="alert" style="color: #f93b7a;padding-left: 0px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    @endif
                                </div>
                            </div>




                            <div class="col-lg-12">
                                <div class="form-group row">

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <button type="submit" class="btn btn-success waves-effect waves-light" style="color: white;"><i class="mdi mdi-check-all mr-2"></i>Submit</button>
                                            <a type="button" href="{{url('accountant/classfee')}}" class="btn btn-primary waves-effect waves-light" style="margin-left: 5px;"><i class="mdi mdi-close" style="margin-right: 5px;"></i>Close</a>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="col-lg-12">
                            <div class="form-group row">

                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>Grade</th>
                                        <th>Syllubus</th>
                                        <th>Price</th>
                                        <th>Year</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($grd as $value)
                                        <tr>
                                            <td>@if ($value->grd_id == 0)
                                                Primary
                                                @else
                                                {{$value->grade}}
                                                @endif</td>
                                            <td>@if ($value->grd_id == 0)
                                                Primary
                                                @else
                                                {{$value->syllubus}}
                                                @endif</td>
                                            <td>{{$value->fee}}</td>
                                            <td>{{$value->year}}</td>
                                            <td>
                                                <a href="{{url('accountant/classfee/edit')}}/{{$value->ins_id}}/{{$value->id}}" type="button" class="btn btn-danger">
                                                    <i class="fab fas fa-pencil-alt" style="color: white; font-size:8px;"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                </table>

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
            $('#year').bind('change',function(){
            // var ye2 = $("#year").val();
             document.getElementById('year2').value = 2000;
            // document.getElementById("mytext").value =
             var ye3 = $("#year2").val();
             console.log(ye3);
            });
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(document).ready(function() {
            var id  = $("#c_id").val();
            var s_ty = $("#s_ty").val();
            var ye3 = $("#year2").val();
            // var ye2 = document.getElementById('year2').value;
            $("#regForm").validate({
                rules: {
                    grade: {
                        required: true,
                        maxlength: 70,

                    },
                    fee: {
                        required: true,
                        // remote: {
                        //      url: "/check_grade_validation",
                        //      type: "get",
                        //      data: {"id" : id,"s_ty" : s_ty},
                        //         }
                    },
                    year: {
                        required: true,
                    },
                    syllabus: {
                        required: true,
                    }
                },
                messages: {
                    grade: {
                        required: "Ticket Category Name is required",
                        maxlength: "Ticket Category  Name cannot be more than 70 characters",

                    },
                    syllabus: {
                        required: "Count is required"
                    },
                    fee: {
                        required: "Price is required",
                        //remote:"Ticket Category  Name already taken",
                    },
                    year: {
                        required: "Final issue Date is required"
                    }
                }
            });

        });


    $("#year").datepicker({
    format: "yyyy",
    viewMode: "years",
    minViewMode: "years",
    autoclose:true //to close picker once year is selected
});

    </script>


    @stop
