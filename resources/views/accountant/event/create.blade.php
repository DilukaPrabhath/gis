<link href="{{asset('frogetor/assets/plugins/dropify/css/dropify.min.css')}}" rel="stylesheet">
@extends('accountant.layout.master')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Create Events</h4>
                        <input type="hidden" name="t_n1" id="t_n1" value="{{ $t_n1 }}">
                        <input type="hidden" name="t_n2" id="t_n2" value="{{ $t_n2 }}">
                        <form action="{{url('accountant/events/store')}}" method="POST" autocomplete="off" id="regForm" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label for="event" class="col-sm-2 col-form-label text-right">Event</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="{{old('event')}}" id="event" name="event">
                                        @error('event')
                                            <div class="alert" style="color: #f93b7a;padding-left: 0px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-right">School</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="institute" name="institute">
                                            <option value="">Select</option>
                                            @foreach($ins as $value)

                                            <option value="{{$value->id}}" {{ old('institute') ==$value->id ? 'selected="selected"' : '' }}>{{$value->institute_name}}</option>
                                            @endForeach
                                        </select>
                                        @error('institute')
                                            <div class="alert" style="color: #f93b7a;padding-left: 0px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="date" class="col-sm-2 col-form-label text-right">Date</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="date" value="{{old('date')}}" id="date" name="date">
                                        @error('date')
                                            <div class="alert" style="color: #f93b7a;padding-left: 0px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="time" class="col-sm-2 col-form-label text-right">Time</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="time" value="{{old('time')}}" id="time" name="time">
                                        @error('time')
                                            <div class="alert" style="color: #f93b7a;padding-left: 0px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group row">
                                        <label for="venue" class="col-sm-2 col-form-label text-right">Venue</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" value="{{old('venue')}}" id="venue" name="venue">
                                        @error('venue')
                                            <div class="alert" style="color: #f93b7a;padding-left: 0px;">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="address_line_1" class="col-sm-2 col-form-label text-right">Info</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" rows="2" name="descreption" value="" id="descreption">{{old('descreption')}}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label text-right">Status</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="status" name="status">
                                                <option value="">Select</option>
                                                <option value="1" selected @if (old('status') == 1) selected="selected" @endif>Pending</option>
                                                <option value="2" @if (old('status') == 2) selected="selected" @endif>Cancelled</option>
                                                <option value="3" @if (old('status') == 3) selected="selected" @endif>Postponed</option>
                                                <option value="4" @if (old('status') == 4) selected="selected" @endif>Finished</option>
                                            </select>
                                        @error('status')
                                            <div class="alert" style="color: #f93b7a;padding-left: 0px;">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div>

                                </div>
                            </div>


                            {{-- <div class="col-lg-12">

                                <table class="table" id="rsrvtbl">
                                    <thead>
                                        <th>No</th>
                                        <th style="width: 200px;">Category Name</th>
                                        <th style="width: 200px;">Price</th>
                                        <th>Max Ticket Count</th>
                                        <th>Till Issue</th>
                                        <th>Op</th>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                    <tfoot>
                                        <form action="" id="frm2">
                                      <td></td>
                                      <td><input type="text" autocomplete="off" class="form-control" name="name" id="name" value=""/></td>
                                      <td><input type="number" autocomplete="off" class="form-control" name="price" id="price" value=""/></td>
                                      <td><input type="number" class="form-control" autocomplete="off" name="tic" id="tic" value=""/></td>
                                      <td><input type="date" autocomplete="off" class="form-control" name="dt" id="dt" value=""/></td>
                                     <td><a class="btn btn-success btn-condensed" href="#" id="adsr" title="Add Bank Details" style="vertical-align: text-top;">
                                        <i class="fa fa-plus"></i></a></td>
                                     </form>
                                    </tfoot>
                                  </table>

                            </div> --}}

                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="submit" id="x" class="btn btn-success waves-effect waves-light" style="color: white;"><i class="mdi mdi-check-all mr-2"></i>Submit</button>
                                    <a type="button" href="{{url('accountant/institutes')}}" class="btn btn-primary waves-effect waves-light" style="margin-left: 5px;"><i class="mdi mdi-close" style="margin-right: 5px;"></i>Close</a>
                                </div>
                            </div>

                        </form>
                        </div>
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
                    event: {
                        required: true,
                        maxlength: 100
                    },
                    institute: {
                        required: true,
                    },
                    date: {
                        required: true,
                    },
                    time: {
                        required: true,
                        greaterThan: "d",
                    },
                    venue: {
                        required: true,
                    },
                    status: {
                        required: true,
                    }

                },
                messages: {
                    activity: {
                        required: "Activity Name is required",
                        maxlength: "Activity Name cannot be more than 100 characters"
                    },
                    institute: {
                        required: "School is required"
                    },
                    date: {
                        required: "Date is required",
                        greaterThan: "DDD"
                    },
                    time: {
                        required: "Time is required"
                    },
                    venue: {
                        required: "Venue is required"
                    },
                    status: {
                        required: "Status is required"
                    }
                }
            });

        });


// //Table click function
//  $(document).ready(function(){
//     $('#adsr').click(function(e){
//         console.log("Hi");
//         addTabledata();
//     });
// });

// ///Table insert

// function addTabledata(){

//   var name  = $("#name").val();
//   var price = $("#price").val();
//   var tic = $("#tic").val();
//   var dt  = $("#dt").val();
//   var t_n1 = $("#t_n1").val();
//   var t_n2 = $("#t_n2").val();
//   if(name != '' || price != '' || tic != '' || dt != ''){
//     $.ajax({
//               url: "/evt_temp_insert",
//               type: "POST",
//               headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
//               data: {
//                  "name":name, "price":price,"tic":tic, "dt":dt, "t_n1":t_n1, "t_n2":t_n2,
//               },
//               cache: false,
//               success: function(data){

// $("#rsrvtbl tbody").html(data);
// $("#name").val('');
// $("#price").val('');
// $("#dt").val('');
// $("#tic").val('');

//   }else{
//     console.log("er");
//   }
// }

    </script>


    @stop
