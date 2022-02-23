<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User profile background: url(../assets/images/background/user-info.jpg) no-repeat; -->
        <div class="user-profile" style="background: url({{asset('material/assets/images/background/user-info.jpg')}}) no-repeat;">
            <!-- User profile image -->
            <div class="profile-img"> <img src="{{asset('userimg/'.Auth::user()->image)}}"  alt="user" /> </div>
            <!-- User profile text-->
            <div class="profile-text"> <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">{{ Auth::user()->full_name }}</a>
                {{-- <div class="dropdown-menu animated flipInY">
                    <a href="#" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                    <a href="#" class="dropdown-item"><i class="ti-wallet"></i> My Balance</a>
                    <a href="#" class="dropdown-item"><i class="ti-email"></i> Inbox</a>
                    <div class="dropdown-divider"></div> <a href="#" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
                    <div class="dropdown-divider"></div> <a href="login.html" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                </div> --}}
            </div>
        </div>
        <!-- End User profile text-->
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-small-cap">Functions</li>
                <li>
                    <a class="waves-effect waves-dark" href="{{url('/home')}}" ><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard </span></a>
                </li>

                <li>
                    <a class="waves-effect waves-dark" href="{{url('superadmin/user/add')}}" ><i class="mdi mdi-account-box-outline"></i><span class="hide-menu">Add User</span></a>
                </li>

                <li>
                    <a class="waves-effect waves-dark" href="{{url('superadmin/users')}}" ><i class="mdi mdi-account-multiple"></i><span class="hide-menu">Users Details</span></a>
                </li>

                <li>
                    <a class="waves-effect waves-dark" href="{{url('superadmin/institutes')}}" ><i class="mdi mdi-domain"></i><span class="hide-menu">Institute </span></a>
                </li>

                <li>
                    <a class="waves-effect waves-dark" href="{{url('superadmin/payments')}}" ><i class="mdi mdi-cash-usd"></i><span class="hide-menu">Payments</span></a>
                </li>
                {{-- mdi-book-open --}}

                <li>
                    <a class="waves-effect waves-dark" href="{{url('/superadmin/messages')}}" ><i class="mdi mdi-email"></i><span class="hide-menu">Messages</span></a>
                </li>

                <li>
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-content-copy"></i><span class="hide-menu">Reports</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{url('superadmin/reports/payments')}}">Payments</a></li>
                        <li><a href="{{url('superadmin/reports/users')}}">Users</a></li>
                    </ul>
                </li>



            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
    <!-- Bottom points-->
    {{-- <div class="sidebar-footer">
        <!-- item-->
        <a href="" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
        <!-- item-->
        <a href="" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
    </div> --}}
    <!-- End Bottom points-->
</aside>
