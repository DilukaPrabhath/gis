<div class="left-sidenav">

    <ul class="metismenu left-sidenav-menu" id="side-nav">

        <li class="menu-title">Main</li>

        <li>
            <a href="{{url('/home')}}"><i class="mdi mdi-monitor"></i><span>Dashboard</span></a>
        </li>

        <li>
            <a href="{{url('/superadmin/student/profile')}}"><i class="mdi mdi-account-card-details"></i><span>Student Profile</span></a>
        </li>

        <li>
            <a href="javascript: void(0);"><i class="mdi mdi-settings"></i><span>Master</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{url('/superadmin/activities/create')}}">Activities</a></li>
                <li><a href="{{url('/superadmin/institutes')}}">Schools</a></li>
                <li><a href="{{url('/superadmin/subjects')}}">Subjects</a></li>
                <li><a href="{{url('/superadmin/events')}}">Create Events</a></li>
                <li><a href="{{url('/superadmin/event_tickets')}}">Event Tickets</a></li>
                <li><a href="{{url('/superadmin/classfee')}}">Class Fees</a></li>
                <li><a href="{{url('/superadmin/banks')}}">Banks</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);"><i class="mdi mdi-school"></i><span>Nursary Students</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{url('/superadmin/primary/inqueries')}}">Inqueries</a></li>
                {{-- <li><a href="{{url('/admin/primary/applications')}}">Applications</a></li> --}}
                <li><a href="{{url('/superadmin/nursary/students/table')}}">Nursary Students</a></li>
                <li><a href="{{url('/superadmin/primary/scholarship')}}">Request Scholarship</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);"><i class="mdi mdi-school"></i><span>School Students</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{url('/superadmin/inqueries')}}">Inqueries</a></li>
                {{-- <li><a href="{{url('/superadmin/applications')}}">Applications</a></li>
                <li><a href="{{url('/superadmin/students')}}">Registrations</a></li> --}}
                <li><a href="{{url('/superadmin/school/students/table')}}">School Students</a></li>
                <li><a href="{{url('/superadmin/scholarship')}}">Request Scholarship</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);"><i class="mdi mdi-cash-multiple"></i><span>Payments</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{url('/superadmin/payments')}}">Class Fees</a></li>
                <li><a href="{{url('/superadmin/activities_payments')}}">Activities Fee</a></li>
                <li><a href="{{url('/superadmin/application_pay')}}">Application Fee</a></li>
                <li><a href="{{url('/superadmin/admition')}}">Admission</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);"><i class="mdi mdi-certificate"></i><span>Achivments</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{url('/superadmin/awards/create')}}">Academic</a></li>
                <li><a href="{{url('/superadmin/nonacc/awards/create')}}">Non Academic</a></li>
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
            <a href="{{url('/superadmin/complaints/create')}}"><i class="mdi mdi-account-alert"></i><span>Complaints</span></a>
        </li>

        {{-- <li>
            <a href="{{url('/admin/users')}}"><i class="mdi mdi-eye-circle"></i><span>Users</span></a>
        </li> --}}

        <li>
            <a href="javascript: void(0);"><i class="mdi mdi-shield-lock"></i><span>User Module</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{url('/superadmin/userrole')}}">User Roles</a></li>
                <li><a href="{{url('/superadmin/users')}}">Users</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);"><i class="mdi mdi-file-table-outline"></i><span>Reports</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{url('/superadmin/reports/application')}}">Application</a></li>
                <li><a href="{{url('/superadmin/reports/income')}}">Income</a></li>
                <li><a href="{{url('/superadmin/reports/school_due')}}">School Due Fee</a></li>
                <li><a href="{{url('/superadmin/reports/admition')}}">Admission</a></li>
            </ul>
        </li>

        <li>
            <a href="{{url('/superadmin/profile')}}"><i class="mdi mdi-account-settings"></i><span>Profile</span></a>
        </li>



    </ul>

</div>
