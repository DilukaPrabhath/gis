<link href="{{asset('frogetor/assets/plugins/dropify/css/dropify.min.css')}}" rel="stylesheet">
@extends('de_registar.layout.master')

@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">View Application</h4>


                        <div class="row">
                            <div class="col-lg-6">
                                <table class="table table-hover mb-0">
                                    <tr>
                                        <th>Inquery ID</th>
                                        <td>INQ/00000010</td>
                                    </tr>
                                    <tr>
                                        <th>Application ID</th>
                                        <td>APL/0000005</td>
                                    </tr>
                                    <tr>
                                        <th>Student Full Name</th>
                                        <td>Garrett Winters</td>
                                    </tr>
                                    <tr>
                                        <th>DOB</th>
                                        <td>2017/10/23</td>
                                    </tr>
                                    <tr>
                                        <th>Gender</th>
                                        <td>Male</td>
                                    </tr>
                                    <tr>
                                        <th>Parent Email</th>
                                        <td>garrett@g.com</td>
                                    </tr>
                                    <tr>
                                        <th>Father Full Name</th>
                                        <td>Sumudu Kolambage</td>
                                    </tr>
                                    <tr>
                                        <th>Father Mobile</th>
                                        <td>0770652584</td>
                                    </tr>
                                    <tr>
                                        <th>Father NIC</th>
                                        <td>932745217V</td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td>Pellawaththa,Colombo</td>
                                    </tr>


                                </table>
                            </div>
                            <div class="col-lg-6">
                                <table class="table table-hover mb-0">
                                    <tr>
                                        <th>Mother Full Name</th>
                                        <td>Nihara Kolambage</td>
                                    </tr>
                                    <tr>
                                        <th>Mother Mobile</th>
                                        <td>0770652854</td>
                                    </tr>
                                    <tr>
                                        <th>Mother NIC</th>
                                        <td>952745217V</td>
                                    </tr>
                                    <tr>
                                        <th>Gurdian Full Name</th>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>Gurdian Mobile</th>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>Gurdian NIC</th>
                                        <td></td>
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


                            <div class="row">
                                <div class="col-lg-12">
                                    <a type="button" href="{{url('de_registar/applications')}}" class="btn btn-primary waves-effect waves-light" style="margin-left: 5px;"><i class="mdi mdi-close" style="margin-right: 5px;"></i>Close</a>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div>
    @stop
    <script src="{{asset('frogetor/assets/plugins/dropify/js/dropify.min.js')}}"></script>
    <script src="{{asset('frogetor/assets/pages/jquery.form-upload.init.js')}}"></script>
