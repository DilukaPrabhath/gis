<link href="{{asset('frogetor/assets/plugins/dropify/css/dropify.min.css')}}" rel="stylesheet">
@extends('superadmin.layout.master')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Update Events</h4>

                        <form action="{{url('superadmin/events/update')}}/{{$evet[0]->id}}" method="POST" autocomplete="off" id="regForm" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group row">
                                    <label for="event" class="col-sm-2 col-form-label text-right">Event</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="{{$evet[0]->event}}" id="event" name="event">
                                        @error('event')
                                            <div class="alert" style="color: #f93b7a;padding-left: 0px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-right">School</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="institute" name="institute">
                                            <option value="">Select </option>
                                            @foreach($ins as $value)
                                            <option value="{{ $value->id }}" {{ $value->id == $evet[0]->ins_id ? 'selected' : '' }}>{{ $value->institute_name }}</option>
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
                                        <input class="form-control" type="date" value="{{$evet[0]->date}}" id="date" name="date">
                                        @error('date')
                                            <div class="alert" style="color: #f93b7a;padding-left: 0px;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="time" class="col-sm-2 col-form-label text-right">Time</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="time" value="{{$evet[0]->time}}" id="time" name="time">
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
                                            <input class="form-control" type="text" value="{{$evet[0]->venue}}" id="venue" name="venue">
                                        @error('venue')
                                            <div class="alert" style="color: #f93b7a;padding-left: 0px;">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="address_line_1" class="col-sm-2 col-form-label text-right">Info</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" rows="2" name="descreption" value="" id="descreption">{{$evet[0]->discription}}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label text-right">Status</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="status" name="status">
                                                <option value="">Select</option>
                                                <option value="1" {{$evet[0]->status=='1'?'selected':''}}>Pending</option>
                                                <option value="2" {{$evet[0]->status=='2'?'selected':''}}>Cancelled</option>
                                                <option value="3" {{$evet[0]->status=='3'?'selected':''}}>Postponed</option>
                                                <option value="4" {{$evet[0]->status=='4'?'selected':''}}>Finished</option>
                                            </select>
                                        @error('status')
                                            <div class="alert" style="color: #f93b7a;padding-left: 0px;">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div>

                                </div>
                            </div>


                            <div class="col-lg-6">

                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="submit" id="x" class="btn btn-success waves-effect waves-light" style="color: white;"><i class="mdi mdi-check-all mr-2"></i>Submit</button>
                                    <a type="button" href="{{url('superadmin/institutes')}}" class="btn btn-primary waves-effect waves-light" style="margin-left: 5px;"><i class="mdi mdi-close" style="margin-right: 5px;"></i>Close</a>
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


    </script>


    @stop
