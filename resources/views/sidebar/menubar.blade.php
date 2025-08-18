<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
             @if (Auth::user()->role_name=='Finance')
             <li>
                    <a href="{{ url('/home')}}"><i class="la la-dashboard"></i> <span>Dashboard</span></a>
            </li>
               <li class="submenu">
                    <a href="{{ url('/form/leavesemployee')}}" ><i class="la la-edit"></i> <span> Leaves</span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ url('/form/leavesemployee')}}">Request Leave</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="{{ route('form/salary/page') }}" ><i class="la la-money"></i> <span> Payroll</span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('form/salary/page') }}">Employee Salary</a></li>
                        <li><a href="{{ route('form/salary/payments') }}">Paid Salaries</a></li>
                        <li><a href="{{ route('form/salary/budgets') }}">Budgets</a></li>

                    </ul>
                </li>

             @elseif (Auth::user()->role_name=='Manager')
             <li>
                    <a href="{{ url('/home')}}"><i class="la la-dashboard"></i> <span>Dashboard</span></a>
            </li>
                <li class="submenu">
                    <a href="#" ><i class="la la-user"></i> <span> Employees</span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ url('/all/employee/list')}}">All Employees</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="{{ url('form/leavesemployee/new')}}" ><i class="la la-edit"></i> <span> Leaves</span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ url('form/leaves/new')}}">Manage Leaves</a></li>
                        <li><a href="{{ url('/form/leavesemployee')}}">Request Leave</a></li>
                        <li><a href="{{ url('/form/leaves/report')}}">Leave Report</a></li>

                    </ul>
                </li>

                @elseif (Auth::user()->role_name=='Line-Manager')
             <li>
                    <a href="{{ url('/home')}}"><i class="la la-dashboard"></i> <span>Dashboard</span></a>
            </li>
                <li class="submenu">
                    <a href="{{ url('form/leavesemployee/new')}}" ><i class="la la-edit"></i> <span> Leaves</span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ url('form/leaves/new_line')}}">Employees Leave</a></li>
                        <li><a href="{{ url('/form/leavesemployee')}}">Request Leave</a></li>

                    </ul>
                </li>
                <li>
                    <a href="{{ url('/all/employee/setting/edit/'.auth::user()->rec_id)}}"><i class="la la-cog"></i> <span>Settings</span></a>
                </li>

             @elseif(Auth::user()->role_name=='Employee')
             <li>
                    <a href="{{ url('/home')}}"><i class="la la-dashboard"></i> <span>Dashboard</span></a>
            </li>
               <li class="submenu">
                    <a href="{{ url('/form/leavesemployee')}}" ><i class="la la-edit"></i> <span> Leaves</span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ url('/form/leavesemployee')}}">Request Leave</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ url('/all/employee/setting/edit/'.auth::user()->rec_id)}}"><i class="la la-cog"></i> <span>Settings</span></a>
                </li>

                @elseif (Auth::user()->role_name=='Admin')
                <li>
                    <a href="{{ url('/home')}}"><i class="la la-dashboard"></i> <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="{{ url('/departmentlist')}}"><i class="las la-building"></i> <span>Departments</span></a>
                </li>
                <li class="submenu">
                    <a href="#" ><i class="la la-user"></i> <span> Employees</span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ url('/all/employee/list')}}">All Employees</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="{{ url('form/leavesemployee/new')}}" ><i class="la la-edit"></i> <span> Leaves</span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ url('form/leaves/new_admin')}}">Manage Leaves</a></li>
                        <li><a href="{{ url('/form/leavesemployee')}}">Request Leave</a></li>
                        <li><a href="{{ url('/form/leaves/report')}}">Leave Report</a></li>

                    </ul>
                </li>
                <li class="submenu">
                    <a href="{{ route('form/salary/page') }}" ><i class="la la-money"></i> <span> Payroll</span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('form/salary/page') }}">Employee Salary</a></li>
                        <li><a href="{{ route('form/salary/budgets') }}">Budgets</a></li>

                    </ul>
                </li>

                <li class="submenu">
                    <a href="#" ><i class="la la-pie-chart"></i> <span> Reports</span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ url('/attendance/list')}}">Attendance List</a></li>
                        <li><a href="{{ route('form/salary/payments') }}">Paid Salaries</a></li>

                    </ul>
                </li>

                <li>
                      <a href="{{ url('userManagement')}}"><i class="la la-user-plus"></i> <span>Users</span></a>
                </li>

                <li>
                      <a href="{{ url('activity/log')}}"><i class="la la-user"></i> <span>Activity Logs</span></a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->
