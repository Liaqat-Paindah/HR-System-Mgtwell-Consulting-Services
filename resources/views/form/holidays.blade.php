
@extends('layouts.master')
@section('content')
<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>

                @if (Auth::user()->role_name=='Admin')
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
                    <a href="{{ url('/attendance/page')}}" ><i class="la la-edit"></i> <span> Attendances</span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ url('/attendance/page')}}">Manage Attendances</a></li>
                        <li><a href="{{ url('/attendance/employee/page')}}">Sign Attendance</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="{{ route('form/salary/page') }}" ><i class="la la-money"></i> <span> Payroll</span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('form/salary/page') }}">Employee Salary</a></li>
                        <li><a href="{{ route('form/salary/page') }}">Payslip</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="{{ route('form/salary/page') }}" ><i class="la la-pie-chart"></i> <span> Reports</span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="invoice-reports.html"> Invoice Report </a></li>
                        <li><a href="payments-reports.html"> Payments Report </a></li>
                        <li><a href="project-reports.html"> Project Report </a></li>
                        <li><a href="employee-reports.html"> Employee Report </a></li>
                        <li><a href="payslip-reports.html"> Payslip Report </a></li>
                        <li><a href="attendance-reports.html"> Attendance Report </a></li>
                        <li><a href="leave-reports.html"> Leave Report </a></li>
                    </ul>
                </li>
                <li>
                    <a href="tickets.html"><i class="la la-cog"></i> <span>Performance</span></a>
                </li>
                <li class="menu-title"> <span>Users</span> </li>
                <li> <a href="assets.html"><i class="la la-user-plus"> </i> <span>Users</span></a></li>
                <li> <a href="assets.html"><i class="la la-cog"> </i> <span>Settings</span></a></li>
                <li class="menu-title"> <span>Authentication</span> </li>
                <li class="submenu">
                    <a href="#">
                        <i class="la la-user-secret"></i> <span> User Controller</span> <span class="menu-arrow"></span>
                    </a>
                    <ul style="display: none;">
                        <li><a href="{{ route('userManagement') }}">All User</a></li>
                        <li><a href="{{ route('activity/log') }}">Activity Log</a></li>
                        <li><a href="{{ route('activity/login/logout') }}">Activity User</a></li>
                    </ul>
                </li>
                @endif
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->

    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Holidays <span id="year"></span></h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Holidays</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_holiday"><i class="fa fa-plus"></i> Add Holiday</a>
                    </div>
                </div>
            </div>
			<!-- /Page Header -->
            {{-- message --}}
            {!! Toastr::message() !!}

            @php
                use Carbon\Carbon;
                $today_date = Carbon::today()->format('d-m-Y');
            @endphp
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Title </th>
                                    <th>Holiday Date</th>
                                    <th>Day</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($holiday as $key=>$items )
                                    @if(($today_date > $items->date_holiday))
                                        <tr class="holiday-completed">
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $items->name_holiday }}</td>
                                            <td>{{date('d F, Y',strtotime($items->date_holiday)) }}</td>
                                            <td>{{date('l',strtotime($items->date_holiday)) }}</td>
                                            <td></td>
                                        </tr>
                                    @endif
                                @endforeach
                                @foreach ($holiday as $key=>$items )
                                    @if(($today_date <= $items->date_holiday))
                                        <tr class="holiday-upcoming">
                                            <td hidden class="id">{{ $items->id }}</td>
                                            <td>{{ ++$key }}</td>
                                            <td class="holidayName">{{ $items->name_holiday }}</td>
                                            <td hidden class="holidayDate">{{$items->date_holiday }}</td>
                                            <td>{{date('d F, Y',strtotime($items->date_holiday)) }}</td>
                                            <td>{{date('l',strtotime($items->date_holiday)) }}</td>
                                            <td class="text-right">
                                                <div class="dropdown dropdown-action">
                                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item userUpdate" data-toggle="modal" data-id="'.$items->id.'" data-target="#edit_holiday"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_holiday"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->
        <!-- Add Holiday Modal -->
        <div class="modal custom-modal fade" id="add_holiday" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Holiday</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('form/holidays/save') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Holiday Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" id="nameHoliday" name="nameHoliday">
                            </div>
                            <div class="form-group">
                                <label>Holiday Date <span class="text-danger">*</span></label>
                                <div class="cal-icon">
                                    <input class="form-control datetimepicker" type="text" id="holidayDate" name="holidayDate">
                                </div>
                            </div>
                            <div class="submit-section">
                                <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Add Holiday Modal -->

        <!-- Edit Holiday Modal -->
        <div class="modal custom-modal fade" id="edit_holiday" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Holiday</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('form/holidays/update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" id="e_id" value="">
                            <div class="form-group">
                                <label>Holiday Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="holidayName_edit" name="holidayName" value="">
                            </div>
                            <div class="form-group">
                                <label>Holiday Date <span class="text-danger">*</span></label>
                                <div class="cal-icon">
                                    <input type="text" class="form-control datetimepicker" id="holidayDate_edit" name="holidayDate" value="">
                                </div>
                            </div>
                            <div class="submit-section">
                                <button type="submit" class="btn btn-primary submit-btn">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Edit Holiday Modal -->

        <!-- Delete Holiday Modal -->
        <div class="modal custom-modal fade" id="delete_holiday" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-header">
                            <h3>Delete Holiday</h3>
                            <p>Are you sure want to delete?</p>
                        </div>
                        <div class="modal-btn delete-action">
                            <div class="row">
                                <div class="col-6">
                                    <a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
                                </div>
                                <div class="col-6">
                                    <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Delete Holiday Modal -->
       
    </div>
    <!-- /Page Wrapper -->
    @section('script')
    <script>
        document.getElementById("year").innerHTML = new Date().getFullYear();
    </script>
    {{-- update js --}}
    <script>
        $(document).on('click','.userUpdate',function()
        {
            var _this = $(this).parents('tr');
            $('#e_id').val(_this.find('.id').text());
            $('#holidayName_edit').val(_this.find('.holidayName').text());
            $('#holidayDate_edit').val(_this.find('.holidayDate').text());  
        });
    </script>
    @endsection

@endsection
