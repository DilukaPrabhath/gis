<!DOCTYPE html>
<html lang="en">
    <head>
        {{-- <meta name="csrf-token" content="{{ csrf_token() }}" /> --}}
        <meta charset="utf-8" />
        <title>GIS</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A premium admin dashboard template by mannatthemes" name="description" />
        <meta content="Mannatthemes" name="author" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('frogetor/assets/images/favicon.ico')}}">

        <link href="{{asset('frogetor/assets/css/style.css')}}" rel="stylesheet">
        <!-- DataTables -->
        <link href="{{asset('frogetor/assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('frogetor/assets/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
        <!-- App css -->
        <link href="{{asset('frogetor/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('frogetor/assets/css/icons.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('frogetor/assets/css/metismenu.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('frogetor/assets/css/style.css')}}" rel="stylesheet" type="text/css" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet"/>
    </head>

    <body>

        <!-- Top Bar Start -->
        <div class="topbar">
             <!-- Navbar -->

             @include('accountant.layout.navbar')

            <!-- end navbar-->
        </div>
        <!-- Top Bar End -->
        <div class="page-wrapper-img">
            <div class="page-wrapper-img-inner">
                <div class="sidebar-user media">
                    <img src="{{asset('image/user/'.Auth::user()->image)}}" alt="user" class="rounded-circle img-thumbnail mb-1">
                    <span class="online-icon"><i class="mdi mdi-record text-success"></i></span>
                    <div class="media-body">
                        <h5 class="text-light">{{Auth::user()->name;}}</h5>
                        <ul class="list-unstyled list-inline mb-0 mt-2">


                        </ul>
                    </div>
                </div>
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">

                            @yield('button')

                            <h4 class="page-title mb-2"></h4>
                            <div class="">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active"></li>
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

                @include('accountant.layout.sidebar')

                <!-- end left-sidenav-->

                <!-- Page Content-->

                @yield('content')

                <!-- container -->

                <!-- footer start -->

                @include('accountant.layout.footer')

                <!-- footer end -->

                </div>
                <!-- end page content -->
            </div>
            <!--end page-wrapper-inner -->
        </div>
        <!-- end page-wrapper -->

        <!-- jQuery  -->
        <script src="{{asset('frogetor/assets/js/jquery.min.js')}}"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
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
        <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <!-- App js -->
        <script src="{{asset('frogetor/assets/js/app.js')}}"></script>
        @yield('scripts')

        <script>

            toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          }
              @if(Session::has('message'))
              var type = "{{ Session::get('alert-type', 'info') }}";
              toastr["success"]("{{ Session::get('message') }}", type)
              clean();
            @endif

          </script>
    </body>
</html>
