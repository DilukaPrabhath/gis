@extends('superadmin.layouts.master')
@section('content')

<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Messages</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Messages</li>
            </ol>
        </div>

    </div>

    <div class="row">
        <div class="col-12">
            <div class="card m-b-0">
                <!-- .chat-row -->
                <div class="chat-main-box">
                    <!-- .chat-left-panel -->
                    <div class="chat-left-aside">
                        <div class="open-panel"><i class="ti-angle-right"></i></div>
                        <div class="chat-left-inner">
                            <div class="form-material">
                                <input class="form-control p-20" type="text" placeholder="Contacts">
                            </div>
                            <ul class="chatonline style-none ">
                                <li>
                                    <a href="javascript:void(0)"><img src="{{asset('material/assets/images/users/1.jpg')}}" alt="user-img" class="img-circle"> <span>Bharatha Samaranayake</span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" class="active"><img src="{{asset('material/assets/images/users/2.jpg')}}" alt="user-img" class="img-circle"> <span>Dasuni Narmadha</span></a>
                                </li>

                                <li class="p-20"></li>
                            </ul>
                        </div>
                    </div>
                    <!-- .chat-left-panel -->
                    <!-- .chat-right-panel -->
                    <div class="chat-right-aside">
                        <div class="chat-main-header">
                            <div class="p-20 b-b">
                                <h3 class="box-title">Chat</h3>
                            </div>
                        </div>
                        <div class="chat-rbox">
                            <ul class="chat-list p-20">
                                <!--chat Row -->
                                <li>
                                    <div class="chat-img"><img src="{{asset('material/assets/images/users/1.jpg')}}" alt="user" /></div>
                                    <div class="chat-content">
                                        <h5>Bharatha Shashiruwan</h5>
                                        <div class="box bg-light-info">Hi.</div>
                                    </div>
                                    <div class="chat-time">10:56 am</div>
                                </li>


                            </ul>
                        </div>
                        <div class="card-body b-t">
                            <div class="row">
                                <div class="col-8">
                                    <textarea placeholder="Type your message here" class="form-control b-0"></textarea>
                                </div>
                                <div class="col-4 text-right">
                                    <button type="button" class="btn btn-info btn-circle btn-lg"><i class="fa fa-paper-plane-o"></i> </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- .chat-right-panel -->
                </div>
                <!-- /.chat-row -->
            </div>
        </div>
    </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->

</div>


@stop
