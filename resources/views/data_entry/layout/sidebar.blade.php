<div class="left-sidenav">

    <ul class="metismenu left-sidenav-menu" id="side-nav">

        <li class="menu-title">Main</li>

        <li>
            <a href="{{url('/home')}}"><i class="mdi mdi-monitor"></i><span>Dashboard</span></a>
        </li>

        <li>
            <a href="{{url('/data_entry/student/profile')}}"><i class="mdi mdi-account-card-details"></i><span>Student Profile</span></a>
        </li>

        {{-- <li>
            <a href="javascript: void(0);"><i class="mdi mdi-settings"></i><span>Master</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{url('/data_entry/activities/create')}}">Activities</a></li>
                <li><a href="{{url('/data_entry/institutes')}}">Schools</a></li>
                <li><a href="{{url('/data_entry/subjects')}}">Subjects</a></li>
                <li><a href="{{url('/data_entry/events')}}">Create Events</a></li>
                <li><a href="{{url('/data_entry/event_tickets')}}">Event Tickets</a></li>
                <li><a href="{{url('/data_entry/classfee')}}">Class Fees</a></li>
                <li><a href="{{url('/data_entry/banks')}}">Banks</a></li>
            </ul>
        </li> --}}


        @php
        $uid = Auth::user()->ins_id;
        $petani = DB::table('institutes')->where('id',$uid)->get();
        @endphp

        @if ($petani[0]->pre_or_sch == 1)
        <li>
            <a href="javascript: void(0);"><i class="mdi mdi-school"></i><span>Nursary Students</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{url('/data_entry/primary/inqueries')}}">Inqueries</a></li>
                {{-- <li><a href="{{url('/data_entry/primary/applications')}}">Applications</a></li> --}}
                <li><a href="{{url('/data_entry/nursary/students/table')}}">Nursary Students</a></li>
                <li><a href="{{url('/data_entry/primary/scholarship')}}">Request Scholarship</a></li>
            </ul>
        </li>
        @else
        <li>
            <a href="javascript: void(0);"><i class="mdi mdi-school"></i><span>School Students</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{url('/data_entry/inqueries')}}">Inqueries</a></li>
                {{-- <li><a href="{{url('/data_entry/applications')}}">Applications</a></li>
                <li><a href="{{url('/data_entry/students')}}">Registrations</a></li> --}}
                <li><a href="{{url('/data_entry/school/students/table')}}">School Students</a></li>
                <li><a href="{{url('/data_entry/scholarship')}}">Request Scholarship</a></li>

            </ul>
        </li>
        @endif

        <li>
            <a href="javascript: void(0);"><i class="mdi mdi-cash-multiple"></i><span>Payments</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{url('/data_entry/payments')}}">Class Fees</a></li>
                <li><a href="{{url('/data_entry/activities_payments')}}">Activities Fee</a></li>
                <li><a href="{{url('/data_entry/application_pay')}}">Application Fee</a></li>
                <li><a href="{{url('/data_entry/admition')}}">Admission</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);"><i class="mdi mdi-certificate"></i><span>Achivments</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{url('/data_entry/awards/create')}}">Academic</a></li>
                <li><a href="{{url('/data_entry/nonacc/awards/create')}}">Non Academic</a></li>
            </ul>
        </li>

        {{-- <li>
            <a href="{{url('/data_entry/students')}}"><i class="mdi mdi-account-card-details"></i><span>Students</span></a>
        </li> --}}

        {{-- <li>
            <a href="{{url('/data_entrydata_entry/institutes')}}"><i class="mdi mdi-city"></i><span>Institutes</span></a>
        </li> --}}

        {{-- <li>
            <a href="{{url('/data_entry/banks')}}"><i class="mdi mdi-bank"></i><span>Banks</span></a>
        </li> --}}

        {{-- <li>
            <a href="{{url('/data_entry/activities/create')}}"><i class="mdi mdi-basketball"></i><span>Activities</span></a>
        </li> --}}

        {{-- <li>
            <a href="{{url('/data_entry/awards/create')}}"><i class="mdi mdi-certificate"></i><span>Awards</span></a>
        </li> --}}

        <li>
            <a href="{{url('/data_entry/complaints/create')}}"><i class="mdi mdi-account-alert"></i><span>Complaints</span></a>
        </li>

        {{-- <li>
            <a href="{{url('/data_entry/users')}}"><i class="mdi mdi-eye-circle"></i><span>Users</span></a>
        </li> --}}

        {{-- <li>
            <a href="javascript: void(0);"><i class="mdi mdi-shield-lock"></i><span>User Module</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{url('/data_entry/userrole')}}">User Roles</a></li>
                <li><a href="{{url('/data_entry/users')}}">Users</a></li>
            </ul>
        </li> --}}

        <li>
            <a href="{{url('/data_entry/profile')}}"><i class="mdi mdi-account-settings"></i><span>Profile</span></a>
        </li>



    </ul>

</div>
