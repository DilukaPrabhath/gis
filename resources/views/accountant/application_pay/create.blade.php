
@extends('accountant.layout.master')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Create Application Pay</h4>
                        <form action="{{url('accountant/application_pay/store')}}" method="POST" autocomplete="off" id="regForm" enctype="multipart/form-data">
                            @csrf

                        <div class="row">
                            <div class="col-lg-6">

                                <div class="form-group row">
                                    <label for="inq_num" class="col-sm-3 col-form-label text-right">Inquery Number</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" value="" name="inq_num" id="inq_num">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="price" class="col-sm-3 col-form-label text-right">Price</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" value="" name="price" id="price">
                                    </div>
                                </div>


                            </div>


                            <div class="col-lg-6">



                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="submit" id="x" class="btn btn-success waves-effect waves-light" style="color: white;"><i class="mdi mdi-check-all mr-2"></i>Submit</button>
                                    <a type="button" href="{{url('accountant/application_pay')}}" class="btn btn-primary waves-effect waves-light" style="margin-left: 5px;"><i class="mdi mdi-close" style="margin-right: 5px;"></i>Close</a>
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
                    inq_num: {
                        required: true,
                        maxlength: 15
                    },
                    price: {
                        required: true,
                        maxlength: 4,
                        number: true,
                    },

                },
                messages: {
                    inq_num: {
                        required: "Inquery Number is required",
                        maxlength: "Inquery Number cannot be more than 13 characters"
                    },
                    price: {
                        required: "Price is required",
                        maxlength: "Price cannot be more than 4 characters",

                    }
                }
            });

        });

    </script>


    @stop

