@extends('admin.layout.master')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">Payment Table</h4>


                        <div class="row">

                            <div class="input-group col-6" style="margin-bottom: 5px;">
                                <input type="text" class="form-control" placeholder="Student ID" aria-label="" value="STU/211004/0001">
                                <span class="input-group-append">
                                    <button class="btn btn-primary" type="button">Go</button>
                                </span>
                            </div>
                        </div>

                        <table class="table table-bordered mb-0 table-centered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Student ID</th>
                                    <th>Institute</th>
                                    <th>Payment</th>
                                    <th>Payment Type</th>
                                    <th>Payment date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>


                                <tbody>
                                <tr>
                                    <td>STU/211004/0001</td>
                                    <td>School one</td>
                                    <td>Rs.10000.00</td>
                                    <td>Cash</td>
                                    <td>2021/01/10</td>
                                    <td>
                                        <a href="{{url('admin/payments/view')}}" type="button" class="btn btn-dropbox">
                                            <i class="fab far fa-eye" style="color: white; "></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>STU/211004/0001</td>
                                    <td>School one</td>
                                    <td>Rs.10000.00</td>
                                    <td>Online</td>
                                    <td>2021/05/10</td>
                                    <td>
                                        <a href="{{url('admin/payments/view')}}" type="button" class="btn btn-dropbox">
                                            <i class="fab far fa-eye" style="color: white;"></i>
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

    @section('button')

    <div class="float-right align-item-center mt-2">
        <a href="{{url('admin/payments/create')}}" class="btn btn-info px-4 align-self-center report-btn">Add</a>
    </div>
    @stop
