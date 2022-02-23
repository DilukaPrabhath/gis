<div class="left-sidenav">

    <ul class="metismenu left-sidenav-menu" id="side-nav">

        <li class="menu-title">Main</li>

        <li>
            <a href="{{url('/home')}}"><i class="mdi mdi-monitor"></i><span>Dashboard</span></a>
        </li>

        <li>
            <a href="{{url('/accountant/student/profile')}}"><i class="mdi mdi-account-card-details"></i><span>Student Profile</span></a>
        </li>

        {{-- <li>
            <a href="javascript: void(0);"><i class="mdi mdi-settings"></i><span>Master</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{url('/accountant/activities/create')}}">Activities</a></li>
                <li><a href="{{url('/accountant/institutes')}}">Schools</a></li>
                <li><a href="{{url('/accountant/subjects')}}">Subjects</a></li>
                <li><a href="{{url('/accountant/events')}}">Create Events</a></li>
                <li><a href="{{url('/accountant/event_tickets')}}">Event Tickets</a></li>
                <li><a href="{{url('/accountant/classfee')}}">Class Fees</a></li>
                <li><a href="{{url('/accountant/banks')}}">Banks</a></li>
            </ul>
        </li> --}}

        <li>
            <a href="javascript: void(0);"><i class="mdi mdi-school"></i><span>Nursary Students</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{url('/accountant/primary/inqueries')}}">Inqueries</a></li>
                {{-- <li><a href="{{url('/accountant/primary/applications')}}">Applications</a></li> --}}
                <li><a href="{{url('/accountant/nursary/students/table')}}">Nursary Students</a></li>
                <li><a href="{{url('/accountant/primary/scholarship')}}">Request Scholarship</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);"><i class="mdi mdi-school"></i><span>School Students</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{url('/accountant/inqueries')}}">Inqueries</a></li>
                {{-- <li><a href="{{url('/accountant/applications')}}">Applications</a></li>
                <li><a href="{{url('/accountant/students')}}">Registrations</a></li> --}}
                <li><a href="{{url('/accountant/school/students/table')}}">School Students</a></li>
                <li><a href="{{url('/accountant/scholarship')}}">Request Scholarship</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);"><i class="mdi mdi-cash-multiple"></i><span>Payments</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{url('/accountant/payments')}}">Class Fees</a></li>
                <li><a href="{{url('/accountant/activities_payments')}}">Activities Fee</a></li>
                <li><a href="{{url('/accountant/application_pay')}}">Application Fee</a></li>
                <li><a href="{{url('/accountant/admition')}}">Admition</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);"><i class="mdi mdi-certificate"></i><span>Achivments</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{url('/accountant/awards/create')}}">Academic</a></li>
                <li><a href="{{url('/accountant/nonacc/awards/create')}}">Non Academic</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);"><i class="mdi mdi-file-table-outline"></i><span>Reports</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{url('/accountant/reports/application')}}">Application</a></li>
                <li><a href="{{url('/accountant/reports/income')}}">Income</a></li>
                <li><a href="{{url('/accountant/reports/school_due')}}">School Due Fee</a></li>
                <li><a href="{{url('/accountant/reports/admition')}}">Admition</a></li>
            </ul>
        </li>

        {{-- <li>
            <a href="{{url('/accountant/students')}}"><i class="mdi mdi-account-card-details"></i><span>Students</span></a>
        </li> --}}

        {{-- <li>
            <a href="{{url('/accountant/institutes')}}"><i class="mdi mdi-city"></i><span>Institutes</span></a>
        </li> --}}

        {{-- <li>
            <a href="{{url('/accountant/banks')}}"><i class="mdi mdi-bank"></i><span>Banks</span></a>
        </li> --}}

        {{-- <li>
            <a href="{{url('/accountant/activities/create')}}"><i class="mdi mdi-basketball"></i><span>Activities</span></a>
        </li> --}}

        {{-- <li>
            <a href="{{url('/accountant/awards/create')}}"><i class="mdi mdi-certificate"></i><span>Awards</span></a>
        </li> --}}

        <li>
            <a href="{{url('/accountant/complaints/create')}}"><i class="mdi mdi-account-alert"></i><span>Complaints</span></a>
        </li>

        {{-- <li>
            <a href="{{url('/accountant/users')}}"><i class="mdi mdi-eye-circle"></i><span>Users</span></a>
        </li> --}}

        {{-- <li>
            <a href="javascript: void(0);"><i class="mdi mdi-shield-lock"></i><span>User Module</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{url('/accountant/userrole')}}">User Roles</a></li>
                <li><a href="{{url('/accountant/users')}}">Users</a></li>
            </ul>
        </li> --}}

        <li>
            <a href="{{url('/accountant/profile')}}"><i class="mdi mdi-account-settings"></i><span>Profile</span></a>
        </li>



    </ul>

</div>
