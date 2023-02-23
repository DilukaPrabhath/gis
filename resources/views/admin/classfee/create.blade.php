
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
@extends('admin.layout.master')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Create {{$sch->institute_name}} Class Fees</h4>
                        <form action="{{url('/admin/classfee/store')}}" method="POST" autocomplete="off" id="regForm" enctype="multipart/form-data">
                            @csrf
                            <input class="form-control" type="hidden" value="{{$c_id}}" name="c_id" id="c_id">
                            <input class="form-control" type="hidden" value="{{$sch->pre_or_sch}}" name="s_ty" id="s_ty">
                            <input class="form-control" type="hidden" value="" name="year2" id="year2">
                        <div class="row">
                            <div class="col-lg-6">

                                <div class="form-group row">
                                    <label for="year" class="col-sm-2 col-form-label text-right"><span style="color: #f93b7a">*</span>Selected Year</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="{{old('year')}}" name="year" id="year">
                                        @error('year')
                                        <div class="alert" style="color: #f93b7a;padding-left: 0px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="fee" class="col-sm-2 col-form-label text-right"><span style="color: #f93b7a">*</span>Class Fee</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="number" value="{{old('fee')}}" name="fee" id="fee">
                                        @error('fee')
                                        <div class="alert" style="color: #f93b7a;padding-left: 0px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-right"><span style="color: #f93b7a">*</span>Syllabus</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="syllabus" id="syllabus">
                                            <option value="">Select</option>
                                            @foreach($syl as $sll)
                                            <option value="{{$sll->id}}" {{ old('grade') ==$sll->id ? 'selected="selected"' : '' }}>{{$sll->syllubus}}</option>
                                            @endForeach
                                        </select>
                                        @error('syllabus')
                                        <div class="alert" style="color: #f93b7a;padding-left: 0px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="ticket_category" class="col-sm-2 col-form-label text-right"><span style="color: #f93b7a">*</span>Class</label>
                                    @if ($sch->pre_or_sch == 1)
                                    <div class="col-sm-10">
                                        <select class="form-control" name="class" id="class_id">
                                            <option value="">Select</option>
                                            @foreach($class_data as $cls)
                                            <option value="{{$cls->id}}" {{ old('class') ==$cls->id ? 'selected="selected"' : '' }}>{{$cls->nursery_class_name}}</option>
                                            @endForeach
                                        </select>
                                        @error('class')
                                        <div class="alert" style="color: #f93b7a;padding-left: 0px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <label for="grade_n" class="col-sm-2 col-form-label text-right" style="margin-top:15pt;"><span style="color: #f93b7a">*</span>Grade</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="grade_n" id="grade_n" style="margin-top:15pt;">
                                            <option value="">Select</option>
                                        </select>
                                        @error('grade_n')
                                        <div class="alert" style="color: #f93b7a;padding-left: 0px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    @elseif (($sch->pre_or_sch == 2))
                                    <div class="col-sm-10">
                                        <select class="form-control" name="grade" id="grade">
                                            <option value="">Select</option>
                                            @foreach($cls as $cls)
                                            <option value="{{$cls->id}}" {{ old('grade') ==$cls->id ? 'selected="selected"' : '' }}>{{$cls->grade}}</option>
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
                                            <a type="button" href="{{url('admin/classfee')}}" class="btn btn-primary waves-effect waves-light" style="margin-left: 5px;"><i class="mdi mdi-close" style="margin-right: 5px;"></i>Close</a>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                        @if ($sch->pre_or_sch == 2)
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
                                                <a href="{{url('admin/classfee/edit')}}/{{$value->ins_id}}/{{$value->id}}" type="button" class="btn btn-danger">
                                                    <i class="fab fas fa-pencil-alt" style="color: white; font-size:8px;"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                </table>

                            </div>
                        </div>
                        @else

                        <div class="col-lg-12">
                            <div class="form-group row">

                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>Grade</th>
                                        <th>Class</th>
                                        <th>Syllubus</th>
                                        <th>Price</th>
                                        <th>Year</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($grd as $value)
                                        <tr>
                                            <td>{{$value->n_grade_name}}</td>
                                            <td>{{$value->n_class_name}}</td>
                                            <td>{{$value->syllubus}}</td>
                                            <td>{{$value->fee}}</td>
                                            <td>{{$value->year}}</td>
                                            <td>
                                                <a href="{{url('admin/classfee/edit')}}/{{$value->ins_id}}/{{$value->id}}" type="button" class="btn btn-danger">
                                                    <i class="fab fas fa-pencil-alt" style="color: white; font-size:8px;"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                </table>

                            </div>
                        </div>
                        @endif

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
             document.getElementById('year2').value = 2000;
             var ye3 = $("#year2").val();
             console.log(ye3);
            });
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(document).ready(function() {
            var id   = $("#c_id").val();
            var s_ty = $("#s_ty").val();
            var ye3  = $("#year2").val();

            if(s_ty == 2){
                $("#regForm").validate({
                rules: {
                    grade: {
                        required: true,
                    },
                    fee: {
                        required: true,
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
                        required: "Class is required",

                    },
                    syllabus: {
                        required: "Syllabus is required"
                    },
                    fee: {
                        required: "Price is required",
                        //remote:"Ticket Category  Name already taken",
                    },
                    year: {
                        required: "Year is required"
                    }
                }
            });
            }else{

                $("#regForm").validate({
                rules: {
                    class: {
                        required: true,
                    },
                    grade_n: {
                        required: true,
                    },
                    fee: {
                        required: true,
                    },
                    year: {
                        required: true,
                    },
                    syllabus: {
                        required: true,
                    }
                },
                messages: {
                    class: {
                        required: "Class is required",
                    },
                    grade_n:{
                        required: "Grade is required",
                    },
                    syllabus: {
                        required: "Syllabus is required"
                    },
                    fee: {
                        required: "Price is required",
                        //remote:"Ticket Category  Name already taken",
                    },
                    year: {
                        required: "Year is required"
                    }
                }
            });
            }


        });

       // class
       $(document).ready(function() {
            $("#class_id").on('change', function() {
                var class_id = $(this).val();
                //   console.log(year);
                if (class_id) {
                    $.ajax({
                        url: "{{ url('admin/get/grades') }}",
                        type: "POST",
                        data: {
                            class_id: class_id,
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data) {
                            $('#grade_n').html(data);
                        },
                    });
                } else {
                    console.log("Eroor!");
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
