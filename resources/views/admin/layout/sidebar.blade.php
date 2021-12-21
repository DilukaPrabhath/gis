<div class="left-sidenav">

    <ul class="metismenu left-sidenav-menu" id="side-nav">

        <li class="menu-title">Main</li>

        <li>
            <a href="{{url('/home')}}"><i class="mdi mdi-monitor"></i><span>Dashboard</span></a>
        </li>

        <li>
            <a href="{{url('/admin/studentprofile')}}"><i class="mdi mdi-account-card-details"></i><span>Student Profile</span></a>
        </li>

        <li>
            <a href="javascript: void(0);"><i class="mdi mdi-settings"></i><span>Master</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{url('/admin/activities/create')}}">Activities</a></li>
                <li><a href="{{url('/admin/institutes')}}">Schools</a></li>
                <li><a href="{{url('/admin/subjects')}}">Subjects</a></li>
                <li><a href="{{url('/admin/events')}}">Create Events</a></li>
                <li><a href="{{url('/admin/event_tickets')}}">Event Tickets</a></li>
                <li><a href="{{url('/admin/classfee')}}">Class Fees</a></li>
                <li><a href="{{url('/admin/banks')}}">Banks</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);"><i class="mdi mdi-school"></i><span>Nursary Students</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{url('/admin/primary/inqueries')}}">Inqueries</a></li>
                {{-- <li><a href="{{url('/admin/primary/applications')}}">Applications</a></li>
                <li><a href="{{url('/admin/primary/students')}}">Registrations</a></li> --}}
                <li><a href="{{url('/admin/primary/scholarship')}}">Request Scholarship</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);"><i class="mdi mdi-school"></i><span>School Students</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{url('/admin/inqueries')}}">Inqueries</a></li>
                {{-- <li><a href="{{url('/admin/applications')}}">Applications</a></li>
                <li><a href="{{url('/admin/students')}}">Registrations</a></li> --}}
                <li><a href="{{url('/admin/scholarship')}}">Request Scholarship</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);"><i class="mdi mdi-cash-multiple"></i><span>Payments</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{url('/admin/payments')}}">Class Fees</a></li>
                <li><a href="{{url('/admin/activities_payments')}}">Activities Fee</a></li>
                <li><a href="{{url('/admin/application_pay')}}">Application Fee</a></li>
                <li><a href="{{url('/admin/events')}}">Events</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);"><i class="mdi mdi-certificate"></i><span>Achivments</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{url('/admin/awards/create')}}">Academic</a></li>
                <li><a href="{{url('/admin/nonacadamic/create')}}">Non Academic</a></li>
            </ul>
        </li>

        {{-- <li>
            <a href="{{url('/admin/students')}}"><i class="mdi mdi-account-card-details"></i><span>Students</span></a>
        </li> --}}

        {{-- <li>
            <a href="{{url('/admin/institutes')}}"><i class="mdi mdi-city"></i><span>Institutes</span></a>
        </li> --}}

        {{-- <li>
            <a href="{{url('/admin/banks')}}"><i class="mdi mdi-bank"></i><span>Banks</span></a>
        </li> --}}

        {{-- <li>
            <a href="{{url('/admin/activities/create')}}"><i class="mdi mdi-basketball"></i><span>Activities</span></a>
        </li> --}}

        {{-- <li>
            <a href="{{url('/admin/awards/create')}}"><i class="mdi mdi-certificate"></i><span>Awards</span></a>
        </li> --}}

        <li>
            <a href="{{url('/admin/complaints/create')}}"><i class="mdi mdi-account-alert"></i><span>Complaints</span></a>
        </li>

        {{-- <li>
            <a href="{{url('/admin/users')}}"><i class="mdi mdi-eye-circle"></i><span>Users</span></a>
        </li> --}}

        <li>
            <a href="javascript: void(0);"><i class="mdi mdi-shield-lock"></i><span>User Module</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{url('/admin/userrole')}}">User Roles</a></li>
                <li><a href="{{url('/admin/users')}}">Users</a></li>
            </ul>
        </li>

        <li>
            <a href="{{url('/admin/profile')}}"><i class="mdi mdi-account-settings"></i><span>Profile</span></a>
        </li>



    </ul>

</div>
