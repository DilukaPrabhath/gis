<nav class="navbar-custom">

    <!-- LOGO -->
    <div class="topbar-left">
        {{-- <a href="{{url('/home')}}" class="logo">
            <span>
                <img src="{{asset('image/user/'.Auth::user()->image)}}" alt="logo-small" class="logo-sm">
            </span>
            <span>
                <img src="{{asset('image/user/'.Auth::user()->image)}}" alt="logo-large" class="logo-lg">
            </span>
        </a> --}}
    </div>

    <ul class="list-unstyled topbar-nav float-right mb-0">



        <li class="dropdown">
            <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                aria-haspopup="false" aria-expanded="false">
                <img src="{{asset('image/user/'.Auth::user()->image)}}" alt="profile-user" class="rounded-circle" />
                <span class="ml-1 nav-user-name hidden-sm"> <i class="mdi mdi-chevron-down"></i> </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="{{url('admin/profile')}}"><i class="dripicons-user text-muted mr-2"></i> Profile</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ url('/logout') }}"><i class="dripicons-exit text-muted mr-2"></i> Logout</a> </a>

                {{-- <a class="dropdown-item" href="#"><i class="dripicons-exit text-muted mr-2"></i> Logout</a> --}}
                {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"> <a class="dropdown-item" href="#"> <i class="dripicons-exit text-muted mr-2"></i> Logout</a></button>
                </form> --}}
            </div>
        </li>
    </ul>

    <ul class="list-unstyled topbar-nav mb-0">

        <li>
            <button class="button-menu-mobile nav-link waves-effect waves-light">
                <i class="mdi mdi-menu nav-icon"></i>
            </button>
        </li>

        <li class="hide-phone app-search">
            {{-- <form role="search" class="">
                <input type="text" placeholder="Search..." class="form-control">
                <a href=""><i class="fas fa-search"></i></a>
            </form> --}}
        </li>

    </ul>

</nav>
