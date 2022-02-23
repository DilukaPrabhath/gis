<div class="left-sidenav">

    <ul class="metismenu left-sidenav-menu" id="side-nav">

        <li class="menu-title">Main</li>

        <li>
            <a href="{{url('/home')}}"><i class="mdi mdi-monitor"></i><span>Dashboard</span></a>
        </li>

        <li>
            <a href="{{url('/de_registar/student/profile')}}"><i class="mdi mdi-account-card-details"></i><span>Student Profile</span></a>
        </li>

        {{-- <li>
            <a href="javascript: void(0);"><i class="mdi mdi-settings"></i><span>Master</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{url('/de_registar/activities/create')}}">Activities</a></li>
                <li><a href="{{url('/de_registar/institutes')}}">Schools</a></li>
                <li><a href="{{url('/de_registar/subjects')}}">Subjects</a></li>
                <li><a href="{{url('/de_registar/events')}}">Create Events</a></li>
                <li><a href="{{url('/de_registar/event_tickets')}}">Event Tickets</a></li>
                <li><a href="{{url('/de_registar/classfee')}}">Class Fees</a></li>
                <li><a href="{{url('/de_registar/banks')}}">Banks</a></li>
            </ul>
        </li> --}}

        <li>
            <a href="javascript: void(0);"><i class="mdi mdi-school"></i><span>Nursary Students</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{url('/de_registar/primary/inqueries')}}">Inqueries</a></li>
                {{-- <li><a href="{{url('/de_registar/primary/applications')}}">Applications</a></li> --}}
                <li><a href="{{url('/de_registar/nursary/students/table')}}">Nursary Students</a></li>
                <li><a href="{{url('/de_registar/primary/scholarship')}}">Request Scholarship</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);"><i class="mdi mdi-school"></i><span>School Students</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{url('/de_registar/inqueries')}}">Inqueries</a></li>
                {{-- <li><a href="{{url('/de_registar/applications')}}">Applications</a></li>
                <li><a href="{{url('/de_registar/students')}}">Registrations</a></li> --}}
                <li><a href="{{url('/de_registar/school/students/table')}}">School Students</a></li>
                <li><a href="{{url('/de_registar/scholarship')}}">Request Scholarship</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);"><i class="mdi mdi-cash-multiple"></i><span>Payments</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{url('/de_registar/payments')}}">Class Fees</a></li>
                <li><a href="{{url('/de_registar/activities_payments')}}">Activities Fee</a></li>
                <li><a href="{{url('/de_registar/application_pay')}}">Application Fee</a></li>
                <li><a href="{{url('/de_registar/admition')}}">Admition</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);"><i class="mdi mdi-certificate"></i><span>Achivments</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{url('/de_registar/awards/create')}}">Academic</a></li>
                <li><a href="{{url('/de_registar/nonacc/awards/create')}}">Non Academic</a></li>
            </ul>
        </li>

        {{-- <li>
            <a href="{{url('/de_registar/students')}}"><i class="mdi mdi-account-card-details"></i><span>Students</span></a>
        </li> --}}

        {{-- <li>
            <a href="{{url('/de_registar/institutes')}}"><i class="mdi mdi-city"></i><span>Institutes</span></a>
        </li> --}}

        {{-- <li>
            <a href="{{url('/de_registar/banks')}}"><i class="mdi mdi-bank"></i><span>Banks</span></a>
        </li> --}}

        {{-- <li>
            <a href="{{url('/de_registar/activities/create')}}"><i class="mdi mdi-basketball"></i><span>Activities</span></a>
        </li> --}}

        {{-- <li>
            <a href="{{url('/de_registar/awards/create')}}"><i class="mdi mdi-certificate"></i><span>Awards</span></a>
        </li> --}}

        <li>
            <a href="{{url('/de_registar/complaints/create')}}"><i class="mdi mdi-account-alert"></i><span>Complaints</span></a>
        </li>

        {{-- <li>
            <a href="{{url('/de_registar/users')}}"><i class="mdi mdi-eye-circle"></i><span>Users</span></a>
        </li> --}}

        {{-- <li>
            <a href="javascript: void(0);"><i class="mdi mdi-shield-lock"></i><span>User Module</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{url('/de_registar/userrole')}}">User Roles</a></li>
                <li><a href="{{url('/de_registar/users')}}">Users</a></li>
            </ul>
        </li> --}}

        <li>
            <a href="{{url('/de_registar/profile')}}"><i class="mdi mdi-account-settings"></i><span>Profile</span></a>
        </li>



    </ul>

</div>
