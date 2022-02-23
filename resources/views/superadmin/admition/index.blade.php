@extends('superadmin.layout.master')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="mt-0 header-title">Admition Payment Table</h4>


                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Recipt No</th>
                                <th>Student ID</th>
                                <th>Price</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>


                            <tbody>
                                @foreach ($data as $value)
                                        <tr>
                                            <td>{{$value->recipt_no}}</td>
                                            <td>{{$value->student_sid}}</td>
                                            <td>{{$value->price}}</td>
                                            <td>@php
                                                $newDateTime = date('Y-m-d h:i A', strtotime($value->created_at));
                                                @endphp
                                               {{ $newDateTime }}</td>

                                            <td>
                                                <a href="{{url('superadmin/admition/print')}}/{{$value->id}}" target="_blank" type="button" class="btn btn-dropbox">
                                                    <i class="fab far fa-eye" style="color: white; font-size:8px;"></i>
                                                </a>
                                                {{-- <a href="{{url('admin/application_pay/print')}}/{{$value->id}}" type="button" class="btnprint">
                                                    <i class="fab far fa-eye" style="color: white; font-size:8px;"></i>jj
                                                </a> --}}
                                                {{-- <a href="{{url('admin/application_pay/print')}}" target="_blank" type="button" class="btn btn-danger">
                                                    <i class="fab fas fa-pencil-alt" style="color: white; font-size:8px;"></i>
                                                </a> --}}
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
        <a href="{{url('superadmin/admition/create')}}" class="btn btn-info px-4 align-self-center report-btn">Add</a>
    </div>
    @stop

    @section('scripts')

    <script>
    $(document).ready(function){
    $('.btnprint').printpage();
    });
    </script>
    @stop
