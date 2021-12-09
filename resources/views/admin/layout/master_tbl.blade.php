<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>GIS</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A premium admin dashboard template by mannatthemes" name="description" />
        <meta content="Mannatthemes" name="author" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('frogetor/assets/images/favicon.ico')}}">

        <link href="{{asset('frogetor/assets/css/style.css')}}" rel="stylesheet">
        <!-- DataTables -->
        <link href="{{asset('frogetor/assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('frogetor/assets/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="{{asset('frogetor/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('frogetor/assets/css/icons.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('frogetor/assets/css/metismenu.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('frogetor/assets/css/style.css')}}" rel="stylesheet" type="text/css" />

    </head>

    <body>

        <!-- Top Bar Start -->
        <div class="topbar">
             <!-- Navbar -->

             @include('admin.layout.navbar')

            <!-- end navbar-->
        </div>
        <!-- Top Bar End -->
        <div class="page-wrapper-img">
            <div class="page-wrapper-img-inner">
                <div class="sidebar-user media">
                    <img src="{{asset('frogetor/assets/images/users/user1.jpg')}}" alt="user" class="rounded-circle img-thumbnail mb-1">
                    <span class="online-icon"><i class="mdi mdi-record text-success"></i></span>
                    <div class="media-body">
                        <h5 class="text-light">Dhanushka</h5>
                        <ul class="list-unstyled list-inline mb-0 mt-2">


                        </ul>
                    </div>
                </div>
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">

                            <h4 class="page-title mb-2"><i class="mdi mdi-view-dashboard-outline mr-2"></i>Dashboard</h4>
                            <div class="">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div>
                        </div><!--end page title box-->
                    </div><!--end col-->
                </div><!--end row-->
                <!-- end page title end breadcrumb -->
            </div><!--end page-wrapper-img-inner-->
        </div><!--end page-wrapper-img-->

        <div class="page-wrapper">
            <div class="page-wrapper-inner">

                <!-- Left Sidenav -->

                @include('admin.layout.sidebar')

                <!-- end left-sidenav-->

                <!-- Page Content-->

                @yield('content')

                <!-- container -->

                <!-- footer start -->

                @include('admin.layout.footer')

                <!-- footer end -->

                </div>
                <!-- end page content -->
            </div>
            <!--end page-wrapper-inner -->
        </div>
        <!-- end page-wrapper -->

        <!-- jQuery  -->
        <script src="{{asset('frogetor/assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('frogetor/assets/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('frogetor/assets/js/metisMenu.min.js')}}"></script>
        <script src="{{asset('frogetor/assets/js/waves.min.js')}}"></script>
        <script src="{{asset('frogetor/assets/js/jquery.slimscroll.min.js')}}"></script>

        <script src="{{asset('frogetor/assets/plugins/moment/moment.js')}}"></script>
        <script src="{{asset('frogetor/assets/plugins/apexcharts/apexcharts.min.js')}}"></script>
        <script src="https://apexcharts.com/samples/assets/irregular-data-series.js"></script>
        <script src="https://apexcharts.com/samples/assets/series1000.js"></script>
        <script src="https://apexcharts.com/samples/assets/ohlc.js"></script>

        <script src="{{asset('frogetor/assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
        <script src="{{asset('frogetor/assets/plugins/jvectormap/jquery-jvectormap-us-aea-en.js')}}"></script>
        <!-- Required datatable js -->
        <script src="{{asset('frogetor/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('frogetor/assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>

        <script src="{{asset('frogetor/assets/pages/jquery.dashboard-2.init.js')}}"></script>

        <!-- App js -->
        <script src="{{asset('frogetor/assets/js/app.js')}}"></script>

    </body>
</html>
