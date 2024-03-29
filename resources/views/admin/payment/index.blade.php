@extends('admin.layout.master')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">Class Payment Table</h4>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Recipt ID</th>
                                <th>Student ID</th>
                                <th>Price</th>
                                <th>Intrest</th>
                                <th>Date</th>
                                <th>Payment Type</th>
                                <th>Action</th>
                            </tr>
                            </thead>


                                <tbody>
                                    @foreach ($tbl as $value)
                                    <tr>
                                        <td>{{$value->recipt_id}}</td>
                                        <td>{{$value->stu_num}}</td>
                                        <td>{{$value->price}}</td>
                                        <td>{{$value->intrest}} %</td>
                                        <td>@php
                                            $newDateTime = date('Y-m-d h:i A', strtotime($value->created_at));
                                            @endphp
                                           {{ $newDateTime }}</td>
                                        <td>@if ($value->payment_type == 1)
                                            <span>Cash</span>
                                           @elseif ($value->payment_type == 2)
                                            <span>Online</span>
                                            @elseif ($value->payment_type == 3)
                                            <span>Cheque</span>
                                            @elseif ($value->payment_type ==4)
                                            <span>Card</span>
                                           @endif
                                        </td>
                                        <td>
                                            <a href="{{url('student_pay_print')}}/{{$value->id}}" target="_blank" type="button" class="btn btn-dropbox">
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
    @stop

    @section('button')

    <div class="float-right align-item-center mt-2">
        <a href="{{url('admin/payments/create')}}" class="btn btn-info px-4 align-self-center report-btn">Add</a>
    </div>
    @stop
